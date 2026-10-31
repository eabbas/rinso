@extends('client.document')
@section('title', 'فامنو | جست و جو')
@section('content')

    <div class="w-full px-3 flex flex-col lg:flex-row gap-5 mt-5 lg:mt-10">
        <div class="w-full lg:w-1/5">
            <div class="w-full py-2 flex flex-row items-center overflow-x-auto [&::-webkit-scrollbar]:hidden lg:hidden">
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="all">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                            <path fill="var(--color-fill)"
                                  d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"/>
                        </svg>
                        <span class="text-xs">
                            همه
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="career">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[70px]">
                        <span class="text-xs">
                             رستوران
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="pages">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[110px]">
                        <span class="text-xs">
                            صفحه
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="menu">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <span class="text-xs">
                            منو
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-full p-3 sticky top-5 rounded-lg hidden lg:block border-1 border-gray-300">
                <div class="w-full flex flex-col">
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="all">همه</div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer"
                         data-title="careerCategory">دسته رستوران
                    </div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="career">
                        رستوران
                    </div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="pages">صفحه
                    </div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="menu">منو</div>
                    <div class="p-3 bg-white filter cursor-pointer" data-title="ecomm">فروشگاه</div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-4/5">
            <input type="hidden" id="searchTitle" value="{{ $searchTitle }}">
            @if(count($datas['careerCategory'])==0 && count($datas['career'])==0 && count($datas['pages'])==0 && count($datas['menu'])==0 && count($datas['ecomm'])==0)
                <h2 class="text-sm lg:text-xl">
                    نتایج مرتبط با
                    <span class="font-bold">
                        {{ $datas['title'] }}
                    </span>
                    بافت نشد
                </h2>
            @else
            <h2 class="text-sm lg:text-xl">
                نتایج مرتبط با
                <span class="font-bold">
                    {{ $datas['title'] }}
                </span>
            </h2>
            <div class="flex flex-col gap-5 lg:gap-10 mt-5 lg:mt-10" id="items">
{{--                @if (count($datas['careerCategory']))--}}
{{--                    <div>--}}
{{--                        <h2 class="mb-5 font-bold text-sm lg:text-base">دسته های رستوران</h2>--}}
{{--                        <div class="flex flex-col w-full">--}}
{{--                            @foreach ($datas['careerCategory'] as $restaurantCat)--}}
{{--                            @if (count($restaurantCat->careers))--}}
{{--                                    <a href="{{ route('career.categoryCareers', [$restaurantCat]) }}" class="flex justify-between w-full bg-white rounded-2xl p-2">--}}
{{--                                       <div class="w-6/12 flex justify-between pl-3">--}}
{{--                                           <div>--}}
{{--                                           <span class="text-gray-500 text-sm font-medium max-w-[100px]">--}}
{{--                                           {{ $restaurantCat->title }}--}}
{{--                                           </span>--}}
{{--                                           </div>--}}
{{--                                           <div class="flex flex-col justify-end">--}}
{{--                                               <div class="flex items-center gap-[2px]">--}}
{{--                                                   <div class="text-[.6rem] mt-1">۴.۷</div>--}}
{{--                                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">--}}
{{--                                                       <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>--}}
{{--                                                   </svg>--}}
{{--                                               </div>--}}
{{--                                           </div>--}}
{{--                                       </div>--}}
{{--                                        <div class="rounded-md">--}}
{{--                                                <img class="mx-auto rounded-[7px] object-cover max-w-40 min-w-40 max-h-25 min-h-25"--}}
{{--                                                    src="{{ asset('storage/' . $restaurantCat->main_image) }}"--}}
{{--                                                    alt="social address image">--}}
{{--                                                <div class="absolute top-3 left-3">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">--}}
{{--                                                        <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>--}}
{{--                                                    </svg>--}}
{{--                                                </div>--}}
{{--                                        </div>--}}
{{--                                   </a>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

                @if (count($datas['career']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">رستوران ها</h2>
                        <div class="flex flex-col w-full">
                            @foreach ($datas['career'] as $restaurant)
                                   <a href="{{ route('client.menu', [$restaurant]) }}" class="flex justify-between w-full bg-white rounded-2xl p-2 relative">
                                       <div class="w-6/12 flex justify-between">
                                            <div class="flex flex-col gap-1">
                                                <span class="text-sm font-medium max-w-[100px]">
                                                    {{ $restaurant->title  }}
                                                </span>
                                                @if($restaurant->description!=null)
                                                <span class="text-gray-500 text-xs font-medium truncate max-w-[100px]">
                                                    {{ $restaurant->description  }}
                                                </span>
                                                @endif
                                                @if($restaurant->address!=null)
                                                <span class="text-gray-500 text-xs font-medium truncate max-w-[100px]">
                                                    {{ $restaurant->address  }}
                                                </span>
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-end">
                                                <div class="flex items-center gap-[2px]">
                                                    <div class="text-[.6rem] mt-1">۴.۷</div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">
                                                        <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                       </div>
                                        <div class="rounded-md">
                                            @if($restaurant->logo)
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                    src="{{ asset('storage/' . $restaurant->logo) }}" alt="social address image">
                                            @else
                                            <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                src="{{ asset('assets/img/restaurant.webp') }}" alt="social address image">
                                            @endif
                                                <div class="absolute top-3 left-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                        <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                    </svg>
                                                </div>
                                        </div>
                                   </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($datas['pages']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">صفحه ها</h2>
                        <div class="flex flex-col w-full">
                            @foreach ($datas['pages'] as $page)
                                   <a href="{{ route('client.loadLink', [$page]) }}" class="flex justify-between w-full bg-white rounded-2xl p-2 relative">
                                       <div class="w-6/12 flex justify-between">
                                        <div>
                                            <span class="text-sm font-medium truncate max-w-[100px]">
                                                {{ $page->title }}
                                            </span>
                                        </div>
                                        <div class="flex flex-col justify-end">
                                            <div class="flex items-center gap-[2px]">
                                                <div class="text-[.6rem] mt-1">۴.۷</div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">
                                                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                                </svg>
                                            </div>
                                        </div>
                                       </div>
                                        <div class="rounded-md">
                                            @if($page->logo_path)
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                    src="{{ asset('storage/' . $page->logo_path) }}"
                                                    alt="social address image">
                                            @else 
                                            <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                src="{{ asset('assets/img/restaurant.webp') }}" alt="social address image">
                                            @endif       
                                                <div class="absolute top-3 left-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                        <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                    </svg>
                                                </div>
                                        </div>
                                   </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($datas['menu']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">منو ها</h2>
                        <div class="flex flex-col w-full">
                            @foreach ($datas['menu'] as $menu)
                                @if ($menu->career)
                                        <a href="{{ route('client.loadLink', [$page]) }}" class="flex justify-between w-full bg-white rounded-2xl p-2 relative">
                                            <div class="w-6/12 flex justify-between ">
                                                <div class="flex flex-col gap-1">
                                                    <span class="text-sm font-medium truncate max-w-[100px]">
                                                        {{ $menu->title }}
                                                    </span>
                                                    @if($menu->subtitle!=null)
                                                    <span class="text-gray-500 text-xs font-medium truncate max-w-[100px]">
                                                        {{ $menu->subtitle  }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col justify-end">
                                                    <div class="flex items-center gap-[2px]">
                                                        <div class="text-[.6rem] mt-1">۴.۷</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">
                                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rounded-md">
                                                @if($menu->logo_path)
                                                    <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                        src="{{ asset('storage/' . $menu->logo_path) }}"
                                                        alt="social address image">
                                                @else 
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                    src="{{ asset('assets/img/restaurant.webp') }}" alt="social address image">
                                                @endif       
                                                    <div class="absolute top-3 left-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                            <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                        </svg>
                                                    </div>
                                            </div>
                                        </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-5 lg:gap-10 mt-5 lg:mt-10" id="parentItems"></div>

            @endif
        </div>
    </div>

    <script>
        let parentItems = document.getElementById('parentItems')
        let filter = document.querySelectorAll('.filter')
        let models = []

        // let test = ["abbas" ,"b" ,"c" ,"m" , 'c']
        // console.log(test.includes("c"))

        // test = test.filter(item => item != "c")

        // console.log(test)
        let items = document.getElementById('items')
        filter.forEach((item) => {
            item.addEventListener('click', () => {
                items.classList.add('hidden')
                let searchTitle = document.getElementById('searchTitle')
                if (item.getAttribute('data-title') != "all") {
                    if (models.includes('all')) {
                        models = models.filter(index => index != "all")
                        let alls = document.querySelectorAll('[data-title="all"]')
                        alls.forEach((all) => {
                            all.classList.remove('bg-gray-200')
                            all.classList.add('bg-white')
                        })
                    }
                    if (!models.includes(item.getAttribute('data-title'))) {
                        item.classList.remove('bg-white')
                        item.classList.add('bg-gray-200')
                        models.push(item.getAttribute('data-title'))
                    } else {
                        item.classList.remove('bg-gray-200')
                        item.classList.add('bg-white')
                        models = models.filter(field => field != item.getAttribute('data-title'))
                    }
                    if (models.length == 0) {
                        let alls = document.querySelectorAll('[data-title="all"]')
                        alls.forEach((all) => {
                            all.classList.remove('bg-gray-200')
                            all.classList.add('bg-white')
                        })
                        models.push('all')
                    }
                }
                if (item.getAttribute('data-title') == "all") {


                    models = []
                    filter.forEach((index) => {
                        index.classList.remove('bg-gray-200')
                        index.classList.add('bg-white')
                    })
                    models.push(item.getAttribute('data-title'))
                    item.classList.remove('bg-white')
                    item.classList.add('bg-gray-200')


                    // if (!models.includes(item.getAttribute('data-title'))) {
                    //     models = []
                    //     filter.forEach((index) => {
                    //         index.classList.remove('bg-gray-200')
                    //         index.classList.add('bg-white')
                    //     })
                    //     models.push(item.getAttribute('data-title'))
                    //     item.classList.remove('bg-white')
                    //     item.classList.add('bg-gray-200')
                    // } else {
                    //     item.classList.remove('bg-gray-200')
                    //     item.classList.add('bg-white')
                    //     items.classList.remove('hidden')
                    //     // models = []
                    // }
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('filter') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'models': models,
                        'searchTitle': searchTitle.value,
                    },
                    success: function (datas) {
                        parentItems.innerHTML = ""
                        for (const key in datas) {
                            if (key == "careerCategory") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "دسته های  رستوران"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "flex flex-col w-full"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('careers/categoryCareers/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.classList = "flex justify-between w-full bg-white rounded-2xl p-2 relative"
                                    element.setAttribute('href',url)
                                    element.innerHTML = `
                                       <div class="w-6/12">
                                           <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                           ${data.title}
                                           </span>
                                       </div>
                                        <div class="rounded-md">
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                    src="${'{{ asset('storage/') }}/' + data.main_image}">
                                                <div class="absolute top-3 left-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                        <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                    </svg>
                                                </div>
                                        </div>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "career") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "رستوران ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "flex flex-col w-full"
                                datas[key].forEach((data) => {
                                    let myHtml = ""
                                    let url = "{{ url('qrcodes/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.classList = "flex justify-between w-full bg-white rounded-2xl p-2 relative"
                                    element.setAttribute('href',url)
                                    myHtml = `
                                        <div class="w-6/12 flex justify-between">
                                            <div class="flex flex-col gap-1">
                                                <span class="text-sm font-medium max-w-[100px]">
                                                    ${data.title}
                                                    </span>`
                                                    console.log(element.innerHTML)
                                                if(data.description!=null){
                                                    console.log("salam 1")
                                                    // console.log(data.description)
                                                    myHtml+=`
                                                    <span class="text-gray-500 text-xs font-medium truncate max-w-[100px]">
                                                        ${data.description}
                                                    </span>`
                                                    // console.log(element.innerHTML)
                                                }
                                                if(data.address!=null){
                                                    myHtml+=`
                                                    <span class="text-gray-500 text-xs font-medium truncate max-w-[100px]">
                                                        ${data.address}
                                                    </span>`
                                                }
                                                console.log("salam 2")
                                                // console.log(element.innerHTML)
                                                myHtml+=`
                                            </div>
                                            <div class="flex flex-col justify-end">
                                                <div class="flex items-center gap-[2px]">
                                                    <div class="text-[.6rem] mt-1">۴.۷</div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">
                                                        <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rounded-md">`
                                            if(data.logo){
                                                myHtml+=`
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                src="${'{{ asset('storage/') }}/' + data.logo}">`
                                            }else{
                                                myHtml+=`
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                src="{{ asset('assets/img/restaurant.webp') }}" alt="social address image">`
                                            }
                                                myHtml+=`
                                                    <div class="absolute top-3 left-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                            <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                        </svg>
                                                    </div>
                                        </div>
                                    `
                                    element.innerHTML=myHtml
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "pages") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "صفحه ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "flex flex-col w-full"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('qrcodes/links/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.classList = "flex justify-between w-full bg-white rounded-2xl p-2 relative"
                                    element.setAttribute('href',url)
                                    element.innerHTML = `
                                       <div class="w-6/12 flex justify-between">
                                        <div>
                                            <span class="text-sm font-medium truncate max-w-[100px]">
                                                ${data.title}
                                            </span>
                                        </div>
                                        <div class="flex flex-col justify-end">
                                            <div class="flex items-center gap-[2px]">
                                                <div class="text-[.6rem] mt-1">۴.۷</div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">
                                                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                                </svg>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="rounded-md">`
                                        if(data.logo_path){
                                            element.innerHTML+=`
                                                <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                                    src="${'{{ asset('storage/') }}/' + data.logo_path}">`
                                        }else{
                                            element.innerHTML+=`
                                            <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                            src="{{ asset('assets/img/restaurant.webp') }}" alt="social address image">`
                                        }
                                            element.innerHTML+=`
                                                <div class="absolute top-3 left-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                        <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                    </svg>
                                                </div>
                                        </div>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "menu") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "منو ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "flex flex-col w-full"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('qrcodes/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('div')
                                    element.classList = "flex justify-between w-full bg-white rounded-2xl p-2 relative"
                                    element.setAttribute('href',url)
                                    element.innerHTML = `
                                            <div class="w-6/12 flex justify-between ">
                                                <div class="flex flex-col gap-1">
                                                    <span class="text-sm font-medium truncate max-w-[100px]">
                                                        ${data.title}
                                                    </span>`
                                                    if(data.subtitle!=null)
                                                    element.innerHTML+=`
                                                    <span class="text-gray-500 text-xs font-medium truncate max-w-[100px]">
                                                    ${data.subtitle}
                                                </span>`
                                                element.innerHTML+=`
                                            </div>
                                <div class="flex flex-col justify-end">
                                    <div class="flex items-center gap-[2px]">
                                        <div class="text-[.6rem] mt-1">۴.۷</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3 fill-yellow-500">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-4/12 rounded-md overflow-hidden ">`
                            if(data.banner){
                                elemetn.innerHTML+=`
                                    <img class="mx-auto rounded-[7px] object-cover"
                                        src="${'{{ asset('storage/') }}/' + data.banner}">`
                            }else{
                                element.innerHTML+=`
                                            <img class="mx-auto rounded-[7px] object-cover max-w-35 min-w-35 max-h-23 min-h-23"
                                            src="{{ asset('assets/img/restaurant.webp') }}" alt="social address image">`
                            }
                                element.innerHTML+=`            
                                                    <div class="absolute top-3 left-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-white">
                                                            <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                                        </svg>
                                                    </div>
                                            </div>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "ecomm") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "فروشگاه ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data) => {
                                    let url = "#"
                                    // url += "/"
                                    // url += data.id
                                    let element = document.createElement('a')
                                    element.setAttribute('title', data.title)
                                    element.setAttribute('href', url)
                                    element.classList = "w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                    element.innerHTML = `
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="${'{{ asset('storage/') }}/' + data.banner}">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        ${data.title}
                                    </span>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                        }
                    },
                    error: function () {
                        alert('خطا  در ارسال داده')
                    }
                })

            })
        })
    </script>

@endsection
