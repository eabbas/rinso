@extends('admin.app.panel')

@section('title')
    محصولات {{ $page->title }}
@endsection
@section('content')
    <style>
        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    @php
        $ids = Auth::user()->role->pluck('id')->toArray();

     @endphp
        <section class="w-full flex flex-col gap-3 mt-10">
            <div class="w-full flex flex-col gap-4">
                <div class="flex flex-row items-center justify-end gap-5">
{{--                    <span>|</span>--}}
                    <div class="text-sm text-blue-800 cursor-pointer text-end" onclick="categoryform(this , 'townext' , 'open')">
                        ایجاد دسته جدید
                    </div>
{{--                    <span>|</span>--}}
{{--                    <a href="{{ route('introCat.list', [$page->id]) }}" class="text-sm text-blue-800 cursor-pointer">--}}
{{--                        همه دسته ها--}}
{{--                    </a>--}}
{{--                    <span>|</span>--}}
{{--                    <a href="{{ route('introPro.list', [$page->id]) }}" class="text-sm text-blue-800 cursor-pointer">--}}
{{--                         همه محصولات--}}
{{--                    </a>--}}
                </div>
                <div class="w-full flex gap-4 items-center pb-2  text-[15px] overflow-x-auto [&-webkit-scrollbar]:hidden"
                     id="intro_categories">

                        <span class="px-5 h-12 text-nowrap bg-gray-200 shadow flex justify-center items-center rounded-xl cursor-pointer"
                              onclick="allProducts(this)">همه</span>
                        @foreach ($page->introCats as $introCat)
                            <div class="flex gap-2">
                                <div class="px-2 h-12 text-nowrap bg-white text-[15px] shadow flex justify-center items-center rounded-xl w-30 cursor-pointer relative introCategories" onclick="showProduct(this)"
                                    data-cat-id="{{ $introCat->id }}">
                                    <span>
                                        {{ $introCat->title }}
                                    </span>
                                    <input type="hidden" value="{{ $introCat->show_in_home }}" id="show_in_home_cat">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="w-6 bg-red-600 h-6 flex justify-center items-center cursor-pointer rounded-md" onclick="deleteCategory(this , {{ $introCat->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </div>
                                    <div class="w-6 bg-green-500  h-6 flex justify-center items-center cursor-pointer rounded-md" onclick="EditCategoryForm({{ $introCat->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-4" id="allProducts">
{{--                @dd($page)--}}
                @foreach($page->introPros as $introPro)
                    @if($introPro->show_in_home == 1)
                        <div class="w-full flex flex-col items-center gap-3">
                            <a href="{{ route('introPro.single', [$introPro->id]) }}"
                               class="w-full flex flex-col bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts" id="{{$introPro->id}}"
                               data-pro-id="{{ $introPro->id }}">
                                <div class="w-full flex justify-center">
                                    @if(isset($introPro->main_image))
                                        <img src="{{ asset('storage/'.$introPro->main_image) }}" alt=""
                                             class="size-40 object-cover rounded-xl">
                                    @else
                                        <img src="{{ asset('assets/img/product/قیمت-گوشی-سامسونگ-Samsung-Galaxy-S24-Ultra-حافظه-512-رم-12-پارت-ویتنام.jpeg') }}"
                                             alt="" class="size-40 object-cover rounded-xl">
                                    @endif
                                </div>
                                <div class="flex justify-between mt-7">
                                    <span class="text-[#868a88] h-10 text-sm ellipsis-2">{{ $introPro->title }}</span>
                                </div>
                                <div class="w-full flex justify-end pb-2 px-2">
                                    <span class="text-xs text-blue-500">مشاهده ...</span>
                                </div>
                            </a>
                            <div class="w-full flex flex-row items-center gap-3">
                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center" onclick='editIntroPro({{$introPro->id}} , "open", {{$introPro->categories[0]->id}})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white"
                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>
                                <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer w-full flex justify-center items-center" onclick="deleteProduct(this , {{$introPro->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white"
                                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="flex flex-col-reverse" id="showproduct">
                <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-4" id="customProducts">

                </div>
            </div>
        </section>

{{-- <span>createCategory</span>--}}
        <div class="fixed top-0 right-0 bg-black/50 opacity-0 invisible w-full flex items-center justify-end h-dvh transtion-all duration-300">
            <div class="lg:w-[calc(100%-265px)] w-11/12">
            <div class="flex items-start justify-center w-11/12">
                <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                    <div class="text-center mb-8 flex justify-bettwen">
                        <span class="w-5/12 text-start m-2 mt-0 cursor-pointer" onclick="categoryform(this , 'clos')">✖</span>
                        <h3 class="lg:text-lg font-bold text-gray-800 w-7/12 text-start"></h3>
                    </div>
                    <div class="text-center mb-4" enctype="multipart/form-data">
                        <div class="w-full flex flex-col gap-3 my-4">
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان دسته</label>
                                <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                    <input
                                            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                            type="text" name='titleCategory' id="titleCategory"
                                            placeholder="عنوان دسته" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>
                                <input type="checkbox" name='show_in_home' id="show_in_home" value="1">
                            </div>
                        </div>
                        <div class="w-full flex flex-row justify-end items-center">
                            <button type="button" onclick="createCategory(this)"
                                    class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    {{-- <span>createCategory</span>--}}

{{--<span>creaetproduct</span>--}}
    <div class="fixed top-0 right-0 bg-black/50 opacity-0 invisible w-full flex items-center justify-end h-dvh transtion-all duration-300">
        <div class="lg:w-[calc(100%-265px)] w-full flex justify-center items-center mt-22 lg:mt-0 h-10/12">
            <div class="bg-white rounded-2xl p-3 w-11/12 overflow-y-auto h-full">
                <div class="text-center mb-4">
                    <div class="flex items-center justify-start cursor-pointer" onclick="formcreateProduct(this,'clos')">
                        <sapn>✖</sapn>
                    </div>
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-1 my-4">
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <input class="p-3 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                        type="text" name='titleProduct' id="titleProduct"
                                        placeholder="عنوان محصول" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-2 itmes-center max-md:gap-1">
                            <label class="text-sm mb-1 mt-2 flex">نمایش در خانه</label>
                            <input type="checkbox" name='show_in_home_product' id="show_in_home_product" value="1">
                        </div>
                        <div class="w-full flex flex-col gap-2 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2 flex">تصویر محصول</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <input class="p-3 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                        type="file" name='main_image_product' id="main_image_product"
                                        placeholder="تصویر محصول">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-2 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2 flex">گالری تصاویر محصول</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <input class="p-3 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                        type="file" name='gallery[]' id="gallery"
                                        placeholder="گالری تصاویر محصول" multiple>
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-2 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="text-sm mb-1 mt-2 flex">توضیحات محصول</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <textarea class="p-3 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                        name='description_product' id="description_product"
                                        placeholder="توضیحات محصول"></textarea>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-x-2 gap-y-3 itmes-center lg:col-span-2" id="features">
                        </div>
                    </div>
                    <div class="w-full text-center">
                        <button type="button" onclick="addAttribute()"
                                class="active:bg-[#0080e5] mt-1 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            افزودن ویژگی
                        </button>
                    </div>
                    <div class="w-full text-left">
                        <button type="button" onclick="createproduct(this)"
                                class="active:bg-[#0080e5] mt-1 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<span>creaetproduct</span>--}}


    {{-- edit intro product --}}
    <div class="fixed top-0 right-0 bg-black/50 opacity-0 invisible w-full flex items-center justify-end h-dvh transtion-all duration-300" id="introProductEdit">
        <div class="lg:w-[calc(100%-265px)] w-full flex justify-center items-center mt-23 lg:mt-0 h-10/12 ">
{{--            <div class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">--}}
{{--            </div>--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"--}}
{{--                 class="size-5 cursor-pointer" viewBox="0 0 384 512">--}}
{{--                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>--}}
{{--            </svg>--}}
            <div class="bg-white rounded-2xl p-3 w-11/12 overflow-y-auto h-full">
                    <div class="cursor-pointer" onclick="editIntroPro(this , 'close')">
                        ✖
{{--                        <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>--}}
                    </div>
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>
                                <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                            <span class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                                است!</span>
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                           type="text" name='introProTitleEdit' id="introProTitleEdit"
                                           placeholder="عنوان محصول">
                                </div>
                            </div>
                            <input type="hidden" name="introProIdEdit" id="introProIdEdit">
                            <input type="hidden" name="introProCatIdEdit" id="introProCatIdEdit">
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>
                                <input type="checkbox" name='show_in_home_pro_edit' id="show_in_home_pro_edit">
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">تصویر محصول</label>
                                <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                           type="file" name='introProImgEdit' id="introProImgEdit"
                                           placeholder="تصویر محصول">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">گالری تصاویر محصول</label>
                                <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                           type="file" name='introProGalleryEdit' id="introProGalleryEdit"
                                           placeholder="گالری تصاویر محصول" multiple>
                                </div>
                            </div>
                            <div
                                    class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="text-sm mb-1 mt-2.5 flex">توضیحات محصول</label>
                                <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                            <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                      name='introProDescriptionEdit'
                                                                      id="introProDescriptionEdit"
                                                                      placeholder="توضیحات محصول"></textarea>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-4 itmes-center max-md:flex-col lg:col-span-2"
                                 id="Editattribute">
                            </div>
                        </div>
                        <div class="w-full text-center">
                            <button type="submit" onclick="addAttributeEdit()"
                                    class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                افزودن ویژگی
                            </button>
                        </div>
                        <div class="w-full text-left">
                            <button type="submit" onclick="updateIntroPro(this)"
                                    class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                ثبت
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    {{-- edit intro product --}}

    {{--edit category--}}
    <div class="fixed top-0 right-0 bg-black/50 opacity-0 invisible w-full flex items-center justify-end h-dvh transtion-all duration-300" id="EditCategory">
        <div class="lg:w-[calc(100%-265px)] w-11/12">
            <div class="flex items-start justify-center w-11/12">
                <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                    <div class="text-center mb-8 flex justify-bettwen">
                        <span class="w-5/12 text-start m-2 mt-0 cursor-pointer" onclick="categoryform(this , 'clos')">✖</span>
                        <h3 class="lg:text-lg font-bold text-gray-800 w-7/12 text-start"></h3>
                    </div>
                    <div class="text-center mb-4" enctype="multipart/form-data">
                        <div class="w-full flex flex-col gap-3 my-4">
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <input type="hidden" name="id" id="editCategory_id">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان دسته</label>
                                <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                    <input
                                            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                            type="text" name='titleCategory' id="titleCategoryEdit"
                                            placeholder="عنوان دسته" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>
                                <input type="checkbox" name='show_in_home' id="show_in_home_categoryEdit" value="1">
                            </div>
                        </div>
                        <div class="w-full flex flex-row justify-end items-center">
                            <button type="button" onclick="updateCategory(this)"
                                    class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--edit category--}}

    <script>

        let EditCategory=document.getElementById('EditCategory')
        let titleCategoryEdit=document.getElementById('titleCategoryEdit')
        let show_in_home_categoryEdit=document.getElementById('show_in_home_categoryEdit')
        let editCategory_id=document.getElementById('editCategory_id')
        function  EditCategoryForm(cat_id){
        let introCategoriesEdit = document.querySelectorAll('.introCategories')
            introCategoriesEdit.forEach((category)=>{
            if(category.getAttribute('data-cat-id')==cat_id){
                editCategory_id.value=cat_id
                titleCategoryEdit.value=category.children[0].innerText
                if(category.children[1].value==1){
                    show_in_home_categoryEdit.checked=true
                }else{
                    show_in_home_categoryEdit.checked=false
                }
            }
            })
            EditCategory.classList.remove('opacity-0')
            EditCategory.classList.remove('invisible')

        }
        function updateCategory(element){
            let text=element.innerText
            element.innerHTMl=`<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`
            let update_title_cat=titleCategoryEdit.value
            let update_id_cat=editCategory_id.value
            let update_show_in_home_cat= 0
            if(show_in_home_categoryEdit.checked){
                 update_show_in_home_cat=show_in_home_categoryEdit.value
                show_in_home_categoryEdit.checked=false
            }else{
                 update_show_in_home_cat=0
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url:"{{route('introCat.update')}}",
                type: "POST",
                dataType: "json",
                data:{'update_title_cat':update_title_cat , 'update_id_cat':update_id_cat , 'update_show_in_home_cat':update_show_in_home_cat},
                success: function (data) {
                    introCategoriesEdit.forEach((category)=>{
                       let data_cat_id= category.getAttribute('data-cat-id')
                        if(data.id==data_cat_id){
                            category.children[0].innerText=data.title
                        }
                    })
                    element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('opacity-0')
                    element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('invisible')
                    element.innerHTMl=text
                    titleCategoryEdit.value=""
                }
            })
        }

        function deleteCategory(element , cat_id){
            // element.parentElement.parentElement.remove()
            // console.log(cat_id)
            // return
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url:"{{route('introCat.delete')}}",
                type: "POST",
                dataType: "json",
                data:{'category_id':cat_id},
                success: function (data) {
                    // console.log(data)
                    element.parentElement.previousElementSibling.remove();
                    element.parentElement.remove();
                }
            })
        }



        function formcreateProduct(element , dor){
            if(dor=='open'){
                element.parentElement.parentElement.nextElementSibling.nextElementSibling.classList.remove('opacity-0')
                element.parentElement.parentElement.nextElementSibling.nextElementSibling.classList.remove('invisible')
                element.parentElement.parentElement.nextElementSibling.nextElementSibling.setAttribute('data-cat-id' , element.getAttribute('data-cat-id'))
            }
            if(dor=='clos'){
                element.parentElement.parentElement.parentElement.parentElement.classList.add('opacity-0')
                element.parentElement.parentElement.parentElement.parentElement.classList.add('invisible')
            }
        }

        function categoryform(element , next , dor){
            if(dor=='open'){
            if(next=='onenext'){
                element.nextElementSibling.classList.remove('opacity-0')
                element.nextElementSibling.classList.remove('invisible')
            }
            if(next=='townext'){
                element.parentElement.parentElement.parentElement.nextElementSibling.classList.remove('opacity-0')
                element.parentElement.parentElement.parentElement.nextElementSibling.classList.remove('invisible')

            }
            }
            if(next=='clos'){
                element.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('opacity-0')
                element.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('invisible')
            }
        }


        let customProducts = document.getElementById('customProducts')
        let showproduct = document.getElementById('showproduct')

        function createproduct(element){
            let features = document.getElementById("features")
            element.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('opacity-0')
            element.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('invisible')
            let category_product=element.parentElement.parentElement.parentElement.parentElement.parentElement.getAttribute('data-cat-id')
            let title=document.getElementById('titleProduct')
            if(title==''){
                alert('عنوان دسته را وارد کنید')
                return
            }
            let show_in_home_product =document.getElementById('show_in_home_product')
            let main_image_product =document.getElementById('main_image_product')
            let gallery =document.getElementById('gallery')
            let description_product =document.getElementById('description_product')
            let Attribute = document.querySelectorAll('.feature-row')
            // console.log(Attribute)
            let x=0
            if(show_in_home_product.checked){
                x=1
                show_in_home_product.checked=false
            }
            let formData = new FormData()
            if(Attribute.length!=0) {
                console.log('ghdfg')
                Attribute.forEach((row, index) => {
                    const keyInput = row.querySelector('input.key');
                    const valueInput = row.querySelector('input.value');

                    const key = keyInput.value;
                    const value = valueInput.value;
                    if (key && value) {
                        formData.append(`attributes[${index}][key]`, key);
                        formData.append(`attributes[${index}][value]`, value);
                    }
                })
            }
            if(gallery){
                if (gallery.files.length > 0) {
                  for (let i = 0; i < gallery.files.length; i++) {
                  formData.append('gallery[]', gallery.files[i])
                }
              }
            }
            gallery.value=""
            formData.append('title',title.value)
            formData.append('product_category', category_product)
            formData.append('show_in_home', x)
            if(main_image_product.files[0]){
            formData.append('main_image_product', main_image_product.files[0])
            }
            if(description_product){
            formData.append('description_product', description_product.value)
            }
            description_product.value=""
            main_image_product.value=[]
            title.value=""
            features.innerHTML=''
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            })
            $.ajax({
                url:"{{route('introPro.store' , $page->id)}}",
                type:'POST',
                contentType:false,
                processData:false,
                data: formData,
                success:function(data){
                    // console.log(data)
                    // return
                    if (data.show_in_home == 1) {
                        let link = "{{ url('intro-pro/user-show') }}/" + data.id
                        let div = document.createElement('div')
                        {{--let editLink = "{{ url('intro-pro/editPage') }}/"--}}
                        div.classList = "w-full flex flex-col items-center gap-3 mt-5"
                        div.innerHTML = `
                                <a href="${link}" class="w-full flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts" data-pro_id="${data.id}" id="${data.id}">
                                    <div class="w-full flex justify-center relative">
                                        <img src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '/images/default-product.png'}" alt="" class="size-40 object-cover rounded-xl">
                                    </div>
                                    <div class="flex justify-between mt-7">
                                        <span class="text-[#868a88] h-10 text-sm ellipsis-2">${data.title}</span>
                                    </div>
                                    <div class="w-full flex justify-end pb-2 px-2">
                                        <span class="text-xs text-blue-500">مشاهده ...</span>
                                    </div>
                                </a>
                                <div class="w-full flex flex-row items-center gap-3">
                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center" onclick='editIntroPro(${data.id} , "open" , ${data.categories[0].id})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white"
                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>
                                <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer w-full flex justify-center items-center" onclick="deleteProduct(this , ${data.id})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white"
                                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </div>
                            </div>
                                `
                        customProducts.appendChild(div)
                    }
                }

            })
        }

        function deleteProduct(el,introProId) {
            // console.log('sdf')
            // return
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introPro.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    "product_id": introProId,
                },
                success: function (data) {
                    el.parentElement.parentElement.remove();

                },
                error: function () {
                    console.log('error')
                }
            })
        }

        function createCategory(element){
        let categoryTitle=document.getElementById('titleCategory')
            if(categoryTitle.value==''){
                alert('عنوان دسته را وارد کنید')
                return
            }
        let categoryShow_in_home=document.getElementById('show_in_home')
        let intro_categories=document.getElementById('intro_categories')
            element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('opacity-0')
            element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add('invisible')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            })
            let x=0
            if(categoryShow_in_home.checked){
                 x=1
            }
            $.ajax({
                url:"{{route('introCat.store' , $page->id)}}",
                type:'POST',
                dataType:'json',
                data:{'title':categoryTitle.value,'show_in_home':x},
                success:function(data) {
                    if(data['show_in_home']==1){
                    let parentdiv=document.createElement('div')
                    parentdiv.classList="flex gap-2"
                    let div=document.createElement('div')
                    let span=document.createElement('span')
                    let input=document.createElement('input')
                    div.classList="px-2 h-12 text-nowrap bg-white text-[15px] shadow flex justify-center items-center rounded-xl w-30 cursor-pointer relative introCategories"
                    div.setAttribute('data-cat-id',data['id'])
                    div.setAttribute('onclick','showProduct(this)')
                    span.innerText=data['title']
                    input.type='hidden'
                    input.value=data['show_in_home']
                    input.id='show_in_home'
                    div.appendChild(span)
                    div.appendChild(input)
                    let editDeleteDiv=document.createElement('div')
                    editDeleteDiv.classList="flex flex-col gap-1"
                        editDeleteDiv.innerHTML=`
                                    <div class="w-5 bg-red-600 h-6 flex justify-center items-center cursor-pointer rounded-md" onclick="deleteCategory(this , ${data.id})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </div>
                                    <div class="w-5 bg-green-500  h-6 flex justify-center items-center cursor-pointer rounded-md" onclick="EditCategoryForm(${data.id} , '${data.title}' , ${data.show_in_home})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                    `
                    parentdiv.appendChild(div)
                    parentdiv.appendChild(editDeleteDiv)

                        intro_categories.appendChild(parentdiv)
                    }
                        categoryTitle.value=""
                        categoryShow_in_home.checked=false
                }
            })
        }

        // بهینه سازی شود، فیلد اسلاگ جدا بشه از pagePath
        function copyText(pageId, slug) {
            let url = "famenu.ir" + "/" + slug
            navigator.clipboard.writeText(url)
            alert("لینک کپی شد")
        }

        // اتمام توضیحات
        let allPros = document.getElementById('allProducts')
        // let customProducts = document.getElementById('customProducts')

        // introCategories.forEach((introProduct) => {
        //     introProduct.addEventListener('click', () => {

        function showProduct(element) {
        let introCategories = document.querySelectorAll('.introCategories')
            customProducts.innerHTML = `
            <div class="col-span-2 w-full h-[284px] flex justify-center items-center">
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
            </div>
            `
            allPros.classList.remove('grid')
            allPros.classList.add('hidden')
            element.parentElement.parentElement.children[0].classList.remove('bg-gray-200')
            element.parentElement.parentElement.children[0].classList.add('bg-white')
            if (element.classList.contains('bg-white')) {
                introCategories.forEach((item) => {
                    item.classList.add('bg-white')
                    item.classList.remove('bg-gray-200')
                })
                element.classList.remove('bg-white')
                element.classList.add('bg-gray-200')
                let data_cat_id = element.getAttribute('data-cat-id')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('introPro.showProducts') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        "category_id": element.getAttribute('data-cat-id'),
                    },
                    success: function (datas) {
                        customProducts.innerHTML = ""
                        if(showproduct.children[1]){
                        showproduct.children[1].remove()
                        }
                        let divcreateproduct = document.createElement('div')
                        divcreateproduct.classList = "text-sm cursor-pointer w-25 bg-white rounded-xl h-7 flex items-center justify-center"
                        divcreateproduct.innerText = 'ایجاد محصول'
                        divcreateproduct.setAttribute('onclick', 'formcreateProduct(this,"open")')
                        divcreateproduct.setAttribute('data-cat-id', data_cat_id)
                        showproduct.appendChild(divcreateproduct)


                        datas.forEach((data) => {
                            if (data.show_in_home == 1) {
                                let link = "{{ url('intro-pro/user-show') }}/" + data.id
                                let div = document.createElement('div')
                                {{--let editLink = "{{ url('intro-pro/editPage') }}/"--}}
                                        {{--let deleteLink = "{{ url('intro-pro/delete') }}/"--}}
                                    div.classList = "w-full flex flex-col items-center gap-3 mt-5"
                                div.innerHTML = `
                                <a href="${link}" class="w-full flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm rounded-xl featuresEdit" data-pro-id="${data.id}" id="${data.id}">
                                    <div class="w-full flex justify-center relative">

                                        <img src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '/images/default-product.png'}" alt="" class="size-40 object-cover rounded-xl">
                                    </div>
                                    <div class="flex justify-between mt-7">
                                        <span class="text-[#868a88] h-10 text-sm ellipsis-2">${data.title}</span>
                                    </div>
                                    <div class="w-full flex justify-end pb-2 px-2">
                                        <span class="text-xs text-blue-500">مشاهده ...</span>
                                    </div>
                                </a>
                                <div class="w-full flex flex-row items-center gap-3">
                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center" onclick='editIntroPro(${data.id} , "open" , ${data_cat_id})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white"
                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>
                                <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer w-full flex justify-center items-center" onclick="deleteProduct(this , ${data.id})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white"
                                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </div>
                            </div>
                                `
                                customProducts.appendChild(div)
                            }
                        })
                    },
                    error: function () {
                        console.log('error')
                    }

                })
            } else {
                element.classList.remove('bg-gray-200')
                element.classList.add('bg-white')
            }
        }
            // })
        // })
        let introCategories = document.querySelectorAll('.introCategories')

        function allProducts(el) {
            // console.log(allPros)
            showproduct.children[1].remove()
            introCategories.forEach((introProduct) => {
                introProduct.classList.remove('bg-gray-200')
                introProduct.classList.add('bg-white')
            })
            el.classList.remove('bg-white')
            el.classList.add('bg-gray-200')
            allPros.classList.remove('hidden')
            allPros.classList.add('grid')
            customProducts.innerHTML = ""
        }
        //     console.log(showproduct.children[1])
        // if(showproduct.children[1]){
        // }
        let features = document.getElementById("features")
        let featuresEdit = document.getElementById("featuresEdit")

        function addAttribute(){
            let attrBox = document.createElement('div')
            attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
            attrBox.innerHTML = `
        <span class="absolute -top-2 -left-2 px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key" name="attributes[key]"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value" name="attributes[value]"
            type="text"
            placeholder="مقدار ویژگی">

        `
            attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                attrBox.remove();
            });
            features.appendChild(attrBox)

        }

        let Editattribute=document.getElementById('Editattribute')
        function addAttributeEdit(){
            let attrBox = document.createElement('div')
            attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row-Edit'
            attrBox.innerHTML = `
        <span class="absolute -top-2 -left-2 px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key" name="attributes[key]"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value" name="attributes[value]"
            type="text"
            placeholder="مقدار ویژگی">

        `
            attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                attrBox.remove();
            });
            Editattribute.appendChild(attrBox)
        }

        let introProductEdit = document.getElementById('introProductEdit')
        let introProTitleEdit = document.getElementById('introProTitleEdit')
        let introProIdEdit = document.getElementById('introProIdEdit')
        // let introProCatEdit = document.getElementById('introProCatEdit')
        let introProImgEdit = document.getElementById('introProImgEdit')
        let introProGalleryEdit = document.getElementById('introProGalleryEdit')
        let introProDescriptionEdit = document.getElementById('introProDescriptionEdit')
        let show_in_home_pro_edit = document.getElementById('show_in_home_pro_edit')
        let introProCatIdEdit=document.getElementById('introProCatIdEdit')

        // let deleteBtn = document.querySelectorAll('.deleteBtn')


        function editIntroPro(introProId , dor , proCatid) {
            if(dor=='close'){
                introProductEdit.classList.add('opacity-0')
                introProductEdit.classList.add('invisible')
            }
            if(dor=='open'){
            // let children = introProCatEdit.children
            // for (let child of children) {
            //     child.selected = false
            // }
            Editattribute.innerHTML = ""

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introPro.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    "product_id": introProId
                },
                success: function (data) {
                    introProTitleEdit.value = data.title
                    introProDescriptionEdit.value = data.description
                    introProIdEdit.value = data.id
                    introProCatIdEdit.value=proCatid
                    // data.categories.forEach((cat) => {
                    //     for (let child of children) {
                    //         if (cat.id == child.value) {
                    //             child.selected = true
                    //         }
                    //     }
                    // })
                    data.show_in_home ? show_in_home_pro_edit.checked = true : show_in_home_pro_edit.checked = false
                    if (data.attributes) {
                        data.attributes.forEach((attribute) => {
                            let attrBox = document.createElement('div')
                            attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative  feature-row-Edit'
                            attrBox.innerHTML = `
                                                    <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
                                                        ❌
                                                    </span>
                                                    <input
                                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
                                                        type="text" value="${attribute.key}"
                                                        placeholder="نام ویژگی">
                                                    <input
                                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
                                                        type="text" value="${attribute.value}"
                                                        placeholder="مقدار ویژگی">
                                                    `
                            attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                                attrBox.remove();
                            });
                            Editattribute.appendChild(attrBox)
                        })
                    }
                    // block.classList.remove('invisible')
                    // block.classList.remove('opacity-0')
                    // group.classList.add('scale-95')
                    // group.classList.add('opacity-0')
                    // group.classList.add('invisible')
                    introProductEdit.classList.remove('invisible')
                    introProductEdit.classList.remove('opacity-0')

                },
                error: function () {
                    console.log('error')
                }
            })
            }
        }

        function updateIntroPro(el) {
            if (introProTitleEdit.value == "") {
                // console.log(el.parentElement.parentElement.children[0].children[1].children[0])
                // el.parentElement.parentElement.children[0].children[1].children[0].classList.remove('opacity-0')
            } else {
                let flag = 0
                if (show_in_home_pro_edit.checked) {
                    flag = 1
                }
                let featuresEdit = document.querySelectorAll('.featuresEdit ')
                let introProducts = document.querySelectorAll('.introProducts ')
                let buttonText = el.innerText
                el.setAttribute('disabled', true)
                el.innerHTML = `<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`
                let formData = new FormData()
                formData.append('title', introProTitleEdit.value)
                formData.append('show_in_home', flag)
                if (introProImgEdit.files.length > 0) {
                    formData.append('main_image', introProImgEdit.files[0])
                }
                formData.append('page_id', "{{ $page->id }}")
                // console.log(introProIdEdit.value)
                // return
                // let introproduct=document.getElementById(introProIdEdit.value)
                formData.append('intro_product_id', introProIdEdit.value)
                formData.append('introProCatIdEdit', introProCatIdEdit.value)
                if (introProGalleryEdit.files.length > 0) {
                    for (let i = 0; i < introProGalleryEdit.files.length; i++) {
                        formData.append('gallery[]', introProGalleryEdit.files[i])
                    }
                }
                // let children = introProCatEdit.children
                // let array = [];
                // for (let child of children) {
                //     if (child.selected == true) {
                //         formData.append('categpries[]', child.value)
                //     }
                // }

                const rows = document.querySelectorAll('.feature-row-Edit');
                rows.forEach((row, index) => {
                    const keyInput = row.querySelector('input.key');
                    const valueInput = row.querySelector('input.value');

                    const key = keyInput.value;
                    const value = valueInput.value;
                    if (key && value) {
                        formData.append(`attributes[${index}][key]`, key);
                        formData.append(`attributes[${index}][value]`, value);
                    }
                });
                formData.append('description', introProDescriptionEdit.value)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('introPro.update') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        featuresEdit.forEach((product) => {
                                console.log(product.getAttribute('data-pro-id'))
                            if (product.getAttribute('data-pro-id') == data.id) {
                                product.children[0].children[0].removeAttribute('src')
                                product.children[0].children[0].setAttribute('src', "{{ asset('storage/') }}/" + data.main_image)
                                product.children[1].children[0].innerText = data.title
                                // console.log(introProducts, product, data.title)
                            }
                        })
                        introProducts.forEach((product) => {
                            // console.log(product.getAttribute('data-pro-id'))
                            if (product.getAttribute('data-pro-id') == data.id) {
                                product.children[0].children[0].removeAttribute('src')
                                product.children[0].children[0].setAttribute('src', "{{ asset('storage/') }}/" + data.main_image)
                                product.children[1].children[0].innerText = data.title
                                // console.log(introProducts, product, data.title)
                            }
                        })

                        introProTitleEdit.value = ""
                        introProCatIdEdit.value = ""
                        introProImgEdit.value = ""
                        introProGalleryEdit.value = ""
                        introProDescriptionEdit.value = ""
                        el.innerHTML = buttonText
                        el.removeAttribute('disabled')
                        editIntroPro('ss', 'close' , 'ss')
                    },
                    error: function () {
                        console.log('error')
                    }
                })
            }
        }
    </script>



    {{-- create intro category --}}

    {{-- create intro category --}}



    {{-- create intro product --}}
{{--    <div--}}
{{--            class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute right-0 top-full form px-5"--}}
{{--            id="introProduct">--}}
{{--        <div--}}
{{--                class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">--}}
{{--        </div>--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"--}}
{{--             class="size-5 cursor-pointer" viewBox="0 0 384 512">--}}
{{--            <path--}}
{{--                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>--}}
{{--        </svg>--}}
{{--        <div class="flex items-start justify-center max-h-[550px] overflow-y-auto [&::-webkit-scrollbar]:hidden">--}}
{{--            <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">--}}
{{--                <div class="text-center mb-8">--}}
{{--                    <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>--}}
{{--                </div>--}}
{{--                <div class="text-center mb-4">--}}
{{--                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">--}}
{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}
{{--                            <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>--}}
{{--                            <div--}}
{{--                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}
{{--                                                        <span--}}
{{--                                                                class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی--}}
{{--                                                            است!</span>--}}
{{--                                <input--}}
{{--                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                        type="text" name='introProTitle' id="introProTitle"--}}
{{--                                        placeholder="عنوان محصول">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}
{{--                            <label class="text-sm mb-1 mt-2.5 flex">دسته محصول</label>--}}
{{--                            <div--}}
{{--                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}

{{--                                <select--}}
{{--                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                        onchange="addCats(this)" name='introProCat' id="introProCat" multiple>--}}
{{--                                    <option value="0" disabled>انتخاب کنید</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">--}}
{{--                            <label class="text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>--}}
{{--                            <input type="checkbox" name='show_in_home_pro' id="show_in_home_pro">--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}
{{--                            <label class="text-sm mb-1 mt-2.5 flex">تصویر محصول</label>--}}
{{--                            <div--}}
{{--                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}
{{--                                <input--}}
{{--                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                        type="file" name='introProImg' id="introProImg"--}}
{{--                                        placeholder="تصویر محصول">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}
{{--                            <label class="text-sm mb-1 mt-2.5 flex">گالری تصاویر محصول</label>--}}
{{--                            <div--}}
{{--                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}

{{--                                <input--}}
{{--                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                        type="file" name='introProGallery' id="introProGallery"--}}
{{--                                        placeholder="گالری تصاویر محصول" multiple>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">--}}
{{--                            <label class="text-sm mb-1 mt-2.5 flex">توضیحات محصول</label>--}}
{{--                            <div--}}
{{--                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}
{{--                                                        <textarea--}}
{{--                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                                                name='introProDescription' id="introProDescription"--}}
{{--                                                                placeholder="توضیحات محصول"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-4 itmes-center max-md:flex-col lg:col-span-2"--}}
{{--                                id="features">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="w-full text-center">--}}
{{--                        <button type="submit" onclick="addAttribute()"--}}
{{--                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">--}}
{{--                            افزودن ویژگی--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="w-full text-left">--}}
{{--                        <button type="submit" onclick="storeIntroPro(this)"--}}
{{--                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">--}}
{{--                            ثبت--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    {{-- create intro product --}}



{{--    <script>--}}

{{--        let categories = [];--}}

{{--        function addCats(el) {--}}
{{--            categories = []--}}

{{--            let arr = el.selectedOptions--}}
{{--            for (let i = 0; i < arr.length; i++) {--}}
{{--                categories.push(arr[i].value)--}}

{{--            }--}}
{{--            console.log(categories)--}}

{{--        }--}}

{{--        let introProTitle = document.getElementById('introProTitle')--}}
{{--        let introProCat = document.getElementById('introProCat')--}}
{{--        let introProImg = document.getElementById('introProImg')--}}
{{--        let introProGallery = document.getElementById('introProGallery')--}}
{{--        let introProDescription = document.getElementById('introProDescription')--}}
{{--        let show_in_home_pro = document.getElementById('show_in_home_pro')--}}

{{--        function storeIntroPro(el) {--}}
{{--            if (introProTitle.value == "") {--}}
{{--                el.parentElement.parentElement.children[0].children[1].children[0].classList.remove('opacity-0')--}}
{{--            } else {--}}
{{--                let flag = false--}}
{{--                if (show_in_home_pro.checked) {--}}
{{--                    flag = true--}}
{{--                }--}}
{{--                let buttonText = el.innerText--}}
{{--                el.setAttribute('disabled', true)--}}
{{--                el.innerHTML = `<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`--}}
{{--                let formData = new FormData()--}}
{{--                formData.append('title', introProTitle.value)--}}
{{--                formData.append('show_in_home', flag)--}}
{{--                formData.append('categories', categories)--}}
{{--                if (introProImg.files.length > 0) {--}}
{{--                    formData.append('main_image', introProImg.files[0])--}}
{{--                }--}}
{{--                formData.append('page_id', "{{ $page->id }}")--}}
{{--                if (introProGallery.files.length > 0) {--}}
{{--                    for (let i = 0; i < introProGallery.files.length; i++) {--}}
{{--                        formData.append('gallery[]', introProGallery.files[i])--}}
{{--                    }--}}
{{--                }--}}
{{--                const rows = document.querySelectorAll('#features .feature-row');--}}
{{--                rows.forEach((row, index) => {--}}
{{--                    const keyInput = row.querySelector('input.key');--}}
{{--                    const valueInput = row.querySelector('input.value');--}}

{{--                    const key = keyInput.value;--}}
{{--                    const value = valueInput.value;--}}
{{--                    if (key && value) {--}}
{{--                        formData.append(`attributes[${index}][key]`, key);--}}
{{--                        formData.append(`attributes[${index}][value]`, value);--}}
{{--                    }--}}
{{--                });--}}
{{--                formData.append('description', introProDescription.value)--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                    }--}}
{{--                })--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('introPro.store') }}",--}}
{{--                    type: "POST",--}}
{{--                    contentType: false,--}}
{{--                    processData: false,--}}
{{--                    data: formData,--}}
{{--                    success: function (data) {--}}
{{--                        console.log(data)--}}
{{--                        let link = "{{ url('intro-pro/single') }}/" + data.id--}}
{{--                        let div = document.createElement('div')--}}
{{--                        div.classList = "w-full flex flex-col items-center gap-3"--}}
{{--                        div.innerHTML = `--}}
{{--                                                <a href="${link}" class="w-full flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts" data-pro_id="${data.id}">--}}
{{--                                                    <div class="w-full flex justify-center relative">--}}

{{--                                                        <img src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '/images/default-product.png'}" alt="" class="w-full max-h-[180px] object-cover lg:max-h-[250px] rounded-xl">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex justify-between">--}}
{{--                                                        <span class="text-[#868a88]">${data.title}</span>--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{-- <span class="font-bold">1.500.000 تومان</span> --}}

{{--                        </a>--}}
{{--                        <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">--}}
{{--                            <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center"--}}
{{--                                onclick='editIntroPro(${data.id})'>--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">--}}
{{--                                                            <path fill="white"--}}
{{--                                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer w-full flex justify-center items-center"--}}
{{--                                                        onclick='deleteIntroPro(${data.id}, this)'>--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">--}}
{{--                                                            <path fill="white"--}}
{{--                                                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                `--}}
{{--                        allPros.appendChild(div)--}}

{{--                        introProTitle.value = ""--}}
{{--                        show_in_home_pro.checked = false--}}
{{--                        introProCat.value = ""--}}
{{--                        introProImg.value = ""--}}
{{--                        introProGallery.value = ""--}}
{{--                        introProDescription.value = ""--}}
{{--                        el.innerHTML = buttonText--}}
{{--                        el.removeAttribute('disabled')--}}
{{--                        closeForm()--}}
{{--                    },--}}
{{--                    error: function () {--}}
{{--                        console.log('error')--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--        }--}}

{{--        function setCategories() {--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                }--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('introCat.selectCats', $page->id) }}",--}}
{{--                type: "GET",--}}
{{--                success: function (datas) {--}}
{{--                    datas.forEach((data) => {--}}
{{--                        let option = document.createElement('option')--}}
{{--                        option.value = data.id--}}
{{--                        option.innerText = data.title--}}
{{--                        introProCat.appendChild(option)--}}
{{--                    })--}}
{{--                },--}}
{{--                error: function () {--}}
{{--                    console.log('error')--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    </script>--}}



    {{-- edit intro category --}}
{{--    <div--}}
{{--            class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute right-0 top-full form px-5"--}}
{{--            id="introCatsList">--}}
{{--        <div--}}
{{--                class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">--}}
{{--        </div>--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"--}}
{{--             class="size-5 cursor-pointer" viewBox="0 0 384 512">--}}
{{--            <path--}}
{{--                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>--}}
{{--        </svg>--}}
{{--        <div class="flex items-start justify-center max-h-[550px] overflow-y-auto [&::-webkit-scrollbar]:hidden">--}}
{{--            <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">--}}
{{--                <div class="w-full flex flex-row justify-between items-center mb-4 pb-4 border-b-1 border-b-gray-300">--}}
{{--                    <h3 class="lg:text-lg font-bold text-gray-800"> ویرایش دسته ها </h3>--}}
{{--                    <a href="{{ route('pages.adminIntroCats', [$page->id]) }}" class="text-sm text-blue-500">مشاهده همه--}}
{{--                        دسته ها</a>--}}
{{--                </div>--}}
{{--                <div id="allCatList" class="w-full flex flex-col gap-4 relative"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div--}}
{{--            class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute right-0 top-full form px-5"--}}
{{--            id="editIntroCat">--}}
{{--        <div--}}
{{--                class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">--}}
{{--        </div>--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"--}}
{{--             class="size-5 cursor-pointer" viewBox="0 0 384 512">--}}
{{--            <path--}}
{{--                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>--}}
{{--        </svg>--}}
{{--        <div class="flex items-start justify-center">--}}
{{--            <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">--}}
{{--                <div class="text-center mb-8">--}}
{{--                    <h3 class="lg:text-lg font-bold text-gray-800">ویرایش دسته</h3>--}}
{{--                </div>--}}
{{--                <div class="text-center mb-4">--}}
{{--                    <div class="w-full flex flex-col gap-3 my-4">--}}
{{--                        <input type="hidden" id="intCatId">--}}
{{--                        <div--}}
{{--                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}
{{--                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان دسته</label>--}}
{{--                            <div--}}
{{--                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}
{{--                                                        <span--}}
{{--                                                                class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی--}}
{{--                                                            است!</span>--}}
{{--                                <input--}}
{{--                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                        type="text" name='introCatTitleEdit' id="introCatTitleEdit"--}}
{{--                                        placeholder="عنوان دسته">--}}
{{--                            </div>--}}
{{--                            <div--}}
{{--                                    class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}
{{--                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته</label>--}}
{{--                                <div--}}
{{--                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">--}}
{{--                                    <input--}}
{{--                                            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"--}}
{{--                                            type="file" name='introCatImageEdit' id="introCatImageEdit">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div--}}
{{--                                    class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">--}}
{{--                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>--}}
{{--                                <input type="checkbox" name='show_in_home_cat_edit' id="show_in_home_cat_edit"--}}
{{--                                       value="1">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-row justify-between items-center">--}}

{{--                        <button type="submit" onclick="updateIntroCat()"--}}
{{--                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">--}}
{{--                            ثبت--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{-- edit intro category --}}



{{--    <script>--}}


{{--        let intCatId = document.getElementById('intCatId')--}}
{{--        let introCatTitleEdit = document.getElementById('introCatTitleEdit')--}}
{{--        let editIntroCatEl = document.getElementById('editIntroCat')--}}
{{--        let show_in_home_cat_edit = document.getElementById('show_in_home_cat_edit')--}}
{{--        let introCatImageEdit = document.getElementById('introCatImageEdit')--}}

{{--        function deleteIntroCat(catId) {--}}
{{--            let introCategories = document.querySelectorAll('.introCategories')--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                }--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('introCat.delete') }}",--}}
{{--                type: "POST",--}}
{{--                dataType: "json",--}}
{{--                data: {--}}
{{--                    'category_id': catId--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    console.log(data)--}}
{{--                    introCategories.forEach((element) => {--}}
{{--                        if (element.getAttribute('data-cat-id') == data) {--}}
{{--                            element.remove();--}}
{{--                        }--}}
{{--                    })--}}
{{--                    closeForm()--}}
{{--                },--}}
{{--                error: function () {--}}
{{--                    console.log('error')--}}
{{--                }--}}
{{--            })--}}


{{--        }--}}

{{--        function editIntroCat(catId) {--}}

{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                }--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('introCat.edit') }}",--}}
{{--                type: "POST",--}}
{{--                dataType: "json",--}}
{{--                data: {--}}
{{--                    'introCatId': catId--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    introCatTitleEdit.value = data.title--}}
{{--                    intCatId.value = data.id--}}
{{--                    data.show_in_home ? show_in_home_cat_edit.checked = true : show_in_home_cat_edit.checked = false--}}
{{--                    block.classList.remove('invisible')--}}
{{--                    block.classList.remove('opacity-0')--}}
{{--                    group.classList.add('scale-95')--}}
{{--                    group.classList.add('opacity-0')--}}
{{--                    group.classList.add('invisible')--}}
{{--                    editIntroCatEl.classList.remove('invisible')--}}
{{--                    editIntroCatEl.classList.remove('opacity-0')--}}
{{--                    editIntroCatEl.classList.remove('top-full')--}}
{{--                    editIntroCatEl.classList.add('top-0')--}}
{{--                },--}}
{{--                error: function () {--}}
{{--                    console.log(error)--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}

{{--        function updateIntroCat() {--}}
{{--            let flag = false--}}
{{--            if (show_in_home_cat_edit.checked) {--}}
{{--                flag = true--}}
{{--            }--}}
{{--            let introCategories = document.querySelectorAll('.introCategories')--}}
{{--            let formData = new FormData()--}}
{{--            console.log(introCatImageEdit.files)--}}
{{--            formData.append('category_id', intCatId.value)--}}
{{--            formData.append('title', introCatTitleEdit.value)--}}
{{--            formData.append('show_in_home', flag)--}}
{{--            if (introCatImageEdit.files.length > 0) {--}}
{{--                formData.append('image', introCatImageEdit.files[0])--}}
{{--            }--}}

{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                }--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('introCat.update') }}",--}}
{{--                type: "POST",--}}
{{--                contentType: false,--}}
{{--                processData: false,--}}
{{--                data: formData,--}}
{{--                success: function (data) {--}}
{{--                    console.log(data)--}}
{{--                    introCategories.forEach((element) => {--}}
{{--                        if (element.getAttribute('data-cat-id') == data.id) {--}}
{{--                            element.innerText = data.title--}}
{{--                        }--}}
{{--                    })--}}
{{--                    introCatImageEdit.value = ""--}}
{{--                    closeForm()--}}
{{--                },--}}
{{--                error: function () {--}}
{{--                    console.log(error);--}}

{{--                }--}}
{{--            })--}}
{{--        }--}}

{{--        let allCatList = document.getElementById('allCatList')--}}

{{--        function showCategories() {--}}


{{--            allCatList.innerHTML = `--}}
{{--                                    <div class="absolute w-full h-full top-0 right-0 flex justify-center items-center">--}}
{{--                                        <div class="loading-wave">--}}
{{--                                            <div class="loading-bar"></div>--}}
{{--                                            <div class="loading-bar"></div>--}}
{{--                                            <div class="loading-bar"></div>--}}
{{--                                            <div class="loading-bar"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    `--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                }--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('introCat.selectCats', $page->id) }}",--}}
{{--                type: "GET",--}}
{{--                success: function (datas) {--}}

{{--                    allCatList.innerHTML = ""--}}
{{--                    datas.forEach((data) => {--}}
{{--                        let div = document.createElement('div')--}}
{{--                        div.classList = "flex flex-row justify-between items-center"--}}
{{--                        div.innerHTML = `--}}
{{--                                                <span class="inline-block w-1/2 text-sm text-gray-800 font-bold">${data.title}</span>--}}
{{--                                                    <div class="w-1/5 lg:w-1/8 flex flex-row items-center gap-3">--}}
{{--                                                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center"--}}
{{--                                                            onclick='editIntroCat(${data.id})'>--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">--}}
{{--                                                                <path fill="white"--}}
{{--                                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />--}}
{{--                                                            </svg>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer w-full flex justify-center items-center"--}}
{{--                                                            onclick='deleteIntroCat(${data.id})'>--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">--}}
{{--                                                                <path fill="white"--}}
{{--                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />--}}
{{--                                                            </svg>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                `--}}
{{--                        allCatList.appendChild(div)--}}
{{--                    })--}}
{{--                },--}}
{{--                error: function () {--}}
{{--                    console.log('error')--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    </script>--}}



{{--    <script>--}}
{{--        let allPros = document.getElementById('allProducts')--}}
{{--        let customProducts = document.getElementById('customProducts')--}}
{{--        let introCategories = document.querySelectorAll('.introCategories')--}}

{{--        function deleteIntroPro(introProId, el) {--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                }--}}
{{--            })--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('introPro.delete') }}",--}}
{{--                type: "POST",--}}
{{--                dataType: "json",--}}
{{--                data: {--}}
{{--                    "product_id": introProId,--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    el.parentElement.parentElement.remove();--}}

{{--                },--}}
{{--                error: function () {--}}
{{--                    console.log('error')--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}

{{--        introCategories.forEach((introProduct) => {--}}
{{--            introProduct.addEventListener('click', () => {--}}
{{--                customProducts.innerHTML = `--}}
{{--                <div class="col-span-2 w-full h-[284px] flex justify-center items-center">--}}
{{--                    <div class="loading-wave">--}}
{{--                        <div class="loading-bar"></div>--}}
{{--                        <div class="loading-bar"></div>--}}
{{--                        <div class="loading-bar"></div>--}}
{{--                        <div class="loading-bar"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                `--}}
{{--                allPros.classList.remove('grid')--}}
{{--                allPros.classList.add('hidden')--}}
{{--                introProduct.parentElement.children[0].classList.remove('bg-gray-200')--}}
{{--                introProduct.parentElement.children[0].classList.add('bg-white')--}}
{{--                if (introProduct.classList.contains('bg-white')) {--}}
{{--                    introCategories.forEach((item) => {--}}
{{--                        item.classList.add('bg-white')--}}
{{--                        item.classList.remove('bg-gray-200')--}}
{{--                    })--}}
{{--                    introProduct.classList.remove('bg-white')--}}
{{--                    introProduct.classList.add('bg-gray-200')--}}
{{--                    $.ajaxSetup({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--                        }--}}
{{--                    })--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('introPro.showProducts') }}",--}}
{{--                        type: "POST",--}}
{{--                        dataType: "json",--}}
{{--                        data: {--}}
{{--                            "category_id": introProduct.getAttribute('data-cat-id'),--}}
{{--                        },--}}
{{--                        success: function (datas) {--}}
{{--                            customProducts.innerHTML = ""--}}
{{--                            datas.forEach((data) => {--}}
{{--                                if (data.show_in_home == 1) {--}}
{{--                                    let link = "{{ url('intro-pro/single') }}/" + data.id--}}
{{--                                    let div = document.createElement('div')--}}
{{--                                    div.classList = "w-full flex flex-col items-center gap-3"--}}
{{--                                    div.innerHTML = `--}}
{{--                                    <a href="${link}" class="w-full flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts" data-pro_id="${data.id}">--}}
{{--                                        <div class="w-full flex justify-center relative">--}}

{{--                                            <img src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '/images/default-product.png'}" alt="" class="size-40 object-cover rounded-xl">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex justify-between mt-7">--}}
{{--                                            <span class="text-[#868a88] h-10 text-sm ellipsis-2">${data.title}</span>--}}
{{--                                        </div>--}}
{{--                                         <span class="font-bold">1.500.000 تومان</span>--}}
{{--                                    <div class="w-full flex justify-end pb-2 px-2">--}}
{{--                                       <span class="text-xs text-blue-500">مشاهده ...</span>--}}
{{--                                   </div>--}}

{{--                               </a>--}}

{{--                               <div class="w-full flex flex-row items-center gap-3">--}}
{{--                                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center"--}}
{{--                                         onclick='editIntroPro(${data.id})'>--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">--}}
{{--                                            <path fill="white"--}}
{{--                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer w-full flex justify-center items-center"--}}
{{--                                         onclick='deleteIntroPro(${data.id}, this)'>--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">--}}
{{--                                            <path fill="white"--}}
{{--                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                               </div>--}}
{{--                                `--}}
{{--                                    customProducts.appendChild(div)--}}

{{--                                }--}}
{{--                            })--}}
{{--                        },--}}
{{--                        error: function () {--}}
{{--                            console.log('error')--}}
{{--                        }--}}
{{--                    })--}}
{{--                } else {--}}
{{--                    introProduct.classList.remove('bg-gray-200')--}}
{{--                    introProduct.classList.add('bg-white')--}}
{{--                }--}}

{{--            })--}}
{{--        })--}}

{{--        function allProducts(el) {--}}
{{--            // console.log(allPros)--}}
{{--            introCategories.forEach((introProduct) => {--}}
{{--                introProduct.classList.remove('bg-gray-200')--}}
{{--                introProduct.classList.add('bg-white')--}}
{{--            })--}}
{{--            el.classList.remove('bg-white')--}}
{{--            el.classList.add('bg-gray-200')--}}
{{--            allPros.classList.remove('hidden')--}}
{{--            allPros.classList.add('grid')--}}
{{--            customProducts.innerHTML = ""--}}
{{--        }--}}
{{--    </script>--}}
@endsection