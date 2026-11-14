{{-- Mobile Bottom Navigation --}}
<style>
    #install-prompt {
        display: none !important;
    }

    @media (min-width: 1024px) {
        .mobile-bottom-nav {
            display: none !important;
        }
    }
</style>
<div id="popupQr"
    class="fixed inset-0 z-[120] bg-[#101d3b]/70 backdrop-blur-sm flex justify-center items-center invisible opacity-0 transition-all duration-300">
    <div
        class="relative w-11/12 max-w-md min-h-64 bg-white rounded-2xl p-5 flex justify-center items-center scale-95 transition-all duration-300">
        <div id="loading"
            class="absolute inset-0 bg-white rounded-2xl flex justify-center items-center invisible opacity-0 z-10">
        </div>
        <button type="button" onclick="scanQr('close')"
            class="absolute top-3 right-3 size-9 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center z-20 hover:bg-orange-100 transition cursor-pointer">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" d="m18 6-12 12M6 6l12 12" />
            </svg>
        </button>
        <div id="reader" class="w-full h-full"></div>
    </div>
</div>
<footer dir="rtl"
    class="mobile-bottom-nav fixed bottom-0 left-0 w-full z-[999]
           px-3 pb-[calc(10px+env(safe-area-inset-bottom))]
           pt-3">

    <div class="relative max-w-[520px] mx-auto">

        <div
            class="relative h-[70px] bg-white rounded-[24px]
                    border border-slate-100
                    shadow-[0_-5px_35px_rgba(20,32,51,0.12)]
                    flex items-center justify-around px-2">

            {{-- خانه --}}
            <a href="{{ route('home') }}" id="homeIcon"
                class="flex-1 h-full flex flex-col items-center
                       justify-center gap-1.5 transition-all">

                <svg viewBox="0 0 24 24" class="size-[22px]" fill="none"
                    stroke="{{ Route::is('home') ? '#FF9018' : '#94A3B8' }}" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z" />
                </svg>

                <span
                    class="text-[10px] font-bold
                    {{ Route::is('home') ? 'text-[#FF9018]' : 'text-slate-400' }}">
                    خانه
                </span>
            </a>


            {{-- علاقه مندی --}}
            <div
                class="flex-1 h-full flex flex-col items-center
                       justify-center gap-1.5 cursor-pointer">

                <svg viewBox="0 0 24 24" class="size-[22px]" fill="none" stroke="#94A3B8" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.8-7.5 1.1-1.1a5.5 5.5 0 0 0-.1-7.8z" />
                </svg>

                <span class="text-[10px] font-medium text-slate-400">
                    علاقه‌مندی
                </span>
            </div>


            {{-- اسکنر مرکزی --}}
            <div class="flex-1 h-full flex justify-center relative" onclick="scanQr('open')">

                <div id="qrIcon"
                    class="absolute -top-[27px] flex flex-col
                           items-center gap-1.5 cursor-pointer">

                    <div
                        class="size-[54px] rounded-[19px]
                                bg-[#FF9018]
                                border-[5px] border-white
                                shadow-[0_5px_15px_rgba(255,144,24,0.35)]
                                flex items-center justify-center
                                transition-all duration-200">

                        <svg viewBox="0 0 24 24" class="size-[23px]" fill="none" stroke="white" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">

                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <path d="M14 14h3v3h-3zM20 14v2M14 20h2M20 20v1" />
                        </svg>

                    </div>

                    <span class="text-[10px] font-bold text-[#FF9018]">
                        اسکنر
                    </span>

                </div>
            </div>


            {{-- سفارشات --}}
            <div class="flex-1 h-full flex flex-col items-center
                       justify-center gap-1.5 cursor-pointer relative"
                @if (Route::is('client.menu') && Auth::check() && isset($orders) && count($orders)) onclick="orders('open')" @endif id="orderLink">

                @if (Route::is('client.menu'))
                    <span
                        class="absolute top-2 right-1/2 translate-x-1/2
                        size-1.5 rounded-full bg-[#FF9018]
                        {{ Auth::check() && isset($orders) && count($orders) ? 'scale-100' : 'scale-0' }}">
                    </span>
                @endif

                <svg viewBox="0 0 24 24" class="size-[22px]" fill="none" stroke="#94A3B8" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 3h12v18l-2-1.5L12 21l-4-1.5L6 21z" />
                    <path d="M9 8h6M9 12h6M9 16h3" />
                </svg>

                <span class="text-[10px] font-medium text-slate-400">
                    سفارشات
                </span>
            </div>


            {{-- پروفایل --}}
            <div id="userIcon"
                class="flex-1 h-full flex flex-col items-center
                       justify-center gap-1.5 relative cursor-pointer">

                @if (Auth::check())
                    <img src="{{ Auth::user()->main_image ? asset('storage/' . Auth::user()->main_image) : asset('assets/img/user.png') }}"
                        class="size-[25px] rounded-full object-cover
                               ring-2 ring-slate-100"
                        alt="پروفایل" onclick="pup_up_profil('open')">
                @else
                    <a href="{{ route('login') }}">
                        <svg viewBox="0 0 24 24" class="size-[22px]" fill="none"
                            stroke="{{ Route::is('user.profile') || Route::is('dashboard') || Route::is('signup') || Route::is('login') || Route::is('forget_password') || Route::is('set_password') ? '#FF9018' : '#94A3B8' }}"
                            stroke-width="1.8" stroke-linecap="round">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M5 21v-2a7 7 0 0 1 14 0v2" />
                        </svg>
                    </a>
                @endif

                <span
                    class="text-[10px] font-medium
                    {{ Route::is('user.profile') ||
                    Route::is('dashboard') ||
                    Route::is('signup') ||
                    Route::is('login') ||
                    Route::is('forget_password') ||
                    Route::is('set_password')
                        ? 'text-[#FF9018] font-bold'
                        : 'text-slate-400' }}">
                    پروفایل
                </span>


                {{-- اینجا کل بلوک فعلی #pup_up_profile را منتقل کن --}}
                {{-- از div مربوط به pup_up_profile تا انتهای آن --}}

            </div>

        </div>
    </div>
</footer>
{{-- Desktop Footer --}}
<footer dir="rtl" class="hidden lg:block bg-[#101b35] text-white mt-20">

    <div class="max-w-7xl mx-auto px-8 py-14">

        <div class="grid grid-cols-4 gap-10">

            {{-- معرفی رینسو --}}
            <div>
                <h2 class="text-2xl font-black mb-4">
                    رینسو
                </h2>

                <p class="text-sm leading-8 text-slate-300">
                    رینسو راهی ساده برای ساخت صفحه اختصاصی،
                    معرفی شبکه‌های اجتماعی و مدیریت راه‌های ارتباطی شماست.
                </p>
            </div>

            {{-- دسترسی سریع --}}
            <div>
                <h3 class="font-bold text-lg mb-5">
                    دسترسی سریع
                </h3>

                <ul class="space-y-4 text-sm text-slate-300">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-[#fc8e21] transition">
                            صفحه اصلی
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-[#fc8e21] transition">
                            ورود به حساب
                        </a>
                    </li>
                </ul>
            </div>

            {{-- امکانات --}}
            <div>
                <h3 class="font-bold text-lg mb-5">
                    امکانات رینسو
                </h3>

                <ul class="space-y-4 text-sm text-slate-300">
                    <li>صفحه اختصاصی</li>
                    <li>مدیریت شبکه‌های اجتماعی</li>
                    <li>پرسش‌های متداول</li>
                    <li>QR Code اختصاصی</li>
                </ul>
            </div>

            {{-- ارتباط با ما --}}
            <div>
                <h3 class="font-bold text-lg mb-5">
                    همراه رینسو باشید
                </h3>

                <p class="text-sm leading-8 text-slate-300">
                    تمام راه‌های ارتباطی و شبکه‌های اجتماعی خود را
                    در یک صفحه جمع‌آوری کنید.
                </p>
            </div>

        </div>

        <div
            class="border-t border-white/10 mt-12 pt-6
                    flex items-center justify-between
                    text-xs text-slate-400">

            <span>
                © تمامی حقوق برای رینسو محفوظ است.
            </span>

            <span>
                ساخته شده با ❤️ در رینسو
            </span>

        </div>

    </div>

</footer>

<script>
    let qrIcon = document.getElementById('qrIcon')
    let homeIcon = document.getElementById('homeIcon')
    let userIcon = document.getElementById('userIcon')
    let loading = document.getElementById('loading')
    let popupQr = document.getElementById('popupQr')

    function scanQr(state) {
        const html5QrCode = new Html5Qrcode("reader")

        if (state == 'open') {
            qrIcon.children[0].classList.remove('fill-black')
            qrIcon.children[0].classList.add('fill-white')
            popupQr.classList.remove('invisible')
            popupQr.classList.remove('opacity-0')
            popupQr.children[0].classList.remove('scale-95')
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                html5QrCode.stop()
                loading.classList.remove('invisible')
                loading.classList.remove('opacity-0')
                loading.innerHTML = `
                    <div class="loading-wave">
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                    </div>
                    `
                window.location.assign(decodedText)
            }
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            };
            console.log(html5QrCode)
            console.log(html5QrCode.elementId)
            html5QrCode.start({
                facingMode: "environment"
            }, config, qrCodeSuccessCallback)
        }
        if (state == 'close') {
            popupQr.classList.add('invisible')
            popupQr.classList.add('opacity-0')
            popupQr.children[0].classList.add('scale-95')
            html5QrCode.stop()
        }

    }
</script>
@RegisterServiceWorkerScript
<script src="{{ asset('assets/js/home.js') }}"></script>
