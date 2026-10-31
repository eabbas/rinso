@extends('admin.app.panel')
@section('title')
    {{ $career->title }}
@endsection
@section('content')
    <style>
        .selectItems::after {
            content: "";
            position: absolute;
            width: 0px;
            height: 3px;
            bottom: -8px;
            right: 0;
            background-color: #eb3254;
            border-radius: 4px;
        }

        .selected::after {
            content: "";
            position: absolute;
            width: 100%;
            transition: all 300ms ease-out;
        }

        .deleteShadow {
            box-shadow: 0px 0px 16px 11px rgba(0, 0, 0, 0.5);
        }

        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <div id="parentMenuPage"
        class="@if (Auth::check()) @if (count(Auth::user()->carts))mb-[100px] @endif @endif relative z-888">
        <div class="w-full pt-4 lg:pt-10 pb-4 bg-[#F4F8F9]">
            <div class="w-11/12 mx-auto lg:pt-6 flex flex-row items-center justify-end gap-4">
                <a href="{{ route('career.edit', [$career->id]) }}"
                    class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                        <path
                            d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                    </svg>
                </a>
                <a href="{{ route('career.single', [$career->id]) }}"
                    class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                        <path
                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                    </svg>
                </a>
                <div>
                </div>
            </div>
            <div class="pb-4 text-lg lg:text-3xl text-center font-bold">
                <h2>{{ $career->title }}</h2>
            </div>

            <img src="{{ $career->banner ? asset('storage/' . $career->banner) : asset('assets/img/bg-page.jpg') }}"
                class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">

        </div>
        <div class="w-full py-3">
            <div class="w-full flex flex-row items-center justify-between py-3">
                <h3 class="text-base font-bold lg:text-md">منو های {{ $career->title }}</h3>
                <span class="text-sm font-bold text-blue-600 cursor-pointer" onclick="menuForm()">افزودن منو</span>
            </div>
            <div class="w-full bg-white rounded-md">
                <div class="w-11/12 mx-auto flex flex-row items-center gap-8 pb-3 py-4 overflow-x-auto bg-white"
                    style="scrollbar-width: thin;" id="menuListCareer">
                    @foreach ($career->menus as $menu)
                        <div class="relative selectItems @if ($career->menus[0] == $menu) selected @endif allMenus min-w-20 min-h-20"
                            data-menu-id="{{ $menu->id }}">
                            <div class="absolute -top-2 -left-4 flex flex-col items-center gap-4 bg-gray-200 p-1 rounded">
                                <div class="flex justify-center cursor-pointer" onclick='menuForm("{{ $menu->id }}")'>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4 fill-gray-400 hover:fill-green-600" viewBox="0 0 512 512">
                                        <path
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                    </svg>
                                </div>
                                <div class="flex justify-center cursor-pointer"
                                    onclick='deleteMenu(this, "{{ $menu->id }}")'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400 hover:fill-red-600"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="cursor-pointer rounded-lg menuParent" title="{{ $menu->title }}"
                                onclick='showMenu(this, "{{ $menu->id }}")'>
                                <div class="w-20 gap-2 flex flex-col items-center rounded-lg">
                                    <img class="size-20 rounded-md"
                                        src="{{ $menu->banner ? asset('storage/' . $menu->banner) : asset('assets/img/user.png') }}"
                                        alt="menu image">
                                    <span
                                        class="block w-full title_category_icon text-center truncate text-xs">{{ $menu->title }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="items">
            <div class="w-full flex flex-row items-center justify-end my-4">
                <span class="text-sm font-bold text-blue-600 cursor-pointer" onclick="menuItemForm()"
                    data-menu-create-item-id="{{ $career->menus[0]->id ?? null }}" id="newItem">آیتم جدید</span>
            </div>
            @foreach ($career->menus as $menu)
                <div class="flex flex-col gap-3 mt-3 menus" data-menu-id="{{ $menu->id }}">
                    @if ($career->menus[0]->id == $menu->id)
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                            <div class="p-2 lg:p-4">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4" id="menuItemList">
                                    @foreach ($menu->menu_items as $item)
                                        <div class="w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems relative"
                                            data-menu-item-title="{{ $item->title }}"
                                            data-menu-item-id="{{ $item->id }}">
                                            <span
                                                class="text-xs @if (!$item->discount) invisible @else @endif text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                                {{ $item->percent }}%
                                            </span>
                                            <div class="w-full flex items-center justify-between">
                                                <div class="w-11/12 flex flex-row gap-5 items-center">
                                                    <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer"
                                                        onclick="openSingle(this)">
                                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/img/user.png') }}"
                                                            class="size-22 rounded-lg object-cover border border-gray-300"
                                                            alt="{{ $item->title }}">
                                                        <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                                            <h3
                                                                class="font-medium text-gray-800 truncate text-sm lg:text-base">
                                                                {{ $item->title }}</h3>
                                                            <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">
                                                                {{ $item->description }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                                        <div class="flex flex-row items-center gap-3">
                                                            <div class="text-left flex flex-col items-end">
                                                                @if ($item->discount == 0)
                                                                    <span
                                                                        class="font-bold text-xs lg:text-sm">{{ number_format($item->price) }}
                                                                        تومان</span>
                                                                @else
                                                                    <span
                                                                        class="font-bold text-xs lg:text-sm">{{ number_format($item->discount) }}
                                                                        تومان</span>
                                                                    <span
                                                                        class="text-gray-400 text-[10px] line-through lg:text-sm">{{ number_format($item->price) }}
                                                                        تومان</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-center gap-2 md:gap-5">
                                                    <div class="flex justify-center">
                                                        <span onclick='menuItemForm("{{ $item->id }}")'
                                                            class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                            title="ویرایش">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                viewBox="0 0 512 512">
                                                                <path fill="white"
                                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-center">
                                                        <span onclick='menuItemDelete(this, "{{ $item->id }}")'
                                                            class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                            title="حذف">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                viewBox="0 0 448 512">
                                                                <path fill="white"
                                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>


        <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-99999999"
            id="message">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                    viewBox="0 0 384 512">
                    <path
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                </svg>

            </div>
        </div>

        <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 flex flex-row justify-end invisible opacity-0 trnsition-all duration-300 z-9999"
            id="block">
            <div class="w-full lg:w-[calc(100%-265px)] h-full flex flex-row items-center justify-center">
                <div class="w-11/12 lg:w-2/3 bg-white relative rounded-lg p-5">
                    <span
                        class="size-10 rounded-full bg-white flex items-center justify-center absolute -top-5 -right-5 cursor-pointer"
                        onclick="closeForm()">❌</span>
                    <div id="loader" class="absolute top-0 right-0 w-full h-full hidden justify-center items-center">
                        <div class="w-12 h-12 border-4 border-[#eb3153] border-t-white rounded-full animate-spin"></div>
                    </div>

                    {{-- menu form --}}
                    <div class="w-full p-3 bg-[#fff] rounded-lg hidden invisible opacity-0 transition-all duration-300 flex-col gap-4 form"
                        id="menuForm">
                        <h2 class="text-md font-bold text-center" id="menuHeading"></h2>
                        <div class=" flex flex-col gap-3">
                            <input type="hidden" id="menuId">
                            <input type="text" class="outline-hidden w-full text-sm req py-2" id="menuTitle"
                                placeholder="عنوان منو را وارد  کنید*">
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <input type="text" class="outline-hidden w-full text-sm py-2" id="menuSubTitle"
                                placeholder="زیر عنوان منو را وارد  کنید">
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <input type="file" class="outline-hidden w-full text-sm cursor-pointer" id="menuBanner"
                                title="بنر را وارد کنید" placeholder="بنر را وارد کنید">
                            <button
                                class="w-3/12 h-8 mx-auto flex justify-center items-center bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer"
                                onclick="submitMenuForm(this)">ثبت
                            </button>
                        </div>
                    </div>
                    {{-- menu form --}}

                    {{-- menu category form --}}
                    <div class="w-full p-3 bg-[#fff] max-h-[500px] overflow-y-auto rounded-lg hidden invisible opacity-0 transition-all duration-300 flex-col gap-4 form"
                        id="menuCatForm">
                        <h2 class="text-md font-bold text-center"></h2>
                        <div class="flex flex-col gap-3">
                            <input type="hidden" id="menuCatId">
                            <input type="text" class="outline-hidden w-full py-3 text-sm req" id="menuCatTitle"
                                placeholder="عنوان دسته را وارد کنید" autofocus>
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <label for="menuCatPic">تصویر دسته</label>
                            <input type="file" id="menuCatPic" class="outline-hidden w-full py-3 text-sm">
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl hidden"></span>
                            <select id="menuListOptions" class="text-[#a5a7ab] py-3 hidden">
                                <option value="0">انتخاب کنید</option>
                            </select>
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <textarea name="" id="menuCatDescription" rows="3" placeholder="توضیحات"
                                class="outline-hidden w-full py-3 text-sm"></textarea>
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <div class="w-full">
                                <button
                                    class="w-3/12 mx-auto h-8 flex justify-center items-center bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer"
                                    onclick="submitMenuCatForm(this)">ثبت
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- menu category form --}}

                    {{-- menu item form --}}
                    <div class="w-full p-3 bg-[#fff] max-h-[500px] overflow-y-auto rounded-lg hidden invisible opacity-0 transition-all duration-300 flex flex-col gap-4 form"
                        id="menuItemForm">
                        <h2 class="text-md font-bold text-center text-gray-800">ایجاد آیتم منو</h2>
                        <div class="w-full p-4 flex flex-col gap-3 bg-blue-800/10 rounded-lg">
                            <input type="hidden" id="menuItemId">
                            <h2 class="text-md font-bold text-center">عنوان</h2>
                            <input type="text" class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm req"
                                id="menuItemTitle" placeholder="عنوان آیتم را وارد کنید" autofocus>
                        </div>
                        <div class="w-full p-4 flex flex-col gap-3 bg-blue-800/10 rounded-lg">
                            <h2 class="text-md font-bold text-center">تصویر آیتم</h2>
                            <label for="" class="text-sm">تصویر آیتم</label>
                            <input type="file" class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm"
                                id="menuItemPic">
                        </div>
                        <div class="w-full p-4 flex flex-col gap-3 bg-blue-800/10 rounded-lg">
                            <h2 class="text-md font-bold text-center">قیمت</h2>
                            <input type="number" class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm req"
                                id="menuItemPrice" placeholder="قیمت اصلی (تومان)">
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <input type="number" class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm"
                                id="menuItemDiscount" placeholder="قیمت تخفیف خورده (تومان)">
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <input type="number" class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm"
                                id="maxUnit" placeholder="تعداد در روز">
                        </div>
                        <div class="w-full p-4 flex flex-col gap-3 bg-blue-800/10 rounded-lg">
                            <h2 class="text-md font-bold text-center">توضیحات</h2>
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl hidden"></span>
                            <select id="menuItemCategoryId"
                                class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm hidden">
                                <option value="0">انتخاب کنید</option>
                            </select>
                            {{--                            <input type="text" class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm" id="menuItemDuration" placeholder="زمان تقریبی آماده شدن (دقیقه)"> --}}
                            {{--                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span> --}}
                            {{--                            <div class="flex gap-2 text-sm"> --}}
                            {{--                                <input type="checkbox"> --}}
                            {{--                                <label for="" class="text-sm ">قابلیت شخصی سازی دارد</label> --}}
                            {{--                            </div> --}}
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <textarea id="menuItemDescription" rows="3" placeholder="توضیحات"
                                class="outline-hidden w-full py-3 text-sm bg-white pr-3 rounded-sm"></textarea>
                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                            <div class="w-full">
                                <button
                                    class="w-3/12 mx-auto h-8 flex justify-center items-center bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer"
                                    onclick="submitMenuItem(this)">ثبت
                                </button>
                                {{--                                <button class="px-3 py-1 mx-auto bg-[#eb3153] text-md text-[#fff]  rounded-md cursor-pointer">+افزودن مواد</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- menu item form --}}
                    {{-- menu item box --}}
                    <div class="w-full p-3 bg-[#fff] max-h-[500px] overflow-y-auto rounded-lg hidden invisible opacity-0 transition-all duration-300 flex flex-col gap-4 form"
                        id="showMenuItemBox">
                        <div class="w-full p-5 rounded-md flex flex-col gap-3 bg-white relative">
                            <div class="flex flex-row items-center justify-end gap-2 md:gap-5">
                                <div class="flex justify-center">
                                    <span
                                        class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                        title="ویرایش">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                            <path fill="white"
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="flex justify-center">
                                    <span onclick='menuItemDelete(this, "${id}")'
                                        class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                        title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                            <path fill="white"
                                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="w-full relative">
                                <img class="size-80 mx-auto rounded-md" alt="">
                                <span
                                    class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">

                                </span>
                            </div>

                            <div class="flex flex-col items-center">
                                <span class="font-bold text-gray-800 text-lg"></span>
                                <p class="text-gray-600 text-justify max-h-[150px] overflow-y-auto ellipsis-2"></p>
                            </div>
                        </div>
                    </div>
                    {{-- menu item box --}}

                    {{-- menu item box --}}
                    <div class="w-full p-3 bg-[#fff] max-h-[500px] overflow-y-auto rounded-lg hidden invisible opacity-0 transition-all duration-300 flex-col gap-4 form"
                        id="deleteMenuCatBox">
                        <div class="w-full rounded-md flex flex-col gap-3 bg-white relative">
                            <h2 class="text-center text-gray-800 mb-3" id="deleteCategoryTitle"></h2>
                            <div id="deleteWithItems"
                                class="w-full p-5 border-1 border-gray-400 flex flex-row justify-center items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                <span class="text-gray-700 font-bold">حذف به همراه آیتم ها !</span>
                            </div>
                            <div id="deleteWithoutItems"
                                class="w-full p-5 border-1 border-gray-400 flex flex-row justify-center items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                <span class="text-gray-700 font-bold text-sm">حذف بدون آیتم (آیتم ها به بدون دسته بندی
                                    منتقل میشن)</span>
                            </div>
                        </div>
                    </div>
                    {{-- menu item box --}}


                </div>
            </div>
        </div>
    </div>
    <div class="fixed z-999 w-full h-dvh bg-black/50 backdrop-blur top-0 right-0 invisible opacity-0 transition-all duration-300 flex flex-row items-center justify-center"
        id="showMenuItemBox"></div>
    @php
        $menu_id = $firstMenu->id;
    @endphp
    <script>
        let firstMenu = ""
        {{--document.querySelectorAll('.allMenus').forEach((menu) => {--}}
        {{--    if (menu.getAttribute('data-menu-id') == "{{ $menu_id }}") {--}}
        {{--        firstMenu = menu--}}
        {{--        menu.classList.add('selected')--}}
        {{--    }--}}
        {{--})--}}
        let menuListCareer = document.getElementById('menuListCareer')
        let selectItems = document.querySelectorAll('.allMenus')
        let newCat = document.getElementById('newCat')
        let newItem = document.getElementById('newItem')
        let menuCategories = document.querySelectorAll('.menuCategories')
        let menuItemList = document.getElementById('menuItemList')
        let menuCats = document.getElementById('menuCats')
        let menuItems = document.querySelectorAll('.menuItems')
        let menuHeading = document.getElementById('menuHeading')
        let maxUnit = document.getElementById('maxUnit')

        let block = document.getElementById('block')
        let menu = document.getElementById('menuForm')
        let categoryForm = document.getElementById('menuCatForm')
        let itemForm = document.getElementById('menuItemForm')
        let loader = document.getElementById('loader')

        let menuIdInp = document.getElementById('menuId')
        let menuTitle = document.getElementById('menuTitle')
        let menuSubTitle = document.getElementById('menuSubTitle')
        let menuBanner = document.getElementById('menuBanner')

        function menuForm(menuId = null) {
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            menu.classList.remove('hidden')
            menu.classList.add('flex')
            if (menuId == null) {
                menu.classList.remove('opacity-0')
                menu.classList.remove('invisible')
                menuHeading.innerText = 'ایجاد منو'
            } else {
                loader.classList.remove('hidden')
                loader.classList.add('flex')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ url('menu/edit-front') }}/" + menuId,
                    type: "GET",
                    success: function(data) {
                        loader.classList.remove('flex')
                        loader.classList.add('hidden')
                        menu.classList.remove('opacity-0')
                        menu.classList.remove('invisible')
                        menuHeading.innerText = 'ویرایش ' + data.title
                        menuIdInp.value = data.id
                        menuTitle.value = data.title
                        menuSubTitle.value = data.subtitle
                    },
                    error: function() {
                        console.log('error')
                    }
                })
            }
        }

        function submitMenuForm(el) {
            let selectItems = document.querySelectorAll('.allMenus')
            let text = el.innerText
            if (menuTitle.value == "") {
                menuTitle.classList.add('border-b-1')
                menuTitle.classList.add('border-b-red-500')
            } else {
                el.innerHTML =
                    "<div class='w-4 h-4 mx-auto border-2 border-white border-t-[#eb3153] rounded-full animate-spin'></div>"
                if (menuIdInp.value == "") {
                    let formData = new FormData()
                    formData.append('title', menuTitle.value)
                    if (menuSubTitle.value != "") {
                        formData.append('subtitle', menuTitle.value)
                    }
                    if (menuBanner.value != "") {
                        formData.append('banner', menuBanner.files[0])
                    }
                    formData.append('user_id', "{{ $career->user_id }}")
                    formData.append('career_id', "{{ $career->id }}")
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('menu.storeFront') }}",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            el.innerHTML = text
                            let element = document.createElement('div')
                            element.innerHTML = `
                            <div class="relative selectItems  allMenus min-w-20 min-h-20" data-menu-id="${data.id}">
                                <div class="absolute -top-2 -left-4 flex flex-col items-center gap-4 bg-gray-200 p-1 rounded">
                                    <div class="flex justify-center cursor-pointer"
                                         onclick='menuForm(${data.id})'>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-4 fill-gray-400 hover:fill-green-600"
                                             viewBox="0 0 512 512">
                                            <path
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                                    <div class="flex justify-center cursor-pointer"
                                         onclick='deleteMenu(this, ${data.id})'>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-4 fill-gray-400 hover:fill-red-600"
                                             viewBox="0 0 448 512">
                                            <path
                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="cursor-pointer rounded-lg menuParent" title="${data.title}"
                                     onclick='showMenu(this, ${data.id})'>
                                    <div class="w-20 gap-2 flex flex-col items-center rounded-lg">
                                        <img class="size-20 rounded-md" src='${data.banner ? "{{ asset('storage/') }}/" + data.banner : "{{ asset('assets/img/user.png') }}"}' alt="menu image">
                                        <span
                                                class="block w-full title_category_icon text-center truncate text-xs">${data.title}</span>
                                    </div>
                                </div>
                            </div>
                            `
                            menuListCareer.appendChild(element)
                            console.log(element)
                            closeForm()
                        },
                        error: function() {
                            console.log('error')
                        }
                    })
                } else {
                    let formData = new FormData()
                    formData.append('title', menuTitle.value)
                    formData.append('menu_id', menuIdInp.value)
                    if (menuSubTitle.value != "") {
                        formData.append('subtitle', menuTitle.value)
                    }
                    if (menuBanner.value != "") {
                        formData.append('banner', menuBanner.files[0])
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('menu.updateFront') }}",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            el.innerHTML = text
                            selectItems.forEach((child) => {
                                if (child.getAttribute('data-menu-id') == data.id) {
                                    child.children[1].setAttribute('title', data.title)
                                    if (data.banner) {
                                        child.children[1].children[0].children[0].setAttribute('src',
                                            "{{ asset('storage/') }}/" + data.banner)
                                    }
                                    child.children[1].children[0].children[1].innerText = data.title
                                }
                            })
                            closeForm()
                        },
                        error: function() {
                            console.log('error')
                        }
                    })
                }
            }
        }

        function deleteMenu(el, menuId) {
            let element = document.createElement('div')
            element.classList =
                "absolute size-16 rounded-full right-[8%] top-[8%] bg-black/50 deleteShadow flex justify-center items-center"
            element.innerHTML =
                "<div class='w-8 h-8 mx-auto border-3 border-[#eb3153] border-t-black/0 rounded-full animate-spin'></div>"
            el.parentElement.parentElement.appendChild(element)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('menu/delete-front') }}/" + menuId,
                type: "POST",
                data: {
                    'career_id': {{ $career->id }}
                },
                success: function(data) {
                    // console.log(data)
                    // return
                    if (data == "ok") {
                        el.parentElement.parentElement.remove()
                    } else {
                        el.parentElement.parentElement.children[2].remove()
                    }
                    firstMenu = ""
                    document.querySelectorAll('.allMenus').forEach((menu) => {
                        if (menu.getAttribute('data-menu-id') == "{{ $menu_id }}") {
                            menu.classList.add('selected')
                            firstMenu = menu
                            console.log('menu')
                            console.log(menu)
                        }
                    })
                    showMenu(firstMenu, "{{ $menu_id }}")
                },
                error: function() {
                    console.log('error')
                }
            })
        }



        let menuCatIdInp = document.getElementById('menuCatId')
        let menuCatTitle = document.getElementById('menuCatTitle')
        let menuCatPic = document.getElementById('menuCatPic')
        let menuCatMenuId = document.getElementById('menuCatMenuId')
        let menuListOptions = document.getElementById('menuListOptions')
        let menuCatDescription = document.getElementById('menuCatDescription')
        let deleteMenuCatBox = document.getElementById('deleteMenuCatBox')
        let deleteCategoryTitle = document.getElementById('deleteCategoryTitle')
        let deleteWithItems = document.getElementById('deleteWithItems')
        let deleteWithoutItems = document.getElementById('deleteWithoutItems')

        // function menuCatForm(menuCatId = null) {
        //     let allMenus = document.querySelectorAll('.allMenus')
        //     block.classList.remove('invisible')
        //     block.classList.remove('opacity-0')
        //     categoryForm.classList.remove('hidden')
        //     categoryForm.classList.add('flex')
        //     // selectMenus()
        //     if (menuCatId == null) {
        //         allMenus.forEach((menu) => {
        //             if (newCat.getAttribute('data-menu-create-cat-id') == menu.getAttribute('data-menu-id')) {
        //                 let text = menu.children[1].children[0].children[1].innerText
        //                 let title = 'ایجاد دسته برای ' + text
        //                 categoryForm.children[0].innerText = title
        //                 console.log(title)
        //             }
        //         })
        //         categoryForm.classList.remove('invisible')
        //         categoryForm.classList.remove('opacity-0')
        //     } else {
        //         selectMenus()
        //         loader.classList.remove('hidden')
        //         loader.classList.add('flex')
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': "{{-- csrf_token() --}}"
        //             }
        //         })
        //         $.ajax({
        //             url: "{{-- url('menuCategory/edit-front/') --}}/" + menuCatId,
        //             type: "GET",
        //             success: function (data) {
        //                 loader.classList.remove('flex')
        //                 loader.classList.add('hidden')
        //                 categoryForm.classList.remove('invisible')
        //                 categoryForm.classList.remove('opacity-0')
        //                 menuCatIdInp.value = data.id
        //                 menuCatTitle.value = data.title
        //                 categoryForm.children[0].innerText = 'ویرایش دسته ' + data.title
        //                 menuCatDescription.value = data.description
        //             },
        //             error: function () {
        //                 console.log("error")
        //             }
        //         })
        //     }
        // }

        // function submitMenuCatForm(el) {
        //     let menuCategories = document.querySelectorAll('.menuCategories')
        //     let text = el.innerText
        //     if (menuCatTitle.value == "") {
        //         menuCatTitle.classList.add('border-b-1')
        //         menuCatTitle.classList.add('border-b-red-500')
        //     } else {
        //         el.innerHTML = "<div class='w-4 h-4 mx-auto border-2 border-white border-t-[#eb3153] rounded-full animate-spin'></div>"
        //         if (menuCatIdInp.value == "") {
        //             let formData = new FormData()
        //             formData.append('title', menuCatTitle.value)
        //             if (menuCatPic.value != "") {
        //                 formData.append('image', menuCatPic.files[0])
        //             }
        //             if (menuCatDescription.value != "") {
        //                 formData.append('description', menuCatDescription.value)
        //             }
        //             formData.append('menu_id', newCat.getAttribute('data-menu-create-cat-id'))
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': "{{-- csrf_token() --}}"
        //                 }
        //             })
        //             $.ajax({
        //                 url: "{{-- route('menuCat.storeFront') --}}",
        //                 type: "POST",
        //                 contentType: false,
        //                 processData: false,
        //                 data: formData,
        //                 success: function (data) {

        //                     el.innerHTML = text
        //                     let element = document.createElement('div')
        //                     element.classList = "relative text-center border-1 border-gray-300 rounded-md menuCategories"
        //                     element.setAttribute('onclick', `showItems(this, ${data.id})`)
        //                     element.setAttribute('data-menu-category-id', data.id)
        //                     element.innerHTML = `
    //                         <div class="absolute -top-2.5 -left-2.5 flex flex-col items-center gap-4 bg-gray-200 p-1 rounded">
    //                             <div class="flex justify-center cursor-pointer"
    //                                 onclick='menuCatForm(${data.id})'>
    //                                     <svg xmlns="http://www.w3.org/2000/svg"
    //                                 class="size-4 fill-gray-400 hover:fill-green-600"
    //                                 viewBox="0 0 512 512">
    //                                     <path
    //                                 d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
    //                                     </svg>
    //                             </div>
    //                             <div class="flex justify-center cursor-pointer"
    //                                  onclick='deleteCatBox("${data.title}", ${data.id})'>
    //                                 <svg xmlns="http://www.w3.org/2000/svg"
    //                                      class="size-4 fill-gray-400 hover:fill-red-600"
    //                                      viewBox="0 0 448 512">
    //                                     <path
    //                                         d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
    //                                 </svg>
    //                             </div>
    //                         </div>
    //                         <span class="text-sm px-5 flex items-center justify-center min-w-[120px] max-w-[120px] truncate text-center cursor-pointer h-[34px]">${data.title}</span>
    //                     `
        //                     menuCats.appendChild(element)
        //                     closeForm()
        //                 },
        //                 error: function () {
        //                     console.log("error")
        //                 }
        //             })
        //         } else {
        //             let formData = new FormData()
        //             formData.append('category_id', menuCatIdInp.value)
        //             formData.append('title', menuCatTitle.value)
        //             if(menuListOptions.value != 0){
        //                 formData.append('menu_id', menuListOptions.value)
        //             }
        //             if (menuCatPic.value != "") {
        //                 formData.append('image', menuCatPic.files[0])
        //             }
        //             if (menuCatDescription.value != "") {
        //                 formData.append('description', menuCatDescription.value)
        //             }
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': "{{-- csrf_token() --}}"
        //                 }
        //             })
        //             $.ajax({
        //                 url: "{{-- route('menuCat.updateFront') --}}",
        //                 type: "POST",
        //                 contentType: false,
        //                 processData: false,
        //                 data: formData,
        //                 success: function (data) {
        //                     console.log(data)
        //                     menuCategories.forEach((category) => {
        //                         if (category.getAttribute('data-menu-category-id') == data.id) {
        //                             category.children[0].children[0].setAttribute('onclick', `menuCatForm(${data.id})`)
        //                             category.children[0].children[1].setAttribute('onclick', `deleteCatBox("${data.title}", ${data.id})`)
        //                             category.children[1].innerText = data.title
        //                         }
        //                     })
        //                     el.innerHTML = text
        //                     closeForm()
        //                 },
        //                 error: function () {
        //                     console.log('error')
        //                 }
        //             })
        //         }
        //     }
        // }

        // function deleteCatBox(categoryTitle, categoryId){
        //     block.classList.remove('opacity-0')
        //     block.classList.remove('invisible')
        //     deleteCategoryTitle.innerHTML = `حذف دسته <span class="font-bold">${categoryTitle}</span>`
        //     deleteMenuCatBox.classList.remove('hidden')
        //     deleteMenuCatBox.classList.remove('invisible')
        //     deleteMenuCatBox.classList.remove('opacity-0')
        //     deleteMenuCatBox.classList.add('flex')
        //     deleteWithItems.setAttribute('onclick', `deleteMenuCat(${categoryId})`)
        //     deleteWithoutItems.setAttribute('onclick', `deleteMenuCatWithoutItems(${categoryId})`)
        // }

        // function deleteMenuCat(categoryId) {
        //     let menuCategories = document.querySelectorAll('.menuCategories')
        //     let menuItems = document.querySelectorAll('.menuItems')
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': "{{-- csrf_token() --}}"
        //         }
        //     })
        //     $.ajax({
        //         url: "{{-- url('menuCategory/delete-front/') --}}/" + categoryId,
        //         type: "GET",
        //         success: function (data) {
        //             menuCategories.forEach((menuCategory)=>{
        //                 if(menuCategory.getAttribute('data-menu-category-id') == data.id){
        //                     menuCategory.remove()
        //                 }
        //             })
        //             menuItems.forEach((menuItem)=>{
        //                 data.menu_item_ids.forEach((itemId)=>{
        //                     if(menuItem.getAttribute('data-menu-item-id')==itemId){
        //                         menuItem.remove()
        //                     }
        //                 })
        //             })
        //             closeForm()
        //         },
        //         error: function () {
        //             console.log('error')
        //         }
        //     })
        // }

        // function deleteMenuCatWithoutItems(categoryId){
        //     let menuItems = document.querySelectorAll('.menuItems')
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': "{{-- csrf_token() --}}"
        //         }
        //     })
        //     $.ajax({
        //         url: "{{-- url('menuCategory/delete-front-without-items/') --}}/"+categoryId,
        //         type: "GET",
        //         success: function(data){
        //             console.log(data);

        //             menuCategories.forEach((menuCategory)=>{
        //                 if(menuCategory.getAttribute('data-menu-category-id') == data.category.id){
        //                     menuCategory.remove()
        //                 }
        //                 if(menuCategory.getAttribute('data-menu-category-id')==data.withoutCatId){
        //                     showItems(menuCategory, data.withoutCatId)
        //                 }
        //             })
        //             menuItems.forEach((menuItem)=>{
        //                 data.category.menu_item_ids.forEach((itemId)=>{
        //                     if(menuItem.getAttribute('data-menu-item-id')==itemId){
        //                         menuItem.remove()
        //                     }
        //                 })
        //             })
        //             closeForm()
        //         },
        //         error: function(){
        //             console.log('error')
        //         }
        //     })
        // }

        let menuItemId = document.getElementById('menuItemId')
        let menuItemTitle = document.getElementById('menuItemTitle')
        let menuItemPic = document.getElementById('menuItemPic')
        let menuItemPrice = document.getElementById('menuItemPrice')
        let menuItemDiscount = document.getElementById('menuItemDiscount')
        // let menuItemDuration = document.getElementById('menuItemDuration')
        let menuItemDescription = document.getElementById('menuItemDescription')
        let menuItemCategoryId = document.getElementById('menuItemCategoryId')

        function menuItemForm(itemId = null) {
            closeForm()
            // let menuCategories = document.querySelectorAll('.menuCategories')
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            itemForm.classList.remove('hidden')
            if (itemId == null) {
                itemForm.classList.remove('invisible')
                itemForm.classList.remove('opacity-0')
                itemForm.children[0].innerText = 'ایجاد آیتم منو' 
                // menuCategories.forEach((category) => {
                //     if (newItem.getAttribute('data-menu-create-item-id') == category.getAttribute('data-menu-category-id')) {
                //         if (category.children[1]) {
                //             itemForm.children[0].innerText = 'ایجاد آیتم جدید برای دسته ' + category.children[1].innerText
                //             console.log(category.children[1].innerText)
                //         } else {
                //             itemForm.children[0].innerText = 'ایجاد آیتم جدید برای دسته بدون دسته بندی'
                //         }
                //     }
                // })
            } else {
                // showCats()
                loader.classList.remove('hidden')
                loader.classList.add('flex')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ url('menuItem/edit-front/') }}/" + itemId,
                    type: "GET",
                    success: function(data) {
                        console.log(data.description)
                        loader.classList.remove('flex')
                        loader.classList.add('hidden')
                        itemForm.classList.remove('invisible')
                        itemForm.classList.remove('opacity-0')
                        itemForm.children[0].innerText = 'ویرایش ' + data.title
                        menuItemId.value = data.id
                        menuItemTitle.value = data.title
                        menuItemPrice.value = data.price
                        menuItemDiscount.value = data.discount != 0 ? data.discount : ""
                        menuItemDescription.value = data.description
                        maxUnit.value = data.max_unit !== 0 ? data.max_unit : ''
                    },
                    error: function() {
                        console.log('error')
                    }
                })
            }
        }

        // function showCats(){
        //     menuItemCategoryId.innerHTML = ""
        //     menuItemCategoryId.classList.remove('hidden')
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': "{{-- csrf_token() --}}"
        //         }
        //     })
        //     $.ajax({
        //         url: "{{-- url('menu/cats') --}}/"+newCat.getAttribute('data-menu-create-cat-id'),
        //         type: "GET",
        //         success: function(data){
        //             data.forEach((category)=>{
        //                 if(category.title != 'بدون دسته بندی'){
        //                     let option = document.createElement('option')
        //                     option.value = category.id
        //                     option.innerText = category.title
        //                     if(newItem.getAttribute('data-menu-create-item-id') == data.id){
        //                         category.selected = true
        //                     }
        //                     menuItemCategoryId.appendChild(option)
        //                 }
        //             })
        //             console.log(data)
        //         },
        //         error: function(){
        //             console.log('error')
        //         }
        //     })
        // }

        function submitMenuItem(el) {
            let menuItems = document.querySelectorAll('.menuItems')
            let text = el.innerText
            if (menuItemTitle.value == "") {
                menuItemTitle.classList.add('border-b-1')
                menuItemTitle.classList.add('border-b-red-500')
            }
            if (menuItemPrice.value == "") {
                menuItemPrice.classList.add('border-b-1')
                menuItemPrice.classList.add('border-b-red-500')
            } else {
                el.innerHTML =
                    "<div class='w-4 h-4 mx-auto border-2 border-white border-t-[#eb3153] rounded-full animate-spin'></div>"
                if (menuItemId.value == "") {
                    let formData = new FormData()
                    formData.append('menu_id', newItem.getAttribute('data-menu-create-item-id'))
                    formData.append('title', menuItemTitle.value)
                    if (menuItemPic.value != "") {
                        formData.append('image', menuItemPic.files[0])
                    }
                    formData.append('price', menuItemPrice.value)
                    if (menuItemDiscount.value != "" || menuItemDiscount.value != 0) {
                        formData.append('discount', menuItemDiscount.value)
                    }
                    if (menuItemDescription.value.trim() != "") {
                        formData.append('description', menuItemDescription.value)
                    }
                    if(maxUnit.value !== ''){
                        formData.append('max_unit', maxUnit.value)
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('menuItem.storeFront') }}",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            // console.log(data)
                            el.innerHTML = text
                            console.log(data.description)
                            let div = document.createElement('div')
                            div.classList =
                                "w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems relative"
                            div.setAttribute('data-menu-item-title', data.title)
                            div.setAttribute('data-menu-item-id', data.id)
                            let inner = `<span class="text-xs`
                            // inner+=`<span class="text-xs`
                            if (data.discount == 0) {
                                inner += ` invisible `
                            }
                            inner +=
                                ` text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">`
                            if (data.discount != 0) {
                                inner += ` ${data.percent}% `
                            }
                            inner += `</span>`
                            // if (data.discount != 0) {
                            //     inner += `
                        //     <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                        //         ${data.percent}%
                        //     </span>`
                            // }
                            inner += `
                                    <div class="w-full flex items-center justify-between">
                                        <div class="w-11/12 flex flex-row gap-5 items-center">
                                            <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer" onclick="openSingle(this)">
                                                <img src='${data.image ? "{{ asset('storage/') }}/" + data.image : "{{ asset('assets/img/user.png') }}"}'
                                                     class="size-22 rounded-lg object-cover border border-gray-300"
                                                     alt="${data.title}">
                                                <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                                    <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">${data.title}</h3>
                                                    <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">${data.description != null ? data.description : ""}</p>
                                                </div>
                                            </div>
                                            <div class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                                <div class="flex flex-row items-center gap-3">

                                    <div class="text-left flex flex-col items-end">
                                    `
                            let formatter = new Intl.NumberFormat('en-US')
                            if (data.discount == 0) {
                                inner += `
                                    <span class="font-bold text-xs lg:text-sm">${formatter.format(data.price)}تومان</span>
                                `
                            } else {
                                inner += `
                                    <span class="font-bold text-xs lg:text-sm">${formatter.format(data.discount)}  تومان</span>
                                    <span class="text-gray-400 text-[10px] line-through lg:text-sm">${formatter.format(data.price)} تومان</span>
                                `
                            }
                            inner += `

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center gap-2 lg:gap-5">
                                        <div class="flex justify-center">
                                            <span onclick='menuItemForm(${data.id})'
                                              class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                              title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="size-5"
                                                 viewBox="0 0 512 512">
                                                <path fill="white"
                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex justify-center">
                                        <span onclick='menuItemDelete(this, ${data.id})'
                                              class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                              title="حذف">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="size-5"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            `
                            div.innerHTML = inner
                            menuItemList.appendChild(div)

                            closeForm()
                        },
                        error: function() {
                            console.log('error')
                        }
                    })
                } else {
                    let formData = new FormData()
                    formData.append('title', menuItemTitle.value)
                    if (menuItemCategoryId.value != 0) {
                        formData.append('category_id', menuItemCategoryId.value)
                    }
                    if (menuItemPic.value != "") {
                        formData.append('image', menuItemPic.files[0])
                    }
                    formData.append('price', menuItemPrice.value)
                    if (menuItemDiscount.value != "" || menuItemDiscount.value != 0) {
                        formData.append('discount', menuItemDiscount.value)
                    }
                    if (menuItemDescription.value.trim() != "") {
                        formData.append('description', menuItemDescription.value)
                    }
                    if(maxUnit.value !== ''){
                        formData.append('max_unit', maxUnit.value)
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        }
                    })
                    $.ajax({
                        url: "{{ url('menuItem/update-front') }}/" + menuItemId.value,
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            console.log(data.description)
                            menuItems.forEach((item) => {
                                if (item.getAttribute('data-menu-item-id') == data.id) {
                                    let formatter = new Intl.NumberFormat('en-US')
                                    if (data.discount != 0) {
                                        item.children[0].classList.remove('invisible')
                                        item.children[0].innerText = data.percent + "%"
                                        item.children[1].children[0].children[1].children[0].children[0]
                                            .innerHTML = `
                                        <span class="font-bold text-xs lg:text-sm">${formatter.format(data.discount)} تومان</span>
                                        <span class="text-gray-400 text-[10px] line-through lg:text-sm">${formatter.format(data.price)} تومان</span
                                        `
                                    }
                                    console.log(item.children[1])
                                    console.log(item.children[1].children[0])
                                    if (data.discount == 0) {

                                        item.children[1].children[0].children[1].children[0].children[0]
                                            .innerHTML = `
                                        <span class="font-bold text-xs lg:text-sm">${formatter.format(data.price)} تومان</span>
                                        `
                                        item.children[0].classList.add('invisible')
                                    }
                                    if (data.image) {
                                        item.children[1].children[0].children[0].children[0]
                                            .setAttribute('src', "{{ asset('storage/') }}/" + data
                                                .image)
                                    }
                                    item.children[1].children[0].children[0].children[1].children[0]
                                        .innerText = data.title
                                    if (data.description) {
                                        item.children[1].children[0].children[0].children[1].children[1]
                                            .innerText = data.description
                                    }
                                }
                            })
                            el.innerHTML = text
                            closeForm()
                        },
                        error: function() {
                            console.log('error')
                        }
                    })
                }
            }
        }

        function menuItemDelete(el, itemId) {
            console.log(el)
            el.innerHTML =
                "<div class='w-5 h-5 mx-auto border-3 border-white border-t-[#eb3153] rounded-full animate-spin'></div>"
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('menuItem/delete-front') }}/" + itemId,
                type: "GET",
                success: function(data) {
                    // console.log(data)
                    el.parentElement.parentElement.parentElement.parentElement.remove()
                },
                error: function() {
                    console.log('error')
                }
            })
        }


        let menus = document.querySelectorAll('.menus')
        let menuParent = document.querySelectorAll('.menuParent')

        function showMenu(el, menuId) {
            // console.log(menuId)
            let menuParent = document.querySelectorAll('.menuParent')
            menuParent.forEach((menuCild) => {
                menuCild.parentElement.classList.remove('selected')
            })
            el.parentElement.classList.add('selected')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('menu/showMenu/') }}/" + menuId,
                type: "GET",
                success: function(data) {
                    // console.log(data)
                    menuItemList.innerHTML = ""
                    console.log(menuItemList)
                    newItem.setAttribute('data-menu-create-item-id', data.id)

                    let items = data.menu_items
                    items.forEach((item, index) => {
                        let div = document.createElement('div')
                        div.classList =
                            "w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems relative"
                        div.setAttribute('data-menu-item-title', item.title)
                        div.setAttribute('data-menu-item-id', item.id)

                        let inner = `<span class="text-xs`

                        if (item.discount == 0) {
                            inner += ` invisible `
                        }
                        inner +=
                            ` text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">`
                        if (item.discount != 0) {
                            inner += ` ${item.percent}% `
                        }
                        inner += `</span>`

                        inner += `
                                        <div class="w-full flex items-center justify-between">
                                            <div class="w-11/12 flex flex-row gap-5 items-center">
                                                <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer" onclick="openSingle(this)">
                                                    <img src='${item.image ? "{{ asset('storage/') }}/" + item.image : "{{ asset('assets/img/user.png') }}"}'
                                                         class="size-22 rounded-lg object-cover border border-gray-300"
                                                         alt="${item.title}">
                                                    <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                                        <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">${item.title}</h3>
                                                        <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">${item.description != null ? item.description : ""}</p>
                                                    </div>
                                                </div>
                                                <div class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                                    <div class="flex flex-row items-center gap-3">

                                        <div class="text-left flex flex-col items-end">
                                        `
                        let formatter = new Intl.NumberFormat('en-US')
                        if (item.discount == 0) {
                            inner += `
                                            <span class="font-bold text-xs lg:text-sm">${formatter.format(item.price)}تومان</span>
                                        `
                        } else {
                            inner += `
                                        <span class="font-bold text-xs lg:text-sm">${formatter.format(item.discount)}  تومان</span>
                                            <span class="text-gray-400 text-[10px] line-through lg:text-sm">${formatter.format(item.price)} تومان</span>
                                        `
                        }
                        inner += `

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col items-center gap-2 lg:gap-5">
                                                        <div class="flex justify-center">
                                                            <span onclick='menuItemForm(${item.id})'
                                                              class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                              title="ویرایش">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="size-5"
                                                                 viewBox="0 0 512 512">
                                                                <path fill="white"
                                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-center">
                                                        <span onclick='menuItemDelete(this, ${item.id})'
                                                              class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                              title="حذف">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="size-5"
                                                                 viewBox="0 0 448 512">
                                                                <path fill="white"
                                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                                                `
                        div.innerHTML = inner
                        menuItemList.appendChild(div)

                    })


                },
                error: function() {
                    console.log('error')
                }
            })
        }

        function showItems(el, categoryId) {
            let menuCategories = document.querySelectorAll('.menuCategories')
            menuCategories.forEach((cat) => {
                cat.classList.remove('border-red-600')
                cat.classList.add('border-gray-300')
            })
            el.classList.remove('border-gray-300')
            el.classList.add('border-red-600')
            newItem.setAttribute('data-menu-create-item-id', categoryId)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('menuCategory/items') }}/" + categoryId,
                type: "GET",
                success: function(data) {
                    menuItemList.innerHTML = ""
                    data.forEach((item, index) => {
                        let div = document.createElement('div')
                        div.classList =
                            "w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems relative"
                        div.setAttribute('data-menu-item-title', item.title)
                        div.setAttribute('data-menu-item-id', item.id)
                        let inner = `<span class="text-xs`
                        // inner+=`<span class="text-xs`
                        if (item.discount == 0) {
                            inner += ` invisible `
                        }
                        inner +=
                            ` text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">`
                        if (item.discount != 0) {
                            inner += ` ${item.percent}% `
                        }
                        inner += `</span>`
                        // let inner = ``
                        // if (item.discount != 0) {
                        //     inner += `
                    //         <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                    //             ${item.percent}%
                    //         </span>`
                        // }
                        // if (item.discount == 0) {
                        //     inner += `
                    //         <span class="text-xs invisible text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">

                    //         </span>`
                        // }
                        inner += `
                            <div class="w-full flex items-center justify-between">
                                <div class="w-11/12 flex flex-row gap-5 items-center">
                                    <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer" onclick="openSingle(this)">
                                        <img src='${item.image ? "{{ asset('storage/') }}/" + item.image : "{{ asset('assets/img/user.png') }}"}'
                                             class="size-22 rounded-lg object-cover border border-gray-300"
                                             alt="${item.title}">
                                        <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                            <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">${item.title}</h3>
                                            <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">${item.description != null ? item.description : ""}</p>
                                        </div>
                                    </div>
                                    <div class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                        <div class="flex flex-row items-center gap-3">

                            <div class="text-left flex flex-col items-end">
                            `
                        let formatter = new Intl.NumberFormat('en-US')
                        if (item.discount == 0) {
                            inner += `
                                    <span class="font-bold text-xs lg:text-sm">${formatter.format(item.price)}تومان</span>
                                `
                        } else {
                            inner += `
                                    <span class="font-bold text-xs lg:text-sm">${formatter.format(item.discount)}  تومان</span>
                                    <span class="text-gray-400 text-[10px] line-through lg:text-sm">${formatter.format(item.price)} تومان</span>
                                `
                        }
                        inner += `

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-2 lg:gap-5">
                    <div class="flex justify-center">
                        <span onclick='menuItemForm(${item.id})'
                          class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                          title="ویرایش">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 512 512">
                            <path fill="white"
                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                        </svg>
                    </span>
                </div>
                <div class="flex justify-center">
                    <span onclick='menuItemDelete(this, ${item.id})'
                          class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                          title="حذف">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </span>
                </div>
                </div>
                </div>
                            `
                        div.innerHTML = inner
                        menuItemList.appendChild(div)

                    })

                },
                error: function() {
                    console.log("error")
                }
            })
        }

        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-1/10')
            }
            if (state == 'close') {
                message.classList.remove('top-1/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        let forms = document.querySelectorAll('.form')
        let inps = document.querySelectorAll('input')
        let textareas = document.querySelectorAll('textarea')
        let require = document.querySelectorAll('.req')

        function closeForm() {
            block.classList.add('invisible')
            block.classList.add('opacity-0')
            loader.classList.add('hidden')
            menuListOptions.classList.add('hidden')
            menuItemCategoryId.classList.add('hidden')
            forms.forEach((form) => {
                form.classList.add('opacity-0')
                form.classList.add('invisible')
                form.classList.add('hidden')
            })
            require.forEach((req) => {
                req.classList.remove('border-b-1')
                req.classList.remove('border-b-red-500')
            })
            inps.forEach((inp) => {
                inp.value = ""
            })
            textareas.forEach((textarea) => {
                textarea.value = ""
            })
        }

        let showMenuItemBox = document.getElementById('showMenuItemBox')

        function openSingle(el) {
            closeForm()

            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            showMenuItemBox.classList.remove('invisible')
            showMenuItemBox.classList.remove('opacity-0')
            showMenuItemBox.classList.remove('hidden')

            let image = ""
            let title = ""
            let description = ""
            let percent = ""
            let id = el.parentElement.parentElement.parentElement.getAttribute('data-menu-item-id')
            if (el.parentElement.parentElement.parentElement.children[2]) {

                image = el.parentElement.parentElement.parentElement.children[2].children[0].children[0].children[0]
                    .getAttribute('src')
                title = el.parentElement.parentElement.parentElement.children[2].children[0].children[0].children[1]
                    .children[0].innerText
                description = el.parentElement.parentElement.parentElement.children[2].children[0].children[0].children[1]
                    .children[1].innerText
                percent = el.parentElement.parentElement.parentElement.children[1].innerText
            } else {
                image = el.parentElement.parentElement.parentElement.children[1].children[0].children[0].children[0]
                    .getAttribute('src')
                title = el.parentElement.parentElement.parentElement.children[1].children[0].children[0].children[1]
                    .children[0].innerText
                description = el.parentElement.parentElement.parentElement.children[1].children[0].children[0].children[1]
                    .children[1].innerText
                percent = el.parentElement.parentElement.parentElement.children[0].innerText
            }


            showMenuItemBox.children[0].children[0].children[0].children[0].setAttribute('onclick', `menuItemForm(${id})`)
            showMenuItemBox.children[0].children[0].children[1].children[0].setAttribute('onclick',
                `menuItemDelete(this, ${id})`)
            showMenuItemBox.children[0].children[1].children[0].setAttribute('src', image)
            showMenuItemBox.children[0].children[1].children[1].innerText = percent
            showMenuItemBox.children[0].children[2].children[0].innerText = title
            showMenuItemBox.children[0].children[2].children[1].innerText = description
            // console.log(el.parentElement.parentElement.parentElement)
        }

        // menuItems.forEach((item)=>{
        //     item.addEventListener('click', ()=>{
        //         closeForm()
        //         console.log(item)
        //         block.classList.remove('invisible')
        //         block.classList.remove('opacity-0')
        //         showMenuItemBox.classList.remove('invisible')
        //         showMenuItemBox.classList.remove('opacity-0')
        //         showMenuItemBox.classList.remove('hidden')
        //
        //
        //         let id = item.children[0].value
        //         let percent = item.children[1].innerText
        //         let image = item.children[2].children[0].children[0].children[0].getAttribute('src')
        //         let title = item.children[2].children[0].children[0].children[1].children[0].innerText
        //         let description = item.children[2].children[0].children[0].children[1].children[1].innerText
        //
        //         showMenuItemBox.children[0].children[0].children[0].children[0].setAttribute('onclick', `menuItemForm(${id})`)
        //         showMenuItemBox.children[0].children[0].children[1].children[0].setAttribute('onclick', `menuItemDelete(this, ${id})`)
        //         showMenuItemBox.children[0].children[1].children[0].setAttribute('src', image)
        //         showMenuItemBox.children[0].children[1].children[1].innerText = percent
        //         showMenuItemBox.children[0].children[2].children[0].innerText = title
        //         showMenuItemBox.children[0].children[2].children[1].innerText = description
        //
        //     })
        // })


        function selectMenus() {
            menuListOptions.classList.remove('hidden')
            menuListOptions.innerHTML = ''
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('career.menus', [$career->id]) }}",
                type: "GET",
                success: function(data) {
                    console.log(newCat)
                    data.forEach((menu) => {
                        let option = document.createElement('option')
                        if (newCat.getAttribute('data-menu-create-cat-id') == menu.id) {
                            option.selected = true
                        }
                        option.value = menu.id
                        option.innerText = menu.title
                        menuListOptions.appendChild(option)
                    })
                    // console.log(data)
                },
                error: function() {
                    console.log("error")
                }
            })
        }
    </script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection
