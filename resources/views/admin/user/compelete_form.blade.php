@extends('admin.app.panel')
@section('title', 'تکمیل پروفایل');
@section('content')
    <form action="{{ route('user.save') }}"
        class="w-full bg-white p-5 rounded-lg lg:w-1/2 lg:mx-auto flex flex-col items-center my-6 gap-3" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="w-full flex flex-col gap-3">
            <label>عکس پروفایل</label>
            <div
                class="w-full flex">
                <input class="p-4 w-full text-sm font-bold focus:text-[#056EE9] rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] cursor-pointer" type="file" name="main_image"
                    title="پروفایل خود را وارد کنید">
            </div>
            <label>نام</label>
            <div
                class="w-full flex">
                <input class="p-4 w-full text-sm font-bold focus:text-[#056EE9] rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] cursor-pointer" type="text" name="name"
                    title="اسم خود راواردکنید">
            </div>
            <label>نام خانوادگی</label>
            <div
                class="w-full flex">
                <input class="p-4 w-full text-sm font-bold focus:text-[#056EE9] rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] cursor-pointer" type="text" name="family"
                    title="نام خانوادگی خود را وارد کنید">
            </div>
        </div>
        <div class="w-full flex flex-col gap-3">
            <label>ایمیل</label>
            <div
                class="w-full flex">
                <input class="p-4 w-full text-sm font-bold focus:text-[#056EE9] rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7]" type="email" name="email"
                   placeholder="test@example.com" title="ایمیل خود را وارد کنید">
            </div>
        </div>
        <button class="text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ذخیره</button>
    </form>
@endsection
