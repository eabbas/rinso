
@extends('client.document')

@section('title', 'ویرایش درباره ما')

@section('content')
<div class="w-full pt-4 pb-8" dir="rtl">

    {{-- عنوان صفحه --}}
    <div class="mb-6 text-center">
        <span class="text-sm font-semibold text-[#FB9413]">مدیریت اطلاعات</span>
        <h1 class="mt-2 text-xl font-black text-[#101827] md:text-2xl">
            ویرایش درباره ما
        </h1>
    </div>

    <form action="{{ route('contactUs.update') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $contactUs->id }}">

        <div class="mx-auto w-full lg:w-3/4">
            <div class="rounded-2xl bg-[#101827] p-5 shadow-lg shadow-[#101827]/10 md:p-8">

                {{-- توضیح فرم --}}
                <div class="mb-7 border-b border-white/10 pb-5">
                    <h2 class="text-lg font-bold text-white">
                        اطلاعات تیکت
                    </h2>
                    <p class="mt-2 text-sm leading-7 text-gray-400">
                        اطلاعات موردنظر را ویرایش کنید و پس از بررسی، تغییرات را ثبت کنید.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    {{-- عنوان --}}
                    <div class="flex flex-col gap-2">
                        <label for="title" class="text-sm font-semibold text-gray-200">
                            عنوان
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            placeholder="عنوان را وارد کنید"
                            value="{{ old('title', $contactUs->title) }}"
                            class="w-full rounded-lg border border-[#D5DCE6] bg-[#E9EDF3] px-4 py-4 text-sm text-[#101827] outline-none transition placeholder:text-[#8792A3] focus:border-[#FB9413] focus:bg-[#F0F2F6] focus:ring-2 focus:ring-[#FB9413]/15"
                        >

                        @error('title')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- شماره تماس --}}
                    <div class="flex flex-col gap-2">
                        <label for="phoneNumber" class="text-sm font-semibold text-gray-200">
                            شماره تماس
                        </label>

                        <input
                            id="phoneNumber"
                            type="number"
                            name="phoneNumber"
                            placeholder="شماره تماس را وارد کنید"
                            value="{{ old('phoneNumber', $contactUs->phoneNumber) }}"
                            class="w-full rounded-lg border border-[#D5DCE6] bg-[#E9EDF3] px-4 py-4 text-sm text-[#101827] outline-none transition placeholder:text-[#8792A3] focus:border-[#FB9413] focus:bg-[#F0F2F6] focus:ring-2 focus:ring-[#FB9413]/15"
                        >

                        @error('phoneNumber')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- توضیحات --}}
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="description" class="text-sm font-semibold text-gray-200">
                            توضیحات
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="توضیحات را وارد کنید"
                            class="w-full resize-y rounded-lg border border-[#D5DCE6] bg-[#E9EDF3] px-4 py-4 text-sm leading-7 text-[#101827] outline-none transition placeholder:text-[#8792A3] focus:border-[#FB9413] focus:bg-[#F0F2F6] focus:ring-2 focus:ring-[#FB9413]/15"
                        >{{ old('description', $contactUs->description) }}</textarea>

                        @error('description')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- دکمه ثبت --}}
                <div class="mt-7 flex justify-end border-t border-white/10 pt-5">
                    <button
                        type="submit"
                        class="rounded-lg bg-[#FB9413] px-8 py-3 text-sm font-bold text-[#101827] transition duration-200 hover:bg-[#e98508] active:scale-95"
                    >
                        ثبت تغییرات
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
