@extends('admin.app.panel')

@section('title')
    {{ $page->title }} ایجاد دسته
@endsection
@section('content')


        <div class="flex items-start justify-center">
            <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                <div class="text-center mb-8">
                    <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                </div>
                <form action="{{ route('introCat.store', [$page->id]) }}" method="post" class="text-center mb-4" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full flex flex-col gap-3 my-4">
                        <div
                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان دسته</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                <input
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                    type="text" name='title' id="title"
                                    placeholder="عنوان دسته" required>
                            </div>
                        </div>
                        <div
                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <input
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                    type="file" name='main_image' id="main_image">
                            </div>
                        </div>
                        <div
                            class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>
                            <input type="checkbox" name='show_in_home' id="show_in_home" value="1">
                        </div>
                    </div>
                    <div class="w-full flex flex-row justify-end items-center">
                        <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </form>
            </div>
        </div>

@endsection