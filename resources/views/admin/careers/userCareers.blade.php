@extends('admin.app.panel')
@section('title', 'رستوران من')
@section('content')
    <style>
        .shadow_box {
            box-shadow: 0px 0px 1px 1px #ebebeb;
        }

        .selected_shadow_box {
            box-shadow: 0px 0px 1px 1px var(--primary-color);
        }

        .through::after {
            content: '';
            position: absolute;
            height: 1px;
            width: 100%;
            background-color: gray;
            top: 35%;
        }

        .through {
            font-size: 8px !important;
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

    <form action="{{ route('career.deleteAll') }}" method="post"  class="2xl:container w-full mx-auto flex flex-col gap-3 bg-(#f6f7fc) pb-5">
        @csrf
        <div class="w-full">
            <div class="w-full flex flex-row justify-between items-center">
                <div class="flex flex-col gap-1.5">
                    <h2 class="text-md font-bold text-(--primary-text-color)">لیست رستوران های من</h2>
                    <span class="text-xs text-(--secondary-text-color)">مدیریت و مشاهده رستوران ها</span>
                </div>
                <div class="flex flex-row justify-end items-center gap-3">
                    <div class="flex justify-end w-full mx-auto">
                        <a href="{{ route('career.create', [$user]) }}"
                           class="px-5 py-1 rounded-sm bg-blue-500 hover:bg-blue-600 text-white text-xs lg:text-base">ایجاد
                            رستوران </a>
                    </div>
                    <button type="button"
                            class="flex flex-row items-center justify-center gap-2 px-3 py-1.5 rounded-md border-1 border-gray-200 bg-white cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-(--primary-text-color)"
                             viewBox="0 0 512 512">
                            <path d="M0 73.7C0 50.7 18.7 32 41.7 32H470.3c23 0 41.7 18.7 41.7 41.7c0 9.6-3.3 18.9-9.4 26.3L336 304.5V447.7c0 17.8-14.5 32.3-32.3 32.3c-7.3 0-14.4-2.5-20.1-7l-92.5-73.4c-9.6-7.6-15.1-19.1-15.1-31.3V304.5L9.4 100C3.3 92.6 0 83.3 0 73.7zM55 80L218.6 280.8c3.5 4.3 5.4 9.6 5.4 15.2v68.4l64 50.8V296c0-5.5 1.9-10.9 5.4-15.2L457 80H55z"/>
                        </svg>
                        <span class="text-xs font-bold text-(--primary-text-color)">فیلتر</span>
                    </button>
                </div>
            </div>
            <div class="flex flex-row items-center justify-between mt-3">
                <div class="flex flex-row items-center gap-3">
                    <input type="checkbox" id="all" onchange="checkAll()">
                    <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                </div>
                <div class="flex flex-row items-center justify-end gap-3">

                    <button
                            class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                            title="حذف">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3">

            @foreach ($user->careers as $career)
                @if($career)
                <input type="hidden" class="career-id" value="{{ $career->id }}">
                    <div class="w-full p-3 bg-white rounded-md flex flex-col shadow-[0px_0px_2px_1px_#e7e7ef] orders"  id="career-card-{{ $career->id }}">
                        <div class="w-full flex flex-row items-center justify-between pb-3 border-b border-[#e4e5ea]">
                            <div class="flex flex-row items-center gap-2">
                                <input type="checkbox" class="check" name="careers[]" value="{{ $career->id }}">
                                <span class="font-bold text-xs text-(--primary-text-color) in-fa order-table">{{ $career->title }}</span>
                            </div>
                            <a href="{{ route('career.single', [$career->id]) }}">
                                <img class="size-10 rounded-full object-cover"
                                     src="{{ $career->logo ? asset('storage/' . $career->logo) : asset('assets/img/user.png') }}"
                                     alt="">
                            </a>
                        </div>
                        <div class="pt-3 w-full flex flex-col gap-3.5">
                            <div class="w-full flex flex-row items-center">
                                <a href="{{ route('career.orders', [$career->id]) }}"
                                   class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                                    <div class="flex flex-row items-center gap-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-4"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="var(--secondary-text-color)"
                                             stroke-width="1.5"
                                             stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                                            <line x1="3" y1="6" x2="21" y2="6"/>
                                            <line x1="8" y1="10" x2="16" y2="10"/>
                                            <line x1="8" y1="14" x2="16" y2="14"/>
                                            <line x1="8" y1="18" x2="12" y2="18"/>
                                        </svg>
                                        <span class="text-[10px] text-(--secondary-text-color)">تعداد سفارش</span>
                                    </div>
                                    <span class="text-xs font-bold text-(--primary-text-color) in-fa order-count">{{ count($career->orders) }} سفارش</span>
                                </a>
                                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                                    <div class="flex flex-row items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-5"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="var(--secondary-text-color)"
                                             stroke-width="1.5"
                                             stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                                        </svg>
                                        <span class="text-[10px] text-(--secondary-text-color)">دسته</span>
                                    </div>
                                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">{{ $career->careerCategory->title}}</span>
                                </div>
                                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5">
                                    <div class="flex flex-row items-center gap-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-4 fill-(--secondary-text-color)" viewBox="0 0 448 512">
                                            <path d="M112 0c8.8 0 16 7.2 16 16V64H320V16c0-8.8 7.2-16 16-16s16 7.2 16 16V64h32c35.3 0 64 28.7 64 64v32 32V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 160 128C0 92.7 28.7 64 64 64H96V16c0-8.8 7.2-16 16-16zM416 192H312v72H416V192zm0 104H312v80H416V296zm0 112H312v72h72c17.7 0 32-14.3 32-32V408zM280 376V296H168v80H280zM168 408v72H280V408H168zm-32-32V296H32v80H136zM32 408v40c0 17.7 14.3 32 32 32h72V408H32zm0-144H136V192H32v72zm136 0H280V192H168v72zM384 96H64c-17.7 0-32 14.3-32 32v32H416V128c0-17.7-14.3-32-32-32z"/>
                                        </svg>
                                        <span class="text-[10px] text-(--secondary-text-color)">تاریخ افتتاح</span>
                                    </div>
                                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">{{ $career->date }}</span>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-1">

                                <div class="w-full flex flex-row items-center gap-2">
                                    <a href="{{ route('career.showWithMenu', [$career->id]) }}"
                                       class="w-1/2 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-(--primary-color) bg-(--primary-color) text-white text-xs cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white"
                                             viewBox="0 0 576 512">
                                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                        </svg>
                                        مشاهده منو
                                    </a>
                                    <a href="{{ route('career.edit', [$career->id]) }}"
                                       class="w-[25%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-blue-600 text-blue-600 text-xs cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-blue-600"
                                             viewBox="0 0 512 512">
                                            <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                        ویرایش
                                    </a>
                                    <a href="{{ route('career.delete', [$career->id]) }}"
                                       class="block w-[20%] flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-rose-500 text-rose-500 text-xs cursor-pointer">
                                        حذف
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-rose-500"
                                             viewBox="0 0 448 512">
                                            <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </a>
                                </div>
                                @if(count($career->orders))
                                    <div class="w-full flex justify-center">
                                        <a href="{{ route('career.orders', [$career->id]) }}"
                                           class="orders-btn min-w-full max-w-full flex items-center justify-center gap-1 bg-(--color-green) py-1 rounded-lg cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 80c8.8 0 16 7.2 16 16V320H320c-17.7 0-32 14.3-32 32v80H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H384zM64 480H288h5.5c17 0 33.3-6.7 45.3-18.7l90.5-90.5c12-12 18.7-28.3 18.7-45.3V320 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64zm64-120a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zM104 128a24 24 0 1 0 0 48 24 24 0 1 0 0-48zm24 128a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/></svg>
                                            <span class="text-white text-sm font-bold">سفارشات</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </form>

 
<script>
    window.Pusher = Pusher;
window.Echo = new Echo.default({
    broadcaster: 'reverb',
    key: '1gz5uvls0tzdnpjcxp7q',
    wsHost: '127.0.0.1',
    wsPort: 8080,
    forceTLS: false,
    enabledTransports: ['ws']
});

let careerIds = document.querySelectorAll('.career-id');

careerIds.forEach(function(input) {
    let careerId = input.value
    
    window.Echo.channel('orderNotification' + careerId)
        .listen('orders', function(e) {
            console.log('رویداد سفارش:', e)
            
            let card = document.getElementById('career-card-' + careerId)
            if (!card) {
                console.log('کارت رستوران پیدا نشد')
                return
            }
            
            let order = e.order_data
            
            if (e.is_cancelled || order.status_id == 6) {
                let countElement = card.querySelector('.order-count')
                if (countElement) {
                    countElement.textContent = e.cart_count + ' سفارش'
                }
                
                if (e.cart_count === 0) {
                    let ordersBtn = card.querySelector('.orders-btn')
                    if (ordersBtn) {
                        let parentDiv = ordersBtn.closest('.w-full.flex.justify-center')
                        if (parentDiv) {
                            parentDiv.remove()
                        }
                    }
                }
                
                let titleElement = card.querySelector('.order-table')
                let careerTitle = titleElement ? titleElement.textContent : 'رستوران'
                showMessage('❌ سفارش #' + order.order_code + ' لغو شد!')
                return
            }
            
            let countElement = card.querySelector('.order-count')
            if (countElement) {
                countElement.textContent = e.cart_count + ' سفارش'
            }

            let existingButton = card.querySelector('.orders-btn')
            if (!existingButton && e.cart_count > 0) {
                let div = document.createElement('div')
                div.className = 'w-full flex justify-center mt-2'
                div.innerHTML = `
                    <a href='${"{{ url('careers/orders/') }}/" + e.career_id}'
                    class="orders-btn min-w-full max-w-full flex items-center justify-center gap-1 bg-green-500 hover:bg-green-600 py-1.5 rounded-lg cursor-pointer transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 448 512">
                            <path d="M384 80c8.8 0 16 7.2 16 16V320H320c-17.7 0-32 14.3-32 32v80H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H384zM64 480H288h5.5c17 0 33.3-6.7 45.3-18.7l90.5-90.5c12-12 18.7-28.3 18.7-45.3V320 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64zm64-120a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zM104 128a24 24 0 1 0 0 48 24 24 0 1 0 0-48zm24 128a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/>
                        </svg>
                        <span class="text-white text-sm font-bold">سفارشات</span>
                    </a>
                `
                let container = card.querySelector('.pt-3')
                if (container) {
                    container.appendChild(div)
                }
            }

            let titleElement = card.querySelector('.order-table')
            let careerTitle = titleElement ? titleElement.textContent : 'رستوران'
            showMessage('✅ سفارش جدید برای ' + careerTitle + ' دریافت شد!')
        })
})

function showMessage(text) {
    let msg = document.getElementById('message')
    if (msg) {
        msg.innerHTML = `
            <div class="relative p-4">
                <svg onclick="this.parentElement.parentElement.classList.add('opacity-0','invisible')" 
                     class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" 
                     viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
                <div class="text-center text-sm text-gray-700">${text}</div>
            </div>
        `
        msg.classList.remove('opacity-0', 'invisible')
        msg.classList.add('opacity-100', 'visible')
        
        setTimeout(() => {
            msg.classList.remove('opacity-100', 'visible')
            msg.classList.add('opacity-0', 'invisible')
        }, 5000)
    }
}
</script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
