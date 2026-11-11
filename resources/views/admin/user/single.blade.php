
@extends('admin.app.panel')

@section('title')
    {{ $user->name }} {{ $user->family }}
@endsection

@section('content')
<div class="w-full space-y-6 mt-10" dir="rtl">

    {{-- کارت معرفی کاربر --}}
    <div class="overflow-hidden rounded-2xl border border-[#E6E9EF] bg-white shadow-sm">
        <div class="h-2 bg-[#101827]"></div>

        <div class="flex flex-col items-center gap-5 p-6 sm:flex-row sm:items-center">
            <div class="shrink-0">
                @if (!$user->main_image)
                    <img
                        class="size-24 rounded-2xl border-4 border-[#F5F6F8] object-cover shadow-sm"
                        src="{{ asset('assets/img/user.png') }}"
                        alt="user__avatar">
                @else
                    <img
                        class="size-24 rounded-2xl border-4 border-[#F5F6F8] object-cover shadow-sm"
                        src="{{ asset('storage/' . $user->main_image) }}"
                        alt="user__picture">
                @endif
            </div>

            <div class="flex flex-col items-center gap-2 sm:items-start">
                <span class="text-xs font-medium text-gray-400">پروفایل کاربر</span>
                <h2 class="text-xl font-bold text-[#101827]">
                    {{ $user->name }} {{ $user?->family }}
                </h2>
                <span class="rounded-lg bg-[#FFF3E5] px-3 py-1 text-xs font-medium text-[#D97706]">
                    اطلاعات حساب کاربری
                </span>
            </div>
        </div>
    </div>

    {{-- جزئیات پروفایل --}}
    <div class="rounded-2xl border border-[#E6E9EF] bg-white p-5 shadow-sm sm:p-7">

        <div class="mb-6 flex items-center gap-3">
            <div class="flex size-10 items-center justify-center rounded-xl bg-[#101827] text-white">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM4 20a8 8 0 0 1 16 0"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-[#101827]">جزئیات پروفایل</h3>
                <p class="mt-1 text-xs text-gray-400">اطلاعات ثبت‌شده حساب کاربری</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

            {{-- نام کامل --}}
            <div class="rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4">
                <div class="mb-2 flex items-center gap-2 text-xs text-gray-400">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0ZM4 20a8 8 0 0 1 16 0"/>
                    </svg>
                    نام و نام خانوادگی
                </div>
                <p class="font-semibold text-[#263449]">
                    {{ $user->name }} {{ $user?->family }}
                </p>
            </div>

            {{-- شماره تلفن --}}
            <div class="rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4">
                <div class="mb-2 flex items-center gap-2 text-xs text-gray-400">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .95.68l1.2 3.6a1 1 0 0 1-.5 1.2l-2.1 1.05a11 11 0 0 0 4.64 4.64l1.05-2.1a1 1 0 0 1 1.2-.5l3.6 1.2a1 1 0 0 1 .68.95V19a2 2 0 0 1-2 2h-1C8.16 21 3 15.84 3 9V5Z"/>
                    </svg>
                    شماره تلفن
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="font-semibold text-[#263449]">{{ $user->phoneNumber }}</span>
                    <mark class="rounded-md bg-green-100 px-2 py-1 text-[11px] font-medium text-green-700">
                        تایید شده
                    </mark>
                </div>
            </div>

            {{-- نقش --}}
            <div class="rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4">
                <div class="mb-2 flex items-center gap-2 text-xs text-gray-400">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 2.94-.08-.02a1.7 1.7 0 0 0-1.76.52l-.06.07h-3.4l-.06-.07a1.7 1.7 0 0 0-1.76-.52l-.08.02-1.7-2.94.06-.06A1.7 1.7 0 0 0 9.6 15l-.08-.04v-3.4l.08-.04a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.7-2.94.08.02a1.7 1.7 0 0 0 1.76-.52l.06-.07h3.4l.06.07a1.7 1.7 0 0 0 1.76.52l.08-.02 1.7 2.94-.06.06A1.7 1.7 0 0 0 19.6 12l.08.04v3.4l-.28-.44Z"/>
                    </svg>
                    نقش کاربر
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach($user->roles as $role)
                        <span class="rounded-lg border border-[#E1E5EB] bg-white px-3 py-1.5 text-xs font-medium text-[#263449]">
                            {{ $role }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- ایمیل --}}
            <div class="rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4">
                <div class="mb-2 flex items-center gap-2 text-xs text-gray-400">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M3 7l9 6 9-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/>
                    </svg>
                    ایمیل
                </div>
                <p class="break-all font-semibold text-[#263449]">
                    {{ $user->email }}
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
