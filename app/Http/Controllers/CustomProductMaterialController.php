<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\career;
use App\Models\custom_product;
use App\Models\custom_product_material;
use App\Models\customCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomProductMaterialController extends Controller
{
    public function create(customCategory $customCategory)
    {
        return view('admin.customProductMaterials.create', ['customCategory' => $customCategory]);
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $path = null;
        if (isset($request->cpmImage)) {
            $name = $request->cpmImage->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('cpmImage')->storeAs('images', $fullName, 'public');
        }

        $cpm_id = custom_product_material::insertGetId([
            'title' => $request->title,
            'description' => $request->description,
            'price_per_unit' => $request->price_per_unit,
            'order' => $request->order,
            'max_unit_amount' => $request->max_unit_amount,
            'category_id' => $request->category_id,
            'custom_product_id' => $request->custom_pro_id,
            'required' => isset($request->required) ? $request->required : 0,
            'image' => $path
        ]);
        $data = custom_product_material::find($cpm_id);
        return response()->json($data);
    }
    

    public function index(custom_product $customProduct)
    {
        return view('admin.customProductMaterials.index', ['customProduct' => $customProduct]);
    }

    public function show(custom_product_material $cpm)
    {
        $cpmWithCustomproduct = custom_product_material::with('customCategory')->get();
        return view('admin.customProductMaterials.single', ['cpm' => $cpm, 'cpmWithCustomproduct' => $cpmWithCustomproduct]);
    }

    public function edit(Request $request)
    {
        $cpm = custom_product_material::find($request->id);
        return response()->json($cpm);
    }

    public function update(Request $request)
    {
        $path = null;
        $customProductMaterial = custom_product_material::find($request->id);
        $customProductMaterial->title = $request->title;
        $customProductMaterial->description = $request->description;
        $customProductMaterial->price_per_unit = $request->price_per_unit;
        $customProductMaterial->required = isset($request->required) ? $request->required : 0;
        $customProductMaterial->order = $request->order;
        $customProductMaterial->max_unit_amount = $request->max_unit_amount;
        $customProductMaterial->custom_product_id = $request->custom_product_id;
        $customProductMaterial->category_id = $request->category_id;

        if (isset($request->customProductImage)) {
            if ($customProductMaterial->image) {
                Storage::disk('public')->delete($customProductMaterial->image);
            }
            $name = $request->customProductImage->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');
            $customProductMaterial->image = $path;
        }
        $customProductMaterial->save();
        return response()->json($customProductMaterial);
    }

    public function delete(Request $request)
    {
        $cpm = custom_product_material::find($request->id);
        if ($cpm->image) {
            Storage::disk('public')->delete($cpm->image);
        }
        $cpm->delete();
        return response()->json('ok');
    }
    public function deleteAll(Request $request)
    {
        dd($request->all());
        $cpm = custom_product_material::find($request->id);
        if ($cpm->image) {
            Storage::disk('public')->delete($cpm->image);
        }
        $cpm->delete();
        return response()->json('ok');
    }
    
}
