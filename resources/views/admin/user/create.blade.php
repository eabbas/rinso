
@extends('admin.app.panel')

@section('title')
    ایجاد کاربر
@endsection

@section('content')
<div class="w-full py-4" dir="rtl">

    <form action="{{ route('user.store_user') }}"
          method="post"
          enctype="multipart/form-data"
          class="mx-auto w-full rounded-2xl border border-[#E6E9EF] bg-white p-5 shadow-sm sm:p-7">

        @csrf

        {{-- عنوان فرم --}}
        <div class="mb-7 flex items-center gap-3 border-b border-[#E6E9EF] pb-5">
            <div class="flex size-11 items-center justify-center rounded-xl bg-[#101827] text-white">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM4 20a8 8 0 0 1 16 0M19 8v6m3-3h-6"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-[#101827]">ایجاد کاربر جدید</h2>
                <p class="mt-1 text-xs text-gray-400">اطلاعات کاربر را برای ایجاد حساب وارد کنید</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">

            {{-- نام --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">نام</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="text"
                    name="name"
                    placeholder="نام">
            </div>

            {{-- نام خانوادگی --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">نام خانوادگی</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="text"
                    name="family"
                    placeholder="نام خانوادگی">
            </div>

            {{-- شماره تلفن --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">شماره تلفن</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="number"
                    name="phoneNumber"
                    placeholder="شماره تلفن"
                    required>
            </div>

            {{-- ایمیل --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">ایمیل</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="email"
                    name="email"
                    placeholder="ایمیل">
            </div>

            {{-- رمز عبور --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">رمز عبور</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="password"
                    name="password"
                    placeholder="رمز عبور"
                    required>
            </div>

            {{-- نقش --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">نقش کاربر</label>
                <select
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition focus:border-[#FB9413] focus:bg-white"
                    name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- تصویر --}}
            <div class="flex flex-col gap-2 md:col-span-2">
                <label class="text-sm font-semibold text-[#263449]">تصویر پروفایل</label>
                <div class="rounded-xl border border-dashed border-[#D9DEE7] bg-[#F8F9FB] p-3 transition hover:border-[#FB9413]">
                    <input
                        class="w-full cursor-pointer text-sm text-gray-500 file:ml-4 file:cursor-pointer file:rounded-lg file:border-0 file:bg-[#101827] file:px-4 file:py-2.5 file:text-xs file:font-medium file:text-white hover:file:bg-[#263449]"
                        type="file"
                        name="main_image">
                </div>
            </div>

        </div>

        {{-- دکمه‌ها --}}
        <div class="mt-8 flex flex-col-reverse gap-3 border-t border-[#E6E9EF] pt-5 sm:flex-row sm:justify-end">

            <button
                class="rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-6 py-3 text-sm font-medium text-[#526071] transition hover:bg-[#E9ECF1] cursor-pointer"
                type="reset">
                لغو
            </button>

            <button
                class="rounded-xl bg-[#101827] px-7 py-3 text-sm font-semibold text-white transition hover:bg-[#263449] cursor-pointer"
                type="submit">
                ذخیره تغییرات
            </button>

        </div>

    </form>
</div>
@endsection
