@extends('client.document')
@section('title', 'چاپخانه ها')
@section('content')
    <div class="px-5">
        <a href="#" class="inline-block text-sm font-bold px-3 py-1.5 rounded-sm bg-blue-500 hover:bg-blue-600 text-white">سفارش چاپ هوشمند</a>
    </div>
    <div class="grid grid-cols-2 mx:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 items-center gap-5 p-5">
        @for ($i = 0; $i < 24; $i++)
            <a href="#" class="p-2 xl:p-4 border-1 border-gray-300 rounded-[10px] bg-white">
                <div class="block mb-1 w-full">
                    <img src="{{ asset('assets/img/shahkar.png') }}" class="w-[115px] max-h-20 mx-auto" alt="آیکون چاپ شاهکار">
                    <span class="inline-block w-full text-center pt-2">شاهکار</span>
                </div>
                <span
                    class="block text-center text-[10px] text-gray-600 max-h-[42px] h-[42px]">چاپ انواع بنر و فلکس</span>
            </a>
        @endfor
    </div>
@endsection
