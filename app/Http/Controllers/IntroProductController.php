<?php

namespace App\Http\Controllers;

use App\Models\intro_category;
use Illuminate\Http\Request;
use App\Models\intro_product;
use App\Models\intro_pro_cat;
use App\Models\intro_product_attribute;
use App\Models\intro_product_gallery;
use App\Models\User;
use App\Models\pages;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Support\Facades\Storage;

class IntroProductController extends Controller
{

    public function create(pages $pages){
        $pages = $pages->load(['introCats'=>function($query){
            $query->where('title', "!=", 'بدون دسته بندی')->get();
        }]);
        return view('admin.pages.product.create', ['page'=>$pages]);
    }
    public function store(Request $request, pages $pages){
//        return response()->json($request->all());
//        $show_in_home=$request->show_in_home_product;
        $path = null;
        if(isset($request->main_image_product)){
            $name = $request->main_image_product->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('main_image_product')->storeAs('images', $fullName, 'public');
        }
//        return response()->json($request->all());
        $pro_id = intro_product::insertGetId([
            'title'=>$request->title,
            'description'=>isset($request->description_product) ? $request->description_product : null,
            'main_image'=>$path,
            'show_in_home'=>isset($request->show_in_home)?1:0,
            'attributes'=>json_encode($request->input('attributes')),
            'user_id'=>Auth::id(),
            'page_id'=>$pages->id,
        ]);


            intro_pro_cat::create([
                'intro_category_id'=>$request->product_category,
                'intro_product_id'=>$pro_id
            ]);

        if(isset($request->gallery)){
            $gallery = [];
            foreach($request->gallery as $item){
                $gallery[]=$item;
                $galleryName = $item->getClientOriginalName();
                $fullGalleryName = time()."_".$galleryName;
                $galleryPath = $item->storeAs('images', $fullGalleryName, 'public');
                intro_product_gallery::create([
                    'image'=>$galleryPath,
                    'intro_product_id'=>$pro_id
                ]);
            }
        }
        $product = intro_product::find($pro_id);
        $product->categories;
        return response()->json($product);



//        $path = null;
//        if(isset($request->main_image)){
//            $name = $request->main_image->getClientOriginalName();
//            $fullName = time()."_".$name;
//            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
//        }
//        $pro_id = intro_product::insertGetId([
//            'title'=>$request->title,
//            'description'=>isset($request->description) ? $request->description : null,
//            'main_image'=>$path,
//            'show_in_home'=>isset($request->show_in_home)?1:0,
//            'attributes'=>json_encode($request->input('attributes')),
//            'user_id'=>Auth::id(),
//            'page_id'=>$pages->id,
//        ]);
//
//        foreach($request->categories as $category){
//            intro_pro_cat::create([
//                'intro_category_id'=>$category,
//                'intro_product_id'=>$pro_id
//            ]);
//        }
//        if(isset($request->gallery)){
//            $gallery = [];
//            foreach($request->gallery as $item){
//                $gallery[]=$item;
//                $galleryName = $item->getClientOriginalName();
//                $fullGalleryName = time()."_".$galleryName;
//                $galleryPath = $item->storeAs('images', $fullGalleryName, 'public');
//                intro_product_gallery::create([
//                    'image'=>$galleryPath,
//                    'intro_product_id'=>$pro_id
//                ]);
//            }
//        }
//        $product = intro_product::find($pro_id);
//        return to_route('introPro.list', [$pages->id]);
    }

    public function showProducts(Request $request){
        $introCategory = intro_category::find($request->category_id);
        $introProducts=$introCategory->products;
        return response()->json($introProducts);
    }

    public function edit(Request $request){
        $product = intro_product::find($request->product_id);
        $product['categories']=$product->categories;
        $product['attributes']=json_decode($product->attributes);
        return response()->json($product);
    }

    public function update(Request $request){
//        return response()->json($request->all());
        $product = intro_product::find($request->input('intro_product_id'));

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->attributes =json_encode($request->input('attributes'));
        $product->show_in_home = isset($request->show_in_home)?1:0;

        if (isset($request->main_image)) {
            $product->main_image && Storage::disk('public')->delete($product->main_image);
            $name = $request->main_image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $product->main_image = $path;
        }

        if (isset($request->gallery)) {
            if(count($product->gallery) > 0){
                foreach($product->gallery as $gallery){
                    Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }
            foreach($request->gallery as $item){
                $galleryName = $item->getClientOriginalName();
                $fullGalleryName = time()."_".$galleryName;
                $galleryPath = $item->storeAs('images', $fullGalleryName, 'public');
                intro_product_gallery::create([
                    'image'=>$galleryPath,
                    'intro_product_id'=>$request->input('intro_product_id')
                ]);
            }
        }
        intro_pro_cat::where('intro_product_id', $request->intro_product_id)->delete();
            intro_pro_cat::create([
                'intro_category_id'=>$request->introProCatIdEdit,
                'intro_product_id'=>$request->input('intro_product_id')
            ]);
        $product->updated_at = now();
        $product->save();
        $product['attributes']=json_decode($product->attributes);
        return response()->json($product);
    }

    public function delete(Request $request){
        $product =intro_product::find($request->product_id);
        if (count($product->gallery)) {
            foreach($product->gallery as $img){
                Storage::disk('public')->delete($img->image);
                $img->delete();
            }
        }
        intro_pro_cat::where('intro_product_id', $request->product_id)->delete();
        $product->delete();
        return response()->json('ok');
//        return redirect()->back();
    }

    public function single(intro_product $intro_product){
        return view('admin.pages.product.single', ['product'=>$intro_product]);
    }
    public function showForUser(intro_product $intro_product){
        return view('client.link.product.single', ['product'=>$intro_product]);
    }

    public function editSingle(Request $request){
        $page = pages::find($request->page_id);
        $product = intro_product::find($request->product_id);
        $product['categories']=$product->categories;
        $product['attributes']=json_decode($product->attributes);
        $page->load(['introCats'=>function($query){
            $query->where('title', '!=', 'بدون دسته بندی')->get();
        }]);
        return response()->json(['categories'=>$page->introCats, 'product'=>$product]);
    }

    public function products(intro_category $intro_category){
        return view('admin.pages.product.categoryProducts', ['category'=>$intro_category]);
    }

    public function deleteAll(Request $request){
        if(!isset($request->products)){
            return redirect()->back();
        }
        foreach($request->products as $product_id){
            $product = intro_product::find($request->product_id);
            if (count($product->gallery)) {
                foreach($product->gallery as $img){
                    $img->delete();
                }
            }
            intro_pro_cat::where('intro_product_id', $product->id)->delete();
            $product->delete();
        }
        return redirect()->back();
    }

    public function index(pages $pages){
        return view('admin.pages.product.products', ['page'=>$pages]);
    }

    public function editPage(intro_product $intro_product){
        $intro_product->page->load(['introCats'=>function($query){
            $query->where('title', '!=', 'بدون دسته بندی')->get();
        }]);
        return view('admin.pages.product.edit', ['product'=>$intro_product]);
    }

    public function updatePage(Request $request, intro_product $intro_product){

        $intro_product->title = $request->input('title');
        $intro_product->description = $request->input('description');
        $intro_product->show_in_home = isset($request->show_in_home)?1:0;
        $intro_product->attributes = json_encode($request->input('attributes'));

        if (isset($request->main_image)) {
            Storage::disk('public')->delete($intro_product->main_image);
            $name = $request->main_image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $intro_product->main_image = $path;
        }
        if (isset($request->gallery)) {
            count($intro_product->gallery) && $intro_product->gallery()->delete();
            foreach($request->gallery as $item){
                $galleryName = $item->getClientOriginalName();
                $fullGalleryName = time()."_".$galleryName;
                $galleryPath = $item->storeAs('images', $fullGalleryName, 'public');
                intro_product_gallery::create([
                    'image'=>$galleryPath,
                    'intro_product_id'=>$intro_product->id
                ]);
            }
        }
        intro_pro_cat::where('intro_product_id', $intro_product->id)->delete();
        foreach($request->categories as $category){
            intro_pro_cat::create([
                'intro_category_id'=>$category,
                'intro_product_id'=>$intro_product->id
            ]);
        }
        $intro_product->save();
        return to_route('introPro.list', [$intro_product->page->id]);
    }
}
