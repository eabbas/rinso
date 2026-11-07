@extends('client.document')
@section('title', 'همه رستوران ها')
@section('content')
    <div class="w-11/12 mx-auto min-h-[calc(100vh-169px)] pt-5 samim">
        <section>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h1 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                    همه رستوران ها
                </h1>
            </div>
            <div class="flex flex-col gap-6">
                @foreach($careers as $career)
                 @if($career->show_in_home == 1 && $career->active == 1)
                 @if(count($career->menus))
                    {{--                    <div class="relative careers" data-index="{{ $career->career_category_id }}">--}}
                    {{--                        <!-- آیکون قلب در گوشه بالا سمت چپ -->--}}
                    {{--                        --}}{{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 absolute top-2 right-2 cursor-pointer" onclick="favoriteCareer({{$career->id}},this)">--}}
                    {{--                            <path fill="gray" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>--}}
                    {{--                        </svg> --}}
                    {{--                        <a href="{{ route('client.menu', [$career]) }}"--}}
                    {{--                           class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2">--}}
                    {{--                            <div class="w-full rounded-md overflow-hidden">--}}
                    {{--                                <img class="size-26 mx-auto rounded-[7px] object-cover"--}}
                    {{--                                     src="{{ asset('storage/'.$career->logo) }}" alt="career logo">--}}
                    {{--                            </div>--}}
                    {{--                            <span class="text-gray-500 text-sm font-medium">--}}
                    {{--                                {{ $career->title }}--}}
                    {{--                            </span>--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                    <a href="{{ route('client.menu', [$career]) }}" class="block w-full rounded-md flex flex-col gap-3">
                        <div class="w-full relative">
                            <img src="{{ asset('storage/'.$career->banner) }}" class="w-full max-h-32 rounded-md object-cover" alt="restaurant logo">
                            <img src="{{ asset('storage/'.$career->logo) }}" class="absolute -bottom-3 right-2.5 border-2 border-white ring-2 ring-rose-500 ring-offset-1 rounded-full size-14" alt="">
                        </div>
                        <div class="w-full flex flex-col gap-2 mt-3">
                            <div class="w-full flex flex-row items-center justify-between">
                                <span class="text-gray-800 text-sm font-bold">{{ $career->title }}</span>
{{--                                <div class="flex flex-row items-center gap-2">--}}
{{--                                    <span class="text-sm text-gray-600">(+3,000)</span>--}}
{{--                                    <span class="text-sm text-gray-800">2.9</span>--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-gray-800" viewBox="0 0 576 512">--}}
{{--                                        <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
                            </div>
{{--                            <div class="flex flex-row items-center gap-2">--}}
{{--                                <span class="text-xs text-gray-800">پیک رستوران : 89,500 تومان</span>--}}
{{--                                <span class="text-xs text-gray-800">.</span>--}}
{{--                                <span class="text-xs text-gray-800">تا <span class="font-bold">70</span> دقیقه</span>--}}
{{--                            </div>--}}
{{--                            <div class="w-fit py-1 px-2 rounded-full bg-[#eb3254]/20 text-xs text-gray-800 flex flex-row items-center gap-1 mt-2">--}}
{{--                                <svg viewBox="0 0 24 24" fill="#eb3254" xmlns="http://www.w3.org/2000/svg" class="size-4"><g fill="#FA601E"><path fill="#eb3254" fill-rule="evenodd" clip-rule="evenodd" d="M12.85 3.041a9 9 0 0 1 8.109 8.11h1.39v1.699h-1.39a9 9 0 0 1-8.11 8.108v1.394H11.15v-1.394a9 9 0 0 1-8.109-8.108H1.648v-1.7h1.393a9 9 0 0 1 8.11-8.109V1.648h1.699v1.393Zm-1.7 3.31h1.7V5.054a7 7 0 0 1 6.096 6.097h-1.295v1.7h1.295a6.999 6.999 0 0 1-6.096 6.096v-1.298h-1.7v1.298a6.999 6.999 0 0 1-6.096-6.096h1.298v-1.7H5.054a7 7 0 0 1 6.096-6.097v1.299Z"></path><path d="M12 9.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM19 1a4 4 0 0 1 4 4v1h-2V5a2 2 0 0 0-2-2h-1V1h1ZM3 19a2 2 0 0 0 2 2h1v2H5a4 4 0 0 1-4-4v-1h2v1ZM6 3H5a2 2 0 0 0-2 2v1H1V5a4 4 0 0 1 4-4h1v2ZM23 19a4 4 0 0 1-4 4h-1v-2h1a2 2 0 0 0 2-2v-1h2v1Z"></path></g></svg>--}}
{{--                                <span>50% شکار تخفیف</span>--}}
{{--                            </div>--}}
                        </div>
                    </a>
                @endif
                @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
