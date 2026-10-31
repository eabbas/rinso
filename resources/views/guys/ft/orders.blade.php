@include('header')

<div class="2xl:container w-full px-5 mx-auto pt-20 flex flex-col gap-3 bg-(#f6f7fc) pb-5">
    <div class="w-full flex flex-row items-center justify-between">
        <div class="flex flex-col gap-1.5">
            <h2 class="text-md font-bold text-(--primary-text-color)">لیست سفارشات</h2>
            <span class="text-xs text-(--secondary-text-color)">مدیریت و مشاهده سفارشات کافه آبان</span>
        </div>
        <button class="flex flex-row items-center justify-center gap-2 px-3 py-1.5 rounded-md border-1 border-gray-200 bg-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-(--primary-text-color)" viewBox="0 0 512 512">
                <path d="M0 73.7C0 50.7 18.7 32 41.7 32H470.3c23 0 41.7 18.7 41.7 41.7c0 9.6-3.3 18.9-9.4 26.3L336 304.5V447.7c0 17.8-14.5 32.3-32.3 32.3c-7.3 0-14.4-2.5-20.1-7l-92.5-73.4c-9.6-7.6-15.1-19.1-15.1-31.3V304.5L9.4 100C3.3 92.6 0 83.3 0 73.7zM55 80L218.6 280.8c3.5 4.3 5.4 9.6 5.4 15.2v68.4l64 50.8V296c0-5.5 1.9-10.9 5.4-15.2L457 80H55z"/>
            </svg>
            <span class="text-xs font-bold text-(--primary-text-color)">فیلتر</span>
        </button>
    </div>


    <div class="w-full p-3 bg-white rounded-md flex flex-col shadow-[0px_0px_2px_1px_#e7e7ef]">
        <div class="w-full flex flex-row items-center justify-between pb-3 border-b border-[#e4e5ea]">
            <div class="flex flex-row items-center gap-2">
                <div class="size-8 bg-[#f4f4f6] rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-6"
                         viewBox="0 0 48 48"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <!-- Table -->
                        <path d="M19 10H29" />
                        <path d="M19 10V16" />
                        <path d="M29 10V16" />
                        <!-- Left chair -->
                        <path d="M10 10V36" />
                        <path d="M10 24H20" />
                        <path d="M20 24V36" />
                        <!-- Right chair -->
                        <path d="M38 10V36" />
                        <path d="M28 24H38" />
                        <path d="M28 24V36" />
                    </svg>
                </div>
                <span class="font-bold text-xs text-(--primary-text-color) in-fa">میز4</span>
                <span class="text-[10px] text-(--primary-color) px-2 py-0.5 bg-(--primary-color)/10 rounded-full border-1 border-(--primary-color)">در انتظار</span>
{{--                <span class="w-10 h-5 bg-green-500 rounded-full flex justify-center items-center text-sm text-white">تا,ید</span>--}}

            </div>
            <div class="flex flex-col gap-1.5 items-end">
                <span class="text-[10px] text-(--secondary-text-color)">شماره سفارش</span>
                <span class="text-xs font-bold text-(--primary-text-color)">#10045</span>
            </div>
        </div>
        <div class="pt-3 w-full flex flex-col gap-3.5">
                <div class="w-full flex flex-row items-center">
                    <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                        <div class="flex flex-row items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-5"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="var(--secondary-text-color)"
                                 stroke-width="1.7"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <!-- Bag body -->
                                <path d="M6 8H18L19 20H5L6 8Z"/>
                                <!-- Handle -->
                                <path d="M8.5 8V6.8
                                 C8.5 4.7 10 3.5 12 3.5
                                 C14 3.5 15.5 4.7 15.5 6.8V8"/>
                            </svg>
                            <span class="text-[10px] text-(--secondary-text-color)">تعداد آیتم</span>
                        </div>
                        <span class="text-xs font-bold text-(--primary-text-color) in-fa">5 غذا</span>
                    </div>
                    <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                        <div class="flex flex-row items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-5"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="var(--secondary-text-color)"
                                 stroke-width="1.6"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="
                                    M12 20.5
                                    C12 20.5 7 15.5 7 10.2
                                    A5 5 0 1 1 17 10.2
                                    C17 15.5 12 20.5 12 20.5
                                    Z"/>
                                <circle cx="12" cy="9.8" r="1.9"/>
                            </svg>
                            <span class="text-[10px] text-(--secondary-text-color)">آدرس</span>
                        </div>
                        <span class="text-xs font-bold text-(--primary-text-color) in-fa">-</span>
                    </div>
                    <div class="w-1/3 flex flex-col items-center justify-center gap-1.5">
                        <div class="flex flex-row items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-5"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="var(--secondary-text-color)"
                                 stroke-width="1.6"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="12" cy="12" r="6.8"/>
                                <path d="M12 8.5V12"/>
                                <path d="M12 12L14.8 13.8"/>
                            </svg>
                            <span class="text-[10px] text-(--secondary-text-color)">زمان ثبت</span>
                        </div>
                        <span class="text-xs font-bold text-(--primary-text-color) in-fa">14:35</span>
                    </div>
                </div>
            <div class="flex flex-col gap-1">

                <div class="w-full flex flex-row items-center gap-2">
                    <button class="block w-1/2 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--primary-color) bg-(--primary-color) text-white text-xs cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 576 512">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>
                        مشاهده آیتم ها
                    </button>
                    <button class="block w-[25%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-[#e4e5ea] text-(--secondary-text-color) text-xs cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.4"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <rect x="8.2" y="4" width="7.6" height="3.8" rx="0.4"/>
                            <rect x="4.8" y="8" width="14.4" height="6.8" rx="0.8"/>
                            <rect x="8.2" y="13.2" width="7.6" height="6.8" rx="0.4"/>
                            <circle cx="17" cy="11.2" r="0.5" fill="currentColor" stroke="none"/>
                        </svg>
                        چاپ فیش
                    </button>
                    <button class="block w-[20%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-rose-500 text-rose-500 text-xs cursor-pointer">
                        حذف
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-rose-500" viewBox="0 0 448 512">
                            <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </button>
                </div>
                <div class="w-full flex justify-end">
                    <div class="w-full flex items-center justify-center gap-0.5 bg-(--color-green) px-1 py-1 rounded-lg">
                        <span class="text-white text-sm font-bold">تایید</span>
                        <svg  class="size-6 rounded-lg" viewBox="0 0 36 36" fill="white"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full p-3 bg-white rounded-md flex flex-col shadow-[0px_0px_2px_1px_#e7e7ef]">
        <div class="w-full flex flex-row items-center justify-between pb-3 border-b border-[#e4e5ea]">
            <div class="flex flex-row items-center gap-2">
                <div class="size-8 bg-[#f4f4f6] rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-6"
                         viewBox="0 0 48 48"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <!-- Table -->
                        <path d="M19 10H29" />
                        <path d="M19 10V16" />
                        <path d="M29 10V16" />
                        <!-- Left chair -->
                        <path d="M10 10V36" />
                        <path d="M10 24H20" />
                        <path d="M20 24V36" />
                        <!-- Right chair -->
                        <path d="M38 10V36" />
                        <path d="M28 24H38" />
                        <path d="M28 24V36" />
                    </svg>
                </div>
                <span class="font-bold text-xs text-(--primary-text-color) in-fa">میز2</span>
                <span class="text-[10px] text-(--color-green) px-2 py-0.5 bg-(--color-green)/10 rounded-full border-1 border-(--color-green)">در حال آماده سازی</span>
{{--                <svg  class="size-7 bg-green-400 rounded-lg" viewBox="0 0 36 36" fill="white"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>--}}

            </div>
            <div class="flex flex-col gap-1.5 items-end">
                <span class="text-[10px] text-(--secondary-text-color)">شماره سفارش</span>
                <span class="text-xs font-bold text-(--primary-text-color)">#10044</span>
            </div>
        </div>
        <div class="pt-3 w-full flex flex-col gap-3.5">
            <div class="w-full flex flex-row items-center">
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.7"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <!-- Bag body -->
                            <path d="M6 8H18L19 20H5L6 8Z"/>
                            <!-- Handle -->
                            <path d="M8.5 8V6.8
                             C8.5 4.7 10 3.5 12 3.5
                             C14 3.5 15.5 4.7 15.5 6.8V8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">تعداد آیتم</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">3 غذا</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="
                                M12 20.5
                                C12 20.5 7 15.5 7 10.2
                                A5 5 0 1 1 17 10.2
                                C17 15.5 12 20.5 12 20.5
                                Z"/>
                            <circle cx="12" cy="9.8" r="1.9"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">آدرس</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">-</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6.8"/>
                            <path d="M12 8.5V12"/>
                            <path d="M12 12L14.8 13.8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">زمان ثبت</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">14:20</span>
                </div>
            </div>
            <div class="flex flex-col gap-1">

                <div class="w-full flex flex-row items-center gap-2">
                    <button class="block w-1/2 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--color-green) bg-(--color-green) text-white text-xs cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 576 512">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>
                        مشاهده آیتم ها
                    </button>
                    <button class="block w-[25%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-[#e4e5ea] text-(--secondary-text-color) text-xs cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.4"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <rect x="8.2" y="4" width="7.6" height="3.8" rx="0.4"/>
                            <rect x="4.8" y="8" width="14.4" height="6.8" rx="0.8"/>
                            <rect x="8.2" y="13.2" width="7.6" height="6.8" rx="0.4"/>
                            <circle cx="17" cy="11.2" r="0.5" fill="currentColor" stroke="none"/>
                        </svg>
                        چاپ فیش
                    </button>
                    <button class="block w-[20%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--color-red) text-(--color-red) text-xs cursor-pointer">
                        حذف
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-(--color-red)" viewBox="0 0 448 512">
                            <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </button>
                </div>
                <div class="w-full flex justify-end">
                    <div class="w-full flex items-center justify-center gap-0.5 bg-(--color-green) px-1 py-1 rounded-lg">
                        <span class="text-white text-sm font-bold">تایید</span>
                        <svg  class="size-6 rounded-lg" viewBox="0 0 36 36" fill="white"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                    </div>`
                </div>
            </div>
        </div>
    </div>


    <div class="w-full p-3 bg-white rounded-md flex flex-col shadow-[0px_0px_2px_1px_#e7e7ef]">
        <div class="w-full flex flex-row items-center justify-between pb-3 border-b border-[#e4e5ea]">
            <div class="flex flex-row items-center gap-2">
                <div class="size-8 bg-[#f4f4f6] rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-6"
                         viewBox="0 0 48 48"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <!-- Table -->
                        <path d="M19 10H29" />
                        <path d="M19 10V16" />
                        <path d="M29 10V16" />
                        <!-- Left chair -->
                        <path d="M10 10V36" />
                        <path d="M10 24H20" />
                        <path d="M20 24V36" />
                        <!-- Right chair -->
                        <path d="M38 10V36" />
                        <path d="M28 24H38" />
                        <path d="M28 24V36" />
                    </svg>
                </div>
                <span class="font-bold text-xs text-(--primary-text-color) in-fa">میز1</span>
                <span class="text-[10px] text-(--color-blue) px-2 py-0.5 bg-(--color-blue)/10 rounded-full border-1 border-(--color-blue)">آماده تحویل</span>
            </div>
            <div class="flex flex-col gap-1.5 items-end">
                <span class="text-[10px] text-(--secondary-text-color)">شماره سفارش</span>
                <span class="text-xs font-bold text-(--primary-text-color)">#10043</span>
            </div>
        </div>
        <div class="pt-3 w-full flex flex-col gap-3.5">
            <div class="w-full flex flex-row items-center">
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.7"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <!-- Bag body -->
                            <path d="M6 8H18L19 20H5L6 8Z"/>
                            <!-- Handle -->
                            <path d="M8.5 8V6.8
                             C8.5 4.7 10 3.5 12 3.5
                             C14 3.5 15.5 4.7 15.5 6.8V8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">تعداد آیتم</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">4 غذا</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="
                                M12 20.5
                                C12 20.5 7 15.5 7 10.2
                                A5 5 0 1 1 17 10.2
                                C17 15.5 12 20.5 12 20.5
                                Z"/>
                            <circle cx="12" cy="9.8" r="1.9"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">آدرس</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">-</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6.8"/>
                            <path d="M12 8.5V12"/>
                            <path d="M12 12L14.8 13.8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">زمان ثبت</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">14:10</span>
                </div>
            </div>
            <div class="w-full flex flex-col gap-2">

                <div class="w-full flex flex-row items-center gap-2">
                    <button class="block w-1/2 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--color-blue) bg-(--color-blue) text-white text-sm cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 576 512">
                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>
                        مشاهده آیتم ها
                    </button>
                    <button class="block w-[25%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-[#e4e5ea] text-(--secondary-text-color) text-xs cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.4"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <rect x="8.2" y="4" width="7.6" height="3.8" rx="0.4"/>
                            <rect x="4.8" y="8" width="14.4" height="6.8" rx="0.8"/>
                            <rect x="8.2" y="13.2" width="7.6" height="6.8" rx="0.4"/>
                            <circle cx="17" cy="11.2" r="0.5" fill="currentColor" stroke="none"/>
                        </svg>
                        چاپ فیش
                    </button>

    {{--                <span class="w-3/12 py-1.5 bg-green-500 rounded-lg flex justify-center items-center text-xs text-white">تا,ید</span>--}}

                    <button class="block w-[20%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--color-red) text-(--color-red) text-xs cursor-pointer">
                        حذف
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-(--color-red)" viewBox="0 0 448 512">
                            <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </button>

                </div>
                <div class="w-full flex justify-end">
                    <div class="w-full flex items-center justify-center gap-0.5 bg-(--color-green) px-1 py-1 rounded-lg">
                        <span class="text-white text-sm font-bold">تایید</span>
                                        <svg  class="size-6 rounded-lg" viewBox="0 0 36 36" fill="white"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                    </div>`
                </div>
            </div>
        </div>
    </div>


    <div class="w-full p-3 bg-white rounded-md flex flex-col shadow-[0px_0px_2px_1px_#e7e7ef]">
        <div class="w-full flex flex-row items-center justify-between pb-3 border-b border-[#e4e5ea]">
            <div class="flex flex-row items-center gap-2">
                <div class="size-8 bg-[#f4f4f6] rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-6"
                         viewBox="0 0 48 48"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <!-- Table -->
                        <path d="M19 10H29" />
                        <path d="M19 10V16" />
                        <path d="M29 10V16" />
                        <!-- Left chair -->
                        <path d="M10 10V36" />
                        <path d="M10 24H20" />
                        <path d="M20 24V36" />
                        <!-- Right chair -->
                        <path d="M38 10V36" />
                        <path d="M28 24H38" />
                        <path d="M28 24V36" />
                    </svg>
                </div>
                <span class="font-bold text-xs text-(--primary-text-color) in-fa">میز6</span>
                <span class="text-[10px] text-(--color-gray) px-2 py-0.5 bg-(--color-gray)/10 rounded-full border-1 border-(--color-gray)">تحویل داده شده</span>
            </div>
            <div class="flex flex-col gap-1.5 items-end">
                <span class="text-[10px] text-(--secondary-text-color)">شماره سفارش</span>
                <span class="text-xs font-bold text-(--primary-text-color)">#10042</span>
            </div>
        </div>
        <div class="pt-3 w-full flex flex-col gap-3.5">
            <div class="w-full flex flex-row items-center">
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.7"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <!-- Bag body -->
                            <path d="M6 8H18L19 20H5L6 8Z"/>
                            <!-- Handle -->
                            <path d="M8.5 8V6.8
                             C8.5 4.7 10 3.5 12 3.5
                             C14 3.5 15.5 4.7 15.5 6.8V8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">تعداد آیتم</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">2 غذا</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="
                                M12 20.5
                                C12 20.5 7 15.5 7 10.2
                                A5 5 0 1 1 17 10.2
                                C17 15.5 12 20.5 12 20.5
                                Z"/>
                            <circle cx="12" cy="9.8" r="1.9"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">آدرس</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">-</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6.8"/>
                            <path d="M12 8.5V12"/>
                            <path d="M12 12L14.8 13.8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">زمان ثبت</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">13:50</span>
                </div>
            </div>
            <div class="w-full flex flex-row items-center gap-2">
                <button class="block w-1/2 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--color-gray) bg-(--color-gray) text-white text-xs cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 576 512">
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                    مشاهده آیتم ها
                </button>
                <button class="block w-[25%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-[#e4e5ea] text-(--secondary-text-color) text-xs cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="var(--secondary-text-color)"
                         stroke-width="1.4"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="8.2" y="4" width="7.6" height="3.8" rx="0.4"/>
                        <rect x="4.8" y="8" width="14.4" height="6.8" rx="0.8"/>
                        <rect x="8.2" y="13.2" width="7.6" height="6.8" rx="0.4"/>
                        <circle cx="17" cy="11.2" r="0.5" fill="currentColor" stroke="none"/>
                    </svg>
                    چاپ فیش
                </button>
                <button class="block w-[20%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--color-red) text-(--color-red) text-xs cursor-pointer">
                    حذف
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-(--color-red)" viewBox="0 0 448 512">
                        <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>



</div>