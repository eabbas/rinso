@extends('admin.app.panel')
@section('title', 'ویرایش آزمون')
@section('content')
    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
         id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                 viewBox="0 0 384 512">
                <path
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>

        </div>
    </div>

    <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ویرایش آزمون </h1>

    <form action="{{ route('mtest.update') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <input type="hidden" type="text" name="id" value="{{$test->id}}">
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">عنوان آزمون
                                <span class="text-red-500">*</span>
                            </label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='title' placeholder="عنوان آزمون" id="title" value="{{$test->title}}">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">انتخاب پایه</label>
                            <div
                                    class="p-3 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex pl-3">
                                <select name="educational_base_id"
                                        class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer">
                                    @foreach($educationalBase as $base)
                                        <option value="{{ $base->id }}" @if($test->educational_base_id == $base->id) selected @endif>{{ $base->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-35 text-sm mb-1 mt-2.5 flex flex-row gap-1">مدت آزمون ( ثانیه )
                                <span class="text-red-500">*</span>
                            </label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                       name='duration' placeholder="120" id="duration" value="{{$test->duration}}">
                            </div>
                        </div>

                        <div
                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea rows="5" class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                              type="text"
                                              name='description' placeholder="توضیحات دوره"
                                              value="{{$test->description}}"
                                              class="w-full px-3 py-1 md:px-2 outline-none text-gray-500"></textarea>
                            </div>
                        </div>

                        {{--                        <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-row max-md:gap-1">--}}
                        {{--                            <label class="text-sm mb-1 mt-2.5 flex">فعال</label>--}}
                        {{--                            <div--}}
                        {{--                                    class="text-[#99A1B7] flex">--}}
                        {{--                                <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox" value="1"--}}
                        {{--                                       name='active'>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                    </div>
                    <div class="w-full text-left">
                        <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] btn text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
