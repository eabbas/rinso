    <style>
        input:focus{
            color:#2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ایجاد لینک شبکه اجتماعی'  )
    @section('content')
    <form action="{{ route('siteLink.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
            <input type="hidden" name="pages_id" value="{{ $pages->id }}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <!-- هدر -->
                    <div class="text-center mb-4">
                        <h1 class="text-lg font-bold text-gray-800">ایجاد لینک شبکه اجتماعی</h1>
                    </div class="w-full">
                <div class="md:flex md:flex-col md:w-full md:items-center md:gap-5">
                    <div class="md:flex md:flex-col md:w-full">
                            <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                                <lable class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">  عنوان لینک </lable>
                                <input type="text" name='title' placeholder=" عنوان لینک" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                            </div>
                    </div>
                    <div class="md:flex md:flex-col md:w-full">
                            <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                                <lable class="p-1 w-40 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm"> آدرس  لینک</lable>
                                <input type="text" name='address' placeholder="آدرس"  class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                            </div>
                    </div>
                    <div class="md:flex md:flex-col md:w-full">
                            <div class="flex flex-row items-center mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                                <lable class="p-1 w-40 text-gray-600 rounded-full flex flex-row justify-center text-sm"> آیکون  لینک</lable>
                                <input type="file" name='icon_path'>
                            </div>
                    </div>
                </div>

                <button type="submit"
                    class="active:bg-[#0080e5] mt-2 w-full bg-[#03A9F4] text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                    ثبت
                </button>
            </div>
        </div>
         </fieldset>

    </form>
    @endsection
