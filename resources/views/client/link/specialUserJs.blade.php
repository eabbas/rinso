<script>
    let flag = "{{ Auth::check() }}"
    let userId = "{{ Auth::id() }}";
    // login
    let authenticationDiv = document.getElementById('authenticationDiv')

    let countDown = document.getElementById('countDown')
    let phoneNumber = document.getElementById('phoneNumber')


    let message = document.getElementById('message')
    let element = document.createElement('div')
    element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

    let loginForm = document.getElementById('loginForm')

    let code = document.getElementById('code')

    console.log(typeof(flag))


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

    function check(ev) {
        let password = document.getElementById('password')
        let addCustomer = document.getElementById('addCustomer')
        // console.log(password)
        ev.preventDefault()
        if (password) {
            if (phoneNumber.value == "" || password.value == "") {
                showMessage('open')
                element.innerHTML = `
                            <span>لطفا همه فیلد ها را پر کنید</span>
                            <span class="text-red-500">!</span>
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
                    {{--url: "{{ route('user.checkFromMenu') }}",--}}
                    url: "{{ url('api/user/checkFromMenu') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'password': password.value
                    },
                    success: function(data) {
                        if (data == "userNotFound") {
                            showMessage('open')
                            element.innerHTML = `
                                    <span>ابتدا ثبت نام کنید</span>
                                `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('signup') }}")
                            }, 2000)
                        }
                        if (data == "incorrectPassword") {

                            showMessage('open')
                            element.innerHTML = `
                                <span>رمز عبور نادرست است</span>
                                <span class="text-red-500">!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        }
                        if (data.id) {
                            showMessage('open')
                            element.innerHTML = `
                                <span> خوش اومدی ${data.name ?? 'کاربر'} ${data.family ?? 'رینگا'} عزیز</span>
                            `
                            flag = true
                            addCustomer.innerHTML = ""
                            if (flag && ({{ $page->user->id }} != data.id)) {
                                addCustomer.innerHTML =
                                    `<div class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this , 'page' )">عضویت در باشگاه مشتریان</div>`
                            } else {
                                if (flag && ({{ $page->user->id }} == data.id)) {
                                    addCustomer.innerHTML = `<a href="{{ route('special-user.index', [$page->id]) }}" class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="specialCustomers(this , '${data.type}')">
                                       باشگاه مشتریان
                              </a>`
                                }
                            }


                            userId = data.id
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                closeLoginForm()
                            }, 2000)
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            }
        }
        if (!password) {
            if (phoneNumber.value == "" || code.value == "") {
                showMessage('open')
                element.innerHTML = `
                            <span>لطفا همه فیلد ها را پر کنید</span>
                            <span class="text-red-500">!</span>
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
                    url: "{{ route('checkActivationCode') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'code': code.value
                    },
                    success: function(data) {
                        console.log(data)
                        if (!data.checkCode) {
                            showMessage('open')
                            element.innerHTML = `
                                    <span>کد وارد شده نامعتبر !</span>
                                `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        }
                        if (!data.validate) {
                            showMessage('open')
                            element.innerHTML = `
                                    <span>ابتدا ثبت نام کنید</span>
                                `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('signup') }}")
                            }, 2000)
                        }
                        if (data.validate && data.checkCode) {
                            showMessage('open')
                            element.innerHTML = `
                                <span> خوش اومدی ${data.validate.name ?? 'کاربر'} ${data.validate.family ?? 'رینگا'} عزیز</span>
                            `
                            flag = true

                            addCustomer.innerHTML = ""
                            if (flag && ({{ $page->user->id }} != data.id)) {
                                addCustomer.innerHTML =
                                    `<div class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this, 'page')">عضویت در باشگاه مشتریان</div>`
                            } else {
                                if (flag && ({{ $page->user->id }} == data.id)) {
                                    addCustomer.innerHTML = `<a href="{{ route('special-user.index', [$page->id]) }}" class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="specialCustomers(this)">
                                       باشگاه مشتریان
                              </a>`
                                }
                            }

                            userId = data.validate.id
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                closeLoginForm()
                            }, 2000)
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            }
        }



        {{-- addCustomer.innerHTML="" --}}
        {{-- if(check && ({{$page->user->id}} != "{{Auth::id()}}")){ --}}
        {{--    addCustomer.innerHTML=`<div class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this , 'page' )">عضویت در باشگاه مشتریان</div>` --}}
        {{-- }else{ --}}
        {{--    if(check && ({{$page->user->id}} == "{{Auth::id()}}")) --}}
        {{--    { --}}
        {{--        addCustomer.innerHTML = `<a href="{{ route('special-user.index', [$page->id]) }}" class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="specialCustomers(this)"> --}}
        {{--               باشگاه مشتریان --}}
        {{--      </a>` --}}
        {{--    } --}}
        {{-- } --}}










        {{-- let password = document.getElementById('password') --}}
        {{-- console.log(password) --}}
        {{-- ev.preventDefault() --}}
        {{-- if(password){ --}}
        {{--    if (phoneNumber.value == "" || password.value == "") { --}}
        {{--        showMessage('open') --}}
        {{--        element.innerHTML = ` --}}
        {{--                    <span>لطفا همه فیلد ها را پر کنید</span> --}}
        {{--                    <span class="text-red-500">!</span> --}}
        {{--                ` --}}
        {{--        message.children[0].appendChild(element) --}}
        {{--        setTimeout(() => { --}}
        {{--            showMessage('close') --}}
        {{--        }, 2000) --}}
        {{--    } else { --}}
        {{--        $.ajaxSetup({ --}}
        {{--            headers: { --}}
        {{--                'X-CSRF-TOKEN': "{{ csrf_token() }}" --}}
        {{--            } --}}
        {{--        }) --}}
        {{--        $.ajax({ --}}
        {{--            url: "{{ route('user.checkFromMenu') }}", --}}
        {{--            type: "POST", --}}
        {{--            dataType: "json", --}}
        {{--            data: { --}}
        {{--                'phoneNumber': phoneNumber.value, --}}
        {{--                'password': password.value --}}
        {{--            }, --}}
        {{--            success: function (data) { --}}

        {{--                if (data == "incorrectPassword") { --}}

        {{--                    showMessage('open') --}}
        {{--                    element.innerHTML = ` --}}
        {{--                        <span>رمز عبور نادرست است</span> --}}
        {{--                        <span class="text-red-500">!</span> --}}
        {{--                    ` --}}
        {{--                    message.children[0].appendChild(element) --}}
        {{--                    setTimeout(() => { --}}
        {{--                        showMessage('close') --}}
        {{--                    }, 2000) --}}
        {{--                } else { --}}
        {{--                    showMessage('open') --}}
        {{--                    element.innerHTML = ` --}}
        {{--                        <span> خوش اومدی ${data.name} ${data.family} عزیز</span> --}}
        {{--                    ` --}}
        {{--                    flag=true --}}
        {{--                    userId = data.id --}}
        {{--                    message.children[0].appendChild(element) --}}
        {{--                    setTimeout(() => { --}}
        {{--                        showMessage('close') --}}
        {{--                        closeLoginForm() --}}
        {{--                    }, 2000) --}}
        {{--                } --}}
        {{--            }, --}}
        {{--            error: function () { --}}
        {{--                showMessage('open') --}}
        {{--                element.innerHTML = ` --}}
        {{--                <span>خطا در دریافت اطلاعات</span> --}}
        {{--                <span class="text-red-500">!</span> --}}
        {{--                ` --}}
        {{--                message.children[0].appendChild(element) --}}
        {{--                setTimeout(() => { --}}
        {{--                    showMessage('close') --}}
        {{--                }, 2000) --}}
        {{--            } --}}
        {{--        }) --}}
        {{--    } --}}
        {{-- } --}}
        {{-- if(!password){ --}}
        {{--    if (phoneNumber.value == "" || code.value == "") { --}}
        {{--        showMessage('open') --}}
        {{--        element.innerHTML = ` --}}
        {{--                    <span>لطفا همه فیلد ها را پر کنید</span> --}}
        {{--                    <span class="text-red-500">!</span> --}}
        {{--                ` --}}
        {{--        message.children[0].appendChild(element) --}}
        {{--        setTimeout(() => { --}}
        {{--            showMessage('close') --}}
        {{--        }, 2000) --}}
        {{--    } else { --}}
        {{--        $.ajaxSetup({ --}}
        {{--            headers: { --}}
        {{--                'X-CSRF-TOKEN': "{{ csrf_token() }}" --}}
        {{--            } --}}
        {{--        }) --}}
        {{--        $.ajax({ --}}
        {{--            url: "{{ route('checkActivationCode') }}", --}}
        {{--            type: "POST", --}}
        {{--            dataType: "json", --}}
        {{--            data : { --}}
        {{--                'phoneNumber': phoneNumber.value, --}}
        {{--                'code': code.value --}}
        {{--            }, --}}
        {{--            success: function (data){ --}}
        {{--                console.log(data) --}}
        {{--                showMessage('open') --}}

        {{--                element.innerHTML = ` --}}
        {{--                        <span> خوش اومدی ${data.validate.name} ${data.validate.family} عزیز</span> --}}
        {{--                    ` --}}
        {{--                flag=true --}}
        {{--                userId = data.validate.id --}}
        {{--                message.children[0].appendChild(element) --}}
        {{--                setTimeout(() => { --}}
        {{--                    showMessage('close') --}}
        {{--                    closeLoginForm() --}}
        {{--                }, 2000) --}}
        {{--            }, --}}
        {{--            error: function (){ --}}
        {{--                showMessage('open') --}}
        {{--                element.innerHTML = ` --}}
        {{--                <span>خطا در دریافت اطلاعات</span> --}}
        {{--                <span class="text-red-500">!</span> --}}
        {{--                ` --}}
        {{--                message.children[0].appendChild(element) --}}
        {{--                setTimeout(() => { --}}
        {{--                    showMessage('close') --}}
        {{--                }, 2000) --}}
        {{--            } --}}
        {{--        }) --}}
        {{--    } --}}
        {{-- } --}}

    }

    function closeLoginForm() {
        authenticationDiv.classList.add('invisible')
        authenticationDiv.classList.add('opacity-0')
        authenticationDiv.children[0].classList.add('scale-95')
    }


    let login = document.getElementById('login')
    let loginWay = document.getElementById('loginWay')

    function loginWithPassKey(el) {
        login.innerHTML = `
                                    <input type="password"
                                        class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                                        name="password" id="password" placeholder="کلمه عبور" required>
                                `
        el.parentElement.children[1].remove()
        let span = document.createElement('span')
        span.classList = "text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
        span.setAttribute('onclick', 'loginWithActivationCode(this)')
        span.innerText = "ورود با کد فعال ساز"
        loginWay.appendChild(span)
    }

    function loginWithActivationCode(el) {
        login.innerHTML = `
                                    <div class="w-full flex flex-row items-center gap-3">
                                        <input type="number"
                                            class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                            name="code" placeholder="کد" required id="code">
                                        <button type="button"
                                            class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                                            onclick="sendCode()" id="countDown">ارسال کد </button>
                                    </div>
                                `
        el.parentElement.children[1].remove()
        let span = document.createElement('span')
        span.classList = "text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
        span.setAttribute('onclick', 'loginWithPassKey(this)')
        span.innerText = "ورود با رمز عبور"
        loginWay.appendChild(span)
    }


    function showMessage(state) {
        if (state == 'open') {
            message.classList.remove('top-0')
            message.classList.remove('opacity-0')
            message.classList.remove('invisible')
            message.classList.add('top-1/10')
        }
        if (state == 'close') {
            message.classList.remove('top-1/10')
            message.classList.add('top-0')
            message.classList.add('opacity-0')
            message.classList.add('invisible')
        }
    }

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


    // login


    function closeLoginBox() {
        authenticationDiv.classList.add('invisible')
        authenticationDiv.classList.add('opacity-0')
    }


    {{-- "{{ Auth::check() }}" --}}

    function addSpecialCustomer(el, type) {
        // console.log("{{ $page->id }}")
        let text = el.innerText
        if (flag) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            {{-- url: "{{ route('special-user.store') }}", --}}

            $.ajax({
                url: "{{ url('/api/special-user-store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'page_id': "{{ $page->id }}",
                    'user_id': userId,
                    'type': type
                },
                success: function(data) {
                    console.log(data)
                    // return
                    if (data) {
                        showMessage('open')
                        element.innerHTML = `
                            <span>عضویت شما ثبت شد</span>
                            <span>✅</span>
                            `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    } else {
                        showMessage('open')
                        element.innerHTML = `
                            <span>شما قبلا عضو شده اید</span>
                            <span>✅</span>
                            `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }

                    // location.assign("{{ url('/api/special-user-page/' . $page->id) }}")
                    location.assign("{{ route('special-user.page', [$page->id]) }}")
                },
                error: function() {
                    showMessage('open')
                    element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 2000)
                }
            })
        } else {
            authenticationDiv.classList.remove('invisible')
            authenticationDiv.classList.remove('opacity-0')
        }
    }

    function specialCustomers(el) {
        console.log(el)
    }

    let faqBox = document.querySelectorAll(".faqBox")
    faqBox.forEach(faq => {
        faq.children[0].addEventListener('click', () => {
            if (faq.children[1].classList.contains('max-h-0')) {
                faqBox.forEach((item) => {
                    item.children[1].classList.remove('max-h-[500px]')
                    item.children[1].classList.add('max-h-0')
                    item.children[0].children[1].classList.remove('rotate-180')
                    item.children[0].children[1].classList.add('rotate-0')
                })
                faq.children[1].classList.remove('max-h-0')
                faq.children[1].classList.add('max-h-[500px]')
                faq.children[0].children[1].classList.remove('rotate-0')
                faq.children[0].children[1].classList.add('rotate-180')
            } else {
                faq.children[1].classList.remove('max-h-[500px]')
                faq.children[1].classList.add('max-h-0')
                faq.children[0].children[1].classList.remove('rotate-180')
                faq.children[0].children[1].classList.add('rotate-0')
            }
        })
    })
    let contactusBox = document.querySelectorAll(".contactusBox")
    contactusBox.forEach(faq => {
        faq.children[0].addEventListener('click', () => {
            if (faq.children[1].classList.contains('max-h-0')) {
                contactusBox.forEach((item) => {
                    item.children[1].classList.remove('max-h-[500px]')
                    item.children[1].classList.add('max-h-0')
                    item.children[0].children[1].classList.remove('rotate-180')
                    item.children[0].children[1].classList.add('rotate-0')
                })
                faq.children[1].classList.remove('max-h-0')
                faq.children[1].classList.add('max-h-[500px]')
                faq.children[0].children[1].classList.remove('rotate-0')
                faq.children[0].children[1].classList.add('rotate-180')
            } else {
                faq.children[1].classList.remove('max-h-[500px]')
                faq.children[1].classList.add('max-h-0')
                faq.children[0].children[1].classList.remove('rotate-180')
                faq.children[0].children[1].classList.add('rotate-0')
            }
        })
    })
</script>
