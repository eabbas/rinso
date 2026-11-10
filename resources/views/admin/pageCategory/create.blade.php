@extends('admin.app.panel')
@section('title', 'ایجاد دسته صفحه')
@section('content')
    
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed @if (!session('message')) invisible opacity-0 @endif top-24 left-10 z-999 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500">
                {{ session('message') }}
            </span>
        </div>
    {{-- @endif --}}

    <div class="w-full min-h-screen bg-slate-50 p-4 md:p-8" dir="rtl">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-xl md:text-2xl font-extrabold text-slate-800">
                        ایجاد دسته جدید
                    </h1>
                    <p class="text-sm text-slate-400 mt-2">
                        اطلاعات دسته‌بندی جدید صفحه را وارد کنید.
                    </p>
                </div>
                <a href="{{ url()->previous() }}"
                    class="flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 transition">
                    <span>بازگشت</span>
                    <svg class="size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </a>
            </div>
            <form action="{{ route('pageCategory.store') }}" method="POST"
                class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
                @csrf
                <div class="px-5 md:px-8 py-5 border-b border-slate-100 flex items-center gap-3">
                    <div class="size-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75A2.25 2.25 0 016 4.5h3l2.25 2.25H18A2.25 2.25 0 0120.25 9v8.25A2.25 2.25 0 0118 19.5H6a2.25 2.25 0 01-2.25-2.25V6.75z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-800 text-sm">
                            مشخصات دسته‌بندی
                        </h2>
                        <p class="text-xs text-slate-400 mt-1">
                            فیلدهای موردنیاز را تکمیل کنید
                        </p>
                    </div>
                </div>
                <div class="p-5 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                        <div class="flex flex-col gap-2">
                            <label for="title" class="text-sm font-semibold text-slate-700">
                                عنوان فارسی
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" required placeholder="مثلاً طراحی وب‌سایت" value="{{ @old('title') }}"
                                class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-700 placeholder:text-slate-400 outline-none transition focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            @error('title')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="slug" class="text-sm font-semibold text-slate-700">
                                عنوان انگلیسی
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="slug" id="slug" required dir="ltr"
                                placeholder="e.g. Web Design" value="{{ @old('slug') }}"
                                class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-700 placeholder:text-slate-400 text-left outline-none transition focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            @error('slug')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label for="parent_id" class="text-sm font-semibold text-slate-700">
                                دسته والد
                            </label>
                            <div class="relative">
                                <select name="parent_id" id="parent_id"
                                    class="appearance-none w-full h-12 px-4 pl-10 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-600 outline-none cursor-pointer transition focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="0">بدون دسته والد (دسته اصلی)</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(@old('parent_id')==$category->id) selected @endif>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <svg class="size-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                                </svg>
                            </div>
                            <p class="text-xs text-slate-400">
                                در صورت انتخاب، این دسته به‌عنوان زیرمجموعه دسته والد ایجاد می‌شود.
                            </p>
                        </div>
                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label for="description" class="text-sm font-semibold text-slate-700">
                                توضیحات
                                <span class="text-xs font-normal text-slate-400 mr-1">(اختیاری)</span>
                            </label>
                            <textarea name="description" id="description" rows="5" placeholder="توضیح مختصری درباره این دسته‌بندی بنویسید..."
                                class="w-full p-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-700 placeholder:text-slate-400 outline-none resize-y transition focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">{{ @old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <div
                    class="px-5 md:px-8 py-5 bg-slate-50/80 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-slate-400">
                        <span class="text-red-500">*</span>
                        فیلدهای ستاره‌دار الزامی هستند.
                    </p>
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <button type="reset"
                            class="flex-1 sm:flex-none px-5 py-3 rounded-xl text-sm font-semibold text-slate-500 bg-white border border-slate-200 hover:bg-slate-100 transition">
                            پاک کردن
                        </button>
                        <button type="submit"
                            class="flex-1 sm:flex-none px-7 py-3 rounded-xl text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 active:scale-[0.98] shadow-lg shadow-blue-600/20 transition">
                            ثبت دسته‌بندی
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let model = document.querySelector('.modal')
        if(!model.classList.contains('invisible')){
            setTimeout(() => {
                model.classList.add('invisible', 'opacity-0')
            }, 2000);
        }
    </script>
@endsection
