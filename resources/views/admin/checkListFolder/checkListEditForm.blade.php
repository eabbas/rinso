{{--@extends('admin.app.panel')--}}
{{--@section('title', ' همه رستورانها')--}}
{{--@section('content')--}}
{{--    <main class="bg-gray-100">--}}
{{--        <form action="{{url('/check/list/update')}}" method="post"  class="bg-white border-1 border-zinc-400 rounded-xl flex flex-col gap-5 p-8">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="checkList_id" value="{{$checkList->id}}">--}}
{{--            <label for="" class=" flex flex-col border-1 rounded-lg p-3 m-1">--}}
{{--                <span class="font-bold text-2xl">برنامه نویسی</span>--}}
{{--                <div class="flex items-center justify-center m-3">--}}
{{--                    <span class="w-1/12">ثبت تسک</span>--}}
{{--                    <span class="w-11/12">ثبت توضیحات تسک</span>--}}
{{--                </div>--}}
{{--                <div class="flex flex-row items-center justify-between">--}}
{{--                    <input type="checkbox" value="1" name="programming_time" id="" @if($checkList->programming_time==1) checked @endif class="w-1/12">--}}
{{--                    <input type="text" name="programming_description" id="" placeholder="توضیحات تسک برنامه نویسی  " value="{{$checkList->programming_description}}" class="w-11/12 h-10 outline-none bg-gradient-to-l from-red-400 rounded-lg px-1">--}}
{{--                </div>--}}
{{--            </label>--}}
{{--            <label for="" class=" flex flex-col border-1 rounded-lg p-3 m-1">--}}
{{--                <span class="font-bold text-2xl">زبان انگلیسی</span>--}}
{{--                <div class="flex items-center justify-center m-3">--}}
{{--                    <span class="w-1/12">ثبت تسک</span>--}}
{{--                    <span class="w-11/12">ثبت توضیحات تسک</span>--}}
{{--                </div>--}}
{{--                <div class="flex flex-row items-center justify-between">--}}
{{--                    <input type="checkbox" value="1" name="english_time" id="" @if($checkList->english_time==1) checked @endif class="w-1/12">--}}
{{--                    <input type="text" name="english_description" id="" placeholder="توضیحات تسک زبان انگلیسی" value="{{$checkList->english_description}}" class="w-11/12 h-10 outline-none bg-gradient-to-l from-red-400 rounded-lg px-1">--}}
{{--                </div>--}}
{{--            </label>--}}
{{--            <label for="" class=" flex flex-col border-1 rounded-lg p-3 m-1">--}}
{{--                <span class="font-bold text-2xl">کتاب خوانی</span>--}}
{{--                <div class="flex items-center justify-center m-3">--}}
{{--                    <span class="w-1/12">ثبت تسک</span>--}}
{{--                    <span class="w-11/12">ثبت توضیحات تسک</span>--}}
{{--                </div>--}}
{{--                <div class="flex flex-row items-center justify-between">--}}
{{--                    <input type="checkbox" value="1" name="reading_time" id="" @if($checkList->reading_time==1) checked @endif class="w-1/12">--}}
{{--                    <input type="text" name="reading_description" id="" placeholder="توضیحات تسک کتاب خوانی" value="{{$checkList->reading_description}}" class="w-11/12 h-10 outline-none bg-gradient-to-l from-red-400 rounded-lg px-1">--}}
{{--                </div>--}}
{{--            </label>--}}
{{--            <label for="" class="w-full">--}}
{{--                <input name="description" value="{{$checkList->description}}" id="" class="w-full bg-zinc-200 border-1 border-zinc-300 min-h-30 rounded-md p-2 w-full h-10"  placeholder="توضیحات تکمیلی">--}}
{{--            </label>--}}
{{--            <button class="w-25 h-15 rounded bg-gradient-to-l border-1 hover:from-blue-100 hover:border-blue-200 transition">ثبت</button>--}}
{{--        </form>--}}
{{--    </main>--}}
{{--@endsection--}}



<style>
    input:focus, textarea:focus {
        border-color: #3B82F6;
        box-shadow: 0 0 0 2px rgba(59,130,246,0.1);
        outline: none;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column !important;
            gap: 0.5rem !important;
        }
        .submit-btn {
            width: 100% !important;
        }
        .task-header {
            margin-bottom: 1rem !important;
        }
    }
</style>

@extends('admin.app.panel')
@section('title', 'ویرایش چک لیست')
@section('content')
    <div class="w-full px-4 py-6">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                ویرایش چک لیست
            </h1>
            <p class="text-sm text-gray-400 mt-1">اطلاعات مورد نظر را ویرایش کنید</p>
        </div>

        <form action="{{route('checkList.updateChecklist')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="checkList_id" value="{{$checkList->id}}">

            <div class="max-w-5xl mx-auto">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-6">

                        <!-- Programming Task -->
                        <div class="mb-6 pb-5 border-b border-gray-100">
                            <div class="task-header flex items-center gap-2 mb-4">
                                <div class="w-1.5 h-5 bg-blue-500 rounded-full"></div>
                                <h3 class="text-base font-semibold text-gray-800">برنامه نویسی</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-gray-600 w-24">وضعیت تسک</span>
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500"
                                           @if($checkList->programming_time==1) checked @endif value="1"
                                           name='programming_time'>
                                </div>
                                <div class="md:col-span-2">
                                    <input type="text" name='programming_description'
                                           class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition"
                                           placeholder="توضیحات تسک برنامه نویسی"
                                           value="{{$checkList->programming_description}}">
                                </div>
                            </div>
                        </div>

                        <!-- English Task -->
                        <div class="mb-6 pb-5 border-b border-gray-100">
                            <div class="task-header flex items-center gap-2 mb-4">
                                <div class="w-1.5 h-5 bg-green-500 rounded-full"></div>
                                <h3 class="text-base font-semibold text-gray-800">زبان انگلیسی</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-gray-600 w-24">وضعیت تسک</span>
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500"
                                           @if($checkList->english_time==1) checked @endif value="1"
                                           name='english_time'>
                                </div>
                                <div class="md:col-span-2">
                                    <input type="text" name='english_description'
                                           class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition"
                                           placeholder="توضیحات تسک زبان انگلیسی"
                                           value="{{$checkList->english_description}}">
                                </div>
                            </div>
                        </div>

                        <!-- Reading Task -->
                        <div class="mb-6 pb-5 border-b border-gray-100">
                            <div class="task-header flex items-center gap-2 mb-4">
                                <div class="w-1.5 h-5 bg-purple-500 rounded-full"></div>
                                <h3 class="text-base font-semibold text-gray-800">کتاب خوانی</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-gray-600 w-24">وضعیت تسک</span>
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500"
                                           @if($checkList->reading_time==1) checked @endif value="1"
                                           name='reading_time'>
                                </div>
                                <div class="md:col-span-2">
                                    <input type="text" name='reading_description'
                                           class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition"
                                           placeholder="توضیحات تسک کتاب خوانی"
                                           value="{{$checkList->reading_description}}">
                                </div>
                            </div>
                        </div>

                        <!-- Global Description -->
                        <div class="mt-4">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-1.5 h-5 bg-gray-500 rounded-full"></div>
                                <h3 class="text-base font-semibold text-gray-800">توضیحات کلی</h3>
                            </div>
                            <textarea name='description' rows="4"
                                      class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition resize-none"
                                      placeholder="توضیحات کلی چک لیست">{{$checkList->description}}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6 pt-4">
                            <button type="submit"
                                    class="submit-btn px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition shadow-sm">
                                ذخیره تغییرات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection