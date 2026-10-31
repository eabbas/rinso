<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\custom_product;
use App\Models\custom_product_variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomProductVariantController extends Controller
{
    public function create(custom_product $custom_product)
    {
        return view('admin.customProductVariants.create', ['custom_product' => $custom_product]);
    }

    public function store(Request $request)
    {
        $path = null;
        if (isset($request->imageCPV)) {
            $name = $request->imageCPV->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('imageCPV')->storeAs('images', $fullName, 'public');
        }
        $customProVariant = custom_product_variant::insertGetId([
            'title' => $request->title,
            'min_amount_unit' => $request->min_amount_unit,
            'duration' => $request->duration,
            'custom_product_id' => $request->custom_pro_id,
            'description' => $request->description,
            'image' => $path
        ]);
        $data = custom_product_variant::find($customProVariant);
        return response()->json($data);
    }

    public function index(custom_product $customProduct)
    {
        return view('admin.customProductVariants.index', ['customProduct' => $customProduct]);
    }

    public function show(custom_product_variant $cpVariants)
    {
        return view('admin.customProductVariants.single', ['cpVariants' => $cpVariants]);
    }

    public function edit(Request $request)
    {
        $custom_product_variant = custom_product_variant::find($request->id);
        return response()->json($custom_product_variant);
    }

    public function update(Request $request)
    {
        $cpv = custom_product_variant::find($request->id);

        $cpv->title = $request->title;
        $cpv->description = $request->description;
        $cpv->min_amount_unit = $request->min_amount_unit;
        $cpv->duration = $request->duration;
        $cpv->custom_product_id = $request->custom_product_id;

        if (isset($request->customProductImage)) {
            if ($cpv->image) {
                Storage::disk('public')->delete($cpv->image);
            }
            $name = $request->customProductImage->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');
            $cpv->image = $path;
        }
        $cpv->save();
        return response()->json($cpv);
    }

    public function delete(Request $request)
    {
        $cpVariants = custom_product_variant::find($request->id);

        if ($cpVariants->image) {
            Storage::disk('public')->delete($cpVariants->image);
        }
        $cpVariants->delete();
        return response()->json('ok');
    }

    public function deleteAll(Request $request)
    {
        if (!isset($request->cpVariants)) {
            return redirect()->back();
        }
        foreach ($request->cpVariants as $cp_variant_id) {
            $cpVariants = custom_product_variant::find($cp_variant_id);
            if ($cpVariants->image) {
                Storage::disk('public')->delete($cpVariants->image);
            }
            $cpVariants->delete();
        }
        return redirect()->back();
    }
}
