
@extends('client.document')

@section('title', 'جزئیات تیکت')

@section('content')
<div class="w-full py-8" dir="rtl">
    <div class="mx-auto w-full max-w-5xl px-4">

        {{-- سربرگ --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <div class="mb-3 flex items-center gap-2 text-sm font-bold text-[#F7941D]">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#F7941D]"></span>
                    مرکز پشتیبانی رینسو
                </div>

                <h1 class="text-2xl font-black text-[#0B1B35] md:text-3xl">
                    جزئیات تیکت
                </h1>

                <p class="mt-2 text-sm leading-7 text-stone-500">
                    مشاهده و بررسی اطلاعات درخواست پشتیبانی شما
                </p>
            </div>

            <div class="hidden size-16 items-center justify-center rounded-2xl bg-[#0B1B35] text-[#F7941D] shadow-lg shadow-[#0B1B35]/10 sm:flex">
                <svg class="size-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                          d="M8 10h8M8 14h5m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>

        {{-- کارت اصلی --}}
        <div class="overflow-hidden rounded-3xl border border-stone-200 bg-white shadow-sm">

            {{-- هدر کارت --}}
            <div class="relative overflow-hidden bg-[#0B1B35] px-5 py-7 md:px-8">

                <div class="absolute -left-12 -top-20 size-64 rounded-full border border-white/5"></div>
                <div class="absolute -left-5 -top-12 size-48 rounded-full border border-white/5"></div>

                <div class="relative flex items-center gap-4">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-[#F7941D]/15 text-[#F7941D]">
                        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M7 8h10M7 12h10M7 16h6m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z"/>
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <span class="text-xs font-medium text-white/50">
                            موضوع تیکت
                        </span>

                        <h2 class="mt-2 break-words text-lg font-bold leading-8 text-white md:text-xl in-fa">
                            {{ $contactUs->title }}
                        </h2>
                    </div>
                </div>

                <div class="relative mt-6 flex items-center gap-2">
                    <span class="h-1 w-10 rounded-full bg-[#F7941D]"></span>
                    <span class="h-1 w-2 rounded-full bg-white/30"></span>
                    <span class="h-1 w-2 rounded-full bg-white/30"></span>
                </div>
            </div>

            {{-- محتوای کارت --}}
            <div class="space-y-8 p-5 md:p-8">

                {{-- توضیحات --}}
                <section>
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-xl bg-[#F7941D]/10 text-[#D97706]">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M8 10h8M8 14h8M8 18h5M5 3h14a2 2 0 012 2v14H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-sm font-black text-[#0B1B35]">
                                توضیحات درخواست
                            </h3>
                            <p class="mt-1 text-xs text-stone-400">
                                متن ارسال‌شده توسط شما
                            </p>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-stone-200 bg-[#FAFAF9] p-5 md:p-6">
                        <p class="break-words text-sm leading-9 text-stone-700 md:text-base in-fa">
                            {{ $contactUs->description }}
                        </p>
                    </div>
                </section>

                {{-- اطلاعات تماس --}}
                <section>
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-xl bg-[#0B1B35]/5 text-[#0B1B35]">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1.5a15 15 0 006.5 6.5L16 14l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-sm font-black text-[#0B1B35]">
                                راه ارتباطی
                            </h3>
                            <p class="mt-1 text-xs text-stone-400">
                                شماره تماس ثبت‌شده برای این درخواست
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 rounded-2xl border border-stone-200 p-5 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-3">
                            <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#F7941D]/10 text-[#D97706]">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M3 5a2 2 0 012-2h3l2 5-2 1.5a15 15 0 006.5 6.5L16 14l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                                </svg>
                            </div>

                            <div>
                                <span class="block text-xs text-stone-400">
                                    شماره تلفن
                                </span>

                                <span class="mt-1.5 block text-sm font-bold tracking-wider text-[#0B1B35] in-fa" dir="ltr">
                                    {{ $contactUs->phoneNumber }}
                                </span>
                            </div>
                        </div>

                        <a href="tel:{{ $contactUs->phoneNumber }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#0B1B35] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#152B4B]">
                            <svg class="size-4 text-[#F7941D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1.5a15 15 0 006.5 6.5L16 14l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                            </svg>
                            تماس با شماره
                        </a>

                    </div>
                </section>

            </div>

            {{-- فوتر --}}
            <div class="border-t border-stone-100 bg-[#FAFAF9] px-5 py-5 md:px-8">
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-full bg-[#F7941D]/15 text-[#D97706]">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 8v4m0 4h.01M10.3 3.8L2.6 17.2A2 2 0 004.3 20h15.4a2 2 0 001.7-2.8L13.7 3.8a2 2 0 00-3.4 0z"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm font-bold text-[#0B1B35]">
                            همراه شما هستیم!
                        </p>
                        <p class="mt-1 text-xs leading-7 text-stone-500">
                            تیم پشتیبانی رینسو برای پاسخ‌گویی و پیگیری درخواست شما در کنار شماست.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
