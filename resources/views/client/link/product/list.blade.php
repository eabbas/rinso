@extends('client.document')
@section('title')
    محصولات مرتبط
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
    <div class="w-full min-h-[calc(100vh-100px)]">
        <div class="flex flex-row justify-between items-center mt-5 mb-3">
            <h1 class="lg:text-xl text-lg font-bold w-11/12 mx-auto" id="careerCatTitle">
                محصولات {{ $introCat->title }}
            </h1>
        </div>
        <div class="w-full p-5 grid grid-cols-2 gap-4">
            @foreach($introCat->products as $introPro)
                @if($introPro->show_in_home == 1)
                    <div class="w-full flex flex-col items-center gap-3">

                        <a href="{{ route('introPro.showForUser', [$introPro->id]) }}"
                           class="w-full flex flex-col bg-white pt-5 p-1 shadow-sm rounded-xl introProducts"
                           data-pro-id="{{ $introPro->id }}">
                            <div class="w-full flex justify-center">
                                {{-- <div class="absolute right-2 top-2 w-10 h-10 bg-[#fff] rounded-xl flex justify-center items-center">
                                    <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                    </svg>
                                </div> --}}
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
                            {{-- <span class="font-bold">1.500.000 تومان</span> --}}
                        </a>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection