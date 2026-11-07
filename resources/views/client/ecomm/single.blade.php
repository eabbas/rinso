@extends('client.document')
@section('title', 'فروشگاه  ')
@section('content')
    <div class="w-full">
        <div class="py-5 w-full">
            <h1 class="text-xl text-center lg:text-start">{{$ecomm->title}}</h1>
        </div>

        <div class="flex flex-col border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if (!$ecomm->logo)
                        <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                            src="{{ asset('assets/img/user.png') }}" alt="ecomm logo" />
                    @else
                        <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                            src="{{ asset('storage/' . $ecomm->logo) }}" alt="ecomm logo" />
                    @endif
                </div>
            </div>
        </div>
        <div class="pt-3 mt-4 lg:mt-8">
            <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="lg:text-xl mt-5 font-bold pb-3 border-b border-gray-200">
                        جزئیات کسب و کار
                    </h1>
                    @if ($ecomm->menu)
                        <div
                            class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                        </div>
                    @endif
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-y-3 lg:gap-y-5 mt-5">
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            نام کسب و کار
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->title }}
                        </div>
                    </div>
                  
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            نام صاحب کسب و کار
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->user->name }} {{ $ecomm->user->family }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            توضیحات
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->description }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            استان
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->province_city->province->title }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            شهر
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->province_city->title}}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            آدرس
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->address }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            ایمیل
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $ecomm->email }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            پل های ارتباطی
                        </div>
                        <div class="w-1/2 flex flex-col items-center gap-3 pr-3 lg:pr-0">
                            @foreach (json_decode($ecomm->social_media) as $media => $link)
                                <div class="w-full flex flex-col lg:flex-row">
                                    <div class="w-1/2 text-xs lg:text-sm text-gray-400">
                                        {{ $media }}
                                    </div>
                                    <div class="w-1/2 text-sm lg:text-base">
                                        {{ $link }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection