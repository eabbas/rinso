<?php

namespace App\Http\Controllers;

use App\Models\intro_product;
use Illuminate\Http\Request;
use App\Models\samples;
use Illuminate\Support\Facades\Storage;

class SamplesController extends Controller
{
    public function store(Request $request){
        $path = null;
        if($request->hasFile('image')){
            $name = $request->image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        $sample = samples::create([
            'title' => $request->title,
            'description' => $request->description,
            'image'=>$path,
            'intro_product_id'=>$request->input('product_id')
        ]);
        return response()->json($sample);
    }

    public function edit(Request $request){
        $sample = samples::find($request->input('sample_id'));
        return response()->json($sample);
    }

    public function update(Request $request){
        $sample = samples::find($request->input('sample_id'));
        $sample->title = $request->title;
        $sample->description = $request->description;
        if(isset($request->image)){
            Storage::disk('public')->delete($sample->image);
            $name = $request->image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
            $sample->image = $path;
        }
        $sample->save();
        return response()->json($sample);
    }

    public function delete(Request $request){
        $sample = samples::find($request->input('sample_id'));
        if($sample->image){
            Storage::disk('public')->delete($sample->image);
        }
        $sample->delete();
        return response()->json('ok');
    }

}
