@extends('admin.app.panel')
@section('title', 'نمایش درس')

@section('content')

<div class="w-full py-4 px-3 sm:px-5 md:px-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">

        {{-- هدر پیشرفته با گرادیان --}}
        <div class="relative bg-gradient-to-l from-indigo-800 via-purple-900 to-pink-900 rounded-2xl shadow-xl overflow-hidden mb-6 md:mb-8">
            <div class="absolute inset-0 bg-black/20 z-0"></div>
            <div class="relative z-10 px-5 py-5 md:px-7 md:py-6">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <div class="flex-1">
                        {{-- مسیر (آموزشگاه / رشته) --}}
                        <div class="flex flex-wrap items-center gap-2 text-xs text-white/70 mb-2">
                            <a href="{{ route('institute.single', $lesson->field->institute->id ?? '#') }}" class="hover:text-white transition">
                                آموزشگاه {{ $lesson->field->institute->title ?? '-' }}
                            </a>
                            <span class="text-white/40">›</span>
                            <a href="{{ route('field.single', $lesson->field->id ?? '#') }}" class="hover:text-white transition">
                                رشته {{ $lesson->field->title ?? '-' }}
                            </a>
                        </div>

                        {{-- عنوان درس --}}
                        <h1 class="text-2xl md:text-3xl font-black text-white break-words">
                            درس {{ $lesson->title }}
                        </h1>

                        {{-- قیمت و مدت --}}
                        <div class="flex flex-col sm:flex-row flex-wrap items-start gap-4 mt-3 text-sm text-white/90">
                            <span class="flex items-center gap-1">⏱ {{ $lesson->duration ?? 0 }} ساعت آموزش</span>
                            <div class="flex flex-row gap-2">
                                @if($lesson->price)
                                    <span class="line-through text-white/60"> {{ $lesson->price }} تومان</span>
                                @endif
                                @if($lesson->discount)
                                    <span class="bg-emerald-500/30 px-2 py-1 rounded-full text-emerald-100 font-bold">
                                        {{ $lesson->discount }} تومان
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- دکمه‌های عملیاتی برای ادمین --}}
                    @if(Auth::user()->role[0]->title == 'admin')
                    <div class="flex sm:flex-wrap flex-col gap-2 shrink-0">
                        <a href="{{ route('class.create', [$lesson->field->institute]) }}" 
                           class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center justify-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            ایجاد کلاس
                        </a>
                        <a href="{{ route('lesson.class_list', $lesson) }}" 
                           class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center justify-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            لیست کلاس‌ها
                        </a>
                        {{-- <a href="{{ route('lesson.edit', $lesson) }}" 
                           class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            ویرایش
                        </a> --}}
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- محتوای اصلی: تصویر و اطلاعات --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            {{-- ستون راست: تصویر درس --}}
            <div class="relative group">
                <div class="rounded-xl overflow-hidden shadow-lg border-4 border-white bg-white">
                    @if($lesson->image && Storage::disk('public')->exists($lesson->image))
                                <img src="{{ asset('storage/'.$lesson->image) }}" alt="{{ $lesson->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                            @endif
                        </div>
                        @if(Auth::user()->role[0]->title == 'admin')
                        <a href="{{ route('lesson.edit', $lesson) }}" 
                               class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                ویرایش
                            </a>
                        @endif
            </div>

            {{-- ستون چپ: اطلاعات اصلی درس --}}
            {{-- <div class="bg-white rounded-xl shadow-md p-5 md:p-6 space-y-4 border border-gray-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-semibold">عنوان درس</label>
                        <div class="mt-1 text-gray-800 font-medium">{{ $lesson->title }}</div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-semibold">مدت زمان</label>
                        <div class="mt-1 text-gray-800">{{ $lesson->duration ?? 'نامشخص' }} ساعت</div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-semibold">قیمت اصلی</label>
                        <div class="mt-1 text-gray-800">{{ number_format($lesson->price ?? 0) }} تومان</div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-semibold">قیمت با تخفیف</label>
                        <div class="mt-1 text-emerald-600 font-bold">{{ number_format($lesson->discount_price ?? 0) }} تومان</div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-semibold">رشته</label>
                        <div class="mt-1 text-gray-800">{{ $lesson->field->title ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-semibold">آموزشگاه</label>
                        <div class="mt-1 text-gray-800">{{ $lesson->field->institute->title ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- ویدیو معرفی --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 mb-8"><div class="bg-gradient-to-r from-sky-50 to-white px-5 py-3 border-b">
                <h3 class="flex items-center gap-2 text-base md:text-lg font-bold text-gray-800">
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    ویدیوی معرفی درس
                </h3>
            </div>
            <div class="p-5 md:p-6 flex justify-center">
                @if($lesson->video)
                    <video controls class="w-full lg:w-2/3 rounded-lg shadow-md">
                        <source src="{{ asset('storage/'.$lesson->video) }}" type="video/mp4">
                        مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
                    </video>
                @else
                    <div class="text-center py-8 text-gray-400 italic">
                        <svg class="w-12 h-12 mx-auto mb-2 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        ویدیویی برای این درس ثبت نشده است.
                    </div>
                @endif
            </div>
        </div>

        {{-- توضیحات درس --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 mb-8">
            <div class="bg-gradient-to-r from-indigo-50 to-white px-5 py-3 border-b">
                <h3 class="flex items-center gap-2 text-base md:text-lg font-bold text-gray-800">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    توضیحات درس
                </h3>
            </div>
            <div class="p-5 md:p-6 prose max-w-none text-gray-600 leading-relaxed text-justify">
                {!! nl2br(e($lesson->description ?? 'توضیحی ثبت نشده است.')) !!}
            </div>
        </div>

        {{-- لیست کلاس‌های این درس (فعال شده و بهبود یافته) --}}
        {{-- @if(isset($lesson->lesson_classes) && $lesson->lesson_classes->count())
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    کلاس‌های این درس
                </h2>
                <a href="{{ route('lesson.class_list', $lesson) }}" class="text-indigo-600 text-sm hover:underline">مشاهده همه →</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($lesson->lesson_classes as $class)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    @if($class->image)
                    <img src="{{ asset('storage/'.$class->image) }}" class="w-full h-36 object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $class->title }}">
                    @else
                    <div class="w-full h-36 bg-gray-200 flex items-center justify-center text-gray-400"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800">{{ $class->title }}</h3>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>استاد: 
                                @if($class->teacher)
                                    {{ $class->teacher->name }}
                                @elseif($class->teacher_name)
                                    {{ $class->teacher_name }}
                                @else
                                    نامشخص
                                @endif
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2">{{ Str::limit(strip_tags($class->description ?? ''), 80) }}</p>
                        <a href="{{ route('class.single', $class->id) }}" class="inline-block mt-3 text-indigo-600 text-sm font-medium hover:underline">مشاهده کلاس →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="bg-gray-50 rounded-xl border border-gray-200 p-6 text-center text-gray-400 mb-8">
            <svg class="w-10 h-10 mx-auto mb-2 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            هیچ کلاسی برای این درس ثبت نشده است.
            @if(Auth::user()->role[0]->title == 'admin')
            <div class="mt-3"><a href="{{ route('class.create', [$lesson->field->institute]) }}" class="bg-indigo-600 text-white px-4 py-1.5 rounded-lg text-sm">ایجاد اولین کلاس</a></div>
            @endif
        </div>
        @endif --}}

        {{-- دکمه بازگشت (بر اساس نقش) --}}
        {{-- <div class="flex justify-end pb-4">
            @if(Auth::user()->role[0]->title == 'student')
                <a href="{{ route('institute.myClasses', $lesson->field->institute) }}" 
                   class="inline-flex items-center gap-2 text-gray-600 bg-white hover:bg-gray-100 px-4 py-2 rounded-xl shadow-sm transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    بازگشت به کلاس‌های من
                </a>
            @else
                <a href="{{ route('institute.lesson_list', $lesson->field->institute) }}" 
                   class="inline-flex items-center gap-2 text-gray-600 bg-white hover:bg-gray-100 px-4 py-2 rounded-xl shadow-sm transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    بازگشت به لیست دروس
                </a>
            @endif
        </div> --}}
    </div>
</div>

@endsection