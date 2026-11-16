
@extends('admin.app.panel')

@section('title', 'باشگاه مشتریان من')

@section('content')

    <div dir="rtl" class="w-full space-y-4 pb-5 text-[#252B36]">

        {{-- هدر صفحه --}}
        <section class="overflow-hidden rounded-2xl bg-[#101827] text-white shadow-sm">

            <div class="flex flex-col gap-4 p-4 sm:flex-row sm:items-center sm:justify-between md:p-5">

                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10 text-[#FB9413]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M17 20h5v-2a4 4 0 0 0-5.5-3.7M9 20H2v-2a4 4 0 0 1 7-2.6M16 3.2a4 4 0 0 1 0 7.6M8 3.2a4 4 0 1 0 0 7.6M12 20v-2a4 4 0 0 0-8 0v2"/>
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <h1 class="text-base font-bold md:text-lg">باشگاه مشتریان</h1>
                        <p class="mt-1 text-xs text-slate-300">
                            مدیریت مشتریان صفحه
                            <span class="font-semibold text-[#FB9413]">{{ $page->title }}</span>
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2 self-start rounded-xl border border-white/10 bg-white/5 px-3 py-2 sm:self-center">
                    <span class="h-2 w-2 rounded-full bg-[#FB9413]"></span>
                    <span class="text-xs text-slate-200">مدیریت مشتریان</span>
                </div>

            </div>
        </section>


        {{-- آمار مشتریان --}}
        <section class="grid grid-cols-2 gap-3">

            <div class="flex items-center gap-3 rounded-xl border border-[#E8EBF0] bg-white p-3 shadow-sm">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-orange-50 text-[#FB9413]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M17 20h5v-2a4 4 0 0 0-5.5-3.7M9 20H2v-2a4 4 0 0 1 7-2.6M16 3.2a4 4 0 0 1 0 7.6M8 3.2a4 4 0 1 0 0 7.6"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-[11px] text-gray-400">تعداد مشتریان</p>
                    <p class="mt-1 text-lg font-bold text-[#101827]">
                        {{ $page->specialUsers->count() }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-3 rounded-xl border border-[#E8EBF0] bg-white p-3 shadow-sm">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-[#101827]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l6 6v10a2 2 0 0 1-2 2Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M13 3v6h6"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-[11px] text-gray-400">مشتریان انتخاب‌شده</p>
                    <p id="selectedCount" class="mt-1 text-lg font-bold text-[#101827]">۰</p>
                </div>
            </div>

        </section>


        {{-- لیست مشتریان --}}
        <section class="overflow-hidden rounded-2xl border border-[#E8EBF0] bg-white shadow-sm">

            {{-- سربرگ لیست --}}
            <div class="flex flex-col gap-3 border-b border-[#EEF0F3] p-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <h2 class="text-sm font-bold text-[#101827]">لیست مشتریان</h2>
                    <p class="mt-1 text-xs text-gray-400">
                        مشاهده، انتخاب و مدیریت مشتریان این صفحه
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">

                    <label for="all"
                           class="inline-flex cursor-pointer items-center gap-2 text-xs text-gray-600">
                        <input type="checkbox"
                               id="all"
                               class="h-4 w-4 cursor-pointer rounded border-gray-300 accent-[#FB9413]">
                        انتخاب همه
                    </label>

                    <form action="{{ route('user.deleteAll') }}"
                          method="POST"
                          id="bulkDeleteForm"
                          class="inline-flex">

                        @csrf

                        <div id="bulkUsersContainer"></div>

                        <button type="submit"
                                id="bulkDeleteButton"
                                disabled
                                class="inline-flex items-center gap-2 rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100 disabled:cursor-not-allowed disabled:opacity-40">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M4 7h16m-10 4v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"/>
                            </svg>

                            حذف انتخاب‌شده‌ها
                        </button>
                    </form>

                </div>
            </div>


            @if ($page->specialUsers->isNotEmpty())

                {{-- نسخه دسکتاپ --}}
                <div class="hidden overflow-x-auto md:block">

                    <table class="w-full border-collapse text-right">

                        <thead>
                            <tr class="bg-[#F8F9FB] text-xs font-semibold text-gray-500">

                                <th class="w-12 px-4 py-3 text-center">
                                    <span class="sr-only">انتخاب</span>
                                </th>

                                <th class="w-16 px-3 py-3 text-center">ردیف</th>

                                <th class="w-20 px-3 py-3 text-center">تصویر</th>

                                <th class="px-4 py-3">نام مشتری</th>

                                <th class="px-4 py-3">شماره تلفن</th>

                                <th class="w-32 px-4 py-3 text-center">عملیات</th>

                            </tr>
                        </thead>

                        <tbody id="desktopUserList" class="divide-y divide-[#EEF0F3]">

                            @foreach ($page->specialUsers as $index => $user)

                                <tr class="transition hover:bg-[#FAFBFC]">

                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox"
                                               class="customer-checkbox h-4 w-4 cursor-pointer rounded border-gray-300 accent-[#FB9413]"
                                               value="{{ $user->id }}">
                                    </td>

                                    <td class="px-3 py-3 text-center text-xs text-gray-400">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <a href="{{ route('user.show', [$user]) }}"
                                           class="inline-flex">

                                            <img src="{{ $user->main_image ? asset('storage/' . $user->main_image) : asset('assets/img/user.png') }}"
                                                 alt="{{ $user->name }}"
                                                 class="h-10 w-10 rounded-xl border border-[#EEF0F3] object-cover transition hover:scale-105"
                                                 loading="lazy">
                                        </a>
                                    </td>

                                    <td class="px-4 py-3">
                                        <a href="{{ route('user.show', [$user]) }}"
                                           class="text-sm font-semibold text-[#303846] transition hover:text-[#FB9413]">
                                            {{ $user->name }} {{ $user->family }}
                                        </a>
                                    </td>

                                    <td class="px-4 py-3">
                                        <span dir="ltr" class="inline-block text-left text-sm text-gray-500">
                                            {{ $user->phoneNumber }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">

                                            <a href="{{ route('user.show', [$user]) }}"
                                               title="مشاهده مشتری"
                                               class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-50 text-sky-600 transition hover:bg-sky-100">

                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                          d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </a>

                                            <a href="{{ route('special-user.delete', [$user->id, $page->id]) }}"
                                               data-delete-link
                                               title="حذف مشتری"
                                               class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-500 transition hover:bg-red-100">

                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                          d="M4 7h16m-10 4v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"/>
                                                </svg>
                                            </a>

                                        </div>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- نسخه موبایل --}}
                <div class="divide-y divide-[#EEF0F3] md:hidden" id="mobileUserList">

                    @foreach ($page->specialUsers as $index => $user)

                        <div class="flex items-center gap-3 p-3 transition hover:bg-[#FAFBFC]">

                            <input type="checkbox"
                                   class="customer-checkbox h-4 w-4 shrink-0 cursor-pointer rounded border-gray-300 accent-[#FB9413]"
                                   value="{{ $user->id }}">

                            <a href="{{ route('user.show', [$user]) }}" class="shrink-0">
                                <img src="{{ $user->main_image ? asset('storage/' . $user->main_image) : asset('assets/img/user.png') }}"
                                     alt="{{ $user->name }}"
                                     class="h-11 w-11 rounded-xl border border-[#EEF0F3] object-cover"
                                     loading="lazy">
                            </a>

                            <div class="min-w-0 flex-1">
                                <a href="{{ route('user.show', [$user]) }}"
                                   class="block truncate text-sm font-semibold text-[#303846] hover:text-[#FB9413]">
                                    {{ $user->name }} {{ $user->family }}
                                </a>

                                <p dir="ltr" class="mt-1 text-left text-xs text-gray-400">
                                    {{ $user->phoneNumber }}
                                </p>

                                <span class="mt-1 block text-[10px] text-gray-400">
                                    مشتری شماره {{ $index + 1 }}
                                </span>
                            </div>

                            <div class="flex shrink-0 items-center gap-1.5">

                                <a href="{{ route('user.show', [$user]) }}"
                                   title="مشاهده"
                                   class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-50 text-sky-600 transition hover:bg-sky-100">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                              d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </a>

                                <a href="{{ route('special-user.delete', [$user->id, $page->id]) }}"
                                   data-delete-link
                                   title="حذف"
                                   class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-500 transition hover:bg-red-100">

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                              d="M4 7h16m-10 4v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"/>
                                    </svg>
                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- نوار انتخاب --}}
                <div id="selectionBar"
                     class="hidden border-t border-[#EEF0F3] bg-[#FAFBFC] px-4 py-3">

                    <p class="text-xs text-gray-500">
                        <span id="selectionText" class="font-bold text-[#101827]">۰</span>
                        مشتری انتخاب شده است.
                    </p>

                </div>

            @else

                {{-- وضعیت خالی --}}
                <div class="flex flex-col items-center justify-center px-4 py-12 text-center">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#F3F5F8] text-gray-400">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                  d="M17 20h5v-2a4 4 0 0 0-5.5-3.7M9 20H2v-2a4 4 0 0 1 7-2.6M16 3.2a4 4 0 0 1 0 7.6M8 3.2a4 4 0 1 0 0 7.6"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-sm font-bold text-[#303846]">
                        هنوز مشتری‌ای ثبت نشده است
                    </h3>

                    <p class="mt-2 max-w-xs text-xs leading-6 text-gray-400">
                        در حال حاضر مشتری‌ای برای صفحه {{ $page->title }} وجود ندارد.
                    </p>

                </div>

            @endif

        </section>

    </div>


    {{-- مدیریت انتخاب و حذف --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const selectAll = document.getElementById('all');
            const checkboxes = Array.from(
                document.querySelectorAll('.customer-checkbox')
            );

            const selectedCount = document.getElementById('selectedCount');
            const selectionBar = document.getElementById('selectionBar');
            const selectionText = document.getElementById('selectionText');

            const bulkDeleteButton = document.getElementById('bulkDeleteButton');
            const bulkDeleteForm = document.getElementById('bulkDeleteForm');
            const bulkUsersContainer = document.getElementById('bulkUsersContainer');

            const persianNumber = number => {
                return Number(number).toLocaleString('fa-IR');
            };

            // بروزرسانی وضعیت انتخاب‌ها
            function updateSelection() {

                const checked = checkboxes.filter(item => item.checked);
                const count = checked.length;

                selectedCount.textContent = persianNumber(count);
                selectionText.textContent = persianNumber(count);

                bulkDeleteButton.disabled = count === 0;

                selectionBar.classList.toggle('hidden', count === 0);

                selectAll.checked = checkboxes.length > 0 && count === checkboxes.length;

                selectAll.indeterminate = count > 0 && count < checkboxes.length;
            }

            // انتخاب همه مشتریان
            selectAll.addEventListener('change', function () {

                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });

                updateSelection();
            });

            // انتخاب تکی مشتریان
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelection);
            });

            // حذف گروهی
            bulkDeleteForm.addEventListener('submit', function (e) {

                const checked = checkboxes.filter(item => item.checked);

                if (checked.length === 0) {
                    e.preventDefault();
                    return;
                }

                const confirmed = confirm(
                    `آیا از حذف ${persianNumber(checked.length)} مشتری انتخاب‌شده اطمینان دارید؟`
                );

                if (!confirmed) {
                    e.preventDefault();
                    return;
                }

                // ساخت ورودی‌های users[] برای فرم حذف گروهی
                bulkUsersContainer.innerHTML = '';

                checked.forEach(checkbox => {

                    const input = document.createElement('input');

                    input.type = 'hidden';
                    input.name = 'users[]';
                    input.value = checkbox.value;

                    bulkUsersContainer.appendChild(input);
                });

                bulkDeleteButton.disabled = true;
                bulkDeleteButton.textContent = 'در حال حذف...';
            });

            // تأیید حذف تکی
            document.querySelectorAll('[data-delete-link]').forEach(link => {

                link.addEventListener('click', function (e) {

                    const confirmed = confirm(
                        'آیا از حذف این مشتری اطمینان دارید؟'
                    );

                    if (!confirmed) {
                        e.preventDefault();
                    }

                });

            });

            updateSelection();

        });
    </script>

@endsection
