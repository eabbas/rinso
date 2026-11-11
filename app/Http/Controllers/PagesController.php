<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\site_link;
use App\Models\social_address;
use App\Models\social_qr_codes;
use App\Models\FAQ;
use App\Models\page_blocks;
use App\Models\socialMedia;
use App\Models\page_contactus;
use App\Models\page_category;
use App\Models\intro_category;
use App\Models\intro_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class pagesController extends Controller
{
    public function validator(){
        return [
            'user_name' => ['required', 'string', 'max:191'],
            'title' => ['required', 'string', 'max:191'],
            'subTitle' => ['nullable', 'string', 'max:191'],
            'category_id' => ['required', 'integer', 'exists:page_categories,id'],
            'description' => ['nullable', 'string'],
            'active' => ['nullable', 'boolean'],
            'show_in_home' => ['nullable', 'boolean'],
            'logo_path' => ['nullable', 'image', 'max:2048'],
            'cover_path' => ['nullable', 'image', 'max:2048'],
        ];
    }
    public function messages(){
        return [
            'user_name.required'=> 'نام کاربری الزامی است',
            'user_name.string'=> 'استفاده از کاراکتر غیرمجاز',
            'user_name.max'=> 'تعداد کاراکتر ها باید کمتر از 191 عدد باشد',
            'title.required'=> 'عنوان الزامی است',
            'title.string'=> 'استفاده از کاراکتر غیرمجاز',
            'title.max'=> 'تعداد کاراکتر ها باید کمتر از 191 عدد باشد',
            'description.string'=> 'استفاده از کاراکتر غیرمجاز',
            'logo_path.image'=> 'لوگو باید تصویر باشد',
            'logo_path.max'=> 'حجم تصویر نباید بیشتر از 2 مگابایت باشد',
            'cover_path.image'=> 'کاور باید تصویر باشد',
            'cover_path.max'=> 'حجم تصویر نباید بیشتر از 2 مگابایت باشد',
        ];
    }
    public function create()
    {
        $categories = page_category::all();
        return view('admin.pages.create', ['categories'=>$categories]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate($this->validator(), $this->messages());
        $logoPath = null;
        $coverPath = null;
        if (isset($validated['logo_path'])) {
            $logoName = time() . '_' . $validated['logo_path']->getClientOriginalName();
            $logoPath = $validated['logo_path']->storeAs('logo_page', $logoName, 'public');
        }
        if (isset($validated['cover_path'])) {
            $pageName = time() . '_' . $validated['cover_path']->getClientOriginalName();
            $coverPath = $validated['cover_path']->storeAs('logo_page', $pageName, 'public');
        }
        $page_id = pages::insertGetId([
            'user_name'=>$validated['user_name'],
            'title' => $validated['title'],
            'subTitle' => $validated['subTitle'] ? $validated['subTitle'] : null,
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
            'logo_path' => $logoPath,
            'cover_path' => $coverPath,
            'show_in_home'=> isset($validated['show_in_home']) ? 1 : 0,
            'active'=> isset($validated['active']) ? 1 : 0
        ]);

        $page = pages::find($page_id);
        $link = url('/')."/" . $page->user_name;
        $qr_svg = QrCode::size(100)->generate($link);
        $fileName = 'qrcodes/' . $page->user_name . '.svg';
        Storage::disk('public')->put($fileName, $qr_svg);
        social_qr_codes::create([
            'qr_path' => $fileName,
            'page_id' => $page_id,
            'page_path' => '/' . $page->user_name,
            'slug'=>$page->user_name
        ]);

        
        intro_category::create([
            'title'=>'بدون دسته بندی',
            'user_id' => Auth::id(),
            'page_id' => $page_id,
        ]);
        return to_route('pages.social_list');
    }
    public function social_list()
    {
        return view('admin.pages.social_list');
    }
    public function index()
    {
        $pages = pages::all();
        return view('admin.pages.index', ['pages' => $pages]);
    }
    public function edit(pages $pages)
    {
        return view('admin.pages.edit', ['pages' => $pages]);
    }
    public function update(Request $request)
    {
        $pages = pages::find($request->id);
        if (isset($request->logo_path)) {
            if ($pages->logo_path) {
                Storage::disk('public')->delete($pages->logo_path);
            }
            $logoName = $request->logo_path->getClientOriginalName();
            $fullLogoName = time()."_".$logoName;
            $logoPath = $request->logo_path->storeAs('logo_page', $fullLogoName, 'public');
            $pages->logo_path = $logoPath;
        }
        if (isset($request->cover_path)) {
            if ($pages->cover_path) {
                Storage::disk('public')->delete($pages->cover_path);
            }
            $pageName = $request->cover_path->getClientOriginalName();
            $fullCoverName = time()."_".$pageName;
            $coverPath = $request->cover_path->storeAs('logo_page', $fullCoverName, 'public');
            $pages->cover_path = $coverPath;
        }
        $pages->user_name = $request->user_name;
        $pages->title = $request->title;
        $pages->subTitle = $request->subTitle;
        $pages->description = $request->description;
        $pages->show_in_home = $request->show_in_home ? 1 : 0;
        $pages->active= $request->active ? 1 : 0;
        $pages->save();
        if (Auth::user()->role[0]->title == 'admin') {
            return to_route('pages.list');
        }
        return to_route('pages.social_list');
    }
    public function delete(pages $pages)
    {
        $socialAddresses = social_address::where('page_id', $pages->id)->get();
        $site_links = site_link::where('page_id', $pages->id)->get();
        $faqs = FAQ::where('page_id', $pages->id)->get();
        $page_blocks = page_blocks::where('page_id', $pages->id)->get();
        $page_contactuses = page_contactus::where('page_id', $pages->id)->get();
        $introCats = intro_category::where('page_id', $pages->id)->get();
        $introPros = intro_product::where('page_id', $pages->id)->get();
        //   dd($introPros);
        foreach ($socialAddresses as $address) {
            $address->delete();
        }
        foreach ($site_links as $site_link) {
            $site_link->delete();
        }
         foreach ($faqs as $faq) {
              $faq->delete();
        }
        foreach ($page_blocks as $page_block) {
              $page_block->delete();
        }
        foreach ($page_contactuses as $page_contactus) {
              $page_contactus->delete();
        }
           foreach ($introCats as $introCat) {
                 if ($introCat->main_image) {
                    Storage::disk('public')->delete($introCat->main_image);
                    }
                $introCat->delete();
            }
            foreach ($introPros as $introPro) {
                 if ($introPro->main_image) {
                    Storage::disk('public')->delete($introPro->main_image);
                    }
                $introPro->delete();
            }
        // dd($pages->social_qr_codes);
        if($pages->social_qr_codes){
        $pages->social_qr_codes->delete();
        }
         if ($pages->logo_path) {
                    Storage::disk('public')->delete($pages->logo_path);
                    }
      if ($pages->cover_path) {
      Storage::disk('public')->delete($pages->cover_path);
        }
        $pages->delete();
        return redirect()->back();
//        if (Auth::user()->role[0]->title == 'admin') {
//            return to_route('pages.list');
//        }
//        return to_route('pages.social_list');
    }
    public function single(pages $pages)
    {
        $socialMedias = socialMedia::all();
        $introCats = $pages->introCats()->where('title', '!=', 'بدون دسته بندی')->get();
        $introPros = $pages->introPros;
        // dd($introCats);
//        $data = intro_category::find(13);
//        $data->with('products')->get();
//        dd($data);
        
        return view('admin.pages.single', ['page' => $pages, 'socialMedias' => $socialMedias, 'introCats' => $introCats, 'introPros' => $introPros]);
    }
    public function deleteAll(Request $request)
    {
        foreach ($request->pages as $page_id) {
            $page = pages::find($page_id);
            $socialAddresses = social_address::where('page_id', $page->id)->get();
            $site_links = site_link::where('page_id', $page->id)->get();
            $faqs = FAQ::where('page_id', $page->id)->get();
            $page_blocks = page_blocks::where('page_id', $page->id)->get();
            $page_contactuses = page_contactus::where('page_id', $page->id)->get();
            $introCats = intro_category::where('page_id', $page->id)->get();
            $introPros = intro_product::where('page_id', $page->id)->get();
            // dd($introPros);
            foreach ($socialAddresses as $address) {
                $address->delete();
            }
            foreach ($site_links as $site_link) {
                $site_link->delete();
            }
            foreach ($faqs as $faq) {
                $faq->delete();
            }
            foreach ($page_blocks as $page_block) {
                $page_block->delete();
            }
            foreach ($introCats as $introCat) {
                 if ($introCat->main_image) {
                    Storage::disk('public')->delete($introCat->main_image);
                    }
                $introCat->delete();
            }
            foreach ($introPros as $introPro) {
                 if ($introPro->main_image) {
                    Storage::disk('public')->delete($introPro->main_image);
                    }
                $introPro->delete();
            }
            if($page->social_qr_codes){
            $page->social_qr_codes->delete();
            }
            foreach ($page_contactuses as $page_contactus) {
              $page_contactus->delete();
            }
              if ($page->logo_path) {
                    Storage::disk('public')->delete($page->logo_path);
                    }
              if ($page->cover_path) {
                    Storage::disk('public')->delete($page->cover_path);
                    }
            $page->delete();
        }
        return redirect()->back();
    }
    public function introCats(pages $pages){
        $pages = $pages->load(['introCats'=> function($query){
            $query->where('title', "!=", 'بدون دسته بندی')->get();
        }]);
        return view('client.link.introCats', ['page' => $pages]);
    }
    public function adminIntroCats(pages $pages){
        return view('admin.pages.introCats', ['page' => $pages]);
    }
    public function proList(pages $pages){
        return view('admin.pages.product.list', ['page' => $pages]);
    }
    public function products(pages $pages){
        $pages = $pages->load(['introCats'=> function($query){
            $query->where('title', "!=", 'بدون دسته بندی')->get();
        }]);
        return view('client.link.product.allProducts', ['page' => $pages]);
    }
    // public function editInfo(Request $request){
    //     $page = pages::find($request->page_id);
    //     if ($request->state == "title") {
    //         $page->title = $request->inputValue;
    //     }
    //     if ($request->state == "subtitle") {
    //         $page->subTitle = $request->inputValue;
    //     }
    //     $page->save();
    //     return response()->json('ok');
    // }
    public function saveAll(Request $request)
    {
        
        $page = Pages::find($request->page_id);

            if ($request->has('titleInput') && $request->titleInput != 'null' && $request->titleInput != '') {
                $page->title = $request->titleInput;
            }
            if ($request->has('subTitleInput') && $request->subTitleInput != 'null' && $request->subTitleInput != '') {
                $page->subTitle = $request->subTitleInput;
            }


            if ($request->hasFile('cover_image')) {
                $coverImage = $request->file('cover_image');
                $coverName = time() . '_cover_' . uniqid() . '.' . $coverImage->getClientOriginalExtension();
                $coverPath = $coverImage->storeAs('covers', $coverName, 'public');
                $page->cover_path = $coverPath;
            }


            if ($request->hasFile('logo_image')) {
                $logoImage = $request->file('logo_image');
                $logoName = time() . '_logo_' . uniqid() . '.' . $logoImage->getClientOriginalExtension();
                $logoPath = $logoImage->storeAs('logos', $logoName, 'public');
                $page->logo_path = $logoPath;
            }

            $page->save();

            return response()->json($page);


    }
    public function checkUserName(Request $request){
        $letter = $request->input('letter');
        $pages = pages::where('user_name', $letter)->get();
        $flag = true;
        if(count($pages)>0){
            $flag = false;
        }
        return response()->json(['flag'=>$flag]);
    }

    public function checkUserNameFromEdit(Request $request){
        $letter = $request->input('letter');
        $pageId = $request->input('pageId');
        $pages = pages::where('user_name', $letter)->whereNot('id', $pageId)->get();
        $flag = true;
        if(count($pages)>0){
            $flag = false;
        }
        return response()->json(['flag'=>$flag]);
    }
}
