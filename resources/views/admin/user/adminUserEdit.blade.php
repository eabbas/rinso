
@extends('admin.app.panel')

@section('title', 'ویرایش کاربر')

@section('content')
<div class="w-full pb-6" dir="rtl">

    {{-- عنوان صفحه --}}
    <div class="mb-5">
        <h1 class="text-lg md:text-xl font-bold text-[#101827]">
            ویرایش کاربر {{ $user->name }} {{ $user->family }}
        </h1>

        <div class="mt-2 flex items-center gap-2 text-xs text-[#99A1B7]">
            <a href="{{ route('user.profile') }}" class="transition hover:text-[#FB9413]">
                داشبورد
            </a>
            <span>/</span>
            <span>اطلاعات کاربر</span>
        </div>
    </div>

    {{-- کارت اطلاعات کاربر --}}
    <div class="rounded-2xl border border-[#E6E9EF] bg-white p-5 md:p-7 shadow-sm">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-start">

            {{-- تصویر و مشخصات --}}
            <div class="flex flex-col items-center gap-4 md:flex-row md:items-start md:gap-5 lg:flex-1">

                @if (!$user->main_image)
                    <img
                        class="h-24 w-24 rounded-2xl border border-[#E6E9EF] object-cover"
                        src="{{ asset('assets/img/user.png') }}"
                        alt="user__avatar">
                @else
                    <img
                        class="h-24 w-24 rounded-2xl border border-[#E6E9EF] object-cover"
                        src="{{ asset('storage/' . $user->main_image) }}"
                        alt="user__picture">
                @endif

                <div class="flex w-full flex-col items-center gap-4 text-center md:items-start md:text-right">

                    <div>
                        <h2 class="text-lg font-bold text-[#101827]">
                            {{ $user->name }} {{ $user->family }}
                        </h2>
                        <p class="mt-1 text-xs text-gray-400">اطلاعات حساب کاربری</p>
                    </div>

                    @if($user->email)
                        <div class="flex flex-col items-center gap-3 text-xs text-gray-500 md:items-start">

                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-[#FB9413]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" fill="currentColor">
                                    <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/>
                                </svg>
                                {{ $user->email }}
                            </span>

                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-[#FB9413]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.2 3.6a1 1 0 01-.5 1.2l-2.1 1.05a11 11 0 005.2 5.2l1.05-2.1a1 1 0 011.2-.5l3.6 1.2a1 1 0 01.68.95V18a2 2 0 01-2 2h-1C9.27 20 4 14.73 4 8V5z"/>
                                </svg>
                                {{ $user->phoneNumber }}
                            </span>

                        </div>
                    @endif
                </div>
            </div>

            {{-- آمار کاربر --}}
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-3 lg:w-auto lg:min-w-[420px]">

                <div class="flex items-center justify-between rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4 sm:flex-col sm:items-start sm:gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-50 text-green-600">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor">
                            <path d="M209.4 39.4C204.8 34.7 198.6 32 192 32s-12.8 2.7-17.4 7.4l-168 176c-9.2 9.6-8.8 24.8 .8 33.9s24.8 8.8 33.9-.8L168 115.9V456c0 13.3 10.7 24 24 24s24-10.7 24-24V115.9L342.6 248.6c9.2 9.6 24.3 9.9 33.9 .8s9.9-24.3 .8-33.9l-168-176z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-lg font-bold text-[#101827]">$12.600</div>
                        <span class="text-xs text-gray-400">درآمد</span>
                    </div>
                </div>

                <div class="flex items-center justify-between rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4 sm:flex-col sm:items-start sm:gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-500">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor">
                            <path d="M174.6 472.6c4.5 4.7 10.8 7.4 17.4 7.4s12.8-2.7 17.4-7.4l168-176c9.2-9.6 8.8-24.8-.8-33.9s-24.8-8.8-33.9 .8L216 396.1 216 56c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 340.1L41.4 263.4c-9.2-9.6-24.3-9.9-33.9-.8s-9.9 24.3-.8 33.9l168 176z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-lg font-bold text-[#101827]">80</div>
                        <span class="text-xs text-gray-400">پروژه‌ها</span>
                    </div>
                </div>

                <div class="flex items-center justify-between rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4 sm:flex-col sm:items-start sm:gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-50 text-green-600">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor">
                            <path d="M209.4 39.4C204.8 34.7 198.6 32 192 32s-12.8 2.7-17.4 7.4l-168 176c-9.2 9.6-8.8 24.8 .8 33.9s24.8 8.8 33.9-.8L168 115.9V456c0 13.3 10.7 24 24 24s24-10.7 24-24V115.9L342.6 248.6c9.2 9.6 24.3 9.9 33.9 .8s9.9-24.3 .8-33.9l-168-176z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-lg font-bold text-[#101827]">%25</div>
                        <span class="text-xs text-gray-400">سود خالص</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- فرم ویرایش --}}
    <div class="mt-5 overflow-hidden rounded-2xl border border-[#E6E9EF] bg-white shadow-sm">

        <div class="flex items-center gap-3 border-b border-[#EEF0F3] px-5 py-5 md:px-7">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#101827] text-[#FB9413]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.67a4.5 4.5 0 01-1.897 1.13L6 18.5l.7-2.685a4.5 4.5 0 011.13-1.897L16.862 4.487z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 7.125L16.875 4.5M12 20.25H5.25A2.25 2.25 0 013 18V5.25A2.25 2.25 0 015.25 3h9"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-[#101827]">جزئیات پروفایل</h2>
                <p class="mt-1 text-xs text-gray-400">اطلاعات حساب کاربری را ویرایش کنید</p>
            </div>
        </div>

        <form action="{{ route('user.update', [$user->id]) }}" method="post"
              class="p-5 md:p-7" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="space-y-6">

                {{-- تصویر --}}
                <div class="flex flex-col gap-3 border-b border-[#EEF0F3] pb-6 lg:flex-row">
                    <div class="w-full text-sm font-medium text-[#263449] lg:w-2/12 lg:pt-3">
                        تصویر پروفایل
                    </div>

                    <div class="relative flex w-full items-center gap-4 lg:w-10/12">
                        @if ($user->main_image)
                            <img class="h-24 w-24 rounded-2xl border border-[#E6E9EF] object-cover shadow-sm"
                                 src="{{ asset('storage/' . $user->main_image) }}" alt="user imag">
                        @else
                            <img class="h-24 w-24 rounded-2xl border border-[#E6E9EF] object-cover shadow-sm"
                                 src="{{ asset('assets/img/user.png') }}" alt="user imag">
                        @endif

                        <div>
                            <label for="file-input"
                                   class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-[#E1E5EB] bg-[#F8F9FB] px-4 py-2.5 text-xs font-medium text-[#263449] transition hover:border-[#FB9413] hover:text-[#FB9413]">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                    <path d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z"/>
                                </svg>
                                تغییر تصویر
                            </label>

                            <input type="file" id="file-input" name="main_image"
                                   class="hidden" placeholder="jj">

                            <p class="mt-2 text-[11px] text-gray-400">برای تغییر تصویر پروفایل کلیک کنید</p>
                        </div>
                    </div>
                </div>

                {{-- نام و نام خانوادگی --}}
                <div class="flex flex-col gap-3 border-b border-[#EEF0F3] pb-6 lg:flex-row">
                    <label class="w-full text-sm font-medium text-[#263449] lg:w-2/12 lg:pt-3">
                        نام و نام خانوادگی
                    </label>

                    <div class="flex w-full flex-col gap-3 sm:flex-row lg:w-10/12">
                        <input
                            class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10"
                            type="text" value="{{ $user->name }}" name="name" placeholder="نام">

                        <input
                            class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10"
                            type="text" value="{{ $user->family }}" name="family" placeholder="نام خانوادگی">
                    </div>
                </div>

                {{-- شماره تلفن --}}
                <div class="flex flex-col gap-3 border-b border-[#EEF0F3] pb-6 lg:flex-row">
                    <label class="w-full text-sm font-medium text-[#263449] lg:w-2/12 lg:pt-3">
                        شماره تلفن
                    </label>

                    <div class="w-full lg:w-10/12">
                        <input
                            class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10 lg:w-1/2"
                            type="number" name="phoneNumber" value="{{ $user->phoneNumber }}"
                            placeholder="شماره تلفن" required>
                    </div>
                </div>

                {{-- ایمیل --}}
                <div class="flex flex-col gap-3 border-b border-[#EEF0F3] pb-6 lg:flex-row">
                    <label class="w-full text-sm font-medium text-[#263449] lg:w-2/12 lg:pt-3">
                        ایمیل
                    </label>

                    <div class="w-full lg:w-10/12">
                        <input
                            class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10"
                            type="email" name="email" value="{{ $user->email ? $user->email : '' }}"
                            placeholder="ایمیل">
                    </div>
                </div>

                {{-- رمز عبور --}}
                <div class="flex flex-col gap-3 border-b border-[#EEF0F3] pb-6 lg:flex-row">
                    <label class="w-full text-sm font-medium text-[#263449] lg:w-2/12 lg:pt-3">
                        رمز عبور
                    </label>

                    <div class="w-full lg:w-10/12">
                        <input
                            class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10"
                            type="password" name="password" placeholder="رمز عبور جدید">
                    </div>
                </div>

                {{-- نقش --}}
                <div class="flex flex-col gap-3 lg:flex-row">
                    <label class="w-full text-sm font-medium text-[#263449] lg:w-2/12 lg:pt-3">
                        نقش کاربر
                    </label>

                    <div class="w-full lg:w-10/12">
                        <select
                            class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10"
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

            {{-- دکمه‌ها --}}
            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-[#EEF0F3] pt-5 sm:flex-row sm:justify-end">

                <button
                    class="rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-6 py-3 text-sm font-medium text-[#526075] transition hover:bg-[#EBEDF1]"
                    type="reset">
                    لغو تغییرات
                </button>

                <button
                    class="flex items-center justify-center gap-2 rounded-xl bg-[#101827] px-7 py-3 text-sm font-medium text-white transition hover:bg-[#263449]"
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#FB9413]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    ذخیره تغییرات
                </button>

            </div>
        </form>
    </div>
</div>
@endsection
