@extends('admin.app.panel')
@section('title', 'ایجاد سوال')
@section('content')
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ایجاد سوال : {{ $test->title }} </h1>

    <form action="{{ route('mquestion.store', [$test->id]) }}" method="post" enctype='multipart/form-data' id="myForm">
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">

                    <div id="questions">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4 p-2 border-1 border-gray-300 rounded-lg" data-question="1">

                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1 in-fa">سوال 1
                                    <span class="text-red-500">*</span>
                                </label>
                                <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2 titles"
                                              name='question[1][title]' placeholder="متن سوال" id="title"></textarea>
                                </div>
                            </div>

                            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:col-span-2" data-question="1"></div>

                            <div class="w-full lg:col-span-2 lg:flex flex-row items-center justify-end" data-question="1">
                                <button type="button" class="px-4 py-2 w-10/12 mx-auto bg-green-500 text-white text-xs font-bold rounded-md lg:w-30 cursor-pointer lg:col-span-2" onclick="addOption(this)"> گزینه +</button>
                            </div>

                            <div
                                    class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <textarea rows="5" class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name='question[1][description]' placeholder="توضیحات دوره"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:col-span-2 lg:flex flex-row items-center justify-end">
                        <button type="button" class="px-4 py-2 w-10/12 bg-purple-500 text-white text-xs font-bold rounded-md lg:w-30 cursor-pointer lg:col-span-2" onclick="addQuestion()"> سوال +</button>
                    </div>

                    <div class="w-full text-left">
                        <button type="submit" onclick="submitForm(event)"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] btn text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/js/mrChemistry.js') }}"></script>
@endsection
