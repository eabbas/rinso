@extends('admin.app.panel')
@section('title', 'ویرایش کاور ولوگو')
@section('content')
    <div class="text-center mb-4">
        <h1 class="text-lg font-bold text-gray-800">
            ویرایش شبکه اجتماعی
        </h1>
    </div>
    <form action="{{ route('pages.update') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name ="id" value ="{{ $pages->id }}">
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">

                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">نام کاربری</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                    name='user_name' id="user_name" placeholder="نام کاربری (انگلیسی)" value="{{ $pages->user_name }}" require dir="ltr">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                    name='title' placeholder="عنوان" value="{{ $pages->title }}">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان فرعی</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                    name='subTitle' placeholder="عنوان فرعی" value="{{ $pages->subTitle }}">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                    type="file" name='logo_path' title="لوگو">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">کاور</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                    type="file" name='cover_path' title="کاور">
                            </div>
                        </div>
                        <div class="w-full flex flex-row-reverse justify-end gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex items-center">فعال</label>
                                <div
                                    class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox"
                                        name='active[]'@if($pages->active == "1") {{ "checked" }}  @endif>
                                </div>
                            </div>
                            <div class="w-full flex flex-row-reverse justify-end gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در صفحه اول</label>
                                <div
                                    class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox"
                                        name='show_in_home[]'@if($pages->show_in_home == "1") {{ "checked" }}  @endif>
                                </div>
                            </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text" name='description'
                                    placeholder="توضیحات">{{ $pages->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-left ">
                        <button type="submit" id="submitBtn"
                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        let submitBtn = document.getElementById('submitBtn')
        let link = "{{ url('/') }}/"
        let user_name = document.getElementById('user_name')
        user_name.addEventListener('keyup', ()=>{
            $.ajax({
                url: link+"api/checkUserNameFromEdit",
                type: "POST",
                dataType: "json",
                data: {
                    'letter': user_name.value,
                    'pageId': "{{ $pages->id }}"
                },
                success: function(response){
                    if(response.flag){
                        user_name.classList.add('border-1')
                        user_name.classList.add('rounded-lg')
                        user_name.classList.remove('border-red-500')
                        user_name.classList.add('border-green-500')
                        submitBtn.classList = 'active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer'
                        submitBtn.disabled = false
                    } else {
                        user_name.classList.add('border-1')
                        user_name.classList.add('rounded-lg')
                        user_name.classList.remove('border-green-500')
                        user_name.classList.add('border-red-500')
                        submitBtn.disabled = true
                        submitBtn.classList = 'active:bg-[#03a9f47a] mt-2 bg-[#03a9f47a] text-white p-3 max-md:p-2 rounded-md hover:bg-[#03a9f47a] transition duration-200 font-medium cursor-no-drop'
                    }
                    if(user_name.value.trim() == ''){
                        user_name.classList.remove('border-1')
                        user_name.classList.remove('rounded-lg')
                        user_name.classList.remove('border-green-500')
                        user_name.classList.remove('border-red-500')
                    }
                },
                error: function(){
                    console.log('error')
                }
            })
        })
    </script>
@endsection
