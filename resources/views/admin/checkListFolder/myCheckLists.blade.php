@extends('admin.app.panel')
@section('title', ' صفحه های من ')
@section('content')
    <style>
        @media (max-width: 768px) {
            .checklist-row {
                flex-wrap: wrap !important;
            }
            .user-section {
                flex-wrap: wrap !important;
                justify-content: center !important;
            }
            .date-section {
                flex-wrap: wrap !important;
                justify-content: center !important;
            }
        }

        @media (max-width: 640px) {
            .action-buttons-mobile {
                width: 100% !important;
                justify-content: center !important;
                margin-top: 0.75rem !important;
            }
            .checklist-item {
                position: relative;
                padding-top: 2rem !important;
            }
            .checklist-id-badge {
                position: absolute;
                top: 0.5rem;
                right: 0.5rem;
                background: #f3f4f6;
                padding: 0.15rem 0.5rem;
                border-radius: 9999px;
                font-size: 0.7rem;
            }
        }
    </style>

    <div class="w-full flex flex-col pb-4 px-2 sm:px-3">
        <div class="pb-4 sm:pb-5">
            <h2 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 text-center">چک لیست های من</h2>
            <p class="text-xs text-gray-400 text-center mt-1 hidden sm:block">مدیریت چک لیست‌های شما</p>
        </div>

        @if (count($chekLists)>0)
            <form action="{{ route('pages.deleteAll') }}" method="post" class="flex flex-col gap-4 sm:gap-5">
                @csrf

                <div class="overflow-x-auto shadow-sm bg-white rounded-lg sm:rounded-xl" style="scrollbar-width: none;">
                    <div class="min-w-full">
                        <div class="bg-white divide-y divide-gray-100">
                            @for ($i=0 ; $i<count($chekLists) ; $i++)
                                @if ($chekLists[$i])
                                    <div class="checklist-item w-full flex  justify-between items-center px-3 sm:px-4 py-3 sm:py-3 relative">

                                        <!-- ID Badge for mobile -->
{{--                                        <div class="checklist-id-badge sm:hidden">--}}
{{--                                            <span class="text-xs text-gray-500">#{{$chekLists[$i]->id}}</span>--}}
{{--                                        </div>--}}

                                        <!-- ID for desktop -->
                                        <span class=" text-sm text-gray-500 w-5">{{$chekLists[$i]->id}}</span>

                                        <div class="flex-1 flex  gap-3">
                                            <div class="user-section flex  text-center items-center justify-center gap-3 py-2 sm:py-2">
                                                <!-- لوگو -->
                                                <div class="text-sm h-full flex items-center justify-center text-gray-900">
                                                    @if(Auth::user()->main_image)
                                                        <img class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full object-cover border border-gray-100 shadow-sm"
                                                             src="{{ asset('storage/' . Auth::user()->main_image) }}">
                                                    @else
                                                        <img class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full object-cover border border-gray-100 shadow-sm"
                                                             src="{{ asset('assets/img/user.png') }}">
                                                    @endif
                                                </div>

                                                <!-- اطلاعات کاربر و تاریخ -->
                                                <div class="date-section text-sm  items-center justify-end gap-2 sm:gap-3 text-gray-900">
                                                <span class="inline-flex items-center gap-1">
                                                    <span class="text-rose-400 font-bold text-xs sm:text-sm">نام:</span>
                                                    <span class="text-xs sm:text-sm">{{ Auth::user()->name .' '.Auth::user()->family }}</span>
                                                </span>
                                                <span class="sm:inline-flex items-center gap-1 hidden  ">
                                                    <span class="text-rose-400 font-bold text-xs sm:text-sm">تاریخ ثبت:</span>
                                                    <span class="text-xs sm:text-sm">{{ $chekLists[$i]->created_at }}</span>
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- دکمه‌های عملیات -->
                                        <div class=" flex flex-row justify-center items-center gap-2 ">
                                            <!-- دکمه‌های دسکتاپ (لینک متنی) -->


                                            <div class="hidden sm:flex gap-3">
                                                <a href="{{route('checkList.singlecheckList', $chekLists[$i]->id) }}"
                                                   class="text-blue-600 hover:text-blue-700 text-sm font-medium transition">نمایش</a>
                                                <a href="{{route('checkList.editChecklist',$chekLists[$i]->id) }}"
                                                   class="text-amber-600 hover:text-amber-700 text-sm font-medium transition">ویرایش</a>
                                                <a href="{{ route('checkList.deleteChecklist', $chekLists[$i]->id) }}"
                                                   class="text-red-600 hover:text-red-700 text-sm font-medium transition"
                                                   onclick="return confirm('آیا از حذف این چک لیست مطمئن هستید؟')">حذف</a>
                                            </div>

                                            <!-- دکمه‌های موبایل (همان آیکون‌های قبلی) -->
                                            <div class="flex sm:hidden gap-1">
                                                <a href="{{route('checkList.editChecklist',$chekLists[$i]->id) }}"
                                                   class="size-6 flex items-center justify-center bg-green-500 hover:bg-green-600 rounded-md transition shadow-sm"
                                                   title="ویرایش">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('checkList.deleteChecklist', $chekLists[$i]->id) }}"
                                                   class="size-6 flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-md transition shadow-sm"
                                                   title="حذف"
                                                   onclick="return confirm('آیا از حذف این چک لیست مطمئن هستید؟')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{route('checkList.singlecheckList', $chekLists[$i]->id) }}"
                                                   class="size-6 flex items-center justify-center bg-sky-500 hover:bg-sky-600 rounded-md transition shadow-sm"
                                                   title="مشاهده">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                                        <path fill="white" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <div class="px-6 py-4 text-center text-sm text-gray-500">
                                            هیچ اطلاعاتی یافت نشد
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div class="w-full bg-white h-40 rounded-xl flex flex-col gap-3 lg:gap-5 items-center justify-center shadow-sm">
            <span class="text-gray-700 text-sm lg:text-base">
                هنوز چک لیستی ایجاد نکرده اید!
            </span>
                <a href="{{ route('checkList.formCheckList') }}" class="block text-blue-600 text-md font-medium hover:text-blue-700 transition">
                    ایجاد چک لیست
                </a>
            </div>
        @endif
    </div>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection