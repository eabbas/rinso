@extends('admin.app.panel')

@section('title', 'تنظیمات اکانت')

@section('content')

<div class="w-full space-y-6">

    {{-- Page Heading --}}
    <div class="flex flex-col gap-2">
        <h1 class="text-xl lg:text-2xl font-black text-[#142343]">
            اکانت من
        </h1>

        <div class="flex items-center gap-2 text-xs text-slate-400">
            <a href="{{ route('dashboard') }}" class="hover:text-[#2454a6] transition">
                داشبورد
            </a>
            <span>/</span>
            <span class="text-[#2454a6] font-semibold">تنظیمات اکانت</span>
        </div>
    </div>


    {{-- Profile Overview --}}
    <div class="relative overflow-hidden bg-[#101d3b] rounded-2xl p-5 sm:p-7 text-white shadow-lg shadow-slate-900/5">

        {{-- Background Decorations --}}
        <div class="absolute -top-24 -left-16 size-64 rounded-full bg-blue-500/10 blur-3xl"></div>
        <div class="absolute -bottom-28 right-1/3 size-64 rounded-full bg-orange-400/10 blur-3xl"></div>

        <div class="relative z-10 flex flex-col sm:flex-row items-center sm:items-center gap-5">

            {{-- Avatar --}}
            <div class="relative shrink-0">

                @if (!Auth::user()->main_image)
                    <img
                        class="size-24 sm:size-28 rounded-2xl object-cover border-4 border-white/10 shadow-xl"
                        src="{{ asset('assets/img/user.png') }}"
                        alt="user avatar">
                @else
                    <img
                        class="size-24 sm:size-28 rounded-2xl object-cover border-4 border-white/10 shadow-xl"
                        src="{{ asset('storage/' . Auth::user()->main_image) }}"
                        alt="user picture">
                @endif

                <span class="absolute -bottom-2 -left-2 size-6 rounded-full bg-[#ff941f] border-4 border-[#101d3b]"></span>

            </div>


            {{-- User Info --}}
            <div class="text-center sm:text-right flex-1">

                <span class="text-xs text-blue-200/70">
                    پروفایل کاربری
                </span>

                <h2 class="text-xl sm:text-2xl font-black mt-2">
                    {{ Auth::user()->name }} {{ Auth::user()?->family }}
                </h2>

                <p class="text-xs sm:text-sm text-slate-300/70 mt-2">
                    اطلاعات حساب کاربری خود را مدیریت و به‌روزرسانی کنید.
                </p>

                <div class="flex flex-wrap justify-center sm:justify-start gap-2 mt-4">

                    <span class="px-3 py-1.5 rounded-lg bg-white/10 border border-white/10 text-xs text-slate-200">
                        {{ Auth::user()->phoneNumber }}
                    </span>

                    @if (Auth::user()->email)
                        <span class="px-3 py-1.5 rounded-lg bg-white/10 border border-white/10 text-xs text-slate-200">
                            {{ Auth::user()->email }}
                        </span>
                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- Profile Form --}}
    <form
        action="{{ route('user.update') }}"
        method="post"
        enctype="multipart/form-data"
        class="bg-white border border-slate-200/80 rounded-2xl shadow-sm overflow-hidden">

        @csrf

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">


        {{-- Form Header --}}
        <div class="px-5 sm:px-7 py-5 border-b border-slate-100 flex items-center gap-3">

            <div class="size-11 rounded-xl bg-[#101d3b]/5 text-[#2454a6] flex items-center justify-center">

                <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                          d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                    <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                          d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 2.94-.09-.03a1.7 1.7 0 0 0-1.8.43l-.07.07h-3.4l-.02-.1a1.7 1.7 0 0 0-1.3-1.3l-.1-.02-1.7-2.94.06-.06A1.7 1.7 0 0 0 10 14.05l-.03-.09v-3.4l.1-.02a1.7 1.7 0 0 0 1.3-1.3l.02-.1h3.4l.07.07a1.7 1.7 0 0 0 1.8.43l.09-.03 1.7 2.94-.06.06A1.7 1.7 0 0 0 19.4 15Z"/>
                </svg>

            </div>

            <div>
                <h2 class="font-black text-[#142343]">
                    جزئیات پروفایل
                </h2>

                <p class="text-xs text-slate-400 mt-1">
                    اطلاعات شخصی و امنیت حساب کاربری
                </p>
            </div>

        </div>


        {{-- Form Body --}}
        <div class="p-5 sm:p-7 space-y-7">

            {{-- Avatar Upload --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                <div class="w-full sm:w-1/4">
                    <label class="text-sm font-bold text-[#243653]">
                        تصویر پروفایل
                    </label>

                    <p class="text-xs text-slate-400 mt-1">
                        تصویر دلخواه خود را انتخاب کنید.
                    </p>
                </div>

                <div class="flex-1">

                    <label for="main_image"
                           class="group flex flex-col sm:flex-row sm:items-center gap-4 p-4 rounded-xl border border-dashed border-slate-300 bg-slate-50 hover:bg-blue-50/50 hover:border-[#2454a6] transition cursor-pointer">

                        @if (!Auth::user()->main_image)
                            <img
                                class="size-16 rounded-xl object-cover border border-slate-200"
                                src="{{ asset('assets/img/user.png') }}"
                                alt="user avatar">
                        @else
                            <img
                                class="size-16 rounded-xl object-cover border border-slate-200"
                                src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                alt="user picture">
                        @endif

                        <div class="flex-1">
                            <p class="text-sm font-bold text-[#243653] group-hover:text-[#2454a6] transition">
                                انتخاب تصویر جدید
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                برای تغییر تصویر پروفایل کلیک کنید.
                            </p>
                        </div>

                        <span class="text-xs font-bold text-[#2454a6] bg-blue-50 px-4 py-2 rounded-lg">
                            انتخاب فایل
                        </span>

                        <input
                            type="file"
                            name="main_image"
                            id="main_image"
                            accept="image/*"
                            class="hidden">

                    </label>

                </div>

            </div>


            <div class="border-t border-slate-100"></div>


            {{-- Name and Family --}}
            <div class="flex flex-col lg:flex-row gap-3 lg:gap-8">

                <div class="w-full lg:w-1/4">
                    <label class="text-sm font-bold text-[#243653]">
                        نام و نام خانوادگی
                    </label>

                    <p class="text-xs text-slate-400 mt-1">
                        نام نمایشی حساب شما
                    </p>
                </div>

                <div class="flex-1 flex flex-col sm:flex-row gap-3">

                    <div class="w-full sm:w-1/2">
                        <label for="name" class="block text-xs text-slate-500 mb-2">
                            نام
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ Auth::user()->name }}"
                            placeholder="نام خود را وارد کنید"
                            class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm text-[#243653] outline-none transition focus:bg-white focus:border-[#2454a6] focus:ring-4 focus:ring-blue-500/10">
                    </div>

                    <div class="w-full sm:w-1/2">
                        <label for="family" class="block text-xs text-slate-500 mb-2">
                            نام خانوادگی
                        </label>

                        <input
                            type="text"
                            id="family"
                            name="family"
                            value="{{ Auth::user()->family }}"
                            placeholder="نام خانوادگی خود را وارد کنید"
                            class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm text-[#243653] outline-none transition focus:bg-white focus:border-[#2454a6] focus:ring-4 focus:ring-blue-500/10">
                    </div>

                </div>

            </div>


            <div class="border-t border-slate-100"></div>


            {{-- Phone --}}
            <div class="flex flex-col lg:flex-row gap-3 lg:gap-8">

                <div class="w-full lg:w-1/4">
                    <label for="phoneNumber" class="text-sm font-bold text-[#243653]">
                        شماره تلفن
                    </label>

                    <p class="text-xs text-slate-400 mt-1">
                        شماره تماس حساب کاربری
                    </p>
                </div>

                <div class="flex-1">

                    <input
                        type="number"
                        id="phoneNumber"
                        name="phoneNumber"
                        value="{{ Auth::user()->phoneNumber }}"
                        placeholder="شماره تلفن"
                        class="w-full sm:w-1/2 h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm text-[#243653] outline-none transition focus:bg-white focus:border-[#2454a6] focus:ring-4 focus:ring-blue-500/10">

                </div>

            </div>


            <div class="border-t border-slate-100"></div>


            {{-- Email --}}
            <div class="flex flex-col lg:flex-row gap-3 lg:gap-8">

                <div class="w-full lg:w-1/4">
                    <label for="email" class="text-sm font-bold text-[#243653]">
                        ایمیل
                    </label>

                    <p class="text-xs text-slate-400 mt-1">
                        آدرس ایمیل شما
                    </p>
                </div>

                <div class="flex-1">

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ Auth::user()->email }}"
                        placeholder="example@email.com"
                        class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm text-[#243653] outline-none transition focus:bg-white focus:border-[#2454a6] focus:ring-4 focus:ring-blue-500/10">

                </div>

            </div>


            <div class="border-t border-slate-100"></div>


            {{-- Password --}}
            <div class="flex flex-col lg:flex-row gap-3 lg:gap-8">

                <div class="w-full lg:w-1/4">
                    <label for="password" class="text-sm font-bold text-[#243653]">
                        رمز عبور جدید
                    </label>

                    <p class="text-xs text-slate-400 mt-1">
                        در صورت تمایل به تغییر رمز وارد کنید.
                    </p>
                </div>

                <div class="flex-1">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="رمز عبور جدید"
                        autocomplete="new-password"
                        class="w-full h-12 px-4 rounded-xl border border-slate-200 bg-slate-50 text-sm text-[#243653] outline-none transition focus:bg-white focus:border-[#2454a6] focus:ring-4 focus:ring-blue-500/10">

                    <p class="text-[11px] text-slate-400 mt-2">
                        اگر قصد تغییر رمز عبور را ندارید، این فیلد را خالی بگذارید.
                    </p>

                </div>

            </div>

        </div>


        {{-- Form Footer --}}
        <div class="px-5 sm:px-7 py-5 bg-slate-50 border-t border-slate-100 flex flex-col-reverse sm:flex-row justify-end gap-3">

            <button
                type="reset"
                class="px-6 py-3 rounded-xl bg-white border border-slate-200 text-slate-600 text-sm font-bold hover:bg-slate-100 transition">
                لغو تغییرات
            </button>

            <button
                type="submit"
                class="px-7 py-3 rounded-xl bg-[#142343] hover:bg-[#2454a6] text-white text-sm font-bold transition shadow-lg shadow-blue-900/10 flex items-center justify-center gap-2">

                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>

                ذخیره تغییرات

            </button>

        </div>

    </form>

</div>

@endsection