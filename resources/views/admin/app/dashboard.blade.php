@extends('admin.app.panel')
@section('title', 'رینگا | داشبورد')
@section('content')
    {{--  topol and miss.khodagholipour  --}}
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

    @if (!isset(Auth::user()->request) && !in_array(1, Auth::user()->role->pluck('id')->toArray()))
        <a href="{{ route('user.request', [Auth::user()]) }}" onclick="setRequest(event)"
           class="font-bold text-blue-500 text-xs lg:text-sm mb-4 inline-block hover:text-blue-700 transition-colors duration-200">درخواست نمایندگی</a>
        <script>
            let message = document.getElementById('message')
            let element = document.createElement('div')
            element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"
            function setRequest(ev){
                ev.preventDefault()
                showMessage('open')
                element.innerHTML = `
                    <span class="text-green-500">✓</span>
                    <span>درخواست شما با موفقیت ثبت شد</span>
                `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                    location.assign("{{ route('user.request', [Auth::user()]) }}")
                }, 1500)
            }
            function showMessage(state) {
                if (state == 'open') {
                    message.classList.remove('top-0', 'opacity-0', 'invisible')
                    message.classList.add('top-1/10')
                }
                if (state == 'close') {
                    message.classList.remove('top-1/10')
                    message.classList.add('top-0', 'opacity-0', 'invisible')
                    setTimeout(() => {
                        element.remove()
                    }, 300)
                }
            }
        </script>
    @endif

    {{-- One Combined Card for Restaurants & Pages --}}
    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mt-4 overflow-hidden">

        {{-- Pages Section --}}
        <div class="pages-section">
            <div onclick="toggleDropdown(this)" class="cursor-pointer">
                <div class="flex justify-between items-center p-4 group">
                    <div class="flex items-center gap-2">
                        <div class="p-2 bg-(--primary-color)/10 rounded-lg group-hover:bg-(--hover-primary-color)/20 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-(--primary-color)/50" viewBox="0 0 512 512">
                                <path d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                            </svg>
                        </div>
                        <span class="font-bold text-gray-700">صفحه‌های من</span>
                    </div>
                    <div class="flex items-center gap-2">
                        {{-- <span class="text-sm text-gray-500">{{ count(Auth::user()->pages) }}</span> --}}
                        <svg class="dropdown-arrow w-4 h-4 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
                <div class="p-3 space-y-2 pr-10 max-h-48 overflow-y-auto">
                    @if(Auth::user()->pages && count(Auth::user()->pages) > 0)
                        @foreach(Auth::user()->pages as $page)
                            <a href="{{ route('pages.single' , [$page->id]) }}"
                               class="flex items-center gap-3 p-2 rounded-lg hover:bg-(--primary-color)/10 transition-all duration-200 group">
                                <img src="{{ $page->logo_path ? asset('storage/' . $page->logo_path) : asset('assets/img/user.png') }}" alt="{{ $page->title }}"
                                     class="size-8 rounded-full object-cover border border-(--primary-color)/20 group-hover:border-(--primary-color)/40 transition-all">
                                <span class="text-sm text-gray-700 group-hover:text-(--primary-color) transition-colors flex-1">{{ $page->title }}</span>
{{--                                <svg class="w-3 h-3 text-gray-300 group-hover:text-purple-400 transition-all group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>--}}
{{--                                </svg>--}}
                            </a>
                        @endforeach
                    @else
                        <div class="text-center py-6">
                            <p class="text-gray-400 text-sm">هیچ صفحه‌ای یافت نشد</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- My Scans Section --}}
    <div class="bg-white rounded-xl shadow-md mt-5 overflow-hidden">
        <div class="p-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-green-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-green-500" viewBox="0 0 448 512">
                            <path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-gray-700">اسکن‌های من</span>
                </div>
                <span class="text-sm font-bold text-green-600">{{ Auth::user()->scan_count }}</span>
            </div>
        </div>
    </div>

    {{-- My Contacts Section --}}
    <div class="bg-white rounded-xl shadow-md mt-5 overflow-hidden">
        <div class="p-5">
            <div class="mb-4">
                <span class="font-bold text-gray-700">ارتباطات من</span>
            </div>

            <div class="relative flex flex-row flex-wrap gap-2">
                @php
                    $x = 0;
                @endphp
                @foreach($myContacts as $contact)
                    <div class="relative size-11 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full hover:scale-110 hover:z-20 transition-all duration-300 cursor-pointer shadow-md"
                         onclick="userShow('open', {{ $contact->contact['id'] }})">
                        <img src="{{ $contact->contact->main_image ? asset('storage/'.$contact->contact->main_image) : asset('assets/img/user.png') }}"
                             class="size-full rounded-full border-2 border-white object-cover" alt="">
                    </div>
                    @php $x++; @endphp
                @endforeach

                @if(count($myContacts) > 0)
                    <div class="relative size-11 bg-gray-200 rounded-full hover:scale-110 transition-all duration-300 flex justify-center items-center cursor-pointer shadow-md text-sm font-bold text-gray-600"
                         onclick="pap_up_all_customer('open')">
                        +{{ count($myContacts) }}
                    </div>
                @endif
            </div>

            @if(count($myContacts) == 0)
                <div class="text-center py-6">
                    <p class="text-gray-400 text-sm">هیچ ارتباطی یافت نشد</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Popups --}}
    <div class="w-full h-[100vh] px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-[99999] transition-all duration-300 invisible opacity-0"
         id="pap_up_all_customer_items">
        <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center">
            <div class="w-full lg:w-3/4 bg-white rounded-2xl overflow-hidden shadow-2xl">
                <div class="bg-(--primary-color) p-4 flex justify-between items-center">
                    <h2 class="text-white font-bold text-lg">ارتباطات من</h2>
                    <button onclick="pap_up_all_customer('close')" class="text-white hover:bg-white/20 p-2 rounded-full transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 max-h-[70vh] overflow-y-auto">
                    @if($myContacts)
                        @foreach($myContacts as $contact)
                            <a href="{{ route('client.loadLink', [$contact->pages[0]['id']]) }}"
                               class="flex justify-between items-center p-3 border-b border-gray-100 hover:bg-blue-50 rounded-lg transition-all duration-200 group">
                                <div class="flex gap-3 items-center">
                                    <img src="{{ $contact->contact->main_image ? asset('storage/'.$contact->contact->main_image) : asset('assets/img/user.png') }}"
                                         class="size-10 rounded-full object-cover" alt="">
                                    <div>
                                        <div class="font-medium text-gray-800 group-hover:text-(--hover-primary-color) transition-colors text-sm">
                                            {{ $contact->contact->name ?? 'بدون نام' }} {{ $contact->contact->family ?? '' }}
                                        </div>
                                        <div class="text-xs text-gray-400">{{ $contact->contact->email ?? 'بدون ایمیل' }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- User Popup --}}
    <div id="showUserPopup"
         class="w-full h-dvh px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-[99999] transition-all duration-300 opacity-0 invisible">
        <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center">
            <div class="w-full lg:w-3/4 bg-white rounded-2xl overflow-hidden shadow-2xl max-h-[85vh] overflow-y-auto"
                 id="userData"></div>
        </div>
    </div>

    <script>
        // Toggle dropdown function
        function toggleDropdown(element) {
            // Find the clicked dropdown content and arrow
            const clickedDropdown = element.nextElementSibling;
            const clickedArrow = element.querySelector('.dropdown-arrow');

            // Check if the clicked one is currently closed
            const isClickedClosed = clickedDropdown.classList.contains('max-h-0');

            // Find both section containers and their arrows
            const restaurantSection = document.querySelector('.restaurant-section');
            const pagesSection = document.querySelector('.pages-section');

            const restaurantDropdown = restaurantSection?.querySelector('.dropdown-content');
            const pagesDropdown = pagesSection?.querySelector('.dropdown-content');
            const restaurantArrow = restaurantSection?.querySelector('.dropdown-arrow');
            const pagesArrow = pagesSection?.querySelector('.dropdown-arrow');

            // First, close both dropdowns
            if (restaurantDropdown && restaurantDropdown !== clickedDropdown) {
                restaurantDropdown.classList.remove('max-h-[400px]', 'opacity-100');
                restaurantDropdown.classList.add('max-h-0', 'opacity-0');
                if (restaurantArrow) restaurantArrow.classList.remove('rotate-180');
            }

            if (pagesDropdown && pagesDropdown !== clickedDropdown) {
                pagesDropdown.classList.remove('max-h-[400px]', 'opacity-100');
                pagesDropdown.classList.add('max-h-0', 'opacity-0');
                if (pagesArrow) pagesArrow.classList.remove('rotate-180');
            }

            // Then toggle the clicked one
            if (isClickedClosed) {
                clickedDropdown.classList.remove('max-h-0', 'opacity-0');
                clickedDropdown.classList.add('max-h-[400px]', 'opacity-100');
                if (clickedArrow) clickedArrow.classList.add('rotate-180');
            } else {
                clickedDropdown.classList.remove('max-h-[400px]', 'opacity-100');
                clickedDropdown.classList.add('max-h-0', 'opacity-0');
                if (clickedArrow) clickedArrow.classList.remove('rotate-180');
            }
        }
        let pap_up_all_customer_items = document.getElementById('pap_up_all_customer_items')
        function pap_up_all_customer(item) {
            if (item == 'open') {
                pap_up_all_customer_items.classList.remove('invisible', 'opacity-0')
            }
            if (item == 'close') {
                pap_up_all_customer_items.classList.add('invisible', 'opacity-0')
            }
        }

        let showUserPopup = document.getElementById('showUserPopup')
        let userDataEl = document.getElementById('userData')

        function userShow(state, userId) {
            if (state == 'open') {
                showUserPopup.classList.remove('invisible', 'opacity-0')
                userDataEl.innerHTML = `
                    <div class="flex justify-center items-center py-20">
                        <div class="size-10 border-4 border-blue-200 border-t-blue-500 rounded-full animate-spin"></div>
                    </div>
                `
                userData(userId)
            }
            if (state == 'close') {
                showUserPopup.classList.add('invisible', 'opacity-0')
            }
        }

        function userData(userId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('userData') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': userId
                },
                success: function (data) {
                    let fullName = (data.name ?? 'بدون نام') + ' ' + (data.family ?? '')
                    let phoneNum = data.phoneNumber
                    let email = data.email ?? 'بدون ایمیل'

                    let rolesHtml = ''
                    data.roles.forEach((role) => {
                        rolesHtml += `<span class="inline-block bg-gray-100 px-2 py-0.5 rounded-md text-xs m-0.5">${role}</span>`
                    })

                    let html = `
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 flex justify-between items-center sticky top-0">
                            <h2 class="text-white font-bold text-lg">پروفایل کاربر</h2>
                            <button onclick="userShow('close', null)" class="text-white hover:bg-white/20 p-2 rounded-full transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-col items-center mb-5">
                                <img class="size-24 rounded-full border-4 border-blue-200 object-cover"
                                     src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '{{ asset('assets/img/user.png') }}'}"
                                     alt="user__picture">
                                <h3 class="font-bold text-lg mt-3">${fullName}</h3>
                                <span class="text-xs text-gray-500 mt-1">${data.phoneNumber}</span>
                            </div>
                            <div class="space-y-3">
                                <div class="flex flex-col sm:flex-row sm:justify-between p-3 bg-gray-50 rounded-lg text-sm">
                                    <span class="text-gray-500 font-medium">شماره تلفن:</span>
                                    <span class="text-gray-800">${phoneNum} <mark class="bg-green-100 text-green-700 px-1.5 py-0.5 rounded text-xs mr-2">تایید شده</mark></span>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between p-3 bg-gray-50 rounded-lg text-sm">
                                    <span class="text-gray-500 font-medium">ایمیل:</span>
                                    <span class="text-gray-800">${email}</span>
                                </div>
                                <div class="flex flex-col sm:flex-row sm:justify-between p-3 bg-gray-50 rounded-lg text-sm">
                                    <span class="text-gray-500 font-medium">نقش‌ها:</span>
                                    <div class="text-gray-800">${rolesHtml}</div>
                                </div>
                            </div>
                        </div>
                    `
                    userDataEl.innerHTML = html
                },
                error: function () {
                    userDataEl.innerHTML = '<div class="text-center text-red-500 p-8 text-sm">خطا در دریافت اطلاعات کاربر</div>'
                }
            })
        }
    </script>
@endsection