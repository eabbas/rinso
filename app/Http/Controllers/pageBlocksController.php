<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page_blocks;
use App\Models\FAQ;
class pageBlocksController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $block_id = page_blocks::find($id);
        return response()->json($block_id);
    }
    public function update(Request $request)
    {
        $page_blocks = page_blocks::find($request->id);
        $page_blocks->title = $request->title;
        $page_blocks->save();
        return response()->json($page_blocks);
    }
    public function delete(Request $request)
    {
        // return response()->json($request->all());

        $id = $request->input('id');
        $page_blocks = page_blocks::find($id);
        $FAQs = FAQ::where('block_id', $page_blocks->id)->get();
        foreach($FAQs as $FAQ){
            $FAQ->delete();
        }
        $page_blocks->delete();
        return response()->json('ok');

    }
}
