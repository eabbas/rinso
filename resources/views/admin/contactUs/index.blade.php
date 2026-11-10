
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
        class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-20 left-10 z-5 flex justify-center items-center transition-all duration-300 @if(!session('message')) invisible opacity-0 @endif">
        <span class="font-bold text-sm text-red-500">
            {{ session('message') }} 
        </span>
    </div>

    <script>
        let modal = document.querySelector('.modal')
        if(!modal.classList.contains('invisible')){
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
                    <input
                        type="checkbox"
                        id="all"
                        onchange="checkAll()"
                        class="h-4 w-4 cursor-pointer accent-[#FB9413]"
                    >
                    <label for="all" class="cursor-pointer text-sm font-medium text-[#101827]">
                        انتخاب همه
                    </label>
                </div>

                <button
                    type="submit"
                    title="حذف موارد انتخاب شده"
                    class="flex items-center gap-2 rounded-lg bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                    </svg>
                    حذف انتخاب‌شده‌ها
                </button>
            </div>

            {{-- جدول --}}
            <div class="overflow-x-auto">
                <div class="min-w-[650px]">

                    {{-- سرستون‌ها --}}
                    <div class="grid grid-cols-5 items-center bg-[#101827] text-center text-xs font-bold text-white md:text-sm">

                        <div class="px-3 py-4">انتخاب</div>
                        <div class="px-3 py-4">ردیف</div>
                        <div class="px-3 py-4">عنوان</div>
                        <div class="px-3 py-4">شماره تماس</div>
                        <div class="px-3 py-4">عملیات</div>

                    </div>

                    {{-- محتوای جدول --}}
                    @php
                        $i = 1;
                    @endphp

                    @forelse ($allContactUs as $contactUs)

                        <div class="grid grid-cols-5 items-center border-b border-gray-100 text-center transition hover:bg-[#F7F8FA]">

                            {{-- چک باکس --}}
                            <div class="px-3 py-4">
                                <input
                                    type="checkbox"
                                    class="check h-4 w-4 cursor-pointer accent-[#FB9413]"
                                    name="allContactUs[]"
                                    value="{{ $contactUs->id }}"
                                >
                            </div>

                            {{-- ردیف --}}
                            <div class="px-3 py-4 text-sm text-gray-500">
                                {{ $i }}
                            </div>

                            {{-- عنوان --}}
                            <div class="px-3 py-4">
                                <a
                                    href="{{ route('contactUs.single', [$contactUs]) }}"
                                    class="block truncate text-sm font-semibold text-[#101827] transition hover:text-[#FB9413]"
                                >
                                    {{ $contactUs->title }}
                                </a>
                            </div>

                            {{-- شماره تماس --}}
                            <div class="px-3 py-4 text-sm text-gray-600" dir="ltr">
                                {{ $contactUs->phoneNumber }}
                            </div>

                            {{-- عملیات --}}
                            <div class="flex items-center justify-center gap-2 px-3 py-4">

                                {{-- مشاهده --}}
                                <a
                                    href="{{ route('contactUs.single', [$contactUs]) }}"
                                    title="مشاهده"
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#101827] text-white transition hover:bg-[#26364F]"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 576 512">
                                        <path fill="currentColor" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 0 1 0-256z"/>
                                    </svg>
                                </a>

                                {{-- حذف --}}
                                <a
                                    href="{{ route('contactUs.delete', [$contactUs]) }}"
                                    title="حذف"
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-500 transition hover:bg-red-500 hover:text-white"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </a>

                            </div>
                        </div>

                        @php
                            $i++;
                        @endphp

                    @empty

                        <div class="px-4 py-12 text-center">
                            <p class="text-sm font-medium text-gray-500">
                                هنوز پیامی ثبت نشده است.
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
