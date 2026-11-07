@extends('admin.app.panel')
@section('title', 'ایجاد دسته منو')
@section('content')
<div class="w-full flex flex-row justify-end p-4">
            <a href="{{ url()->previous()}}" class="text-xs px-2 py-0.5 rounded-sm bg-gray-500 text-white">بازگشت ←</a>
               </div>
<h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ایجاد دسته های منو</h1>
    <form action="{{ route('menuCat.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        
                        <div id="menuCat">
                            <div class="w-full flex flex-col lg:flex-row gap-1.5 lg:gap-3 my-4">
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row">
                                        <span>عنوان دسته:</span>
                                        <span class="text-rose-500">*</span>
                                    </label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='menuCat[0][title]' placeholder="نوشیدنی" title="عنوان دسته منو" required>
                                    </div>
                                </div>
                                
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته:</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                            name="menuCat[0][image]" title="تصویر دسته" required>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='menuCat[0][description]' placeholder="توضیحات دسته"
                                            class="w-full px-3 py-1 md:px-2 outline-none text-gray-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end">
                            <button type="button" class="bg-gray-200 rounded-lg border border-gray-400 hover:bg-gray-400 hover:text-white px-3 py-1 transition-all duration-300 cursor-pointer" onclick="newMenuCat()">
                                دسته جدید+
                            </button>
                        </div>
                        <div class="w-full text-center">
                            <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                               ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script src="{{ asset('assets/js/menuCat.js') }}"></script>
@endsection