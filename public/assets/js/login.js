// Login Elements

const phoneNumber = document.getElementById('phoneNumber')
const message = document.getElementById('message')
const login = document.getElementById('login')
const loginWay = document.getElementById('loginWay')

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
            'top-20',
            'opacity-100',
            'visible'
        );

    }

    if (state === 'close') {

        message.classList.remove(
            'top-20',
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

   

    $.ajax({
        url: api +'loginWithActivationCode',
        type: "POST",
        dataType: "json",

        data: {
            phoneNumber: phoneNumber.value
        },

        success: function (data) {

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

        error: function () {
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

        countDown.innerText = minute.toString().padStart(2, '0') + ' : ' + seconds.toString().padStart(2, '0');

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

                success: function () {

                    countDown.disabled = false;

                    countDown.classList.remove(
                        'opacity-60',
                        'cursor-not-allowed'
                    );

                    countDown.removeAttribute('dir');
                    countDown.innerText = 'ارسال مجدد';

                },

                error: function () {

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
                   required>`

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

document.addEventListener('DOMContentLoaded', function () {

    const shopIcon = document.getElementById('shopIcon');
    const comingSoon = document.getElementById('comingSoon');
    const contentCommingSoon = document.getElementById('contentCommingSoon');
    const closeBtn = document.getElementById('closeModal');
    const confirmBtn = document.getElementById('closeForm');

    if (shopIcon && comingSoon && contentCommingSoon) {

        shopIcon.addEventListener('click', function (e) {

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

    cartIcon.addEventListener('click', function (e) {

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