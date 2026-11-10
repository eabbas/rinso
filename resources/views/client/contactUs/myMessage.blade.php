
@extends('client.document')

@section('title', 'ارتباط با ما')

@section('content')
<div class="w-full pb-8" dir="rtl">

    <div class="rounded-2xl border border-[#101827]/10 bg-white p-4 md:p-7">

        {{-- عنوان صفحه --}}
        <div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="text-sm font-semibold text-[#FB9413]">
                    بخش پشتیبانی
                </span>
                <h2 class="mt-2 text-xl font-black text-[#101827] md:text-2xl">
                    لیست ارتباط با ما
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    پیام‌ها و درخواست‌های ثبت‌شده را از این قسمت مدیریت کنید.
                </p>
            </div>

            <a href="{{ route('contactUs.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg border border-[#101827]/15 px-5 py-3 text-sm font-bold text-[#101827] transition hover:border-[#FB9413] hover:bg-[#FB9413]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 5v14m-7-7h14"/>
                </svg>
                ارسال پیام جدید
            </a>
        </div>

        {{-- فرم حذف گروهی --}}
        <form class="flex flex-col gap-5"
              action="{{ route('contactUs.deleteAll') }}"
              method="post">
            @csrf

            {{-- نوار ابزار --}}
            <div class="flex items-center justify-between rounded-xl border border-[#101827]/10 bg-[#F5F6F8] px-4 py-3">
                <label for="all" class="flex cursor-pointer items-center gap-3 text-sm font-medium text-[#101827]">
                    <input type="checkbox"
                           id="all"
                           onchange="checkAll()"
                           class="h-4 w-4 cursor-pointer accent-[#FB9413]">
                    انتخاب همه
                </label>

                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg bg-[#101827] px-4 py-2.5 text-xs font-bold text-white transition hover:bg-[#FB9413] hover:text-[#101827]"
                        title="حذف موارد انتخاب‌شده">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-12 0h18"/>
                    </svg>
                    حذف انتخاب‌شده‌ها
                </button>
            </div>

            {{-- جدول --}}
            <div class="overflow-x-auto rounded-xl border border-[#101827]/10">
                <table class="w-full min-w-[850px] border-collapse text-sm">
                    <thead>
                        <tr class="bg-[#101827] text-white">
                            <th class="w-14 px-3 py-4 text-center font-semibold">انتخاب</th>
                            <th class="w-16 px-3 py-4 text-center font-semibold">ردیف</th>
                            <th class="px-4 py-4 text-center font-semibold">عنوان</th>
                            <th class="px-4 py-4 text-center font-semibold">توضیحات</th>
                            <th class="px-4 py-4 text-center font-semibold">شماره تماس</th>
                            <th class="w-40 px-4 py-4 text-center font-semibold">عملیات</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#101827]/10 bg-white">
                        @php
                            $i = 1;
                        @endphp

                        @forelse (Auth::user()->contactUs as $contactUs)
                            <tr class="transition hover:bg-[#F8F9FB]">

                                <td class="px-3 py-4 text-center">
                                    <input type="checkbox"
                                           class="check h-4 w-4 cursor-pointer accent-[#FB9413]"
                                           name="allContactUs[]"
                                           value="{{ $contactUs->id }}">
                                </td>

                                <td class="px-3 py-4 text-center text-gray-500">
                                    {{ $i }}
                                </td>

                                <td class="max-w-[180px] px-4 py-4 text-center font-semibold text-[#101827]">
                                    <span class="block break-words">
                                        {{ $contactUs->title }}
                                    </span>
                                </td>

                                <td class="max-w-[300px] px-4 py-4 text-center leading-7 text-gray-600">
                                    <span class="block break-words">
                                        {{ $contactUs->description }}
                                    </span>
                                </td>

                                <td class="px-4 py-4 text-center text-gray-700" dir="ltr">
                                    {{ $contactUs->phoneNumber }}
                                </td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- مشاهده --}}
                                        <a href="{{ route('contactUs.show', [$contactUs]) }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-[#101827]/10 text-[#101827] transition hover:border-[#FB9413] hover:bg-[#FB9413]"
                                           title="مشاهده">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                      d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z"/>
                                                <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                            </svg>
                                        </a>

                                        {{-- ویرایش --}}
                                        <a href="{{ route('contactUs.edit', [$contactUs]) }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-[#101827]/10 text-[#101827] transition hover:border-[#FB9413] hover:bg-[#FB9413]"
                                           title="ویرایش">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                      d="M12 20h9M16.5 3.5a2.12 2.12 0 013 3L8 18l-4 1 1-4 11.5-11.5z"/>
                                            </svg>
                                        </a>

                                        {{-- حذف --}}
                                        <a href="{{ route('contactUs.delete', [$contactUs]) }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-100 text-red-500 transition hover:bg-red-500 hover:text-white"
                                           title="حذف">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                      d="M3 6h18M8 6V4h8v2m-9 0l1 14h8l1-14M10 10v6m4-6v6"/>
                                            </svg>
                                        </a>

                                    </div>
                                </td>
                            </tr>

                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-14 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#101827]/5 text-[#101827]">
                                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                                      d="M8 10h8M8 14h5m-9 5V5a2 2 0 012-2h12a2 2 0 012 2v14l-4-3H6a2 2 0 01-2-2z"/>
                                            </svg>
                                        </div>
                                        <p class="font-bold text-[#101827]">
                                            هنوز پیامی ثبت نشده است.
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            پیام‌های شما بعد از ثبت در این قسمت نمایش داده می‌شوند.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
