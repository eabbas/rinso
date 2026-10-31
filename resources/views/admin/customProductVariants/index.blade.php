@extends('admin.app.panel')
@section('title')
    {{ $customProduct->title }}
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="w-full min-h-screen pb-10 pt-6 bg-white">
        <div class="w-11/12 mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">انواع محصولات</h1>
                        <div class="flex items-center gap-3 mt-2">
                            <span class="text-sm text-gray-600">
                                محصول: <span class="font-medium">{{ $customProduct->title ?? 'نامشخص' }}</span>
                            </span>
                            {{-- </br>
                        <span class="text-sm text-gray-500">
                            {{ count($customProduct->custom_product_variants ?? []) }} نوع
                        </span> --}}
                        </div>
                    </div>
                    <div onclick='openCPVform("{{ $customProduct->id }}")'
                        class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors text-sm cursor-pointer">
                        <span>نوع جدید</span>
                    </div>
                </div>
            </div>

            <!-- Products Table -->


            <form class="flex flex-col" action="{{ route('cpv.deleteAll') }}" method="post">
                @csrf
                <div class="w-full mx-auto flex flex-row justify-between items-center pb-3">
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
                <div
                    class="w-full mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                    <div
                        class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                        <div class="px-1 text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                            <div class="w-10 lg:w-full h-10"></div>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-10 lg:w-full text-center">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">تصویر</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">عنوان</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">حداقل مواد</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">محصول</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">زمان</span>
                        </div>

                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-[150px] lg:w-full">عملیات</span>
                        </div>

                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]" id="custom_product_section">

                        @php
                            $i = 1;
                            $hasVariants = false;
                        @endphp
                        @foreach ($customProduct->custom_product_variants as $index => $cpVariant)
                            @php $hasVariants=true; @endphp
                            <div class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] newParameters"
                                data-cp-id="{{ $cpVariant->id }}">
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <div class="w-10 lg:w-full">
                                        <input type="checkbox" class="check" name="cpVariants[]" value="{{ $cpVariant->id }}">
                                    </div>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-10 lg:w-full">{{ $i }}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 col-span-2">
                                    <div class="w-20 lg:w-full">
                                        <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                            src="{{ asset('storage/' . $cpVariant->image) }}">
                                    </div>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-20 lg:w-full">{{ $cpVariant->title }}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-20 lg:w-full">{{ $cpVariant->min_amount_unit }}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-20 lg:w-full">{{ $cpVariant->custom_product->title }}</span>
                                </div>

                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-20 lg:w-full">{{ $cpVariant->duration }}</span>
                                </div>



                                <div class="col-span-2">
                                    <div class="w-[150px] lg:w-full">
                                        <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3">
                                            <li class="flex justify-center">
                                                <a href="{{ route('cpv.single', [$cpVariant]) }}"
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
                                                <div onclick='editCPV(this ,"{{ $cpVariant->id }}")'
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
                                                <div onclick='deleteCPV(this,"{{ $cpVariant->id }}")'
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
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        @if (!$hasVariants)
                            <div class="py-12 text-center" id="no_variant_message">
                                <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ نوع محصولی یافت نشد</h3>
                                <p class="text-gray-500 text-sm mb-6">هنوز هیچ نوع محصولی ایجاد نکرده‌اید</p>
                            </div>
                        @endif

                    </div>
                </div>
            </form>




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
                        class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
                        @csrf
                        <div id="cpvLoading"
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg z-50">
                        </div>
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
                                <input type="file" name="imageCPV" id="imageCPV"
                                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                            </div>
                            <!-- حداقل واحد مقدار -->
                            <div class="relative">
                                <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                                <label for="min_amount_unit_cpv" class="block text-sm font-medium text-gray-700 mb-2">
                                    حداقل واحد مقدار
                                </label>
                                <input type="number" name="min_amount_unit" id="min_amount_unit_cpv"
                                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none cpvRequired">
                            </div>
                            <!-- مدت زمان -->
                            <div class="relative">
                                <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                                <label for="durationCPV" class="block text-sm font-medium text-gray-700 mb-2">
                                    مدت زمان آماده سازی (دقیقه)
                                </label>
                                <input type="number" name="duration" id="durationCPV" min="1"
                                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none cpvRequired">
                            </div>
                            <!-- محصول اصلی -->
                            @if (isset($customProduct))
                                <input type="hidden" name="custom_product_id" id="custom_product_id_variant"
                                    value="{{ $customProduct->id }}">
                                <input type="hidden" name="career_id" value="{{ $customProduct->career->id }}">
                            @endif
                            <!-- توضیحات -->
                            <div class="md:col-span-2">
                                <label for="descriptionCPV" class="block text-sm font-medium text-gray-700 mb-2 mt-2">
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





            @foreach ($customProduct->custom_product_variants as $index => $cpVariant)
                @if (isset($cpVariant))
                    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form"
                        id="editCPVform">
                        <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative "
                            id="closeEditCform">
                            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon z-999 hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                                onclick="closeForm()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path fill="gray"
                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                </svg>
                            </div>
                            <form action="{{ route('cpv.update') }}" method="post" enctype="multipart/form-data"
                                class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
                                <div id="editCPVloading"
                                    class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                                </div>
                                @csrf
                                <input type="hidden" name="custom_product_id" id="custom_product_id_vUpdate"
                                    value="{{ $customProduct->id }}">
                                <input type="hidden" name="cpvId" id="cpvId">
                                <div class="mb-4">
                                    <label for="titleCpvedit" class="block text-sm font-medium mb-2">
                                        عنوان
                                    </label>
                                    <input type="text" name="title" id="titleCpvedit" required
                                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                                </div>
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium mb-2">
                                        تصویر محصول
                                    </label>
                                    <input type="file" name="customProductImage" id="customProductImage"
                                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                                </div>
                                <div class="mb-4">
                                    <label for="min_amount_unit_cpv_edit" class="block text-sm font-medium mb-2">
                                        حداقل مقدار واحد
                                    </label>
                                    <input type="number" name="min_amount_unit" id="min_amount_unit_cpv_edit" required
                                        placeholder="محدودیت متریال را وارد کنید"
                                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                                </div>
                                <div class="mb-4">
                                    <label for="curationCPVedit" class="block text-sm font-medium mb-2">
                                        زمان آماده سازی
                                    </label>
                                    <input type="number" name="duration" id="curationCPVedit" required
                                        placeholder="محدودیت متریال را وارد کنید"
                                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                                </div>


                                <div class="mb-4">
                                    <label for="descriptionCPVedit" class="block text-sm font-medium mb-2">
                                        توضیحات
                                    </label>
                                    <textarea type="text" name="description" id="descriptionCPVedit" rows="4"
                                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none"></textarea>
                                </div>
                                <input type="hidden" name="cpvId" id="cpvIdInput" value="">

                                <div class="text-center md:px-12 mt-5 lg:mt-10">
                                    <button onclick='updateCPV(event, "{{ $cpVariant->id }}")'
                                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ویرایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    <script>
        let i = "<?php echo $i; ?>";
        let cpvEdit = document.getElementById('editCPVform')
        // let cpvproId = document.getElementById('custom_pro_id_cpv_edit')
        let cpvEdittitle = document.getElementById('titleCpvedit')
        let cpvDescription = document.getElementById('descriptionCPVedit')
        let cpvMinamountunit = document.getElementById('min_amount_unit_cpv_edit')
        let cpvDuration = document.getElementById('curationCPVedit')
        let createCustomVariantform = document.getElementById('createCPVform')

        let titleCPV = document.getElementById('titleCPV')
        let min_amount_unit_cpv = document.getElementById('min_amount_unit_cpv')
        let durationCPV = document.getElementById('durationCPV')
        let custom_product_id_variant = document.getElementById('custom_product_id_variant')
        let custom_product_id_vUpdate = document.getElementById('custom_product_id_vUpdate')
        let descriptionCPV = document.getElementById('descriptionCPV')

        let editloadingcpv = document.getElementById('editCPVloading')
        let cpvLoading = document.getElementById('cpvLoading')
        let customProductImage = document.getElementById('customProductImage')

        let cpvId = document.getElementById('cpvId')
        let forms = document.querySelectorAll(".form")
        let imageCPV = document.getElementById('imageCPV')

        function closeForm() {
            forms.forEach((form) => {
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
        }


        function openCPVform(cpId) {
            createCustomVariantform.classList.remove('invisible')
            createCustomVariantform.classList.remove('opacity-0')
        }


        function cpvStore(ev) {
            ev.preventDefault()
            let cpvRequired = document.querySelectorAll('.cpvRequired')
            cpvRequired.forEach((item) => {
                item.classList.remove('border-red-500')
                item.parentElement.children[0].classList.add('opacity-0')
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
                formData.append('title', titleCPV.value)
                formData.append('description', descriptionCPV.value)
                formData.append('min_amount_unit', min_amount_unit_cpv.value)
                formData.append('duration', durationCPV.value)
                formData.append('custom_pro_id', custom_product_id_variant.value)
                if (imageCPV.files[0]) {
                    formData.append('imageCPV', imageCPV.files[0])
                }
                const customProductTitle = "{{ $customProduct->title }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
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
                        // پاک کردن مقادیر فرم
                        titleCPV.value = ""
                        min_amount_unit_cpv.value = ""
                        durationCPV.value = ""
                        descriptionCPV.value = ""
                        imageCPV.value = ""

                        // حذف پیام "هیچ نوع محصولی یافت نشد"
                        let empty = document.getElementById('no_variant_message');
                        if (empty) {
                            empty.remove();
                        }

                        // ایجاد المنت جدید
                        let div = document.createElement('div');
                        div.classList =
                            "w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] newParameters"
                        div.setAttribute('data-cp-id', data.id)
                        let element = `

                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <div class="w-10 lg:w-full">
                                    <input type="checkbox" class="check" name="cpVariants[]" value="${data.id}">
                                </div>
                            </div>
                    
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-10 lg:w-full">${i}</span>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 col-span-2">
                                <div class="w-20 lg:w-full">
                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                        src="${data.image ? '{{ asset('storage/') }}/' + data.image : '/images/default-product.png'}"
                                        alt="${data.title}">
                                </div>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                <span class="block w-20 lg:w-full">${ data.title }</span>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                <span class="block w-20 lg:w-full">${ data.min_amount_unit }</span>
                            </div>
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-20 lg:w-full">${ customProductTitle ?? '-' }</span>
                            </div>
                            
                            <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-20 lg:w-full">${ data.duration }</span>
                            </div>
                    
            
                            
                            <div class="col-span-2">
                                <div class="w-[150px] lg:w-full">

                                    <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3">
                                        <li class="flex justify-center">
                                            <a href="{{ url('customProductVariants/show/${data.id}') }}"
                                                class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm" title="مشاهده">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                                    <path fill="white" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="flex justify-center">
                                            <div onclick='editCPV(this, "${data.id}")'
                                                class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer" title="ویرایش">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                    <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                </svg>
                                            </div>
                                        </li>
                                        <li class="flex justify-center">
                                            <div onclick='deleteCPV(this, "${data.id}")'
                                                class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer" title="حذف">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                    <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                </svg>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>



                `
                        div.innerHTML = element
                        document.getElementById('custom_product_section').appendChild(div)
                        closeForm()
                        i++
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


        function editCPV(element, id) {
            cpvEdit.classList.remove('invisible')
            cpvEdit.classList.remove('opacity-0')
            editloadingcpv.classList.remove('hidden')
            editloadingcpv.classList.add('flex')
            editloadingcpv.innerHTML = `
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
                url: "{{ route('cpv.edit') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(data) {
                    editloadingcpv.classList.remove('flex')
                    editloadingcpv.classList.add('hidden')
                    console.log(data)
                    // cpvproId.value = data.id
                    cpvId.value = data.id
                    cpvEdittitle.value = data.title
                    cpvDescription.value = data.description
                    cpvMinamountunit.value = data.min_amount_unit
                    cpvDuration.value = data.duration

                },
                error: function() {
                    alert('خطا در دریافت داده ها')
                }
            })
        }

        function updateCPV(ev) {
            let newParameters = document.querySelectorAll('.newParameters')
            ev.preventDefault()
            editloadingcpv.classList.remove('hidden')
            editloadingcpv.classList.add('flex')
            editloadingcpv.innerHTML = `
        <div class="loading-wave">
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
        </div>
        `

            let formData = new FormData()
            formData.append('id', cpvId.value)
            formData.append('title', cpvEdittitle.value)
            formData.append('description', cpvDescription.value)
            formData.append('min_amount_unit', cpvMinamountunit.value)
            formData.append('duration', cpvDuration.value)
            formData.append('custom_product_id', custom_product_id_vUpdate.value)
            if (customProductImage.files.length > 0) {
                formData.append('customProductImage', customProductImage.files[0])
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('cpv.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    editloadingcpv.classList.remove('flex')
                    editloadingcpv.classList.add('hidden')
                    editloadingcpv.innerHTML = ''
                    newParameters.forEach((element) => {
                        if (element.getAttribute('data-cp-id') == data.id) {
                            element.children[2].children[0].innerHTML = `
                                <img src="${data.image ? '{{ asset('storage/') }}/' + data.image : '/images/default-product.png'}"
                                alt="${data.title}" class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md">
                            `
                            element.children[3].children[0].innerText = data.title
                            element.children[4].children[0].innerText = data.min_amount_unit
                            element.children[6].children[0].innerText = data.duration
                        }
                    })
                    closeForm()
                    console.log(data)
                },
                error: function() {
                    alert('خطا در ارسال داده')
                }

            })

        }

        function deleteCPV(element, cpvId) {
            let newParameters = document.querySelectorAll('.newParameters')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('cpv.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': cpvId,
                },
                success: function(data) {
                    console.log(data)
                    let row = element.parentElement.parentElement.parentElement.parentElement.parentElement;
                    if (row) {
                        row.remove();
                    }
                    // newParameters.forEach((element)=>{
                    //     if(element.getAttribute('data-cp-id') == data.id){
                    //         element.remove()
                    //     }
                    // })
                    if (custom_product_section.children.length === 0) {
                        custom_product_section.innerHTML = `
                        <div class="py-12 text-center" id="no_variant_message">
                            <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ نوع محصولی یافت نشد</h3>
                            <p class="text-gray-500 text-sm mb-6">هنوز هیچ نوع محصولی ایجاد نکرده‌اید</p>
                        </div>
                    `;
                    }
                },
                error: function() {
                    alert('خطا در ارسال داده')
                }

            })
        }
    </script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
