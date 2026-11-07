@extends('client.document')
@section('title')
    {{ $page->title }}
@endsection
@section('content')

    {{--    <div class="2xl:container w-11/12 lg:max-w-xl mb-10 mx-auto"> --}}
    <div class="2xl:w-max-130 w-11/12 lg:max-w-xl mb-10 mx-auto">
        <div class="w-full my-5 flex flex-col relative">
            <div class="flex flex-row justify-end items-center gap-3 lg:gap-5">
                <div class="w-full">
                    {{-- page qr code --}}
                    <div class="w-full h-dvh fixed top-0 right-0 z-999 bg-black/50 invisible opacity-0 transition-all duration-300"
                        id="qrcode_card">
                        <div class="relative w-full h-full float-end flex items-center justify-center">

                            @if (isset($page->social_qr_codes->qr_path))
                                <div
                                    class="w-9/12 md:w-8/12 lg:w-7/12 xl:w-3/12 mx-auto bg-white rounded-lg p-5 relative flex flex-col gap-2">
                                    <div class="absolute -top-3 -right-3 bg-white rounded-full p-2 cursor-pointer"
                                        onclick="qrCard('close')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                            <path
                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                        </svg>
                                    </div>
                                    <img src="{{ asset('storage/' . $page->social_qr_codes->qr_path) }}" class="w-full"
                                        alt="">
                                    <div class="w-full p-3 mx-auto bg-gray-300 rounded-lg mt-2 flex items-center justify-center cursor-pointer sm:text-2xl"
                                        onclick='copyText({{ $page->id }} , "{{ $page->social_qr_codes->page_path }}")'>
                                        کپی لینک
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- page qr code end --}}
                    <div class="w-full flex flex-row items-center justify-between gap-3 mb-4">
                        <div id="addCustomer">
                            @if (!Auth::check())
                                <div class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer"
                                    onclick="addSpecialCustomer(this , 'page')">
                                    عضویت در باشگاه مشتریان
                                </div>
                            @elseif(Auth::check() && $page->user->id != Auth::id())
                                <div class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer"
                                    onclick="addSpecialCustomer(this , 'page')">
                                    عضویت در باشگاه مشتریان
                                </div>
                            @elseif(Auth::check() && $page->user->id == Auth::id())
                                <a href="{{ route('special-user.index', [$page->id]) }}"
                                    class="flex justify-center items-center w-40 py-2 bg-blue-500 text-white text-xs font-bold rounded-sm cursor-pointer"
                                    onclick="specialCustomers(this , 'page')">
                                    باشگاه مشتریان
                                </a>
                            @endif
                        </div>
                        <div class="flex flex-row items-center gap-5">
                            @if (Auth::check() && Auth::user()->id == $page->user->id)
                                {{-- page qr code end --}}
                                <a href="{{ route('pages.single', [$page]) }}"
                                    class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path
                                            d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                                    </svg>
                                </a>
                            @endif
                            <div class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer" onclick="qrCard('open')">
                                {{-- <?xml version="1.0" encoding="UTF-8"?> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="relative">
                <div>
                    @if ($page->cover_path)
                        <img class="w-full h-[180px] object-cover lg:h-[200px] rounded-sm"
                            src="{{ asset('storage/' . $page->cover_path) }}" alt="">
                    @else
                        <img class="w-full h-[180px] object-cover lg:h-[200px] rounded-sm"
                            src="{{ asset('assets/img/bg-page.jpg') }}" alt="">
                    @endif
                </div>
                <div class="flex flex-col items-center justify-end w-full h-[100px]">
                    <h2 class="text-center text-base lg:text-lg font-bold text-gray-800">
                        {{ $page->title }}
                    </h2>
                    <span class="block text-cetner text-sm lg:text-md text-gray-500">
                        {{ $page->subTitle }}
                    </span>
                </div>
                @if ($page->logo_path)
                    <img src="{{ asset('storage/' . $page->logo_path) }}"
                        class="size-26 lg:size-30 rounded-full absolute inset-1/2 translate-x-1/2 -translate-y-1/5 border-4 border-white object-cover"
                        alt="">
                @else
                    <img src="{{ asset('assets/img/user.png') }}"
                        class="size-26 lg:size-30 rounded-full absolute inset-1/2 translate-x-1/2 -translate-y-1/5 border-4 border-white object-cover"
                        alt="">
                @endif
            </div>
            <div class="w-full mt-5 lg:mt-10 flex flex-col gap-5">

                @if (count($page->introPros))
                    <div class="w-full flex flex-col gap-3">

                        <div class="lg:py-2">
                            <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                                محصولات
                            </h3>
                            <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                <a href="{{ route('pages.products', [$page->id]) }}"
                                    class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-blue-900/10 rounded-full cursor-pointer editSocial relative transition-all duration-300">

                                    <span class="font-bold text-gray-800">مشاهده محصولات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (count($page->socialAddresses))
                    <div class="w-full flex flex-col gap-3 lg:gap-5" id="socialLinks">
                        @foreach ($page->socialAddresses as $item)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                                    ورود به {{ $item->socialMedia->title }}
                                </h3>
                                <div class="mt-3">
                                    <a href="{{ $item->socialMedia->link . $item->username }}"
                                        class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-[{{ $item->socialMedia->color }}] rounded-full cursor-pointer ">
                                        <img src="{{ asset('storage/' . $item->socialMedia->icon_path) }}"
                                            class="size-5 rounded-md" alt="">
                                        <span class="font-bold text-gray-800">{{ $item->socialMedia->title }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (count($page->siteLinks))
                    <div class="w-full flex flex-col gap-3 lg:gap-5" id="siteLinks">
                        @foreach ($page->siteLinks as $siteLink)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center viewLinkTitle"
                                    data-view-link-id="{{ $siteLink->id }}">
                                    ورود به {{ $siteLink->title }}
                                </h3>
                                <div class="mt-3">
                                    <a href="{{ $siteLink->address }}"
                                        class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-gray-200 rounded-full cursor-pointer ">
                                        @if ($siteLink->icon_path)
                                            <img src="{{ asset('storage/' . $siteLink->icon_path) }}"
                                                class="size-5 rounded-md" alt="">
                                        @else
                                            <img src="{{ asset('assets/img/link-simple.svg') }}" class="size-5 rounded-md"
                                                alt="">
                                        @endif
                                        <span class="font-bold text-gray-800 viewLinkTitle"
                                            data-view-link-id="{{ $siteLink->id }}">{{ $siteLink->title }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- Faq start --}}
                @if (count($page->page_blocks) > 0)
                    <div class="w-full flex flex-col gap-3" id="faq">
                        @foreach ($page->page_blocks as $page_block)
                            @if ($page_block->type == 'FAQS')
                                <div class="lg:py-2">
                                    <h3 class="lg:block text-lg font-bold text-gray-800 text-center cursor-pointer viewFAQ"
                                        onclick='editTitle("{{ $page_block->id }}")'
                                        data-block-id="{{ $page_block->id }}">
                                        {{ $page_block->title }}
                                    </h3>
                                </div>
                                @foreach ($page_block->FAQs as $FAQ)
                                    <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                        <div class="w-full faqBox">
                                            <div
                                                class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                                <div class="flex flex-row items-center gap-2"
                                                    onclick='editFaq("{{ $FAQ->id }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                        class="size-5 rounded-md">
                                                        <path
                                                            d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                                    </svg>
                                                    <span class="font-bold text-gray-800 viewFAQ"
                                                        data-view-FAQ-id="{{ $FAQ->id }}">{{ $FAQ->question }}</span>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4 transition-all duration-200 cursor-pointer"
                                                    viewBox="0 0 448 512">
                                                    <path fill="black"
                                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                                </svg>
                                            </div>
                                            <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                                <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                                    <p class="text-gray-700 font-bold">{{ $FAQ->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>
                @endif
                @endforeach
            </div>
            @endif
            {{-- Faq end --}}
            {{-- contactus start --}}
            @if (count($page->page_blocks) > 0)
                <div class="w-full flex flex-col gap-3" id="pc">
                    @foreach ($page->page_blocks as $page_block)
                        @if ($page_block->type == 'pageContactus')
                            <div class="lg:py-2">
                                <h3 class="lg:block text-lg font-bold text-gray-800 text-center cursor-pointer viewFAQ"
                                    onclick='editTitle("{{ $page_block->id }}")' data-block-id="{{ $page_block->id }}">
                                    {{ $page_block->title }}
                                </h3>
                                @foreach ($page_block->page_contactuses as $PC)
                                    <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                        <div class="w-full contactusBox">
                                            <div
                                                class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                                <div class="flex flex-row items-center gap-2"
                                                    onclick='editPageContactus("{{ $PC->id }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                        class="size-5 rounded-md">
                                                        <path
                                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                                    </svg>
                                                    <span class="font-bold text-gray-800 viewContactus"
                                                        data-view-pc-id="{{ $PC->id }}">{{ $PC->key }}</span>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4 transition-all duration-200 cursor-pointer"
                                                    viewBox="0 0 448 512">
                                                    <path fill="black"
                                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                                </svg>
                                            </div>
                                            <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                                <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                                    <p class="text-gray-700 font-bold">{{ $PC->value }}</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            {{-- contactus end --}}
            {{-- page description --}}
            @if (count($page->page_blocks) > 0)
                <div class="w-full flex flex-col gap-3" id="pd">
                    @foreach ($page->page_blocks as $page_block)
                        @foreach ($page_block->page_descriptions as $pd)
                            <?php
                            $pageStyle = json_decode($pd['style']);
                            ?>
                            <div class="lg:py-2">
                                <div class="text-gray-800 {{ $pageStyle[0] }} {{ $pageStyle[1] }} cursor-pointer viewDescriptionPage"
                                    onclick='editDescription("{{ $pd->id }}" , "{{ $pageStyle[0] }}" , "{{ $pageStyle[1] }}" , "{{ $page_block->id }}" , this)'
                                    data-view-pd-id="{{ $page_block->id }}">{{ $pd->description }}</div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endif

            {{-- page description end --}}
        </div>
    </div>
    </div>

    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-9999"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>
        </div>
    </div>


    <div id="authenticationDiv"
        class="fixed w-full h-dvh bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 opacity-0 invisible">

        <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer" onclick="closeLoginForm()"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>
            <h3 class="text-center text-sm font-bold text-gray-800">ابتدا وارد شوید</h3>
            <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full" method="post"
                id="loginForm">
                @csrf
                <input type="number"
                    class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                    name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" required>
                <div class="w-full" id="login">
                    <div class="w-full flex flex-row items-center gap-3">
                        <input type="number"
                            class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="code" placeholder="کد" required id="code">
                        <button type="button"
                            class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                            onclick="sendCode()" id="countDown">ارسال کد </button>
                    </div>
                </div>
                <div class="w-full flex flex-row items-center justify-between" id="loginWay">
                    <a href="{{ route('forget_password') }}"
                        class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                    <span class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
                        onclick="loginWithPassKey(this)">ورود با رمز عبور</span>
                </div>
                <button onclick="check(event)"
                    class="focus:bg-[#eb3254] hover:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                    ورود
                </button>
                <div class="w-full text-center">
                    <span class="text-[#4B5675] mt-1 md:mt-5 max-md:text-sm">
                        هنوز عضو نشدی؟
                        <a href="{{ route('signup') }}" class="text-[#eb3254] mr-2">ثبت نام!</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
    @isset($page)
        <script>
            function copyText(pageId, pagePath) {
                let url = "{{ url('/') }}" + pagePath
                navigator.clipboard.writeText(url)
                alert("لینک کپی شد")
            }
        </script>
    @endisset
    @include('client.link.specialUserJs')
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection
