@extends('admin.app.panel')
@section('title', 'نمایش آموزشگاه')

@section('content')

<div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    {{-- کارت اصلی --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
        
        {{-- کاور با تصویر --}}
        <div class="relative h-48 md:h-64 lg:h-80 w-full bg-gray-200">
            <img src="{{ asset('storage/' . $institute->cover_img) }}" 
                 class="w-full h-full object-cover" 
                 alt="cover">
            {{-- گرادیانت ملایم روی کاور برای خوانایی بهتر متن‌های روی آن --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            
            {{-- دکمه‌های مدیریت روی کاور (فقط ادمین) --}}
            @if (Auth::user()->role[0]->title == 'admin')
            <div class="absolute top-3 left-3 z-1 flex flex-row gap-2">
                <a href="{{ route('institute.edit', [$institute]) }}" 
                   class="p-2 bg-white/90 backdrop-blur-sm rounded-full shadow-md hover:bg-white transition-all duration-200 group" 
                   title="ویرایش آموزشگاه">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <a href="{{ route('client.loadLink', [$institute]) }}" 
                   class="p-2 bg-white/90 backdrop-blur-sm rounded-full shadow-md hover:bg-white transition-all duration-200 group"
                   title="لینک اشتراک‌گذاری">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                </a>
                <div class="p-2 bg-white/90 backdrop-blur-sm rounded-full shadow-md hover:bg-white transition-all duration-200 cursor-pointer group" 
                     onclick="qrCard('open')" title="QR کد">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 group-hover:text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                </div>
            </div>
            @endif
        </div>

        {{-- بخش لوگو و اطلاعات اصلی --}}
        <div class="relative px-4 sm:px-6 pb-6">
            {{-- لوگو با偏移 منفی --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end -mt-12 sm:mt-2 mb-4">
                <div class="flex flex-col sm:flex-row items-center sm:items-end gap-4 w-full">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $institute->logo) }}" 
                             class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-white shadow-lg object-cover bg-white" alt="logo">
                        @if($parent)
                        <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full whitespace-nowrap">شعبه</span>
                        @endif
                    </div>
                    <div class="text-center sm:text-right">
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">آموزشگاه {{ $institute->title }}</h1>
                        @if($parent)
                            <p class="text-sm text-gray-500 mt-1">شعبه مرکزی: {{ $parent->title }}</p>
                        @else
                            <p class="text-sm text-gray-500 mt-1">شعبه مرکزی</p>
                        @endif
                        <p class="text-sm text-gray-600 mt-1 flex items-center justify-center sm:justify-start gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            {{ $institute->phone }}
                        </p>
                    </div>
                </div>

                {{-- دکمه‌های سریع برای نقش‌های مختلف --}}
                <div class="flex flex-wrap justify-center sm:justify-end gap-2 mt-4 sm:mt-0">
                    {{-- @if (Auth::user()->role[0]->title == 'admin') --}}
                        <a href="{{ route('request.form', [$institute]) }}" 
                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-indigo-500 hover:bg-indigo-600 text-white text-sm rounded-lg transition-all duration-200 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            درخواست همکاری
                        </a>
                        <a href="{{ route('institute.add_master', [$institute]) }}" 
                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-sm rounded-lg transition-all duration-200 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            افزودن استاد
                        </a>
                        <a href="{{ route('institute.create', ['parent_id'=>$institute]) }}" 
                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-sm rounded-lg transition-all duration-200 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2 2H7a2 2 0 00-2 2v14M9 7h6m-6 4h6m-6 4h6" />
                            </svg>
                            افزودن شعبه
                        </a>
                    @if (Auth::user()->role[0]->title == 'student')
<a href="{{ route('institute.myClasses', [$institute]) }}" 
                           class="inline-flex items-center gap-1 px-4 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg transition-all duration-200 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            کلاس‌های من
                        </a>
                    @endif
                </div>
            </div>

            {{-- منوی سریع ادمین (ایجاد رشته، درس، کلاس، لیست درخواست‌ها) --}}
            {{-- @if (Auth::user()->role[0]->title == 'admin') --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-6">
                <a href="{{ route('field.create', [$institute]) }}" 
                   class="flex items-center justify-center gap-2 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 p-3 rounded-xl transition-all duration-200 border border-purple-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                    </svg>
                    <span class="text-sm font-medium text-purple-800">ایجاد رشته</span>
                </a>
                <a href="{{ route('lesson.create', [$institute]) }}" 
                   class="flex items-center justify-center gap-2 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 p-3 rounded-xl transition-all duration-200 border border-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-sm font-medium text-blue-800">ایجاد درس</span>
                </a>
                <a href="{{ route('class.create', [$institute]) }}" 
                   class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 p-3 rounded-xl transition-all duration-200 border border-green-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="text-sm font-medium text-green-800">ایجاد کلاس</span>
                </a>
                <a href="{{ route('request.requests', [$institute]) }}" 
                   class="flex items-center justify-center gap-2 bg-gradient-to-r from-amber-50 to-amber-100 hover:from-amber-100 hover:to-amber-200 p-3 rounded-xl transition-all duration-200 border border-amber-200">
<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="text-sm font-medium text-amber-800">درخواست‌ها</span>
                </a>
            </div>
            {{-- @endif --}}

            {{-- کارت‌های آمار (فقط ادمین) --}}
            {{-- @if (Auth::user()->role[0]->title == 'admin') --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mt-8">
                <a href="{{ route('institute.field_list', [$institute]) }}" 
                   class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-2xl font-bold text-purple-600 group-hover:text-purple-700">{{ $institute->fields->count() }}</p>
                    <p class="text-xs text-gray-500 mt-1">لیست رشته ها</p>
                </a>
                <a href="{{ route('institute.lesson_list', [$institute]) }}" 
                   class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-2xl font-bold text-blue-600 group-hover:text-blue-700">{{ $institute->lessons->count() }}</p>
                    <p class="text-xs text-gray-500 mt-1">لیست دروس</p>
                </a>
                <a href="{{ route('institute.class_list', [$institute]) }}" 
                   class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                   <p class="text-2xl font-bold text-green-600 group-hover:text-green-700">
                    @php $totalLessonClasses = 0; @endphp
                        @foreach($institute->lessons as $lesson)
                            @php $totalLessonClasses += count($lesson->lesson_classes); @endphp
                        @endforeach
                        {{ $totalLessonClasses }}
                   </p>
                    <p class="text-xs text-gray-500 mt-1">لیست کلاس ها</p>
                </a>
                <a href="{{ route('institute.master_list', [$institute]) }}" 
                   class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-2xl font-bold text-amber-600 group-hover:text-amber-700">{{ $institute->masters->count() }}</p>
                    <p class="text-xs text-gray-500 mt-1">لیست اساتید</p>
                </a>
                <a href="{{ route('institute.student_list', [$institute]) }}" 
                   class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-2xl font-bold text-rose-600 group-hover:text-rose-700">{{ $institute->students->count() }}</p>
                    <p class="text-xs text-gray-500 mt-1">لیست دانش آموزان</p>
                </a>
                <a href="{{ route('institute.branch_list', [$institute]) }}" 
                   class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-2xl font-bold text-sky-600 group-hover:text-sky-700">{{ $institute->children->count() }}</p>
                    <p class="text-xs text-gray-500 mt-1">شعب</p>
                </a>
            </div>
            {{-- @endif --}}

            {{-- اطلاعات پایه آموزشگاه --}}
            <div class="mt-8 bg-gray-50 rounded-xl p-5 border border-gray-100">
                <h2 class="font-bold text-gray-800 border-b border-gray-200 pb-2 mb-4 flex items-center gap-2">
<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    اطلاعات آموزشگاه
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                    <div class="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span><span class="font-bold">تلفن:</span> {{ $institute->phone }}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.66 0 3-4 3-9s-1.34-9-3-9m0 18c-1.66 0-3-4-3-9s1.34-9 3-9" />
                        </svg>
                        <span><span class="font-bold">وبسایت:</span> {{ $institute->website }}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <span><span class="font-bold">ایمیل:</span> {{ $institute->email }}</span>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-3 flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span><span class="font-bold">آدرس:</span>
                        {{ $institute->province_city ? $institute->province_city->province->title : '' }},
                                {{ $institute->province_city ? $institute->province_city->title : '' }},
                         {{ $institute->address }}</span>
                    </div>
                </div>
                <div class="mt-4 pt-2 text-gray-700 text-sm border-t border-gray-200 leading-relaxed">
                    {{ $institute->description }}
                </div>
            </div>

            {{-- دکمه بازگشت --}}
            {{-- <div class="flex justify-end mt-6">
                <a href="{{ url()->previous() }}" 
                   class="inline-flex items-center gap-2 px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition-all duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    بازگشت
                </a>
            </div> --}}
        </div>
    </div>
</div>
{{-- در صورت نیاز اسکریپت برای QR (همانند قبل) --}}
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
<script>
    function qrCard(action) {
        // تابع مورد نظر شما
        if(action === 'open') {
            // پیاده‌سازی مربوط به نمایش QR
            alert('نمایش QR کد آموزشگاه');
        }
    }
</script>
@endsection