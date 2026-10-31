@extends('admin.app.panel')
@section('title')
    {{"لیست چک "}}
@endsection
@section('content')
    <style>
        @media (max-width: 768px) {
            .detail-header {
                flex-direction: column !important;
                gap: 0.75rem !important;
            }
            .date-group {
                justify-content: flex-start !important;
                flex-wrap: wrap !important;
            }
            .task-row {
                flex-direction: column !important;
                gap: 0.5rem !important;
            }
            .task-label {
                width: 100% !important;
            }
            .task-value {
                width: 100% !important;
                padding-right: 0 !important;
            }
        }

        @media (max-width: 640px) {
            .action-buttons {
                justify-content: center !important;
            }
            .user-image {
                width: 80px !important;
                height: 80px !important;
            }
        }

        .detail-card {
            transition: all 0.2s ease;
        }

        .detail-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>

    <div class="w-full px-2 sm:px-3 md:px-4 py-2 sm:py-3">
        <div class="pb-4 sm:pb-5 w-full">
            <h1 class="text-lg sm:text-xl font-bold text-gray-800 text-center sm:text-right">جزئیات چک لیست</h1>
            <p class="text-xs text-gray-400 text-center sm:text-right mt-1 hidden sm:block">مشاهده اطلاعات کامل چک لیست</p>
        </div>

        <!-- User Image Section -->
        <div class="flex flex-row border-none rounded-[7px] mb-3 sm:mb-4">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-3 sm:gap-5 py-2 sm:py-3">
                    @if (!$user->main_image)
                        <img class="user-image w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 rounded-xl shadow-md object-cover mx-auto lg:mx-0"
                             src="{{ asset('assets/img/user.png') }}"
                             alt="user logo" />
                    @else
                        <img class="user-image w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 rounded-xl shadow-md object-cover mx-auto lg:mx-0"
                             src="{{ asset('storage/' . $user->main_image) }}"
                             alt="user logo" />
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-3 sm:mt-4 lg:mt-5 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="shadow__profaill__karbary rounded-xl p-3 sm:p-4 lg:p-5 mb-3 lg:mb-5">

                <!-- Header with dates and actions -->
                <div class="detail-header flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-100 pb-3 sm:pb-4 mb-4 sm:mb-5">
                    <h1 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800">
                        جزئیات چک لیست
                    </h1>

                    <div class="date-group flex flex-wrap items-center gap-3 sm:gap-4 mt-2 sm:mt-0">
                        <div class="flex gap-2 items-center">
                            <span class="text-rose-400 font-bold text-xs sm:text-sm">تاریخ ثبت:</span>
                            <span class="text-gray-600 text-xs sm:text-sm">{{$chekList->created_at}}</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="text-rose-400 font-bold text-xs sm:text-sm">تاریخ ویرایش:</span>
                            <span class="text-gray-600 text-xs sm:text-sm">{{$chekList->updated_at}}</span>
                        </div>
                    </div>

                    <div class="action-buttons flex gap-2 mt-2 sm:mt-0">
                        <div class="">
                            <div class="flex justify-center">
                                <a href="{{route('checkList.editChecklist',$chekList->id)}}"
                                   class="w-8 h-8 flex items-center justify-center bg-green-500 hover:bg-green-600 rounded-lg transition shadow-sm"
                                   title="ویرایش">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 512 512">
                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex justify-center">
                                <a href="{{ route('checkList.deleteChecklist', $chekList->id) }}"
                                   class="w-8 h-8 flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-lg transition shadow-sm"
                                   title="حذف"
                                   onclick="return confirm('آیا از حذف این چک لیست مطمئن هستید؟')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 448 512">
                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="w-full flex flex-col gap-y-3 sm:gap-y-4 lg:gap-y-5">

                    <!-- User Name -->
                    <div class="w-full py-2 flex flex-col gap-1 lg:gap-0 lg:flex-row lg:items-center border-b border-gray-50 pb-3">
                        <div class="w-full lg:w-2/12 text-xs sm:text-sm text-gray-400 font-medium">
                            نام و نام خانوادگی
                        </div>
                        <div class="w-full lg:w-1/2 font-medium text-sm sm:text-base text-gray-800 pr-0 lg:pr-3">
                            {{ $user->name .' '.$user->family }}
                        </div>
                    </div>

                    <!-- Programming Task -->
                    <div class="task-row flex gap-3 w-full py-2 border-b border-gray-100 pb-3">
                        <div class="w-1/2 sm:w-2/12 lg:py-2">
                            <div class="w-full text-xs sm:text-sm text-gray-400 font-medium">
                                 وضعیت تسک برنامه نویسی
                            </div>
                            <div class="w-full font-medium text-sm sm:text-base text-gray-800 mt-1">
                                @if($chekList->programming_time==1)
                                    <span class="inline-flex items-center gap-1 text-green-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    ثبت شده
                                </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-gray-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    ثبت نشده
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 lg:py-2">
                            <div class="w-full text-xs sm:text-sm text-gray-400 font-medium">
                                توضیحات تسک برنامه نویسی
                            </div>
                            <div class="w-full font-medium text-sm sm:text-base text-gray-800 mt-1">
                                {{ $chekList->programming_description ?: '—' }}
                            </div>
                        </div>
                    </div>

                    <!-- English Task -->
                    <div class="task-row flex gap-3 w-full py-2 border-b border-gray-100 pb-3">
                        <div class="w-1/3 sm:w-2/12 lg:py-2">
                            <div class="w-full text-xs sm:text-sm text-gray-400 font-medium">
                                وضعیت تسک زبان
                            </div>
                            <div class="w-full font-medium text-sm sm:text-base text-gray-800 mt-1">
                                @if($chekList->english_time==1)
                                    <span class="inline-flex items-center gap-1 text-green-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    ثبت شده
                                </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-gray-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    ثبت نشده
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 lg:py-2">
                            <div class="w-full text-xs sm:text-sm text-gray-400 font-medium">
                                توضیحات تسک زبان انگلیسی
                            </div>
                            <div class="w-full font-medium text-sm sm:text-base text-gray-800 mt-1">
                                {{ $chekList->english_description ?: '—' }}
                            </div>
                        </div>
                    </div>

                    <!-- Reading Task -->
                    <div class="task-row flex gap-3 w-full py-2 border-b border-gray-100 pb-3">
                        <div class="w-1/3 sm:w-2/12 lg:py-2">
                            <div class="w-full text-xs sm:text-sm text-gray-400 font-medium">
                                وضعیت تسک کتاب خوانی
                            </div>
                            <div class="w-full font-medium text-sm sm:text-base text-gray-800 mt-1">
                                @if($chekList->reading_time==1)
                                    <span class="inline-flex items-center gap-1 text-green-600">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    ثبت شده
                                </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-gray-400">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    ثبت نشده
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 lg:py-2">
                            <div class="w-full text-xs sm:text-sm text-gray-400 font-medium">
                                توضیحات تسک کتاب خوانی
                            </div>
                            <div class="w-full font-medium text-sm sm:text-base text-gray-800 mt-1">
                                {{ $chekList->reading_description ?: '—' }}
                            </div>
                        </div>
                    </div>

                    <!-- Global Description -->
                    <div class="w-full py-2">
                        <div class="text-xs sm:text-sm text-gray-400 font-medium mb-2">
                            توضیحات کلی
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3 sm:p-4 text-sm sm:text-base text-gray-700 leading-relaxed min-h-24 border border-gray-100">
                            {{ $chekList->description ?: 'توضیحاتی وارد نشده است' }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection