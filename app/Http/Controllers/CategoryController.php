<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        if ($request->homes) {
            category::create([
                'title' => $request->title,
                'description' => $request->description,
                'show_in_home' => $request->homes[0]
            ]);
        } else {
            category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
    }

    public function index()
    {
        $categories = category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function show(category $category)
    {
        return view('category.single', ['category' => $category]);
    }

    public function edit(category $category)
    {
        $categories = category::all();
        return view('category.edit', ['category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
        $category = category::find($request->id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->show_in_home = $request->homes;
        $category->save();
    }

    public function delete(category $category)
    {
        $category->delete();
    }
}
