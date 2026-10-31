@extends('client.document')
@section('title')
    رینگا | خدمات کامپیوتر
@endsection
@section('content')
    <div class="2xl:container mx-auto w-full py-5 px-3">
        <div class="w-full bg-white rounded-xl py-4">
            <div class="w-full flex flex-row items-center justify-between pb-3 px-4">
                <h2 class="text-sm font-bold text-(--primary-text-color)">کلینیک های کامپیوتر شهر</h2>
{{--                <a href="#" class="bg-gray-100 rounded-full flex flex-row items-center gap-2 px-2 py-0.5">--}}
{{--                    <span class="text-xs text-(--primary-text-color)">همه</span>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2" viewBox="0 0 320 512">--}}
{{--                        <path fill="var(--secondary-text-color)"--}}
{{--                              d="M47 239c-9.4 9.4-9.4 24.6 0 33.9L207 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L97.9 256 241 113c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L47 239z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}
            </div>

            <div class="flex flex-col gap-2 px-2 mt-3">
                @for($j=0; $j<5; $j++)
                <div class="border-1 border-gray-200 rounded-md flex flex-col gap-3 p-2">
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col gap-1.5">
                                <div class="flex flex-row gap-1 items-center mb-1.5">
                                    <span class="text-[10px] text-(--secondary-text-color)">تهران , ایران</span>
                                    <span class="p-1 bg-green-500 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-1.5" viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M441 103c9.4 9.4 9.4 24.6 0 33.9L177 401c-9.4 9.4-24.6 9.4-33.9 0L7 265c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l119 119L407 103c9.4-9.4 24.6-9.4 33.9 0z"/>
                                        </svg>
                                    </span>
                                </div>

                                <div class="flex flex-row items-center gap-0.5">
                                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">130</span>
                                    <span class="text-xs text(--primary-text-color)">تومان</span>
                                </div>
                                <div class="flex flex-row items-center gap-0.5">
                                    <span class="text-xs text(--primary-text-color)">از</span>
                                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">130,000</span>
                                    <span class="text-xs text(--primary-text-color)">تومان</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-1.5">
                                <div class="flex flex-col gap-2">
                                    <div class="w-full flex flex-row items-center justify-end gap-1">
                                        <span class="p-1 bg-blue-500 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-1.5" viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M441 103c9.4 9.4 9.4 24.6 0 33.9L177 401c-9.4 9.4-24.6 9.4-33.9 0L7 265c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l119 119L407 103c9.4-9.4 24.6-9.4 33.9 0z"/>
                                            </svg>
                                        </span>
                                        <span class="text-xs font-bold text-(--secondary-text-color)">علی رضایی</span>
                                    </div>

                                    <div class="flex flex-row items-center gap-1 justify-end">
                                        <div class="px-2 py-0.5 bg-gray-100 flex flex-row items-center gap-0.5 rounded-full">
                                            <span class="text-[10px] text-(--secondary-text-color) in-fa">587</span>
                                            <span class="text-[10px] text-(--secondary-text-color)">/</span>
                                            <span class="flex flex-row items-center gap-0.5">
                                                <span class="text-[10px] text-(--secondary-text-color) font-bold in-fa">216</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-2" viewBox="0 0 448 512">
                                                    <path fill="var(--secondary-text-color)" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="text-xs text-(--primary-text-color) font-bold in-fa">4.9</span>
                                        <div class="flex flex-row items-center">
                                            @for($i=0; $i < 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-2" viewBox="0 0 576 512">
                                                <path fill="#f7a229" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                            </svg>
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="w-full flex flex-row items-center gap-1">
                                        <span class="text-[10px] text-(--secondary-text-color) bg-gray-100 rounded-sm px-1.5 py-px font-bold">HP</span>
                                        <span class="text-[10px] text-(--secondary-text-color) bg-gray-100 rounded-sm px-1.5 py-px font-bold">مک بوک</span>
                                        <span class="text-[10px] text-(--secondary-text-color) bg-gray-100 rounded-sm px-1.5 py-px font-bold">PC</span>
                                        <span class="text-[10px] text-(--secondary-text-color) bg-gray-100 rounded-sm px-1.5 py-px font-bold">لپتاپ</span>
                                    </div>
                                </div>
                                <div class="relative">
                                    <img src="{{ asset('storage/computer/user.png') }}" class="size-14 rounded-full" alt="">
                                    <span class="inline-block size-2.5 absolute rounded-full bg-green-500 bottom-[5%] right-[4%] border-2 border-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-between">
                        <a href="#" class="px-4 py-2 rounded-xl bg-(--primary-color) text-white text-xs">مشاهده پروفایل</a>
                        <span class="flex flex-row items-center gap-2">
                            <span class="text-xs text-(--secondary-text-color)">ساعت پاسخگویی</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="var(--secondary-text-color)" d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                            </svg>
                        </span>
                    </div>
                </div>
               @endfor
            </div>

        </div>
    </div>
@endsection