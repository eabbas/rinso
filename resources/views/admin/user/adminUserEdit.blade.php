@extends('admin.app.panel')
@section('title', 'ویرایش کاربر')
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full">
            <h1 class="text-xl text-center lg:text-start">کاربر {{ $user->name }} {{ $user->family }}</h1>
            <div
                class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                {{-- <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span> --}}
                <a href="{{ route('user.profile') }}">داشبورد</a>
            </div>
        </div>

{{--        <div class="flex flex-col border-none rounded-[7px]">--}}
{{--            <div class="block lg:flex flex-row justify-between gap-8">--}}
{{--                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">--}}
{{--                    mcnljxcnjnzvns--}}
{{--                    @if (!$user->main_image)--}}
{{--                        <img class="size-27 lg:size-41 rounded-full mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}"--}}
{{--                            alt="user__avatar">--}}
{{--                    @else--}}
{{--                        <img class="size-27 lg:size-41 rounded-full mx-auto lg:m-0"--}}
{{--                            src="{{ asset('storage/' . $user->main_image) }}" alt="user__picture">--}}
{{--                    @endif--}}
{{--                    <div class="flex flex-col justify-center    ">--}}
{{--                        <div class="div1 text-center lg:text-start">--}}
{{--                            <sdivong class="text-gray-700 font-bold">{{ $user->name }} {{ $user?->family }}</sdivong>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
        <div class=" lg:flex flex-row justify-between gap-8 bg-[#fff] rounded-xl pb-4">
            <div class="w-full flex flex-col gap-5 bg-white lg:py-5 rounded-xl px-5 py-2 ">
                <div class="w-full md:w-full gap-4 flex flex-col md:flex-row lg:py-5">
                    @if (!$user->main_image)
                        <img class="size-27 lg:size-41 rounded-xl mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}"
                             alt="user__avatar">
                    @else
                        <img class="size-27 lg:size-41 rounded-xl mx-auto lg:m-0"
                             src="{{ asset('storage/' . $user->main_image) }}" alt="user__picture">
                    @endif
                    <div class="w-full flex flex-col  gap-y-10">
                        <div class="w-full flex flex-col lg:flex-row gap-5 text-center items-center md:justify-start">
                            <div class="w-full flex flex-col gap-5 text-center md:text-start">

                                <div class="div1 w-full md:text-start">
                                    <strong class="text-gray-700 text-lg font-bold">{{ $user->name }} {{ $user->family }}</strong>
                                </div>
                                <div class="w-full md:justify-start flex flex-col md:flex-row md:gap-5 gap-2">
                                    {{--                                  <span class="flex flex-row items-center gap-1 text-xs text-zinc-400 hover:text-zinc-600 fill-zinc-400 hover:fill-zinc-600">--}}
                                    {{--                                      <svg class="size-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>--}}
                                    {{--                                      توسعه دهنده وب--}}
                                    {{--                                  </span>--}}
                                    {{--                                  <span class="flex flex-row items-center gap-1 text-xs text-zinc-400 hover:text-zinc-600 fill-zinc-400 hover:fill-zinc-600">--}}
                                    {{--                                      <svg class="size-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M368 192c0-97.2-78.8-176-176-176S16 94.8 16 192c0 24.1 10.6 55.3 28.2 90c17.5 34.2 40.9 70 64.7 102.6c23.7 32.6 47.4 61.8 65.3 82.8c7 8.2 13 15.2 17.8 20.6c4.8-5.4 10.8-12.4 17.8-20.6c17.8-21 41.6-50.2 65.3-82.8c23.7-32.6 47.2-68.4 64.7-102.6c17.7-34.7 28.2-65.9 28.2-90zm16 0c0 95.9-140.8 262.2-181.3 308c-6.8 7.7-10.7 12-10.7 12s-4-4.3-10.7-12C140.8 454.2 0 287.9 0 192C0 86 86 0 192 0S384 86 384 192zM192 112a80 80 0 1 1 0 160 80 80 0 1 1 0-160zm64 80a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>--}}
                                    {{--                                      منطقه زندگی--}}
                                    {{--                                  </span>--}}
                                    @if($user->email)
                                        <span class="flex flex-row md:text-start justify-center md:justify-start gap-1 text-xs text-zinc-400 hover:text-zinc-600 fill-zinc-400 hover:fill-zinc-600 cursor-pointer">
                                                    <svg class="size-3" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 488 512"><path
                                                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                                                    {{ $user->email }}
                                            </span>
                                        <span class="w-full text-zinc-400 text-sm md:text-start">{{ $user->phoneNumber }}</span>
                                    @endif
                                </div>
                            </div>
                            {{--                                    <button class="w-3/12 lg:w-2/12 lg:py-2 bg-[#fafafa] rounded-lg">--}}
                            {{--                                      دنبال کردن--}}
                            {{--                                    </button>--}}
                        </div>
                        <div class="w-full md:w-2/3 lg:w-1/2 flex flex-col md:flex-row items-center sm:justify-end md:justify-start gap-3">

                            <div class="w-full md:w-30 pb-4 md:p-2 border-b-1 md:border-1 border-dashed border-zinc-300 rounded-md flex md:flex-col justify-between  items-center">
                                <div class="font-bold text-xl flex flex-row items-center gap-2">
                                    <svg class="size-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 384 512">
                                        <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M209.4 39.4C204.8 34.7 198.6 32 192 32s-12.8 2.7-17.4 7.4l-168 176c-9.2 9.6-8.8 24.8 .8 33.9s24.8 8.8 33.9-.8L168 115.9V456c0 13.3 10.7 24 24 24s24-10.7 24-24V115.9L342.6 248.6c9.2 9.6 24.3 9.9 33.9 .8s9.9-24.3 .8-33.9l-168-176z"/>
                                    </svg>
                                    $12.600
                                </div>
                                <span class="text-sm text-zinc-400">
                                              درامد
                                          </span>
                            </div>
                            <div class="w-full md:w-30 pb-4 md:p-2 border-b-1 md:border-1 border-dashed border-zinc-300 rounded-md flex md:flex-col justify-between items-center">
                                <div class="font-bold text-xl flex flex-row items-center gap-2">
                                    <svg class="size-3 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 384 512">
                                        <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M174.6 472.6c4.5 4.7 10.8 7.4 17.4 7.4s12.8-2.7 17.4-7.4l168-176c9.2-9.6 8.8-24.8-.8-33.9s-24.8-8.8-33.9 .8L216 396.1 216 56c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 340.1L41.4 263.4c-9.2-9.6-24.3-9.9-33.9-.8s-9.9 24.3-.8 33.9l168 176z"/>
                                    </svg>
                                    80
                                </div>
                                <span class="text-sm text-zinc-400">
                                              پروژه ها
                                          </span>
                            </div>

                            <div class="w-full md:w-30 md:p-2 md:border-1 md:border-dashed border-zinc-300 rounded-md flex md:flex-col justify-between items-center">
                                <div class="font-bold text-xl flex flex-row items-center gap-2">
                                    <svg class="size-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 384 512">
                                        <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M209.4 39.4C204.8 34.7 198.6 32 192 32s-12.8 2.7-17.4 7.4l-168 176c-9.2 9.6-8.8 24.8 .8 33.9s24.8 8.8 33.9-.8L168 115.9V456c0 13.3 10.7 24 24 24s24-10.7 24-24V115.9L342.6 248.6c9.2 9.6 24.3 9.9 33.9 .8s9.9-24.3 .8-33.9l-168-176z"/>
                                    </svg>
                                    %25
                                </div>
                                <span class="text-sm text-zinc-400">
                                          سود خالص
                                      </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="pt-3 mt-4 lg:mt-8">
            <form action="{{ route('user.update', [$user->id]) }}" method="post"
                class="shadow__profaill__list_products rounded-lg pb-4 bg-white" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="border-b border-gray-300">
                    <h2 class="text-xl mr-5 text-center lg:text-right py-4">جزییات پروفایل</h2>
                </div>
                <div class="p-5 px-6">
                    <div class="w-full">
                        <div class="tsble">
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">تصویر</div>
                                <div class="relarive w-full lg:w-10/12 text-sm py-4 flex flex-col lg:flex-row items-center justify-start gap-4">
                                    @if ($user->main_image)
                                        <img class="size-33 rounded-xl border-3 shadow__fhoto__insetting__profaill border-white"
                                            src="{{ asset('storage/' . $user->main_image) }}" alt="user imag">
                                    @else
                                        <img class="size-33 rounded-xl border-3 shadow__fhoto__insetting__profaill border-white"
                                            src="{{ asset('assets/img/user.png') }}" alt="user imag">
                                    @endif
                                    <div class="absolute w-7 h-7 right-[30%] sm:right-[40%] md:right[55%] lg:top-140 xl:top-137 lg:right-[18%] flex items-center justify-center rounded-full bg-[#ffff] border-1 border-zinc-400 shadow__fhoto__insetting__profaill cursor-pointer hover:fill-blue-300 ">
                                        <label for="file-input" class="flex items-center justify-center">
                                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z"/></svg>
                                        </label>
                                        <input type="file" id="file-input" name="main_image" class="absolute z-50 w-full h-full top-1 opacity-5 rounded-full cursor-pointer" placeholder="jj">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">نام و نام خانوادگی</div>
                                <div class="w-full lg:w-10/12 text-sm pb-4 flex flex-col lg:flex-row gap-4">
                                    <input
                                        class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                        type="text" value="{{ $user->name }}" name="name" placeholder="نام">
                                    <input
                                        class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                        type="text" value="{{ $user->family }}" name="family"
                                        placeholder="نام خانوادگی" >
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">شماره تلفن</div>
                                <div class="w-full lg:w-10/12 text-sm pb-4">
                                    <input
                                        class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        type="number" name="phoneNumber" value="{{ $user->phoneNumber }}"
                                        placeholder="شماره تلفن" required>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">ایمیل</div>
                                <div class="w-full lg:w-10/12 text-sm pb-4">
                                    <input
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        type="email" name="email" value="{{ $user->email ? $user->email : '' }}" placeholder="ایمیل">
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">رمز عبور</div>
                                <div class="w-full lg:w-10/12 text-sm pb-4">
                                    <input
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        type="password" name="password" placeholder="رمز عبور">
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">نقش</div>
                                <div class="w-full lg:w-10/12 text-sm pb-4">
                                    <select
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        name="roles[]" multiple size="1">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if (in_array($role->id, $userRoles)) {{ 'selected' }} @endif>
                                                @if($role->title == "admin")
                                                    ادمین
                                                @elseif($role->title == 'admin2')
                                                    ادمین 2
                                                @elseif($role->title == 'general')
                                                    کاربر عادی
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
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
