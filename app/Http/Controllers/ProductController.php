<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\media;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $categories = category::all();
        return view('product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        if ($request->home) {
            $productId = product::insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount,
                'show_in_home' => $request->home,
                'cat_id' => $request->categoryId
            ]);
        } else {
            $productId = product::insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount,
                'cat_id' => $request->categoryId
            ]);
        }
        $type = $request->mainImage->getClientOriginalExtension();
        $name = $request->mainImage->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('mainImage')->storeAs('images', $fullName, 'public');
        $products[] = ['product_id' => $productId, 'type' => $type, 'path' => $path, 'is_main' => 1];

        media::insert($products);
    }

    public function index()
    {
        $categories = category::all();
        $products = product::all();
        return view('product.index', ['categories' => $categories, 'products' => $products]);
    }

    public function show(product $product)
    {
        $categories = category::all();
        $product->medias;
        return view('product.single', ['product' => $product, 'categories' => $categories]);
    }

    public function edit(product $product)
    {
        $categories = category::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
        $product = product::find($request->id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->show_in_home = $request->homes;
        $product->cat_id = $request->categoryId;
        $product->save();
    }

    public function delete(product $product)
    {
        media::where('product_id', $product->id)->delete();
        $product->delete();
        return redirect('products');
    }
}
