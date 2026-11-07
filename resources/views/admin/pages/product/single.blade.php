@extends('admin.app.panel')
@section('title')
    مشاهده محصول {{ $product->title }}
@endsection
@section('content')
    {{--@dd($product->attributes)--}}
    <style>
        .mohammad:last-child {
            border: none;
        }

        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <div class="w-full flex flex-col items-center gap-4">
        <div class="w-[98%] mx-auto flex flex-row-reverse justify-between items-center relative">
            <div class="@if(count($product->gallery)) w-9/12 @else w-full @endif flex justify-center items-center">

                <img src="{{ asset('storage/'.$product->main_image) }}" alt="" id="image" class="w-50">

            </div>
            @if(count($product->gallery))
                <div class="max-h-[200px] w-3/12 flex flex-col items-center gap-2 overflow-y-auto pl-1.5">
                    @foreach($product->gallery as $img)
                        <img src="{{ asset('storage/'.$img->image) }}" class="size-14 gallery cursor-pointer rounded"
                             alt="">
                    @endforeach
                </div>
            @endif
        </div>
        <script>
            let gallery = document.querySelectorAll('.gallery')
            gallery.forEach((image) => {
                image.addEventListener('click', () => {
                    let src = image.getAttribute('src')
                    image.parentElement.previousElementSibling.children[0].setAttribute('src', src)
                })
            })
        </script>
        <div class="w-full mb-5 rounded-md">
            <div class="w-full flex justify-between items-center px-5 bg-white py-3">
                <div class="w-1/2 flex items-center gap-2 text-[14px] text-[#91949a]">
                    <a href="{{ route('home') }}">خانه</a>
                    <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5] "></span>
                    <a href="{{ route('pages.single', [$product->page->id]) }}">{{ $product->page->title }}</a>
                    <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5]"></span>
                    @foreach($product->categories as $category)
                        <span class="ml-3">{{ $category->title }}</span>
                    @endforeach
                </div>
                <div class="w-1/2 flex justify-end items-center gap-5">
                    <div class="text-xs font-bold text-blue-600 w-fit cursor-pointer" onclick="createSample()">ایجاد
                        نمونه کار
                    </div>
                    <div class="w-fit p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer flex justify-center items-center"
                         onclick='editIntroPro(this)'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                            <path fill="white"
                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col gap-2 px-5 py-3 bg-white mt-5">
                <h2 class="font-bold" id="title">{{ $product->title }}</h2>
                <p class="text-[#8a8e94] text-[13px]" id="description">{{ $product->description }}</p>
            </div>

                <div class="w-full @if(count($product->samples)) flex @else hidden @endif flex-col gap-2 my-5 px-5 py-3 bg-white">
                    <h2 class="font-bold">نمونه کار ها</h2>
                    <div class="flex flex-row items-center gap-5 overflow-x-auto" id="sampleBox">
                        @foreach($product->samples as $sample)
                            <div class="mb-5 relative samples" data-sample-id="{{ $sample->id }}">
                                <span onclick='editSample(this, "{{ $sample->id }}")'
                                   class="w-fit absolute top-2 left-10 flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                   title="ویرایش">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                         viewBox="0 0 512 512">
                                        <path fill="white"
                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                    </svg>
                                </span>
                                <span onclick='deleteSample(this, "{{ $sample->id }}")'
                                      class="w-fit absolute top-2 left-2 flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                      title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                         viewBox="0 0 448 512">
                                        <path fill="white"
                                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </span>
                                <div class="w-[176px] p-2 border-1 border-gray-300 rounded-md flex flex-col gap-3">
                                    <img src="{{ asset('storage/'.$sample->image) }}"
                                         class="size-40 rounded-sm object-cover" alt="">
                                    <span class="text-sm font-bold text-gray-800">{{ $sample->title }}</span>
                                    <p class="text-xs text-gray-600 h-8 max-h-8 text-justify ellipsis-2" title="{{ $sample->description }}">{{ $sample->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
{{--            @dd($product->attributes)--}}
            @if(json_decode($product->attributes))
                <div class="w-full flex flex-col gap-2 my-5 px-5 py-3 bg-white">
                    <h2 class="font-bold">جدول مشخصات</h2>
                    <div class="w-full" id="attributes">
                        @foreach (json_decode($product->attributes) as $attribute)
                            <div class="w-full flex border-b-1 border-[#e1e1e3] text-[12px] mohammad">
                                <div class="w-4/10 flex items-center px-3 py-2 bg-[#f2f2f2]">
                                    <span class="w-full">{{ $attribute->key }}</span>
                                </div>
                                <div class="w-6/10 px-3 flex items-center py-2">
                                    <span>{{ $attribute->value }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="w-full fixed top-0 right-0 h-full bg-black/50 backdrop-blur flex flex-row justify-end items-center invisible opacity-0 transition-all duration-300"
             id="box">
            <div class="w-full lg:w-[calc(100%-265px)] h-full flex justify-center items-center">
                <div class="w-10/12 bg-white hidden p-5 rounded-md relative" id="editProductForm">
                    <svg xmlns="http://www.w3.org/2000/svg" onclick="closeBox()"
                         class="size-5 cursor-pointer" viewBox="0 0 384 512">
                        <path
                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                    </svg>
                    <div class="flex items-start justify-center max-h-[410px] lg:max-h-[450px] overflow-y-auto [&::-webkit-scrollbar]:hidden">
                        <div class="rounded-2xl p-3 w-full lg:w-3/4 ">
                            <div class="text-center mb-8">
                                <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                            </div>
                            <div class="text-center mb-4">
                                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <span
                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500 requireMessages">الزامی
                                                است!</span>
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="text" name='introProTitle' id="introProTitle"
                                                    placeholder="عنوان محصول">
                                        </div>
                                    </div>
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">دسته محصول</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                            <select
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    onchange="addCats(this)" name='introProCat' id="introProCat"
                                                    multiple>
                                                <option value="0" disabled>انتخاب کنید</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                            class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>

                                        <input type="checkbox" name="show_in_home" id="show_in_home">

                                    </div>
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">تصویر محصول</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="file" name='introProImg' id="introProImg"
                                                    placeholder="تصویر محصول">
                                        </div>
                                    </div>
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">گالری تصاویر محصول</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="file" name='introProGallery' id="introProGallery"
                                                    placeholder="گالری تصاویر محصول" multiple>
                                        </div>
                                    </div>
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                        <label class="text-sm mb-1 mt-2.5 flex">توضیحات محصول</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <textarea
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="text" name='introProDescription' id="introProDescription"
                                                    placeholder="توضیحات محصول"></textarea>
                                        </div>
                                    </div>
                                    <div
                                            class="w-full flex flex-col gap-4 itmes-center max-md:flex-col lg:col-span-2"
                                            id="features">
                                    </div>
                                </div>
                                <div class="w-full text-center">
                                    <button type="submit" onclick="addAttribute()"
                                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                        افزودن ویژگی
                                    </button>
                                </div>
                                <div class="w-full text-left">
                                    <button type="submit" onclick="updateProduct(this)"
                                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="w-10/12 bg-white hidden p-5 rounded-md relative" id="createSampleForm">
                    <svg xmlns="http://www.w3.org/2000/svg" onclick="closeBox()"
                         class="size-5 cursor-pointer" viewBox="0 0 384 512">
                        <path
                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                    </svg>
                    <div class="flex items-start justify-center max-h-[410px] lg:max-h-[450px] overflow-y-auto [&::-webkit-scrollbar]:hidden">
                        <div class="rounded-2xl p-3 w-full lg:w-3/4 ">
                            <div class="text-center mb-8">
                                <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                            </div>
                            <div class="text-center mb-4">
                                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">عنوان نمونه کار</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <span
                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500 requireMessages">الزامی
                                                است!</span>
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="text" name='sampleCreateTitle' id="sampleCreateTitle"
                                                    placeholder="عنوان نمونه کار">
                                        </div>
                                    </div>


                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">تصویر نمونه کار</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="file" name='sampleCreateImage' id="sampleCreateImage"
                                                    placeholder="تصویر نمونه کار" required>
                                        </div>
                                    </div>

                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                        <label class="text-sm mb-1 mt-2.5 flex">توضیحات نمونه کار</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <textarea
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    name='sampleCreateDescription' id="sampleCreateDescription"
                                                    placeholder="توضیحات نمونه کار"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="w-full text-left">
                                    <button type="submit" onclick="storeSample(this)"
                                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="w-10/12 bg-white hidden p-5 rounded-md relative" id="editSampleForm">
                    <svg xmlns="http://www.w3.org/2000/svg" onclick="closeBox()"
                         class="size-5 cursor-pointer" viewBox="0 0 384 512">
                        <path
                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                    </svg>
                    <div class="flex items-start justify-center max-h-[410px] lg:max-h-[450px] overflow-y-auto [&::-webkit-scrollbar]:hidden">
                        <div class="rounded-2xl p-3 w-full lg:w-3/4 ">
                            <div class="text-center mb-8">
                                <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                            </div>
                            <div class="text-center mb-4">
                                <input type="hidden" name="sampleId" id="sampleId">
                                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">عنوان نمونه کار</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <span
                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500 requireMessages">الزامی
                                                است!</span>
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="text" name='sampleEditTitle' id="sampleEditTitle"
                                                    placeholder="عنوان نمونه کار">
                                        </div>
                                    </div>


                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">تصویر نمونه کار</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="file" name='sampleEditImage' id="sampleEditImage"
                                                    placeholder="تصویر نمونه کار" required>
                                        </div>
                                    </div>

                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                        <label class="text-sm mb-1 mt-2.5 flex">توضیحات نمونه کار</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <textarea
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    name='sampleEditDescription' id="sampleEditDescription"
                                                    placeholder="توضیحات نمونه کار"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="w-full text-left">
                                    <button type="submit" onclick="updateSample(this)"
                                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <div class="fixed w-full h-dvh bg-black/50 backdrop-blur top-0 right-0 invisible opacity-0 transition-all duration-300 flex flex-row items-center justify-center" id="showBox"></div>


    <script>

        let samples = document.querySelectorAll('.samples')
        let showBox = document.getElementById('showBox')
        samples.forEach((item)=>{
            item.addEventListener('click', ()=>{
                showBox.innerHTML = ""
                let image = item.children[2].children[0].getAttribute('src')
                let title = item.children[2].children[1].innerText
                let description = item.children[2].children[2].innerText
                showBox.classList.remove('invisible')
                showBox.classList.remove('opacity-0')
                let div = document.createElement('div')
                div.classList = 'w-3/4 p-5 rounded-md flex flex-col gap-3 bg-white relative'
                div.innerHTML = `
                    <span class="absolute -top-3 -right-3 bg-white size-7 flex items-center justify-center rounded-full cursor-pointer" onclick="closeShowBox()">❌</span>
                    <img src="${image}" class="size-60 mx-auto" alt="">
                    <span class="font-bold text-gray-800">${title}</span>
                    <p class="text-gray-600 text-justify max-h-[150px] overflow-y-auto">${description}</p>
                `
                showBox.appendChild(div)
            })
        })

        function closeShowBox(){
            showBox.classList.add('invisible')
            showBox.classList.add('opacity-0')
        }

        let box = document.getElementById('box')
        let features = document.getElementById("features")
        let editProductForm = document.getElementById('editProductForm')
        let createSampleForm = document.getElementById('createSampleForm')
        let editSampleForm = document.getElementById('editSampleForm')

        let title = document.getElementById('title')
        let image = document.getElementById('image')
        let description = document.getElementById('description')
        let attributes = document.getElementById('attributes')

        let introProTitle = document.getElementById('introProTitle')
        let introProCat = document.getElementById('introProCat')
        let introProImg = document.getElementById('introProImg')
        let introProGallery = document.getElementById('introProGallery')
        let introProDescription = document.getElementById('introProDescription')
        let show_in_home = document.getElementById('show_in_home')

        let sampleCreateTitle = document.getElementById('sampleCreateTitle')
        let sampleCreateImage = document.getElementById('sampleCreateImage')
        let sampleCreateDescription = document.getElementById('sampleCreateDescription')

        let sampleEditTitle = document.getElementById('sampleEditTitle')
        let sampleEditImage = document.getElementById('sampleEditImage')
        let sampleEditDescription = document.getElementById('sampleEditDescription')
        let sampleEditId = document.getElementById('sampleId')

        let sampleBox = document.getElementById('sampleBox')

        let requireMessages = document.querySelectorAll('.requireMessages')

        function editIntroPro(el) {
            let children = introProCat.children
            let icon = el.innerHTML
            el.innerHTML = `
            <div class="w-4 h-4 border-2 border-white border-t-green-500 rounded-full animate-spin"></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introPro.editSingle') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'page_id': "{{ $product->page->id }}",
                    'product_id': "{{ $product->id }}"
                },
                success: function (data) {
                    console.log(data)
                    if (data.product.show_in_home == 1) {
                        show_in_home.checked = true
                    }
                    introProCat.innerHTML = ""
                    features.innerHTML = ""
                    el.innerHTML = icon
                    introProTitle.value = data.product.title
                    introProDescription.value = data.product.description
                    data.categories.forEach((cat) => {
                        let option = document.createElement('option')
                        option.value = cat.id
                        option.innerText = cat.title
                        introProCat.appendChild(option)
                    })
                    for (let child of children) {
                        data.product.categories.forEach((cat) => {
                            if (cat.id == child.value) {
                                child.selected = true
                            }
                        })
                    }
                    if (data.product.attributes) {
                        data.product.attributes.forEach((attr) => {
                            let attrBox = document.createElement('div')
                            attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
                            attrBox.innerHTML = `
                                <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
                                    ❌
                                </span>
                                <input
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
                                    type="text" value="${attr.key}"
                                    placeholder="نام ویژگی">
                                <input
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
                                    type="text" value="${attr.value}"
                                    placeholder="مقدار ویژگی">

                                `
                            attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                                attrBox.remove();
                            });
                            features.appendChild(attrBox)
                        })
                    }
                    box.classList.remove('invisible')
                    box.classList.remove('opacity-0')
                    editProductForm.classList.remove('hidden')
                },
                error: function () {
                    console.log('error')
                }
            })

        }

        function addCats(el) {
            categories = []

            let arr = el.selectedOptions
            for (let i = 0; i < arr.length; i++) {
                categories.push(arr[i].value)
            }

        }

        function closeBox() {
            requireMessages.forEach((item) => {
                if (!item.classList.contains('opacity-0')) {
                    item.calssList.add('opacity-0')
                }
            })
            box.classList.add('invisible')
            box.classList.add('opacity-0')
            editProductForm.classList.add('hidden')
            createSampleForm.classList.add('hidden')
            editSampleForm.classList.add('hidden')
        }

        function addAttribute() {
            let attrBox = document.createElement('div')
            attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
            attrBox.innerHTML = `
                <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
                    ❌
                </span>
                <input
                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
                    type="text"
                    placeholder="نام ویژگی">
                <input
                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
                    type="text"
                    placeholder="مقدار ویژگی">

                `
            attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                attrBox.remove();
            });
            features.appendChild(attrBox)
        }

        function updateProduct(el) {
            if (introProTitle.value == "") {
                el.parentElement.parentElement.children[0].children[1].children[0].classList.remove('opacity-0')
            } else {
                let buttonText = el.innerText
                el.setAttribute('disabled', true)
                el.innerHTML = `<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`
                let formData = new FormData()
                if (show_in_home.checked) {
                    formData.append('show_in_home', 1)
                }
                formData.append('title', introProTitle.value)
                introProImg.files[0] && formData.append('main_image', introProImg.files[0])
                formData.append('page_id', "{{ $product->page->id }}")
                formData.append('intro_product_id', "{{ $product->id }}")
                if (introProGallery.files.length > 0) {
                    for (let i = 0; i < introProGallery.files.length; i++) {
                        formData.append('gallery[]', introProGallery.files[i])
                    }
                }
                let children = introProCat.children
                let array = [];
                for (let child of children) {
                    if (child.selected == true) {
                        formData.append('categories[]', child.value)
                    }
                }
                const rows = document.querySelectorAll('#features .feature-row');
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
                formData.append('description', introProDescription.value)
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
                        console.log(data)
                        title.innerText = data.title
                        description.innerText = data.description

                        image.removeAttribute('src')


                        image.setAttribute('src', "{{ asset('storage/') }}/" + data.main_image)
                        attributes.innerHTML = ""

                        if (data.attributes) {

                            data.attributes.forEach((attr) => {
                                let element = document.createElement('div')
                                element.classList = "w-full flex border-b-1 border-[#e1e1e3] text-[12px]"
                                element.innerHTML = `
                                    <div class="w-4/10 flex items-center px-3 py-2 bg-[#f2f2f2] ">
                                        <span class="w-full">${attr.key}</span>
                                    </div>
                                    <div class="w-6/10 px-3 flex items-center py-2">
                                        <span>${attr.value}</span>
                                    </div>
                                `
                                attributes.appendChild(element)
                            })

                        }
                        el.innerHTML = buttonText
                        el.removeAttribute('disabled')
                        closeBox()
                    },
                    error: function () {
                        console.log('error')
                    }
                })
            }
        }


        function createSample() {
            box.classList.remove('invisible')
            box.classList.remove('opacity-0')
            createSampleForm.classList.remove('hidden')
        }

        function storeSample(el) {
            if (sampleCreateTitle.value == "") {
                el.parentElement.parentElement.children[0].children[0].children[1].children[0].classList.remove('opacity-0')
            } else {
                let buttonText = el.innerText
                el.setAttribute('disabled', true)
                el.innerHTML = `<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`
                let formData = new FormData()
                formData.append('title', sampleCreateTitle.value)
                formData.append('description', sampleCreateDescription.value)
                sampleCreateImage.files[0] && formData.append('image', sampleCreateImage.files[0])
                formData.append('product_id', "{{ $product->id }}")
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('sample.store') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        console.log(data)
                        let element = document.createElement('div')
                        element.setAttribute('data-sample-id', data.id)
                        element.classList = 'mb-5 relative samples'
                        element.innerHTML = `
                        <span onclick='editSample(this, ${data.id})'
                           class="w-fit absolute top-2 left-10 flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                           title="ویرایش">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                 viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </span>
                        <span onclick='deleteSample(this, ${data.id})'
                          class="w-fit absolute top-2 left-2 flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                          title="حذف">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </span>
                        <div class="w-[176px] p-2 border-1 border-gray-300 rounded-md flex flex-col gap-3">
                            <img src="${data.image ? '{{ asset('storage/') }}/' + data.image : '/images/default-product.png'}" class="size-40 rounded-sm object-cover" alt="">
                            <span class="text-sm font-bold text-gray-800">${data.title}</span>
                            <p class="text-xs text-gray-600 h-8 max-h-8 text-justify ellipsis-2" title="${data.description}">${data.description}</p>
                        </div>
                        `
                        sampleBox.appendChild(element)
                        el.innerHTML = buttonText
                        el.removeAttribute('disabled')
                        sampleCreateTitle.value = ""
                        sampleCreateImage.value = ""
                        sampleCreateDescription.value = ""
                        closeBox()
                    },
                    error: function () {
                        console.log('error')
                    }
                })
            }
        }

        function deleteSample(el, sampleId) {
            el.innerHTML = `<div class="w-4 h-4 border-2 border-gray-200 border-t-red-500 rounded-full animate-spin"></div>`
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('sample.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'sample_id': sampleId
                },
                success: function (data) {
                    el.parentElement.remove()
                },
                error: function () {
                    console.log('error')
                }
            })
        }

        function editSample(el, sampleId){
            let icon = el.innerHTML
            el.innerHTML = `<div class="w-4 h-4 border-2 border-gray-200 border-t-green-500 rounded-full animate-spin"></div>`
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('sample.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'sample_id': sampleId
                },
                success: function(data){
                    console.log(data)
                    el.innerHTML = icon
                    sampleEditTitle.value = data.title
                    sampleEditDescription.value = data.description
                    sampleEditId.value = data.id
                    box.classList.remove('invisible')
                    box.classList.remove('opacity-0')
                    editSampleForm.classList.remove('hidden')
                },
                error: function(){
                    console.log('error')
                }
            })
        }

        function updateSample(el){
            if (sampleEditTitle.value == "") {
                el.parentElement.parentElement.children[0].children[0].children[1].children[0].classList.remove('opacity-0')
            } else {
                let samples = document.querySelectorAll('.samples')
                let buttonText = el.innerText
                el.setAttribute('disabled', true)
                el.innerHTML = `<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`
                let formData = new FormData()
                formData.append('title', sampleEditTitle.value)
                formData.append('description', sampleEditDescription.value)
                formData.append('sample_id', sampleEditId.value)
                sampleEditImage.files[0] && formData.append('image', sampleEditImage.files[0])
                formData.append('product_id', "{{ $product->id }}")
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('sample.update') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        console.log(data)
                        samples.forEach((item)=>{
                            if(item.getAttribute('data-sample-id') == data.id){
                                item.children[2].children[0].setAttribute('src', "{{ asset('storage') }}/"+data.image)
                                item.children[2].children[1].innerText = data.title
                                item.children[2].children[2].innerText = data.description
                            }
                        })

                        el.innerHTML = buttonText
                        el.removeAttribute('disabled')
                        sampleEditTitle.value = ""
                        sampleEditImage.value = ""
                        sampleEditDescription.value = ""
                        closeBox()
                    },
                    error: function () {
                        console.log('error')
                    }
                })
            }
        }
    </script>
@endsection