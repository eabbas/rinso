
@extends('admin.app.panel')

@section('title', 'لیست درخواست های کاربران')

@section('content')
<div class="w-full pb-6" dir="rtl">

    <div class="overflow-hidden rounded-2xl border border-[#E6E9EF] bg-white shadow-sm">

        {{-- عنوان --}}
        <div class="border-b border-[#E6E9EF] px-5 py-5 sm:px-6">
            <div class="flex items-center gap-3">
                <div class="flex size-11 items-center justify-center rounded-xl bg-[#101827] text-white">
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-[#101827]">لیست درخواست‌های کاربران</h2>
                    <p class="mt-1 text-xs text-gray-400">مدیریت و بررسی درخواست‌های ثبت‌شده</p>
                </div>
            </div>
        </div>

        <form action="{{ route('user.requestEvent') }}" method="post" class="flex flex-col gap-5 p-4 sm:p-6">
            @csrf

            {{-- نوار ابزار --}}
            <div class="flex flex-col gap-4 rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] p-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-3">
                    <input
                        type="checkbox"
                        id="all"
                        onchange="checkAll()"
                        class="size-4 cursor-pointer accent-[#101827]">
                    <label for="all" class="cursor-pointer text-sm font-medium text-[#263449]">
                        انتخاب همه درخواست‌ها
                    </label>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <select
                        name="status"
                        class="w-full rounded-lg border border-[#E1E5EB] bg-white px-4 py-2.5 text-sm text-[#263449] outline-none focus:border-[#FB9413] sm:w-40">
                        <option value="accept">پذیرش</option>
                        <option value="delete">حذف</option>
                    </select>

                    <button
                        class="flex items-center justify-center gap-2 rounded-lg bg-[#101827] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#263449] cursor-pointer"
                        title="ثبت">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m5 12 4 4L19 6"/>
                        </svg>
                        ثبت عملیات
                    </button>
                </div>
            </div>

            {{-- جدول درخواست‌ها --}}
            <div class="overflow-x-auto rounded-xl border border-[#E6E9EF] [&::-webkit-scrollbar]:h-1.5 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300">

                <div class="min-w-[850px]">

                    {{-- سرستون‌ها --}}
                    <div class="grid grid-cols-10 items-center border-b border-[#E6E9EF] bg-[#F5F6F8]">
                        <div class="col-span-1 px-2 py-4 text-center text-xs font-semibold text-gray-500"></div>
                        <div class="col-span-1 px-2 py-4 text-center text-xs font-semibold text-gray-500">ردیف</div>
                        <div class="col-span-1 px-2 py-4 text-center text-xs font-semibold text-gray-500">تصویر</div>
                        <div class="col-span-2 px-2 py-4 text-center text-xs font-semibold text-gray-500">نام کاربر</div>
                        <div class="col-span-2 px-2 py-4 text-center text-xs font-semibold text-gray-500">شماره تلفن</div>
                        <div class="col-span-3 px-2 py-4 text-center text-xs font-semibold text-gray-500">عملیات</div>
                    </div>

                    {{-- اطلاعات درخواست‌ها --}}
                    <div class="divide-y divide-[#E6E9EF] bg-white" id="userInfo">
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($requests as $request)
                            @php
                                Log::info($request)
                            @endphp

                            <div class="grid grid-cols-10 items-center transition hover:bg-[#FAFBFC]">

                                {{-- انتخاب --}}
                                <div class="col-span-1 flex items-center justify-center px-2 py-4">
                                    <input
                                        type="checkbox"
                                        class="check size-4 cursor-pointer accent-[#101827]"
                                        name="requests[]"
                                        value="{{ $request->id }}">
                                </div>

                                {{-- شماره ردیف --}}
                                <div class="col-span-1 flex items-center justify-center px-2 py-4">
                                    <span class="text-sm text-gray-500">{{ $i }}</span>
                                </div>

                                {{-- تصویر کاربر --}}
                                <div class="col-span-1 flex items-center justify-center px-2 py-4">
                                    <div class="flex size-11 items-center justify-center overflow-hidden rounded-xl border border-[#E6E9EF] bg-[#F5F6F8]">
                                        @if (isset($request->user->main_image))
                                            <a href="{{ route('user.show', [$request->user->id]) }}">
                                                <img
                                                    class="size-11 object-cover"
                                                    src="{{ asset('storage/' . $request->user->main_image) }}">
                                            </a>
                                        @endif

                                        @if (!isset($request->user->main_image))
                                            <a href="{{ route('user.show', [$request->user->id]) }}">
                                                <img
                                                    class="size-11 object-cover"
                                                    src="{{ asset('assets/img/user.png') }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                {{-- نام --}}
                                <div class="col-span-2 px-3 py-4 text-center">
                                    <span class="text-sm font-semibold text-[#263449]">
                                        {{ $request->user->name }} {{ $request->user->family }}
                                    </span>
                                </div>

                                {{-- شماره تلفن --}}
                                <div class="col-span-2 px-3 py-4 text-center">
                                    <span class="text-sm text-gray-600">
                                        {{ $request->user->phoneNumber }}
                                    </span>
                                </div>

                                {{-- عملیات --}}
                                <div class="col-span-3 px-3 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        <a
                                            href="{{ route('user.acceptRequest', [$request->id]) }}"
                                            class="flex items-center justify-center gap-1.5 rounded-lg border border-green-200 bg-green-50 px-3 py-2 text-xs font-semibold text-green-700 transition hover:bg-green-100">
                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="m5 12 4 4L19 6"/>
                                            </svg>
                                            پذیرش
                                        </a>

                                        <a
                                            href="{{ route('user.deleteRequest', [$request->id]) }}"
                                            class="flex items-center justify-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                      d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"/>
                                            </svg>
                                            حذف
                                        </a>

                                    </div>
                                </div>

                            </div>

                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
