@extends('admin.app.panel')

@section('title')
    ایجاد محصول {{ $page->title }}
@endsection
@section('content')

        <div class="flex items-start justify-center lg:mb-10 mb-5">
            <form action="{{ route('introPro.store', [$page->id]) }}" method="post" enctype="multipart/form-data" class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                @csrf
                <div class="text-center mb-8">
                    <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                </div>
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <div
                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                <input
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                    type="text" name='title' id="title"
                                    placeholder="عنوان محصول" required>
                            </div>
                        </div>
                        <div
                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2.5 flex">دسته محصول</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                                <select
                                        class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md" name='categories[]' id="categories" multiple>
                                    <option value="0" disabled>انتخاب کنید</option>
                                    @foreach($page->introCats as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:gap-1">
                            <label class="text-sm mb-1 mt-2.5 flex">نمایش در خانه</label>
                            <input type="checkbox" name='show_in_home' id="show_in_home">
                        </div>
                        <div
                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2.5 flex">تصویر محصول</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <input
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                    type="file" name='main_image' id="main_image"
                                    placeholder="تصویر محصول">
                            </div>
                        </div>
                        <div
                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="text-sm mb-1 mt-2.5 flex">گالری تصاویر محصول</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">

                            <input
                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                type="file" name='gallery[]' id="gallery"
                                placeholder="گالری تصاویر محصول" multiple>
                            </div>
                        </div>

                        <div
                                class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="text-sm mb-1 mt-2.5 flex">توضیحات محصول</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                <textarea
                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                    name='description' id="description"
                                    placeholder="توضیحات محصول"></textarea>
                            </div>
                        </div>
                        <div
                            class="w-full grid grid-cols-1 lg:grid-cols-2 gap-x-2 gap-y-4 itmes-center lg:col-span-2" id="features">
                        </div>
                    </div>
                    <div class="w-full text-center">
                        <button type="button" onclick="addAttribute()"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            افزودن ویژگی
                        </button>
                    </div>
                    <div class="w-full text-left">
                        <button type="submit" onclick="storeIntroPro(this)"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </form>
        </div>


    <script>
        let features = document.getElementById("features")
        let featuresEdit = document.getElementById("featuresEdit")
        let i = 0
        function addAttribute(){
            let attrBox = document.createElement('div')
            attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
            attrBox.innerHTML = `
        <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key" name="attributes[${i}][key]"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value" name="attributes[${i}][value]"
            type="text"
            placeholder="مقدار ویژگی">

        `
            attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                attrBox.remove();
            });
            features.appendChild(attrBox)
            i++
        }
    </script>
@endsection