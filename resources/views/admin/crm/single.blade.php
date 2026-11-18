
@extends('admin.app.panel')

@section('title', 'جزئیات کسب‌وکار')

@section('content')

@php
    $statusLabels = [
        'new' => 'جدید',
        'pending' => 'در انتظار بررسی',
        'processing' => 'در حال بررسی',
        'contacted' => 'تماس گرفته شده',
        'converted' => 'تبدیل به مشتری',
        'rejected' => 'رد شده',
    ];

    $statusColors = [
        'new' => 'bg-blue-50 text-blue-700 border-blue-100',
        'pending' => 'bg-amber-50 text-amber-700 border-amber-100',
        'processing' => 'bg-violet-50 text-violet-700 border-violet-100',
        'contacted' => 'bg-cyan-50 text-cyan-700 border-cyan-100',
        'converted' => 'bg-green-50 text-green-700 border-green-100',
        'rejected' => 'bg-red-50 text-red-700 border-red-100',
    ];

    $socialLabels = [
        'telegram' => 'تلگرام',
        'instagram' => 'اینستاگرام',
        'eitaa' => 'ایتا',
        'rubika' => 'روبیکا',
        'bale' => 'بله',
        'linkedin' => 'لینکدین',
    ];

    $status = $lead->status ?? 'new';

    $statusLabel = $statusLabels[$status] ?? $status;
    $statusColor = $statusColors[$status] ?? 'bg-gray-100 text-gray-600 border-gray-200';
    
    $fullName = trim(($lead->first_name ?? '') . ' ' . ($lead->last_name ?? ''));
@endphp


<div class="w-full space-y-6">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div class="flex items-start gap-3">

            <a href="{{ route('business-leads.index') }}"
               class="w-10 h-10 shrink-0 flex items-center justify-center rounded-xl bg-white border border-gray-200 text-gray-500 hover:text-[#FF9D16] hover:border-[#FF9D16] transition">

                <svg width="20" height="20" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m15 18-6-6 6-6"/>
                </svg>

            </a>

            <div>
                <h1 class="text-xl font-bold text-[var(--light-theme-text-color)]">
                    پرونده کسب‌وکار
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    مشاهده و بررسی اطلاعات ثبت‌شده
                </p>
            </div>

        </div>

        <div class="flex items-center gap-2">

            <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl border text-xs font-bold {{ $statusColor }}">
                <span class="w-2 h-2 rounded-full bg-current"></span>
                {{ $statusLabel }}
            </span>

            <span class="text-xs text-gray-400">
                کد پرونده: #{{ $lead->id }}
            </span>

        </div>

    </div>


    {{-- Profile Overview --}}
    <div class="relative overflow-hidden rounded-2xl bg-[#101F38] p-5 sm:p-7 text-white">

        <div class="absolute -left-10 -top-16 w-56 h-56 rounded-full border-[35px] border-white/5"></div>
        <div class="absolute -left-2 -bottom-24 w-48 h-48 rounded-full bg-[#FF9D16]/10"></div>

        <div class="relative flex flex-col md:flex-row md:items-center gap-5">

            <div class="w-16 h-16 shrink-0 rounded-2xl bg-white/10 border border-white/10 flex items-center justify-center text-2xl font-bold text-[#FFB13B]">
                {{ mb_substr($fullName ?: '؟', 0, 1) }}
            </div>

            <div class="flex-1 min-w-0">

                <h2 class="text-xl font-bold">
                    {{ $fullName ?: 'نام ثبت نشده' }}
                </h2>

                <p class="text-sm text-white/60 mt-2">
                    {{ $lead->job_title ?: 'عنوان شغلی ثبت نشده' }}
                </p>

                <div class="flex flex-wrap items-center gap-x-5 gap-y-2 mt-4 text-sm text-white/75">

                    @if($lead->phone)
                        <span class="flex items-center gap-2 in-fa" dir="ltr">
                            {{ $lead->phone }}

                            <svg width="16" height="16" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.96.35 1.9.69 2.8a2 2 0 0 1-.45 2.11L8.08 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.69A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                    @endif

                    <span class="flex items-center gap-2 in-fa">
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <path d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>

                        ثبت:
                        {{ $lead->date ?? '---' }}
                    </span>

                </div>

            </div>

            <div class="md:text-left">
                <span class="text-xs text-white/50 block mb-2">
                    آخرین بروزرسانی
                </span>

                <span class="text-sm font-medium in-fa" dir="ltr">
                    {{ $lead->update ?? '---' }}
                </span>
            </div>

        </div>

    </div>


    {{-- Personal Information --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    اطلاعات فردی
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    مشخصات و اطلاعات تماس
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 p-5">

            <div>
                <p class="text-xs text-gray-400 mb-2">نام</p>
                <p class="text-sm font-medium text-gray-800">{{ $lead->first_name ?: 'ثبت نشده' }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 mb-2">نام خانوادگی</p>
                <p class="text-sm font-medium text-gray-800">{{ $lead->last_name ?: 'ثبت نشده' }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 mb-2">شماره تلفن</p>
                <p class="text-sm font-medium text-gray-800 in-fa">
                    {{ $lead->phone ?: 'ثبت نشده' }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-400 mb-2">تاریخ تولد</p>
                <p class="text-sm font-medium text-gray-800 in-fa">{{ $lead->birthDate ?: 'ثبت نشده' }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400 mb-2">عنوان شغلی</p>
                <p class="text-sm font-medium text-gray-800">{{ $lead->job_title ?: 'ثبت نشده' }}</p>
            </div>

        </div>

    </div>


    {{-- Business Information --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/>
                    <path d="M9 9v.01M9 12v.01M9 15v.01M9 18v.01"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    اطلاعات کسب‌وکار
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    مشخصات فعالیت و بسترهای فروش
                </p>
            </div>

        </div>

        <div class="p-5 space-y-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                <div>
                    <p class="text-xs text-gray-400 mb-2">سابقه فعالیت</p>
                    <p class="text-sm font-medium text-gray-800 in-fa">
                        {{ $lead->business_age ?: 'ثبت نشده' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2">مغازه فیزیکی</p>
                    <p class="text-sm font-medium text-gray-800">
                        @if($lead->has_store === null)
                            مشخص نشده
                        @else
                            {{ $lead->has_store ? 'دارد' : 'ندارد' }}
                        @endif
                    </p>
                </div>

                <div>
                    <p class="text-xs text-gray-400 mb-2">وب‌سایت</p>
                    <p class="text-sm font-medium text-gray-800">
                        @if($lead->has_website === null)
                            مشخص نشده
                        @else
                            {{ $lead->has_website ? 'دارد' : 'ندارد' }}
                        @endif
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">

                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2 h-2 rounded-full bg-[#FF9D16]"></span>
                        <h4 class="text-sm font-bold text-gray-700">
                            فروشگاه فیزیکی
                        </h4>
                    </div>

                    <p class="text-xs text-gray-400 mb-2">آدرس فروشگاه</p>

                    <p class="text-sm text-gray-700 leading-7 in-fa">
                        {{ $lead->store_address ?: 'آدرسی ثبت نشده است.' }}
                    </p>

                </div>

                <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">

                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                        <h4 class="text-sm font-bold text-gray-700">
                            وب‌سایت
                        </h4>
                    </div>

                    <p class="text-xs text-gray-400 mb-2">آدرس وب‌سایت</p>

                    @if($lead->website_url)
                        <a href="{{ \Illuminate\Support\Str::startsWith($lead->website_url, ['http://', 'https://']) ? $lead->website_url : 'https://' . $lead->website_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           dir="ltr"
                           class="text-sm text-blue-600 hover:underline break-all inline-block">
                            {{ $lead->website_url }}
                        </a>
                    @else
                        <p class="text-sm text-gray-700">آدرسی ثبت نشده است.</p>
                    @endif

                    <div class="mt-4">
                        <p class="text-xs text-gray-400 mb-2">مدت فعالیت وب‌سایت</p>
                        <p class="text-sm text-gray-700 in-fa">
                            {{ $lead->website_age ?: 'ثبت نشده' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Social Networks --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M8 12h8M12 8v8"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    شبکه‌های اجتماعی
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    آدرس صفحات و راه‌های ارتباطی
                </p>
            </div>

        </div>

        <div class="p-5">

            @if($lead->socials->count())

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">

                    @foreach($lead->socials as $social)

                        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">

                            <p class="text-xs text-gray-400 mb-2">
                                {{ $socialLabels[$social->platform] ?? $social->platform }}
                            </p>

                            <p class="text-sm text-gray-800 break-all" dir="ltr">
                                {{ $social->address }}
                            </p>

                        </div>

                    @endforeach

                </div>

            @else

                <p class="text-sm text-gray-400 text-center py-5">
                    هیچ شبکه اجتماعی ثبت نشده است.
                </p>

            @endif

        </div>

    </div>


    {{-- Sellers --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                    <svg width="19" height="19" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="9" cy="8" r="4"/>
                        <path d="M2 21v-2a7 7 0 0 1 14 0v2"/>
                        <path d="M19 8v6M22 11h-6"/>
                    </svg>
                </div>

                <div>
                    <h3 class="font-bold text-gray-800 text-sm">
                        اطلاعات فروشندگان
                    </h3>
                    <p class="text-xs text-gray-400 mt-1">
                        افراد فعال در بخش فروش کسب‌وکار
                    </p>
                </div>

            </div>

            <span class="text-xs rounded-lg bg-gray-100 px-3 py-1.5 text-gray-600 in-fa">
                {{ $lead->sellers->count() }} فروشنده
            </span>

        </div>

        <div class="p-5">

            @if($lead->sellers->count())

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[650px] text-right">

                        <thead>
                            <tr class="text-xs text-gray-400 border-b border-gray-100">
                                <th class="py-3 px-3 font-medium">نام و نام خانوادگی</th>
                                <th class="py-3 px-3 font-medium">شماره تماس</th>
                                <th class="py-3 px-3 font-medium">تاریخ تولد</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @foreach($lead->sellers as $seller)

                                <tr>
                                    <td class="py-4 px-3 text-sm font-medium text-gray-800">
                                        {{ trim(($seller->first_name ?? '') . ' ' . ($seller->last_name ?? '')) ?: 'ثبت نشده' }}
                                    </td>

                                    <td class="py-4 px-3 text-sm text-gray-600" dir="ltr">
                                        {{ $seller->phone ?: 'ثبت نشده' }}
                                    </td>

                                    <td class="py-4 px-3 text-sm text-gray-600">
                                        {{ $seller->birth_date ?: 'ثبت نشده' }}
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <p class="text-sm text-gray-400 text-center py-5">
                    اطلاعاتی برای فروشندگان ثبت نشده است.
                </p>

            @endif

        </div>

    </div>


    {{-- Customer Information --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 8v6M23 11h-6"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    اطلاعات مشتریان
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    نحوه نگهداری اطلاعات و خرید مجدد مشتریان
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-5">

            <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">

                <p class="text-xs text-gray-400 mb-3">
                    ذخیره اطلاعات مشتریان
                </p>

                <p class="text-sm font-bold text-gray-800">
                    @if($lead->stores_customer_data === null)
                        مشخص نشده
                    @else
                        {{ $lead->stores_customer_data ? 'بله، اطلاعات مشتریان ذخیره می‌شود' : 'خیر، اطلاعات مشتریان ذخیره نمی‌شود' }}
                    @endif
                </p>

            </div>

            <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">

                <p class="text-xs text-gray-400 mb-3">
                    درصد خرید تکراری مشتریان
                </p>

                @if($lead->repeat_purchase_unknown)
                    <p class="text-sm font-bold text-gray-800">
                        درصد خرید تکراری مشخص نیست
                    </p>
                @elseif($lead->repeat_purchase_percent !== null)
                    <div class="flex items-center gap-3">

                        <span class="text-2xl font-bold text-[#101F38]">
                            {{ $lead->repeat_purchase_percent }}٪
                        </span>

                        <div class="flex-1 h-2 rounded-full bg-gray-200 overflow-hidden">
                            <div class="h-full rounded-full bg-[#FF9D16]"
                                 style="width: {{ min(100, max(0, $lead->repeat_purchase_percent)) }}%">
                            </div>
                        </div>

                    </div>
                @else
                    <p class="text-sm text-gray-500">
                        ثبت نشده
                    </p>
                @endif

            </div>

        </div>

    </div>


    {{-- Challenges --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M12 9v4M12 17h.01"/>
                    <path d="M10.3 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.7 3.86a2 2 0 0 0-3.4 0z"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    چالش‌های کسب‌وکار
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    موانع و محدودیت‌های فعلی
                </p>
            </div>

        </div>

        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">

                <h4 class="text-sm font-bold text-gray-700 mb-3">
                    موانع دیجیتال
                </h4>

                <p class="text-sm text-gray-600 leading-8 whitespace-pre-line">
                    {{ $lead->digital_obstacles ?: 'موردی ثبت نشده است.' }}
                </p>

            </div>

            <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">

                <h4 class="text-sm font-bold text-gray-700 mb-3">
                    علت کمبود وقت
                </h4>

                <p class="text-sm text-gray-600 leading-8 whitespace-pre-line">
                    {{ $lead->time_constraints ?: 'موردی ثبت نشده است.' }}
                </p>

            </div>

        </div>

    </div>


    {{-- Sales Problems --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M3 3v18h18"/>
                    <path d="m19 9-5 5-4-4-5 5"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    مشکلات فروش
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    موانع و مشکلاتی که در مسیر فروش وجود دارند
                </p>
            </div>

        </div>

        <div class="p-5">

            @if($lead->salesProblems->count())

                <div class="space-y-3">

                    @foreach($lead->salesProblems as $problem)

                        <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50 border border-gray-100">

                            <span class="w-6 h-6 shrink-0 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center text-xs font-bold">
                                {{ $loop->iteration }}
                            </span>

                            <p class="text-sm text-gray-700 leading-7">
                                {{ $problem->description }}
                            </p>

                        </div>

                    @endforeach

                </div>

            @else

                <p class="text-sm text-gray-400 text-center py-5">
                    مشکلی برای فروش ثبت نشده است.
                </p>

            @endif

        </div>

    </div>


    {{-- Value Propositions --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="m12 3 2.8 5.7L21 9.6l-4.5 4.4 1.1 6.2L12 17.3l-5.6 2.9 1.1-6.2L3 9.6l6.2-.9L12 3z"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    ارزش‌های پیشنهادی
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    مهم‌ترین ارزش‌هایی که این کسب‌وکار ارائه می‌دهد
                </p>
            </div>

        </div>

        <div class="p-5">

            @if($lead->valuePropositions->count())

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">

                    @foreach($lead->valuePropositions as $value)

                        <div class="p-4 rounded-xl bg-amber-50/60 border border-amber-100">

                            <span class="text-xs text-amber-600 font-bold">
                                ارزش پیشنهادی {{ $loop->iteration }}
                            </span>

                            <p class="text-sm text-gray-800 font-medium mt-2 leading-7">
                                {{ $value->title }}
                            </p>

                        </div>

                    @endforeach

                </div>

            @else

                <p class="text-sm text-gray-400 text-center py-5">
                    ارزش پیشنهادی ثبت نشده است.
                </p>

            @endif

        </div>

    </div>


    {{-- Cooperations --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">

            <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                <svg width="19" height="19" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z"/>
                    <path d="M8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3z"/>
                    <path d="M2 20v-1a6 6 0 0 1 12 0v1M16 14a5 5 0 0 1 6 5v1"/>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-gray-800 text-sm">
                    زمینه‌های همکاری
                </h3>
                <p class="text-xs text-gray-400 mt-1">
                    حوزه‌هایی که امکان همکاری با کسب‌وکار وجود دارد
                </p>
            </div>

        </div>

        <div class="p-5">

            @if($lead->cooperations->count())

                <div class="flex flex-wrap gap-2">

                    @foreach($lead->cooperations as $cooperation)

                        <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#101F38]/5 border border-[#101F38]/10 text-[#101F38] text-sm font-medium">

                            <span class="w-1.5 h-1.5 rounded-full bg-[#FF9D16]"></span>

                            {{ $cooperation->title }}

                        </span>

                    @endforeach

                </div>

            @else

                <p class="text-sm text-gray-400 text-center py-5">
                    زمینه همکاری ثبت نشده است.
                </p>

            @endif

        </div>

    </div>


    {{-- Footer --}}
    <div class="flex justify-between items-center gap-3">

        <a href="{{ route('business-leads.index') }}"
           class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-gray-200 text-gray-600 text-sm hover:bg-gray-50 transition">

            <svg width="17" height="17" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2">
                <path d="m15 18-6-6 6-6"/>
            </svg>

            بازگشت به لیست

        </a>

        <span class="text-xs text-gray-400">
            پرونده شماره {{ $lead->id }}
        </span>

    </div>

</div>

@endsection
