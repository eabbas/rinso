@extends('client.document')
@section('title', 'کسب و کار  ')
@section('content')

    <div class="w-11/12 mx-auto">

        <div class="flex flex-col border-none rounded-[7px]">
            <div class="flex flex-row justify-between items-center py-3 lg:py-5">
                <h1 class="lg:text-xl text-center font-bold">{{ $career->title }}</h1>

{{--                    @if (!$career->logo)--}}
{{--                        <img class="size-10 lg:size-20 rounded-lg"--}}
{{--                            src="{{ asset('assets/img/user.png') }}" alt="career logo" />--}}
{{--                    @else--}}
{{--                        <img class="size-10 lg:size-20 rounded-lg"--}}
{{--                            src="{{ asset('storage/' . $career->logo) }}" alt="career logo" />--}}
{{--                    @endif--}}

            </div>
        </div>
        <div class="w-full">
            @if ($career->banner)
                <img src="{{ asset('storage/'.$career->banner) }}" class="w-full h-40 sm:h-52 md:h-64 mx-auto rounded-xl object-cover shadow-lg" alt="carer banner">
            @endif
        </div>
        <div class="mt-2 lg:mt-5">
            <a href="{{ route('client.menu', [$career]) }}" class="px-3 py-1 bg-(--primary-color) text-white text-xs lg:text-sm float-end rounded-lg">مشاهده منو ها</a>
        </div>
        <div class="pt-3">
            <div class="rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
                <div class="flex flex-row justify-between items-center">
                    @if ($career->menu)
                        <div
                            class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                        </div>
                    @endif
                </div>
                <div class="w-full lg:w-3/4 mx-auto flex flex-col gap-y-3 lg:gap-y-5 mt-5">
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
                            نام صاحب کسب و کار
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->user->name }} {{ $career->user->family }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                               شماره تلفن رستوران
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->phone}}
                        </div>
                    </div>
                   
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            آدرس
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->province_city->province->title }} , {{ $career->province_city->title }} , {{ $career->address }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center {{ $career->email ? 'flex' : 'hidden' }}">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            ایمیل
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->email }}
                        </div>
                    </div>
                    @if($career->description)
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            توضیحات
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $career->description }}
                        </div>
                    </div>
                    @endif

                    @php
                    $flag = false;
                        foreach(json_decode($career->social_media) as $key => $value){
                            if($value !== null){
                                $flag = true;
                            }
                        }
                    @endphp
                    <div class="w-full lg:py-3 flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center {{ $flag ? 'flex' : 'hidden' }}">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            پل های ارتباطی
                        </div>
                        <div class="w-1/2 flex flex-col items-center gap-3 pr-3 lg:pr-0">
                            @foreach (json_decode($career->social_media) as $media => $link)
                                <div class="w-full flex-col lg:flex-row {{ $link ? 'flex' : 'hidden' }}">
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