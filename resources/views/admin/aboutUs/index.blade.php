
@extends('admin.app.panel')

@section('title', 'رینسو | درباره ما')

@section('content')

<div class="w-full flex flex-col gap-6 pb-8 text-[#101827]" dir="rtl">

    @php
        $aboutUs = $allAboutUs->first();
    @endphp

    {{-- Header --}}
    <section class="flex items-center justify-between gap-4 mt-5">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-2xl bg-[#101827] flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-[#FB9413]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 16v-4m0-4h.01M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z"/>
                </svg>
            </div>

            <div>
                <h2 class="text-xl font-extrabold">
                    درباره ما
                </h2>
                <p class="text-xs text-gray-400 mt-1">
                    مدیریت محتوای معرفی رینسو
                </p>
            </div>

        </div>

        @if($aboutUs)
            <span class="flex items-center gap-2 bg-emerald-50 text-emerald-600 px-3 py-2 rounded-xl text-xs font-bold">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                ثبت شده
            </span>
        @else
            <span class="flex items-center gap-2 bg-orange-50 text-[#D97706] px-3 py-2 rounded-xl text-xs font-bold">
                <span class="w-2 h-2 rounded-full bg-[#FB9413]"></span>
                ثبت نشده
            </span>
        @endif

    </section>


    @if($aboutUs)

        {{-- Main Content --}}
        <section class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            {{-- Card Header --}}
            <div class="p-5 sm:p-6 border-b border-gray-100 flex items-center justify-between gap-3">

                <div>
                    <h3 class="font-extrabold text-sm sm:text-base">
                        محتوای صفحه درباره ما
                    </h3>
                    <p class="text-xs text-gray-400 mt-1.5">
                        اطلاعاتی که در صفحه عمومی وب‌سایت نمایش داده می‌شود
                    </p>
                </div>

                <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#FB9413]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5h16M4 10h16M4 15h10M4 20h7"/>
                    </svg>
                </div>

            </div>


            <div class="p-5 sm:p-7 flex flex-col gap-7">

                {{-- Title --}}
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-1 h-5 rounded-full bg-[#FB9413]"></span>
                        <h4 class="text-sm font-extrabold">عنوان درباره ما</h4>
                    </div>

                    <div class="bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 sm:p-5">
                        <p class="text-sm sm:text-base font-bold text-[#101827] leading-8">
                            {{ $aboutUs->title }}
                        </p>
                    </div>
                </div>


                {{-- Description --}}
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-1 h-5 rounded-full bg-[#FB9413]"></span>
                        <h4 class="text-sm font-extrabold">توضیحات درباره ما</h4>
                    </div>

                    <div class="bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 sm:p-5 min-h-28">
                        <p class="text-sm text-gray-600 leading-8 whitespace-pre-line">
                            {{ $aboutUs->description ?: 'توضیحاتی برای این بخش ثبت نشده است.' }}
                        </p>
                    </div>
                </div>


                {{-- Image Section --}}
                <div>

                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-1 h-5 rounded-full bg-[#FB9413]"></span>
                        <h4 class="text-sm font-extrabold">تصویر معرفی</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Image Preview --}}
                        <div class="rounded-2xl border border-gray-100 bg-[#F8F9FB] p-3">

                            @if($aboutUs->image)

                                <img
                                    src="{{ asset('storage/' . $aboutUs->image) }}"
                                    alt="{{ $aboutUs->image_title }}"
                                    class="w-full aspect-[16/9] object-cover rounded-xl"
                                >

                            @else

                                <div class="w-full aspect-[16/9] rounded-xl bg-white border border-dashed border-gray-200 flex flex-col items-center justify-center gap-3">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m3 16 5-5 4 4 5-7 4 5M5 4h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3V6a2 2 0 0 1 2-2Z"/>
                                    </svg>
                                    <span class="text-xs text-gray-400">تصویری ثبت نشده است</span>
                                </div>

                            @endif

                        </div>


                        {{-- Image Information --}}
                        <div class="flex flex-col gap-4 justify-center">

                            <div class="bg-[#F8F9FB] border border-gray-100 rounded-xl p-4">
                                <p class="text-xs text-gray-400 mb-2">
                                    عنوان تصویر
                                </p>

                                <p class="text-sm font-bold text-[#101827]">
                                    {{ $aboutUs->image_title ?: 'بدون عنوان' }}
                                </p>
                            </div>

                            <div class="bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 flex-1">
                                <p class="text-xs text-gray-400 mb-2">
                                    توضیحات تصویر
                                </p>

                                <p class="text-sm text-gray-600 leading-7">
                                    {{ $aboutUs->image_description ?: 'توضیحاتی برای تصویر ثبت نشده است.' }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="pt-5 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">

                    <p class="text-xs text-gray-400">
                        برای تغییر محتوای صفحه از گزینه ویرایش استفاده کنید.
                    </p>

                    <div class="flex items-center gap-2 w-full sm:w-auto">

                        <a
                            href="{{ route('aboutUs.create_edit', [$aboutUs]) }}"
                            class="flex-1 sm:flex-none h-11 px-6 rounded-xl bg-[#101827] hover:bg-[#FB9413] text-white text-xs font-bold flex items-center justify-center gap-2 transition-all duration-200"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m16 4 4 4M4 20l4-.8L19 8a2.1 2.1 0 0 0-3-3L5 16l-1 4Z"/>
                            </svg>
                            ویرایش محتوا
                        </a>

                        <a
                            href="{{ route('aboutUs.delete', [$aboutUs]) }}"
                            onclick="return confirm('آیا از حذف اطلاعات درباره ما اطمینان دارید؟')"
                            class="w-11 h-11 rounded-xl bg-red-50 hover:bg-red-500 text-red-500 hover:text-white flex items-center justify-center transition-all duration-200"
                            title="حذف اطلاعات"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M10 11v6m4-6v6M6 7l1 13h10l1-13M9 7V4h6v3"/>
                            </svg>
                        </a>

                    </div>

                </div>

            </div>

        </section>

    @else

        {{-- Empty State --}}
        <section class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-12">

            <div class="max-w-md mx-auto flex flex-col items-center text-center">

                <div class="w-20 h-20 rounded-3xl bg-orange-50 flex items-center justify-center mb-5">
                    <svg class="w-9 h-9 text-[#FB9413]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 16v-4m0-4h.01M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z"/>
                    </svg>
                </div>

                <h3 class="text-base font-extrabold text-[#101827]">
                    هنوز اطلاعاتی ثبت نشده است
                </h3>

                <p class="text-xs text-gray-400 leading-7 mt-3">
                    محتوای صفحه درباره ما هنوز ایجاد نشده است.
                    با ایجاد این بخش می‌توانید اطلاعات معرفی رینسو را مدیریت کنید.
                </p>

            </div>

        </section>

    @endif

</div>

@endsection
