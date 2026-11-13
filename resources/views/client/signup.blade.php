@include('header')

{{-- Notification --}}
<div id="message"
     class="fixed top-0 right-1/2 translate-x-1/2 -translate-y-full opacity-0 invisible z-[100] w-11/12 sm:w-2/3 lg:w-1/3 bg-white rounded-2xl shadow-2xl border-1 border-slate-200 transition-all duration-500">

    <div class="flex items-center gap-3 p-4">
        <div class="size-9 shrink-0 rounded-xl bg-orange-50 text-[#E9820D] flex items-center justify-center">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        </div>

        <div class="message-content flex-1 text-sm font-bold text-center text-slate-700"></div>

        <button type="button" onclick="showMessage('close')" class="text-slate-400 hover:text-red-500 transition">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" d="m18 6-12 12M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>


{{-- Main --}}
<div class="min-h-[85dvh] w-full flex flex-col md:flex-row-reverse bg-[#F5F6F8]">

    {{-- Branding Panel --}}
    <div class="relative overflow-hidden md:w-5/12 lg:w-1/2 bg-[#0E1D35] text-white">

        {{-- Background Decoration --}}
        <div class="absolute -top-36 -right-36 size-[28rem] rounded-full bg-[#FD9619]/15 blur-[100px]"></div>
        <div class="absolute -bottom-40 -left-20 size-[28rem] rounded-full bg-[#FD9619]/10 blur-[110px]"></div>

        <div class="absolute inset-0 opacity-[0.05]"
             style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 25px 25px;"></div>

        <div class="relative z-10 h-full flex flex-col items-center justify-center px-8 py-10 md:py-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="mb-10 bg-white rounded-2xl px-5 py-3 shadow-xl shadow-black/10">

                <img src="{{ asset('/logo/rinso.png') }}"
                     alt="Rinso"
                     class="w-32 sm:w-40 object-contain">

            </a>

            <div class="hidden md:flex flex-col items-center text-center max-w-md">

                {{-- Illustration --}}
                <div class="relative mb-12">

                    <div class="size-48 lg:size-60 rounded-[3rem] bg-white/[0.04] border-1 border-white/10 backdrop-blur-xl flex items-center justify-center rotate-6">

                        <div class="size-36 lg:size-44 rounded-[2.5rem] bg-gradient-to-br from-[#FD9619] to-[#E9820D] shadow-2xl shadow-orange-500/20 -rotate-6 flex items-center justify-center">

                            <svg class="size-20 lg:size-24" fill="none" stroke="white" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="4" stroke-width="1.3"/>
                                <circle cx="12" cy="9" r="2.5" stroke-width="1.5"/>
                                <path d="M7 19c0-2.8 2.2-5 5-5s5 2.2 5 5" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>

                        </div>
                    </div>

                    <div class="absolute -bottom-5 -left-7 size-14 rounded-2xl bg-[#1B2D49] border-1 border-white/10 backdrop-blur-lg flex items-center justify-center shadow-xl">
                        <svg class="size-7 text-[#FD9619]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v18m9-9H3"/>
                        </svg>
                    </div>

                    <div class="absolute -top-5 -right-7 size-12 rounded-2xl bg-[#1B2D49] border-1 border-white/10 flex items-center justify-center shadow-xl">
                        <svg class="size-6 text-[#FD9619]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 12h16M12 4v16"/>
                        </svg>
                    </div>

                </div>

                <h1 class="text-2xl lg:text-3xl font-black leading-relaxed">
                    حضورت رو در دنیای دیجیتال بساز!
                </h1>

                <p class="text-sm lg:text-base text-slate-300/70 leading-9 mt-5">
                    با رینسو یک صفحه اختصاصی داشته باش، شبکه‌های اجتماعی، لینک‌ها و راه‌های ارتباطی خودت رو در یک مکان جمع کن و راحت‌تر با مخاطبات ارتباط بگیر.
                </p>

                <div class="flex items-center gap-3 mt-10 px-5 py-3 rounded-full bg-white/[0.06] border-1 border-white/10">

                    <span class="size-2 rounded-full bg-[#FD9619] shadow-[0_0_12px_#FD9619]"></span>
                    <span class="text-xs text-slate-300">یک لینک، تمام راه‌های ارتباطی تو</span>

                </div>

            </div>

            <p class="hidden md:block absolute bottom-7 text-xs text-slate-500 tracking-wider">
                RINSO | DIGITAL IDENTITY PLATFORM
            </p>

        </div>
    </div>


    {{-- Registration Form --}}
    <div class="w-full md:w-7/12 lg:w-1/2 flex justify-center items-center px-5 py-10 sm:px-10 lg:px-16">

        <div class="w-full max-w-md">

            {{-- Heading --}}
            <div class="mb-8">

                <div class="inline-flex items-center gap-2 bg-[#FFF4E7] text-[#B9680B] px-3 py-2 rounded-lg text-xs font-bold mb-5 border-1 border-[#FAD7AE]">
                    <span class="size-2 rounded-full bg-[#FD9619]"></span>
                    شروع مسیر شما در رینسو
                </div>

                <h2 class="text-2xl sm:text-3xl font-black text-[#0E1D35]">
                    ساخت حساب کاربری
                </h2>

                <p class="text-sm text-slate-400 mt-3 leading-7">
                    برای ساخت صفحه اختصاصی خودت، اطلاعات زیر رو وارد کن.
                </p>

            </div>


            <form action="{{ route('user.store') }}"
                  method="post"
                  id="signupForm"
                  class="flex flex-col gap-5">

                @csrf

                {{-- Phone --}}
                <div class="flex flex-col gap-2">

                    <label for="phoneNumber" class="text-sm font-bold text-[#24344C]">
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
                               name="phoneNumber"
                               id="phoneNumber"
                               placeholder="مثلاً 09123456789"
                               required
                               class="w-full h-13 pr-12 pl-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#24344C] placeholder:text-slate-300 outline-none transition-all focus:border-[#FD9619] focus:ring-4 focus:ring-[#FD9619]/15">

                    </div>
                </div>


                {{-- Password --}}
                <div class="flex flex-col gap-2">

                    <label for="password" class="text-sm font-bold text-[#24344C]">
                        کلمه عبور
                    </label>

                    <div class="relative">

                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="4" y="10" width="16" height="11" rx="2" stroke-width="1.7"/>
                                <path stroke-width="1.7" stroke-linecap="round" d="M8 10V7a4 4 0 0 1 8 0v3"/>
                            </svg>
                        </span>

                        <input type="password"
                               name="password"
                               id="password"
                               placeholder="کلمه عبور خود را وارد کنید"
                               required
                               class="w-full h-13 pr-12 pl-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#24344C] placeholder:text-slate-300 outline-none transition-all focus:border-[#FD9619] focus:ring-4 focus:ring-[#FD9619]/15">

                    </div>
                </div>


                {{-- Referral --}}
                <div class="flex flex-col gap-2">

                    <label for="ref_code" class="text-sm font-bold text-[#24344C]">
                        کد معرف
                        <span class="text-xs font-normal text-slate-400 mr-1">(اختیاری)</span>
                    </label>

                    <input type="text"
                           name="ref_code"
                           id="ref_code"
                           placeholder="کد معرف خود را وارد کنید"
                           value="{{ isset($slug) ? $slug : '' }}"
                           @if(isset($slug)) readonly @endif
                           class="w-full h-13 px-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#24344C] placeholder:text-slate-300 outline-none transition-all focus:border-[#FD9619] focus:ring-4 focus:ring-[#FD9619]/15 @if(isset($slug)) opacity-70 @endif">

                </div>


                {{-- Verification --}}
                <div class="flex flex-col gap-2">

                    <label for="code" class="text-sm font-bold text-[#24344C]">
                        تأیید شماره موبایل
                    </label>

                    <div class="flex gap-2">

                        <input type="number"
                               name="code"
                               id="code"
                               placeholder="کد پیامک شده"
                               required
                               class="w-7/12 h-13 px-4 rounded-xl border-1 border-slate-200 bg-white text-sm text-[#24344C] placeholder:text-slate-300 outline-none transition-all focus:border-[#FD9619] focus:ring-4 focus:ring-[#FD9619]/15">

                        <button type="button"
                                onclick="sendCode()"
                                id="countDown"
                                class="flex-1 h-13 rounded-xl bg-[#0E1D35] hover:bg-[#1B2D49] text-white text-xs sm:text-sm font-bold transition-all shadow-lg shadow-slate-900/10">
                            ارسال کد
                        </button>

                    </div>

                    <p class="text-[11px] text-slate-400 mt-1">
                        برای تأیید شماره موبایل، کد ارسال شده را وارد کن.
                    </p>

                </div>


                {{-- Rules --}}
                <div class="flex flex-wrap items-center gap-2 mt-1">

                    <input type="checkbox"
                           name="rules"
                           value="1"
                           id="rule"
                           onchange="checkRule()"
                           class="size-4 accent-[#FD9619] cursor-pointer">

                    <label for="rule" class="text-xs sm:text-sm text-slate-500 cursor-pointer">
                        قوانین و مقررات رینسو را می‌پذیرم.
                    </label>

                    <button type="button"
                            onclick="rules('open')"
                            class="text-xs sm:text-sm font-bold text-[#B9680B] hover:text-[#E9820D] transition">
                        مطالعه قوانین
                    </button>

                </div>


                {{-- Rules Modal --}}
                <div id="rules"
                     class="fixed inset-0 z-[110] bg-[#0E1D35]/75 backdrop-blur-sm opacity-0 invisible transition-all duration-300">

                    <div class="w-11/12 max-w-2xl h-[80dvh] bg-white mx-auto mt-[10dvh] rounded-2xl shadow-2xl relative flex flex-col overflow-hidden opacity-0 scale-95 transition-all duration-300 delay-100">

                        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100 bg-white">

                            <div>
                                <h3 class="font-black text-[#0E1D35]">
                                    قوانین و مقررات
                                </h3>
                                <p class="text-xs text-slate-400 mt-1">شرایط استفاده از خدمات رینسو</p>
                            </div>

                            <button type="button"
                                    onclick="rules('close')"
                                    class="size-9 rounded-xl bg-slate-50 hover:bg-red-50 hover:text-red-500 text-slate-500 flex items-center justify-center transition">

                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" stroke-linecap="round" d="m18 6-12 12M6 6l12 12"/>
                                </svg>

                            </button>

                        </div>

                        <div class="flex-1 overflow-y-auto p-5 sm:p-7 text-sm text-slate-600 leading-9 text-justify">

                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>

                            <p class="mt-5">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>

                            <p class="mt-5">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>

                        </div>

                        <div class="p-4 border-t border-slate-100">
                            <button type="button"
                                    onclick="rules('close')"
                                    class="w-full py-3 rounded-xl bg-[#0E1D35] hover:bg-[#1B2D49] text-white text-sm font-bold transition">
                                متوجه شدم
                            </button>
                        </div>

                    </div>

                </div>


                {{-- Submit --}}
                <button type="submit"
                        id="signupButton"
                        disabled
                        onclick="checkAuth(event)"
                        class="w-full h-13 rounded-xl bg-[#FD9619] hover:bg-[#E9820D] text-white text-sm font-bold transition-all shadow-lg shadow-orange-500/20 disabled:bg-slate-200 disabled:text-slate-400 disabled:shadow-none disabled:cursor-not-allowed">

                    ایجاد حساب کاربری

                </button>


                {{-- Login --}}
                <div class="text-center mt-2">

                    <span class="text-sm text-slate-400">
                        قبلاً حساب کاربری ساختی؟
                    </span>

                    <a href="{{ route('login') }}"
                       class="text-sm text-[#0E1D35] font-bold hover:text-[#E9820D] mr-1 transition">
                        وارد شو
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- QR Modal --}}
<div id="popupQr"
     class="fixed inset-0 z-[120] bg-[#0E1D35]/75 backdrop-blur-sm flex justify-center items-center invisible opacity-0 transition-all duration-300">

    <div class="relative w-11/12 max-w-md min-h-64 bg-white rounded-2xl p-5 flex justify-center items-center scale-95 transition-all duration-300">

        <div id="loading"
             class="absolute inset-0 bg-white rounded-2xl flex justify-center items-center invisible opacity-0 z-10">
        </div>

        <button type="button"
                onclick="scanQr('close')"
                class="absolute top-3 left-3 size-9 bg-red-50 text-red-500 rounded-xl flex items-center justify-center z-20 hover:bg-red-100 transition">

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
    const message = document.getElementById('message');
    const code = document.getElementById('code');
    const phoneNumber = document.getElementById('phoneNumber');
    const signupForm = document.getElementById('signupForm');
    const countDown = document.getElementById('countDown');
    const signupButton = document.getElementById('signupButton');

    let countdownTimer = null;


    // Notification
    function showMessage(state) {

        if (state === 'open') {
            message.classList.remove('top-0', '-translate-y-full', 'opacity-0', 'invisible');
            message.classList.add('top-4', 'opacity-100', 'visible');
        }

        if (state === 'close') {
            message.classList.remove('top-4', 'opacity-100', 'visible');
            message.classList.add('top-0', '-translate-y-full', 'opacity-0', 'invisible');
        }

    }


    function notify(content) {
        message.querySelector('.message-content').innerHTML = content;
        showMessage('open');

        setTimeout(() => {
            showMessage('close');
        }, 2500);
    }


    // Send Verification Code
    function sendCode() {

        if (!phoneNumber.value.trim()) {
            notify('<span class="text-red-500">لطفاً شماره موبایل خود را وارد کنید.</span>');
            phoneNumber.focus();
            return;
        }

        if (!/^09\d{9}$/.test(phoneNumber.value)) {
            notify('<span class="text-red-500">شماره موبایل معتبر نیست.</span>');
            return;
        }

        if (countDown.disabled) return;
        countDown.disabled = true;
        countDown.classList.add('opacity-60', 'cursor-not-allowed');
        countDown.innerText = 'در حال ارسال...';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url: "{{ route('send_code') }}",
            type: "POST",
            dataType: "json",
            data: {
                phoneNumber: phoneNumber.value
            },

            success: function(data) {
                if (data.flag) {

                    countDown.disabled = false;
                    countDown.classList.remove('opacity-60', 'cursor-not-allowed');
                    countDown.innerText = 'ارسال کد';

                    notify('<span class="text-red-500">این شماره قبلاً ثبت‌نام کرده است.</span>');

                } else {

                    notify('<span class="text-green-600">کد تأیید با موفقیت ارسال شد.</span>');
                    counter();

                }
                // if (!data.flag) {

                //     notify('<span class="text-green-600">کد تأیید با موفقیت ارسال شد.</span>');
                //     counter();

                // } else {

                //     countDown.disabled = false;
                //     countDown.innerText = 'ارسال کد';

                //     notify('<span class="text-red-500">این شماره قبلاً ثبت‌نام کرده است.</span>');

                // }

            },

            error: function() {

                countDown.disabled = false;
                countDown.innerText = 'ارسال کد';

                notify('<span class="text-red-500">خطا در ارسال کد تأیید!</span>');

            }

        });

    }


    // Countdown
    function counter() {

        let count = 120;

        countDown.disabled = true;
        countDown.classList.add('opacity-60', 'cursor-not-allowed');
        countDown.setAttribute('dir', 'ltr');

        clearInterval(countdownTimer);

        countdownTimer = setInterval(() => {

            let minute = Math.floor(count / 60);
            let seconds = count % 60;

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
                        countDown.classList.remove('opacity-60', 'cursor-not-allowed');
                        countDown.removeAttribute('dir');
                        countDown.innerText = 'ارسال مجدد';

                    },

                    error: function() {

                        countDown.disabled = false;
                        countDown.classList.remove('opacity-60', 'cursor-not-allowed');
                        countDown.removeAttribute('dir');
                        countDown.innerText = 'ارسال مجدد';

                        notify('<span class="text-red-500">خطا در دریافت اطلاعات!</span>');

                    }

                });

            }

        }, 1000);

    }


    // Check Verification Code
    function checkAuth(e) {

        e.preventDefault();

        const password = document.getElementById('password');

        if (!phoneNumber.value.trim() || !password.value.trim() || !code.value.trim()) {

            notify('<span class="text-red-500">لطفاً تمام فیلدهای ضروری را تکمیل کنید.</span>');
            return;

        }

        if (!document.getElementById('rule').checked) {

            notify('<span class="text-red-500">لطفاً قوانین را بپذیرید.</span>');
            return;

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        signupButton.disabled = true;

        $.ajax({

            url: "{{ route('checkAuth') }}",
            type: "POST",
            dataType: "json",

            data: {
                phoneNumber: phoneNumber.value,
                code: code.value
            },

            success: function(user) {

                if (user.validate) {

                    notify('<span class="text-red-500">این شماره قبلاً ثبت‌نام کرده است.</span>');

                    setTimeout(() => {
                        location.assign("{{ route('login') }}");
                    }, 2000);

                } else if (!user.checkCode) {

                    notify('<span class="text-red-500">کد تأیید وارد شده نامعتبر است.</span>');
                    signupButton.disabled = false;

                } else {

                    signupForm.submit();

                }

            },

            error: function() {

                notify('<span class="text-red-500">خطا در بررسی اطلاعات!</span>');
                signupButton.disabled = false;

            }

        });

    }


    // Rules and Signup Button
    function checkRule() {

        signupButton.disabled = !document.getElementById('rule').checked;

    }


    // Shop Modal
    document.addEventListener('DOMContentLoaded', function() {

        let shopIcon = document.getElementById('shopIcon');
        let comingSoon = document.getElementById('comingSoon');
        let contentCommingSoon = document.getElementById('contentCommingSoon');
        let closeBtn = document.getElementById('closeModal');
        let confirmBtn = document.getElementById('closeForm');

        if (shopIcon && comingSoon && contentCommingSoon) {

            shopIcon.addEventListener('click', function(e) {
                e.preventDefault();
                openModal();
            });

        }

        function openModal() {

            if (!comingSoon || !contentCommingSoon) return;

            comingSoon.classList.remove('hidden');
            contentCommingSoon.classList.remove('scale-95', 'opacity-0');
            contentCommingSoon.classList.add('scale-100', 'opacity-100');

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
    let cartIcon = document.getElementById('cartIcon');
    let cartModal = document.getElementById('cart');
    let cartContent = document.getElementById('contentCart');
    let closeCartBtn = document.getElementById('closeCart');
    let closeCartForm = document.getElementById('closeFormCart');


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

</script>


@include('footer')

<script src="{{ asset('assets/js/rules.js') }}"></script>

</body>
</html>