@extends('client.document')
@section('title', 'رینسو | جست و جو')
@section('content')

    
    <main>

        <!-- Hero -->
        <section class="pt-5 sm:pt-8 lg:pt-9">
            <div class="w-[calc(100%-24px)] sm:w-[calc(100%-40px)] xl:max-w-[1240px] mx-auto">

                <div
                    class="max-w-[1000px] mx-auto text-center bg-[#111e2e] rounded-2xl sm:rounded-[26px] px-3 sm:px-6 md:px-12 py-8 sm:py-10 md:py-14 relative overflow-hidden">

                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 rounded-full bg-white/10 text-[#ffc078] px-3.5 py-2 text-[10px] sm:text-[11px] font-semibold mb-4 sm:mb-5">
                        <span class="w-[7px] h-[7px] rounded-full bg-[#ff9018]"></span>
                        دنیای آدم‌ها و کسب‌وکارها
                    </div>

                    <!-- Title -->
                    <h1 class="text-[25px] sm:text-[32px] md:text-[42px] leading-[1.8] font-extrabold text-white">
                        چیزی که دنبالش هستی،
                        <span class="text-[#ff9018]">پیدا کن.</span>
                    </h1>

                    <p
                        class="text-[11px] sm:text-[13px] md:text-[14px] leading-7 sm:leading-8 text-slate-300 mt-2 mb-6 sm:mb-8">
                        بین صفحه‌های رینسو بگرد؛ از اسم و آیدی تا خدمات، شبکه‌های اجتماعی و وب‌سایت.
                    </p>

                    <!-- Search -->
                    <div
                        class="flex items-center gap-2 sm:gap-3 bg-white border border-slate-200 rounded-xl sm:rounded-2xl p-1.5 sm:p-2 pr-3 sm:pr-4 max-w-[760px] mx-auto shadow-[0_14px_38px_rgba(17,30,46,0.12)] focus-within:border-[#ffb45e] focus-within:ring-4 focus-within:ring-orange-500/10 transition">

                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7.2" />
                            <path d="m16.5 16.5 4 4" />
                        </svg>

                        <input id="searchInput" type="search"
                            class="w-full min-w-0 outline-none text-[11px] sm:text-[14px] text-slate-800 placeholder:text-slate-400 bg-transparent py-3"
                            placeholder="مثلاً: طراح سایت، @username، نام برند یا آدرس سایت..." autocomplete="off">

                        <button id="searchBtn"
                            class="shrink-0 bg-[#ff9018] hover:bg-[#f1840d] text-white font-bold text-[10px] sm:text-[13px] rounded-lg sm:rounded-xl px-3 sm:px-7 py-3 sm:py-3.5 transition">
                            جست‌وجو
                        </button>
                    </div>

                    <!-- Popular searches -->
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

        <!-- Discovery -->
        <section class="w-[calc(100%-24px)] sm:w-[calc(100%-40px)] xl:max-w-[1240px] mx-auto py-8 sm:py-10 lg:py-11">

            <!-- Heading -->
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
                        آدم‌ها، متخصص‌ها و کسب‌وکارهای موردنظرت رو پیدا کن.
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-[11px] sm:text-[12px] text-slate-500 shrink-0">مرتب‌سازی:</span>

                    <select id="sortSelect"
                        class="bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-[11px] sm:text-[12px] text-slate-700 outline-none focus:border-[#ff9018]">
                        <option value="recommended">پیشنهادی</option>
                        <option value="name">نام صفحه</option>
                    </select>
                </div>
            </div>

            <!-- Layout -->
            <div
                class="layout grid grid-cols-1 md:grid-cols-[220px_minmax(0,1fr)] lg:grid-cols-[245px_minmax(0,1fr)] gap-4 lg:gap-6 items-start">

                <!-- Sidebar -->
                <aside class="sidebar bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 order-1">

                    <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <h3 class="font-bold text-[13px] sm:text-[14px] text-[#142033]">فیلتر نتایج</h3>

                        <button id="clearFilters" class="text-[10px] sm:text-[11px] text-[#e47b0b] hover:underline">
                            حذف فیلترها
                        </button>
                    </div>

                    <!-- Page type -->
                    <div class="py-4 border-b border-slate-100">
                        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700 mb-2">نوع صفحه</h4>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="radio" name="kind" value="all" checked class="accent-[#ff9018] w-4 h-4">
                            همه صفحه‌ها
                        </label>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="radio" name="kind" value="person" class="accent-[#ff9018] w-4 h-4">
                            افراد
                        </label>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="radio" name="kind" value="business" class="accent-[#ff9018] w-4 h-4">
                            کسب‌وکارها
                        </label>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="radio" name="kind" value="creator" class="accent-[#ff9018] w-4 h-4">
                            تولیدکنندگان محتوا
                        </label>
                    </div>

                    <!-- Social networks -->
                    <div class="py-4 border-b border-slate-100">
                        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700 mb-2">شبکه‌های اجتماعی</h4>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="checkbox" value="instagram" class="social-filter accent-[#ff9018] w-4 h-4">
                            اینستاگرام
                        </label>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="checkbox" value="telegram" class="social-filter accent-[#ff9018] w-4 h-4">
                            تلگرام
                        </label>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="checkbox" value="linkedin" class="social-filter accent-[#ff9018] w-4 h-4">
                            لینکدین
                        </label>

                        <label
                            class="flex items-center gap-2.5 py-2 text-[12px] sm:text-[13px] text-slate-600 cursor-pointer">
                            <input type="checkbox" value="website" class="social-filter accent-[#ff9018] w-4 h-4">
                            وب‌سایت
                        </label>
                    </div>

                    <!-- Categories -->
                    <div class="pt-4">
                        <h4 class="text-[11px] sm:text-[12px] font-bold text-slate-700 mb-3">دسته‌بندی موضوعی</h4>

                        <div class="flex flex-wrap gap-2" id="categoryFilters">
                            <button
                                class="chip active rounded-lg px-3 py-2 text-[10px] sm:text-[11px] border border-[#111e2e] bg-[#111e2e] text-white transition"
                                data-category="all">همه</button>

                            <button
                                class="chip rounded-lg px-3 py-2 text-[10px] sm:text-[11px] border border-slate-200 bg-white text-slate-600 hover:border-[#111e2e] transition"
                                data-category="design">طراحی</button>

                            <button
                                class="chip rounded-lg px-3 py-2 text-[10px] sm:text-[11px] border border-slate-200 bg-white text-slate-600 hover:border-[#111e2e] transition"
                                data-category="tech">فناوری</button>

                            <button
                                class="chip rounded-lg px-3 py-2 text-[10px] sm:text-[11px] border border-slate-200 bg-white text-slate-600 hover:border-[#111e2e] transition"
                                data-category="shop">فروشگاه</button>

                            <button
                                class="chip rounded-lg px-3 py-2 text-[10px] sm:text-[11px] border border-slate-200 bg-white text-slate-600 hover:border-[#111e2e] transition"
                                data-category="education">آموزش</button>
                        </div>
                    </div>
                </aside>

                <!-- Results -->
                <div class="results-area min-w-0 order-2">

                    <div class="flex items-center justify-between gap-3 mb-4">
                        <p class="text-[11px] sm:text-[12px] text-slate-500">
                            <strong id="resultCount" class="text-[#142033]">۶</strong>
                            صفحه پیدا شد
                        </p>

                        <div class="flex items-center gap-1.5 text-[10px] sm:text-[11px] text-slate-400">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            صفحه‌های عمومی رینسو
                        </div>
                    </div>

                    <!-- Profile grid -->
                    <div id="profileGrid"
                        class="profile-grid grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">
                    </div>

                    <!-- Empty state -->
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

                    <!-- Load more -->
                    <div class="text-center mt-6 sm:mt-7">
                        <button id="loadMore"
                            class="bg-white border border-slate-200 hover:border-[#ff9018] hover:text-[#d97706] rounded-xl px-6 py-3 text-[11px] sm:text-[12px] font-semibold text-slate-600 transition">
                            نمایش صفحه‌های بیشتر
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
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
        const profiles = [
            {
                name: 'محمد افتخاری',
                user: '@mreftekhari',
                title: 'طراح و توسعه‌دهنده وب',
                desc: 'توسعه وب‌سایت و سیستم‌های اختصاصی با تمرکز بر راهکارهای کاربردی برای کسب‌وکارها.',
                kind: 'person',
                cat: 'tech',
                social: ['instagram', 'linkedin', 'website'],
                initial: 'م',
                tone: '#eaf0fb',
                color: '#294b7a',
                url: '#'
            },
            {
                name: 'طبابوک',
                user: '@tababook',
                title: 'دنیای کتاب و نوشت‌افزار',
                desc: 'انتخابی دوست‌داشتنی برای کتاب، لوازم‌التحریر و ابزارهای یادگیری.',
                kind: 'business',
                cat: 'shop',
                social: ['instagram', 'telegram', 'website'],
                initial: 'ط',
                tone: '#eaf4ed',
                color: '#397451',
                url: '#'
            },
            {
                name: 'استودیو دیزاین',
                user: '@designstudio',
                title: 'طراحی هویت بصری و برندینگ',
                desc: 'ایده‌ها رو به هویت بصری ماندگار و تجربه‌های متفاوت برای برندها تبدیل می‌کنیم.',
                kind: 'business',
                cat: 'design',
                social: ['instagram', 'website'],
                initial: 'د',
                tone: '#f1ebfa',
                color: '#7351a1',
                url: '#'
            },
            {
                name: 'لرن‌کد',
                user: '@learncode',
                title: 'آموزش برنامه‌نویسی',
                desc: 'مسیر یادگیری برنامه‌نویسی از مفاهیم پایه تا ساخت پروژه‌های واقعی.',
                kind: 'creator',
                cat: 'education',
                social: ['telegram', 'linkedin', 'website'],
                initial: 'ل',
                tone: '#fff1e3',
                color: '#b56b22',
                url: '#'
            },
            {
                name: 'آرمان رضایی',
                user: '@arman.business',
                title: 'مشاور توسعه کسب‌وکار',
                desc: 'کمک به کسب‌وکارها برای شناخت مسئله، طراحی مسیر رشد و بهبود فرایندها.',
                kind: 'person',
                cat: 'tech',
                social: ['instagram', 'linkedin'],
                initial: 'آ',
                tone: '#e9f3f5',
                color: '#39727c',
                url: '#'
            },
            {
                name: 'خانه سبز',
                user: '@khanehsabz',
                title: 'فروشگاه محصولات خانه',
                desc: 'محصولات کاربردی و زیبا برای ساختن خانه‌ای گرم‌تر و دلنشین‌تر.',
                kind: 'business',
                cat: 'shop',
                social: ['instagram', 'website'],
                initial: 'خ',
                tone: '#edf3e7',
                color: '#648044',
                url: '#'
            }
        ];

        const labels = {
            instagram: 'اینستاگرام',
            telegram: 'تلگرام',
            linkedin: 'لینکدین',
            website: 'وب‌سایت'
        };

        const icons = {
            instagram: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <rect x="3" y="3" width="18" height="18" rx="5"/>
            <circle cx="12" cy="12" r="4"/>
            <path d="M17.5 6.5h.01"/>
        </svg>
    `,
            telegram: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <path d="m21 3-7.2 18-3.8-7-7-3.8L21 3Z"/>
            <path d="m10 14 5-5"/>
        </svg>
    `,
            linkedin: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <path d="M5 9v10M5 5v.01M10 19v-6a4 4 0 0 1 8 0v6M10 9v10"/>
        </svg>
    `,
            website: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <circle cx="12" cy="12" r="9"/>
            <path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/>
        </svg>
    `
        };

        const grid = document.getElementById('profileGrid');

        const normalize = s =>
            String(s || '')
                .toLocaleLowerCase('fa')
                .replace(/[يى]/g, 'ی')
                .replace(/ك/g, 'ک')
                .replace(/[\u200c]/g, ' ')
                .trim();


        function render() {

            const q = normalize(document.getElementById('searchInput').value);

            const kind = document.querySelector('input[name="kind"]:checked').value;

            const socials = [
                ...document.querySelectorAll('.social-filter:checked')
            ].map(x => x.value);

            const category = document.querySelector('#categoryFilters .active').dataset.category;

            let items = profiles.filter(p => {

                const hay = normalize([
                    p.name,
                    p.user,
                    p.title,
                    p.desc,
                    p.social.join(' '),
                    p.url
                ].join(' '));

                return (
                    (!q || hay.includes(q)) &&
                    (kind === 'all' || p.kind === kind) &&
                    (!socials.length || socials.every(s => p.social.includes(s))) &&
                    (category === 'all' || p.cat === category)
                );
            });

            if (document.getElementById('sortSelect').value === 'name') {
                items.sort((a, b) => a.name.localeCompare(b.name, 'fa'));
            }

            document.getElementById('resultCount').textContent =
                new Intl.NumberFormat('fa-IR').format(items.length);

            document.getElementById('emptyState').classList.toggle('hidden', items.length !== 0);

            document.getElementById('profileGrid').classList.toggle('hidden', items.length === 0);

            grid.innerHTML = items.map(p => `

        <article class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 min-w-0 transition duration-200 hover:-translate-y-1 hover:border-slate-300 hover:shadow-[0_15px_35px_rgba(20,32,51,0.08)]">

            <div class="flex items-start justify-between gap-2">

                <div class="flex items-center gap-3 min-w-0">

                    <div
                        class="grid place-items-center shrink-0 w-11 h-11 sm:w-[54px] sm:h-[54px] rounded-xl sm:rounded-[17px] text-base sm:text-[19px] font-extrabold"
                        style="background:${p.tone};color:${p.color}"
                    >
                        ${p.initial}
                    </div>

                    <div class="min-w-0">

                        <h3 class="font-bold text-[12px] sm:text-[14px] text-[#142033] truncate">
                            ${p.name}
                        </h3>

                        <p dir="ltr" class="text-left text-[10px] sm:text-[11px] text-slate-400 mt-1 truncate">
                            ${p.user}
                        </p>

                    </div>
                </div>

                <span class="shrink-0 text-[9px] sm:text-[10px] rounded-full bg-slate-50 text-slate-500 px-2 py-1.5">
                    ${p.kind === 'person' ? 'شخصی' : p.kind === 'business' ? 'کسب‌وکار' : 'تولید محتوا'}
                </span>

            </div>

            <h4 class="font-bold text-[11px] sm:text-[12px] text-slate-700 mt-4 sm:mt-5">
                ${p.title}
            </h4>

            <p class="text-[10px] sm:text-[11px] leading-6 text-slate-500 mt-2 min-h-[48px]">
                ${p.desc}
            </p>

            <div class="border-t border-slate-100 mt-4 pt-3 flex items-center justify-between gap-2">

                <div class="flex gap-1.5">
                    ${p.social.map(s => `
                        <span
                            class="grid place-items-center w-8 h-8 rounded-lg bg-[#f4f6f8] text-slate-600"
                            title="${labels[s]}"
                        >
                            <span class="w-4 h-4">
                                ${icons[s]}
                            </span>
                        </span>
                    `).join('')}
                </div>

                <a
                    href="${p.url}"
                    class="text-[10px] sm:text-[11px] font-bold text-[#d97706] hover:text-[#142033] whitespace-nowrap transition"
                >
                    مشاهده صفحه
                    <span class="mr-1">←</span>
                </a>

            </div>

        </article>

    `).join('');
        }


        function clearAll() {

            document.getElementById('searchInput').value = '';

            document.querySelector('input[name="kind"][value="all"]').checked = true;

            document.querySelectorAll('.social-filter').forEach(x => {
                x.checked = false;
            });

            document.querySelectorAll('#categoryFilters .chip').forEach(x => {

                const active = x.dataset.category === 'all';

                x.classList.toggle('active', active);

                x.classList.toggle('bg-[#111e2e]', active);
                x.classList.toggle('text-white', active);
                x.classList.toggle('border-[#111e2e]', active);

                x.classList.toggle('bg-white', !active);
                x.classList.toggle('text-slate-600', !active);
                x.classList.toggle('border-slate-200', !active);

            });

            render();
        }


        // Search
        document.getElementById('searchInput').addEventListener('input', render);

        document.getElementById('searchBtn').addEventListener('click', render);


        // Sort
        document.getElementById('sortSelect').addEventListener('change', render);


        // Filters
        document.querySelectorAll('input[name="kind"],.social-filter').forEach(x => {
            x.addEventListener('change', render);
        });


        // Category filters
        document.querySelectorAll('#categoryFilters .chip').forEach(b => {

            b.addEventListener('click', () => {

                document.querySelectorAll('#categoryFilters .chip').forEach(x => {

                    const active = x === b;

                    x.classList.toggle('active', active);

                    x.classList.toggle('bg-[#111e2e]', active);
                    x.classList.toggle('text-white', active);
                    x.classList.toggle('border-[#111e2e]', active);

                    x.classList.toggle('bg-white', !active);
                    x.classList.toggle('text-slate-600', !active);
                    x.classList.toggle('border-slate-200', !active);

                });

                render();

            });

        });


        // Popular searches
        document.querySelectorAll('.suggest').forEach(b => {

            b.addEventListener('click', () => {

                document.getElementById('searchInput').value = b.dataset.q;

                render();

                document.getElementById('searchInput').focus();

            });

        });


        // Clear filters
        document.getElementById('clearFilters').addEventListener('click', clearAll);

        document.getElementById('emptyClear').addEventListener('click', clearAll);


        // Load more
        document.getElementById('loadMore').addEventListener('click', () => {

            alert('در نسخه متصل به لاراول، صفحه‌بندی نتایج از سرور بارگذاری می‌شود.');

        });


        // Initial render
        render();

    </script>

@endsection
