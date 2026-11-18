@extends('client.document')

@section('title')
    رینسو | فرم شناخت کسب و کار
@endsection

@section('content')

    <style>
        body {
            background: #f5f7fb;
            color: #172B4D;
        }

        :root {
            --navy: #101F38;
            --navy-2: #172B4D;
            --orange: #FF9D16;
            --orange-light: #FFB13B;
        }

        .form-card {
            background: #fff;
            border: 1px solid #e8edf4;
            border-radius: 22px;
            box-shadow: 0 12px 40px rgba(16, 31, 56, .045);
        }

        .field-label {
            display: block;
            font-size: 13px;
            color: #334155;
            margin-bottom: 9px;
        }

        .field-input {
            width: 100%;
            min-height: 48px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            padding: 11px 14px;
            font-size: 13px;
            outline: none;
            transition: .2s;
        }

        .field-input:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(255, 157, 22, .12);
        }

        .field-input::placeholder {
            color: #a0aabb;
        }

        textarea.field-input {
            min-height: 105px;
            resize: vertical;
        }

        .step-item {
            position: relative;
        }

        .step-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #edf1f6;
            color: #64748b;
            font-size: 12px;
            font-weight: bold;
            transition: .2s;
        }

        .step-item.active .step-circle,
        .step-item.completed .step-circle {
            background: var(--navy);
            color: #fff;
        }

        .step-item.active .step-circle {
            outline: 4px solid #e8edf5;
        }

        .step-item.active .step-name {
            color: var(--navy);
            font-weight: bold;
        }

        .step-name {
            font-size: 11px;
            color: #94a3b8;
            white-space: nowrap;
        }

        .step-panel {
            display: none;
            overflow: visible !important;
        }

        .step-panel.active {
            display: block;
            animation: fadeIn .25s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(7px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .choice-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s;
            font-size: 13px;
        }

        .choice-card:has(input:checked) {
            border-color: var(--orange);
            background: #fff9ef;
        }

        .choice-card input {
            accent-color: var(--orange);
        }

        .primary-btn {
            background: var(--navy);
            color: #fff;
            border-radius: 12px;
            padding: 12px 25px;
            font-size: 13px;
            font-weight: bold;
            transition: .2s;
        }

        .primary-btn:hover {
            background: #1c355b;
        }

        .secondary-btn {
            border: 1px solid #e2e8f0;
            background: white;
            color: #475569;
            border-radius: 12px;
            padding: 12px 22px;
            font-size: 13px;
        }

        .seller-card {
            border: 1px solid #e8edf4;
            border-radius: 15px;
            padding: 17px;
            background: #fbfcfe;
        }

        .error-text {
            color: #dc2626;
            font-size: 11px;
            margin-top: 6px;
        }

        .step-item {
            cursor: pointer;
        }

        @media(max-width:640px) {
            .step-name {
                display: none;
            }

            .step-circle {
                width: 30px;
                height: 30px;
            }
        }

        .az-datepicker,
        .azar-datepicker,
        .datepicker-container,
        .datepicker-wrapper {
            z-index: 99999 !important;
        }

        @media (max-width: 1023px) {
            #businessLeadForm {
                padding-bottom: calc(115px + env(safe-area-inset-bottom));
            }

            #businessLeadForm>div:last-child {
                position: sticky;
                bottom: calc(90px + env(safe-area-inset-bottom));
                z-index: 100;
                background: #f5f7fb;
                padding: 12px 0;
                margin-top: 20px;
            }
        }

        @media (min-width: 1024px) {
            #businessLeadForm {
                padding-bottom: 0;
            }
        }
    </style>

    <div class="max-w-5xl mx-auto mt-5 lg:mt-10">

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-5 text-sm">
                <p class="font-bold mb-2">لطفاً موارد زیر را بررسی کنید:</p>
                <ul class="list-disc pr-5 space-y-1 text-xs">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-5 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-5 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- Progress -->
        <section class="form-card p-4 sm:p-6 mb-5">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-700" id="stepTitle">اطلاعات فردی</span>
                <span class="text-xs text-slate-400" id="stepCounter">مرحله ۱ از ۸</span>
            </div>

            <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden mb-5">
                <div id="progressBar" class="h-full rounded-full transition-all duration-300"
                    style="width:12.5%;background:var(--orange)">
                </div>
            </div>

            <div class="flex items-center justify-between gap-1" id="stepIndicators">

                @php
                    $steps = [
                        'اطلاعات فردی',
                        'کسب‌وکار',
                        'شبکه‌ها',
                        'فروشندگان',
                        'مشتریان',
                        'چالش‌ها',
                        'همکاری',
                        'معرفی افراد',
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="step-item {{ $index === 0 ? 'active' : '' }} flex flex-col items-center gap-2"
                        data-step-indicator="{{ $index }}">
                        <span class="step-circle">{{ $index + 1 }}</span>
                        <span class="step-name">{{ $step }}</span>
                    </div>
                @endforeach

            </div>
        </section>

        <form action="{{ route('business-leads.store') }}" method="POST" id="businessLeadForm">
            @csrf

            <input type="hidden" name="team" value="{{ $team ?? '' }}">

            <!-- STEP 1: Personal -->
            <section class="step-panel active form-card p-5 sm:p-8" data-step="0">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">اطلاعات فردی</h3>
                    <p class="text-xs text-slate-400 mt-2 hidden">
                        ابتدا کمی با شما و فعالیت حرفه‌ای‌تان آشنا شویم.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">

                    <div>
                        <label class="field-label">نام <span class="text-red-500">*</span></label>
                        <input class="field-input" name="first_name" value="{{ old('first_name') }}" required
                            placeholder="نام خود را وارد کنید">

                        @error('first_name')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="field-label">نام خانوادگی <span class="text-red-500">*</span></label>
                        <input class="field-input" name="last_name" value="{{ old('last_name') }}" required
                            placeholder="نام خانوادگی">

                        @error('last_name')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="field-label">شماره تلفن همراه <span class="text-red-500">*</span></label>
                        <input class="field-input in-fa" name="phone" value="{{ old('phone') }}" required inputmode="tel"
                            placeholder="مثلاً 09123456789">

                        @error('phone')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="field-label">تاریخ تولد</label>
                        <input type="text" class="field-input in-fa" name="birth_date" value="{{ old('birth_date') }}"
                            placeholder="مثلاً 1381/12/06" dir="ltr">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="field-label">عنوان دقیق شغلی <span class="text-red-500">*</span></label>
                        <input class="field-input" name="job_title" value="{{ old('job_title') }}" required
                            placeholder="مثلاً مدیر فروشگاه پوشاک، تولیدکننده محصولات چرمی و ...">

                        @error('job_title')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </section>

            <!-- STEP 2: Business -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="1">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">اطلاعات کسب‌وکار</h3>
                    <p class="text-xs text-slate-400 mt-2 hidden">
                        می‌خواهیم با ساختار و سابقه فعالیت شما آشنا شویم.
                    </p>
                </div>

                <div class="space-y-7">

                    <div>
                        <label class="field-label">چه مدت است در این حوزه فعالیت می‌کنید؟</label>
                        <input class="field-input" name="business_age" value="{{ old('business_age') }}"
                            placeholder="مثلاً کمتر از یک سال، ۳ سال، از سال ۱۳۹۸">
                    </div>

                    <div class="border-t border-slate-100 pt-6">
                        <label class="field-label">آیا محل یا مغازه فیزیکی دارید؟</label>

                        <div class="grid grid-cols-2 gap-3">
                            <label class="choice-card">
                                <input type="radio" name="has_store" value="1" class="conditional-radio"
                                    data-target="storeFields" {{ old('has_store') === '1' ? 'checked' : '' }}>
                                بله، دارم
                            </label>

                            <label class="choice-card">
                                <input type="radio" name="has_store" value="0" class="conditional-radio"
                                    data-target="storeFields" {{ old('has_store') === '0' ? 'checked' : '' }}>
                                خیر
                            </label>
                        </div>

                        <div id="storeFields" class="mt-4 {{ old('has_store') === '1' ? '' : 'hidden' }}">

                            <label class="field-label">آدرس محل کسب‌وکار</label>
                            <textarea class="field-input" name="store_address" placeholder="استان، شهر، خیابان و آدرس دقیق">{{ old('store_address') }}</textarea>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-6">
                        <label class="field-label">آیا وب‌سایت دارید؟</label>

                        <div class="grid grid-cols-2 gap-3">
                            <label class="choice-card">
                                <input type="radio" name="has_website" value="1" class="conditional-radio"
                                    data-target="websiteFields" {{ old('has_website') === '1' ? 'checked' : '' }}>
                                بله، دارم
                            </label>

                            <label class="choice-card">
                                <input type="radio" name="has_website" value="0" class="conditional-radio"
                                    data-target="websiteFields" {{ old('has_website') === '0' ? 'checked' : '' }}>
                                خیر
                            </label>
                        </div>

                        <div id="websiteFields"
                            class="mt-4 grid sm:grid-cols-2 gap-4 {{ old('has_website') === '1' ? '' : 'hidden' }}">

                            <div>
                                <label class="field-label">آدرس وب‌سایت</label>
                                <input class="field-input" name="website_url" value="{{ old('website_url') }}"
                                    placeholder="https://example.com" dir="ltr">
                            </div>

                            <div>
                                <label class="field-label">چه مدت است وب‌سایت دارید؟</label>
                                <input class="field-input" name="website_age" value="{{ old('website_age') }}"
                                    placeholder="مثلاً ۲ سال">
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- STEP 3: Socials -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="2">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">شبکه‌های اجتماعی</h3>
                    <p class="text-xs text-slate-400 mt-2 hidden">
                        آدرس صفحات و کانال‌های فعال کسب‌وکارتان را وارد کنید.
                    </p>
                </div>

                <div class="space-y-4">

                    @php
                        $platforms = [
                            'telegram' => 'تلگرام',
                            'instagram' => 'اینستاگرام',
                            'eitaa' => 'ایتا',
                            'rubika' => 'روبیکا',
                            'bale' => 'بله',
                            'linkedin' => 'لینکدین',
                        ];
                    @endphp

                    @foreach ($platforms as $key => $label)
                        <div class="grid sm:grid-cols-3 gap-3 items-center">

                            <div class="text-sm font-bold text-slate-600">
                                {{ $label }}
                            </div>

                            <div class="sm:col-span-2">
                                <input type="hidden" name="socials[{{ $loop->index }}][platform]"
                                    value="{{ $key }}">

                                <input class="field-input" name="socials[{{ $loop->index }}][address]"
                                    value="{{ old('socials.' . $loop->index . '.address') }}"
                                    placeholder="آدرس یا شناسه {{ $label }}" dir="ltr">
                            </div>

                        </div>
                    @endforeach

                </div>

                <p class="text-[11px] text-slate-400 mt-5">
                    شبکه‌هایی که در آن‌ها فعالیت ندارید، خالی بگذارید.
                </p>

            </section>

            <!-- STEP 4: Team -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="3">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">
                        وضعیت نیروهای کسب‌وکار
                    </h3>
                </div>

                <div class="space-y-7">

                    <div>
                        <label class="field-label">
                            آیا در کسب‌وکار خود فروشنده دارید؟
                        </label>

                        <div class="grid grid-cols-2 gap-3">

                            <label class="choice-card">
                                <input type="radio" name="has_sellers" value="1"
                                    {{ old('has_sellers') === '1' ? 'checked' : '' }}>
                                بله، فروشنده دارم
                            </label>

                            <label class="choice-card">
                                <input type="radio" name="has_sellers" value="0"
                                    {{ old('has_sellers') === '0' ? 'checked' : '' }}>
                                خیر
                            </label>

                        </div>
                    </div>

                    <div class="border-t border-slate-100"></div>

                    <div>
                        <label class="field-label">
                            آیا برای مدیریت پیج یا وب‌سایت خود ادمین دارید؟
                        </label>

                        <div class="grid grid-cols-2 gap-3">

                            <label class="choice-card">
                                <input type="radio" name="has_admin" value="1"
                                    {{ old('has_admin') === '1' ? 'checked' : '' }}>
                                بله، ادمین دارم
                            </label>

                            <label class="choice-card">
                                <input type="radio" name="has_admin" value="0"
                                    {{ old('has_admin') === '0' ? 'checked' : '' }}>
                                خیر
                            </label>

                        </div>
                    </div>

                </div>
            </section>

            <!-- STEP 5: Customers -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="4">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">شناخت مشتریان</h3>
                    <p class="text-xs text-slate-400 mt-2 hidden">
                        اطلاعات مشتریان و رفتار خرید آن‌ها را بررسی کنیم.
                    </p>
                </div>

                <div class="space-y-7">

                    <div>
                        <label class="field-label">
                            آیا اطلاعات مشتریان خود را در جایی ذخیره می‌کنید؟
                        </label>

                        <div class="grid grid-cols-2 gap-3">

                            <label class="choice-card">
                                <input type="radio" name="stores_customer_data" value="1"
                                    {{ old('stores_customer_data') === '1' ? 'checked' : '' }}>
                                بله
                            </label>

                            <label class="choice-card">
                                <input type="radio" name="stores_customer_data" value="0"
                                    {{ old('stores_customer_data') === '0' ? 'checked' : '' }}>
                                خیر
                            </label>

                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-6">

                        <label class="field-label">
                            تقریباً چند درصد از مشتریان شما خرید تکراری دارند؟
                        </label>

                        <div class="grid sm:grid-cols-2 gap-4 items-center">

                            <div>
                                <input type="number" min="0" max="100" id="repeatPercent"
                                    name="repeat_purchase_percent in-fa" value="{{ old('repeat_purchase_percent') }}"
                                    class="field-input" placeholder="مثلاً ۳۰">
                            </div>

                            <label class="choice-card">
                                <input type="checkbox" name="repeat_purchase_unknown" value="1" id="repeatUnknown"
                                    {{ old('repeat_purchase_unknown') ? 'checked' : '' }}>
                                آمار دقیقی ندارم
                            </label>

                        </div>

                        <p class="text-[11px] text-slate-400 mt-2">
                            در صورت انتخاب «آمار دقیقی ندارم»، نیازی به وارد کردن درصد نیست.
                        </p>

                    </div>

                </div>
            </section>

            <!-- STEP 6: Challenges -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="5">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">
                        چالش‌های کسب‌وکار
                    </h3>
                </div>

                <div class="space-y-6">

                    <div>
                        <label class="field-label in-fa">
                            چه مشغله‌هایی باعث شده برای راه‌اندازی یا توسعه پیج و وب‌سایت وقت نداشته باشید؟
                        </label>

                        <textarea class="field-input" name="digital_obstacles"
                            placeholder="مشغله‌های روزمره، مدیریت مجموعه، تأمین کالا و ...">{{ old('digital_obstacles') }}</textarea>
                    </div>

                    <div>
                        <label class="field-label">
                            دلیل اصلی کمبود وقت برای مدیریت پیج یا وب‌سایت چیست؟
                        </label>

                        <textarea class="field-input in-fa" name="time_constraints" placeholder="توضیح دهید چه چیزی بیشترین زمان شما را می‌گیرد.">{{ old('time_constraints') }}</textarea>
                    </div>

                    <div class="border-t border-slate-100 pt-6">

                        <label class="field-label">
                            حداقل سه مشکل اساسی که مانع فروش بیشتر شما هستند چیست؟
                        </label>

                        <p class="text-[11px] text-slate-400 mb-4">
                            در صورت تمایل، سه مورد از مهم‌ترین مشکلات کسب‌وکار خود را بنویسید.
                        </p>

                        <div class="space-y-3">

                            @for ($i = 0; $i < 3; $i++)
                                <div class="flex items-center gap-3">

                                    <span
                                        class="w-7 h-7 rounded-lg bg-slate-100 text-slate-500 text-xs grid place-items-center shrink-0">
                                        {{ $i + 1 }}
                                    </span>

                                    <input type="text" class="field-input in-fa" name="sales_problems[]"
                                        value="{{ old('sales_problems.' . $i) }}"
                                        placeholder="مشکل شماره {{ $i + 1 }}">

                                </div>
                            @endfor

                        </div>

                    </div>

                </div>
            </section>

            <!-- STEP 7: Cooperation -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="6">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">
                        ارزش پیشنهادی و زمینه همکاری
                    </h3>
                    <p class="text-xs text-slate-400 mt-2 hidden">
                        در پایان، مزیت‌های کسب‌وکار و حوزه‌های مورد علاقه‌تان را مشخص کنید.
                    </p>
                </div>

                <div class="space-y-7">

                    <div>
                        <label class="field-label">
                            سه دلیل اصلی که مشتری باید شما را انتخاب کند چیست؟
                        </label>

                        <p class="text-[11px] text-slate-400 mb-4">
                            سه ارزش یا مزیت مهم کسب‌وکارتان را بنویسید.
                        </p>

                        <div class="space-y-3">

                            @for ($i = 0; $i < 3; $i++)
                                <div class="flex items-center gap-3">

                                    <span class="w-7 h-7 rounded-lg grid place-items-center shrink-0 text-xs in-fa"
                                        style="background:#fff4e4;color:#bd6c00">
                                        {{ $i + 1 }}
                                    </span>

                                    <input class="field-input in-fa" name="value_propositions[]"
                                        value="{{ old('value_propositions.' . $i) }}"
                                        placeholder="مزیت پیشنهادی شماره {{ $i + 1 }}">

                                </div>
                            @endfor

                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-6">

                        <label class="field-label">
                            در چه زمینه‌هایی تمایل به همکاری با تیم ما دارید؟
                        </label>

                        <div class="grid sm:grid-cols-2 gap-3">

                            @php
                                $cooperationOptions = [
                                    'طراحی و توسعه وب‌سایت',
                                    'طراحی فروشگاه اینترنتی',
                                    'طراحی و پیاده‌سازی CRM',
                                    'مشاوره و طراحی کسب‌وکار',
                                    'بازاریابی و فروش',
                                    'مدیریت شبکه‌های اجتماعی',
                                    'برندسازی و هویت بصری',
                                    'اتوماسیون و هوشمندسازی',
                                ];
                            @endphp

                            @foreach ($cooperationOptions as $option)
                                <label class="choice-card">

                                    <input type="checkbox" class="in-fa" name="cooperations[]" value="{{ $option }}"
                                        {{ in_array($option, old('cooperations', [])) ? 'checked' : '' }}>

                                    {{ $option }}

                                </label>
                            @endforeach

                        </div>
                    </div>

                    <div class="rounded-xl p-4" style="background:#f8fafc">
                        <p class="text-xs text-slate-500 leading-6">
                            از وقتی که برای تکمیل این فرم گذاشتید سپاسگزاریم.
                            پاسخ‌های شما به ما کمک می‌کند پیشنهادهای دقیق‌تر و کاربردی‌تری برای رشد کسب‌وکارتان ارائه کنیم.
                        </p>
                    </div>

                </div>
            </section>

            <!-- STEP 8: Referrals -->
            <section class="step-panel form-card p-5 sm:p-8" data-step="7">

                <div class="mb-7">
                    <h3 class="font-bold text-lg" style="color:var(--navy)">
                        معرفی افراد
                    </h3>

                    <p class="text-xs text-slate-400 mt-2">
                        شاید بتوانیم به افراد بیشتری برای توسعه کسب‌وکارشان کمک کنیم.
                    </p>
                </div>

                <div class="rounded-xl p-4 mb-6" style="background:#fff9ef">
                    <p class="text-sm leading-7" style="color:#8b5a16">
                        اگر افرادی را می‌شناسید که به خدمات طراحی وب‌سایت یا توسعه کسب‌وکار نیاز دارند،
                        می‌توانید مشخصات آن‌ها را با ما به اشتراک بگذارید.
                    </p>
                    <p class="text-xs mt-2" style="color:#a16b20">
                        تکمیل این بخش کاملاً اختیاری است.
                    </p>
                </div>

                <div class="space-y-5">

                    @for ($i = 0; $i < 3; $i++)
                        <div class="seller-card">

                            <div class="flex items-center gap-2 mb-4">
                                <span class="w-8 h-8 rounded-lg grid place-items-center text-xs font-bold in-fa"
                                    style="background:#fff0d9;color:#bd6c00">
                                    {{ $i + 1 }}
                                </span>

                                <span class="text-sm font-bold text-slate-700 in-fa">
                                    فرد معرفی‌شده {{ $i + 1 }}
                                </span>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">

                                <div>
                                    <label class="field-label">
                                        نام و نام خانوادگی
                                    </label>

                                    <input type="text" class="field-input in-fa"
                                        name="referrals[{{ $i }}][name]"
                                        value="{{ old('referrals.' . $i . '.name') }}" placeholder="نام و نام خانوادگی">

                                    @error("referrals.$i.name")
                                        <p class="error-text">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="field-label">
                                        شماره تلفن همراه
                                    </label>

                                    <input type="tel" class="field-input in-fa"
                                        name="referrals[{{ $i }}][phone]"
                                        value="{{ old('referrals.' . $i . '.phone') }}" inputmode="tel"
                                        placeholder="مثلاً 09123456789" dir="ltr">

                                    @error("referrals.$i.phone")
                                        <p class="error-text">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    @endfor

                </div>

            </section>

            <!-- Navigation -->
            <div class="w-11/12 mx-auto flex items-center justify-between gap-3 mt-5">

                <button type="button" id="prevStep" class="secondary-btn hidden">
                    مرحله قبل
                </button>

                <span class="flex-1"></span>

                <button type="button" id="nextStep" class="primary-btn">
                    مرحله بعد
                </button>

                <button type="submit" id="submitForm" class="primary-btn hidden"
                    style="background:var(--orange);color:#172B4D">
                    ثبت اطلاعات کسب‌وکار
                </button>

            </div>

        </form>

        <footer class="text-center text-[11px] text-slate-400 mt-8">
            طراحی و توسعه با رینسو
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/gh/saeedvir/azar-datepicker@latest/datepicker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // -----------------------------
            // Multi-step form
            // -----------------------------

            const form = document.getElementById('businessLeadForm');

            const panels = [...document.querySelectorAll('.step-panel')];
            const indicators = [...document.querySelectorAll('[data-step-indicator]')];

            const titles = [
                'اطلاعات فردی',
                'اطلاعات کسب‌وکار',
                'شبکه‌های اجتماعی',
                'وضعیت نیروهای کسب‌وکار',
                'شناخت مشتریان',
                'چالش‌های کسب‌وکار',
                'ارزش پیشنهادی و همکاری',
                'معرفی افراد'
            ];

            let currentStep = 0;

            const prevButton = document.getElementById('prevStep');
            const nextButton = document.getElementById('nextStep');
            const submitButton = document.getElementById('submitForm');

            function showStep(index) {

                currentStep = index;

                panels.forEach((panel, i) => {
                    panel.classList.toggle('active', i === index);
                });

                indicators.forEach((item, i) => {
                    item.classList.toggle('active', i === index);
                    item.classList.toggle('completed', i < index);
                });

                document.getElementById('stepTitle').textContent = titles[index];

                document.getElementById('stepCounter').textContent =
                    `مرحله ${index + 1} از ${panels.length}`;

                document.getElementById('progressBar').style.width =
                    `${((index + 1) / panels.length) * 100}%`;

                prevButton.classList.toggle('hidden', index === 0);

                nextButton.classList.toggle(
                    'hidden',
                    index === panels.length - 1
                );

                submitButton.classList.toggle(
                    'hidden',
                    index !== panels.length - 1
                );

                const formTop =
                    form.getBoundingClientRect().top + window.scrollY;

                window.scrollTo({
                    top: Math.max(0, formTop - 15),
                    behavior: 'smooth'
                });
            }

            // فقط مرحله اول اعتبارسنجی می‌شود.
            function validateFirstStep() {

                const firstPanel = panels[0];

                const requiredFields =
                    firstPanel.querySelectorAll('[required]');

                for (const field of requiredFields) {

                    if (!field.checkValidity()) {

                        showStep(0);

                        setTimeout(() => {
                            field.reportValidity();
                            field.focus();
                        }, 100);

                        return false;
                    }
                }

                return true;
            }

            nextButton.addEventListener('click', function() {

                if (currentStep === 0 && !validateFirstStep()) {
                    return;
                }

                if (currentStep < panels.length - 1) {
                    showStep(currentStep + 1);
                }

            });

            prevButton.addEventListener('click', function() {

                if (currentStep > 0) {
                    showStep(currentStep - 1);
                }

            });

            indicators.forEach((indicator, index) => {

                indicator.addEventListener('click', function() {

                    // برای رفتن به مراحل بعدی فقط مرحله اول باید معتبر باشد.
                    if (index > currentStep && !validateFirstStep()) {
                        return;
                    }

                    showStep(index);

                });

            });

            // -----------------------------
            // Final submission
            // -----------------------------

            form.addEventListener('submit', function(event) {

                if (!validateFirstStep()) {

                    event.preventDefault();
                    showStep(0);

                }

            });

            // -----------------------------
            // Conditional sections
            // -----------------------------

            document.querySelectorAll('.conditional-radio').forEach(radio => {

                radio.addEventListener('change', function() {

                    const target = document.getElementById(this.dataset.target);

                    const checked = document.querySelector(
                        `input[name="${this.name}"]:checked`
                    );

                    if (target) {
                        target.classList.toggle(
                            'hidden',
                            !checked || checked.value !== '1'
                        );
                    }

                });

            });

            // -----------------------------
            // Repeat purchase percentage
            // -----------------------------

            const repeatUnknown =
                document.getElementById('repeatUnknown');

            const repeatPercent =
                document.getElementById('repeatPercent');

            function toggleRepeatPercent() {

                repeatPercent.disabled = repeatUnknown.checked;

                if (repeatUnknown.checked) {
                    repeatPercent.value = '';
                }

            }

            repeatUnknown.addEventListener('change', toggleRepeatPercent);

            toggleRepeatPercent();

            // -----------------------------
            // Datepicker
            // -----------------------------

            window.initializeDatepickers = function(scope = document) {

                if (typeof AzarDatepicker === 'undefined') {
                    return;
                }

                scope.querySelectorAll('.js-date-picker').forEach(input => {

                    if (input.dataset.initialized === '1') {
                        return;
                    }

                    input.dataset.initialized = '1';

                    const hiddenInput = document.getElementById(
                        input.dataset.hiddenTarget
                    );

                    new AzarDatepicker({

                        selector: input,
                        calendar: 'jalali',
                        mode: 'date',
                        rtl: true,
                        inputFormat: 'YYYY/MM/DD',
                        outputFormat: 'YYYY-MM-DD',

                        onSelect: function(data) {

                            if (hiddenInput) {
                                hiddenInput.value = data.iso ?
                                    data.iso.substring(0, 10) :
                                    '';
                            }

                        },

                        onClear: function() {

                            if (hiddenInput) {
                                hiddenInput.value = '';
                            }

                        }

                    });

                });

            };

            initializeDatepickers();

            // -----------------------------
            // Initial state
            // -----------------------------

            showStep(0);

        });
    </script>

@endsection
