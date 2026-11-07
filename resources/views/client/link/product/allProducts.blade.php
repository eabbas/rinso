@extends('client.document')
@section('title')
   محصولات {{ $page->title }}
@endsection
@section('content')
    <style>
        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <div class="w-11/12 mx-auto">
        @if(count($page->introCats) && count($page->introPros))
            <section class="w-full flex flex-col gap-3 mt-5">
                <h2 class="text-lg font-bold py-3 text-center">محصولات</h2>
                <div class="w-full flex flex-col gap-3">
{{--                    <div class="w-full flex flex-row justify-end">--}}
{{--                        <a href="{{ route('pages.introCats', [$page->id]) }}" class="w-fit text-sm text-blue-500">همه--}}
{{--                            دسته ها</a>--}}
{{--                    </div>--}}
                    <div class="w-full overflow-auto pb-4 flex gap-2 items-center pb-1 text-[15px]">
                    <span class="px-3 h-10 text-nowrap flex justify-center items-center rounded-full cursor-pointer shadow border-1 bg-gray-200"
                          onclick="allProducts(this)">همه</span>
                        @foreach ($page->introCats as $introCat)
                            @if(count($introCat->products) && $introCat->show_in_home == 1)
                                <span class="px-3 bg-white h-10 text-nowrap flex justify-center items-center rounded-full border-1 cursor-pointer shadow introCategories"
                                      data-cat-id="{{ $introCat->id }}">{{ $introCat->title }}</span>
                            @endif
                        @endforeach
                    </div>

                </div>
                <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-4" id="allProducts">
                    @foreach($page->introPros as $introPro)
                        @if($introPro->show_in_home == 1)
                            <div class="w-full flex flex-col items-center gap-3">

                                <a href="{{ route('introPro.showForUser', [$introPro->id]) }}"
                                   class="w-full flex flex-col bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts"
                                   data-pro-id="{{ $introPro->id }}">
                                    <div class="w-full flex justify-center">
{{--                                        <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">--}}
{{--                                            <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true"--}}
{{--                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"--}}
{{--                                                 viewBox="0 0 24 24">--}}
{{--                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                      stroke-width="1.5"--}}
{{--                                                      d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
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
{{--                                    <span class="font-bold">1.500.000 تومان</span>--}}
                                </a>

                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-4" id="customProducts"></div>
            </section>
        @endif
    </div>


    <script>

        // بهینه سازی شود، فیلد اسلاگ جدا بشه از pagePath
        function copyText(pageId, slug) {
            let url = "famenu.ir" + "/" + slug
            navigator.clipboard.writeText(url)
            alert("لینک کپی شد")
        }

        // اتمام توضیحات
        let allPros = document.getElementById('allProducts')
        let customProducts = document.getElementById('customProducts')
        let introCategories = document.querySelectorAll('.introCategories')

        introCategories.forEach((introProduct) => {
            introProduct.addEventListener('click', () => {
                customProducts.innerHTML = `
            <div class="col-span-2 w-full h-[284px] flex justify-center items-center">
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
            </div>
            `
                allPros.classList.remove('grid')
                allPros.classList.add('hidden')
                introProduct.parentElement.children[0].classList.remove('bg-gray-200')
                introProduct.parentElement.children[0].classList.add('bg-white')
                if (introProduct.classList.contains('bg-white')) {
                    introCategories.forEach((item) => {
                        item.classList.add('bg-white')
                        item.classList.remove('bg-gray-200')
                    })
                    introProduct.classList.remove('bg-white')
                    introProduct.classList.add('bg-gray-200')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('introPro.showProducts') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "category_id": introProduct.getAttribute('data-cat-id'),
                        },
                        success: function (datas) {
                            customProducts.innerHTML = ""
                            datas.forEach((data) => {
                                if (data.show_in_home == 1) {
                                    let link = "{{ url('intro-pro/user-show') }}/" + data.id
                                    let div = document.createElement('div')
                                    div.classList = "w-full flex flex-col items-center gap-3"
                                    div.innerHTML = `
                                <a href="${link}" class="w-full flex flex-col gap-3 bg-[#fafafa] p-1 shadow-sm rounded-xl introProducts" data-pro_id="${data.id}">
                                    <div class="w-full flex justify-center relative">

                                        <img src="${data.main_image ? '{{ asset('storage/') }}/' + data.main_image : '/images/default-product.png'}" alt="" class="size-40 object-cover rounded-xl">
                                    </div>
                                    <div class="flex justify-between mt-7">
                                        <span class="text-[#868a88] h-10 text-sm ellipsis-2">${data.title}</span>
                                    </div>
                                    <div class="w-full flex justify-end pb-2 px-2">
                                        <span class="text-xs text-blue-500">مشاهده ...</span>
                                    </div>

                                </a>
                                `
                                    customProducts.appendChild(div)
                                }
                            })
                        },
                        error: function () {
                            console.log('error')
                        }

                    })
                } else {
                    introProduct.classList.remove('bg-gray-200')
                    introProduct.classList.add('bg-white')
                }

            })
        })

        function allProducts(el) {
            // console.log(allPros)
            introCategories.forEach((introProduct) => {
                introProduct.classList.remove('bg-gray-200')
                introProduct.classList.add('bg-white')
            })
            el.classList.remove('bg-white')
            el.classList.add('bg-gray-200')
            allPros.classList.remove('hidden')
            allPros.classList.add('grid')
            customProducts.innerHTML = ""
        }
    </script>

@endsection