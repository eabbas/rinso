@extends('admin.app.panel') @section('title', 'صفحه تک محصول')
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full">
            <h1 class="text-xl text-center lg:text-start">{{ $ecomm_product->title }}</h1>
            <div
                    class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm"
            >
                <a href="{{ route('home') }}" class="p-2">خانه</a>
                <span>/</span>
                <a href="{{ route('user.profile', [Auth::user()]) }}">پروفایل</a>
            </div>
        </div>

        <div class="flex flex-col border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if(!$ecomm_product->image_path)
                        <img
                                class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                                src="{{asset('assets/img/user.png')}}"
                                alt="ecomm_product logo"
                        />
                    @else

                        <img
                                class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                                src="{{asset('storage/'.$ecomm_product->image_path)}}"
                                alt="ecomm_category image_path"
                        />
                    @endif
                </div>
            </div>
        </div>
        <div class="bg-white mt-4 lg:mt-8">
            <div
                    class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5"
            >
                <div class="flex flex-row justify-between items-center border-b border-gray-200">
                    <h1 class="lg:text-xl mt-5 font-bold pb-3">
                        جزئیات فروشگاه
                    </h1>
                    @if($ecomm_product->menu)
                        <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                            <!-- <a href="{{ route('client.ecomm_productMenu', [$ecomm_product])}}" class="text-sky-700">مشاهده منو</a> -->
                        </div>
                    @endif
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-y-3 lg:gap-y-5 mt-5">
                    <div
                            class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center"
                    >
                        <div
                                class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400"
                        >
                            نام فروشگاه
                        </div>
                        <div
                                class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base"
                        >
                            {{ $ecomm_product->title }}
                        </div>
                    </div>

                    <div
                            class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center"
                    >
                        <div
                                class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400"
                        >
                            توضیحات
                        </div>
                        <div
                                class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base"
                        >
                            {{ $ecomm_product->description }}
                        </div>
                    </div>
                    <div
                            class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center"
                    >
                        <div
                                class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400"
                        >
                            قیمت
                        </div>
                        <div
                                class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base"
                        >
                            {{ number_format($ecomm_product->price) }}
                        </div>
                    </div>
                    <div
                            class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center"
                    >
                        <div
                                class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400"
                        >
                            تخفیف
                        </div>
                        <div
                                class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base"
                        >
                            {{ number_format($ecomm_product->discount) }}
                        </div>
                    </div>
                    <div
                            class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center"
                    >
                        <div
                                class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400"
                        >
                            فروشگاه مربوطه
                        </div>
                        <div
                                class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base"
                        >
                            {{ $ecomm_product->ecomm->title}}
                        </div>
                    </div>
                    <div
                            class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center"
                    >
                        <div
                                class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400"
                        >
                            دسته محصول
                        </div>
                        <?php //dd($ecomm_product->ecomm_categories); ?>
                        @foreach($ecomm_product->ecomm_categories as $ecomm_category)
                            <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                                [{{$ecomm_category->title}}]
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
