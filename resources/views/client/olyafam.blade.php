<div class="w-11/12 mx-auto py-3">
    <h3 class="w-full text-base font-bold lg:text-md mb-3">منو های {{ $career->title }}</h3>
    
    <div class="w-full bg-white rounded-md">
        <div class="w-11/12 mx-auto flex flex-row items-center gap-8 pb-3 py-4 overflow-x-auto bg-white"
        style="scrollbar-width: thin;" id="menuList">
        @foreach ($career->menus as $menu)
                @if (count($menu->menu_items) > 1)
                    <div class="relative selectItems @if ($career->menus[0] == $menu) selected @endif allMenus min-w-20 min-h-20"
                        data-menu-id="{{ $menu->id }}">
                        <div class="cursor-pointer rounded-lg menuParent" title="{{ $menu->title }}"
                            onclick='showMenu(this, "{{ $menu->id }}")'>
                            <div class="w-20 gap-2 flex flex-col items-center rounded-lg">
                                <img class="size-20 rounded-md"
                                    src="{{ $menu->banner ? asset('storage/' . $menu->banner) : asset('assets/img/user.png') }}"
                                    alt="menu image">
                                <span
                                    class="block w-full title_category_icon text-center truncate text-xs">{{ $menu->title }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
{{-- <div class="w-11/12 mx-auto mt-3">
    <div class="w-full overflow-x-auto bg-white rounded-md py-2" style="scrollbar-width: thin;">
        <div class="w-11/12 mx-auto flex flex-row items-center gap-4 py-4" id="menuCats">
            @foreach ($career->menus as $menu)
                @if (count($menu->menu_categories) > 1)
                    @foreach ($menu->menu_categories as $category)
                        @if ($category->menu->id == $career->menus[0]->id)
                            @if ($category->title != 'بدون دسته بندی')
                                @if ($career->menus[0]->menu_categories[1]->id == $category->id)
                                    <div class="relative text-center border-1 @if ($career->menus[0]->menu_categories[1]->id == $category->id) border-red-600 @else border-gray-300 @endif rounded-md menuCategories"
                                        onclick='showItems(this, "{{ $category->id }}")'
                                        data-menu-category-id="{{ $category->id }}">
                                        <span
                                            class="text-sm px-5 flex items-center justify-center min-w-[120px] max-w-[120px] truncate text-center cursor-pointer h-[34px]">{{ $category->title }}</span>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div> --}}
<div class="w-11/12 mx-auto" id="items">
    @foreach ($career->menus as $menu)
        {{-- @if (count($menu->menu_categories) > 1) --}}
            <div class="flex flex-col gap-3 mt-3 menus" data-menu-id="{{ $menu->id }}">
                @if ($career->menus[0]->id == $menu->id)
                {{-- @foreach ($menu->menu_categories as $category) --}}
                    @if (count($menu->menu_items))
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                            {{-- @if ($career->menus[0]->menu_categories[1]->id == $category->id) --}}
                                <div class="p-2 lg:p-4">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4" id="menuItemList">
                                        @foreach ($menu->menu_items as $item)
                                        
                                            {{-- @if ($item->title != 'آیتم 1') --}}
                                                <div class="w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems"
                                                    data-menu-item-title="{{ $item->title }}"
                                                    data-menu-item-id="{{ $item->id }}">
                                                    <!--<span class="absolute -top-1 -right-2 bg-[#eb3254] px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->
                                                    {{--<input type="hidden" value="{{ $item->id }}">--}}
                                                    <span
                                                        class="text-xs @if (!$item->discount) invisible @else @endif text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                                        {{ $item->percent }}%
                                                    </span>
                                                    <div class="w-full flex items-center justify-between">
                                                        <div class="w-10/12 flex flex-row gap-5 items-center">
                                                            <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer"
                                                                onclick="openSingle(this)">
                                                                <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/img/user.png') }}"
                                                                    class="size-22 rounded-lg object-cover border border-gray-300"
                                                                    alt="{{ $item->title }}">
                                                                <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                                                    <h3
                                                                        class="font-medium text-gray-800 truncate text-sm lg:text-base">
                                                                        {{ $item->title }}</h3>
                                                                    <p
                                                                        class="text-sm text-gray-500 truncate mt-1 lg:text-sm">
                                                                        {{ $item->description }}</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                                                <div class="flex flex-row items-center gap-3">
                                                                    <div class="text-left flex flex-col items-end">
                                                                        @if ($item->discount == 0)
                                                                            <span
                                                                                class="font-bold text-xs lg:text-sm">{{ number_format($item->price) }}
                                                                                تومان</span>
                                                                        @else
                                                                            <span
                                                                                class="font-bold text-xs lg:text-sm">{{ number_format($item->discount) }}
                                                                                تومان</span>
                                                                            <span
                                                                                class="text-gray-400 text-[10px] line-through lg:text-sm">{{ number_format($item->price) }}
                                                                                تومان</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $userCart = $item->load([
                                                                'carts' => function ($query) {
                                                                    $query
                                                                        ->whereNull('order_id')
                                                                        ->where('user_id', Auth::id());
                                                                },
                                                            ]);
                                                        @endphp
                                                        <div data-item-id="{{ $item->id }}" class="count">
                                                            @if (Auth::check() && count($currentUser->carts) && count($userCart->carts))
                                                                <div class="relative w-16 lg:w-20">
                                                                    <button
                                                                        class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                                        onclick="setCount(this, '+', {{ $item->id }})">+
                                                                    </button>
                                                                    <input type="number"
                                                                        class="outline-none w-full rounded text-center text-sm py-1"
                                                                        min="1"
                                                                        value="{{ $userCart->carts[0]->quantity }}"
                                                                        disabled>
                                                                    <button
                                                                        class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                                        onclick="setCount(this, '-',{{ $item->id }})">
                                                                        @if ($userCart->carts[0]->quantity > 1)
                                                                            -
                                                                        @else
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="size-[14px]"
                                                                                viewBox="0 0 448 512">
                                                                                <path fill="white"
                                                                                    d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z" />
                                                                            </svg>
                                                                        @endif
                                                                    </button>
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                                                    <button
                                                                        class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                                                        onclick="addToCart(this, {{ $item->id }})">افزودن
                                                                        +
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- @endif --}}
                                        @endforeach
                                    </div>
                                </div>
                            {{-- @endif --}}
                        </div>
                    @endif
                {{-- @endforeach --}}
                @endif
            </div>
        {{-- @endif --}}
    @endforeach
</div>

<div class="fixed w-full h-dvh top-0 right-0 bg-black/50 flex flex-row justify-end invisible opacity-0 trnsition-all duration-300 z-9999"
             id="block">
            <div class="w-full lg:w-[calc(100%-265px)] h-full flex flex-row items-center justify-center">
                <div class="w-11/12 lg:w-2/3 bg-white relative rounded-lg p-5">
                    <span class="size-10 rounded-full bg-white flex items-center justify-center absolute -top-5 -right-5 cursor-pointer"
                          onclick="closeForm()">❌</span>
                    <div id="loader" class="absolute top-0 right-0 w-full h-full hidden justify-center items-center">
                        <div class="w-12 h-12 border-4 border-[#eb3153] border-t-white rounded-full animate-spin"></div>
                    </div>

                    {{-- menu item box --}}
                    <div class="w-full p-3 bg-[#fff] max-h-[550px] overflow-y-auto rounded-lg hidden invisible opacity-0 transition-all duration-300 flex flex-col gap-4 form"
                         id="showMenuItemBox">
                        <div class="w-full p-5 rounded-md flex flex-col gap-3 bg-white relative">
                            {{-- <div class="flex flex-row items-center justify-end gap-2 md:gap-5">
                                <div class="flex justify-center">
                                    <span
                                            class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                            title="ویرایش">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-5"
                                             viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="flex justify-center">
                                    <span onclick='menuItemDelete(this, "${id}")'
                                          class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                          title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-5"
                                             viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div> --}}
                            <div class="w-full relative">
                                <img class="size-80 mx-auto rounded-md object-cover" alt="">
                                <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                </span>
                            </div>

                            <div class="flex flex-col items-center">
                                <span class="font-bold text-gray-800 text-lg"></span>
                                <p class="text-gray-600 text-justify max-h-[150px] overflow-y-auto ellipsis-2"></p>
                            </div>

                            <div class="w-full flex flex-col items-end justify-end gap-2">
                                <span class="font-bold text-sm text-gray-800"></span>
                                <span class="text-xs text-gray-400 line-through"></span>
                            </div>
                        </div>
                    </div>
                    {{-- menu item box --}}

   


                </div>
            </div>
        </div>
    </div>


<script>
      function openSingle(el) {
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            showMenuItemBox.classList.remove('invisible')
            showMenuItemBox.classList.remove('opacity-0')
            showMenuItemBox.classList.remove('hidden')
            let image = ""
            let title = ""
            let description = ""
            let percent = ""
            let id = el.parentElement.parentElement.parentElement.getAttribute('data-menu-item-id')
            showMenuItemBox.children[0].children[2].children[1].innerHTML = ""
            let price = el.parentElement.children[1].children[0].children[0].children[0]
            let discount = el.parentElement.children[1].children[0].children[0].children[1]
            if (el.parentElement.parentElement.parentElement.children[2]) {
                image = el.parentElement.parentElement.parentElement.children[2].children[0].children[0].children[0].getAttribute('src')
                title = el.parentElement.parentElement.parentElement.children[2].children[0].children[0].children[1].children[0].innerText
                description = el.parentElement.parentElement.parentElement.children[2].children[0].children[0].children[1].children[1].innerText
                percent = el.parentElement.parentElement.parentElement.children[1].innerText
            } else {
                image = el.parentElement.parentElement.parentElement.children[1].children[0].children[0].children[0].getAttribute('src')
                title = el.parentElement.parentElement.parentElement.children[1].children[0].children[0].children[1].children[0].innerText
                description = el.parentElement.parentElement.parentElement.children[1].children[0].children[0].children[1].children[1].innerText
                percent = el.parentElement.parentElement.parentElement.children[0].innerText
            }
            showMenuItemBox.children[0].children[2].children[0].innerText = price.innerText
            if(discount){
                showMenuItemBox.children[0].children[2].children[1].innerText = discount.innerText
            }
            showMenuItemBox.children[0].children[0].children[0].setAttribute('src', image)
            showMenuItemBox.children[0].children[0].children[1].innerText = percent
            showMenuItemBox.children[0].children[1].children[0].innerText = title
            showMenuItemBox.children[0].children[1].children[1].innerText = description
        }

        function closeForm() {
            block.classList.add('invisible')
            block.classList.add('opacity-0')
            loader.classList.add('hidden')
        }
</script>