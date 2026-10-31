@extends('client.document')
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
@section('title', 'رینسو | منوی دیجیتال کسب و کار شما')
@section('content')
    <script>
        let flag = "{{ Auth::check() }}"
    </script>
    <style>
        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <main class="flex flex-col gap-3">
        <!-- filter -->
        <section class="w-full px-5 bg-white h-10 mx-auto flex justify-center mt-1.5">
            <div class="w-full flex items-center justify-end">
                <div class="w-1/3 flex items-center justify-center gap-2 cursor-pointer">
                    <img src="{{ asset('storage/mahdi/8c65ff18-bf87-4a68-b814-cc4b24a2ee59.jpg') }}" alt=""
                        class="w-4">
                    <div class="flex items-center gap-0.5 text-xs">
                        <span>بناب</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2">
                            <path
                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                        </svg>
                    </div>

                </div>
                <div class="w-1/3 flex gap-2 items-center justify-end cursor-pointer" id="createPageLink" onclick="createPageLinkFunc()">
                    <div class="flex justify-center items-center rounded-xl border-1 border-[#efefef] gap-1 px-2 py-1">
                        <div>
                            {{--                            <svg class="w-3" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" ><path class="clr-i-outline clr-i-outline-path-1" d="M14,4H6A2,2,0,0,0,4,6v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V6A2,2,0,0,0,14,4ZM6,14V6h8v8Z"></path><path class="clr-i-outline clr-i-outline-path-2" d="M30,4H22a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V6A2,2,0,0,0,30,4ZM22,14V6h8v8Z"></path><path class="clr-i-outline clr-i-outline-path-3" d="M14,20H6a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V22A2,2,0,0,0,14,20ZM6,30V22h8v8Z"></path><path class="clr-i-outline clr-i-outline-path-4" d="M30,20H22a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V22A2,2,0,0,0,30,20ZM22,30V22h8v8Z"></path><rect class="clr-i-solid clr-i-solid-path-1" x="4" y="4" width="12" height="12" rx="2" ry="2" style="display:none"></rect><rect class="clr-i-solid clr-i-solid-path-2" x="20" y="4" width="12" height="12" rx="2" ry="2" style="display:none"></rect><rect class="clr-i-solid clr-i-solid-path-3" x="4" y="20" width="12" height="12" rx="2" ry="2" style="display:none"></rect><rect class="clr-i-solid clr-i-solid-path-4" x="20" y="20" width="12" height="12" rx="2" ry="2" style="display:none"></rect></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                                <path fill="#f6911e"
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-(--primary-text-color)">پیجتو بساز</span>
                    </div>
                </div>

            </div>
        </section>
        <!-- filter -->
        <!-- esloyder -->
        <section class="w-full flex justify-center relative px-5">
            <div class="w-full bg-[#131f2f] rounded-xl flex px-3 py-3">
                <div class="w-1/2 h-full overflow-hidden flex justify-center items-center">
                    <img src="{{ asset('storage/mahdi/b460793d-5101-464d-83e2-7e8ab6773448.jpg') }}" alt=""
                        class="object-cover w-10/12">
                </div>
                <div class="w-1/2 h-full flex flex-col justify-center items-center py-5">
                    <div class="w-full flex flex-col items-end gap-2">
                        <h2 class="text-xs font-bold text-white">مدیریت کسب و کار و مشتریان</h2>
                        <div class="w-11/12 gap-0.5 flex items-center justify-end text-xs">
                            <span class="text-[#eda76e]">ساده</span>
                            <span class="text-white text-xs">و</span>
                            <p class="text-[#eda76e]">هوش<span class="text-[#d4823f]">مند</span></p>
                            {{--                            <span class="text-white text-xs">و</span> --}}
                            <span class="text-[#2d2016]">یکپارچه</span>
                        </div>
                        <button class="px-2 py-2 bg-[#f6911e] rounded-lg flex gap-1 items-center justify-center">
                            <a href="#" class="text-sm fout-bold text-white">همین حالا شروع کن</a>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2 rotate-90"
                                    fill="white">
                                    <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <!-- chaleng_aloyder  -->
            <div class="w-20 bg-[#131f2f] absolute left-auto right-auto bottom-3 flex justify-center items-center gap-1">
                <span class="w-2 h-2 bg-white rounded-full"></span>
                <span class="w-2 h-2 bg-white rounded-full"></span>
                <span class="w-2 h-2 bg-[#f6911e] rounded-full"></span>
            </div>
            <!-- chaleng_aloyder  -->
        </section>
        <!-- esloyder -->

        <!-- خدمات آموزشی -->
        <section class="w-full flex flex-col justify-center items-center gap-1 bg-white pt-1.5 pb-2.5">
            <div class="w-full px-5 flex items-center justify-between">
                <h4 class="text-sm font-bold text-(--primary-text-color)">آموزشگاه رینگا</h4>
                {{--                <div class="flex items-center gap-2"> --}}
                {{--                    <a href="#" class="text-xs text-[#fc8e21]">مشاهده همه</a> --}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2 rotate-90" fill="#fc8e21"><path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path></svg> --}}
                {{--                </div> --}}
            </div>
            <div class="w-full px-5 flex items-center gap-2 overflow-x-auto" style="scrollbar-width:thin;">
                <a href="{{ route('roadmap') }}"
                    class="min-w-22 max-w-22 flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef] rounded-xl">
                    <div class="w-8/12 rounded-sm  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/web.png') }}" alt=""
                            class="min-w-16 max-w-16 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-xs text-nowrap text-(--primary-text-color) font-bold">طراحی وبسایت</span>
                    </div>
                </a>
                <a href="#"
                    class="min-w-22 max-w-22 flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef] rounded-xl">
                    <div class="w-8/12 rounded-sm flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/rintalk.png') }}" alt=""
                            class="min-w-16 max-w-16 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-xs text-nowrap text-(--primary-text-color) font-bold">زبان</span>
                    </div>
                </a>

            </div>
        </section>
        <!-- خدمات آموزشی -->



        <!-- جایگاه های تبلیغاتی -->
        <section class="w-full flex flex-col justify-center items-center gap-2 pt-1.5 pb-2.5 bg-white">
            <div class="w-full px-5 flex items-center justify-between">
                <h4 class="text-sm font-bold text-(--primary-text-color)">جایگاه های تبلیغاتی</h4>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-[#fc8e21]">مشاهده همه</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2 rotate-90" fill="#fc8e21">
                        <path
                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="w-full px-5 flex items-center justify-between gap-2">
                <div class="w-5/12 h-full flex flex-col gap-2 justify-between items-center">
                    <a href="#" class="w-full bg-[#fff1e8] flex gap-1 justify-between items-center p-2 rounded-xl">
                        <div class="w-8/12 flex flex-col justify-center items-start">
                            <h5 class="text-xs font-bold text-(--primary-text-color)">جایگاه تبلیغاتی</h5>
                            <span class="text-xs text-[#fc8e21]">سایز متوسط</span>
                        </div>
                        <div class="w-4/12 relative">
                            <img src="{{ asset('storage/mahdi/eef6684c-1f94-4865-af88-4fd807a85fb2.jpg') }}" alt="">
                            <div
                                class="w-5 h-3 bg-[#e8dfd1] absolute bottom-2 -right-2 rounded-xl text-[8px] text-[#9c928d] flex justify-center items-center">
                                <span>AD</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="w-full bg-[#f1f2f4] flex gap-1 justify-between items-center p-2 rounded-xl">
                        <div class="w-8/12 flex flex-col justify-center items-start">
                            <h5 class="text-xs font-bold text-(--primary-text-color)">جایگاه تبلیغاتی</h5>
                            <span class="text-xs text-[#fc8e21]">سایز متوسط</span>
                        </div>
                        <div class="w-4/12 relative">
                            <img src="{{ asset('storage/mahdi/f1d31b51-9378-4249-98f1-ff3a65a629c7.jpg') }}" alt="">
                            <div
                                class="w-5 h-3 bg-[#e8dfd1] absolute bottom-2 -right-2 rounded-xl text-[8px] text-[#9c928d] flex justify-center items-center">
                                <span>AD</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="w-7/12 h-full bg-[#131f2f] flex justify-between items-center gap-2 rounded-xl relative py-5">
                    <div class="w-5/12 h-full relative flex items-end  overflow-x-hidden">
                        <img src="{{ asset('storage/home/speaker.png') }}" alt=""
                            class="object-cover relative -right-1">
                    </div>
                    <div class="w-7/12 h-full flex flex-col justify-center items-start gap-2">
                        <h5 class="text-sm font-bold text-white">جایگاه تبلیغاتی ویژه</h5>
                        <span class="text-xs text-[#fff]">سایز بزرگ</span>
                        <button class="border-1 px-2 rounded-full border-[#efefef]">
                            <a href="#" class="text-white text-xs">اطلاعات بیشتر</a>
                        </button>
                    </div>
                    <div
                        class="w-5 h-3 bg-[#242c39] absolute bottom-2 left-2 rounded-sm text-[8px] text-[#9c928d] flex justify-center items-center">
                        <span>AD</span>
                    </div>

                </div>

            </div>
        </section>
        <!-- جایگاه های تبلیغاتی -->

        <!-- خدمات پر طرفدار -->
        <section class="w-full flex flex-col bg-white justify-center items-center gap-2 pb-2.5 pt-1.5">
            <div class="w-full px-5 flex items-center justify-between">
                <h4 class="text-sm font-bold text-(--primary-text-color)">خدمات پر طرفدار</h4>
                <div class="flex items-center gap-2">
                    <a href="#" class="text-xs text-[#fc8e21]">مشاهده همه</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2 rotate-90" fill="#fc8e21">
                        <path
                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="w-full px-5 flex items-center gap-2 overflow-x-auto" style="scrollbar-width:thin;">
                <a href="#"
                    class="min-w-20 max-w-20 rounded-xl flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef]">
                    <div class="w-8/12 rounded-full  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/webDesign.jpg') }}" alt=""
                            class="size-12 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-[10px] text-nowrap text-(--primary-text-color) font-bold">طراحی وبسایت</span>
                    </div>
                </a>
               
                <a href="{{route('print.services')}}"
                    class="min-w-20 max-w-20 rounded-xl flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef]">
                    <div class="w-8/12 rounded-full  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/printary.jpg') }}" alt=""
                            class="size-12 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-[10px] text-nowrap text-(--primary-text-color) font-bold">چاپ</span>
                    </div>
                </a>
                <a href="{{ route('computer.services') }}"
                    class="min-w-20 max-w-20 rounded-xl flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef]">
                    <div class="w-8/12 rounded-full  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/laptop.jpg') }}" alt=""
                            class="size-12 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-[10px] text-nowrap text-(--primary-text-color) font-bold"> کامپیوتر</span>
                    </div>
                </a>
                <a href="#"
                    class="min-w-20 max-w-20 rounded-xl flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef]">
                    <div class="w-8/12 rounded-full  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/brick.jpg') }}" alt=""
                            class="size-12 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-[10px] text-nowrap text-(--primary-text-color) font-bold"> ساختمانی</span>
                    </div>
                </a>
                <a href="#"
                    class="min-w-20 max-w-20 rounded-xl flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef]">
                    <div class="w-8/12 rounded-full  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/transport.jpg') }}" alt=""
                            class="size-12 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-[10px] text-nowrap text-(--primary-text-color) font-bold">حمل بار</span>
                    </div>
                </a>
                <a href="{{ route('generalQrCodes.create') }}" onclick="createQrCode(event)"
                    class="min-w-20 max-w-20 rounded-xl flex flex-col items-center gap-1 pt-2 pb-3 border-1 border-[#efefef]">
                    <div class="w-8/12 rounded-full  flex jsutfiy-center items-center overflow-hidden">
                        <img src="{{ asset('storage/home/qrcode.png') }}" alt=""
                            class="size-12 mx-auto object-cover">
                    </div>
                    <div class="w-10/12 flex justify-center">
                        <span class="text-[10px] text-nowrap text-(--primary-text-color) font-bold">ایجاد کد QR</span>
                    </div>
                </a>


            </div>
        </section>
        <!-- خدمات پر طرفدار -->



        {{--        <!-- صفحات پر طرفدار --> --}}
        {{--        <section class="w-full flex flex-col justify-center items-center gap-2"> --}}
        {{--            <div class="w-full px-5 flex items-center justify-between"> --}}
        {{--                <h4 class="text-sm font-bold text-(--primary-text-color)">صفحه ها</h4> --}}
        {{--                <div class="flex items-center gap-2"> --}}
        {{--                    <a href="{{ route('client.allPages') }}" class="text-xs text-[#fc8e21]">مشاهده همه</a> --}}
        {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2 rotate-90" fill="#fc8e21"><path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path></svg> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--            <div class="w-full px-5 py-3 bg-white flex items-center gap-3 overflow-x-auto" style="scrollbar-width: thin;"> --}}
        {{--                @foreach ($pages as $page) --}}
        {{--                    @if ($page->show_in_home) --}}
        {{--                        <a href="{{ route('client.loadLink', $page->id) }}" class="min-w-[120px] max-w-[120px] rounded-xl flex flex-col gap-2 pt-2 pb-3 border-1 border-[#efefef]"> --}}
        {{--                            <div class="w-full rounded-full  flex jsutfiy-center items-center overflow-hidden mr-1"> --}}
        {{--                                <img src="{{asset('storage/'.$page->logo_path)}}" alt="" class="size-16 rounded-md mx-auto object-cover"> --}}
        {{--                            </div> --}}
        {{--                            <div class="w-10/12 flex flex-col justify-center pr-1 gap-1 mx-auto"> --}}
        {{--                                <span class="text-xs text-nowrap font-bold text-(--primary-text-color) truncate" title="{{ $page->title }}">{{ $page->title }}</span> --}}
        {{--                                <span class="text-xs text-(secondary-text-color) text-nowrap">9.1k دنبال کننده</span> --}}
        {{--                            </div> --}}
        {{--                        </a> --}}
        {{--                    @endif --}}
        {{--                @endforeach --}}

        {{--            </div> --}}
        {{--        </section> --}}
        {{--        <!-- صفحات پر طرفدار --> --}}

        {{--        <!-- کسب و کار ویژه --> --}}
        {{--        <section class="w-full flex flex-col justify-center items-center gap-2 mb-25"> --}}
        {{--            <div class="w-full px-5 flex items-center justify-between"> --}}
        {{--                <h4 class="text-sm font-bold text-(--primary-text-color)">کسب و کار های ویژه</h4> --}}
        {{--                <div class="flex items-center gap-2"> --}}
        {{--                    <a href="{{ route('career.careersList') }}" class="text-xs text-[#fc8e21]">مشاهده همه</a> --}}
        {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-2 rotate-90" fill="#fc8e21"><path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path></svg> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--            <div class="w-full px-5 py-3 bg-white flex items-center gap-3 overflow-x-auto" style="scrollbar-width: thin;"> --}}
        {{--                @foreach ($careers as $career) --}}
        {{--                    @if ($career->show_in_home) --}}

        {{--                        <a href="{{ route('client.menu', $career->id) }}" class="min-w-[130px] max-w-[130px] rounded-xl flex flex-col items-center gap-2 pt-2 pb-3 border-1 border-[#efefef]"> --}}
        {{--                            <div class="w-full flex jsutfiy-center items-center overflow-hidden px-2"> --}}
        {{--                                <img src="{{asset('storage/'.$career->logo)}}" alt="" class="w-full h-18 rounded-md mx-auto object-cover"> --}}
        {{--                            </div> --}}
        {{--                            <div class="w-10/12 flex flex-col items-center gap-1"> --}}
        {{--                                <span class="text-sm truncate text-(--primary-text-color) font-bold">{{ $career->title }}</span> --}}
        {{--                                <p class="max-w-full h-8 max-h-8 text-xs text-(--secondary-text-color) ellipsis-2" title="{{ $career->description }}">{{ $career->description }}</p> --}}
        {{--                                <div class="flex gap-1 items-center text-(--secondary-text-color)"> --}}
        {{--                                    <span class="text-xs text-nowrap text-(--secondary-text-color)">4.7</span> --}}
        {{--                                    <svg viewBox="0 0 576 512" class="w-2" fill="#ff8900"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> --}}
        {{--                                </div> --}}
        {{--                                <div class="w-full flex flex-row items-end gap-2"> --}}
        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 384 512"> --}}
        {{--                                        <path fill="var(--secondary-text-color)" d="M336 192c0-79.5-64.5-144-144-144S48 112.5 48 192c0 12.4 4.5 31.6 15.3 57.2c10.5 24.8 25.4 52.2 42.5 79.9c28.5 46.2 61.5 90.8 86.2 122.6c24.8-31.8 57.8-76.4 86.2-122.6c17.1-27.7 32-55.1 42.5-79.9C331.5 223.6 336 204.4 336 192zm48 0c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192zm-160 0a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm-112 0a80 80 0 1 1 160 0 80 80 0 1 1 -160 0z"/> --}}
        {{--                                    </svg> --}}
        {{--                                    <span class="text-xs truncate text-(--secondary-text-color)">{{ $career->province_city->title ?? '' }}</span> --}}
        {{--                                </div> --}}
        {{--                            </div> --}}
        {{--                        </a> --}}
        {{--                    @endif --}}
        {{--                @endforeach --}}
        {{--            </div> --}}
        {{--        </section> --}}
        {{--        <!-- کسب و کار ویژه --> --}}
    </main>

    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-99999999"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>

        </div>
    </div>

    <div id="authenticationDiv"
        class="fixed w-full h-dvh bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 opacity-0 invisible z-9999999">

        <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer" onclick="closeLoginForm()"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>
            <h3 class="text-center text-sm font-bold text-gray-800">ابتدا وارد شوید</h3>
            <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full" method="post"
                id="loginForm">
                @csrf
                <input type="number"
                    class="placeholder-gray-400 focus:border-1 focus:border-(--primary-color) p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                    name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" required>
                <div class="w-full" id="login">
                    <div class="w-full flex flex-row items-center gap-3">
                        <input type="number"
                            class="w-8/12 p-2 placeholder-gray-400 focus:border-(--primary-color) md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="code" placeholder="کد" required id="code">
                        <button type="button"
                            class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-(--hover-primary-color) text-white cursor-pointer"
                            onclick="sendCode()" id="countDown">ارسال کد
                        </button>
                    </div>
                </div>
                <div class="w-full flex flex-row items-center justify-between" id="loginWay">
                    <a href="{{ route('forget_password') }}"
                        class="text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                    <span class="text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
                        id="passKey" onclick="loginWithPassKey(this)">ورود با رمز عبور</span>
                </div>
                <button onclick="check(event)"
                    class="focus:bg-(--primary-color) hover:bg-(--primary-color) transition-all duration-400 text-center w-full bg-(--primary-color) p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                    ورود
                </button>
                <div class="w-full text-center">
                    <span class="text-[#4B5675] mt-1 md:mt-5 max-md:text-sm">
                        هنوز عضو نشدی؟
                        <a href="{{ route('signup') }}" class="text-(--primary-color) mr-2">ثبت نام!</a>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 backdrop-blur z-99999999 flex justify-center items-center transition-all duration-300 invisible opacity-0"
        id="homeBlock">
        <div class="w-10/12 bg-white p-4 rounded-md flex flex-col gap-3 box" id="createPageMessageBox">
            <p class="text-sm text-justify text-gray-800"></p>
            <div class="text-sm text-gray-800 font-bold flex flex-row items-center gap-2">
                <span>داشبورد</span>
                <span>/</span>
                <span>صفحه ها</span>
                <span>/</span>
                <a href="{{ route('pages.create') }}" class="text-blue-600">ایجاد صفحه</a>
            </div>

        </div>
    </div>
    <script>
        let link = "{{ url('/') }}/"
        let createPageMessageBox = document.getElementById('createPageMessageBox')
        let authenticationDiv = document.getElementById('authenticationDiv')
        let homeBlock = document.getElementById('homeBlock')

        let name = ''
        let family = ''

        if (flag) {
            name = "{{ Auth::check() ? Auth::user()->name : 'کاربر' }}"
            family = "{{ Auth::check() ? Auth::user()->family : '' }}"
        }



        let countDown = document.getElementById('countDown')
        let loginForm = document.getElementById('loginForm')

        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        let createPageLink = document.getElementById('createPageLink')



        // createPageLink.addEventListener('click', () => {
        //     if (flag) {
        //         homeBlock.classList.remove('invisible')
        //         homeBlock.classList.remove('opacity-0')
        //         createPageMessageBox.classList.remove('hidden')
        //         createPageMessageBox.children[0].innerText = name + " " + family +
        //             " عزیز، یه صفحه قبلا برات ایجاد شده. اگه میخوای بازم صفحه بسازی از مسیر زیر میتونی انجامش بدی:"
        //         x = true
        //     } else {
        //         authenticationDiv.classList.remove('invisible')
        //         authenticationDiv.classList.remove('opacity-0')
        //         authenticationDiv.children[0].classList.remove('scale-95')
        //     }
        // })

        function createPageLinkFunc(){
            if (flag) {
                // homeBlock.classList.remove('invisible')
                // homeBlock.classList.remove('opacity-0')
                // createPageMessageBox.classList.remove('hidden')
                // createPageMessageBox.children[0].innerText = name + " " + family +
                //     " عزیز، اگه میخوای صفحه بسازی از مسیر زیر میتونی انجامش بدی:"
                // x = true
                location.assign("{{ route('pages.create') }}")
            } else {
                authenticationDiv.classList.remove('invisible')
                authenticationDiv.classList.remove('opacity-0')
                authenticationDiv.children[0].classList.remove('scale-95')
            }
        }

        let passKey = document.getElementById('passKey')
        document.addEventListener('click', (event) => {
            if (!authenticationDiv.children[0].contains(event.target) && !createPageLink.contains(event.target) && !
                passKey.contains(event.target)) {
                authenticationDiv.classList.add('invisible')
                authenticationDiv.classList.add('opacity-0')
                authenticationDiv.children[0].classList.add('scale-95')
            }

            // if(homeBlock && !createPageMessageBox.contains(event.target)){
            //     homeBlock.classList.add('invisible')
            //     homeBlock.classList.add('opacity-0')
            // }

            if (homeBlock && !homeBlock.classList.contains('invisible')) {
                if (!createPageMessageBox.contains(event.target) &&
                    !createPageLink.contains(event.target)) {
                    homeBlock.classList.add('invisible')
                    homeBlock.classList.add('opacity-0')
                }
            }

        });

        function sendCode() {

            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا شماره تلفن را وارد کنید</span>
                    `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('loginWithActivationCode') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                    },
                    success: function(data) {
                        console.log(data)
                        if (!data) {
                            counter()
                            showMessage('open')
                            element.innerHTML = `
                                <span>✅</span>
                                <span class="text-shadw-lg">کد ارسال شد</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        } else {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">ابتدا ثبت نام کنید !</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                // location.assign("{{ route('login') }}")
                            }, 2000)
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }

        function counter() {
            let phoneNumber = document.getElementById('phoneNumber')
            countDown.classList.add('cursor-no-drop')
            countDown.classList.remove('cursor-pointer')
            countDown.classList.remove('hover:bg-(--hover-primary-color)')
            countDown.classList.add('hover:bg-(--hover-primary-color)/50')
            countDown.classList.remove('bg-(--primary-color)')
            countDown.classList.add('bg-(--primary-color)/50')
            countDown.setAttribute('disabled', true)
            countDown.setAttribute('dir', 'ltr')
            let count = 120
            let result = setInterval(() => {
                let minute = Math.floor(count / 60)
                let seconds = count % 60
                count -= 1
                if (count < 0) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('removeActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value
                        },
                        success: function(data) {
                            console.log(data)
                            countDown.classList.remove('cursor-no-drop')
                            countDown.classList.add('bg-(--primary-color)')
                            countDown.classList.remove('bg-(--primary-color)/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-(--hover-primary-color)')
                            countDown.classList.remove('hover:bg-(--hover-primary-color)/50')
                            countDown.removeAttribute('disabled')
                            countDown.removeAttribute('dir')
                            countDown.innerText = "ارسال مجدد"
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                                <span>❌</span>
                                <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2500)
                        }
                    })
                    clearInterval(result)
                }
                countDown.innerText = minute.toString().padStart(2, "0") + " : " + seconds.toString().padStart(2,
                    "0");
            }, 1000)
        }

        function check(ev) {
            let password = document.getElementById('password')
            console.log(password)
            ev.preventDefault()
            if (password) {
                if (phoneNumber.value == "" || password.value == "") {
                    showMessage('open')
                    element.innerHTML = `
                            <span>لطفا همه فیلد ها را پر کنید</span>
                            <span class="text-red-500">!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 2000)
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: link+'api/user/checkFromMenu',
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value,
                            'password': password.value
                        },
                        success: function(data) {
                            console.log(data)
                            if (data == "userNotFound") {
                                showMessage('open')
                                element.innerHTML = `
                                    <span>ابتدا ثبت نام کنید</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                    location.assign("{{ route('signup') }}")
                                }, 2000)
                            }
                            if (data == "incorrectPassword") {
                                showMessage('open')
                                element.innerHTML = `
                                    <span>رمز عبور نادرست است</span>
                                    <span class="text-red-500">!</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                            }
                            if (data.id) {
                                showMessage('open')
                                element.innerHTML = `
                                    <span> خوش اومدی ${data.name ?? 'کاربر'} ${data.family ?? 'رینگا'} عزیز</span>
                                `
                                flag = true
                                userId = data.id
                                name = data.name
                                family = data.family
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                    closeLoginForm()
                                }, 2000)
                            }
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                            <span>خطا در دریافت اطلاعات</span>
                            <span class="text-red-500">!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        }
                    })
                }
            }
            if (!password) {
                if (phoneNumber.value == "" || code.value == "") {
                    showMessage('open')
                    element.innerHTML = `
                            <span>لطفا همه فیلد ها را پر کنید</span>
                            <span class="text-red-500">!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 2000)
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('checkActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value,
                            'code': code.value
                        },
                        success: function(data) {

                            if (!data.checkCode) {
                                showMessage('open')
                                element.innerHTML = `
                                    <span>کد وارد شده نامعتبر !</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                            }
                            if (!data.validate) {
                                showMessage('open')
                                element.innerHTML = `
                                    <span>ابتدا ثبت نام کنید</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                    location.assign("{{ route('signup') }}")
                                }, 2000)
                            }
                            if (data.validate && data.checkCode) {

                                showMessage('open')

                                element.innerHTML = `
                                    <span> خوش اومدی ${data.validate.name ?? 'کاربر'} ${data.validate.family ?? 'رینگا'} عزیز</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                    closeLoginForm()
                                }, 2000)
                            }
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        }
                    })
                }
            }

        }

        function closeLoginForm() {
            authenticationDiv.classList.add('invisible')
            authenticationDiv.classList.add('opacity-0')
            authenticationDiv.children[0].classList.add('scale-95')
        }

        function loginWithPassKey(el) {
            login.innerHTML = `
                <input type="password"
                    class="placeholder-gray-400 focus:border-1 focus:border-(--primary-color) p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                    name="password" id="password" placeholder="کلمه عبور" required>
            `
            // el.parentElement.children[1].remove()
            // let span = document.createElement('span')
            // span.classList = "text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
            // span.setAttribute('id', 'passKey')
            passKey.setAttribute('onclick', 'loginWithActivationCode(this)')
            passKey.innerText = "ورود با کد فعال ساز"
            // loginWay.appendChild(span)
        }

        function loginWithActivationCode(el) {
            login.innerHTML = `
                <div class="w-full flex flex-row items-center gap-3">
                    <input type="number"
                        class="w-8/12 p-2 placeholder-gray-400 focus:border-(--primary-color) md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                        name="code" placeholder="کد" required id="code">
                    <button type="button"
                        class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-(--hover-primary-color) text-white cursor-pointer"
                        onclick="sendCode()" id="countDown">ارسال کد </button>
                </div>
            `
            // el.parentElement.children[1].remove()
            // let span = document.createElement('span')
            // span.classList = "text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
            // span.setAttribute('id', 'passKey')
            passKey.setAttribute('onclick', 'loginWithPassKey(this)')
            passKey.innerText = "ورود با رمز عبور"
            // loginWay.appendChild(span)
        }

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-1/10')
            }
            if (state == 'close') {
                message.classList.remove('top-1/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        let selectItems = document.querySelectorAll('.selectItems')
        selectItems.forEach((selectItem) => {
            selectItem.addEventListener('click', () => {

                selectItems.forEach((item) => {
                    item.classList.remove('selected')
                })
                selectItem.classList.add('selected')

            })
        })

        let favoriteData = []
        let multipleFavorite = []
        let favoriteElement = null
        let parentItems = document.getElementById('parentItems')

        function closeForm() {
            let forms = document.querySelectorAll(".form")
            forms.forEach((form) => {
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
            favoriteData = []
            multipleFavorite = []
        }

     
        let parentFavorite = document.getElementById('parentFavorite')

        function openDropdown() {
            parentFavorite.innerHTML = `
            <form action="#" method="post">
                <div class="flex flex-row justify-center items-center">
                    <input type="text" class="w-10/12 py-1 px-3 rounded-lg outline-none border-1 border-gray-300" placeholder="عنوان دسته" id="categoryTitle">
                    <button class="w-2/12 h-full rounded-lg text-xl" onclick="addItem(event)">✅</button>
                </div>
            </form>
            `
        }

       
   
        function categoryIdElements(el) {
            const catId = el.getAttribute('data-cat-id')

            if (el.classList.contains('bg-red-500')) {
                let exists = false
                for (let i = 0; i < multipleFavorite.length; i++) {
                    if (multipleFavorite[i] == catId) {
                        exists = true

                    }
                }
                if (!exists) {
                    multipleFavorite.push(catId)
                }
                el.classList.remove('bg-red-500')
                el.classList.add('bg-green-600')
            } else {

                let newArray = []
                for (let i = 0; i < multipleFavorite.length; i++) {
                    if (multipleFavorite[i] != catId) {
                        newArray.push(multipleFavorite[i])
                    }
                }
                multipleFavorite = newArray
                el.classList.remove('bg-green-600')
                el.classList.add('bg-red-500')
            }
        }

   

        function createQrCode(e) {
            
            if (flag === "" || flag === "0" || flag === false) {
                e.preventDefault()
                authenticationDiv.classList.remove('invisible')
                authenticationDiv.classList.remove('opacity-0')
                authenticationDiv.children[0].classList.remove('scale-95')
                console.log(e)
                console.log(authenticationDiv)
            }
        }
    </script>
@endsection
