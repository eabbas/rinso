@extends('admin.app.panel')
@section('title', 'ویرایش دسته منو')
@section('content')
 <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ویرایش دسته منو</h1>
    <form action="{{ route('menuCat.update') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        <div id="menuCat">
                            <div class="w-full flex flex-col lg:flex-row gap-3 my-4">
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <input type="hidden" name="menu_id" value="{{ $category->menu_id }}">
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row">
                                        <span>عنوان دسته:</span>
                                        <span class="text-rose-500">*</span>
                                    </label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='title' placeholder="نوشیدنی" title="عنوان دسته منو" value="{{ $category->title }}" required>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='description' placeholder="توضیحات دسته"
                                            class="w-full px-3 py-1 md:px-2 outline-none text-gray-500" value="{{ $category->description }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته:</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                            name="image" title="تصویر دسته">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full text-center">
                            <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                بروز رسانی اطلاعات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
@endsection