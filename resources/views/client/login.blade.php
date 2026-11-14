

@extends('client.document')
@section('title', 'رینسو | ورود')
@section('content')
    
{{-- Notification --}}
<div id="message"
     class="fixed top-0 right-1/2 -translate-y-full translate-x-1/2 opacity-0 invisible z-[150] w-11/12 sm:w-2/3 lg:w-1/3 bg-white rounded-2xl shadow-2xl border-1 border-slate-200 transition-all duration-500">

    <div class="flex items-center gap-3 p-4">

        <div class="size-9 shrink-0 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        </div>

        <div class="message-content flex-1 text-sm font-bold text-center text-[#101d3b]"></div>

        <button type="button"
                onclick="showMessage('close')"
                class="text-slate-400 hover:text-red-500 transition">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" d="m18 6-12 12M6 6l12 12"/>
            </svg>
        </button>

    </div>
</div>


{{-- Main --}}
<div class="min-h-[85dvh] w-full flex flex-col md:flex-row-reverse bg-[#f5f7fb]">

    {{-- Branding Panel --}}
    <div class="relative overflow-hidden md:w-5/12 lg:w-1/2 bg-[#101d3b] text-white">

        {{-- Background Decoration --}}
        <div class="absolute -top-36 -right-36 size-[28rem] rounded-full bg-blue-500/10 blur-[100px]"></div>
        <div class="absolute -bottom-40 -left-20 size-[28rem] rounded-full bg-orange-500/10 blur-[110px]"></div>

        <div class="absolute inset-0 opacity-[0.06]"
             style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 25px 25px;">
        </div>

        <div class="relative z-10 h-full flex flex-col items-center justify-center px-8 py-10 md:py-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="mb-10 bg-white rounded-2xl px-5 py-3 shadow-xl shadow-black/10">

                <img src="{{ asset('/logo/rinso.png') }}"
                     alt="Rinso"
                     class="w-32 sm:w-40 object-contain">

            </a>


            {{-- Branding Content --}}
            <div class="hidden md:flex flex-col items-center text-center max-w-md">

                {{-- Illustration --}}
                <div class="relative mb-12">

                    <div class="size-48 lg:size-60 rounded-[3rem] bg-white/[0.04] border-1 border-white/10 backdrop-blur-xl flex items-center justify-center rotate-6">

                        <div class="size-36 lg:size-44 rounded-[2.5rem] bg-gradient-to-br from-[#243b68] to-[#172744] border-1 border-white/10 shadow-2xl shadow-black/20 -rotate-6 flex items-center justify-center">

                            <svg class="size-20 lg:size-24" fill="none" stroke="white" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="4" stroke-width="1.3"/>
                                <circle cx="12" cy="9" r="2.5" stroke-width="1.5"/>
                                <path d="M7 19c0-2.8 2.2-5 5-5s5 2.2 5 5"
                                      stroke-width="1.5" stroke-linecap="round"/>
                            </svg>

                        </div>
                    </div>

                    {{-- Orange Decoration --}}
                    <div class="absolute -bottom-5 -left-7 size-14 rounded-2xl bg-[#ff9418] flex items-center justify-center shadow-xl shadow-orange-500/20">

                        <svg class="size-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v18m9-9H3"/>
                        </svg>

                    </div>

                    <div class="absolute -top-5 -right-7 size-12 rounded-2xl bg-[#24385f] border-1 border-white/10 flex items-center justify-center shadow-xl">

                        <svg class="size-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                  d="m5 12 4 4L19 6"/>
                        </svg>

                    </div>

                </div>


                <h1 class="text-2xl lg:text-3xl font-black leading-relaxed">
                    دوباره به رینسو خوش اومدی!
                </h1>

                <p class="text-sm lg:text-base text-slate-300/70 leading-9 mt-5">
                    وارد حساب کاربریت شو و مدیریت صفحه اختصاصی، لینک‌ها و راه‌های ارتباطی خودت رو ادامه بده.
                </p>


                <div class="flex items-center gap-3 mt-10 px-5 py-3 rounded-full bg-white/[0.06] border-1 border-white/10">

                    <span class="size-2 rounded-full bg-[#ff9418] shadow-[0_0_12px_#ff9418]"></span>

                    <span class="text-xs text-slate-300">
                        تمام ارتباطاتت، یکجا در رینسو
                    </span>

                </div>

            </div>


            <p class="hidden md:block absolute bottom-7 text-xs text-slate-500 tracking-wider">
                RINSO | DIGITAL IDENTITY PLATFORM
            </p>

        </div>
    </div>


    {{-- Login Form --}}
    <div class="w-full md:w-7/12 lg:w-1/2 flex justify-center items-center px-5 py-12 sm:px-10 lg:px-16">

        <div class="w-full max-w-md">

            {{-- Heading --}}
            <div class="mb-9">

                <div class="inline-flex items-center gap-2 bg-orange-50 text-[#d97706] px-3 py-2 rounded-lg text-xs font-bold mb-5 border-1 border-orange-100">

                    <span class="size-2 rounded-full bg-[#ff9418]"></span>

                    خوش برگشتی!

                </div>

                <h2 class="text-2xl sm:text-3xl font-black text-[#101d3b]">
                    ورود به حساب کاربری
                </h2>

                <p class="text-sm text-slate-400 mt-3 leading-7">
                    برای ورود به حساب خود، شماره موبایل و اطلاعات ورودت رو وارد کن.
                </p>

            </div>


            {{-- Server Message --}}
            @if ($message)
                <div class="mb-5 bg-red-50 border-1 border-red-100 text-red-600 rounded-xl py-3 px-4 text-sm text-center font-bold">
                    {{ $message }}
                </div>
            @endif


            {{-- Form --}}
            <form action="{{ route('user.check') }}"
                  class="flex flex-col gap-5 w-full"
                  method="post"
                  id="loginForm">

                @csrf


                {{-- Phone --}}
                <div class="flex flex-col gap-2">

                    <label for="phoneNumber" class="text-sm font-bold text-[#243653]">
                        شماره موبایل
                    </label>

                    <div class="relative">

                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 5a2 2 0 0 1 2-2h2l2 5-2 1a14 14 0 0 0 8 8l1-2 5 2v2a2 2 0 0 1-2 2A17 17 0 0 1 3 5Z"/>
                            </svg>

                        </span>

                        <input type="number"
                               class="w-full h-13 pr-12 pl-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#243653] placeholder:text-slate-300 outline-none transition-all focus:border-[#ff9418] focus:ring-4 focus:ring-orange-500/10"
                               name="phoneNumber"
                               id="phoneNumber"
                               placeholder="مثلاً 09123456789"
                               required>

                    </div>

                </div>


                {{-- Login Method --}}
                <div class="flex flex-col gap-2">

                    <label class="text-sm font-bold text-[#243653]">
                        اطلاعات ورود
                    </label>

                    <div class="w-full" id="login">

                        {{-- Default: Activation Code --}}
                        <div class="w-full flex items-center gap-2">

                            <input type="number"
                                   class="w-7/12 h-13 px-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#243653] placeholder:text-slate-300 outline-none transition-all focus:border-[#ff9418] focus:ring-4 focus:ring-orange-500/10"
                                   name="code"
                                   placeholder="کد پیامک شده"
                                   required
                                   id="code">

                            <button type="button"
                                    class="flex-1 h-13 cursor-pointer rounded-xl bg-[#101d3b] hover:bg-[#1c3158] disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-[#101d3b] text-white text-xs sm:text-sm font-bold transition-all shadow-lg shadow-slate-900/10"
                                    onclick="sendCode()"
                                    id="countDown">

                                ارسال کد

                            </button>

                        </div>

                    </div>

                    <p class="text-[11px] text-slate-400 mt-1">
                        کد ورود برای شماره موبایل شما پیامک می‌شود.
                    </p>

                </div>


                {{-- Login Options --}}
                <div class="w-full flex flex-wrap items-center justify-between gap-3" id="loginWay">

                    <a href="{{ route('forget_password') }}"
                       class="text-sm text-[#d97706] hover:text-[#b45309] font-medium transition">

                        فراموشی رمز عبور

                    </a>

                    <button type="button"
                            class="text-sm text-[#101d3b] hover:text-[#d97706] font-bold transition"
                            onclick="loginWithPassKey(this)">

                        ورود با رمز عبور

                    </button>

                </div>


                {{-- Submit --}}
                <button type="submit"
                        class="w-full h-13 rounded-xl bg-[#ff9418] hover:bg-[#e98108] text-white text-sm font-bold transition-all shadow-lg shadow-orange-500/20">

                    ورود به حساب کاربری

                </button>


                {{-- Signup --}}
                <div class="text-center mt-3">

                    <span class="text-sm text-slate-400">
                        هنوز عضو رینسو نشدی؟
                    </span>

                    <a href="{{ route('signup') }}"
                       class="text-sm text-[#d97706] font-bold hover:text-[#b45309] mr-1 transition">

                        ساخت حساب کاربری

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- QR Modal --}}
<div id="popupQr"
     class="fixed inset-0 z-[120] bg-[#101d3b]/70 backdrop-blur-sm flex justify-center items-center invisible opacity-0 transition-all duration-300">

    <div class="relative w-11/12 max-w-md min-h-64 bg-white rounded-2xl p-5 flex justify-center items-center scale-95 transition-all duration-300">

        <div id="loading"
             class="absolute inset-0 bg-white rounded-2xl flex justify-center items-center invisible opacity-0 z-10">
        </div>

        <button type="button"
                onclick="scanQr('close')"
                class="absolute top-3 left-3 size-9 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center z-20 hover:bg-orange-100 transition">

            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" d="m18 6-12 12M6 6l12 12"/>
            </svg>

        </button>

        <div id="reader" class="w-full h-full"></div>

    </div>

</div>


<style>
    #reader {
        width: 100%;
        height: 100%;
    }

    #reader video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
    }
</style>


<script>
    // Login Elements

    const phoneNumber = document.getElementById('phoneNumber');
    const message = document.getElementById('message');
    const login = document.getElementById('login');
    const loginWay = document.getElementById('loginWay');

    let countdownTimer = null;


    // Notification

    function showMessage(state) {

        if (state === 'open') {

            message.classList.remove(
                'top-0',
                '-translate-y-full',
                'opacity-0',
                'invisible'
            );

            message.classList.add(
                'top-4',
                'opacity-100',
                'visible'
            );

        }

        if (state === 'close') {

            message.classList.remove(
                'top-4',
                'opacity-100',
                'visible'
            );

            message.classList.add(
                'top-0',
                '-translate-y-full',
                'opacity-0',
                'invisible'
            );

        }

    }


    function notify(content) {

        message.querySelector('.message-content').innerHTML = content;

        showMessage('open');

        setTimeout(() => {
            showMessage('close');
        }, 2500);

    }


    // Send Activation Code

    function sendCode() {

        const countDown = document.getElementById('countDown');
        if (countDown.disabled) return;
        if (!phoneNumber.value.trim()) {

            notify('<span class="text-red-500">لطفاً شماره موبایل خود را وارد کنید.</span>');

            phoneNumber.focus();

            return;

        }

        if (!/^09\d{9}$/.test(phoneNumber.value)) {

            notify('<span class="text-red-500">شماره موبایل معتبر نیست.</span>');

            phoneNumber.focus();

            return;

        }

        countDown.disabled = true;
        countDown.classList.add('opacity-50', 'cursor-not-allowed');
        countDown.innerText = 'در حال ارسال...';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $.ajax({

            url: "{{ route('loginWithActivationCode') }}",
            type: "POST",
            dataType: "json",

            data: {
                phoneNumber: phoneNumber.value
            },

            success: function(data) {
                
                if (!data) {

                    notify('<span class="text-green-600">کد ورود با موفقیت ارسال شد.</span>');

                    counter();

                } else {

                    countDown.disabled = false;
                    countDown.classList.remove('opacity-50', 'cursor-not-allowed');
                    countDown.innerText = 'ارسال کد';

                    notify('<span class="text-red-500">ابتدا در رینسو ثبت‌نام کنید.</span>');

                }

            },

            error: function() {
                countDown.disabled = false;
                countDown.classList.remove('opacity-50', 'cursor-not-allowed');
                countDown.innerText = 'ارسال کد';

                notify('<span class="text-red-500">خطا در ارسال کد ورود!</span>');

            }

        });

    }


    // Countdown

    function counter() {

        const countDown = document.getElementById('countDown');

        if (!countDown) return;

        let count = 120;

        clearInterval(countdownTimer);

        countDown.disabled = true;
        countDown.classList.add('opacity-60', 'cursor-not-allowed');
        countDown.setAttribute('dir', 'ltr');

        countdownTimer = setInterval(() => {

            const minute = Math.floor(count / 60);
            const seconds = count % 60;

            countDown.innerText =
                minute.toString().padStart(2, '0') + ' : ' +
                seconds.toString().padStart(2, '0');

            count--;

            if (count < 0) {

                clearInterval(countdownTimer);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({

                    url: "{{ route('removeActivationCode') }}",
                    type: "POST",
                    dataType: "json",

                    data: {
                        phoneNumber: phoneNumber.value
                    },

                    success: function() {

                        countDown.disabled = false;

                        countDown.classList.remove(
                            'opacity-60',
                            'cursor-not-allowed'
                        );

                        countDown.removeAttribute('dir');
                        countDown.innerText = 'ارسال مجدد';

                    },

                    error: function() {

                        countDown.disabled = false;

                        countDown.classList.remove(
                            'opacity-60',
                            'cursor-not-allowed'
                        );

                        countDown.removeAttribute('dir');
                        countDown.innerText = 'ارسال مجدد';

                        notify('<span class="text-red-500">خطا در دریافت اطلاعات!</span>');

                    }

                });

            }

        }, 1000);

    }


    // Switch to Password Login

    function loginWithPassKey(el) {

        clearInterval(countdownTimer);

        login.innerHTML = `
            <input type="password"
                   class="w-full h-13 px-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#243653] placeholder:text-slate-300 outline-none transition-all focus:border-[#ff9418] focus:ring-4 focus:ring-orange-500/10"
                   name="password"
                   placeholder="کلمه عبور خود را وارد کنید"
                   required>
        `;

        el.remove();

        const span = document.createElement('button');

        span.type = 'button';

        span.className = 'text-sm text-[#101d3b] hover:text-[#d97706] font-bold transition';

        span.innerText = 'ورود با کد پیامکی';

        span.setAttribute('onclick', 'loginWithActivationCode(this)');

        loginWay.appendChild(span);

    }


    // Switch to Activation Code Login

    function loginWithActivationCode(el) {

        clearInterval(countdownTimer);

        login.innerHTML = `
            <div class="w-full flex items-center gap-2">

                <input type="number"
                       class="w-7/12 h-13 px-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#243653] placeholder:text-slate-300 outline-none transition-all focus:border-[#ff9418] focus:ring-4 focus:ring-orange-500/10"
                       name="code"
                       placeholder="کد پیامک شده"
                       required
                       id="code">

                <button type="button"
                        class="flex-1 h-13 rounded-xl bg-[#101d3b] hover:bg-[#1c3158] text-white text-xs sm:text-sm font-bold transition-all"
                        onclick="sendCode()"
                        id="countDown">

                    ارسال کد

                </button>

            </div>
        `;

        el.remove();

        const span = document.createElement('button');

        span.type = 'button';

        span.className = 'text-sm text-[#101d3b] hover:text-[#d97706] font-bold transition';

        span.innerText = 'ورود با رمز عبور';

        span.setAttribute('onclick', 'loginWithPassKey(this)');

        loginWay.appendChild(span);

    }


    // Shop Modal

    document.addEventListener('DOMContentLoaded', function() {

        const shopIcon = document.getElementById('shopIcon');
        const comingSoon = document.getElementById('comingSoon');
        const contentCommingSoon = document.getElementById('contentCommingSoon');
        const closeBtn = document.getElementById('closeModal');
        const confirmBtn = document.getElementById('closeForm');

        if (shopIcon && comingSoon && contentCommingSoon) {

            shopIcon.addEventListener('click', function(e) {

                e.preventDefault();

                comingSoon.classList.remove('hidden');

                contentCommingSoon.classList.remove('scale-95', 'opacity-0');

                contentCommingSoon.classList.add('scale-100', 'opacity-100');

            });

        }

        function closeModal() {

            if (!comingSoon || !contentCommingSoon) return;

            contentCommingSoon.classList.remove('scale-100', 'opacity-100');

            contentCommingSoon.classList.add('scale-95', 'opacity-0');

            comingSoon.classList.add('hidden');

        }

        if (closeBtn) closeBtn.addEventListener('click', closeModal);

        if (confirmBtn) confirmBtn.addEventListener('click', closeModal);

    });


    // Cart Modal

    const cartIcon = document.getElementById('cartIcon');
    const cartModal = document.getElementById('cart');
    const cartContent = document.getElementById('contentCart');
    const closeCartBtn = document.getElementById('closeCart');
    const closeCartForm = document.getElementById('closeFormCart');


    if (cartIcon && cartModal && cartContent) {

        cartIcon.addEventListener('click', function(e) {

            e.preventDefault();

            openCartModal();

        });

    }


    function openCartModal() {

        if (!cartModal || !cartContent) return;

        cartModal.classList.remove('hidden');

        cartContent.classList.remove('scale-95', 'opacity-0');

        cartContent.classList.add('scale-100', 'opacity-100');

    }


    function closeCart() {

        if (!cartModal || !cartContent) return;

        cartContent.classList.remove('scale-100', 'opacity-100');

        cartContent.classList.add('scale-95', 'opacity-0');

        cartModal.classList.add('hidden');

    }


    if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart);

    if (closeCartForm) closeCartForm.addEventListener('click', closeCart);


    // User Options

    function openUserOptions(state) {

        if (typeof popupUser === 'undefined') return;

        if (state === 'open') {

            popupUser.classList.remove('-bottom-full');

            popupUser.classList.add('bottom-0');

        }

        if (state === 'close') {

            popupUser.classList.remove('bottom-0');

            popupUser.classList.add('-bottom-full');

        }

    }

</script>
@endsection