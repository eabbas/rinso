<?php

namespace App\Http\Controllers;

use App\Models\page_category;
use Illuminate\Http\Request;

class PageCategoryController extends Controller
{
    private function validator()
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'slug' => ['required', 'string', 'max:191'],
            'parent_id' => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ];
    }

    private function messages()
    {
        return [
            'title.required' => 'وارد کردن عنوان الزامی است.',
            'title.max' => 'حداکثر کاراکتر مجاز 255 عدد میباشد.',
            'slug.required' => 'وارد کردن اسلاگ الزامی است.',
            'slug.max' => 'حداکثر کاراکتر مجاز 255 عدد میباشد.',
        ];
    }

    public function create()
    {
        $categories = page_category::all();
        return view('admin.pageCategory.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'parent_id' => $request->input('parent_id', 0),
        ]);

        $validated = $request->validate($this->validator(), $this->messages());
        page_category::create($validated);
        return redirect()->back()->with('message', 'دسته با موفقیت ایجاد شد');
    }

    public function edit(page_category $category)
    {
        return $category;
    }

    public function update(Request $request, page_category $category)
    {
        return $category;
    }

    public function delete(page_category $category)
    {
        return $category;
    }

    public function list()
    {
        $categories = page_category::all();
        return $categories;
    }

    public function single(page_category $category)
    {
        return $category;
    }
}
