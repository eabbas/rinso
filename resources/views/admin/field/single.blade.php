@extends('admin.app.panel')
@section('title', 'نمایش رشته')

@section('content')

<div class="w-full py-4 px-0 sm:px-5 md:px-8"> {{-- کاهش فاصله از بغل در موبایل --}}
    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

        {{-- هدر گرادیانی --}}
        <div class="relative bg-gradient-to-l from-indigo-800 via-purple-900 to-pink-900 px-5 py-5 md:px-8 md:py-6">
            <div class="relative flex flex-col gap-4 z-10">
                {{-- بالای هدر: لینک آموزشگاه و عنوان --}}
                <div class="flex flex-col gap-2">
                    <a href="{{ route('institute.single', $field->institute->id) }}" 
                       class="self-start inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1.5 text-xs font-medium text-white hover:bg-white/30 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        آموزشگاه {{ $field->institute->title }}
                    </a>
                    <h1 class="text-2xl md:text-3xl font-black text-white break-words">
                        {{ $field->title }}
                    </h1>
                </div>

                {{-- ردیف آمار و دکمه‌ها (در موبایل ستونی) --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="flex flex-wrap items-center gap-2 text-white/90 text-xs">
                        {{-- <div class="flex items-center gap-1 bg-black/20 rounded-full px-2.5 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span>{{ $field->lessons->count() ?? 0 }} درس</span>
                        </div> --}}
                        {{-- <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>ثبت: {{ $field->created_at ? $field->created_at->format('Y/m/d') : 'نامشخص' }}</span>
                        </div> --}}
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2">
                        <a href="{{ route('lesson.create', [$field->institute, $field]) }}" 
                           class="inline-flex items-center justify-center gap-2 bg-white text-purple-700 hover:bg-purple-50 font-bold px-4 py-2 rounded-xl shadow-md transition-all text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
</svg>
                            ایجاد درس
                        </a>
                        <a href="{{ route('field.lesson_list', $field) }}" 
                           class="inline-flex items-center justify-center gap-2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-bold px-4 py-2 rounded-xl transition-all text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            لیست دروس
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- تصویر با فاصله‌ی منفی کمتر در موبایل --}}
        <div class="relative group px-4 md:px-7 -mt-4 md:-mt-8"> {{-- کاهش negative margin در موبایل --}}
            <div class="relative rounded-xl md:rounded-2xl overflow-hidden shadow-lg border-4 border-white bg-white">
                @if($field->image && Storage::disk('public')->exists($field->image))
                                <img src="{{ asset('storage/'.$field->image) }}" alt="{{ $field->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                            @endif
                
                <div class="absolute top-2 left-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <a href="{{ route('field.edit', $field) }}" 
                       class="flex items-center gap-1.5 bg-gray-900/70 backdrop-blur-md hover:bg-indigo-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"/>
                        </svg>
                        ویرایش
                    </a>
                </div>
            </div>
        </div>

        {{-- توضیحات --}}
        <div class="px-5 py-6 md:px-8 md:py-8">
            <div class="bg-gray-50/80 rounded-xl p-5 md:p-6 border border-gray-100">
<div class="flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">توضیحات رشته</label>
                </div>
                <div class="text-sm md:text-base text-gray-700 leading-relaxed text-justify break-words">
                    {!! $field->description !!}
                </div>
            </div>
        </div>

        {{-- دکمه بازگشت --}}
        {{-- <div class="px-5 pb-6 md:px-8 md:pb-8 flex justify-end">
            <a href="{{ route('institute.field_list', $field->institute) }}" 
               class="inline-flex items-center gap-1.5 text-gray-500 hover:text-indigo-600 bg-gray-100 hover:bg-indigo-50 px-4 py-2 rounded-xl transition-all text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                بازگشت
            </a>
        </div> --}}
    </div>
</div>

@endsection