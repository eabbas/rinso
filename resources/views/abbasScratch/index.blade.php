<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/robot.css') }}">
    <title>robot</title>
</head>
<body class="bg-white">

<header class="bg-[#f5f6fa]">
    <section class="w-full flex justify-center">
        <div class="w-11/12 bg-[#fff] rounded-2xl fixed top-3 px-5 py-3 flex items-center z-2">
            <img src="{{ asset('assets/img/camping.png') }}" alt="logo" class="w-[128px] flex justify-start">
            <div class="w-full flex gap-3 justify-end">
                <button class="w-10 h-10 bg-[#6ca874] flex justify-center items-center rounded-lg" onclick="search_box('open')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#fff" class="w-5 "><path d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z "/></svg>
                </button>

                <button class="w-10 h-10 bg-[#6ca874] flex justify-center items-center rounded-lg"  onclick="shopping_bag('open')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.232 10.5257C19.6468 7.40452 19.3542 5.84393 18.2433 4.92196C17.1324 4 15.5446 4 12.369 4H11.6479C8.47228 4 6.8845 4 5.7736 4.92196C4.66271 5.84393 4.37009 7.40452 3.78487 10.5257C2.96195 14.9146 2.55049 17.1091 3.75011 18.5545C4.94973 20 7.18244 20 11.6478 20H12.369C16.8344 20 19.0672 20 20.2668 18.5545C20.9628 17.7159 21.1165 16.6252 20.9621 15" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </button>
                <button style="direction: ltr;" class="w-10 h-10 flex flex-col gap-2 p-2 rounded-lg" onclick="hamberger_menu('open')">
                    <span class="w-4 h-[2px] bg-[#ffa600]"></span>
                    <span class="w-6 h-[3px] bg-[#ffa600]"></span>
                    <span class="w-3 h-[2px] bg-[#ffa600]"></span>
                </button>
            </div>
        </div>
    </section>

    <section class="w-full flex justify-center">
        <div class="w-11/12 flex flex flex-col mt-35 items-center gap-10">
            <h2 class="text-2xl font-bold">سفرت رو بچین<span class="text-[#6ca874]"> وسایلش </span>با ما!</h2>
            <div class="p-2 bg-[#081036] flex gap-2 animashente transition-all duration-600 rounded-lg">
                <span class="text-[#fff] text-sm">مشاهده محصولات</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-5"><path d="M18.2 273l-17-17 17-17L171.8 85.4l17-17 33.9 33.9-17 17L93.1 232 424 232l24 0 0 48-24 0L93.1 280 205.8 392.6l17 17-33.9 33.9-17-17L18.2 273z"/></svg>
            </div>
            <img src="{{ asset('assets/img/camp-1-1-1-1024x529.png') }}" alt="">
        </div>
    </section>



    <!-- addtion -->
    <section class="w-full">
        <!-- search -->
        <div class="w-full h-[100vh] absolute bg-[#fff] top-0 left-0 p-3 flex flex-col gap-5 invisible opacity-0 transition-all duration-300 z-3" id="search_box">
            <div class="w-full flex justify-between items-center">
                <h2> جستجو در سایت </h2>
                <div onclick="search_box('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7"><path d="M205.3 64c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H205.3zM528 128V384c0 8.8-7.2 16-16 16H205.3c-4.2 0-8.3-1.7-11.3-4.7L54.6 256 193.9 116.7c3-3 7.1-4.7 11.3-4.7H512c8.8 0 16 7.2 16 16zm-95 47c-9.4-9.4-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9z"/></svg>
                </div>
            </div>
            <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
            <div>
                <form action="" class="w-full h-10 border-1 border-[#ededed] flex justify-between px-2 items-center">
                    <input type="text" class="outline-none text-sm" placeholder="امروز دنبال چی میگردی؟">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 "><path d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z "/></svg>
                    </button>
                </form>
            </div>
            <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
            <div class="flex flex-col gap-5">
                <h3>کلمات کلیدی پیشنهادی</h3>
                <div class="flex gap-2 flex-wrap">
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                    <a href="" class="p-2 text-sm text-[#707070] rounded-xl border-1 border-[#dfe2e6] shadow-xs shadow-[#dfe2e6] cursor-pointer ">کفش</a>
                </div>
            </div>
        </div>
        <!-- search -->
        <!-- shoping bac -->
        <div class="w-full h-[100vh] z-3 absolute bg-[#fff] top-0 left-0 p-5 flex flex-col gap-5 invisible opacity-0 transition-all duration-300" id="shopping_bag">
            <div class="flex justify-between items-center">
                <img src="{{asset('assets/img/camping.png')}}" alt="logo" class="size-15">
                <button class="cursor-pointer" onclick="shopping_bag('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M205.3 64c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H205.3zM528 128V384c0 8.8-7.2 16-16 16H205.3c-4.2 0-8.3-1.7-11.3-4.7L54.6 256 193.9 116.7c3-3 7.1-4.7 11.3-4.7H512c8.8 0 16 7.2 16 16zm-95 47c-9.4-9.4-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9z"/></svg>
                </button>
            </div>
            <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
            <div>
                <span>سبد خرید شما خالی است</span>
            </div>
        </div>
        <!-- shoping bac -->
        <!-- hamberger_menu -->
        <div class="w-full h-[100vh] z-3 fixed top-0 flex flex-col gap-5 rounded-2xl invisible opacity-0 transition-all duration-600 shadow-xl" id="hambarger_meno" >
            <div class="absolute w-full bg-black/50 h-[100vh] z-0 transition-all duration-600" onclick="hamberger_menu('close')" ></div>
            <div class="w-9/12 h-[90vh] bg-[#fff] absolute top-3 right-full z-1 rounded-2xl flex flex-col transition-all duration-600" id="hambarger_meno_open">
                <div class="w-full px-3 py-2 rounded-t-2xl hambarger_meno_fist_element flex items-center justify-between">
                    <img src="{{asset('assets/img/camping.png')}}" alt="logo" class="size-12">
                    <a href="" class="w-8 h-8 bg-[#6ca874] rounded-lg flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-4"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    </a>
                </div>
                <div class="flex flex-col gap-3 text-sm p-5">
                    <div class="flex items-center justify-between">
                        <span>دسته‌بندی محصولات</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2"><path d="M47 239c-9.4 9.4-9.4 24.6 0 33.9L207 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L97.9 256 241 113c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L47 239z"/></svg>
                    </div>
                    <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
                    <a href="">
                        <span>صفحه اصلی</span>
                    </a>
                    <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
                    <div class="flex items-center justify-between">
                        <span>فروشگاه</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2"><path d="M47 239c-9.4 9.4-9.4 24.6 0 33.9L207 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L97.9 256 241 113c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L47 239z"/></svg>
                    </div>
                    <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
                    <a href="">
                        <span>تماس با ما</span>
                    </a>
                    <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
                    <a href="">
                        <span>وبلاگ</span>
                    </a>
                    <span class="w-full h-[1px] bg-[#dfe2e6]"></span>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-2">
                            <span class="px-2 text-[10px] rounded-lg text-[#6ca874] border-1 border-[#6ca874]">جیاور</span>
                            <span>سایر المان ها</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2"><path d="M47 239c-9.4 9.4-9.4 24.6 0 33.9L207 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L97.9 256 241 113c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L47 239z"/></svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- hamberger_menu -->
    </section>
    <!-- addtion -->
</header>
<main>
    <section class="w-full pb-5 bg-[#6ca874] flex flex-col gap-5">
        <div class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-2" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#f5f6fa">
                <path class="elementor-shape-fill" d="M1000,4.3V0H0v4.3C0.9,23.1,126.7,99.2,500,100S1000,22.7,1000,4.3z"></path>
            </svg>
            <div class="w-full flex justify-center relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="231" height="50" viewBox="0 0 231 75" class="relative -top-0.5">
                    <path  clip-rule="evenodd" d="M0 0C31.5006 0.949537 50.52 17.872 56.1955 26.4544L55.986 25.8011L82.4924 58.631C99.3032 79.4521 131.038 79.4521 147.849 58.6309L174.356 25.8011L174.146 26.4544C179.822 17.872 198.844 0.949537 230.349 0H0Z" fill="#f5f6fa">
                    </path>
                </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-1/2 translate-x-1/2 top-2 size-8" viewBox="0 0 448 512" fill="#6ca874"><path d="M235.3 267.3L224 278.6l-11.3-11.3-160-160L41.4 96 64 73.4 75.3 84.7 224 233.4 372.7 84.7 384 73.4 406.6 96l-11.3 11.3-160 160zm0 192L224 470.6l-11.3-11.3-160-160L41.4 288 64 265.4l11.3 11.3L224 425.4 372.7 276.7 384 265.4 406.6 288l-11.3 11.3-160 160z"/></svg>
            </div>
        </div>
        <div class="mx-auto">
            <h2 class="text-2xl font-bold "><span class="text-[#fff]">دسته‌بندی </span>محصولات</h2>
        </div>
        <div class="max-w-full overflow-auto flex items-center gap-5 py-4 px-4">
            <div class="min-w-1/3 flex flex-col gap-3 items-center">
                <img src="{{asset('assets/img/1628406133012-600x600-1.jpg')}}" alt="" class="rounded-xl object-cover shadow-sm shadow-[#a5a7af]">
                <span class="text-sm font-bold">میز و صندلی</span>
            </div>
            <div class="min-w-1/3 flex flex-col gap-3 items-center">
                <img src="{{asset('assets/img/1628406133012-600x600-1.jpg')}}" alt="" class="rounded-xl object-cover shadow-sm shadow-[#a5a7af]">
                <span class="text-sm font-bold">میز و صندلی</span>
            </div>
            <div class="min-w-1/3 flex flex-col gap-3 items-center">
                <img src="{{asset('assets/img/1628406133012-600x600-1.jpg')}}" alt="" class="rounded-xl object-cover shadow-sm shadow-[#a5a7af]">
                <span class="text-sm font-bold">میز و صندلی</span>
            </div>
            <div class="min-w-1/3 flex flex-col gap-3 items-center">
                <img src="{{asset('assets/img/1628406133012-600x600-1.jpg')}}" alt="" class="rounded-xl object-cover shadow-sm shadow-[#a5a7af]">
                <span class="text-sm font-bold">میز و صندلی</span>
            </div>

        </div>
    </section>
    <section class="w-full bg-[#fff] flex justify-center pt-15 pb-25 px-5">
        <p class=" flex text-center">تجهیزات حرفه‌ای، ماجراجویی‌های فراموش‌نشدنی! باور داریم که هر سفر به طبیعت می‌تونه به تجربه منحصر‌ به‌فرد و خاطره‌انگیز تبدیل شه. به همین دلیل بهترین و باکیفیت‌ترین لوازم کمپینگ و سفر رو برای شما فراهم کردیم. از چادرهای سبک و کم‌حجم تا وسایل آشپزی و روشنایی،همه‌چیز آماده‌ست تا شما بدون نگرانی به دل طبیعت بزنید.</p>
    </section>
    <section class="w-full pb-5 bg-[#e4f5e7] flex flex-col items-center gap-10">
        <div class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-3" viewBox="0 0 1000 100" preserveAspectRatio="none" fill="#fff">
                <path class="elementor-shape-fill" d="M1000,4.3V0H0v4.3C0.9,23.1,126.7,99.2,500,100S1000,22.7,1000,4.3z"></path>
            </svg>
        </div>
        <div>
            <h2 class="text-[27px] font-bold">پیشنهاد های شـگفت انـــگیز</h2>
        </div>
        <div class="w-8/12 gap-4 pt-5 bg-[#d3ebd7] rounded-2xl flex flex-col justify-between items-center ">
            <div class="flex gap-1">
                <div class="py-1 px-2 bg-[#fff6e3] rounded-xl border-1 border-[#ffe0a6] flex flex-col justify-center items-center">
                    <span class="text-[#ffad08] text-xs">28</span>
                    <span class="text-xs">روز ها</span>
                </div>
                <div class="py-1 px-2 bg-[#fff6e3] rounded-xl border-1 border-[#ffe0a6] flex flex-col justify-center items-center">
                    <span class="text-[#ffad08] text-xs">28</span>
                    <span class="text-xs">روز ها</span>
                </div>
                <div class="py-1 px-2 bg-[#fff6e3] rounded-xl border-1 border-[#ffe0a6] flex flex-col justify-center items-center">
                    <span class="text-[#ffad08] text-xs">28</span>
                    <span class="text-xs">روز ها</span>
                </div>
                <div class="py-1 px-2 bg-[#fff6e3] rounded-xl border-1 border-[#ffe0a6] flex flex-col justify-center items-center">
                    <span class="text-[#ffad08] text-xs">28</span>
                    <span class="text-xs">روز ها</span>
                </div>
            </div>
            <div class="w-6/12 h-3 rounded-t-lg bg-[#ffa600]"></div>
        </div>
        <div class="w-full overflow-auto flex items-center gap-5">
            <div class="min-w-8/12 bg-[#fff] rounded-2xl p-5 flex flex-col gap-5">
                <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-t-2xl object-cover">
                <p class="text-sm font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                <div class="flex items-center gap-3">

                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-[#6ca874]">180,000</span>
                        <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                    </div>
                </div>
                <div class="w-full flex justify-between">
                    <div class="w-10 h-10 bg-[#6ca874] rounded-2xl flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"/></svg>
                    </div>
                    <div class="w-8/12 h-10 bg-[#f0f5f1] rounded-2xl flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4" fill="#6ca874"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                        <span class="text-[9px]">مشاهده سریع</span>
                    </div>
                </div>
            </div>
            <div class="min-w-8/12 bg-[#fff] rounded-2xl p-5 flex flex-col gap-5">
                <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-t-2xl object-cover">
                <p class="text-sm font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#c7902a] flex justify-center items-center rounded-full">
                        <span class="text-lg text-[#fff]">10%</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-[#6ca874]">180,000</span>
                        <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                    </div>
                </div>
                <div class="w-full flex justify-between">
                    <div class="w-10 h-10 bg-[#6ca874] rounded-2xl flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"/></svg>
                    </div>
                    <div class="w-8/12 h-10 bg-[#f0f5f1] rounded-2xl flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4" fill="#6ca874"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                        <span class="text-[9px]">مشاهده سریع</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="w-full bg-white py-10 flex flex-col gap-5">
        <div class="flex flex-col">
            <div>
                <div class="flex gap-4">
                    <span class="text-[#dfe1ed]">+</span>
                    <span class="text-[#ffb62e]">+</span>
                </div>
                <div class="flex gap-4">
                    <span class="text-[#dfe1ed]">+</span>
                    <span class="text-[#dfe1ed]">+</span>
                </div>
            </div>
            <div class="w-full flex justify-between items-center pl-2">
                <div class="flex flex-col gap-4">
                    <div class="flex gap-1 items-center">
                        <span class="text-[#dfe1ed]">+</span>
                        <h2 class="text-2xl font-bold">پر بازدید ترین محصولات جیاواز</h2>
                    </div>
                    <div class="flex gap-1 items-center">
                        <span class="text-[#dfe1ed]">+</span>
                        <p class="text-[#6ca874] text-xl font-bold">The most visited products</p>
                    </div>
                </div>
                <div>
                    <img src="{{asset('assets/img/XMLID_17_.svg')}}" alt="" class="size-7">
                </div>
            </div>
            <div class="pl-2 pr-4 py-4">
                <p class="text-sm">تجهیزات حرفه‌ای، ماجراجویی‌های فراموش‌نشدنی! باور داریم که هر سفر به طبیعت می‌تونه به تجربه منحصر‌ به‌فرد و خاطره‌انگیز تبدیل شه. به همین دلیل بهترین و باکیفیت‌ترین لوازم کمپینگ و سفر رو برای شما فراهم کردیم.</p>
            </div>
        </div>
        <div class="flex max-w-full p-2 overflow-auto gap-3 bg-[#f2f2f2]">
            <div class="min-w-11/12 flex flex-col gap-4">
                <button class="w-full max-h-7/12 flex bg-[#fff] rounded-3xl shadow-md shadow-[#f2f2f2] pl-3 relative overflow-hidden course_meetingse ">
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-b-xl absolute bottom-full z-1 right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"></path></svg>
                    </div>
                    <div class="h-full flex flex-col items-center justify-between overflow-hidden relative">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-b-xl"></span>
                        <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-2xl w-43">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-t-xl"></span>
                    </div>
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-t-xl absolute top-full right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"></path></svg>
                    </div>
                    <div class="flex flex-col gap-2 py-3">
                        <p class="text-xs font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                        <div class="flex flex-col">
                            <span class="font-bold text-[#6ca874]">180,000</span>
                            <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7 invisible opacity-0 transition-all duration-400"><path d="M205.3 64c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H205.3zM528 128V384c0 8.8-7.2 16-16 16H205.3c-4.2 0-8.3-1.7-11.3-4.7L54.6 256 193.9 116.7c3-3 7.1-4.7 11.3-4.7H512c8.8 0 16 7.2 16 16zm-95 47c-9.4-9.4-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9z"></path></svg>

                </button>
                <!-- <div class="w-full h-1/2 flex bg-[#fff] rounded-3xl"shadow-md shadow-[#f2f2f2]></div> -->
                <button class="w-full max-h-10/12 flex bg-[#fff] rounded-3xl shadow-md shadow-[#f2f2f2] pl-3 relative overflow-hidden course_meetingse ">
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-b-xl absolute bottom-full z-1 right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"></path></svg>
                    </div>
                    <div class="h-full flex flex-col items-center justify-between overflow-hidden relative">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-b-xl"></span>
                        <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-2xl w-43">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-t-xl"></span>
                    </div>
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-t-xl absolute top-full right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"></path></svg>
                    </div>
                    <div class="flex flex-col gap-2 py-3">
                        <p class="text-xs font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                        <div class="flex gap-2 items-center">
                            <div class="w-10 h-10 bg-[#c7902a] flex justify-center items-center rounded-full">
                                <span class="text-md text-[#fff]">10%</span>
                            </div>
                            <div class="flex flex-col gap-1 ">
                                <span class="font-bold text-[#6ca874]">180,000</span>
                                <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                            </div>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7 invisible opacity-0 transition-all duration-400"><path d="M205.3 64c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H205.3zM528 128V384c0 8.8-7.2 16-16 16H205.3c-4.2 0-8.3-1.7-11.3-4.7L54.6 256 193.9 116.7c3-3 7.1-4.7 11.3-4.7H512c8.8 0 16 7.2 16 16zm-95 47c-9.4-9.4-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9z"></path></svg>

                </button>
            </div>
            <div class="min-w-11/12 flex flex-col gap-4">
                <button class="w-full max-h-7/12 flex bg-[#fff] rounded-3xl shadow-md shadow-[#f2f2f2] pl-3 relative overflow-hidden course_meetingse ">
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-b-xl absolute bottom-full z-1 right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"></path></svg>
                    </div>
                    <div class="h-full flex flex-col items-center justify-between overflow-hidden relative">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-b-xl"></span>
                        <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-2xl w-43">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-t-xl"></span>
                    </div>
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-t-xl absolute top-full right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"></path></svg>
                    </div>
                    <div class="flex flex-col gap-2 py-3">
                        <p class="text-xs font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                        <span class="font-bold text-[#6ca874]">180,000</span>
                        <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7 invisible opacity-0 transition-all duration-400"><path d="M205.3 64c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H205.3zM528 128V384c0 8.8-7.2 16-16 16H205.3c-4.2 0-8.3-1.7-11.3-4.7L54.6 256 193.9 116.7c3-3 7.1-4.7 11.3-4.7H512c8.8 0 16 7.2 16 16zm-95 47c-9.4-9.4-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9z"></path></svg>

                </button>
                <button class="w-full max-h-7/12 flex bg-[#fff] rounded-3xl shadow-md shadow-[#f2f2f2] pl-3 relative overflow-hidden course_meetingse ">
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-b-xl absolute bottom-full z-1 right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"></path></svg>
                    </div>
                    <div class="h-full flex flex-col items-center justify-between overflow-hidden relative">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-b-xl"></span>
                        <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-2xl w-43">
                        <span class="min-w-15 max-w-15 min-h-2 bg-[#6ca874] rounded-t-xl"></span>
                    </div>
                    <div class="min-w-15 max-w-15 min-h-10 bg-[#6ca874] rounded-t-xl absolute top-full right-3/24 flex justify-center items-center invisible opacity-0 transition-all duration-400 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#fff"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"></path></svg>
                    </div>
                    <div class="flex flex-col gap-2 py-3">
                        <p class="text-xs font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                        <span class="font-bold text-[#6ca874]">180,000</span>
                        <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7 invisible opacity-0 transition-all duration-400"><path d="M205.3 64c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H205.3zM528 128V384c0 8.8-7.2 16-16 16H205.3c-4.2 0-8.3-1.7-11.3-4.7L54.6 256 193.9 116.7c3-3 7.1-4.7 11.3-4.7H512c8.8 0 16 7.2 16 16zm-95 47c-9.4-9.4-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9z"></path></svg>

                </button>
                <!-- <div class="w-full h-1/2 flex bg-[#fff] rounded-3xl"shadow-md shadow-[#f2f2f2]></div> -->
            </div>
        </div>
        <div class="min-w-10/12 mx-auto max-w-5/12 p-2 bg-[#081036] flex gap-2 justify-center items-center transition-all duration-600 rounded-xl">
            <span class="text-[#fff] text-sm">مشاهده محصولات</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-5"><path d="M18.2 273l-17-17 17-17L171.8 85.4l17-17 33.9 33.9-17 17L93.1 232 424 232l24 0 0 48-24 0L93.1 280 205.8 392.6l17 17-33.9 33.9-17-17L18.2 273z"/></svg>
        </div>
    </section>
    <section class="w-full flex justify-center items-center flex-col gap-5 py-10">
        <a href="" class=" w-11/12 inline-block overflow-hidden">
            <img src="{{asset('assets/img/8e92eb6b61e8c614625b3fd5b58b16e7b2c1fa6b_1745744533-600x240.webp')}}" alt="" class="object-cover rounded-xl">
        </a>
        <a href="" class=" w-11/12 inline-block overflow-hidden">
            <img src="{{asset('assets/img/8e92eb6b61e8c614625b3fd5b58b16e7b2c1fa6b_1745744533-600x240.webp')}}" alt="" class="object-cover rounded-xl">
        </a>
    </section>
    <section class="w-full bg-white flex py-10 flex-col gap-10">
        <h2 class="w-full text-2xl font-bold flex justify-center  mx-auto">محصولات پر فروش</h2>
        <div class="w-full overflow-auto flex items-center gap-5 pb-10">
            <div class="min-w-8/12 bg-[#fff] rounded-3xl p-5 flex flex-col gap-5 relative">
                <div class="p-3 bg-white absolute top-1/12 left-7/12 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6" fill="#6ca874"><path d="M256 118.6l-11.3-11.3L220.5 83.1C198 60.6 167.5 48 135.8 48C69.6 48 16 101.6 16 167.8c0 31.8 12.6 62.2 35.1 84.7l24.2 24.2L256 457.4 436.7 276.7l24.2-24.2C483.4 230 496 199.5 496 167.8C496 101.6 442.4 48 376.2 48c-31.8 0-62.2 12.6-84.7 35.1l-24.2 24.2L256 118.6zm11.3 350.1L256 480l-11.3-11.3L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8l12.9 12.9L256 96l11.3-11.3 12.9-12.9c25.5-25.5 60-39.8 96-39.8C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 267.3 468.7z"/></svg>
                </div>
                <div class="p-3 bg-white absolute top-1/12 left-4/12 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#6ca874"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                </div>
                <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-t-2xl object-cover">
                <p class="text-sm font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                <div class="flex items-center gap-3">

                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-[#6ca874]">180,000</span>
                        <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                    </div>
                </div>
                <a href="" class="px-3 py-1 bg-[#6ca874] rounded-full flex justify-center items-center absolute -bottom-4 left-1/12">
                    <span class="text-3xl text-[#fff] font-bold">+</span>
                </a>
            </div>
            <div class="min-w-8/12 bg-[#fff] rounded-3xl p-5 flex flex-col gap-5 relative">
                <div class="p-3 bg-white absolute top-1/12 left-7/12 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6" fill="#6ca874"><path d="M256 118.6l-11.3-11.3L220.5 83.1C198 60.6 167.5 48 135.8 48C69.6 48 16 101.6 16 167.8c0 31.8 12.6 62.2 35.1 84.7l24.2 24.2L256 457.4 436.7 276.7l24.2-24.2C483.4 230 496 199.5 496 167.8C496 101.6 442.4 48 376.2 48c-31.8 0-62.2 12.6-84.7 35.1l-24.2 24.2L256 118.6zm11.3 350.1L256 480l-11.3-11.3L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8l12.9 12.9L256 96l11.3-11.3 12.9-12.9c25.5-25.5 60-39.8 96-39.8C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 267.3 468.7z"/></svg>
                </div>
                <div class="p-3 bg-white absolute top-1/12 left-4/12 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#6ca874"><path d="M118 373c-39.8-38.3-67.9-83.7-83.2-117c15.3-33.3 43.4-78.6 83.2-117c44.6-42.9 101.5-75 170-75s125.4 32.1 170 75c39.8 38.3 67.9 83.7 83.2 117c-15.3 33.3-43.4 78.6-83.2 117c-44.6 42.9-101.5 75-170 75s-125.4-32.1-170-75zM288 480c158.4 0 258-149.3 288-224C546 181.3 446.4 32 288 32S30 181.3 0 256c30 74.7 129.6 224 288 224zM192 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                </div>
                <img src="{{asset('assets/img/179ba683711d890dfcd45ad434df5a0553d89e86_1655704585-600x600.webp')}}" alt="" class="rounded-t-2xl object-cover">
                <p class="text-sm font-bold">نگهدارنده آب 18 لیتری کیش ترموس کد 047</p>
                <div class="flex items-center gap-3">

                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-[#6ca874]">180,000</span>
                        <span><del class="text-[#ffa600]">200,000 </del>تومان</span>
                    </div>
                </div>
                <a href="" class="px-3 py-1 bg-[#6ca874] rounded-full flex justify-center items-center absolute -bottom-4 left-1/12">
                    <span class="text-3xl text-[#fff] font-bold">+</span>
                </a>
            </div>
        </div>
        <div class="w-11/12 mx-auto p-2 bg-[#6ca874] flex gap-2 transition-all duration-600 rounded-lg flex justify-center">
            <span class="text-[#fff] text-sm">مشاهده همه</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-5"><path d="M18.2 273l-17-17 17-17L171.8 85.4l17-17 33.9 33.9-17 17L93.1 232 424 232l24 0 0 48-24 0L93.1 280 205.8 392.6l17 17-33.9 33.9-17-17L18.2 273z"/></svg>
        </div>
    </section>
    <section class="w-full pt-20 pb-10 bg-[#e4f5e7] flex flex-col items-center relative">
        <div class="w-full flex justify-center">
            <h2 class="absolute top-10 text-6xl font-bold text-[#c8e6cd]">fomeno</h2>
        </div>
        <div class="w-11/12 flex flex-col gap-3 items-center relative">
            <div class="w-full flex gap-3">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
            </div>
            <div class="w-full flex gap-3">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
            </div>
            <div class="w-full flex gap-3">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
            </div>
            <div class="w-full flex gap-3">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
                <img src="{{asset('assets/img/New-Project-4.webp')}}" alt="" class="w-1/2 rounded-xl">
            </div>
        </div>

    </section>
    <section class="w-full flex justify-center items-center flex-col gap-5 py-10">
        <a href="" class=" w-11/12 inline-block overflow-hidden">
            <img src="{{asset('assets/img/6e2916b1d7d47033663d0ff396a5a5c54965c033_1745744472-768x307.webp')}}" alt="" class="object-cover rounded-xl">
        </a>
        <a href="" class=" w-11/12 inline-block overflow-hidden">
            <img src="{{asset('assets/img/8d7886aeb19fa2f363066563fc189af803f26b76_1745744501-768x307.webp')}}" alt="" class="object-cover rounded-xl">
        </a>
    </section>
    <section class="w-full flex flex-col gap-12 items-center py-5">
        <h2 class="text-3xl font-bold">لایف هک و نکات کمپینگ</h2>
        <div class="w-full flex flex-col gap-4 items-center">
            <a href="" class="w-11/12 bg-[#e4f5e7] rounded-4xl flex gap-4 py-3 px-2 flex relative ">
                <img src="{{asset('assets/img/picnic_packing-checklist-300x300.webp')}}" alt="" class="size-25 rounded-xl">
                <div class="w-full flex flex-col gap-2 py-4">
                    <p class="text-sm ">فهرست کامل وسایل مورد نیاز پیک‌نیک و گشت‌و‌گذار در طبیعت</p>
                    <div class="flex gap-3 items-center">
                        <div class="w-3 h-3 flex justify-center items-center rounded-xl bg-[#95c79c]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#618c45"><path d="M32 256a224 224 0 1 0 448 0A224 224 0 1 0 32 256zm480 0A256 256 0 1 1 0 256a256 256 0 1 1 512 0zM240 400V285.9l-71.1 47.4-13.3 8.9-17.8-26.6 13.3-8.9 96-64L272 226.1V256"/></svg>
                        </div>
                        <span class="text-sm text-[#618c45]">۲۹ تیر ۱۴۰۴</span>
                    </div>
                </div>
                <div class="h-4/12 w-2 bg-[#6ca874] absolute -left-2 top-1/3 rounded-l-xl "></div>
            </a>
            <a href="" class="w-11/12 bg-[#e4f5e7] rounded-4xl flex gap-4 py-3 px-2 flex relative">
                <img src="{{asset('assets/img/picnic_packing-checklist-300x300.webp')}}" alt="" class="size-25 rounded-xl">
                <div class="w-full flex flex-col gap-2 py-4">
                    <p class="text-sm ">فهرست کامل وسایل مورد نیاز پیک‌نیک و گشت‌و‌گذار در طبیعت</p>
                    <div class="flex gap-3 items-center">
                        <div class="w-3 h-3 flex justify-center items-center rounded-xl bg-[#95c79c]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#618c45"><path d="M32 256a224 224 0 1 0 448 0A224 224 0 1 0 32 256zm480 0A256 256 0 1 1 0 256a256 256 0 1 1 512 0zM240 400V285.9l-71.1 47.4-13.3 8.9-17.8-26.6 13.3-8.9 96-64L272 226.1V256"/></svg>
                        </div>
                        <span class="text-sm text-[#618c45]">۲۹ تیر ۱۴۰۴</span>
                    </div>
                </div>
                <div class="h-4/12 w-2 bg-[#6ca874] absolute -left-2 top-1/3 rounded-l-xl "></div>
            </a>
            <a href="" class="w-11/12 bg-[#e4f5e7] rounded-4xl flex gap-4 py-3 px-2 flex relative">
                <img src="{{asset('assets/img/picnic_packing-checklist-300x300.webp')}}" alt="" class="size-25 rounded-xl">
                <div class="w-full flex flex-col gap-2 py-4">
                    <p class="text-sm ">فهرست کامل وسایل مورد نیاز پیک‌نیک و گشت‌و‌گذار در طبیعت</p>
                    <div class="flex gap-3 items-center">
                        <div class="w-3 h-3 flex justify-center items-center rounded-xl bg-[#95c79c]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#618c45"><path d="M32 256a224 224 0 1 0 448 0A224 224 0 1 0 32 256zm480 0A256 256 0 1 1 0 256a256 256 0 1 1 512 0zM240 400V285.9l-71.1 47.4-13.3 8.9-17.8-26.6 13.3-8.9 96-64L272 226.1V256"/></svg>
                        </div>
                        <span class="text-sm text-[#618c45]">۲۹ تیر ۱۴۰۴</span>
                    </div>
                </div>
                <div class="h-4/12 w-2 bg-[#6ca874] absolute -left-2 top-1/3 rounded-l-xl "></div>
            </a>
            <a href="" class="w-11/12 bg-[#e4f5e7] rounded-4xl flex gap-4 py-3 px-2 flex relative">
                <img src="{{asset('assets/img/picnic_packing-checklist-300x300.webp')}}" alt="" class="size-25 rounded-xl">
                <div class="w-full flex flex-col gap-2 py-4">
                    <p class="text-sm ">فهرست کامل وسایل مورد نیاز پیک‌نیک و گشت‌و‌گذار در طبیعت</p>
                    <div class="flex gap-3 items-center">
                        <div class="w-3 h-3 flex justify-center items-center rounded-xl bg-[#95c79c]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#618c45"><path d="M32 256a224 224 0 1 0 448 0A224 224 0 1 0 32 256zm480 0A256 256 0 1 1 0 256a256 256 0 1 1 512 0zM240 400V285.9l-71.1 47.4-13.3 8.9-17.8-26.6 13.3-8.9 96-64L272 226.1V256"/></svg>
                        </div>
                        <span class="text-sm text-[#618c45]">۲۹ تیر ۱۴۰۴</span>
                    </div>
                </div>
                <div class="h-4/12 w-2 bg-[#6ca874] absolute -left-2 top-1/3 rounded-l-xl "></div>
            </a>
        </div>

    </section>
    <section class="w-full flex px-3 py-10">
        <div class="max-w-full flex gap-5 overflow-auto">
            <div class="min-w-10/12 max-w-10/12 bg-[#dbb56e] rounded-4xl flex flex-col gap-5 items-center p-3 pb-7 relative text-white">
                <span class="px-4 py-2 bg-[#dbb56e] rounded-xl absolute top-1/14 right-1/12 text-sm font-bold">خبری</span>
                <img src="{{asset('assets/img/01-a-girl-in-haiking-600x600.webp')}}" alt="" class="object-cover rounded-3xl">
                <p class="text-md font-bold">همه‌ی فوت‌ و فن‌های جمع کردن چادر مسافرتی</p>
                <div class="w-full flex justify-between items-center pt-1">
                    <div class="flex gap-3 items-center">
                        <div class="w-3 h-3 flex justify-center items-center rounded-xl bg-[#ebd4a9]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#b29a6d"><path d="M32 256a224 224 0 1 0 448 0A224 224 0 1 0 32 256zm480 0A256 256 0 1 1 0 256a256 256 0 1 1 512 0zM240 400V285.9l-71.1 47.4-13.3 8.9-17.8-26.6 13.3-8.9 96-64L272 226.1V256"/></svg>
                        </div>
                        <span class="text-sm">۲۹ تیر ۱۴۰۴</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <span>بیشتر بخوانید</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-4"><path d="M18.2 273l-17-17 17-17L171.8 85.4l17-17 33.9 33.9-17 17L93.1 232 424 232l24 0 0 48-24 0L93.1 280 205.8 392.6l17 17-33.9 33.9-17-17L18.2 273z"></path></svg>
                    </div>
                </div>
            </div>
            <div class="min-w-10/12 max-w-10/12 bg-[#dbb56e] rounded-4xl flex flex-col gap-5 items-center p-3 pb-9 relative text-white">
                <span class="px-4 py-2 bg-[#dbb56e] rounded-xl absolute top-1/14 right-1/12 text-sm font-bold">خبری</span>
                <img src="{{asset('assets/img/01-a-girl-in-haiking-600x600.webp')}}" alt="" class="object-cover rounded-3xl">
                <p class="text-md font-bold">همه‌ی فوت‌ و فن‌های جمع کردن چادر مسافرتی</p>
                <div class="w-full flex justify-between items-center pt-1">
                    <div class="flex gap-3 items-center">
                        <div class="w-3 h-3 flex justify-center items-center rounded-xl bg-[#ebd4a9]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#b29a6d"><path d="M32 256a224 224 0 1 0 448 0A224 224 0 1 0 32 256zm480 0A256 256 0 1 1 0 256a256 256 0 1 1 512 0zM240 400V285.9l-71.1 47.4-13.3 8.9-17.8-26.6 13.3-8.9 96-64L272 226.1V256"/></svg>
                        </div>
                        <span class="text-sm">۲۹ تیر ۱۴۰۴</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <span>بیشتر بخوانید</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-4"><path d="M18.2 273l-17-17 17-17L171.8 85.4l17-17 33.9 33.9-17 17L93.1 232 424 232l24 0 0 48-24 0L93.1 280 205.8 392.6l17 17-33.9 33.9-17-17L18.2 273z"></path></svg>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="w-full flex justify-center">
        <div class="w-11/12 p-2 flex flex-col gap-4">
            <div class="w-full bg-[#e4f5e7] h-22 overflow-hidden border-2 border-[#6ca874] rounded-3xl flex flex-col tems-center justify-between text-sm box_bottom">
                <div class="w-full flex justify-between items-center px-4 py-6">
                    <span>1- ارسال به سراسر کشور دارید؟</span>
                    <div class="w-9 h-9 bg-[#b1ccb5] rounded-xl flex justify-center items-center transition-all duration-600">
                                <span class="text-3xl text-[#2a5c31] font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5" fill="#2a5c31"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z"/></svg>
                                </span>
                        <div class="text-3xl text-[#2a5c31] font-bold hidden flex justify-center items-center">
                            <span class="w-5 h-1 bg-[#2a5c31]"></span>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-[#e1f2e4] flex justify-center items-center py-3 transition-all duration-300 invisible opacity-0 max-h-0">
                    <div class="w-10/12 h-full bg-white flex items-center rounded-l-full rounded-b-full px-6 py-2 invisible opacity-0">
                        <span class="text-xs ">بله، ما به تمام نقاط ایران ارسال داریم.</span>
                    </div>
                </div>
            </div>
            <div class="w-full bg-[#e4f5e7] h-22 overflow-hidden border-2 border-[#6ca874] rounded-3xl flex flex-col tems-center justify-between text-sm box_bottom">
                <div class="w-full flex justify-between items-center px-4 py-6">
                    <span>1- ارسال به سراسر کشور دارید؟</span>
                    <div class="w-9 h-9 bg-[#b1ccb5] rounded-xl flex justify-center items-center transition-all duration-600">
                                <span class="text-3xl text-[#2a5c31] font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5" fill="#2a5c31"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z"/></svg>
                                </span>
                        <div class="text-3xl text-[#2a5c31] font-bold hidden flex justify-center items-center">
                            <span class="w-5 h-1 bg-[#2a5c31]"></span>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-[#e1f2e4] flex justify-center items-center py-3 transition-all duration-300 invisible opacity-0 max-h-0">
                    <div class="w-10/12 h-full bg-white flex items-center rounded-l-full rounded-b-full px-6 py-2 invisible opacity-0">
                        <span class="text-xs ">بله، ما به تمام نقاط ایران ارسال داریم.</span>
                    </div>
                </div>
            </div>
            <div class="w-full bg-[#e4f5e7] h-22 overflow-hidden border-2 border-[#6ca874] rounded-3xl flex flex-col tems-center justify-between text-sm box_bottom">
                <div class="w-full flex justify-between items-center px-4 py-6">
                    <span>1- ارسال به سراسر کشور دارید؟</span>
                    <div class="w-9 h-9 bg-[#b1ccb5] rounded-xl flex justify-center items-center transition-all duration-600">
                                <span class="text-3xl text-[#2a5c31] font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5" fill="#2a5c31"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z"/></svg>
                                </span>
                        <div class="text-3xl text-[#2a5c31] font-bold hidden flex justify-center items-center">
                            <span class="w-5 h-1 bg-[#2a5c31]"></span>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-[#e1f2e4] flex justify-center items-center py-3 transition-all duration-300 invisible opacity-0 max-h-0">
                    <div class="w-10/12 h-full bg-white flex items-center rounded-l-full rounded-b-full px-6 py-2 invisible opacity-0">
                        <span class="text-xs ">بله، ما به تمام نقاط ایران ارسال داریم.</span>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <section class="w-full py-10 bg-[#f5f6fa]">
        <div class="w-full flex flex-col gap-5 flex items-center justify-center">
            <div class="w-8/12 py-5 rounded-2xl bg-[#6ca874] flex flex-col items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#fff" class="rotate-40 w-7"><path class="fa-secondary" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/><path class="fa-primary" d="M256 24c0-13.3 10.7-24 24-24C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24zm0 200a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM280 96c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
                <span class="text-xl font-bold text-[#fff]">پشتیبانی 24 ساعته</span>
                <span class="text-xl font-bold text-[#fff]">09215543232</span>
            </div>
            <img src="./img/camping.png" alt="" class="w-55">
            <p class="text-lg font-bold">تجهیزات حرفه‌ای، ماجراجویی‌های فراموش‌نشدنی!</p>
            <div class="flex gap-3">
                <a href="" class="w-10 h-10 bg-[#6ca874] rounded-md flex justify-center items-center">
                    <svg class="w-5" fill="#fff" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg>
                </a>
                <a href="" class="w-10 h-10 bg-[#6ca874] rounded-md flex justify-center items-center">
                    <svg class="w-5" fill="#fff" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                </a>
                <a href="" class="w-10 h-10 bg-[#6ca874] rounded-md flex justify-center items-center">
                    <svg class="w-5" fill="#fff" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                </a>

            </div>
        </div>
    </section>
</main>
<footer>
    <section class="w-full bg-[#f5f6fa] py-5 px-8 flex flex-col gap-6">
        <div class="flex flex-col gap-6">
            <h2 class="text-xl font-bold">دسته بندی <span class="text-[#72ab79]">محصولات</span></h2>
            <ul class="flex flex-col gap-3 pr-6">
                <li>
                    <a href="" class="text-sm">
                        کوهنوردی و کمپینگ
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        پوشاک ورزشی
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        تجهیزات سفر
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        لوازم ورزشی
                    </a>
                </li>

            </ul>
        </div>
        <div class="flex flex-col gap-6">
            <h2 class="text-xl font-bold">خدمات <span class="text-[#72ab79]">مشتریان</span></h2>
            <ul class="flex flex-col gap-3 pr-6">
                <li>
                    <a href="" class="text-sm">
                        سوالات متداول
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        شرایط تحویل و ارائه کالا
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        نحوه ثبت سفارش
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        نحوه ارسال سفارش
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        قوانین مرجوعی کالا
                    </a>
                </li>

            </ul>
        </div>
        <div class="flex flex-col gap-6">
            <h2 class="text-xl font-bold">دسترسی <span class="text-[#72ab79]">سریع</span></h2>
            <ul class="flex flex-col gap-3 pr-6">
                <li>
                    <a href="" class="text-sm">
                        تماس با ما
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        وبلاگ
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        درباره ما
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        فروشگاه
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        سبد خرید
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm">
                        حساب کاربری من
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="w-full bg-[#f5f6fa] flex flex-col gap-7 items-center pb-30 p-4">
        <div class="w-9/12 flex justify-between">
            <img src="{{asset('assets/img/samandehipng.parspng-2.png')}}" alt="" class="w-30">
            <img src="{{asset('assets/img/enamad-1-2.png')}}" alt="" class="w-30">
        </div>
        <div class="w-full flex flex-col items-center">
            <p>کلیه حقوق متعلق به جیاواز میباشد.</p>
            <p>طراحی توسط شاهو قادری</p>
        </div>
    </section>
    <section class="w-full flex flex-col bg-[#6ca874] fixed bottom-0">
        <div class="w-full flex justify-center relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="40" viewBox="0 0 231 75" class="absolute top-0 fill:backdrop-blur-sm">
                <path clip-rule="evenodd" d="M0 0C31.5006 0.949537 50.52 17.872 56.1955 26.4544L55.986 25.8011L82.4924 58.631C99.3032 79.4521 131.038 79.4521 147.849 58.6309L174.356 25.8011L174.146 26.4544C179.822 17.872 198.844 0.949537 230.349 0H0Z" fill="#FCFCFC" fill-rule="">
                </path>
            </svg>
        </div>
        <div class="w-full h-full z-1 flex justify-evenly items-center py-1">
            <div class="flex w-20 flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#fff" class="w-6"><path d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z"/></svg>
                <span class="text-xs text-[#fff]">خانه</span>
            </div>
            <div class="flex w-20 flex-col items-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.232 10.5257C19.6468 7.40452 19.3542 5.84393 18.2433 4.92196C17.1324 4 15.5446 4 12.369 4H11.6479C8.47228 4 6.8845 4 5.7736 4.92196C4.66271 5.84393 4.37009 7.40452 3.78487 10.5257C2.96195 14.9146 2.55049 17.1091 3.75011 18.5545C4.94973 20 7.18244 20 11.6478 20H12.369C16.8344 20 19.0672 20 20.2668 18.5545C20.9628 17.7159 21.1165 16.6252 20.9621 15" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8" stroke="white" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
                <span class="text-xs text-[#fff]">فروشگاه</span>
            </div>
            <div class="p-3 bg-[#e8e9ed] rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6" fill="#000"><path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z"></path></svg>
            </div>
            <div class="flex w-20 flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#fff" class="w-5"><path class="fa-secondary" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path><path class="fa-primary" d="M256 24c0-13.3 10.7-24 24-24C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24zm0 200a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM280 96c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24s10.7-24 24-24z"></path></svg>
                <span class="text-xs text-[#fff]">تماس با ما</span>
            </div>
            <div class="flex w-20 flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" class="w-4"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path></svg>
                <span class="text-xs text-[#fff]">حساب کاربری</span>

            </div>

        </div>
        <div class="w-full h-10 bg-[#fff]"></div>
    </section>
</footer>

<script src="{{ asset('assets/js/robot.js') }}"></script>
</body>
</html>