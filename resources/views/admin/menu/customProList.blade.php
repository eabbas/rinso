@extends('admin.app.panel')
@section('title', 'محصولات شخصی سازی شده کسب وکار')
@section('content')
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->



    <div class="w-full min-h-screen pb-10 pt-6 bg-gradient-to-b from-blue-50 to-white">
        <div class="w-11/12 mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">محصولات شخصی‌سازی شده</h1>
                        <p class="text-blue-600 font-medium mt-1">{{ $career->name ?? 'کسب و کار' }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                        <div class="flex items-center gap-2 text-blue-600 bg-blue-50 px-4 py-2 rounded-lg">
                            {{-- <svg class="size-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                    <path fill-rule="evenodd"
                                        d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                        clip-rule="evenodd" />
                                </svg> --}}
                            {{-- <span class="text-sm font-medium">{{ count($career->custom_product ?? []) }} محصول</span> --}}
                        </div>
                        <div onclick="openCPform()"
                            class="flex items-center gap-2 bg-linear-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer">
                            <span class="text-sm font-medium">محصول جدید</span>
                        </div>
                    </div>
                </div>
                <div class="h-1 w-24 bg-linear-to-r from-blue-500 to-blue-300 rounded-full"></div>
            </div>
            <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form"
                id="createCPform">
                <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative"
                    id="closeCreateCPform">
                    <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                        onclick="closeForm()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                            <path fill="gray"
                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                        </svg>
                    </div>
                    <form action="{{ route('cp.store') }}" method="post" enctype="multipart/form-data"
                        class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
                        <div id="loadingCP"
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg z-50">
                        </div>
                        @csrf
                        <input type="hidden" name="career_id" value="{{ $career->id }}">
                        {{-- <div class="mb-4 relative">
                            <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                            <label for="title" class="block text-sm font-medium mb-2">
                                عنوان محصول
                            </label>
                            <input type="text" name="title" id="title" required
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none createCPRequired">
                        </div>
                        <div class="mb-4 mt-6">
                            <label for="title" class="block text-sm font-medium mb-2">
                                تصویر محصول
                            </label>
                            <input type="file" name="customProductImage" id="customProductImage"
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4 relative">
                            <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                            <label for="title" class="block text-sm font-medium mb-2">
                                محدودیت متریال
                            </label>
                            <input type="number" name="material_limit" id="material_limit" required
                                placeholder="محدودیت متریال را وارد کنید"
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none createCPRequired">
                        </div>


                        <div class="mb-4 mt-6">
                            <label for="title" class="block text-sm font-medium mb-2">
                                توضیحات
                            </label>
                            <textarea type="text" name="description" id="description" rows="4"
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none"></textarea>
                        </div> --}}

                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div>
                                <label for="title" class="block text-sm font-medium mb-2">
                                    عنوان محصول
                                </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                    <span class="absolute -bottom-5 left-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                                    <input class="p-4 w-full focus:outline-none rounded-lg text-sm font-bold createCPRequired" type="text" id="title"
                                        name='title' required placeholder="عنوان محصول">
                                </div>
                            </div>
                            <div>
                                <label for="title" class="block text-sm font-medium mb-2">
                                    تصویر محصول
                                </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold" type="file"
                                        name='customProductImage' id="customProductImage" required>
                                </div>
                            </div>
                            <div>
                                <label for="title" class="block text-sm font-medium mb-2">
                                    محدودیت متریال
                                </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                    <span class="absolute -bottom-5 left-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                                    <input class="p-4 w-full rounded-lg focus:outline-none text-sm font-bold createCPRequired" type="number"
                                        name='material_limit' id="material_limit" required placeholder="1">
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label for="title" class="block text-sm font-medium mb-2">
                                    توضیحات
                                </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold" type="number"
                                        name='description' rows="4" required id="description" placeholder="توضیحات محصول"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="flex justify-end gap-3 mt-3">
                            <button onclick="storeCP(event)"
                                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                                ثبت
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-xl shadow-lg border border-blue-100 overflow-hidden">
            <!-- Table Header -->
            <div class="w-full flex flex-col pb-4">
                <div class="bg-white rounded-lg">

                    <h2 class="text-lg font-bold text-gray-800 p-4 text-center">محصولات شخصی سازی شده</h2>

                    <form action="{{ route('cp.deleteAll') }}" method="post" class="flex flex-col gap-5">
                        @csrf
                        <div class="w-11/12 mx-auto flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-3">
                                <input type="checkbox" id="all" onchange="checkAll()">
                                <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                            </div>
                            <div class="flex justify-center">
                                <button
                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                    title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white"
                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="w-11/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                            <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                                <div class="px-1 text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                                    <div class="w-10 lg:w-full h-10"></div>
                                </div>
                                <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                    <span class="block w-10 lg:w-full">ردیف</span>
                                </div>
                                <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                    <span class="block w-20 lg:w-full">تصویر</span>
                                </div>
                                <div
                                    class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                    <span class="block w-20 lg:w-full">نام محصول</span>
                                </div>
                                <div
                                    class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                    <span class="block w-20 lg:w-full">حد</span>
                                </div>
                                <div
                                    class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-6">
                                    <span class="block w-[454px] lg:w-full">عملیات</span>
                                </div>

                            </div>
                            <div class="bg-white divide-y divide-[#f1f1f4]" id="custom_product_section">
                                @php
                                    $i = 1;
                                    $hasProduct = false;
                                @endphp
                                @foreach ($career->custom_product as $index => $custom_product)
                                    @php $hasProduct=true; @endphp
                                    {{-- @dd($custom_product) --}}
                                    <div class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] newParameters"
                                        data-cp-id="{{ $custom_product->id }}">
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <div class="w-10 lg:w-full">
                                                <input type="checkbox" class="check" name="custom_products[]"
                                                    value="{{ $custom_product->id }}">
                                            </div>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-10 lg:w-full">{{ $i }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                            <div class="w-20 lg:w-full">
                                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                    src="{{ asset('storage/' . $custom_product->image) }}">
                                            </div>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                            <span class="block w-20 lg:w-full">{{ $custom_product->title }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-20 lg:w-full">{{ $custom_product->material_limit }}</span>
                                        </div>

                                        <div class="col-span-6">
                                            <div class="w-[454px] lg:w-full grid grid-cols-5 items-center">
                                                <div class="h-full flex items-center">
                                                    <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3 gap-4">
                                                        <li class="flex justify-center">
                                                            <a href="{{ route('cp.single', [$custom_product]) }}"
                                                                class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm"
                                                                title="مشاهده">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                                    viewBox="0 0 576 512">
                                                                    <path fill="white"
                                                                        d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="flex justify-center">
                                                            <div onclick='editCP("{{ $custom_product->id }}")'
                                                                class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                                title="ویرایش">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                                    viewBox="0 0 512 512">
                                                                    <path fill="white"
                                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                                </svg>
                                                            </div>
                                                        </li>
                                                        <li class="flex justify-center">
                                                            <div onclick='deleteCP("{{ $custom_product->id }}")'
                                                                class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                                title="حذف">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                                    viewBox="0 0 448 512">
                                                                    <path fill="white"
                                                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                                </svg>
                                                        </li>
                                                    </ul>
                                                </div>



                                                <div class=" py-4 flex items-center justify-center cursor-pointer">
                                                    <div onclick='openCPVform("{{ $custom_product->id }}")'
                                                        class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group cursor-pointer">
                                                        <span class="text-xs font-medium mt-1">ایجاد نوع</span>
                                                    </div>
                                                </div>

                                                <!-- لیست انواع محصولات -->

                                                <div class="py-4 flex items-center justify-center cursor-pointer">
                                                    <a href="{{ route('cpv.list', [$custom_product]) }}"
                                                        class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                                        <span class="text-xs font-medium mt-1">لیست انواع</span>
                                                    </a>
                                                </div>
                                                <div class="py-4 flex items-center justify-center cursor-pointer text-blue-600 transition-all duration-200 gap-2 px-4"
                                                    onclick='openCform("{{ $custom_product->id }}")'>
                                                    <span class="block w-full text-center text-xs font-medium"> ایجاد
                                                        دسته</span>
                                                </div>
                                                <div
                                                    class="py-4 flex items-center justify-center cursor-pointer text-blue-600 transition-all duration-200 gap-2 px-4">
                                                    <a href="{{ route('cp.category_list', [$custom_product]) }}"
                                                        class="block w-full text-center text-xs text-indigo-600 hover:text-indigo-800 lg:text-sm font-medium transition-colors">
                                                        دسته ها
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                @if (!$hasProduct)
                                    <div class="py-12 text-center" id="no_products_message">
                                        <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ محصولی یافت نشد</h3>
                                        <p class="text-gray-500 text-sm mb-6">هنوز هیچ محصولی ایجاد نکرده‌اید</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form"
        id="createCform">
        <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative"
            id="closeCreateCform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray"
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                </svg>
            </div>
            <form action="{{ route('custmCategory.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
                @csrf
                <div id="categoryLoading"
                    class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg z-50">
                </div>
                <div class="mb-4 relative">
                    <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                    <label for="title" class="block text-sm font-medium mb-2">
                        عنوان دسته بندی
                    </label>
                    <input type="text" name="titleCategory" id="titleCustomCategory" required
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none categoryRequired">
                </div>
                <div class="mb-4 flex flex-row gap-5 mt-6">
                    <input type="checkbox" name="requiredCategory" id="requiredCustomCategory" value="1"
                        class="p-1 border rounded focus:border-blue-500">
                    <label for="required" class="text-sm font-medium">
                        الزامی بودن یا نبودن
                    </label>
                </div>

                <div class="mb-6 relative mt-6">
                    <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                    <label for="max_item_amount" class="block text-sm font-medium mb-2">
                        حداکثر تعداد آیتم
                    </label>
                    <input type="number" name="max_item_amount" id="max_item_amount_customCategory" required
                        min="1"
                        class="w-full p-2 rounded border-1 border-gray-300 rounded focus:border-blue-500 focus:outline-none categoryRequired">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit" onclick="Categorystore(event)"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                        ثبت
                    </button>
                </div>
                <input type="hidden" name="custom_pro_id" id="custom_pro_id_customCategory">
            </form>
        </div>
    </div>

    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form"
        id="createCPVform">
        <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative"
            id="closeCreateCPVform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray"
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                </svg>
            </div>

            <form action="{{ route('cpv.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative max-h-[500px] overflow-y-auto [&::-webkit-scrollbar]:hidden">
                <div id="cpvLoading"
                    class="w-full absolute h-full right-0 bg-white items-center justify-center hidden rounded-lg z-50">
                </div>
                @csrf
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3">
                    <div class="relative">
                        <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                        <label for="title" class="block text-sm font-medium mb-2">
                            عنوان دسته بندی
                        </label>
                        <input type="text" name="title" id="titleCPV" required
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none cpvRequired">
                    </div>
    
                    <div>
                        <label for="title" class="block text-sm font-medium mb-2">
                            تصویر
                        </label>
                        <input type="file" name="cpvImage" id="cpvImage" required
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                    </div>
                    <!-- حداقل واحد مقدار -->
                    <div class="relative">
                        <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                        <label for="min_amount_unit" class="block text-sm font-medium text-gray-700 mb-2">
                            حداقل واحد مقدار
                        </label>
                        <input type="number" name="min_amount_unit" id="min_amount_unit_cpv"
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none cpvRequired">
                    </div>
                    <!-- مدت زمان -->
                    <div class="relative">
                        <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                            مدت زمان آماده سازی (دقیقه)
                        </label>
                        <input type="number" name="duration" id="durationCPV" min="1"
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none cpvRequired">
                    </div>
                    <!-- محصول اصلی -->
                    @if (isset($custom_product))
                        <input type="hidden" name="custom_product_id" id="custom_product_id_variant">
                    @endif
                    <!-- توضیحات -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2 mt-2">
                            توضیحات
                        </label>
                        <textarea name="description" id="descriptionCPV" rows="4"
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none"></textarea>
                    </div>
                </div>
                <!-- دکمه‌های فرم -->
                <div class="flex justify-end space-x-2 pt-4">
                    <button type="submit" onclick="cpvStore(event)"
                        class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                        ثبت
                    </button>
                </div>
            </form>

        </div>
    </div>
    @if (isset($custom_product))
        <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form"
            id="editCPform">
            <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative"
                id="closeEditCform">
                <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                    onclick="closeForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                        <path fill="gray"
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                    </svg>
                </div>
                <form action="{{ route('cp.update') }}" method="post" enctype="multipart/form-data"
                    class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
                    <div id="editCPloading"
                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                    </div>
                    @csrf
                    <input type="hidden" name="id" id="custom_product_id">
                    <input type="hidden" name="career_id" id="careerId" value="{{ $career->id }}">
                    <div class="mb-4">
                        <label for="editTitleCP" class="block text-sm font-medium mb-2">
                            عنوان
                        </label>
                        <input type="text" name="editTitleCP" id="editTitleCP" required
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                    </div>
                    <div class="mb-4 mt-5">
                        <label for="title" class="block text-sm font-medium mb-2">
                            تصویر محصول
                        </label>
                        <input type="file" name="customProductImageUpdate" id="customProductImageUpdate"
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium mb-2">
                            محدودیت متریال
                        </label>
                        <input type="number" name="material_limit" id="material_limit_CP" required
                            placeholder="محدودیت متریال را وارد کنید"
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                    </div>


                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium mb-2">
                            توضیحات
                        </label>
                        <textarea type="text" name="description" id="editDescriptionCP" rows="4"
                            class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none"></textarea>
                    </div>


                    <div class="flex justify-end gap-3">
                        <button onclick='updateCP(event, "{{ $custom_product->id }}")'
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                            ثبت
                        </button>
                    </div>
                    <input type="hidden" name="custom_pro_id" id="custom_pro_id_customCategory">
                </form>
            </div>
        </div>
    @endif
    </div>



    <script>
        let i = "<?php echo $i; ?>";
        let createCPform = document.getElementById('createCPform')
        let createCategoryform = document.getElementById('createCform')
        let createCustomVariantform = document.getElementById('createCPVform')
        let custom_pro_id_customCategory = document.getElementById('custom_pro_id_customCategory')
        let cpFormEdit = document.getElementById('editCPform')

        let forms = document.querySelectorAll(".form")
        let cpTitleEdit = document.getElementById('editTitleCP')
        let CPeditDescription = document.getElementById('editDescriptionCP')
        let CPmaterialLimit = document.getElementById('material_limit_CP')
        let custom_product_id = document.getElementById('custom_product_id')
        let careerId = document.getElementById('careerId')

        let title = document.getElementById('title')
        let description = document.getElementById('description')
        let customProductImage = document.getElementById('customProductImage')
        let material_limit = document.getElementById('material_limit')
        let custom_product_section = document.getElementById('custom_product_section')

        let titleCustomCategory = document.getElementById('titleCustomCategory')
        let category = document.getElementById('requiredCustomCategory')
        let max_item_amount_customCategory = document.getElementById('max_item_amount_customCategory')

        let cpvTitle = document.getElementById('titleCPV')
        let cpvMinAmount = document.getElementById('min_amount_unit_cpv')
        let cpvDuration = document.getElementById('durationCPV')
        let cpvDescription = document.getElementById('descriptionCPV')
        let custom_product_id_variant = document.getElementById('custom_product_id_variant')
        let customProductImageUpdate = document.getElementById('customProductImageUpdate')


        let idCareer = document.getElementById('careerId')
        let imageCPV = document.getElementById('cpvImage')


        let CPloading = document.getElementById('loadingCP')
        let cpvLoading = document.getElementById('cpvLoading')
        let editloading = document.getElementById('editCPloading')
        let categoryLoading = document.getElementById('categoryLoading')



        function editCP(id) {
            cpFormEdit.classList.remove('invisible')
            cpFormEdit.classList.remove('opacity-0')
            editloading.classList.remove('hidden')
            editloading.classList.add('flex')
            editloading.innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('cp.edit') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(data) {
                    editloading.classList.remove('flex')
                    editloading.classList.add('hidden')
                    custom_product_id.value = data.id
                    cpTitleEdit.value = data.title
                    CPeditDescription.value = data.description
                    CPmaterialLimit.value = data.material_limit
                },
                error: function() {
                    alert('خطا در دریافت داده ها')
                }
            })
        }

        function updateCP(ev) {

            let newParameters = document.querySelectorAll('.newParameters')
            ev.preventDefault()
            editloading.classList.remove('hidden')
            editloading.classList.add('flex')
            editloading.innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `

            let formData = new FormData()
            formData.append('id', custom_product_id.value)
            formData.append('career_id', careerId.value)
            formData.append('title', cpTitleEdit.value)
            formData.append('description', CPeditDescription.value)
            formData.append('material_limit', CPmaterialLimit.value)
            if (customProductImageUpdate.files.length > 0) {
                formData.append('customProductImageUpdate', customProductImageUpdate.files[0])
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('cp.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,

                success: function(data) {
                    editloading.classList.remove('flex')
                    editloading.classList.add('hidden')
                    editloading.innerHTML = ''
                    newParameters.forEach((element) => {
                        if (element.getAttribute('data-cp-id') == data.id) {
                            element.children[2].children[0].innerHTML = `
                                <img src="${data.image ? '{{ asset('storage/') }}/' + data.image : '/images/default-product.png'}"
                                alt="${data.title}" class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md">
                            `
                            element.children[3].children[0].innerText = data.title
                            element.children[4].children[0].innerText = data.material_limit
                        }
                    })
                    console.log(data)
                    closeForm()
                },
                error: function() {
                    alert('خطا در ارسال داده')
                    editloading.classList.remove('flex')
                    editloading.classList.add('hidden')
                    editloading.innerHTML = ''
                }

            })
        }

        function deleteCP(id) {
            let newParameters = document.querySelectorAll('.newParameters')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('cp.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id,
                },
                success: function(data) {
                    newParameters.forEach((element) => {
                        if (element.getAttribute('data-cp-id') == id) {
                            element.remove()
                        }
                    })
                    if (custom_product_section.children.length === 0) {
                        custom_product_section.innerHTML = `
                        <div class="py-12 text-center">
                            <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ محصولی یافت نشد</h3>
                            <p class="text-gray-500 text-sm mb-6">هنوز هیچ محصولی ایجاد نکرده‌اید</p>
                        </div>
                    `;
                    }
                },
                error: function() {
                    alert('خطا در ارسال داده')
                }

            })
        }

        function openCPform() {
            createCPform.classList.remove('invisible')
            createCPform.classList.remove('opacity-0')
        }

        function openCform(cpId) {
            createCategoryform.classList.remove('invisible')
            createCategoryform.classList.remove('opacity-0')
            custom_pro_id_customCategory.value = cpId
        }

        function openCPVform(cpId) {
            createCustomVariantform.classList.remove('invisible')
            createCustomVariantform.classList.remove('opacity-0')
            custom_product_id_variant.value = cpId
        }

        function closeForm() {
            forms.forEach((form) => {
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
        }


        function storeCP(ev) {
            // let errorText =""
            ev.preventDefault()
            let createCPRequired = document.querySelectorAll('.createCPRequired')
            let flag = true
            createCPRequired.forEach((item) => {
                item.classList.remove('border-red-500')
                item.parentElement.children[0].classList.add('opacity-0')
            })
            createCPRequired.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })
            if (flag) {
                CPloading.classList.remove('hidden')
                CPloading.classList.add('flex')
                CPloading.innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `


                let formData = new FormData()

                formData.append('career_id', "{{ $career->id }}")
                formData.append('title', title.value)
                if (customProductImage.files[0]) {
                    formData.append('customProductImage', customProductImage.files[0])
                }
                // formData.append('customProductImage' ,customProductImage.files[0])
                formData.append('material_limit', material_limit.value)
                formData.append('description', description.value)

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('cp.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        CPloading.classList.remove('flex')
                        CPloading.classList.add('hidden')
                        CPloading.innerHTML = ''
                        title.value = ""
                        description.value = ""
                        material_limit.value = ""

                        let emptyMessage = document.getElementById('no_products_message')
                        if (emptyMessage) {
                            emptyMessage.remove()
                        }

                        // شماره ردیف جدید
                        // let rowNumber = custom_product_section.children.length + 1

                        let div = document.createElement('div')
                        div.classList =
                            "w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] newParameters"
                        div.setAttribute('data-cp-id', data.id)

                        let element = `
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <div class="w-10 lg:w-full">
                                    <input type="checkbox" class="check" name="custom_products[]"
                                        value="${data.id}">
                                </div>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-10 lg:w-full">${i}</span>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                <div class="w-20 lg:w-full">
                                    <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                        src="${data.image ? '{{ asset('storage/') }}/' + data.image : '/images/default-product.png'}"
                                        alt="${data.title}">
                                </div>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                <span class="block w-20 lg:w-full">${ data.title }</span>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-20 lg:w-full">${ data.material_limit }</span>
                            </div>

                            <div class="col-span-6">
                                <div
                                    class="w-[454px] lg:w-full grid grid-cols-5 divide-y divide-x divide-[#f1f1f4] items-center">
                                    <div class="h-full flex items-center">
                                        <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3 gap-4">
                                            <li class="flex justify-center">
                                                <a href="{{ url('customProducts/show/${data.id}') }}"
                                                    class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm"
                                                    title="مشاهده">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 576 512">
                                                        <path fill="white"
                                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="flex justify-center">
                                                <div onclick='editCP("${ data.id }")' class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                    title="ویرایش">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 512 512">
                                                        <path fill="white"
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li class="flex justify-center">
                                                <div onclick='deleteCP("${data.id}")'
                                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                    title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 448 512">
                                                        <path fill="white"
                                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                    </svg>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>



                                    <div class=" py-4 flex items-center justify-center cursor-pointer">
                                        <div onclick="openCPVform(${data.id})"
                                            class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group cursor-pointer">
                                            <span class="text-xs font-medium mt-1">ایجاد نوع</span>
                                        </div>
                                    </div>

                                    <!-- لیست انواع محصولات -->

                                    <div class="py-4 flex items-center justify-center cursor-pointer">
                                        <a href="{{ url('customProductVariants/variantList/${data.id}') }}"
                                            class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                            <span class="text-xs font-medium mt-1">لیست انواع</span>
                                        </a>
                                    </div>
                                    <div onclick="openCform(${data.id})" class="py-4 flex items-center justify-center cursor-pointer text-blue-600 transition-all duration-200 gap-2 px-4"
                                        >
                                        <span class="block w-full text-center text-xs font-medium"> ایجاد
                                            دسته</span>
                                    </div>
                                    <div class="py-4 flex items-center justify-center cursor-pointer text-blue-600 transition-all duration-200 gap-2 px-4"
                                        >
                                        <a href="{{ url('customCategories/custmoCategoryList/${data.id}') }}"
                                        class="block w-full text-center text-xs text-indigo-600 hover:text-indigo-800 lg:text-sm font-medium transition-colors">
                                        دسته ها 
                                    </a>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>

                `

                        div.innerHTML = element
                        custom_product_section.appendChild(div)
                        closeForm()
                        i++

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error)
                        alert('خطا در ارسال داده')
                        CPloading.classList.remove('flex')
                        CPloading.classList.add('hidden')
                        CPloading.innerHTML = ''
                    }
                })
            }
        }

        function Categorystore(ev) {
            ev.preventDefault()
            // حذف خطاهای قبلی
            let categoryRequired = document.querySelectorAll('.categoryRequired')
            categoryRequired.forEach((item) => {
                item.classList.remove('border-red-500')
                item.parentElement.children[0].classList.add('opacity-0')
            })
            let flag = true
            categoryRequired.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })
            if (flag) {


                categoryLoading.classList.remove('hidden')
                categoryLoading.classList.add('flex')
                categoryLoading.innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `
                let checkBoxStatus = category.checked

                category.value = 0

                if (checkBoxStatus) {
                    category.value = 1
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('custmCategory.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'title': titleCustomCategory.value,
                        'required': category.value,
                        'max_item_amount': max_item_amount_customCategory.value,
                        'custom_pro_id': custom_pro_id_customCategory.value,
                    },
                    success: function(data) {
                        console.log(data)
                        categoryLoading.classList.remove('flex')
                        categoryLoading.classList.add('hidden')
                        categoryLoading.innerHTML = ''
                        custom_pro_id_customCategory.value = ""
                        max_item_amount_customCategory.value = ""
                        category.checked = 0
                        titleCustomCategory.value = ""
                        customProductImage.value = ""
                        closeForm()
                    },
                    error: function() {
                        alert('خطا در ارسال داده')
                        categoryLoading.classList.remove('flex')
                        categoryLoading.classList.add('hidden')
                        categoryLoading.innerHTML = ''
                    }

                })
            }
        }

        function cpvStore(ev) {
            ev.preventDefault()
            let cpvRequired = document.querySelectorAll('.cpvRequired')
            cpvRequired.forEach((item) => {
                item.classList.remove('border-red-500')
                const errorSpan = item.parentElement.querySelector('.text-red-500')
                if (errorSpan) {
                    errorSpan.classList.add('opacity-0')
                }
            })
            let flag = true
            cpvRequired.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })
            if (flag) {


                cpvLoading.classList.remove('hidden')
                cpvLoading.classList.add('flex')
                cpvLoading.innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `
                let formData = new FormData()
                formData.append('title', cpvTitle.value)
                formData.append('description', cpvDescription.value)
                formData.append('min_amount_unit', cpvMinAmount.value)
                formData.append('duration', cpvDuration.value)
                if (imageCPV.files[0]) {
                    formData.append('imageCPV', imageCPV.files[0])
                }
                formData.append('custom_pro_id', custom_product_id_variant.value)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('cpv.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        cpvLoading.classList.remove('flex')
                        cpvLoading.classList.add('hidden')
                        cpvLoading.innerHTML = ''
                        console.log(data)
                        custom_product_id_variant = ""
                        cpvTitle.value = ""
                        cpvMinAmount.value = ""
                        cpvDuration.value = ""
                        cpvDescription.value = ""
                        imageCPV.value = ""

                        closeForm()
                    },
                    error: function() {
                        alert('خطا در ارسال داده')
                        cpvLoading.classList.remove('flex')
                        cpvLoading.classList.add('hidden')
                        cpvLoading.innerHTML = ''
                    }

                })
            }
        }
    </script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
