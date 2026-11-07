@extends('admin.app.panel')
@section('title', 'دسته‌بندی‌های محصول')
@section('content')

<div class="w-full pb-10 pt-6 bg-gray-50">
    <div class="w-11/12 mx-auto">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">دسته‌بندی‌های محصول</h1>
                    <p class="text-gray-600 text-sm mt-1">
                        محصول: <span class="font-medium">{{ $customProduct->title ?? 'نامشخص' }}</span> 
                        | {{ count($customProduct->customCategories ?? []) }} دسته‌بندی
                    </p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('custmCategory.create' , [$customProduct]) }}" 
                       class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        دسته‌بندی جدید
                    </a>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            
            <!-- Table Header -->
            <div class="bg-gray-50 border-b border-gray-200">
                <div class="grid grid-cols-12 gap-4 px-6 py-3">
                    <div class="col-span-3">
                        <span class="text-sm font-medium text-gray-700">نام دسته‌بندی</span>
                    </div>
                    <div class="col-span-3">
                        <span class="text-sm font-medium text-gray-700">وضعیت الزامی بودن</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-sm font-medium text-gray-700">حداکثر مواد</span>
                    </div>
                    <div class="col-span-4">
                        <span class="text-sm font-medium text-gray-700">عملیات</span>
                    </div>
                </div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-100">
                @forelse($customProduct->customCategories as $customCategory)
                <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors">
                    <!-- نام دسته‌بندی -->
                    <div class="col-span-3">
                        <span class="text-sm text-gray-800 font-medium">{{ $customCategory->title }}</span>
                    </div>
                    
                    <!-- الزامی بودن -->
                    <div class="col-span-3">
                        @if($customCategory->required == 1)
                            <span class="inline-flex items-center gap-1 text-red-600 text-xs font-medium bg-red-50 px-3 py-1 rounded-full">
                                <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.795-.833-2.565 0L4.238 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                                انتخاب الزامی است
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-green-600 text-xs font-medium bg-green-50 px-3 py-1 rounded-full">
                                <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                انتخابی دلخواه
                            </span>
                        @endif
                    </div>
                    
                    <!-- حداکثر مواد -->
                    <div class="col-span-2">
                        <span class="text-sm text-gray-700">{{ $customCategory->max_item_amount }}</span>
                    </div>
                    
                    <!-- عملیات -->



                    <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3 gap-7">
                            <li class="flex justify-center">
                                <a href="{{ route('custmCategory.single', [$customCategory]) }}"
                                    class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm" title="مشاهده">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                        <path fill="white" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="flex justify-center">
                                <a href="{{ route('custmCategory.edit', [$customCategory]) }}"
                                    class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm" title="ویرایش">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="flex justify-center">
                                <a href="{{ route('custmCategory.delete', [$customCategory]) }}"
                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    
                    <div class="col-span-4">
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('cpm.create' , [$customCategory]) }}" 
                            class="inline-flex items-center justify-center gap-2 text-indigo-500  py-2.5 rounded-lg text-sm transition-colors">
                               
                                ایجاد آیتم جدید
                            </a>
                            <a href="{{ route('custmCategory.item_list' , [$customCategory]) }}" 
                            class="inline-flex items-center justify-center gap-2 text-indigo-500  py-2.5 rounded-lg text-sm transition-colors">
                                
                                مشاهده لیست آیتم‌ها
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="py-16 text-center">
                    <div class="text-gray-300 mb-4">
                        <svg class="size-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-gray-600 font-medium mb-2">هنوز دسته‌بندی ایجاد نکرده‌اید</h3>
                    <p class="text-gray-500 text-sm mb-6">با کلیک بر روی دکمه زیر اولین دسته‌بندی را ایجاد کنید</p>
                    <a href="{{ route('custmCategory.create' , [$customProduct]) }}" 
                       class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2.5 rounded-lg text-sm transition-colors">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        ایجاد دسته‌بندی
                    </a>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Actions Footer -->
        @if(count($customProduct->customCategories ?? []) > 0)
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('cpm.list' , [$customProduct]) }}" 
               class="inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg text-sm transition-colors">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                مشاهده لیست آیتم‌ها
            </a>
        </div>
        @endif
    </div>
</div>

@endsection