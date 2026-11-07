    <style>
        input:focus{
            color:#2196F3;
        } 
    </style>
    @extends('admin.app.panel')
    @section('title', 'آدرس شبکه اجتماعی'  )
    @section('content')
    <form action="{{ route('socialAddress.store') }}" method="post">
        @csrf
            <input type="hidden" name="pages_id" value="{{ $pages->id }}">

        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <!-- هدر -->
                <div class="text-center mb-8">
                    <h1 class="text-lg font-bold text-gray-800">  شبکه اجتماعی</h1>
                </div class="w-full ">
            <div class="md:flex md:flex-col md:w-full md:items-center md:gap-5">
                <div class="md:flex md:flex-col md:w-full">
                         <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3 pb-8">
                            <lable class="p-1 w-40 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">  نام کاربری </lable>
                            <input type="text" name='username' placeholder="نام کاربری"  class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </div>
                </div>
            </div>
         <label for="socialMedia_id">شبکه اجتماعی:</label>
        <select name="socialMedia_id">
            @foreach($socialMedias as $socialMedia)
                <option value="{{$socialMedia->id}}">{{$socialMedia->title}}</option>
            @endforeach
        </select>
                <button type="submit"
                    class="active:bg-[#0080e5] mt-2 w-full bg-[#03A9F4] text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                    ثبت
                </button>
            </div>
        </div>
         </fieldset>

    </form>
    @endsection
