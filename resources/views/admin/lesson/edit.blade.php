    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ویرایش درس')
    @section('content')
        <div class="text-center mb-4">
            <h1 class="text-lg font-bold text-gray-800">
                 ویرایش درس 
            </h1>
        </div>
        <form action="{{ route('lesson.update') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{$lesson->id}}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                            
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>نام درس</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="عنوان" value="{{$lesson->title}}" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>مدت</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                        name='duration' placeholder="مدت دوره" value="{{$lesson->duration}}" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>قیمت</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='price' placeholder="قیمت" value="{{$lesson->price}}" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تخفیف</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='discount' placeholder="تخفیف دوره" value="{{$lesson->discount}}">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                        type="file" name='image' title="تصویر">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">ویدیو</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                        type="file" name='video' title="ویدیو">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>انتخاب رشته</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="field_id" id="field_id" type="number" required>
                                        @foreach ($lesson->field->institute->fields as $field)
                                        <option value="{{$field->id}}"@if($lesson->field->id == $field->id) {{'selected'}} @endif>{{$field->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='description' placeholder="توضیحات دوره">{{$lesson->description}}</textarea>
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
