@extends('admin.app.panel')

@section('title', 'ارتباط با ما')

@section('content')

    <div class="w-full pb-6" dir="rtl">

        {{-- عنوان صفحه --}}
        <div class="mb-6">
            <span class="text-sm font-semibold text-[#FB9413]">مدیریت پیام‌ها</span>
            <h1 class="mt-2 text-xl font-black text-[#101827] md:text-2xl">
                لیست ارتباط با ما
            </h1>
        </div>


        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-20 left-10 z-5 flex justify-center items-center transition-all duration-300 @if (!session('message')) invisible opacity-0 @endif">
            <span class="font-bold text-sm text-red-500">
                {{ session('message') }}
            </span>
        </div>

        <script>
            let modal = document.querySelector('.modal')
            if (!modal.classList.contains('invisible')) {
                setTimeout(() => {
                    modal.classList.add('invisible', 'opacity-0')
                }, 1500);
            }
        </script>


        <form action="{{ route('contactUs.deleteAll') }}" method="post">
            @csrf

            <div class="overflow-hidden rounded-2xl border border-[#101827]/10 bg-white shadow-sm">

                {{-- نوار ابزار --}}
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-4 py-5 md:px-6">

                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="all" onchange="checkAll()"
                            class="h-4 w-4 cursor-pointer accent-[#FB9413]">
                        <label for="all" class="cursor-pointer text-sm font-medium text-[#101827]">
                            انتخاب همه
                        </label>
                    </div>

                    <button type="submit" title="حذف موارد انتخاب شده"
                        class="flex items-center gap-2 rounded-lg bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                        </svg>
                        حذف انتخاب‌شده‌ها
                    </button>
                </div>

                {{-- جدول --}}

                {{-- جدول --}}
                <div class="overflow-x-auto">
                    <div class="min-w-[850px]">

                        {{-- سرستون‌ها --}}
                        <div
                            class="grid grid-cols-6 items-center bg-[#0B1B35] text-center text-xs font-bold text-white md:text-sm">

                            <div class="px-3 py-4">انتخاب</div>
                            <div class="px-3 py-4">ردیف</div>
                            <div class="px-3 py-4">نام و نام خانوادگی</div>
                            <div class="px-3 py-4">عنوان تیکت</div>
                            <div class="px-3 py-4">شماره تماس</div>
                            <div class="px-3 py-4">عملیات</div>

                        </div>

                        @php
                            $i = 1;
                        @endphp

                        @forelse ($allContactUs as $contactUs)
                            <div
                                class="grid grid-cols-6 items-center border-b border-stone-100 text-center transition hover:bg-[#FAFAF9]">

                                {{-- چک باکس --}}
                                <div class="px-3 py-4">
                                    <input type="checkbox" class="check size-4 cursor-pointer accent-[#F7941D]"
                                        name="allContactUs[]" value="{{ $contactUs->id }}">
                                </div>

                                {{-- ردیف --}}
                                <div class="px-3 py-4 text-sm text-stone-500">
                                    {{ $i }}
                                </div>

                                {{-- نام و نام خانوادگی --}}
                                <div class="px-3 py-4">
                                    @if ($contactUs->user)
                                        <div class="font-bold text-sm text-[#0B1B35] in-fa">
                                            {{ $contactUs->user->name }}
                                            {{ $contactUs->user->family }}
                                        </div>

                                        <span
                                            class="mt-1 inline-block rounded-full bg-[#F7941D]/10 px-2 py-1 text-[10px] font-semibold text-[#B96808]">
                                            کاربر عضو
                                        </span>
                                    @else
                                        <span class="text-xs text-stone-400">
                                            —
                                        </span>
                                    @endif
                                </div>

                                {{-- عنوان --}}
                                <div class="px-3 py-4">
                                    <a href="{{ route('contactUs.single', [$contactUs]) }}"
                                        class="block truncate text-sm font-semibold text-[#0B1B35] transition hover:text-[#D97706] in-fa">
                                        {{ $contactUs->title }}
                                    </a>
                                </div>

                                {{-- شماره تماس --}}
                                <div class="px-3 py-4">
                                    <a href="tel:{{ $contactUs->phoneNumber }}"
                                        class="text-sm font-semibold text-stone-600 transition hover:text-[#D97706] in-fa"
                                        dir="ltr">
                                        {{ $contactUs->phoneNumber }}
                                    </a>
                                </div>

                                {{-- عملیات --}}
                                <div class="flex items-center justify-center gap-2 px-3 py-4">

                                    {{-- مشاهده --}}
                                    <a href="{{ route('contactUs.single', [$contactUs]) }}" title="مشاهده"
                                        class="flex size-9 items-center justify-center rounded-xl bg-[#0B1B35] text-white transition hover:bg-[#1B3153]">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>

                                    {{-- حذف --}}
                                    <a href="{{ route('contactUs.delete', [$contactUs]) }}" title="حذف"
                                        class="flex size-9 items-center justify-center rounded-xl bg-red-50 text-red-500 transition hover:bg-red-500 hover:text-white">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6" />
                                        </svg>
                                    </a>

                                </div>

                            </div>

                            @php
                                $i++;
                            @endphp

                        @empty

                            <div class="px-4 py-16 text-center">
                                <div
                                    class="mx-auto mb-4 flex size-14 items-center justify-center rounded-2xl bg-[#F7941D]/10 text-[#D97706]">
                                    <svg class="size-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                            d="M8 10h8M8 14h5m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z" />
                                    </svg>
                                </div>

                                <p class="text-sm font-bold text-[#0B1B35]">
                                    هنوز پیامی ثبت نشده است.
                                </p>

                                <p class="mt-2 text-xs text-stone-400">
                                    پیام‌های جدید کاربران در این قسمت نمایش داده می‌شوند.
                                </p>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </form>

    </div>

    <script src="{{ asset('assets/js/checkAll.js') }}"></script>

@endsection
