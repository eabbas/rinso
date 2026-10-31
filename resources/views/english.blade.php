{{--<!DOCTYPE html>--}}
{{--<html lang="fa" dir="rtl">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>english</title>--}}
{{--    <script src="{{asset('assets/js/tailwind.js')}}"></script>--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/fontiran.css')}}">--}}
{{--</head>--}}
{{--<body class="bg-zinc-100">--}}
@include('header')
<style>

    /*  style mahdi  */
    .heder_hover_phone:hover:hover .heder_hover_items_item{
        visibility: visible;
        opacity: 1;

    }
    .heder_hover_phone:hover .heder_hover_items_rotate{
        rotate: 270deg;
    }
    .gradientereer{
        background-image: linear-gradient(90deg , rgb(128, 0, 255) , rgb(255, 0, 166));


    }
    /*  style mahdi  */

/*  style amir  */
     .mohtava_2 {
         background: linear-gradient(220deg, #2c3e50 0%, #0aacb4 100%);
     }
    .peer {
        background: linear-gradient(180deg, #2c3e50 0%, #3498db 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .peer::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 90%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .peer:hover::after {
        width: 1300px;
        height: 1000px;
    }
    /* .peer:hover {
          transform: translateY(-5px);
      } */
    .peer:hover .peerr {
        transform: translateX(-20px);
    }
    .mohtava_1 {
        background: linear-gradient(140deg, #2c3e50 0%, #9b0c5d 100%);
        /* box-shadow: 0 6px 0 #2c3e50, 0 8px 10px rgba(0,0,0,0.2); */
        /* transition: all 0.1s ease; */
    }
     .mohtava_1:hover {
         transform: translateY(-5px);
         /*box-shadow: 0 4px 0 #9b0c5d, 0 6px 8px rgba(0,0,0,0.2);*/
     }
     .mohtava_2:hover {
            transform: translateY(-5px);
            /*box-shadow: 0 4px 0 #9b0c5d, 0 6px 8px rgba(0,0,0,0.2);*/
        }

     /*   .mohtava_1:active {*/
     /*       transform: translateY(2px);*/
     /*       box-shadow: 0 2px 0 #2c3e50, 0 4px 6px rgba(0,0,0,0.2);*/
     /*   }*/
</style>
{{--tasc mahdi--}}

<div class=" w-full h-full max-w-[1700px] flex flex-col gap-3 mt-5">
{{--    <header>--}}
{{--        <section class="w-full flex justify-center">--}}
{{--            <div class="fixed w-11/12 top-5 bg-white rounded-xl px-5 py-5 flex items-center  lg:justify-between shadow-[0px_0px_6px_6px] shadow-[#ebebf6] z-4">--}}
{{--                <div class="lg:w-10/12 w-full flex items-center gap-4 justify-center lg:justify-start">--}}

{{--                    <div class="p-3 bg-[#eb3254]  justify-center items-center rounded-lg">--}}
{{--                        <span class="lg:text-4xl text-2xl md:text-3xl font-bold text-white">famenu</span>--}}
{{--                    </div>--}}
{{--                    <div class="w-9/24 hidden lg:flex items-center gap-3">--}}
{{--                        <div class="flex relative items-center gap-4 heder_hover_phone gap-2 p-2 rounded-lg">--}}
{{--                            <!-- <div class="w-full h-[100vh] top-0 z-0 right-0 fixed bg-black/50 mddd invisible opacity-0 transition-all duration-200"></div> -->--}}
{{--                            <span class="text-lg">متن تستی</span>--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2 rotate-90 heder_hover_items_rotate transition-all duration-200"><path d="M47 239c-9.4 9.4-9.4 24.6 0 33.9L207 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L97.9 256 241 113c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L47 239z"></path></svg>--}}
{{--                            <div class="absolute top-20 right-0 bg-[#fff] rounded-2xl transition-all duration-200 ease-in delay-250 heder_hover_items_item invisible opacity-0">--}}
{{--                                <ul class="w-45 h-42 flex flex-col gap-3 justify-center pr-4 text-[#838383]">--}}
{{--                                    <li class="w-full  hover:text-green-600">حساب کاربری</li>--}}
{{--                                    <li class="w-full  hover:text-green-600">سبد خرید</li>--}}
{{--                                    <li class="w-full  hover:text-green-600">پرداخت</li>--}}
{{--                                    <li class="w-full  hover:text-green-600">پروفایل مدرس</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="flex relative items-center gap-4 heder_hover_phone gap-2 p-2 rounded-lg">--}}
{{--                            <!-- <div class="w-full h-[100vh] top-0 z-0 right-0 fixed bg-black/50 mddd invisible opacity-0 transition-all duration-200"></div> -->--}}
{{--                            <span class="text-lg">متن تستی</span>--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2 rotate-90 heder_hover_items_rotate transition-all duration-200"><path d="M47 239c-9.4 9.4-9.4 24.6 0 33.9L207 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L97.9 256 241 113c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L47 239z"></path></svg>--}}
{{--                            <div class="absolute top-20 right-0 bg-[#fff] rounded-2xl transition-all duration-200 ease-in delay-250 heder_hover_items_item invisible opacity-0">--}}
{{--                                <ul class="w-45 h-42 flex flex-col gap-3 justify-center pr-4 text-[#838383]">--}}
{{--                                    <li class="w-full  hover:text-green-600">حساب کاربری</li>--}}
{{--                                    <li class="w-full  hover:text-green-600">سبد خرید</li>--}}
{{--                                    <li class="w-full  hover:text-green-600">پرداخت</li>--}}
{{--                                    <li class="w-full  hover:text-green-600">پروفایل مدرس</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <button class="w-10 h-10 bg-[#ee04c2] flex justify-center items-center rounded-lg hidden lg:flex"  onclick="shopping_bag('open')">--}}
{{--                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M20.232 10.5257C19.6468 7.40452 19.3542 5.84393 18.2433 4.92196C17.1324 4 15.5446 4 12.369 4H11.6479C8.47228 4 6.8845 4 5.7736 4.92196C4.66271 5.84393 4.37009 7.40452 3.78487 10.5257C2.96195 14.9146 2.55049 17.1091 3.75011 18.5545C4.94973 20 7.18244 20 11.6478 20H12.369C16.8344 20 19.0672 20 20.2668 18.5545C20.9628 17.7159 21.1165 16.6252 20.9621 15" stroke="white" stroke-width="1.5" stroke-linecap="round"/>--}}
{{--                        <path d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </header>--}}




    <section class="w-full flex justify-center relative mt-16">
        <div class=" w-11/12 pt-1 rounded-lg flex items-center justify-between">
{{--            <div class="lg:min-w-[90px] lg:max-w-[90px] lg:h-[150px] min-w-[70px] max-w-[70px] h-[105px] flex flex-col lg:gap-2 gap-0.5 pup_up_story">--}}
{{--                <div class="w-full h-2/3 rounded-full gradientereer p-0.5 overflow-hidden">--}}
{{--                    <div class="w-full h-full rounded-full bg-white p-0.5 flex justify-center items-center">--}}
{{--                        <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">--}}
{{--                            <img src="{{asset('assets/img/user.png')}}" alt="" class="object-cover rounded-full ">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full text-center overflow-hidden px-1">--}}
{{--                    <span class="text-caption lg:text-sm text-xs text-[#23254e] text-nowrap">پاوربانک ...</span>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- video_story -->
            <div class="min-w-16 max-w-16 flex flex-col gap-1 items-center pup_up_story">
                <div class="w-full rounded-full border-2 border-[#07164f] flex jsutfiy-center items-center p-0.5 ">
                    <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">
                        <img src="{{asset('storage/image/images.jpg')}}" alt="" class="object-cover rounded-full">
                    </div>
                </div>
                <span class="w-full text-xs text-nowrap text-center"> ثبت </span>
            </div>
            <div class="min-w-16 max-w-16 flex flex-col gap-1 items-center pup_up_story">
                <div class="w-full rounded-full border-2 border-[#07164f] flex jsutfiy-center items-center p-0.5 ">
                    <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">
                        <img src="{{asset('storage/image/images.jpg')}}" alt="" class="object-cover rounded-full">
                    </div>
                </div>
                <span class="text-xs text-nowrap text-center"> پاور</span>
            </div>
            <div class="min-w-16 max-w-16 flex flex-col gap-1 items-center pup_up_story">
                <div class="w-full rounded-full border-2 border-[#07164f] flex jsutfiy-center items-center p-0.5 ">
                    <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">
                        <img src="{{asset('storage/image/images.jpg')}}" alt="" class="object-cover rounded-full">
                    </div>
                </div>
                <span class="text-xs"> پاور</span>
            </div>
            <div class="min-w-16 max-w-16 flex flex-col gap-1 items-center pup_up_story">
                <div class="w-full rounded-full border-2 border-[#07164f] flex jsutfiy-center items-center p-0.5 ">
                    <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">
                        <img src="{{asset('storage/image/images.jpg')}}" alt="" class="object-cover rounded-full">
                    </div>
                </div>
                <span class="text-xs"> پاور</span>
            </div>
            <div class="min-w-16 max-w-16 flex flex-col gap-1 items-center pup_up_story">
                <div class="w-full rounded-full border-2 border-[#07164f] flex jsutfiy-center items-center p-0.5 ">
                    <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">
                        <img src="{{asset('storage/image/images.jpg')}}" alt="" class="object-cover rounded-full">
                    </div>
                </div>
                <span class="text-xs"> پاور</span>
            </div>
{{--            <div>--}}
{{--                <div class="w-full h-[100vh] flex justify-center items-center fixed z-5 top-0 right-0 rounded-xl transition-all duration-400 hidden" id="pup_up_story_items">--}}
{{--                    <div class="w-full h-[100vh] bg-black/50 fixed top-0 right-0 transition-all duration-400" onclick="pup_up_story_close_out()"></div>--}}
{{--                    <div class="w-full sm:w-100 h-full flex justify-center items-center relative">--}}
{{--                        <video src="" controls autoplay muted loop class="w-full h-full rounded-xl"></video>--}}
{{--                        <div class="w-11/12 absolute top-6 flex gap-2 items-center mx-auto justify-between">--}}
{{--                            <div class="flex items-center gap-4">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6" fill="white" onclick="pup_up_story_close_out()"><path d="M422.6 278.6L445.3 256l-22.6-22.6-144-144L256 66.7 210.8 112l22.6 22.6L322.8 224 32 224 0 224l0 64 32 0 290.7 0-89.4 89.4L210.8 400 256 445.3l22.6-22.6 144-144z"/></svg>--}}
{{--                                <div class="flex items-center gap-2">--}}
{{--                                    <div class="w-10 h-10 rounded-full overflow-hidden">--}}
{{--                                        <img src="{{asset('assets/img/user.png')}}" alt="" class="object-cover">--}}
{{--                                    </div>--}}
{{--                                    <span class="text-[#f0f0f1] font-bold">Anker_iran</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button class="px-5 py-2 bg-white text-black text-sm rounded-xl">--}}
{{--                                دنبال کن--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div  class="w-11/12 absolute bottom-25 flex gap-2 items-end mx-auto justify-between">--}}
{{--                            <div class="w-9/12 h-full flex flex-col gap-2 justify-end text-[#fff]">--}}
{{--                                <span class="text-lg font-bold">تبلت چویی Hi10 Max</span>--}}
{{--                                <span>تبلت چویی Hi10 Max</span>--}}
{{--                            </div>--}}
{{--                            <div class="w-3/12 h-full flex flex-col items-end gap-6 justify-end">--}}
{{--                                <div class="flex flex-col gap-2 items-center cursor-pointer">--}}
{{--                                    <div class="like_change_svg">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6" fill="#fff" id="no_like"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 hidden" fill="red"  id="like"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>--}}
{{--                                    </div>--}}
{{--                                    <span class="text-white text-nowrap">235 هزار</span>--}}
{{--                                </div>--}}
{{--                                <div class="flex flex-col gap-2 items-center cursor-pointer" onclick="open_command()">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7" fill="white"><path d="M168.2 384.9c-15-5.4-31.7-3.1-44.6 6.4c-8.2 6-22.3 14.8-39.4 22.7c5.6-14.7 9.9-31.3 11.3-49.4c1-12.9-3.3-25.7-11.8-35.5C60.4 302.8 48 272 48 240c0-79.5 83.3-160 208-160s208 80.5 208 160s-83.3 160-208 160c-31.6 0-61.3-5.5-87.8-15.1zM26.3 423.8c-1.6 2.7-3.3 5.4-5.1 8.1l-.3 .5c-1.6 2.3-3.2 4.6-4.8 6.9c-3.5 4.7-7.3 9.3-11.3 13.5c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c5.1 0 10.2-.3 15.3-.8l.7-.1c4.4-.5 8.8-1.1 13.2-1.9c.8-.1 1.6-.3 2.4-.5c17.8-3.5 34.9-9.5 50.1-16.1c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9zM144 272a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>--}}
{{--                                    <span class="text-white text-nowrap">235 هزار</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- commend -->--}}
{{--                        <div class="w-full h-0 bg-white absolute bottom-0 rounded-t-4xl transition-all duration-400 overflow-hidden" id="more_comment_item">--}}
{{--                            <div class="w-full h-15 bg-zinc-200 flex  items-center sticky top-0 justify-between gap-2 rounded-t-4xl px-5" >--}}
{{--                                <div onclick="more_comment('up')">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 -rotate-90" fill="black" id="more_comment_up_down"><path d="M422.6 278.6L445.3 256l-22.6-22.6-144-144L256 66.7 210.8 112l22.6 22.6L322.8 224 32 224 0 224l0 64 32 0 290.7 0-89.4 89.4L210.8 400 256 445.3l22.6-22.6 144-144z"></path></svg>--}}
{{--                                </div>--}}
{{--                                <div class="w-full flex flex-col gap-2 justify-center items-center">--}}
{{--                                    <span class="w-1/12 h-1 bg-black rounded-2xl"></span>--}}
{{--                                    <span>دیدگاه ها</span>--}}
{{--                                </div>--}}
{{--                                <div onclick="more_comment('dowen')">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 rotate-90" fill="black"><path d="M422.6 278.6L445.3 256l-22.6-22.6-144-144L256 66.7 210.8 112l22.6 22.6L322.8 224 32 224 0 224l0 64 32 0 290.7 0-89.4 89.4L210.8 400 256 445.3l22.6-22.6 144-144z"></path></svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full max-h-full flex flex-col gap-3 items-center overflow-auto pt-3">--}}

{{--                                <!-- اولین کامنت -->--}}
{{--                                <div class="w-11/12 py-2 pb-5 flex flex-col gap-2 ">--}}
{{--                                    <div class="w-full flex gap-2 justify-between">--}}

{{--                                        <div class="w-10/12 flex gap-2">--}}
{{--                                            <div class="w-2/12">--}}
{{--                                                <div class="w-10 h-10 rounded-full overflow-hidden border-1">--}}
{{--                                                    <img src="{{asset('assets/img/user.png')}}" alt="" class="object-cover">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="w-10/12 py-1 flex flex-col gap-1.5">--}}
{{--                                                <div class="flex gap-2">--}}
{{--                                                    <span class="text-xs text-[#c3c4c7]">mahdi_1111</span>--}}
{{--                                                    <span class="text-xs text-[#c3c4c7]">14h</span>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-xs lg:text-sm">متن_تستی متن_تستی متن_تستی متن_تستی متن_تستی</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex">--}}
{{--                                                    <span class="text-xs text-[#c3c4c7]">پاسخ</span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex flex-col gap-2 items-center">--}}
{{--                                            <div onclick="like_change_svg_comment()" class="like_change_svg">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5" fill="#000" id="no_like_in_comment"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 hidden" fill="red"  id="like_in_comment"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>--}}
{{--                                            </div>--}}
{{--                                            <span class="text-black text-sm text-nowrap">235 هزار</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex items-center gap-2 show_reply cursor-pointer">--}}
{{--                                        <span class="w-8 h-0.5 bg-[#c3c4c7] rounded-2xl"></span>--}}
{{--                                        <span class="text-xs text-[#c3c4c7]">دیدن پاسخ ها</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- reply_commend -->--}}
{{--                                    <div class="w-full max-h-0 pr-8 flex flex-col gap-3 overflow-hidden transition-all duration-400 relative" id="mmmmkkkkddd">--}}
{{--                                        <div class="w-full min-py-1 flex gap-2 pr-2 justify-between border-r-2 border-[blue]" id="mmjjjkk">--}}
{{--                                            <div class="w-10/12 flex gap-2">--}}
{{--                                                <div>--}}
{{--                                                    <div class="w-10 h-10 rounded-full overflow-hidden border-1">--}}
{{--                                                        <img src="./img/68ee255cda58f15f60cd7068279cb5e3efff683a_1739952327.jpg" alt="" class="object-cover">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="w-10/12 py-1 flex flex-col gap-1">--}}
{{--                                                    <div class="flex gap-2">--}}
{{--                                                        <span class="text-xs text-[#c3c4c7]">mahdi_1111</span>--}}
{{--                                                        <span class="text-xs text-[#c3c4c7]">14h</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div>--}}
{{--                                                        <p class="text-xs lg:text-sm">متن_تستی متن_تستی متن_تستی متن_تستی متن_تستی</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex">--}}
{{--                                                        <span class="text-xs text-[#c3c4c7]">پاسخ</span>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="flex flex-col gap-2 items-center">--}}
{{--                                                <div class="like_change_svg">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5" fill="#fff" id="no_like_in_comment"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 hidden" fill="red"  id="like_in_comment"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>--}}
{{--                                                </div>--}}
{{--                                                <span class="text-white text-sm text-nowrap">235 هزار</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="w-full h-7 bg-white text-xs cursor-pointer text-[#c3c4c7] all_reply absolute bottom-0 flex gap-4 justify-start items-center px-4">--}}
{{--                                            <span class="w-8 h-0.5 bg-[#c3c4c7] rounded-2xl"></span>--}}
{{--                                            <span>دیدن همه</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- reply_commend -->--}}
{{--                                </div>--}}
{{--                                <!-- اولین کامنت -->--}}
{{--                                --}}{{--                                دومین--}}
{{--                                <div class="w-11/12 py-2 pb-5 flex flex-col gap-2 ">--}}
{{--                                    <div class="w-full flex gap-2 justify-between">--}}

{{--                                        <div class="w-10/12 flex gap-2">--}}
{{--                                            <div class="w-2/12">--}}
{{--                                                <div class="w-10 h-10 rounded-full overflow-hidden border-1">--}}
{{--                                                    <img src="{{asset('assets/img/user.png')}}" alt="" class="object-cover">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="w-10/12 py-1 flex flex-col gap-1.5">--}}
{{--                                                <div class="flex gap-2">--}}
{{--                                                    <span class="text-xs text-[#c3c4c7]">mahdi_1111</span>--}}
{{--                                                    <span class="text-xs text-[#c3c4c7]">14h</span>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <p class="text-xs lg:text-sm">متن_تستی متن_تستی متن_تستی متن_تستی متن_تستی</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex">--}}
{{--                                                    <span class="text-xs text-[#c3c4c7]">پاسخ</span>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex flex-col gap-2 items-center">--}}
{{--                                            <div onclick="like_change_svg_comment()" class="like_change_svg">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5" fill="#000" id="no_like_in_comment"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 hidden" fill="red"  id="like_in_comment"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>--}}
{{--                                            </div>--}}
{{--                                            <span class="text-black text-sm text-nowrap">235 هزار</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex items-center gap-2 show_reply cursor-pointer">--}}
{{--                                        <span class="w-8 h-0.5 bg-[#c3c4c7] rounded-2xl"></span>--}}
{{--                                        <span class="text-xs text-[#c3c4c7]">دیدن پاسخ ها</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- reply_commend -->--}}
{{--                                    <div class="w-full max-h-0 pr-8 flex flex-col gap-3 overflow-hidden transition-all duration-400 relative">--}}
{{--                                        --}}{{--                                        <div class="w-full min-py-1 flex gap-2 pr-2 justify-between border-r-2 border-[blue]" id="mmjjjkk">--}}
{{--                                        --}}{{--                                            <div class="w-10/12 flex gap-2">--}}
{{--                                        --}}{{--                                                <div>--}}
{{--                                        --}}{{--                                                    <div class="w-10 h-10 rounded-full overflow-hidden border-1">--}}
{{--                                        --}}{{--                                                        <img src="./img/68ee255cda58f15f60cd7068279cb5e3efff683a_1739952327.jpg" alt="" class="object-cover">--}}
{{--                                        --}}{{--                                                    </div>--}}
{{--                                        --}}{{--                                                </div>--}}
{{--                                        --}}{{--                                                <div class="w-10/12 py-1 flex flex-col gap-1">--}}
{{--                                        --}}{{--                                                    <div class="flex gap-2">--}}
{{--                                        --}}{{--                                                        <span class="text-xs text-[#c3c4c7]">mahdi_1111</span>--}}
{{--                                        --}}{{--                                                        <span class="text-xs text-[#c3c4c7]">14h</span>--}}
{{--                                        --}}{{--                                                    </div>--}}
{{--                                        --}}{{--                                                    <div>--}}
{{--                                        --}}{{--                                                        <p class="text-xs lg:text-sm">متن_تستی متن_تستی متن_تستی متن_تستی متن_تستی</p>--}}
{{--                                        --}}{{--                                                    </div>--}}
{{--                                        --}}{{--                                                    <div class="flex">--}}
{{--                                        --}}{{--                                                        <span class="text-xs text-[#c3c4c7]">پاسخ</span>--}}
{{--                                        --}}{{--                                                    </div>--}}

{{--                                        --}}{{--                                                </div>--}}
{{--                                        --}}{{--                                            </div>--}}
{{--                                        --}}{{--                                            <div class="flex flex-col gap-2 items-center">--}}
{{--                                        --}}{{--                                                <div class="like_change_svg">--}}
{{--                                        --}}{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5" fill="#fff" id="no_like_in_comment"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>--}}
{{--                                        --}}{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 hidden" fill="red"  id="like_in_comment"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>--}}
{{--                                        --}}{{--                                                </div>--}}
{{--                                        --}}{{--                                                <span class="text-white text-sm text-nowrap">235 هزار</span>--}}
{{--                                        --}}{{--                                            </div>--}}
{{--                                        --}}{{--                                        </div>--}}
{{--                                        <div class="w-full h-10 text-xs text-[#c3c4c7] all_reply absolute bottom-0 flex justify-center items-end cursor-pointer">--}}
{{--                                            <span>دیدن همه</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- reply_commend -->--}}
{{--                                </div>--}}
{{--                                --}}{{--                                دومین--}}

{{--                            </div>--}}
{{--                            <div class="w-full h-15 bg-white absolute bottom-14 flex items-center justify-center">--}}
{{--                                <div class="w-11/12 flex justify-between items-center">--}}
{{--                                    <div class="w-8 h-8 flex justify-center items-center">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" class="w-7"><g><path d="M18.64 2.634L.984 8.856c-.284.1-.347.345-.01.479l3.796 1.521 2.25.901 10.984-8.066c.148-.108.318.095.211.211l-7.871 8.513v.002l-.452.503.599.322 4.982 2.682c.291.156.668.027.752-.334l2.906-12.525c.079-.343-.148-.552-.491-.431zM7 17.162c0 .246.139.315.331.141.251-.229 2.85-2.561 2.85-2.561L7 13.098v4.064z"></path></g></svg>--}}
{{--                                    </div>--}}
{{--                                    <form action="" class="w-11/12 h-full flex justify-end">--}}
{{--                                        <div class="w-full h-10 rounded-4xl border-1 flex justify-end px-3 py-1">--}}
{{--                                            <input type="text" class="w-full h-full outline-none" placeholder="نظر شما">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- commend -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- video_story -->
        </div>
    </section>

    <section class="w-11/12 bg-[#1b2639]  mx-auto rounded-xl flex relative ">
        <div class="w-full h-full ">
            <img src="{{asset('storage/mahdi/a3392643-ab92-4e6f-8fbf-f3aba9b94333.jpg')}}" alt="" class="object-cover w-full h-full rounded-xl">
        </div>
        <div class="w-5/12 h-full absolute left-0 flex flex-col justify-center gap-1.5 items-end pl-5">
            <p class="text-[6px] text-[#f6911e]">یاد گیری زبان و فرصتی برای دنیای جدید</p>
            <span class="text-sm font-bold text-white">زبان یاد بگیر</span>
            <span class="text-sm font-bold text-white text-nowrap">زندگی ات را گسترش بده</span>
            <p class="text-[7px] text-white">دوره های کاربردی اساتید حرفه ای</p>
            <p class="text-[7px] text-white">ثیاد گیری آسان و موثر</p>
            <button class="w-7/12 h-5 rounded-lg bg-[#ff9a1e] flex gap-1 items-center justify-center">
                <span class="text-[7px] text-white">مشاهده دوره ها</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2 rotate-90" fill="white"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/></svg>
            </button>
        </div>
        <div class="w-15 h-7 bg-white absolute top-3 right-4 rounded-lg flex gap-1 justify-center items-center">
            <div class="flex flex-col items-start justify-center">
                <span class="text-[6px] font-bold ">جلسه رایگان</span>
                <span class="text-[5px] text-[#b2b3bb]">مشاهده کنید</span>
            </div>
            <div class="w-4 h-4 rounded-full overflow-hidden">
                <img src="{{asset('storage/mahdi/a4a2435b-73c3-49df-8dca-66f0f42a6c6b.jpg')}}" alt="">
            </div>
        </div>
        <div class=" bg-[#2e3952]  absolute top-8 right-8/20 rounded-md flex flex-col gap-0.5 items-start justiyf-center px-3 py-1 justify-center">
            <span class="text-[4px] text-white mx-auto">پیشرفت شما</span>
            <div class="w-full flex items-center gap-2 justfiy-center mx-auto">
                <span class="text-[8px] text-white font-bold">72%</span>
                <img src="{{asset('storage/mahdi/efc1285c-6f67-4962-939c-b12177160320.jpg')}}" alt="" class="size-3">
            </div>
        </div>
        <div class="bg-[#2e3952]  absolute bottom-8 right-1/30 rounded-md flex gap-0.5 px-1.5 py-1 items-center justiyf-center justify-center">
            <div class="flex flex-col items-start justify-center">
                <span class="text-[5px] text-white">پادکست</span>
                <span class="text-[4px] text-[#b2b3bb]">گوش دهید </span>
            </div>
            <div class="w-4 h-4 rounded-full overflow-hidden">
                <img src="{{asset('storage/mahdi/b8540b37-275e-4df2-88fa-b4a44b55abb6.jpg')}}" alt="">
            </div>
        </div>
    </section>


</div>
{{--tasc mahdi--}}

{{--tasc Amir--}}

<main class="w-full relative mx-auto md:mt-20">
    <!-- video -->
{{--    <section class="w-full md:mt-20">--}}
{{--        <div class="w-full flex items-center mx-auto">--}}
{{--            <span class="w-48 min-w-fit text-zinc-700 text-xs md:text-sm md:font-yekanBakhBold">--}}
{{--              ویدیوهای اموزشی--}}
{{--            </span>--}}
{{--            <span class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-500 to-white"></span>--}}
{{--            <div class="w-32 min-w-fit text-left">--}}
{{--                <a--}}
{{--                        href=""--}}
{{--                        class="text-sm hover:text-orange-500 text-zinc-600 flex fle items-center gap-x-1 group"--}}
{{--                >--}}
{{--                    مشاهده همه--}}
{{--                    <svg--}}
{{--                            class="fill-zinc-600 hover:fill-orange-500 group-hover:-translate-x-1 transition group-hover:fill-orange-500 size-2.5 md:size-3"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            width=""--}}
{{--                            height=""--}}
{{--                            fill=""--}}
{{--                            viewBox="0 0 256 256"--}}
{{--                    >--}}
{{--                        <path--}}
{{--                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"--}}
{{--                        ></path>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="w-full rounded-md overflow-hidden flex flex-col md:flex-row items-center justify-center md:p-2 mt-2">--}}
{{--            <div class="w-11/12 order-2 md:order-1 md:w-3/12 md:h-50 overflow-x-auto md:overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-thumb]:bg-purple-300 [&::-webkit-scrollbar-thumb]:rounded-full">--}}
{{--                <div class="w-11/12 hidden md:flex flex-row md:flex-col items-center gap-x-5 md:gap-y-5 py-3">--}}
{{--                    <div class="relative bg-[url({{asset('storage/image/cat-tiles-bg.png')}})] obgect-cover bg-center min-w-25 md:w-9/10 h-13 md:h-20 bg-[#0b686d] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="{{asset('storage/image/cat-tiles-bg.png')}}"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        فارسی--}}
{{--                    </div>--}}
{{--                    <div class="relative bg-[url({{asset('storage/image/cat-tiles-bg.png')}})] obgect-cover bg-center min-w-25 md:w-9/10 h-13 md:h-20 bg-[#8d3768] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-20 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        انگلیسی--}}
{{--                    </div>--}}
{{--                    <div class="relative min-w-25 md:w-9/10 h-13 md:h-20 bg-[#6216ae] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        ENGLiSH--}}
{{--                    </div>--}}
{{--                    <div class="relative min-w-25 md:w-9/10 h-13 md:h-20 bg-[#cd7207] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        ENGLiSH--}}
{{--                    </div>--}}
{{--                    <div class="relative min-w-25 md:w-9/10 h-13 md:h-20 bg-[#0b686d] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        ENGLiSH--}}
{{--                    </div>--}}
{{--                    <div class="relative min-w-25 md:w-9/10 h-13 md:h-20 bg-[#8d3768] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        ENGLiSH--}}
{{--                    </div>--}}
{{--                    <div class="relative min-w-25 md:w-9/10 h-13 md:h-20 bg-[#6216ae] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        ENGLiSH--}}
{{--                    </div>--}}
{{--                    <div class="relative min-w-25 md:w-9/10 h-13 md:h-20 bg-[#cd7207] rounded-md font-mono font-bold py-5 text-md md:text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">--}}
{{--                        <img--}}
{{--                                src="assets/img/اخبار-زبان-1.jpg"--}}
{{--                                alt=""--}}
{{--                                class="absolute w-5 md:w-20 left-0 opacity-30"--}}
{{--                        />--}}
{{--                        ENGLiSH--}}
{{--                    </div>--}}
{{--                    <!-- <div class="w-[90%] h-20 bg-[#8d3768] rounded-md font-mono font-bold text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">ENGLiSH</div>--}}
{{--                        <div class="w-[90%] h-20 bg-[#6216ae] rounded-md font-mono font-bold text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">ENGLiSH</div>--}}
{{--                    <div class="w-[90%] h-20 bg-[#cd7207] rounded-md font-mono font-bold text-3xl text-white flex items-center justify-center hover:opacity-90 hover:translate-y-[-5px] transition-all cursor-pointer">ENGLiSH</div> -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="relative order-1 md:order-1 w-full md:w-9/12 flex items-center justify-center">--}}
{{--                <div--}}
{{--                        class="absolute w-10 h-10 bg-white/50 rounded-full top-[50%] right-5 flex items-center justify-center cursor-pointer"--}}
{{--                >--}}
{{--                    <svg--}}
{{--                            class="size-6"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            viewBox="0 0 320 512"--}}
{{--                    >--}}
{{--                        <path--}}
{{--                                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"--}}
{{--                        />--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                        class="absolute w-10 h-10 bg-white/50 rounded-full top-[50%] left-5 flex items-center justify-center cursor-pointer"--}}
{{--                >--}}
{{--                    <svg--}}
{{--                            class="size-6"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            viewBox="0 0 320 512"--}}
{{--                    >--}}
{{--                        <path--}}
{{--                                d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"--}}
{{--                        />--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <!-- <video class="w-full h-full overflow-hidden" src="./assets/img/video/honda-nsx-neon-gas-station-moewalls-com.mp4" controls loop muted></video> -->--}}
{{--                <video--}}
{{--                        class="w-full h-full overflow-hidden bg-red-500"--}}
{{--                        src="{{asset('storage/image/myvideo.mp4')}}"--}}
{{--                        autoplay--}}
{{--                        controls--}}
{{--                        muted--}}
{{--                ></video>--}}
{{--                <!-- <video class="w-full h-full overflow-hidden" src="./assets/img/video/retro-delorean-floating-moewalls-com.mp4" autoplay loop muted></video> -->--}}
{{--                <!-- <video class="w-full h-full overflow-hidden" src="./assets/img/video/silent-hill-2-remake-moewalls-com.mp4" autoplay loop muted></video> -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



    <style>
        *{
            box-sizing:border-box;
        }

        .audio-player{

            max-width:1200px;

            background:#07164f;
            border-radius:20px;
            display:flex;
            align-items:center;
            /* gap:2px; */

        }

        .play-btn{
            width:50px;
            height:50px;
            border:none;
            border-radius:50%;
            background:#ff8c1a;
            color:#fff;
            font-size:20px;
            cursor:pointer;
            flex-shrink:0;
        }

        .time{
            color:#fff;
            font-size:16px;
            min-width:75px;
            text-align:center;
        }

        .progress{
            flex:1;
            height:4px;
            appearance:none;
            background:#6973a8;
            border-radius:50px;
        }

        .progress::-webkit-slider-thumb{
            appearance:none;
            width:20px;
            height:20px;
            border-radius:50%;
            background:#ff8c1a;
            cursor:pointer;
        }

        .waveform{
            display:flex;
            align-items:center;
            gap:3px;
        }

        .waveform span{
            width:4px;
            background:#ff8c1a;
            border-radius:10px;

        }

        .animate{
            animation:wave 1.2s infinite ease-in-out;
        }

        .waveform span:nth-child(1){height:11px;}
        .waveform span:nth-child(2){height:25px;}
        .waveform span:nth-child(3){height:39px;}
        .waveform span:nth-child(4){height:58px;}
        .waveform span:nth-child(5){height:70px;}
        .waveform span:nth-child(6){height:52px;}
        .waveform span:nth-child(7){height:35px;}
        .waveform span:nth-child(8){height:60px;}
        .waveform span:nth-child(9){height:50px;}
        .waveform span:nth-child(10){height:30px;}
        .waveform span:nth-child(11){height:17px;}
        .waveform span:nth-child(12){height:10px;}

        @keyframes wave{
            0%,100%{
                transform:scaleY(.7);
            }
            50%{
                transform:scaleY(1);
            }
        }
    </style>

    <div class="audio-player w-11/12 mx-auto flex py-2 px-2 mt-5" dir="ltr">
        <audio id="audio" src="./88ad9a87-0c6c-4dc7-9a24-9c31e7c18c5d.mp3"></audio>

        <button id="playBtn" class="play-btn flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4" fill="white"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
        </button>

        <span id="currentTime" class="time">00:00</span>

        <input
                id="progress"
                class="progress max-w-full"
                type="range"
                min="0"
                max="100"
                value="0"
        >
        <span id="duration" class="time">00:00</span>


        {{--            <div class="waveform">--}}
        {{--                <span></span><span></span><span></span><span></span>--}}
        {{--                <span></span><span></span><span></span><span></span>--}}
        {{--                <span></span><span></span><span></span><span></span>--}}
        {{--            </div>--}}



    </div>

    <script>
        const audio = document.getElementById("audio");
        const playBtn = document.getElementById("playBtn");
        const progress = document.getElementById("progress");
        const currentTime = document.getElementById("currentTime");
        const duration = document.getElementById("duration");

        let wave=document.querySelector('.waveform')

        playBtn.addEventListener("click", () => {
            wave.classList.toggle('animate')
            if(audio.paused){
                audio.play();
                playBtn.textContent = "❚❚";

            }else{
                audio.pause();
                playBtn.innerHTML=""
                let cree=document.createElement('div')
                cree.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4" fill="white"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>`
                playBtn.appendChild(cree)
            }
        });

        audio.addEventListener("loadedmetadata", () => {
            duration.textContent = formatTime(audio.duration);
        });

        audio.addEventListener("timeupdate", () => {
            currentTime.textContent = formatTime(audio.currentTime);

            const percent =
                (audio.currentTime / audio.duration) * 100;

            progress.value = percent || 0;
        });

        progress.addEventListener("input", () => {
            audio.currentTime =
                (progress.value / 100) * audio.duration;
        });

        audio.addEventListener("ended", () => {
            playBtn.textContent = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>`
        });

        function formatTime(seconds){
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);

            return `${String(mins).padStart(2,"0")}:${String(secs).padStart(2,"0")}`;
        }
    </script>



{{--        <section class="w-full h-37 mx-auto flex gap-1 flex gap-2 justify-between items-center mt-3">--}}
{{--            <div class="w-9/24 h-full flex flex-col justify-center relative">--}}
{{--                <img src="{{asset('storage/mahdi/IMG_20260602_190617_180.jpg')}}" alt="" class="w-full h-full rounded-xl">--}}
{{--                <div class="w-1/2 h-full flex flex-col justify-center gap-2.5 absolute right-3 top-0">--}}
{{--                    <span class="text-[6px] text-[#f6911e]">پادکست ویژه</span>--}}
{{--                    <div class="flex flex-col gap-1 justify-start text-[11px] font-bold">--}}
{{--                        <h3>یادگیری زبان</h3>--}}
{{--                        <h4>در سفر</h4>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col gap-1 justify-start text-[6px]">--}}
{{--                        <span>گوش دادن در هر زمان</span>--}}
{{--                        <span>و در هر مکان</span>--}}
{{--                    </div>--}}
{{--                    <button class="w-14 py-1 bg-white rounded-lg flex gap-1 justify-center items-center">--}}
{{--                        <span class="text-[7px]">گوش دهید</span>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-2"><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-secondary" d=""/><path class="fa-primary" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="w-full h-1/2 bg-[#fce4c8] rounded-xl flex justify-center items-center">--}}
{{--                    <span class="text-md font-bold text-[#f6911e]"> تعیین سطح</span>--}}
{{--                </div>--}}
{{--                <div class="w-full h-1/2 bg-[#fce4c8] rounded-xl flex justify-center items-center">--}}
{{--                    <span class="text-md font-bold">شرکت در دوره</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="w-15/24 h-full">--}}
{{--                <video class="w-full h-full object-cover rounded-xl"--}}
{{--                        src="{{asset('storage/image/myvideo.mp4')}}"--}}
{{--                        autoplay--}}
{{--                        controls--}}
{{--                        muted--}}
{{--                ></video>--}}
{{--            </div>--}}

{{--        </section>--}}


    <!-- Discuss -->
{{--    <section class="w-full flex flex-row items-center justify-between gap-5 mt-5 b md:mt-20">--}}
{{--        <div--}}
{{--                class="w-6/12 md:w-5/11 h-20 sm:h-30 md:h-60 bg-[#D3C0F9] text-[#fff] font-bold hover:translate-y-[-10px] transition-all rounded-md flex items-center justify-center  text-xl md:text-4xl cursor-pointer"--}}
{{--        >--}}
{{--            تعیین سطح--}}
{{--        </div>--}}
{{--        <div--}}
{{--                class="w-6/12 md:w-5/11 h-20 sm:h-30 md:h-60 bg-[#B5DDD1] text-[#fff] font-bold hover:translate-y-[-10px] transition-all rounded-md flex items-center justify-center  text-xl md:text-4xl cursor-pointer"--}}
{{--        >--}}
{{--            شرکت در دوره--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    firest--}}

{{--    <section class="w-full h-22 flex gap-2 mt-3">--}}
{{--        <div class="w-1/2 h-full bg-[#ff9a1e] rounded-xl flex justify-center items-center gap-2 ">--}}
{{--            <div class="flex flex-col items-start justify-center">--}}
{{--                <span class="text-[14px] font-bold text-white">تعیین سطح</span>--}}
{{--                <span class="text-[9px] text-[#ffc29c]">سطح خود زا یسنج</span>--}}
{{--            </div>--}}
{{--            <div class="w-10 h-10 bg-[#de5e05] rounded-full flex justify-center items-center relative">--}}
{{--                <img src="{{asset('storage/mahdi/0f00dcf3-c9d0-4d42-a7cf-25719003dadc.jpg')}}" alt="" class="object-cover rounded-full w-2/3">--}}
{{--                <div class="w-5 h-5 rounded-full absolute -left-1.5 -bottom-1.5 bg-[#f98300] flex justify-center items-center">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2/3 rotate-90" fill="white">--}}
{{--                        <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->--}}
{{--                        <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="w-1/2 h-full bg-[#1a2940] rounded-xl flex justify-center items-center gap-2">--}}
{{--            <span class="text-md font-bold">شرکت در دوره</span>--}}

{{--            <div class="flex flex-col items-start justify-center">--}}
{{--                <span class="text-[14px] font-bold text-white">شزکت در دوره</span>--}}
{{--                <span class="text-[9px] text-[#b2b3bb]">همین حالا شزوع کن</span>--}}
{{--            </div>--}}
{{--            <div class="w-10 h-10 bg-[#030000] rounded-full flex justify-center items-center relative">--}}
{{--                <img src="{{asset('storage/mahdi/611cf78f-3fe5-402d-91a4-20a807788ad9.jpg')}}" alt="" class="object-cover rounded-full w-2/3">--}}
{{--                <div class="w-5 h-5 rounded-full absolute -left-1.5 -bottom-1.5 bg-[#f98300] flex justify-center items-center">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2/3 rotate-90" fill="white">--}}
{{--                        <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->--}}
{{--                        <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}

    {{--    firest--}}

    <!-- تعیین سصح -->
    <section class="w-11/12 mx-auto mt-5 flex gap-1">
        <div class="w-1/2 h-full bg-white flex flex-col relative rounded-xl border-1 border-white" style="box-shadow:0.5PX 0.5PX 5PX #d4d4e6">
            <img src="{{asset('storage/mahdi/file_00000000fb4471fbbcb3f2b09783b365.png')}}" alt="" class="object-cover w-full h-full rounded-xl">
            <div class="w-full h-full absolute py-1.5 pl-3 flex flex-col justify-between gap-1 items-end">
                <div class="flex gap-4 items-center">
                    <div class="flex flex-col">
                        <h3 class="text-[16px] font-bold">تعیین سطج</h3>
                        <h4 class="text-[12px] font-bold">سطج خود </h4>
                    </div>
                    <div class="w-12 h-12 bg-white rounded-full border-3 border-[#f5d5b2] p-[1px] flex justify-center items-center">
                        <div class="w-full h-full bg-[#fa6004] rounded-full  p-1.5 flex justify-center items-center overflow-hidden">
                            <img src="{{asset('storage/mahdi/file_0000000083ec71f489146d02f60521c4.png')}}" alt="" class="object-cover w-full h-full">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1 items-start">
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3" viewBox="0 0 36 36" fill="#ff9a1e"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] font-bold">تست استاندارد </span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3" viewBox="0 0 36 36" fill="#ff9a1e"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] font-bold">مشخص کردن</span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3" viewBox="0 0 36 36" fill="#ff9a1e"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] font-bold">تست استاندارد</span>
                    </div>
                </div>
                <div class="px-3 py-1.5 bg-[#ff9a1e] rounded-xl flex gap-1 justify-center items-center">
                    <span class="text-[10px] text-white  font-bold">تعیین سطح </span>
                    <div class="w-3 h-3 rounded-full  bg-[#f98300] flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -50 448 512" class="size-3 rotate-90" fill="white">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2 min-h-full bg-white flex flex-col justify-end items-end relative rounded-xl border-1 border-white" style="box-shadow:0.5PX 0.5PX 5PX #d4d4e6">
            <img src="{{asset('storage/mahdi/949c2d04-e7eb-4bd4-92a4-4f6bffa86ddb.jpg')}}" alt="" class="object-cover size-10/12">

            <div class="w-full h-full absolute py-1.5 pr-3 flex flex-col justify-between gap-1 items-start">
                <div class="w-full flex gap-4 items-center justify-center">
                    <div class="flex flex-col text-center">
                        <h4 class="text-[16px] font-bold text-[#051b61]">شرکت در دوره</h4>
                        <span class="text-[12px] font-bold text-[#051b61]">همین حالا </span>
                    </div>
                    <div class="w-12 h-12 bg-white rounded-full border-3 border-[#E6EBF1] p-[1px] flex justify-center items-center">
                        <div class="w-full h-full bg-[#002284] rounded-full  p-1.5 flex justify-center items-center overflow-hidden">
                            <img src="{{asset('storage/mahdi/file_0000000068a071f4b4abc9e3fcc298aa.png')}}" alt="" class="object-cover w-full h-full">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1 items-start">
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3" viewBox="0 0 36 36" fill="#1a2940"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] font-bold text-[#051b61]">دوره های کاربردی</span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3" viewBox="0 0 36 36" fill="#1a2940"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] font-bold text-[#051b61]">اسانید حرفه ای</span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3" viewBox="0 0 36 36" fill="#1a2940"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] font-bold text-[#051b61]">تست استاندارد </span>
                    </div>
                </div>
                <div class="px-2 py-1.5 bg-[#002284] rounded-xl flex gap-1 justify-center items-center">
                    <span class="text-[10px] text-white  font-bold">مشاهده دوره ها</span>
                    <div class="w-3 h-3 rounded-full  bg-[#121e32] flex justify-center items-center">
                        <svg viewBox="0 -50 448 512" class="size-3 rotate-90" fill="white">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- تعیین سصح -->

    <!-- پادکست -->
    <section class="w-11/12 mx-auto mt-5 flex gap-1 ">
        <div class="w-5/12 min-h-full flex relative rounded-xl border-1 border-white" style="box-shadow:0.5PX 0.5PX 5PX #d4d4e6">
            <img src="{{asset('storage/mahdi/file_000000009644720aa1772eca64c64eda.png')}}" alt="" class="object-cover w-full h-full rounded-xl">
            <div class="w-11/20 h-full absolute flex flex-col justify-between items-center py-4">
                <span class="text-[6px] text-[#ff9a1e] font-bold">پادکست صوتی</span>
                <h5 class="text-[8px] font-bold">یادگیری زبان در سفر</h5>
                <span class="text-[6px] text-[#ff9a1e]">پادکست صو صوتی</span>
                <button class="w-14 py-1 bg-white rounded-lg flex gap-1 justify-center items-center">
                    <span class="text-[6px]">گوش دهید</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-2"><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-secondary" d=""/><path class="fa-primary" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                </button>
            </div>
        </div>
        <div class="w-7/12 min-h-full bg-[#2A137F] rounded-xl relative flex justify-start items-end border-1 border-[#8975c4] " style="box-shadow:0.5PX 0.5PX 5PX #c4b1f8">
{{--            <img src="{{asset('storage/mahdi/62b9d691-c5c5-4ad3-af82-695af5fc89a4.jpg')}}" alt="" class="object-cover w-full h-full rounded-xl">--}}
{{--            <div class="w-full h-full absolute flex flex-col  justify-between items-end pl-5 py-5">--}}
{{--                <h3 class="text-[14px] text-white font-bold"> چرا اسم لبوها شد آشیانه؟</h3>--}}
{{--                <button class="w-5/12 h-6  rounded-xl flex gap-1 justify-center items-center border-1 border-white">--}}
{{--                    <span class="text-[8px] text-white">بیشتر بخوانید</span>--}}
{{--                    <div class="w-3 h-3 rounded-full flex justify-center items-center">--}}
{{--                        <svg viewBox="0 -50 448 512" class="size-2 rotate-90" fill="white">--}}
{{--                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->--}}
{{--                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </button>--}}
{{--            </div>--}}

            <img src="{{asset('storage/mahdi/ChatGPT Image Jun 6, 2026, 04_45_18 PM.png')}}" alt="" class="size-15">

            <div class="w-full h-full absolute flex flex-col  justify-between items-end pl-7 py-3">
                <h3 class="text-[17px] text-white font-bold">هم بحثیتو پیدا کن</h3>
                <button class="w-5/12 h-6  rounded-xl flex gap-1 justify-center items-center border-1 border-white">
                    <span class="text-[8px] text-white">بیشتر بخوانید</span>
                    <div class="w-3 h-3 rounded-full flex justify-center items-center">
                        <svg viewBox="0 -50 448 512" class="size-2 rotate-90" fill="white">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                </button>
            </div>




        </div>
    </section>
    <!-- پادکست -->

{{--    <section--}}
{{--            class=" mt-5 w-full h-20 flex items-center justify-between text-zinc-100 overflow-hidden cursor-pointer rounded-md transition-all flex justify-between items-center"--}}
{{--    >--}}
{{--        <img src="{{ asset('storage/image/dastNevis.png') }}" class="max-w-5/12" alt="">--}}
{{--        <div class=" max-w-7/12">--}}
{{--            <img src="{{ asset('storage/image/Screenshot_20260409_130146_Chrome.jpg') }}" alt="" class="object-cover max-w-full">--}}
{{--        </div>--}}


{{--        <div class="font-bold text-lg flex items-center justify-center">--}}
{{--            بزن بریم هم بحثتو پیدا کنیم--}}
{{--        </div>--}}
{{--        <div class="peerr transition-all duration-500 decoration-500 ml-3">--}}
{{--            <svg--}}
{{--                    class="size-10 fill-zinc-100"--}}
{{--                    viewBox="0 0 448 512"--}}
{{--            >--}}
{{--                <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->--}}
{{--                <path--}}
{{--                        d="M7.4 273.4C2.7 268.8 0 262.6 0 256s2.7-12.8 7.4-17.4l176-168c9.6-9.2 24.8-8.8 33.9 .8s8.8 24.8-.8 33.9L83.9 232 424 232c13.3 0 24 10.7 24 24s-10.7 24-24 24L83.9 280 216.6 406.6c9.6 9.2 9.9 24.3 .8 33.9s-24.3 9.9-33.9 .8l-176-168z"--}}
{{--                />--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- link -->
    <!-- Reading  -->
{{--    <section class="w-full mt-5 md:mt-20">--}}
{{--        <div class="w-full flex items-center mx-auto">--}}
{{--            <span--}}
{{--                    class="w-35 md:w-48 min-w-fit text-zinc-700 text-xs md:text-sm md:font-yekanBakhBold"--}}
{{--            >--}}
{{--              ویس های زبان--}}
{{--            </span>--}}
{{--            <span--}}
{{--                    class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-500 to-white"--}}
{{--            ></span>--}}
{{--            <div class="w-32 min-w-fit text-left">--}}
{{--                <a--}}
{{--                        href=""--}}
{{--                        class="text-sm hover:text-orange-500 text-zinc-600 flex fle items-center gap-x-1 group"--}}
{{--                >--}}
{{--                    مشاهده همه--}}
{{--                    <svg--}}
{{--                            class="fill-zinc-600 hover:fill-orange-500 group-hover:-translate-x-1 transition group-hover:fill-orange-500 size-2.5 md:size-3"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            width=""--}}
{{--                            height=""--}}
{{--                            fill=""--}}
{{--                            viewBox="0 0 256 256"--}}
{{--                    >--}}
{{--                        <path--}}
{{--                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"--}}
{{--                        ></path>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div--}}
{{--                class="w-full rounded-md mt-5 p-5"--}}
{{--        >--}}
{{--            <div class="w-full">--}}
{{--                <audio--}}
{{--                        controls--}}
{{--                        class="w-full"--}}
{{--                        src="./assets/music/Track No01.mp3"--}}
{{--                >--}}
{{--                    <!-- <source  type="audio/mpeg"> -->--}}
{{--                </audio>--}}
{{--            </div>--}}
{{--            <div--}}
{{--                    class="audio-container relative bg-gray-900 rounded-2xl p-6 shadow-2xl mt-5"--}}
{{--                    dir="ltr"--}}
{{--            >--}}
{{--                <audio id="myAudio" class="hidden">--}}
{{--                    <source src="./assets/music/Track No01.mp3" type="audio/mpeg" />--}}
{{--                    مرورگر شما از audio پشتیبانی نمی‌کند.--}}
{{--                </audio>--}}

{{--                <!-- کنترل‌های سفارشی -->--}}
{{--                <div class="flex items-center space-x-4">--}}
{{--                    <!-- دکمه پخش/توقف -->--}}
{{--                    <button--}}
{{--                            id="playBtn"--}}
{{--                            onclick="togglePlay()"--}}
{{--                            class="play-btn p-4 bg-purple-600 rounded-full hover:bg-purple-700 active:scale-95 transition-all duration-300 shadow-lg"--}}
{{--                    >--}}
{{--                  <span id="playIcon">--}}
{{--                        ▶️--}}
{{--                  </span>--}}
{{--                    </button>--}}

{{--                    <!-- progress bar -->--}}
{{--                    <div class="flex-1 mx-4">--}}
{{--                        <div--}}
{{--                                class="w-full bg-gray-700 rounded-full h-2 cursor-pointer group hover:h-3 transition-all"--}}
{{--                                onclick="setPosition(event)"--}}
{{--                        >--}}
{{--                            <div--}}
{{--                                    id="progress"--}}
{{--                                    class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full w-0 shadow-md transition-all"--}}
{{--                            ></div>--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-between text-sm text-gray-400 mt-2">--}}
{{--                            <span id="currentTime">00:00</span>--}}
{{--                            <span id="duration">00:00</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- صدا -->--}}
{{--                    <input--}}
{{--                            type="range"--}}
{{--                            id="volume"--}}
{{--                            min="0"--}}
{{--                            max="1"--}}
{{--                            step="0.1"--}}
{{--                            value="1"--}}
{{--                            class="w-20 h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-purple-600 hover:accent-purple-500"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}









{{--    </section>--}}
    <!-- paragraph -->
{{--    <section class="w-full mt-5 md:mt-20">--}}
{{--        <div class="w-full flex items-center mx-auto">--}}
{{--            <span--}}
{{--                    class="w-48 min-w-fit text-zinc-700 text-xs md:text-sm md:font-yekanBakhBold"--}}
{{--            >--}}
{{--              چرا ما رو باید انتخاب کنین:</span--}}
{{--            >--}}
{{--            <span--}}
{{--                    class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-500 to-white"--}}
{{--            ></span>--}}
{{--            <div class="w-32 min-w-fit text-left">--}}
{{--                <a--}}
{{--                        href=""--}}
{{--                        class="text-sm hover:text-orange-500 text-zinc-600 flex fle items-center gap-x-1 group"--}}
{{--                >--}}
{{--                    مشاهده راه--}}
{{--                    <svg--}}
{{--                            class="fill-zinc-600 hover:fill-orange-500 group-hover:-translate-x-1 transition group-hover:fill-orange-500 size-2.5 md:size-3"--}}
{{--                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                            width=""--}}
{{--                            height=""--}}
{{--                            fill=""--}}
{{--                            viewBox="0 0 256 256"--}}
{{--                    >--}}
{{--                        <path--}}
{{--                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"--}}
{{--                        ></path>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- <div class="text-4xl font-serif">--}}
{{--                   چرا ما رو باید انتخاب کنین:--}}
{{--              </div> -->--}}
{{--        <div--}}
{{--                onclick="menu(this)"--}}
{{--                class="w-full bg-white border-1 border-zinc-200 rounded-xl h-20 overflow-hidden mt-5 p-5 transition-all duration-500 decoration-500"--}}
{{--        >--}}
{{--            <div--}}
{{--                    class="menu flex flex-col items-end gap-y-8 transition-all duration-500"--}}
{{--            >--}}
{{--                <div class="w-full flex items-center justify-between" dir="ltr">--}}
{{--                    <span class="text-lg md:text-2xl"> rodmap? </span>--}}
{{--                    <div class="svg">--}}
{{--                        <svg--}}
{{--                                class="size-5"--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                viewBox="0 0 448 512"--}}
{{--                        >--}}
{{--                            <path--}}
{{--                                    d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"--}}
{{--                            />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col">--}}
{{--                    <span class="">با ما زبان رو طوری دیگر یاد میگیر :</span>--}}
{{--                    <img--}}
{{--                            class="max-w-100 max-h-60"--}}
{{--                            src="./assets/img/hadaf/Shimpv1000367www.tiktarh.com_.jpg"--}}
{{--                            alt=""--}}
{{--                    />--}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col">--}}
{{--                <span class=""--}}
{{--                >تیم ما همیشه امادس تا در های موفیت رو روت باز کنه :</span--}}
{{--                >--}}
{{--                    <img--}}
{{--                            class="max-w-100 max-h-60"--}}
{{--                            src="./assets/img/hadaf/Shimpv1000397www.tiktarh.com_.jpg"--}}
{{--                            alt=""--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- blog -->
    <section class="w-full mt-5 md:mt-20">
        <div class="w-full flex items-center mx-auto">
            <span
                    class="w-48 min-w-fit text-zinc-700 text-xs md:text-sm md:font-yekanBakhBold"
            >جدید ترین مقالات</span
            >
            <span
                    class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-500 to-white"
            ></span>
            <div class="w-32 min-w-fit text-left">
                <a
                        href=""
                        class="text-sm hover:text-orange-500 text-zinc-600 flex fle items-center gap-x-1 group"
                >
                    مشاهده همه
                    <svg
                            class="fill-zinc-600 hover:fill-orange-500 group-hover:-translate-x-1 transition group-hover:fill-orange-500 size-2.5 md:size-3"
                            xmlns="http://www.w3.org/2000/svg"
                            width=""
                            height=""
                            fill=""
                            viewBox="0 0 256 256"
                    >
                        <path
                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"
                        ></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="w-full flex items-center mx-auto mt-5">
            <div
                    class="overflow-x-auto flex flex-row rounded-xl mx-auto px-[16px] py-[32px] [&::-webkit-scrollbar]:w-0.5 [&::-webkit-scrollbar-thumb]:bg-orange-500 [&::-webkit-scrollbar-thumb]:rounded-full"
            >
                <div class="flex flex-row gap-3">
                    <a href="" class="min-w-30  overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/nody-عکس-پروفایل-aوm-باهم-1630591365.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/3D.Alphabet.PNG.2.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/alphabet4.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/nody-عکس-پروفایل-aوm-باهم-1630591365.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/3D.Alphabet.PNG.2.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/alphabet4.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/nody-عکس-پروفایل-aوm-باهم-1630591365.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/3D.Alphabet.PNG.2.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/image/alphabet4.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
{{--                    <a--}}
{{--                            href=""--}}
{{--                            class="w-[330px] bg-white min-h-60 rounded-2xl border hover:border-orange-500 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg hover:text-orange-500"--}}
{{--                    >--}}
{{--                        <div class="block overflow-hidden rounded-lg md:rounded-2xl">--}}
{{--                            <img--}}
{{--                                    src="{{asset('assets/img/38281431-4660-4c1c-a751-919550661c45.png')}}"--}}
{{--                                    alt="vlag"--}}
{{--                                    class="rounded-lg md:rounded-2xl max-h-56 w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110"--}}
{{--                            />--}}
{{--                        </div>--}}
{{--                        <div class="p-1 mt-3">--}}
{{--                            <p class="text-xs md:text-sm">--}}
{{--                                بهترین کیبرد بازار برای گیم و برنامه نویسی جی پیشنهاد--}}
{{--                                میشه؟--}}
{{--                            </p>--}}
{{--                            <div class="flex items-center justify-between mt-3">--}}
{{--                      <span class="text-xs text-zinc-500 flex items-center">--}}
{{--                        <svg--}}
{{--                                class="fill-zinc-400"--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                width="16"--}}
{{--                                height="16"--}}
{{--                                fill=""--}}
{{--                                viewBox="0 0 256 256"--}}
{{--                        >--}}
{{--                          <path--}}
{{--                                  d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"--}}
{{--                          ></path>--}}
{{--                        </svg>--}}
{{--                        1404/02/19</span--}}
{{--                      >--}}
{{--                                <span class="flex items-center text-xs md:text-sm">--}}
{{--                        ادامه مطلب--}}
{{--                        <svg--}}
{{--                                class="fill-zinc-600 hover:fill-orange-500 group-hover:-translate-x-1 transition group-hover:fill-orange-500 size-2.5 md:size-3"--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                width=""--}}
{{--                                height=""--}}
{{--                                fill=""--}}
{{--                                viewBox="0 0 256 256"--}}
{{--                        >--}}
{{--                          <path--}}
{{--                                  d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"--}}
{{--                          ></path>--}}
{{--                        </svg>--}}
{{--                      </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </section>
</main>

{{--tasc Amir end--}}



{{--<script src="./english_header.js"></script>--}}
<script>
            {{--tasc mahdi--}}
    for(let j=0;j<7;j++){
        let mmjjjkk=`<div class="w-full min-py-1 flex gap-2 pr-2 justify-between border-r-2 border-[blue]" id="mmjjjkk">
                                            <div class="w-10/12 flex gap-2">
                                                <div>
                                                    <div class="w-10 h-10 rounded-full overflow-hidden border-1">
                                                        <img src="{{asset('assets/img/user.png')}}" alt="" class="object-cover">
                                                    </div>
                                                </div>
                                                <div class="w-10/12 py-1 flex flex-col gap-1">
                                                    <div class="flex gap-2">
                                                        <span class="text-xs text-[#c3c4c7]">mahdi_1111</span>
                                                        <span class="text-xs text-[#c3c4c7]">14h</span>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs lg:text-sm">متن_تستی متن_تستی متن_تستی متن_تستی متن_تستی</p>
                                                    </div>
                                                    <div class="flex">
                                                        <span class="text-xs text-[#c3c4c7]">پاسخ</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-2 items-center">
                                                <div class="like_change_svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5" fill="black" id="no_like_in_comment"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 hidden" fill="red"  id="like_in_comment"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>
                                                </div>
                                                <span class="text-black text-sm text-nowrap">235 هزار</span>
                                            </div>
                                        </div>`
        console.log(mmjjjkk)
        let classElement=document.createElement('div')
        classElement.innerHTML=mmjjjkk
        mmmmkkkkddd.appendChild(classElement)
    }



    let story=document.querySelectorAll('.pup_up_story')
    console.log(story)
    story.forEach((item)=>{
        item.addEventListener('click',function(){
            if(item.nextElementSibling.children[0].classList.contains('invisible')){
                item.nextElementSibling.children[0].classList.remove('invisible')
                item.nextElementSibling.children[0].classList.remove('opacity-0')
                item.nextElementSibling.children[1].classList.remove('invisible')
                item.nextElementSibling.children[1].classList.remove('opacity-0')
            }
        })
    })
    let pup_up_story_items=document.getElementById('pup_up_story_items')
    let pup_up_story_black=document.getElementById('pup_up_story_black')
    function pup_up_story_close_out(){
        console.log('skdbf.s')
        pup_up_story_items.classList.add('invisible')
        pup_up_story_items.classList.add('opacity-0')
        pup_up_story_black.classList.add('invisible')
        pup_up_story_black.classList.add('opacity-0')
    }

    let like_change_svg=document.querySelectorAll('.like_change_svg')

    like_change_svg.forEach((item)=>{
        item.addEventListener('click',function(){
            item.children[1].classList.toggle('hidden')
            item.children[0].classList.toggle('hidden')
        })
    })

    let show_reply=document.querySelectorAll('.show_reply')

    show_reply.forEach((item)=>{
        item.addEventListener('click',function(){


            if(item.nextElementSibling.classList.contains('max-h-145')){
                item.nextElementSibling.classList.remove('max-h-145')
                item.nextElementSibling.classList.remove('max-h-75')
                // item.nextElementSibling.classList.remove('pb-5')
                item.nextElementSibling.classList.add('max-h-0')
            }else{
                item.nextElementSibling.classList.toggle('max-h-0')
                item.nextElementSibling.classList.toggle('max-h-75')
                // item.nextElementSibling.classList.toggle('pb-5')
            }
        })
    })
    let all_reply=document.querySelectorAll('.all_reply')
    all_reply.forEach((item)=>{
        item.addEventListener('click',function(){
            item.parentElement.classList.toggle('max-h-75')
            item.parentElement.classList.toggle('max-h-145')
        })
    })

    let more_comment_item=document.getElementById('more_comment_item')
    let more_comment_up_down=document.getElementById('more_comment_up_down')
    function more_comment(viwe){
        if(viwe=='up'){
            if(more_comment_item.classList.contains('h-1/2')){
                more_comment_item.classList.remove('h-1/2')
                more_comment_item.classList.add('h-full')
            }
        }
        if(viwe=='dowen'){
            if(more_comment_item.classList.contains('h-full')){
                more_comment_item.classList.add('h-1/2')
                more_comment_item.classList.remove('h-full')
            }else{
                more_comment_item.classList.remove('h-1/2')
                more_comment_item.classList.add('h-0')
            }
        }
    }
    function open_command(){
        more_comment_item.classList.remove('h-0')
        more_comment_item.classList.add('h-1/2')
    }
            {{--tasc mahdi--}}

//     amir.script
    const audio = document.getElementById("myAudio");
    const playBtn = document.getElementById("playBtn");
    const playIcon = document.getElementById("playIcon");
    const progress = document.getElementById("progress");
    const currentTimeEl = document.getElementById("currentTime");
    const durationEl = document.getElementById("duration");
    const volume = document.getElementById("volume");

    let isPlaying = false;

    // پخش/توقف
    function togglePlay() {
        if (isPlaying) {
            audio.pause();
        } else {
            audio.play();
        }
    }

    // آپدیت UI
    audio.addEventListener("play", () => {
        isPlaying = true;
        playIcon.textContent = "⏸️";
        playBtn.classList.add("bg-pink-600", "hover:bg-pink-700");
    });

    audio.addEventListener("pause", () => {
        isPlaying = false;
        playIcon.textContent = "▶️";
        playBtn.classList.remove("bg-pink-600", "hover:bg-pink-700");
        playBtn.classList.add("bg-purple-600", "hover:bg-purple-700");
    });

    // Progress bar
    audio.addEventListener("timeupdate", () => {
        const percent = (audio.currentTime / audio.duration) * 100;
        progress.style.width = percent + "%";

        currentTimeEl.textContent = formatTime(audio.currentTime);
    });

    audio.addEventListener("loadedmetadata", () => {
        durationEl.textContent = formatTime(audio.duration);
    });

    // تنظیم موقعیت
    function setPosition(event) {
        const rect = event.target.getBoundingClientRect();
        const pos = (event.clientX - rect.left) / rect.width;
        audio.currentTime = pos * audio.duration;
    }

    // صدا
    volume.addEventListener("input", () => {
        audio.volume = volume.value;
    });

    // فرمت زمان
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins.toString().padStart(2, "0")}:${secs
            .toString()
            .padStart(2, "0")}`;
    }

    function menu(meno) {
        meno.classList.toggle("h-20");
        meno.classList.toggle("py-5");
    }


</script>

{{--tastk_mahdi_end--}}

</body>
</html>