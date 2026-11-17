
@extends('admin.app.panel')

@section('title', 'رینسو | ایجاد کاربر جدید')

@section('content')

    <div dir="rtl" class="w-full space-y-4 text-[#252B36]">

        {{-- هدر صفحه --}}
        <section class="flex items-center justify-between gap-3 rounded-2xl bg-[#101827] px-4 py-4 text-white shadow-sm md:px-5">

            <div class="flex min-w-0 items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10">
                    <svg class="h-5 w-5 text-[#FB9413]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m16-10a4 4 0 1 0 0-8m4 18v-2a4 4 0 0 0-3-3.87M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <h1 class="truncate text-base font-bold md:text-lg">ایجاد کاربر جدید</h1>
                    <p class="mt-1 text-xs text-slate-300">اطلاعات کاربر را وارد کنید.</p>
                </div>
            </div>

            <a href="{{ url()->previous() }}"
               class="shrink-0 rounded-lg border border-white/15 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">
                بازگشت
            </a>
        </section>


        {{-- خطاهای اعتبارسنجی --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                <p class="mb-2 text-sm font-semibold text-red-700">
                    لطفاً موارد زیر را بررسی کنید:
                </p>

                <ul class="list-inside list-disc space-y-1 text-xs text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form id="createUserForm"
              action="{{ route('user.store_user') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">

            @csrf

            {{-- تصویر کاربر --}}
            <section class="overflow-hidden rounded-2xl border border-[#E8EBF0] bg-white shadow-sm">

                <div class="flex items-center gap-2 border-b border-[#EEF0F3] px-4 py-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-orange-50 text-[#FB9413]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M4 7h3l2-3h6l2 3h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2Z"/>
                            <circle cx="12" cy="13" r="3"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-bold">تصویر پروفایل</h2>
                        <p class="text-[11px] text-gray-400">اختیاری</p>
                    </div>
                </div>

                <div class="p-4">
                    <div id="uploadArea"
                         class="flex flex-col items-center gap-3 rounded-xl border border-dashed border-[#D9DEE7] bg-[#FAFBFC] p-4 transition hover:border-[#FB9413] sm:flex-row sm:justify-between">

                        <div class="flex min-w-0 items-center gap-3">
                            <div class="relative h-[68px] w-[68px] shrink-0 overflow-hidden rounded-xl border border-[#E8EBF0] bg-white">

                                <img id="imagePreview"
                                     src=""
                                     alt="پیش‌نمایش تصویر"
                                     class="hidden h-full w-full object-cover">

                                <div id="imagePlaceholder"
                                     class="flex h-full w-full items-center justify-center text-gray-300">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M15 10l4.5-4.5M19.5 5.5V10m0-4.5H15M4 19l5.5-6 3.5 3 2.5-2.5L20 18"/>
                                        <circle cx="8" cy="8" r="2"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-[#303846]">
                                    تصویر کاربر را انتخاب کنید
                                </p>
                                <p class="mt-1 text-xs text-gray-400">
                                    فرمت JPG، PNG یا WEBP
                                </p>
                                <p class="mt-1 text-[11px] text-gray-400">
                                    می‌توانید تصویر را بکشید و اینجا رها کنید.
                                </p>
                            </div>
                        </div>

                        <div class="flex shrink-0 items-center gap-2">
                            <label for="main_image"
                                   class="cursor-pointer rounded-lg bg-[#101827] px-3 py-2 text-xs font-medium text-white transition hover:bg-[#1D293B]">
                                انتخاب تصویر
                            </label>

                            <button type="button"
                                    id="removeImage"
                                    class="hidden rounded-lg border border-red-200 px-3 py-2 text-xs text-red-600 transition hover:bg-red-50">
                                حذف
                            </button>
                        </div>

                        <input type="file"
                               name="main_image"
                               id="main_image"
                               accept="image/png,image/jpeg,image/webp"
                               class="hidden">
                        @error('main_image')
                            <p class="text-[11px] text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </section>


            {{-- اطلاعات شخصی --}}
            <section class="overflow-hidden rounded-2xl border border-[#E8EBF0] bg-white shadow-sm">

                <div class="flex items-center gap-2 border-b border-[#EEF0F3] px-4 py-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-orange-50 text-[#FB9413]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/>
                        </svg>
                    </div>

                    <h2 class="text-sm font-bold">اطلاعات شخصی</h2>
                </div>

                <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 md:p-5">

                    {{-- نام --}}
                    <div>
                        <label for="name" class="mb-1.5 block text-xs font-semibold text-gray-600">
                            نام
                        </label>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="نام کاربر"
                               class="w-full rounded-lg border border-[#E1E5EB] bg-[#FAFBFC] px-3 py-2.5 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-orange-100">
                        @error('name')
                            <p class="text-[11px] text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- نام خانوادگی --}}
                    <div>
                        <label for="family" class="mb-1.5 block text-xs font-semibold text-gray-600">
                            نام خانوادگی
                        </label>

                        <input type="text"
                               name="family"
                               id="family"
                               value="{{ old('family') }}"
                               placeholder="نام خانوادگی کاربر"
                               class="w-full rounded-lg border border-[#E1E5EB] bg-[#FAFBFC] px-3 py-2.5 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-orange-100">
                        @error('family')
                            <p class="text-[11px] text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- شماره تماس --}}
                    <div>
                        <label for="phoneNumber" class="mb-1.5 block text-xs font-semibold text-gray-600">
                            شماره تماس <span class="text-red-500">*</span>
                        </label>

                        <input type="tel"
                               name="phoneNumber"
                               id="phoneNumber"
                               value="{{ old('phoneNumber') }}"
                               placeholder="09123456789"
                               required
                               dir="ltr"
                               class="w-full rounded-lg border border-[#E1E5EB] bg-[#FAFBFC] px-3 py-2.5 text-left text-sm outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-orange-100">
                        @error('phoneNumber')
                            <p class="text-[11px] text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- ایمیل --}}
                    <div>
                        <label for="email" class="mb-1.5 block text-xs font-semibold text-gray-600">
                            ایمیل
                        </label>

                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="example@gmail.com"
                               dir="ltr"
                               class="w-full rounded-lg border border-[#E1E5EB] bg-[#FAFBFC] px-3 py-2.5 text-left text-sm outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-orange-100">
                        @error('email')
                            <p class="text-[11px] text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- رمز عبور --}}
                    <div class="sm:col-span-2">
                        <label for="password" class="mb-1.5 block text-xs font-semibold text-gray-600">
                            رمز عبور <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   required
                                   placeholder="رمز عبور کاربر را وارد کنید"
                                   class="w-full rounded-lg border border-[#E1E5EB] bg-[#FAFBFC] px-3 py-2.5 pl-11 text-sm outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-orange-100">
                            @error('password')
                                <p class="text-[11px] text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                            <button type="button"
                                    id="togglePassword"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition hover:text-[#FB9413]"
                                    aria-label="نمایش رمز عبور">

                                <svg id="eyeIcon"
                                     class="h-4 w-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </section>


            {{-- سطح دسترسی --}}
            <section class="overflow-hidden rounded-2xl border border-[#E8EBF0] bg-white shadow-sm">

                <div class="flex items-center gap-2 border-b border-[#EEF0F3] px-4 py-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-orange-50 text-[#FB9413]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 3 4 6v5c0 5 3.5 8 8 10 4.5-2 8-5 8-10V6l-8-3Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>

                    <h2 class="text-sm font-bold">سطح دسترسی</h2>
                </div>

                <div class="p-4">
                    <label for="role" class="mb-1.5 block text-xs font-semibold text-gray-600">
                        نقش کاربر <span class="text-red-500">*</span>
                    </label>

                    <select name="role"
                            id="role"
                            required
                            class="w-full rounded-lg border border-[#E1E5EB] bg-[#FAFBFC] px-3 py-2.5 text-sm outline-none transition focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-orange-100">

                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>
                            انتخاب نقش کاربر
                        </option>

                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ old('role') == $role->id ? 'selected' : '' }}>

                                @switch($role->title)
                                    @case('admin')
                                        مدیر کل
                                        @break

                                    @case('admin2')
                                        مدیر سیستم
                                        @break

                                    @case('general')
                                        کاربر عادی
                                        @break

                                    @default
                                        {{ $role->title }}
                                @endswitch

                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="text-[11px] text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </section>


            {{-- دکمه‌های عملیات --}}
            <div class="flex flex-col-reverse items-stretch justify-between gap-3 rounded-xl border border-[#E8EBF0] bg-white p-3 shadow-sm sm:flex-row sm:items-center">

                <button type="reset"
                        id="resetForm"
                        class="rounded-lg border border-[#E1E5EB] px-4 py-2.5 text-xs font-medium text-gray-600 transition hover:bg-gray-50">
                    پاک کردن فرم
                </button>

                <button type="submit"
                        id="submitButton"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#101827] px-5 py-2.5 text-xs font-semibold text-white transition hover:bg-[#1D293B] disabled:cursor-not-allowed disabled:opacity-60">

                    <svg id="submitSpinner"
                         class="hidden h-4 w-4 animate-spin"
                         fill="none"
                         viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4Z"/>
                    </svg>

                    <span id="submitText">ثبت کاربر</span>
                </button>

            </div>

        </form>
    </div>


    {{-- اسکریپت‌ها --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('createUserForm');

            // عناصر تصویر
            const imageInput = document.getElementById('main_image');
            const imagePreview = document.getElementById('imagePreview');
            const imagePlaceholder = document.getElementById('imagePlaceholder');
            const uploadArea = document.getElementById('uploadArea');
            const removeImageButton = document.getElementById('removeImage');

            let previewUrl = null;

            function showPreview(file) {
                if (!file) return;

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {
                    alert('فرمت تصویر باید JPG، PNG یا WEBP باشد.');
                    imageInput.value = '';
                    return;
                }

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                }

                previewUrl = URL.createObjectURL(file);

                imagePreview.src = previewUrl;
                imagePreview.classList.remove('hidden');
                imagePlaceholder.classList.add('hidden');
                removeImageButton.classList.remove('hidden');
            }

            imageInput.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    showPreview(file);
                }
            });

            function removeImage() {
                imageInput.value = '';

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                    previewUrl = null;
                }

                imagePreview.src = '';
                imagePreview.classList.add('hidden');
                imagePlaceholder.classList.remove('hidden');
                removeImageButton.classList.add('hidden');
            }

            removeImageButton.addEventListener('click', removeImage);

            // Drag & Drop تصویر
            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    uploadArea.classList.add('border-[#FB9413]', 'bg-orange-50/50');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    uploadArea.classList.remove('border-[#FB9413]', 'bg-orange-50/50');
                });
            });

            uploadArea.addEventListener('drop', function (e) {
                const file = e.dataTransfer.files[0];

                if (!file) return;

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageInput.files = dataTransfer.files;

                showPreview(file);
            });


            // نمایش و مخفی کردن رمز عبور
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';

                this.setAttribute(
                    'aria-label',
                    isPassword ? 'مخفی کردن رمز عبور' : 'نمایش رمز عبور'
                );

                this.innerHTML = isPassword
                    ? `<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M3 3l18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 5.2A10.5 10.5 0 0 1 12 5c6.5 0 10 7 10 7a13 13 0 0 1-3.1 3.8M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7c1.1 0 2.1-.2 3-.5"/>
                       </svg>`
                    : `<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                        <circle cx="12" cy="12" r="3"/>
                       </svg>`;
            });


            // پاک کردن فرم و پیش‌نمایش
            document.getElementById('resetForm').addEventListener('click', function () {
                setTimeout(function () {
                    removeImage();

                    passwordInput.type = 'password';

                    togglePassword.innerHTML = `
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    `;
                }, 0);
            });


            // جلوگیری از ارسال چندباره فرم
            const submitButton = document.getElementById('submitButton');
            const submitSpinner = document.getElementById('submitSpinner');
            const submitText = document.getElementById('submitText');

            form.addEventListener('submit', function (e) {
                if (!form.checkValidity()) {
                    return;
                }

                if (submitButton.disabled) {
                    e.preventDefault();
                    return;
                }

                submitButton.disabled = true;
                submitSpinner.classList.remove('hidden');
                submitText.textContent = 'در حال ثبت اطلاعات...';
            });

        });
    </script>

@endsection
