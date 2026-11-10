
@extends('client.document')

@section('title', 'صفحه ارتباط با ما')

@section('content')
<div class="w-full pt-4 pb-8" dir="rtl">
    <div class="mx-auto w-full">

        <div class="overflow-hidden rounded-2xl border border-[#101827]/10 bg-[#101827] p-5 md:p-8">

            {{-- عنوان --}}
            <div class="mb-8 flex items-center justify-between border-b border-white/15 pb-5">
                <div>
                    <span class="text-sm font-semibold text-[#FB9413]">
                        پشتیبانی
                    </span>
                    <h1 class="mt-2 text-xl font-black text-white md:text-2xl">
                        جزئیات تیکت
                    </h1>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#FB9413]/15 text-[#FB9413]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M8 10h8M8 14h5m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>

            {{-- اطلاعات تیکت --}}
            <div class="flex flex-col gap-4">

                {{-- عنوان --}}
                <div class="grid grid-cols-1 gap-2 rounded-xl border border-white/10 bg-[#1B2639] p-4 md:grid-cols-2 md:items-center md:gap-4">
                    <div class="text-sm font-semibold text-[#FB9413]">
                        عنوان تیکت
                    </div>
                    <div class="break-words text-sm leading-7 text-white md:text-base">
                        {{ $contactUs->title }}
                    </div>
                </div>

                {{-- توضیحات --}}
                <div class="grid grid-cols-1 gap-2 rounded-xl border border-white/10 bg-[#1B2639] p-4 md:grid-cols-2 md:items-start md:gap-4">
                    <div class="text-sm font-semibold text-[#FB9413]">
                        توضیحات
                    </div>
                    <div class="break-words whitespace-pre-line text-sm leading-8 text-white md:text-base">
                        {{ $contactUs->description }}
                    </div>
                </div>

                {{-- شماره تماس --}}
                <div class="grid grid-cols-1 gap-2 rounded-xl border border-white/10 bg-[#1B2639] p-4 md:grid-cols-2 md:items-center md:gap-4">
                    <div class="text-sm font-semibold text-[#FB9413]">
                        شماره تماس
                    </div>
                    <div class="text-sm text-white md:text-base" dir="ltr">
                        {{ $contactUs->phoneNumber }}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
