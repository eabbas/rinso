
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ویرایش اطلاعات کاربر</title>
</head>

<body class="min-h-screen bg-[#F5F6F8] text-[#101827]">

    <section class="2xl:container mx-auto px-4 py-12 md:py-20">

        <div class="w-full max-w-4xl mx-auto">

            <!-- عنوان صفحه -->
            <div class="text-center mb-10">
                <span class="inline-block w-10 h-1 rounded-full bg-[#FB9413] mb-4"></span>

                <h1 class="text-2xl md:text-3xl font-bold text-[#101827]">
                    ویرایش اطلاعات حساب
                </h1>

                <p class="text-sm text-gray-500 mt-3">
                    اطلاعات حساب کاربری خود را از این بخش به‌روزرسانی کنید.
                </p>
            </div>

            <!-- فرم -->
            <form
                action="{{ route('user.profileUpdate') }}"
                method="post"
                class="bg-white rounded-2xl border border-[#E6E9EF] shadow-sm overflow-hidden"
            >
                @csrf

                <!-- سربرگ فرم -->
                <div class="bg-[#101827] px-6 md:px-10 py-6">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center text-[#FB9413]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 20a8 8 0 0116 0"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-white font-bold text-base md:text-lg">
                                اطلاعات شخصی
                            </h2>
                            <p class="text-gray-400 text-xs mt-1">
                                مشخصات حساب کاربری
                            </p>
                        </div>
                    </div>
                </div>

                <!-- فیلدها -->
                <div class="p-6 md:p-10">

                    <input type="hidden" name="id" value="{{$user -> id}}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">

                        <!-- نام -->
                        <div class="flex flex-col gap-2">
                            <label for="first_name" class="text-sm font-semibold text-[#344054]">
                                نام و نام خانوادگی
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="first_name"
                                value="{{$user -> name}}"
                                placeholder="نام خود را وارد کنید"
                                class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-[#101827] text-sm outline-none transition-all duration-200 focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                                required
                            >
                        </div>

                        <!-- شماره تلفن -->
                        <div class="flex flex-col gap-2">
                            <label for="email" class="text-sm font-semibold text-[#344054]">
                                شماره تلفن
                            </label>

                            <input
                                type="phoneNumber"
                                name="phoneNumber"
                                value="{{$user -> phoneNumber}}"
                                id="email"
                                placeholder="شماره تلفن خود را وارد کنید"
                                class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-[#101827] text-sm outline-none transition-all duration-200 focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                                required
                            >
                        </div>

                        <!-- رمز عبور -->
                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label for="password" class="text-sm font-semibold text-[#344054]">
                                تغییر رمز عبور
                                <span class="text-gray-400 font-normal text-xs mr-1">
                                    (اختیاری)
                                </span>
                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="در صورت تمایل رمز عبور جدید را وارد کنید"
                                class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-[#101827] text-sm outline-none transition-all duration-200 focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                            >

                            <p class="text-xs text-gray-400">
                                اگر قصد تغییر رمز عبور را ندارید، این قسمت را خالی بگذارید.
                            </p>
                        </div>

                    </div>

                    <!-- دکمه ثبت -->
                    <div class="flex justify-center md:justify-end mt-10 pt-6 border-t border-gray-100">
                        <button
                            type="submit"
                            class="min-w-36 px-8 py-3 rounded-xl bg-[#101827] text-white text-sm font-semibold transition-all duration-200 hover:bg-[#FB9413] hover:shadow-lg hover:shadow-orange-500/20"
                        >
                            ذخیره تغییرات
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </section>

</body>
</html>
