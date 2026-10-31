@extends('admin.app.panel')
@section('title', 'همه رشته‌ها')
@section('content')
    <div class="w-full flex flex-col pb-6 px-2 md:px-4">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            {{-- Header with title and add button --}}
            <div class="flex flex-col md:flex-row justify-between items-start border-b border-gray-200 p-4 gap-3">
                <h2 class="text-xl font-bold text-gray-800 text-center md:text-right">
                    لیست رشته‌های آموزشگاه <a href="{{route('institute.single' , [$institute])}}"><span class="text-indigo-800">{{ $institute->title }}</span></a>
                </h2>
                <a href="{{ route('field.create', ['institute' => $institute->id]) }}"
                   class="inline-flex items-start gap-1 bg-indigo-800 hover:bg-indigo700 text-white text-sm px-4 py-2 rounded-lg transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    رشته جدید
                </a>
            </div>

            <form action="{{ route('career.deleteAll') }}" method="POST" id="deleteAllForm" onsubmit="return confirm('آیا از حذف رشته‌های انتخاب شده مطمئن هستید؟');">
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

                {{-- Responsive Table --}}
                <div class="overflow-x-auto [&::-webkit-scrollbar]:h-1.5 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 rounded-b-xl">
                    <table class="min-w-[700px] md:min-w-full w-full text-sm">
                        <thead class="bg-gray-100 text-gray-700 text-xs font-bold">
                            <tr>
                                <th class="w-10 p-3 text-center"></th>
                                <th class="w-12 p-3 text-center">ردیف</th>
                                <th class="w-20 p-3 text-center">تصویر</th>
                                <th class="p-3 text-center">عنوان</th>
                                <th class="p-3 text-center">وضعیت</th>
                                <th class="p-3 text-center">عملیات</th>
</tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($institute->fields as $index => $field)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                {{-- Checkbox --}}
                                <td class="p-3 text-center">
                                    <input type="checkbox" name="fields[]" value="{{ $field->id }}" class="check w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500">
                                </td>
                                {{-- Row number --}}
                                <td class="p-3 text-center text-gray-700">
                                    {{ $loop->iteration }}
                                </td>
                                {{-- Image --}}
                                <td class="p-3 text-center">
                                    @if($field->image)
                                        <img class="w-12 h-12 object-cover rounded-md mx-auto shadow-sm" src="{{ asset('storage/' . $field->image) }}" alt="{{ $field->title }}">
                                    @else
                                        <div class="w-12 h-12 mx-auto bg-gray-100 rounded-md flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                {{-- Title --}}
                                <td class="p-3 text-center">
                                    <a href="{{ route('field.single', $field->id) }}" class="text-indigo-800 hover:text-indigo-800 font-medium">
                                        {{ $field->title }}
                                    </a>
                                </td>
                                {{-- Status --}}
                                <td class="p-3 text-center">
                                    @if($field->status == 0)
                                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                            فعال
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">
                                            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                            غیرفعال
                                        </span>
                                    @endif
                                </td>
                                {{-- Actions --}}
                                <td class="p-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('field.single', $field->id) }}" class="text-white bg-sky-500 hover:bg-sky-600 p-1.5 rounded-md transition" title="مشاهده">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 576 512"><path fill="currentColor" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('field.edit', $field->id) }}" class="text-white bg-green-500 hover:bg-green-600 p-1.5 rounded-md transition" title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('field.delete', $field->id) }}" onclick="return confirm('آیا از حذف رشته «{{ $field->title }}» مطمئن هستید؟')" class="text-white bg-red-500 hover:bg-red-600 p-1.5 rounded-md transition" title="حذف">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                                                <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-500">
                                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>هیچ رشته‌ای برای این آموزشگاه یافت نشد.</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
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
            checkboxes.forEach(checkbox => checkbox.checked = selectAll.checked);
        }
    </script>
@endsection