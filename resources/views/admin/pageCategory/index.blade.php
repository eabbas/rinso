@extends('admin.app.panel')

@section('title', 'رینسو | دسته‌بندی صفحه‌ها')

@section('content')

    <div class="space-y-6" dir="rtl">

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h1 class="text-xl font-black text-[#00143A]">
                    دسته‌بندی صفحه‌ها
                </h1>
                <p class="text-sm text-slate-500 mt-2">
                    مدیریت، ویرایش و حذف دسته‌بندی‌های صفحه‌ها
                </p>
            </div>

            <a href="{{ route('pageCategory.create') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-3
                  rounded-xl bg-[#FF8000] hover:bg-[#e87500]
                  text-white text-sm font-bold transition shadow-lg shadow-orange-500/10">

                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14" />
                </svg>

                ایجاد دسته جدید
            </a>

        </div>


        <!-- Statistics -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white border border-[#E7EBF2] rounded-2xl p-5 flex items-center gap-4">
                <div class="size-12 rounded-xl bg-[#FFF0DF] text-[#FF8000] flex items-center justify-center">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="4" width="18" height="16" rx="2" />
                        <path d="M8 4v16M3 9h5" />
                    </svg>
                </div>

                <div>
                    <p class="text-xs text-slate-500">تعداد کل دسته‌ها</p>
                    <h3 id="totalCategories" class="text-2xl font-black text-[#00143A] mt-1 in-fa">۴</h3>
                </div>
            </div>
            <div class="bg-white border border-[#E7EBF2] rounded-2xl p-5 flex items-center gap-4">
                <div class="size-12 rounded-xl bg-[#EAF0F8] text-[#08285A] flex items-center justify-center">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500">دسته‌های دارای صفحه</p>
                    <h3 id="usedCategories" class="text-2xl font-black text-[#00143A] mt-1 in-fa">۳</h3>
                </div>
            </div>
        </div>


        <!-- Main Table Card -->
        <div class="bg-white border border-[#E7EBF2] rounded-2xl overflow-hidden">

            <!-- Search and Actions -->
            <div class="p-4 md:p-5 border-b border-[#E7EBF2]">

                <div class="flex flex-col lg:flex-row gap-3 lg:items-center lg:justify-between">

                    <!-- Search -->
                    <div class="relative w-full lg:max-w-sm">

                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7" />
                            <path d="m20 20-4-4" />
                        </svg>

                        <input id="searchInput" type="text" placeholder="جست‌وجوی نام دسته..."
                            class="w-full h-11 pr-12 pl-4 rounded-xl bg-[#F5F7FC]
                               border border-transparent outline-none text-sm
                               focus:border-[#FF8000] focus:bg-white transition">

                    </div>
                    <!-- Bulk Actions -->
                    <div class="flex flex-wrap items-center gap-2">

                        <span id="selectedCount" class="text-xs text-slate-500 ml-2 in-fa">
                            ۰ مورد انتخاب شده
                        </span>
                        <button type="button" id="selectAllButton"
                            class="inline-flex items-center gap-2 px-4 py-2.5
                               rounded-xl border border-[#E7EBF2]
                               text-xs font-bold text-[#00143A]
                               hover:bg-[#F5F7FC] transition">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m5 12 4 4L19 6" />
                            </svg>
                            انتخاب همه
                        </button>
                        <button type="button" id="deleteAllButton" disabled
                            class="inline-flex items-center gap-2 px-4 py-2.5
                               rounded-xl bg-red-50 text-red-500
                               text-xs font-bold hover:bg-red-100
                               disabled:opacity-40 disabled:cursor-not-allowed transition">

                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path d="M3 6h18M8 6V4h8v2m-9 0 1 14h8l1-14" />
                                <path d="M10 11v5M14 11v5" />
                            </svg>

                            حذف انتخاب‌شده‌ها
                        </button>

                    </div>

                </div>
            </div>


            <!-- Table -->
            <div class="overflow-x-auto">

                <table class="w-full min-w-[750px] text-right">

                    <thead class="bg-[#F8F9FC]">
                        <tr class="text-xs text-slate-500">

                            <th class="px-5 py-4 w-12">
                                <input type="checkbox" id="masterCheckbox" class="size-4 accent-[#FF8000] cursor-pointer">
                            </th>

                            <th class="px-5 py-4 font-bold">نام دسته</th>
                            <th class="px-5 py-4 font-bold">توضیحات</th>
                            <th class="px-5 py-4 font-bold text-center">تعداد صفحه‌ها</th>
                            <th class="px-5 py-4 font-bold text-center">اسلاگ</th>
                            <th class="px-5 py-4 font-bold text-center">عملیات</th>

                        </tr>
                    </thead>

                    <tbody id="categoryTable" class="divide-y divide-[#E7EBF2]">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <tr class="category-row hover:bg-[#FAFBFD] transition" data-name="{{ $category->title }}" data-slug="{{ $category->slug }}"
                                    data-description="{{ $category->description }}" data-parent-id="{{ $category->parent_id }}" data-id="{{ $category->id }}">

                                    <td class="px-5 py-4">
                                        <input type="checkbox"
                                            class="category-checkbox size-4 accent-[#FF8000] cursor-pointer">
                                    </td>

                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="category-name text-sm font-bold text-[#00143A]">
                                                {{ $category->title }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-5 py-4 text-xs text-slate-500">
                                        <span
                                            class="category-description">{{ $category->description ? $category->description : '-' }}</span>
                                    </td>

                                    <td class="px-5 py-4 text-center">
                                        <span class="text-sm font-bold text-[#00143A] in-fa">{{ count($category->pages) }}</span>
                                    </td>

                                    <td class="px-5 py-4 text-center">
                                        <span
                                            class="category-slug inline-flex px-3 py-1 rounded-full bg-green-50 text-green-600 text-[11px] font-bold">
                                            {{ $category->slug }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            <button type="button" onclick="openEditModal(this, {{ $category->id }})"
                                                class="size-9 rounded-lg bg-[#FFF0DF] text-[#FF8000]
                                                    hover:bg-[#FFE4C6] transition"
                                                title="ویرایش">

                                                <svg class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path d="m16 4 4 4M4 20l4-.8L19 8a2.8 2.8 0 0 0-4-4L4 16l-.8 4Z" />
                                                </svg>
                                            </button>

                                            <button type="button" onclick="deleteCategory(this, {{ $category->id }})"
                                                class="size-9 rounded-lg bg-red-50 text-red-500
                                                    hover:bg-red-100 transition"
                                                title="حذف">

                                                <svg class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path d="M3 6h18M8 6V4h8v2m-9 0 1 14h8l1-14" />
                                                    <path d="M10 11v5M14 11v5" />
                                                </svg>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center py-14">
                                <div
                                    class="size-16 rounded-2xl bg-[#F5F7FC] text-slate-400 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5">
                                        <circle cx="11" cy="11" r="7" />
                                        <path d="m20 20-4-4" />
                                    </svg>
                                </div>
                                <p class="font-bold text-[#00143A] text-sm">دسته‌ای پیدا نشد!</p>
                            </div>
                        @endif

                    </tbody>
                </table>

            </div>


            <!-- Empty State -->
            <div id="emptyState" class="hidden text-center py-14">
                <div class="size-16 rounded-2xl bg-[#F5F7FC] text-slate-400 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="7" />
                        <path d="m20 20-4-4" />
                    </svg>
                </div>
                <p class="font-bold text-[#00143A] text-sm">دسته‌ای پیدا نشد!</p>
                <p class="text-xs text-slate-400 mt-2">عبارت دیگری را جست‌وجو کنید.</p>
            </div>


            <!-- Footer -->
            <div
                class="flex flex-col sm:flex-row items-center justify-between gap-3
                    px-5 py-4 border-t border-[#E7EBF2]">

                <p class="text-xs text-slate-500">
                    نمایش <span id="visibleCount" class="font-bold text-[#00143A]">۴</span>
                    دسته از
                    <span id="footerTotal" class="font-bold text-[#00143A]">۴</span>
                    دسته
                </p>

            </div>

        </div>

    </div>


    <!-- Edit Modal -->
    <div id="editModal"
        class="hidden fixed inset-0 z-[100] items-center justify-center
            bg-[#00143A]/50 backdrop-blur-sm p-4">

        <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl max-h-[calc(100%-100px)] overflow-y-auto" onclick="event.stopPropagation()">

            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-[#E7EBF2]">

                <div>
                    <h3 class="font-black text-[#00143A]">ویرایش دسته‌بندی</h3>
                    <p class="text-xs text-slate-400 mt-1">
                        اطلاعات دسته‌بندی را ویرایش کنید.
                    </p>
                </div>

                <button type="button" onclick="closeEditModal()"
                    class="size-9 rounded-xl bg-[#F5F7FC] text-slate-500
                           hover:bg-red-50 hover:text-red-500 transition">

                    <svg class="w-5 h-5 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="m18 6-12 12M6 6l12 12" />
                    </svg>
                </button>

            </div>


            <!-- Modal Form -->
            <form id="editForm" class="p-6 space-y-5">
                <input type="hidden" id="editId">
                <div>
                    <label class="block text-xs font-bold text-[#00143A] mb-2">
                        نام دسته‌بندی
                    </label>

                    <input id="editName" type="text" required
                        class="w-full h-12 px-4 rounded-xl bg-[#F5F7FC]
                           border border-[#E7EBF2] outline-none text-sm
                           focus:border-[#FF8000] focus:bg-white transition"
                        placeholder="نام دسته را وارد کنید">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#00143A] mb-2">
                       اسلاگ
                    </label>

                    <input id="editSlug" type="text" required
                        class="w-full h-12 px-4 rounded-xl bg-[#F5F7FC]
                           border border-[#E7EBF2] outline-none text-sm
                           focus:border-[#FF8000] focus:bg-white transition"
                        placeholder="اسلاگ را وارد کنید">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#00143A] mb-2">
                       دسته والد
                    </label>

                    <select id="editParentId"
                        class="w-full h-12 px-4 rounded-xl bg-[#F5F7FC]
                           border border-[#E7EBF2] outline-none text-sm
                           focus:border-[#FF8000] focus:bg-white transition">
                           <option value="0">بدون والد</option>
                           @foreach ($categories as $category)
                               <option value="{{ $category->id }}">{{ $category->title }}</option>
                           @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-[#00143A] mb-2">
                        توضیحات
                    </label>

                    <textarea id="editDescription" rows="4"
                        class="w-full p-4 rounded-xl bg-[#F5F7FC]
                           border border-[#E7EBF2] outline-none text-sm
                           resize-none focus:border-[#FF8000] focus:bg-white transition"
                        placeholder="توضیحات دسته را وارد کنید"></textarea>
                </div>

                <div class="flex flex-col-reverse sm:flex-row gap-3 pt-2">

                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 py-3 rounded-xl border border-[#E7EBF2]
                               text-sm font-bold text-slate-500 hover:bg-[#F5F7FC] transition">
                        انصراف
                    </button>

                    <button type="submit"
                        class="flex-1 py-3 rounded-xl bg-[#FF8000]
                               text-white text-sm font-bold hover:bg-[#e87500] transition">
                        ذخیره تغییرات
                    </button>

                </div>

            </form>

        </div>
    </div>

    <div class="fixed w-full h-dvh top-0 right-0 bg-black/50 transition-all duration-300 flex justify-center items-center invisible opacity-0 z-99999"
        id="loader">
        <div class="w-11/12 lg:w-1/3 p-5 rounded-xl bg-white flex flex-col items-center justify-center gap-4 lg:gap-8">
            <div class="size-16 rounded-full border-4 border-[#FF8000] border-t-4 border-t-white animate-spin"></div>
            <span class="lg:text-lg font-bold text-[#FF8000]">لطفا شکیبا باشید ...</span>
        </div>
    </div>

    <script src="{{ asset('assets/js/pageCategory.js') }}"></script>

@endsection
