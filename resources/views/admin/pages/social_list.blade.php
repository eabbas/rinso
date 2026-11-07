@extends('admin.app.panel')
@section('title', ' صفحه های من ')
@section('content')
    <div class="w-full flex flex-col pb-4">
        <div class="pb-4">
            <h2 class="lg:text-lg font-bold text-gray-800 text-center">اطلاعات صفحه های من</h2>
        </div>
        @if (count(Auth::user()->pages))
            <form action="{{ route('pages.deleteAll') }}" method="post" class="flex flex-col gap-5">
                @csrf
                <div class="w-full flex flex-row justify-between items-center gap-5">
                    <div class="flex flex-row items-center gap-3">
                        <input type="checkbox" id="all" onchange="checkAll()">
                        <label for="all" class="text-sm text-gray-800">انتخاب همه</label>
                    </div>
                    <button type="submit">
                        <div class="flex justify-center">
                            <div class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                title="حذف">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                    <path fill="white"
                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="overflow-x-auto shadow-sm bg-white rounded-lg" style="scrollbar-width: none;">
                    <div class="min-w-full">
                        <div class="bg-white divide-y divide-[#f1f1f4]">
                            @foreach (Auth::user()->pages as $cover)
                                @if ($cover)
                                    <div class="w-full flex flex-row justify-between shadow-sm items-center px-3">
                                        <div class="lg:w-9/12 flex flex-row gap-3">
                                        <input type="checkbox" name="pages[]" class="check" value="{{ $cover->id }}">
                                            <a href="{{ route('pages.single', [$cover]) }}"
                                                class="flex flex-row items-center gap-3 py-3">
                                                <!-- لوگو -->
                                                <div class="text-sm h-full flex items-center justify-center text-gray-900">
                                                    @if($cover->logo_path)
                                                        <img class="size-10 rounded-full object-cover mx-auto"
                                                            src="{{ asset('storage/' . $cover->logo_path) }}">
                                                    @else
                                                        <img class="size-10 rounded-full object-cover mx-auto"
                                                             src="{{ asset('assets/img/user.png') }}">
                                                    @endif

                                                </div>
                                                <!-- عنوان -->
                                                <div
                                                    class="text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                                    <span>{{ $cover->title }}</span>
                                                </div>
                                                <!-- عملیات -->
                                                {{-- <div class="p-3 col-span-2">
                                                    <div class="grid grid-cols-3 gap-2">
                                                        <div class="text-center">
                                                            <a href="{{ route('socialAddress.create', [$cover])}}"
                                                                class="text-sky-700 text-sm block py-1">افزودن شبکه اجتماعی</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="{{ route('socialAddress.list')}}"
                                                                class="text-sky-700 text-sm block py-1">مشاهده شبکه های اجتماعی</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="{{ route('siteLink.create', [$cover])}}"
                                                                class="text-sky-700 text-sm block py-1">افزودن لینک</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="{{ route('siteLink.list')}}"
                                                                class="text-sky-700 text-sm block py-1">مشاهده لینک ها</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="{{ route('pages.edit',[$cover])}}"
                                                                class="text-sky-700 text-sm block py-1">ویرایش</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="{{ route('pages.delete',[$cover])}}"
                                                                class="text-sky-700 text-sm block py-1">حذف</a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </a>
                                        </div>
                                        <div class="lg:w-4/12 flex flex-row justify-end items-center gap-3">
                                            <div class="lg:block hidden">
                                                <a href="{{ route('special-user.index', [$cover]) }}"
                                                   class="text-sky-700 text-sm block py-1">باشگاه مشتریان</a>
                                            </div>
                                            <div class="lg:block hidden">
                                                <a href="{{ route('pages.edit', [$cover]) }}"
                                                    class="text-sky-700 text-sm block py-1">ویرایش</a>
                                            </div>
                                            <div class="lg:block hidden">
                                                <a href="{{ route('pages.delete', [$cover]) }}"
                                                    class="text-sky-700 text-sm block py-1">حذف</a>
                                            </div>
                                            <div class="lg:hidden block">
                                                <div class="flex justify-center">
                                                    <a href="{{ route('special-user.index', [$cover]) }}"
                                                       class="w-fit flex flex-row items-center justify-center p-1 rounded-sm text-sm text-blue-600 font-bold"
                                                       title="ویرایش">
                                                        باشگاه مشتریان
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lg:hidden block">
                                                <div class="flex justify-center">
                                                    <a href="{{ route('pages.edit', [$cover]) }}"
                                                        class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm"
                                                        title="ویرایش">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            viewBox="0 0 512 512">
                                                            <path fill="white"
                                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="lg:hidden block">
                                                <div class="flex justify-center">
                                                    <a href="{{ route('pages.delete', [$cover]) }}"
                                                        class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm"
                                                        title="حذف">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                            viewBox="0 0 448 512">
                                                            <path fill="white"
                                                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="{{ route('pages.single', [$cover]) }}"
                                                    class="inline-block p-1 mt-2 lg:p-2 rounded-md bg-gray-200 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            {{-- <div>
                                                 <a href="#" class="inline-block p-2  rounded-md bg-gray-100 cursor-pointer">
                                                 <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                        <path d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"/>
                                                    </svg>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <div class="px-6 py-4 text-center text-sm text-gray-500">
                                            هیچ اطلاعاتی یافت نشد
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div class="w-full bg-white h-40 rounded-xl flex flex-col gap-3 lg:gap-5 items-center justify-center">
                <span class="text-gray-700 text-sm lg:text-base">
                    هنوز هیچ شبکه ای ایجاد نکرده اید!
                </span>
                <a href="{{ route('pages.create') }}" class="block text-blue-700 text-md">
                    ایجاد صفحه
                </a>
            </div>
        @endif
    </div>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
