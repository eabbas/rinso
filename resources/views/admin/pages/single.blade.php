@extends('admin.app.panel')

@section('title')
    {{ $page->title }}
@endsection
@section('content')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <style>
        .ellipsis-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <div class="w-full lg:w-2/3 mx-auto relative z-333">
        <div class="w-full mt-5 p-5 bg-white flex flex-col pb-40 relative rounded-lg">
            <div class="w-full flex flex-row justify-between items-center gap-3 pb-5">
                <div>
                    {{-- page qr code --}}
                    <div class="w-full h-dvh fixed top-0 right-0 z-999 bg-black/50 invisible opacity-0 transition-all duration-300"
                         id="qrcode_card">
                        <div
                                class="relative w-full lg:w-[calc(100%-265px)] h-full float-end flex items-center justify-center">
                            @if (isset($page->social_qr_codes->qr_path))
                                <div class="w-2/3 lg:w-1/4 mx-auto bg-white rounded-lg p-5 relative">
                                    <div class="absolute -top-3 -right-3 bg-white rounded-full p-2 cursor-pointer"
                                         onclick="qrCard('close')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                            <path
                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                        </svg>
                                    </div>
                                    <img src="{{ asset('storage/' . $page->social_qr_codes->qr_path) }}" class="w-full"
                                         alt="">
                                    <div class="lg:w-full mx-auto bg-gray-300 rounded-lg p-2 mt-2 flex items-center justify-center cursor-pointer"
                                         onclick='copyText({{ $page->id }} , "{{ $page->social_qr_codes->page_path }}")'>
                                        کپی لینک
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- page qr code end --}}
                    <div class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer" onclick="qrCard('open')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" id="Layer_1" data-name="Layer 1"
                             viewBox="0 0 24 24">
                            <path
                                    d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <a href="{{ route('pages.edit', [$page]) }}"
                       class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                             viewBox="0 0 512 512">
                            <path
                                    d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"/>
                        </svg>
                    </a>
                </div>
                <div>
                    <a href="{{ route('client.loadPage', [$page->user_name]) }}"
                       class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                            <path
                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-3 lg:p-5 rounded-full bg-black bottom-21 right-3 lg:-right-10 fixed lg:absolute cursor-pointer z-444"
                 onclick="addBlock('open')">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 lg:size-10" viewBox="0 0 448 512">
                    <path fill="white"
                          d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                </svg>
            </div>
            @include('admin.pages.editInfo')
            <div class="w-full mt-5 lg:mt-10 flex flex-col gap-3">

                <div class="w-full flex flex-col gap-3">
                    @if (count($page->introPros))
                        <div class="lg:py-2">
                            <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                                محصولات
                            </h3>
                            <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                <a href="{{ route('pages.proList', [$page->id]) }}"
                                   class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-blue-900/10 rounded-full cursor-pointer editSocial relative transition-all duration-300">
                                    <span class="font-bold text-gray-800">مشاهده محصولات</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="w-full mt-5 lg:mt-10 flex flex-col gap-3">
                <div class="w-full flex flex-col gap-3" id="socialLinks">
                    @if (count($page->socialAddresses))
                        @foreach ($page->socialAddresses as $item)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                                    ورود به {{ $item->socialMedia->title }}
                                </h3>
                                <div class=" relative mt-3 relative flex flex-col lg:flex-row gap-3">
                                    <div class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-[{{ $item->socialMedia->color }}] rounded-full cursor-pointer editSocial relative transition-all duration-300"
                                         data-social-id="{{ $item->id }}"
                                         onclick='editSocial("{{ $item->id }}", "{{ $item->socialMedia->id }}")'>
                                        <img src="{{ asset('storage/' . $item->socialMedia->icon_path) }}"
                                             class="size-5 rounded-md" alt="">
                                        <span class="font-bold text-gray-800">{{ $item->socialMedia->title }}</span>
                                    </div>
                                    <div class="absolute -top-2 left-0 w-8 flex flex-col items-center gap-3">
                                        <a  onclick='editSocial("{{ $item->id }}", "{{ $item->socialMedia->id }}")'
                                            class="p-1.5 rounded-full bg-zinc-300  cursor-pointer w-full flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="size-4 fill-zinc-500 hover:fill-green-500"
                                                 viewBox="0 0 512 512">
                                                <path fill=""
                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </a>
                                        <a  onclick='deleteMediaList(this, "{{ $item->id }}")'
                                            class="p-1.5 rounded-full bg-zinc-300  cursor-pointer w-full flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="size-4 fill-zinc-500 hover:fill-red-500"
                                                 viewBox="0 0 448 512">
                                                <path fill=""
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="w-full flex flex-col gap-3" id="siteLinks">
                    @if (count($page->siteLinks))
                        @foreach ($page->siteLinks as $siteLink)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center viewLinkTitle"
                                    data-view-link-id="{{ $siteLink->id }}">
                                    ورود به {{ $siteLink->title }}
                                </h3>
                                <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                    <div class="w-full lg:w-8/9 flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-gray-200 rounded-full cursor-pointer editLink relative transition-all duration-300"
                                         onclick='editLink("{{ $siteLink->id }}")' data-site-id="{{ $siteLink->id }}">
                                        <img src="{{ asset('assets/img/link-simple.svg') }}" class="size-5 rounded-md"
                                             alt="">
                                        <span class="font-bold text-gray-800 viewLinkTitle"
                                              data-view-link-id="{{ $siteLink->id }}">{{ $siteLink->title }}</span>
                                    </div>
                                    <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                             onclick='editLink("{{ $siteLink->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 512 512">
                                                <path fill="white"
                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </div>
                                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                             onclick='deleteLinkList(this, "{{ $siteLink->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{-- Faq start --}}
                <div class="w-full flex flex-col gap-3" id="faq">
                    @if (count($page->page_blocks) > 0)
                        @foreach($page->page_blocks as $page_block)
                            @if($page_block->type == "FAQS")

                                <div class="lg:py-2">
                                    <h3 class="lg:block text-lg font-bold text-gray-800 text-center cursor-pointer viewFAQ"
                                        onclick='editTitle("{{ $page_block->id }}")'
                                        data-block-id="{{ $page_block->id }}">
                                        {{ $page_block->title }}
                                    </h3>
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        <div class="p-1.5 rounded-md bg-blue-500 hover:bg-blue-600 cursor-pointer"
                                             onclick='addQuestionToBlock("{{ $page_block->id }}", this)'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                             onclick='editTitle("{{ $page_block->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 512 512">
                                                <path fill="white"
                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                             onclick='deleteTitle("{{ $page_block->id }}", this)'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </div>
                                    </div>

                                    @foreach ($page_block->FAQs as $FAQ)
                                        <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                            <div class="w-full lg:w-8/9 faqBox">
                                                <div class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                                    <div class="flex flex-row items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                             class="size-5 rounded-md">
                                                            <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                                        </svg>
                                                        <span class="font-bold text-gray-800 viewFAQ"
                                                              data-view-FAQ-id="{{ $FAQ->id }}">{{ $FAQ->question }}</span>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="size-4 transition-all duration-200 cursor-pointer"
                                                         viewBox="0 0 448 512">
                                                        <path fill="black"
                                                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                                    </svg>
                                                </div>
                                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                                    <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                                        <p class="text-gray-700 font-bold">{{ $FAQ->answer }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                                     onclick='editFaq("{{ $FAQ->id }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                         viewBox="0 0 512 512">
                                                        <path fill="white"
                                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                    </svg>
                                                </div>
                                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                                     onclick='deleteFAQ(this, "{{ $FAQ->id }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                         viewBox="0 0 448 512">
                                                        <path fill="white"
                                                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                {{-- Faq end --}}
                {{-- contactus start --}}
                <div class="w-full flex flex-col gap-3" id="pc">
                    @if (count($page->page_blocks) > 0)
                        @foreach($page->page_blocks as $page_block)
                            @if($page_block->type == "pageContactus")
                                <div class="lg:py-2">
                                    <h3 class="lg:block text-lg font-bold text-gray-800 text-center cursor-pointer viewFAQ"
                                        onclick='editTitle("{{ $page_block->id }}")'
                                        data-block-id="{{ $page_block->id }}">
                                        {{ $page_block->title }}
                                    </h3>
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        <div class="p-1.5 rounded-md bg-blue-500 hover:bg-blue-600 cursor-pointer"
                                             onclick='addContactusToBlock("{{ $page_block->id }}", this)'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                             onclick='editTitle("{{ $page_block->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 512 512">
                                                <path fill="white"
                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                             onclick='deleteTitle("{{ $page_block->id }}", this)'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    {{-- @dd($page_block->page_contactuses) --}}
                                    @foreach ($page_block->page_contactuses as $PC)
                                        <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                            <div class="w-full lg:w-8/9 contactusBox">
                                                <div class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                                    <div class="flex flex-row items-center gap-2"
                                                         onclick='editPageContactus("{{ $PC->id }}")'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                             class="size-5 rounded-md">
                                                            <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                                                        </svg>
                                                        <span class="font-bold text-gray-800 viewContactus"
                                                              data-view-pc-id="{{ $PC->id }}">{{ $PC->key }}</span>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="size-4 transition-all duration-200 cursor-pointer"
                                                         viewBox="0 0 448 512">
                                                        <path fill="black"
                                                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                                    </svg>
                                                </div>
                                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                                    <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                                        <p class="text-gray-700 font-bold">{{ $PC->value }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                                     onclick='editpageContactus("{{ $PC->id }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                         viewBox="0 0 512 512">
                                                        <path fill="white"
                                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                    </svg>
                                                </div>
                                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                                     onclick='deletePageContactus(this, "{{ $PC->id }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                         viewBox="0 0 448 512">
                                                        <path fill="white"
                                                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                {{-- contactus end--}}
                {{-- page description --}}
                <div class="w-full flex flex-col gap-3" id="pd">
                    @if (count($page->page_blocks) > 0)
                        @foreach($page->page_blocks as $page_block)
                            @foreach ($page_block->page_descriptions as $pd)
                                    <?php
                                    $pageStyle = json_decode($pd['style'])
                                    ?>
                                <div class="lg:py-2">
                                    <div class="text-gray-800 {{ $pageStyle[0] }} {{ $pageStyle[1] }} cursor-pointer viewDescriptionPage in-fa"
                                         onclick='editDescription("{{ $pd->id }}" , "{{ $pageStyle[0] }}" , "{{ $pageStyle[1] }}" , "{{ $page_block->id }}" , this)'
                                         data-view-pd-id="{{ $page_block->id }}">{{ $pd->description }}</div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>

                {{-- page description end--}}


                <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 z-9999 transition-all duration-300 invisible opacity-0"
                     id="block">
                    <div class="w-full lg:w-[calc(100%-265px)] float-left h-dvh flex justify-center items-center">
                        <div class="w-11/12 lg:w-2/3 mx-auto relative">
                            <div class="w-full bg-white py-5 rounded-lg transition-all duration-300 scale-95 opacity-0"
                                 id="group">
                                <div class="w-full flex flex-row items-center gap-5 py-2.5 border-b border-gray-300 px-5 cursor-pointer"
                                     onclick="addBlock('close')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                        <path
                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن بلوک جدید</span>
                                </div>
                                <div
                                        class="w-full overflow-y-auto max-h-[420px] px-5 py-3 flex flex-col gap-3"
                                        style="scrollbar-width: thin;">
                                    <div class="w-full">
                                        <a href="{{ route('pages.proList', [$page->id]) }}"
                                           class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                            <svg class="size-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                                            </svg>
                                            <span class="text-gray-700 font-bold">فروشگاه</span>
                                        </a>
                                    </div>
                                    <div class="w-full">
                                        <div onclick="addSocialMedia()"
                                             class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                 viewBox="0 0 448 512">
                                                <path
                                                        d="M448 128c0 53-43 96-96 96c-28.9 0-54.8-12.8-72.4-33l-89.7 44.9c1.4 6.5 2.1 13.2 2.1 20.1s-.7 13.6-2.1 20.1L279.6 321c17.6-20.2 43.5-33 72.4-33c53 0 96 43 96 96s-43 96-96 96s-96-43-96-96c0-6.9 .7-13.6 2.1-20.1L168.4 319c-17.6 20.2-43.5 33-72.4 33c-53 0-96-43-96-96s43-96 96-96c28.9 0 54.8 12.8 72.4 33l89.7-44.9c-1.4-6.5-2.1-13.2-2.1-20.1c0-53 43-96 96-96s96 43 96 96zM96 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM400 128a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM352 432a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                                            </svg>
                                            <span class="text-gray-700 font-bold">افزودن شبکه اجتماعی</span>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div onclick="addLink()"
                                             class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                 viewBox="0 0 576 512">
                                                <path
                                                        d="M0 256C0 167.6 71.6 96 160 96h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C98.1 144 48 194.1 48 256s50.1 112 112 112h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C71.6 416 0 344.4 0 256zm576 0c0 88.4-71.6 160-160 160H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c61.9 0 112-50.1 112-112s-50.1-112-112-112H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c88.4 0 160 71.6 160 160zM184 232H392c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                                            </svg>
                                            <span class="text-gray-700 font-bold">افزودن لینک</span>
                                        </div>
                                    </div>
                                    {{-- FAQ --}}
                                    <div class="w-full">
                                        <div onclick="addFaq() "
                                             class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                 class="size-5">
                                                <path
                                                        d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                            </svg>
                                            <span class="text-gray-700 font-bold">افزودن سوالات متداول</span>
                                        </div>
                                    </div>
                                    {{-- FAQ end --}}
                                    {{-- page contactus --}}
                                    <div class="w-full">
                                        <div onclick="addContactUs()"
                                             class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                 viewBox="0 0 640 512">
                                                <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                                            </svg>
                                            <span class="text-gray-700 font-bold">تماس و راه های ارتباطی</span>
                                        </div>
                                    </div>
                                    {{-- page contactus end --}}
                                    {{-- page description --}}
                                    <div class="w-full">
                                        <div onclick="addDescription()"
                                             class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                 viewBox="0 0 448 512">
                                                <path d="M64 96v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V80C0 53.5 21.5 32 48 32H224 400c26.5 0 48 21.5 48 48v48c0 17.7-14.3 32-32 32s-32-14.3-32-32V96H256l0 320h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H144c-17.7 0-32-14.3-32-32s14.3-32 32-32h48l0-320H64z"/>
                                            </svg>
                                            <span class="text-gray-700 font-bold">متن یا توضیح</span>
                                        </div>
                                    </div>
                                    {{-- page description end--}}
                                </div>
                            </div>


                            {{-- create social media --}}
                            <form action="{{ route('socialAddress.store') }}" method="post"
                                  enctype='multipart/form-data'
                                  class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute right-0 top-full form px-5"
                                  id="socialMediaForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-start justify-center">
                                    <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-5">
                                        <h2 class="text-md font-bold text-center">شبکه های اجتماعی</h2>
                                        <div class="flex flex-col gap-5">
                                            <select name="socialMedia_id" id="socialMedia_id"
                                                    class="text-md createSocialRequire">
                                                @foreach ($socialMedias as $socialMedia)
                                                    <option value="{{ $socialMedia->id }}">{{$socialMedia->title}}</option>
                                                @endforeach
                                            </select>
                                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                                            <input type="text"
                                                   class="outline-hidden w-full p-3 text-sm createSocialRequire"
                                                   name="username" id="username" placeholder="نام کاربری" autofocus>
                                            <button class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer"
                                                    onclick="storeSocialmedia(event)">ثبت
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            {{-- create social media end --}}

                            {{-- edit intro product --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute right-0 top-full form px-5"
                                    id="introProductEdit">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-start justify-center max-h-[550px] overflow-y-auto [&::-webkit-scrollbar]:hidden">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                                        </div>
                                        <div class="text-center mb-4">
                                            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                                                <div
                                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                        <span
                                                                class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                            است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                type="text" name='introProTitleEdit'
                                                                id="introProTitleEdit"
                                                                placeholder="عنوان محصول">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="introProIdEdit" id="introProIdEdit">
                                                <div
                                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="text-sm mb-1 mt-2.5 flex">دسته محصول</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                                        <select
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                onchange="addCats(this)" name='introProCatEdit'
                                                                id="introProCatEdit" multiple>
                                                            <option value="0" disabled>انتخاب کنید</option>
                                                            @foreach ($introCats as $introCat)
                                                                <option value="{{ $introCat->id }}">{{ $introCat->title }}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                                                    <label class="text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>
                                                    <input type="checkbox" name='show_in_home_pro_edit'
                                                           id="show_in_home_pro_edit">
                                                </div>
                                                <div
                                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="text-sm mb-1 mt-2.5 flex">تصویر محصول</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                type="file" name='introProImgEdit' id="introProImgEdit"
                                                                placeholder="تصویر محصول">
                                                    </div>
                                                </div>
                                                <div
                                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="text-sm mb-1 mt-2.5 flex">گالری تصاویر محصول</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                type="file" name='introProGalleryEdit'
                                                                id="introProGalleryEdit"
                                                                placeholder="گالری تصاویر محصول" multiple>
                                                    </div>
                                                </div>
                                                <div
                                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                                    <label class="text-sm mb-1 mt-2.5 flex">توضیحات محصول</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                        <textarea
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                name='introProDescriptionEdit'
                                                                id="introProDescriptionEdit"
                                                                placeholder="توضیحات محصول"></textarea>
                                                    </div>
                                                </div>
                                                <div
                                                        class="w-full flex flex-col gap-4 itmes-center max-md:flex-col lg:col-span-2"
                                                        id="featuresEdit">
                                                </div>
                                            </div>
                                            <div class="w-full text-center">
                                                <button type="submit" onclick="addAttributeEdit()"
                                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                                    افزودن ویژگی
                                                </button>
                                            </div>
                                            <div class="w-full text-left">
                                                <button type="submit" onclick="updateIntroPro(this)"
                                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                                    ثبت
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- edit intro product --}}


                          
                         


                            <form action="{{ route('siteLink.store') }}" method="post" enctype='multipart/form-data'
                                  class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 right-0 absolute top-full form px-5 createSiteLink"
                                  id="siteLinkForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createSiteLink z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-start justify-center">
                                    <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                                        <h2 class="text-md font-bold text-center">ایجاد لینک</h2>
                                        <div class="flex flex-col gap-5">
                                            <input type="text"
                                                   class="outline-hidden w-full p-3 text-sm createLinkRequire"
                                                   name="title" id="link_title_create" placeholder="عنوان لینک"
                                                   autofocus>
                                            <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                                            <input type="text"
                                                   class="outline-hidden w-full p-3 text-sm createLinkRequire"
                                                   name="address" id="link_address_create" placeholder="آدرس لینک">
                                            <button class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer"
                                                    onclick="storeLink(event)">ثبت
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- create link end --}}


                           


                            {{-- create FAQ --}}
                            <form action="{{ route('FAQ.store') }}" method="post" enctype='multipart/form-data'
                                  class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 top-0 right-0 absolute top-full top form px-5 max-h-[450px] lg:max-h-[400px] overflow-y-auto [&::webkit-scrollbar]:hidden createFaq"
                                  id="FaqForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createFaq z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-start justify-center">
                                    <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                                        <h2 class="text-md font-bold text-center">سوالات متداول</h2>
                                        <div class="w-full flex flex-col justify-center gap-5">
                                            <input type="text"
                                                   class="outline-hidden w-full p-3 text-sm createFaqRequire"
                                                   name="title" id="faq_title_create" placeholder="عنوان" autofocus>
                                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentFAQs">
                                                <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                                                <input type="text"
                                                       class="outline-hidden w-full p-3 text-sm createFaqRequire"
                                                       name="faqs[0][question]" id="question_input" placeholder="سوال">
                                                <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                                                <input type="text"
                                                       class="outline-hidden w-full p-3 text-sm createFaqRequire"
                                                       name="faqs[0][answer]" id="answer_input" placeholder="پاسخ">
                                            </div>
                                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1"
                                                 id="parentFAQ">
                                            </div>
                                            <div class="w-full flex ">
                                                <button type="button"
                                                        class="w-6/12 py-1 mx-auto bg-[#eb3153] text-sm text-[#fff] rounded-md cursor-pointer"
                                                        onclick="openFAQ()">افزودن سوالات جدید
                                                </button>
                                                <button type="button"
                                                        class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer"
                                                        onclick="storeFaq(event,this)">ثبت
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- create FAQ end --}}
                            {{-- description create --}}
                            <form action="{{ route('PD.store') }}" method="post" enctype='multipart/form-data'
                                  class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 right-0 absolute top-1/5 form px-5 max-h-[600px] overflow-y-auto [&::webkit-scrollbar]:hidden createDescription"
                                  id="PdForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createDescription z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-start justify-center">
                                    <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                                        <h2 class="text-md font-bold text-center">متن یا توضیحات</h2>
                                        <div class="w-full flex flex-col justify-center gap-5">
                                            <input type="text"
                                                   class="outline-hidden w-full py-3 text-sm createPdRequire"
                                                   name='pdTitle' id="page_description_title_create" placeholder="عنوان"
                                                   autofocus>
                                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentPDs">
                                                <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                                                <input type="text"
                                                       class="outline-hidden w-full py-3 text-sm createPdRequire"
                                                       onclick="addFontSize()" name='description[0][size]'
                                                       id="size_input" placeholder="اندازه متن را انتخاب کنید">
                                                <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                                                <input type="text"
                                                       class="outline-hidden w-full py-3 text-sm createPdRequire"
                                                       name='description[0][direction]' id="direction_input"
                                                       onclick="addFontDirection()"
                                                       placeholder="جهت متن را انتخاب کنید">
                                            </div>

                                            <button onclick="storePageDescription(event,this)"
                                                    class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer">
                                                ثبت
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- description create end--}}

                            {{-- add question faq group --}}
                            <form action="{{ route('FAQ.addQuestion') }}" method="post" enctype='multipart/form-data'
                                  class="w-full bg-white p-5 rounded-lg transition-all duration-300 invisible opacity-0 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 max-w-2xl w-11/12 form addQuestionForm"
                                  id="addQuestionForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg addQuestion z-50">
                                </div>
                                @csrf
                                <div onclick="closeForm()"
                                     class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                        <path
                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                    </svg>
                                </div>
                                <div class="flex items-start justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <h3 class="text-center lg:text-lg font-bold text-gray-800 mb-4">افزودن سوال جدید
                                            به گروه</h3>
                                        <input type="hidden" name="block_id" id="add_question_block_id">
                                        <div class="text-center mb-4">
                                            <div class="w-full grid grid-cols-1 gap-3 my-4">
                                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">سوال</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                        class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 addQuestionRequire rounded-md"
                                                                type="text" name='question' id="add_question_input"
                                                                placeholder="سوال">
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">پاسخ</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                        class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 addQuestionRequire rounded-md"
                                                                type="text" name='answer' id="add_answer_input"
                                                                placeholder="پاسخ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full text-left">
                                                <button type="submit" onclick="addQuestionToGroup(event)"
                                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                                    ثبت سوال جدید
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            {{-- add question faq group end --}}
                            {{-- add contactus group --}}
                            <form action="{{ route('pageContacts.addContactus') }}" method="post"
                                  enctype='multipart/form-data'
                                  class="bg-white p-5 rounded-lg transition-all duration-300 invisible opacity-0 fixed top-1/2 transform lg:right-1/2 lg:translate-x-1/3 -translate-y-1/2 z-50 w-11/12 lg:w-2/3 lg:float-end form addContactusForm"
                                  id="addContactusForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg addContactus z-50">
                                </div>
                                @csrf
                                <div onclick="closeForm()"
                                     class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                        <path
                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                    </svg>
                                </div>
                                <div class="flex items-start justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <h3 class="text-center lg:text-lg font-bold text-gray-800 mb-4">افزودن راه
                                            ارتباطی جدید به گروه</h3>
                                        <input type="hidden" name="block_id" id="add_contactus_block_id">
                                        <div class="text-center mb-4">
                                            <div class="w-full grid grid-cols-1 gap-3 my-4">
                                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان آیتم</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                        class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 addContactusRequire rounded-md"
                                                                type="text" name='contactusKey' id="add_key_input"
                                                                placeholder=" عنوان آیتم مانند ایمیل , شماره تلفن , پیامک , تلفن ثابت">
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">مقدار آیتم</label>
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                        class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 addContactusRequire rounded-md"
                                                                type="text" name='contactusValue' id="add_value_input"
                                                                placeholder="مقدار آیتم">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full text-left">
                                                <button type="submit" onclick="addContactusToGroup(event)"
                                                        class="active:bg-[#eb3254] mt-2 bg-[#eb3254] text-white p-3 max-md:p-2 rounded-md transition duration-200 font-medium cursor-pointer">
                                                    ثبت راه ارتباطی جدید
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- add contactus group end--}}
                            {{-- create contactUs --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/4 right-0 form px-5 createContactus"
                                    id="contacts">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createContactus z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-end justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800">نوع راه ارتباطی</h3>
                                        </div>
                                        <div class="text-center mb-4">
                                            <div class="w-full">
                                                <div onclick="contactus('phone')"
                                                     class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                    <span class="text-gray-700 font-bold">شماره موبایل</span>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div onclick="contactus('fixPhone')"
                                                     class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">

                                                    <span class="text-gray-700 font-bold">تلفن ثابت</span>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div onclick="contactus('email')"
                                                     class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">

                                                    <span class="text-gray-700 font-bold">ایمیل</span>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div onclick="contactus('message')"
                                                     class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">

                                                    <span class="text-gray-700 font-bold">پیامک</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- create contactUs end --}}
                            {{-- create PD --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/4 form px-5 createPDsize"
                                    id="pageDescriptionSize">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createPDsize z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-end justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800"> اندازه متن </h3>
                                        </div>
                                        <div class="text-center mb-4">

                                            <div onclick="sizeCreate('s-txt')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">متن کوچک</span>
                                            </div>
                                            <div onclick="sizeCreate('m-txt')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">متن متوسط</span>
                                            </div>
                                            <div onclick="sizeCreate('l-txt')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">متن بزرگ</span>
                                            </div>
                                            <div onclick="sizeCreate('s-lable')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">عنوان کوچک </span>
                                            </div>
                                            <div onclick="sizeCreate('m-lable')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">عنوان متوسط </span>
                                            </div>

                                            <div onclick="sizeCreate('l-lable')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">عنوان بزرگ </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- create PD size end--}}



                            {{-- create PD description --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/3 form px-5 createPDdirection"
                                    id="pageDescriptionDirection">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createPDdirection z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-end justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800"> جهت متن </h3>
                                        </div>
                                        <div class="text-center mb-4">

                                            <div onclick="directionCreate('rtl')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">راست چین </span>
                                            </div>
                                            <div onclick="directionCreate('center')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">وسط چین</span>
                                            </div>
                                            <div onclick="directionCreate('ltr')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">چپ چین</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- create PD description end--}}
                            {{-- create PD description edit --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/4 right-0 form px-5 createPDdirectionEdit"
                                    id="pageDescriptionDirectionEdit">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createPDdirectionEdit z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-end justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800"> جهت متن </h3>
                                        </div>
                                        <div class="text-center mb-4">

                                            <div onclick="directionCreateEdit('rtl')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">راست چین </span>
                                            </div>
                                            <div onclick="directionCreateEdit('center')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">وسط چین</span>
                                            </div>
                                            <div onclick="directionCreateEdit('ltr')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">چپ چین</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- create PD description edit end--}}
                            {{-- create PD description --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/4 right-0 form px-5 createPDdirection"
                                    id="pageDescriptionDirection">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createPDdirection z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-end justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800"> جهت متن </h3>
                                        </div>
                                        <div class="text-center mb-4">

                                            <div onclick="directionCreate('rtl')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">راست چین </span>
                                            </div>
                                            <div onclick="directionCreate('center')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">وسط چین</span>
                                            </div>
                                            <div onclick="directionCreate('ltr')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">چپ چین</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- create PD description end--}}
                            {{-- edit PDsize --}}
                            <div
                                    class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/4 form px-5 createPDsizeEdit"
                                    id="pageDescriptionSizeEdit">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createPDsizeEdit z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-end justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                        <div class="text-center mb-8">
                                            <h3 class="lg:text-lg font-bold text-gray-800"> اندازه متن </h3>
                                        </div>
                                        <div class="text-center mb-4">

                                            <div onclick="sizeCreateEdit('s-txt')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">متن کوچک</span>
                                            </div>
                                            <div onclick="sizeCreateEdit('m-txt')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">متن متوسط</span>
                                            </div>
                                            <div onclick="sizeCreateEdit('l-txt')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">متن بزرگ</span>
                                            </div>
                                            <div onclick="sizeCreateEdit('s-lable')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">عنوان کوچک </span>
                                            </div>
                                            <div onclick="sizeCreateEdit('m-lable')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">عنوان متوسط </span>
                                            </div>

                                            <div onclick="sizeCreateEdit('l-lable')"
                                                 class="w-full mt-2 p-3 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-xs">عنوان بزرگ </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- edit PDsize end--}}
                            {{-- contactus form --}}

                            <form action="{{ route('pageContacts.store') }}" method="post" enctype='multipart/form-data'
                                  class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 right-0 absolute top-1/7 form px-5 max-h-[600px] overflow-y-auto [&::webkit-scrollbar]:hidden createPageContactus"
                                  id="pageContactusForm">
                                <div
                                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createPageContactus z-50">
                                </div>
                                @csrf
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                                     class="size-5 cursor-pointer"
                                     viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                                <div class="flex items-start justify-center">
                                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">

                                        <div class="text-center mb-4">
                                            <div class="w-full my-4" id="contactusInput">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- contactus form end--}}
                        {{-- contactusGroup start --}}
                        <div class="w-1/2 bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-1/2 right-1/2 form px-5 createContactusGroup"
                             id="contactsGroup">
                            <div
                                    class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createContactusGroup z-50">
                            </div>
                            @csrf
                            <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 cursor-pointer"
                                 viewBox="0 0 384 512">
                                <path
                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                            </svg>
                            <div class="flex items-start justify-center">
                                <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                    <div class="text-center mb-8">
                                        <h3 class="lg:text-lg font-bold text-gray-800">نوع راه ارتباطی</h3>
                                    </div>
                                    <div class="text-center mb-4">
                                        <div class="w-full">
                                            <div onclick="contactusGroup('phone', blockId)"
                                                 class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">
                                                <span class="text-gray-700 font-bold">شماره موبایل</span>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div onclick="contactusGroup('fixPhone',blockId)"
                                                 class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">

                                                <span class="text-gray-700 font-bold">تلفن ثابت</span>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div onclick="contactusGroup('email',blockId)"
                                                 class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">

                                                <span class="text-gray-700 font-bold">ایمیل</span>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div onclick="contactusGroup('message',blockId)"
                                                 class="w-full mt-5 p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-[#eb3254] hover:ring-offset-2 hover:bg-[#eb3254]/20 rounded-lg transition-all duration-150 cursor-pointer contactElement">

                                                <span class="text-gray-700 font-bold">پیامک</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- contactusGroup end --}}
                        {{-- edit social media --}}
                        <div
                                class="w-11/12 bg-white p-1.5 lg:p-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full fixed top-1/2 left-1/2 transform -translate-x-1/2 lg:-translate-x-2/3 -translate-y-1/2 z-50 max-w-2xl w-11/12 form editsocialMediaForm">
                            <div
                                    class="w-full absolute h-full top-0 right-0 bg-white flex items-center justify-center rounded-lg">
                            </div>
                            <div onclick="closeForm()"
                                 class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </div>
                            <div class="flex flex-row justify-between items-center p-5">
                                <div class="flex flex-row items-center gap-3 lg:gap-5 w-10/12 cursor-pointer"
                                     onclick="openDropdown('media')">
                                    <div class="size-5 socialMediaIcon"></div>
                                    <div class="text-xs text-gray-600 socialLink"></div>
                                </div>
                                <div class="flex flex-row items-center gap-5">
                                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                         onclick="openDropdown('media')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                                    <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                         onclick="deleteMedia()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('socialAddress.update') }}" method="post"
                                  enctype='multipart/form-data'
                                  class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editSMF">
                                @csrf
                                <input type="hidden" name="id" class="socialAddressId">
                                <div class="w-full socialDiv">
                                    <!-- عنوان شبکه اجتماعی -->
                                    @if (isset($item))
                                        <div class="w-full flex flex-col">
                                            <label class="text-sm md:text-base mb-2" for="username">آدرس شبکه
                                                اجتماعی:</label>
                                            <input type="text" name="username" id="userNameUpdate"
                                                   class="w-full px-3 py-2 outline-none border-1 border-red-500 rounded-lg userName"
                                                   required>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center mt-8">
                                    <button type="submit" onclick="updateSocial(event)"
                                            class="px-8 py-3 bg-[#eb3153] text-white rounded-lg transition-all duration-150 cursor-pointer">
                                        ثبت
                                    </button>
                                </div>
                            </form>
                        </div>
                        {{-- edit social media end --}}


                        {{-- edit site link  --}}
                        <div
                                class="w-11/12 bg-white p-1.5 lg:p-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full fixed top-1/2 left-1/2 transform -translate-x-1/2 lg:-translate-x-2/3 -translate-y-1/2 z-50 max-w-2xl w-11/12 form editSiteLinkForm">
                            <div
                                    class="w-full absolute h-full top-0 right-0 bg-white hidden items-center justify-center rounded-lg">
                            </div>
                            <div onclick="closeForm()"
                                 class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </div>
                            <div class="flex flex-row justify-between items-center p-5">
                                <div class="flex flex-row items-center gap-5 w-10/12 cursor-pointer"
                                     onclick="openDropdown('link')">
                                    <div class="text-sm text-gray-800 font-bold linkTitle"></div>
                                    {{-- <div class="text-xs text-gray-600 linkAddress"></div> --}}
                                </div>
                                <div class="flex flex-row items-center gap-5">

                                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                         onclick="openDropdown('link')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                                    <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                         onclick="deleteLink()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                            <path fill="white"
                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <form action="{{ route('siteLink.update') }}" method="post" enctype='multipart/form-data'
                                  class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editSLF"
                                  id="editSiteLinkForm">
                                @csrf
                                <input type="hidden" name="siteLinkId" id="siteLinkId">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base" for="title">عنوان لینک :</label>
                                        <input type="text" name="title" id="title"
                                               class="py-1 px-3 rounded-md border-1 border-red-500 outline-none"
                                               required>
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base" for="address">آدرس لینک :</label>
                                        <input type="text" name="address" dir="ltr" id="address"
                                               class="py-1 px-3 rounded-md border-1 border-red-500 outline-none"
                                               required>
                                    </div>
                                    <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                                        <button onclick="updateLink(event)"
                                                class="px-8 py-3 bg-[#eb3153] text-white rounded-lg transition-all duration-150 cursor-pointer">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- edit site link end --}}
                        {{-- edit faq --}}
                        <div
                                class="w-11/12 bg-white p-1.5 lg:p-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full fixed top-1/2 left-1/2 transform -translate-x-1/2 lg:-translate-x-2/3 -translate-y-1/2 z-50 max-w-2xl w-11/12 form editFaqForm">
                            <div
                                    class="w-full absolute h-full top-0 right-0 bg-white hidden items-center justify-center rounded-lg">
                            </div>
                            <div onclick="closeForm()"
                                 class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </div>
                            <div class="flex flex-row justify-between items-center p-5">
                                <div class="flex flex-row items-center gap-5 w-10/12 cursor-pointer"
                                     onclick="openDropdown('faq')">
                                    <div class="text-sm text-gray-800 font-bold faqQuestion"></div>
                                    <div class="text-sm text-gray-800 font-bold faqAnswer"></div>

                                </div>
                                <div class="flex flex-row items-center gap-5">

                                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                         onclick="openDropdown('faq')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <form action="{{ route('FAQ.update') }}" method="post" enctype='multipart/form-data'
                                  class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editFAQ"
                                  id="editFaqForm">
                                @csrf
                                <input type="hidden" name="FaqId" id="FaqId">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base" for="question"> سوال :</label>
                                        <input type="text" name="question" id="question"
                                               class="py-1 px-3 rounded-md border-1 border-rose-500 outline-none"
                                               required>
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base" for="answer"> پاسخ :</label>
                                        <input type="text" name="answer" id="answer"
                                               class="py-1 px-3 rounded-md border-1 border-[#eb3153] outline-none"
                                               required>
                                    </div>
                                    <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                                        <button onclick="updateFaq(event)"
                                                class="px-8 py-3 text-white rounded-lg bg-[#eb3153] transition-all duration-150 cursor-pointer">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- edit faq end --}}



                        {{-- edit contactus --}}
                        <div
                                class="w-11/12 bg-white p-1.5 lg:p-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full fixed top-1/3 left-1/2 transform -translate-x-1/2 lg:-translate-x-2/3 -translate-y-1/2 z-50 max-w-2xl w-11/12 form editContactusForm">
                            <div
                                    class="w-full absolute h-full top-0 right-0 bg-white hidden items-center justify-center rounded-lg">
                            </div>
                            <div onclick="closeForm()"
                                 class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </div>
                            <div class="flex flex-row justify-between items-center p-5">
                                <div class="flex flex-row items-center gap-5 w-10/12 cursor-pointer"
                                     onclick="openDropdown('contactusEdit')">
                                    <div class="text-sm text-gray-800 font-bold contactusEditKey"></div>
                                    <div class="text-sm text-gray-800 font-bold contactusEditValue"></div>

                                </div>
                                <div class="flex flex-row items-center gap-5">

                                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                         onclick="openDropdown('contactusEdit')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <form action="{{ route('pageContacts.update') }}" method="post"
                                  enctype='multipart/form-data'
                                  class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editPageContactus"
                                  id="editContactusForm">
                                @csrf
                                <input type="hidden" name="pageContactusId" id="pageContactusId">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base" for="key"> عنوان آیتم :</label>
                                        <input type="text" name="editContactusKey" id="editContactusKey"
                                               class="py-1 px-3 rounded-md border-1 border-red-500 outline-none"
                                               required>
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base" for="value"> مقدار آیتم :</label>
                                        <input type="text" name="editContactusValue" id="editContactusValue"
                                               class="py-1 px-3 rounded-md border-1 border-red-500 outline-none"
                                               required>
                                    </div>
                                    <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                                        <button onclick="updateContactus(event)"
                                                class="px-8 py-3 bg-[#eb3153] text-white rounded-lg transition-all duration-150 cursor-pointer">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- edit contactus end --}}
                        {{-- edit page Description --}}
                        <form action="{{ route('PD.update') }}" method="post" enctype='multipart/form-data'
                              class="w-11/12 lg:w-1/2 absolute bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 form px-5 max-h-[600px] overflow-y-auto [&::webkit-scrollbar]:hidden editDescriptionForm"
                              id="pdEditForm">
                            <input type="hidden" name="pdId" id="PDId">
                            <input type="hidden" name="pdBlockId" id="pdBlockId">
                            <div
                                    class="w-full h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg editDescriptionForm z-50">
                            </div>
                            @csrf
                            <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 cursor-pointer"
                                 viewBox="0 0 384 512">
                                <path
                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                            </svg>
                            <div class="flex items-start justify-center">
                                <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                    <div class="flex flex-row justify-between">
                                        <label class="w-30 text-sm mb-1 mt-2.5 flex">متن</label>
                                        <div class="flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                             onclick='deletePageDescription()'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                        <input class="p-6 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                               type="text" name='pdTitle' placeholder="عنوان"
                                               id="page_description_title_edit">
                                    </div>
                                    <div class="text-center mb-4">
                                        <div class="w-full my-4">
                                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentPDsEdit">
                                                <label class="w-30 text-sm mb-1 mt-2.5 flex">اندازه متن</label>
                                                <div class="flex flex-row justify-between">
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                        <span
                                                                class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                            است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                type="text" name='description[0][size]'
                                                                placeholder="اندازه متن را انتخاب کنید"
                                                                id="edit_size_input" onclick="addFontSizeEdit()">

                                                    </div>
                                                </div>
                                                <label class="w-30 text-sm mb-1 mt-2.5 flex">جهت متن</label>
                                                <div class="flex flex-row justify-between">
                                                    <div
                                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                        <span
                                                                class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                            است!</span>
                                                        <input
                                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                                type="text" name='description[0][direction]'
                                                                placeholder="جهت متن را انتخاب کنید"
                                                                id="edit_direction_input"
                                                                onclick="addFontDirectionEdit()">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full text-left flex flex-row justify-end mt-15">
                                        <button type="submit" onclick="updatePageDescription(event)"
                                                class="mt-2 bg-[#eb3153] text-white p-3 max-md:p-2 rounded-md transition duration-200 font-medium cursor-pointer">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- edit page Description end--}}

                
                    {{--edit faqTitle start --}}
                    <div class="w-11/12 bg-white p-1.5 lg:p-5 rounded-lg invisible opacity-0 transition-all duration-300 absolute fixed top-1/2 left-1/2 transform -translate-x-1/2 lg:-translate-x-2/3 -translate-y-1/2 z-50 max-w-2xl form editTitleForm top-0 -translate-y-1/7">
                        <div class="w-full absolute h-full top-0 right-0 bg-white hidden items-center justify-center rounded-lg">
                        </div>
                        <div onclick="closeForm()"
                             class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path
                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                            </svg>
                        </div>
                        <div class="flex flex-row justify-between items-center p-5">
                            <div class="flex flex-row items-center gap-5 w-10/12 cursor-pointer"
                                 onclick="openDropdown('title')">
                                <div class="text-sm text-gray-800 font-bold titleText"></div>
                            </div>
                            <div class="flex flex-row items-center gap-5">
                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                     onclick="openDropdown('title')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white"
                                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>

                            </div>
                        </div>
                        <form action="{{ route('pageBlocks.update') }}" method="post" enctype='multipart/form-data'
                              class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editTLF"
                              id="editTitleForm">
                            @csrf
                            <input type="hidden" name="blockId" id="blockId">
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-5 lg:gap-10">
                                <div class="w-full flex flex-col">
                                    <label class="text-sm md:text-base" for="title_input">عنوان :</label>
                                    <input type="text" name="title" id="title_input"
                                           class="py-1 px-3 rounded-md border-1 border-[#eb3153] outline-none" required>
                                </div>
                                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                                    <button onclick="updateTitle(event)"
                                            class="px-8 py-3 bg-[#eb3153] text-white rounded-lg transition-all duration-150 cursor-pointer">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{--edit faqTitle end --}}
                </div>
            </div>
        </div>
    </div>
    <script>

        let socialMedia_id = document.querySelector('#socialMedia_id')
        let userName = document.querySelector('.userName')
        let editsocialMediaForm = document.querySelector('.editsocialMediaForm')
        let editSiteLinkForm = document.querySelector('.editSiteLinkForm')
        let editFaqForm = document.querySelector('.editFaqForm')
        let socialAddressId = document.querySelector('.socialAddressId')
        let socialLink = document.querySelector('.socialLink')
        let socialMediaIcon = document.querySelector('.socialMediaIcon')
        let editSocialSection = document.querySelectorAll('.editSocial')
        let userNameUpdate = document.getElementById('userNameUpdate')

        let userNameCreate = document.getElementById('username')
        let socialMedia_id_create = document.getElementById('socialMedia_id')
        let storeSocialForm = document.getElementById('socialMediaForm')
        let socialLinks = document.getElementById('socialLinks') // append what sociala media create

        // deleteLink() method deficient
        let linkSection = document.getElementById('linkSection')
        let linkTitle = document.querySelector('.linkTitle')
        // let linkAddress = document.querySelector('.linkAddress')
        let link_title_input = document.getElementById('title')
        let link_address_input = document.getElementById('address')
        let siteLinkId = document.getElementById('siteLinkId')
        // let icon_path = document.getElementById('icon_path')

        let link_title_create = document.getElementById('link_title_create')
        let link_address_create = document.getElementById('link_address_create')
        // let link_icon_path_create = document.getElementById('link_icon_path_create')
        let siteLinks = document.getElementById('siteLinks')
        let createSiteLink = document.querySelector('.createSiteLink')

      

        //FAQ
        let faq = document.getElementById('faq')
        let createFaq = document.querySelector('.createFaq')
        let faqAnswer = document.querySelector('.faqAnswer')
        let faqQuestion = document.querySelector('.faqQuestion')
        let contactusEditKey = document.querySelector('.contactusEditKey')
        let contactusEditValue = document.querySelector('.contactusEditValue')
        // let question_create=document.getElementById('question_create')
        // let answer_create=document.getElementById('answer_create')
        let question_input = document.getElementById('question')
        let answer_input = document.getElementById('answer')
        let edit_key_input = document.getElementById('editContactusKey')
        let edit_value_input = document.getElementById('editContactusValue')
        let FaqId = document.getElementById('FaqId')
        let pageContactusId = document.getElementById('pageContactusId')
        let parentFAQ = document.getElementById('parentFAQ')
        // let parentContactus = document.getElementById('parentContactus')
        let faqTitle = document.getElementById('faq_title_create')

        let editTitleForm = document.querySelector('.editTitleForm')
        let titleText = document.querySelector('.titleText')
        let title_input = document.getElementById('title_input')
        let blockId = document.getElementById('blockId')
        // contactus
        let viewContactus = document.getElementById('viewContactus')
        let createPageContactus = document.querySelector('.createPageContactus')
        let PC = document.getElementById('pc')

        let createDescription = document.querySelector('.createDescription')

        let globalElement = ""
        // let faqTitle = document.getElementById('faq_title_create')


       
        // باز و بسته شدن سوالات FAQ
        faq.addEventListener('click', function (e) {

            let header = e.target.closest('.faqBox > div:first-child');

            if (!header) return;

            let currentBox = header.parentElement;
            let answer = currentBox.children[1];

            if (answer.classList.contains('max-h-0')) {

                faq.querySelectorAll('.faqBox').forEach(function (item) {
                    item.children[1].classList.add('max-h-0');
                    item.children[1].classList.remove('max-h-[500px]');
                    item.children[0].children[1].classList.remove('rotate-180');
                    item.children[0].children[1].classList.add('rotate-0');
                });

                answer.classList.remove('max-h-0');
                answer.classList.add('max-h-[500px]');
                header.children[1].classList.add('rotate-180');

            } else {

                answer.classList.add('max-h-0');
                answer.classList.remove('max-h-[500px]');
                header.children[1].classList.remove('rotate-180');
            }
        });
    
       // باز و بسته شدن راه های ارتباطی
        PC.addEventListener('click', function (e) {

            let header = e.target.closest('.contactusBox > div:first-child');

            if (!header) return;

            let currentBox = header.parentElement;
            let answer = currentBox.children[1];

            if (answer.classList.contains('max-h-0')) {

                PC.querySelectorAll('.contactusBox').forEach((item) => {
                    item.children[1].classList.add('max-h-0');
                    item.children[1].classList.remove('max-h-[500px]');

                    item.children[0].children[1].classList.remove('rotate-180');
                    item.children[0].children[1].classList.add('rotate-0');
                });

                answer.classList.remove('max-h-0');
                answer.classList.add('max-h-[500px]');

                header.children[1].classList.remove('rotate-0');
                header.children[1].classList.add('rotate-180');

            } else {

                answer.classList.add('max-h-0');
                answer.classList.remove('max-h-[500px]');

                header.children[1].classList.remove('rotate-180');
                header.children[1].classList.add('rotate-0');
            }

        });

        // deleteLink
        function deleteLink() {
            let viewLink = document.querySelectorAll('.editLink')
            editSiteLinkForm.children[0].classList.remove('hidden')
            editSiteLinkForm.children[0].classList.add('flex')
            editSiteLinkForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('siteLink.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': siteLinkId.value
                },
                success: function (data) {
                    editSiteLinkForm.children[0].classList.remove('flex')
                    editSiteLinkForm.children[0].classList.add('hidden')
                    viewLink.forEach((item) => {
                        if (item.getAttribute('data-site-id') == siteLinkId.value) {
                            item.parentElement.parentElement.remove()
                        }
                    })
                    closeForm()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        function deleteLinkList(el, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('siteLink.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function (data) {
                    el.parentElement.parentElement.parentElement.remove()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        // StoreLink
        function storeLink(e) {
            let errorText = ""
            e.preventDefault()
            let createLinkRequire = document.querySelectorAll('.createLinkRequire')
            let flag = true
            createLinkRequire.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })
            if (flag) {
                createSiteLink.children[0].classList.remove('hidden')
                createSiteLink.children[0].classList.add('flex')
                createSiteLink.children[0].innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('siteLink.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'address': link_address_create.value,
                        'title': link_title_create.value,
                        'page_id': "{{ $page->id }}",
                        // 'icon_path': link_icon_path_create.value
                    },
                    success: function (data) {
                        createSiteLink.children[0].classList.remove('flex')
                        createSiteLink.children[0].classList.add('hidden')
                        link_address_create.value = ""
                        link_title_create.value = ""
                        let div = document.createElement('div')
                        let element = `

                        <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center viewLinkTitle"
                                    data-view-link-id="${data.id}">
                                    ورود به ${data.title}
                                </h3>


                                <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                    <div class="w-full lg:w-8/9 flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-gray-200 rounded-full cursor-pointer editLink relative transition-all duration-300"
                                         onclick='editLink(${data.id})' data-site-id="${data.id}">
                                        <img src="{{ asset('assets/img/link-simple.svg') }}" class="size-5 rounded-md"
                                             alt="">
                                        <span class="font-bold text-gray-800 viewLinkTitle"
                                            data-view-link-id="${data.id}">${data.title}</span>
                                    </div>
                                    <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                             onclick='editLink("${data.id}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 512 512">
                                                <path fill="white"
                                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </div>
                                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                             onclick='deleteLinkList(this, "${data.id}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                 viewBox="0 0 448 512">
                                                <path fill="white"
                                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        `
                        div.innerHTML = element
                        siteLinks.appendChild(div)
                        closeForm()
                    },
                    error: function () {
                        alert('خطا در ارسال داده ها')
                    }
                })
            }
        }
  
        // storeFaq
        function storeFaq(e, el) {
            let question_input = document.getElementById('question_input')
            let answer_input = document.getElementById('answer_input')
            let faq_title_create = document.getElementById('faq_title_create')
            let array = [];
            let errorText = ""
            e.preventDefault()
            let createFaqRequire = document.querySelectorAll('.createFaqRequire')
            let parentFAQs = document.querySelectorAll('.parentFAQs')
            let flag = true

            createFaqRequire.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })

            parentFAQs.forEach((faq) => {
                let datas = [faq.children[1].value, faq.children[3].value]
                array.push(datas)
            })

            if (flag) {
                createFaq.children[0].classList.remove('hidden')
                createFaq.children[0].classList.add('flex')
                createFaq.children[0].innerHTML = `
                    <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
                `

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('FAQ.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'title': faqTitle.value,
                        'datas': array,
                        'page_id': "{{ $page->id }}",
                    },
                    success: function (response) {
                        console.log(response.block.title)
                        createFaq.children[0].classList.remove('flex')
                        createFaq.children[0].classList.add('hidden')

                        faq_title_create.value = ""
                        question_input.value = ""
                        answer_input.value = ""
                        parentFAQ.innerHTML = ""
                        let mainDiv = document.createElement('div')
                        mainDiv.className = "lg:py-2"
                        let element = `
                    <h3 class="lg:block text-lg font-bold text-gray-800 text-center cursor-pointer viewFAQ"
                        onclick='editTitle("${response.block.id}")'
                        data-block-id="${response.block.id}">
                        ${response.block.title}
                    </h3>



                    <div class="flex flex-row-reverse items-center gap-2">
                        <div class="p-1.5 rounded-md bg-blue-500 hover:bg-blue-600 cursor-pointer"
                                onclick='addQuestionToBlock("${response.block.id}", this)'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                    viewBox="0 0 448 512">
                                <path fill="white"
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>
                        </div>
                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                onclick='editTitle("${response.block.id}", this)'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                    viewBox="0 0 512 512">
                                <path fill="white"
                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                            </svg>
                        </div>
                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                onclick='deleteTitle("${response.block.id}",this)'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                    viewBox="0 0 448 512">
                                <path fill="white"
                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                            </svg>
                        </div>
                    </div>`
                        response.faqs.forEach((data) => {
                            element += `
                        <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                            <div class="w-full lg:w-8/9 faqBox">
                                <div class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                    <div class="flex flex-row items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-5 rounded-md">
                                            <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                        </svg>
                                        <span class="font-bold text-gray-800 viewFAQ" data-view-FAQ-id="${data.id}">${data.question}</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-all duration-200 cursor-pointer" viewBox="0 0 448 512">
                                        <path fill="black" d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                        <p class="text-gray-700 font-bold">${data.answer}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                    onclick='editFaq("${data.id}")'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>
                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                    onclick='deleteFAQ(this, "${data.id}")'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    `;
                        });

                        mainDiv.innerHTML = element;
                        faq.appendChild(mainDiv);
                        closeForm();
                    },
                    error: function () {
                        alert('خطا در ارسال داده ها');
                    }
                });
            }
        }

        // updateLink
        function updateLink(e) {
            let viewLinkTitle = document.querySelectorAll('.viewLinkTitle')
            e.preventDefault();
            editSiteLinkForm.children[0].classList.remove('hidden')
            editSiteLinkForm.children[0].classList.add('flex')
            editSiteLinkForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('siteLink.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': siteLinkId.value,
                    'title': link_title_input.value,
                    'address': link_address_input.value,
                    // 'icon_path': icon_path.value,
                    'page_id': "{{ $page->id }}"
                },
                success: function (data) {
                    linkTitle.innerText = data.title
                    // linkAddress.innerText = data.address
                    link_title_input.value = data.title
                    link_address_input.value = data.address
                    editSiteLinkForm.children[0].classList.remove('flex')
                    editSiteLinkForm.children[0].classList.add('hidden')
                    closeForm()
                    viewLinkTitle.forEach((element) => {
                        if (element.getAttribute('data-view-link-id') == data.id) {
                            element.innerText = '  ورود به  ' + data.title
                        }
                    })
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }

        // editLink
        function editLink(id) {

            editSiteLinkForm.children[0].classList.remove('hidden')
            editSiteLinkForm.children[0].classList.add('flex')
            editSiteLinkForm.children[0].innerHTML = `
            <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('siteLink.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function (data) {
                    editSiteLinkForm.children[0].classList.remove('flex')
                    editSiteLinkForm.children[0].classList.add('hidden')
                    linkTitle.innerText = data.title
                    link_title_input.value = data.title
                    link_address_input.value = data.address
                    siteLinkId.value = data.id
                },
                error: function () {
                    alert('خطا در بارگذاری اطلاعات')
                }
            })


            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editSiteLinkForm.classList.remove('invisible')
            editSiteLinkForm.classList.remove('opacity-0')
            editSiteLinkForm.classList.remove('top-full')
            editSiteLinkForm.classList.add('top-0')
            editSiteLinkForm.classList.add('-translate-y-1/7')
        }


      


        let currentBlock = ""

        function addQuestionToBlock(blockId, el) {
            currentBlock = el.parentElement.parentElement
            document.getElementById('add_question_block_id').value = blockId;

            block.classList.remove('invisible');
            block.classList.remove('opacity-0');
            group.classList.add('scale-95');
            group.classList.add('opacity-0');
            group.classList.add('invisible');

            let addQuestionForm = document.getElementById('addQuestionForm');


            let forms = document.querySelectorAll('.form');
            forms.forEach((form) => {
                form.classList.add('invisible');
                form.classList.add('opacity-0');
                form.classList.remove('top-1/2');
                form.classList.remove('-translate-y-1/2');
            });


            addQuestionForm.classList.remove('invisible');
            addQuestionForm.classList.remove('opacity-0');
            addQuestionForm.classList.add('top-1/2');
            addQuestionForm.classList.add('-translate-y-1/2');
            addQuestionForm.classList.remove('top-full');
        }


        function addQuestionToGroup(e) {
            e.preventDefault();
            let question = document.getElementById('add_question_input').value;
            let answer = document.getElementById('add_answer_input').value;
            let blockId = document.getElementById('add_question_block_id').value;
            let addQuestionForm = document.getElementById('addQuestionForm')
            let faqSection = document.getElementById('faq')
            addQuestionForm.children[0].classList.remove('hidden')
            addQuestionForm.children[0].classList.add('flex')
            addQuestionForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('FAQ.addQuestion') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'question': question,
                    'answer': answer,
                    'block_id': blockId,
                    'page_id': "{{ $page->id }}"
                },
                success: function (data) {
                    addQuestionForm.children[0].classList.remove('flex');
                    addQuestionForm.children[0].classList.add('hidden');
                    document.getElementById('add_question_input').value = "";
                    document.getElementById('add_answer_input').value = "";
                    let div = document.createElement('div');
                    let element = `
            <div class="lg:py-2">
                <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                    <div class="w-full lg:w-8/9 faqBox">
                        <div class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                            <div class="flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-5 rounded-md">
                                    <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                </svg>
                                <span class="font-bold text-gray-800 viewFAQ" data-view-FAQ-id="${data.id}">${data.question}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-all duration-200 cursor-pointer" viewBox="0 0 448 512">
                                <path fill="black" d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                            </svg>
                        </div>
                        <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                <p class="text-gray-700 font-bold">${data.answer}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                            onclick='editFaq("${data.id}")'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="white"
                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                            </svg>
                        </div>
                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                            onclick='deleteFAQ(this, "${data.id}")'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            `

                    div.innerHTML = element
                    currentBlock.appendChild(div)
                    // let faqBox = document.querySelectorAll(".faqBox")
                    // faqBox.forEach(faq => {
                    //     faq.children[0].addEventListener('click', () => {
                    //         if (faq.children[1].classList.contains('max-h-0')) {
                    //             faqBox.forEach((item) => {
                    //                 item.children[1].classList.remove('max-h-[500px]')
                    //                 item.children[1].classList.add('max-h-0')
                    //                 item.children[0].children[1].classList.remove('rotate-180')
                    //                 item.children[0].children[1].classList.add('rotate-0')
                    //             })
                    //             faq.children[1].classList.remove('max-h-0')
                    //             faq.children[1].classList.add('max-h-[500px]')
                    //             faq.children[0].children[1].classList.remove('rotate-0')
                    //             faq.children[0].children[1].classList.add('rotate-180')
                    //         } else {
                    //             faq.children[1].classList.remove('max-h-[500px]')
                    //             faq.children[1].classList.add('max-h-0')
                    //             faq.children[0].children[1].classList.remove('rotate-180')
                    //             faq.children[0].children[1].classList.add('rotate-0')
                    //         }
                    //     })
                    // })
                    closeForm()
                },
                error: function () {
                    alert('خطا در ارسال داده ها');
                    addQuestionForm.children[0].classList.remove('flex')
                    addQuestionForm.children[0].classList.add('hidden')
                }
            });
        }
     
        

        let restaurant = document.getElementById('restaurant')
        let restaurantList = document.getElementById('careerList')
        let restaurantTitle = document.getElementById('restaurantTitle')
        let restaurantType = document.getElementById('restaurantType')
        let restaurantQrCount = document.getElementById('restaurantQrCount')
        let restaurantPhone = document.getElementById('restaurantPhone')

        function createRestaurant() {
            restaurant.classList.remove('invisible')
            restaurant.classList.remove('opacity-0')
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
        }

     

        // editFAQTitle
        function editTitle(id) {
            console.log('eftekhari')
            let currentTitle = document.querySelector('.viewFAQ[data-block-id="' + id + '"]');

            if (currentTitle) {
                titleText.innerText = currentTitle.innerText.trim();
                title_input.value = currentTitle.innerText.trim();
                blockId.value = id;
            }
            editTitleForm.children[0].classList.remove('hidden')
            editTitleForm.children[0].classList.add('flex')
            editTitleForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('pageBlocks.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
               success: function (data) {

                    editTitleForm.children[0].classList.remove('flex');
                    editTitleForm.children[0].classList.add('hidden');

                    titleText.innerText = data.title || '';
                    title_input.value = data.title || '';
                    blockId.value = data.id;

                },
                error: function () {
                    alert('خطا در بارگذاری اطلاعات')
                }
            })

            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editTitleForm.classList.remove('invisible')
            editTitleForm.classList.remove('opacity-0')
            editTitleForm.classList.remove('top-full')
            editTitleForm.classList.add('top-[50vh]')
            editTitleForm.classList.add('-translate-y-1/7')
        }

        // updateFAQTitle
        function updateTitle(e) {
            let viewTitles = document.querySelectorAll('.viewFAQ')
            e.preventDefault();

            editTitleForm.children[0].classList.remove('hidden')
            editTitleForm.children[0].classList.add('flex')
            editTitleForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('pageBlocks.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': blockId.value,
                    'title': title_input.value,
                    'page_id': "{{ $page->id }}"
                },
                success: function (data) {
                    titleText.innerText = data.title
                    title_input.value = data.title

                    editTitleForm.children[0].classList.remove('flex')
                    editTitleForm.children[0].classList.add('hidden')
                    closeForm()

                    viewTitles.forEach((element) => {
                        if (element.getAttribute('data-block-id') == data.id) {
                            element.innerText = data.title
                        }
                    })
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }

        // deleteFAQTitle
        function deleteTitle(blockId, el) {
            let viewTitles = document.querySelectorAll('.viewFAQ')
            editTitleForm.children[0].classList.remove('hidden')
            editTitleForm.children[0].classList.add('flex')
            editTitleForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('pageBlocks.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': blockId
                },
                success: function (data) {
                    console.log(data)
                    editTitleForm.children[0].classList.remove('flex')
                    editTitleForm.children[0].classList.add('hidden')

                    // viewTitles.forEach((element) => {
                    //     if (element.getAttribute('data-view-FAQ-id') == blockId.value) {
                    el.parentElement.parentElement.remove()
                    //     }
                    // })
                    closeForm()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }


        // faq edit
        function editFaq(id) {
            console.log(id)
            editFaqForm.children[0].classList.remove('hidden')
            editFaqForm.children[0].classList.add('flex')
            editFaqForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('FAQ.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function (data) {
                    editFaqForm.children[0].classList.remove('flex')
                    editFaqForm.children[0].classList.add('hidden')
                    faqQuestion.innerText = data.question
                    faqAnswer.innerText = data.answer

                    question_input.value = data.question
                    answer_input.value = data.answer

                    FaqId.value = data.id
                },
                error: function () {
                    alert('خطا در بارگذاری اطلاعات')
                }
            })


            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editFaqForm.classList.remove('invisible')
            editFaqForm.classList.remove('opacity-0')
            editFaqForm.classList.remove('top-full')
            editFaqForm.classList.add('top-[30vh]')
            editFaqForm.classList.add('-translate-y-1/7')
        }

        // updateFAQ
        function updateFaq(e) {
            let viewFAQ = document.querySelectorAll('.viewFAQ')
            e.preventDefault();
            editFaqForm.children[0].classList.remove('hidden')
            editFaqForm.children[0].classList.add('flex')
            editFaqForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('FAQ.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': FaqId.value,
                    'question': question_input.value,
                    'answer': answer_input.value,
                    'page_id': "{{ $page->id }}"
                },
                success: function (data) {
                    faqQuestion.innerText = data.question
                    faqAnswer.innerText = data.answer
                    question_input.value = data.question
                    answer_input.value = data.answer
                    editFaqForm.children[0].classList.remove('flex')
                    editFaqForm.children[0].classList.add('hidden')
                    closeForm()
                    viewFAQ.forEach((element) => {
                        if (element.getAttribute('data-view-FAQ-id') == data.id) {
                            element.innerText = data.question
                            let parentDiv = element.closest('.faqBox')
                            if (parentDiv) {
                                let answerElement = parentDiv.querySelector('.text-gray-700.font-bold')
                                if (answerElement) {
                                    answerElement.innerText = data.answer
                                }
                            }
                        }
                    })
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })


        }


        // updateSocial
        function updateSocial(e) {
            e.preventDefault()
            editsocialMediaForm.children[0].classList.remove('hidden')
            editsocialMediaForm.children[0].classList.add('flex')
            editsocialMediaForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('socialAddress.update') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': socialAddressId.value,
                    'username': userNameUpdate.value,
                    'page_id': "{{ $page->id }}"
                },
                success: function (data) {
                    editsocialMediaForm.children[0].classList.remove('flex')
                    editsocialMediaForm.children[0].classList.add('hidden')
                    closeForm()
                },
                error: function () {
                    alert('خطا در بارگیری داده ها')
                }
            })
        }

        // storeSocial
        
    function storeSocialmedia(ev) {
        ev.preventDefault();

        if (userNameCreate.value.trim() === "") {
            userNameCreate.classList.add('border-1', 'border-red-500');
            userNameCreate.parentElement.children[0].classList.remove('opacity-0');
            return;
        }

        const loader = storeSocialForm.children[0];

        loader.classList.remove('hidden');
        loader.classList.add('flex');
        loader.innerHTML = `
            <div class="size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin"></div>
        `;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url: "{{ route('socialAddress.store') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                socialMedia_id: socialMedia_id_create.value,
                page_id: "{{ $page->id }}",
                userName: userNameCreate.value
            },

            success: function (datas) {

                // بستن لودر
                loader.classList.remove('flex');
                loader.classList.add('hidden');

                // پاک کردن فرم
                userNameCreate.value = "";

                // انتخاب اولین گزینه معتبر سلکت
                if (socialMedia_id_create.options.length > 0) {
                    socialMedia_id_create.selectedIndex = 0;
                }

                closeForm();

                // ساخت مسیر آیکون
                const iconPath = "{{ asset('storage') }}/" + datas.socialMedia.icon_path;

                // ساخت آیتم جدید
                const div = document.createElement('div');
                div.className = "lg:py-2";

                div.innerHTML = `
                    <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                        ورود به ${datas.socialMedia.title}
                    </h3>

                    <div class="relative mt-3 flex flex-col lg:flex-row gap-3">

                        <div
                            class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 rounded-full cursor-pointer editSocial relative transition-all duration-300"
                            style="background-color: ${datas.socialMedia.color}"
                            data-social-id="${datas.address.id}"
                            onclick='editSocial("${datas.address.id}", "${datas.socialMedia.id}")'>

                            <img
                                src="${iconPath}"
                                class="size-5 rounded-md"
                                alt="">

                            <span class="font-bold text-gray-800">
                                ${datas.socialMedia.title}
                            </span>
                        </div>

                        <div class="absolute -top-2 left-0 w-8 flex flex-col items-center gap-3">

                            <!-- دکمه ویرایش -->
                            <a
                                onclick='editSocial("${datas.address.id}", "${datas.socialMedia.id}")'
                                class="p-1.5 rounded-full bg-zinc-300 cursor-pointer w-full flex justify-center items-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-4 fill-zinc-500 hover:fill-green-500"
                                    viewBox="0 0 512 512">
                                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                </svg>
                            </a>

                            <!-- دکمه حذف -->
                            <a
                                onclick='deleteMediaList(this, "${datas.address.id}")'
                                class="p-1.5 rounded-full bg-zinc-300 cursor-pointer w-full flex justify-center items-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="size-4 fill-zinc-500 hover:fill-red-500"
                                    viewBox="0 0 448 512">
                                    <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                </svg>
                            </a>

                        </div>
                    </div>
                `;

                // اضافه کردن به لیست شبکه‌های اجتماعی
                socialLinks.appendChild(div);
            },

            error: function (xhr) {
                loader.classList.remove('flex');
                loader.classList.add('hidden');

                alert('خطا در ارسال داده ها');
                console.error(xhr.responseText);
            }
        });
    }

        // editSocial
        function editSocial(id, socialId) {
            editsocialMediaForm.children[0].classList.remove('hidden')
            editsocialMediaForm.children[0].classList.add('flex')
            editsocialMediaForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ url('socialAddress/edit/${id}') }}`,
                type: "POST",
                dataType: "json",
                data: {
                    'social_id': id
                },
                success: function (datas) {
                    console.log(datas, socialMediaIcon)
                    editsocialMediaForm.children[0].classList.add('hidden')
                    editsocialMediaForm.children[0].classList.remove('flex')
                    userName.value = datas.data.username
                    socialAddressId.value = datas.data.id
                    socialLink.innerText = datas.data.username
                    datas.socialMedias.forEach((socialMedia) => {
                        if (socialId == socialMedia.id) {
                            // console.log(socialMedia)
                            socialMediaIcon.innerHTML = `
                            <img src="{{ asset('storage/${socialMedia.icon_path}') }}" class="size-full object-cover">
                            `
                        }
                    })
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editSocialM.classList.remove('invisible')
            editSocialM.classList.remove('opacity-0')
            editSocialM.classList.remove('top-full')
            editSocialM.classList.add('top-0')
            editSocialM.classList.add('-translate-y-1/7')
        }

        // deleteSocial
        function deleteMedia() {
            let editSocialSection = document.querySelectorAll('.editSocial')
            editsocialMediaForm.children[0].classList.remove('hidden')
            editsocialMediaForm.children[0].classList.add('flex')
            editsocialMediaForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('socialAddress.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'social_address_id': socialAddressId.value
                },
                success: function (datas) {
                    editsocialMediaForm.children[0].classList.remove('flex')
                    editsocialMediaForm.children[0].classList.add('hidden')
                    editSocialSection.forEach((media) => {
                        if (media.getAttribute('data-social-id') == socialAddressId.value) {
                            media.parentElement.parentElement.remove()
                        }
                    })
                    closeForm()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        // deleteSocial
        function deleteMediaList(el, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('socialAddress.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'social_address_id': id
                },
                success: function (datas) {
                    el.parentElement.parentElement.parentElement.remove()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }
        


        /////deleteFAQ
        function deleteFAQ(el, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('FAQ.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function (datas) {

                    let questionRow = el.parentElement.parentElement;
                    let blockElement = questionRow.parentElement;
                    let blockQuestions = blockElement.querySelectorAll('.faqBox');

                    questionRow.remove();

                    if (blockQuestions.length === 1) {
                        let blockId = blockElement.querySelector('[data-block-id]')?.getAttribute('data-block-id');

                        if (blockId) {
                            deleteTitle(blockId, blockElement.querySelector('.bg-red-500'));
                        }
                    }
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        ////openFAQ
        let i = 1

        function openFAQ() {
            let div = document.createElement('div')
            div.classList = "w-11/12 flex flex-col mx-auto py-4"
            let element = `
            <div class="w-full p-3 relative border-1 border-gray-300 rounded-sm">
                <span class="absolute cursor-pointer -top-2 -left-2" onclick="closeFAQ(this)">❌</span>
                     <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentFAQs">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text"
                               class="outline-hidden w-full p-3 text-sm createFaqRequire"
                               name="faqs[0][question]" id="question_input" placeholder="سوال">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text"
                               class="outline-hidden w-full p-3 text-sm createFaqRequire"
                               name="faqs[0][answer]" id="answer_input" placeholder="پاسخ">
                    </div>
            </div>

            `
            div.innerHTML = element
            parentFAQ.appendChild(div)
            i++

        }

        // closeFAQ
        function closeFAQ(el) {
            el.parentElement.parentElement.remove()
        }

        // storeContactus
        function storePageContactus(e, el) {
            let key_input = document.getElementById('key_input')
            let value_input = document.getElementById('value_input')
          
            let array = [];
            let errorText = ""
            e.preventDefault()
            let createPageContactusRequire = document.querySelectorAll('.createPageContactusRequire')
            let parentPageContacts = document.querySelectorAll('.parentPageContacts')
            let flag = true

            createPageContactusRequire.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })

            parentPageContacts.forEach((contactus) => {
                let datas = [contactus.children[1].value, contactus.children[3].value]
                array.push(datas)
            })

            if (flag) {
                createPageContactus.children[0].classList.remove('hidden')
                createPageContactus.children[0].classList.add('flex')
                createPageContactus.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('pageContacts.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                       
                        'datas': array,
                        'page_id': "{{ $page->id }}",
                    },
                    success: function (response) {
                        console.log(response.block.title)
                        createPageContactus.children[0].classList.remove('flex')
                        createPageContactus.children[0].classList.add('hidden')

                      
                        key_input.value = ""
                        value_input.value = ""

                        let mainDiv = document.createElement('div')
                        mainDiv.className = "lg:py-2"
                        let element = `
                    <h3 class="lg:block text-lg font-bold text-gray-800 text-center cursor-pointer viewFAQ"
                        onclick='editTitle("${response.block.id}")'
                        data-block-id="${response.block.id}">
                        ${response.block.title}
                    </h3>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <div class="p-1.5 rounded-md bg-blue-500 hover:bg-blue-600 cursor-pointer"
                            onclick='addContactusToBlock("${response.block.id}", this)'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>
                        </div>
                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                            onclick='editTitle("${response.block.id}", this)'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                            </svg>
                        </div>
                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                            onclick='deleteTitle("${response.block.id}",this)'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                            </svg>
                        </div>
                    </div>
                `;
                        response.contactus.forEach((data) => {
                            element += `
                        <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                            <div class="w-full lg:w-8/9 contactusBox">
                                <div class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                    <div class="flex flex-row items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-5 rounded-md">
                                            <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                        </svg>
                                        <span class="font-bold text-gray-800 viewContactus" data-view-cp-id="${data.id}">${data.key}</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-all duration-200 cursor-pointer" viewBox="0 0 448 512">
                                        <path fill="black" d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                        <p class="text-gray-700 font-bold">${data.value}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                    onclick='editpageContactus("${data.id}")'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>
                                <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                    onclick='deletePageContactus(this, "${data.id}")'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    `;
                        });

                        mainDiv.innerHTML = element;
                        PC.appendChild(mainDiv);

                        let contactusBox = document.querySelectorAll(".contactusBox")
                        contactusBox.forEach(faq => {
                            faq.children[0].addEventListener('click', () => {
                                if (faq.children[1].classList.contains('max-h-0')) {
                                    contactusBox.forEach((item) => {
                                        item.children[1].classList.remove('max-h-[500px]')
                                        item.children[1].classList.add('max-h-0')
                                        item.children[0].children[1].classList.remove('rotate-180')
                                        item.children[0].children[1].classList.add('rotate-0')
                                    })
                                    faq.children[1].classList.remove('max-h-0')
                                    faq.children[1].classList.add('max-h-[500px]')
                                    faq.children[0].children[1].classList.remove('rotate-0')
                                    faq.children[0].children[1].classList.add('rotate-180')
                                } else {
                                    faq.children[1].classList.remove('max-h-[500px]')
                                    faq.children[1].classList.add('max-h-0')
                                    faq.children[0].children[1].classList.remove('rotate-180')
                                    faq.children[0].children[1].classList.add('rotate-0')
                                }
                            })
                        })

                        closeForm();
                    },
                    error: function () {
                        alert('خطا در ارسال داده ها');
                    }
                });
            }
        }

        // add contactus
        let currentContactusBlock = ""

        function addContactusToBlock(blockId, el) {
            currentContactusBlock = el.parentElement.parentElement
            document.getElementById('add_contactus_block_id').value = blockId;

            block.classList.remove('invisible');
            block.classList.remove('opacity-0');
            group.classList.add('scale-95');
            group.classList.add('opacity-0');
            group.classList.add('invisible');

            let addContactusForm = document.getElementById('addContactusForm');


            let forms = document.querySelectorAll('.form');
            forms.forEach((form) => {
                form.classList.add('invisible');
                form.classList.add('opacity-0');
                form.classList.add('top-1/2');
                form.classList.remove('-translate-y-1/2');

            });


            addContactusForm.classList.remove('invisible');
            addContactusForm.classList.remove('opacity-0');
            addContactusForm.classList.add('top-1/2');
            addContactusForm.classList.add('-translate-y-1/2');
            addContactusForm.classList.remove('top-full');
            addContactusForm.classList.remove('-translate-x-1/2');
            addContactusForm.classList.add('w-2/3');
    
            addContactusForm.classList.add('mr-4');


        }

        // add contactus to group
        function addContactusToGroup(e) {
            e.preventDefault();
            let addContactusRequire = document.querySelectorAll('.addContactusRequire')
            let flag = true
            addContactusRequire.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })
            if(flag){

          
                let keyContactus = document.getElementById('add_key_input').value;
                let valueContactus = document.getElementById('add_value_input').value;
                let blockId = document.getElementById('add_contactus_block_id').value;
                let addContactusForm = document.getElementById('addContactusForm')
                let pcSection = document.getElementById('pc')
                addContactusForm.children[0].classList.remove('hidden')
                addContactusForm.children[0].classList.add('flex')
                addContactusForm.children[0].innerHTML = `
                    <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
                `;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ route('pageContacts.addContactus') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'key': keyContactus,
                        'value': valueContactus,
                        'block_id': blockId,
                        'page_id': "{{ $page->id }}"
                    },
                    success: function (data) {
                        addContactusForm.children[0].classList.remove('flex');
                        addContactusForm.children[0].classList.add('hidden');
                        document.getElementById('add_key_input').value = "";
                        document.getElementById('add_value_input').value = "";

                        // پاک کردن خطاهای اعتبارسنجی
                        addContactusRequire.forEach((item) => {
                            item.classList.remove('border-1', 'border-red-500');
                            item.parentElement.children[0].classList.add('opacity-0');
                        });
                        let div = document.createElement('div');
                        let element = `
                            <div class="lg:py-2">
                                <div class="mt-3 relative flex flex-col lg:flex-row gap-3">
                                    <div class="w-full lg:w-8/9 contactusBox">
                                        <div class="flex flex-row justify-between items-center gap-3 py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                            <div class="flex flex-row items-center gap-2" onclick='editpageContactus("${data.id}")'>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-5 rounded-md">
                                                    <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                                </svg>
                                                <span class="font-bold text-gray-800 viewContactus" data-view-pc-id="${data.id}">${data.key}</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-all duration-200 cursor-pointer" viewBox="0 0 448 512">
                                                <path fill="black" d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                            </svg>
                                        </div>
                                        <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                            <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                                <p class="text-gray-700 font-bold">${data.value}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-1/9 flex flex-row items-center gap-3">
                                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                            onclick='editpageContactus("${data.id}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                <path fill="white"
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </div>
                                        <div class="w-full flex flex-row justify-center items-center p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                            onclick='deletePageContactus(this, "${data.id}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                <path fill="white"
                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `

                        div.innerHTML = element
                        currentContactusBlock.appendChild(div)
                    
                        closeForm()
                    },
                    error: function () {
                        alert('خطا در ارسال داده ها');
                        addContactusForm.children[0].classList.remove('flex')
                        addContactusForm.children[0].classList.add('hidden')
                    }
                });
            }
        }

        // delete pageContactus
        function deletePageContactus(el, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('pageContacts.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function (datas) {
                    console.log(datas)
                    el.parentElement.parentElement.parentElement.remove()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        let editContactusForm = document.querySelector('.editContactusForm')

        // edit pageContactus
        function editpageContactus(id) {
            editContactusForm.children[0].classList.remove('hidden')
            editContactusForm.children[0].classList.add('flex')

            editContactusForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('pageContacts.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function (data) {
                    editContactusForm.children[0].classList.remove('flex')
                    editContactusForm.children[0].classList.add('hidden')
                    contactusEditKey.innerText = data.key
                    contactusEditValue.innerText = data.value

                    edit_key_input.value = data.key
                    edit_value_input.value = data.value

                    pageContactusId.value = data.id
                },
                error: function () {
                    alert('خطا در بارگذاری اطلاعات')
                }
            })


            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editContactusForm.classList.remove('invisible')
            editContactusForm.classList.remove('opacity-0')
            editContactusForm.classList.remove('top-full')
            editContactusForm.classList.add('top-0')
            editContactusForm.classList.add('-translate-y-1/7')
        }

        // update pageContactus
        function updateContactus(e) {
            let viewContactus = document.querySelectorAll('.viewContactus')
            e.preventDefault();
            editContactusForm.children[0].classList.remove('hidden')
            editContactusForm.children[0].classList.add('flex')
            editContactusForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('pageContacts.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': pageContactusId.value,
                    'key': edit_key_input.value,
                    'value': edit_value_input.value,
                    'page_id': "{{ $page->id }}"
                },
                
                success: function (data) {

                    contactusEditKey.innerText = data.key;
                    contactusEditValue.innerText = data.value;

                    edit_key_input.value = data.key;
                    edit_value_input.value = data.value;

                    document.querySelectorAll('.viewContactus').forEach((element) => {

                        let contactId = element.getAttribute('data-view-pc-id') ||
                                        element.getAttribute('data-view-cp-id');

                        if (contactId == data.id) {

                            element.innerText = data.key;

                            let parentDiv = element.closest('.contactusBox');

                            if (parentDiv) {
                                let valueElement = parentDiv.querySelector('p.text-gray-700');

                                if (valueElement) {
                                    valueElement.innerText = data.value;
                                }
                            }
                        }
                    });

                    editContactusForm.children[0].classList.remove('flex');
                    editContactusForm.children[0].classList.add('hidden');

                    closeForm();
                },

                error: function () {
                    alert('خطا در ارسال داده')
                }
            })


        }

        let k = 1

        // store pageDescription
        let pd = document.getElementById('pd')
        let page_description_title_create = document.getElementById('page_description_title_create')
        function storePageDescription(e, el) {
            e.preventDefault()
            let size_input = document.getElementById('size_input')
            let direction_input = document.getElementById('direction_input')
            let createPdRequire = document.querySelectorAll('.createPdRequire ')
            let parentPDs = document.querySelectorAll('.parentPDs')
            let array = []
            let errorText = ""
            let flag = true

            // console.log(createPdRequire)
            createPdRequire.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })

            parentPDs.forEach((pd) => {
                let datas = [pd.children[1].getAttribute('data-size'), pd.children[3].getAttribute('data-direction')]
                array.push(datas)
            })
            if (flag) {
                createDescription.children[0].classList.remove('hidden')
                createDescription.children[0].classList.add('flex')
                createDescription.children[0].innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    </div>
                    `
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('PD.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'description': page_description_title_create.value,
                        'datas': array[0],
                        'page_id': "{{ $page->id }}",
                    },
                    success: function (response) {
                        console.log(response)
                        console.log(response.descriptionStyle[0] + ' store style')
                        console.log(response.descriptionStyle[1] + ' store style')
                        createDescription.children[0].classList.remove('flex')
                        createDescription.children[0].classList.add('hidden')
                        page_description_title_create.value = ""
                        size_input.value = ""
                        direction_input.value = ""
                        parentPDs.innerHTML = ""

                        let mainDiv = document.createElement('div')
                        mainDiv.className = "lg:py-2"
                        let element = `
                            <div class="text-gray-800 ${response.descriptionStyle[0]} ${response.descriptionStyle[1]} cursor-pointer viewDescriptionPage" onclick='editDescription("${response.description.id}" ,"${response.descriptionStyle[0]}" ,"${response.descriptionStyle[1]}" , "${response.block.id}" , this)' data-view-pd-id="${response.description.id}">${response.description.description}</div>
                        `
                        mainDiv.innerHTML = element
                        pd.appendChild(mainDiv)
                        closeForm()
                    }
                })
            }

        }
    


        // edit description
        let editDescriptionForm = document.querySelector('.editDescriptionForm')
        let edit_size_input = document.getElementById('edit_size_input')
        let edit_direction_input = document.getElementById('edit_direction_input')
        let page_description_title_edit = document.getElementById('page_description_title_edit')
        let PDId = document.getElementById('PDId')
        let pdBlockId = document.getElementById('pdBlockId')
        function editDescription(pdId, textStyle, directionStyle, pdBlockIdValue, el) {
            console.log(textStyle)
            console.log(directionStyle)
            editDescriptionForm.classList.remove('invisible')
            editDescriptionForm.classList.remove('opacity-0')
            editDescriptionForm.children[0].classList.remove('hidden')
            editDescriptionForm.children[0].classList.add('flex')
            // pdEditForm.classList.remove('top-full')
            // pdEditForm.classList.remove('top-0')
            pdBlockId.value = pdBlockIdValue
            globalElement = el
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            editDescriptionForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('PD.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': pdId
                },
                success: function (data) {
                    console.log(data)
                    page_description_title_edit.value = data.pd.description
                    if(data.descriptionStyle[0] == "text-16"){
                        edit_size_input.setAttribute('data-size-edit' , data.descriptionStyle[0])
                        edit_size_input.value = "متن کوچک"
                    }
                    if(data.descriptionStyle[0] == "text-20"){
                        edit_size_input.setAttribute('data-size-edit' , data.descriptionStyle[0])
                        edit_size_input.value = "متن متوسط"
                    }
                    if(data.descriptionStyle[0] == "text-24"){
                        edit_size_input.setAttribute('data-size-edit' , data.descriptionStyle[0])
                        edit_size_input.value = "متن بزرگ"
                    }
                    if(data.descriptionStyle[0] == "font-xs"){
                        edit_size_input.setAttribute('data-size-edit' , data.descriptionStyle[0])
                        edit_size_input.value = "عنوان کوچک"
                    }
                    if(data.descriptionStyle[0] == "font-semibold"){
                        edit_size_input.setAttribute('data-size-edit' , data.descriptionStyle[0])
                        edit_size_input.value = "عنوان متوسط"
                    }
                    if(data.descriptionStyle[0] == "font-bold"){
                        console.log('font-bold console')
                        edit_size_input.setAttribute('data-size-edit' , data.descriptionStyle[0])
                        edit_size_input.value = "عنوان بزرگ"
                    }
                    if(data.descriptionStyle[1] == "text-right"){
                        console.log('text-right console')
                        edit_direction_input.setAttribute('data-direction-edit' , data.descriptionStyle[1])
                        edit_direction_input.value = "راست چین"
                    }
                    if(data.descriptionStyle[1] == "text-center"){
                        edit_direction_input.setAttribute('data-direction-edit' , data.descriptionStyle[1])
                        edit_direction_input.value = "وسط چین"
                    }
                    if(data.descriptionStyle[1] == "text-left"){
                        edit_direction_input.setAttribute('data-direction-edit' , data.descriptionStyle[1])
                        edit_direction_input.value = "چپ چین"
                    }
                    PDId.value = data.pd.id
                },
                error: function () {
                    alert('خطا در بارگذاری اطلاعات')
                }
            })
        }

        // update pageDescription
        function updatePageDescription(e) {
            e.preventDefault()
            editDescriptionForm.children[0].classList.remove('hidden')
            editDescriptionForm.children[0].classList.add('flex')
            editDescriptionForm.children[0].innerHTML = `
                <div class='size-10 mx-auto border-4 border-white border-t-[#eb3153] rounded-full animate-spin'></div>
            `
            let parentPDs = document.querySelectorAll('.parentPDsEdit')
            let array = []
            parentPDs.forEach((pd) => {
                let datas = [pd.children[1].children[0].children[1].getAttribute('data-size-edit') , pd.children[3].children[0].children[1].getAttribute('data-direction-edit')]
                array.push(datas)
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('PD.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': PDId.value,
                    'description': page_description_title_edit.value,
                    'datas': array[0],
                    'page_id': "{{ $page->id }}"
                },
                success: function (data) {
                    console.log(data)
                    console.log(data.descriptionStyle[0])
                    console.log(data.descriptionStyle[1])
                    let children = pd.children
                    page_description_title_edit.value = data.pd.description
                    editDescriptionForm.children[0].classList.remove('flex')
                    editDescriptionForm.children[0].classList.add('hidden')
                    for(let child of children){
                        // let id =  child.children[0].getAttribute('data-view-pd-id')
                        // if(id == data.pd.block_id){
                            child.innerHTML = ""
                            let mainDiv = document.createElement('div')
                            mainDiv.classList = "lg:py-2"
                            let element = `
                                    <div class="text-gray-800 ${data.descriptionStyle[0]} ${data.descriptionStyle[1]} cursor-pointer viewDescription" onclick='editDescription(${data.pd.id} ,"${data.descriptionStyle[0]}" ,"${data.descriptionStyle[1]}", "${data.pd.block_id}", this)' data-view-pd-id="${data.pd.id}">${data.pd.description}</div>
                                `
                            mainDiv.innerHTML = element
                            child.appendChild(mainDiv)
                        // }
                    }
                    closeForm()
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })

        }

        // delete pageDescription
        function deletePageDescription() {
            let viewDescription = document.querySelector('.viewDescriptionPage')
            // console.log(viewDescription)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('PD.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': PDId.value
                },
                success: function (datas) {
                    // console.log(globalElement)
                    globalElement.parentElement.remove()

                    closeForm()
                },
                error: function () {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }
    </script>
    @isset($page)
        <script>
            function copyText(pageId, pagePath) {
                let url = "{{ url('/') }}" + pagePath
                navigator.clipboard.writeText(url)
                alert("لینک کپی شد")
            }



            let editIcon = `
    <span class="w-6 h-6 flex flex-row items-center justify-center rounded-md hover:bg-gray-200 transition-all duration-300" title="ویرایش">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-gray-500" viewBox="0 0 512 512">
            <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
        </svg>
    </span>
`;


            function saveAllChanges() {
                let coverImage = document.getElementById('cover_image')
                let logoImage = document.getElementById('logo_image')

                let titleInput = document.getElementById('titleInput')
                let subTitleInput = document.getElementById('subTitleInput')

                let formData = new FormData();
                
                let pageId = document.getElementById('page_id')
                
                formData.append('page_id', pageId.value)
                

                if (coverImage) {
                    formData.append('cover_image', coverImage.files[0])
                }
                if (logoImage) {
                    formData.append('logo_image', logoImage.files[0]);
                }
                if (titleInput) {
                    formData.append('titleInput', titleInput.value)
                }
                if (subTitleInput) {
                    formData.append('subTitleInput', subTitleInput.value);
                }

                formData.append('_token', "{{ csrf_token() }}")

                $.ajax({
                    url: "{{ route('pages.saveAll') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        let titleInput = document.getElementById('titleInput')
                        let subTitleInput = document.getElementById('subTitleInput')
                        let pageCover = document.getElementById('pageCover')
                        let pageLogo = document.getElementById('pageLogo')
                        let pageTitle = document.getElementById('pageTitle')
                        let pageSubTitle = document.getElementById('pageSubTitle')
                        if(response.logo_path){
                            pageLogo.setAttribute('src' ,  "{{ asset('storage/') }}/" + response.logo_path)
                        }
                        if(response.cover_path){
                            pageCover.setAttribute('src' ,  "{{ asset('storage/') }}/" + response.cover_path)
                        }
                        if (response.title) {
                            pageTitle.innerText = response.title
                        }
                        if (response.subTitle) {
                            pageSubTitle.innerText = response.subTitle
                        }
        
                    
                        pup_up_edit('close')
                        
                    },
                    error: function() {
                        alert(eror);
                    }
                });
            }
            
            

        </script>
    @endisset
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection
