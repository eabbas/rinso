    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'افزودن استاد')
    @section('content')
    @if(!$class->master)
    <div class="flex flex-col items-center justify-center mt-30 gap-3">
        <div class="text-center mb-4">
            <h1 class="text-lg font-bold text-gray-800">
                  افزودن استاد به درس {{$class->lesson->title}} (کلاس {{$class->title}})
            </h1>
        </div>
        <form action="{{ route('class.master_store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="institute_id" value="{{$class->lesson->field->institute->id}}">
            <input type="hidden" name="id" value="{{$class->id}}">
            <div class="w-[550px] flex items-center justify-center">
                <div class="bg-white flex flex-col items-center justify-center rounded-2xl shadow-md p-3 lg:w-3/4">
                        <div class="w-[300px] lg:grid-cols-2 gap-3 my-4">              
                            <div class="flex flex-col w-full itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 flex flex-col mt-2 mb-3 text-sm font-bold text-gray-700">شماره تلفن</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                        name='phone' placeholder="شماره تلفن استاد را وارد کنید"required>
                                </div>
                                <div class="w-full flex items-center justify-center text-left mt-3">
                                    <button type="submit"
                                    class="w-[70px] active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-2 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                    ثبت
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>
    @elseif($class->master)
    <div class="flex flex-col items-center justify-center mt-30 gap-3">
        <div class="text-center mb-4">
            <h1 class="text-lg font-bold text-gray-800">
                  شما قبلا برای کلاس {{$class->title}} استاد اضافه کرده اید.
            </h1>
        </div>
        <form action="{{ route('class.master_store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{$class->id}}">
            <div class="w-[550px] flex items-center justify-center">
                <div class="bg-white flex flex-col items-center justify-center rounded-2xl shadow-md p-3 lg:w-3/4">
                        <div class="w-[300px] lg:grid-cols-2 gap-3 my-4">      
                            <div >
                                <h2 class="text-sm font-bold text-gray-700">نام استاد : {{$class->master->name}} {{$class->master->family}} </h2>
                            </div>        
                            <div class="flex flex-col w-full itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 flex flex-col mt-4 mb-3 text-sm font-bold text-gray-700">شماره تلفن</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                        name='phone' placeholder="ویرایش شماره تلفن" value="{{$class->master->phoneNumber}}" required>
                                </div>
                                <div class="w-full flex flex-row items-center justify-center text-center gap-2 mt-5">
                                    <button type="submit"
                                    class="w-[70px] active:bg-[#35e500] mt-2 bg-[#35e500] text-white p-2 max-md:p-2 rounded-md hover:bg-green-700 transition duration-200 font-medium cursor-pointer">
                                    ویرایش
                                    </button>
                                   <a href="{{route('class.delete' , [$class])}}" class="w-[70px] active:bg-[#e50800] mt-2 bg-[#e50800] text-white p-2 max-md:p-2 rounded-md hover:bg-red-700 transition duration-200 font-medium cursor-pointer">
                                    حذف
                                   </a>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>
    @endif
    @endsection
