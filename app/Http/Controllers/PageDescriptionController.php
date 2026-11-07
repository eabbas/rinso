<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page_blocks;
use App\Models\page_description;

class PageDescriptionController extends Controller
{
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $page_block_id = page_blocks::insertGetId([
            'title' => 'متن یا توضیح',
            'page_id' => $request->page_id,
            'type' => 'pageDescription'
        ]);

        $blockTitle = page_blocks::find($page_block_id);

        $description = page_description::create([
            'description' => $request->description,
            'style' => json_encode($request->datas),
            'page_id' => $request->page_id,
            'block_id' => $page_block_id
        ]);

        $descriptionStyle = json_decode($description['style']);
        return response()->json([
            'description' => $description,
            'descriptionStyle' => $descriptionStyle,
            'block' => $blockTitle
        ]);
    }
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $pd = page_description::find($id);
        $descriptionStyle = json_decode($pd['style']);
        return response()->json([
            'pd' => $pd,
            'descriptionStyle' => $descriptionStyle
        ]);
    }
    public function update(Request $request)
    {
        // return response()->json($request->all());
        $pd = page_description::find($request->id);
        $pd->description = $request->description ? $request->description : null;
        $pd->style = json_encode($request->datas);
        $pd->save();
        $descriptionStyle = json_decode($pd['style']);
        return response()->json([
            'descriptionStyle' => $descriptionStyle,
            'pd' => $pd,
        ]);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $pd = page_description::find($id);
        $pd->delete();
        return response()->json('ok');
    }
}
