@extends('admin.app.panel')
@section('title', 'ایجاد رستوران برای دیگری')
@section('content')
    <div class="w-full md:w-8/12 mx-auto bg-white flex justify-center p-5">
        <div class="flex flex-col items-center justify-center w-full">
            <h1 class="md:text-2xl font-bold text-base">ابتدا کاربر را ثبت نام کنید</h1>
            <div class="w-full md:w-1/2 mx-auto flex flex-col">
                <form action="{{ route('career.storeUser') }}" class="w-full flex flex-col items-center my-6 gap-2 md:gap-3"
                    method="post" id="signupForm">
                    @csrf
                    <!--<input type="text"-->
                    <!--    class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"-->
                    <!--    name="name" id="name" placeholder="نام" required>-->
                    <!--<input type="text"-->
                    <!--    class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"-->
                    <!--    name="family" id="family" placeholder="نام خانوادگی" required>-->
                    <input type="number"
                        class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                        name="phoneNumber" placeholder="شماره تلفن" required id="phoneNumber">
                    <input type="password"
                        class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                        name="password" placeholder="کلمه عبور" required>
                    <div class="w-full flex flex-row items-center gap-3">
                        <input type="number"
                            class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="code" placeholder="کد" required id="code">
                        <button type="button"
                            class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                            onclick="sendCode()" id="countDown">ارسال کد </button>
                    </div>
                    <button
                        class="focus:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] hover:bg-[#d52b4a] py-2 md:p-3 rounded-[10px] text-white cursor-pointer"
                        onclick="checkAuth(event)">ثبت نام</button>
                </form>
            </div>
        </div>
    </div>

    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                onclick="showMessage('close')" viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>

        </div>
    </div>

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
                            location.assign("{{ route('career.create') }}/"+data.user.id)
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
            countDown.classList.remove('hover:bg-[#d52b4a]')
            countDown.classList.add('hover:bg-[#d52b4a]/50')
            countDown.classList.remove('bg-[#eb3254]')
            countDown.classList.add('bg-[#eb3254]/50')
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
                            countDown.classList.add('bg-[#eb3254]')
                            countDown.classList.remove('bg-[#eb3254]/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-[#d52b4a]')
                            countDown.classList.remove('hover:bg-[#d52b4a]/50')
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
                        console.log(user.validate)
                        if (user.validate) {

                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">کاربر قبلا با این شماره ثبت نام کرده است!</span>

                            `
                            message.children[0].appendChild(element)
                            location.assign("{{ route('career.create') }}/"+user.validate.id)
                            setTimeout(() => {
                                showMessage('close')
                                // location.assign("{{ route('login') }}")
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
    </script>
@endsection
