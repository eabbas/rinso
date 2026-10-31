{{--@extends('admin.app.panel')--}}
{{--@section('title', 'ویرایش دسته ')--}}
{{--@section('content')--}}
{{--<?php //dd($ecomm_category->ecomm); ?>--}}
{{--<section class="2xl:container mx-auto">--}}
{{--    <div class="w-full mx-auto pb-5">--}}
{{--        <fieldset class="border-2 rounded-[10px] border-gray-400 ">--}}
{{--            <legend class="lg:text-3xl md:text-2xl text-md font-bold text-end text-gray-500 p-5 rounded-full">--}}
{{--     ویرایش اطلاعات دسته--}}
{{--            </legend>--}}
{{--            <form action="{{ route('ecomm_category.update_ecomm_categories')}}" method="POST" enctype='multipart/form-data'--}}
{{--                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">--}}
{{--                @csrf--}}
{{--                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="title">--}}
{{--                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان--}}
{{--                            </legend>--}}
{{--                            <input type="title" name="title" value="{{$ecomm_category->title}}"--}}
{{--                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <input type="hidden" name="id" value="{{$ecomm_category -> id}}">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="logo">--}}
{{--                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عکس دسته--}}
{{--                            </legend>--}}
{{--                            <input type="file" name="image_path" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                   --}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="description">--}}
{{--                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">توضیحات--}}
{{--                            </legend>--}}
{{--                            <input type="description" name="description" value="{{$ecomm_category->description}}"--}}
{{--                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                   --}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="address">--}}
{{--                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">فروشگاه --}}
{{--                            </legend>--}}
{{--                            <?php //dd($ecomm_category); ?>--}}
{{--                             <select  class="bg-grey-500" name="ecomm_id" id="ecomm_id" onchange="getEcommCategories(this,'edit')">--}}
{{--                                    @foreach($user->ecomms as $user_ecomm)--}}
{{--                                       <option value="<?php echo $user_ecomm->id;?>"  @if($user_ecomm->id==$ecomm->id)--}}
{{--                                          {{"selected"}}--}}
{{--                                         @endif><?php echo $user_ecomm->title ?></option>--}}
{{--                                    @endforeach--}}
{{--                               </select>--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    <div class="w-full flex flex-col">--}}
{{--                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"--}}
{{--                            for="address">--}}
{{--                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">والد دسته --}}
{{--                            </legend>--}}
{{--                             <select class="bg-grey-500" name="parent_id" id="ecomCategories">--}}
{{--                                    @foreach($ecomm->ecomm_category as $ecomm_categore)--}}
{{--                                    @if($ecomm_category!==$ecomm_categore)--}}
{{--                                    @if($ecomm_categore->id!==1)--}}
{{--                                       <option value="<?php echo $ecomm_categore->id;?>"  @if($ecomm_category->parent_id==$ecomm_categore->id)--}}
{{--                                          {{"selected"}}--}}
{{--                                          --}}
{{--                                         @endif><?php echo $ecomm_categore->title ?></option>--}}
{{--                                                  @endif--}}
{{--                                                  @endif--}}
{{--                                    @endforeach--}}
{{--                                    <option value="0" @if(!$ecomm_category->parent_id) {{"selected"}}--}}
{{--                                        @endif>    --}}
{{--                                    بدون والد</option>--}}
{{--                               </select>--}}
{{--                        </fieldset>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                 --}}
{{--                  <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">--}}

{{--                        <lable class="w-30 text-sm mb-1 mt-2.5 flex">این محصول جز صفحه  اول هست</lable>--}}
{{--                              <input  value="1" type="checkbox" name="show_in_home"    --}}
{{--                              @if ($ecomm_category->show_in_home) {{"checked"}} @endif--}}
{{--                             >--}}
{{--                     </div>--}}
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
{{--@endsection--}}


<style>
    input:focus {
        color: #2196F3;
    }

    .selectbox {
        position: relative;
    }

    select {
        border: 1px solid #EEE;
        border-radius: .25rem;
        padding: .5rem 1.5rem .5rem .5rem;
        display: flex;
        background-color: white;
        outline: 0;
        cursor: pointer;
        appearance: none;
    }
</style>
@extends('admin.app.panel')
@section('title')
    ویرایش {{ $ecomm_category->title }}
@endsection
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ویرایش {{ $ecomm_category->title }}</h1>
    <form action ="{{ route('ecomm_category.update_ecomm_categories', [$ecomm_category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex"> عنوان </label>

                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                   name="title" title="عنوان" required placeholder="عنوان دسته را وارد  کنید" value="{{ $ecomm_category->title }}">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex"> تصویر دسته </label>

                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                   name="image_path" title="تصویر دسته را وارد کنید" placholder="تصویر دسته را وارد کنید">
                        </div>
                    </div>


                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex"> فروشگاه : </label>

                        <select
                                class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                                onchange="getEcommCategories(this,'category')" name="ecomm_id" id="ecomm_id">
                            @foreach (Auth::user()->ecomms as $user_ecomm)
                                <option value="{{ $user_ecomm->id }}" @if($user_ecomm->id == $ecomm->id) selected @endif>{{ $user_ecomm->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="selectbox w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                        <label class="text-sm mb-1 mt-2.5 flex">دسته والد</label>
                        <select
                                class="w-full px-4 py-3 bg-linear-to-r from-gray-50 to-white border border-gray-200 rounded-2xl shadow-sm focus:shadow-lg focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-300 cursor-pointer"
                                name="parent_id" id="ecomCategories">
                            <option value="0">بدون والد</option>
                            @foreach ($ecomm->ecomm_category as $category)
                                @if($category->title!=="بدون دسته بندی")
                                    <option value="{{ $category->id }}" @if($category->id == $ecomm_category->id) selected @endif>{{ $category->title }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                    <div class="w-full flex flex-row items-center gap-3 max-md:flex-row max-md:gap-1">

                        <input class="" type="checkbox" name="show_in_home" @if($ecomm_category->show_in_home) checked @endif value="1">
                        <lable class="text-sm mb-1 mt-2.5 flex">نمایش در صفحه نخست</lable>
                    </div>



                    <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                        <label class="text-sm mb-1 mt-2.5 flex">توضیحات</label>

                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                             <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                       name="description" title="توضیحات دسته">{{ $ecomm_category->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="w-full text-left">

                    <button
                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer"
                            type="submit">ثبت</button>
                </div>
            </div>
        </div>
    </form>
@endsection
