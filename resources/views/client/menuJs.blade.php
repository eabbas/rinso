<script>

    let menus = document.querySelectorAll('.menus')
    let menuParent = document.querySelectorAll('.menuParent')
    // let menuCats = document.getElementById('menuCats')
    let menuItemList = document.getElementById('menuItemList')


    function showMenu(el, menuId) {
        menuParent.forEach((menuCild) => {
            menuCild.parentElement.classList.remove('selected')
        })
        el.parentElement.classList.add('selected')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ url('menu/showMenuClient/') }}/" + menuId,
            type: "GET",
            success: function (data) {
                // menuCats.innerHTML = ""
                menuItemList.innerHTML = ""
                // let menus = data.menus
                // if(menus.length != 0){
                //     menus.forEach((menu) => {
                        // if (category.title != 'بدون دسته بندی') {
                            // let elementDiv = document.createElement('div')
                            // let html = `
                            //     <div class="relative text-center border-1 border-gray-300 rounded-md menuCategories" onclick='showItems(this, ${category.id})' data-menu-category-id="${category.id}">
                            //     <span class="text-sm px-5 flex items-center justify-center min-w-[120px] max-w-[120px] truncate text-center cursor-pointer h-[34px]">${category.title}</span>
                            // </div>
                            // `
                            // elementDiv.innerHTML = html
                            // if (menus[1].id == menu.id) {
                                // elementDiv.children[0].classList.remove('border-gray-300')
                                // elementDiv.children[0].classList.add('border-red-600')
                                let items = data.menus.menu_items
                                items.forEach((item) => {
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
    
                                        <div data-item-id="${item.id}" class="count">
                                        <div class="relative w-16 lg:w-20">
                                        <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                            onclick="setCount(this, '+', ${item.id})">+
                                        </button>
                                            <input type="number" class="outline-none w-full rounded text-center text-sm py-1"
                                                min="1" value="${item.cart.quantity}" disabled>
                                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '-', ${item.id})">
    
                                                    `
                                                if (item.cart.quantity > 1) {
                                                    inner += `-`
                                                }
                                                if (item.cart.quantity == 1) {
                                                    inner+=
                                                    `
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="size-[14px]" viewBox="0 0 448 512">
                                                            <path fill="white"
                                                                d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/>
                                                        </svg>
                                                    `
                                                }
                                                inner+=`
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
    
                                })
                            
                            // }
                            // menuCats.appendChild(elementDiv)
                        // }
                //     })
                // }
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
                                        <div class="relative w-16 lg:w-20">

                                            <div data-item-id="${item.id}" class="count">
                                                <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                    onclick="setCount(this, '+', ${item.id})">+
                                                </button>
                                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1"
                                                       min="1" value="${item.cart.quantity}" disabled>
                                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '-', ${item.id})">

                                                `
                                if (item.cart.quantity > 1) {
                                    inner += `-`
                                }
                                if (item.cart.quantity == 1) {
                                    inner += `
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-[14px]" viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/>
                                        </svg>
                                        `
                                }
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
</script>