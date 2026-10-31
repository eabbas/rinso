@extends('admin.app.panel')
@section('title', 'ایجاد کیوآر کد')
@section('content')
    <div class="text-center mb-4">
        <h1 class="text-lg font-bold text-gray-800">
            ایجاد کیوآر کد جدید
        </h1>
    </div>
    <form action="{{ route('generalQrCodes.store') }}" method="post">
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label for="link" class="w-30 text-sm mb-1 mt-2.5 flex">لینک کیوآر کد</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input id="link" class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                       type="text"
                                       name='link' placeholder="لینک" title="لینک" required> {{-- pattern="[A-Za-z]*" --}}
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label for="title" class="w-30 text-sm mb-1 mt-2.5 flex">عنوان کیوآر کد</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input type="text" id="title"
                                       class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                       name='title'
                                       placeholder="عنوان کیوآر کد"
                                       title="عنوان کیوآر کد">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label for="description" class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات کیوآر کد</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input type="text" id="description"
                                       class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                       name='description'
                                       placeholder="توضیحات کیوآر کد"
                                       title="توضیحات کیوآر کد">
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