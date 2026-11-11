
@extends('admin.app.panel')

@section('title', 'تکمیل پروفایل')

@section('content')
<div class="w-full py-6" dir="rtl">

    <form action="{{ route('user.save') }}"
          class="mx-auto flex w-full max-w-2xl flex-col gap-6 rounded-2xl border border-[#E6E9EF] bg-white p-5 shadow-sm sm:p-8"
          method="post"
          enctype="multipart/form-data">

        @csrf

        {{-- عنوان فرم --}}
        <div class="flex items-center gap-3 border-b border-[#E6E9EF] pb-5">
            <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#101827] text-white">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM4 20a8 8 0 0 1 16 0"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-[#101827]">تکمیل پروفایل</h2>
                <p class="mt-1 text-xs text-gray-400">اطلاعات حساب کاربری خود را وارد کنید</p>
            </div>
        </div>

        {{-- تصویر پروفایل --}}
        <div class="flex flex-col gap-3">
            <label class="text-sm font-semibold text-[#263449]">عکس پروفایل</label>

            <label class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-[#D9DEE7] bg-[#F8F9FB] px-4 py-7 transition hover:border-[#FB9413] hover:bg-[#FFF9F1]">
                <div class="flex size-12 items-center justify-center rounded-xl bg-[#FFF0DD] text-[#D97706]">
                    <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M4 16.5V19a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2.5M16 8l-4-4-4 4M12 4v12"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-[#263449]">برای انتخاب تصویر کلیک کنید</span>
                <span class="text-xs text-gray-400">تصویر پروفایل خود را بارگذاری کنید</span>

                <input
                    class="hidden"
                    type="file"
                    name="main_image"
                    title="پروفایل خود را وارد کنید">
            </label>
        </div>

        {{-- اطلاعات شخصی --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">نام</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="text"
                    name="name"
                    title="اسم خود راواردکنید">
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-[#263449]">نام خانوادگی</label>
                <input
                    class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                    type="text"
                    name="family"
                    title="نام خانوادگی خود را وارد کنید">
            </div>

        </div>

        {{-- ایمیل --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-semibold text-[#263449]">ایمیل</label>
            <input
                class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] px-4 py-3 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white"
                type="email"
                name="email"
                placeholder="test@example.com"
                title="ایمیل خود را وارد کنید">
        </div>

        {{-- دکمه ذخیره --}}
        <div class="border-t border-[#E6E9EF] pt-5">
            <button
                class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#101827] px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-[#263449] cursor-pointer">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                ذخیره اطلاعات
            </button>
        </div>

    </form>
</div>
@endsection
