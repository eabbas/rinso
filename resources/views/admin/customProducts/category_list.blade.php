@extends('admin.app.panel')
@section('title', 'دسته‌بندی‌های محصول')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="w-full pb-10 pt-6 bg-white">
    <div class="w-11/12 mx-auto">
        



       
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">دسته‌بندی‌های محصول</h1>
                    <p class="text-gray-600 text-sm mt-1">
                        محصول: <span class="font-medium">{{ $custom_product->title ?? 'نامشخص' }}</span> 
                        | {{ count($custom_product->customCategories ?? []) }} دسته‌بندی
                    </p>
                </div>
                <div onclick='openCform("{{ $custom_product->id }}")' 
                class="w-fit flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer" >
                    <span class="text-sm font-medium"> ایجاد دسته بندی</span>
                </div>
             
            </div>
        </div>

        <form action="{{ route('custmCategory.deleteAll') }}" method="post" class="flex flex-col gap-5">
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
            <div class="w-11/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                <div class="w-full flex flex-row lg:grid lg:grid-cols-10 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                    <div class="text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                        <div class="w-10 lg:w-full h-10 text-gray-100"></div>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                        <span class="block w-10 lg:w-full text-center">ردیف</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                        <span class="block w-20 lg:w-full">عنوان</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                        <span class="block w-11 lg:w-full">لزوم</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                        <span class="block w-16 lg:w-full">حداکثر مواد</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                        <span class="block w-[320px] lg:w-full">عملیات</span>
                    </div>
                    
                </div>
                <div class="bg-white divide-y divide-[#f1f1f4]" id="custom_category_section">
                    @php
                    $i=1;
                    @endphp
                    @php $hasCategory=false; @endphp
                    @foreach($custom_product->customCategories as $category)
                    @php $hasCategory = true; @endphp
                            <div class="w-full flex flex-row lg:grid lg:grid-cols-10 items-center divide-x divide-[#f1f1f4] newParameters" data-cp-id="{{ $category->id }}">
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <div class="w-10 lg:w-full">
                                        <input type="checkbox" class="check" name="categories[]" value="{{ $category->id }}">
                                    </div>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-10 lg:w-full">{{ $i }}</span>
                                </div>
                              
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-20 lg:w-full">{{ $category->title }}</span>
                                </div>
                                <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center">
                                    <span class="block w-11 lg:w-fit text-xs px-2 py-1 rounded {{ $category->required ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                        {{ $category->required ? 'الزامی' : 'اختیاری' }}
                                    </span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-16 lg:w-full">{{ $category->max_item_amount }}</span>
                                </div>
                
                                
                                <div class="col-span-4">
                                    <div class="lg:w-full grid grid-cols-3 divide-x divide-[#f1f1f4] items-center w-[320px]">

                                        <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3">
                                            <li class="flex justify-center">
                                                <a href="{{ route('custmCategory.single', [$category]) }}"
                                                    class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm" title="مشاهده">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                                        <path fill="white" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="flex justify-center">
                                                <div onclick='editCategory("{{ $category->id }}")'
                                                    class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer" title="ویرایش">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                    </svg>
                                                </div>
                                            </li>
                                            <li class="flex justify-center">
                                                <div onclick='deleteC(this,"{{ $category->id }}")'
                                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer" title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                    </svg>
                                                </div>
                                            </li>
                                        </ul>
                                        <div onclick='openCPMform("{{ $category->id }}")' class="p-1 lg:p-3 text-xs text-center text-blue-600 h-full flex items-center justify-center font-medium cursor-pointer">
                                             ایجاد آیتم جدید
                                        </div>
                                        <div class="p-1 lg:p-3 text-xs text-center text-blue-600 h-full flex items-center justify-center font-medium">
                                             <a href="{{ route('custmCategory.item_list' , [$category]) }}">
                                            لیست آیتم ها
                                             </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    @if(!$hasCategory)
                        <div class="py-12 text-center">
                            <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ دسته ای یافت نشد</h3>
                            <p class="text-gray-500 text-sm mb-6">هنوز هیچ  دسته ای ایجاد نکرده‌اید</p>
                        </div>
                    @endif
                </div>
            </div>
        </form>


       
    </div>
     @foreach($custom_product->customCategories as $category)
    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="editCategoryform">
        <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative " id="closeEditCform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>

            <form action="{{ route('custmCategory.update')}}" method="post" enctype="multipart/form-data" class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
                        <div id="editcategoryloading"
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                        </div>
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <input type="hidden" name="custom_pro_id" id="custom_pro_id_cat" value="{{ $category->custom_products->id }}">
                    
                        <div class="mb-4">
                            <label for="editTitleCP" class="block text-sm font-medium mb-2">
                                عنوان
                            </label>
                            <input type="text" 
                                name="title" 
                                id="customCategoryTitle"
                                required
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4 flex flex-row items-center gap-3">
                            <input  type="checkbox" name="required" id="customCategoryRequired" value="{{ $category->required }}" @if($category->required) {{ "checked" }}  @endif>
                            <label for="editTitleCP" class="block text-sm font-medium mb-2">
                                لزوم
                            </label>
                        </div>
            

                        <div class="mb-4">
                            <label for="max_item_amount_category" class="block text-sm font-medium mb-2">
                                  حداکثر مقدار مواد
                            </label>
                            <input type="number" 
                                name="max_item_amount" 
                                id="max_item_amount_category"
                                value="{{ $category->max_item_amount }}"
                                required
                                placeholder="محدودیت متریال را وارد کنید"
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>


                        
                        <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button onclick='updateCategory(event, "{{ $category->id }}")'
                        class="w-4/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-5 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ویرایش</button>
                </div>

                </form>
        </div>
    </div> 
    @endforeach
     <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="createCPMform">
        <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative" id="closeEditCform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>

        <form action="{{ route('cpm.store') }}" method="post" enctype="multipart/form-data" class="bg-white w-11/12 max-h-[calc(100vh-100px)] overflow-y-auto [&::-webkit-scrollbar]:hidden lg:w-1/2 p-5 rounded-lg relative">
            @csrf
            <div id="storecpmloading"
                class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg z-50">
            </div>
            <div class="w-full grid grid-cols-1 lg:grid-cols-2 lg:gap-3">
                <div class="mb-4 relative">
                    <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                    <label for="title" class="block text-sm font-medium mb-5">
                       عنوان
                    </label>
                    <input type="text" 
                        name="title" 
                        id="cpmtitle"
                        required
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none requiredCPM">
                </div>
                <div class="mb-4 mt-3">
                    <label for="title" class="block text-sm font-medium mb-2">
                       تصویر
                    </label>
                    <input type="file" 
                        name="cpmImage" 
                        id="cpmImage"
                        required
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                </div>
                <div class="relative">
                    <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                    <label for="price_per_unit" class="block text-sm font-medium mb-1">
                        قیمت هر واحد *
                    </label>
                    <input type="number" 
                        name="price_per_unit" 
                        id="cpm_price_per_unit"
                        required
                        min="0"
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none requiredCPM">
                </div>
                <div class="flex items-center mt-5">
                    <input type="checkbox" 
                        name="required" 
                        id="cpmrequired"
                        value="1"
                        class="ml-2">
                    <label for="required" class="text-sm">
                        اجباری
                    </label>
                </div>
                <div class="relative">
                    <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                    <label for="order" class="block text-sm font-medium mb-1 mt-6">
                        ترتیب
                    </label>
                    <input type="number" 
                        name="order" 
                        id="cpmorder"
                        min="0"
                        required
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none requiredCPM">
                </div>
                <div class="relative mt-3">
                    <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                    <label for="cpm_max_unit_amount" class="block text-sm font-medium mb-1 mt-3">
                        حداکثر تعداد واحد
                    </label>
                    <input type="number" 
                        name="max_unit_amount" 
                        id="cpm_max_unit_amount"
                        min="1"
                        required
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none requiredCPM">
                </div>
                <div class="mb-4 lg:col-span-2">
                    <label for="cpmdescription" class="block text-sm font-medium mb-2 mt-6">
                        توضیحات
                    </label>
                    <textarea type="text" 
                        name="description" 
                        id="cpmdescription"
                        required
                        class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none"></textarea>
                </div>
            </div>     
                   
            <input type="hidden" name="custom_pro_id" id="custom_pro_id_field" value="{{ $custom_product->id }}">
            <input type="hidden" name="category_id" id="category_id_field" value="">
         
            <div class="flex justify-end gap-3" >
                    <button onclick="cpmStore(event)" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                        ثبت
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>  
</div>
<div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="createCform">
    <div class="w-full lg:w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative" id="closeCreateCform">
    <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
            <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
        </svg>
    </div>
    <form action="{{ route('custmCategory.store') }}" method="post" enctype="multipart/form-data" class="bg-white w-11/12 lg:w-1/2 p-5 rounded-lg relative">
        @csrf
        <div id="storeCategoryloading"
            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg z-50">
        </div>                   
        <div class="mb-4 relative">
            <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
            <label for="title" class="block text-sm font-medium mb-2">
                عنوان دسته بندی
            </label>
            <input type="text" 
                name="titleCategory" 
                id="titleCustomCategory"
                required
                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none categoryRequired">
        </div>
        <div class="mb-4 flex flex-row gap-5 mt-5">
            <input type="checkbox"
                name="requiredCategory" 
                id="requiredCustomCategory"
                value="1"
                class="p-1 border rounded focus:border-blue-500">
                <label for="required" class="text-sm font-medium">
                الزامی بودن یا نبودن 
                </label>
            </div>
                                            
            <div class="mb-6 relative">
                <span class="absolute -bottom-5 right-4 opacity-0 text-xs text-red-500">الزامی است!</span>
                <label for="max_item_amount" class="block text-sm font-medium mb-2">
                حداکثر تعداد آیتم
            </label>
            <input type="number" 
                name="max_item_amount" 
                id="max_item_amount_customCategory"
                required
                min="1"
                class="w-full p-2 rounded border-1 border-gray-300 rounded focus:border-blue-500 focus:outline-none categoryRequired">
            </div>

            <div class="flex justify-end gap-3" >
                <button type="submit" onclick="Categorystore(event)" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                    ثبت
                </button>
            </div>
            <input type="hidden" name="custom_pro_id"  id="custom_pro_id_customCategory">
    </form>

    
    </div>
</div>


<script>
    let i = "<?php echo $i; ?>"
    let categoryEditForm = document.getElementById('editCategoryform')
    let createCategoryform = document.getElementById('createCform')

    let titleCategory = document.getElementById('customCategoryTitle')
    let requierdCategory = document.getElementById('customCategoryRequired')
    let category_max_item_amount = document.getElementById('max_item_amount_category')
    let category_custom_pro_id = document.getElementById('custom_pro_id_cat')
    let forms = document.querySelectorAll(".form")
    let custom_category_section = document.getElementById('custom_category_section')
    let custom_pro_id_customCategory = document.getElementById('custom_pro_id_customCategory')
    let cpmformCreate = document.getElementById('createCPMform')

    let cpmtitle = document.getElementById('cpmtitle')
    let cpmdescription = document.getElementById('cpmdescription')
    let cpm_price_per_unit = document.getElementById('cpm_price_per_unit')
    let cpmorder = document.getElementById('cpmorder')
    let cpm_max_unit_amount = document.getElementById('cpm_max_unit_amount')
    let cpmrequired = document.getElementById('cpmrequired')
    let cpm_category_id = document.getElementById('category_id_field')
    let cpm_custom_pro_id = document.getElementById('custom_pro_id_field')
    let titleCustomCategory = document.getElementById('titleCustomCategory')
    let category = document.getElementById('requiredCustomCategory')
    let max_item_amount_customCategory = document.getElementById('max_item_amount_customCategory')

    let editloadingcategory = document.getElementById('editcategoryloading')
    let storecpmloading = document.getElementById('storecpmloading')
    let storeCategoryloading = document.getElementById('storeCategoryloading')
    let cpmImage = document.getElementById('cpmImage')



    function closeForm(){
        forms.forEach((form)=>{
            form.classList.add('invisible')
            form.classList.add('opacity-0')
        })
    }
   
    function openCPMform(catId){
        cpmformCreate.classList.remove('invisible')
        cpmformCreate.classList.remove('opacity-0')
        cpm_category_id.value = catId
        cpm_custom_pro_id.value = "{{ $custom_product->id }}";
    }

    function openCform(cpId){
        createCategoryform.classList.remove('invisible')
        createCategoryform.classList.remove('opacity-0')
        custom_pro_id_customCategory.value = cpId
    }

    function cpmStore(ev){
        ev.preventDefault()
        let requiredCPM = document.querySelectorAll('.requiredCPM')
        requiredCPM.forEach((item) => {
            item.classList.remove('border-red-500')
            item.parentElement.children[0].classList.add('opacity-0')
        })
        let flag = true
        requiredCPM.forEach((item)=>{
            if(item.value == ""){
                item.classList.add('border-1')
                item.classList.add('border-red-500')
                item.parentElement.children[0].classList.remove('opacity-0')
                flag = false
            }
        })
        if(flag){

            
            let isRequired = cpmrequired.checked ? 1 : 0;

            let formData = new FormData()
            
            formData.append('title' , cpmtitle.value)
            formData.append('description' , cpmdescription.value)
            formData.append('price_per_unit' , cpm_price_per_unit.value)
            formData.append('required' , isRequired)
            formData.append('order' , cpmorder.value)
            formData.append('max_unit_amount' , cpm_max_unit_amount.value)
            formData.append('custom_pro_id' , cpm_custom_pro_id.value)
            formData.append('category_id' , cpm_category_id.value)
            if (cpmImage.files[0]) {
                formData.append('cpmImage' ,cpmImage.files[0])
            }
            storecpmloading.classList.remove('hidden')
            storecpmloading.classList.add('flex')
            storecpmloading.innerHTML = `
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
                url : "{{ route('cpm.store') }}" ,
                type : "POST" ,
                data : formData ,
                contentType : false ,
                processData : false ,
            
                
                success: function(data){
                    console.log(data)
                    storecpmloading.classList.remove('flex')
                    storecpmloading.classList.add('hidden')
                    cpmtitle.value = ""
                    cpmdescription.value = ""
                    cpm_price_per_unit.value = ""
                    cpmorder.value = ""
                    cpm_max_unit_amount.value = ""
                    cpmrequired.checked = false
                    cpm_custom_pro_id.value = ""
                    cpm_category_id.value = ""
                    cpmImage.value = ""
                
                    closeForm()
                },
                error: function(){
                    alert('خطا در ارسال داده')
                }

            })
        }
    }

    function Categorystore(ev){
        ev.preventDefault()
        let categoryRequired = document.querySelectorAll('.categoryRequired')
        categoryRequired.forEach((item) => {
            item.classList.remove('border-red-500')
            item.parentElement.children[0].classList.add('opacity-0')
        })
        let flag = true
        categoryRequired.forEach((item)=>{
            if(item.value == ""){
                item.classList.add('border-1')
                item.classList.add('border-red-500')
                item.parentElement.children[0].classList.remove('opacity-0')
                flag = false
            }
        })
        if(flag){

       
            let checkBoxStatus = category.checked

            category.value = 0

            if(checkBoxStatus){
                category.value = 1
            }
            storeCategoryloading.classList.remove('hidden')
            storeCategoryloading.classList.add('flex')
            storeCategoryloading.innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url : "{{ route('custmCategory.store') }}" ,
                type : "POST" ,
                dataType : "json" ,
                data : {
                    'title' : titleCustomCategory.value,
                    'required' : category.value,
                    'max_item_amount' : max_item_amount_customCategory.value,
                    'custom_pro_id' : custom_pro_id_customCategory.value,
                },
                success: function(data){
                    console.log(data)
                    storeCategoryloading.classList.remove('flex')
                    storeCategoryloading.classList.add('hidden')
                    custom_pro_id_customCategory.value = ""
                    max_item_amount_customCategory.value =""
                    category.checked = 0
                    titleCustomCategory.value =""
                    
                    // حذف پیام "هیچ دسته بندی یافت نشد" اگر وجود دارد
                    let emptyMessage = document.getElementById('empty-category-message');
                    if (emptyMessage) {
                        emptyMessage.remove();
                    }
                    
                    let div = document.createElement('div')
                    div.classList = "w-full flex flex-row lg:grid lg:grid-cols-10 items-center divide-x divide-[#f1f1f4] newParameters"
                    div.setAttribute('data-cp-id', data.id)
                    let element = `
                    <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <div class="w-10 lg:w-full">
                                                <input type="checkbox" class="check" name="categories[]" value="${ data.id }">
                                            </div>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-10 lg:w-full">${i}</span>
                                        </div>
                                    
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-20 lg:w-full">${ data.title }</span>
                                        </div>
                                        <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center">
                                            <span class="text-xs px-2 py-1 w-11 lg:w-fit rounded ${ data.required ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }">
                                                ${ data.required ? 'الزامی' : 'اختیاری' }
                                            </span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                            <span class="block w-16 lg:w-full">${ data.max_item_amount }</span>
                                        </div>
                        
                                        
                                        <div class="col-span-4">
                                            <div class="lg:w-full grid grid-cols-3 divide-x divide-[#f1f1f4] items-center w-[320px]">

                                                <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3">
                                                    <li class="flex justify-center">
                                                        <a href="{{ url('customCategories/show/${data.id}') }}"
                                                            class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm" title="مشاهده">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                                                <path fill="white" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li class="flex justify-center">
                                                        <div onclick='editCategory(${data.id})'
                                                            class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer" title="ویرایش">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                                <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                            </svg>
                                                        </div>
                                                    </li>
                                                    <li class="flex justify-center">
                                                        <div onclick='deleteC(this,${data.id})'
                                                            class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer" title="حذف">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                                <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                            </svg>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div onclick='openCPMform(${data.id})' class="p-1 lg:p-3 text-xs text-center text-blue-600 h-full flex items-center justify-center font-medium cursor-pointer">
                                                    ایجاد آیتم جدید
                                                </div>
                                                <div class="p-1 lg:p-3 text-xs text-center text-blue-600 h-full flex items-center justify-center font-medium">
                                                    <a href="{{ url('customCategories/item_list/${data.id}') }}">
                                                    لیست آیتم ها
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                        `
                    div.innerHTML = element
                    if (custom_category_section.children.length > 0 && 
                            custom_category_section.children[0].classList.contains('py-12')) {
                            // اگر پیام "هیچ آیتمی یافت نشد" وجود دارد، حذفش کن
                            custom_category_section.innerHTML = '';
                        }
                    custom_category_section.appendChild(div)
                    // alert('دسته ' + data.title + 'با موفقیت ذخیره شد')
                    closeForm()
                    i++
                },
                error: function(){
                    alert('خطا در ارسال داده')
                }

            })
        }
    }

    function editCategory(id){
        categoryEditForm.classList.remove('invisible')
        categoryEditForm.classList.remove('opacity-0')
        editloadingcategory.classList.remove('hidden')
        editloadingcategory.classList.add('flex')
        editloadingcategory.innerHTML = `
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
            url: "{{ route('custmCategory.edit') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                'id': id
            },
            success: function(data){
                editloadingcategory.classList.remove('flex')
                editloadingcategory.classList.add('hidden')
                category_custom_pro_id.value = data.id
                titleCategory.value = data.title
                  if (data.required) {
                        requierdCategory.setAttribute('checked', true)
                    } 
                    if(!data.required){
                        requierdCategory.removeAttribute('checked')
                    }
                category_max_item_amount.value = data.max_item_amount
            },
            error: function(){
                alert('خطا در دریافت داده ها')
            }
        })
    }

    function updateCategory(ev){
        let newParameters = document.querySelectorAll('.newParameters')
        ev.preventDefault()
        editloadingcategory.classList.remove('hidden')
        editloadingcategory.classList.add('flex')
        editloadingcategory.innerHTML = `
        <div class="loading-wave">
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
        </div>
        `
     let checkBoxStatus = requierdCategory.checked

        requierdCategory.value = 0

        if(checkBoxStatus){
            requierdCategory.value = 1
        }
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
         $.ajax({
            url : "{{ route('custmCategory.update') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'id': category_custom_pro_id.value,
                'title' : titleCategory.value,
                'required' : requierdCategory.value,
                'max_item_amount' : category_max_item_amount.value,
            },
            success: function(data){
                newParameters.forEach((element)=>{
                    if(element.getAttribute('data-cp-id') == data.id){
                        element.children[2].children[0].innerText = data.title 
                        if(data.required == 1){
                            element.children[3].children[0].innerText = 'الزامی'
                            element.children[3].children[0].classList.remove('bg-green-100')
                            element.children[3].children[0].classList.remove('text-green-700')
                            element.children[3].children[0].classList.add('bg-red-100')
                            element.children[3].children[0].classList.add('text-red-700')
                        }
                        if(data.required == 0){
                            element.children[3].children[0].innerText = 'اختیاری' 
                            element.children[3].children[0].classList.remove('bg-red-100')
                            element.children[3].children[0].classList.remove('text-red-700')
                            element.children[3].children[0].classList.add('bg-green-100')
                            element.children[3].children[0].classList.add('text-green-700')
                        }
                        element.children[4].children[0].innerText = data.max_item_amount 
                    }
                })
                closeForm()
                console.log(data)
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })
    }

    function deleteC(element , catId){
    
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
        
        $.ajax({
            url : "{{ route('custmCategory.delete') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'id': catId,
            },
            success: function(data){
                let row = element.parentElement.parentElement.parentElement.parentElement.parentElement;
                if (row) {
                    row.remove();
                }
                let remainingCategories = custom_category_section.querySelectorAll('.newParameters');
                if (remainingCategories.length === 0) {
                    custom_category_section.innerHTML = `
                        <div class="py-12 text-center empty-message" id="empty-category-message">
                            <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ دسته بندی یافت نشد</h3>
                            <p class="text-gray-500 text-sm mb-6">هنوز هیچ دسته بندی ای ایجاد نکرده‌اید</p>
                        </div>
                    `;
                }
            },
            error: function(){
                alert('خطا در حذف داده: ')
            }
        })
    }
</script>
<script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection