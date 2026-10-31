@extends('client.document')
@section('title')
    رینگا | {{ $career->title }}
@endsection
@section('content')

    <style>
        .selectItems::after {
            content: "";
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -8px;
            right: 0;
            background-color: #eb3254;
        }

        .selected::after {
            content: "";
            position: absolute;
            width: 100%;
            transition: all 300ms ease-out;
            margin-bottom: 4px;

        }
    </style>
    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-99999999"
         id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                 onclick="showMessage('close')" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>

        </div>
    </div>
    <div id="parentMenuPage" class="@if(Auth::check()) @if(count(Auth::user()->carts))mb-[100px]@endif @endif">
        <div class="w-11/12 mx-auto flex flex-row-reverse justify-between gap-3 py-3 lg:py-8 rounded-2xl">
            <div class="w-1/2 p-1 lg:p-3 text-xs lg:text-sm h-full font-medium flex items-center justify-end py-2">
                <a href="{{ route('show_career', [$career]) }}" class="text-sky-700">درباره ما</a>
            </div>
            <div class="w-1/2 flex flex-col gap-3">
                <div class="w-full @if(Auth::check() && count($orders)) block @else hidden @endif p-1 lg:p-3 text-xs lg:text-sm h-full font-medium"
                     id="orderLink">
                    <div class="text-sky-700 cursor-pointer" onclick="orders('open')">سفارشات من</div>
                </div>
     
                @include('client.xMamad')
            </div>
        </div>
        <div class="w-full pt-4 lg:pt-16 pb-4 bg-[#F4F8F9]">
            <div class="pb-4 text-lg lg:text-3xl text-center font-bold">
                <h2>{{ $career->title }}</h2>
            </div>
            @if (!$career->banner)
                <img src="{{ asset('storage/images/banner01.jpg') }}"
                     class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
            @else
                <img src="{{ asset('storage/' . $career->banner) }}"
                     class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
            @endif
        </div>

        @include('client.olyafam')

        <div id="orderBasket"
             class="w-full fixed bottom-21 right-0 z-0 @if(Auth::check() && count(Auth::user()->carts)) block @else hidden @endif lg:hidden">
            <button class="w-11/12 mx-auto p-3 flex items-center justify-center lg:p-5 bg-[#eb3254] rounded-md text-center text-white cursor-pointer"
                    onclick="getOpenShoppingCart()('phoneOpen')">
                سبد خرید ( <span>{{ $cartCount }}</span> )
            </button>
        </div>
        <div id="cartList"
             class="w-full fixed lg:hidden top-0 right-0 transition-all duration-300 z-5 max-h-0 overflow-hidden bg-white">
            <div class="flex flex-row justify-between items-center pt-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                     onclick="openShoppingCart('phoneClose')" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
                <div class="flex flex-row items-cetner justify-end gap-3">
                <div class="w-[97px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                    <button class="w-full px-3 h-full flex flex-row justify-center items-center bg-red-500 rounded text-white text-sm lg:text-base cursor-pointer"
                            onclick="deleteShoppingCart(this)">لغو سفارشات
                    </button>
                </div>
                <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                    <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer"
                            onclick="openAddressForm()"> ثبت سفارش
                    </button>
                </div>
                </div>
            </div>
            <div class="w-full transition-all duration-300 flex flex-col items-center gap-3 p-5 overflow-y-auto"></div>
        </div>
        <div id="orderList"
             class="w-full fixed lg:hidden bottom-0 right-0 transition-all h-dvh duration-300 invisible opacity-0 z-5 bg-black/50 flex justify-center items-center">

            <div class="w-11/12 mx-auto rounded bg-white">
                <div class="w-full transition-all duration-300 flex flex-col items-center gap-3 relative">
                    <div class="absolute -top-2 -right-2 bg-white rounded-full z-555">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                             onclick="orders('close')" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                        </svg>
                    </div>
                    <div class="w-full shadow-md overflow-y-auto max-h-[500px]" style="scrollbar-width: thin;">
                        <div class="w-full rounded overflow-x-auto lg:overflow-visible" style="scrollbar-width: thin;">
                            <div
                                    class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                                <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                    <span class="block w-10 lg:w-full text-center">ردیف</span>
                                </div>
                                <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                    <span class="block w-30 lg:w-full">شناسه سفارش</span>
                                </div>
                                <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                                    <span class="block w-[180px] lg:w-full">آدرس</span>
                                </div>
                                <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                                    <span class="block w-[130px] lg:w-full">وضعیت سفارش</span>
                                </div>
                            </div>
                            <div class="bg-white divide-y divide-[#f1f1f4] pb-4"></div>

                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div id="authenticationDiv"
             class="fixed w-full h-dvh bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 opacity-0 invisible">

            <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                     onclick="closeLoginForm()" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
                <h3 class="text-center text-sm font-bold text-gray-800">ابتدا وارد شوید</h3>
                <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                      method="post" id="loginForm">
                    @csrf
                    <input type="number"
                           class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                           name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" required>
                    <div class="w-full" id="login">
                        <div class="w-full flex flex-row items-center gap-3">
                            <input type="number"
                                   class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                   name="code" placeholder="کد" required id="code">
                            <button type="button"
                                    class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                                    onclick="sendCode()" id="countDown">ارسال کد
                            </button>
                        </div>
                    </div>
                    <div class="w-full flex flex-row items-center justify-between" id="loginWay">
                        <a href="{{ route('forget_password') }}"
                           class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                        <span class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
                              onclick="loginWithPassKey(this)">ورود با رمز عبور</span>
                    </div>
                    <button onclick="check(event)"
                            class="focus:bg-[#eb3254] hover:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                        ورود
                    </button>
                    <div class="w-full text-center">
                            <span class="text-[#4B5675] mt-1 md:mt-5 max-md:text-sm">
                                هنوز عضو نشدی؟
                                <a href="{{ route('signup') }}" class="text-[#eb3254] mr-2">ثبت نام!</a>
                            </span>
                    </div>
                </form>
            </div>
        </div>


        <div id="setAddress"
             class="fixed w-full h-[calc(100vh-45px)] bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 z-99999 opacity-0 invisible section">
            <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                     onclick="closeSection()" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
                <h3 class="text-center text-sm font-bold text-gray-800">انتخاب آدرس</h3>
                <div class="flex flex-col items-center mt-6 gap-3 w-full">
                    <select name="address" id="address" onchange="setOrder('address')"
                            class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer border-1 border-gray-300 rounded-md @if(Auth::check() && !count(Auth::user()->addresses)) hidden @endif">
                        <option>انتخاب کنید</option>
                        @if(Auth::check())
                            @foreach (Auth::user()->addresses as $address)
                                <option value="{{ $address->id }}">{{ $address->address }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="flex flex-col items-center my-6 gap-3 w-full">
                        <textarea
                                class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                                name="newAddress" placeholder="آدرس خود را وارد کنید" id="newAddress"></textarea>
                        <button onclick="saveAddress()"
                                class="focus:bg-[#eb3254] hover:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="sendWay"
             class="fixed w-full h-[calc(100vh-45px)] bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 z-99999 opacity-0 invisible section">
            <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                     onclick="closeSection()" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
                {{-- <h3 class="text-sm font-bold text-center">انتخاب شیوه ارسال</h3> --}}
                <div class="w-full flex flex-col items-center gap-3 mt-6">
                    {{-- <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"
                         onclick="setAddress()">انتخاب آدرس
                    </div> --}}
                    <select onchange="setOrder('slug', this)"
                            class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer border-1 border-gray-300 rounded-md @if(Auth::check() && !count(Auth::user()->addresses)) hidden @endif">
                        <option>انتخاب میز</option>
                        @foreach ($career->qr_codes as $table)
                            <option value="{{ $table->slug }}" @if($slug && $table->slug == $slug) selected @endif>{{ $table->description }}</option>
                        @endforeach
                    </select>
                    @if($slug)
                        <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"
                             onclick="setOrder('slug')">
                            سرو در
                            @php
                                $tableName = $career->qr_codes->where('slug', $slug)->first();
                            @endphp
                            {{ $tableName->description }}
                        </div>
                    @endif
                    {{--                    <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"--}}
                    {{--                         onclick="setOrder('address', this)">--}}
                    {{--                         تحویل در محل--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    @php
        $menu_id = $career->menus[0]->id;
    @endphp
    <script>
        let orderLink = document.getElementById('orderLink')
        let firstMenu = ""
        document.querySelectorAll('.menuParent').forEach((menu) => {
            if (menu.parentElement.getAttribute('data-menu-id') == "{{ $menu_id }}") {
                firstMenu = menu
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
            countDown.classList.remove('bg-[#eb3254]')
            countDown.classList.add('bg-[#eb3254]/50')
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
                            countDown.classList.add('bg-[#eb3254]')
                            countDown.classList.remove('bg-[#eb3254]/50')
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
            console.log(el)
            let shoppingCartOrders = document.querySelectorAll('.shoppingCartOrders')
            let menuItemsInPage = document.querySelectorAll('.menuItems')

            // el.setAttribute('disabled', true)

            el.innerHTML = `
                <div class="w-5 h-5 border-2 border-gray-200 border-t-gray-500 rounded-full animate-spin"></div>
            `
            if (state == "+") {
                el.parentElement.children[1].value++
                orderBasket.children[0].children[0].innerText++
                shoppingCartCount.innerText++
                length++
            }
            if (el.parentElement.children[1].value != 0 && orderBasket.children[0].children[0].innerText != 0) {
                if (state == "-") {
                    el.parentElement.children[1].value--
                    orderBasket.children[0].children[0].innerText--
                    shoppingCartCount.innerText--
                    length--
                }
            }

            if (el.parentElement.children[1].value == 0) {
                console.log('the count of item is zero');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ url('/api/cart/delete') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'menu_item_id': itemId,
                        'user_id': userId
                    },
                    success: function (data) {
                        console.log(data)
                        console.log(cartList.children[1].children.length)
                        if(cartList.children[1].children.length == 1){
                            cartList.classList.add('max-h-0')
                            cartList.classList.remove('min-h-[calc(100vh-57px)]')
                            cartList.children[1].classList.remove('h-[calc(100vh-89px)]')
                            orderBasket.children[0].removeAttribute('disabled')
                        }
                        shoppingCartOrders.forEach((item)=>{
                            if(item.getAttribute('data-menu-item-id') == data.menu_item_id){
                                item.remove()
                            }
                        })
                        menuItemsInPage.forEach((menuItem)=>{
                            if(menuItem.getAttribute('data-menu-item-id') == data.menu_item_id){
                                menuItem.children[1].children[1].innerHTML = `
                                    <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                        <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                                onclick="addToCart(this, ${data.menu_item_id})">افزودن +
                                        </button>
                                    </div>
                                `
                            }
                        })
                        if (orderBasket.children[0].children[0].innerText == 0) {
                            orderBasket.classList.remove('block')
                            orderBasket.classList.add('hidden')
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
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
                        el.removeAttribute('disabled')
                        if (state == "+") {
                            el.innerHTML = "+"
                            el.parentElement.children[1].value == 1 ? el.parentElement.children[2].innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512"><path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/></svg>` : el.parentElement.children[2].innerHTML = "-"
                        }
                        if (state == "-") {
                            el.innerHTML = "-"
                            el.parentElement.children[1].value == 1 ? el.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512"><path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/></svg>` : el.innerHTML = "-"
                        }
                        menuItemsInPage.forEach((menuItem)=>{
                            if(menuItem.getAttribute('data-menu-item-id') == data.menu_item_id){
                                console.log(menuItem.children[1].children[1])
                                menuItem.children[1].children[1].children[0].children[1].value = data.quantity
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
            // return
            let count = document.querySelectorAll('.count')
            el.innerHTML = `
                <div class="w-5 h-5 border-2 border-gray-200 border-t-green-500 rounded-full animate-spin"></div>
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
                        if (flag) {
                            length = "{{ $cartCount }}"
                            if (orderBasket.classList.contains('hidden')) {
                                orderBasket.classList.remove('hidden')
                                orderBasket.classList.add('block')
                                parent.classList = "mb-[113px] lg:mb-0"
                            }
                            length++
                            orderBasket.children[0].children[0].innerText++
                            shoppingCartCount.innerText = length
                            el.parentElement.parentElement.innerHTML = `
                                <div class="relative w-16 lg:w-20">
                                    <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '+', ${data.menu_item_id})">+</button>
                                    <input type="number" class="outline-none w-full rounded text-center text-sm py-1" min="1" value="1" disabled>
                                    <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '-', ${data.menu_item_id})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512">
                                            <path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/>
                                        </svg>
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
            el.innerHTML = "<div class='size-5 border-3 border-white border-t-[#eb3254] rounded-full animate-spin'></div>"
            let cartItems = cartList.children[1].children
            let cartIds = []
            for(let item of cartItems){
                cartIds.push(item.getAttribute('data-menu-item-id'))
            }
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
                    el.innerHTML = text
                    orderBasket.children[0].children[0].innerText = 0
                    length = 0
                    cartList.classList.add('max-h-0')
                    cartList.classList.remove('min-h-[calc(100vh-57px)]')
                    cartList.children[1].classList.remove('h-[calc(100vh-89px)]')
                    orderBasket.children[0].removeAttribute('disabled')
                    orderBasket.classList.add('hidden')
                    orderBasket.classList.remove('block')
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
                                    orderLink.classList.remove('hidden')
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
                                if (cartLength != 0) {
                                    orderBasket.classList.remove('hidden')
                                }
                                orderBasket.children[0].innerHTML = `  سبد خرید ( <span>${cartLength}</span> )`
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
                            } if(data.validate && data.checkCode) {
                                showMessage('open')
                                element.innerHTML = `
                                    <span> خوش اومدی ${data.validate.name ?? 'کاربر'} ${data.validate.family ?? 'رینگا'} عزیز</span>
                                `
                                if (data.orders.length > 0) {
                                    orderLink.classList.remove('hidden')
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
                                if (cartLength != 0) {
                                    orderBasket.classList.remove('hidden')
                                }
                                orderBasket.children[0].innerHTML = `  سبد خرید ( <span>${cartLength}</span> )`
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
            setOrders = document.querySelectorAll('.set')
            authenticationDiv.classList.add('invisible')
            authenticationDiv.classList.add('opacity-0')
            authenticationDiv.children[0].classList.add('scale-95')
            setOrders.forEach((button) => {
                button.innerText = "افزودن +"
            })
        }

        let btn = ""

        function openShoppingCart(state) {
            console.log('shopping cart')
            if (state == 'phoneOpen') {
                btn = orderBasket.children[0].innerHTML
                cartList.children[1].innerHTML = ""
                orderBasket.children[0].disabled = true
                orderBasket.children[0].classList.add('cursor-no-drop')
                orderBasket.children[0].innerHTML = " <div class='size-7 border-3 border-white border-t-[#eb3254] rounded-full animate-spin'></div>"
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
                        console.log(data)
                        cartList.classList.remove('max-h-0')
                        cartList.classList.add('min-h-[calc(100vh-57px)]')
                        cartList.children[1].classList.add('h-[calc(100vh-89px)]')
                        orderBasket.children[0].innerHTML = btn
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
                                <!--<span class="absolute -top-1 -right-2 bg-[#eb3254] px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->

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
                                            <div class="relative w-16 lg:w-20">
                                                <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '+', ${item.id})">+
                                                </button>
                                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1"
                                                       min="1" value="${item.quantity}" disabled>
                                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '-', ${item.id})">
                                                        `
                            if(item.quantity > 1){
                                menuItemEl += `-`
                            }
                            if(item.quantity == 1){
                                menuItemEl += `<svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512">
                                                                                <path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"></path>
                                                                            </svg>`
                            }
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
                cartList.children[1].classList.remove('h-[calc(100vh-89px)]')
                cartList.classList.remove('min-h-[calc(100vh-57px)]')
                cartList.classList.add('max-h-0')
                orderBasket.children[0].removeAttribute('disabled')
                orderBasket.children[0].classList.remove('cursor-no-drop')
                orderBasket.children[0].innerHTML = btn
                orderBasket.children[0].disabled = false
            }
        }

        let counterNum = 0

        function orders(state) {
            if (state == "open") {
                orderList.children[0].children[0].children[1].children[0].children[1].innerHTML = ""

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
                        data.forEach((item) => {
                            if (item.status != 4) {
                                let parentDiv = document.createElement('div')
                                parentDiv.classList = "bg-white divide-y divide-[#f1f1f4]"
                                let html = `
                                <div
                                    class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] py-2">
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                        <span class="block w-10 lg:w-full">${counterNum}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                        <span class="block w-30 lg:w-full">${item.order_code}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                        <span
                                            class="block w-[180px] lg:w-full">${item.address ? item.address.address : item.table}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                        <span
                                            class="block w-[130px] lg:w-full">${item.status}</span>
                                    </div>
    `
                                if (item.status == "در انتظار تایید") {
                                    html += `
                                        <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                        <span
                                            class="px-3 block w-[120px] py-1 rounded bg-red-500 text-white lg:w-full cursor-pointer" onclick="deleteOrder(this, ${item.id})">لغو سفارش</span>
                                    </div>`
                                }
                                if (item.status == "ارسال شد") {
                                    html += `
                                        <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                        <span
                                            class="px-3 block w-[120px] py-1 rounded bg-red-500 text-white lg:w-full cursor-pointer" onclick="deleteOrder(this, ${item.id})">حذف</span>
                                    </div>`
                                }
                                html += `</div>`
                                parentDiv.innerHTML = html

                                orderList.children[0].children[0].children[1].children[0].children[1].appendChild(parentDiv)
                                counterNum++
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
            if (state == "close") {
                orderList.classList.add('invisible')
                orderList.classList.add('opacity-0')
            }
        }

        function deleteOrder(el, id) {


            el.innerHTMl = "<div class='w-5 h-5 border-2 border-white border-t-red-500 rounded-full animate-spin'></div>"
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('orders/delete') }}/" + id,
                type: "GET",
                success: function (data) {
                    if (data.length == 0) {
                        orderLink.classList.add('hidden')
                        orders('close')
                    }
                    el.parentElement.parentElement.parentElement.remove()
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
            let count = document.querySelectorAll('.count')
            orderLink.classList.remove('hidden')
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
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
                    count.forEach((item) => {
                        console.log(item)
                        item.innerHTML = `
                        <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                            <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                    onclick="addToCart(this, ${item.getAttribute('data-item-id')})">افزودن +
                            </button>
                        </div>
                        `
                    })
                    orderBasket.classList.remove('block')
                    orderBasket.classList.add('hidden')
                    cartList.children[1].innerHTML = ""
                    cartList.children[1].classList.remove('h-[calc(100vh-89px)]')
                    cartList.classList.remove('min-h-[calc(100vh-57px)]')
                    cartList.classList.add('max-h-0')
                    orderBasket.children[0].disabled = false
                    showMessage('open')
                    element.innerHTML = `
                        <span>سفارش شما ثبت شد</span>
                        <span class="text-green-500">!</span>
                        `
                    orderBasket.children[0].innerHTML = `  سبد خرید ( <span>0</span> )`
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

        function getOpenShoppingCart() {
            console.log('get open shopping cart')
            return openShoppingCart;
        }</script>

    <script>


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
    </script>

    @include('client.menuJs')
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection
