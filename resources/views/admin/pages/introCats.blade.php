@extends('admin.app.panel')

@section('title')
    همه دسته های {{ $page->title }}
@endsection
@section('content')
{{--    <div class="w-full h-full pt-5 samim">--}}
{{--        <section>--}}
{{--            <div class="flex flex-row justify-between items-center mt-5 mb-3">--}}
{{--                <h1 class="lg:text-xl text-lg font-bold w-11/12 mx-auto" id="careerCatTitle">--}}
{{--                    همه دسته ها--}}
{{--                </h1>--}}
{{--            </div>--}}
{{--            <div class="grid grid-cols-3 lg:grid-cols-8 px-2">--}}
{{--                @foreach ($page->introCats as $cat)--}}
{{--                    @if(count($cat->products))--}}
{{--                        <div class="relative careers ">--}}
{{--                            <a href="{{ route('introCat.products', [$cat]) }}"--}}
{{--                               class=" w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-4">--}}
{{--                                <div class="w-24 h-24 rounded-full overflow-hidden object-center">--}}
{{--                                    @if ($cat->main_image)--}}
{{--                                        <img class="h-full w-full object-center"--}}
{{--                                             src="{{ asset('storage/'.$cat->main_image) }}" alt="career category avatar">--}}
{{--                                    @else--}}
{{--                                        <img class="h-full w-full object-cover"--}}
{{--                                             src="{{ asset('assets/img/cash-machine.png') }}" alt="career category icon">--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <span class="w-20 text-center text-gray-500 text-sm font-medium">--}}
{{--                            {{ $cat->title }}--}}
{{--                        </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}


    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">

            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست دسته های {{ $page->title }}</h2>

            <form class="flex flex-col gap-5" action="{{ route('introCat.deleteAll') }}" method="post">
                @csrf
                <div class="w-11/12 mx-auto flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-3">
                        <input type="checkbox" id="all" onchange="checkAll()">
                        <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                    </div>
                    <div class="flex justify-center">
                        <button
                                class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                title="حذف">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                      d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div
                        class="w-11/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                    <div
                            class="w-full flex flex-row lg:grid lg:grid-cols-9 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                        <div class="px-1 text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                            <div class="w-10 lg:w-full h-10"></div>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-10 lg:w-full">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">تصویر</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">عنوان</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-30 lg:w-full">تعداد محصول</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-[180px] lg:w-full">عملیات</span>
                        </div>

                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @php
                            $i = 1;
                        @endphp
                  
                            @foreach ($page->introCats as $cat)
                              
                                    <div
                                            class="w-full flex flex-row lg:grid lg:grid-cols-9 items-center divide-x divide-[#f1f1f4]">
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <div class="w-10 lg:w-full">
                                                <input type="checkbox" class="check" name="categories[]" value="{{ $cat->id }}">
                                            </div>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-10 lg:w-full">{{ $i }}</span>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                            <a href="{{ route('introPro.products', [$cat->id]) }}" class="block w-20 lg:w-full">
                                                @if($cat->main_image)
                                                    <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                         src="{{ asset('storage/' . $cat->main_image) }}">
                                                @else
                                                    <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                         src="{{ asset('assets/img/cash-machine.png') }}">
                                                @endif

                                            </a>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                            <a href="{{ route('introPro.products', [$cat->id]) }}"
                                               class="block w-20 lg:w-full introCategories" title="برای مشاهده محصولات کلیک کنید" data-cat-id="{{ $cat->id }}">{{ $cat->title }}</a>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                            <a href="{{ route('introPro.products', [$cat->id]) }}"
                                               class="block w-30 lg:w-full" title="برای مشاهده محصولات کلیک کنید">{{ count($cat->products) }}</a>
                                        </div>


                                        <div class="col-span-2">
                                            <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3 w-[180px] lg:w-full">
                                                <li class="flex justify-center">
                                                    <a href="{{ route('introPro.products', [$cat->id]) }}"
                                                       class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm"
                                                       title="مشاهده محصولات">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                             viewBox="0 0 576 512">
                                                            <path fill="white"
                                                                  d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="flex justify-center">
                                                    <span
                                                       class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                       title="ویرایش" onclick='editIntroCat("{{ $cat->id }}")'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                             viewBox="0 0 512 512">
                                                            <path fill="white"
                                                                  d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="flex justify-center">
                                                    <span
                                                       class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                       title="حذف" onclick='deleteIntroCat("{{ $cat->id }}", this)'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                             viewBox="0 0 448 512">
                                                            <path fill="white"
                                                                  d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                               
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                 
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="fixed w-full h-dvh bg-black/50 backdrop-blur top-0 right-0 invisible opacity-0 transition-all duration-300" id="block">
        <div class="lg:w-[calc(100%-265px)] w-full h-full float-end flex justify-center items-center">
            <div class="w-1/2 bg-white py-5 rounded-lg px-5 opacity-0 scale-95 transition-all duration-300 form" id="editIntroCat">
                <div
                        class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()"
                     class="size-5 cursor-pointer" viewBox="0 0 384 512">
                    <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                </svg>
                <div class="flex items-start justify-center">
                    <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                        <div class="text-center mb-8">
                            <h3 class="lg:text-lg font-bold text-gray-800">ویرایش دسته</h3>
                        </div>
                        <div class="text-center mb-4">
                            <div class="w-full flex flex-col gap-3 my-4">
                                <input type="hidden" id="intCatId">
                                <div
                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان دسته</label>
                                    <div
                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                            <span
                                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                                است!</span>
                                        <input
                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                type="text" name='introCatTitleEdit' id="introCatTitleEdit"
                                                placeholder="عنوان دسته">
                                    </div>
                                    <div
                                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته</label>
                                        <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                    type="file" name='introCatImageEdit' id="introCatImageEdit">
                                        </div>
                                    </div>
                                    <div
                                            class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                                        <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش  در خانه</label>
                                        <input type="checkbox" name='show_in_home_cat_edit' id="show_in_home_cat_edit" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex flex-row justify-between items-center">

                                <button type="submit" onclick="updateIntroCat()"
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
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
    <script>
        let editCategory = document.getElementById('editIntroCat')
        let block = document.getElementById('block')
        let form = document.querySelectorAll('.form')

        let show_in_home_cat_edit = document.getElementById('show_in_home_cat_edit')
        let introCatTitleEdit = document.getElementById('introCatTitleEdit')
        let intCatId = document.getElementById('intCatId')

        function editIntroCat(categoryId){
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            editCategory.classList.remove('opacity-0')
            editCategory.classList.remove('scale-95')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introCat.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'introCatId': categoryId
                },
                success: function(data){
                    if(data.show_in_home){
                        show_in_home_cat_edit.checked = true
                    }
                    intCatId.value = data.id
                    introCatTitleEdit.value = data.title
                },
                error: function(){
                    console.log('error')
                }
            })
        }

        function updateIntroCat(){
            let flag = false
            if (show_in_home_cat_edit.checked){
                flag = true
            }
            let introCategories = document.querySelectorAll('.introCategories')
            let formData = new FormData()
            console.log(introCatImageEdit.files)
            formData.append('category_id', intCatId.value)
            formData.append('title', introCatTitleEdit.value)
            formData.append('show_in_home', flag)
            if(introCatImageEdit.files.length > 0){
                formData.append('image', introCatImageEdit.files[0])
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introCat.update') }}",
                type: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: function(data){
                    console.log(data)
                    introCategories.forEach((element)=>{
                        if(element.getAttribute('data-cat-id') == data.id){
                            element.innerText = data.title
                        }
                    })
                    introCatImageEdit.value = ""
                    closeForm()
                },
                error: function(){
                    console.log(error);

                }
            })
        }

        function deleteIntroCat(catId, el){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introCat.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'category_id': catId
                },
                success: function(data){
                    console.log(data)
                    el.parentElement.parentElement.parentElement.parentElement.remove()
                },
                error: function(){
                    console.log('error')
                }
            })
        }

        function closeForm(){
            introCatTitleEdit.value = ""
            show_in_home_cat_edit.checked = false
            intCatId.value = ""
            form.forEach((item)=>{
                item.classList.add('opacity-0')
                item.classList.add('scale-95')
            })
            block.classList.add('invisible')
            block.classList.add('opacity-0')
        }
    </script>
@endsection