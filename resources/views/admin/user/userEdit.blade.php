    @extends('admin.app.panel')
    @section('title', ' تنظیمات اکانت')
    @section('content')

        <div class="w-full">
            <div class="pb-5 w-full">
                <h1 class="text-xl text-center lg:text-start">اکانت من</h1>
                <div
                    class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                    {{-- <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span> --}}
                    <a href="{{ route('dashboard') }}">داشبورد</a>
                </div>
            </div>

            <div class="flex flex-col border-none rounded-[7px]">
                <div class="block lg:flex flex-row justify-between gap-8">
                    <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                        @if (!Auth::user()->main_image)
                            <img class="size-27 lg:size-41 rounded-full mx-auto lg:m-0"
                                src="{{ asset('assets/img/user.png') }}" alt="user__avatar">
                        @else
                            <img class="size-27 lg:size-41 rounded-full mx-auto lg:m-0"
                                src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture">
                        @endif
                        <div class="flex flex-col justify-end">
                            <div class="div1 text-center lg:text-start">
                                <sdivong class="text-gray-700">{{ Auth::user()->name }} {{ Auth::user()?->family }}</sdivong>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="pt-3 mt-4 lg:mt-8">

                <form action="{{ route('user.update') }}" method="post"
                    class="shadow__profaill__list_products rounded-lg pb-4 bg-white" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="border-b border-gray-300">
                        <h2 class="text-xl mr-5 text-center lg:text-right py-4">جزییات پروفایل</h2>
                    </div>
                    <div class="p-5 px-6">
                        <div class="w-full">
                            <div class="tsble">
                                <div class="flex flex-col lg:flex-row">
                                    <div>تصویر</div>
                                    <div>
{{--                                        <img class="size-30 rounded-full border-3 shadow__fhoto__insetting__profaill border-white"--}}
{{--                                            src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user imag">--}}
                                        <input type="file" name="main_image" class="cursor-pointer">
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row">
                                    <div class="w-full lg:w-2/12 text-sm py-4">نام و نام خانوادگی</div>
                                    <div class="w-full lg:w-10/12 text-sm py-4 flex flex-col lg:flex-row gap-4">
                                        <input
                                            class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                            type="text" value="{{ Auth::user()->name }}" name="name"
                                            placeholder="نام">
                                        <input
                                            class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                            type="text" value="{{ Auth::user()->family }}" name="family"
                                            placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row">
                                    <div class="w-full lg:w-2/12 text-sm py-4">شماره تلفن</div>
                                    <div class="w-full lg:w-10/12 text-sm">
                                        <input
                                            class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                            type="number" name="phoneNumber" value="{{ Auth::user()->phoneNumber }}"
                                            placeholder="شماره تلفن">
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row">
                                    <div class="w-full lg:w-2/12 text-sm py-4">ایمیل</div>
                                    <div class="w-full lg:w-10/12 text-sm py-4">
                                        <input
                                            class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                            type="email" name="email" value="{{ Auth::user()->email }}"
                                            placeholder="ایمیل">
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row">
                                    <div class="w-full lg:w-2/12 text-sm py-4">رمز عبور</div>
                                    <div class="w-full lg:w-10/12 text-sm py-4">
                                        <input
                                            class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                            type="password" name="password" placeholder="رمز عبور">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-10  flex justify-end pl-6 gap-2">
                        <button class="px-4 py-2 bg-[#F1F1F4] rounded-[7px] cursor-pointer" type="reset">لغو</button>
                        <button class="px-4 py-2 bg-[#1B84FF] rounded-[7px] text-white cursor-pointer" type="submit">ذخیره
                            تغییرات</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
