<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <style>
        .box_shado{
            box-shadow: 0px 15px 10px #ebebeb;
        }
        .box_shado4{
            box-shadow: 0px 2px 4px #ebebeb;
        }
        .box_shado2{
            box-shadow: 0px 5px 10px #ebebeb;
        }
        .box_shado3{
            box-shadow: 0px 3px 8px #ebebeb;
        }
    </style>
</head>
<body class="bg-[#fcfcfc]">
@include('header')
<div class="w-full flex justify-center items-center py-2">
    <section class="w-11/12 flex justify-center items-center mt-14">
        <div class="w-full flex justify-between">
            <div class="box_shado2 w-10 h-10 p-1 rounded-xl flex justify-center items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4">
                    <path d="M240 48c17.7 0 32 14.3 32 32V432c0 17.7-14.3 32-32 32H208c-17.7 0-32-14.3-32-32V80c0-17.7 14.3-32 32-32h32zM208 32c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H208zM80 240c17.7 0 32 14.3 32 32V432c0 17.7-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V272c0-17.7 14.3-32 32-32H80zM48 224c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48H48zM368 112h32c17.7 0 32 14.3 32 32V432c0 17.7-14.3 32-32 32H368c-17.7 0-32-14.3-32-32V144c0-17.7 14.3-32 32-32zm-48 32V432c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H368c-26.5 0-48 21.5-48 48z"/>
                </svg>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-[.73rem] font-bold">جعبه فعلی</span>
                <span class="text-[#f46400] text-[1.6rem] font-bold">4</span>
                <span class="text-[.7rem] font-bold">تثبیت</span>
            </div>
            <div class="box_shado2 w-10 h-10 p-1 rounded-xl flex justify-center items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none" class="size-5">
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
            </div>
        </div>
    </section>
</div>
<main class="w-full flex justify-center items-center mt-7 flex-col">
    <section class="w-11/12 flex justify-center items-center flex-col relative">
        <div class="w-[280px] h-[52px] bg-[#fff2ea] rounded-full absolute -z-1 -top-[.73rem] border-[4px] border-white box_shado3"></div>
        <div class="w-[265px] h-[41px] bg-[#fff2ea] rounded-full absolute -z-2 -top-[1.3rem] border-[3px] border-white box_shado3"></div>
        <div class="w-[250px] h-[42px] bg-[#fff2ea] rounded-full absolute -z-3 -top-[1.67rem] box_shado3"></div>
        <div class="w-19/24 rounded-3xl flex flex-col items-center p-3 py-4 box_shado bg-white gap-2">
            <div class="flex w-11/12 flex items-center justify-between">
                <div>
                    <svg version="1.1" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-unmute fill-[#777a88] size-5" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.563 2.069A.75.75 0 018 2.75v10.5a.75.75 0 01-1.238.57L3.472 11H1.75A1.75 1.75 0 010 9.25v-2.5C0 5.784.784 5 1.75 5h1.723l3.289-2.82a.75.75 0 01.801-.111zM6.5 4.38L4.238 6.319a.75.75 0 01-.488.181h-2a.25.25 0 00-.25.25v2.5c0 .138.112.25.25.25h2a.75.75 0 01.488.18L6.5 11.62V4.38zm6.096-2.038a.75.75 0 011.06 0 8 8 0 010 11.314.75.75 0 01-1.06-1.06 6.5 6.5 0 000-9.193.75.75 0 010-1.06v-.001zm-1.06 2.121a.75.75 0 10-1.061 1.061 3.5 3.5 0 010 4.95.75.75 0 101.06 1.06 5 5 0 000-7.07l.001-.001z"></path>
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-5 fill-[#777a88]">
                        <path d="M226.5 168.8L287.9 42.3l61.4 126.5c4.6 9.5 13.6 16.1 24.1 17.7l137.4 20.3-99.8 98.8c-7.4 7.3-10.8 17.8-9 28.1l23.5 139.5L303 407.7c-9.4-5-20.7-5-30.2 0L150.2 473.2l23.5-139.5c1.7-10.3-1.6-20.7-9-28.1L65 206.8l137.4-20.3c10.5-1.5 19.5-8.2 24.1-17.7zM424.9 509.1c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L433.6 328.4 544.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L378.1 154.8 309.5 13.5C305.5 5.2 297.1 0 287.9 0s-17.6 5.2-21.6 13.5L197.7 154.8 44.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L142.2 328.4 116 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2z"/>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-[2rem] font-bold">Ambitious</span>
                <span class="text-center text-[#9d9ea7] text-sm">/æmˈbɪʃəs/</span>
                <span class="text-[#fa6832] text-center text-[.95rem]">adjectiv</span>
            </div>
            <div class="flex flex-col items-center gap-1">
                <span class="font-bold">جاه طلب ، بلند پرواز</span>
                <span class="text-[.9rem] text-[#898d97]">she has <span class="text-[#ff5606]">Ambitious</span>goals for her future</span>
                <span class="text-[.8rem] text-[#93949f]">او اهداف جاه طلبانه ای برای اینده اش دارد</span>
            </div>
            <div class="flex gap-4 items-center">
                <div class="min-w-13 max-w-13 box_shado2 bg-white rounded-2xl">
                    <img src="{{asset('storage/hossein/file_00000000d0d871fda551d33d946b8e26.png')}}" alt="">
                </div>
                <div class="min-w-13 max-w-13 box_shado2 bg-white rounded-2xl">
                    <img src="{{asset('storage/hossein/file_00000000da9471f88ee09b64fdf5d8e2.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="w-11/12 flex items-center mt-7 gap-1 justify-center">
        <div class="flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white">
            <span class="text-lg text-center font-bold text-[#fb5302]">7</span>
            <img src="{{asset('storage/hossein/ad7612b6-6ce0-4d38-b694-45c56696b2cf (2).png')}}" alt="" >
            <span class="text-[#8f95a5] text-center text-[.85rem]">استاد</span>
            <span class="text-center font-bold text-[#fb5302]">24</span>
        </div>
        <div class="flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white">
            <span class="text-lg text-center font-bold text-[#fb5302]">6</span>
            <img src="{{asset('storage/hossein/b9676c60-fca2-480f-abb6-6d590b1efbe9 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem] text-nowrap">رشد</span>
            <span class="text-center font-bold text-[#fb5302]">86</span>
        </div>
        <div class="flex flex-col items-center min-w-[48px] max-w-[48px] gap-1 box_shado4 rounded-2xl bg-white">
            <span class="text-lg text-center font-bold text-[#5bd64e]">5</span>
            <img src="{{asset('storage/hossein/1eb5f1d8-a1c8-4000-93c4-f4926daf0820 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">رشد</span>
            <span class="text-center font-bold text-[#5bd64e]">112</span>
        </div>
        <div class="flex flex-col items-center min-w-[49px] max-w-[49px] gap-1 box_shado4 rounded-2xl border-[#f6911e] border-[1.5px] bg-white">
            <span class="text-lg text-center font-bold text-[#0296fe]">4</span>
            <img src="{{asset('storage/hossein/c2c34bcf-c5c2-4e0c-84de-a1885fb36775 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">تثبیت</span>
            <span class="text-center font-bold text-[#0296fe]">76</span>
        </div>
        <div class="flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white">
            <span class="text-lg text-center font-bold text-[#0296fe]">3</span>
            <img src="{{asset('storage/hossein/47b6f6fd-6783-4781-960d-3f856e5bfc27 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">تمرین</span>
            <span class="text-center font-bold text-[#0296fe]">48</span>
        </div>
        <div class="flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white">
            <span class="text-lg text-center font-bold text-[#5c27e4]">2</span>
            <img src="{{asset('storage/hossein/13555134-fd82-4e94-92eb-7dd04ce35271 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.9rem]">اشنا </span>
            <span class="text-center font-bold text-[#5c27e4]">32</span>
        </div>
        <div class="flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white">
            <span class="text-lg text-center font-bold">1</span>
            <img src="{{asset('storage/hossein/64f5c2ec-a59a-4b68-8c70-fc4d3357362f (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">جدید</span>
            <span class="text-center font-bold">24</span>
        </div>
    </section>
{{--    <button class="w-75 py-3 bg-[#fe6601] mt-3 rounded-full flex items-center justify-center gap-3 mb-18">--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-5 fill-white">--}}
{{--            <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>--}}
{{--        </svg>--}}
{{--        <span class="text-white font-bold text-[1.1rem] mb-1">شروع مرور </span>--}}
{{--    </button>--}}
</main>
@include('footer')

</body>
</html>