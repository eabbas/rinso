@extends('admin.app.panel')
@section('title', 'رینسو | داشبورد')

@section('content')

    {{-- پیام شناور --}}
    <div class="fixed top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-11/12 sm:w-3/4 lg:w-1/3 bg-white rounded-2xl shadow-xl border border-gray-100 transition-all duration-500 z-[99999999]"
        id="message">
        <div class="relative min-h-12 flex items-center justify-center px-10">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="size-4 absolute top-1/2 -translate-y-1/2 right-4 cursor-pointer text-gray-400 hover:text-red-500 transition"
                onclick="showMessage('close')" viewBox="0 0 384 512">
                <path fill="currentColor"
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>
        </div>
    </div>

    {{-- عنوان داشبورد --}}
    <div class="w-full mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-xl lg:text-2xl font-bold text-gray-800">داشبورد </h1>
                <p class="text-xs sm:text-sm text-gray-400 mt-2">
                    به پنل مدیریت رینسو خوش آمدید.
                </p>
            </div>
        </div>
    </div>

    {{-- درخواست نمایندگی --}}
    @if (!isset(Auth::user()->request) && !in_array(1, Auth::user()->role->pluck('id')->toArray()))
        <a href="{{ route('user.request', [Auth::user()]) }}" onclick="setRequest(event)"
            class="mb-5 flex items-center justify-between gap-3 p-4 rounded-2xl border border-blue-100 bg-blue-50/70 hover:bg-blue-50 transition-all group">

            <div class="flex items-center gap-3">
                <div class="size-10 rounded-xl bg-white flex items-center justify-center text-(--primary-color)">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-gray-700">درخواست نمایندگی</h3>
                    <p class="text-xs text-gray-400 mt-1">برای همکاری با رینسو درخواست خود را ثبت کنید.</p>
                </div>
            </div>

            <svg class="size-5 text-(--primary-color) group-hover:-translate-x-1 transition-transform" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6" />
            </svg>
        </a>

        <script>
            let message = document.getElementById('message')
            let element = document.createElement('div')

            element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

            function setRequest(ev) {
                ev.preventDefault()

                showMessage('open')

                element.innerHTML = `
                    <span class="text-green-500">✓</span>
                    <span class="text-gray-700">درخواست شما با موفقیت ثبت شد</span>
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

    {{-- کارت صفحه‌های من --}}
    <div
        class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">

        <div class="pages-section">
            <div onclick="toggleDropdown(this)" class="cursor-pointer group">
                <div class="flex justify-between items-center p-4 sm:p-5">

                    <div class="flex items-center gap-3">
                        <div
                            class="size-11 rounded-xl bg-(--primary-color)/10 flex items-center justify-center group-hover:bg-(--primary-color)/15 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-(--primary-color)"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z" />
                            </svg>
                        </div>

                        <div>
                            <h2 class="font-bold text-gray-800 text-sm sm:text-base">صفحه‌های من</h2>
                            <p class="text-xs text-gray-400 mt-1">مدیریت و مشاهده صفحه‌های ساخته‌شده</p>
                        </div>
                    </div>

                    <svg class="dropdown-arrow size-5 text-gray-400 transition-transform duration-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            <div class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
                <div class="border-t border-gray-100 p-3 sm:p-4 space-y-2 max-h-64 overflow-y-auto">

                    @if (Auth::user()->pages && count(Auth::user()->pages) > 0)

                        @foreach (Auth::user()->pages as $page)
                            <a href="{{ route('pages.single', [$page->user_name]) }}"
                                class="flex items-center gap-3 p-3 rounded-xl hover:bg-(--primary-color)/5 transition-all duration-200 group">

                                <img src="{{ $page->logo_path ? asset('storage/' . $page->logo_path) : asset('assets/img/user.png') }}"
                                    alt="{{ $page->title }}"
                                    class="size-10 rounded-xl object-cover border border-gray-100">

                                <span
                                    class="text-sm text-gray-700 group-hover:text-(--primary-color) transition-colors flex-1">
                                    {{ $page->title }}
                                </span>

                                <svg class="size-4 text-gray-300 group-hover:text-(--primary-color) transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m9 18 6-6-6-6" />
                                </svg>
                            </a>
                        @endforeach
                    @else
                        <div class="text-center py-8">
                            <div class="size-12 mx-auto mb-3 rounded-2xl bg-gray-50 flex items-center justify-center">
                                <svg class="size-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                        d="M4 5.5A2.5 2.5 0 0 1 6.5 3h11A2.5 2.5 0 0 1 20 5.5v13a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 18.5z" />
                                </svg>
                            </div>
                            <p class="text-gray-400 text-sm">هنوز صفحه‌ای ایجاد نکرده‌اید.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- کارت اسکن‌ها --}}
    <div
        class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 mt-5 overflow-hidden">
        <div class="p-4 sm:p-5 flex justify-between items-center">

            <div class="flex items-center gap-3">
                <div class="size-11 rounded-xl bg-green-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-green-600" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 0 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 0 1 0 32z" />
                    </svg>
                </div>

                <div>
                    <h2 class="font-bold text-gray-800 text-sm sm:text-base">اسکن‌های من</h2>
                    <p class="text-xs text-gray-400 mt-1">تعداد دفعات اسکن صفحه‌های شما</p>
                </div>
            </div>

            <div class="text-left">
                <span class="text-xl sm:text-2xl font-bold text-green-600 tabular-nums in-fa">
                    {{ Auth::user()->scan_count }}
                </span>
                <p class="text-[10px] text-gray-400 mt-1">اسکن</p>
            </div>
        </div>
    </div>

    {{-- کارت ارتباطات --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm mt-5 overflow-hidden">
        <div class="p-4 sm:p-5">

            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center gap-3">
                    <div class="size-11 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-6 lg:w-8 text-(--primary-color)" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>

                    </div>

                    <div>
                        <h2 class="font-bold text-gray-800 text-sm sm:text-base">ارتباطات من</h2>
                        <p class="text-xs text-gray-400 mt-1">افرادی که با صفحه‌های شما در ارتباط هستند</p>
                    </div>
                </div>

                <span
                    class="text-xs font-bold text-(--primary-color) bg-(--primary-color)/10 px-3 py-1.5 rounded-lg in-fa">
                    {{ count($myContacts) }} نفر
                </span>
            </div>

            <div class="flex flex-row flex-wrap items-center gap-3">

                @foreach ($myContacts as $contact)
                    <div class="relative size-12 rounded-full cursor-pointer hover:scale-110 hover:z-20 transition-all duration-300"
                        onclick="userShow('open', {{ $contact->contact['id'] }})">

                        <img src="{{ $contact->contact->main_image ? asset('storage/' . $contact->contact->main_image) : asset('assets/img/user.png') }}"
                            class="size-full rounded-full border-2 border-white object-cover shadow-sm" alt="contact">

                    </div>
                @endforeach

                @if (count($myContacts) > 0)
                    <button type="button"
                        class="size-12 rounded-full bg-blue-50 hover:bg-blue-100 transition-all flex justify-center items-center text-sm font-bold text-(--primary-color)"
                        onclick="pap_up_all_customer('open')">
                        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                        </svg>
                    </button>
                @endif

            </div>

            @if (count($myContacts) == 0)
                <div class="text-center py-8">
                    <div class="size-12 mx-auto mb-3 rounded-2xl bg-gray-50 flex items-center justify-center">
                        <svg class="w-6 lg:w-8 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="1.5"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </div>
                    <p class="text-gray-400 text-sm">هنوز ارتباطی ثبت نشده است.</p>
                </div>
            @endif

        </div>
    </div>

    {{-- پنجره تمام ارتباطات --}}
    <div class="w-full h-dvh px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-[99999] transition-all duration-300 invisible opacity-0 backdrop-blur-sm"
        id="pap_up_all_customer_items">

        <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center p-3 sm:p-5">
            <div class="w-full lg:w-3/4 bg-white rounded-2xl overflow-hidden shadow-2xl">

                <div class="bg-(--primary-color) p-4 sm:p-5 flex justify-between items-center">
                    <div>
                        <h2 class="text-white font-bold text-base sm:text-lg">ارتباطات من</h2>
                        <p class="text-white/70 text-xs mt-1">فهرست تمام ارتباطات شما</p>
                    </div>

                    <button type="button" onclick="pap_up_all_customer('close')"
                        class="text-white hover:bg-white/20 p-2 rounded-xl transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-3 sm:p-5 max-h-[70vh] overflow-y-auto">

                    @if ($myContacts)
                        @foreach ($myContacts as $contact)
                            @if (isset($contact->pages[0]))
                                <a href="{{ route('client.loadLink', [$contact->pages[0]['id']]) }}"
                                    class="flex justify-between items-center p-3 sm:p-4 border-b border-gray-100 hover:bg-blue-50/70 rounded-xl transition-all duration-200 group">

                                    <div class="flex gap-3 items-center min-w-0">
                                        <img src="{{ $contact->contact->main_image ? asset('storage/' . $contact->contact->main_image) : asset('assets/img/user.png') }}"
                                            class="size-11 rounded-xl object-cover border border-gray-100" alt="">

                                        <div class="min-w-0">
                                            <div
                                                class="font-bold text-gray-700 group-hover:text-(--primary-color) transition-colors text-sm">
                                                {{ $contact->contact->name ?? 'بدون نام' }}
                                                {{ $contact->contact->family ?? '' }}
                                            </div>
                                            <div class="text-xs text-gray-400 mt-1 truncate">
                                                {{ $contact->contact->email ?? 'بدون ایمیل' }}
                                            </div>
                                        </div>
                                    </div>

                                    <svg class="size-4 text-gray-300 group-hover:text-(--primary-color) transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- پنجره اطلاعات کاربر --}}
    <div id="showUserPopup"
        class="w-full h-dvh px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-[99999] transition-all duration-300 opacity-0 invisible backdrop-blur-sm">

        <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center p-3 sm:p-5">
            <div class="w-full lg:w-3/4 bg-white rounded-2xl overflow-hidden shadow-2xl max-h-[85vh] overflow-y-auto"
                id="userData"></div>
        </div>
    </div>

    <script>
        // باز و بسته کردن منوی صفحه‌ها
        function toggleDropdown(element) {
            const clickedDropdown = element.nextElementSibling
            const clickedArrow = element.querySelector('.dropdown-arrow')

            const isClickedClosed = clickedDropdown.classList.contains('max-h-0')

            const restaurantSection = document.querySelector('.restaurant-section')
            const pagesSection = document.querySelector('.pages-section')

            const restaurantDropdown = restaurantSection?.querySelector('.dropdown-content')
            const pagesDropdown = pagesSection?.querySelector('.dropdown-content')

            const restaurantArrow = restaurantSection?.querySelector('.dropdown-arrow')
            const pagesArrow = pagesSection?.querySelector('.dropdown-arrow')

            if (restaurantDropdown && restaurantDropdown !== clickedDropdown) {
                restaurantDropdown.classList.remove('max-h-[400px]', 'opacity-100')
                restaurantDropdown.classList.add('max-h-0', 'opacity-0')
                restaurantArrow?.classList.remove('rotate-180')
            }

            if (pagesDropdown && pagesDropdown !== clickedDropdown) {
                pagesDropdown.classList.remove('max-h-[400px]', 'opacity-100')
                pagesDropdown.classList.add('max-h-0', 'opacity-0')
                pagesArrow?.classList.remove('rotate-180')
            }

            if (isClickedClosed) {
                clickedDropdown.classList.remove('max-h-0', 'opacity-0')
                clickedDropdown.classList.add('max-h-[400px]', 'opacity-100')
                clickedArrow?.classList.add('rotate-180')
            } else {
                clickedDropdown.classList.remove('max-h-[400px]', 'opacity-100')
                clickedDropdown.classList.add('max-h-0', 'opacity-0')
                clickedArrow?.classList.remove('rotate-180')
            }
        }

        // نمایش تمام ارتباطات
        let pap_up_all_customer_items = document.getElementById('pap_up_all_customer_items')

        function pap_up_all_customer(item) {
            if (item == 'open') {
                pap_up_all_customer_items.classList.remove('invisible', 'opacity-0')
            }

            if (item == 'close') {
                pap_up_all_customer_items.classList.add('invisible', 'opacity-0')
            }
        }

        // نمایش اطلاعات کاربر
        let showUserPopup = document.getElementById('showUserPopup')
        let userDataEl = document.getElementById('userData')

        function userShow(state, userId) {
            if (state == 'open') {
                showUserPopup.classList.remove('invisible', 'opacity-0')

                userDataEl.innerHTML = `
                    <div class="flex justify-center items-center py-20">
                        <div class="size-10 border-4 border-blue-100 border-t-(--primary-color) rounded-full animate-spin"></div>
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

                success: function(data) {
                    let fullName = (data.name ?? 'بدون نام') + ' ' + (data.family ?? '')
                    let phoneNum = data.phoneNumber
                    let email = data.email ?? 'بدون ایمیل'

                    let rolesHtml = ''

                    data.roles.forEach((role) => {
                        rolesHtml += `
                            <span class="inline-block bg-blue-50 text-(--primary-color) px-3 py-1 rounded-lg text-xs m-0.5">
                                ${role}
                            </span>
                        `
                    })

                    let html = `
                        <div class="bg-(--primary-color) p-4 sm:p-5 flex justify-between items-center sticky top-0 z-10">
                            <div>
                                <h2 class="text-white font-bold text-base sm:text-lg">پروفایل کاربر</h2>
                                <p class="text-white/70 text-xs mt-1">اطلاعات ارتباطی کاربر</p>
                            </div>

                            <button onclick="userShow('close', null)"
                                    class="text-white hover:bg-white/20 p-2 rounded-xl transition-all">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="p-5 sm:p-7">
                            <div class="flex flex-col items-center mb-7">
                                <img class="size-24 rounded-2xl border-4 border-blue-50 object-cover shadow-sm"
                                     src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '{{ asset('assets/img/user.png') }}'}"
                                     alt="user__picture">

                                <h3 class="font-bold text-gray-800 text-lg mt-4">${fullName}</h3>
                                <span class="text-xs text-gray-400 mt-2">${phoneNum}</span>
                            </div>

                            <div class="space-y-3">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 p-4 bg-gray-50 rounded-xl text-sm">
                                    <span class="text-gray-500 font-medium">شماره تلفن</span>
                                    <span class="text-gray-800">
                                        ${phoneNum}
                                        <mark class="bg-green-50 text-green-600 px-2 py-1 rounded-lg text-xs mr-2">تأیید شده</mark>
                                    </span>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 p-4 bg-gray-50 rounded-xl text-sm">
                                    <span class="text-gray-500 font-medium">ایمیل</span>
                                    <span class="text-gray-800">${email}</span>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 p-4 bg-gray-50 rounded-xl text-sm">
                                    <span class="text-gray-500 font-medium">نقش‌ها</span>
                                    <div class="text-gray-800">${rolesHtml}</div>
                                </div>
                            </div>
                        </div>
                    `

                    userDataEl.innerHTML = html
                },

                error: function() {
                    userDataEl.innerHTML = `
                        <div class="text-center p-10">
                            <div class="size-12 mx-auto mb-3 rounded-xl bg-red-50 flex items-center justify-center text-red-500">
                                !
                            </div>
                            <p class="text-red-500 text-sm">خطا در دریافت اطلاعات کاربر</p>
                            <button onclick="userShow('close', null)"
                                    class="mt-5 px-5 py-2 rounded-xl bg-gray-100 text-gray-600 text-sm">
                                بستن
                            </button>
                        </div>
                    `
                }
            })
        }
    </script>

@endsection
