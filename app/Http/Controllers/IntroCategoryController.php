<?php

namespace App\Http\Controllers;

use App\Models\intro_product;
use Illuminate\Http\Request;
use App\Models\intro_category;
use App\Models\intro_pro_cat;
use App\Models\pages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Log;

class IntroCategoryController extends Controller
{

    public function create(pages $pages){
        return view('admin.pages.category.create', ['page' => $pages]);
    }

    public function index(pages $pages){
        return view('admin.pages.category.list', ['page'=>$pages]);
    }
    public function store(Request $request, pages $pages){
        $title=$request->title;
        $show_in_home=$request->show_in_home;
        $path = null;
        $cat_id = intro_category::insertGetId([
            'title'=>$title,
            'user_id'=>Auth::id(),
            'page_id'=>$pages->id,
            'show_in_home'=>$show_in_home?1:0,
            'main_image'=>$path,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return response()->json(['title'=>$title,'show_in_home'=>$show_in_home , 'id'=>$cat_id]);
    }

    public function selectCats(pages $pages){
//        $page = $pages->load(['introCats'=>function($query){
//            $query->where('title', "!=", 'بدون دسته بندی')->get();
//        }]);
        $page = $pages->introCats()->where('title', '!=', 'بدون دسته بندی')->get();
//        $page = $pages->introCats;
        Log::info($page);
        return response()->json($page);
    }

    public function edit(intro_category $intro_category){
        return view('admin.pages.category.edit', ['category'=>$intro_category]);
    }

    public function update(Request $request){
        $category = intro_category::find($request->update_id_cat);
        $category->title = $request->update_title_cat;
        $category->show_in_home = $request->update_show_in_home_cat;
//        if(isset($request->main_image)){
//            $category->main_image && Storage::disk('public')->delete($category->main_image);
//            $name = $request->main_image->getClientOriginalName();
//            $fullName = time()."_".$name;
//            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
//            $category->main_image = $path;
//        }
        $category->save();
        return response()->json($category);
//        return to_route('introCat.list', [$category->page->id]);
    }

    public function delete(Request $request){
//        return response()->json($request->all());
        $category = intro_category::find($request->category_id);
        $data = intro_category::where('title', 'بدون دسته بندی')->where('page_id', $category->page->id)->first();
        foreach($category->products as $product){
            if(count($product->categories)>1){
                intro_pro_cat::where('intro_product_id', $product->id)->where('intro_category_id', $category->id)->delete();
            }
            if(count($product->categories)==1){
                $proCat = intro_pro_cat::where('intro_product_id', $product->id)->where('intro_category_id', $category->id)->first();
                $proCat->intro_category_id = $data->id;
                $proCat->save();
            }
        }
        isset($category->main_image) && Storage::disk('public')->delete($category->main_image);
        $category->delete();
        return response()->json('ok');
//        return redirect()->back();
    }

    public function products(intro_category $intro_category){
        return view('client.link.product.list', ['introCat'=>$intro_category]);
    }

    public function deleteAll(Request $request){
        if(!isset($request->categories)){
            return redirect()->back();
        }
        foreach ($request->categories as $category_id) {
            $category = intro_category::find($category_id);
            $data = intro_category::where('title', 'بدون دسته بندی')->where('page_id', $category->page->id)->first();
            foreach($category->products as $product){
                if(count($product->categories)>1){
                    intro_pro_cat::where('intro_product_id', $product->id)->where('intro_category_id', $category->id)->delete();
                }
                if(count($product->categories)==1){
                    intro_pro_cat::where('intro_product_id', $product->id)->where('intro_category_id', $category->id)->update(['intro_category_id'=>$data->id]);
                }
            }
            isset($category->main_image) && Storage::disk('public')->delete($category->main_image);
//            intro_pro_cat::where('intro_category_id', $category_id)->delete();
            $category->delete();
        }
        return redirect()->back();
    }
}
