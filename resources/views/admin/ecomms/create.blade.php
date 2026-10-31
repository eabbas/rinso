    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ثبت نام  فروشگاه ')
    @section('content')
     <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">فرم اطلاعات فروشگاه  </h1>
        <form action="{{ route('ecomm.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                             <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نام فروشگاه </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="نام  فروشگاه خود را وارد کنید" required>
                                </div>
                            </div>

                            
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو  فروشگاه</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name='logo' placeholder=" لوگو  فروشگاه خود را وارد کنید" title="لوگو فروشگاهو کار">
                                </div>
                            </div>
                           
                           
                           
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">بنر  فروشگاه </label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name="banner" title="بنر فروشگاهو کار">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                               

                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">استان</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                        name='province' onchange="changeCity(this)" required>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                           
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">شهر</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                        name='city' id="city" required>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='address' placeholder=" ادرس کسب وکار خود را وارد کنید" required>
                                </div>
                            </div>
                            
                            
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">ایمیل</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="email"
                                        name='email' placeholder="email@example.com">
                                </div>
                            </div>
                            
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">اینستاگرام</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[instagram]' placeholder="آدرس شبکه های اجتماعی">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تلگرام</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[telegram]' placeholder="آدرس شبکه های اجتماعی">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">واتساپ</label>
                                <div
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] flex">
                                    <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[whatsapp]' placeholder="آدرس شبکه های اجتماعی">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='description' placeholder="توضیحات فروشگاه "
                                        class="w-full px-3 py-1 md:px-2 outline-none text-gray-500"></textarea>
                                </div>
                            </div>
                             <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-row max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">فعال</label>
                                <div
                                    class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox"
                                        name='active[]'>
                                </div>
                            </div>
                            <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-row max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در صفحه اول</label>
                                <div
                                    class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox"
                                        name='show_in_home[]'>
                                </div>
                            </div>
                        </div>
                        <div class="w-full text-left ">
                            <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                               ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
           <script>
            let city = document.getElementById('city')
            function changeCity(el){
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
                    success: function(datas){
                        city.innerHTML = ""
                        datas.forEach(data => {
                            let option = document.createElement('option')
                            option.value = data.id
                            option.innerText = data.title
                            city.appendChild(option)
                        });
                    },
                    error: function(){
                        alert('خطا در  دریافت داده')
                    }
                })
            }
        </script>
    @endsection
