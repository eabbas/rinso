@extends('client.document')
@section('title', 'رینسو | ایجاد ارتباط با ما')

@section('content')

<div class="min-h-screen bg-[#F5F7FA] py-12 md:py-16" dir="rtl">

    <div class="mx-auto w-11/12 max-w-5xl">

        {{-- عنوان صفحه --}}
        <div class="mb-10 text-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-orange-500/10 px-4 py-2 text-sm font-bold text-[#FB9413]">
                <span class="h-2 w-2 rounded-full bg-[#FB9413]"></span>
                پشتیبانی و ارتباط با ما
            </span>

            <h1 class="mt-5 text-2xl font-black text-[#101827] md:text-4xl">
                چطور می‌تونیم کمکتون کنیم؟
            </h1>

            <p class="mx-auto mt-4 max-w-xl text-sm leading-8 text-gray-500 md:text-base">
                سوال، پیشنهاد یا درخواستی دارید؟
                پیام خودتون رو ثبت کنید تا در سریع‌ترین زمان ممکن پیگیری کنیم.
            </p>

            <div class="mx-auto mt-5 h-1 w-16 rounded-full bg-[#FB9413]"></div>
        </div>

        @if (Auth::check() && count(Auth::user()->contactUs))
            <div class="mb-6 flex justify-center">
                <a href="{{ route('contactUs.myMessage') }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-bold text-[#101827] shadow-sm transition hover:border-[#FB9413] hover:text-[#FB9413]">
                    مشاهده تیکت‌های قبلی
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
            </div>
        @endif

        {{-- فرم اصلی --}}
        <form action="{{ route('contactUs.store') }}" method="post">
            @csrf

            <div class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl shadow-slate-900/5">

                {{-- سربرگ فرم --}}
                <div class="relative overflow-hidden bg-[#101827] px-6 py-8 md:px-10">
                    <div class="absolute -left-12 -top-16 h-48 w-48 rounded-full bg-[#FB9413]/10 blur-2xl"></div>

                    <div class="relative flex items-center gap-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#FB9413]/15 text-[#FB9413]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5m-9 6 3.5-3H18a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12z"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-xl font-black text-white">
                                فرم ارسال پیام
                            </h2>
                            <p class="mt-2 text-sm text-gray-400">
                                برای ثبت درخواست، اطلاعات زیر را تکمیل کنید.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- محتوای فرم --}}
                <div class="p-6 md:p-10">

                    <div class="grid grid-cols-1 gap-x-8 gap-y-7 md:grid-cols-2">

                        {{-- شماره موبایل --}}
                        <div class="flex flex-col gap-3">
                            <label for="phoneNumber" class="text-sm font-bold text-[#101827]">
                                شماره تماس
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                id="phoneNumber"
                                type="tel"
                                name="phoneNumber"
                                value="{{ old('phoneNumber') }}"
                                placeholder="مثلاً 09123456789"
                                required
                                maxlength="11"
                                dir="ltr"
                                class="h-14 w-full rounded-xl border border-gray-200 bg-[#F8FAFC] px-4 text-left text-sm text-[#101827] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-orange-500/10"
                            >

                            <span id="phoneStatus" class="hidden text-xs font-medium"></span>

                            @error('phoneNumber')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- کد تأیید --}}
                        <div class="flex flex-col gap-3">
                            <label for="code" class="text-sm font-bold text-[#101827]">
                                کد تأیید پیامکی
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="flex h-14 gap-2">
                                <input
                                    type="text"
                                    inputmode="numeric"
                                    maxlength="4"
                                    name="code"
                                    id="code"
                                    placeholder="کد پیامک شده"
                                    required
                                    dir="ltr"
                                    class="min-w-0 flex-1 rounded-xl border border-gray-200 bg-[#F8FAFC] px-4 text-center text-sm tracking-widest text-[#101827] outline-none transition placeholder:tracking-normal focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-orange-500/10"
                                >

                                <button
                                    type="button"
                                    id="sendCodeBtn"
                                    onclick="sendTicketCode()"
                                    class="shrink-0 rounded-xl bg-[#101827] px-4 text-xs font-bold text-white transition hover:bg-[#FB9413] hover:text-[#101827] sm:px-6 sm:text-sm"
                                >
                                    ارسال کد
                                </button>
                            </div>

                            <p class="text-xs leading-6 text-gray-400">
                                برای تأیید شماره تماس، کد ارسال‌شده را وارد کنید.
                            </p>

                            @error('code')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- عنوان --}}
                        <div class="flex flex-col gap-3 md:col-span-2">
                            <label for="title" class="text-sm font-bold text-[#101827]">
                                عنوان تیکت
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="موضوع پیام خود را بنویسید"
                                required
                                class="h-14 w-full rounded-xl border border-gray-200 bg-[#F8FAFC] px-4 text-sm text-[#101827] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-orange-500/10"
                            >

                            @error('title')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- توضیحات --}}
                        <div class="flex flex-col gap-3 md:col-span-2">
                            <label for="description" class="text-sm font-bold text-[#101827]">
                                توضیحات
                                <span class="text-red-500">*</span>
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="6"
                                placeholder="توضیحات و درخواست خود را اینجا بنویسید..."
                                required
                                class="w-full resize-y rounded-xl border border-gray-200 bg-[#F8FAFC] px-4 py-4 text-sm leading-8 text-[#101827] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-4 focus:ring-orange-500/10"
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    {{-- دکمه ثبت --}}
                    <div class="mt-8 flex flex-col-reverse items-center justify-between gap-5 border-t border-gray-100 pt-7 sm:flex-row">

                        <p class="text-xs leading-6 text-gray-400">
                            پیام شما پس از ثبت توسط تیم پشتیبانی بررسی می‌شود.
                        </p>

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-3 rounded-xl bg-[#FB9413] px-8 py-4 text-sm font-black text-[#101827] shadow-lg shadow-orange-500/20 transition hover:-translate-y-1 hover:bg-[#FBA12F] hover:shadow-orange-500/30 sm:w-auto"
                        >
                            ثبت تیکت

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M7 7h10v10"/>
                            </svg>
                        </button>

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
<script>
    let phoneNumber = document.getElementById('phoneNumber')
    let countdownTimer;
    function showPhoneStatus(message, success = false) {
        let phoneStatus = document.getElementById('phoneStatus');

        phoneStatus.innerText = message;
        phoneStatus.classList.remove('hidden', 'text-green-400', 'text-red-400');
        phoneStatus.classList.add(success ? 'text-green-400' : 'text-red-400');
    }
 function counter() {

    let sendCodeBtn = document.getElementById('sendCodeBtn');

    if (!sendCodeBtn) return;

    let count = 120;

    clearInterval(countdownTimer);

    sendCodeBtn.disabled = true;
    sendCodeBtn.classList.add('opacity-60', 'cursor-not-allowed');
    sendCodeBtn.setAttribute('dir', 'ltr');

    countdownTimer = setInterval(() => {

        let minute = Math.floor(count / 60);
        let seconds = count % 60;

        sendCodeBtn.innerText = minute.toString().padStart(2, '0') + ' : ' + seconds.toString().padStart(2, '0');

        count--;

        if (count < 0) {

            clearInterval(countdownTimer);

            $.ajax({
                url: api + 'removeActivationCode',
                type: "POST",
                dataType: "json",
                data: {
                    phoneNumber: phoneNumber.value
                },
                success: function () {

                    sendCodeBtn.disabled = false;
                    sendCodeBtn.classList.remove('opacity-60', 'cursor-not-allowed');
                    sendCodeBtn.removeAttribute('dir');
                    sendCodeBtn.innerText = 'ارسال مجدد';

                },
                error: function () {

                    sendCodeBtn.disabled = false;
                    sendCodeBtn.classList.remove('opacity-60', 'cursor-not-allowed');
                    sendCodeBtn.removeAttribute('dir');
                    sendCodeBtn.innerText = 'ارسال مجدد';

                    notify('<span class="text-red-500">خطا در دریافت اطلاعات!</span>');

                }
            });

        }

    }, 1000);

}

    function sendTicketCode(){
        let sendCodeBtn = document.getElementById('sendCodeBtn');
        if (sendCodeBtn.disabled) return;
        if (!phoneNumber.value.trim()) {

            showPhoneStatus('لطفاً شماره موبایل خود را وارد کنید.');

            phoneNumber.focus();

            return;
        }
        if (!/^09\d{9}$/.test(phoneNumber.value)) {

           showPhoneStatus('شماره موبایل معتبر نیست.');

            phoneNumber.focus();

            return;

        }
        sendCodeBtn.disabled = true;
        sendCodeBtn.classList.add('opacity-50', 'cursor-not-allowed');
        sendCodeBtn.innerText = 'در حال ارسال...';

        $.ajax({
            url: api +'sendTicketCode',
            type: "POST",
            dataType: "json",

            data: {
                phoneNumber: phoneNumber.value
            },

            success: function (data) {
                console.log(data)
                if (data) {

                    showPhoneStatus('کد تأیید با موفقیت ارسال شد.');

                    counter();

                }
            },

            error: function () {
                sendCodeBtn.disabled = false;
                sendCodeBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                sendCodeBtn.innerText = 'ارسال کد';

                
                showPhoneStatus('خطا در ارسال کد تأیید!');

            }

        });

    }
</script>
@endsection

