    @extends('admin.app.panel')
    @section('title', 'مشاهده منو')
    @section('content')
        <div class="2xl:container mx-auto w-full">
            <div class="w-full pt-16">
                @if (!$menu->banner)
                    <img src="{{ asset('storage/images/banner01.jpg') }}"
                        class="w-11/12 h-[120px] sm:h-[180px] lg:h-[260px] mx-auto rounded-md object-cover" alt="menu banner">
                @else
                    <img src="{{ asset('storage/' . $menu->banner) }}"
                        class="w-11/12 h-[120px] sm:h-[180px] lg:h-[260px] mx-auto rounded-md object-cover" alt="menu banner">
                @endif
            </div>
            <div class="w-full py-5 mt-5 rounded-[10px]">
                <div class="flex flex-row-reverse justify-between">
                    <div class="flex flex-row items-center gap-1">
                        {{-- <a href="{{ route('menu.qrcodes', [$menu->id]) }}"
                            class="bg-[#03A9F4] text-white border border-gray-300 rounded-md p-2 text-sm">مشاهده QR کد
                            ها</a> --}}
                    </div>
                    <h1 class="font-bold py-5 text-gray-500 lg:text-2xl md:text-xl ">
                        لیست منوی {{ $menu->title }}
                    </h1>
                </div>
                <div class="w-full flex flex-col gap-3 p-3 border border-gray-300 rounded-lg">
                    @foreach ($menu->menu_categories as $category)
                        <div class="w-full lg:w-10/12 m-auto">
                            <div class="flex flex-row justify-between items-center">
                                <div class="flex flex-row items-end mb-3 gap-5">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="menu image"
                                        class="size-12 rounded-[5px]">
                                    <h2 class="text-xl font-bold text-gray-600">{{ $category->title }}</h2>
                                </div>
                                <a href="{{ route('menuCat.edit', [$category->id]) }}"
                                    class="bg-[#03A9F4] text-white border border-gray-300 rounded-md p-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                        <path fill="white"
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                    </svg>
                                </a>
                            </div>
                            <div
                                class="w-full flex flex-col overflow-x-auto scroll-snap-x snap-mandatory gap-3 px-1 py-2 no-scrollbar ">
                                @foreach ($category->menu_items as $item)
                                    <div class="flex flex-row justify-between items-center bg-gray-300 px-5 rounded-md">
                                        <div class="shrink-0 snap-center grid grid-cols-4 gap-4">
                                            <div class="py-1">
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    class="size-10 rounded-[5px]" alt="item_image">
                                            </div>
                                            <div
                                                class="snap-center text-xs lg:text-base py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">
                                                {{ $item->title }}</div>
                                            <div
                                                class="shrink-0 text-xs lg:text-base snap-center py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">
                                                {{ $item->price }}</div>
                                            <div
                                                class="shrink-0 text-xs lg:text-base snap-center py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">
                                                {{ $item->description }}</div>
                                        </div>
                                        <a href="{{ route('menuItem.edit', [$item->id]) }}"
                                            class="bg-green-500 text-white border border-gray-300 rounded-md p-2 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                                                <path fill="white"
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
