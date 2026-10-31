@extends('admin.app.panel')
@section('title', 'مدیریت کلاس')

@section('content')

<div class="w-full py-4 px-0 sm:px-5 md:px-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">

        {{-- هدر پیشرفته با آمار و وضعیت --}}
        <div class="relative bg-gradient-to-br from-indigo-800 via-purple-800 to-pink-700 rounded-2xl shadow-xl overflow-hidden mb-6 md:mb-8">
            <div class="absolute inset-0 bg-black/20 z-0"></div>
            <div class="relative z-10 px-5 py-5 md:px-7 md:py-6">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <div class="flex-1">
                        {{-- رشته و آموزشگاه --}}
                        <div class="flex flex-wrap items-center gap-2 text-xs text-white/70 mb-2">
                            <a href="{{ route('institute.single', [$class->lesson->field->institute->id]) }}" class="hover:text-white transition">
                                آموزشگاه {{ $class->lesson->field->institute->title }}
                            </a>
                            <span class="text-white/40">›</span>
                            <a href="{{ route('lesson.single', [$class->lesson->id]) }}" class="hover:text-white transition">
                                درس {{ $class->lesson->title }}
                            </a>
                            <span class="text-white/40">›</span>
                            <span class="text-white/80">کلاس {{ $class->title }}</span>
                        </div>

                        {{-- عنوان و وضعیت --}}
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <h1 class="text-2xl md:text-3xl font-black text-white">{{ $class->title }}</h1>
                            {{-- @php
                                $status = $class->status ?? 'active';
                                $statusText = ['active' => 'فعال', 'in_progress' => 'در حال برگزاری', 'closed' => 'بسته شده', 'draft' => 'پیش‌نویس'];
                                $statusColor = ['active' => 'bg-emerald-500', 'in_progress' => 'bg-amber-500', 'closed' => 'bg-red-500', 'draft' => 'bg-gray-500'];
                            @endphp
                            <span class="inline-flex items-center gap-1.5 {{ $statusColor[$status] ?? 'bg-gray-500' }} text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                {{ $statusText[$status] ?? 'نامشخص' }}
                            </span> --}}
                        </div>

                        {{-- آمار سریع --}}
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-2 text-center">
                                <div class="text-white/60 text-xs">دانش‌آموز</div>
                                <div class="text-white text-xl font-bold">{{ $class->students_count ?? $class->students->count() ?? 0 }}/{{ $class->capacity ?? 20 }}</div>
                                <div class="w-full h-1 bg-white/30 rounded-full mt-1 overflow-hidden"><div class="bg-emerald-400 h-full rounded-full" style="width: {{ (($class->students_count ?? $class->students->count()) / ($class->capacity ?? 1)) * 100 }}%"></div></div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-2 text-center">
                                <div class="text-white/60 text-xs">جلسات برگزار شده</div>
                                <div class="text-white text-xl font-bold">{{ $class->sessions_completed ?? 8 }}/{{ $class->total_sessions ?? 12 }}</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-2 text-center">
                                <div class="text-white/60 text-xs">میانگین نمرات</div>
                                <div class="text-white text-xl font-bold">{{ $class->avg_grade ?? 17.4 }}</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-2 text-center">
                                <div class="text-white/60 text-xs">حضور</div>
                                <div class="text-white text-xl font-bold">{{ $class->attendance_rate ?? 86 }}%</div>
                            </div>
                        </div>
                    </div>

                    {{-- دکمه‌های عملیاتی (شامل لیست دانش‌آموزان و افزودن استاد) --}}
                    <div class="flex flex-wrap gap-2 mt-4 md:mt-0">
                        {{-- لیست دانش‌آموزان --}}
                        {{-- <a href="{{ route('class.student_list', $class) }}" 
                           class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            لیست دانش‌آموزان
                        </a> --}}
                        {{-- افزودن دانش‌آموز --}}
                        <a href="{{ route('class.add_student', $class) }}" 
                           class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            افزودن دانش‌آموز
                        </a>
                        {{-- افزودن استاد --}}
                        <a href="{{ route('class.add_master', $class) }}" 
                           class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            افزودن استاد
                        </a>
                        {{-- @if(Auth::user()->role[0]->title == 'admin')
                        <a href="{{ route('class.edit', $class) }}" class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            ویرایش
                        </a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- تب‌های اطلاعاتی --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 mb-6">
            <div class="border-b border-gray-200 overflow-x-auto">
                <div class="flex min-w-max md:min-w-0">
                    <button class="tab-button active px-5 py-3 text-sm font-medium text-indigo-600 border-b-2 border-indigo-600" data-tab="info">اطلاعات کلاس</button>
                <a href="{{ route('class.student_list', [$class]) }}" class="tab-button px-5 py-3 text-sm font-medium text-gray-600 hover:border-b-2 border-indigo-600" data-tab="students">دانش‌آموزان</a>
                    <button class="tab-button px-5 py-3 text-sm font-medium text-gray-600" data-tab="assignments">تکالیف</button>
                    <button class="tab-button px-5 py-3 text-sm font-medium text-gray-600" data-tab="comments">نظرات</button>
                </div>
            </div>

            {{-- تب اطلاعات کلاس --}}
            <div id="tab-info" class="tab-content p-5 md:p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- ستون تصویر و اطلاعات جانبی --}}
                    <div class="lg:col-span-1">
                        <div class="rounded-xl overflow-hidden shadow-md mb-4">
                             @if(Auth::user()->role[0]->title == 'admin')
                        <a href="{{ route('class.edit', $class) }}" class="bg-white/20 hover:bg-white/30 text-gray-500 px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            ویرایش
                        </a>
                        @endif
                            @if($class->image && Storage::disk('public')->exists($class->image))
                                <img src="{{ asset('storage/'.$class->image) }}" alt="{{ $class->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400"><svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                            @endif
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                            {{-- شروع و پایان --}}
                            {{-- <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span><strong>شروع:</strong> {{ optional($class->start_date)->format('Y/m/d') ?? 'نامشخص' }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span><strong>پایان:</strong> {{ optional($class->end_date)->format('Y/m/d') ?? 'نامشخص' }}</span>
                            </div> --}}
                            {{-- زمان برگزاری --}}
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span><strong>زمان:</strong> {{ $class->schedule ?? 'شنبه و دوشنبه ۱۵-۱۷' }}</span>
                            </div>
                            {{-- کلاس درس --}}
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <span><strong>کلاس:</strong> {{ $class->title }}</span>
</div>
                            {{-- استاد (با نمایش صحیح) --}}
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <span><strong>استاد:</strong>
                                    {{-- @dd($class->masters) --}}
                                    @if($class->master)
                                        {{ $class->master->name }}  {{ $class->master->family }}
                                    @else
                                        <span class="text-red-500">ثبت نشده</span>
                                        <a href="{{ route('class.add_master', [$class]) }}" class="text-xs text-indigo-500 mr-1">افزودن استاد</a>
                                    @endif
                                </span>
                            </div>
                            {{-- سطح --}}
                            {{-- <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                                <span><strong>سطح:</strong> {{ $class->level ?? 'پیشرفته' }}</span>
                            </div> --}}
                        </div>

                        {{-- کارت اطلاعات تکمیلی استاد (اگر وجود داشته باشد) --}}
                        @if($class->teacher || $class->teacher_name)
                        <div class="bg-indigo-50/50 rounded-xl p-4 border border-indigo-100 mt-4">
                            <h4 class="font-bold text-indigo-800 flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                جزئیات استاد
                            </h4>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div><span class="text-gray-600">نام کامل:</span> {{ $class->teacher->name ?? $class->teacher_name }}</div>
                                <div><span class="text-gray-600">تخصص:</span> {{ $class->teacher->specialty ?? '---' }}</div>
                                <div><span class="text-gray-600">ایمیل:</span> {{ $class->teacher->email ?? '---' }}</div>
                                <div><span class="text-gray-600">تلفن:</span> {{ $class->teacher->phone ?? '---' }}</div>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- ستون توضیحات و تکالیف --}}
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-3">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                توضیحات کلاس
                            </h3>
                            <div class="prose max-w-none text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-xl">
{!! nl2br(e($class->description ?? 'توضیحی ثبت نشده است.')) !!}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-3">
                                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                تکالیف و پروژه‌ها
                            </h3>
                            <div class="prose max-w-none text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-xl">
                                {!! nl2br(e($class->assignment ?? 'تکلیفی ثبت نشده است.')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- تب دانش‌آموزان (با دکمه افزودن) --}}
            <div id="tab-students" class="tab-content hidden p-5 md:p-6">
                {{-- <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-gray-800">لیست دانش‌آموزان کلاس</h3>
                    <a href="{{ route('class.add_student', $class) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1.5 rounded-lg text-sm flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        افزودن دانش‌آموز
                    </a>
                </div> --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr><th class="px-4 py-2 text-right text-xs font-medium text-gray-500">ردیف</th><th class="px-4 py-2 text-right text-xs font-medium text-gray-500">نام و نام خانوادگی</th><th class="px-4 py-2 text-right text-xs font-medium text-gray-500">تلفن</th><th class="px-4 py-2 text-center text-xs font-medium text-gray-500">عملیات</th></tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($class->students ?? [] as $index => $student)
                            <tr><td class="px-4 py-2 text-sm">{{ $index+1 }}</td><td class="px-4 py-2 text-sm font-medium">{{ $student->name }}</td><td class="px-4 py-2 text-sm">{{ $student->phone }}</td><td class="px-4 py-2 text-center"><a href="#" class="text-indigo-600 hover:text-indigo-800 text-xs">مشاهده</a></td></tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-8 text-gray-400">دانش‌آموزی ثبت نشده است</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 flex justify-end"><a href="{{ route('class.student_list', [$class]) }}" class="text-indigo-600 text-sm hover:underline">مدیریت کامل دانش‌آموزان →</a></div>
            </div>

            {{-- تب تکالیف (پیوست‌ها) --}}
            <div id="tab-assignments" class="tab-content hidden p-5 md:p-6">
                <div class="flex justify-between items-center mb-4"><h3 class="text-lg font-bold text-gray-800">پیوست‌های کلاس</h3>@if(Auth::user()->role[0]->title == 'admin')<a href="#" class="bg-sky-600 text-white px-3 py-1.5 rounded-lg text-sm">افزودن پیوست</a>@endif</div>
                <div class="space-y-3">
                    @forelse($class->class_attachments as $attachment)
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 p-3 bg-gray-50 rounded-xl"><div><span class="font-bold">{{ $attachment->title }}</span><span class="text-xs bg-gray-200 px-2 py-0.5 rounded-full mr-2">.{{ $attachment->type }}</span><p class="text-xs text-gray-500 mt-1">{{ $attachment->description }}</p></div><a href="{{ route('course.download', $attachment->id) }}" class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1.5 rounded-lg text-xs">دانلود</a></div>
                    @empty
                    <div class="text-center py-8 text-gray-400">هیچ پیوستی ثبت نشده است</div>
                    @endforelse
                </div>
            </div>

            {{-- تب نظرات --}}
            <div id="tab-comments" class="tab-content hidden p-5 md:p-6">
                <div class="flex justify-between items-center mb-4"><h3 class="text-lg font-bold text-gray-800">نظرات و بازخوردها</h3><a href="{{ route('class.comments', $class) }}" class="text-indigo-600 text-sm">مشاهده همه →</a></div>
                <div class="space-y-4">
                    <div class="bg-gray-50 p-3 rounded-lg"><div class="flex justify-between text-xs text-gray-500"><span>علی رضایی</span><span>۲ روز پیش</span></div><p class="text-sm mt-1">کلاس بسیار مفید بود، ممنون از استاد.</p></div>
                    <div class="bg-gray-50 p-3 rounded-lg"><div class="flex justify-between text-xs text-gray-500"><span>سارا محمدی</span><span>۵ روز پیش</span></div><p class="text-sm mt-1">لطفاً فایل جلسه قبل را بارگذاری کنید.</p></div>
                    <div class="text-center pt-2"><a href="{{ route('class.comments', $class) }}" class="text-indigo-600 text-sm">۴ نظر دیگر ...</a></div>
                </div>
            </div>
        </div>

        {{-- دکمه بازگشت --}}
        {{-- <div class="flex justify-end">
            <a href="{{ route('field.lesson_list', $class->field->id ?? '#') }}" class="inline-flex items-center gap-2 text-gray-600 bg-white hover:bg-gray-100 px-4 py-2 rounded-xl shadow-sm transition text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                بازگشت به لیست دروس
            </a>
        </div> --}}
    </div>
</div>

<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.dataset.tab;
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.getElementById(tab-${tabId}).classList.remove('hidden');
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('text-indigo-600', 'border-indigo-600');
                btn.classList.add('text-gray-600', 'border-transparent');
            });
            button.classList.add('text-indigo-600', 'border-indigo-600');
            button.classList.remove('text-gray-600', 'border-transparent');
        });
    });
</script>
@endsection