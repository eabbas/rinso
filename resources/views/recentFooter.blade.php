{{-- bottom menu mobile --}}
<style>
    #install-prompt{
        display: none !important;
    }
</style>
<footer class="w-full flex justify-center rounded-t-4xl bg-white fixed bottom-0 left-0 pt-2 pb-2 z-999" style="box-shadow: 0px 0px 10px 1px var(--secondary-text-color);"><!-- lg:w-[calc(100%-265px)] -->
    <div class="w-11/12 flex justify-between items-center">
        <a href="{{{ route('home') }}}" class="w-1/7 flex flex-col items-center gap-2" id="homeIcon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5" fill="none" stroke="@if(Route::is('home')) #fc8e21 @else var(--secondary-text-color) @endif" stroke-width="32" stroke-linecap="round" stroke-linejoin="round">
                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
            </svg>
            <span class="text-xs @if(Route::is('home')) text-[#fc8e21] @else text-(--secondary-text-color) @endif">خانه</span>
        </a>
        <div class="w-1/7 flex flex-col items-center gap-2">
            <svg viewBox="0 0 512 512" class="w-5" fill="#7f7e84">
                <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
            </svg>
            <span class="text-xs text-nowrap text-(--secondary-text-color)">علاقه مندی </span>
        </div>
        <div class="w-1/7 flex flex-col items-center mb-3 cursor-pointer relative" onclick="scanQr('open')">
            <div class=" bg-white flex flex-col gap-2 justify-center items-center rounded-full absolute -bottom-5" id="qrIcon">
                <div class="size-12 bg-[#fc8e21] rounded-full flex items-center justify-center">
                    {{-- <? xml version = "1.0" encoding = "UTF-8" ?> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Layer_1" data-name="Layer 1"
                         viewBox="0 0 24 24">
                        <path fill="white"
                              d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z"/>
                    </svg>

                </div>
                <span class="text-xs text-[#fc8e21]">اسکنر</span>
            </div>
        </div>
        <div class="w-1/7 flex flex-col items-center gap-1 cursor-pointer relative" @if(Route::is('client.menu') && Auth::check() && (isset($orders) && count($orders))) onclick="orders('open')" @endif id="orderLink">
            @if(Route::is('client.menu')) <span class="inline-block size-3 rounded-full bg-(--primary-color) absolute right-1/4 -top-[10%] @if(Auth::check() && (isset($orders) && count($orders))) scale-100 @else scale-0 @endif transition-all duration-300"></span> @endif
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-6.5"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="var(--secondary-text-color)"
                 stroke-width="1.5"
                 stroke-linecap="round"
                 stroke-linejoin="round">

                <path d="M6 2L8 4L10 2L12 4L14 2L16 4L18 2V22L16 20L14 22L12 20L10 22L8 20L6 22V2Z"/>
                <path d="M9 8H15"/>
                <path d="M9 12H15"/>
                <path d="M9 16H13"/>

            </svg>
            <span class="text-xs text-(--secondary-text-color)">سفارشات</span>

        </div>
        <div class="w-1/7 flex flex-col items-center gap-1 cursor-pointer" id="userIcon">
            @if(Auth::check())
                <img src="{{ Auth::user()->main_image ? asset('storage/'.Auth::user()->main_image) : asset('assets/img/user.png') }}"
                     class="size-7 object-cover rounded-full" alt="profile image" onclick="pup_up_profil('open')">
            @else
                <a href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"
                         fill="@if(Route::is('user.profile') || Route::is('dashboard') || Route::is('signup') || Route::is('login') || Route::is('forget_password') || Route::is('set_password')) #fc8e21 @else var(--secondary-text-color) @endif">
                        <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                    </svg>
                </a>
            @endif
            <div>
                <span class="text-xs @if(Route::is('user.profile') || Route::is('dashboard') || Route::is('signup') || Route::is('login') || Route::is('forget_password') || Route::is('set_password')) text-[#fc8e21] @else text-(--secondary-text-color) @endif">پروفایل</span>
            </div>
            {{--                pop_up_profle_start--}}
            @if(Auth::check())
                <div class="relative ">

                        <div class="w-50 bg-white border-black shadow-[15px_0px_30px_#bab2b29e] fixed bottom-25 left-1/30 px-3 flex flex-col gap-2 rounded-lg  overflow-hidden max-h-0 transition-all duration-400  z-10"
                             id="pup_up_profile">
                                <div class="w-8 h-8 bg-[#fc8e21] rounded-full absolute -top-4 -right-3 flex justify-center items-center z-100"
                                     onclick="pup_up_profil('close')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 "
                                         fill="#fff">
                                        <path d="M345 137l17-17L328 86.1l-17 17-119 119L73 103l-17-17L22.1 120l17 17 119 119L39 375l-17 17L56 425.9l17-17 119-119L311 409l17 17L361.9 392l-17-17-119-119L345 137z"/>
                                    </svg>
                                </div>
                            <div class="w-full flex gap-5 justify-start items-center px-4" onclick="account_user()">

                                @if(Auth::user()->name && Auth::user()->family)
                                    <h2 class=" font-bold text-nowrap">{{Auth::user()->name}} {{Auth::user()->family}}</h2>

                                @else
                                    <h2 class=" font-bold">نام من</h2>
                                @endif

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="transition-all duration-400 rotate-180"
                                     id="account_user_sample">
                                    <polyline points="18 15 12 9 6 15"></polyline>
                                </svg>
                            </div>
                            <div class="w-full px-4 flex flex-col gap-2 overflow-y-hidden max-h-0 transition-all duration-400"
                                 id="account_user_items">
                                @foreach(Auth::user()->pages as $page)
                                    <a href="{{ route('pages.single', [$page]) }}"
                                       class="w-full rounded-lg cursor-pointer py-1 hover:bg-[#F9FAFC] flex gap-5 items-center">
                                        <div class="min-w-10 max-w-10 min-h-10 max-h-10">
                                            <img src="{{ $page->logo_path ? asset('storage/'. $page->logo_path) : asset('assets/img/user.png') }}"
                                                 class="size-9 rounded-full" alt="user accont image">
                                        </div>
                                        <span class="text-xs text-[#5b5c75]">{{$page->title}}</span>
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ route('dashboard') }}"
                               class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                    <path d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"></path>
                                </svg>
                                <span class="text-sm text-[#5b5c75]">داشبورد</span>
                            </a>
                            <a href="{{ route('user.profile') }}"
                               class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4">
                                    <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                                </svg>
                                <span class="text-sm text-[#5b5c75]">حساب کاربری</span>
                            </a>
                            <a href="{{ route('user.logout') }}"
                               class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 20 20" id="entypo-log-out" class="w-4" fill="#fc8e21">
                                    <g>
                                        <path d="M19 10l-6-5v3H6v4h7v3l6-5zM3 3h8V1H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H3V3z"></path>
                                    </g>
                                </svg>
                                <span class="text-sm text-[#fc8e21]">خروج</span>
                            </a>

                        </div>
                </div>
            @endif
            {{--                pop_up_profle_end--}}


        </div>
    </div>
</footer>

<div class="fixed bg-black/50 w-full h-full top-0 right-0 flex justify-center items-center invisible opacity-0 transition-all duration-300 z-50"
     id="popupQr">
    <div class="w-9/12 h-1/2 rounded-sm flex justify-center items-center p-5 transition-all duration-300 scale-95 relative">
        <!--loading scan-->
        <div class="absolute w-full h-full bg-white flex flex-row items-center justify-center invisible opacity-0 rounded-md"
             id="loading"></div>
        <!--loading scan  end-->
        <div class="p-3 rounded-full bg-white absolute top-1 right-1 z-50 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick="scanQr('close')" viewBox="0 0 384 512">
                <path fill="red"
                      d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
        </div>
        <div id="reader"></div>
    </div>
</div>
<style>
    #reader {
        width: 100%;
        height: 100%;
    }

    #reader > video {
        width: 100%;
        height: 100%;
    }

    .underLineBorder::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 3px;
        border-radius: 9999px;
        background-color: #eb3254;
    }
</style>

{{--    <div class="lg:hidden w-full fixed bottom-0 bg-white right-0 z-999999">--}}
{{--        <div class="w-full flex flex-row justify-center">--}}
{{--            <ul--}}
{{--                class="w-full mx-auto flex flex-row justify-between items-center bg-white border-t-1 border-gray-300 p-2">--}}
{{--                <li>--}}
{{--                    --}}{{-- category --}}
{{--                    <a href="{{ route('home') }}"--}}
{{--                        class="size-10 flex justify-center items-center rounded-full @if (Route::is('home')) bg-[#eb3254] @endif footerItems relative relative" id="homeIcon">--}}
{{--                        <?xml version="1.0" encoding="UTF-8"?>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                            class="size-5 @if (Route::is('home')) fill-white @endif" id="Layer_1"--}}
{{--                            data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">--}}
{{--                            <path--}}
{{--                                d="M22.849,7.68l-.869-.68h.021V2h-2v3.451L13.849,.637c-1.088-.852-2.609-.852-3.697,0L1.151,7.68c-.731,.572-1.151,1.434-1.151,2.363v13.957H9V15c0-.551,.448-1,1-1h4c.552,0,1,.449,1,1v9h9V10.043c0-.929-.42-1.791-1.151-2.363Zm-.849,14.32h-5v-7c0-1.654-1.346-3-3-3h-4c-1.654,0-3,1.346-3,3v7H2V10.043c0-.31,.14-.597,.384-.788L11.384,2.212c.363-.284,.869-.284,1.232,0l9,7.043c.244,.191,.384,.478,.384,.788v11.957Z" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" id="shopIcon"--}}
{{--                        class="size-10 flex justify-center items-center rounded-full transition cursor-pointer footerItems relative">--}}
{{--                        <?xml version="1.0" encoding="UTF-8"?>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 " id="Outline" viewBox="0 0 24 24"--}}
{{--                            width="512" height="512">--}}
{{--                            <path--}}
{{--                                d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V9A3,3,0,0,0,21,6ZM12,2a4,4,0,0,1,4,4H8A4,4,0,0,1,12,2ZM22,19a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1Z" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li onclick="scanQr('open')">--}}
{{--                    <div class="size-10 flex justify-center items-center rounded-full footerItems relative" id="qrIcon">--}}
{{--                        <?xml version="1.0" encoding="UTF-8"?>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Layer_1" data-name="Layer 1"--}}
{{--                            viewBox="0 0 24 24">--}}
{{--                            <path--}}
{{--                                d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z" />--}}
{{--                        </svg>--}}

{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    --}}{{-- ecommerce --}}
{{--                    <a href="#" id="cartIcon" class="size-10 flex justify-center items-center rounded-full footerItems relative">--}}
{{--                        <?xml version="1.0" encoding="UTF-8"?>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline" viewBox="0 0 24 24"--}}
{{--                            width="512" height="512">--}}
{{--                            <path--}}
{{--                                d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z" />--}}
{{--                            <circle cx="7" cy="22" r="2" />--}}
{{--                            <circle cx="17" cy="22" r="2" />--}}
{{--                        </svg>--}}

{{--                    </a>--}}
{{--                    --}}{{-- ecommerce end --}}
{{--                </li>--}}
{{--               --}}
{{--                 @if (!Auth::check())--}}
{{--                <li class="relative">--}}
{{--                    <div--}}
{{--                        class="size-10 flex justify-center items-center rounded-full @if (Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password') || Route::is('user.profile')) bg-[#eb3254] @endif footerItems relative" id="userIcon">--}}
{{--                        <a href="{{ route('login') }}">--}}
{{--                        <?xml version="1.0" encoding="UTF-8"?>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 @if (Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password')) fill-white @else fill-black @endif" id="Outline"--}}
{{--                            viewBox="0 0 24 24" width="512" height="512">--}}
{{--                            <path--}}
{{--                                d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />--}}
{{--                            <path--}}
{{--                                d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />--}}
{{--                        </svg>--}}
{{--                        </a>--}}
{{--                        --}}
{{--                       --}}
{{--                    </div>--}}
{{--                    pup_up_user_profile_start--}}
{{--                   --}}

{{--                </li>--}}
{{--                 @else--}}
{{--                  <li class="relative">--}}
{{--                    <div--}}
{{--                        class="size-10 flex justify-center items-center rounded-full @if (Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password') || Route::is('user.profile')) bg-[#eb3254] @endif footerItems relative" id="userIcon" >--}}
{{--                            <img src="{{ Auth::user()->main_image ? asset('storage/'.Auth::user()->main_image) : asset('assets/img/user.png') }}" class="size-9 rounded-full" alt="profile image" onclick="pup_up_profil('open')">--}}
{{--                             <div class="w-50 bg-white border-black shadow-[15px_0px_30px_#bab2b29e] fixed bottom-15 left-1/30 px-3 flex flex-col gap-2 rounded-lg max-h-0 overflow-hidden transition-all duration-400 invisible opacity-0 z-999999999" id="pup_up_profile">--}}
{{--                                <div class="w-full flex gap-5 justify-start items-center px-4" onclick="account_user()">--}}
{{--                                    <div class="w-8 h-8 bg-[#eb3153] rounded-full absolute -top-4 -right-3 flex justify-center items-center" onclick="pup_up_profil('close')">--}}
{{--                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 "  fill="#fff"><path d="M345 137l17-17L328 86.1l-17 17-119 119L73 103l-17-17L22.1 120l17 17 119 119L39 375l-17 17L56 425.9l17-17 119-119L311 409l17 17L361.9 392l-17-17-119-119L345 137z"/></svg>--}}
{{--                                    </div>--}}
{{--                                    @if(Auth::check())--}}
{{--                                    @if(Auth::user()->name && Auth::user()->family)--}}
{{--                                    <h2 class=" font-bold text-nowrap">{{Auth::user()->name}} {{Auth::user()->family}}</h2>--}}
{{--                                    @else--}}
{{--                                     <h2 class=" font-bold">نام من</h2>--}}
{{--                                    @endif--}}
{{--                                    @endif--}}
{{--                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-all duration-400 rotate-180"  id="account_user_sample"><polyline points="18 15 12 9 6 15"></polyline></svg>--}}
{{--                                </div>--}}
{{--                                 <div class="w-full px-4 flex flex-col gap-2 overflow-y-hidden max-h-0 transition-all duration-400" id="account_user_items">--}}
{{--                                    @foreach(Auth::user()->pages as $page)--}}
{{--                                    <a href="{{ route('pages.single', [$page]) }}" class="w-full rounded-lg cursor-pointer py-1 hover:bg-[#F9FAFC] flex gap-5 items-center">--}}
{{--                                        <div class="min-w-10 max-w-10 min-h-10 max-h-10">--}}
{{--                                            <img src="{{ $page->logo_path ? asset('storage/'. $page->logo_path) : asset('assets/img/user.png') }}" class="size-9 rounded-full" alt="user accont image">--}}
{{--                                        </div>--}}
{{--                                        <span class="text-xs text-[#5b5c75]">{{$page->title}}</span>--}}
{{--                                    </a>--}}
{{--                                    @endforeach--}}
{{--                                     <!--<a href="" class="block w-full rounded-lg cursor-pointer py-1 hover:bg-[#F9FAFC] flex gap-5 items-center">-->--}}
{{--                                     <!--    <img src="{{ Auth::user()->main_image ? asset('storage/'.Auth::user()->main_image) : asset('assets/img/user.png') }}" class="size-9 rounded-full" alt="user accont image">-->--}}
{{--                                     <!--    <span class="text-sm text-[#5b5c75]">محمد</span>-->--}}
{{--                                     <!--</a>-->--}}
{{--                                 </div>--}}
{{--                                <a href="{{ route('dashboard') }}" class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">--}}
{{--                                        <path d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <span class="text-sm text-[#5b5c75]">داشبورد</span>--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('user.profile') }}" class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>--}}
{{--                                    <span class="text-sm text-[#5b5c75]">حساب کاربری</span>--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('user.logout') }}" class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="entypo-log-out" class="w-4" fill="#eb3153"><g><path d="M19 10l-6-5v3H6v4h7v3l6-5zM3 3h8V1H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H3V3z"></path></g></svg>--}}
{{--                                    <span class="text-sm text-[#eb3153]">خروج</span>--}}
{{--                                </a>--}}

{{--                    </div>--}}
{{--                            </div>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                <div class="w-full h-[100vh] fixed top-0 left-0 transition-all duration-400 invisible opacity-0" id="close_pup_up_profile_all_viwe" onclick="pup_up_profil('close')"></div>--}}
                    <script>
                        let pup_up_profile= document.getElementById('pup_up_profile')
                        // let close_pup_up_profile_all_viwe=document.getElementById('close_pup_up_profile_all_viwe')
                        function pup_up_profil(viwe){
                            if(viwe =='open'){
                                pup_up_profile.classList.toggle('max-h-0')
                                // pup_up_profile.classList.toggle('h-50')
                                pup_up_profile.classList.toggle('overflow-hidden')
                                // pup_up_profile.classList.toggle('invisible')
                                // pup_up_profile.classList.toggle('opacity-0')
                                pup_up_profile.classList.toggle('py-4')
                                // close_pup_up_profile_all_viwe.classList.remove('invisible')
                                // close_pup_up_profile_all_viwe.classList.remove('opacity-0')
                            }
                            if(viwe =='close'){

                                pup_up_profile.classList.add('max-h-0')
                                pup_up_profile.classList.add('overflow-hidden')
                                // pup_up_profile.classList.add('invisible')
                                // pup_up_profile.classList.add('opacity-0')
                                pup_up_profile.classList.remove('py-4')
                                // close_pup_up_profile_all_viwe.classList.add('invisible')
                                // close_pup_up_profile_all_viwe.classList.add('opacity-0')
                            }
                        }
                        //users
                        let account_user_items= document.getElementById('account_user_items')
                        let account_user_sample= document.getElementById('account_user_sample')
                        function account_user(){
                            account_user_items.classList.toggle('max-h-0')
                            account_user_items.classList.toggle('py-1')
                            account_user_sample.classList.toggle('rotate-180')
                        }
                        //users

                    </script>
{{--                --}}{{--                      pup_up_user_profile_end--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if (Auth::check())--}}
{{--        <div class="w-full h-[calc(100vh-300px)] fixed z-40 right-0 border-t-1 border-x-1 border-gray-300 transition-all duration-200 -bottom-full bg-white rounded-t-xl"--}}
{{--            id="popupUser">--}}
{{--            <div class="w-full relative">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3 size-3 cursor-pointer"--}}
{{--                    onclick="openUserOptions('close')" viewBox="0 0 448 512">--}}
{{--                    <path--}}
{{--                        d="M41 39C31.6 29.7 16.4 29.7 7 39S-2.3 63.6 7 73l183 183L7 439c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l183-183L407 473c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-183-183L441 73c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-183 183L41 39z" />--}}
{{--                </svg>--}}
{{--                <h3 class="text-center py-4 font-bold bg-gray-200 rounded-t-[11px] border-b border-gray-300">--}}
{{--                    {{ Auth::user()->name }} {{ Auth::user()->family }}</h3>--}}
{{--                <ul class="flex flex-col px-3">--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('user.profile') }}"--}}
{{--                            class="block py-3 border-b border-gray-300 text-sm font-bold">پروفایل من</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('user.edit', [Auth::user()]) }}"--}}
{{--                            class="block py-3 border-b border-gray-300 text-sm font-bold">--}}
{{--                            ویرایش پروفایل--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('aboutUs.clientList') }}"--}}
{{--                            class="block py-3 border-b border-gray-300 text-sm font-bold">درباره فامنو</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('contactUs.create') }}" class="block py-3 text-sm font-bold">ارتباط با--}}
{{--                            ما</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('user.logout') }}"--}}
{{--                            class="block py-3  text-sm font-bold bg-[#eb3254]/30 text-center text-red-500 rounded-sm">خروج--}}
{{--                            از حساب کاربری</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{-- bottom menu mobile end --}}
{{-- <footer class="hidden lg:block lg:w-full mx-auto">
    <div class="w-full bg-gray-600 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
        <span class="text-white">آکادمی فائوس</span>
        <a href="tel:+989147794595" class="text-gray-100">09147794595</a>
    </div>
</footer> --}}


<script>
    let qrIcon = document.getElementById('qrIcon')
    let homeIcon = document.getElementById('homeIcon')
    let userIcon = document.getElementById('userIcon')
    let loading = document.getElementById('loading')
    let popupQr = document.getElementById('popupQr')

    function scanQr(state) {
        const html5QrCode = new Html5Qrcode("reader")

        if (state == 'open') {
            qrIcon.children[0].classList.remove('fill-black')
            qrIcon.children[0].classList.add('fill-white')
            qrIcon.classList.add('bg-[#eb3254]')
            popupQr.classList.remove('invisible')
            popupQr.classList.remove('opacity-0')
            popupQr.children[0].classList.remove('scale-95')
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                html5QrCode.stop()
                loading.classList.remove('invisible')
                loading.classList.remove('opacity-0')
                loading.innerHTML = `
                    <div class="loading-wave">
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                    </div>
                    `
                window.location.assign(decodedText)
                // window.location.assign("https://" + decodedText)
            }
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            };
            console.log(html5QrCode)
            console.log(html5QrCode.elementId)
            html5QrCode.start({
                facingMode: "environment"
            }, config, qrCodeSuccessCallback)
        }
        if (state == 'close') {
            popupQr.classList.add('invisible')
            popupQr.classList.add('opacity-0')
            popupQr.children[0].classList.add('scale-95')
            html5QrCode.stop()
        }

    }



</script>
<script src="{{ asset('assets/js/home.js') }}"></script>
{{-- @if(Route::is('client.menu'))
    @include('newMenuJs')
@endif --}}
{{--    <script src="{{ asset('assets/js/userPanel.js') }}"></script>--}}
@RegisterServiceWorkerScript
</body>

</html>
