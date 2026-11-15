
@extends('admin.app.panel')

@section('title', 'ویرایش کاربر')

@section('content')

@php
    $selectedRoles = old('roles', $userRoles ?? []);
    $roleTitles = [
        'admin' => 'مدیر کل',
        'admin2' => 'مدیر سیستم',
        'general' => 'کاربر عادی',
    ];
@endphp

<div class="w-full space-y-6 pb-8 text-[#263449]" dir="rtl">

    {{-- هدر صفحه --}}
    <section class="relative overflow-hidden rounded-3xl bg-[#101827] p-5 text-white shadow-lg md:p-7">
        <div class="absolute -left-16 -top-20 h-64 w-64 rounded-full bg-[#FB9413]/10 blur-3xl"></div>
        <div class="absolute -bottom-24 right-1/3 h-56 w-56 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
            <div>
                <div class="mb-3 flex items-center gap-2 text-xs text-white/50">
                    <a href="{{ route('user.profile') }}" class="transition hover:text-[#FB9413]">
                        داشبورد
                    </a>
                    <span>/</span>
                    <span>مدیریت کاربران</span>
                    <span>/</span>
                    <span class="text-[#FB9413]">ویرایش کاربر</span>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#FB9413]/15 text-[#FB9413]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m12-13a4 4 0 11-8 0 4 4 0 018 0zm5 5v6m-3-3h6"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-lg font-bold md:text-xl">
                            ویرایش اطلاعات کاربر
                        </h1>
                       
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-2 self-start in-fa rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-xs text-white/70 sm:self-center">
                <span class="h-2 w-2 rounded-full bg-[#FB9413]"></span>
                شناسه کاربر: {{ $user->id }}
            </div>
        </div>
    </section>


    {{-- کارت خلاصه پروفایل --}}
    <section class="overflow-hidden rounded-3xl border border-[#E8EBF0] bg-white shadow-sm">
        <div class="p-5 md:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                <div class="relative mx-auto shrink-0 sm:mx-0">
                    <img
                        id="profile-header-image"
                        src="{{ $user->main_image ? asset('storage/' . $user->main_image) : asset('assets/img/user.png') }}"
                        alt="تصویر پروفایل"
                        class="h-24 w-24 rounded-3xl border-4 border-[#F5F6F8] object-cover shadow-sm"
                    >
                    <span class="absolute -bottom-1 -left-1 flex h-7 w-7 items-center justify-center rounded-xl border-2 border-white bg-[#FB9413] text-white">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.67a4.5 4.5 0 01-1.897 1.13L6 18.5l.7-2.685a4.5 4.5 0 011.13-1.897L16.862 4.487z"/>
                        </svg>
                    </span>
                </div>

                <div class="min-w-0 flex-1 text-center sm:text-right">
                    <h2 class="text-lg font-bold text-[#101827]">
                        {{ $user->name && $user->family ? $user->name .' '. $user->family : 'بدون نام' }}
                    </h2>
                   

                    <div class="mt-4 flex flex-wrap items-center justify-center gap-2 sm:justify-start">
                        @if($user->email)
                            <span class="inline-flex max-w-full items-center gap-2 rounded-xl bg-[#F8F9FB] px-3 py-2 text-xs text-[#526075]">
                                <svg class="h-4 w-4 shrink-0 text-[#FB9413]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                </svg>
                                <span class="break-all">{{ $user->email }}</span>
                            </span>
                        @endif

                        @if($user->phoneNumber)
                            <span class="inline-flex in-fa items-center gap-2 rounded-xl bg-[#F8F9FB] px-3 py-2 text-xs text-[#526075]" dir="ltr">
                                <svg class="h-4 w-4 text-[#FB9413]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.2 3.6a1 1 0 01-.5 1.2l-2.1 1.05a11 11 0 005.2 5.2l1.05-2.1a1 1 0 011.2-.5l3.6 1.2a1 1 0 01.68.95V18a2 2 0 01-2 2h-1C9.27 20 4 14.73 4 8V5z"/>
                                </svg>
                                {{ $user->phoneNumber }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="hidden h-16 w-px bg-[#EEF0F3] sm:block"></div>

                <div class="hidden shrink-0 text-center sm:block">
                    <p class="text-[11px] text-[#98A1B2]">وضعیت حساب</p>
                    <div class="mt-2 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-2 text-xs font-medium text-emerald-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        ثبت‌شده
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- پیام خطا --}}
    @if ($errors->any())
        <div class="rounded-2xl border border-red-100 bg-red-50 p-4">
            <div class="flex items-start gap-3">
                <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 4h.01M10.3 3.86L1.82 18.5A2 2 0 003.55 21h16.9a2 2 0 001.73-2.5L13.7 3.86a2 2 0 00-3.4 0z"/>
                </svg>
                <div>
                    <p class="text-sm font-bold text-red-700">لطفاً موارد زیر را بررسی کنید</p>
                    <ul class="mt-2 list-inside list-disc space-y-1 text-xs text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    {{-- فرم ویرایش --}}
    <form
        action="{{ route('user.update', [$user->id]) }}"
        method="post"
        enctype="multipart/form-data"
        id="user-edit-form"
        class="space-y-5"
    >
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        {{-- اطلاعات شخصی --}}
        <section class="overflow-hidden rounded-3xl border border-[#E8EBF0] bg-white shadow-sm">

            <div class="flex items-center gap-3 border-b border-[#EEF0F3] px-5 py-5 md:px-7">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#101827] text-[#FB9413]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 21a8 8 0 00-16 0m12-13a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-[#101827]">اطلاعات شخصی</h2>
                    <p class="mt-1 text-[11px] text-[#98A1B2]">مشخصات اصلی حساب کاربری</p>
                </div>
            </div>

            <div class="space-y-6 p-5 md:p-7">

                {{-- تصویر پروفایل --}}
                <div class="grid gap-4 border-b border-[#EEF0F3] pb-6 md:grid-cols-12">
                    <div class="md:col-span-3">
                        <label class="text-sm font-semibold text-[#263449]">تصویر پروفایل</label>
                        <p class="mt-1 text-[11px] leading-6 text-[#98A1B2]">تصویر اصلی کاربر را انتخاب کنید</p>
                    </div>

                    <div class="md:col-span-9">
                        <div class="flex flex-col gap-4 rounded-2xl border border-dashed border-[#DDE2EA] bg-[#F8F9FB] p-4 sm:flex-row sm:items-center">

                            <img
                                id="profile-preview"
                                src="{{ $user->main_image ? asset('storage/' . $user->main_image) : asset('assets/img/user.png') }}"
                                alt="پیش‌نمایش تصویر"
                                class="h-24 w-24 shrink-0 rounded-2xl border border-[#E5E8EE] bg-white object-cover"
                            >

                            <div class="min-w-0 flex-1">
                                <label
                                    for="file-input"
                                    class="inline-flex cursor-pointer items-center gap-2 rounded-xl bg-[#101827] px-4 py-3 text-xs font-semibold text-white transition hover:bg-[#263449]"
                                >
                                    <svg class="h-4 w-4 text-[#FB9413]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16V4m0 0L7 9m5-5l5 5M4 16v3a1 1 0 001 1h14a1 1 0 001-1v-3"/>
                                    </svg>
                                    انتخاب تصویر جدید
                                </label>

                                <input
                                    type="file"
                                    id="file-input"
                                    name="main_image"
                                    class="hidden"
                                    accept="image/jpeg,image/png,image/webp"
                                >

                                <p id="image-file-name" class="mt-3 text-xs text-[#526075]">
                                    تصویری انتخاب نشده است
                                </p>
                                <p class="mt-1 text-[10px] text-[#98A1B2]">
                                    فرمت‌های مجاز: JPG، PNG و WEBP
                                </p>

                                <button
                                    type="button"
                                    id="remove-new-image"
                                    class="mt-2 hidden text-xs font-medium text-red-500 transition hover:text-red-700"
                                >
                                    لغو انتخاب تصویر جدید
                                </button>
                            </div>
                        </div>
                        @error('main_image')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                {{-- نام و نام خانوادگی --}}
                <div class="grid gap-4 border-b border-[#EEF0F3] pb-6 md:grid-cols-12">
                    <div class="md:col-span-3">
                        <label class="text-sm font-semibold text-[#263449]">نام و نام خانوادگی</label>
                        <p class="mt-1 text-[11px] leading-6 text-[#98A1B2]">نام نمایشی کاربر در سامانه</p>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2 md:col-span-9">
                        <div>
                            <label for="name" class="mb-2 block text-xs font-medium text-[#526075]">نام</label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                placeholder="مثلاً محمد"
                                class="w-full rounded-xl border border-[#E1E5EB] bg-[#F8F9FB] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-[#AAB1BE] focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-[#FB9413]/10"
                            >
                            @error('name')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="family" class="mb-2 block text-xs font-medium text-[#526075]">نام خانوادگی</label>
                            <input
                                id="family"
                                type="text"
                                name="family"
                                value="{{ old('family', $user->family) }}"
                                placeholder="مثلاً افتخاری"
                                class="w-full rounded-xl border border-[#E1E5EB] bg-[#F8F9FB] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-[#AAB1BE] focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-[#FB9413]/10"
                            >
                            @error('family')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                {{-- شماره تلفن --}}
                <div class="grid gap-4 border-b border-[#EEF0F3] pb-6 md:grid-cols-12">
                    <div class="md:col-span-3">
                        <label for="phoneNumber" class="text-sm font-semibold text-[#263449]">شماره تلفن</label>
                        <p class="mt-1 text-[11px] leading-6 text-[#98A1B2]">شماره تماس کاربر</p>
                    </div>

                    <div class="md:col-span-9">
                        <div class="relative md:max-w-md">
                            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-[#98A1B2]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.2 3.6a1 1 0 01-.5 1.2l-2.1 1.05a11 11 0 005.2 5.2l1.05-2.1a1 1 0 011.2-.5l3.6 1.2a1 1 0 01.68.95V18a2 2 0 01-2 2h-1C9.27 20 4 14.73 4 8V5z"/>
                                </svg>
                            </span>

                            <input
                                id="phoneNumber"
                                type="tel"
                                name="phoneNumber"
                                value="{{ old('phoneNumber', $user->phoneNumber) }}"
                                placeholder="09123456789"
                                dir="ltr"
                                required
                                class="w-full rounded-xl border border-[#E1E5EB] bg-[#F8F9FB] py-3 pl-4 pr-12 text-left text-sm text-[#263449] outline-none transition placeholder:text-[#AAB1BE] focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-[#FB9413]/10"
                            >
                        </div>
                        @error('phoneNumber')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                {{-- ایمیل --}}
                <div class="grid gap-4 md:grid-cols-12">
                    <div class="md:col-span-3">
                        <label for="email" class="text-sm font-semibold text-[#263449]">آدرس ایمیل</label>
                        <p class="mt-1 text-[11px] leading-6 text-[#98A1B2]">ایمیل ثبت‌شده در حساب کاربری</p>
                    </div>

                    <div class="md:col-span-9">
                        <div class="relative md:max-w-md">
                            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-[#98A1B2]">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                </svg>
                            </span>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email ?? '') }}"
                                placeholder="example@email.com"
                                dir="ltr"
                                class="w-full rounded-xl border border-[#E1E5EB] bg-[#F8F9FB] py-3 pl-4 pr-12 text-left text-sm text-[#263449] outline-none transition placeholder:text-[#AAB1BE] focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-[#FB9413]/10"
                            >
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </section>


        {{-- امنیت حساب --}}
        <section class="overflow-hidden rounded-3xl border border-[#E8EBF0] bg-white shadow-sm">

            <div class="flex items-center gap-3 border-b border-[#EEF0F3] px-5 py-5 md:px-7">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#101827] text-[#FB9413]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-[#101827]">امنیت حساب کاربری</h2>
                    <p class="mt-1 text-[11px] text-[#98A1B2]">در صورت نیاز رمز عبور جدید تعریف کنید</p>
                </div>
            </div>

            <div class="p-5 md:p-7">
                <div class="grid gap-4 md:grid-cols-12">
                    <div class="md:col-span-3">
                        <label for="password" class="text-sm font-semibold text-[#263449]">رمز عبور جدید</label>
                        <p class="mt-1 text-[11px] leading-6 text-[#98A1B2]">اختیاری؛ برای حفظ رمز فعلی خالی بگذارید</p>
                    </div>

                    <div class="md:col-span-9">
                        <div class="relative md:max-w-md">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                autocomplete="new-password"
                                placeholder="رمز عبور جدید"
                                class="w-full rounded-xl border border-[#E1E5EB] bg-[#F8F9FB] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-[#AAB1BE] focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-[#FB9413]/10"
                            >
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="mt-3 flex items-start gap-2 rounded-xl bg-[#FFF8ED] p-3 text-[11px] leading-6 text-[#9A671E]">
                            <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 4h.01M10.3 3.86L1.82 18.5A2 2 0 003.55 21h16.9a2 2 0 001.73-2.5L13.7 3.86a2 2 0 00-3.4 0z"/>
                            </svg>
                            با وارد کردن رمز جدید، رمز قبلی کاربر جایگزین خواهد شد.
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- سطح دسترسی --}}
        <section class="overflow-hidden rounded-3xl border border-[#E8EBF0] bg-white shadow-sm">

            <div class="flex items-center gap-3 border-b border-[#EEF0F3] px-5 py-5 md:px-7">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#101827] text-[#FB9413]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-[#101827]">نقش و سطح دسترسی</h2>
                    <p class="mt-1 text-[11px] text-[#98A1B2]">مشخص کنید کاربر چه دسترسی‌هایی داشته باشد</p>
                </div>
            </div>

            <div class="p-5 md:p-7">
                <div class="mb-4">
                    <p class="text-sm font-semibold text-[#263449]">نقش‌های کاربر</p>
                    <p class="mt-1 text-xs text-[#98A1B2]">می‌توانید یک یا چند نقش را انتخاب کنید.</p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($roles as $role)
                        <label class="group relative flex cursor-pointer items-center gap-3 rounded-2xl border border-[#E6E9EF] bg-[#F8F9FB] p-4 transition hover:border-[#FB9413]/60 hover:bg-[#FFF9F1] has-[:checked]:border-[#FB9413] has-[:checked]:bg-[#FFF8ED]">

                            <input
                                type="checkbox"
                                name="roles[]"
                                value="{{ $role->id }}"
                                class="peer h-4 w-4 shrink-0 cursor-pointer accent-[#FB9413]"
                                {{ in_array($role->id, $selectedRoles) ? 'checked' : '' }}
                            >

                            <span class="flex min-w-0 flex-1 flex-col">
                                <span class="text-sm font-semibold text-[#263449]">
                                    {{ $roleTitles[$role->title] ?? $role->title }}
                                </span>
                                <span class="mt-1 text-[10px] text-[#98A1B2]">
                                    {{ $role->title }}
                                </span>
                            </span>

                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white text-[#AAB1BE] transition group-has-[:checked]:bg-[#FB9413] group-has-[:checked]:text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12l4 4L19 6"/>
                                </svg>
                            </span>
                        </label>
                    @endforeach
                </div>

                @error('roles')
                    <p class="mt-3 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </section>


        {{-- دکمه‌های عملیات --}}
        <section class="sticky bottom-3 z-20 rounded-2xl border border-[#E8EBF0] bg-white/95 p-3 shadow-lg shadow-[#101827]/5 backdrop-blur-md sm:p-4">
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

                <p class="hidden text-[11px] text-[#98A1B2] sm:block">
                    <span class="text-[#FB9413]">●</span>
                    پس از ذخیره، اطلاعات کاربر به‌روزرسانی می‌شود.
                </p>

                <div class="flex flex-col-reverse gap-2 sm:flex-row">
                    <button
                        type="reset"
                        id="reset-form"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#E1E5EB] bg-white px-5 py-3 text-xs font-semibold text-[#526075] transition hover:border-[#CBD1DB] hover:bg-[#F8F9FB]"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h5M5 9a8 8 0 111 8"/>
                        </svg>
                        بازگردانی تغییرات
                    </button>

                    <button
                        type="submit"
                        id="submit-button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#101827] px-7 py-3 text-xs font-bold text-white shadow-md shadow-[#101827]/10 transition hover:bg-[#263449] hover:shadow-lg disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <svg class="h-4 w-4 text-[#FB9413]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        ذخیره تغییرات
                    </button>
                </div>
            </div>
        </section>

    </form>
</div>


{{-- پیش‌نمایش تصویر و مدیریت فرم --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('user-edit-form');
        const fileInput = document.getElementById('file-input');
        const preview = document.getElementById('profile-preview');
        const headerImage = document.getElementById('profile-header-image');
        const fileName = document.getElementById('image-file-name');
        const removeButton = document.getElementById('remove-new-image');
        const submitButton = document.getElementById('submit-button');

        const originalImage = @json(
            $user->main_image
                ? asset('storage/' . $user->main_image)
                : asset('assets/img/user.png')
        );

        let temporaryImageUrl = null;

        function revokeTemporaryUrl() {
            if (temporaryImageUrl) {
                URL.revokeObjectURL(temporaryImageUrl);
                temporaryImageUrl = null;
            }
        }

        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) return;

            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!allowedTypes.includes(file.type)) {
                alert('فرمت تصویر انتخاب‌شده معتبر نیست.');
                this.value = '';
                return;
            }

            revokeTemporaryUrl();

            temporaryImageUrl = URL.createObjectURL(file);

            preview.src = temporaryImageUrl;
            headerImage.src = temporaryImageUrl;

            fileName.textContent = file.name;
            removeButton.classList.remove('hidden');
        });

        removeButton.addEventListener('click', function () {
            fileInput.value = '';
            revokeTemporaryUrl();

            preview.src = originalImage;
            headerImage.src = originalImage;

            fileName.textContent = 'تصویری انتخاب نشده است';
            removeButton.classList.add('hidden');
        });

        form.addEventListener('reset', function () {
            setTimeout(function () {
                revokeTemporaryUrl();

                preview.src = originalImage;
                headerImage.src = originalImage;

                fileName.textContent = 'تصویری انتخاب نشده است';
                removeButton.classList.add('hidden');
            }, 0);
        });

        form.addEventListener('submit', function () {
            submitButton.disabled = true;

            submitButton.innerHTML = `
                <svg class="h-4 w-4 animate-spin text-[#FB9413]" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                در حال ذخیره اطلاعات...
            `;
        });
    });
</script>

@endsection
