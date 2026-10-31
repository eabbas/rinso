@extends('admin.app.panel')
@section('title', 'ویرایش مواد محصول ')
@section('content')
<section class="2xl:container mx-auto">
    <div class="w-full mx-auto pb-5">
        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">
            <legend class="lg:text-3xl md:text-2xl text-md font-bold text-end text-gray-500 p-5 rounded-full">
                ویرایش مواد اولیه محصول   
            </legend>
            <form action="{{ route('cpm.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <input type="hidden" name="id" value="{{$cpm -> id}}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="text" name="title" value="{{$cpm -> title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                توضیحات</legend>
                            <input type="text" name="description" value="{{$cpm -> description}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="price_per_unit">
                            <legend class="p-1 w-25 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                 قیمت بر اساس هر واحد </legend>
                            <input type="text" name="price_per_unit" value="{{$cpm -> price_per_unit}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="required">
                            <legend class="p-1 w-30 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                لزوم   </legend>
                            <input type="checkbox" name="required" value="{{$cpm -> required}}" @if($cpm->required) {{ "checked" }}  @endif
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="order">
                            <legend class="p-1 w-30 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                ترتیب   </legend>
                            <input type="text" name="order" value="{{$cpm -> order}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="max_unit_amount">
                            <legend class="p-1 w-30 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                حداکثر  واحد   </legend>
                            <input type="text" name="max_unit_amount" value="{{$cpm -> max_unit_amount}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="image">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عکس
                            </legend>
                            <input type="file" name="image" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500" value={{ $cpm->image }}>
                        </fieldset>
                    </div>
                </div>
                {{-- @dd($cpm->customCategory->id) --}}
                <input type="hidden" name="custom_product_id" value="{{ $cpm->custom_product->id }}"> 
                <input type="hidden" name="custom_category_id" value="{{ $cpm->customCategory->id }}"> 
                {{-- <select name="custom_product_id">
                    @foreach($customProducts as $customProduct)
                        <option value="{{ $customProduct->id }}" @if($customProduct->id == $cpm->custom_product_id) {{ "selected" }} @endif>{{ $customProduct->title }}</option>
                    @endforeach
                </select>
                <select name="custom_category_id">
                    @foreach($customCategories as $customCategory)
                        <option value="{{ $customCategory->id }}" @if($customCategory->id == $cpm->category_id) {{ "selected" }} @endif>{{ $customCategory->title }}</option>
                    @endforeach
                </select> --}}
                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ویرایش</button>
                </div>
            </form>
        </fieldset>
    </div>
</section>
@endsection