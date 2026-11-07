<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page_blocks;
use App\Models\page_contactus;

class PageContactusController extends Controller
{
    public function store(Request $request)
    {
        $page_block_id = page_blocks::insertGetId([
            'title' => isset($request->title) ? $request->title : 'راه های ارتباطی',
            'page_id' => $request->page_id,
            'type'=>'pageContactus'
        ]);

        $blockTitle = page_blocks::find($page_block_id);
        if ($request->datas) {
            $createdContactus = [];
            foreach ($request->datas as $contactusData) {
                $contactus = page_contactus::create([
                    'key' => $contactusData[0],
                    'value' => $contactusData[1],
                    'page_id' => $request->page_id,
                    'block_id' => $page_block_id
                ]);
                $createdContactus[] = $contactus;
            }
            return response()->json([
                'contactus' => $createdContactus,
                'block' => $blockTitle
            ]);
        }
    }
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $pc = page_contactus::find($id);
        return response()->json($pc);
    }
    public function update(Request $request)
    {
        $pc = page_contactus::find($request->id);
        $pc->key = $request->key;
        $pc->value = $request->value;
        $pc->save();
        return response()->json($pc);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $pc = page_contactus::find($id);
        $pc->delete();
        return response()->json('ok');
    }
    public function addContactus(Request $request)
    {
        $pc = page_contactus::create([
            'key' => $request->key,
            'value' => $request->value,
            'page_id' => $request->page_id,
            'block_id' => $request->block_id
        ]);

        return response()->json($pc);
    }
}
