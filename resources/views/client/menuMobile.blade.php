<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/images/Famenu1.png') }}" type="image/png">
    <title>@yield('title')</title>
</head>
<body>
        <div id="comingSoon" class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-xs w-full p-5 relative transform transition-all duration-300 scale-95 opacity-0" id="contentCommingSoon">
            <button id="closeModal" class="absolute top-3 left-3 text-gray-500 hover:text-gray-800 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="text-center pt-2">
                <h3 class="text-lg font-bold text-gray-800 mb-2">به زودی</h3>
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#eb3254] rounded-full mb-4">
                    <svg class="w-8 h-8 text-[#eb3254]" fill="white" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h6>سلام دوست عزیز</h6>
                <p class="text-gray-600 text-sm mb-5">
                    فروشگاه در حال راه‌اندازی است
                </p>
                
                <button id="closeForm" class="w-full bg-[#eb3254] hover:bg-[#eb3254] text-white py-2.5 rounded-lg text-sm font-medium transition">
                    باشه
                </button>
            </div>
        </div>
    </div>
    <div id="cart" class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-xs w-full p-5 relative transform transition-all duration-300 scale-95 opacity-0" id="contentCart">
            <button id="closeCart" class="absolute top-3 left-3 text-gray-500 hover:text-gray-800  text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="text-center pt-2">
                <h3 class="text-lg font-bold text-gray-800 mb-2">به زودی</h3>
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#eb3254] rounded-full mb-4">
                    <svg class="w-8 h-8 text-[#eb3254]" fill="white" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h6>سلام دوست عزیز</h6>
                <p class="text-gray-600 text-sm mb-5">
                   پس از راه اندازی فروشگاه سبد خرید راه اندازی میشود
                </p>
                
                <button id="closeFormCart" class="w-full bg-[#eb3254] hover:bg-[#eb3254] text-white py-2.5 rounded-lg text-sm font-medium transition">
                    باشه
                </button>
            </div>
        </div>
    </div>
    <main class="2xl:container mx-auto">
        @yield('content')
    </main>

    <div class="lg:hidden w-full fixed bottom-0 bg-white right-0">
        <div class="w-full flex flex-row justify-center">
            <ul
                class="w-full mx-auto flex flex-row justify-between items-center bg-white border-t-1 border-gray-300 p-2">
                <li>
                    {{-- category --}}
                    <a href="#" class="size-10 flex justify-center items-center rounded-full">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Layer_1" data-name="Layer 1"
                            viewBox="0 0 24 24" width="512" height="512">
                            <path
                                d="M22.849,7.68l-.869-.68h.021V2h-2v3.451L13.849,.637c-1.088-.852-2.609-.852-3.697,0L1.151,7.68c-.731,.572-1.151,1.434-1.151,2.363v13.957H9V15c0-.551,.448-1,1-1h4c.552,0,1,.449,1,1v9h9V10.043c0-.929-.42-1.791-1.151-2.363Zm-.849,14.32h-5v-7c0-1.654-1.346-3-3-3h-4c-1.654,0-3,1.346-3,3v7H2V10.043c0-.31,.14-.597,.384-.788L11.384,2.212c.363-.284,.869-.284,1.232,0l9,7.043c.244,.191,.384,.478,.384,.788v11.957Z" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="{{ route('career.careers') }}"
                        class="size-10 flex justify-center items-center rounded-full">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Outline" viewBox="0 0 24 24"
                            width="512" height="512">
                            <path
                                d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V9A3,3,0,0,0,21,6ZM12,2a4,4,0,0,1,4,4H8A4,4,0,0,1,12,2ZM22,19a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1Z" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}"
                        class="size-10 bg-[#EB3254] flex justify-center items-center rounded-full">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Layer_1" data-name="Layer 1"
                            viewBox="0 0 24 24">
                            <path fill="white"
                                d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z" />
                        </svg>

                    </a>
                </li>
                <li>
                    {{-- ecommerce --}}
                    <a href="#" class="size-10 flex justify-center items-center rounded-full">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline" viewBox="0 0 24 24"
                            width="512" height="512">
                            <path
                                d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z" />
                            <circle cx="7" cy="22" r="2" />
                            <circle cx="17" cy="22" r="2" />
                        </svg>

                    </a>
                    {{-- ecommerce end --}}
                </li>
                @if (!Auth::check())
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="size-10 flex justify-center items-center rounded-full">
                            {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline"
                                viewBox="0 0 24 24" width="512" height="512">
                                <path
                                    d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                                <path
                                    d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                            </svg>

                        </a>
                    </li>
                @else
                    <li>
                        <div class="size-10 flex justify-center items-center rounded-full"
                            onclick="openUserOptions('open')">
                            {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline"
                                viewBox="0 0 24 24" width="512" height="512">
                                <path
                                    d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                                <path
                                    d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                            </svg>

                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    @if (Auth::check())
        <div class="w-full h-[calc(100vh-300px)] fixed right-0 border-t-1 border-x-1 border-gray-300 transition-all duration-200 -bottom-full bg-white rounded-t-xl"
            id="popupUser">
            <div class="w-full relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3 size-3 cursor-pointer"
                    onclick="openUserOptions('close')" viewBox="0 0 448 512">
                    <path
                        d="M41 39C31.6 29.7 16.4 29.7 7 39S-2.3 63.6 7 73l183 183L7 439c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l183-183L407 473c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-183-183L441 73c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-183 183L41 39z" />
                </svg>
                <h3 class="text-center py-4 font-bold bg-gray-200 rounded-t-[11px] border-b border-gray-300">
                    {{ Auth::user()->name }} {{ Auth::user()->family }}</h3>
                <ul class="flex flex-col px-3">
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">پروفایل من</a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit', [Auth::user()]) }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">
                            ویرایش پروفایل
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aboutUs.clientList') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">درباره فامنو</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs.create') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">ارتباط با ما</a>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}"
                            class="block py-3  text-sm font-bold bg-[#eb3254]/30 text-center">خروج از حساب کاربری</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
    {{-- bottom menu mobile end --}}
    <footer class="hidden fixed bottom-0 right-0 lg:block lg:w-full">
        <div class="2xl:container mx-auto w-full bg-gray-600 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
            <span class="text-white">آکادمی فائوس</span>
            <a href="tel:+989147794595" class="text-gray-100">09147794595</a>
        </div>
    </footer>
    <script src="{{ asset('assets/js/home.js') }}"></script>
        {{-- bottom menu mobile --}}

    <div class="lg:hidden w-full fixed bottom-0 bg-white right-0">
        <div class="w-full flex flex-row justify-center">
            <ul
                class="w-full mx-auto flex flex-row justify-between items-center bg-white border-t-1 border-gray-300 p-2">
                <li>
                    {{-- category --}}
                    <a href="{{ route('home') }}" class="size-10 flex justify-center items-center rounded-full @if(Route::is('home')) bg-[#eb3254] @endif">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 @if(Route::is('home')) fill-white @endif" id="Layer_1" data-name="Layer 1"
                            viewBox="0 0 24 24" width="512" height="512">
                            <path
                                d="M22.849,7.68l-.869-.68h.021V2h-2v3.451L13.849,.637c-1.088-.852-2.609-.852-3.697,0L1.151,7.68c-.731,.572-1.151,1.434-1.151,2.363v13.957H9V15c0-.551,.448-1,1-1h4c.552,0,1,.449,1,1v9h9V10.043c0-.929-.42-1.791-1.151-2.363Zm-.849,14.32h-5v-7c0-1.654-1.346-3-3-3h-4c-1.654,0-3,1.346-3,3v7H2V10.043c0-.31,.14-.597,.384-.788L11.384,2.212c.363-.284,.869-.284,1.232,0l9,7.043c.244,.191,.384,.478,.384,.788v11.957Z" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="#" id="shopIcon" class="size-10 flex justify-center items-center rounded-full transition cursor-pointer">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 " id="Outline" viewBox="0 0 24 24"
                            width="512" height="512">
                            <path
                                d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V9A3,3,0,0,0,21,6ZM12,2a4,4,0,0,1,4,4H8A4,4,0,0,1,12,2ZM22,19a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1Z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="" class="size-10 flex justify-center items-center rounded-full">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                            <defs>
                                <style>
                                    .fa-secondary {
                                        opacity: .4
                                    }
                                </style>
                            </defs>
                            <path class="fa-secondary"
                                d="M64 270.5L64.1 472c0 22.1 17.9 40 40 40H184c22.1 0 40-17.9 40-40V383.7c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32V472c0 22.1 17.9 40 40 40h80.5c22.1 0 40-18 40-40.1l-.4-201.3L288 74.5 64 270.5z" />
                            <path class="fa-primary"
                                d="M266.9 7.9C279-2.6 297-2.6 309.1 7.9l256 224c13.3 11.6 14.6 31.9 3 45.2s-31.9 14.6-45.2 3L288 74.5 53.1 280.1c-13.3 11.6-33.5 10.3-45.2-3s-10.3-33.5 3-45.2l256-224z" />
                        </svg> --}}
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Layer_1" data-name="Layer 1"
                            viewBox="0 0 24 24">
                            <path
                                d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z" />
                        </svg>

                    </a>
                </li>
                <li>
                    {{-- ecommerce --}}
                    <a href="#" id="cartIcon" class="size-10 flex justify-center items-center rounded-full">
                        {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline" viewBox="0 0 24 24"
                            width="512" height="512">
                            <path
                                d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z" />
                            <circle cx="7" cy="22" r="2" />
                            <circle cx="17" cy="22" r="2" />
                        </svg>

                    </a>
                    {{-- ecommerce end --}}
                </li>
                @if (!Auth::check())
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="size-10 flex justify-center items-center rounded-full @if(Route::is('login')) bg-[#eb3254] @endif">
                            {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 @if(Route::is('login')) fill-white @endif" id="Outline"
                                viewBox="0 0 24 24" width="512" height="512">
                                <path
                                    d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                                <path
                                    d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                            </svg>

                        </a>
                    </li>
                @else
                    <li>
                        <div class="size-10 flex justify-center items-center rounded-full"
                            onclick="openUserOptions('open')">
                            {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline"
                                viewBox="0 0 24 24" width="512" height="512">
                                <path
                                    d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                                <path
                                    d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                            </svg>

                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    @if (Auth::check())
        <div class="w-full h-[calc(100vh-300px)] fixed right-0 border-t-1 border-x-1 border-gray-300 transition-all duration-200 -bottom-full bg-white rounded-t-xl"
            id="popupUser">
            <div class="w-full relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3 size-3 cursor-pointer"
                    onclick="openUserOptions('close')" viewBox="0 0 448 512">
                    <path
                        d="M41 39C31.6 29.7 16.4 29.7 7 39S-2.3 63.6 7 73l183 183L7 439c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l183-183L407 473c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-183-183L441 73c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-183 183L41 39z" />
                </svg>
                <h3 class="text-center py-4 font-bold bg-gray-200 rounded-t-[11px] border-b border-gray-300">
                    {{ Auth::user()->name }} {{ Auth::user()->family }}</h3>
                <ul class="flex flex-col px-3">
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">پروفایل من</a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit', [Auth::user()]) }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">
                            ویرایش پروفایل
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aboutUs.clientList') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">درباره فامنو</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs.create') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">ارتباط با ما</a>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}"
                            class="block py-3  text-sm font-bold bg-[#eb3254]/30 text-center">خروج از حساب کاربری</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
    {{-- bottom menu mobile end --}}
    <footer class="hidden lg:block lg:w-full mx-auto">
        <div class="w-full bg-gray-600 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
            <span class="text-white">آکادمی فائوس</span>
            <a href="tel:+989147794595" class="text-gray-100">09147794595</a>
        </div>
    </footer>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        let shopIcon = document.getElementById('shopIcon');
        let comingSoon = document.getElementById('comingSoon');
        let contentCommingSoon = document.getElementById('contentCommingSoon');
        let closeBtn = document.getElementById('closeModal');
        let confirmBtn = document.getElementById('closeForm');
        
        if (shopIcon) {
            shopIcon.addEventListener('click', function(e) {
                e.preventDefault()
                openModal()
            })
        }
        
        function openModal() {
            comingSoon.classList.remove('hidden')
            contentCommingSoon.classList.remove('scale-95', 'opacity-0')
            contentCommingSoon.classList.add('scale-100', 'opacity-100')
        }
        
        function closeModal() {
            contentCommingSoon.classList.remove('scale-100', 'opacity-100')
            contentCommingSoon.classList.add('scale-95', 'opacity-0')
            comingSoon.classList.add('hidden')
           
        }
        
        if (closeBtn) closeBtn.addEventListener('click', closeModal)
        if (confirmBtn) confirmBtn.addEventListener('click', closeModal)
        
    })

    let cartIcon = document.getElementById('cartIcon');
    let cartModal = document.getElementById('cart');
    let cartContent = document.getElementById('contentCart');
    let closeCartBtn = document.getElementById('closeCart');
    let closeCartForm = document.getElementById('closeFormCart');
    


    
    // کد مربوط به سبد خرید
    if (cartIcon) {
        cartIcon.addEventListener('click', function(e) {
            e.preventDefault();
            openCartModal();
        });
    }
    
    function openCartModal() {
        cartModal.classList.remove('hidden')
        cartContent.classList.remove('scale-95', 'opacity-0')
        cartContent.classList.add('scale-100', 'opacity-100')
    }
    
    function closeCart() {
        cartContent.classList.remove('scale-100', 'opacity-100')
        cartContent.classList.add('scale-95', 'opacity-0')
        cartModal.classList.add('hidden')
    }
    
    
    if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart)
    if (closeCartForm) closeCartForm.addEventListener('click', closeCart)
    
    </script>
</body>
</html>