
@extends('admin.app.panel')

@section('title', 'ایجاد شبکه اجتماعی')

@section('content')

<style>
    #social-media-form input:focus {
        outline: none;
        border-color: #FB9413;
        box-shadow: 0 0 0 3px rgba(251, 148, 19, 0.10);
    }

    #social-media-form input[type="file"]::file-selector-button {
        background: #101827;
        color: white;
        border: none;
        border-radius: 7px;
        padding: 8px 12px;
        margin-left: 12px;
        cursor: pointer;
    }

    #social-media-form input[type="color"] {
        width: 48px;
        height: 42px;
        padding: 4px;
        border: 1px solid #E1E5EB;
        border-radius: 9px;
        background: white;
        cursor: pointer;
    }
</style>

<div dir="rtl" class="w-full min-h-screen bg-[#F7F8FA] py-7 px-3 md:px-6">

    {{-- عنوان صفحه --}}
    <div class="max-w-5xl mx-auto mb-6">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-xl bg-[#FB9413]/10 flex items-center justify-center">
                <svg class="w-6 h-6 text-[#FB9413]" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M16 8a6 6 0 016 6m-6-6a6 6 0 00-6 6m6-6V2m0 12a6 6 0 01-6 6m6-6a6 6 0 006 6m-6-6v8M2 14a6 6 0 016-6" />
                </svg>
            </div>

            <div>
                <h1 class="text-xl font-bold text-[#101827]">
                    ایجاد شبکه اجتماعی
                </h1>
                <p class="text-xs text-gray-500 mt-1">
                    اطلاعات شبکه اجتماعی جدید را وارد کنید.
                </p>
            </div>
        </div>
    </div>

    <form id="social-media-form" action="{{ route('socialMedia.store') }}"
        method="post" enctype="multipart/form-data">

        @csrf

        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl border border-[#E6E9EF] shadow-sm overflow-hidden">

                {{-- سربرگ فرم --}}
                <div class="px-5 md:px-8 py-5 border-b border-[#ECEEF2] flex items-center justify-between">
                    <div>
                        <h2 class="text-[#101827] font-bold text-base">
                            اطلاعات شبکه اجتماعی
                        </h2>
                        <p class="text-gray-500 text-xs mt-1">
                            مشخصات و ظاهر شبکه اجتماعی را تعیین کنید.
                        </p>
                    </div>

                    <div class="w-10 h-10 rounded-xl bg-[#FB9413]/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#FB9413]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M7 7h10M7 12h10M7 17h6" />
                        </svg>
                    </div>
                </div>

                <div class="p-5 md:p-8">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-6 gap-y-5">

                        {{-- عنوان --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                عنوان
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-3.5 text-sm font-medium text-[#101827] placeholder:text-gray-400 transition"
                                type="text"
                                name="title"
                                placeholder="عنوان شبکه اجتماعی">
                        </div>

                        {{-- لینک --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                لینک
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-3.5 text-sm font-medium text-[#101827] placeholder:text-gray-400 transition"
                                type="text"
                                name="link"
                                dir="ltr"
                                placeholder="https://example.com">
                        </div>

                        {{-- آیکون --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                آیکون شبکه اجتماعی
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-3 py-2.5 text-sm text-[#101827] transition"
                                type="file"
                                name="icon_path"
                                title="آیکون شبکه اجتماعی">
                        </div>

                        {{-- رنگ پس زمینه --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                رنگ پس زمینه
                            </label>

                            <div class="w-full flex items-center gap-3 rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-2.5">
                                <input
                                    type="color"
                                    name="color"
                                    title="کد رنگی را وارد کنید">

                                <span class="text-xs text-gray-500">
                                    رنگ موردنظر خود را انتخاب کنید.
                                </span>
                            </div>
                        </div>

                    </div>

                    {{-- دکمه ثبت --}}
                    <div class="mt-7 pt-5 border-t border-[#ECEEF2] flex justify-end">
                        <button type="submit"
                            class="mt-2 bg-[#FB9413] text-white px-9 py-3 rounded-xl hover:bg-[#e78308] transition duration-200 font-semibold cursor-pointer">
                            ثبت شبکه اجتماعی
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

@endsection
