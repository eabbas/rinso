@extends('admin.app.panel')
@section('title', 'مشاهده QR کد ها')
@section('content')
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
    <div class="w-full grid grid-cols-1 md:grid-cols-4 xl:grid-cols-8 gap-3 mt-5">
        <?php $i = 1; ?>
        @foreach ($career->qr_codes as $qr_code)
            <div class="p-3 w-full flex flex-col items-center gap-3 bg-white">
                <div class="w-full flex flex-row justify-end items-center gap-3">
                    <div class="flex justify-center cursor-pointer" onclick='addBlock("{{ $qr_code->id }}")'>
                        <div class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm"
                             title="ویرایش">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div onclick='removeQr(this, "{{ $qr_code->id }}")'
                             class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                             title="حذف">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <img class="size-20 mx-auto" src="{{ asset('storage/' . $qr_code->qr_path) }}" alt="">
                <span
                        class="bg-red-500 size-7 flex justify-center items-center text-sm rounded-full text-white">{{ $i }}</span>
                <p class="description" data-id="{{ $qr_code->id }}">{{ $qr_code->description }}</p>
            </div>
                <?php $i++; ?>
        @endforeach
    </div>
    {{-- invisible opacity-0 --}}
    <div class="w-full h-dvh bg-black/70 fixed top-0 right-0 z-9999 transition-all duration-300 invisible opacity-0"
         id="loading">
        <div class="w-full lg:w-[calc(100%-265px)] float-left h-dvh flex justify-center items-center">
            <div class="w-4/12 h-2/6 items-center justify-center hidden rounded-lg"></div>
        </div>
    </div>
    <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 z-9999 transition-all duration-300 invisible opacity-0"
         id="block">

        <div class="w-full lg:w-[calc(100%-265px)] float-left h-dvh flex justify-center items-center relative">

            <div onclick="closeForm()"
                 class="size-8 flex justify-center items-center bg-white absolute top-10 right-10 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer" viewBox="0 0 384 512">
                    <path fill="black"
                          d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>

            <div class="w-11/12 lg:w-2/3 px-3 relative">

                {{-- invisible opacity-0 --}}
                <form action="{{ route('qr.update') }}" method="post" enctype='multipart/form-data'
                      class="w-full bg-white py-5 rounded-lg transition-all duration-300 absolute top-full right-0 invisible opacity-0 scale-95 form px-5 -translate-y-1/2"
                      id="editQr">
                    <div
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                    </div>
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <h2 class="font-medium text-base lg:text-lg">افزودن توضیحات</h2>
                    <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4 mx-auto">
                        <div class="text-center mb-4">
                            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-gray-600 w-full flex">
                                    <input
                                            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 border-1 border-[#99A1B7] rounded-lg"
                                            type="text" name='description' id="description" placeholder="توضیحات">
                                </div>
                            </div>
                            <div class="w-full text-left">
                                <button type="submit" onclick="storeQr(event)"
                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                    ثبت
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                success: function (data) {
                    editQr.children[0].classList.remove('flex')
                    editQr.children[0].classList.add('hidden')
                    qrId.value = data.id
                    description.value = data.description
                },
                error: function () {
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
                success: function (data) {
                    descriptionElement.forEach(element => {
                        if (data.id == element.getAttribute('data-id')) {
                            element.innerText = data.description
                        }
                    });
                    closeForm()
                    console.log(data);
                },
                error: function () {
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
                success: function (data) {
                    closeForm()
                    el.parentElement.parentElement.parentElement.remove()
                    console.log(data)
                },
                error: function () {
                    alert('خطا در ارسال داده')
                }
            })
        }
    </script>
    <script src="{{ asset('assets/js/qrcode.js') }}"></script>
@endsection
