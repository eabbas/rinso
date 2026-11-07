@extends('client.document')
@section('title')
    رینگا | نقشه راه
@endsection
@section('content')
    <style>
        .box-shadow{
            box-shadow: 0 0 1px 1px #ebebeb;
        }
        .circle-shadow{
            box-shadow: 0 0 1px 1px #fe780b;
        }

        .borderAbs::after{
            content: '';
            position: absolute;
            width: 4px;
            height: 80%;
            border-radius: 90%;
            background-color: white;
            top: 12%;
            right: 3px;
        }
    </style>
    <div class="w-full bg-white pt-3">
    <div class="w-11/12 mx-auto rounded-lg px-3 flex flex-row box-shadow">
    <div class="flex items-center justify-center min-h-40 max-h-40 min-w-40 max-w-40">
        <img src="{{ asset('storage/roadmap/computer1.png') }}" class="rounded-md bg-cover" alt="computer.png">
    </div>

        <div class="w-full flex flex-col pt-6" dir="ltr">
            <h1 class="font-bold text-[1.3rem]">رودمپ آموزشی</h1>
            <h2 class="font-bold text-[#fd6c0e] text-[1.7rem]">Full-Stack</h2>
            <div class="w-[180px] flex flex-col mt-1">
                <span class="text-[.6rem] font-bold text-[#8089ad]">از صفر تا صد ساخت پروژه های واقعی </span>
                <div class="flex items-center">
                    <span class="text-[.55rem] font-bold text-[#8089ad]">و ورود به بازار کار</span>
                </div>
            </div>
            <div class="flex gap-2">
                <div class="w-32 rounded-full bg-[#e7e9ef] mt-8 h-2">
                    <div class="flex h-full">
                        <div class="w-4/12 bg-[#fe780b] h-full rounded-full" dir="rtl">
                            <div class="w-2/12 bg-white rounded-full h-full circle-shadow"></div>
                        </div>
                    </div>
                </div>
{{--                <input type="range">--}}
                <div class="flex mt-4">
                    <span class="font-semibold text-[#fe780b] text-[1.2rem]">32</span>
                    <span class="text-[#fe780b] mt-2">%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="w-11/12 mx-auto rounded-lg p-4 px-5 flex flex-row items-center justify-between box-shadow mt-3" dir="rtl">
        <div class="flex gap-2 items-center">
            <div class="flex flex-col">
                <span class="text-[10px] font-bold text-[#8d92ab] text-end">مراحل</span>
                <span class="font-bold text-[11px] in-fa">+22</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-5" stroke-width="2" viewBox="0 0 640 512">
                    <path d="M320 80c2.5 0 5 .4 7.4 1.3l218 78.7-218 78.7c-2.4 .9-4.9 1.3-7.4 1.3s-5-.4-7.4-1.3L184.9 192.6l140.8-52.8c8.3-3.1 12.5-12.3 9.4-20.6s-12.3-12.5-20.6-9.4L154.9 169.6c-5.2 2-10.3 4.2-15.3 6.6L94.7 160l218-78.7c2.4-.9 4.9-1.3 7.4-1.3zM15.8 182.6l77.4 27.9c-27.2 28.7-43.7 66.7-45.1 107.7c-.1 .6-.1 1.2-.1 1.8c0 28.4-10.8 57.8-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7c-3.2-14-7.5-28.3-13.4-41.5c1.9-37 19.2-70.9 46.7-94.2l169.5 61.2c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32s-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6zm480.8 80l-46.5 16.8 12.7 120.5c-4.8 3.5-12.8 8-24.6 12.6C410 423.6 368 432 320 432s-90-8.4-118.3-19.4c-11.8-4.6-19.8-9.2-24.6-12.6l12.7-120.5-46.5-16.8L128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6zM467.4 396a.7 .7 0 1 0 -1.2-.7 .7 .7 0 1 0 1.2 .7zm-294.8 0a.7 .7 0 1 0 1.2-.6 .7 .7 0 1 0 -1.2 .6z"/>
                </svg>
            </div>
        </div>
        <span class="w-[1px] h-10 bg-gray-200"></span>
        <div class="flex gap-2 items-center">
            <div class="flex flex-col">
                <span class="text-[10px] font-bold text-[#8d92ab] text-end">مدت زمان</span>
                <span class="font-bold text-[11px] in-fa">9تا12ماه</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-4" stroke-width="2" viewBox="0 0 512 512">
                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                </svg>
            </div>
        </div>
        <span class="w-[1px] h-10 bg-gray-200"></span>
        <div class="flex gap-2 items-center">
            <div class="flex flex-col">
                <span class="text-[10px] font-bold text-[#8d92ab] text-end">سطح</span>
                <span class="font-bold text-[11px]">مبتدی</span>
            </div>
            <div>

                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart text-[#fe5d07] size-6"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
            </div>
        </div>
        <span class="w-[1px] h-10 bg-gray-200"></span>
        <div class="flex gap-2 items-center">
            <div class="flex flex-col">
                <span class="text-[10px] font-bold text-[#8d92ab] text-end">مسیر</span>
                <span class="font-bold text-[11px]">Full-Stack</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-4.5" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                </svg>

            </div>
        </div>
    </div>
    <div class="w-11/12 mx-auto flex flex-row justify-between mt-3">
        <div class="flex bg-white rounded-md box-shadow px-3 py-1">
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="none" class="size-4">
                <path d="M4 7H20"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <path d="M4 17H20"
                      stroke="#1D2433"
                      stroke-width="2"
                      stroke-linecap="round"/>
                <circle cx="9" cy="7" r="2"
                        stroke="#1D2433"
                        stroke-width="2"/>
                <circle cx="15" cy="17" r="2"
                        stroke="#1D2433"
                        stroke-width="2"/>
            </svg>
            <span class="text-[12px] font-bold">فیلتر</span>
        </div>
        <div class="font-bold">مراحل رودمپ</div>
    </div>
    <div class="w-11/12 mx-auto flex gap-3">
        <div class="w-full bg-white box-shadow rounded-lg mt-3 flex flex-row relative">
            <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                <div class="relative borderAbs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                    </svg>
                </div>
            </div>
            <div class="w-2/12 h-full flex items-center justify-center">
                <div class="w-6 h-6 rounded-full flex items-center justify-center box-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-4" viewBox="0 0 320 512">
                        <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                    </svg>
                </div>
            </div>
            <div class="w-9/12 h-full">
                <div class="flex flex-col py-1">
                    <span class="font-bold text-[14px] text-end">مقدمات و تفکر برنامه نویسی</span>
                    <span class="text-[10px] text-[#848aa4] text-end font-bold">آشنایی با کامپیوتر،الگوریتم و حل مسئله</span>
                    <div class="flex flex-row items-center justify-end gap-1 mt-2">
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex p-1 text-nowrap gap-1 justify-center items-center">
                            <span>پروژه:ماشین حساب </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="in-fa">5موضوع</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="in-fa">5تا6ساعت</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="min-w-17 max-w-17 flex items-center justify-center">
                <img src="{{ asset('storage/roadmap/1.png') }}" alt="">
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                <span class="flex items-center justify-center">1</span>
            </div>
            <span class="w-[1px] h-13 bg-[#fc6600] mt-2"></span>
            <!-- <div class="text-sm text-[#fc6600]">.</div> -->
        </div>
    </div>
    <div class="w-11/12 mx-auto flex gap-3">
        <div class="w-full bg-white box-shadow rounded-lg mt-3 flex flex-row relative">
            <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                <div class="relative borderAbs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                    </svg>
                </div>
            </div>
            <div class="w-2/12 h-full flex items-center justify-center">
                <div class="w-6 h-6 rounded-full flex items-center justify-center box-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-4" viewBox="0 0 320 512">
                        <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                    </svg>
                </div>
            </div>
            <div class="w-9/12 h-full">
                <div class="flex flex-col py-2 gap-1">
                    <span class="font-bold text-[14px] text-end">CSS،HTML میانی</span>
                    <span class="text-[10px] text-[#848aa4] text-end font-bold">ساختار صفحات وب و طراحی ظاهری</span>
                    <div class="flex flex-row items-center justify-end gap-1 ">
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex p-1 text-nowrap gap-1 justify-center items-center">
                            <span>پروژه: صفحه شخصی </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="in-fa">8موضوع</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="text-nowrap in-fa">4تا5 ساعت</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="min-w-17 max-w-17 flex items-center justify-center">
                <img src="{{ asset('storage/roadmap/2.png') }}" alt="">
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                <span class="flex items-center justify-center">2</span>
            </div>
            <span class="w-[1px] h-13 bg-[#fc6600] mt-2"></span>
            <!-- <div class="text-sm text-[#fc6600]">.</div> -->
        </div>
    </div>
    <div class="w-11/12 mx-auto flex gap-3">
        <div class="w-full bg-white box-shadow rounded-lg mt-3 flex flex-row relative">
            <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                <div class="relative borderAbs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                    </svg>
                </div>
            </div>
            <div class="w-2/12 h-full flex items-center justify-center">
                <div class="w-6 h-6 rounded-full flex items-center justify-center box-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-4" viewBox="0 0 320 512">
                        <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                    </svg>
                </div>
            </div>
            <div class="w-9/12 h-full">
                <div class="flex flex-col py-2 gap-1">
                    <span class="font-bold text-[14px] text-end">برنامه نویسی وjavaScript</span>
                    <span class="text-[10px] text-[#848aa4] text-end font-bold">منطق برنامه نویسی و تعامل با صفحات</span>
                    <div class="flex flex-row items-center justify-end gap-2 ">
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex p-1 text-nowrap gap- justify-center items-center">
                            <span>To-Do List</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="in-fa">10موضوع</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="in-fa">5تا6 ساعت</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="min-w-17 max-w-17 flex items-center justify-center">
                <img src="{{ asset('storage/roadmap/3.png') }}" alt="">
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                <span class="flex items-center justify-center">3</span>
            </div>
            <span class="w-[1px] h-13 bg-[#fc6600] mt-2"></span>
            <!-- <div class="text-sm text-[#fc6600]">.</div> -->
        </div>
    </div>
    <div class="w-11/12 mx-auto flex gap-3">
        <div class="w-full bg-white box-shadow rounded-lg mt-3 flex flex-row relative">
            <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                <div class="relative borderAbs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                    </svg>
                </div>
            </div>
            <div class="w-2/12 h-full flex items-center justify-center">
                <div class="w-6 h-6 rounded-full flex items-center justify-center box-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-4" viewBox="0 0 320 512">
                        <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                    </svg>
                </div>
            </div>
            <div class="w-9/12 h-full">
                <div class="flex flex-col py-2 gap-1">
                    <span class="font-bold text-[14px] text-end">Reactو کتابخانه های فرانت اند</span>
                    <span class="text-[10px] text-[#848aa4] text-end font-bold">ساخت رابط های کاربری مدرن و تعاملی</span>
                    <div class="flex flex-row items-center justify-end gap-2 ">
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 text-nowrap p1-1 justify-center items-center">
                            <span>پروژه:مدیریت وظایف </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="in-fa">9موضوع</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                            </svg>
                        </div>
                        <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                            <span class="text-nowrap in-fa">5تا15 ساعت</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="min-w-17 max-w-17 flex items-center justify-center">
                <img src="{{ asset('storage/roadmap/4.png') }}" alt="">
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                <span class="flex items-center justify-center">4</span>
            </div>
            <span class="w-[1px] h-13 border-1 border-dashed border-[#fe9449] border-[1px] mt-2"></span>
            <!-- <div class="text-sm text-[#fc6600]">.</div> -->
        </div>
    </div>
    <img src="{{ asset('storage/roadmap/banner.png') }}" class="w-11/12 mx-auto" alt="">
    </div>
@endsection