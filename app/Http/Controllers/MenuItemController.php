<?php

namespace App\Http\Controllers;

use App\Models\ingredients;
use App\Models\menu_category;
use App\Models\menu_item;
use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuItemController extends Controller
{
    public function create(menu $menu)
    {
        return view('admin.menu.item.create', ['menu' => $menu]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $path = null;
        if (isset($request->image)) {
            $name = $request->image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        $menu_id = menu_item::insertGetId([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => isset($request->discount) ? $request->discount : 0,
            'customizable' => isset($request->customizable) ? $request->customizable : 0,
            'image' => $path,
            'parent_id' => isset($request->parent_id) ? $request->parent_id : 0,
            'menu_category_id' => $request->menu_categories_id,
            'duration' => $request->duration,
            'max_unit'=>$request->max_unit,
        ]);
        $imagePath = null;
        if (isset($request->ingredients)) {
            foreach ($request->ingredients as $ingre) {
                if (isset($ingre['image'])) {
                    $ingreImage = $ingre['image']->getClientOriginalName();
                    $fullIngreImageName = Str::uuid() . '_' . $ingreImage;
                    $imagePath = $ingre['image']->storeAs('images', $fullIngreImageName, 'public');
                }
                ingredients::create([
                    'title' => $ingre['title'],
                    'description' => $ingre['description'],
                    'image' => $imagePath,
                    'price_per_unit' => $ingre['price_per_unit'],
                    'max_unit_amount' => $ingre['max_unit_amount'],
                    'menu_item_id' => $menu_id
                ]);
            }
        }
        return to_route('menuItem.items', [$request->menu_categories_id]);
    }

    public function storeFront(Request $request){
        $path = null;
        if (isset($request->image)) {
            $name = $request->image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        $item = menu_item::create([
            'title'=>$request->title,
            'price'=>$request->price,
            'discount'=>isset($request->discount) ? $request->discount : 0,
            'customizable' => isset($request->customizable) ? $request->customizable : 0,
            'image' => $path,
            'parent_id' => isset($request->parent_id) ? $request->parent_id : 0,
            'menu_id' => $request->menu_id,
            'duration' => isset($request->duration) ? $request->duration : 0,
            'description'=>$request->description,
            'max_unit'=>$request->max_unit,
        ]);
        if($item->discount != 0){
            $campare = $item->price - $item->discount;
            $x = $campare / $item->price;
            $item['percent'] = intval($x * 100);
        }
        return response()->json($item);
    }

    public function updateFront(Request $request, menu_item $item){
        $item->title = $request->title;
        if(isset($request->image)){
            $name = $request->image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
            $item->image = $path;
        }
        if(isset($request->category_id)){
            $item->menu_category_id = $request->category_id;
        }
        $item->price = $request->price;
        $item->discount = isset($request->discount) ? $request->discount : 0;
        $item->customizable = isset($request->customizable) ? $request->customizable : 0;
        $item->duration = isset($request->duration) ? $request->duration : 0;
        $item->description = isset($request->description) ? $request->description : null;
        $item->parent_id = isset($request->parent_id) ? $request->parent_id : 0;
        $item->max_unit = $request->max_unit;
        $item->save();
        if($item->discount != 0){
            $campare = $item->price - $item->discount;
            $x = $campare / $item->price;
            $item['percent'] = intval($x * 100);
        }
        return response()->json($item);
    }

    public function items(menu_category $menu_category)
    {
        return view('admin.menu.item.catItems', ['category' => $menu_category]);
    }

    public function variants(menu_item $menu_item)
    {
        return view('admin.menu.item.addVariants', ['item' => $menu_item]);
    }

    public function edit(menu_item $menu_item)
    {
        return view('admin.menu.item.edit', ['menu' => $menu_item]);
    }

    public function editFront(menu_item $item){
        return response()->json($item);
    }

    public function update(Request $request)
    {
        $item = menu_item::find($request->id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->customizable = $request->customizable ? $request->customizable : 0;
        $item->price = $request->price;
        $item->duration = $request->duration;
        $item->max_unit = $request->max_unit;
        $imagePath = null;
        if (isset($request->discount)) {
            $item->discount = $request->discount;
        }
        if (isset($request->image)) {
            $item->image && Storage::disk('public')->delete($item->image);
            $name = $request->image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
            $item->image = $path;
        }
        if (count($item->ingredients)) {
            foreach ($item->ingredients as $ingredients) {
                $ingredients->image && Storage::disk('public')->delete($ingredients->image);
                $ingredients->delete();
            }
        }
        if (isset($request->ingredients)) {
            foreach ($request->ingredients as $ingre) {
                if (isset($ingre['image'])) {
                    $ingreImage = $ingre['image']->getClientOriginalName();
                    $fullIngreImageName = Str::uuid() . '_' . $ingreImage;
                    $imagePath = $ingre['image']->storeAs('images', $fullIngreImageName, 'public');
                }
                ingredients::create([
                    'title' => $ingre['title'],
                    'description' => $ingre['description'],
                    'image' => $imagePath,
                    'price_per_unit' => $ingre['price_per_unit'],
                    'max_unit_amount' => $ingre['max_unit_amount'],
                    'menu_item_id' => $request->id
                ]);
            }
        }
        $item->save();
        return to_route('menuItem.single', [$item->id]);
    }

    public function single(menu_item $menu_item)
    {
        return view('admin.menu.item.single', ['item' => $menu_item]);
    }

    public function delete(menu_item $menu_item)
    {
        $id = $menu_item->menu_category->id;
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
        return to_route('menuItem.items', [$id]);
    }

    public function deleteFront(menu_item $item){
        if (count($item->ingredients)) {
            foreach ($item->ingredients as $ingredient) {
                $ingredient->delete();
            }
        }
        if (count($item->menu_custom_ingredients)) {
            foreach ($item->menu_custom_ingredients as $menu_custom_ingredient) {
                $menu_custom_ingredient->delete();
            }
        }
        if($item->image){
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
    }

    public function deleteAll(Request $request)
    {
        if (!isset($request->items)) {
            return redirect()->back();
        }
        foreach ($request->items as $item_id) {
            $menu_item = menu_item::find($item_id);
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
        return redirect()->back();
    }
}
