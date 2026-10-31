<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\ecomm_category;
use App\Models\province_cities;
use App\Models\ecomm_qrCode;
use App\Models\role_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EcommController extends Controller
{
    public function create(User $user = null)
    {
//         $provinces = province_cities::where('parent', 0)->get();
        $provinces = province_cities::where('parent', 0)->get();
        $cities = province_cities::where('parent', 1)->get();
        if (!$user) {
            $user = Auth::user();
        }
        return view('admin.ecomms.create', ['user' => $user,'provinces'=>$provinces, 'cities'=>$cities]);
    }

    public function store(Request $request)
    {
        $path = null;
        $bannerPath=null;
        $ids = Auth::user()->role->pluck('id')->toArray();
        if(!in_array(2, $ids)){
            role_user::create([
                'user_id'=>$request->user_id,
                'role_id'=>2
            ]);
        }
        if (isset($request->logo)) {
            $name = $request->logo->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('logo')->storeAs('files', $fullName, 'public');
        }
        if(isset($request->banner)){
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');

        }
        $social_medias = json_encode($request->social_medias);
        $ecomm_id = ecomm::insertGetId([
            'title' => $request->title,
            'logo' => $path,
            'address' => $request->address,
            'social_media' => $social_medias,
            'city_id' => $request->city,
            'user_id' => $request->user_id,
            'email' => $request->email,
            'description' => $request->description,
            'banner' => $bannerPath,
            'show_in_home'=> $request->show_in_home ? 1 : 0,
            'active'=> $request->active ? 1 : 0
        ]);

        $random = Str::random(10);
        $link = "famenu.ir/ecomm_qrCode/$ecomm_id/" . $random;
        $qr_svg = QrCode::size(100)->generate($link);
        $fileName = 'ecomm_qrCodes/' . $ecomm_id . '_' . $random . '.svg';
        Storage::disk('public')->put($fileName, $qr_svg);
        ecomm_qrCode::create([
            'qr_path' => $fileName,
            'ecomm_id' => $ecomm_id,
            'slug' => 'ecomm_qrCode/' . $ecomm_id . '/' . $random,
            'user_id' => Auth::id()
        ]);
        ecomm_category::create(['title' => 'بدون دسته بندی', 'description' => 'محصولات فاقد دسته بندی', 'show_in_home' => 0, 'ecomm_id' => $ecomm_id, 'parent_id' => 0]);

        return to_route('ecomm.ecomms');
    }

    public function user_ecomms()
    {
            return view('admin.ecomms.userEcomms');
        }

    public function edit(ecomm $ecomm)
    {
        // if (!$user) {
        //     $user = Auth::user();
        // }
         $provinces = province_cities::where('parent', 0)->get();
        $cities = province_cities::where('parent', $ecomm->province_city->province->id)->get();
        $ecomm->social_media = json_decode($ecomm->social_media);
        return view('admin.ecomms.edit', ['ecomm' => $ecomm, 'user' => Auth::user(),'provinces'=>$provinces,'cities'=>$cities]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $ecomm = ecomm::find($request->id);
        if (isset($request->logo)) {
            if ($ecomm->logo) {
                Storage::disk('public')->delete($ecomm->logo);
            }
            $logoName = $request->logo->getClientOriginalName();
            $fullLogoName = Str::uuid() . '_' . $logoName;
            $logoPath = $request->file('logo')->storeAs('files', $fullLogoName, 'public');
            $ecomm->logo = $logoPath;
        }
        if ($request->banner) {
            if ($ecomm->banner) {
                Storage::disk('public')->delete($ecomm->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
            $ecomm->banner = $bannerPath;
        }
        $ecomm->social_media = json_encode($request->social_medias);
        $ecomm->city_id = $request->city;
        $ecomm->title = $request->title;
        $ecomm->address = $request->address;
        $ecomm->description = $request->description;
        $ecomm->email = $request->email;
        $ecomm->show_in_home = $request->show_in_home ? 1 : 0;
        $ecomm->active= $request->active ? 1 : 0;
        $ecomm->save();
//        return back();
        return to_route('ecomm.ecomms');
    }

    public function delete(ecomm $ecomm)
    {
//        if ($ecomm->menu) {
//            if ($ecomm->menu->qr_codes) {
//                foreach ($ecomm->menu->qr_codes as $menu) {
//                    // $menu->delete();
//                }
//            }
//            // $ecomm->menu->delete();
//        }
        if (count($ecomm->ecomm_category)) {
            foreach ($ecomm->ecomm_category as $ecomm_category) {
                if (count($ecomm_category->ecomm_products)) {
                    foreach ($ecomm_category->ecomm_products as $ecomm_product) {
                        if($ecomm_product->image_path){
                            Storage::disk('public')->delete($ecomm_product->image_path);
                        }
                        $ecomm_product->delete();
                    }
                }
                if($ecomm_category->image_path){
                    Storage::disk('public')->delete($ecomm_category->image_path);
                }
                $ecomm_category->delete();
            }
        }
        $ecomm->delete();

        return back();
    }

    public function index()
    {
        $ecomms = ecomm::all();
        return view('admin.ecomms.index', ['ecomms' => $ecomms]);
    }

    public function single(ecomm $ecomm)
    {
        return view('admin.ecomms.single', ['ecomm' => $ecomm]);
    }

    public function ecomm_menu(ecomm $ecomm){
        return view('admin.ecomms.ecomm_menu',['ecomm'=>$ecomm]);
    }
    public function ecomm_single_menu(ecomm $ecomm){
        return view('client.ecomm.single',['ecomm'=>$ecomm]);
    }

    public function deleteAll(Request $request){
        if(!isset($request->ecomms)){
            return redirect()->back();
        }
        foreach($request->ecomms as $ecomm_id){
            $ecomm = ecomm::find($ecomm_id);
            if(count($ecomm->ecomm_category)){
                foreach($ecomm->ecomm_category as $category){
                    if($category->image_path){
                        Storage::disk('public')->delete($category->image_path);
                    }
                    $category->delete();
                }
            }
            if(count($ecomm->ecomm_product)){
                foreach($ecomm->ecomm_product as $product){
                    if($product->image_path){
                        Storage::disk('public')->delete($product->image_path);
                    }
                    $product->delete();
                }
            }
            $qr = $ecomm->ecomm_qrCode;
            $qr->delete();
            $ecomm->delete();
        }
        return redirect()->back();
    }
}