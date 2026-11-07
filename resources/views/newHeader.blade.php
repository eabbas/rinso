@php
    if (Auth::check()) {
        $roles = Auth::user()->role;
        $ids = $roles->pluck('id')->toArray();
    }
@endphp
@if (Auth::check())
    <div class="w-full h-dvh fixed top-0 right-0 invisible opacity-0 bg-black/50 flex flex-row-reverse z-99999 transition-all duration-500 backdrop-blur-sm"
         id="menuBlock">
        <div class="w-1/3 h-full relative" onclick="hamburgerMenu('close', this)">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 absolute top-5 left-5 cursor-pointer"
                 viewBox="0 0 384 512">
                <path fill="white"
                      d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z" />
            </svg>
        </div>
        <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between transition-all duration-300 translate-x-full"
             id="menuList">
            <div>
                <a href="{{ route('user.profile') }}"
                   class="flex flex-row items-center gap-3 pb-2 border-b border-gray-300">
                    <div>
                        @if (!Auth::user()->main_image)
                            <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                 class="size-16 rounded-xl">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                 alt="user__picture object-cover" class="size-14 rounded-full">
                        @endif
                    </div>
                    <div>
                                <span class="text-lg text-gray-700 font-bold">{{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}</span>
                    </div>
                </a>
                <div class="overflow-y-auto [&::-webkit-scrollbar]:hidden h-[calc(100vh-134px)] mb-7">
                    <div class="pt-2 flex flex-col">
                        <div>
                            <a href="{{ route('home') }}" class="block text-gray-700 py-2 text-md">
                                صفحه اول
                            </a>
                        </div>
                        @if (!Auth::user()->email)
                            <div>
                                <a href="{{ route('user.compelete_form') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    تکمیل پروفایل
                                </a>
                            </div>
                        @endif
                        <div>
                            <a href="{{ route('user.setting') }}" class="block text-gray-700 py-2 text-md">
                                ویرایش پروفایل
                            </a>
                        </div>
                    </div>
                    <div class="w-6/12 flex justify-start">
                        <a href="{{ route('dashboard') }}" class="block text-gray-700 py-2 text-md">
                            داشبورد
                        </a>
                    </div>
                    <div class="pt-3">
                        <div
                                class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                            <h3 class="text-md font-bold text-gray-800 mb-1.5">فروشگاه ها</h3>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-all duration-300 @if (Route::is('ecomm.ecomms') ||
                                                Route::is('ecomm.*') ||
                                                Route::is('ecomm.list') ||
                                                Route::is('ecomm_category.index') ||
                                                Route::is('ecomm_category.create') ||
                                                Route::is('ecomm_product.index') ||
                                                Route::is('ecomm_product.create')) rotate-180 @endif"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                            </svg>
                        </div>
                        <ul
                                class="transition-all duration-300 overflow-hidden @if (Route::is('ecomm.ecomms') ||
                                            Route::is('ecomm.*') ||
                                            Route::is('ecomm.list') ||
                                            Route::is('ecomm_category.index') ||
                                            Route::is('ecomm_category.create') ||
                                            Route::is('ecomm_product.index') ||
                                            Route::is('ecomm_product.create')) max-h-[1000px] @else max-h-0 @endif">
                            <li class="pr-3.5 @if (Route::is('ecomm.ecomms')) bg-gray-100 @endif">
                                <a href="{{ route('ecomm.ecomms') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    فروشگاه های من
                                </a>
                            </li>
                            <li class="pr-3.5 @if (Route::is('ecomm.create')) bg-gray-100 @endif">
                                <a href="{{ route('ecomm.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    فروشگاه جدید
                                </a>
                            </li>
                            @if (in_array(1, $ids))
                                <li class="pr-3.5 @if (Route::is('ecomm.list')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        همه فروشگاه ها
                                    </a>
                                </li>
                            @endif

                            @if (count(Auth::user()->ecomms))
                                <li class="pr-3.5 @if (Route::is('ecomm_category.index')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm_category.index') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        همه دسته ها
                                    </a>
                                </li>
                            @endif

                            <li class="pr-3.5 @if (Route::is('ecomm_category.create')) bg-gray-100 @endif">
                                <span class="size-1 rounded-sm"></span>
                                <a href="{{ route('ecomm_category.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    دسته جدید
                                </a>
                            </li>
                            @if (count(Auth::user()->ecomms))
                                <li class="pr-3.5 @if (Route::is('ecomm_product.index')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm_product.index') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        همه محصولات
                                    </a>
                                </li>
                            @endif
                            <li class="pr-3.5 @if (Route::is('ecomm_product.create')) bg-gray-100 @endif">
                                <span class="size-1 rounded-sm"></span>
                                <a href="{{ route('ecomm_product.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    محصول جدید
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-3">
                        <div
                                class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                            <h3 class="text-md font-bold text-gray-800 mb-1.5">آموزشگاه ها</h3>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-all duration-300 @if (Route::is('institute.institutes') ||
                                                Route::is('institute.*') ||
                                                Route::is('field.fields') ||
                                                Route::is('lesson.lessons') ||
                                                Route::is('class.classes')) rotate-180 @endif"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                            </svg>
                        </div>
                        <ul
                                class="transition-all duration-300 overflow-hidden @if (Route::is('institute.institutes') ||
                                            Route::is('institute.*') ||
                                            Route::is('field.fields') ||
                                            Route::is('lesson.lessons') ||
                                            Route::is('class.classes')) max-h-[1000px] @else max-h-0 @endif">
                            <li class="pr-3.5 @if (Route::is('institute.create')) bg-gray-100 @endif">
                                <a href="{{ route('institute.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    ایجاد آموزشگاه جدید
                                </a>
                            </li>
                            <li class="pr-3.5 @if (Route::is('institute.institutes')) bg-gray-100 @endif">
                                <a href="{{ route('institute.institutes') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    لیست آموزشگاه ها
                                </a>
                            </li>
                            @if (Auth::user()->role[0]->title == 'admin')
                                <li class="pr-3.5 @if (Route::is('field.fields')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('field.fields') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست همه رشته ها
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('lesson.lessons')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('lesson.lessons') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست همه درس ها
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('class.classes')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('class.classes') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست همه کلاس ها
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if (in_array(1, $ids) || in_array(5, $ids))
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <h3 class="text-md font-bold text-gray-800 mb-1.5"> چک لیست</h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('checkList.formCheckList') || Route::is('checkList.myList')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('checkList.formCheckList') || Route::is('checkList.myList')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if (Route::is('checkList.formCheckList')) bg-gray-100 @endif">
                                    <a href="{{ route('checkList.formCheckList') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ثبت چک لیست
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('myList')) bg-gray-100 @endif">
                                    <a href="{{ route('checkList.myList') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست چک لیست های من
                                    </a>
                                </li>
                                @if (Auth::user()->phoneNumber == '09147794595')
                                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm">
                                        <span class="size-1 bg-white rounded-sm"></span>
                                        <a href="{{ route('checkList.checkList_Users') }}"
                                           class=" py-1 block">
                                            مشاهده کاربران
                                        </a>
                                    </li>
                                    <li
                                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm @if (Route::is('checkList.checkList_Users')) bg-gray-700 @endif">
                                        <span class="size-1 bg-white rounded-sm"></span>
                                        <a href="{{ route('checkList.all_user_check_lists') }}"
                                           class=" py-1 block">
                                            لیست تمام چک لیست ها
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    @endif
                    {{-- suggestion --}}
                    <div class="pt-3">
                        <div
                                class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                            <h3 class="text-md font-bold text-gray-800 mb-1.5">پیشنهادات</h3>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-all duration-300 @if (Route::is('suggestion.*')) rotate-180 @endif"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                            </svg>
                        </div>
                        <ul
                                class="transition-all duration-300 overflow-hidden @if (Route::is('suggestion.*')) max-h-[1000px] @else max-h-0 @endif">
                            <li class="pr-3.5 @if (Route::is('suggestion.create')) bg-gray-100 @endif">
                                <a href="{{ route('suggestion.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    افزودن
                                </a>
                            </li>
                            <li class="pr-3.5 @if (Route::is('suggestion.list')) bg-gray-100 @endif">
                                <a href="{{ route('suggestion.list') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    مشاهده
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="pt-3">
                        <div
                                class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                            <h3 class="text-md font-bold text-gray-800 mb-1.5">رستوران ها</h3>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-all duration-300 @if (Route::is('career.*') ||
                                                Route::is('menu.createMenu') ||
                                                Route::is('menu.user_menus') ||
                                                Route::is('cc.create') ||
                                                Route::is('cc.list')) rotate-180 @endif"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                            </svg>
                        </div>
                        <ul
                                class="transition-all duration-300 overflow-hidden @if (Route::is('career.*') ||
                                            Route::is('menu.createMenu') ||
                                            Route::is('menu.user_menus') ||
                                            Route::is('cc.create') ||
                                            Route::is('cc.list')) max-h-[1000px] @else max-h-0 @endif">
                            <li class="pr-3.5 @if (Route::is('career.careers')) bg-gray-100 @endif">
                                <a href="{{ route('career.careers') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    لیست رستوران های من
                                </a>
                            </li>

                            <li class="pr-3.5 @if (Route::is('career.create')) bg-gray-100 @endif">
                                <a href="{{ route('career.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    ایجاد رستوران جدید
                                </a>
                            </li>
                            {{-- @if (count(Auth::user()->menus))
                            <li class="pr-3.5 @if (Route::is('menu.user_menus')) bg-gray-100 @endif">
                                <span class="size-1 rounded-sm"></span>
                                <a href="{{ route('menu.user_menus', [Auth::user()]) }}"
                                   class="block text-gray-700 py-2 text-md">
                                    لیست منو های من
                                </a>
                            </li>
                        @endif --}}
                            {{-- @if (count(Auth::user()->careers))
                            <li class="pr-3.5 @if (Route::is('menu.createMenu')) bg-gray-100 @endif">
                                <a href="{{ route('menu.createMenu') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    ایجاد منو برای رستوران
                                </a>
                            </li>
                        @endif --}}
                            @if (in_array(1, $ids) || in_array(4, $ids))
                                <li class="pr-3.5 @if (Route::is('career.createUser')) bg-gray-100 @endif">
                                    <a href="{{ route('career.createUser') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد رستوران برای دیگری
                                    </a>
                                </li>
                            @endif
                            @if (in_array(1, $ids))
                                <li class="pr-3.5 @if (Route::is('career.list')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('career.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        همه رستوران ها
                                    </a>
                                </li>

                                <li class="pr-3.5 @if (Route::is('cc.create')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('cc.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد دسته رستوران
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('cc.list')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('cc.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        همه دسته های رستوران
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <div class="pt-3">
                        <div
                                class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                            <h3 class="text-md font-bold text-gray-800 mb-1.5">صفحه ها</h3>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-all duration-300 @if (Route::is('pages.*') || Route::is('socialMedia.*')) rotate-180 @endif"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                            </svg>
                        </div>
                        <ul
                                class="transition-all duration-300 overflow-hidden @if (Route::is('pages.*') || Route::is('socialMedia.*')) max-h-[1000px] @else max-h-0 @endif">
                            <li class="pr-3.5 @if (Route::is('pages.create')) bg-gray-100 @endif">
                                <a href="{{ route('pages.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    ایجاد صفحه
                                </a>
                            </li>
                            <li class="pr-3.5 @if (Route::is('pages.social_list')) bg-gray-100 @endif">
                                <a href="{{ route('pages.social_list') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    لیست صفحه های من
                                </a>
                            </li>
                            @if (in_array(1, $ids))
                                <li class="pr-3.5 @if (Route::is('pages.list')) bg-gray-100 @endif">
                                    <a href="{{ route('pages.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست همه صفحه ها
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('socialMedia.create')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('socialMedia.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد شبکه اجتماعی
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('socialMedia.list')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('socialMedia.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست شبکه های اجتماعی
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if (in_array(1, $ids))
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <h3 class="text-md font-bold text-gray-800 mb-1.5">کاربران</h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('user.list') ||
                                                    Route::is('user.create_user') ||
                                                    Route::is('user.myUsers') ||
                                                    Route::is('user.requestList')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('user.list') ||
                                                Route::is('user.create_user') ||
                                                Route::is('user.myUsers') ||
                                                Route::is('user.requestList')) max-h-[1000px] @else max-h-0 @endif">
                                @if (in_array(1, $ids) || in_array(4, $ids))
                                    <li class="pr-3.5 @if (Route::is('user.myUsers')) bg-gray-100 @endif">
                                        <a href="{{ route('user.myUsers') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            مشتریان من
                                        </a>
                                    </li>
                                @endif
                                <li class="pr-3.5 @if (Route::is('user.list')) bg-gray-100 @endif">
                                    <a href="{{ route('user.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        همه کاربران
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('user.create_user')) bg-gray-100 @endif">
                                    <a href="{{ route('user.create_user') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد کاربر جدید
                                    </a>
                                </li>
                                @if (in_array(1, $ids) || in_array(4, $ids))
                                    <li class="pr-3.5 @if (Route::is('user.requestList')) bg-gray-100 @endif">
                                        <a href="{{ route('user.requestList') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            لیست درخواست ها
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    @if (in_array(1, $ids))
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <h3 class="text-md font-bold text-gray-800 mb-1.5">اسلایدر</h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('slider.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('slider.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if (Route::is('slider.create')) bg-gray-100 @endif">
                                    <a href="{{ route('slider.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد اسلایدر
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('slider.list')) bg-gray-100 @endif">
                                    <a href="{{ route('slider.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست اسلایدر ها
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                    درباره ما
                                </h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('aboutUs.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('aboutUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if (Route::is('aboutUs.create_edit')) bg-gray-100 @endif">
                                    <a href="{{ route('aboutUs.create_edit') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد درباره ما
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('aboutUs.list')) bg-gray-100 @endif">
                                    <a href="{{ route('aboutUs.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        درباره ما
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                    ارتباط با ما
                                </h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('contactUs.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('contactUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if (Route::is('contactUs.create')) bg-gray-100 @endif">
                                    <a href="{{ route('contactUs.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        فرم ارتباط باما
                                    </a>
                                </li>
                                <li class="pr-3.5 @if (Route::is('contactUs.list')) bg-gray-100 @endif">
                                    <a href="{{ route('contactUs.list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست تیکت ها
                                    </a>
                                </li>

                            </ul>
                        </div>
                    @endif
                    <div class="pt-3">
                        <div
                                class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                            <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                کیوآر کد
                            </h3>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-all duration-300 @if (Route::is('generalQrCodes.*')) rotate-180 @endif"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                            </svg>
                        </div>
                        <ul
                                class="transition-all duration-300 overflow-hidden @if (Route::is('generalQrCodes.*')) max-h-[1000px] @else max-h-0 @endif">
                            <li class="pr-3.5 @if (Route::is('generalQrCodes.create')) bg-gray-100 @endif">
                                <a href="{{ route('generalQrCodes.create') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    ایجاد کیوآر کد جدید
                                </a>
                            </li>
                            <li class="pr-3.5 @if (Route::is('generalQrCodes.list')) bg-gray-100 @endif">
                                <a href="{{ route('generalQrCodes.list') }}"
                                   class="block text-gray-700 py-2 text-md">
                                    لیست کیوآر کد های من
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="mb-3 sticky bottom-0 right-0 py-3 bg-white border-t border-gray-300">
                    <a href="{{ route('user.logout') }}"
                       class="block text-rose-700 py-1 font-medium text-sm text-center">خروج از حساب
                        کاربری</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="w-full h-dvh fixed top-0 right-0 invisible opacity-0 bg-black/50 flex flex-row-reverse z-99999 transition-all duration-500 backdrop-blur-sm"
         id="menuBlock">
        <div class="w-1/3 h-full relative" onclick="hamburgerMenu('close', this)">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 absolute top-5 left-5 cursor-pointer"
                 viewBox="0 0 384 512">
                <path fill="white"
                      d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z" />
            </svg>
        </div>
        <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between transition-all duration-300 translate-x-full"
             id="menuList">
            <div>

                <div class="overflow-y-auto [&::-webkit-scrollbar]:hidden h-[calc(100vh-134px)] mb-7">
                    <a href="{{ route('home') }}" class="w-full py-3 flex items-center gap-5">
                        <div class="p-2 bg-[#eb3254] rounded-full">
                            <img src="{{ asset('storage/images/Famenu1.png') }}" class="size-[30px]"
                                 alt="">
                        </div>
                        <span class="text-sm text-gray-800 font-bold">رینگا</span>
                    </a>
                    <div class="pt-2 flex flex-col">
                        <div>
                            <a href="{{ route('home') }}"
                               class="block text-gray-700 py-2 text-md @if (Route::is('home')) bg-gray-100 @endif">
                                صفحه اول
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('login') }}" class="block text-gray-700 py-2 text-md">
                                ورود | ثبت نام
                            </a>
                        </div>
                        {{-- <div>
                            <a href="{{ route('signup') }}" class="block text-gray-700 py-2 text-md">
                               ثبت نام
                            </a>
                        </div> --}}
                        <div>
                            <a href="{{ route('client.allPages') }}"
                               class="block text-gray-700 py-2 text-md @if (Route::is('client.allPages')) bg-gray-100 @endif">
                                صفحه ها
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('career.careersList') }}"
                               class="block text-gray-700 py-2 text-md @if (Route::is('career.careersList')) bg-gray-100 @endif">
                                رستوران ها
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endif



