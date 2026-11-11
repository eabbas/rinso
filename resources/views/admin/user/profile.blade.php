
@extends('admin.app.panel')
@section('title', 'پروفایل کاربری')
@section('content')

<div class="w-full space-y-5" dir="rtl">

    {{-- عنوان صفحه --}}
    <div class="flex flex-col gap-1">
        <h1 class="text-xl md:text-2xl font-bold text-[#101827]">اطلاعات کاربری</h1>
        <p class="text-sm text-gray-500">مدیریت و مشاهده اطلاعات حساب کاربری</p>
    </div>

    {{-- کد معرف و لینک دعوت --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        <div class="bg-white border border-[#E6E9EF] rounded-2xl p-5 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="size-10 rounded-xl bg-[#FFF4E8] flex items-center justify-center">
                    <svg class="size-5 fill-[#FB9413]" viewBox="0 0 448 512">
                        <path d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-[#263449] text-sm">کد معرف شما</h3>
                    <p class="text-xs text-gray-400 mt-1">کد اختصاصی حساب کاربری</p>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 bg-[#F7F8FA] border border-[#E6E9EF] rounded-xl p-3">
                <span class="text-sm font-semibold text-[#263449] tracking-wider">
                    {{ Auth::user()->ref_code }}
                </span>
                <button type="button"
                    onclick='copyText("{{ Auth::user()->ref_code }}")'
                    class="size-9 shrink-0 rounded-lg bg-white border border-[#E6E9EF] flex items-center justify-center hover:border-[#FB9413] transition"
                    title="کپی کد معرف">
                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 448 512">
                        <path d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-14.3 64-64V416H256v32c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h64V128H64z"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="bg-white border border-[#E6E9EF] rounded-2xl p-5 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="size-10 rounded-xl bg-[#FFF4E8] flex items-center justify-center">
                    <svg class="size-5 fill-[#FB9413]" viewBox="0 0 512 512">
                        <path d="M502.6 70.6L441.4 9.4C435.4 3.4 427.3 0 418.7 0H160c-17.7 0-32 14.3-32 32v64h32V32h258.7L480 93.3V480H160v-64h-32v64c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32V93.3c0-8.5-3.4-16.6-9.4-22.6zM352 192H32c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32zm0 256H32V224h320v224z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-[#263449] text-sm">لینک دعوت شما</h3>
                    <p class="text-xs text-gray-400 mt-1">لینک اختصاصی ثبت‌نام</p>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 bg-[#F7F8FA] border border-[#E6E9EF] rounded-xl p-3">
                <span class="text-xs text-[#64748B] truncate" dir="ltr">
                    {{ url('signup/' . Auth::user()->ref_code) }}
                </span>
                <button type="button"
                    onclick='copyText("{{ url('signup/' . Auth::user()->ref_code) }}")'
                    class="size-9 shrink-0 rounded-lg bg-white border border-[#E6E9EF] flex items-center justify-center hover:border-[#FB9413] transition"
                    title="کپی لینک دعوت">
                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 448 512">
                        <path d="M384 352H224c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32H332.1c4.2 0 8.3 1.7 11.3 4.7l67.9 67.9c3 3 4.7 7.1 4.7 11.3V320c0 17.7-14.3 32-32 32zM433.9 81.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H224c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H384c35.3 0 64-14.3 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c17.7 0 32-14.3 32-32V416H224v32H64V192h64V128H64z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- اطلاعات پروفایل --}}
    <div class="bg-white border border-[#E6E9EF] rounded-2xl shadow-sm overflow-hidden">

        <div class="px-5 md:px-7 py-5 border-b border-[#E6E9EF] flex items-center justify-between">
            <div>
                <h2 class="font-bold text-[#101827]">مشخصات حساب کاربری</h2>
                <p class="text-xs text-gray-400 mt-1">برای تغییر هر مورد، روی آیکون ویرایش کلیک کنید.</p>
            </div>
            <span class="hidden sm:flex items-center gap-2 text-xs text-[#64748B] bg-[#F7F8FA] px-3 py-2 rounded-lg">
                <span class="size-2 rounded-full bg-[#FB9413]"></span>
                حساب کاربری
            </span>
        </div>

        <div class="p-5 md:p-7">
            <div class="flex flex-col lg:flex-row gap-8">

                {{-- تصویر کاربر --}}
                <div class="w-full lg:w-56 shrink-0 flex flex-col items-center">
                    <div class="relative" id="prof">
                        @if (!Auth::user()->main_image)
                            <img
                                class="size-36 md:size-40 object-cover rounded-2xl border border-[#E6E9EF] bg-[#F7F8FA] cursor-pointer"
                                onclick="showProfile(this)"
                                src="{{ asset('assets/img/user.png') }}"
                                alt="user__avatar">
                        @else
                            <img
                                class="size-36 md:size-40 object-cover rounded-2xl border border-[#E6E9EF] bg-[#F7F8FA] cursor-pointer"
                                onclick="showProfile(this)"
                                src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                alt="user__picture">

                            <label for="edit"
                                class="absolute -bottom-2 -left-2 size-10 rounded-xl bg-[#101827] border-2 border-white flex items-center justify-center cursor-pointer hover:bg-[#FB9413] transition"
                                title="تغییر تصویر پروفایل">
                                <svg class="size-4 fill-white" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                </svg>
                            </label>
                            <input
                                class="hidden"
                                onchange="editProfileImage(this)"
                                type="file"
                                name=""
                                id="edit">
                        @endif
                    </div>

                    <p class="text-sm font-semibold text-[#263449] mt-5">
                        {{ Auth::user()->name }} {{ Auth::user()->family }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">تصویر پروفایل</p>
                </div>

                {{-- فیلدهای اطلاعاتی --}}
                <div class="flex-1 min-w-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8">

                        {{-- نام --}}
                        <div class="flex items-center justify-between gap-3 py-4 border-b border-[#E6E9EF]">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="size-9 shrink-0 rounded-lg bg-[#F7F8FA] flex items-center justify-center">
                                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 448 512">
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <span class="block text-xs text-gray-400 mb-1">نام</span>
                                    <div class="text-sm text-[#263449] font-medium">
                                        @if (Auth::user()->name)
                                            <span>{{ Auth::user()->name }}</span>
                                        @else
                                            <span>نام من</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center cursor-pointer states" data-state="name"
                                onclick='editInfo(this, "name", "{{ Auth::user()->name }}")'>
                                <span class="size-9 flex items-center justify-center rounded-lg hover:bg-[#FFF4E8] transition" title="ویرایش">
                                    <svg class="size-4 fill-gray-400 hover:fill-[#FB9413]" viewBox="0 0 512 512">
                                        <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        {{-- نام خانوادگی --}}
                        <div class="flex items-center justify-between gap-3 py-4 border-b border-[#E6E9EF]">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="size-9 shrink-0 rounded-lg bg-[#F7F8FA] flex items-center justify-center">
                                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 448 512">
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <span class="block text-xs text-gray-400 mb-1">نام خانوادگی</span>
                                    <div class="text-sm text-[#263449] font-medium">
                                        @if (Auth::user()->family)
                                            <span>{{ Auth::user()->family }}</span>
                                        @else
                                            <span>فامیلی من</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center cursor-pointer states" data-state="family"
                                onclick='editInfo(this, "family", "{{ Auth::user()->family }}")'>
                                <span class="size-9 flex items-center justify-center rounded-lg hover:bg-[#FFF4E8] transition" title="ویرایش">
                                    <svg class="size-4 fill-gray-400 hover:fill-[#FB9413]" viewBox="0 0 512 512">
                                        <path d="M441 58.9L453.1 71c9.4 9.4 24.6 9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        {{-- ایمیل --}}
                        <div class="flex items-center justify-between gap-3 py-4 border-b border-[#E6E9EF]">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="size-9 shrink-0 rounded-lg bg-[#F7F8FA] flex items-center justify-center">
                                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 512 512">
                                        <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm0 48H448c8.8 0 16 7.2 16 16v20.4L256 284.8 48 148.4V128c0-8.8 7.2-16 16-16zm-16 94.8l194.8 127.7c8 5.2 18.4 5.2 26.4 0L464 206.8V384c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V206.8z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <span class="block text-xs text-gray-400 mb-1">ایمیل</span>
                                    <div class="text-sm text-[#263449] font-medium break-all">
                                        @if (Auth::user()->email)
                                            <span>{{ Auth::user()->email }}</span>
                                        @else
                                            <span>ایمیل من</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center cursor-pointer states" data-state="email"
                                onclick='editInfo(this, "email", "{{ Auth::user()->email }}")'>
                                <span class="size-9 flex items-center justify-center rounded-lg hover:bg-[#FFF4E8] transition" title="ویرایش">
                                    <svg class="size-4 fill-gray-400 hover:fill-[#FB9413]" viewBox="0 0 512 512">
                                        <path d="M441 58.9L453.1 71c9.4 9.4 24.6 9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        {{-- شماره موبایل --}}
                        <div class="flex items-center justify-between gap-3 py-4 border-b border-[#E6E9EF]">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="size-9 shrink-0 rounded-lg bg-[#F7F8FA] flex items-center justify-center">
                                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 512 512">
                                        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <span class="block text-xs text-gray-400 mb-1">شماره موبایل</span>
                                    <div class="text-sm text-[#263449] font-medium">
                                        @if (Auth::user()->phoneNumber)
                                            <span>{{ Auth::user()->phoneNumber }}</span>
                                        @else
                                            <span>شماره موبایل من</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center cursor-pointer states" data-state="phoneNumber"
                                onclick='editInfo(this, "phoneNumber", "{{ Auth::user()->phoneNumber }}")'>
                                <span class="size-9 flex items-center justify-center rounded-lg hover:bg-[#FFF4E8] transition" title="ویرایش">
                                    <svg class="size-4 fill-gray-400 hover:fill-[#FB9413]" viewBox="0 0 512 512">
                                        <path d="M441 58.9L453.1 71c9.4 9.4 24.6 9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        {{-- رمز عبور --}}
                        <div class="flex items-center justify-between gap-3 py-4 border-b border-[#E6E9EF]">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="size-9 shrink-0 rounded-lg bg-[#F7F8FA] flex items-center justify-center">
                                    <svg class="size-4 fill-[#64748B]" viewBox="0 0 448 512">
                                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 mb-1">رمز عبور</span>
                                    <div class="text-sm text-[#263449] font-medium">
                                        <span>********</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center cursor-pointer states" data-state="password"
                                onclick="editInfo(this, 'password', '******')">
                                <span class="size-9 flex items-center justify-center rounded-lg hover:bg-[#FFF4E8] transition" title="ویرایش">
                                    <svg class="size-4 fill-gray-400 hover:fill-[#FB9413]" viewBox="0 0 512 512">
                                        <path d="M441 58.9L453.1 71c9.4 9.4 24.6 9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- پنجره مرور کاربران --}}
    <div class="fixed inset-0 z-[999999] bg-[#101827]/50 backdrop-blur-sm transition-all duration-300 invisible opacity-0"
        id="pap_up_all_customer_items">
        <div class="w-full h-dvh flex justify-center items-center p-4 lg:pr-[265px]">
            <div class="w-full max-w-3xl max-h-[85vh] overflow-hidden bg-white rounded-2xl shadow-2xl">

                <div class="flex items-center justify-between px-5 py-4 border-b border-[#E6E9EF]">
                    <div>
                        <h2 class="font-bold text-[#101827]">مرور کاربران</h2>
                        <p class="text-xs text-gray-400 mt-1">فهرست کاربران مرتبط با حساب شما</p>
                    </div>
                    <button type="button" onclick="pap_up_all_customer('close')"
                        class="size-9 rounded-lg bg-[#F7F8FA] flex items-center justify-center hover:bg-[#FFF4E8] transition">
                        <svg class="size-4 fill-[#64748B]" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                        </svg>
                    </button>
                </div>

                <div class="max-h-[65vh] overflow-y-auto p-5 space-y-3">
                    @if ($myContacts)
                        @foreach ($myContacts as $contact)
                            <div class="flex items-center justify-between gap-3 p-3 rounded-xl border border-[#E6E9EF] hover:bg-[#F7F8FA] transition">
                                <div class="flex items-center gap-3 min-w-0">
                                    <img
                                        src="{{ $contact->contact->main_image ? asset('storage/' . $contact->contact->main_image) : asset('assets/img/user.png') }}"
                                        class="size-11 rounded-full object-cover border border-[#E6E9EF]"
                                        alt="">
                                    <div class="min-w-0">
                                        <span class="block text-sm font-bold text-[#263449]">مرادی نبا</span>
                                        <span class="text-xs text-gray-400">کاردزان</span>
                                        <span class="block text-xs text-gray-400 mt-1" dir="ltr">@gmail.col</span>
                                    </div>
                                </div>
                                <div class="text-left shrink-0">
                                    <span class="block text-sm font-bold text-[#263449]">$23,000</span>
                                    <span class="text-xs text-gray-400">فروش</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- نمایش تصویر پروفایل --}}
    <div class="fixed inset-0 z-[9999999] bg-[#101827]/70 backdrop-blur-sm transition-all duration-300 invisible opacity-0"
        id="block">
        <div class="w-full h-full flex justify-center items-center p-4 lg:pr-[265px]" id="profileBox">
            <div class="p-4 rounded-2xl bg-white relative shadow-2xl">
                <button
                    class="size-9 bg-[#F7F8FA] rounded-full absolute -top-3 -right-3 cursor-pointer z-[9999999] flex items-center justify-center text-[#64748B]"
                    onclick="showProfile(this, 'close')">✕</button>
                <img src=""
                    class="max-w-[300px] max-h-[300px] md:max-w-[500px] md:max-h-[500px] object-contain rounded-lg"
                    id="profileImage" alt="">
            </div>
        </div>
    </div>

</div>

<script>
    let pap_up_all_customer_items = document.getElementById('pap_up_all_customer_items')

    function pap_up_all_customer(item) {
        if (item == 'open') {
            console.log("sdjhf/lhsdf")
            pap_up_all_customer_items.classList.remove('invisible')
            pap_up_all_customer_items.classList.remove('opacity-0')
        }
        if (item == 'close') {
            console.log("sdjhf/lhsdf")
            pap_up_all_customer_items.classList.add('invisible')
            pap_up_all_customer_items.classList.add('opacity-0')
        }
    }

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
        <span class="size-9 flex items-center justify-center rounded-lg hover:bg-[#FFF4E8] transition" title="ویرایش">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-400" viewBox="0 0 512 512">
                <path d="M441 58.9L453.1 71c9.4 9.4 24.6 9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
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
            <div class="flex flex-wrap items-center gap-2">
                <input type="${type}" value="${inputValue}" placeholder="${placeholderText}"
                    class="w-full min-w-0 sm:w-auto border border-[#E1E5EB] bg-[#F5F6F8] text-sm text-[#263449] outline-none rounded-lg px-3 py-2 focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                    id="tempInput">
                <button onclick="saveEdit(this, '${inputState}')" data-change="${inputState}"
                    class="size-8 bg-emerald-50 text-emerald-600 font-bold cursor-pointer rounded-lg">✓</button>
                <button onclick="cancelEdit(this, '${value =='' ? placeholderText : value}')" data-change="${inputState}"
                    class="size-8 bg-rose-50 text-rose-500 font-bold cursor-pointer rounded-lg">✕</button>
            </div>
        `

        el.parentElement.children[0].children[1].children[0].innerHTML = inp
    }

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

                let displayValue = (savedValue == "" || savedValue == null) ? defaultValues[inputState] : savedValue;
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
