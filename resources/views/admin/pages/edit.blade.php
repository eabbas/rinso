
@extends('admin.app.panel')

@section('title', 'ویرایش کاور و لوگو')

@section('content')

<style>
    #edit-page-form input:focus,
    #edit-page-form textarea:focus {
        outline: none;
        border-color: #FB9413;
        box-shadow: 0 0 0 3px rgba(251, 148, 19, 0.10);
    }

    #edit-page-form input[type="checkbox"] {
        accent-color: #FB9413;
        width: 17px;
        height: 17px;
        cursor: pointer;
    }

    #edit-page-form input[type="file"]::file-selector-button {
        background: #101827;
        color: white;
        border: none;
        border-radius: 7px;
        padding: 8px 12px;
        margin-left: 12px;
        cursor: pointer;
    }
</style>

<div dir="rtl" class="w-full min-h-screen bg-[#F7F8FA] py-7 px-3 md:px-6">

    {{-- عنوان صفحه --}}
    <div class="max-w-5xl mx-auto mb-6">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-xl bg-[#FB9413]/10 flex items-center justify-center">
                <svg class="w-6 h-6 text-[#FB9413]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
            </div>

            <div>
                <h1 class="text-xl font-bold text-[#101827]">
                    ویرایش صفحه معرفی
                </h1>
                <p class="text-xs text-gray-500 mt-1">
                    اطلاعات صفحه موردنظر را ویرایش کنید.
                </p>
            </div>
        </div>
    </div>

    <form id="edit-page-form" action="{{ route('pages.update') }}" method="post"
        enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="id" value="{{ $pages->id }}">

        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl border border-[#E6E9EF] shadow-sm overflow-hidden">

                {{-- سربرگ فرم --}}
                <div class="px-5 md:px-8 py-5 border-b border-[#ECEEF2] flex items-center justify-between">
                    <div>
                        <h2 class="text-[#101827] font-bold text-base">
                            اطلاعات صفحه
                        </h2>
                        <p class="text-gray-500 text-xs mt-1">
                            تغییرات موردنظر خود را اعمال کنید.
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

                        {{-- نام کاربری --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                نام کاربری (انگلیسی)
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-3.5 text-sm font-medium text-[#101827] placeholder:text-gray-400 transition"
                                type="text"
                                name="user_name"
                                id="user_name"
                                placeholder="نام کاربری"
                                value="{{ $pages->user_name }}"
                                required
                                dir="ltr">

                            <p id="username-message" class="hidden text-xs text-red-500">
                                این نام کاربری قبلاً ثبت شده؛ لطفاً نام دیگری انتخاب کنید.
                            </p>
                        </div>

                        {{-- عنوان --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                عنوان
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-3.5 text-sm font-medium text-[#101827] placeholder:text-gray-400 transition"
                                type="text"
                                name="title"
                                placeholder="عنوان"
                                value="{{ $pages->title }}">
                        </div>

                        {{-- عنوان فرعی --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                عنوان فرعی
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-3.5 text-sm font-medium text-[#101827] placeholder:text-gray-400 transition"
                                type="text"
                                name="subTitle"
                                placeholder="عنوان فرعی"
                                value="{{ $pages->subTitle }}">
                        </div>

                        {{-- لوگو --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                لوگو
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-3 py-2.5 text-sm text-[#101827] transition"
                                type="file"
                                name="logo_path"
                                title="لوگو">
                        </div>

                        {{-- کاور --}}
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                کاور
                            </label>

                            <input
                                class="w-full rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-3 py-2.5 text-sm text-[#101827] transition"
                                type="file"
                                name="cover_path"
                                title="کاور">
                        </div>

                        {{-- وضعیت‌ها --}}
                        <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-3">

                            {{-- فعال --}}
                            <label class="flex items-center gap-3 rounded-xl bg-[#F7F8FA] border border-[#E6E9EF] px-4 py-3 cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="active[]"
                                    value="1"
                                    @if($pages->active == "1") checked @endif>

                                <span class="text-sm font-medium text-[#263449]">
                                    فعال
                                </span>
                            </label>

                            {{-- نمایش در صفحه اول --}}
                            <label class="flex items-center gap-3 rounded-xl bg-[#F7F8FA] border border-[#E6E9EF] px-4 py-3 cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="show_in_home[]"
                                    value="1"
                                    @if($pages->show_in_home == "1") checked @endif>

                                <span class="text-sm font-medium text-[#263449]">
                                    نمایش در صفحه اول
                                </span>
                            </label>

                            {{-- خصوصی --}}
                            <label class="flex items-center gap-3 rounded-xl bg-[#F7F8FA] border border-[#E6E9EF] px-4 py-3 cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="is_private[]"
                                    value="1"
                                    @if($pages->is_private == "1") checked @endif>

                                <span class="text-sm font-medium text-[#263449]">
                                    خصوصی
                                </span>
                            </label>

                        </div>

                        {{-- توضیحات --}}
                        <div class="lg:col-span-2 flex flex-col gap-2">
                            <label class="text-sm font-semibold text-[#263449]">
                                توضیحات
                            </label>

                            <textarea
                                class="w-full min-h-[140px] rounded-xl bg-[#F5F6F8] border border-[#E1E5EB] px-4 py-3.5 text-sm font-medium text-[#101827] placeholder:text-gray-400 transition resize-y"
                                name="description"
                                placeholder="توضیحات">{{ $pages->description }}</textarea>
                        </div>

                    </div>

                    {{-- دکمه ثبت --}}
                    <div class="mt-7 pt-5 border-t border-[#ECEEF2] flex justify-end">
                        <button type="submit" id="submitBtn"
                            class="mt-2 bg-[#FB9413] text-white px-9 py-3 rounded-xl hover:bg-[#e78308] transition duration-200 font-semibold cursor-pointer">
                            ثبت تغییرات
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let submitBtn = document.getElementById('submitBtn')
    let link = "{{ url('/') }}/"
    let user_name = document.getElementById('user_name')

    user_name.addEventListener('keyup', ()=>{
        $.ajax({
            url: link+"api/checkUserNameFromEdit",
            type: "POST",
            dataType: "json",
            data: {
                'letter': user_name.value,
                'pageId': "{{ $pages->id }}"
            },
            success: function(response){
                let message = document.getElementById('username-message');

                if(response.flag){
                    message.classList.add('hidden');

                    user_name.classList.add('border-1')
                    user_name.classList.add('rounded-lg')
                    user_name.classList.remove('border-red-500')
                    user_name.classList.add('border-green-500')

                    submitBtn.classList = 'active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer'
                    submitBtn.disabled = false
                } else {
                    message.classList.remove('hidden');

                    user_name.classList.add('border-1')
                    user_name.classList.add('rounded-lg')
                    user_name.classList.remove('border-green-500')
                    user_name.classList.add('border-red-500')

                    submitBtn.disabled = true
                    submitBtn.classList = 'active:bg-[#03a9f47a] mt-2 bg-[#03a9f47a] text-white p-3 max-md:p-2 rounded-md hover:bg-[#03a9f47a] transition duration-200 font-medium cursor-no-drop'
                }

                if(user_name.value.trim() == ''){
                    message.classList.add('hidden');

                    user_name.classList.remove('border-1')
                    user_name.classList.remove('rounded-lg')
                    user_name.classList.remove('border-green-500')
                    user_name.classList.remove('border-red-500')
                }
            },
            error: function(){
                console.log('error')
            }
        })
    })
</script>

@endsection
