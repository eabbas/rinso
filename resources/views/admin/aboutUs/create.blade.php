
@extends('admin.app.panel')
@section('title', 'ایجاد درباره ما')
@section('content')

<div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-50"
     id="message">
    <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
             onclick="showMessage('close')" viewBox="0 0 384 512">
            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
        </svg>
        <div id="messageContent"></div>
    </div>
</div>

<div class="text-center mt-5 mb-6">
    <h1 class="text-xl font-bold text-[#101827]">
        ایجاد صفحه درباره ما
    </h1>
    <p class="text-sm text-gray-400 mt-2">
        اطلاعات مربوط به صفحه درباره ما را وارد کنید.
    </p>
</div>

<form action="{{ route('aboutUs.updateOrcreate') }}"
      method="post"
      enctype="multipart/form-data"
      id="form">

    @csrf

    @if($aboutUs)
        <input type="hidden" name="id" value="{{ $aboutUs->id }}">
    @endif

    <div class="min-h-screen flex items-start justify-center">
        <div class="bg-white rounded-2xl shadow-md p-5 md:p-7 w-full lg:w-3/4">

            <!-- اطلاعات اصلی -->
            <div class="flex items-center gap-2 mb-5">
                <span class="w-1.5 h-6 bg-[#FB9413] rounded-full"></span>
                <h2 class="text-[#101827] font-bold text-base">
                    اطلاعات اصلی
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                <!-- عنوان -->
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-sm font-semibold text-gray-700">
                        عنوان
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="عنوان درباره ما را وارد کنید"
                        value="{{ old('title', $aboutUs?->title) }}"
                        class="w-full bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 text-sm text-[#101827] focus:outline-none focus:border-[#FB9413] transition"
                    >
                </div>

                <!-- توضیحات -->
                <div class="flex flex-col gap-2 lg:col-span-2">
                    <label for="description" class="text-sm font-semibold text-gray-700">
                        توضیحات
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        placeholder="توضیحات مربوط به مجموعه را وارد کنید..."
                        class="w-full bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 text-sm text-[#101827] focus:outline-none focus:border-[#FB9413] transition resize-y"
                    >{{ old('description', $aboutUs?->description) }}</textarea>
                </div>

            </div>

            <!-- جداکننده -->
            <div class="border-t border-gray-100 my-8"></div>

            <!-- تصویر اصلی -->
            <div class="flex items-center gap-2 mb-5">
                <span class="w-1.5 h-6 bg-[#FB9413] rounded-full"></span>
                <h2 class="text-[#101827] font-bold text-base">
                    تصویر و محتوای روی تصویر
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                <!-- آپلود تصویر -->
                <div class="flex flex-col gap-2 lg:col-span-2">

                    <label for="image" class="text-sm font-semibold text-gray-700">
                        تصویر اصلی
                    </label>

                    <div class="bg-[#F8F9FB] border border-dashed border-gray-300 rounded-xl p-5">

                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept="image/*"
                            class="w-full text-sm text-gray-500 file:ml-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:bg-[#101827] file:text-white hover:file:bg-[#FB9413] hover:file:text-[#101827] file:transition cursor-pointer"
                            onchange="previewImage(event)"
                        >

                        @if($aboutUs?->image)
                            <img
                                id="imagePreview"
                                src="{{ asset($aboutUs->image) }}"
                                class="mt-4 w-full max-w-md h-52 object-cover rounded-xl"
                                alt="تصویر درباره ما"
                            >
                        @else
                            <img
                                id="imagePreview"
                                class="hidden mt-4 w-full max-w-md h-52 object-cover rounded-xl"
                                alt="پیش نمایش تصویر"
                            >
                        @endif

                    </div>
                </div>

                <!-- عنوان تصویر -->
                <div class="flex flex-col gap-2">
                    <label for="image_title" class="text-sm font-semibold text-gray-700">
                        تایتل عکس
                    </label>

                    <input
                        type="text"
                        name="image_title"
                        id="image_title"
                        placeholder="عنوانی که روی عکس نمایش داده می‌شود"
                        value="{{ old('image_title', $aboutUs?->image_title) }}"
                        class="w-full bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 text-sm text-[#101827] focus:outline-none focus:border-[#FB9413] transition"
                    >
                </div>

                <!-- توضیحات تصویر -->
                <div class="flex flex-col gap-2">
                    <label for="image_description" class="text-sm font-semibold text-gray-700">
                        توضیحات عکس
                    </label>

                    <textarea
                        name="image_description"
                        id="image_description"
                        rows="4"
                        placeholder="توضیحات کوتاهی که روی عکس نمایش داده می‌شود"
                        class="w-full bg-[#F8F9FB] border border-gray-100 rounded-xl p-4 text-sm text-[#101827] focus:outline-none focus:border-[#FB9413] transition resize-y"
                    >{{ old('image_description', $aboutUs?->image_description) }}</textarea>
                </div>

            </div>

            <!-- دکمه ثبت -->
            <div class="flex justify-center mt-8">
                <button
                    type="button"
                    onclick="showText(this)"
                    class="bg-[#FB9413] text-[#101827] px-12 py-3 rounded-xl hover:bg-[#e9870c] transition duration-200 font-bold cursor-pointer"
                >
                    ثبت اطلاعات
                </button>
            </div>

        </div>
    </div>

</form>

<script>

    let message = document.getElementById('message');
    let messageContent = document.getElementById('messageContent');

    function showText(el) {

        let title = document.getElementById('title');

        if (title.value.trim() === '') {

            messageContent.innerHTML = `
                <div class="text-sm font-bold flex items-center justify-center py-4 gap-2">
                    <span class="text-red-500">!</span>
                    <span>لطفا یک عنوان وارد کنید.</span>
                </div>
            `;

            showMessage('open');

            setTimeout(() => {
                showMessage('close');
            }, 2000);

        } else {

            el.disabled = true;
            el.classList.add('cursor-not-allowed', 'opacity-60');

            messageContent.innerHTML = `
                <div class="text-sm font-bold flex items-center justify-center py-4 gap-2">
                    <span class="text-[#FB9413]">!</span>
                    <span>لطفا صبر کنید...</span>
                </div>
            `;

            showMessage('open');

            setTimeout(() => {
                document.getElementById('form').submit();
            }, 300);

        }

    }

    function showMessage(state) {

        if (state === 'open') {
            message.classList.remove('top-0', 'opacity-0', 'invisible');
            message.classList.add('top-2/10');
        }

        if (state === 'close') {
            message.classList.remove('top-2/10');
            message.classList.add('top-0', 'opacity-0', 'invisible');
        }

    }

    function previewImage(event) {

        let preview = document.getElementById('imagePreview');
        let file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }

    }

</script>

@endsection
