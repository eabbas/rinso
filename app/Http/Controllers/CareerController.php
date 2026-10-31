<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\careerCategory;
use App\Models\menu_item;
use App\Models\province_cities;
use App\Models\qr_code;
use App\Models\role_user;
use App\Models\role;
use App\Models\User;
use App\Models\menu;
use App\Models\menu_category;
use App\Models\order;
use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;
use Hekmatinasser\Verta\Verta;
use Log;

class CareerController extends Controller
{
    public function create(User $user = null)
    {
        $careerCategories = careerCategory::all();
        $provinces = province_cities::where('parent', 0)->get();
        $cities = province_cities::where('parent', 1)->get();
        if (!$user) {
            $user = Auth::user();
        }
   
        $userRoles = role_user::where('user_id', $user->id)->get();
        $userRoleIds = $userRoles->pluck('role_id')->toArray();
        return view('admin.careers.create', ['user' => $user, 'careerCategories' => $careerCategories, 'provinces' => $provinces, 'cities' => $cities, 'userRoleIds'=>$userRoleIds]);
    }

    public function createRestaurant(User $user = null, pages $page)
    {

        $careerCategories = careerCategory::all();
        if (!$user) {
            $user = Auth::user();
        }
        return view('admin.careers.createRestaurant', ['user' => $user, 'careerCategories' => $careerCategories, 'page' => $page]);
    }

    public function store(Request $request)
    {
        $user = user::find($request->user_id);
        $page_id = 0;
        $path = null;
        $bannerPath = null;
        $ids = Auth::user()->role->pluck('id')->toArray();
        if (!in_array(2, $ids)) {
            role_user::create([
                'user_id' => $request->user_id,
                'role_id' => 2
            ]);
        }
        if (isset($request->logo)) {
            $name = $request->logo->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('logo')->storeAs('files', $fullName, 'public');
        }
        if (isset($request->banner)) {
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        }
        if (count($user->pages) == 0) {
            $page_id = pages::insertGetId([
                'title' => $request->title,
                'subTitle' => "",
                'description' => $request->description,
                'user_id' => $request->user_id,
                'logo_path' => $path,
                'cover_path' => $bannerPath,
            ]);
        }
        if (count($user->pages) > 0) {
            $page_id = $user->pages[0]->id;
        }
        if (isset($request->page_id)) {
            $page_id = $request->page_id;
        }
        $social_medias = json_encode($request->social_medias);
        $career_id = career::insertGetId([
            'title' => $request->title,
            'logo' => $path,
            'city_id' => $request->city,
            'address' => $request->address,
            'social_media' => $social_medias,
            'user_id' => $request->user_id,
            'email' => $request->email,
            'phone' => isset($request->phone) ? $request->phone : null,
            'description' => $request->description,
            'career_category_id' => $request->careerCategory,
            'banner' => $bannerPath,
            'qr_count' => $request->qr_count ? $request->qr_count : 0,
            'page_id' => $page_id,
            'show_in_home'=> isset($request->show_in_home) ? 1 : 0,
            'active'=> isset($request->active) ? 1 : 0
        ]);
        $counter = 1;
        for ($i = 0; $i < $request->qr_count; $i++) {
            $random = Str::random(10);
            $link = url('/')."/qrcode/$career_id/" . $random;
            $qr_svg = QrCode::size(100)->generate($link);
            $fileName = 'qrcodes/' . $career_id . '_' . $random . '.svg';
            Storage::disk('public')->put($fileName, $qr_svg);
            qr_code::create([
                'qr_path' => $fileName,
                'career_id' => $career_id,
                'page_path' => 'qrcode/' . $career_id . '/' . $random,
                'slug' => $random,
                'description'=>'میز '.$counter,
                'user_id' => $request->user_id
            ]);
            $counter++;
        }
        
        //    menu create
        $menu_id = menu::insertGetId([
            'title' => 'منو 1',
            'subtitle' => null,
            'banner' => null,
            'career_id' => $career_id,
            'user_id' => $request->user_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // menu category create
        // $menu_cat_id = menu_category::insertGetId([
        //     'title'=>'بدون دسته بندی',
        //     'description'=>'آیتم هایی که زیر مجموعه دسته ای نباشند در این دسته قرار میگیرند',
        //     'image'=>null,
        //     'menu_id'=>$menu_id,
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);

        // menu item create
        menu_item::insertGetId([
            'title' => 'آیتم 1',
            'description' => null,
            'price' => 0,
            'discount' => 0,
            'customizable' => 0,
            'image' => null,
            'parent_id' => 0,
            'menu_id' => $menu_id,
            'duration' => 0,
            'max_unit' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if (isset($request->page_id)) {
            $career = career::find($career_id);
            return response()->json($career);
            //  return to_route('career.showWithMenu', [$career_id]);
        }
        return to_route('career.careers', ['user' => $request->user_id]);
    }


    public function showWithMenu(career $career)
    {
        // dd($career->menu_items);
        $menus = $career->menus;
        foreach ($menus as $menu) {
            foreach ($menu->menu_items as $item) {
                    if($item->discount != 0){
                        $campare = $item->price - $item->discount;
                        $x = $campare / $item->price;
                        $item['percent'] = intval($x * 100);
                    }
            }
        }
        $firstMenu = menu::where('career_id', $career->id)->first();
        return view('admin.careers.showWithMenu', ['career' => $career, 'firstMenu'=>$firstMenu]);
    }

    public function user_careers(user $user = null)
    {
        if (!$user) {
            $user = Auth::user();
        }
        foreach($user->careers as $career) {
            $createdAt = explode(' ', $career->created_at);
            $date =  verta($createdAt[0]);
            $date = explode(' ', $date);
            $originaDate = implode('/',explode('-', $date[0]));
            $date = $originaDate;
            $career->date = $date;
            $career->orders = order::where('career_id', $career->id)->whereNotIn('order_status_id', [5, 6])->get();
        }
        return view('admin.careers.userCareers', ['user' => $user]);
    }

    public function edit(career $career, User $user = null)
    {
        $provinces = province_cities::where('parent', 0)->get();
        $cities = province_cities::where('parent', 1)->get();
        if(isset($career->province_city)){
            $provinces = province_cities::where('parent', 0)->get();
            $cities = province_cities::where('parent', $career->province_city->province->id)->get();
        }
        if (!$user) {
            $user = Auth::user();
        }
        $careerCategories = careerCategory::all();
        $career->social_media = json_decode($career->social_media);
        return view('admin.careers.edit', ['career' => $career, 'user' => $user, 'careerCategories' => $careerCategories, 'provinces' => $provinces, 'cities' => $cities]);
    }

    public function update(Request $request)
    {
        $career = career::find($request->id);
        $logoPath = null;
        $bannerPath = null;
        if (isset($request->logo)) {
            if ($career->logo) {
                Storage::disk('public')->delete($career->logo);
            }
            $logoName = $request->logo->getClientOriginalName();
            $fullLogoName = Str::uuid() . '_' . $logoName;
            $logoPath = $request->file('logo')->storeAs('files', $fullLogoName, 'public');
            $career->logo = $logoPath;
        }
        if (isset($request->banner)) {
            if ($career->banner) {
                Storage::disk('public')->delete($career->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
            $career->banner = $bannerPath;
        }
        $career->social_media = json_encode($request->social_medias);
        $career->city_id = $request->city;
        $career->title = $request->title;
        $career->address = $request->address;
        $career->description = $request->description;
        $career->email = $request->email;
        $career->phone = $request->phone;
        $career->user_id = $request->user_id;
        $career->show_in_home = $request->show_in_home ? 1 : 0;
        $career->active= $request->active ? 1 : 0;
        $career->career_category_id = $request->careerCategory;
        if ($request->qr_count) {
            if ((int)$request->qr_count > $career->qr_count) {
                $qr_count = (int)$request->qr_count - $career->qr_count;
                $counter = 1;
                while ($qr_count) {
                    $random = Str::random(10);
                    $link = url('/')."/digital-menu/$career->id/" . $random;
                    $qr_svg = QrCode::size(100)->generate($link);
                    $fileName = 'qrcodes/' . $career->id . '_' . $random . '.svg';
                    Storage::disk('public')->put($fileName, $qr_svg);
                    qr_code::create([
                        'qr_path' => $fileName,
                        'career_id' => $career->id,
                        'page_path' => 'qrcode/' . $career->id . '/' . $random,
                        'slug' => $random,
                        'description'=>'میز '.$counter,
                        'user_id' => Auth::id()
                    ]);
                    $qr_count--;
                    $counter++;
                }
            }
        }
        $career->qr_count = $request->qr_count;
        $career->save();
        return to_route('career.careers');
        // return redirect(url()->previous());
    }

    public function delete(career $career)
    {
        if (count($career->qr_codes)) {
            foreach ($career->qr_codes as $qr_code) {
                $qr_code->delete();
            }
        }
        if (count($career->menus)) {
            foreach ($career->menus as $menu) {
                // if (count($menu->menu_categories)) {
                    // foreach ($menu->menu_categories as $category) {
                        if (count($menu->menu_items)) {
                            foreach ($menu->menu_items as $item) {
                                if (count($item->ingredients)) {
                                    foreach ($item->ingredients as $ingredients) {
                                         if ($ingredients->image) {
                                        Storage::disk('public')->delete($ingredients->image);
                                        }
                                        $ingredients->delete();
                                    }
                                }
                                 if ($item->image) {
                                Storage::disk('public')->delete($item->image);
                                }
                                $item->delete();
                            }
                        // }
                        // if ($category->image) {
                        // Storage::disk('public')->delete($category->image);
                        // }
                        // $category->delete();
                    }
                // }
                 if ($menu->banner) {
                Storage::disk('public')->delete($menu->banner);
                }
                $menu->delete();
            }
        }
         if ($career->logo) {
          Storage::disk('public')->delete($career->logo);
            }
         if ($career->banner) {
          Storage::disk('public')->delete($career->banner);
            }
        $career->delete();
        return redirect()->back();
    }

    public function index()
    {
        $careers = career::all();

        return view('admin.careers.index', ['careers' => $careers]);
    }

    public function single(career $career)
    {
        return view('admin.careers.single', ['career' => $career]);
    }

    public function menus(career $career)
    {
//         return view('admin.careers.menuList', ['career' => $career]);
        $menus = $career->menus;
        return response()->json($menus);
        
    }

    public function qr_codes(career $career)
    {
        return view('admin.careers.qrcodes', ['career' => $career]);
    }

    public function deleteAll(Request $request)
    {
        if (!isset($request->careers)) {
            return redirect()->back();
        }
        foreach ($request->careers as $career_id) {
            $career = career::find($career_id);
            if (count($career->qr_codes)) {
                foreach ($career->qr_codes as $qr_code) {
                    $qr_code->delete();
                }
            }
            if (count($career->menus)) {
                foreach ($career->menus as $menu) {
                    if (count($menu->menu_categories)) {
                        foreach ($menu->menu_categories as $category) {
                            if (count($category->menu_items)) {
                                foreach ($category->menu_items as $item) {
                                    if (count($item->ingredients)) {
                                        foreach ($item->ingredients as $ingredients) {
                                              if ($ingredients->image) {
                                                Storage::disk('public')->delete($ingredients->image);
                                                }
                                            $ingredients->delete();
                                        }
                                    }
                                    if ($item->image) {
                                    Storage::disk('public')->delete($item->image);
                                    }
                                    $item->delete();
                                }
                            }
                             if ($category->image) {
                             Storage::disk('public')->delete($category->image);
                            }
                            $category->delete();
                        }
                    }
                     if ($menu->banner) {
                     Storage::disk('public')->delete($menu->banner);
                    }
                    $menu->delete();
                }
            }
        if ($career->logo) {
          Storage::disk('public')->delete($career->logo);
            }
         if ($career->banner) {
          Storage::disk('public')->delete($career->banner);
            }
            $career->delete();
        }
        return redirect()->back();
    }

    public function careersCategories()
    {
        $careerCategories = careerCategory::all();
        return view('client.career.careersCategories', ['careerCategories' => $careerCategories]);
    }

    public function careersList()
    {
        $careers = career::all();
        return view('client.career.careersList', ['careers' => $careers]);
    }

    public function categoryCareers(careerCategory $careerCategory)
    {
        return view('client.career.categoryCareers', ['careerCategory' => $careerCategory]);
    }

    public function orders(career $career)
    {

        $career->load(['orders'=>function ($query){
            $query->orderBy('created_at' , 'desc')->get();
        }]);
        
        foreach($career->orders as $order) {
            $createdAt = explode(' ', $order->created_at);
            $time = $createdAt[1];
            $date =  verta($createdAt[0]);
            $date = explode(' ', $date);
            $originalDate = implode('/',explode('-', $date[0]));
            $date = $originalDate;
            $order->time = $time;
            $order->date = $date;
            
        }

        return view('admin.careers.orders', ['career' => $career]);
    }

    public function createUser()
    {
        return view('admin.careers.createUser');
    }

    public function storeUser(Request $request)
    {
        $password = Hash::make($request->password);
        $user_id = User::insertGetId([
            'name' => $request->name,
            'family' => $request->family,
            'phoneNumber' => $request->phoneNumber,
            'password' => $password,
            'parent_id' => Auth::id()
        ]);
        role_user::create([
            'role_id' => 3,
            'user_id' => $user_id
        ]);
        return to_route('career.create', [$user_id]);
    }
}
