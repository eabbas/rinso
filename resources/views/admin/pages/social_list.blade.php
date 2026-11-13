@extends('admin.app.panel')

@section('title', 'صفحه‌های من')

@section('content')
<div class="w-full max-w-6xl mx-auto px-3 sm:px-5 pb-8 space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                <span class="text-xs text-gray-400 font-medium">مدیریت صفحات</span>
            </div>

            <h2 class="text-xl font-black text-slate-800">
                صفحه‌های من
            </h2>

            <p class="text-sm text-gray-400 mt-2">
                تمام صفحات ساخته شده توسط خودت رو از اینجا مدیریت کن.
            </p>
        </div>

        <a href="{{ route('pages.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-3 rounded-xl shadow-lg shadow-blue-600/20 transition">
            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
            </svg>
            ایجاد صفحه جدید
        </a>
    </div>


    @if (count(Auth::user()->pages))

        {{-- Statistics --}}
        <div class="grid grid-cols-2 gap-3">
            <div class="bg-white border border-gray-100 rounded-2xl p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">تعداد صفحات</p>
                        <p class="text-2xl font-black text-slate-800 mt-2">
                            {{ count(Auth::user()->pages) }}
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
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400">وضعیت حساب</p>
                        <p class="text-sm font-bold text-emerald-600 mt-3">
                            فعال و آماده استفاده
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


        {{-- Pages --}}
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
                           class="size-4 accent-blue-600 cursor-pointer rounded">

                    <label for="all" class="text-sm text-slate-600 cursor-pointer">
                        انتخاب همه صفحات
                    </label>
                </div>

                <button type="submit"
                        id="deleteSelected"
                        onclick="return confirm('آیا از حذف صفحات انتخاب شده مطمئنی؟')"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold transition">

                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zM317.5 25L354.2 80H424c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8v304c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128h-8C10.7 128 0 117.3 0 104s10.7-24 24-24h69.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.7 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z"/>
                    </svg>

                    حذف انتخاب‌شده‌ها
                </button>
            </div>


            {{-- Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @foreach (Auth::user()->pages as $cover)
                    @if ($cover)

                        <div class="group bg-white border border-gray-100 hover:border-blue-200 rounded-2xl p-4 sm:p-5 transition duration-300 hover:shadow-xl hover:shadow-blue-900/5">

                            {{-- Card Header --}}
                            <div class="flex items-start justify-between gap-3">

                                <div class="flex items-center gap-3 min-w-0">

                                    <input type="checkbox"
                                           name="pages[]"
                                           class="check size-4 shrink-0 accent-blue-600 cursor-pointer"
                                           value="{{ $cover->id }}">

                                    <div class="size-14 shrink-0 rounded-2xl bg-slate-50 border border-gray-100 overflow-hidden flex items-center justify-center">

                                        @if($cover->logo_path)
                                            <img class="w-full h-full object-cover"
                                                 src="{{ asset('storage/' . $cover->logo_path) }}"
                                                 alt="{{ $cover->title }}">
                                        @else
                                            <img class="w-9 h-9 object-contain"
                                                 src="{{ asset('assets/img/user.png') }}"
                                                 alt="User">
                                        @endif

                                    </div>

                                    <div class="min-w-0">
                                        <h3 class="text-sm font-black text-slate-800 truncate">
                                            {{ $cover->title }}
                                        </h3>

                                        <p class="text-xs text-gray-400 mt-2">
                                            صفحه اختصاصی من
                                        </p>
                                    </div>

                                </div>
                                @if($cover->active)
                                    <span class="shrink-0 flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1.5 rounded-full">
                                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                        فعال
                                    </span>
                                @else
                                    <span class="shrink-0 flex items-center gap-1.5 text-[10px] font-bold text-red-600 bg-red-50 px-2.5 py-1.5 rounded-full">
                                        <span class="size-1.5 rounded-full bg-red-500"></span>
                                        غیرفعال
                                    </span>
                                @endif

                            </div>


                            {{-- Divider --}}
                            <div class="border-t border-gray-100 my-5"></div>


                            {{-- Actions --}}
                            <div class="flex flex-wrap items-center justify-between gap-3">

                                <a href="{{ route('special-user.index', [$cover]) }}"
                                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-blue-600 transition">

                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm10 0v6m3-3h-6"/>
                                    </svg>

                                    باشگاه مشتریان
                                </a>


                                <div class="flex items-center gap-2">

                                    {{-- View --}}
                                    <a href="{{ route('pages.single', [$cover]) }}"
                                       title="مشاهده صفحه"
                                       class="size-9 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 flex items-center justify-center transition">

                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/>
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                        </svg>
                                    </a>


                                    {{-- Edit --}}
                                    <a href="{{ route('pages.edit', [$cover]) }}"
                                       title="ویرایش صفحه"
                                       class="size-9 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-600 flex items-center justify-center transition">

                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="m16 4 4 4M4 20l4-.8L19 8a2.8 2.8 0 0 0-4-4L4 15l-.8 5Z"/>
                                        </svg>
                                    </a>


                                    {{-- Delete --}}
                                    <a href="{{ route('pages.delete', [$cover]) }}"
                                       title="حذف صفحه"
                                       onclick="return confirm('آیا از حذف این صفحه مطمئنی؟')"
                                       class="size-9 rounded-xl bg-red-50 hover:bg-red-100 text-red-500 flex items-center justify-center transition">

                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"/>
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
                هنوز صفحه‌ای نساختی!
            </h3>

            <p class="text-sm text-gray-400 mt-3 max-w-sm leading-7">
                اولین صفحه اختصاصی خودت رو بساز و تمام راه‌های ارتباطی و شبکه‌های اجتماعیت رو یکجا در اختیار دیگران قرار بده.
            </p>

            <a href="{{ route('pages.create') }}"
               class="mt-6 inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-blue-600/20">

                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                </svg>

                ساخت اولین صفحه
            </a>

        </div>

    @endif

</div>

<script src="{{ asset('assets/js/checkAll.js') }}"></script>

@endsection
