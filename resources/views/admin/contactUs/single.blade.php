
@extends('admin.app.panel')

@section('title', 'جزئیات پیام')

@section('content')

<div class="w-full py-6" dir="rtl">
    <div class="mx-auto w-full max-w-5xl">

        {{-- سربرگ --}}
        <div class="mb-7 flex items-center justify-between">
            <div>
                <span class="text-sm font-bold text-[#F7941D]">
                    مدیریت پیام‌ها
                </span>

                <h1 class="mt-2 text-2xl font-black text-[#0B1B35]">
                    جزئیات پیام
                </h1>

                <p class="mt-2 text-sm text-stone-500">
                    اطلاعات ارسال‌کننده و جزئیات درخواست پشتیبانی
                </p>
            </div>

            <div class="hidden size-14 items-center justify-center rounded-2xl bg-[#0B1B35] text-[#F7941D] sm:flex">
                <svg class="size-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M8 10h8M8 14h5m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>


        {{-- اطلاعات کاربر --}}
        @if($contactUs->user)

            <div class="mb-6 overflow-hidden rounded-3xl border border-stone-200 bg-white shadow-sm">

                {{-- هدر پروفایل --}}
                <div class="relative overflow-hidden bg-[#0B1B35] px-5 py-6 md:px-7">

                    <div class="absolute -left-12 -top-20 size-56 rounded-full border border-white/5"></div>
                    <div class="absolute -left-5 -top-12 size-40 rounded-full border border-white/5"></div>

                    <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center">

                        {{-- تصویر کاربر --}}
                        <div class="size-20 shrink-0 overflow-hidden rounded-2xl border-2 border-[#F7941D]/60 bg-white/10 p-1">
                            <img
                                src="{{ $contactUs->user->main_image ? asset('storage/' . $contactUs->user->main_image) : asset('assets/img/user.png') }}"
                                alt="تصویر کاربر"
                                class="size-full rounded-xl object-cover"
                            >
                        </div>

                        <div class="min-w-0">
                            <span class="text-xs font-medium text-white/50">
                                اطلاعات حساب کاربری
                            </span>

                            <h2 class="mt-2 break-words text-xl font-black text-white in-fa">
                                {{ $contactUs->user->name }}
                                {{ $contactUs->user->family }}
                            </h2>

                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#F7941D]/15 px-3 py-1.5 text-xs font-bold text-[#F7941D]">
                                <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                کاربر ثبت‌نام‌شده رینسو
                            </div>
                        </div>

                    </div>
                </div>

                {{-- جزئیات کاربر --}}
                <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 md:p-7">

                    {{-- نام --}}
                    <div class="rounded-2xl border border-stone-100 bg-[#FAFAF9] p-4">
                        <div class="mb-2 flex items-center gap-2 text-stone-400">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>
                            <span class="text-xs">نام و نام خانوادگی</span>
                        </div>

                        <p class="text-sm font-bold text-[#0B1B35] in-fa">
                            {{ $contactUs->user->name }}
                            {{ $contactUs->user->family }}
                        </p>
                    </div>

                    {{-- موبایل کاربر --}}
                    <div class="rounded-2xl border border-stone-100 bg-[#FAFAF9] p-4">
                        <div class="mb-2 flex items-center gap-2 text-stone-400">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1.5a15 15 0 006.5 6.5L16 14l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                            </svg>
                            <span class="text-xs">شماره موبایل حساب</span>
                        </div>

                        <p class="text-sm font-bold text-[#0B1B35] in-fa" dir="ltr">
                            {{ $contactUs->user->phoneNumber ?? 'ثبت نشده' }}
                        </p>
                    </div>

                    {{-- شناسه کاربر --}}
                    <div class="rounded-2xl border border-stone-100 bg-[#FAFAF9] p-4">
                        <div class="mb-2 flex items-center gap-2 text-stone-400">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M8 7h8m-8 5h8m-8 5h5M5 3h14a2 2 0 012 2v14H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                            </svg>
                            <span class="text-xs">شناسه کاربر</span>
                        </div>

                        <p class="text-sm font-bold text-[#0B1B35] in-fa">
                            #{{ $contactUs->user->id }}
                        </p>
                    </div>

                    {{-- تاریخ عضویت --}}
                    <div class="rounded-2xl border border-stone-100 bg-[#FAFAF9] p-4">
                        <div class="mb-2 flex items-center gap-2 text-stone-400">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M8 2v4m8-4v4M3 10h18M5 4h14a2 2 0 012 2v14H3V6a2 2 0 012-2z"/>
                            </svg>
                            <span class="text-xs">تاریخ عضویت</span>
                        </div>

                        <p class="text-sm font-bold text-[#0B1B35] in-fa">
                            {{ $contactUs->user->created_at?->format('Y/m/d') ?? 'نامشخص' }}
                        </p>
                    </div>

                </div>
            </div>

        @endif


        {{-- اطلاعات تیکت --}}
        <div class="overflow-hidden rounded-3xl border border-stone-200 bg-white shadow-sm">

            {{-- هدر تیکت --}}
            <div class="bg-[#0B1B35] px-5 py-6 md:px-7">
                <div class="flex items-center gap-3">
                    <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#F7941D]/15 text-[#F7941D]">
                        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M8 10h8M8 14h5m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z"/>
                        </svg>
                    </div>

                    <div>
                        <span class="text-xs text-white/50">
                            پیام ارسالی
                        </span>

                        <h2 class="mt-1 text-lg font-black text-white">
                            {{ $contactUs->title }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="space-y-7 p-5 md:p-7">

                {{-- توضیحات --}}
                <section>
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-xl bg-[#F7941D]/10 text-[#D97706]">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M8 10h8M8 14h8M8 18h5M5 3h14a2 2 0 012 2v14H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                            </svg>
                        </div>

                        <h3 class="text-sm font-black text-[#0B1B35]">
                            متن پیام
                        </h3>
                    </div>

                    <div class="rounded-2xl border border-stone-200 bg-[#FAFAF9] p-5 md:p-6">
                        <p class="whitespace-pre-line break-words text-sm leading-9 text-stone-700">
                            {{ $contactUs->description }}
                        </p>
                    </div>
                </section>

                {{-- شماره تماس ثبت‌شده در تیکت --}}
                <section>
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-xl bg-[#F7941D]/10 text-[#D97706]">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1.5a15 15 0 006.5 6.5L16 14l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                            </svg>
                        </div>

                        <h3 class="text-sm font-black text-[#0B1B35]">
                            شماره تماس پیام
                        </h3>
                    </div>

                    <div class="flex flex-col gap-4 rounded-2xl border border-stone-200 p-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <span class="text-xs text-stone-400">
                                شماره ثبت‌شده هنگام ارسال پیام
                            </span>

                            <p class="mt-2 text-base font-black tracking-wider text-[#0B1B35] in-fa" dir="ltr">
                                {{ $contactUs->phoneNumber }}
                            </p>
                        </div>

                        <a href="tel:{{ $contactUs->phoneNumber }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#0B1B35] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#1B3153]">

                            <svg class="size-4 text-[#F7941D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1.5a15 15 0 006.5 6.5L16 14l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                            </svg>

                            تماس با فرستنده
                        </a>

                    </div>
                </section>

            </div>

            {{-- فوتر --}}
            <div class="border-t border-stone-100 bg-[#FAFAF9] px-5 py-5 md:px-7">
                <div class="flex items-center gap-2 text-xs text-stone-500">
                    <span class="size-2 rounded-full bg-[#F7941D]"></span>
                    پنل مدیریت رینسو
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
