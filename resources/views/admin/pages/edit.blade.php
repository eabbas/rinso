@extends('admin.app.panel')

@section('title')
    رینسو | ویرایش صفحه معرفی {{ $page->title }}
@endsection

@section('content')
    @php
        $ids = [];

        if (Auth::check()) {
            $roles = Auth::user()->role;
            $ids = $roles->pluck('id')->toArray();
        }
    @endphp

    <div dir="rtl" class="min-h-screen bg-[#F5F7FA] px-4 py-7 sm:px-6 lg:px-8">

        <div class="max-w-5xl mx-auto">

            {{-- Page Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">

                <div>
                    <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                        <span>مدیریت صفحات</span>
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                        <span class="text-[#142033] font-semibold">ایجاد صفحه جدید</span>
                    </div>

                    <h1 class="text-2xl font-extrabold text-[#142033]">
                        ایجاد صفحه معرفی
                    </h1>

                    <p class="text-sm text-slate-500 mt-2">
                        اطلاعات صفحه جدید خود را وارد و آن را در رینسو ایجاد کنید.
                    </p>
                </div>

                <div
                    class="hidden sm:flex items-center justify-center w-12 h-12 rounded-2xl bg-white border-1 border-slate-200 text-[#142033]">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                        <rect x="3" y="3" width="18" height="18" rx="4" />
                        <path d="M12 8v8m-4-4h8" />
                    </svg>
                </div>

            </div>


            <form action="{{ route('pages.update', $page->id) }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="bg-white border-1 border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                    {{-- Main Section Header --}}
                    <div class="px-5 sm:px-8 py-6 border-b border-slate-100">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-xl bg-[#142033] text-white flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="16" rx="3" />
                                    <path d="M8 2v4m8-4v4M3 10h18" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-sm font-bold text-[#142033]">
                                    اطلاعات اصلی صفحه
                                </h2>
                                <p class="text-xs text-slate-400 mt-1">
                                    مشخصات و محتوای اولیه صفحه خود را وارد کنید.
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Form Content --}}
                    <div class="p-5 sm:p-8">

                        {{-- Basic Information --}}
                        <div class="mb-8">

                            <div class="flex items-center gap-2 mb-5">
                                <span class="w-1 h-4 rounded-full bg-[#FF9018]"></span>
                                <h3 class="text-sm font-bold text-[#142033]">
                                    مشخصات صفحه
                                </h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                                {{-- Username --}}
                                <div class="flex flex-col gap-2">

                                    <label for="user_name" class="text-sm font-semibold text-slate-700">
                                        نام کاربری
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <div class="relative">
                                        <input id="user_name" type="text" name="user_name" placeholder="مثلاً: mohammad"
                                            required dir="ltr" value="{{ old('user_name', $page->user_name) }}"
                                            class="w-full h-12 px-4 rounded-xl border-1 border-slate-200 bg-slate-50 text-sm font-semibold text-[#142033] placeholder:text-slate-400 outline-none transition focus:bg-white focus:border-[#142033] focus:ring-4 focus:ring-slate-100">
                                    </div>
                                    @error('user_name')
                                        <p class="text-[11px] text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Title --}}
                                <div class="flex flex-col gap-2">

                                    <label for="page_title" class="text-sm font-semibold text-slate-700">
                                        عنوان صفحه
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input id="page_title" type="text" name="title"
                                        placeholder="عنوان صفحه را وارد کنید" required
                                        value="{{ old('title', $page->title) }}"
                                        class="w-full h-12 px-4 rounded-xl border-1 border-slate-200 bg-slate-50 text-sm font-semibold text-[#142033] placeholder:text-slate-400 outline-none transition focus:bg-white focus:border-[#142033] focus:ring-4 focus:ring-slate-100">
                                    @error('title')
                                        <p class="text-[11px] text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Subtitle --}}
                                <div class="flex flex-col gap-2">

                                    <label for="page_subtitle" class="text-sm font-semibold text-slate-700">
                                        عنوان فرعی
                                        <span class="text-xs font-normal text-slate-400 mr-1">
                                            (اختیاری)
                                        </span>
                                    </label>

                                    <input id="page_subtitle" type="text" name="subTitle"
                                        placeholder="یک جمله کوتاه برای معرفی صفحه"
                                        value="{{ old('subTitle', $page->subTitle) }}"
                                        class="w-full h-12 px-4 rounded-xl border-1 border-slate-200 bg-slate-50 text-sm font-semibold text-[#142033] placeholder:text-slate-400 outline-none transition focus:bg-white focus:border-[#142033] focus:ring-4 focus:ring-slate-100">
                                    @error('subTitle')
                                        <p class="text-[11px] text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Page Category --}}
                                <div class="flex flex-col gap-2">

                                    <label for="category_id" class="text-sm font-semibold text-slate-700">
                                        دسته‌بندی صفحه
                                    </label>

                                    <select name="category_id" id="category_id"
                                        class="w-full h-12 px-4 rounded-xl border-1 border-slate-200 bg-slate-50 text-sm font-semibold text-[#142033] outline-none transition focus:bg-white focus:border-[#142033] focus:ring-4 focus:ring-slate-100 cursor-pointer">

                                        <option value="" selected disabled>
                                            دسته‌بندی موردنظر را انتخاب کنید
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $page->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <p class="text-[11px] text-slate-400">
                                        مشخص کنید این صفحه در کدام دسته‌بندی قرار بگیرد.
                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- Media Section --}}
                        <div class="mb-8 pt-7 border-t border-slate-100">

                            <div class="flex items-center justify-between gap-3 mb-5">

                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-1 h-4 rounded-full bg-[#FF9018]"></span>
                                        <h3 class="text-sm font-bold text-[#142033]">
                                            تصاویر صفحه
                                        </h3>
                                    </div>

                                    <p class="text-xs text-slate-400 mt-2">
                                        لوگو و تصویر کاور صفحه خود را انتخاب کنید.
                                    </p>
                                </div>

                                <span
                                    class="text-[11px] text-slate-400 bg-slate-50 border-1 border-slate-100 px-3 py-1.5 rounded-lg">
                                    اختیاری
                                </span>

                            </div>


                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                                {{-- Logo --}}
                                <div class="sm:col-span-1">

                                    <label for="logoInput"
                                        class="group relative flex flex-col items-center justify-center min-h-[155px] p-3 rounded-xl border-1 border-slate-200 bg-white hover:border-[#142033] transition cursor-pointer overflow-hidden">

                                        {{-- Default State --}}
                                        <div id="logoPlaceholder" class="flex flex-col items-center justify-center">

                                            <div
                                                class="w-10 h-10 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                                    <rect x="3" y="3" width="18" height="18" rx="4" />
                                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                                    <path d="m21 15-5-5L5 21" />
                                                </svg>
                                            </div>

                                            <span class="text-sm font-bold text-[#142033] mt-2">
                                                انتخاب لوگو
                                            </span>

                                            <span class="text-[11px] text-slate-400 mt-1">
                                                تصویر لوگوی صفحه
                                            </span>

                                        </div>

                                        {{-- Preview --}}
                                        <img id="logoPreview" class="w-20 h-20 object-contain rounded-lg"
                                            src="{{ asset('storage/' . $page->logo_path) }}" alt="پیش‌نمایش لوگو">

                                        <span id="logoChangeText" class="text-xs font-semibold text-[#142033] mt-2">
                                            تغییر تصویر لوگو
                                        </span>

                                        <input type="file" id="logoInput" name="logo_path" accept="image/*"
                                            title="لوگو" class="hidden">

                                    </label>
                                    @error('logo_path')
                                        <p class="text-[11px] text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Cover --}}
                                <div class="sm:col-span-2">

                                    <label for="coverInput"
                                        class="group relative flex flex-col items-center justify-center min-h-[155px] p-3 rounded-xl border-1 border-slate-200 bg-white hover:border-[#142033] transition cursor-pointer overflow-hidden">

                                        {{-- Default State --}}
                                        <div id="coverPlaceholder" class="flex flex-col items-center justify-center">

                                            <div
                                                class="w-10 h-10 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                                    <rect x="3" y="4" width="18" height="16" rx="3" />
                                                    <circle cx="8.5" cy="9" r="1.5" />
                                                    <path d="m21 15-5-5L5 20" />
                                                </svg>
                                            </div>

                                            <span class="text-sm font-bold text-[#142033] mt-2">
                                                انتخاب تصویر کاور
                                            </span>

                                            <span class="text-[11px] text-slate-400 mt-1">
                                                تصویر عریض برای پس‌زمینه صفحه
                                            </span>

                                        </div>

                                        {{-- Preview --}}
                                        <img id="coverPreview" class="w-full h-28 object-cover rounded-lg"
                                            src="{{ asset('storage/' . $page->cover_path) }}" alt="پیش‌نمایش کاور">

                                        <span id="coverChangeText" class="text-xs font-semibold text-[#142033] mt-2">
                                            تغییر تصویر کاور
                                        </span>

                                        <input type="file" id="coverInput" name="cover_path" accept="image/*"
                                            title="کاور" class="hidden">

                                    </label>
                                    @error('cover_path')
                                        <p class="text-[11px] text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- Description --}}
                        <div class="pt-7 border-t border-slate-100">

                            <div class="flex items-center gap-2 mb-5">
                                <span class="w-1 h-4 rounded-full bg-[#FF9018]"></span>
                                <h3 class="text-sm font-bold text-[#142033]">
                                    درباره صفحه
                                </h3>
                            </div>

                            <div class="flex flex-col gap-2">

                                <label for="page_description" class="text-sm font-semibold text-slate-700">
                                    توضیحات
                                </label>

                                <textarea id="page_description" name="description" rows="5"
                                    placeholder="درباره خودتان، کسب‌وکار یا خدماتی که ارائه می‌دهید بنویسید..."
                                    class="w-full p-4 rounded-xl border-1 border-slate-200 bg-slate-50 text-sm font-medium text-[#142033] placeholder:text-slate-400 outline-none resize-y transition focus:bg-white focus:border-[#142033] focus:ring-4 focus:ring-slate-100">{{ old('description') }}</textarea>

                                <p class="text-[11px] text-slate-400">
                                    توضیحاتی بنویسید که به بازدیدکنندگان کمک کند شما را بهتر بشناسند.
                                </p>
                                @error('description')
                                    <p class="text-[11px] text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                        {{-- Private Page --}}
                        <label
                            class="flex items-center justify-between gap-4 p-4 rounded-xl border-1 mt-3 border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition cursor-pointer">

                            <div>
                                <p class="text-sm font-semibold text-[#142033]">
                                    صفحه خصوصی
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    فقط افراد مجاز بتوانند به محتوای صفحه دسترسی داشته باشند.
                                </p>
                            </div>

                            <input type="checkbox" name="is_private" value="1" @if($page->is_private) checked @endif
                                class="w-5 h-5 accent-[#FF9018] cursor-pointer shrink-0">

                        </label>


                        {{-- Admin Settings --}}
                        @if (in_array(1, $ids))
                            <div class="mt-8 pt-7 border-t border-slate-100">

                                <div class="mb-5">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1 h-4 rounded-full bg-[#FF9018]"></span>
                                        <h3 class="text-sm font-bold text-[#142033]">
                                            تنظیمات مدیریتی
                                        </h3>
                                    </div>

                                    <p class="text-xs text-slate-400 mt-2">
                                        وضعیت انتشار و نحوه نمایش این صفحه را تعیین کنید.
                                    </p>
                                </div>


                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                                    {{-- Active --}}
                                    <label
                                        class="flex items-center justify-between gap-4 p-4 rounded-xl border-1 border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition cursor-pointer">

                                        <div>
                                            <p class="text-sm font-semibold text-[#142033]">
                                                فعال بودن صفحه
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                صفحه برای کاربران قابل مشاهده باشد.
                                            </p>
                                        </div>

                                        <input type="checkbox" name="active" value="1"
                                            @if ($page->active) checked @endif
                                            class="w-5 h-5 accent-[#FF9018] cursor-pointer shrink-0">

                                    </label>


                                    {{-- Show in Home --}}
                                    <label
                                        class="flex items-center justify-between gap-4 p-4 rounded-xl border-1 border-slate-200 hover:border-slate-300 hover:bg-slate-50 transition cursor-pointer">

                                        <div>
                                            <p class="text-sm font-semibold text-[#142033]">
                                                نمایش در صفحه اول
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1">
                                                صفحه در صفحه اصلی رینسو نمایش داده شود.
                                            </p>
                                        </div>

                                        <input type="checkbox" name="show_in_home" value="1"
                                            @if ($page->show_in_home) checked @endif
                                            class="w-5 h-5 accent-[#FF9018] cursor-pointer shrink-0">

                                    </label>

                                </div>

                            </div>
                        @endif

                    </div>


                    {{-- Form Footer --}}
                    <div
                        class="px-5 sm:px-8 py-5 bg-[#FAFBFC] border-t border-slate-100 flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-4">

                        <p class="text-xs text-slate-400">
                            <span class="text-red-500">*</span>
                            فیلدهای ستاره‌دار الزامی هستند.
                        </p>

                        <button type="submit" id="submitBtn"
                            class="active:bg-[#03a9f47a] mt-2 bg-[#03a8f4d3] text-white p-3 max-md:p-2 rounded-md hover:bg-[#03a8f4] transition duration-200 font-medium cursor-pointer">

                            <span class="flex items-center justify-center gap-2">

                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m5 12 4 4L19 6" />
                                </svg>

                                ثبت صفحه

                            </span>

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- JavaScript --}}
    <script>
        let submitBtn = document.getElementById('submitBtn')
        let link = "{{ url('/') }}/"
        let user_name = document.getElementById('user_name')
        let timeout
        let warningText = document.getElementById('warningText')

        user_name.addEventListener('input', () => {
            clearTimeout()
            timeout = setTimeout(() => {
                $.ajax({
                    url: link + "api/checkUserName",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'letter': user_name.value
                    },
                    success: function(response) {
                        if (response.flag) {
                            user_name.classList.remove('border-slate-200',
                                'focus:border-[#142033]', 'focus:ring-slate-100')
                            user_name.classList.remove('border-red-500', 'focus:border-red-500',
                                'focus:ring-red-200')
                            user_name.classList.add('border-green-500',
                                'focus:border-green-500', 'focus:ring-green-200')

                            submitBtn.classList =
                                'active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer'

                            submitBtn.disabled = false

                        } else {
                            user_name.classList.remove('border-slate-200',
                                'focus:border-[#142033]', 'focus:ring-slate-100')
                            user_name.classList.remove('border-green-500',
                                'focus:border-green-500', 'focus:ring-green-200')
                            user_name.classList.add('border-red-500', 'focus:border-red-500',
                                'focus:ring-red-200')

                            submitBtn.disabled = true

                            submitBtn.classList =
                                'active:bg-[#03a9f47a] mt-2 bg-[#03a9f47a] text-white p-3 max-md:p-2 rounded-md hover:bg-[#03a9f47a] transition duration-200 font-medium cursor-no-drop'
                        }

                        if (user_name.value.trim() == '') {
                            user_name.classList.remove('border-red-500', 'focus:border-red-500',
                                'focus:ring-red-200')
                            user_name.classList.remove('border-green-500',
                                'focus:border-green-500', 'focus:ring-green-200')
                            user_name.classList.add('border-slate-200',
                                'focus:border-[#142033]', 'focus:ring-slate-100')

                            submitBtn.disabled = true

                            submitBtn.classList =
                                'active:bg-[#03a9f47a] mt-2 bg-[#03a9f47a] text-white p-3 max-md:p-2 rounded-md hover:bg-[#03a9f47a] transition duration-200 font-medium cursor-no-drop'
                        }
                    },
                    error: function() {
                        console.log('error')
                    }
                })
            }, 500)
        })


        // Logo Preview
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const logoPlaceholder = document.getElementById('logoPlaceholder');
        const logoChangeText = document.getElementById('logoChangeText');

        let logoObjectUrl = null;

        logoInput.addEventListener('change', function() {

            const file = this.files[0];

            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('لطفاً یک فایل تصویری انتخاب کنید.');
                this.value = '';
                return;
            }

            if (logoObjectUrl) {
                URL.revokeObjectURL(logoObjectUrl);
            }

            logoObjectUrl = URL.createObjectURL(file);

            logoPreview.src = logoObjectUrl;

            logoPreview.classList.remove('hidden');
            logoPlaceholder.classList.add('hidden');
            logoChangeText.classList.remove('hidden');

        });


        // Cover Preview
        const coverInput = document.getElementById('coverInput');
        const coverPreview = document.getElementById('coverPreview');
        const coverPlaceholder = document.getElementById('coverPlaceholder');
        const coverChangeText = document.getElementById('coverChangeText');

        let coverObjectUrl = null;

        coverInput.addEventListener('change', function() {

            const file = this.files[0];

            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('لطفاً یک فایل تصویری انتخاب کنید.');
                this.value = '';
                return;
            }

            if (coverObjectUrl) {
                URL.revokeObjectURL(coverObjectUrl);
            }

            coverObjectUrl = URL.createObjectURL(file);

            coverPreview.src = coverObjectUrl;

            coverPreview.classList.remove('hidden');
            coverPlaceholder.classList.add('hidden');
            coverChangeText.classList.remove('hidden');

        });
    </script>
@endsection
