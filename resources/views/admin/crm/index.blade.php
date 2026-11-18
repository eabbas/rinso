
@extends('admin.app.panel')

@section('title', 'لیست اطلاعات کسب‌وکارها')

@section('content')

<div class="w-full space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-xl font-bold text-[var(--light-theme-text-color)]">
                اطلاعات کسب‌وکارها
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                مدیریت و بررسی اطلاعات ثبت‌شده کسب‌وکارها
            </p>
        </div>

        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">
                تعداد کل:
            </span>

            <span class="px-3 py-1.5 rounded-lg bg-[#fff3df] text-[#d98200] font-bold text-sm">
                {{ number_format($totalLeads) }}
            </span>
        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error Message --}}
    @if(session('error'))
        <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
            {{ session('error') }}
        </div>
    @endif


    {{-- Search & Filter --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4">

        <form action="{{ route('business-leads.index') }}"
              method="GET"
              class="grid grid-cols-1 md:grid-cols-12 gap-3">

            {{-- Search --}}
            <div class="md:col-span-5">
                <div class="relative">

                    <svg class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"
                         width="19"
                         height="19"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="جست‌وجو نام، شماره تماس یا عنوان شغلی..."
                        class="w-full h-12 pr-11 pl-4 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-[#FF9D16] focus:bg-white transition"
                    >

                </div>
            </div>


            {{-- Status Filter --}}
            <div class="md:col-span-3">

                <select
                    name="status"
                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-[#FF9D16] transition"
                >
                    <option value="">همه وضعیت‌ها</option>
                    <option value="new" @selected(request('status') === 'new')>
                        جدید
                    </option>
                </select>

            </div>


            {{-- Buttons --}}
            <div class="md:col-span-4 flex gap-2">

                <button
                    type="submit"
                    class="flex-1 h-12 rounded-xl bg-[#101F38] text-white text-sm font-medium hover:bg-[#172B4D] transition"
                >
                    جست‌وجو
                </button>

                <a
                    href="{{ route('business-leads.index') }}"
                    class="h-12 px-4 flex items-center justify-center rounded-xl bg-gray-100 text-gray-600 text-sm hover:bg-gray-200 transition"
                >
                    حذف فیلتر
                </a>

            </div>

        </form>

    </div>


    {{-- Leads Table --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">

            <div>
                <h2 class="font-bold text-gray-800">
                    لیست سرنخ‌های کسب‌وکار
                </h2>

                <p class="text-xs text-gray-400 mt-1">
                    اطلاعات افراد ثبت‌نام‌شده در فرم شناخت کسب‌وکار
                </p>
            </div>

            <span class="text-xs text-gray-500">
                {{ $leads->total() }} نتیجه
            </span>

        </div>


        @if($leads->count())

            <div class="overflow-x-auto">

                <table class="w-full min-w-[850px] text-right">

                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs">

                            <th class="px-5 py-4 font-bold">
                                ردیف
                            </th>

                            <th class="px-5 py-4 font-bold">
                                نام و نام خانوادگی
                            </th>

                            <th class="px-5 py-4 font-bold">
                                شماره تماس
                            </th>

                            <th class="px-5 py-4 font-bold">
                                عنوان شغلی
                            </th>

                            <th class="px-5 py-4 font-bold">
                                سابقه فعالیت
                            </th>

                            <th class="px-5 py-4 font-bold">
                                تیم
                            </th>

                            <th class="px-5 py-4 font-bold">
                                تاریخ ثبت
                            </th>

                            <th class="px-5 py-4 font-bold">
                                وضعیت
                            </th>

                        </tr>
                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @foreach($leads as $index => $lead)

                            <tr class="hover:bg-gray-50/70 transition">

                                {{-- Row Number --}}
                                <td class="px-5 py-4 text-sm text-gray-400">
                                    {{ $leads->firstItem() + $index }}
                                </td>


                                {{-- Name --}}
                                <td class="px-5 py-4">

                                    <a href="{{ route('business-leads.show', $lead->id) }}"
                                    class="font-bold text-sm text-gray-800 hover:text-[#FF9D16] transition">
                                        {{ trim(($lead->first_name ?? '') . ' ' . ($lead->last_name ?? '')) ?: 'بدون نام' }}
                                    </a>

                                    <div class="text-xs text-gray-400 mt-1">
                                        مشاهده پرونده
                                    </div>

                                </td>


                                {{-- Phone --}}
                                <td class="px-5 py-4">

                                    @if($lead->phone)
                                        <span class="text-sm text-gray-600 in-fa" dir="ltr">
                                            {{ $lead->phone }}
                                        </span>
                                    @else
                                        <span class="text-xs text-gray-400">
                                            ثبت نشده
                                        </span>
                                    @endif

                                </td>


                                {{-- Job Title --}}
                                <td class="px-5 py-4 text-sm text-gray-600">
                                    {{ $lead->job_title ?: 'ثبت نشده' }}
                                </td>


                                {{-- Business Age --}}
                                <td class="px-5 py-4 text-sm text-gray-600 in-fa">
                                    {{ $lead->business_age ?: 'ثبت نشده' }}
                                </td>


                                {{-- Created At --}}
                                <td class="px-5 py-4 text-sm text-gray-500 in-fa">
                                    {{ $lead->team ?? '---' }}
                                </td>
                                
                                {{-- Created At --}}
                                <td class="px-5 py-4 text-sm text-gray-500 in-fa">
                                    {{ $lead->date ?? '---' }}
                                </td>


                                {{-- Status --}}
                                <td class="px-5 py-4">

                                    @if($lead->status === 'new')

                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 text-xs font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                            جدید
                                        </span>

                                    @else

                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-gray-600 text-xs font-medium">
                                            {{ $lead->status ?: 'نامشخص' }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="px-5 py-4 border-t border-gray-100">

                {{ $leads->links() }}

            </div>

        @else

            {{-- Empty State --}}
            <div class="py-16 px-5 text-center">

                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-100 flex items-center justify-center">

                    <svg width="30"
                         height="30"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="#9ca3af"
                         stroke-width="1.6">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="10" cy="7" r="4"/>
                        <path d="M20 8v6"/>
                        <path d="M23 11h-6"/>
                    </svg>

                </div>

                <h3 class="font-bold text-gray-700">
                    اطلاعاتی پیدا نشد
                </h3>

                <p class="text-sm text-gray-400 mt-2">
                    هنوز اطلاعاتی ثبت نشده یا نتیجه‌ای مطابق جست‌وجوی شما وجود ندارد.
                </p>

                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('business-leads.index') }}"
                       class="inline-flex mt-5 px-5 py-2.5 rounded-xl bg-[#101F38] text-white text-sm">
                        مشاهده همه اطلاعات
                    </a>
                @endif

            </div>

        @endif

    </div>

</div>

@endsection
