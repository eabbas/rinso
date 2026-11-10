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

<body class="bg-[#F5F7FB]">

@php
    $ids = Auth::check()
        ? Auth::user()->role->pluck('id')->toArray()
        : [];

    $isAdmin = in_array(1, $ids);
    $canManageUsers = $isAdmin || in_array(4, $ids);
@endphp

<div class="min-h-screen">

    {{-- سایدبار دسکتاپ --}}
    <aside class="hidden lg:flex fixed right-0 top-0 z-50 w-[280px] h-dvh flex-col bg-[#101827] text-white">

        {{-- لوگو --}}
        <div class="px-5 pt-6 pb-5">
            <a href="{{ route('home') }}"
               target="_blank"
               class="flex items-center gap-3">

                <div class="size-11 rounded-2xl bg-[#FB9413] flex items-center justify-center shadow-lg shadow-[#FB9413]/20">
                    <span class="text-white text-2xl font-black">R</span>
                </div>

                <div class="flex flex-col">
                    <span class="text-xl font-black tracking-wide">RINSO</span>
                    <span class="text-[10px] text-slate-400 tracking-widest">PANEL MANAGEMENT</span>
                </div>
            </a>
        </div>

        <div class="mx-5 border-t border-white/10"></div>

        {{-- لینک صفحه اصلی --}}
        <div class="px-4 pt-5">
            <a href="{{ route('home') }}"
               target="_blank"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:text-white hover:bg-white/5 transition-all">

                <svg viewBox="0 0 24 24" class="size-5 shrink-0" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 10.5L12 3L21 10.5"/>
                    <path d="M5 9.5V20C5 20.55 5.45 21 6 21H18C18.55 21 19 20.55 19 20V9.5"/>
                    <path d="M9 21V14H15V21"/>
                </svg>

                <span class="text-sm font-medium">مشاهده وب‌سایت</span>

                <svg viewBox="0 0 24 24" class="size-3.5 mr-auto text-slate-500"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 5h5v5"/>
                    <path d="M19 5L10 14"/>
                    <path d="M19 13v5a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h5"/>
                </svg>
            </a>
        </div>

        {{-- منوی اصلی --}}
        <div class="flex-1 overflow-y-auto px-4 py-5 space-y-2"
             style="scrollbar-width:none;">

            <p class="px-4 mb-3 text-[10px] font-bold text-slate-500 tracking-widest">
                منوی اصلی
            </p>

            {{-- داشبورد --}}
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
               {{ Route::is('dashboard') ? 'bg-[#FB9413] text-white shadow-lg shadow-[#FB9413]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                     fill="none" stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="8" height="8" rx="2"/>
                    <rect x="13" y="3" width="8" height="5" rx="2"/>
                    <rect x="13" y="10" width="8" height="11" rx="2"/>
                    <rect x="3" y="13" width="8" height="8" rx="2"/>
                </svg>

                <span class="text-sm font-semibold">داشبورد</span>

                @if(Route::is('dashboard'))
                    <span class="size-1.5 rounded-full bg-white mr-auto"></span>
                @endif
            </a>

            <p class="px-4 pt-5 mb-3 text-[10px] font-bold text-slate-500 tracking-widest">
                مدیریت محتوا
            </p>

            {{-- دسته بندی صفحات --}}
            @if($isAdmin)
                <details class="group rounded-xl overflow-hidden"
                    @if(Route::is('pageCategory.*')) open @endif>

                    <summary class="flex items-center gap-3 px-4 py-3 rounded-xl cursor-pointer list-none transition-all
                        {{ Route::is('pageCategory.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                        <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="8" height="8" rx="2"/>
                            <rect x="13" y="3" width="8" height="5" rx="2"/>
                            <rect x="13" y="10" width="8" height="11" rx="2"/>
                            <rect x="3" y="13" width="8" height="8" rx="2"/>
                        </svg>

                        <span class="text-sm font-medium">دسته‌بندی صفحات</span>

                        <svg viewBox="0 0 24 24"
                             class="size-4 mr-auto transition-transform group-open:rotate-180"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </summary>

                    <div class="pr-5 pt-1 pb-2 space-y-1">
                        <a href="{{ route('pageCategory.create') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('pageCategory.create') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            ایجاد دسته جدید
                        </a>

                        <a href="{{ route('pageCategory.list') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('pageCategory.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            لیست دسته‌ها
                        </a>
                    </div>
                </details>
            @endif

            {{-- صفحات و شبکه های اجتماعی --}}
            <details class="group rounded-xl overflow-hidden"
                @if(Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) open @endif>

                <summary class="flex items-center gap-3 px-4 py-3 rounded-xl cursor-pointer list-none transition-all
                    {{ Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                    <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="3" width="16" height="18" rx="2"/>
                        <path d="M8 8h8M8 12h8M8 16h5"/>
                    </svg>

                    <span class="text-sm font-medium">صفحات</span>

                    <svg viewBox="0 0 24 24"
                         class="size-4 mr-auto transition-transform group-open:rotate-180"
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </summary>

                <div class="pr-5 pt-1 pb-2 space-y-1">

                    <a href="{{ route('pages.create') }}"
                       class="block px-4 py-2.5 rounded-lg text-xs transition-all
                       {{ Route::is('pages.create') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        ایجاد صفحه
                    </a>

                    <a href="{{ route('pages.social_list') }}"
                       class="block px-4 py-2.5 rounded-lg text-xs transition-all
                       {{ Route::is('pages.social_list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        لیست صفحه‌های من
                    </a>

                    @if($isAdmin)
                        <a href="{{ route('pages.list') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('pages.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            لیست همه صفحات
                        </a>

                        <div class="my-2 border-t border-white/5"></div>

                        <a href="{{ route('socialMedia.create') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('socialMedia.create') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            ایجاد شبکه اجتماعی
                        </a>

                        <a href="{{ route('socialMedia.list') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('socialMedia.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            لیست شبکه‌های اجتماعی
                        </a>
                    @endif

                </div>
            </details>

            {{-- کاربران --}}
            @if($canManageUsers)
                <details class="group rounded-xl overflow-hidden"
                    @if(Route::is('user.list') || Route::is('user.create_user') || Route::is('user.myUsers') || Route::is('user.requestList')) open @endif>

                    <summary class="flex items-center gap-3 px-4 py-3 rounded-xl cursor-pointer list-none transition-all
                        {{ Route::is('user.list') || Route::is('user.create_user') || Route::is('user.myUsers') || Route::is('user.requestList') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                        <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="10" cy="7" r="4"/>
                            <path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>

                        <span class="text-sm font-medium">کاربران</span>

                        <svg viewBox="0 0 24 24"
                             class="size-4 mr-auto transition-transform group-open:rotate-180"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </summary>

                    <div class="pr-5 pt-1 pb-2 space-y-1">

                        <a href="{{ route('user.myUsers') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('user.myUsers') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            مشتریان من
                        </a>

                        <a href="{{ route('user.list') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('user.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            همه کاربران
                        </a>

                        <a href="{{ route('user.create_user') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('user.create_user') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            ایجاد کاربر جدید
                        </a>

                        <a href="{{ route('user.requestList') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('user.requestList') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            لیست درخواست‌ها
                        </a>

                    </div>
                </details>
            @endif

            {{-- ارتباط با ما --}}
            @if($isAdmin)
                <details class="group rounded-xl overflow-hidden"
                    @if(Route::is('contactUs.*')) open @endif>

                    <summary class="flex items-center gap-3 px-4 py-3 rounded-xl cursor-pointer list-none transition-all
                        {{ Route::is('contactUs.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                        <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path d="m3 7 9 6 9-6"/>
                        </svg>

                        <span class="text-sm font-medium">ارتباط با ما</span>

                        <svg viewBox="0 0 24 24"
                             class="size-4 mr-auto transition-transform group-open:rotate-180"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </summary>

                    <div class="pr-5 pt-1 pb-2 space-y-1">
                        <a href="{{ route('contactUs.list') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('contactUs.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            لیست تیکت‌ها
                        </a>

                        <a href="{{ route('contactUs.create') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('contactUs.create') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            فرم ارتباط با ما
                        </a>
                    </div>
                </details>
            @endif

            {{-- درباره ما --}}
            <details class="group rounded-xl overflow-hidden"
                @if(Route::is('aboutUs.create_edit') || Route::is('aboutUs.list')) open @endif>

                <summary class="flex items-center gap-3 px-4 py-3 rounded-xl cursor-pointer list-none transition-all
                    {{ Route::is('aboutUs.create_edit') || Route::is('aboutUs.list') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                    <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                    </svg>

                    <span class="text-sm font-medium">درباره ما</span>

                    <svg viewBox="0 0 24 24"
                         class="size-4 mr-auto transition-transform group-open:rotate-180"
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </summary>

                <div class="pr-5 pt-1 pb-2 space-y-1">
                    @if($isAdmin)
                        <a href="{{ route('aboutUs.create_edit') }}"
                           class="block px-4 py-2.5 rounded-lg text-xs transition-all
                           {{ Route::is('aboutUs.create_edit') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            ایجاد درباره ما
                        </a>
                    @endif

                    <a href="{{ route('aboutUs.list') }}"
                       class="block px-4 py-2.5 rounded-lg text-xs transition-all
                       {{ Route::is('aboutUs.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        لیست درباره ما
                    </a>
                </div>
            </details>

            {{-- QR Code --}}
            <details class="group rounded-xl overflow-hidden"
                @if(Route::is('generalQrCodes.*')) open @endif>

                <summary class="flex items-center gap-3 px-4 py-3 rounded-xl cursor-pointer list-none transition-all
                    {{ Route::is('generalQrCodes.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">

                    <svg viewBox="0 0 24 24" class="size-5 shrink-0"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <path d="M14 14h3v3h-3zM20 14v3M14 20h3M20 20h1"/>
                    </svg>

                    <span class="text-sm font-medium">کیوآر کد</span>

                    <svg viewBox="0 0 24 24"
                         class="size-4 mr-auto transition-transform group-open:rotate-180"
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </summary>

                <div class="pr-5 pt-1 pb-2 space-y-1">
                    <a href="{{ route('generalQrCodes.create') }}"
                       class="block px-4 py-2.5 rounded-lg text-xs transition-all
                       {{ Route::is('generalQrCodes.create') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        ایجاد کیوآر کد جدید
                    </a>

                    <a href="{{ route('generalQrCodes.list') }}"
                       class="block px-4 py-2.5 rounded-lg text-xs transition-all
                       {{ Route::is('generalQrCodes.list') ? 'text-[#FB9413] bg-[#FB9413]/10' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        لیست کیوآر کدهای من
                    </a>
                </div>
            </details>

        </div>

        {{-- پایین سایدبار --}}
        <div class="p-4 border-t border-white/10">
            <div class="rounded-xl bg-white/5 p-3 flex items-center gap-3">
                <div class="size-9 rounded-xl bg-blue-500/20 text-[#FB9413] flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="size-5"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v2M12 19v2M3 12h2M19 12h2"/>
                        <circle cx="12" cy="12" r="7"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>

                <div>
                    <p class="text-xs font-bold text-white">پنل مدیریت رینسو</p>
                    <p class="text-[10px] text-slate-500 mt-1">مدیریت هوشمند صفحات</p>
                </div>
            </div>
        </div>

    </aside>


    {{-- محتوای اصلی --}}
    <div class="w-full lg:mr-[280px] lg:w-[calc(100%-280px)]">

        {{-- هدر فعلی؛ بدون تغییر --}}
        <header class="w-full fixed top-0 right-0 z-40">
            @include('admin.app.header')
        </header>

        {{-- بدنه --}}
        <main class="w-full min-h-dvh pt-20 pb-24 px-3 lg:px-6 bg-[#F5F7FB]">

            @yield('content')

            @include('footer')

        </main>

    </div>

</div>

<script src="{{ asset('assets/js/adminMenu.js') }}"></script>

</body>
</html>