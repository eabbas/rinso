@extends('admin.app.panel')
@section('title')
    آیتم های دسته {{ $category->title }}
@endsection

@section('content')
    <div class="flex flex-col w-full mb-3">
        <div class="flex flex-row justify-between items-end my-4">
            <div>
                <h1 class="text-sm lg:text-lg font-bold"> لیست آیتم های منو {{ $category->title }} </h1>
            </div>
            <div class="w-full flex flex-row justify-end p-3">
            <a href="{{ url()->previous()}}" class="text-xs px-2 py-0.5 rounded-sm bg-gray-500 text-white">بازگشت ←</a>
               </div>
        </div>
        <form action="{{ route('menuItem.deleteAll') }}" method="post"
            class="flex flex-col p-2 lg:p-5 gap-3 shadow__profaill__list_products rounded-[7px] bg-white">
            @csrf
            <div class="flex flex-row justify-end">
                <div
                    class="cursor-pointer px-5 py-2.5 rounded-[7px] flex justify-center items-center bg-blue-500 text-white text-xs lg:text-base">
                    <a href="{{ route('menuItem.create', [$category->id]) }}">افزودن آیتم جدید</a>
                </div>
            </div>
            <div class="w-10/12 lg:w-2/3 mx-auto flex flex-row justify-between items-center">
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
            <div class="lg:p-3">
                <div class="w-10/12 lg:w-2/3 m-auto overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                    <div
                        class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                        <div class="px-1 text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                            <div class="w-10 lg:w-full h-10"></div>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-10 lg:w-full">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">تصویر</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-24 lg:w-full">عنوان</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-24 lg:w-full">دسته</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                            <span class="block w-[140px] lg:w-full">عملیات</span>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($category->menu_items as $item)
                            <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4]">
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <div class="w-10 lg:w-full">
                                        <input type="checkbox" class="check" name="items[]" value="{{ $item->id }}">
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
                                            src="{{ asset('storage/' . $item->image) }}">
                                    </div>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-20 lg:w-full">{{ $item->title }}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-20 lg:w-full">{{ $item->menu_category->title }}</span>
                                </div>


                                <div class="col-span-4">
{{--                                    grid grid-cols-2 divide-x divide-[#f1f1f4] items-center--}}
                                    <div
                                        class="lg:w-full w-[140px]">

                                        <ul class="text-sm grid grid-cols-3 items-center mt-1 rounded-sm p-1">

                                            <li class="flex justify-center">
                                                <a href="{{ route('menuItem.single', [$item->id]) }}"
                                                    class="w-fit flex flex-row items-center justify-center bg-blue-500 hover:bg-blue-600 p-1 rounded-sm"
                                                    title="مشاهده">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 576 512">
                                                        <path fill="white"
                                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="flex justify-center">
                                                <a href="{{ route('menuItem.edit', [$item->id]) }}"
                                                    class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm"
                                                    title="ویرایش">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 512 512">
                                                        <path fill="white"
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="flex justify-center">
                                                <a href="{{ route('menuItem.delete', [$item->id]) }}"
                                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm"
                                                    title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 448 512">
                                                        <path fill="white"
                                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>

{{--                                        @if ($item->parent_id == 0)--}}
{{--                                            <div--}}
{{--                                                class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">--}}
{{--                                                <a href="{{ route('menuItem.variants', [$item->id]) }}"--}}
{{--                                                    class="block text-center hover:text-blue-800 p-1 rounded-sm text-gray-700">ایجاد--}}
{{--                                                    نوع </a>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/js/menuCat.js') }}"></script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
