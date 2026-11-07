@extends('admin.app.panel')
@section('title', 'ویرایش محصول ')
@section('content')
<section class="2xl:container mx-auto">
    <div class="w-full mx-auto pb-5">
        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">
            <legend class="lg:text-3xl md:text-2xl text-md font-bold text-end text-gray-500 p-5 rounded-full">
                ویرایش محصول   
            </legend>
            <form action="{{ route('cp.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <input type="hidden" name="id" value="{{$customProduct -> id}}">
                <input type="hidden" name="career_id" value="{{ $customProduct->career->id }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="title" name="title" value="{{$customProduct -> title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                توضیحات</legend>
                            <input type="description" name="description" value="{{$customProduct -> description}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="material_limit">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                حد مواد  </legend>
                            <input type="material_limit" name="material_limit" value="{{$customProduct -> material_limit}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="customProductImage">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عکس
                            </legend>
                            <input type="file" name="customProductImage" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500" value={{ $customProduct->image }}>
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