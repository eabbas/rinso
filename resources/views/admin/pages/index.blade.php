@extends('admin.app.panel')

@section('title', 'همه صفحه‌ها')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 sm:px-5 pb-8 space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                <span class="text-xs text-gray-400 font-medium">مدیریت پلتفرم</span>
            </div>

            <h2 class="text-xl font-black text-slate-800">
                همه صفحه‌ها
            </h2>

            <p class="text-sm text-gray-400 mt-2">
                مدیریت و نظارت بر تمام صفحات ایجاد شده در رینسو.
            </p>
        </div>

        <div class="flex items-center gap-2 text-xs font-bold text-blue-600 bg-blue-50 px-4 py-3 rounded-xl w-fit">
            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 3v18m9-9H3"/>
            </svg>
            مدیریت صفحات کاربران
        </div>

    </div>


    @if (count($pages))

        {{-- Statistics --}}
        <div class="grid grid-cols-2 gap-3">

            <div class="bg-white border border-gray-100 rounded-2xl p-4 sm:p-5">
                <div class="flex items-center justify-between gap-2">

                    <div>
                        <p class="text-xs text-gray-400">کل صفحات</p>

                        <p class="text-2xl font-black text-slate-800 mt-2">
                            {{ count($pages) }}
                        </p>
                    </div>

                    <div class="size-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="4" y="4" width="16" height="16" rx="3" stroke-width="1.8"/>
                            <path d="M8 9h8M8 13h5" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>

                </div>
            </div>


            <div class="bg-white border border-gray-100 rounded-2xl p-4 sm:p-5">
                <div class="flex items-center justify-between gap-2">

                    <div>
                        <p class="text-xs text-gray-400">وضعیت اطلاعات</p>

                        <p class="text-sm font-bold text-emerald-600 mt-3">
                            اطلاعات در دسترس
                        </p>
                    </div>

                    <div class="size-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="m5 12 4 4L19 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                </div>
            </div>

        </div>


        {{-- Pages Form --}}
        <form action="{{ route('pages.deleteAll') }}"
              method="post"
              id="pagesForm"
              class="space-y-4">

            @csrf


            {{-- Toolbar --}}
            <div class="bg-white border border-gray-100 rounded-2xl p-4 flex flex-wrap items-center justify-between gap-3">

                <div class="flex items-center gap-3">

                    <input type="checkbox"
                           id="all"
                           onchange="checkAll()"
                           class="size-4 accent-blue-600 cursor-pointer">

                    <label for="all" class="text-sm text-slate-600 cursor-pointer">
                        انتخاب همه صفحات
                    </label>

                </div>


                <button type="submit"
                        onclick="return confirm('آیا از حذف صفحات انتخاب شده مطمئنی؟')"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold transition">

                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 448 512">
                        <path fill="currentColor"
                              d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z"/>
                    </svg>

                    حذف انتخاب‌شده‌ها

                </button>

            </div>


            {{-- Page Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @foreach ($pages as $page)

                    @if ($page)

                        <div class="group bg-white border border-gray-100 hover:border-blue-200 rounded-2xl p-4 sm:p-5 transition duration-300 hover:shadow-xl hover:shadow-blue-900/5">

                            {{-- Card Header --}}
                            <div class="flex items-start justify-between gap-3">

                                <div class="flex items-center gap-3 min-w-0">

                                    <input type="checkbox"
                                           name="pages[]"
                                           class="check size-4 shrink-0 accent-blue-600 cursor-pointer"
                                           value="{{ $page->id }}">

                                    <div class="size-14 shrink-0 rounded-2xl bg-slate-50 border border-gray-100 overflow-hidden flex items-center justify-center">

                                        @if($page->logo_path)

                                            <img class="w-full h-full object-cover"
                                                 src="{{ asset('storage/' . $page->logo_path) }}"
                                                 alt="{{ $page->title }}">

                                        @else

                                            <img class="w-9 h-9 object-contain"
                                                 src="{{ asset('assets/img/user.png') }}"
                                                 alt="User">

                                        @endif

                                    </div>

                                    <div class="min-w-0">

                                        <h3 class="text-sm font-black text-slate-800 truncate">
                                            {{ $page->title }}
                                        </h3>

                                        <p class="text-xs text-gray-400 mt-2">
                                            شناسه صفحه: #{{ $page->id }}
                                        </p>

                                    </div>

                                </div>


                                <span class="shrink-0 flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1.5 rounded-full">

                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>

                                    صفحه ثبت شده

                                </span>

                            </div>


                            {{-- Divider --}}
                            <div class="border-t border-gray-100 my-5"></div>


                            {{-- Actions --}}
                            <div class="flex flex-wrap items-center justify-between gap-3">

                                <span class="text-xs text-gray-400">
                                    مدیریت و مشاهده صفحه
                                </span>


                                <div class="flex items-center gap-2">

                                    {{-- View --}}
                                    <a href="{{ route('pages.single', [$page]) }}"
                                       title="مشاهده صفحه"
                                       class="size-9 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 flex items-center justify-center transition">

                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/>
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                        </svg>

                                    </a>


                                    {{-- Edit --}}
                                    <a href="{{ route('pages.edit', [$page]) }}"
                                       title="ویرایش صفحه"
                                       class="size-9 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-600 flex items-center justify-center transition">

                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16 4 4 4M4 20l4-.8L19 8a2.8 2.8 0 0 0-4-4L4 15l-.8 5Z"/>
                                        </svg>

                                    </a>


                                    {{-- Delete --}}
                                    <a href="{{ route('pages.delete', [$page]) }}"
                                       title="حذف صفحه"
                                       onclick="return confirm('آیا از حذف این صفحه مطمئنی؟')"
                                       class="size-9 rounded-xl bg-red-50 hover:bg-red-100 text-red-500 flex items-center justify-center transition">

                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                                  d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"/>
                                        </svg>

                                    </a>

                                </div>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        </form>


    @else

        {{-- Empty State --}}
        <div class="bg-white border border-gray-100 rounded-3xl px-5 py-14 sm:py-20 flex flex-col items-center justify-center text-center">

            <div class="size-20 rounded-3xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5">

                <svg class="size-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="4" y="4" width="16" height="16" rx="3" stroke-width="1.6"/>
                    <path d="M12 8v8m-4-4h8" stroke-width="1.8" stroke-linecap="round"/>
                </svg>

            </div>

            <h3 class="text-base font-black text-slate-800">
                هنوز صفحه‌ای ایجاد نشده!
            </h3>

            <p class="text-sm text-gray-400 mt-3 max-w-sm leading-7">
                در حال حاضر هیچ صفحه‌ای در رینسو ثبت نشده است.
                پس از ایجاد اولین صفحه، اطلاعات آن در این بخش نمایش داده می‌شود.
            </p>

        </div>

    @endif

</div>

<script src="{{ asset('assets/js/checkAll.js') }}"></script>

@endsection