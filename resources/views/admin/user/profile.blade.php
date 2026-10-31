@extends('admin.app.panel')
@section('title', 'پروفایل کاربری')
@section('content')

    <div class="w-full">
        <div class="flex flex-col border-none rounded-[7px] gap-1">
            <div class="flex flex-col md:flex-row gap-2">
                <div class="w-full flex flex-row justify-between gap-y-3">
                    <span class="text-2xl text-zinc-700 font-bold pb-4">اطلاعات کاربری</span>
                    {{--                    <a href="{{route('user.logout')}}" class="text-red-500 text-sm">خروج </a> --}}
                    {{--                    <div class="w-full flex flex-row items-cetner gap-2"> --}}
                    {{--                        <a href="{{ route('home') }}" class="text-sm text-zinc-400 ">خانه</a> --}}
                    {{--                        <span class="text-sm text-zinc-400">/</span> --}}
                    {{--                        <a href="{{ route('user.profile') }}" class="text-sm text-zinc-400">پروفایل</a> --}}

                    {{--                    </div> --}}
                </div>

            </div>
            <div class="w-full flex flex-col bg-white lg:py-5 rounded-xl px-5 py-2">


                <div
                    class="w-full flex flex-row justify-between items-center border-b-1 border-dashed pb-2 border-zinc-300 mb-2">
                    <span class="text-sm text-gray-600">کد معرف شما :</span>
                    <div class="bg-white flex flex-row items-center rounded-md"
                        onclick='copyText("{{ Auth::user()->ref_code }}")'>
                        <span class="text-blue-700 cursor-pointer text-sm pr-3"
                            title="برای کپی کلیک کنید">{{ Auth::user()->ref_code }}</span>
                        <div class="cursor-pointer h-full p-2 rounded-l-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-500" viewBox="0 0 448 512">
                                <path
                                    d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z" />
                            </svg>
                        </div>
                    </div>

                </div>
                <div class="w-full flex flex-row gap-2 justify-between items-center">
                    <span class="text-sm text-gray-600"> لینک دعوت :</span>
                    <div class="bg-white flex flex-row items-center rounded-md"
                        onclick='copyText("{{ url('signup/' . Auth::user()->ref_code) }}")'>
                        <span class="text-blue-700 cursor-pointer text-sm pr-3 max-w-[150px] truncate" dir="ltr"
                            title="برای کپی کلیک کنید">{{ url('signup/' . Auth::user()->ref_code) }}</span>
                        <div class="cursor-pointer h-full p-2 rounded-l-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-500" viewBox="0 0 448 512">
                                <path
                                    d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z" />
                            </svg>
                        </div>
                    </div>

                </div>

            </div>
            <div class=" lg:flex flex-row justify-between gap-8 bg-[#fff] rounded-xl pb-4">
                <div class="w-full flex flex-col gap-5 bg-white lg:py-5 rounded-xl px-5 py-2 ">
                    <div class="w-full sm:w-full gap-4 flex flex-col sm:flex-row lg:py-5">


                        <div class="w-full relative">
                            @if (!Auth::user()->main_image)
                                <div class="w-full md:w-3/12 relative" id="prof">
                                    <img class="lg:block size-40 mx-auto sm:m-0 rounded-xl cursor-pointer"
                                        onclick="showProfile(this)" src="{{ asset('assets/img/user.png') }}"
                                        alt="user__avatar">
                                </div>
                            @else
                                <img class="lg:block object-cover mx-auto sm:m-0 size-40 lg:m-0 rounded-xl cursor-pointer"
                                    onclick="showProfile(this)" src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                    alt="user__picture">
                                <div
                                    class="absolute w-10 h-10 border-2 border-dashed border-[#00ffff] shadow-lg bg-zinc-300 rounded-full top-0 right-[25%] md:-right-3 flex items-center justify-center cursor-pointer">
                                    <label for="edit"
                                        class="border-2 border-dotted border-[#23c4c4] absolute bg-zinc-50 w-10 h-10 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-5 fill-zinc-500">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </label>
                                    <input class="absolute opacity-1 bg-red-500 w-10 h-10" onchange="editProfileImage(this)"
                                        type="file" name="" id="edit">
                                </div>
                            @endif
                        </div>



                        <div class="w-full lg:10/12 flex flex-col gap-y-5">
                            <div class="w-full flex flex-col lg:flex-row gap-5 text-center items-center md:justify-start">
                                {{--                                <div class="w-full flex flex-col gap-5 text-center sm:text-start"> --}}

                                {{--                                    <div class="div1 w-full sm:text-start"> --}}
                                {{--                                        <strong class="text-gray-700 text-lg font-bold">{{ Auth::user()->name }} {{ Auth::user()?->family }}</strong> --}}
                                {{--                                    </div> --}}
                                {{--                                    <div class="w-full sm:justify-start flex flex-col sm:flex-row sm:gap-5 gap-2"> --}}
                                {{--                                        --}}{{--                                  <span class="flex flex-row items-center gap-1 text-xs text-zinc-400 hover:text-zinc-600 fill-zinc-400 hover:fill-zinc-600"> --}}
                                {{--                                        --}}{{--                                      <svg class="size-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg> --}}
                                {{--                                        --}}{{--                                      توسعه دهنده وب --}}
                                {{--                                        --}}{{--                                  </span> --}}
                                {{--                                        --}}{{--                                  <span class="flex flex-row items-center gap-1 text-xs text-zinc-400 hover:text-zinc-600 fill-zinc-400 hover:fill-zinc-600"> --}}
                                {{--                                        --}}{{--                                      <svg class="size-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M368 192c0-97.2-78.8-176-176-176S16 94.8 16 192c0 24.1 10.6 55.3 28.2 90c17.5 34.2 40.9 70 64.7 102.6c23.7 32.6 47.4 61.8 65.3 82.8c7 8.2 13 15.2 17.8 20.6c4.8-5.4 10.8-12.4 17.8-20.6c17.8-21 41.6-50.2 65.3-82.8c23.7-32.6 47.2-68.4 64.7-102.6c17.7-34.7 28.2-65.9 28.2-90zm16 0c0 95.9-140.8 262.2-181.3 308c-6.8 7.7-10.7 12-10.7 12s-4-4.3-10.7-12C140.8 454.2 0 287.9 0 192C0 86 86 0 192 0S384 86 384 192zM192 112a80 80 0 1 1 0 160 80 80 0 1 1 0-160zm64 80a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg> --}}
                                {{--                                        --}}{{--                                      منطقه زندگی --}}
                                {{--                                        --}}{{--                                  </span> --}}
                                {{--                                        @if (Auth::user()->email) --}}
                                {{--                                            <span class="flex flex-row sm:text-start justify-center sm:justify-start gap-1 text-xs text-zinc-400 hover:text-zinc-600 fill-zinc-400 hover:fill-zinc-600 cursor-pointer"> --}}
                                {{--                                                    <svg class="size-3" xmlns="http://www.w3.org/2000/svg" --}}
                                {{--                                                         viewBox="0 0 488 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path --}}
                                {{--                                                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg> --}}
                                {{--                                                    {{ Auth::user()->email }} --}}
                                {{--                                            </span> --}}
                                {{--                                            <span class="w-full text-zinc-400 text-sm sm:text-start">{{ Auth::user()->phoneNumber }}</span> --}}
                                {{--                                        @endif --}}
                                {{--                                    </div> --}}
                                {{--                                </div> --}}
                                {{--                                    <button class="w-3/12 lg:w-2/12 lg:py-2 bg-[#fafafa] rounded-lg"> --}}
                                {{--                                      دنبال کردن --}}
                                {{--                                    </button> --}}
                            </div>
                            <div class="w-full md:w-2/3 lg:w-1/2 flex flex-col items-center sm:justify-end gap-3">

                                <div
                                    class="w-full pb-4 border-b-1 border-dashed border-zinc-300 flex justify-between items-center">
                                    <div class="text-md flex flex-row items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                        </svg>
                                        <div>
                                            @if (Auth::user()->name)
                                                <span>
                                                    {{ Auth::user()->name }}
                                                </span>
                                            @else
                                                <span>
                                                    نام من
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="flex justify-center cursor-pointer states" data-state="name"
                                        onclick='editInfo(this, "name", "{{ Auth::user()->name }}")'>
                                        <span class="w-fit flex flex-row items-center justify-center p-1 rounded-sm"
                                            title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </span>
                                    </div>
                                    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-green-600"> --}}
                                    {{--                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/> --}}
                                    {{--                                    </svg> --}}
                                </div>



                                <div
                                    class="w-full pb-4 border-b-1 border-dashed border-zinc-300 flex justify-between items-center">
                                    <div class="text-md flex flex-row items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                        </svg>
                                        <div>
                                            @if (Auth::user()->family)
                                                <span>
                                                    {{ Auth::user()->family }}
                                                </span>
                                            @else
                                                <span>
                                                    فامیلی من
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="flex justify-center cursor-pointer states" data-state="family"
                                        onclick='editInfo(this, "family", "{{ Auth::user()->family }}")'>
                                        <span class="w-fit flex flex-row items-center justify-center p-1 rounded-sm"
                                            title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="w-full pb-4 border-b-1 border-dashed border-zinc-300 flex justify-between items-center">
                                    <div class="text-md flex flex-row items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="size-4">
                                            <path
                                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                                        </svg>
                                        <div>
                                            @if (Auth::user()->email)
                                                <span>
                                                    {{ Auth::user()->email }}
                                                </span>
                                            @else
                                                <span>
                                                    ایمیل من
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex justify-center cursor-pointer states" data-state="email"
                                        onclick='editInfo(this, "email", "{{ Auth::user()->email }}")'>
                                        <span class="w-fit flex flex-row items-center justify-center p-1 rounded-sm"
                                            title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="w-full md:w-2/3 lg:w-1/2 flex justify-between items-center border-b border-dashed border-zinc-300 pb-3">
                                <div class="text-md flex flex-row items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4">
                                        <path
                                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                    </svg>
                                    <div>
                                        @if (Auth::user()->phoneNumber)
                                            <span>
                                                {{ Auth::user()->phoneNumber }}
                                            </span>
                                        @else
                                            <span>
                                                شماره موبایل من
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex justify-center cursor-pointer states" data-state="phoneNumber"
                                    onclick='editInfo(this, "phoneNumber", "{{ Auth::user()->phoneNumber }}")'>
                                    <span class="w-fit flex flex-row items-center justify-center p-1 rounded-sm"
                                        title="ویرایش">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>


                            {{--                            <div class="w-full md:w-2/3 lg:w-1/2 rounded-md flex justify-between items-center"> --}}
                            {{--                                <div class="text-md flex flex-row items-center gap-2"> --}}
                            {{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4"> --}}
                            {{--                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/> --}}
                            {{--                                    </svg> --}}
                            {{--                                    <div> --}}
                            {{--                                        @foreach (Auth::user()->roles as $role) --}}

                            {{--                                            <span> --}}
                            {{--                                                {{ $role }} , --}}
                            {{--                                            </span> --}}

                            {{--                                        @endforeach --}}
                            {{--                                    </div> --}}
                            {{--                                </div> --}}
                            {{--                                <div class="flex justify-center"> --}}
                            {{--                                        <span --}}
                            {{--                                                class="w-fit flex flex-row items-center justify-center p-1 rounded-sm" --}}
                            {{--                                                title="ویرایش"> --}}
                            {{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400" --}}
                            {{--                                                 viewBox="0 0 512 512"> --}}
                            {{--                                                <path --}}
                            {{--                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/> --}}
                            {{--                                            </svg> --}}
                            {{--                                        </span> --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}

                            <div class="w-full md:w-2/3 lg:w-1/2 rounded-md flex justify-between items-center">
                                <div class="text-md flex flex-row items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4">
                                        <path
                                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                    </svg>
                                    <div>
                                        <span>********</span>
                                    </div>
                                </div>
                                <div class="flex justify-center cursor-pointer states" data-state="password"
                                    onclick="editInfo(this, 'password', '******')">
                                    <span class="w-fit flex flex-row items-center justify-center p-1 rounded-sm"
                                        title="ویرایش">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col gap-2 w-full bg-white rounded-xl">
                {{--                            <div class="absolute -top-20 left-0 flex flex-row gap-25"> --}}
                {{--                                <a href="" class="w-35 bg-white flex items-center justify-center border-1 border-zinc-400 rounded-lg"> --}}
                {{--                                    من را استخدام کن --}}
                {{--                                </a> --}}
                {{--                                <div class="flex flex-row items-center gap-2"> --}}
                {{--                                    <span class="text-sm text-gray-600">کد معرف شما :</span> --}}
                {{--                                    <div class="bg-white flex flex-row items-center gap-3 rounded-md border-1 border-gray-500" onclick='copyText("{{ Auth::user()->ref_code }}")'> --}}
                {{--                                        <span class="text-blue-700 cursor-pointer text-sm pr-3" title="برای کپی کلیک کنید">{{ Auth::user()->ref_code }}</span> --}}
                {{--                                        <div class="h-full p-2 rounded-l-sm bg-gray-500"> --}}
                {{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer size-5 fill-white" viewBox="0 0 448 512"> --}}
                {{--                                                <path d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z"/> --}}
                {{--                                            </svg> --}}
                {{--                                        </div> --}}
                {{--                                    </div> --}}
                {{--                                </div> --}}
                {{--                            </div> --}}
                {{--                        <span class="w-full h-[2px] bg-[#e4e6eb] mt-2 rounded-2xl"></span> --}}
                {{--                @if (count($myContacts)) --}}
                {{--                    <div class="w-full flex flex-col rounded-lg p-7 gap-5"> --}}
                {{--                        <div class=""> --}}
                {{--                            <div class="text-xl lg:text-3xl font-bold"> --}}
                {{--                                {{ count($myContacts) }} --}}
                {{--                            </div> --}}
                {{--                            <div class="text-md md:text-lg text-zinc-400">مشتری های من</div> --}}
                {{--                        </div> --}}

                {{--                        <div class="relative flex flex-row"> --}}
                {{--                            @php --}}
                {{--                                $i=3; --}}
                {{--                                $x=0; --}}
                {{--                            @endphp --}}
                {{--                            @foreach ($myContacts as $contact) --}}

                {{--                                <div class="relative right-{{$i*$x}} w-10 h-10 bg-blue-500 rounded-full hover:z-20 hover:cursor-pointer"> --}}
                {{--                                    <img src="{{ $contact->contact->main_image ? asset('storage/'.$contact->contact->main_image) : asset('assets/img/user.png') }}" --}}
                {{--                                         class="size-10 rounded-full" alt=""> --}}
                {{--                                </div> --}}
                {{--                                @php $x++; @endphp --}}
                {{--                            @endforeach --}}
                {{--                            --}}{{--                                    <div class="relative -right-3 w-10 h-10 bg-red-500 rounded-full hover:z-20"> --}}
                {{--                            --}}{{--                                        <img src="" alt=""> --}}
                {{--                            --}}{{--                                    </div> --}}
                {{--                            --}}{{--                                    <div class="relative -right-6 w-10 h-10 bg-green-500 rounded-full hover:z-20"> --}}
                {{--                            --}}{{--                                        <img src="" alt=""> --}}
                {{--                            --}}{{--                                    </div> --}}
                {{--                            --}}{{--                                    <div class="relative -right-9 w-10 h-10 bg-zinc-500 rounded-full hover:z-20"> --}}
                {{--                            --}}{{--                                        <img src="" alt=""> --}}
                {{--                            --}}{{--                                    </div> --}}
                {{--                            --}}{{--                                    <div class="relative -right-12 w-10 h-10 bg-blue-500 rounded-full hover:z-20"> --}}
                {{--                            --}}{{--                                        <img src="" alt=""> --}}
                {{--                            --}}{{--                                    </div> --}}
                {{--                            --}}{{--                                    <div class="relative -right-15 w-10 h-10 bg-red-500 rounded-full hover:z-20"> --}}
                {{--                            --}}{{--                                        <img src="" alt=""> --}}
                {{--                            --}}{{--                                    </div> --}}
                {{--                            --}}{{--                                    <div class="relative -right-18 w-10 h-10 bg-green-500 rounded-full hover:z-20"> --}}
                {{--                            --}}{{--                                        <img src="" alt=""> --}}
                {{--                            --}}{{--                                    </div> --}}
                {{--                        </div> --}}

                {{--                        <div class="w-full flex gap-3 justify-between sm:justify-end"> --}}
                {{--                            <button class="w-28 h-10 bg-[#eb3153] text-sm border-zinc-300 rounded-lg font-bold cursor-pointer text-white" --}}
                {{--                                    onclick="pap_up_all_customer('open')"> --}}
                {{--                                همه --}}
                {{--                                مشتری ها --}}
                {{--                            </button> --}}
                {{--                            --}}{{--                            <button class="w-20 h-10 bg-[#eb3153] text-white rounded-lg font-bold">ثبت</button> --}}
                {{--                        </div> --}}
                {{--                        @endif --}}
            </div>
        </div>
    </div>
    {{--        pap_up_all_customer_start --}}
    <div class="w-full h-[100vh] px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-9999999999 transition-all duration-300 invisible opacity-0"
        id="pap_up_all_customer_items">
        <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center">
            <div class="w-full lg:w-3/4 bg-white p-2 rounded-xl">
                <button class="w-full flex justify-start cursor-pointer" onclick="pap_up_all_customer('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="#9aa2b8" class="w-6">
                        <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                    </svg>
                </button>
                <div class="w-full flex flex-col gap-3 items-center pb-6">
                    <h2 class="text-xl font-bold">مرور کاربران</h2>
                    <p class="w-11/12 text-center text-[#9aa1b8]">اگر به اطلاعات بیشتری نیاز دارید ، لطفاً این مورد
                        را بررسی کنید<a href="" class="text-[#4da0ff] font-bold">کاربران مستقیم</a></p>
                </div>
                <div class="w-full flex flex-col gap-3 h-6/12 px-5 overflow-y-auto">
                    @if ($myContacts)
                        @foreach ($myContacts as $contact)
                            <div
                                class="w-full pb-3 border-b-1 border-[#dadee8] border-dashed flex justify-between  items-center pb-2">
                                <div class="flex gap-2 items-center">
                                    <img src="{{ $contact->contact->main_image ? asset('storage/' . $contact->contact->main_image) : asset('assets/img/user.png') }}"
                                        class="size-10 rounded-full" alt="">
                                    <div class="flex flex-col gap-1 ">
                                        <div>
                                            <span class="font-bold"> مرادی نبا</span>
                                            <span
                                                class="px-2 bg-[#f9f9f9] text-[#697082] text-xs rounded-xl">کاردزان</span>
                                        </div>
                                        <span class="text-[#a0a8bd]">
                                            @gmail.col
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-1">
                                    <span class="font-bold">$23,000</span>
                                    <span class="text-xs text-[#a0a8bd]">فروش</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{-- <a href="" class="w-full flex flex-col gap-1 pt-5 px-5"> --}}
                {{-- <span class="font-bold">افزودن کاربران</span> --}}
                {{-- <p class="text-[#9ca4b9] text-sm">اگر به اطلاعات بیشتری نیاز دارید ، لطفا برنامه ریزی بودجه را بررسی کنید</p> --}}
                {{-- </a> --}}
            </div>
        </div>
    </div>

    <script>
        let pap_up_all_customer_items = document.getElementById('pap_up_all_customer_items')

        function pap_up_all_customer(item) {
            if (item == 'open') {
                console.log("sdjhf/lhsdf")
                // invisible opacity-0
                pap_up_all_customer_items.classList.remove('invisible')
                pap_up_all_customer_items.classList.remove('opacity-0')
            }
            if (item == 'close') {
                console.log("sdjhf/lhsdf")
                // invisible opacity-0
                pap_up_all_customer_items.classList.add('invisible')
                pap_up_all_customer_items.classList.add('opacity-0')
            }
        }
    </script>


    {{--        pap_up_all_customer_end --}}

    {{--    </div> --}}
    {{--    <div class="pt-3 mt-4 lg:mt-8"> --}}
    {{--        <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5 bg-white"> --}}
    {{--            <div class="flex flex-row justify-between items-center"> --}}
    {{--                <h1 class="text-sm text-center lg:text-start lg:text-xl mt-3 lg:mt-5 font-bold mx-2">جزییات پروفایل --}}
    {{--                </h1> --}}
    {{--                <div class="flex flex-row items-center gap-5"> --}}
    {{--                    <div class="lg:flex flex-row items-center justify-end gap-8 hidden"> --}}
    {{--                        @if (!isset(Auth::user()->request) && !in_array(1, Auth::user()->role->pluck('id')->toArray())) --}}
    {{--                            <a href="{{ route('user.request', [Auth::user()]) }}" --}}
    {{--                               class="font-bold text-blue-500 text-xs lg:text-sm">درخواست نمایندگی</a> --}}
    {{--                        @endif --}}
    {{--                        <a href="{{ route('user.edit', [Auth::user()]) }}" --}}
    {{--                           class="font-bold text-blue-500 text-xs lg:text-sm">ویرایش پروفایل</a> --}}
    {{--                    </div> --}}
    {{--                    --}}{{--                            <div class="flex flex-row items-center gap-2"> --}}
    {{--                    --}}{{--                                <span class="text-sm text-gray-400">کد معرف شما :</span> --}}
    {{--                    --}}{{--                                <div class="flex flex-row items-center gap-3 rounded-md border-1 border-gray-500" onclick='copyText("{{ Auth::user()->ref_code }}")'> --}}
    {{--                    --}}{{--                                    <span class="text-blue-700 cursor-pointer text-sm pr-3" title="برای کپی کلیک کنید">{{ Auth::user()->ref_code }}</span> --}}
    {{--                    --}}{{--                                    <div class="h-full p-2 rounded-l-sm bg-gray-500"> --}}
    {{--                    --}}{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer size-5 fill-white" viewBox="0 0 448 512"> --}}
    {{--                    --}}{{--                                            <path d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z"/> --}}
    {{--                    --}}{{--                                        </svg> --}}
    {{--                    --}}{{--                                    </div> --}}
    {{--                    --}}{{--                                </div> --}}
    {{--                    --}}{{--                            </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}

    {{--            <div class="w-full h-px bg-gray-200 my-3 lg:my-5 "></div> --}}
    {{--            <div class="flex gap-7 sm:hidden"> --}}
    {{--                <div class="flex w-full flex-col"> --}}
    {{--                    <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">نام و نام خانوادگی</span> --}}
    {{--                    <span class="p-1.5 lg:p-2.5 text-gary-600 text-sm"> --}}
    {{--                                <strong>{{ Auth::user()->name }} --}}
    {{--                                    {{ Auth::user()?->family }} --}}
    {{--                                </strong> --}}
    {{--                            </span> --}}
    {{--                    <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">شماره تلفن</span> --}}
    {{--                    <span class="p-1.5 lg:p-2.5 text-gary-600">{{ Auth::user()->phoneNumber }}</span> --}}
    {{--                    <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">ایمیل</span> --}}
    {{--                    <span class="p-1.5 lg:p-2.5 text-gary-600">{{ Auth::user()->email }}</span> --}}
    {{--                    <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">نقش</span> --}}
    {{--                    <span class="p-1.5 lg:p-2.5 text-gary-600"> --}}
    {{--                                @foreach (Auth::user()->roles as $role) --}}
    {{--                            {{ $role }} --}}
    {{--                            <br> --}}
    {{--                        @endforeach --}}
    {{--                            </span> --}}
    {{--                </div> --}}
    {{--            </div> --}}

    {{--            <div class="sm:grid sm:grid-cols-2 sm:gap-2 hidden"> --}}
    {{--                <div class="flex w-full flex-col"> --}}
    {{--                    <span class="p-2.5 text-gray-400">نام و نام خانوادگی</span> --}}
    {{--                    <span class="p-2.5 text-gray-400">شماره تلفن</span> --}}
    {{--                    <span class="p-2.5 text-gray-400">نقش</span> --}}
    {{--                    <span class="p-2.5 text-gray-400">ایمیل</span> --}}
    {{--                </div> --}}
    {{--                <div class="flex w-full flex-col"> --}}
    {{--                            <span class="p-2.5 text-gary-600"><strong>{{ Auth::user()->name }} --}}
    {{--                                    {{ Auth::user()?->family }}</strong></span> --}}
    {{--                    <span class="p-2.5 text-gary-600">{{ Auth::user()->phoneNumber }}</span> --}}
    {{--                    <span class="p-2.5 text-gary-600"> --}}
    {{--                                @foreach (Auth::user()->roles as $role) --}}
    {{--                            {{ $role }} --}}
    {{--                            <br> --}}
    {{--                        @endforeach --}}
    {{--                            </span> --}}
    {{--                    <span class="p-2.5 text-gary-600">{{ Auth::user()->email }}</span> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    {{--    </div> --}}
    <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 backdrop-blur transition-all duration-300 invisible opacity-0"
        id="block">
        <div class="w-full lg:w-[calc(100%-265px)] float-end h-full flex flex-row justify-center items-center" id="profileBox">
            <div class="p-5 rounded-lg bg-white relative -translate-y-20 lg:translate-y-0">
                <button
                    class="flex justify-center items-center size-8 bg-white rounded-full absolute -top-3 -right-3 cursor-pointer z-99999"
                    onclick="showProfile(this, 'close')">❌</button>
                <img src=""
                    class="max-w-[300px] max-h-[300px] lg:max-w-[400px] lg:max-h-[400px] object-cover rounded-sm"
                    id="profileImage" alt="">
            </div>
        </div>
    </div>

    <script>
        function copyText(refCode) {
            navigator.clipboard.writeText(refCode)
            alert("لینک کپی شد")
        }

        let profile = document.getElementById('profileImage')
        let block = document.getElementById('block')

        function showProfile(el, state = 'open') {
            if (state == 'open') {
                console.log("11111")
                block.classList.remove('invisible')
                block.classList.remove('opacity-0')
                profile.setAttribute('src', el.getAttribute('src'))
            }
            if (state == 'close') {
                console.log("2222")

                block.classList.add('invisible')
                block.classList.add('opacity-0')
            }
        }

        function editProfileImage(el) {
            let image = document.getElementById('edit')
            let prof = document.getElementById('prof')
            let formData = new FormData()

            if (image) {
                formData.append('image', image.files[0]);
            }

            formData.append('_token', "{{ csrf_token() }}")

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('user.editProfile') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    prof.children[0].setAttribute('src', "{{ asset('storage/') }}/" + data.main_image)
                },
                error: function() {
                    console.log('error');
                }
            });
        }



        let editIcon = `
                    <span
                            class="w-fit flex flex-row items-center justify-center p-1 rounded-sm"
                            title="ویرایش">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400"
                             viewBox="0 0 512 512">
                            <path
                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                        </svg>
                    </span>`
        let elementState = ""
        let states = document.querySelectorAll('.states')

        function editInfo(el, inputState, value) {
            el.innerHTML = ""
            console.log(editIcon)
            let inp = ""

            let type = "text"
            if (inputState == "password") {
                type = "password"
            }
            if (inputState == "email") {
                type = "email"
            }
            if (inputState == "phoneNumber") {
                type = "phoneNumber"
            }


            let placeholderText = "";
            if (inputState == "password") {
                placeholderText = "رمز عبور";
            } else if (inputState == "email") {
                placeholderText = "ایمیل";
            } else if (inputState == "phoneNumber") {
                placeholderText = "شماره تلفن";
            } else {
                placeholderText = "نام و فامیلی من";
            }


            let inputValue = value == '' ? '' : value;

            inp = `
                <div class="flex gap-2">
                    <input type="${type}" value="${inputValue}" placeholder="${placeholderText}" class="border-1 border-gray-500 outline-none rounded px-3 py-1.5" id="tempInput">
                    <button onclick="saveEdit(this, '${inputState}')" data-change="${inputState}" class="text-lime-500 font-bold cursor-pointer rounded text-xl">✓</button>
                    <button onclick="cancelEdit(this, '${value =='' ? placeholderText : value}')" data-change="${inputState}" class="text-rose-500 font-bold cursor-pointer text-xl rounded">✗</button>
                </div>
                `

            el.parentElement.children[0].children[1].children[0].innerHTML = inp
        }

        {{-- function saveEdit(el, inputState){ --}}
        {{--    elementState = el.getAttribute('data-change') --}}
        {{--    let inputElement = el.parentElement.querySelector('#tempInput'); --}}
        {{--    let newValue = inputElement.value; --}}

        {{--    $.ajaxSetup({ --}}
        {{--        headers: { --}}
        {{--            'X-CSRF-TOKEN': "{{ csrf_token() }}" --}}
        {{--        } --}}
        {{--    }) --}}

        {{--    $.ajax({ --}}
        {{--        url: "{{ route('user.editInfo') }}", --}}
        {{--        type: 'POST', --}}
        {{--        dataType: "json", --}}
        {{--        data: { --}}
        {{--            'state': inputState, --}}
        {{--            'inputValue': newValue --}}
        {{--        }, --}}
        {{--        success: function(data){ --}}
        {{--            const state = el.getAttribute('data-change') || "text"; --}}
        {{--            const defaultValues = { --}}
        {{--                "text": "نام من", --}}
        {{--                "password": "رمز عبور من", --}}
        {{--                "email": "ایمیل من", --}}
        {{--                "phoneNumber": "شماره تلفن من" --}}
        {{--            } --}}
        {{--            el.parentElement.parentElement.innerHTML = newValue == "" ? defaultValues[state] : newValue; --}}
        {{--            states.forEach((state)=>{ --}}
        {{--                if(state.getAttribute('data-state') == elementState){ --}}
        {{--                    state.innerHTML = editIcon --}}
        {{--                } --}}
        {{--            }) --}}
        {{--        }, --}}
        {{--        error: function(){ --}}
        {{--            console.log('errorrrr'); --}}
        {{--        } --}}
        {{--    }); --}}
        {{-- } --}}

        function saveEdit(el, inputState) {
            elementState = el.getAttribute('data-change')
            let inputElement = el.parentElement.querySelector('#tempInput');
            let newValue = inputElement.value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('user.editInfo') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    'state': inputState,
                    'inputValue': newValue
                },
                success: function(data) {
                    console.log(data)
                    const savedValue = newValue;

                    const defaultValues = {
                        "name": "نام من",
                        "family": "فامیلی من",
                        "password": "رمز عبور",
                        "email": "ایمیل من",
                        "phoneNumber": "شماره تلفن من"
                    }

                    let displayValue = (savedValue == "" || savedValue == null) ? defaultValues[inputState] :
                        savedValue;
                    el.parentElement.parentElement.innerHTML = displayValue;

                    states.forEach((state) => {
                        if (state.getAttribute('data-state') == elementState) {
                            state.innerHTML = editIcon
                        }
                    })
                },
                error: function() {
                    console.log('errorrrr');
                    cancelEdit(el, oldValue);
                }
            });
        }

        function cancelEdit(el, oldValue) {

            elementState = el.getAttribute('data-change')
            el.parentElement.parentElement.innerHTML = oldValue

            states.forEach((state) => {
                if (state.getAttribute('data-state') == elementState) {
                    state.innerHTML = editIcon
                }
            })

        }
    </script>
@endsection
