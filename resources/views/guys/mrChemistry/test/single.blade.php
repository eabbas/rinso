@extends('admin.app.panel')
@section('title', ' آزمون')
@section('content')
<body class="bg-gradient-to-br from-slate-50 via-white to-indigo-50/30">

<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center p-4 bg-indigo-100 rounded-2xl mb-4 shadow-sm">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h1 class="text-4xl font-black text-slate-800 mb-3">جزئیات آزمون</h1>
            <p class="text-lg text-slate-500">مشاهده و مدیریت اطلاعات آزمون</p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-slate-100">
            <!-- Gradient Header -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 px-8 py-6">
                <div class="flex items-center justify-between lg:flex-row flex-col lg:gap-0 gap-4">
                    <div class="flex items-center gap-3">
                        <div class="bg-white/20 p-2 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">{{$test->title}}</h2>
                    </div>
                    <div class="flex gap-3">
                        <!-- Edit Button -->
                        <a href="{{ route('mtest.edit' , $test->id) }}" class="bg-white/20 hover:bg-white/30 text-white px-5 py-2 rounded-xl font-bold transition-all duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            ویرایش
                        </a>
                        <!-- Delete Button -->
                        <a href="{{ route('mtest.delete' , $test->id) }}" class="bg-red-500/20 hover:bg-red-500/30 text-red-100 px-5 py-2 rounded-xl font-bold transition-all duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            حذف
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 md:p-10">
                <!-- Description Section -->
                <div class="mb-8 pb-8 border-b border-slate-200">

                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        <h3 class="text-lg font-bold text-slate-800">توضیحات آزمون</h3>
                    </div>
                    <p class="text-slate-600 leading-relaxed text-justify">
                        {{$test->description}}
                    </p>
                </div>

                <!-- Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Duration Card -->
                    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-xl p-5 border border-indigo-200">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-indigo-500 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-indigo-600 font-bold">مدت زمان</span>
                        </div>
                        <p class="text-2xl font-black text-indigo-900">{{$test->duration}} ثانیه</p>
                    </div>

                    <!-- Questions Card -->
                    <a href="{{route('mquestion.list' , $test->id)}}" class="bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-xl p-5 border border-purple-200">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-purple-500 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-purple-600 font-bold">تعداد سوالات</span>
                        </div>
                        <p class="text-2xl font-black text-purple-900">{{count($test->questions)}} سوال</p>
                        <p class="text-sm text-purple-600 mt-1">تشریحی و تستی</p>
                    </a>

                    <!-- Level Card -->
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-xl p-5 border border-emerald-200">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-emerald-500 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="text-emerald-600 font-bold">مقتع تحصیلی</span>
                        </div>
                        <p class="text-2xl font-black text-emerald-900">{{$test->base->title}}</p>
                        <p class="text-sm text-emerald-600 mt-1">نیاز به تجربه بالا</p>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-bold text-slate-800">اطلاعات تکمیلی</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="flex justify-between py-2 border-b border-slate-200">
                            <span class="text-slate-500">تاریخ ایجاد:</span>
                            <span class="text-slate-700 font-medium">۱۴۰۳/۰۹/۱۵</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200">
                            <span class="text-slate-500">آخرین بروزرسانی:</span>
                            <span class="text-slate-700 font-medium">۱۴۰۳/۱۰/۰۱</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200">
                            <span class="text-slate-500">وضعیت:</span>
                            <span class="text-emerald-600 font-bold">فعال</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-200">
                            <span class="text-slate-500">تعداد شرکت‌کنندگان:</span>
                            <span class="text-slate-700 font-medium">۱,۲۴۷ نفر</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('mtest.list') }}" class="px-8 py-3 text-slate-600 bg-white hover:bg-slate-50 rounded-xl font-bold transition-all duration-200 border border-slate-200 shadow-sm inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
                بازگشت به لیست آزمون‌ها
            </a>
        </div>

    </div>
</div>

@endsection