@extends('client.document')
@section('title', 'ایجاد ارتباط با ما')
@section('content')

<div class="relative -mt-16 min-h-screen bg-white py-12 md:py-20" dir="rtl">
    <div class="mx-auto w-11/12 max-w-6xl">
        <div class="mb-10 text-center">
            <span class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#FB9413]/10 px-4 py-2 text-sm font-semibold text-[#FB9413]">
                <span class="h-2 w-2 rounded-full bg-[#FB9413]"></span>
                پشتیبانی و ارتباط با ما
            </span>

            <h1 class="text-2xl font-black text-[#101827] md:text-4xl">
                ارسال تیکت به ادمین
            </h1>
            <p class="mx-auto mt-4 max-w-xl text-sm leading-8 text-gray-500 md:text-base">
                اگر سوال یا درخواستی دارید، از طریق فرم زیر با ما در ارتباط باشید.
                پیام شما در سریع‌ترین زمان ممکن بررسی می‌شود.
            </p>
            <div class="mx-auto mt-5 h-1 w-16 rounded-full bg-[#FB9413]"></div>
        </div>
        @if (count(Auth::user()->contactUs))
            <div class="mb-5 flex justify-center md:justify-start">
                <a href="{{ route('contactUs.myMessage') }}"
                   class="inline-flex items-center gap-2 rounded-lg border border-[#101827]/15 bg-white px-5 py-3 text-sm font-bold text-[#101827] transition hover:border-[#FB9413] hover:text-[#FB9413]">
                    مشاهده تیکت‌های قبلی
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
            </div>
        @endif
        <form action="{{ route('contactUs.store') }}" method="post">
            @csrf
            <div class="mx-auto max-w-4xl rounded-2xl border border-[#101827] bg-[#101827] p-6 md:p-10">
                <div class="mb-8 border-b border-white/15 pb-5">
                    <h2 class="text-xl font-black text-white">
                        فرم ارسال پیام
                    </h2>
                    <p class="mt-2 text-sm text-white/60">
                        لطفاً اطلاعات زیر را تکمیل کنید.
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="flex flex-col gap-2">
                        <label for="phoneNumber" class="text-sm font-bold text-white">
                            شماره تماس
                        </label>
                        <input
                            id="phoneNumber"
                            type="tel"
                            name="phoneNumber"
                            value="{{ old('phoneNumber') }}"
                            placeholder="مثلاً 09123456789"
                            title="شماره تماس"
                            required
                            class="w-full rounded-lg border border-[#D5DCE6] bg-[#E9EDF3] px-4 py-4 text-sm text-[#101827] outline-none transition placeholder:text-[#8792A3] focus:border-[#FB9413] focus:bg-[#F0F2F6] focus:ring-2 focus:ring-[#FB9413]/15"
                        >
                        @error('phoneNumber')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="title" class="text-sm font-bold text-white">
                            عنوان تیکت
                        </label>
                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="موضوع پیام خود را بنویسید"
                            required
                            class="w-full rounded-lg border border-[#D5DCE6] bg-[#E9EDF3] px-4 py-4 text-sm text-[#101827] outline-none transition placeholder:text-[#8792A3] focus:border-[#FB9413] focus:bg-[#F0F2F6] focus:ring-2 focus:ring-[#FB9413]/15"
                        >
                        @error('title')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="description" class="text-sm font-bold text-white">
                            توضیحات
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="توضیحات و درخواست خود را اینجا بنویسید..."
                            required
                            class="w-full rounded-lg border border-[#D5DCE6] bg-[#E9EDF3] px-4 py-4 text-sm text-[#101827] outline-none transition placeholder:text-[#8792A3] focus:border-[#FB9413] focus:bg-[#F0F2F6] focus:ring-2 focus:ring-[#FB9413]/15"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-8 flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex min-w-36 items-center justify-center gap-3 rounded-lg bg-[#FB9413] px-8 py-4 text-sm font-bold text-[#101827] transition duration-300 hover:bg-white"
                    >
                        ثبت تیکت
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M7 7h10v10"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
