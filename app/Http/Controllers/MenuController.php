<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\menu;
use App\Models\menu_category;
use App\Models\menu_item;
use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\item_quantity;
use Hekmatinasser\Verta\Verta;

use function Symfony\Component\Clock\now;

class MenuController extends Controller
{
    public function create(career $career)
    {
        return view('admin.menu.create', ['career' => $career]);
    }

    public function store(Request $request)
    {
        $bannerPath = null;
        if (isset($request->banner)) {
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = time() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        }
        menu::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'banner' => $bannerPath,
            'career_id' => $request->career_id,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('career.menus', [$request->career_id]);
    }

    public function storeFront(Request $request)
    {
        // return response()->json([$request->title, $request->subtitle, $request->banner]);
        $bannerPath = null;
        if ($request->banner) {
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = time() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        }
        $menu = menu::create([
            'title' => $request->input('title'),
            'subtitle' => $request->subtitle ? $request->subtitle : null,
            'banner' => $bannerPath,
            'user_id' => $request->user_id,
            'career_id' => $request->career_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // menu category create
        // $menu_cat_id = menu_category::insertGetId([
        //     'title' => 'بدون دسته بندی',
        //     'description' => 'آیتم هایی که زیر مجموعه دسته ای نباشند در این دسته قرار میگیرند',
        //     'image' => null,
        //     'menu_id' => $menu->id,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // menu item create

        menu_item::create([
            'title' => 'آیتم 1',
            'description' => null,
            'price' => 0,
            'discount' => 0,
            'customizable' => 0,
            'image' => null,
            'parent_id' => 0,
            'menu_id' => $menu->id,
            'duration' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return response()->json($menu);
    }

    public function updateFront(Request $request)
    {
        $menu = menu::find($request->menu_id);
        $menu->title = $request->title;
        $menu->subtitle = $request->subtitle ? $request->subtitle : null;
        if (isset($request->banner)) {
            if ($menu->banner) {
                Storage::disk('public')->delete($menu->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
            $menu->banner = $bannerPath;
        }
        $menu->save();
        return response()->json($menu);
    }

    public function editFront(menu $menu)
    {
        return response()->json($menu);
    }

    public function single(menu $menu)
    {
        return view('admin.menu.single', ['menu' => $menu]);
    }

    public function edit(menu $menu)
    {
        return view('admin.menu.edit', ['menu' => $menu]);
    }

    public function update(Request $request)
    {
        $menu = menu::find($request->id);
        $menu->title = $request->title;
        $menu->subtitle = $request->subtitle;
        $menu->career_id = $request->career_id;
        if (isset($request->banner)) {
            if ($menu->banner) {
                Storage::disk('public')->delete($menu->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
            $menu->banner = $bannerPath;
        }
        $menu->save();
        return to_route('menu.single', [$menu]);
    }

    public function deleteFront(menu $menu, Request $request)
    {
        $allmenu = menu::where('career_id', $request->career_id)->get();
        if (count($allmenu) > 1) {
            // if (count($menu->menu_categories)) {
            // foreach ($menu->menu_categories as $category) {
            // if (count($category->menu_items)) {
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
            //     Storage::disk('public')->delete($category->image);
            // }
            // $category->delete();
            // }
            // }
            if ($menu->banner) {
                Storage::disk('public')->delete($menu->banner);
            }
            $menu->delete();
            return response()->json('ok');
        }
        return response()->json('no');
    }

    public function delete(menu $menu)
    {
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
        if (Auth::user()->role[0]->title == 'admin') {
            return to_route('career.menus', [$menu->career]);
        }
        return to_route('career.careers', [Auth::user()]);
    }

    public function showMenu(menu $menu)
    {
        //        return view('admin.menu.menu', ['menu' => $menu]);
        // $categories = $menu->load(['menu_categories' => function ($query) {
        //     $query->with('menu_items')->get();
        // }]);
        $menus = $menu->load(['menu_items']);
        // foreach ($menu->menu_categories as $category) {
        foreach ($menu->menu_items as $item) {
            if ($item->discount != 0) {
                $campare = $item->price - $item->discount;
                $x = $campare / $item->price;
                $item['percent'] = intval($x * 100);
            }
        }
        // }
        return response()->json($menus);
    }

    public function showMenuClient(menu $menu)
    {
        // return response()->json($menu);
        $menu = $menu->load('menu_items');

        // foreach ($categories->menu_categories as $category) {
        foreach ($menu->menu_items as $item) {
            if ($item->discount != 0) {
                $campare = $item->price - $item->discount;
                $x = $campare / $item->price;
                $item['percent'] = intval($x * 100);
            }
            $item['cart'] = cart::where('user_id', Auth::id())->where('order_id', null)->where('menu_item_id', $item->id)->where('career_id', $menu->career->id)->first();
            $today = explode(' ', Verta::today());
            $today = $today[0];
            $itemQuantity = item_quantity::where('menu_item_id', $item->id)->where('date', $today)->where('quantity', $item->max_unit)->first();
            if ($itemQuantity) {
                $item->outNumber = true;
            }
        }
        // }
        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
            $user->carts;
        }
        return response()->json(['menus' => $menu, 'user' => $user]);
    }

    public function createMenu()
    {
        return view('admin.menu.createMenu');
    }

    public function customProMenu(career $career)
    {
        return view('admin.menu.customProList', ['career' => $career]);
    }

    public function user_menu(User $user)
    {
        return view('admin.menu.userMenu', ['user' => $user]);
    }

    public function deleteAll(Request $request)
    {
        if (!isset($request->menus)) {
            return redirect()->back();
        }
        foreach ($request->menus as $menu_id) {
            $menu = menu::find($menu_id);
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
        return redirect()->back();
    }

    public function showCats(menu $menu)
    {
        return response()->json($menu->menu_categories);
    }
}
