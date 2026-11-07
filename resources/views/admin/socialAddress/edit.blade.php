@extends('admin.app.panel')
@section('title', 'ویرایش شبکه اجتماعی')
@section('content')
    <div class="my-10">
        <h1 class="lg:text-3xl md:text-2xl text-md font-bold text-center text-gray-700">ویرایش شبکه اجتماعی</h1>
    </div>
    
    <form action="{{ route('socialAddress.update') }}" method="post" enctype='multipart/form-data' class="w-11/12 lg:w-3/4 mx-auto p-5 rounded-lg border">
        @csrf
        <input type="hidden" name="id" value="{{ $socialAddress->id }}">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
            <!-- عنوان شبکه اجتماعی -->
            <div class="w-full flex flex-col">
                <label class="text-sm md:text-base mb-2" for="username">عنوان شبکه اجتماعی:</label>
                <input type="text" name="username" value="{{ $socialAddress->username }}" class="w-full px-3 py-2 outline-none border rounded-lg" required>
            </div>
            
            <!-- انتخاب شبکه اجتماعی -->
            <div class="w-full flex flex-col">
                <label class="text-sm md:text-base mb-2" for="socialMedia_id">شبکه اجتماعی:</label>
                <select name="socialMedia_id" class="w-full px-3 py-2 outline-none border rounded-lg">
                    @foreach($socialMedias as $socialMedia)
                        <option value="{{ $socialMedia->id }}" @if($socialMedia->id == $socialAddress->socialMedia_id) selected @endif>
                            {{ $socialMedia->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <!-- دکمه ثبت -->
        <div class="text-center mt-8">
            <button type="submit" class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-150">
                ثبت تغییرات
            </button>
        </div>
    </form>
@endsection