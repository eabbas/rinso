<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\ecomm_category;
use App\Models\ecomm_product_ecomm_category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EcommCategoryController extends Controller
{
    public function create()
    {
        return view('admin.ecomm_categories.create', ['user' => Auth::user()]);
    }

    public function store(Request $request)
    {
        $path = null;
        if(isset($request->image_path)){
            $name = $request->image_path->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->image_path->storeAs('files', $fullName, 'public');
        }

        ecomm_category::create([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'show_in_home' => isset($request->show_in_home)?1:0,
            'image_path' => $path,
            'ecomm_id' => $request->ecomm_id,
            'user_id' => Auth::id()
        ]);

//        $ecomm_categories = ecomm_category::with('parent')->get();
//        dd($request->all());

//        return to_route('ecomm_category.index', ['ecomm_categories' => $ecomm_categories]);
        return to_route('ecomm_category.index');
    }

    // public function index(){
    //     $ecomm_categories = ecomm_category::with('parent')->get();
    //     return to_route('ecomm_category.index', ['ecomm_categories' => $ecomm_categories]);
    // }

    public function index()
    {
//        $x = Auth::user()->load(['ecomms'=>function($query){
//            $query->with('ecomm_category')->get();
//        }]);
        $x = Auth::user()->load(['ecomm_categories'=>function($query){
            $query->where('parent_id', 0)->with('children')->get();
        }]);
//        dd($x);
        return view('admin.ecomm_categories.index', ['user' =>Auth::user()]);
    }

    public function show(ecomm_category $ecomm_category)
    {
        $ecomm_category->parent;
        return view('admin.ecomm_categories.show', ['ecomm_category' => $ecomm_category]);
    }

    public function edit(ecomm_category $ecomm_category)
    {
        $ecomm = ecomm::find($ecomm_category->ecomm_id);
        return view('admin.ecomm_categories.edit', ['ecomm_category' => $ecomm_category, 'user' => Auth::user(), 'ecomm' => $ecomm]);
    }

    public function edit_ecomm_categories(ecomm_category $ecomm_category)
    {
        return view('admin.ecomm_categories.edit_ecomm_categories', ['ecomm_category' => $ecomm_category, 'ecomm' => $ecomm_category->ecomm]);
    }

    public function update(Request $request)
    {
        $ecomm_category = ecomm_category::find($request->id);
        if ($request->image_path) {
            if ($ecomm_category->image_path) {
                storage::disk('public')->delete($ecomm_category->image_path);
            }
            $name = $request->image_path->getClientOriginalName();
            $path = $request->image_path->storeAs('files', $name, 'public');
            $ecomm_category->image_path = $path;
        }
        $ecomm_category->title = $request->title;
        $ecomm_category->parent_id = $request->parent_id;

        if ($request->show_in_home) {
            $ecomm_category->show_in_home = 1;
        } else {
            $ecomm_category->show_in_home = 0;
        }

        $ecomm_category->description = $request->description;
        $ecomm_category->save();
        $ecomm = ecomm::find($ecomm_category->ecomm_id);
        // return view('admin.ecomm_categories.index', ['user' => Auth::user()]);
        return back();
    }

    public function update_ecomm_categories(Request $request, ecomm_category $ecomm_category)
    {
        if (isset($request->image_path)) {
            storage::disk('public')->delete($ecomm_category->image_path);
            $name = $request->image_path->getClientOriginalName();
            $path = $request->image_path->storeAs('files', $name, 'public');
            $ecomm_category->image_path = $path;
        }
        $ecomm_category->title = $request->title;
        $ecomm_category->parent_id = $request->parent_id;
        $ecomm_category->show_in_home = isset($request->show_in_home)?1:0;
        $ecomm_category->description = $request->description;
        $ecomm_category->save();
        return to_route('ecomm_category.index');
    }

    public function delete(ecomm_category $ecomm_category)
    {
        $ecomm_category->ecomm_products;
        $proCats=ecomm_product_ecomm_category::where('ecomm_category_id',$ecomm_category->id)->get();
        foreach($proCats as $proCat){
            $proCat->ecomm_category_id=$ecomm_category->ecomm->ecomm_category[0]->id;
            $proCat->save();
        }
        $ecomm_category->delete();
        // $ecomm_categories = ecomm_category::with('parent')->get();
        //  if($ecomm_category->ecomm_products){
        //             foreach($ecomm_category->ecomm_products as $ecomm_product){
        //                          $ecomm_product->delete();
        //             }
        //         }

        // return to_route('ecomm_category.index',['ecomm_categories'=>$ecomm_categories]);
        return back();
    }

    public function getEcommCategories(Request $request)
    {
        if ($request->key == 'all') {
            $categories = Auth::user()->ecomm_categories;
        } else {
            $categories = ecomm_category::where('ecomm_id',$request->key)->where('title','!=','بدون دسته بندی')->get();
        }
        return response()->json($categories);
    }

    public function ecomm_categories(ecomm $ecomm)
    {
        return view('admin.ecomm_categories.ecomm_categories', ['ecomm' => $ecomm]);
    }

    public function deleteAll(Request $request){
        if(!isset($request->categories)){
            return redirect()->back();
        }
        foreach($request->categories as $category_id){
            $category = ecomm_category::find($category_id);
            if($category->title != 'بدون دسته بندی'){
                $category->delete();
            }
        }
        return redirect()->back();
    }
}
