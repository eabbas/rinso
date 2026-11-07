@extends('admin.app.panel')
@section('title', 'ویرایش دسته بندی ')
@section('content')
<section class="2xl:container mx-auto">
    <div class="w-full mx-auto pb-5">
        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">
            <legend class="lg:text-3xl md:text-2xl text-md font-bold text-end text-gray-500 p-5 rounded-full">
                ویرایش دسته بندی   
            </legend>
            <form action="{{ route('custmCategory.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <input type="hidden" name="id" value="{{$customCategory -> id}}">
                <input type="hidden" name="custom_pro_id" value="{{ $customCategory->custom_products->id }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="title" name="title" value="{{$customCategory -> title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="required">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="checkbox" name="required" value="{{$customCategory -> required}}" @if($customCategory->required) {{ "checked" }}  @endif
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                حداکثر مقدار مواد</legend>
                            <input type="text" name="max_item_amount" value="{{$customCategory -> max_item_amount}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                </div>
                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ویرایش</button>
                </div>
            </form>
        </fieldset>
    </div>
</section>
@endsection