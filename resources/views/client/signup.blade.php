
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
    <div class="w-full flex flex-col justify-start items-center md:flex-row-reverse">
        <div class="flex justify-center max-sm:h-20 max-md:h-25 md:h-dvh md:w-4/12 lg:w-5/12 xl:w-6/12 bg-(--secondary-text-color)/30">
            <div class="hidden lg:flex flex-col my-12 items-center justify-center">
                <a href="{{ route('home') }}" class="w-full flex flex-row justify-center items-center">
                    <img class="max-md:w-4/12 w-8/12" src="{{ asset('storage/logos/ringaLogo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="w-full md:w-8/12 bg-white flex justify-center md:px-5 pt-10 lg:pt-0">
            <div class="flex flex-col items-center justify-center w-full">
                <h1 class="md:text-2xl font-bold text-base">ثبت نام</h1>
                <div class="w-2/3 md:w-1/2 mx-auto flex flex-col">
                    <form action="{{ route('user.store') }}"
                        class="w-full flex flex-col items-center my-6 gap-2 md:gap-3" method="post" id="signupForm">
                        @csrf
                        <!--<input type="text"-->
                        <!--    class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-(--primary-color) mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"-->
                        <!--    name="name" id="name" placeholder="نام" required>-->
                        <!--<input type="text"-->
                        <!--    class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-(--primary-color) mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"-->
                        <!--    name="family" id="family" placeholder="نام خانوادگی" required>-->
                        <input type="number"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-(--primary-color) mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="phoneNumber" placeholder="شماره تلفن" required id="phoneNumber">
                        <input type="password"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-(--primary-color) mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="password" placeholder="کلمه عبور" required>
                        <input type="text"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-(--primary-color) mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="ref_code" placeholder="کد معرف (اختیاری)" value="{{ isset($slug) ? $slug : '' }}" @if(isset($slug)) readonly @endif>
                        <div class="w-full flex flex-row items-center gap-3">
                            <input type="number"
                                class="w-8/12 p-2 placeholder-gray-400 focus:border-(--primary-color) md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                name="code" placeholder="کد" required id="code">
                            <button type="button"
                                class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-(--hover-primary-color) text-white cursor-pointer"
                                onclick="sendCode()" id="countDown">ارسال کد </button>
                        </div>
                        <div class="w-full flex gap-2 items-center ">
                            <input type="checkbox" name="rules" value="1" class="size-5 max-md:my-1"
                                onchange="checkRule()" id="rule">
                            <label for="rules" class="max-md:text-sm text-[#4B5675] cursor-pointer">قوانین را قبول
                                میکنم
                                <span class="text-(--primary-color) cursor-pointer" onclick="rules('open')">قوانین</span>
                            </label>
                        </div>
                        <!-- rules -->
                        <div class="fixed w-full h-dvh bg-black/50 top-0 right-0 opacity-0 invisible transition-all duration-500 backdrop-blur-xs"
                            id="rules">
                            <div
                                class="w-10/12 lg:w-2/3 h-5/6 lg:h-2/3 bg-white mx-auto mt-10 lg:mt-20 rounded-md transition-all duration-300 delay-200 opacity-0 scale-75 relative">
                                <div
                                    class="w-full py-3 text-center text-md font-medium sticky top-0 right-0 bg-white rounded-md">
                                    قوانین و مقررات
                                </div>
                                <div class="h-5/6 overflow-y-auto px-5"
                                    style="scrollbar-width: thin; scrollbar-color: rgb(180, 180, 180) white;">
                                    <p class="p-5 text-justify text-xs leading-loose lg:text-base">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                                        طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                        لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
                                        ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده،
                                        شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای
                                        طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
                                        در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                                        سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                        سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم
                                        متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                        است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای
                                        شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                        می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و
                                        متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                        الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان
                                        امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان
                                        رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل
                                        دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم متن ساختگی با تولید
                                        سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
                                        بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای
                                        زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                                        طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                                        خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که
                                        تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد
                                        نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود
                                        طراحی اساسا مورد استفاده قرار گیرد.
                                    </p>
                                    <span
                                        class="inline-block float-left mb-5 px-5 py-1 border-1 border-gray-300 rounded-md text-gray-600 cursor-pointer transition-all duration-300 hover:border-black hover:text-black text-xs lg:text-base"
                                        onclick="rules('close')">بستن</span>
                                </div>
                                <span
                                    class="absolute p-1 border-1 border-gray-300 rounded-md text-gray-600 cursor-pointer top-2 right-2 transition-all duration-300 closeButtonXmark"
                                    onclick="rules('close')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                        <path fill="rgb(180, 180, 180)"
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <!-- rules end -->
                        <button
                            class="focus:bg-(--primary-color) transition-all duration-400 text-center w-full bg-(--secondary-text-color)/50 py-2 md:p-3 rounded-[10px] text-white cursor-no-drop"
                            id="signupButton" disabled onclick="checkAuth(event)">ثبت نام</button>
                        <div class="w-full text-center my-1 md:my-4">
                            <span class="text-sm mt-5">
                                از قبل اکانت داری؟
                                <a href="{{ route('login') }}" class="text-(--primary-color)">
                                    ورود
                                </a>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick="scanQr('close')"
                    viewBox="0 0 384 512">
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
        let message = document.getElementById('message')
        let code = document.getElementById('code')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"
        let name = document.getElementById('name')
        let family = document.getElementById('family')

        function sendCode() {

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
                    url: "{{ route('send_code') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                    },
                    success: function(data) {
                        console.log(data)
                        if (!data.flag) {
                            counter()
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
                                <span class="text-red-500">کاربر قبلا با این شماره ثبت نام کرده است!</span>
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
        let countDown = document.getElementById('countDown')

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

        let signupForm = document.getElementById('signupForm')

        function checkAuth(e) {
            e.preventDefault()
            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "" && code.value == "" && name.value == "" && family.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا همه فیلد ها را پر کنید</span>
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
                    url: "{{ route('checkAuth') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'code': code.value
                    },
                    success: function(user) {
                        if (user.validate) {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">شما قبلا با این شماره ثبت نام کرده اید!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('login') }}")
                            }, 2000)
                        } else {
                            if (!user.checkCode) {
                                showMessage('open')
                                element.innerHTML = `
                                    <span>❌</span>
                                    <span class="text-shadw-lg">کد وارد شده نامعتبر!</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                            }
                            if (user.checkCode) {
                                signupForm.submit()
                            }
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

    </script>
@include('footer')
    <script src="{{ asset('assets/js/rules.js') }}"></script>
</body>

</html>
