@extends('admin.app.panel')
@section('title', 'لیست کیوآر کد ها')
@section('content')
    <div class="flex justify-end w-10/12 mx-auto">
        <a href="{{route('generalQrCodes.create')}}"
           class="px-5 py-1 rounded-sm bg-blue-500 hover:bg-blue-600 text-white text-xs lg:text-base">ایجاد Qrcode
            جدید </a>
    </div>
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-3 mt-5">
        @php
            $i = 0;
        @endphp
        @foreach($qrCodes as $qrCode)
            @php
                $i++;
            @endphp
            <div id="qrCode-{{$qrCode->id}}" class="p-3 w-full flex flex-col items-center gap-3 bg-white">
                <div class="w-full flex flex-row justify-end items-center gap-3">
                    <div class="flex justify-center cursor-pointer" onclick="addForm({{ $qrCode->id }})">
                        <div class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm"
                             title="ویرایش">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('generalQrCodes.delete', [$qrCode]) }}"
                           class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                           title="حذف">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <img class="size-20 mx-auto" src="{{ asset('storage/' . $qrCode->image_path) }}" alt="">
                <span class="bg-red-500 size-7 flex justify-center items-center text-sm rounded-full text-white">{{ $i }}</span>
                <p class="qrCode_title">{{ $qrCode->title }}</p>
                <p class="qrCode_description text-xs text-gray-500">{{ $qrCode->description }}</p>
            </div>
        @endforeach
    </div>
    <div id="editFormOverlay"
         class="w-full lg:w-[calc(100%-265px)] h-dvh bg-black/50 z-9 fixed left-0 top-0 flex justify-center items-center invisible opacity-0 transition-all duration-300">
        <div class="w-3/4 h-100 relative">
            <button class="absolute -left-5 -top-5 size-10 rounded-full bg-gray-300 z-20 flex justify-center items-center cursor-pointer"
                    onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 384 512">
                    <path fill="red"
                          d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path>
                </svg>
            </button>

            <div id="editForm">
                <div class="min-h-screen flex items-start justify-center">
                    <div class="bg-white rounded-2xl shadow-md p-3 w-full">
                        <div class="text-center mb-4">
                            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                    <label for="link" class="w-30 text-sm mb-1 mt-2.5 flex">لینک کیوآر کد</label>
                                    <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input id="link"
                                               class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                               type="text"
                                               name='link' placeholder="لینک" title="لینک" pattern="[A-Za-z]*"
                                               required>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                    <label for="title" class="w-30 text-sm mb-1 mt-2.5 flex">عنوان کیوآر کد</label>
                                    <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input type="text" id="title"
                                               class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                               name='title'
                                               placeholder="عنوان کیوآر کد"
                                               title="عنوان کیوآر کد">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                    <label for="description" class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات کیوآر
                                        کد</label>
                                    <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input type="text" id="description"
                                               class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                               name='description'
                                               placeholder="توضیحات کیوآر کد"
                                               title="توضیحات کیوآر کد">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full text-left">
                                <button type="button" onclick="updateQrCode(this)"
                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                    ثبت
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    const csrfToken = "{{ csrf_token() }}"
    const editRoute = "{{ route('generalQrCodes.edit') }}"
    const updateRoute = "{{ route('generalQrCodes.update') }}"
    const imageAddress = "{{ asset('storage/') }}"
</script>
<script src="{{ asset('assets/js/generalQrCodes.js') }}"></script>