<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    @PwaHead
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('assets/js/tailwind.js#t=0.1') }}"></script>
    <script src="{{ asset('assets/js/jquery.js#t=0.1') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css#t=0.1') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('logo/faveIcon.png#t=0.1') }}" type="image/png">
    <script src="{{ asset('assets/js/html5-qrcode.min.js#t=0.1') }}"></script>
    <title>@yield('title')</title>
    <script>
        let url = "{{ url('/') }}/"
        let api = "{{ url('api/') }}/"
        let storage = "{{ url('storage/') }}/"
        let asset = "{{ asset('/') }}/"
    </script>

</head>
@php
    $isLoggedIn = Auth::check();
    $ids = $isLoggedIn
        ? Auth::user()->role->pluck('id')->toArray()
        : [];
@endphp

<header dir="rtl"
    class="sticky top-0 z-[1000] w-full bg-white/95 backdrop-blur-xl border-b border-slate-100">

    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10">

        <div class="min-h-[78px] flex items-center justify-between gap-4">

            {{-- سمت راست: لوگو و منو --}}
            <div class="flex items-center gap-3 lg:gap-9 shrink-0">

                <a href="{{ route('home') }}"
                    class="flex items-center shrink-0">
                    <img src="{{ asset('logo/rinso.png') }}"
                        alt="رینسو"
                        class="w-[105px] sm:w-[120px] max-h-[55px] object-contain">
                </a>

                {{-- همبرگر موبایل --}}
                <button type="button"
                    onclick="hamburgerMenu('open')"
                    id="menuBlockliet"
                    aria-label="باز کردن منو"
                    class="lg:hidden size-10 rounded-xl flex flex-col
                           items-center justify-center gap-[5px]
                           border border-slate-200 bg-white
                           hover:border-[#FF9018] hover:bg-orange-50
                           transition-all duration-200">

                    <span class="w-[19px] h-[2px] rounded-full bg-[#142033]
                                 transition-all duration-300"></span>

                    <span class="w-[19px] h-[2px] rounded-full bg-[#142033]
                                 transition-all duration-300"></span>

                    <span class="w-[19px] h-[2px] rounded-full bg-[#142033]
                                 transition-all duration-300"></span>

                </button>

                {{-- منوی دسکتاپ --}}
                <nav class="hidden lg:flex items-center gap-7">

                    <a href="{{ route('home') }}"
                        class="relative py-3 text-sm font-bold transition-colors
                        {{ Route::is('home') ? 'text-[#FF9018]' : 'text-[#142033] hover:text-[#FF9018]' }}">

                        خانه

                        @if(Route::is('home'))
                            <span class="absolute -bottom-[2px] right-0
                                w-5 h-[3px] rounded-full bg-[#FF9018]"></span>
                        @endif
                    </a>

                    <a href="{{ route('aboutUs.clientList') }}"
                        class="py-3 text-sm font-medium transition-colors
                        {{ Route::is('aboutUs.clientList') ? 'text-[#FF9018]' : 'text-slate-600 hover:text-[#FF9018]' }}">
                        درباره ما
                    </a>

                    <a href="{{ route('contactUs.create') }}"
                        class="py-3 text-sm font-medium transition-colors
                        {{ Route::is('contactUs.create') ? 'text-[#FF9018]' : 'text-slate-600 hover:text-[#FF9018]' }}">
                        ارتباط با ما
                    </a>

                </nav>

            </div>


            {{-- وسط: جستجوی دسکتاپ --}}
            <form action="{{ route('search.search') }}"
                method="GET"
                dir="rtl"
                class="hidden md:flex flex-1 max-w-[420px] mx-4">

                <div class="group w-full h-[46px] flex items-center gap-3
                    px-4 rounded-2xl bg-slate-50
                    border border-slate-100
                    hover:border-slate-200
                    focus-within:bg-white
                    focus-within:border-[#FF9018]
                    focus-within:shadow-[0_0_0_4px_rgba(255,144,24,0.08)]
                    transition-all duration-200">

                    <svg viewBox="0 0 24 24"
                        class="size-5 shrink-0 text-slate-400 group-focus-within:text-[#FF9018]"
                        fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m16 16 4 4"/>
                    </svg>

                    <input type="text"
                        name="search"
                        dir="rtl"
                        value="{{ $searchTitle ?? '' }}"
                        placeholder="دنبال چه چیزی می‌گردی؟"
                        class="w-full min-w-0 bg-transparent outline-none
                            text-sm text-[#142033]
                            placeholder:text-slate-400">

                    <button type="submit"
                        class="text-xs font-bold text-[#FF9018]
                            hover:text-[#142033] transition-colors shrink-0">
                        جستجو
                    </button>

                </div>
            </form>


            {{-- سمت چپ: حساب کاربری و جستجوی موبایل --}}
            <div class="flex items-center gap-2 shrink-0">

                {{-- جستجوی موبایل --}}
                <button type="button"
                    onclick="searchPopup('open')"
                    aria-label="جستجو"
                    class="md:hidden size-10 rounded-xl flex items-center
                        justify-center bg-slate-50 border border-slate-100
                        hover:border-orange-200 hover:bg-orange-50
                        transition-all duration-200">

                    <svg viewBox="0 0 24 24"
                        class="size-5"
                        fill="none" stroke="#142033"
                        stroke-width="1.8" stroke-linecap="round">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m16 16 4 4"/>
                    </svg>

                </button>


                @if($isLoggedIn)

                    {{-- پروفایل کاربر --}}
                    <div class="relative group">

                        <button type="button"
                            class="flex items-center gap-2 p-1.5
                                rounded-xl border border-transparent
                                hover:border-slate-200 hover:bg-slate-50
                                transition-all duration-200">

                            @if(!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}"
                                    class="size-9 rounded-xl object-cover"
                                    alt="پروفایل">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                    class="size-9 rounded-xl object-cover"
                                    alt="پروفایل">
                            @endif

                            <div class="hidden sm:block text-right">
                                <span class="block text-xs font-bold text-[#142033]">
                                    {{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}
                                </span>
                                <span class="block text-[10px] text-slate-400 mt-1">
                                    حساب کاربری من
                                </span>
                            </div>

                            <svg viewBox="0 0 24 24"
                                class="hidden sm:block size-4 text-slate-400
                                    transition-transform duration-200
                                    group-hover:rotate-180"
                                fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path d="m7 10 5 5 5-5"/>
                            </svg>

                        </button>


                        {{-- منوی کشویی پروفایل --}}
                        <div class="invisible opacity-0 translate-y-2
                            pointer-events-none
                            group-hover:visible group-hover:opacity-100
                            group-hover:translate-y-0 group-hover:pointer-events-auto
                            group-focus-within:visible
                            group-focus-within:opacity-100
                            group-focus-within:translate-y-0
                            group-focus-within:pointer-events-auto
                            transition-all duration-200
                            absolute left-0 top-full pt-3
                            w-[250px] z-50">

                            <div class="bg-white rounded-2xl
                                border border-slate-100
                                shadow-[0_15px_45px_rgba(20,32,51,0.12)]
                                p-3">

                                <div class="px-3 py-3 border-b border-slate-100">
                                    <p class="text-sm font-bold text-[#142033]">
                                        {{ Auth::user()->name }}
                                        {{ Auth::user()?->family }}
                                    </p>
                                    <p class="text-xs text-slate-400 mt-1">
                                        خوش آمدی!
                                    </p>
                                </div>

                                <a href="{{ route('user.profile') }}"
                                    class="flex items-center gap-3 p-3 mt-2
                                        rounded-xl text-sm text-slate-600
                                        hover:bg-orange-50 hover:text-[#FF9018]
                                        transition-colors">
                                    پروفایل من
                                </a>

                                <a href="{{ route('user.setting') }}"
                                    class="flex items-center gap-3 p-3
                                        rounded-xl text-sm text-slate-600
                                        hover:bg-orange-50 hover:text-[#FF9018]
                                        transition-colors">
                                    تنظیمات حساب
                                </a>

                                <div class="border-t border-slate-100 mt-2 pt-2">
                                    <a href="{{ route('user.logout') }}"
                                        class="block p-3 rounded-xl text-sm
                                            text-rose-500 hover:bg-rose-50
                                            transition-colors">
                                        خروج از حساب کاربری
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                @else

                    {{-- ورود و ثبت نام --}}
                    <a href="{{ route('login') }}"
                        class="h-10 px-3 sm:px-5 rounded-xl
                            flex items-center justify-center gap-2
                            bg-[#142033] text-white
                            hover:bg-[#FF9018]
                            transition-all duration-300">

                        <svg viewBox="0 0 24 24"
                            class="size-[17px]"
                            fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                        </svg>

                        <span class="text-xs sm:text-sm font-bold whitespace-nowrap">
                            ورود | ثبت نام
                        </span>

                    </a>

                @endif

            </div>

        </div>
    </div>


    {{-- پاپ آپ جستجوی موبایل؛ شناسه‌ها و توابع حفظ شده‌اند --}}
    <div id="searchP"
        dir="rtl"
        onclick="if(event.target === this) searchPopup('close')"
        class="fixed inset-0 z-[99999] invisible opacity-0
            bg-[#142033]/40 backdrop-blur-sm
            transition-all duration-300">

        <div id="searchSection"
            class="w-full bg-white rounded-b-[28px]
                shadow-[0_15px_50px_rgba(20,32,51,0.15)]
                -translate-y-full
                transition-transform duration-300">

            <div class="max-w-2xl mx-auto p-5 sm:p-7">

                <div class="flex items-center justify-between mb-6">

                    <div>
                        <h3 class="text-lg font-bold text-[#142033]">
                            جستجو در رینسو
                        </h3>

                        <p class="text-xs text-slate-400 mt-1">
                            سریع‌تر به چیزی که می‌خوای برس
                        </p>
                    </div>

                    <button type="button"
                        onclick="searchPopup('close')"
                        aria-label="بستن جستجو"
                        class="size-9 rounded-xl bg-slate-50
                            flex items-center justify-center
                            hover:bg-orange-50 transition-colors">

                        <svg viewBox="0 0 24 24"
                            class="size-5"
                            fill="none" stroke="#142033"
                            stroke-width="1.8">
                            <path d="m18 6-12 12M6 6l12 12"/>
                        </svg>

                    </button>

                </div>

                <form action="{{ route('search.search') }}"
                    method="GET" dir="rtl">

                    <div class="flex items-center gap-3 p-2
                        rounded-2xl border border-slate-200
                        focus-within:border-[#FF9018]
                        focus-within:shadow-[0_0_0_4px_rgba(255,144,24,0.08)]
                        transition-all">

                        <input type="text"
                            name="search"
                            dir="rtl"
                            value="{{ $searchTitle ?? '' }}"
                            placeholder="عبارت مورد نظرت رو بنویس..."
                            class="w-full min-w-0 p-2 bg-transparent
                                outline-none text-sm text-[#142033]
                                placeholder:text-slate-400">

                        <button type="submit"
                            class="shrink-0 px-5 py-3 rounded-xl
                                bg-[#FF9018] text-white
                                text-sm font-bold
                                hover:bg-[#142033] transition-colors">
                            جستجو
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

</header>

{{-- پس‌زمینه منو --}}
<div id="menuBlock"
    dir="rtl"
    class="fixed inset-0 z-[9998] invisible opacity-0
           bg-[#142033]/40 backdrop-blur-sm
           transition-all duration-300">

    {{-- پنل منو --}}
    <aside id="menuList"
        class="absolute top-0 right-0 h-full w-[85%] max-w-[340px]
               bg-white shadow-2xl
               translate-x-full
               transition-transform duration-300 ease-out
               flex flex-col">

        {{-- سربرگ --}}
        <div class="flex items-center justify-between px-5 py-5
                    border-b border-slate-100">

            <a href="{{ route('home') }}">
                <img src="{{ asset('logo/rinso.png') }}"
                    alt="رینسو"
                    class="w-[105px] h-11 object-contain">
            </a>

            <button type="button"
                onclick="hamburgerMenu('close')"
                class="size-10 rounded-xl flex items-center justify-center
                       bg-slate-50 hover:bg-orange-50
                       transition-colors"
                aria-label="بستن منو">

                <svg viewBox="0 0 24 24"
                    class="size-5"
                    fill="none" stroke="#142033"
                    stroke-width="1.8" stroke-linecap="round">
                    <path d="m18 6-12 12M6 6l12 12"/>
                </svg>

            </button>
        </div>


        {{-- محتوای منو --}}
        <div class="flex-1 overflow-y-auto px-5 py-6">

            <p class="text-[11px] font-bold text-slate-400 mb-4 px-2">
                منوی اصلی
            </p>

            <nav class="flex flex-col gap-2">

                <a href="{{ route('home') }}"
                    class="flex items-center gap-3 px-4 py-3.5
                    rounded-2xl transition-all
                    {{ Route::is('home')
                        ? 'bg-orange-50 text-[#FF9018] font-bold'
                        : 'text-[#142033] hover:bg-slate-50' }}">

                    <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                        fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"/>
                    </svg>

                    <span class="text-sm">خانه</span>

                    @if(Route::is('home'))
                        <span class="mr-auto size-2 rounded-full bg-[#FF9018]"></span>
                    @endif
                </a>


                <a href="{{ route('aboutUs.clientList') }}"
                    class="flex items-center gap-3 px-4 py-3.5
                    rounded-2xl transition-all
                    {{ Route::is('aboutUs.clientList')
                        ? 'bg-orange-50 text-[#FF9018] font-bold'
                        : 'text-[#142033] hover:bg-slate-50' }}">

                    <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                        fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 11v5m0-8h.01"/>
                    </svg>

                    <span class="text-sm">درباره ما</span>
                </a>


                <a href="{{ route('contactUs.create') }}"
                    class="flex items-center gap-3 px-4 py-3.5
                    rounded-2xl transition-all
                    {{ Route::is('contactUs.create')
                        ? 'bg-orange-50 text-[#FF9018] font-bold'
                        : 'text-[#142033] hover:bg-slate-50' }}">

                    <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                        fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="5" width="18" height="14" rx="3"/>
                        <path d="m3 7 9 6 9-6"/>
                    </svg>

                    <span class="text-sm">ارتباط با ما</span>
                </a>

            </nav>


            {{-- بخش حساب کاربری --}}
            <div class="mt-9">

                <p class="text-[11px] font-bold text-slate-400 mb-4 px-2">
                    حساب کاربری
                </p>

                @if(Auth::check())

                    <div class="p-4 rounded-2xl bg-[#F5F7FA]">

                        <div class="flex items-center gap-3 mb-4">

                            @if(!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}"
                                    class="size-11 rounded-xl object-cover"
                                    alt="پروفایل">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                    class="size-11 rounded-xl object-cover"
                                    alt="پروفایل">
                            @endif

                            <div class="min-w-0">
                                <p class="text-sm font-bold text-[#142033] truncate">
                                    {{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}
                                </p>
                                <p class="text-xs text-slate-400 mt-1">
                                    خوش آمدی!
                                </p>
                            </div>

                        </div>

                        <div class="flex flex-col gap-1">

                            <a href="{{ route('user.profile') }}"
                                class="px-3 py-2.5 rounded-xl text-sm text-slate-600
                                       hover:bg-white hover:text-[#FF9018] transition-colors">
                                پروفایل من
                            </a>

                            <a href="{{ route('user.setting') }}"
                                class="px-3 py-2.5 rounded-xl text-sm text-slate-600
                                       hover:bg-white hover:text-[#FF9018] transition-colors">
                                تنظیمات حساب
                            </a>

                            <a href="{{ route('user.logout') }}"
                                class="px-3 py-2.5 rounded-xl text-sm text-rose-500
                                       hover:bg-white transition-colors">
                                خروج از حساب کاربری
                            </a>

                        </div>

                    </div>

                @else

                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center gap-2
                               w-full py-3.5 rounded-2xl
                               bg-[#142033] text-white
                               hover:bg-[#FF9018] transition-all">

                        <svg viewBox="0 0 24 24" class="size-5"
                            fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                        </svg>

                        <span class="text-sm font-bold">
                            ورود | ثبت نام
                        </span>

                    </a>

                @endif

            </div>

        </div>


        {{-- پایین منو --}}
        <div class="px-5 py-4 border-t border-slate-100">
            <p class="text-[11px] text-slate-400 text-center">
                تجربه‌ای ساده‌تر با رینسو
            </p>
        </div>

    </aside>
</div>
