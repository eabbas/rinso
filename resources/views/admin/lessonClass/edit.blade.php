    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ویرایش کلاس')
    @section('content')
        <div class="text-center mb-4">
            <h1 class="text-lg font-bold text-gray-800">
                 ویرایش کلاس 
            </h1>
        </div>
        <form action="{{ route('class.update') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{$class->id}}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                            
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>نام کلاس</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="نام کلاس را وارد کنبد" value="{{$class->title}}" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                        type="file" name='image' title="تصویر">
                                        {{-- @if($class->image)
                                    <div class="mt-1 text-sm">تصویر فعلی: <a href="{{ asset('storage/'.$class->image) }}" target="_blank" class="text-blue-600">مشاهده</a></div>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star text-red-400">*</span>انتخاب درس </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="lesson_id" id="lesson_id" type="number" required> 
                                        @foreach ($class->lesson->field->institute->lessons as $lesson)
                                        <option value="{{$lesson->id}}" @if ($class->lesson->id == $lesson->id) {{'selected'}} @endif>{{$lesson->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">انتخاب استاد</label>
                                <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="master_id" id="master_id" type="number">
                                    @if($class->master == NUll)
                                    <option value="">انتخاب کنید</option>  
                                    @foreach ($class->lesson->field->institute->masters as $master)
                                        <option value="{{$master->id}}">{{$master->name}} {{$master->family}}</option>  
                                    @endforeach
                                    @else
                                    @foreach ($class->lesson->field->institute->masters as $master)
                                        <option value="{{$master->id}}" @if ($class->master->id == $master->id) {{'selected'}} @endif>{{$master->name}} {{$master->family}}</option>  
                                    @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='description' placeholder="توضیحات رشته">{{$class->description}}</textarea>
                                </div>
                            </div>
                            {{-- <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تکالیف</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='assignment' placeholder="تکالیف کلاس">{{$class->assignment}}</textarea>
                                </div>
                            </div> --}}
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
