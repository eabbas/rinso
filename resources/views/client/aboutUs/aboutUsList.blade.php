@extends('client.document')
@section('title', 'درباره ما')
@section('content')

@foreach ($aboutUs as $about)
<section class="relative -mt-16 overflow-hidden bg-white py-16 md:py-24">
    <div class="mx-auto w-11/12 max-w-7xl">
        <div class="flex flex-col items-center gap-12 lg:flex-row lg:gap-16" dir="ltr">
            <div class="relative w-full lg:w-1/2" dir="rtl">

                <div class="absolute -left-4 -top-4 h-28 w-28 rounded-tl-[40px] bg-[#FB9413]"></div>

                <div class="relative z-10 overflow-hidden rounded-[28px] bg-gray-100 shadow-xl">
                    @if($about->image)
                        <img
                            src="{{ asset('storage/' . $about->image) }}"
                            alt="{{ $about->image_title }}"
                            class="h-[350px] w-full object-cover md:h-[500px]">
                    @endif
                    @if($about->image_title || $about->image_description)
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#101827] via-[#101827]/70 to-transparent px-6 pb-7 pt-24 md:px-9 md:pb-10">
                            @if($about->image_title)
                                <h2 class="mb-3 text-2xl font-black leading-relaxed text-white md:text-3xl">
                                    {{ $about->image_title }}
                                </h2>
                            @endif
                            @if($about->image_description)
                                <p class="max-w-lg text-sm leading-8 text-white/85 md:text-base">
                                    {{ $about->image_description }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="absolute -bottom-5 -right-5 z-0 h-24 w-24 rounded-br-[35px] border-[10px] border-[#FB9413]"></div>
            </div>
            <div class="w-full lg:w-1/2" dir="rtl">
                <div class="mb-6 flex items-center gap-3">
                    <span class="h-[3px] w-12 rounded-full bg-[#FB9413]"></span>
                    <span class="text-sm font-bold tracking-wide text-[#FB9413]">
                        درباره ما
                    </span>
                </div>
                <h1 class="mb-7 text-3xl font-black leading-[1.8] text-[#101827] md:text-5xl">
                    {{ $about->title }}
                    <span class="mt-2 block h-2 w-24 rounded-full bg-[#FB9413]"></span>
                </h1>
                <div class="text-justify text-base leading-9 text-gray-600 md:text-lg md:leading-10">
                    {{ $about->description  }}
                </div>
            </div>
        </div>
        <div class="mt-20 flex items-center justify-center gap-3">
            <span class="h-[2px] w-16 bg-gray-200"></span>
            <span class="h-3 w-3 rotate-45 bg-[#FB9413]"></span>
            <span class="h-[2px] w-16 bg-gray-200"></span>
        </div>
    </div>
</section>
@endforeach

@endsection
