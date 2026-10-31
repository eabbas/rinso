@extends('admin.app.panel')
@section('title', 'همه کلاس‌ها')
@section('content')
    <div class="w-full flex flex-col pb-6 px-2 md:px-4">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            {{-- Header with title and add button --}}
            <div class="flex flex-col md:flex-row justify-between items-start border-b border-gray-200 p-4 gap-3">
                <h2 class="text-xl font-bold text-gray-800 text-center md:text-right">
                    لیست کلاس‌های آموزشگاه <span class="text-indigo-800">{{ $institute->title }}</span>
                </h2>
                <a href="{{ route('class.create', ['institute' => $institute->id]) }}"
                   class="inline-flex items-center gap-2 bg-indigo-800 hover:bg-indigo-700 text-white text-sm px-5 py-2 rounded-lg transition duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    کلاس جدید
                </a>
            </div>

            <form action="{{ route('class.deleteAll') }}" method="POST" id="deleteAllForm" onsubmit="return confirm('آیا از حذف کلاس‌های انتخاب شده مطمئن هستید؟');">
                @csrf
                @method('DELETE')

                <div class="flex justify-between items-center px-4 py-3 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="all" onchange="checkAll()" class="w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="all" class="text-sm text-gray-700 cursor-pointer">انتخاب همه</label>
                    </div>
                    <button type="submit"
                            class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white text-sm px-1.5 py-1.5 rounded-lg transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                            <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                        </svg>
                    </button>
                </div>

                {{-- Responsive Table with grid --}}
                <div class="overflow-x-auto [&::-webkit-scrollbar]:h-1.5 rounded-b-xl">
                    <div class="min-w-[800px] md:min-w-full">
                        {{-- Header --}}
                        <div class="grid grid-cols-12 gap-0 bg-gray-100 text-gray-700 text-xs font-bold border-b border-gray-200">
                            <div class="col-span-1 p-3 text-center"></div>
                            <div class="col-span-1 p-3 text-center">ردیف</div>
                            <div class="col-span-1 p-3 text-center">تصویر</div>
                            <div class="col-span-2 p-3 text-center">عنوان کلاس</div>
                            <div class="col-span-2 p-3 text-center">درس</div>
                            <div class="col-span-2 p-3 text-center">استاد</div>
                            <div class="col-span-3 p-3 text-center">عملیات</div>
                        </div>
{{-- Body --}}
                        <div class="divide-y divide-gray-100 bg-white">
                            @php $i = 1; @endphp
                            @forelse($institute->lessons as $lesson)
                                @foreach($lesson->lesson_classes as $class)
                                <div class="grid grid-cols-12 gap-0 items-center hover:bg-gray-50 transition">
                                    {{-- Checkbox --}}
                                    <div class="col-span-1 p-3 text-center">
                                        <input type="checkbox" name="classes[]" value="{{ $class->id }}" class="check w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500">
                                    </div>
                                    {{-- Row number --}}
                                    <div class="col-span-1 p-3 text-center text-gray-700">
                                        {{ $i }}
                                    </div>
                                    {{-- Image --}}
                                    <div class="col-span-1 p-3 text-center">
                                        @if($class->image)
                                            <img class="w-10 h-10 object-cover rounded-md mx-auto shadow-sm" src="{{ asset('storage/' . $class->image) }}" alt="{{ $class->title }}">
                                        @else
                                            <div class="w-10 h-10 mx-auto bg-gray-100 rounded-md flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v6m3-3H9" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Class title --}}
                                    <div class="col-span-2 p-3 text-center">
                                        <a href="{{ route('class.single', $class->id) }}" class="text-indigo-800 hover:text-indigo-800 font-medium">
                                            {{ $class->title }}
                                        </a>
                                    </div>
                                    {{-- Lesson title --}}
                                    <div class="col-span-2 p-3 text-center">
                                        <a href="{{ route('lesson.single', $class->lesson->id) }}" class="text-indigo-600 hover:text-indigo-800">
                                            {{ $class->lesson->title }}
                                        </a>
                                    </div>
                                    {{-- Master --}}
                                    <div class="col-span-2 p-3 text-center">
                                        @if($class->master)
                                            <span class="text-gray-700">{{ $class->master->name }} {{ $class->master->family }}</span>
                                        @else
                                            <span class="text-gray-400">بدون استاد</span>
                                        @endif
                                    </div>
                                    {{-- Actions (View, Edit, Delete + Attachment dropdown) --}}
                                    <div class="col-span-3 p-3 text-center">
<div class="flex flex-wrap justify-center gap-1">
                                            {{-- View --}}
                                            <a href="{{ route('class.single', $class->id) }}" class="text-white bg-sky-500 hover:bg-sky-600 p-1.5 rounded-md transition" title="مشاهده">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 576 512">
                                                    <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                                </svg>
                                            </a>
                                            {{-- Edit --}}
                                            <a href="{{ route('class.edit', $class->id) }}" class="text-white bg-green-500 hover:bg-green-600 p-1.5 rounded-md transition" title="ویرایش">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 512 512">
                                                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                </svg>
                                            </a>
                                            {{-- Delete --}}
                                            <a href="{{ route('class.delete', $class->id) }}" onclick="return confirm('آیا از حذف کلاس «{{ $class->title }}» مطمئن هستید؟')" class="text-white bg-red-500 hover:bg-red-600 p-1.5 rounded-md transition" title="حذف">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 448 512">
                                                    <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                                </svg>
                                            </a>

                                            {{-- Dropdown for Attachments --}}
<div class="relative inline-block text-left">
                                                <button onclick="toggleDropdown(this)" type="button" class="text-white bg-amber-500 hover:bg-amber-600 p-1.5 rounded-md transition shadow-sm" title="پیوست‌ها">
                                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu absolute left-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10 hidden">
                                                    <div class="py-1">
                                                        <a href="{{ route('class.attachments', $class->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">📎 مشاهده پیوست‌ها</a>
                                                        <a href="{{ route('classAttachment.create', ['class' => $class->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">➕ افزودن پیوست جدید</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $i++; @endphp
                                @endforeach
                            @empty
                                <div class="text-center py-8 text-gray-500">
                                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v6m3-3H9" />
                                    </svg>
                                    <span>هیچ کلاسی برای این آموزشگاه یافت نشد.</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Back button --}}
        {{-- <div class="flex justify-end mt-6">
            <a href="{{ route('institute.single', $institute->id) }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-sm transition duration-200">
                بازگشت
            </a>
        </div> --}}
    </div>

    <script>
        function checkAll() {
            const selectAll = document.getElementById('all');
            const checkboxes = document.querySelectorAll('.check');
            checkboxes.forEach(cb => cb.checked = selectAll.checked);
        }

        function toggleDropdown(btn) {
            const dropdown = btn.nextElementSibling;
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdown) menu.classList.add('hidden');
            });
            dropdown.classList.toggle('hidden');

            const closeDropdown = (e) => {
                if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                    document.removeEventListener('click', closeDropdown);
}
            };
            if (!dropdown.classList.contains('hidden')) {
                setTimeout(() => document.addEventListener('click', closeDropdown), 0);
            } else {
                document.removeEventListener('click', closeDropdown);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        });
    </script>
@endsection