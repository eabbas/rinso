<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="{{ asset('assets/js/tailwinds.js') }}">--}}
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Document</title>
</head>
<body>



<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 w-full p-5 lg:p-8 ">
    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#F3E8FF] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">رشته‌های تحصیلی</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت رشته‌ها </span>
                </div>
                <div class=" w-4/8  justify-end mt-4 lg:justify-between lg:mt-2 flex flex-row items-start  gap-3 sm:gap-2 shrink-0">
                        <span class="bg-[#F3E8FF] px-2 py-1 rounded-xl text-[#9333EA] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            8 رشته
                        </span>
                    <div class="bg-[#F3E8FF] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="#9333EA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sm:w-5 sm:h-5"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>

                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#D8B4FE] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#9333EA" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#9333EA] text-xs sm:text-sm lg:font-bold truncate">افزودن رشته</span>
                </div>

            </div>
        </div>

        <div class="w-17 h-19 mt-4 bg-[#F3E8FF] rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#9333EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-9 h-9">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
        </div>

    </div>


    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#FFEDD5] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">دوره های آموزشی</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت دوره ها </span>
                </div>
                <div class=" w-4/8  justify-end mt-4 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                            <span class="bg-[#FFEDD5] px-2 sm:px-3 md:px-4 py-1  rounded-xl text-[#EA580C] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                                15 دوره
                            </span>
                    <div class="bg-[#FFEDD5] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#EA580C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>


                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#FDBA74] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#EA580C" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#EA580C] text-xs sm:text-sm lg:font-bold truncate">افزودن دوره</span>
                </div>

            </div>
        </div>

        <div class="w-17 h-19 mt-4 bg-[#FFEDD5] p-2 sm: rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#EA580C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
        </div>

    </div>

    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#CFFAFE] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">درس های آموزشی</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت دروس </span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                            <span class="bg-[#CFFAFE] px-2  py-1 rounded-xl text-[#0891B2] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                                24 درس
                            </span>
                    <div class="bg-[#CFFAFE] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0891B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                                <span class="shrink-0">
                                    <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                        <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#A5F3FC] flex-1 min-w-0">
                                <span class="shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#0891B2" stroke-width="4.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </span>
                    <span class="text-[#0891B2] text-xs sm:text-sm lg:font-bold truncate">افزودن درس</span>
                </div>

            </div>
        </div>

        <div class="w-17 h-19 mt-2 sm:w-20 sm:h-28 md:w-20 h-20 bg-[#CFFAFE] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#0891B2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
        </div>
    </div>
    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#DCFCE7] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">

            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">کلاس ها</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت کلاس ها </span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                        <span class="bg-[#DCFCE7] px-2 py-1 rounded-xl text-[#16A34A] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            24 کلاس
                        </span>
                    <div class="bg-[#DCFCE7] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">

                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#86EFAC] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#16A34A" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#16A34A] text-xs sm:text-sm lg:font-bold truncate">افزودن کلاس</span>
                </div>

            </div>
        </div>
        <div class="w-17 h-19 mt-2 bg-[#DCFCE7] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
        </div>
    </div>


    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#FCE7F3] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">جلسات </h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت جلسات </span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                        <span class="bg-[#FCE7F3] px-2 py-1 rounded-xl text-[#E11D48] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            12 جلسه
                        </span>
                    <div class="bg-[#FCE7F3] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="#E11D48" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6" />
                        </svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                            <span class="shrink-0">
                                <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                    <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                </svg>
                            </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#FDA4AF] flex-1 min-w-0">
                            <span class="shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#E11D48" stroke-width="4.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </span>
                    <span class="text-[#E11D48] text-xs sm:text-sm lg:font-bold truncate">افزودن جلسه</span>
                </div>

            </div>
        </div>
        <div class="w-17 h-19 mt-2  bg-[#FCE7F3] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="#E11D48" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6" />
            </svg>
        </div>
    </div>



    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#FFEDD5] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">دانشجویان</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت اطلاعات </span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                        <span class="bg-[#FFEDD5] px-2 py-1 rounded-xl text-[#EA580C] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            560 نفر
                        </span>
                    <div class="bg-[#FFEDD5] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="#EA580C" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#FDBA74] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#EA580C" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#EA580C] text-xs sm:text-sm lg:font-bold truncate">افزودن دانشجو</span>
                </div>

            </div>
        </div>
        <div class="w-17 h-19 mt-2 bg-[#FFEDD5] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="#EA580C" stroke-width="1.7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>

    </div>


    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#DBEAFE] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">اساتید</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت  اساتید</span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                        <span class="bg-[#DBEAFE] px-2 py-1 rounded-xl text-[#1D4ED8] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            32 نفر
                        </span>
                    <div class="bg-[#DBEAFE] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#1D4ED8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#93C5FD] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#1D4ED8" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#1D4ED8] text-xs sm:text-sm lg:font-bold truncate">افزودن استاد</span>
                </div>

            </div>
        </div>
        <div class="w-17 h-19 mt-2 bg-[#DBEAFE] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#1D4ED8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </div>

    </div>


    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#FEE2E2] shadow rounded-xl h-auto overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">شعب</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت شعب </span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-start gap-1 sm:gap-2 shrink-0">
                        <span class="bg-[#FEE2E2] px-2 py-1 rounded-xl text-[#DC2626] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            3 شعبه
                        </span>
                    <div class="bg-[#FEE2E2] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-red-500" fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-bold truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#FDA4AF] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#DC2626] text-xs sm:text-sm lg:font-bold truncate">افزودن شعبه</span>
                </div>

            </div>
        </div>
        <div class="w-17 h-19 mt-2 sm:w-20 sm:h-28 md:w-20 h-20 bg-[#FEE2E2] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-red-500" fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>

    </div>

    <div class="w-full flex gap-3 p-3 sm:gap-6 sm:p-5 border-1 border-[#F1F5F9] shadow rounded-xl overflow-hidden">
        <div class="w-full sm:w-10/12 lg:w-full flex flex-col gap-4 sm:gap-8">
            <div class="flex flex-row justify-between items-start gap-2 sm:gap-4">
                <div class="flex flex-col gap-4 sm:gap-5 min-w-0">
                    <h2 class="font-bold text-sm sm:text-xl md:text-2xl truncate">درخواست ها</h2>
                    <span class="text-[#64748B] font-normal text-xs sm:text-sm md:text-base truncate">مدیریت درخواست ها </span>
                </div>
                <div class=" w-4/8  justify-end mt-2 lg:justify-between flex flex-row items-center gap-1 sm:gap-2 shrink-0">
                        <span class="bg-[#F1F5F9] mb-6 px-2 sm:px-3 md:px-4 py-1 rounded-xl text-[#475569] font-bold text-xs sm:text-sm md:text-base whitespace-nowrap">
                            18 مورد
                        </span>
                    <div class="bg-[#F1F5F9] p-2 sm:p-3 md:p-5 rounded-xl items-center justify-center hidden lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                        </svg>
                    </div>
                </div>

            </div>
            <div class="flex gap-2 flex-nowrap">
                <div class="flex gap-1 sm:gap-4 lg:gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-gray-400 flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg class="h-3 w-3 sm:h-4 sm:w-4" fill="#64748B" viewBox="0 0 576 512">
                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                            </svg>
                        </span>
                    <span class="text-[#64748B] text-xs sm:text-sm lg:font-medium truncate">مشاهده لیست</span>
                </div>
                <div class="flex gap-1 sm:gap-4 lg:gap-2 justify-center items-center px-2 sm:px-4 h-8 sm:h-9 border-1 rounded-xl border-[#CBD5E1] flex-1 min-w-0">
                        <span class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="#475569" stroke-width="4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    <span class="text-[#475569] text-xs sm:text-sm lg:font-medium truncate">ثبت درخواست</span>
                </div>

            </div>
        </div>
        <div class="w-15 h-20 mt-2 sm:w-20 sm:h-28 md:w-20 h-20 bg-[#F1F5F9] p-2 sm:p-3 rounded-xl flex items-center justify-center lg:hidden shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
            </svg>
        </div>

    </div>
</div>

{{--<img src="{{ asset('storage/najafi/images(1).jpeg') }}" alt="">--}}

</body>
</html>