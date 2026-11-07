@extends('admin.app.panel')
@section('title', 'ویرایش اسلایدر')
@section('content')

    <div class="text-center mb-4">
        <h1 class="text-lg font-bold text-gray-800">
            ایجاد اسلایدر
        </h1>
    </div>
    <form action="{{ route('slider.update') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name ="id" value ="{{ $slider->id }}">
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                    name='title' placeholder="عنوان" value="{{ $slider->title }}">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">آیکون شبکه اجتماعی</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                    type="file" name='slider_img' title="آیکون شبکه اجتماعی">
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-left ">
                        <button type="submit"
                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
