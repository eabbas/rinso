@extends('admin.app.panel')
@section('title')
    ویرایش {{ $product->title }}
@endsection
@section('content')
{{--<section class="2xl:container mx-auto">--}}
{{--    <div class="w-full mx-auto pb-5">--}}
{{--        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">--}}
{{--            <legend class="lg:text-3xl md:text-2xl text-md font-bold text-end text-gray-500 p-5 rounded-full">--}}
{{--     ویرایش اطلاعات محصول--}}
{{--            </legend>--}}
{{--            <form action="{{ route('ecomm_product.update')}}" method="post" enctype='multipart/form-data'--}}
{{--                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">--}}
{{--                @csrf--}}
{{--                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="title">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان--}}
{{--                            </legend>--}}
{{--                            <input type="title" name="title" value="{{$ecomm_product->title}}"--}}
{{--                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <input type="hidden" name="id" value="{{$ecomm_product -> id}}">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="image_path">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm"> عکس --}}
{{--                            </legend>--}}
{{--                            <input type="file" name="image_path" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                   --}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="description">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">توضیحات--}}
{{--                            </legend>--}}
{{--                            <input type="province" name="description" value="{{$ecomm_product->description}}"--}}
{{--                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="price">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">قیمت--}}
{{--                            </legend>--}}
{{--                            <input type="city" name="price" value="{{$ecomm_product ->price}}"--}}
{{--                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="discount">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">تخفیف--}}
{{--                            </legend>--}}
{{--                            <input type="address" name="discount" value="{{$ecomm_product ->discount}}"--}}
{{--                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="ecomm_id">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">فروشگاه --}}
{{--                            </legend>--}}
{{--                             <select class="bg-grey-500" name="ecomm_id" id="ecomm_id"  onchange="getEcommCategories(this,'edit')">--}}
{{--                                    @foreach($user->ecomms as $user_ecomm)--}}
{{--                                       <option value="<?php echo $user_ecomm->id;?>"  @if($ecomm_product->ecomm_id==$user_ecomm->id)--}}
{{--                                          {{"selected"}}--}}
{{--                                         @endif ><?php echo $user_ecomm->title ?></option>--}}
{{--          --}}
{{--                                    @endforeach--}}
{{--                               </select>--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="address">--}}
{{--                            <legend class="p-1 w-20 sm:bg-slate-400 sm:text-white rounded-full flex flex-row justify-center text-sm">دسته بندی --}}
{{--                            </legend>--}}
{{--                             <select class="bg-grey-500" name="ecomm_category_id" id="ecomCategories">--}}
{{--                                    @foreach($ecomm_categories as $ecomm_category)--}}
{{--                                       <option value="<?php echo $ecomm_category->id;?>"  @if($ecomm_product->ecomm_categories[0]->id==$ecomm_category->id)--}}
{{--                                               {{"selected"}}--}}
{{--                                         @endif ><?php echo $ecomm_category->title ?></option>--}}
{{--          --}}
{{--                                    @endforeach--}}
{{--                               </select>--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}

{{--                        <lable class="w-30 text-sm mb-1 mt-2.5 flex">این محصول جز صفحه  اول هست</lable>--}}
{{--                              <input  value="1" type="checkbox" name="show_in_home"    --}}
{{--                              @if ($ecomm_product->show_in_home) {{"checked"}} @endif--}}
{{--                             >--}}
{{--                     </div>--}}
{{--                </div> --}}

{{--                </div> --}}
{{--                    --}}
{{--                   --}}
{{--                   --}}
{{--                <div class="text-center md:px-12 mt-5 lg:mt-10">--}}
{{--                    <button--}}
{{--                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ثبت</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </fieldset>--}}
{{--    </div>--}}
{{--</section>--}}
<h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ویرایش {{ $product->title }}</h1>
<form action="{{ route('ecomm_product.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="ecomm_id" value="{{ $product->ecomm->id }}">
    <div class="min-h-screen flex items-start justify-center">
        <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                    <label class="text-sm mb-1 mt-2.5 flex"> عنوان </label>
                    <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text" name="title"
                               title="title" required placeholder="عنوان را وارد کنید" value="{{ $product->title }}">
                    </div>
                </div>
                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                    <label class="text-sm mb-1 mt-2.5 flex"> تصویر </label>

                    <div
                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                               name="image_path" title="image_path">
                    </div>
                </div>
                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                    <label class="text-sm mb-1 mt-2.5 flex"> گالری </label>
                    <div
                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                               name="gallery[]" title="امکان انتخاب چند مورد" multiple>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                    <label class="text-sm mb-1 mt-2.5 flex">قیمت</label>
                    <div
                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                               name="price" title="قیمت را وارد کنید" placeholder="100000" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                    <label class="text-sm mb-1 mt-2.5 flex">قیمت تخفیف خورده</label>
                    <div
                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                               name="discount" title="قیمت تخفیف خورده را وارد کنید" placeholder="90000" value="{{ $product->discount }}">
                    </div>
                </div>


                    @php
                        $ids = $product->ecomm_categories->pluck('id')->toArray();

                    @endphp

                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                    <label class="text-sm mb-1 mt-2.5 flex"> دسته بندی </label>
                    <select
                            class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                            name="ecomm_category_id" id="ecomCategories">
                        @foreach ($product->ecomm->ecomm_category as $ecomm_category)
                            @if($ecomm_category->title != 'بدون دسته بندی')
                                <option value="{{ $ecomm_category->id }}" @if(in_array($ecomm_category->id, $ids)) selected @endif>{{ $ecomm_category->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex flex-row items-center gap-3 max-md:flex-col max-md:gap-1">
                    <input class="" type="checkbox" name="show_in_home" @if($product->show_in_home == 1) checked @endif value="1">
                    <lable class="text-sm mb-1 mt-2.5 flex">نمایش در صفحه نخست</lable>
                </div>

                <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                    <label class="text-sm mb-1 mt-2.5 flex">توضیحات </label>
                    <div
                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                 <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                           name="description" title="توضیحات را وارد کنید"
                                           placeholder="توضیحات کالا را وارد کنید">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-4 lg:col-span-2" id="attributes">
                    @php
                        $i=0;
                     @endphp
                    @if(json_decode($product->attributes))
                    @foreach(json_decode($product->attributes) as $attribute)
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-4 relative p-3 rounded-md border-1 border-gray-300">
                            <span class="absolute -top-2 -left-2 cursor-pointer" onclick="deleteAttr(this)">❌</span>
                            <input type="text" class="outline-none px-3 lg:px-5 py-1 lg:py-2 border-1 border-gray-200 text-sm rounded-md" value="{{ $attribute->key }}" name="attributes[{{ $i }}][key]" placeholder="نام ویژگی">
                            <input type="text" class="outline-none px-3 lg:px-5 py-1 lg:py-2 border-1 border-gray-200 text-sm rounded-md" value="{{ $attribute->value }}" name="attributes[{{ $i }}][value]" placeholder="مقدار ویژگی">
                        </div>
                        @php $i++ @endphp
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="w-full text-center">
                <button onclick="add()"
                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer"
                        type="button">افزودن ویژگی
                </button>
            </div>
            <div class="w-full text-left">

                <button
                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer"
                        type="submit">ثبت
                </button>
            </div>
        </div>
    </div>
</form>
<script>
    let index = "{{ $i }}";
</script>
<script src="{{ asset('assets/js/ecomm_product.js') }}"></script>
@endsection