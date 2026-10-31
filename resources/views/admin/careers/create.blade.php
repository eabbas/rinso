@extends('admin.app.panel')
@section('title', 'ایجاد رستوران')
@section('content')
    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
         id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                 viewBox="0 0 384 512">
                <path
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>

        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    {{-- <div class="w-full flex flex-row justify-end p-3">
        <a href="{{ url()->previous()}}" class="text-xs px-2 py-0.5 rounded-sm bg-gray-500 text-white">بازگشت ←</a>
    </div> --}}
    @if ($user !== Auth::user())
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ایجاد رستوران برای {{ $user->name }}
            {{ $user->family }}</h1>
    @else
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">فرم اطلاعات رستوران</h1>
    @endif
    <form action="{{ route('career.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">لوگو رستوران 
                                <span class="text-red-500">*</span>
                            </label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                       name='logo' title="لوگو رستوران"
                                       id="logo">
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">نام رستوران
                                <span class="text-red-500">*</span>
                            </label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='title' placeholder="نام رستوران خود را وارد کنید" id="title">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">دسته رستوران</label>
                            <div
                                    class="p-3 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex pl-3">
                                <select name="careerCategory"
                                        class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer">
                                    @foreach ($careerCategories as $careerCategory)
                                        <option value="{{ $careerCategory->id }}">{{ $careerCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">تعداد QR کد</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                       name='qr_count' min="0" value="0">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">بنر رستوران 
                                <span class="text-red-500">*</span>
                            </label>

                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                       name="banner" title="بنر رستوران" id="banner">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">شماره تلفن 
                                <span class="text-red-500">*</span>
                            </label>

                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       placeholder="شماره تلفن را وارد کنید"
                                       name="phone" title="شماره تلفن" id="phoneNum">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">استان 
                                <span class="text-red-500">*</span>
                            </label>

                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                        type="text" name='province' placeholder="استان خود را وارد کنید"
                                        onchange="changeCity(this)" required>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">شهر 
                                <span class="text-red-500">*</span>
                            </label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                        type="text" name='city' id="city"
                                        placeholder=" شهرخود را وارد کنید" required>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1">آدرس 
                                <span class="text-red-500">*</span>
                            </label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='address' placeholder=" ادرس رستوران خود را وارد کنید" id="address">
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">ایمیل</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="email"
                                       name='email' placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">اینستاگرام</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='social_medias[instagram]' placeholder="آدرس اینستاگرام">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">تلگرام</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='social_medias[telegram]' placeholder="آدرس تلگرام">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">واتساپ</label>
                            <div
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='social_medias[whatsapp]' placeholder="آدرس واتساپ">
                            </div>
                        </div>
                        <div
                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea rows="5" class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                              type="text"
                                              name='description' placeholder="توضیحات رستوران"
                                              class="w-full px-3 py-1 md:px-2 outline-none text-gray-500"></textarea>
                            </div>
                        </div>
                        @if(in_array(1, $userRoleIds))
                            <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-row max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">فعال</label>
                                <div
                                        class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox" value="1"
                                        name='active'>
                                </div>
                            </div>
                            <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-row max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در صفحه اول</label>
                                <div
                                        class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox" value="1"
                                        name='show_in_home'>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="w-full text-left">
                        <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] btn text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // function disActive(el){
        //     console.log(el.innerHTML)
        //     // let loader = "<div class='size-5 mx-auto border-4 border-white border-t-[#eb3153]/0 rounded-full animate-spin'></div>"
        //     let loader = document.createElement('div')
        //     loader.classList = "size-5 mx-auto border-4 border-white border-t-[#eb3153]/0 rounded-full animate-spin"
        //     el.innerHtml = loader
        //     el.setAttribute('disabled' , true)
        //     el.classList.add('opacity-50')
        //     console.log(el.innerHTML)
        //
        // }
        let city = document.getElementById('city')

        function changeCity(el) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('pc.city') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': el.value
                },
                success: function (datas) {
                    city.innerHTML = ""
                    datas.forEach(data => {
                        let option = document.createElement('option')
                        option.value = data.id
                        option.innerText = data.title
                        city.appendChild(option)
                    });
                },
                error: function () {
                    alert('خطا در دریافت داده')
                }
            })
        }


        let logo = document.getElementById('logo')
        let title = document.getElementById('title')
        let banner = document.getElementById('banner')
        let phoneNum = document.getElementById('phoneNum')
        let address = document.getElementById('address')
        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        // function showText(el) {
        //     if (title.value === '' || logo.value === '' || banner.value === '' || phoneNum.value === '' || address.value === '' || message.value === '') {
        //         element.innerHTML = `
        //                     <span class="text-red-500">!</span>
        //                     <span>لطفا تمام فیلد های ستاره دار را پر کنید.</span>
        //                 `
        //         message.children[0].appendChild(element)
        //         showMessage('open')
        //         setTimeout(() => {
        //             showMessage('close')
        //         }, 2000)
        //     } else {
        //         document.forms[0].submit()
        //         element.innerHTML = `
        //                     <span class="text-red-500">!</span>
        //                     <span>لطفا صبر کنید.</span>
        //                 `
        //         message.children[0].appendChild(element)
        //         showMessage('open')
        //        // el.setAttribute('disabled', true)
        //         el.classList.remove('cursor-pointer')
        //         el.classList.add('cursor-no-drop')
        //         setTimeout(() => {
        //             showMessage('close')
        //         }, 3000)
        //     }
        // }


        // function showMessage(state) {
        //     if (state == 'open') {
        //         message.classList.remove('top-0')
        //         message.classList.remove('opacity-0')
        //         message.classList.remove('invisible')
        //         message.classList.add('top-2/10')
        //     }
        //     if (state == 'close') {
        //         message.classList.remove('top-2/10')
        //         message.classList.add('top-0')
        //         message.classList.add('opacity-0')
        //         message.classList.add('invisible')
        //     }
        // }
    </script>
@endsection
