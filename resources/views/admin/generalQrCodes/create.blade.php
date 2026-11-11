
@extends('admin.app.panel')

@section('title', 'ایجاد کیوآر کد')

@section('content')

    <div class="w-full max-w-5xl mx-auto py-6" dir="rtl">

        <!-- عنوان صفحه -->
        <div class="mb-8">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-[#101827] flex items-center justify-center text-[#FB9413]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h3v3h-3zM19 14h2v2h-2zM19 19h2v2h-2z"/>
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-bold text-[#101827]">
                        ایجاد کیوآر کد جدید
                    </h1>
                    <p class="text-xs text-gray-500 mt-1">
                        اطلاعات موردنیاز برای ساخت کیوآر کد را وارد کنید.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('generalQrCodes.store') }}" method="post">
            @csrf

            <div class="bg-white rounded-2xl border border-[#E6E9EF] shadow-sm overflow-hidden">

                <!-- سربرگ کارت -->
                <div class="bg-[#101827] px-6 py-5">
                    <h2 class="text-white text-base font-semibold">
                        اطلاعات کیوآر کد
                    </h2>
                    <p class="text-gray-400 text-xs mt-1">
                        فیلدهای زیر را تکمیل کنید.
                    </p>
                </div>

                <div class="p-6 md:p-8">

                    <div class="grid grid-cols-1 gap-6">

                        <!-- لینک -->
                        <div class="flex flex-col gap-2">
                            <label for="link" class="text-sm font-semibold text-[#344054]">
                                لینک کیوآر کد
                                <span class="text-[#FB9413]">*</span>
                            </label>

                            <input
                                id="link"
                                type="text"
                                name="link"
                                placeholder="لینک موردنظر را وارد کنید"
                                title="لینک"
                                required
                                class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-sm text-[#101827] outline-none transition-all duration-200 focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10 placeholder:text-gray-400"
                            >
                        </div>

                        <!-- عنوان -->
                        <div class="flex flex-col gap-2">
                            <label for="title" class="text-sm font-semibold text-[#344054]">
                                عنوان کیوآر کد
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                placeholder="عنوانی برای کیوآر کد وارد کنید"
                                title="عنوان کیوآر کد"
                                class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-sm text-[#101827] outline-none transition-all duration-200 focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10 placeholder:text-gray-400"
                            >
                        </div>

                        <!-- توضیحات -->
                        <div class="flex flex-col gap-2">
                            <label for="description" class="text-sm font-semibold text-[#344054]">
                                توضیحات کیوآر کد
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="توضیحات مربوط به کیوآر کد را وارد کنید"
                                title="توضیحات کیوآر کد"
                                class="w-full p-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-sm text-[#101827] outline-none resize-y transition-all duration-200 focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10 placeholder:text-gray-400"
                            ></textarea>
                        </div>

                    </div>

                    <!-- دکمه ثبت -->
                    <div class="flex justify-end mt-8 pt-6 border-t border-gray-100">
                        <button
                            type="submit"
                            class="px-8 py-3 rounded-xl bg-[#101827] text-white text-sm font-semibold transition-all duration-200 hover:bg-[#FB9413] hover:shadow-lg hover:shadow-orange-500/20"
                        >
                            ثبت کیوآر کد
                        </button>
                    </div>

                </div>
            </div>
        </form>

    </div>

@endsection
