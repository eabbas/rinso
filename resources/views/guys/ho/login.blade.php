<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <title>Document</title>
    <style>
        .bg_color{
            background-image:linear-gradient(140deg, #81bf50 ,  #327032)
        }
    </style>
</head>
<body>
<div class="w-full flex justify-center bg-black">
    <div class="w-full h-dvh block lg:hidden relative overflow-hidden">
        <img src="{{asset('storage/hossein/f473b42c-f3b2-40e7-8ae8-08141f45bd70.png')}}" alt="" class="max-w-100 min-w-100 max-h-187.5 min-h-187.5">
        <div class="absolute z-1 top-37 min-w-175 max-w-175 -left-40">
            <img src="{{asset('storage/hossein/6c162ff9-a58d-4b05-815b-0da9229af00c.png')}}" alt="" class="opacity-70">
        </div>
        <form class="flex flex-col items-center absolute z-2 top-44 w-60 left-18"  method="post">
            @csrf
            <div>
                <img src="{{asset('storage/hossein/82f3f4b4-65a8-4429-ac3a-526a1139c987.png')}}" alt="" class="min-w-35 max-w-35">
            </div>
            <div class="flex flex-col gap-1 w-full items-center text-sm">
                    <span class="">
                        خوش آمدید
                    <span class="text-green-800 text-[1rem]">
                        Mr Shimy
                    </span>
                    به سامانه
                    </span>
                <div class="flex flex-col gap-1 w-full items-center justify-center">
                    <div class="w-11/12 flex rounded-2xl overflow-hidden flex items-center gap-1 border-white border-1">
                        <div class="h-11 bg-[#558458] flex items-center justify-center relative p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 fill-[#83b47e]">
                                <path d="M17.1 220c-12.9 22.3-12.9 49.7 0 72l88.3 152.9c12.9 22.3 36.6 36 62.4 36l176.6 0c25.7 0 49.5-13.7 62.4-36L494.9 292c12.9-22.3 12.9-49.7 0-72L406.6 67.1c-12.9-22.3-36.6-36-62.4-36l-176.6 0c-25.7 0-49.5 13.7-62.4 36L17.1 220z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white absolute">
                                <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                            </svg>
                        </div>
                        <input type="text" name='phoneNumber' placeholder="شماره تلفن" class="p-1 text-sm text-white outline-none">
                    </div>
                    <div class="w-11/12 flex rounded-2xl overflow-hidden flex items-center gap-1 border-white border-1">
                        <div class="h-11 bg-[#558458] flex items-center justify-center relative p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 fill-[#83b47e]">
                                <path d="M17.1 220c-12.9 22.3-12.9 49.7 0 72l88.3 152.9c12.9 22.3 36.6 36 62.4 36l176.6 0c25.7 0 49.5-13.7 62.4-36L494.9 292c12.9-22.3 12.9-49.7 0-72L406.6 67.1c-12.9-22.3-36.6-36-62.4-36l-176.6 0c-25.7 0-49.5 13.7-62.4 36L17.1 220z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white absolute">
                                <path d="M128 128v64H320V128c0-53-43-96-96-96s-96 43-96 96zM96 192V128C96 57.3 153.3 0 224 0s128 57.3 128 128v64h16c44.2 0 80 35.8 80 80V432c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V272c0-44.2 35.8-80 80-80H96zM32 272V432c0 26.5 21.5 48 48 48H368c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48H80c-26.5 0-48 21.5-48 48z"/>
                            </svg>
                        </div>
                        <input type="password" name='password' placeholder="رمز عبور" class="p-2 text-sm text-white outline-none">
                    </div>
                    <div class="flex w-11/12 p-2 justify-between items-center">
                        <a class="text-white text-xs" href="">فراموشی رمز اوبور</a>
                        <div class="flex items-center gap-1">
                            <input type="checkbox" class="mt-.5 w-3" style="accent-color:green;">
                            <label class="text-white text-xs" for="">مرا به خاطر بسپارید</label>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center gap-1 justify-center">
                    <button class="w-11/12 border-white border-1 rounded-2xl p-2 text-sm text-white font-bold bg_color">ورود</button>
                    <div class="flex items-center justify-between w-10/12">
                        <div class="w-38 h-[2px] bg-white"></div>
                        <span class="text-white text-[1.3rem]">یا</span>
                        <div class="w-38 h-[2px] bg-white"></div>
                    </div>
                    <a class="w-11/12 border-white border-1 rounded-2xl p-1.5 text-xl text-white font-bold flex justify-end">
                        <div class="flex justify-between w-15/24 p-1 items-center">
                            <span class="text-sm">ثبت نام</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="size-5 fill-white">
                                <path d="M224 32a96 96 0 1 1 0 192 96 96 0 1 1 0-192zm0 224A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 80h91.4c80 0 145 64.3 146.3 144H32c1.2-79.7 66.2-144 146.3-144zm0-32C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3zM512 304c0 8.8 7.2 16 16 16s16-7.2 16-16V224h80c8.8 0 16-7.2 16-16s-7.2-16-16-16H544V112c0-8.8-7.2-16-16-16s-16 7.2-16 16v80H432c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v80z"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="min-w-389 max-w-389 lg:block hidden relative">
        <img src="{{asset('storage/hossein/8edd4bdf-a986-4ab9-a116-a73ecac30cdf.jfif')}}" alt="">
        <div class="absolute z-1 -top-6 min-w-290 max-w-290 left-45">
            <img src="{{asset('storage/hossein/6c162ff9-a58d-4b05-815b-0da9229af00c.png')}}" alt="" class="opacity-70">
        </div>
        <form class="flex flex-col items-center absolute z-2 top-5 left-142 w-100" method="post">
            @csrf
            <div>
                <img src="{{asset('storage/hossein/82f3f4b4-65a8-4429-ac3a-526a1139c987.png')}}" alt="" class="min-w-80 max-w-80">
            </div>
            <div class="flex flex-col gap-5 w-full items-center">
                    <span class="">
                        خوش آمدید
                    <span class="text-green-800 text-[1.1rem]">
                        Mr Shimy
                    </span>
                    به سامانه
                    </span>
                <div class="flex flex-col gap-2 w-full items-center justify-center">
                    <div class="w-11/12 flex rounded-2xl overflow-hidden flex items-center gap-2 border-white border-1">
                        <div class="h-11 w-6/40 bg-[#558458] flex items-center justify-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-8 fill-[#83b47e]">
                                <path d="M17.1 220c-12.9 22.3-12.9 49.7 0 72l88.3 152.9c12.9 22.3 36.6 36 62.4 36l176.6 0c25.7 0 49.5-13.7 62.4-36L494.9 292c12.9-22.3 12.9-49.7 0-72L406.6 67.1c-12.9-22.3-36.6-36-62.4-36l-176.6 0c-25.7 0-49.5 13.7-62.4 36L17.1 220z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-white absolute">
                                <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                            </svg>
                        </div>
                        <input type="text" name='phoneNumber' placeholder="شماره تلفن" class="p-2 text-sm text-white outline-none">
                    </div>
                    <div class="w-11/12 flex rounded-2xl overflow-hidden flex items-center gap-2 border-white border-1">
                        <div class="h-11 w-6/40 bg-[#558458] flex items-center justify-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-8 fill-[#83b47e]">
                                <path d="M17.1 220c-12.9 22.3-12.9 49.7 0 72l88.3 152.9c12.9 22.3 36.6 36 62.4 36l176.6 0c25.7 0 49.5-13.7 62.4-36L494.9 292c12.9-22.3 12.9-49.7 0-72L406.6 67.1c-12.9-22.3-36.6-36-62.4-36l-176.6 0c-25.7 0-49.5 13.7-62.4 36L17.1 220z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-white absolute">
                                <path d="M128 128v64H320V128c0-53-43-96-96-96s-96 43-96 96zM96 192V128C96 57.3 153.3 0 224 0s128 57.3 128 128v64h16c44.2 0 80 35.8 80 80V432c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V272c0-44.2 35.8-80 80-80H96zM32 272V432c0 26.5 21.5 48 48 48H368c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48H80c-26.5 0-48 21.5-48 48z"/>
                            </svg>
                        </div>
                        <input type="password" name='password' placeholder="رمز عبور" class="p-2 text-sm text-white outline-none">
                    </div>
                    <div class="flex w-11/12 p-2 justify-between items-center">
                        <a class="text-white text-xs" href="">فراموشی رمز اوبور</a>
                        <div class="flex items-center gap-1">
                            <input type="checkbox" class="mt-.5">
                            <label class="text-white text-xs" for="">مرا به خاطر بسپارید</label>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center gap-4 justify-center">
                    <button class="w-11/12 border-white border-1 rounded-2xl p-5 text-xl text-white font-bold bg_color">ورود</button>
                    <div class="flex items-center justify-between w-10/12">
                        <div class="w-38 h-[2px] bg-white"></div>
                        <span class="text-white text-[1.3rem]">یا</span>
                        <div class="w-38 h-[2px] bg-white"></div>
                    </div>
                    <a class="w-11/12 border-white border-1 rounded-2xl p-5 text-xl text-white font-bold flex justify-end">
                        <div class="flex justify-between w-15/24 p-2 items-center">
                            <span>ثبت نام</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="size-7 fill-white">
                                <path d="M224 32a96 96 0 1 1 0 192 96 96 0 1 1 0-192zm0 224A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 80h91.4c80 0 145 64.3 146.3 144H32c1.2-79.7 66.2-144 146.3-144zm0-32C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3zM512 304c0 8.8 7.2 16 16 16s16-7.2 16-16V224h80c8.8 0 16-7.2 16-16s-7.2-16-16-16H544V112c0-8.8-7.2-16-16-16s-16 7.2-16 16v80H432c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v80z"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>