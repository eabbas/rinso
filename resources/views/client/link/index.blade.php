@extends('client.document')
@section('title', 'فامنو | همه صفحات')
@section('content')

    <div class="w-11/12 mx-auto min-h-[calc(100vh-189px)] mt-5">
        <h2 class="mb-5 font-bold text-sm lg:text-base">شبکه های اجتماعی</h2>
        <div class="grid grid-cols-2 lg:grid-cols-8 gap-3 lg:gap-4">
            @foreach ($pages as $page)
            @if($page->show_in_home == 1 && $page->active == 1)
                <a href="{{ route('client.loadLink', [$page]) }}"
                   class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 bg-white careers"
                   title="{{ $page->title }}">
                    <div class="w-full rounded-md overflow-hidden">
                        @if($page->logo_path)
                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                 src="{{ asset('storage/' . $page->logo_path) }}" alt="social address image">
                        @else
                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                 src="{{ asset('assets/img/user.png') }}" alt="social address image">
                        @endif

                    </div>
                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                        {{ $page->title }}
                    </span>
                </a>
                @endif
            @endforeach
        </div>
    </div>

@endsection
