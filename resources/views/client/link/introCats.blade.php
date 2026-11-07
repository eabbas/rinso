@extends('client.document')
@section('title', 'همه دسته ها')
@section('content')
    <div class="w-full h-full pt-5 samim min-h-[calc(100vh-100px)]">
        <section>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h1 class="lg:text-xl text-lg font-bold w-11/12 mx-auto" id="careerCatTitle">
                    همه دسته ها
                </h1>
            </div>
            <div class="grid grid-cols-3 lg:grid-cols-8 px-2">
                @foreach ($page->introCats as $cat)
                    @if(count($cat->products))
                        <div class="relative careers ">

                            <a href="{{ route('introCat.products', [$cat]) }}"
                               class=" w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-4">
                                <div class="w-24 h-24 rounded-full overflow-hidden object-center">
                                    @if ($cat->main_image)
                                        <img class="h-full w-full object-center"
                                             src="{{ asset('storage/'.$cat->main_image) }}"
                                             alt="career category avatar">

                                    @else
                                        <img class="h-full w-full object-cover"
                                             src="{{ asset('assets/img/cash-machine.png') }}"
                                             alt="career category icon">
                                    @endif
                                </div>

                                <span class="w-20 text-center text-gray-500 text-sm font-medium">
                            {{ $cat->title }}
                        </span>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
