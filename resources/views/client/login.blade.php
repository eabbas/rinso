
@include('header')

    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>

        </div>
    </div>

    <div class="w-full max-h-[100vh] flex flex-col justify-start items-center md:flex-row-reverse">
        <div class="flex justify-center max-sm:h-30 max-md:h-35 md:h-dvh md:w-4/12 lg:w-5/12 xl:w-6/12 lg:bg-(--secondary-text-color)/30">
            <div class="hidden lg:flex flex-col my-12 items-center justify-center">
                <a href="{{ route('home') }}" class="w-full flex flex-row justify-center items-center">
                    <img class="max-md:w-4/12 w-8/12" src="{{ asset('storage/logos/ringaLogo.png') }}" alt="">

                </a>
            </div>
        </div>
        @if ($message)
            <div class="w-8/12 mx-auto mt-5 lg:mt-0 bg-red-500 rounded-sm py-3 text-white text-center font-bold">
                {{ $message }}
            </div>
        @endif
        <div
            class="w-10/12 md:w-8/12 bg-white h-full mt-10 lg:mt-0 flex flex-col max-md:justify-start justify-center items-center px-4">
            <div class="w-full flex flex-col items-center justify-center md:justify-center lg:w-115 md:w-10/12 px-4">
                <h1 class="text-base md:text-2xl font-bold">ورود</h1>
                <div class="flex flex-col w-full">
                    <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                        method="post">
                        @csrf
                        <input type="number"
                            class="placeholder-gray-400 focus:border-1 focus:border-(--primary-color) p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                            name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" required>


                        <div class="w-full" id="login">
                            <div class="w-full flex flex-row items-center gap-3">
                                <input type="number"
                                    class="w-8/12 p-2 placeholder-gray-400 focus:border-(--primary-color) md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                    name="code" placeholder="کد" required id="code">
                                <button type="button"
                                    class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-(--hover-primary-color) text-white cursor-pointer"
                                    onclick="sendCode()" id="countDown">ارسال کد </button>
                            </div>
                        </div>

                        <div class="w-full flex flex-row items-center justify-between" id="loginWay">
                            <a href="{{ route('forget_password') }}"
                                class="text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                            <span class="text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
                                onclick="loginWithPassKey(this)">ورود با رمز عبور</span>
                        </div>


                        <button
                            class="hover:bg-(--hover-primary-color) transition-all duration-400 text-center w-full bg-(--primary-color) p-2 md:p-3 rounded-[10px] text-white cursor-pointer">ورود</button>
                        <div class="w-full text-center">
                            <span class="text-(--secondary-text-color) mt-1 md:mt-5 max-md:text-sm">
                                هنوز عضو نشدی؟
                                <a href="{{ route('signup') }}" class="text-(--hover-primary-color) mr-2">ثبت نام!</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bg-black/50 w-full h-full top-0 right-0 flex justify-center items-center invisible opacity-0 transition-all duration-300 z-50"
        id="popupQr">
        <div
            class="w-9/12 h-1/2 rounded-sm flex justify-center items-center p-5 transition-all duration-300 scale-95 relative">
            <!--loading scan-->
            <div class="absolute w-full h-full bg-white flex flex-row items-center justify-center invisible opacity-0 rounded-md"
                id="loading"></div>
            <!--loading scan  end-->
            <div class="p-3 rounded-full bg-white absolute top-1 right-1 z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick="scanQr('close')" viewBox="0 0 384 512">
                    <path fill="red"
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                </svg>
            </div>
            <div id="reader"></div>
        </div>
    </div>
    <style>
        #reader {
            width: 100%;
            height: 100%;
        }

        #reader>video {
            width: 100%;
            height: 100%;
        }
    </style>



    <script>
        // login

        let phoneNumber = document.getElementById('phoneNumber')


        let message = document.getElementById('message')
        let code = document.getElementById('code')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        function sendCode() {
            counter()
            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا شماره تلفن را وارد کنید</span>
                    `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('loginWithActivationCode') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                    },
                    success: function(data) {
                        console.log(data)
                        if (!data) {

                            showMessage('open')
                            element.innerHTML = `
                                <span>✅</span>
                                <span class="text-shadw-lg">کد ارسال شد</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        } else {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">ابتدا ثبت نام کنید !</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                // location.assign("{{ route('login') }}")
                            }, 2000)
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }

        let login = document.getElementById('login')
        let loginWay = document.getElementById('loginWay')

        function loginWithPassKey(el) {
            login.innerHTML = `
                                    <input type="password"
                                        class="placeholder-gray-400 focus:border-1 focus:border-(--primary-color) p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                                        name="password" placeholder="کلمه عبور" required>
                                `
            el.parentElement.children[1].remove()
            let span = document.createElement('span')
            span.classList = "text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
            span.setAttribute('onclick', 'loginWithActivationCode(this)')
            span.innerText = "ورود با کد فعال ساز"
            loginWay.appendChild(span)
        }

        function loginWithActivationCode(el) {
            login.innerHTML = `
                                    <div class="w-full flex flex-row items-center gap-3">
                                        <input type="number"
                                            class="w-8/12 p-2 placeholder-gray-400 focus:border-(--primary-color) md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                            name="code" placeholder="کد" required id="code">
                                        <button type="button"
                                            class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-(--hover-primary-color) text-white cursor-pointer"
                                            onclick="sendCode()" id="countDown">ارسال کد </button>
                                    </div>
                                `
            el.parentElement.children[1].remove()
            let span = document.createElement('span')
            span.classList = "text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
            span.setAttribute('onclick', 'loginWithPassKey(this)')
            span.innerText = "ورود با رمز عبور"
            loginWay.appendChild(span)
        }


        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-2/10')
            }
            if (state == 'close') {
                message.classList.remove('top-2/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        function counter() {
            let phoneNumber = document.getElementById('phoneNumber')
            countDown.classList.add('cursor-no-drop')
            countDown.classList.remove('cursor-pointer')
            countDown.classList.remove('hover:bg-(--hover-primary-color)')
            countDown.classList.add('hover:bg-(--hover-primary-color)/50')
            countDown.classList.remove('bg-(--primary-color)')
            countDown.classList.add('bg-(--primary-color)/50')
            countDown.setAttribute('disabled', true)
            countDown.setAttribute('dir', 'ltr')
            let count = 120
            let result = setInterval(() => {
                let minute = Math.floor(count / 60)
                let seconds = count % 60
                count -= 1
                if (count < 0) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('removeActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value
                        },
                        success: function(data) {
                            console.log(data)
                            countDown.classList.remove('cursor-no-drop')
                            countDown.classList.add('bg-(--primary-color)')
                            countDown.classList.remove('bg-(--primary-color)/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-(--hover-primary-color)')
                            countDown.classList.remove('hover:bg-(--hover-primary-color)/50')
                            countDown.removeAttribute('disabled')
                            countDown.removeAttribute('dir')
                            countDown.innerText = "ارسال مجدد"
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                                <span>❌</span>
                                <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2500)
                        }
                    })
                    clearInterval(result)
                }
                countDown.innerText = minute.toString().padStart(2, "0") + " : " + seconds.toString().padStart(2,
                    "0");
            }, 1000)
        }

        // login end




        document.addEventListener('DOMContentLoaded', function() {
            let shopIcon = document.getElementById('shopIcon');
            let comingSoon = document.getElementById('comingSoon');
            let contentCommingSoon = document.getElementById('contentCommingSoon');
            let closeBtn = document.getElementById('closeModal');
            let confirmBtn = document.getElementById('closeForm');

            if (shopIcon) {
                shopIcon.addEventListener('click', function(e) {
                    e.preventDefault()
                    openModal()
                })
            }

            function openModal() {
                comingSoon.classList.remove('hidden')
                contentCommingSoon.classList.remove('scale-95', 'opacity-0')
                contentCommingSoon.classList.add('scale-100', 'opacity-100')
            }

            function closeModal() {
                contentCommingSoon.classList.remove('scale-100', 'opacity-100')
                contentCommingSoon.classList.add('scale-95', 'opacity-0')
                comingSoon.classList.add('hidden')

            }

            if (closeBtn) closeBtn.addEventListener('click', closeModal)
            if (confirmBtn) confirmBtn.addEventListener('click', closeModal)

        })

        let cartIcon = document.getElementById('cartIcon');
        let cartModal = document.getElementById('cart');
        let cartContent = document.getElementById('contentCart');
        let closeCartBtn = document.getElementById('closeCart');
        let closeCartForm = document.getElementById('closeFormCart');
        // کد مربوط به سبد خرید
        if (cartIcon) {
            cartIcon.addEventListener('click', function(e) {
                e.preventDefault();
                openCartModal();
            });
        }

        function openCartModal() {
            cartModal.classList.remove('hidden')
            cartContent.classList.remove('scale-95', 'opacity-0')
            cartContent.classList.add('scale-100', 'opacity-100')
        }

        function closeCart() {
            cartContent.classList.remove('scale-100', 'opacity-100')
            cartContent.classList.add('scale-95', 'opacity-0')
            cartModal.classList.add('hidden')
        }
        if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart)
        if (closeCartForm) closeCartForm.addEventListener('click', closeCart)




        function openUserOptions(state) {
            if (state == 'open') {
                popupUser.classList.remove('-bottom-full')
                popupUser.classList.add('bottom-0')
            }
            if (state == 'close') {
                popupUser.classList.remove('bottom-0')
                popupUser.classList.add('-bottom-full')
            }
        }
    </script>
    @include('footer')
</body>

</html>
