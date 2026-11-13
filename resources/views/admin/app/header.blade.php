
@php
    $isLoggedIn = Auth::check();
    $ids = $isLoggedIn
        ? Auth::user()->role->pluck('id')->toArray()
        : [];
@endphp

<header dir="rtl"
    class="sticky top-0 z-[1000] w-full lg:w-[calc(100%-265px)] float-left bg-white/95 backdrop-blur-xl border-b border-slate-100">

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
                                    @if(Route::is('user.profile')) bg-orange-50 text-[#FF9018] @else text-slate-600 @endif
                                        rounded-xl text-sm
                                        hover:bg-orange-50 hover:text-[#FF9018]
                                        transition-colors">
                                    پروفایل من
                                </a>

                                <a href="{{ route('user.setting') }}"
                                    class="flex items-center gap-3 p-3 mt-2
                                    @if(Route::is('user.setting')) bg-orange-50 text-[#FF9018] @else text-slate-600 @endif
                                        rounded-xl text-sm
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

{{-- Mobile Admin Menu --}}
<div id="menuBlock"
     dir="rtl"
     onclick="if(event.target === this) hamburgerMenu('close')"
     class="fixed inset-0 z-[9998] invisible opacity-0
            bg-[#142033]/50 backdrop-blur-sm
            transition-all duration-300">

    <aside id="menuList"
        class="absolute top-0 right-0 h-full w-[88%] max-w-[370px]
               bg-[#F8FAFC] shadow-2xl translate-x-full
               transition-transform duration-300 ease-out
               flex flex-col overflow-hidden">

        {{-- Header --}}
        <div class="relative bg-[#142033] px-5 pt-6 pb-6">

            <div class="flex items-center justify-between">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3">

                    <div class="size-11 rounded-xl bg-white/10
                                flex items-center justify-center">

                        <img src="{{ asset('logo/rinso.png') }}"
                             alt="رینسو"
                             class="w-9 h-9 object-contain">
                    </div>

                    <div>
                        <p class="text-white font-extrabold text-lg">
                            پنل مدیریت
                        </p>
                        <p class="text-white/50 text-[11px] mt-1">
                            مدیریت هوشمند رینسو
                        </p>
                    </div>

                </a>

                <button type="button"
                    onclick="hamburgerMenu('close')"
                    aria-label="بستن منو"
                    class="size-10 rounded-xl bg-white/10
                           text-white flex items-center justify-center
                           hover:bg-white/20 transition">

                    <svg viewBox="0 0 24 24"
                         class="size-5"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8">
                        <path d="m18 6-12 12M6 6l12 12"/>
                    </svg>

                </button>

            </div>

            @if(Auth::check())
                <a href="{{ route('user.profile') }}" class="flex items-center gap-3 mt-6
                            bg-white/5 border border-white/10
                            rounded-2xl p-3">

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
                        <p class="text-sm font-bold text-white truncate">
                            {{ Auth::user()->name }}
                            {{ Auth::user()?->family }}
                        </p>

                        <p class="text-[11px] text-white/50 mt-1">
                            خوش آمدی!
                        </p>
                    </div>

                </a>
            @endif

        </div>


        {{-- Menu Body --}}
        <div class="flex-1 overflow-y-auto px-4 py-5"
             style="scrollbar-width:none;">

            <p class="text-[11px] font-bold text-slate-400
                      px-3 mb-3">
                منوی اصلی
            </p>

            <nav class="flex flex-col gap-2">

                {{-- Dashboard --}}
                <a href="{{ route('home') }}"
                   class="flex items-center gap-3 px-4 py-3.5
                   rounded-xl transition-all
                   {{ Route::is('home')
                        ? 'bg-[#142033] text-white shadow-lg shadow-slate-900/10'
                        : 'text-slate-600 hover:bg-white hover:text-[#142033]' }}">

                   <svg viewBox="0 0 24 24"
     class="size-5 shrink-0"
     fill="none"
     stroke="currentColor"
     stroke-width="1.8"
     stroke-linecap="round"
     stroke-linejoin="round">

    <path d="M3 10.5L12 3L21 10.5"/>
    <path d="M5 9.5V20C5 20.55 5.45 21 6 21H18C18.55 21 19 20.55 19 20V9.5"/>
    <path d="M9 21V14H15V21"/>

</svg>

                    <span class="text-sm font-semibold">
                       خانه
                    </span>

                    @if(Route::is('home'))
                        <span class="mr-auto size-2 rounded-full bg-[#FF9018]"></span>
                    @endif
                </a>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3.5
                   rounded-xl transition-all
                   {{ Route::is('dashboard')
                        ? 'bg-[#142033] text-white shadow-lg shadow-slate-900/10'
                        : 'text-slate-600 hover:bg-white hover:text-[#142033]' }}">

                    <svg viewBox="0 0 24 24"
                         class="size-5 shrink-0"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8">
                        <rect x="3" y="3" width="8" height="8" rx="2"/>
                        <rect x="13" y="3" width="8" height="5" rx="2"/>
                        <rect x="13" y="10" width="8" height="11" rx="2"/>
                        <rect x="3" y="13" width="8" height="8" rx="2"/>
                    </svg>

                    <span class="text-sm font-semibold">
                        داشبورد
                    </span>

                    @if(Route::is('dashboard'))
                        <span class="mr-auto size-2 rounded-full bg-[#FF9018]"></span>
                    @endif
                </a>


                {{-- Page Categories --}}
                @if(in_array(1, $ids))

                    <details class="group rounded-xl overflow-hidden"
                        @if(Route::is('pageCategory.*')) open @endif>

                        <summary class="list-none cursor-pointer
                            flex items-center justify-between
                            px-4 py-3.5 rounded-xl
                            transition-all
                            {{ Route::is('pageCategory.*')
                                ? 'bg-white text-[#142033] font-bold'
                                : 'text-slate-600 hover:bg-white' }}">

                            <div class="flex items-center gap-3">

                                <svg viewBox="0 0 24 24"
                                     class="size-5 shrink-0 text-[#FF9018]"
                                     fill="none" stroke="currentColor"
                                     stroke-width="1.8">
                                    <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                </svg>

                                <span class="text-sm">
                                    دسته‌های صفحه‌ها
                                </span>

                            </div>

                            <svg viewBox="0 0 24 24"
                                 class="size-4 text-slate-400
                                        transition-transform
                                        group-open:rotate-180"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </summary>

                        <div class="mr-6 ml-2 mt-1 pr-4
                                    border-r-2 border-slate-200
                                    flex flex-col gap-1">

                            <a href="{{ route('pageCategory.create') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('pageCategory.create')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                ایجاد دسته
                            </a>

                            <a href="{{ route('pageCategory.list') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('pageCategory.list')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                لیست دسته‌ها
                            </a>

                        </div>

                    </details>

                @endif


                {{-- Pages --}}
                <details class="group rounded-xl overflow-hidden"
                    @if(Route::is('pages.*') ||
                        Route::is('socialMedia.create') ||
                        Route::is('socialMedia.list')) open @endif>

                    <summary class="list-none cursor-pointer
                        flex items-center justify-between
                        px-4 py-3.5 rounded-xl transition-all
                        {{ Route::is('pages.*') ||
                           Route::is('socialMedia.create') ||
                           Route::is('socialMedia.list')
                            ? 'bg-white text-[#142033] font-bold'
                            : 'text-slate-600 hover:bg-white' }}">

                        <div class="flex items-center gap-3">

                            <svg viewBox="0 0 24 24"
                                 class="size-5 shrink-0 text-[#FF9018]"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8">
                                <rect x="4" y="3" width="16" height="18" rx="2"/>
                                <path d="M8 8h8M8 12h8M8 16h5"/>
                            </svg>

                            <span class="text-sm">صفحه‌ها</span>

                        </div>

                        <svg viewBox="0 0 24 24"
                             class="size-4 text-slate-400
                                    transition-transform group-open:rotate-180"
                             fill="none" stroke="currentColor"
                             stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>

                    </summary>

                    <div class="mr-6 ml-2 mt-1 pr-4
                                border-r-2 border-slate-200
                                flex flex-col gap-1">

                        <a href="{{ route('pages.create') }}"
                           class="px-4 py-3 rounded-lg text-sm transition
                           {{ Route::is('pages.create')
                                ? 'bg-orange-50 text-[#FF9018] font-bold'
                                : 'text-slate-500 hover:bg-white' }}">
                            ایجاد صفحه
                        </a>

                        <a href="{{ route('pages.social_list') }}"
                           class="px-4 py-3 rounded-lg text-sm transition
                           {{ Route::is('pages.social_list')
                                ? 'bg-orange-50 text-[#FF9018] font-bold'
                                : 'text-slate-500 hover:bg-white' }}">
                            لیست صفحه‌های من
                        </a>

                        @if(in_array(1, $ids))

                            <a href="{{ route('pages.list') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('pages.list')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                لیست همه صفحه‌ها
                            </a>

                            <div class="border-t border-slate-200 my-1"></div>

                            <a href="{{ route('socialMedia.create') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('socialMedia.create')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                ایجاد شبکه اجتماعی
                            </a>

                            <a href="{{ route('socialMedia.list') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('socialMedia.list')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                لیست شبکه‌های اجتماعی
                            </a>

                        @endif

                    </div>

                </details>


                {{-- Users --}}
                @if(in_array(1, $ids) || in_array(4, $ids))

                    <details class="group rounded-xl overflow-hidden"
                        @if(Route::is('user.list') ||
                            Route::is('user.create_user') ||
                            Route::is('user.myUsers') ||
                            Route::is('user.requestList')) open @endif>

                        <summary class="list-none cursor-pointer
                            flex items-center justify-between
                            px-4 py-3.5 rounded-xl transition-all
                            {{ Route::is('user.list') ||
                               Route::is('user.create_user') ||
                               Route::is('user.myUsers') ||
                               Route::is('user.requestList')
                                ? 'bg-white text-[#142033] font-bold'
                                : 'text-slate-600 hover:bg-white' }}">

                            <div class="flex items-center gap-3">

                                <svg viewBox="0 0 24 24"
                                     class="size-5 shrink-0 text-[#FF9018]"
                                     fill="none" stroke="currentColor"
                                     stroke-width="1.8">
                                    <circle cx="9" cy="8" r="4"/>
                                    <path d="M2 21v-2a7 7 0 0 1 14 0v2"/>
                                    <path d="M17 4a4 4 0 0 1 0 8m2 3a5 5 0 0 1 3 5v1"/>
                                </svg>

                                <span class="text-sm">کاربران</span>

                            </div>

                            <svg viewBox="0 0 24 24"
                                 class="size-4 text-slate-400
                                        transition-transform group-open:rotate-180"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </summary>

                        <div class="mr-6 ml-2 mt-1 pr-4
                                    border-r-2 border-slate-200
                                    flex flex-col gap-1">

                            <a href="{{ route('user.myUsers') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('user.myUsers')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                مشتریان من
                            </a>

                            <a href="{{ route('user.list') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('user.list')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                همه کاربران
                            </a>

                            <a href="{{ route('user.create_user') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('user.create_user')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                ایجاد کاربر جدید
                            </a>

                            @if(in_array(1, $ids) || in_array(4, $ids))
                                <a href="{{ route('user.requestList') }}"
                                   class="px-4 py-3 rounded-lg text-sm transition
                                   {{ Route::is('user.requestList')
                                        ? 'bg-orange-50 text-[#FF9018] font-bold'
                                        : 'text-slate-500 hover:bg-white' }}">
                                    لیست درخواست‌ها
                                </a>
                            @endif

                        </div>

                    </details>

                @endif


                {{-- Contact Us --}}
                @if(in_array(1, $ids))

                    <details class="group rounded-xl overflow-hidden"
                        @if(Route::is('contactUs.*')) open @endif>

                        <summary class="list-none cursor-pointer
                            flex items-center justify-between
                            px-4 py-3.5 rounded-xl transition-all
                            {{ Route::is('contactUs.*')
                                ? 'bg-white text-[#142033] font-bold'
                                : 'text-slate-600 hover:bg-white' }}">

                            <div class="flex items-center gap-3">

                                <svg viewBox="0 0 24 24"
                                     class="size-5 shrink-0 text-[#FF9018]"
                                     fill="none" stroke="currentColor"
                                     stroke-width="1.8">
                                    <rect x="3" y="4" width="18" height="16" rx="3"/>
                                    <path d="m3 7 9 6 9-6"/>
                                </svg>

                                <span class="text-sm">ارتباط با ما</span>

                            </div>

                            <svg viewBox="0 0 24 24"
                                 class="size-4 text-slate-400
                                        transition-transform group-open:rotate-180"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </summary>

                        <div class="mr-6 ml-2 mt-1 pr-4
                                    border-r-2 border-slate-200
                                    flex flex-col gap-1">

                            <a href="{{ route('contactUs.list') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('contactUs.list')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                لیست تیکت‌ها
                            </a>

                            <a href="{{ route('contactUs.create') }}"
                               class="px-4 py-3 rounded-lg text-sm transition
                               {{ Route::is('contactUs.create')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                فرم ارتباط با ما
                            </a>

                        </div>

                    </details>

                @endif


                {{-- About Us --}}
                @if($isAdmin)
                    <details class="group rounded-xl overflow-hidden"
                        @if(Route::is('aboutUs.*')) open @endif>

                        <summary class="list-none cursor-pointer
                            flex items-center justify-between
                            px-4 py-3.5 rounded-xl transition-all
                            {{ Route::is('aboutUs.*')
                                ? 'bg-white text-[#142033] font-bold'
                                : 'text-slate-600 hover:bg-white' }}">

                            <div class="flex items-center gap-3">

                                <svg viewBox="0 0 24 24"
                                    class="size-5 shrink-0 text-[#FF9018]"
                                    fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 11v5m0-8h.01"/>
                                </svg>

                                <span class="text-sm">درباره ما</span>

                            </div>

                            <svg viewBox="0 0 24 24"
                                class="size-4 text-slate-400
                                        transition-transform group-open:rotate-180"
                                fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </summary>

                        <div class="mr-6 ml-2 mt-1 pr-4
                                    border-r-2 border-slate-200
                                    flex flex-col gap-1">

                            @if(in_array(1, $ids))
                                <a href="{{ route('aboutUs.create_edit') }}"
                                class="px-4 py-3 rounded-lg text-sm transition
                                {{ Route::is('aboutUs.create_edit')
                                        ? 'bg-orange-50 text-[#FF9018] font-bold'
                                        : 'text-slate-500 hover:bg-white' }}">
                                    ایجاد درباره ما
                                </a>
                            @endif

                            <a href="{{ route('aboutUs.list') }}"
                            class="px-4 py-3 rounded-lg text-sm transition
                            {{ Route::is('aboutUs.list')
                                    ? 'bg-orange-50 text-[#FF9018] font-bold'
                                    : 'text-slate-500 hover:bg-white' }}">
                                درباره ما
                            </a>

                        </div>

                    </details>
                @endif

                {{-- QR Codes --}}
                <details class="group rounded-xl overflow-hidden"
                    @if(Route::is('generalQrCodes.*')) open @endif>

                    <summary class="list-none cursor-pointer
                        flex items-center justify-between
                        px-4 py-3.5 rounded-xl transition-all
                        {{ Route::is('generalQrCodes.*')
                            ? 'bg-white text-[#142033] font-bold'
                            : 'text-slate-600 hover:bg-white' }}">

                        <div class="flex items-center gap-3">

                            <svg viewBox="0 0 24 24"
                                 class="size-5 shrink-0 text-[#FF9018]"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8">
                                <rect x="3" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="3" width="7" height="7" rx="1"/>
                                <rect x="3" y="14" width="7" height="7" rx="1"/>
                                <path d="M14 14h3v3h-3zm4 4h3v3h-3zm0-4h3m-7 4v3"/>
                            </svg>

                            <span class="text-sm">کیوآر کد</span>

                        </div>

                        <svg viewBox="0 0 24 24"
                             class="size-4 text-slate-400
                                    transition-transform group-open:rotate-180"
                             fill="none" stroke="currentColor"
                             stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>

                    </summary>

                    <div class="mr-6 ml-2 mt-1 pr-4
                                border-r-2 border-slate-200
                                flex flex-col gap-1">

                        <a href="{{ route('generalQrCodes.create') }}"
                           class="px-4 py-3 rounded-lg text-sm transition
                           {{ Route::is('generalQrCodes.create')
                                ? 'bg-orange-50 text-[#FF9018] font-bold'
                                : 'text-slate-500 hover:bg-white' }}">
                            ایجاد کیوآر کد جدید
                        </a>

                        <a href="{{ route('generalQrCodes.list') }}"
                           class="px-4 py-3 rounded-lg text-sm transition
                           {{ Route::is('generalQrCodes.list')
                                ? 'bg-orange-50 text-[#FF9018] font-bold'
                                : 'text-slate-500 hover:bg-white' }}">
                            لیست کیوآر کدهای من
                        </a>

                    </div>

                </details>

            </nav>


            {{-- Account --}}
            <div class="mt-8 pt-6 border-t border-slate-200">

                <p class="text-[11px] font-bold text-slate-400
                          px-3 mb-3">
                    حساب کاربری
                </p>

                @if(Auth::check())

                    <div class="bg-white rounded-2xl p-2
                                border border-slate-100">

                        <a href="{{ route('user.profile') }}"
                           class="flex items-center gap-3 p-3 rounded-xl
                                  text-sm text-slate-600
                                  hover:bg-orange-50 hover:text-[#FF9018]
                                  transition">
                            <svg viewBox="0 0 24 24"
                                 class="size-5"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                            </svg>
                            پروفایل من
                        </a>

                        <a href="{{ route('user.setting') }}"
                           class="flex items-center gap-3 p-3 rounded-xl
                                  text-sm text-slate-600
                                  hover:bg-orange-50 hover:text-[#FF9018]
                                  transition">
                            <svg viewBox="0 0 24 24"
                                 class="size-5"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="m19.4 15 .1.1 1.4 1.1-1.5 2.6-1.8-.6a8 8 0 0 1-1.5.9l-.3 1.9h-3l-.3-1.9a8 8 0 0 1-1.5-.9l-1.8.6-1.5-2.6 1.5-1.2a8 8 0 0 1 0-1.8l-1.5-1.2 1.5-2.6 1.8.6a8 8 0 0 1 1.5-.9l.3-1.9h3l.3 1.9a8 8 0 0 1 1.5.9l1.8-.6 1.5 2.6-1.5 1.2a8 8 0 0 1 0 1.8z"/>
                            </svg>
                            تنظیمات حساب
                        </a>

                        <a href="{{ route('user.logout') }}"
                           class="flex items-center gap-3 p-3 rounded-xl
                                  text-sm text-rose-500
                                  hover:bg-rose-50 transition">
                            <svg viewBox="0 0 24 24"
                                 class="size-5"
                                 fill="none" stroke="currentColor"
                                 stroke-width="1.8">
                                <path d="M10 17l5-5-5-5m5 5H3"/>
                                <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
                            </svg>
                            خروج از حساب کاربری
                        </a>

                    </div>

                @endif

            </div>

        </div>


        {{-- Footer --}}
        <div class="px-5 py-4 bg-white border-t border-slate-100
                    flex items-center justify-between">

            <span class="text-[11px] text-slate-400">
                Powered by Rinso
            </span>

            <span class="text-xs font-bold text-[#142033]">
                rinso.ir
            </span>

        </div>

    </aside>
</div>

