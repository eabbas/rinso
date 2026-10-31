    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ویرایش رشته')
    @section('content')
        <div class="text-center mb-4">
            <h1 class="text-lg font-bold text-gray-800">
                 ویرایش رشته 
            </h1>
        </div>
        <form action="{{ route('field.update') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{$field->id}}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                            
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>نام رشته </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="نام رشته را وارد کنید" value="{{$field->title}}" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                        type="file" name='image' title="تصویر"required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">وضعیت رشته</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="status" id="status" type="number">
                                            <option value="0">فعال</option>
                                            <option value="1">غیرفعال</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>آموزشگاه</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    @if(Auth::user()->role[0]->title == 'admin')
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="institute_id" id="institute_id" type="number" required>
                                        @foreach ($institutes as $institute)
                                        <option value="{{$institute->id}}" @if($field->institute->id == $institute->id) {{'selected'}} @endif>{{$institute->title}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='description' placeholder="توضیحات رشته">{{$field->description}}</textarea>
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
