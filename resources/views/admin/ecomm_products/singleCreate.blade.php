<style>
    input:focus {
        color: #2196F3;
    }
    textarea:focus{
        color: #2196F3;
    }
</style>
@extends('admin.app.panel')
@section('title', ' محصولات فروشگاه')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ایجاد محصول دسته {{ $category->title }}</h1>
    <form action ="{{ route('ecomm_product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="ecomm_category_id" value="{{ $category->id }}">
        <input type="hidden" name="ecomm_id" value="{{ $category->ecomm->id }}">
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex"> عنوان </label>
                        <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text" name="title" title="title" required  placeholder="عنوان محصول را وارد  کنید">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex"> تصویر </label>

                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                   name="image_path" title="تصویر محصول را وارد کنید">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex"> گالری </label>

                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                   name="gallery[]" title="امکان انتخاب چند فایل وجود دارد" multiple>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex">قیمت</label>
                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                   name="price" title="قیمت را وارد کنید" placeholder="10000">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex">قیمت تخفیف خورده</label>
                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                   name="discount" title="تخفیف را وارد کنید" placeholder="9800">
                        </div>
                    </div>
                    <div class="w-full flex flex-row items-center gap-3 max-md:flex-col max-md:gap-1">
                        <input class="" type="checkbox" name="show_in_home" value="1">
                        <lable class="text-sm mb-1 mt-2.5 flex">نمایش در صفحه نخست</lable>
                    </div>

                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                        <label class="text-sm mb-1 mt-2.5 flex">توضیحات </label>
                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                      name="description" title="description" placeholder="توضیحات محصول"></textarea>
                        </div>
                    </div>
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-4 lg:col-span-2" id="attributes"></div>
                </div>
                <div class="w-full text-center">
                    <button onclick="add()"
                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer"
                        type="button">افزودن ویژگی</button>
                </div>
                <div class="w-full text-left">
                    <button
                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer"
                        type="submit">ثبت</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        let index=0
    </script>
    <script src="{{ asset('assets/js/ecomm_product.js') }}"></script>
@endsection
