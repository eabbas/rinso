@php
    $menu_id = $firstMenu->id;
@endphp
    @include('broad')
<script>
    let orderLink = document.getElementById('orderLink')
    let firstMenu = ""
    document.querySelectorAll('.menuParent').forEach((menu) => {
        if (menu.getAttribute('data-menu-id') == "{{ $menu_id }}") {
            firstMenu = menu
            menu.classList.add('selected')
        }
    })

    let shoppingCartCount = document.getElementById('shoppingCartCount')
    let orderBasket = document.getElementById('orderBasket')
    let parent = document.getElementById('parentMenuPage')
    let length = 0
    let cartList = document.getElementById('cartList')
    let orderList = document.getElementById('orderList')
    let authenticationDiv = document.getElementById('authenticationDiv')

    let message = document.getElementById('message')
    let element = document.createElement('div')
    element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

    let loginForm = document.getElementById('loginForm')
    let phoneNumber = document.getElementById('phoneNumber')
    let password = document.getElementById('password')
    let cartNumber = document.getElementById('cartNumber')
    let setOrders = document.querySelectorAll('.set')
    let newAddress = document.getElementById('newAddress')
    let setAddressSection = document.getElementById('setAddress')
    let address = document.getElementById('address')
    let sendWay = document.getElementById('sendWay')
    let sections = document.querySelectorAll('.section')
    let countDown = document.getElementById('countDown')

    let flag = "{{ Auth::check() }}";
    let userId = "{{ Auth::id() }}";


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
            counter()
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
                success: function (data) {
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
                error: function () {
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

    function counter() {
        let phoneNumber = document.getElementById('phoneNumber')
        countDown.classList.add('cursor-no-drop')
        countDown.classList.remove('cursor-pointer')
        countDown.classList.remove('hover:bg-[#d52b4a]')
        countDown.classList.add('hover:bg-[#d52b4a]/50')
        countDown.classList.remove('bg-(--primary-color)')
        countDown.classList.add('bg-(--primary-color)/50')
        countDown.disabled = true
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
                    success: function (data) {
                        countDown.classList.remove('cursor-no-drop')
                        countDown.classList.add('bg-(--primary-color)')
                        countDown.classList.remove('bg-(--primary-color)/50')
                        countDown.classList.add('cursor-pointer')
                        countDown.classList.add('hover:bg-[#d52b4a]')
                        countDown.classList.remove('hover:bg-[#d52b4a]/50')
                        countDown.removeAttribute('disabled')
                        countDown.removeAttribute('dir')
                        countDown.innerText = "ارسال مجدد"
                    },
                    error: function () {
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

    function setCount(el, state, itemId) {
        let shoppingCartOrders = document.querySelectorAll('.shoppingCartOrders')
        let menuItemsInPage = document.querySelectorAll('.menuItems')

        el.setAttribute('disabled', true)

        el.innerHTML = `
                <div class="w-5 h-5 border-2 border-white border-t-(--primary-color) rounded-full animate-spin"></div>
            `
        if (state == "+") {
            el.parentElement.children[1].value++
            orderBasket.children[2].innerText++
            shoppingCartCount.innerText++
            length++
        }
        if (el.parentElement.children[1].value != 0 && orderBasket.children[2].innerText != 0) {
            if (state == "-") {
                el.parentElement.children[1].value--
                orderBasket.children[2].innerText--
                shoppingCartCount.innerText--
                length--
            }
        }

        if (el.parentElement.children[1].value == 0) {
            console.log('the count of item is zero');
            $.ajax({
                url: "{{ url('/api/cart/delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'career_id': "{{ $career->id }}",
                    'menu_item_id': itemId,
                    'user_id': userId
                },
                success: function (data) {
                    console.log(data)
                    if(data.count == 0){
                        orderBasket.parentElement.classList.remove('flex')
                        orderBasket.parentElement.classList.add('hidden')
                        cartList.classList.add('max-h-0')
                        cartList.classList.remove('bottom-16')
                        cartList.classList.add('bottom-0')
                        cartList.classList.remove('min-h-[calc(100vh-57px)]')
                        cartList.children[1].classList.remove('h-[calc(100vh-300px)]')
                        orderBasket.removeAttribute('disabled')
                    }
                    shoppingCartOrders.forEach((item)=>{
                        if(item.getAttribute('data-menu-item-id') == data.cart.menu_item_id){
                            item.remove()
                        }
                    })
                    menuItemsInPage.forEach((menuItem)=>{
                        if(menuItem.getAttribute('data-menu-item-id') == data.cart.menu_item_id){
                            menuItem.children[1].children[0].innerHTML = `
                                <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="addToCart(this, ${data.cart.menu_item_id})">
                                    <span class="text-2xl text-white">+</span>
                                </div>
                            `
                        }
                    })
                },
                error: function () {
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
            $.ajax({
                url: "{{ url('/api/cart/update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'career_id': "{{ $career->id }}",
                    'menu_item_id': itemId,
                    'quantity': el.parentElement.children[1].value,
                    'user_id': userId
                },
                success: function (data) {
                    console.log(data)
                    el.removeAttribute('disabled')
                    if (state == "+") {
                        el.innerHTML = "<span class='text-2xl text-white'>+</span>"
                        if(data.disabled){
                            el.classList.remove('bg-[#f6911e]')
                            el.classList.add('bg-gray-500')
                            el.innerHTML = "<span class='text-2xl text-white/50'>+</span>"
                            el.disabled = true
                        }

                        el.parentElement.children[2].innerHTML = "<span class='text-2xl text-white'>-</span>"
                    }
                    if (state == "-") {
                        el.innerHTML = "<span class='text-2xl text-white'>-</span>"
                        if(!data.disabled){
                            el.parentElement.children[0].classList.remove('bg-gray-500')
                            el.parentElement.children[0].classList.add('bg-[#f6911e]')
                            el.parentElement.children[0].innerHTML = "<span class='text-2xl text-white'>+</span>"
                            el.parentElement.children[0].disabled = false
                        }

                    }
                    menuItemsInPage.forEach((menuItem)=>{
                        if(menuItem.getAttribute('data-menu-item-id') == data.menu_item_id){
                            menuItem.children[1].children[0].children[1].value = data.quantity
                        }
                    })
                },
                error: function () {
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

    function addToCart(el, itemId) {

        let count = document.querySelectorAll('.count')
        el.innerHTML = `
                <div class="w-5 h-5 border-2 border-gray-200 border-t-(--primary-color) rounded-full animate-spin"></div>
            `
        if (flag) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('/api/cart/store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'career_id': "{{ $career->id }}",
                    'menu_item_id': itemId,
                    'user_id': userId
                },
                success: function (data) {
                    orderBasket.parentElement.classList.remove('hidden')
                    orderBasket.parentElement.classList.add('flex')
                    if (flag) {
                        length = "{{ $cartCount }}"

                        length++
                        orderBasket.children[2].innerText++
                        shoppingCartCount.innerText = length
                        el.parentElement.parentElement.innerHTML = `
                               <div class="h-full flex flex-col gap-2 items-center justify-between px-1 count" data-item-id="${data.menu_item_id}">
                                    <button class="size-7 pt-1 ${data.disabled ? 'bg-gray-500' : 'bg-[#f6911e]'} flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="setCount(this, '+', ${data.menu_item_id})" ${data.disabled && 'disabled'}>
                                        <span class="text-2xl text-white">+</span>
                                    </button>
                                    <input type="number" readonly="" min="1" value="1" class="size-7 text-center font-bold text-xs text-(--secondary-text-color) outline-none" name="" id="">
                                    <button class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="setCount(this, '-', ${data.menu_item_id})">
                                        <span class='text-2xl text-white'>-</span>
                                    </button>
                                </div>
                            `
                    }
                },
                error: function () {
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
            authenticationDiv.children[0].classList.remove('scale-95')
        }

    }

    function deleteShoppingCart(el){
        let menuItemsInPage = document.querySelectorAll('.menuItems')
        let text = el.innerText
        el.innerHTML = "<div class='size-5 border-3 border-white border-t-(--primary-color) rounded-full animate-spin'></div>"
        let cartItems = cartList.children[1].children
        console.log(cartItems)

        let cartIds = []
        for(let item of cartItems){
            cartIds.push(item.getAttribute('data-menu-item-id'))
        }
        console.log(cartIds)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ url('/api/cart/deleteAll') }}",
            type: "POST",
            dataType: "json",
            data: { 'cart_ids': cartIds, 'user_id' : userId },
            success: function(data){
                console.log(data)
                el.innerHTML = text
                orderBasket.children[2].innerText = 0
                length = 0
                cartList.classList.remove('max-h-[calc(100vh-30%)]')
                cartList.children[1].classList.remove('h-[calc(100vh-300px)]')
                cartList.classList.add('max-h-0')
                cartList.classList.remove('bottom-16')
                cartList.classList.add('bottom-0')
                orderBasket.parentElement.classList.remove('flex')
                orderBasket.parentElement.classList.add('hidden')
                orderBasket.disabled = false
                showMenu(firstMenu, "{{ $menu_id }}")
            },
            error: function(){
                console.log('error')
            }
        })
    }

    function saveAddress() {
        if (newAddress.value != "") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('/api/user/setAddress') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'address': newAddress.value,
                    'user_id': userId
                },
                success: function (data) {
                    newAddress.value = ""
                    address.classList.contains('hidden') && address.classList.remove('hidden')
                    let option = document.createElement('option')
                    option.value = data[0].id
                    option.innerText = data[0].address
                    address.appendChild(option)
                },
                error: function () {
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
            showMessage('open')
            element.innerHTML = `
                        <span>لطفا همه فیلد ها را پر کنید</span>
                        <span class="text-red-500">!</span>
                    `
            message.children[0].appendChild(element)
            setTimeout(() => {
                showMessage('close')
            }, 2000)
        }
    }

    function closeSection() {
        sections.forEach((section) => {
            section.classList.add('invisible')
            section.classList.add('opacity-0')
        })
    }

    function check(ev) {
        let addCustomer = document.getElementById('addCustomer')
        let password = document.getElementById('password')
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
                    url: "{{ route('user.checkFromMenu') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'password': password.value,
                        'career_id': "{{ $career->id }}"
                    },
                    success: function (data) {
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
                        } if (data.id) {
                            showMessage('open')
                            element.innerHTML = `
                                <span> خوش اومدی ${data.name ?? 'کاربر'} ${data.family ?? 'رینگا'} عزیز</span>
                                `
                            if (data.orders.length > 0) {
                                orderLink.children[0].classList.remove('scale-0')
                            }
                            flag = true
                            addCustomer.innerHTML = ""
                            if (flag && ({{$career->user->id}} != data.id)) {
                                addCustomer.innerHTML = `<div class="flex justify-center items-center w-40 py-2 bg-[#fc8e21] text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this , 'resturant')">عضویت در باشگاه مشتریان</div>`
                            } else {
                                if (flag && ({{$career->user->id}} == data.id)) {
                                    addCustomer.innerHTML = `<a href="{{ route('special-user.index', [$career->page->id]) }}" class="flex justify-center items-center w-40 py-2 bg-[#fc8e21] text-white text-xs font-bold rounded-sm cursor-pointer" onclick="specialCustomers(this)">
                                             باشگاه مشتریان
                                        </a>`
                                }
                            }
                            userId = data.id

                            let cartLength = 0
                            data.carts.forEach((cart) => {
                                cartLength += parseInt(cart.quantity)
                            })
                            orderBasket.parentElement.classList.remove('flex')
                            orderBasket.parentElement.classList.add('hidden')
                            if (cartLength != 0) {
                                orderBasket.parentElement.classList.remove('hidden')
                                orderBasket.parentElement.classList.add('flex')
                                orderBasket.children[2].innerText = cartLength
                            }
                            showMenu(firstMenu, "{{ $menu_id }}")
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                closeLoginForm()
                            }, 2000)
                        }
                    },
                    error: function () {
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
                        'code': code.value,
                        'career_id': "{{ $career->id }}"
                    },
                    success: function (data) {
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
                        } if(data.validate && data.checkCode) {
                            showMessage('open')
                            element.innerHTML = `
                                    <span> خوش اومدی ${data.validate.name ?? 'کاربر'} ${data.validate.family ?? 'رینگا'} عزیز</span>
                                `
                            if (data.orders.length > 0) {
                                orderLink.children[0].classList.remove('scale-0')
                            }
                            flag = true
                            addCustomer.innerHTML = ""
                            if (flag && ({{$career->user->id}} != data.id)) {
                                addCustomer.innerHTML = `<div class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this ,'resturant')">عضویت در باشگاه مشتریان</div>`
                            } else {
                                if (flag && ({{$career->user->id}} == data.id)) {
                                    addCustomer.innerHTML = `<a href="{{ route('special-user.index', [$career->page->id]) }}" class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer" onclick="specialCustomers(this)">
                                        باشگاه مشتریان
                                </a>`
                                }
                            }
                            userId = data.validate.id
                            message.children[0].appendChild(element)

                            let cartLength = 0
                            data.validate.carts.forEach((cart) => {
                                cartLength += parseInt(cart.quantity)
                            })
                            orderBasket.children[1].classList.remove('fill-(--primary-color)')
                            orderBasket.children[0].classList.add('hidden')
                            orderBasket.children[1].classList.add('fill-(--secondary-text-color)')
                            if (cartLength != 0) {

                                orderBasket.children[1].classList.add('fill-(--primary-color)')
                                orderBasket.children[0].classList.remove('hidden')
                                orderBasket.children[1].classList.remove('fill-(--secondary-text-color)')
                                orderBasket.children[0].innerHTML = cartLength
                            }
                            showMenu(firstMenu, "{{ $menu_id }}")
                            setTimeout(() => {
                                showMessage('close')
                                closeLoginForm()
                            }, 2000)
                        }
                    },
                    error: function () {
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

    }

    function closeLoginForm() {
        setOrders = document.querySelectorAll('.changeButton')
        authenticationDiv.classList.add('invisible')
        authenticationDiv.classList.add('opacity-0')
        authenticationDiv.children[0].classList.add('scale-95')
        setOrders.forEach((button) => {
            button.innerHTML = "<span class='text-2xl text-white'>+</span>"
        })
    }

    let btn = ""

    function openShoppingCart(state) {
        if (state == 'phoneOpen') {
            btn = orderBasket.innerHTML
            cartList.children[1].innerHTML = ""
            orderBasket.disabled = true
            orderBasket.classList.add('cursor-no-drop')
            orderBasket.innerHTML = " <div class='size-6 border-3 border-white border-t-(--primary-color) rounded-full animate-spin'></div>"
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('/api/cart/showCarts') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'career_id': "{{ $career->id }}",
                    'user_id': userId
                },
                success: function (data) {
                    cartList.classList.remove('max-h-0')
                    cartList.classList.remove('bottom-0')
                    cartList.classList.add('bottom-16')
                    cartList.classList.add('max-h-[calc(100vh-30%)]')
                    cartList.children[1].classList.add('h-[calc(100vh-300px)]')
                    orderBasket.innerHTML = btn
                    orderBasket.parentElement.classList.remove('flex')
                    orderBasket.parentElement.classList.add('hidden')
                    data.forEach((item) => {
                        let parentDiv = document.createElement('div')
                        parentDiv.classList = "w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative shoppingCartOrders"
                        parentDiv.setAttribute('data-menu-item-title', item.title)
                        parentDiv.setAttribute('data-menu-item-id', item.id)
                        parentDiv.setAttribute('data-order-id', item.cart_id)
                        // if(item.discount){
                        //     let campare = parseInt(item.price) - parseInt(item.discount)
                        //     let x = campare / parseInt(item.price)
                        //     let percent = parseInt(x * 100)
                        //     let span = document.createElement('span')
                        //     span.classList = "text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1"
                        //     span.innerText = percent + "%"
                        //     parentDiv.appendChild(span)
                        // }
                        let menuItemEl = `
                                <!--<span class="absolute -top-1 -right-2 bg-(--primary-color) px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->

                                <div class="w-full flex items-center justify-between">
                                    <div class="w-full flex items-center gap-2 lg:gap-4 flex-1">
                                        <img src="{{ asset('storage/') }}/${item.image} "
                                             class="size-22 rounded-lg object-cover border border-gray-300"
                                             alt="${item.title}">
                                        <div class="flex-1 min-w-0 max-w-[100px]">
                                            <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">${item.title}</h3>
                                            <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">${item.description ? item.description : ""}</p>
                                        </div>
                                    </div>
                                    <div class="text-left pl-2 lg:pl-0 lg:ml-4 flex flex-col items-end gap-0.5 lg:gap-3">
                                        <div class="flex flex-row items-center gap-3">
                                            <div class="text-left flex flex-col items-end">
                                                <span class="font-bold text-xs lg:text-sm">${item.discount != 0 ? item.discount * item.quantity : item.price * item.quantity} تومان</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-end items-center gap-3" data-item-id="${item.id}">
                                            <div class="relative w-20 lg:w-20">
                                                <button class="absolute right-0 bottom-1.5 rounded size-6 flex justify-center bg-(--primary-color) font-bold items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '+', ${item.id})">+
                                                </button>
                                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1"
                                                       min="1" value="${item.quantity}" disabled>
                                                <button class="absolute left-0 bottom-1.5 rounded size-6 flex justify-center bg-(--primary-color) font-bold items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '-', ${item.id})">
                                                        `
                        // if(item.quantity > 1){
                            menuItemEl += `-`
                        // }
                        // if(item.quantity == 1){
                        //     menuItemEl += `<svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512">
                        //                                                         <path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"></path>
                        //                                                     </svg>`
                        // }
                        menuItemEl+=`
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `
                        parentDiv.innerHTML = menuItemEl
                        cartList.children[1].appendChild(parentDiv)
                    })
                },
                error: function () {
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
        if (state == 'phoneClose') {
            cartList.classList.remove('max-h-[calc(100vh-30%)]')
            cartList.children[1].classList.remove('h-[calc(100vh-300px)]')
            cartList.classList.add('max-h-0')
            cartList.classList.remove('bottom-16')
            cartList.classList.add('bottom-0')
            orderBasket.parentElement.classList.remove('hidden')
            orderBasket.parentElement.classList.add('flex')
            orderBasket.removeAttribute('disabled')
            orderBasket.classList.remove('cursor-no-drop')
            orderBasket.innerHTML = btn
            orderBasket.disabled = false
        }
    }

    let counterNum = 0

    function orders(state) {
        
        if (state == "open") {
            orderList.children[0].children[0].children[1].innerHTML = ""
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('/api/order/show') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'career_id': "{{ $career->id }}",
                    'user_id': userId
                },
                success: function (data) {
                    
                    orderList.classList.remove('invisible')
                    orderList.classList.remove('opacity-0')
                    data.forEach((order)=>{

                        let condition = false
                        let delOrdFlag = false
                        let cancelOrdFlag = false
                        if(order.status.id == 2 || order.status.id == 3 || order.status.id == 5 || order.status.id == 6){
                            condition=true
                        }
                        if(order.status.id == 4){
                            delOrdFlag = true
                        }
                        if(order.status.id == 1){
                            cancelOrdFlag = true
                        }

                        
                            // console.log(order)
                        
                        let element = document.createElement('div')
                        element.classList = "w-full p-2 border-1 border-[#e4e5ea] rounded-lg"
                        element.setAttribute('data-order-id', order.id)
                        let inner = `
                        <div class="w-full grid grid-cols-12 gap-2 items-center cursor-pointer order-first-row ${data[0].id == order.id && 'mb-5'}">

                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-(--secondary-text-color)" onclick="accardeonEvent(this)" viewBox="0 0 448 512">
                                <path d="M160 96v32H288V96c0-35.3-28.7-64-64-64s-64 28.7-64 64zm-32 64H48c-8.8 0-16 7.2-16 16V416c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V176c0-8.8-7.2-16-16-16H320v80c0 8.8-7.2 16-16 16s-16-7.2-16-16V160H160v80c0 8.8-7.2 16-16 16s-16-7.2-16-16V160zm0-32V96c0-53 43-96 96-96s96 43 96 96v32h80c26.5 0 48 21.5 48 48V416c0 53-43 96-96 96H96c-53 0-96-43-96-96V176c0-26.5 21.5-48 48-48h80z"/>
                            </svg>
                            <span class="font-bold text-(--primary-text-color) in-fa col-span-2" onclick="accardeonEvent(this)">#${order.order_code}</span>
                            <span class="bg-[${order.status.color}]/10 border-1 border-[${order.status.color}] text-[${order.status.color}] px-2 py-0.5 rounded-md text-sm col-span-5 text-center order-status">${order.status.title}</span>
                            <button class="text-white bg-rose-500 px-4 py-0.5 ${condition ? `invisible` : ``} rounded-md text-sm cursor-pointer col-span-3" onclick="${delOrdFlag ? `deleteOrder(this, ${order.id})` : cancelOrdFlag ? `canceleOrder(this, ${order.id})` : '' }">${delOrdFlag ? 'حذف' : cancelOrdFlag ? 'لغو' : ''}</button>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ${data[0].id == order.id && 'rotate-180'} transition-all duration-300 angleDown" onclick="accardeonEvent(this)" viewBox="0 0 448 512">
                                <path fill="var(--primary-text-color)" d="M212.7 331.3c6.2 6.2 16.4 6.2 22.6 0l160-160c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L224 297.4 75.3 148.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l160 160z"/>
                            </svg>
                        </div>
                        <div class="w-full transition-all duration-300 ease-in-out ${data[0].id == order.id ? 'max-h-[500px]' : 'max-h-0'} overflow-y-auto accardeon" style="scrollbar-width: thin">
                            <div class="w-full flex flex-row items-center justify-between px-3 pb-4">
                                <div class="flex flex-row items-center gap-3">
                                    <span class="text-sm text-(--primary-color)">شماره میز:</span>
                                    <span class="text-sm text-(--secondary-text-color) in-fa">${order.qr_code.description}</span>
                                </div>
                                <div class="flex flex-row items-center gap-3">
                                    <span class="text-sm text-(--primary-color)"> تعداد آیتم:</span>
                                    <span class="text-sm text-(--secondary-text-color) in-fa">${order.carts.length}</span>
                                </div>
                            </div>
                            <div class="w-full border-b border-[#e4e5ea]">
                                <div class="w-full grid grid-cols-12 gap-2 items-center mb-1.5 py-1 rounded-md px-3">
                                    <span class="col-span-3 text-(--secondary-text-color) text-sm text-center">تصویر</span>
                                    <span class="text-sm text-(--secondary-text-color) col-span-4 text-center">عنوان</span>
                                    <span class="text-sm text-(--secondary-text-color) text-center in-fa col-span-2">تعداد</span>
                                    <span class="text-sm text-(--secondary-text-color) in-fa col-span-3 text-center">جمع کل</span>
                                </div>
                            </div>
                            <div class="w-full flex flex-col pt-2 max-h-[200px] divide-y divide-[#e4e5ea] overflow-y-scroll" style="scrollbar-width: thin;">`
                            order.carts.forEach((cart)=>{
                                let price = 0
                                if(cart.menu_item.discount == 0){
                                    price = cart.menu_item.price * cart.quantity
                                } else {
                                    price = cart.menu_item.discount * cart.quantity
                                }
                                inner +=`
                                    <div class="w-full grid grid-cols-12 gap-2 items-center px-3 py-2">
                                        <img src="${ '{{ asset('storage/') }}/'+cart.menu_item.image }" class="col-span-3 size-18 rounded-md" alt="">
                                        <span class="text-sm text-(--secondary-text-color) col-span-4 text-center">${cart.menu_item.title}</span>
                                        <span class="text-sm text-(--secondary-text-color) text-center in-fa col-span-2">${cart.quantity}</span>
                                        <span class="text-sm text-(--secondary-text-color) in-fa col-span-3 text-center">${price}</span>
                                    </div>`
                            })
                                inner +=`
                        </div>
                    </div>`
                        element.innerHTML = inner
                        orderList.children[0].children[0].children[1].prepend(element)
                    })
                    // window.Pusher = Pusher;
                    // window.Echo = new Echo.default({
                    //     broadcaster: 'reverb',
                    //     key: '1gz5uvls0tzdnpjcxp7q',
                    //     wsHost: '127.0.0.1',
                    //     wsPort: 8080,
                    //     forceTLS: false,
                    //     enabledTransports: ['ws']
                    // });

                    // window.Echo.channel('userOrderNotification{{ Auth::id() }}')
                    //     .listen('clientOrders', function(e) {
                    //         console.log('وضعیت سفارش:', e.order_data);
                            
                    //         let order = e.order_data;
                    //         let container = orderList.children[0].children[0].children[1];
                    //         if (!container) return;
                            
                    //         let card = container.querySelector(`[data-order-id="${order.id}"]`);
                            
                    //         if (!card) {
                    //             let newCard = document.createElement('div');
                    //             newCard.className = 'w-full p-2 border-1 border-[#e4e5ea] rounded-lg';
                    //             newCard.setAttribute('data-order-id', order.id);
                                
                    //             let inner = `
                    //                 <div class="w-full grid grid-cols-12 gap-2 items-center cursor-pointer order-first-row">
                    //                     <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-(--secondary-text-color)" onclick="accardeonEvent(this)" viewBox="0 0 448 512">
                    //                         <path d="M160 96v32H288V96c0-35.3-28.7-64-64-64s-64 28.7-64 64zm-32 64H48c-8.8 0-16 7.2-16 16V416c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V176c0-8.8-7.2-16-16-16H320v80c0 8.8-7.2 16-16 16s-16-7.2-16-16V160H160v80c0 8.8-7.2 16-16 16s-16-7.2-16-16V160zm0-32V96c0-53 43-96 96-96s96 43 96 96v32h80c26.5 0 48 21.5 48 48V416c0 53-43 96-96 96H96c-53 0-96-43-96-96V176c0-26.5 21.5-48 48-48h80z"/>
                    //                     </svg>
                    //                     <span class="font-bold text-(--primary-text-color) in-fa col-span-2" onclick="accardeonEvent(this)">#${order.order_code}</span>
                    //                     <span class="bg-[${order.status.color}]/10 border-1 border-[${order.status.color}] text-[${order.status.color}] px-2 py-0.5 rounded-md text-sm col-span-5 text-center order-status">${order.status.title}</span>
                    //                     <button class="text-white bg-rose-500 px-4 py-0.5 ${order.status.id == 2 || order.status.id == 3 || order.status.id == 5 || order.status.id == 6 ? 'invisible' : ''} rounded-md text-sm cursor-pointer col-span-3" onclick="${order.status.id == 4 ? 'deleteOrder(this, '+order.id+')' : order.status.id == 1 ? 'canceleOrder(this, '+order.id+')' : ''}">${order.status.id == 4 ? 'حذف' : order.status.id == 1 ? 'لغو' : ''}</button>
                    //                     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 transition-all duration-300 angleDown" onclick="accardeonEvent(this)" viewBox="0 0 448 512">
                    //                         <path fill="var(--primary-text-color)" d="M212.7 331.3c6.2 6.2 16.4 6.2 22.6 0l160-160c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L224 297.4 75.3 148.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l160 160z"/>
                    //                     </svg>
                    //                 </div>
                    //                 <div class="w-full transition-all duration-300 ease-in-out max-h-0 overflow-y-auto accardeon" style="scrollbar-width: thin">
                    //                     <div class="w-full flex flex-row items-center justify-between px-3 pb-4">
                    //                         <div class="flex flex-row items-center gap-3">
                    //                             <span class="text-sm text-(--primary-color)">شماره میز:</span>
                    //                             <span class="text-sm text-(--secondary-text-color) in-fa">${order.qr_code.description}</span>
                    //                         </div>
                    //                         <div class="flex flex-row items-center gap-3">
                    //                             <span class="text-sm text-(--primary-color)"> تعداد آیتم:</span>
                    //                             <span class="text-sm text-(--secondary-text-color) in-fa">${order.carts.length}</span>
                    //                         </div>
                    //                     </div>
                    //                     <div class="w-full border-b border-[#e4e5ea]">
                    //                         <div class="w-full grid grid-cols-12 gap-2 items-center mb-1.5 py-1 rounded-md px-3">
                    //                             <span class="col-span-3 text-(--secondary-text-color) text-sm text-center">تصویر</span>
                    //                             <span class="text-sm text-(--secondary-text-color) col-span-4 text-center">عنوان</span>
                    //                             <span class="text-sm text-(--secondary-text-color) text-center in-fa col-span-2">تعداد</span>
                    //                             <span class="text-sm text-(--secondary-text-color) in-fa col-span-3 text-center">جمع کل</span>
                    //                         </div>
                    //                     </div>
                    //                     <div class="w-full flex flex-col pt-2 max-h-[200px] divide-y divide-[#e4e5ea] overflow-y-scroll" style="scrollbar-width: thin;">`;
                                        
                    //                     order.carts.forEach((cart)=>{
                    //                         let price = 0
                    //                         if(cart.menu_item.discount == 0){
                    //                             price = cart.menu_item.price * cart.quantity
                    //                         } else {
                    //                             price = cart.menu_item.discount * cart.quantity
                    //                         }
                    //                         inner += `
                    //                             <div class="w-full grid grid-cols-12 gap-2 items-center px-3 py-2">
                    //                                 <img src="{{ asset('storage/') }}/${cart.menu_item.image}" class="col-span-3 size-18 rounded-md" alt="">
                    //                                 <span class="text-sm text-(--secondary-text-color) col-span-4 text-center">${cart.menu_item.title}</span>
                    //                                 <span class="text-sm text-(--secondary-text-color) text-center in-fa col-span-2">${cart.quantity}</span>
                    //                                 <span class="text-sm text-(--secondary-text-color) in-fa col-span-3 text-center">${price}</span>
                    //                             </div>`;
                    //                     });
                                        
                    //                     inner += `
                    //                     </div>
                    //                 </div>
                    //             `;
                    //             newCard.innerHTML = inner;
                    //             container.prepend(newCard);
                    //             return;
                    //         }
                            
                    //         let statusEl = card.querySelector('.order-status');
                    //         if (statusEl) {
                    //             statusEl.textContent = order.status.title;
                    //             statusEl.style.color = order.status.color;
                    //             statusEl.style.borderColor = order.status.color;
                    //             statusEl.style.backgroundColor = order.status.color + '10';
                    //         }
                            
                    //         if (order.status.id === 5 || order.status.id === 6) {
                    //             card.remove();
                    //         }
                    //     });
                                },
                                error: function () {
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
                        if (state == "close") {
                            orderList.classList.add('invisible')
                            orderList.classList.add('opacity-0')
                        }
    }
    
    function accardeonEvent(el){
        let angle = el.parentElement.querySelector('.angleDown')
        let accardeons = document.querySelectorAll('.accardeon');
        accardeons.forEach((accardeon)=>{
            if(accardeon !== el.parentElement.parentElement.querySelector('.accardeon')){
                accardeon.classList.remove('max-h-[500px]');
                el.parentElement.classList.remove('mb-5')
                accardeon.parentElement.children[0].classList.remove('mb-5');
                accardeon.classList.add('max-h-0');
                angle.classList.remove('rotate-180');
            }
        });
        let acc = el.parentElement.parentElement.querySelector('.accardeon');

        if(acc.classList.contains('max-h-[500px]')){
            acc.classList.remove('max-h-[500px]');
            acc.parentElement.classList.remove('mb-5');
            acc.classList.add('max-h-0');
            angle.classList.remove('rotate-180');
        } else {
            acc.classList.remove('max-h-0');
            el.parentElement.classList.add('mb-5');
            acc.classList.add('max-h-[500px]');
            angle.classList.add('rotate-180');
        }
    }

    function deleteOrder(el, orderId) {
        orderLink = document.getElementById('orderLink')
        el.innerHTMl = "<div class='w-5 h-5 border-2 border-white border-t-red-500 rounded-full animate-spin'></div>"
        $.ajax({
            url: "{{ url('/api/order/delete') }}/" + orderId + '/' + userId + "/{{ $career->id }}",
            type: "GET",
            success: function (data) {
                console.log(data)
                console.log(orderLink)
                if (data.length == 0) {
                    orderLink.children[0].classList.add('scale-0')
                    orderLink.removeAttribute('onclick')
                    orders('close')
                }
                el.parentElement.parentElement.remove()
            },
            error: function () {
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

function canceleOrder(el, orderId) {
    el.innerHTML = "<div class='w-5 h-5 border-2 border-white border-t-red-500 rounded-full animate-spin'></div>";
    $.ajax({
        url: "{{ url('/api/order/remove') }}/" + orderId + '/' + userId + "/{{ $career->id }}",
        type: "GET",
        success: function (data) {
            console.log('پاسخ سرور:', data)
            if (data.length == 0) {
                orderLink.children[0].classList.add('scale-0')
                orderLink.removeAttribute('onclick')
                orders('close');
            }
            el.parentElement.parentElement.remove()
            
            showMessage('open')
            element.innerHTML = `<span>سفارش با موفقیت حذف شد</span>`
            message.children[0].appendChild(element)
            setTimeout(() => {
                showMessage('close')
            }, 2000);
        },
        error: function(xhr, status, error) {
            console.log('خطا:', error)
            showMessage('open');
            element.innerHTML = `
                <span>خطا در حذف سفارش</span>
                <span class="text-red-500">!</span>
            `;
            message.children[0].appendChild(element)
            setTimeout(() => {
                showMessage('close');
            }, 2000)
        }
    })
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

    function setOrder(way, el = null) {
        if(el){
            el.disabled = true
        }
        orderLink = document.getElementById('orderLink')
        let count = document.querySelectorAll('.count')
        // orderLink.classList.remove('hidden')

        let orders = []
        let slug = "{{ $slug }}"
        let addressTitle = address.value
        if (way == 'slug' && el) {
            slug = el.value
        }
        // if(way == 'address' && el){
        //     address = 'تحویل در محل'
        // }
        let shoppingCartOrders = document.querySelectorAll('.shoppingCartOrders')
        shoppingCartOrders.forEach((item) => {
            orders.push(item.getAttribute('data-order-id'))
        })
        $.ajax({
            url: "{{ url('/api/order/store') }}",
            type: "POST",
            dataType: "json",
            data: {
                'career_id': "{{ $career->id }}",
                'address': way === 'address' ? addressTitle : null,
                'carts': orders,
                'slug': way === 'slug' ? slug : null,
                'user_id': userId
            },
            success: function (data) {
                if(el){
                    el.disabled = false
                }
                console.log(orderLink)
                orderLink.children[0].classList.remove('scale-0')
                orderLink.setAttribute('onclick', 'orders("open")')
                console.log(orderLink)
                count.forEach((item) => {

                    item.innerHTML = `
                        <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="addToCart(this, ${item.getAttribute('data-item-id')})">
                                    <span class="text-2xl text-white">+</span>
                        </div>
                        `
                })
                orderBasket.parentElement.classList.remove('flex')
                orderBasket.parentElement.classList.add('hidden')
                cartList.children[1].innerHTML = ""
                cartList.classList.remove('max-h-[calc(100vh-30%)]')
                cartList.children[1].classList.remove('h-[calc(100vh-300px)]')
                cartList.classList.add('max-h-0')
                cartList.classList.remove('bottom-16')
                cartList.classList.add('bottom-0')
                orderBasket.disabled = false
                orderBasket.parentElement.removeAttribute('disabled')
                orderBasket.children[2].innerText = 0
                showMessage('open')
                element.innerHTML = `
                        <span>سفارش شما ثبت شد</span>
                        <span class="text-green-500">!</span>
                        `

                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
                closeSection()
                showMenu(firstMenu, "{{ $menu_id }}")
            },
            error: function () {
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

    function setAddress() {
        sendWay.classList.add('opacity-0')
        sendWay.classList.add('invisible')
        sendWay.children[0].classList.add('scale-95')
        setAddressSection.classList.remove('invisible')
        setAddressSection.classList.remove('opacity-0')
        setAddressSection.children[0].classList.remove('scale-95')
    }

    function openAddressForm() {
        sendWay.classList.remove('invisible')
        sendWay.classList.remove('opacity-0')
        sendWay.children[0].classList.remove('scale-95')
    }

    function loginWithPassKey(el) {
        login.innerHTML = `
                                    <input type="password"
                                        class="placeholder-gray-400 focus:border-1 focus:border-(--primary-color) p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                                        name="password" id="password" placeholder="کلمه عبور" required>
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
                                class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-[#d52b4a] text-white cursor-pointer"
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

    function getOpenShoppingCart() {
        console.log('get open shopping cart')
        return openShoppingCart;
    }


    // login


    // let authenticationDiv = document.getElementById('authenticationDiv')
    function closeLoginBox() {
        authenticationDiv.classList.add('invisible')
        authenticationDiv.classList.add('opacity-0')
    }

    function addSpecialCustomer(el, type) {
        let text = el.innerText
        if (flag) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            {{--url: "{{ route('special-user.store') }}",--}}

            $.ajax({
                url: "{{ url('/api/special-user-store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'page_id': "{{ $career->page->id }}",
                    'user_id': userId,
                    'type': type
                },
                success: function (data) {
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
                },
                error: function () {
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

    let menus = document.querySelectorAll('.menus')
    let menuParent = document.querySelectorAll('.menuParent')
    // let menuCats = document.getElementById('menuCats')
    let menuItemList = document.getElementById('menuItemList')


    function showMenu(el, menuId) {
        menuParent.forEach((menuCild) => {
            menuCild.classList.remove('border-1')
            menuCild.classList.remove('border-(--primary-color)')
            menuCild.classList.remove('bg-white')
        })
        el.classList.add('border-1')
        el.classList.add('border-(--primary-color)')
        el.classList.add('bg-white')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ url('api/menu/showMenuClient/') }}/" + menuId,
            type: "GET",
            success: function (data) {
                orderBasket.removeAttribute('disabled')
                menuItemList.innerHTML = ""
                let items = data.menus.menu_items
                items.forEach((item) => {
                    let formatter = new Intl.NumberFormat('en-US')
                    let div = document.createElement('div')
                    div.classList = "w-full px-2 py-1.5 bg-white rounded-xl flex justify-between items-center shadow_box menuItems relative"
                    div.setAttribute('data-menu-item-title', item.title)
                    div.setAttribute('data-menu-item-id', item.id)
                    let inner = `
                        <div class="w-full flex gap-3 items-center relative border-l-1 border-[#f3f3f3]">
                            <div class="w-7/12 relative">
                    `
                    if(item.percent != 0 && item.percent !== 'undefined' && item.percent){
                        let percent = String(item.percent).split('').reverse().join('');
                        inner += `
                        <div class="absolute right-0">
                            <svg width="64" height="78" viewBox="0 0 64 78" class="size-8 rotate-180">
                                <path d="M8 0H56V60L32 78L8 60Z" fill="#FF8A00"/>
                                <circle cx="32" cy="58" r="4" fill="white" opacity="0.9"/>
                                <text x="68" class="in-fa" y="10" textAnchor="middle" rotate="180"
                                fontSize="40" style="font-size: 27px !important;" fontWeight="700" fill="white"
                                class="">${'%'+percent}</text>
                            </svg>
                        </div>`
                    }
                   inner+= `
                        <img src='${item.image ? "{{ asset('storage/') }}/" + item.image : "{{ asset('storage/resturan_img/807c88cc-7948-4f75-88e5-4c4598ab8175_1767800481_6872954f6e4630ba6c0eda84b2ca1882.jpg') }}"}'
                            alt="" class="w-full min-h-24 max-h-24 rounded-xl">
                   </div>
                    <div class="w-full flex h-full flex-col gap-1 items-start">
                        <div class="w-full flex gap-1 items-center">
                            <span class="w-[7px] h-[7px] rounded-full bg-[#f6911e]"></span>
                            <h3 class="text-[14px] font-bold">${ item.title }</h3>
                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <div class="flex gap-1 relative ${ item.discount != 0 && 'through' }">
                                <span class="text-[10px] text-[#f6911e] in-fa">${ formatter.format(item.price) }</span>
                                <span class='text-[10px] text-[#f6911e] ${ item.discount != 0 && 'hidden' } '></span>
                            </div>
                            <div class="flex gap-1 relative ${ item.discount == 0 && 'hidden' }">
                                <span class="text-[10px] text-[#f6911e] font-bold in-fa">${ formatter.format(item.discount) }</span>
                                <span class="text-[10px] text-[#f6911e]">تومان</span>
                            </div>
                        </div>
                        <p class="text-[10px] text-[#6B7280] mt-0.5">${ item.description ?? "" }</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#f5d4ae] text-[#f6911e]">محبوب ها</span>
                            <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                            <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                        </div>
                        <div class="w-full flex items-center gap-1 justify-end pl-1">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3"
                                     fill="#6B7280">
                                    <path d="M53.9 186.1C19.4 220.6 0 267.4 0 316.2v11.5C0 429.5 82.5 512 184.3 512h15.1C301.4 512 384 429.4 384 327.4c0-66.1-27.1-129.2-74.9-174.8L225.9 73.5c-6.3-6-9.9-14.4-9.9-23.2v-13-16C216 9.6 206.4 0 194.7 0c-6.7 0-13 3.2-17.1 8.5L168 21.3l-9.9 13.2c-14.4 19.3-23.2 42.2-25.2 66.2l-.9 10.8c-.3 3.9-.5 7.8-.4 11.7c.2 22.9 6.6 45.4 18.4 65c2.2 3.7 4.6 7.2 7.2 10.6L168 213.3l21.2 28.3c7 9.3 10.8 20.7 10.8 32.4v14c0 22.1-17.9 40-40 40s-40-17.9-40-40V229.3v-2.5V188.3c0-15.6-12.7-28.3-28.3-28.3c-1.3 0-2.6 .1-3.9 .3c-6 .8-11.7 3.6-16.1 8L53.9 186.1zm18.1 53V288c0 48.6 39.4 88 88 88s88-39.4 88-88V274c0-22.1-7.2-43.5-20.4-61.2l-32-42.7c-11.8-15.7-17.4-35.1-15.7-54.6l.9-10.8c.3-3.1 .7-6.1 1.3-9.1c3.1 4.5 6.7 8.8 10.8 12.6L276 187.4c38.3 36.5 60 87.1 60 140C336 402.9 274.9 464 199.4 464H184.3C109 464 48 403 48 327.7V316.2c0-27.7 8.5-54.6 24-77.2z"/>
                                </svg>
                            </div>
                            <span class="text-[8px] text-[#6B7280]">کالری</span>
                            <span class="text-[8px] text-[#6B7280]">120</span>
                        </div>
                    </div>
                </div>
                    <div class="flex gap-1 items-center">
                        <div class="h-full flex flex-col gap-2 items-center justify-between px-1 count" data-item-id="${ item.id }">`
                       if(item.cart){
                                inner+=`
                            <button class="size-6 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="setCount(this, '+', ${item.id})">
                            <span class="text-2xl text-white">+</span>
                            </button>
                            <input type="number" readonly min="1" value="${item.cart.quantity}" class="size-6 text-center font-bold text-xs text-(--secondary-text-color) outline-none" name="" id="">
                                <button class="size-6 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="setCount(this, '-', ${item.id})">
                                    <span class="text-2xl text-white">`

                                    // if(item.cart.quantity > 1){
                                     inner +=`-`
                                    // } else {
                                    //     inner+=`
                                    //         <svg xmlns="http://www.w3.org/2000/svg"
                                    //              class="size-[14px]"
                                    //              viewBox="0 0 448 512">
                                    //             <path fill="white"
                                    //                   d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z" />
                                    //         </svg>`
                                    // }
                                inner+=`
                                </span>
                    </button>`

                        } else {

                                inner += `

                                <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick='addToCart(this, "${item.id}")'>
                                    <span class="text-2xl text-white">+</span>
                                </div>`
                            }
                            inner+=`
                                </div>
                            </div>`
                    if(item.outNumber){
                        inner += `
                        <div class="absolute w-full h-full bg-black/50 rounded-xl flex justify-center items-center top-0 right-0 z-1">
                            <div class="text-lg text-red-500 px-5 py-2 rounded-md border-3 bg-white/20 border-red-500 font-bold -rotate-20">تمام شد</div>
                        </div>`
                    }
                    div.innerHTML = inner
                    menuItemList.appendChild(div)
                })
            },
            error: function () {
                console.log('error showMenu')
            }
        })
    }

    function showItems(el, categoryId) {
        let menuCategories = document.querySelectorAll('.menuCategories')
        menuCategories.forEach((cat) => {
            cat.classList.remove('border-red-600')
            cat.classList.add('border-gray-300')
        })
        el.classList.remove('border-gray-300')
        el.classList.add('border-red-600')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
                url: "{{ url('menuCategory/client-items') }}/" + categoryId,
                type: "GET",
                success: function (data) {
                    menuItemList.innerHTML = ""
                    data.forEach((item) => {
                            let div = document.createElement('div')
                            div.classList = "w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems"
                            div.setAttribute('data-menu-item-title', item.title)
                            div.setAttribute('data-menu-item-id', item.id)
                            let inner = ``
                            if (item.discount != 0) {
                                inner += `
                                <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                    ${item.percent}%
                                </span>`
                            }
                            if (item.discount == 0) {
                                inner += `
                                <span class="text-xs text-white invisible bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">

                                </span>`
                            }
                            inner += `
                            <div class="w-full flex items-center justify-between">
                                <div class="w-10/12 flex flex-row gap-5 items-center">
                                    <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer" onclick="openSingle(this)">
                                        <img src='${item.image ? "{{ asset('storage/') }}/" + item.image : "{{ asset('assets/img/user.png') }}"}'
                                             class="size-22 rounded-lg object-cover border border-gray-300"
                                             alt="${item.title}">
                                        <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                            <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">${item.title}</h3>
                                            <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">${item.description != null ? item.description : ""}</p>
                                        </div>
                                    </div>
                                    <div class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                        <div class="flex flex-row items-center gap-3">

                            <div class="text-left flex flex-col items-end">
                            `
                            let formatter = new Intl.NumberFormat('en-US')
                            if (item.discount == 0) {
                                inner += `
                                    <span class="font-bold text-xs lg:text-sm">${formatter.format(item.price)}تومان</span>
                                `
                            } else {
                                inner += `
                                    <span class="font-bold text-xs lg:text-sm">${formatter.format(item.discount)}  تومان</span>
                                    <span class="text-gray-400 text-[10px] line-through lg:text-sm">${formatter.format(item.price)} تومان</span>
                                `
                            }
                            inner += `

                            </div>
                                    </div>
                                </div>
                            </div>`
                            if (!item.cart) {
                                inner += `
                            <div data-item-id="${item.id}" class="count">
                                <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                    <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                            onclick="addToCart(this ,${item.id})">افزودن +
                                    </button>
                                </div>
                            </div>
                            `
                            } else {
                                inner += `
                                        <div class="relative w-20 lg:w-20">

                                            <div data-item-id="${item.id}" class="count">
                                                <button class="absolute right-0 bottom-1.5 rounded size-6 flex justify-center bg-(--primary-color) fong-bold items-center text-white cursor-pointer"
                                                    onclick="setCount(this, '+', ${item.id})">+
                                                </button>
                                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1"
                                                       min="1" value="${item.cart.quantity}" disabled>
                                                <button class="absolute left-0 bottom-1.5 rounded size-6 flex justify-center bg-(--primary-color) fong-bold items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '-', ${item.id})">

                                                `
                                // if (item.cart.quantity > 1) {
                                    inner += `-`
                                // }
                                // if (item.cart.quantity == 1) {
                                //     inner += `
                                //         <svg xmlns="http://www.w3.org/2000/svg"
                                //              class="size-[14px]" viewBox="0 0 448 512">
                                //             <path fill="white"
                                //                   d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/>
                                //         </svg>
                                //         `
                                // }
                                inner +=  `
                                    </button>
                                    </div>
                                </div>
                            `
                            }
                            inner += `

                                </div>
                                `
                            div.innerHTML = inner
                            menuItemList.appendChild(div)
                            // menuCats.appendChild(elementDiv)
                        }
                    )
                }
                ,
                error: function () {
                    console.log("error")
                }
            }

        )
    }

    
        window.Pusher = Pusher;
window.Echo = new Echo.default({
    broadcaster: 'reverb',
    key: '1gz5uvls0tzdnpjcxp7q',
    wsHost: '127.0.0.1',
    wsPort: 8080,
    forceTLS: false,
    enabledTransports: ['ws']
});

// let userId = "{{ Auth::id() }}"
window.Echo.channel('userOrderNotification' + userId)
    .listen('clientOrders', function(e) {

        console.log('رویداد سفارش مشتری:', e)
        
        let order = e.order;
       
        let container = orderList.children[0].children[0].children[1]
        if (!container) return
        
        if (e.is_cancelled) {
            let card = container.querySelector(`[data-order-id="${order.id}"]`)
            if (card) {
                card.remove()
                
                if (container.children.length === 0) {
                    let orderLink = document.getElementById('orderLink')
                    if (orderLink) {
                        let badge = orderLink.children[0]
                        if (badge) {
                            badge.classList.add('scale-0')
                        }
                        orderLink.removeAttribute('onclick')
                    }
                    orders('close')
                }
            }
            return
        }
        let condition = false
        let delOrdFlag = false
        let cancelOrdFlag = false
        if(order.status.id == 2 || order.status.id == 3 || order.status.id == 5 || order.status.id == 6){
            condition=true
        }
        if(order.status.id == 4){
            delOrdFlag = true
        }
        if(order.status.id == 1){
            cancelOrdFlag = true
        }
        
        let card = container.querySelector(`[data-order-id="${order.id}"]`)
        
        if (!card) {
            let newCard = document.createElement('div');
            newCard.className = 'w-full p-2 border-1 border-[#e4e5ea] rounded-lg'
            newCard.setAttribute('data-order-id', order.id)
            
            let inner = `
                <div class="w-full grid grid-cols-12 gap-2 items-center cursor-pointer order-first-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7 fill-(--secondary-text-color)" onclick="accardeonEvent(this)" viewBox="0 0 448 512">
                        <path d="M160 96v32H288V96c0-35.3-28.7-64-64-64s-64 28.7-64 64zm-32 64H48c-8.8 0-16 7.2-16 16V416c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V176c0-8.8-7.2-16-16-16H320v80c0 8.8-7.2 16-16 16s-16-7.2-16-16V160H160v80c0 8.8-7.2 16-16 16s-16-7.2-16-16V160zm0-32V96c0-53 43-96 96-96s96 43 96 96v32h80c26.5 0 48 21.5 48 48V416c0 53-43 96-96 96H96c-53 0-96-43-96-96V176c0-26.5 21.5-48 48-48h80z"/>
                    </svg>
                    <span class="font-bold text-(--primary-text-color) in-fa col-span-2" onclick="accardeonEvent(this)">#${order.order_code}</span>
                    <span class="bg-[${order.status.color}]/10 border-1 border-[${order.status.color}] text-[${order.status.color}] px-2 py-0.5 rounded-md text-sm col-span-5 text-center order-status">${order.status.title}</span>
                    <button class="text-white bg-rose-500 px-4 py-0.5 ${condition ? `invisible` : ``} rounded-md text-sm cursor-pointer col-span-3" onclick="${delOrdFlag ? `deleteOrder(this, ${order.id})` : cancelOrdFlag ? `canceleOrder(this, ${order.id})` : '' }">${delOrdFlag ? 'حذف' : cancelOrdFlag ? 'لغو' : ''}</button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 transition-all duration-300 angleDown" onclick="accardeonEvent(this)" viewBox="0 0 448 512">
                        <path fill="var(--primary-text-color)" d="M212.7 331.3c6.2 6.2 16.4 6.2 22.6 0l160-160c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L224 297.4 75.3 148.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l160 160z"/>
                    </svg>
                </div>
                <div class="w-full transition-all duration-300 ease-in-out max-h-0 overflow-y-auto accardeon" style="scrollbar-width: thin">
                    <div class="w-full flex flex-row items-center justify-between px-3 pb-4">
                        <div class="flex flex-row items-center gap-3">
                            <span class="text-sm text-(--primary-color)">شماره میز:</span>
                            <span class="text-sm text-(--secondary-text-color) in-fa">${order.qr_code ? order.qr_code.description : '-'}</span>
                        </div>
                        <div class="flex flex-row items-center gap-3">
                            <span class="text-sm text-(--primary-color)"> تعداد آیتم:</span>
                            <span class="text-sm text-(--secondary-text-color) in-fa">${order.carts ? order.carts.length : 0}</span>
                        </div>
                    </div>
                    <div class="w-full border-b border-[#e4e5ea]">
                        <div class="w-full grid grid-cols-12 gap-2 items-center mb-1.5 py-1 rounded-md px-3">
                            <span class="col-span-3 text-(--secondary-text-color) text-sm text-center">تصویر</span>
                            <span class="text-sm text-(--secondary-text-color) col-span-4 text-center">عنوان</span>
                            <span class="text-sm text-(--secondary-text-color) text-center in-fa col-span-2">تعداد</span>
                            <span class="text-sm text-(--secondary-text-color) in-fa col-span-3 text-center">جمع کل</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col pt-2 max-h-[200px] divide-y divide-[#e4e5ea] overflow-y-scroll" style="scrollbar-width: thin;">`;
                    
                    if (order.carts) {
                        order.carts.forEach((cart)=>{
                            let price = 0;
                            if(cart.menu_item.discount == 0){
                                price = cart.menu_item.price * cart.quantity
                            } else {
                                price = cart.menu_item.discount * cart.quantity
                            }
                            inner += `
                                <div class="w-full grid grid-cols-12 gap-2 items-center px-3 py-2">
                                    <img src="{{ asset('storage/') }}/${cart.menu_item.image}" class="col-span-3 size-18 rounded-md" alt="">
                                    <span class="text-sm text-(--secondary-text-color) col-span-4 text-center">${cart.menu_item.title}</span>
                                    <span class="text-sm text-(--secondary-text-color) text-center in-fa col-span-2">${cart.quantity}</span>
                                    <span class="text-sm text-(--secondary-text-color) in-fa col-span-3 text-center">${price}</span>
                                </div>`;
                        });
                    }
                    
                    inner += `
                    </div>
                </div>
            `
            newCard.innerHTML = inner
            container.prepend(newCard)
            
            let orderLink = document.getElementById('orderLink')
            if (orderLink) {
                let badge = orderLink.children[0];
                if (badge) {
                    badge.classList.remove('scale-0')
                }
                orderLink.setAttribute('onclick', 'orders("open")')
            }
            
            return
        }
        
        // اگر کارت وجود دارد، وضعیت را بروزرسانی کن
        let statusEl = card.querySelector('.order-status')
        if (statusEl) {
            statusEl.textContent = order.status.title
            statusEl.style.color = order.status.color
            statusEl.style.borderColor = order.status.color
            statusEl.style.backgroundColor = order.status.color + '10'
        }
        
        // اگر سفارش به وضعیت 5 یا 6 رسید، حذف کن
        if (order.status.id === 5 || order.status.id === 6) {
            card.remove();
            
            if (container.children.length === 0) {
                let orderLink = document.getElementById('orderLink')
                if (orderLink) {
                    let badge = orderLink.children[0]
                    if (badge) {
                        badge.classList.add('scale-0')
                    }
                    orderLink.removeAttribute('onclick')
                }
                orders('close');
            }
        }
    })
   


</script>
<script src="{{ asset('assets/js/menu.js') }}"></script>