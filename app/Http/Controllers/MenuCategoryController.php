<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\menu;
use App\Models\menu_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuCategoryController extends Controller
{
    public function create(menu $menu)
    {
        return view('admin.menu.category.create', ['menu' => $menu]);
    }

    public function store(Request $request)
    {
        $menuCats = $request->menuCat;
        foreach ($menuCats as $key => $menuCat) {
            if (isset($menuCat['image'])) {
                $name = $menuCat['image']->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $path = $menuCat['image']->storeAs('images', $fullName, 'public');
                $menuCats[$key]['image'] = $path;
            }
            if (!isset($menuCat['image'])) {
                $menuCats[$key]['image'] = null;
            }
            $menuCats[$key]['menu_id'] = $request->menu_id;
        }
        menu_category::insert($menuCats);
        return to_route('menuCat.list', [$request->menu_id]);
    }

    public function storeFront(Request $request)
    {
        $path = null;
        if (isset($request->image)) {
            $name = $request->image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        $category = menu_category::create([
            'title' => $request->title,
            'image' => $path,
            'description' => isset($request->description) ? $request->description : null,
            'menu_id' => $request->menu_id
        ]);
        return response()->json($category);
    }

    public function updateFront(Request $request)
    {
        //        return response()->json(555);
        $path = null;
        if (isset($request->image)) {
            $name = $request->image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        $category = menu_category::find($request->category_id);
        $category->title = $request->title;
        if (isset($request->menu_id)) {
            $category->menu_id = $request->menu_id;
        }
        $category->description = isset($request->description) ? $request->description : null;
        $category->image = $path;
        $category->save();
        return response()->json($category);
    }

    public function deleteFront(menu_category $category)
    {
        $ids = [];
        $ids[] = $category->menu_items()->pluck('id')->toArray();
        $category['menu_item_ids'] = $ids;
        $data = $category;
        if (count($category->menu_items)) {
            foreach ($category->menu_items as $menu_item) {
                if (count($menu_item->ingredients)) {
                    foreach ($menu_item->ingredients as $ingredient) {
                        if ($ingredient->image) {
                            Storage::disk('public')->delete($ingredient->image);
                        }
                        $ingredient->delete();
                    }
                }
                if (count($menu_item->menu_custom_ingredients)) {
                    foreach ($menu_item->menu_custom_ingredients as $menu_custom_ingredient) {
                        if ($menu_custom_ingredient->image) {
                            Storage::disk('public')->delete($menu_custom_ingredient->image);
                        }
                        $menu_custom_ingredient->delete();
                    }
                }
                if ($menu_item->image) {
                    Storage::disk('public')->delete($menu_item->image);
                }
                $menu_item->delete();
            }
        }
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return response()->json($data);
    }

    public function deleteFrontWithoutItems(menu_category $category){
        $withoutCat = menu_category::where('menu_id', $category->menu_id)->where('title', 'بدون دسته بندی')->first();
        foreach($category->menu_items as $item){
            $item->update(['menu_category_id'=>$withoutCat->id]);
        }
        $ids = [];
        $ids[] = $category->menu_items()->pluck('id')->toArray();
        $category['menu_item_ids'] = $ids;
        $data = $category;
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return response()->json(['category'=>$data, 'withoutCatId'=>$withoutCat->id]);
    }

    public function items(menu_category $category)
    {
        $items = $category->menu_items;

        foreach ($category->menu_items as $item) {
            if ($item->discount != 0) {
                $campare = $item->price - $item->discount;
                $x = $campare / $item->price;
                $item['percent'] = intval($x * 100);
            }
        }
        return response()->json($items);
    }

    public function clientItems(menu_category $category)
    {
        $items = $category->menu_items;

        foreach ($category->menu_items as $item) {
            if ($item->discount != 0) {
                $campare = $item->price - $item->discount;
                $x = $campare / $item->price;
                $item['percent'] = intval($x * 100);
            }
            $item['cart'] = cart::where('user_id', Auth::id())->where('order_id', null)->where('menu_item_id', $item->id)->where('career_id', $category->menu->career->id)->first();
        }
        return response()->json($items);
    }

    public function index(menu $menu)
    {
        return view('admin.menu.category.index', ['menu' => $menu]);
    }

    public function editFront(menu_category $category)
    {
        return response()->json($category);
    }

    public function edit(menu_category $menu_category)
    {
        return view('admin.menu.category.edit', ['category' => $menu_category]);
    }

    public function update(Request $request)
    {
        $menu_cat = menu_category::find($request->id);
        $menu_cat->title = $request->title;
        $menu_cat->description = $request->description;
        $menu_cat->menu_id = $request->menu_id;
        if (isset($request->image)) {
            if ($menu_cat->image) {
                Storage::disk('public')->delete($menu_cat->image);
            }
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('image')->storeAs('image', $fullName, 'public');
            $menu_cat->image = $path;
        }
        $menu_cat->save();
        return to_route('menuCat.list', [$request->menu_id]);
    }

    public function delete(menu_category $menu_category)
    {
        $menu_id = $menu_category->menu->id;
        if (count($menu_category->menu_items)) {
            foreach ($menu_category->menu_items as $menu_item) {
                if (count($menu_item->ingredients)) {
                    foreach ($menu_item->ingredients as $ingredient) {
                        $ingredient->delete();
                    }
                }
                if (count($menu_item->menu_custom_ingredients)) {
                    foreach ($menu_item->menu_custom_ingredients as $menu_custom_ingredient) {
                        $menu_custom_ingredient->delete();
                    }
                }
                $menu_item->delete();
            }
        }
        $menu_category->delete();
        return to_route('menuCat.list', [$menu_id]);
    }

    public function deleteAll(Request $request)
    {
        if (!isset($request->menuCats)) {
            return redirect()->back();
        }
        foreach ($request->menuCats as $menuCat_id) {
            $menu_category = menu_category::find($menuCat_id);
            $menu_id = $menu_category->menu->id;
            if (count($menu_category->menu_items)) {
                foreach ($menu_category->menu_items as $menu_item) {
                    if (count($menu_item->ingredients)) {
                        foreach ($menu_item->ingredients as $ingredient) {
                            $ingredient->delete();
                        }
                    }
                    if (count($menu_item->menu_custom_ingredients)) {
                        foreach ($menu_item->menu_custom_ingredients as $menu_custom_ingredient) {
                            $menu_custom_ingredient->delete();
                        }
                    }
                    $menu_item->delete();
                }
            }
            $menu_category->delete();
        }
        return redirect()->back();
    }

    // public function menu(career $career){
    //     return view('admin.menu.menu', ['career'=>$career]);
    // }
}
