    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', ' افزودن پیوست')
    @section('content')
        <div class="text-center mb-4">
        </div>
        <form action="{{ route('classAttachment.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                    <div class="text-center mb-4">
                            <!-- بخش اضافه کردن پیوست‌ها -->
                <div class="w-full lg:col-span-2 mt-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">افزودن پیوست</h2>

                    <div id="attachments-wrapper" class="flex flex-col gap-6">

                        <!-- آیتم پیوست -->
                        <div class="border rounded-xl p-4 bg-[#F9F9F9] shadow-sm attachment-item">

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                                <!-- عنوان -->
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2">عنوان پیوست</label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="p-3 rounded-lg bg-white focus:outline-none text-sm font-medium"
                                        placeholder="عنوان پیوست"
                                        required>
                                </div>

                                <!-- نوع فایل -->
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2">نوع فایل</label>
                                    <select
                                        name="type"
                                        class="p-3 rounded-lg bg-white focus:outline-none text-sm font-medium"
                                        required>
                                        <option value="">انتخاب کنید</option>
                                        <option value="pdf">PDF</option>
                                        <option value="video">ویدیو</option>
                                        <option value="docx">DOCX</option>
                                        <option value="other">سایر</option>
                                    </select>
                                </div>

                                <!-- فایل -->
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2">فایل پیوست</label>
                                    <input
                                        type="file"
                                        name="file_path"
                                        class="p-3 rounded-lg bg-white focus:outline-none text-sm cursor-pointer"
                                        required>
                                </div>

                                <!-- تصویر -->
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2">تصویر پیوست (اختیاری)</label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="p-3 rounded-lg bg-white focus:outline-none text-sm cursor-pointer">
                                </div>
                                <div class="w-full flex flex-col text-center gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="text-sm mb-2">انتخاب کلاس</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-white text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="lesson_class_id" id="lesson_class_id" type="number">
                                        @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <!-- توضیحات بزرگ -->
                                <div class="flex flex-col lg:col-span-2">
                                    <label class="text-sm mb-2">توضیحات پیوست</label>
                                    <textarea
                                        name="description"
                                        rows="4"
                                        class="p-3 rounded-lg bg-white focus:outline-none text-sm font-medium resize-none"
                                        placeholder="توضیحات کامل درباره این پیوست..."></textarea>
                                </div>
                            </div>

                                <!-- دکمه حذف -->
                                {{-- <div class="text-left mt-4">
                                    <button type="button"
                                        onclick="removeAttachment(this)"
                                        class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-700 transition">
                                        حذف پیوست
                                    </button>
                                </div> --}}
                            </div>
                         </div>
                    </div>
                        <div class="w-full text-left mt-3">
                            <button type="submit"
                                class="w-[70px] active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-2 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
