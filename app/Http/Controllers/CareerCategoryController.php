<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\careerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CareerCategoryController extends Controller
{
    public function create()
    {
        return view('admin.careerCategory.create');
    }

    public function store(Request $request)
    {
        $path = null;
        if (isset($request->main_image)) {
            $name = $request->main_image->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
        }
        careerCategory::create([
            'title' => $request->title,
            'description' => $request->description,
            'show_in_home' => isset($request->show_home) ? $request->show_home : 0,
            'main_image' => $path
        ]);
        return to_route('cc.list');
    }

    public function list()
    {
        $careerCategories = careerCategory::all();
        return view('admin.careerCategory.index', ['careerCategories' => $careerCategories]);
    }

    public function show(careerCategory $careerCategory)
    {
        return view('admin.careerCategory.single', ['careerCategory' => $careerCategory]);
    }

    public function edit(careerCategory $careerCategory)
    {
        return view('admin.careerCategory.edit', ['careerCategory' => $careerCategory]);
    }

    public function update(Request $request)
    {
        $careerCategory = careerCategory::find($request->id);
        if (isset($request->main_image)) {
            if ($careerCategory->main_image) {
               Storage::disk('public')->delete($careerCategory->main_image);
            }
            $name = $request->main_image->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $careerCategory->main_image = $path;
        }
        if ($request->description) {
            $careerCategory->description = $request->description;
        }
        $careerCategory->title = $request->title;
        $careerCategory->show_in_home = isset($request->show_home) ? $request->show_home : 0;
        
        $careerCategory->save();
        return to_route('cc.list');
    }

    public function delete(careerCategory $careerCategory)
    {
        $careerCategory->delete();
        return to_route('cc.list');
    }
}
