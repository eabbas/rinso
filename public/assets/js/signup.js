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
        message.classList.add('top-20', 'opacity-100', 'visible');
    }

    if (state === 'close') {
        message.classList.remove('top-20', 'opacity-100', 'visible');
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

    $.ajax({
        url: api+'send_code',
        type: "POST",
        dataType: "json",
        data: {
            phoneNumber: phoneNumber.value
        },

        success: function (data) {
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

        error: function () {

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

            $.ajax({
                url: api+'removeActivationCode',
                type: "POST",
                dataType: "json",
                data: {
                    phoneNumber: phoneNumber.value
                },

                success: function () {

                    countDown.disabled = false;
                    countDown.classList.remove('opacity-60', 'cursor-not-allowed');
                    countDown.removeAttribute('dir');
                    countDown.innerText = 'ارسال مجدد';

                },

                error: function () {

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

    signupButton.disabled = true;

    $.ajax({

        url: api +'checkAuth',
        type: "POST",
        dataType: "json",

        data: {
            phoneNumber: phoneNumber.value,
            code: code.value
        },

        success: function (user) {

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

        error: function () {

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
document.addEventListener('DOMContentLoaded', function () {

    let shopIcon = document.getElementById('shopIcon');
    let comingSoon = document.getElementById('comingSoon');
    let contentCommingSoon = document.getElementById('contentCommingSoon');
    let closeBtn = document.getElementById('closeModal');
    let confirmBtn = document.getElementById('closeForm');

    if (shopIcon && comingSoon && contentCommingSoon) {

        shopIcon.addEventListener('click', function (e) {
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