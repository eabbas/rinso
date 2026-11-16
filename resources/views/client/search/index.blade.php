@extends('client.document')
@section('title', 'رینسو | جست و جو')
@section('content')

    
    <main>
        <section class="pt-5 sm:pt-8 lg:pt-9">
            <div class="w-[calc(100%-24px)] sm:w-[calc(100%-40px)] xl:max-w-[1240px] mx-auto">
                <div
                    class="max-w-[1000px] mx-auto text-center bg-[#111e2e] rounded-2xl sm:rounded-[26px] px-3 sm:px-6 md:px-12 py-8 sm:py-10 md:py-14 relative overflow-hidden">
                    <p
                        class="text-[11px] sm:text-[13px] md:text-[14px] leading-7 sm:leading-8 text-slate-300 mt-2 mb-6 sm:mb-8">
                        بین صفحه‌های رینسو بگرد؛ از اسم و آیدی تا خدمات، شبکه‌های اجتماعی و وب‌سایت.
                    </p>
                    <div
                        class="flex items-center gap-2 sm:gap-3 bg-white border border-slate-200 rounded-xl sm:rounded-2xl p-1.5 sm:p-2 pr-3 sm:pr-4 max-w-[760px] mx-auto shadow-[0_14px_38px_rgba(17,30,46,0.12)] focus-within:border-[#ffb45e] focus-within:ring-4 focus-within:ring-orange-500/10 transition">

                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7.2" />
                            <path d="m16.5 16.5 4 4" />
                        </svg>

                        <input id="searchInput" type="search"
                        value="{{ $searchTitle ?? '' }}"
                        class="w-full min-w-0 outline-none text-[11px] sm:text-[14px] text-slate-800 placeholder:text-slate-400 bg-transparent py-3"
                        placeholder="مثلاً: طراح سایت، @username، نام برند یا آدرس سایت..."
                        autocomplete="off">
                    </div>
                    <div class="flex flex-wrap items-center justify-center gap-2 mt-5 text-[10px] sm:text-[12px]">
                        <span class="text-slate-400 ml-1">جست‌وجوهای پرطرفدار:</span>

                        <button class="suggest text-slate-300 hover:text-[#ff9018] underline underline-offset-4"
                            data-q="طراحی سایت">طراحی سایت</button>
                        <button class="suggest text-slate-300 hover:text-[#ff9018] underline underline-offset-4"
                            data-q="فروشگاه">فروشگاه</button>
                        <button class="suggest text-slate-300 hover:text-[#ff9018] underline underline-offset-4"
                            data-q="آموزش">آموزش</button>
                        <button class="suggest text-slate-300 hover:text-[#ff9018] underline underline-offset-4"
                            data-q="مشاور">مشاور</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-[calc(100%-24px)] sm:w-[calc(100%-40px)] xl:max-w-[1240px] mx-auto py-8 sm:py-10 lg:py-11">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-5 sm:mb-6">
                <div>
                    <div class="flex items-center gap-2 text-[10px] sm:text-[11px] text-slate-400 mb-2">
                        <span>خانه</span>
                        <span>/</span>
                        <span class="text-[#d97706]">کشف صفحات</span>
                    </div>
                    <h2 class="text-[18px] sm:text-[22px] font-extrabold text-[#142033]">
                        <span class="inline-block w-1.5 h-5 rounded-full bg-[#ff9018] ml-2 align-middle"></span>
                        صفحه‌هایی برای کشف کردن
                    </h2>
                    <p class="text-[11px] sm:text-[13px] text-slate-500 mt-1.5">
                        اشخاص، متخصص‌ها و کسب‌وکارهای موردنظرت رو پیدا کن.
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[11px] sm:text-[12px] text-slate-500 shrink-0">مرتب‌سازی:</span>
                    <select id="sortType"
                        class="bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-[11px] sm:text-[12px] text-slate-700 outline-none focus:border-[#ff9018]">
                        <option value="desc">جدید به قدیمی</option>
                        <option value="asc">قدیمی به جدید</option>
                    </select>
                </div>
            </div>
            <div
                class="layout grid grid-cols-1 md:grid-cols-[220px_minmax(0,1fr)] lg:grid-cols-[245px_minmax(0,1fr)] gap-4 lg:gap-6 items-start">
                <aside class="sidebar bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 order-1">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <h3 class="font-bold text-[13px] sm:text-[14px] text-[#142033]">فیلتر نتایج</h3>
                        <button id="clearFilters" class="text-[10px] cursor-pointer sm:text-[11px] text-[#e47b0b] hover:underline">
                            حذف فیلترها
                        </button>
                    </div>

                    <div class="py-4 border-b border-slate-100">
                        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700 mb-3">
                            تاریخ ثبت صفحه
                        </h4>

                        <div class="space-y-3">
                            <div>
                                <label for="fromDate"
                                    class="block text-[10px] sm:text-[11px] text-slate-500 mb-1.5">
                                    از تاریخ
                                </label>
                                <input
                                    type="text"
                                    data-jdp
                                    value="1405/01/01"
                                    id="fromDate"
                                    dir="ltr"
                                    class="w-full in-fa bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-[11px] sm:text-[12px] text-slate-700 outline-none focus:border-[#ff9018] focus:ring-2 focus:ring-orange-500/10 transition"
                                >
                            </div>

                            <div>
                                <label for="toDate"
                                    class="block text-[10px] sm:text-[11px] text-slate-500 mb-1.5">
                                    تا تاریخ
                                </label>
                                <input
                                    type="text"
                                    data-jdp
                                    id="toDate"
                                    dir="ltr"
                                    value="{{ implode('/', explode('-', explode(' ', verta())[0])) }}"
                                    class="w-full bg-slate-50 in-fa border border-slate-200 rounded-xl px-3 py-2.5 text-[11px] sm:text-[12px] text-slate-700 outline-none focus:border-[#ff9018] focus:ring-2 focus:ring-orange-500/10 transition"
                                >
                            </div>
                        </div>
                    </div>
                    {{-- شبکه‌های اجتماعی --}}
<div class="py-4 border-b border-slate-100">
    <button type="button"
        class="filter-toggle w-full flex items-center justify-between text-right"
        aria-expanded="false">

        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700">
            شبکه‌های اجتماعی
        </h4>

        <svg class="filter-arrow w-4 h-4 text-slate-400 transition-transform duration-300"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
        </svg>
    </button>

    <div class="filter-content hidden pt-3">
        @foreach ($socialMedias as $socialMedia)
            <label class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                <input type="checkbox"
                    value="{{ $socialMedia->title }}"
                    class="social-filter accent-[#ff9018] w-4 h-4 socialMedias"
                    data-social-media-id="{{ $socialMedia->id }}">

                {{ $socialMedia->title }}
            </label>
        @endforeach
    </div>
</div>

{{-- دسته‌بندی‌ها --}}
<div class="py-4 border-b border-slate-100">
    <button type="button"
        class="filter-toggle w-full flex items-center justify-between text-right"
        aria-expanded="false">

        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700">
            دسته‌بندی‌ها
        </h4>

        <svg class="filter-arrow w-4 h-4 text-slate-400 transition-transform duration-300"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
        </svg>
    </button>

    <div class="filter-content hidden pt-3">
        @foreach ($categories as $category)
            <label
                class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer categories"
                data-category-id="{{ $category->id }}">

                <input type="checkbox"
                    value="{{ $category->slug }}"
                    class="social-filter accent-[#ff9018] w-4 h-4">

                {{ $category->title }}
            </label>
        @endforeach
    </div>
</div>
                    {{-- <div class="py-4 border-b border-slate-100">
                        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700 mb-2">شبکه‌های اجتماعی</h4>
                        @foreach ($socialMedias as $socialMedia)
                            <label
                                class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                                <input type="checkbox" value="{{ $socialMedia->title }}" class="social-filter accent-[#ff9018] w-4 h-4 socialMedias" data-social-media-id={{ $socialMedia->id }}>
                                {{ $socialMedia->title }}
                            </label>
                        @endforeach
                    </div>
                    <div class="py-4 border-b border-slate-100">
                        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700 mb-2">دسته بندی ها</h4>
                        @foreach ($categories as $category)
                            <label
                                class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer categories" data-category-id={{ $category->id }}>
                                <input type="checkbox" value="{{ $category->slug }}" class="social-filter accent-[#ff9018] w-4 h-4">
                                {{ $category->title }}
                            </label>
                        @endforeach
                    </div> --}}
                    
                </aside>
                
                <div class="results-area min-w-0 order-2">
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <strong id="resultCount" class="text-[#142033]">
                            {{ $datas['pages']->count() }}
                        </strong>
                        <div class="flex items-center gap-1.5 text-[10px] sm:text-[11px] text-slate-400">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            صفحه‌های عمومی رینسو
                        </div>
                    </div>
                    <div id="profileGrid"
                        class="profile-grid grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">

                                        
                        @foreach ($datas['pages'] as $data)

                            <a href="{{ url('/' . $data->user_name) }}"
                            class="block bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-[#ff9018] hover:shadow-md transition">

                                {{-- کاور صفحه --}}
                                <div class="h-28 relative bg-slate-100">

                                    <img
                                        src="{{ $data->cover_path ? asset('storage/' . $data->cover_path) : asset('assets/img/default-page.png') }}"
                                        onerror="this.onerror=null;this.src='{{ asset('assets/img/default-page.png') }}'"
                                        alt="کاور {{ $data->title }}"
                                        class="w-full h-full object-cover"
                                    >

                                    {{-- لوگوی صفحه --}}
                                    <div class="absolute -bottom-7 right-4 w-16 h-16 rounded-2xl border-4 border-white bg-white overflow-hidden shadow-sm">

                                        <img
                                            src="{{ $data->logo_path ? asset('storage/' . $data->logo_path) : asset('assets/img/default-page.png') }}"
                                            onerror="this.onerror=null;this.src='{{ asset('assets/img/default-page.png') }}'"
                                            alt="لوگوی {{ $data->title }}"
                                            class="w-full h-full object-cover"
                                        >

                                    </div>

                                </div>

                                {{-- اطلاعات صفحه --}}
                                <div class="pt-9 px-4 pb-4">

                                    <h3 class="font-bold text-[13px] text-[#142033] truncate">
                                        {{ $data->title }}
                                    </h3>

                                    <p class="text-[11px] text-slate-400 mt-1 truncate">
                                        {{ $data->subTitle }}
                                    </p>

                                    <p class="text-[11px] text-slate-500 leading-6 line-clamp-2 mt-3">
                                        {{ $data->description }}
                                    </p>

                                </div>

                            </a>

                        @endforeach


                    </div>
                    <div id="emptyState"
                        class="hidden bg-white border border-slate-200 rounded-2xl py-12 sm:py-16 px-5 text-center">
                        <div
                            class="w-14 h-14 rounded-2xl bg-orange-50 text-[#e47b0b] grid place-items-center mx-auto mb-4">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7">
                                <circle cx="10.8" cy="10.8" r="6.8" />
                                <path d="m16 16 4.5 4.5M8 10.8h5.6" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-[#142033] text-[14px] sm:text-[15px]">
                            چیزی پیدا نکردیم!
                        </h3>
                        <p class="text-[11px] sm:text-[12px] text-slate-500 mt-2">
                            عبارت جست‌وجو یا فیلترها رو تغییر بده و دوباره امتحان کن.
                        </p>
                        <button id="emptyClear" class="mt-5 text-[11px] sm:text-[12px] font-bold text-[#d97706]">
                            پاک کردن جست‌وجو و فیلترها
                        </button>
                    </div>
                    <div class="text-center mt-6 sm:mt-7">
                        <button id="loadMore"
                            class="bg-white border border-slate-200 hover:border-[#ff9018] hover:text-[#d97706] rounded-xl px-6 py-3 text-[11px] sm:text-[12px] font-semibold text-slate-600 transition">
                            نمایش صفحه‌های بیشتر
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-[calc(100%-24px)] sm:w-[calc(100%-40px)] xl:max-w-[1240px] mx-auto pb-8 sm:pb-12">
            <div
                class="rounded-2xl bg-[#142033] px-5 py-6 sm:px-6 sm:py-8 md:px-10 md:py-9 flex flex-col md:flex-row md:items-center justify-between gap-5 overflow-hidden relative">
                <div class="relative z-10">
                    <span class="text-[#ffb45e] text-[10px] sm:text-[11px] font-semibold">
                        نوبت توئه که دیده بشی
                    </span>
                    <h2 class="text-white text-[18px] sm:text-[20px] md:text-[23px] font-extrabold mt-2">
                        صفحه اختصاصی خودت رو بساز.
                    </h2>
                    <p class="text-slate-300 text-[11px] sm:text-[12px] mt-2 leading-7">
                        همه راه‌های ارتباطی و شبکه‌های اجتماعیت رو یک‌جا جمع کن.
                    </p>
                </div>
                <a href="#"
                    class="relative z-10 bg-[#ff9018] hover:bg-[#f1840d] text-white rounded-xl px-5 py-3.5 text-[11px] sm:text-[12px] font-bold text-center transition shrink-0">
                    شروع رایگان
                    <span class="mr-2">←</span>
                </a>
                <div
                    class="absolute -left-8 -bottom-24 w-64 h-64 rounded-full border border-white/10 pointer-events-none">
                </div>
                <div
                    class="absolute -left-1 -bottom-16 w-44 h-44 rounded-full border border-white/10 pointer-events-none">
                </div>
            </div>
        </section>
    </main>

<script>
 jalaliDatepicker.startWatch();
</script>
  
<script>
    document.querySelectorAll('.filter-toggle').forEach(button => {
        button.addEventListener('click', function () {
            let content = this.nextElementSibling;
            let arrow = this.querySelector('.filter-arrow')

            content.classList.toggle('hidden')

            let isOpen = !content.classList.contains('hidden')

            this.setAttribute('aria-expanded', isOpen)
            arrow.classList.toggle('rotate-180', isOpen)
        })
    })
    
</script>

    <script src="{{ asset('assets/js/search.js') }}"></script>

@endsection
