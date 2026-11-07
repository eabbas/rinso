@extends('admin.app.panel')
@section('title', 'ویرایش  لینک')
@section('content')
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-bold text-center text-gray-700">ویرایش لینک</h1>
            </div>
            <form action="{{ route('siteLink.update') }}" method="post" enctype='multipart/form-data' class="w-11/12 lg:w-3/4 mx-auto p-5 rounded-lg border">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                    <div class="w-full flex flex-col">
                        <input type="hidden" name ="id" value ="{{$siteLink -> id}}">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] py-1 pr-3">
                            <legend class="p-1 w-20 bg-gray-200 rounded-full flex flex-row justify-center text-sm">آیکون لینک
                            </legend>
                            <input type="file" name="icon_path" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="title">عنوان  لینک :</label>
                        <input type="text" name="title"  value="{{$siteLink -> title}}" class="w-full px-2 py-1 lg:px-2 outline-none border-b" required>
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="address">آدرس  لینک  :</label>
                        <input type="text" name="address"  value="{{$siteLink -> address}}" class="w-full px-2 py-1 lg:px-2 outline-none border-b" required>
                    </div>
                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                    <button class="px-5 py-2 lg:px-10 lg:py-3 border rounded-md transition-all duration-150 hover:bg-gray-400 hover:border-gray-400 hover:text-white">ثبت</button>
                </div>
            </form>
@endsection