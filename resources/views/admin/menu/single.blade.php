@extends('admin.app.panel')
@section('title')
    منو {{ $menu->title }}
@endsection
@section('content')
    <div class="w-full min-h-screen pb-10 pt-16 bg-[#F4F8F9]">
        <div class="w-11/12 mx-auto">
            <!-- Header Section -->
            <div class="pb-4 text-3xl text-center font-bold text-gray-800">
                <h2>{{ $menu->title }}</h2>
            </div>
            <div class="pb-6 text-xl text-gray-600 text-center font-bold">
                <h3>{{ $menu->subtitle }}</h3>
            </div>
            <!-- Stats and Actions -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                
                <div class="flex flex-wrap items-center gap-3 justify-center">
                    <a href="{{ route('menuCat.create', [$menu]) }}"
                        class="text-sm px-5 py-2 bg-green-500 text-white hover:bg-green-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        ایجاد دسته
                    </a>
                    @if (count($menu->menu_categories))
                        <a href="{{ route('menuCat.list', [$menu]) }}"
                            class="text-sm px-5 py-2 bg-emerald-500 text-white hover:bg-emerald-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                            دسته ها
                        </a>
                     @endif
                    <a href="{{ route('menu.edit', [$menu]) }}"
                        class="text-sm px-5 py-2 bg-blue-500 text-white hover:bg-blue-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        ویرایش منو
                    </a>
                    <a href="{{ route('menu.delete', [$menu]) }}"
                        class="text-sm px-5 py-2 bg-red-500 text-white hover:bg-red-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        حذف منو
                    </a>
                   
                    
                    <!--<a href="{{ route('cp.create', [$menu->career])}}"-->
                    <!--    class="text-sm px-5 py-2 bg-indigo-500 text-white hover:bg-indigo-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">-->
                    <!--    ایجاد محصول شخصی‌سازی-->
                    <!--</a>-->
                    <!--@if(count($menu->career->custom_product))-->
                    <!--<a href="{{ route('menu.customProList', [$menu->career]) }}"-->
                    <!--    class="text-sm px-5 py-2 bg-indigo-500 text-white hover:bg-indigo-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">-->
                    <!--  لیست محصولات-->
                    <!--</a>-->
                    <!--@endif-->
                </div>
            </div>

            <!-- Banner Image -->
            <div class="mb-8">
                @if (!$menu->banner)
                    <img src="{{ asset('storage/images/banner01.jpg') }}"
                        class="w-full h-40 sm:h-52 md:h-64 mx-auto rounded-xl object-cover shadow-lg"
                        alt="menu banner">
                @else
                    <img src="{{ asset('storage/' . $menu->banner) }}"
                        class="w-full h-40 sm:h-52 md:h-64 mx-auto rounded-xl object-cover shadow-lg"
                        alt="menu banner">
                @endif
            </div>

            <!-- Categories Section -->
            <div class="space-y-6">
                @foreach ($menu->menu_categories as $category)
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Category Header -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-5 border-b border-gray-100 bg-gray-50">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->title }}"
                                     class="size-14 rounded-lg object-cover border border-gray-200 shadow-sm">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">{{ $category->title }}</h2>
                                    <p class="text-sm text-gray-500 mt-1">{{ count($category->menu_items) }} آیتم</p>
                                </div>
                            </div>
                            <a href="{{ route('menuCat.edit', [$category->id]) }}"
                                class="flex items-center gap-2 bg-blue-50 hover:bg-blue-100 text-blue-600 hover:text-blue-700 border border-blue-200 rounded-lg px-4 py-2 text-sm font-medium transition-all duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                </svg>
                                ویرایش دسته
                            </a>
                        </div>

                        <!-- Items List -->
                        <div class="p-4">
                            @if(count($category->menu_items) > 0)
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                    @foreach ($category->menu_items as $item)
                                        <div class="flex flex-col-reverse lg:flex-row items-end lg:items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-4 transition-all duration-150">
                                            <div class="w-full flex items-center gap-4 justify-between">
                                                <img src="{{ asset('storage/' . $item->image) }}" 
                                                     class="size-12 rounded-lg object-cover border border-gray-300"
                                                     alt="{{ $item->title }}">
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="font-medium text-gray-800 truncate">{{ $item->title }}</h3>
                                                    <p class="text-sm text-gray-500 truncate mt-1">{{ $item->description }}</p>
                                                </div>
                                                <div class="text-left">
                                                    <span class="font-bold text-xs lg:text-base text-green-600">{{ number_format($item->price) }} تومان</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('menuItem.edit', [$item->id]) }}"
                                                class="mr-4 flex items-center justify-center size-8 bg-green-50 hover:bg-green-100 text-green-600 hover:text-green-700 border border-green-200 rounded-lg transition-all duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <p class="text-gray-500">هیچ آیتمی در این دسته وجود ندارد</p>
                                    <a href="{{ route('menuItem.create', [$category->id]) }}"
                                        class="inline-block mt-3 text-sm text-blue-600 hover:text-blue-700 font-medium">
                                        افزودن آیتم جدید
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      
         
    </div>
    
    <script src="{{ asset('assets/js/customProducts.js') }}"></script>
@endsection