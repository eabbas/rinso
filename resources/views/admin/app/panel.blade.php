<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    
    <link rel="shortcut icon" href="{{ asset('storage/logos/ringaLogo1.png') }}" type="image/png">
    <title>@yield('title')</title>
    @include('broad')
</head>
<body>
@php
    if(Auth::check()){
        $roles = Auth::user()->role;
        $ids = $roles->pluck('id')->toArray();
    }
@endphp
<div class="w-full flex flex-row relative z-999">
    <div class="hidden lg:block lg:w-[265px] bg-[#0D0E12] fixed z-50 right-0 top-0 h-dvh px-3 text-sm">
        <div class="w-full">
            <a href="{{ route('home') }}"
               class="block w-full py-3 text-center font-bold text-3xl text-white border-b border-[darkslategray]">
                rinso.ir
            </a>
        </div>
        <div class="py-5 h-[90%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
            <div class="flex flex-row items-center gap-2.5 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                    <path fill="white"
                          d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <a href="{{ route('home') }}" class="block w-full text-white py-1" target="_blank">
                    صفحه اول
                </a>
            </div>
            <div
                    class="flex flex-row items-center gap-2.5 rounded-sm px-2 @if (Route::is('dashboard')) bg-gray-700 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                    <path fill="white"
                          d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                </svg>
                <a href="{{ route('dashboard') }}" class="block w-full text-white py-1">
                    داشبورد
                </a>
            </div>


            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">صفحه ها</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                            <path fill="white"
                                  d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) max-h-[500px] @else max-h-0 @endif">
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('pages.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('pages.create') }}" class="text-white py-1 block">ایجادصفحه
                        </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('pages.social_list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('pages.social_list') }}" class="text-white py-1 block"> لیست صفحه های
                            من
                        </a>
                    </li>
                    @if (in_array(1, $ids))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('pages.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('pages.list') }}" class="text-white py-1 block"> لیست همه صفحه ها
                            </a>
                        </li>
                    @endif

                    @if (in_array(1, $ids))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('socialMedia.create')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('socialMedia.create') }}" class="text-white py-1 block">
                                ایجاد شبکه اجتماعی
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('socialMedia.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('socialMedia.list') }}" class="text-white py-1 block">
                                لیست شبکه های اجتماعی
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            @if (in_array(1, $ids) || in_array(4, $ids))
                <div class="dashboard">
                    <div
                            class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('user.list') ||
                                Route::is('user.create_user') ||
                                Route::is('user.myUsers') ||
                                Route::is('user.requestList')) bg-gray-700 @endif">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4 transition-all duration-200 @if (Route::is('user.list') ||
                                    Route::is('user.create_user') ||
                                    Route::is('user.myUsers') ||
                                    Route::is('user.requestList')) rotate-180 @endif"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">کاربران</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                <path fill="white"
                                      d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                    </div>
                    <ul
                            class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('user.list') ||
                                Route::is('user.create_user') ||
                                Route::is('user.myUsers') ||
                                Route::is('user.requestList')) max-h-[500px] @else max-h-0 @endif">

                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.myUsers')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.myUsers') }}" class="text-white py-1 block">
                                مشتریان من
                            </a>
                        </li>

                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.list') }}" class="text-white py-1 block">
                                همه کاربران
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.create_user')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.create_user') }}" class="text-white py-1 block">
                                ایجاد کاربر جدید
                            </a>
                        </li>


                        @if (in_array(1, $ids) || in_array(4, $ids))
                            <li
                                    class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.requestList')) bg-gray-700 @endif">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('user.requestList') }}" class="text-white py-1 block">
                                    لیست درخواست ها
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif

            @if (in_array(1, $ids))
                <div class="dashboard">
                    <div
                            class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('contactUs.*')) bg-gray-700 @endif">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4 transition-all duration-200 @if (Route::is('contactUs.*')) rotate-180 @endif"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                        </svg>

                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">ارتباط باما</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                            </svg>
                        </div>
                    </div>
                    <ul
                            class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('contactUs.*')) max-h-[500px] @else max-h-0 @endif">
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('contactUs.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('contactUs.list') }}" class="text-white py-1 block">
                                لیست تیکت ها
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('contactUs.create')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('contactUs.create') }}" class="text-white py-1 block">
                                فرم ارتباط با ما
                            </a>
                        </li>

                    </ul>
                </div>
            @endif
            {{-- end-contactUs --}}
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('aboutUs.*')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('aboutUs.*')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">درباره ما</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 640 512">
                            <path fill="white"
                                  d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('aboutUs.create_edit') || Route::is('aboutUs.list')) max-h-[500px] @else max-h-0 @endif">
                    @if (in_array(1, $ids))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('aboutUs.create_edit')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.create_edit') }}" class="text-white py-1 block">
                                ایجاد درباره ما
                            </a>
                        </li>
                    @endif
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('aboutUs.list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('aboutUs.list') }}" class="text-white py-1 block">
                            درباره ما
                        </a>
                    </li>
                </ul>
            </div>
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('generalQrCodes.*')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('generalQrCodes.*')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">کیوآر کد</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('generalQrCodes.create') || Route::is('generalQrCodes.list')) max-h-[500px] @else max-h-0 @endif">
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('generalQrCodes.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('generalQrCodes.create') }}" class="text-white py-1 block">
                            ایجاد کیوآر کد جدید </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('generalQrCodes.list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('generalQrCodes.list') }}" class="text-white py-1 block">
                            لیست کیوآر کد های من
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="w-full relative">
    <header class="w-full fixed top-0 right-0 z-10">

        @include('header')



        <!-- hamburger menu -->

        <!-- hamburger menu end -->
    </header>
    <div class="w-full h-dvh  lg:w-[calc(100%-265px)] pb-24 float-end pt-20 lg:px-5 overflow-y-auto px-3 relative bg-[#F2F2F2] z-9"
         style="scrollbar-width:none;">
        @yield('content')
        @include('footer')
    </div>
</div>


{{-- <script src="{{ asset('assets/js/ecomm_product_create.js') }}"></script> --}}

{{-- <script src="{{ asset('assets/js/userPanel.js') }}"></script> --}}
</body>

</html>
