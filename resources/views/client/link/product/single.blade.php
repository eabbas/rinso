@extends('client.document')
@section('title')
    مشاهده محصول {{ $product->title }}
@endsection
@section('content')
    <style>
        .mohammad:last-child {
            border: none;
        }

        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <div class="w-full px-5 py-3 flex justify-between items-center bg-white">
        <div class=" flex items-center gap-2 text-[14px] text-[#91949a]">
            <a href="{{ route('home') }}">خانه</a>
            <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5]"></span>
            <a href="{{ route('client.loadLink', [$product->page->id]) }}">{{ $product->page->title }}</a>
            <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5]"></span>
            <a href="{{ route('pages.products', [$product->page->id]) }}">محصولات</a>
            <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5]"></span>
            @foreach($product->categories as $category)
                <span class="ml-3">{{ $category->title }} </span>
            @endforeach

        </div>
        {{--                <div class="flex gap-5">--}}
        {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5">--}}
        {{--                        <path d="M448 112c0 44.2-35.8 80-80 80c-22.9 0-43.6-9.6-58.1-25l-151 75.5c.8 4.4 1.1 8.9 1.1 13.5s-.4 9.1-1.1 13.5l151 75.5c14.6-15.4 35.2-25 58.1-25c44.2 0 80 35.8 80 80s-35.8 80-80 80s-80-35.8-80-80c0-9.7 1.7-19 4.9-27.7L147.2 299.5c-14.3 22-39 36.5-67.2 36.5c-44.2 0-80-35.8-80-80s35.8-80 80-80c28.2 0 52.9 14.5 67.2 36.5l145.7-72.9c-3.2-8.6-4.9-17.9-4.9-27.7c0-44.2 35.8-80 80-80s80 35.8 80 80zM80 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM416 112a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM368 448a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>--}}
        {{--                    </svg>--}}
        {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">--}}
        {{--                        <path d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z"/>--}}
        {{--                    </svg>--}}
        {{--                </div>--}}
    </div>
    <div class="w-full flex flex-col items-center gap-4 mt-8">
        <div class="w-[98%] mx-auto flex flex-row-reverse justify-between items-center relative">
            <div class="w-9/12 flex justify-center items-center">
                <img src="{{ asset('storage/'.$product->main_image) }}" alt="" class="w-50">
            </div>
            <div class="max-h-[200px] w-3/12 flex flex-col items-center gap-2 overflow-y-auto pl-1.5">
                @foreach($product->gallery as $img)
                    <img src="{{ asset('storage/'.$img->image) }}" class="size-14 gallery cursor-pointer rounded"
                         alt="">
                @endforeach
            </div>


        </div>
        <script>
            let gallery = document.querySelectorAll('.gallery')
            gallery.forEach((image) => {
                image.addEventListener('click', () => {
                    let src = image.getAttribute('src')
                    image.parentElement.previousElementSibling.children[0].setAttribute('src', src)
                })
            })
        </script>
        <div class="w-full mb-5 rounded-md">
            <a href="#" class="block w-full my-3">
                <img src="{{ asset('assets/img/ads.gif') }}" class="w-full h-10 lg:h-20 object-cover" alt="">
            </a>
            <div class="w-full mt-5 px-5 flex flex-col gap-2 bg-white py-5">
                <h2 class="font-bold">{{ $product->title }}</h2>
                <p class="text-[#8a8e94] text-[13px]">{{ $product->description }}</p>
            </div>
            <div class="w-full @if(count($product->samples)) flex @else hidden @endif flex-col gap-2 my-5 px-5 py-3 bg-white">
                <h2 class="font-bold">نمونه کار ها</h2>
                <div class="flex flex-row items-center gap-5 overflow-x-auto">
                    @foreach($product->samples as $sample)
                        <div class="mb-5 samples">
                            <div class="w-[176px] p-2 border-1 border-gray-300 rounded-md flex flex-col gap-3">
                                <img src="{{ asset('storage/'.$sample->image) }}" class="size-40 rounded-sm object-cover" alt="">
                                <span class="text-sm font-bold text-gray-800">{{ $sample->title }}</span>
                                <p class="text-xs text-gray-600 h-8 max-h-8 text-justify ellipsis-2" title="{{ $sample->description }}">{{ $sample->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full px-5 py-3 flex flex-col gap-2 mt-5 my-5 bg-white">
                <h2 class="font-bold">جدول مشخصات</h2>
                <div class="w-full">
                    @if(json_decode($product->attributes))
                        @foreach (json_decode($product->attributes) as $attribute)
                            <div class="w-full flex border-b-1 border-[#e1e1e3] text-[12px] mohammad">
                                <div class="w-4/10 flex items-center px-3 py-2 bg-[#f2f2f2]">
                                    <span class="w-full">{{ $attribute->key }}</span>
                                </div>
                                <div class="w-6/10 px-3 flex items-center py-2">
                                    <span>{{ $attribute->value }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="w-full px-5 py-3 flex flex-col gap-2 mt-5 my-5 bg-white">
                <h2 class="font-bold">محصولات مرتبط</h2>
                <div class="w-full flex flex-row items-start gap-4 overflow-x-auto">
                    @foreach($product->categories as $introCat)
                        @foreach($introCat->products as $introPro)
                            @if($introPro->show_in_home == 1)
                                <div class="flex flex-col items-center gap-3">

                                    <a href="{{ route('introPro.showForUser', [$introPro->id]) }}"
                                       class="w-[222px] flex flex-col bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts"
                                       data-pro-id="{{ $introPro->id }}">
                                        <div class="w-full flex justify-center">
                                            {{-- <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">
                                                <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                                </svg>
                                            </div> --}}
                                            @if(isset($introPro->main_image))
                                                <img src="{{ asset('storage/'.$introPro->main_image) }}" alt=""
                                                     class="size-40 object-cover rounded-xl">
                                            @else
                                                <img src="{{ asset('assets/img/product/قیمت-گوشی-سامسونگ-Samsung-Galaxy-S24-Ultra-حافظه-512-رم-12-پارت-ویتنام.jpeg') }}"
                                                     alt="" class="size-40 object-cover rounded-xl">
                                            @endif
                                        </div>
                                        <div class="flex justify-between mt-7">
                                            <span class="text-[#868a88] h-10 text-sm ellipsis-2">{{ $introPro->title }}</span>
                                        </div>
                                        <div class="w-full flex justify-end pb-2 px-2">
                                            <span class="text-xs text-blue-500">مشاهده ...</span>
                                        </div>
                                        {{-- <span class="font-bold">1.500.000 تومان</span> --}}
                                    </a>

                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="fixed w-full h-dvh bg-black/50 backdrop-blur top-0 right-0 invisible opacity-0 transition-all duration-300 flex flex-row items-center justify-center" id="box"></div>

    <script>
        let samples = document.querySelectorAll('.samples')
        let box = document.getElementById('box')
        samples.forEach((item)=>{
            item.addEventListener('click', ()=>{
                box.innerHTML = ""
                let image = item.children[0].children[0].getAttribute('src')
                let title = item.children[0].children[1].innerText
                let description = item.children[0].children[2].innerText
                box.classList.remove('invisible')
                box.classList.remove('opacity-0')
                let div = document.createElement('div')
                div.classList = 'w-3/4 p-5 rounded-md flex flex-col gap-3 bg-white relative -translate-y-1/8'
                div.innerHTML = `
                    <span class="absolute -top-3 -right-3 bg-white size-7 flex items-center justify-center rounded-full cursor-pointer" onclick="closeBox()">❌</span>
                    <img src="${image}" class="size-60 mx-auto rounded-md" alt="">
                    <span class="font-bold text-gray-800">${title}</span>
                    <p class="text-gray-600 text-justify max-h-[150px] overflow-y-auto">${description}</p>
                `
                box.appendChild(div)
            })
        })

        function closeBox(){
            box.classList.add('invisible')
            box.classList.add('opacity-0')
        }
    </script>
@endsection