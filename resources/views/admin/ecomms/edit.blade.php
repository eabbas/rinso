@extends('admin.app.panel')
@section('title')
    ویرایش {{ $ecomm->title }}
@endsection
@section('content')
    <section class="2xl:container mx-auto">

        <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ویرایش فروشگاه</h1>
        <form action="{{ route('ecomm.update') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{ $ecomm->id }}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نام فروشگاه </label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="نام  فروشگاه خود را وارد کنید"
                                        value="{{ $ecomm->title }}">
                                </div>
                            </div>


                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو فروشگاه</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name='logo' placeholder=" لوگو  فروشگاه خود را وارد کنید"
                                        title="لوگو فروشگاهو کار">
                                </div>
                            </div>



                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">بنر فروشگاه </label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name="banner" title="بنر فروشگاهو کار">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">استان</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='province' placeholder="استان خود را وارد کنید" onchange="changeCity(this)" required>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" @if($province->id == $ecomm->province_city->province->id){{ 'selected' }}@endif>{{ $province->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                               <label class="w-30 text-sm mb-1 mt-2.5 flex">شهر</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='city' id="city" placeholder=" شهرخود را وارد کنید"required>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if($city->id == $ecomm->city_id){{ 'selected' }}@endif>{{ $city->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='address' placeholder=" ادرس  فروشگاه خود را وارد کنید"
                                        value="{{ $ecomm->address }}">
                                </div>
                            </div>


                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">ایمیل</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="email"
                                        name='email' placeholder="email@example.com" value="{{ $ecomm->email }}">
                                </div>
                            </div>

                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">اینستاگرام</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[instagram]' placeholder="آدرس شبکه های اجتماعی"
                                        value="{{ $ecomm->social_media->instagram }}">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تلگرام</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[telegram]' placeholder="آدرس شبکه های اجتماعی"
                                        value="{{ $ecomm->social_media->telegram }}">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">واتساپ</label>
                                <div
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] flex">
                                    <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[whatsapp]' placeholder="آدرس شبکه های اجتماعی"
                                        value="{{ $ecomm->social_media->whatsapp }}">
                                </div>
                            </div>
                             <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="text-sm mb-1 mt-2.5 flex">فعال</label>
                                <div
                                    class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox"
                                        name='active[]'@if($ecomm->active == "1") {{ "checked" }}  @endif>
                                </div>
                            </div>
                            <div class="w-full flex flex-rows gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در صفحه اول</label>
                                <div
                                    class="text-[#99A1B7] flex">
                                    <input class="p-1 w-full focus:outline-none text-sm font-bold mr-2" type="checkbox"
                                        name='show_in_home[]'@if($ecomm->show_in_home == "1") {{ "checked" }}  @endif>
                                </div>
                            </div>
                        </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text" name='description'
                                        placeholder="توضیحات فروشگاه " class="w-full px-3 py-1 md:px-2 outline-none text-gray-500">{{ $ecomm->description }}</textarea>
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
        let block = document.getElementById('block')
        let editQr = document.getElementById('editQr')
        let qrId = document.getElementById('id')
        let description = document.getElementById('description')
        let descriptionElement = document.querySelectorAll('.description')

        function addBlock(id) {
            editQr.children[0].classList.remove('hidden')
            editQr.children[0].classList.add('flex')
            editQr.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('qr.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function(data) {
                    editQr.children[0].classList.remove('flex')
                    editQr.children[0].classList.add('hidden')
                    qrId.value = data.id
                    description.value = data.description
                },
                error: function() {
                    alert('خطا در دریافت داده')
                }
            })

            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            editQr.classList.remove('scale-95')
            editQr.classList.remove('opacity-0')
            editQr.classList.remove('invisible')
        }

        function storeQr(e) {
            e.preventDefault();
            editQr.children[0].classList.remove('hidden')
            editQr.children[0].classList.add('flex')
            editQr.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('qr.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': qrId.value,
                    'description': description.value
                },
                success: function(data) {
                    descriptionElement.forEach(element => {
                        if (data.id == element.getAttribute('data-id')) {
                            element.innerText = data.description
                        }
                    });
                    closeForm()
                    console.log(data);
                },
                error: function() {
                    alert('خطا در ارسال داده')
                }
            })

        }

        function removeQr(el, id) {

            loading.classList.remove('invisible')
            loading.classList.remove('opacity-0')
            loading.children[0].children[0].classList.remove('hidden')
            loading.children[0].children[0].classList.add('flex')
            loading.children[0].children[0].innerHTML = `
            <span class="loader"></span>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('qr.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function(data) {
                    closeForm()
                    el.parentElement.parentElement.parentElement.remove()
                    console.log(data)
                },
                error: function() {
                    alert('خطا در ارسال داده')
                }
            })
        }

        let city = document.getElementById('city')
            function changeCity(el){
                city.innerHTML = ""
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
                        datas.forEach(data => {
                            let option = document.createElement('option')
                            option.value = data.id
                            option.innerText = data.title
                            city.appendChild(option)
                        });
                    },
                    error: function(){
                        alert('خطا در دریافت داده')
                    }
                })
            }
    </script>
    <script src="{{ asset('assets/js/qrcode.js') }}"></script>
    @endsection
