<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\career;
use App\Models\custom_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class CustomProductController extends Controller
{
    public function create(career $career)
    {
        return view('admin.customProducts.create', ['career' => $career]);
    }

    public function store(Request $request)
    {
        $path = null;
        if (isset($request->customProductImage)) {
            $name = $request->customProductImage->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');
        }
        $customPro_id = custom_product::insertGetId([
            'title' => $request->title,
            'material_limit' => $request->material_limit,
            'description' => $request->description,
            'career_id' => $request->career_id,
            'image' => $path
        ]);
        $data = custom_product::find($customPro_id);
        return response()->json($data);
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $path = null;
        if (isset($request->customProductImage)) {
            $name = $request->customProductImage->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');
        }
        custom_product::create([
            'title' => $request->title,
            'description' => $request->description,
            'material_limit' => $request->material_limit,
            'career_id' => $request->career_id,
            'image' => $path
        ]);
        return to_route('menu.customProList', ['career' => $request->career_id]);
    }

    public function index()
    {
        $allCustomProduct = custom_product::all();
        // foreach($allCustomProduct as $custom_product){
        //     // dd($custom_product->career->user);
        // }
        return view('admin.customProducts.index', ['allCustomProduct' => $allCustomProduct]);
    }

    public function show(custom_product $customProduct)
    {
        return view('admin.customProducts.single', ['customProduct' => $customProduct]);
    }

    public function edit(Request $request)
    {
        $custom_product = custom_product::find($request->id);
        return response()->json($custom_product);
    }

    public function update(Request $request)
    {
        $customProduct = custom_product::find($request->id);
        // return response()->json($request->all());
        $customProduct->title = $request->title;
        $customProduct->description = $request->description;
        $customProduct->material_limit = $request->material_limit;
        if (isset($request->customProductImageUpdate)) {
            if ($customProduct->image) {
                Storage::disk('public')->delete($customProduct->image);
            }
            $name = $request->customProductImageUpdate->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('customProductImageUpdate')->storeAs('images', $fullName, 'public');
            $customProduct->image = $path;
        }
        $customProduct->save();
        return response()->json($customProduct);
    }

    public function delete(Request $request)
    {
        $customProduct = custom_product::find($request->id);
        if (count($customProduct->custom_product_variants)) {
            foreach ($customProduct->custom_product_variants as $variants) {
                $variants->delete();
            }
        }
        if (count($customProduct->custom_product_materials)) {
            foreach ($customProduct->custom_product_materials as $materials) {
                $materials->delete();
            }
        }
        if (count($customProduct->customCategories)) {
            foreach ($customProduct->customCategories as $category) {
                $category->delete();
            }
        }
        if ($customProduct->image) {
            Storage::disk('public')->delete($customProduct->image);
        }
        $customProduct->delete();
        return response()->json('ok');
    }

    public function createFromDashboard(User $user)
    {
        return view('admin.customProducts.createFromDashboard', ['user' => $user]);
    }

    public function category_list(custom_product $custom_product)
    {
        return view('admin.customProducts.category_list', ['custom_product' => $custom_product]);
    }

    function deleteAll(Request $request)
    {
        if (!isset($request->custom_products)) {
            return redirect()->back();
        }
        foreach ($request->custom_products as $custom_product_id) {
            $customProduct = custom_product::find($custom_product_id);
            if (count($customProduct->custom_product_variants)) {
                foreach ($customProduct->custom_product_variants as $variants) {
                    $variants->delete();
                }
            }
            if (count($customProduct->custom_product_materials)) {
                foreach ($customProduct->custom_product_materials as $materials) {
                    $materials->delete();
                }
            }
            if (count($customProduct->customCategories)) {
                foreach ($customProduct->customCategories as $category) {
                    $category->delete();
                }
            }
            if ($customProduct->image) {
                Storage::disk('public')->delete($customProduct->image);
            }
            $customProduct->delete();
        }
        return redirect()->back();
    }
}
