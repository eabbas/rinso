@extends('admin.app.panel')
@section('title')
    {{ $career->title }}
@endsection
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full">
            <h1 class="text-xl text-center lg:text-start">{{ $career->title }}</h1>
        </div>

        <div class="flex flex-row border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if (!$career->logo)
                        <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}"
                            alt="career logo" />
                    @else
                        <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                            src="{{ asset('storage/' . $career->logo) }}" alt="career logo" />
                    @endif
                </div>
            </div>
        </div>

        {{-- <div class="flex flex-row border-none rounded-[7px]">
        <div class="block lg:flex flex-row justify-between gap-8">
            <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                @if (!$career->banner)
                <img
                    class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                    src="{{ asset('assets/img/user.png') }}"
                    alt="career banner"
                />
                @else
                <img
                    class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                    src="{{ asset('storage/'.$career->banner) }}"
                    alt="career banner"
                />
                @endif
            </div>
        </div>
    </div> --}}
        <div class="mt-4 lg:mt-5 bg-white">
            <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
                <div class="flex flex-row justify-between items-center border-b border-gray-200">
                    <h1 class="lg:text-xl mt-5 font-bold pb-3">
                        جزئیات رستوران
                    </h1>
                    <div
                        class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                        @if ($career->menu)
                            <div>
                                <a href="{{ route('client.careerMenu', [$career]) }}" class="text-sky-700">مشاهده منو</a>
                            </div>
                        @endif
                        <div>
                            <a href="{{ route('career.qr_codes', [$career]) }}" class="text-sky-700">مشاهده QRcode ها</a>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-y-3 lg:gap-y-5 mt-5">
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            نام کسب و کار
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->title }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            دسته
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->careerCategory->title }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            تعداد میز
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ count($career->qr_codes) }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            نام صاحب کسب و کار
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->user->name }} {{ $career->user->family }}
                        </div>
                    </div>
                    @if ($career->province_city)
                        <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                            <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                                آدرس
                            </div>
                            <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                                {{ $career->province_city ? $career->province_city->province->title : '' }} ,
                                {{ $career->province_city ? $career->province_city->title : '' }} ,
                                {{ $career->address && $career->address }}
                            </div>
                        </div>
                    @endif
                    @if ($career->email)
                        <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                            <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                                ایمیل
                            </div>
                            <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                                {{ $career->email }}
                            </div>
                        </div>
                    @endif
                    @if ($career->phone)
                        <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                            <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                                شماره تلفن رستوران
                            </div>
                            <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                                {{ $career->phone }}
                            </div>
                        </div>
                    @endif
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            وضعیت
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->active ? 'فعال' : 'غیرفعال' }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            نمایش در صفحه اول
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->show_in_home ? '✔' : '❌' }}
                        </div>
                    </div>
                    @if ($career->description)
                        <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                            <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                                توضیحات
                            </div>
                            <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                                {{ $career->description }}
                            </div>
                        </div>
                    @endif
                    @if (json_decode($career->social_media))
                        <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                            <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                                پل های ارتباطی
                            </div>
                            <div class="w-1/2 flex flex-col items-center gap-3 pr-3 lg:pr-0">
                                @foreach (json_decode($career->social_media) as $media => $link)
                                    @if ($link)
                                        <div class="w-full flex flex-col lg:flex-row">
                                            <div class="w-1/2 text-xs lg:text-sm text-gray-400">
                                                {{ $media }}
                                            </div>
                                            <div class="w-1/2 text-sm lg:text-base">
                                                {{ $link }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
