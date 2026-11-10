
@extends('admin.app.panel')
@section('title', 'درباره ما')
@section('content')

<div class="w-full flex flex-col pb-6">

    <!-- عنوان صفحه -->
    <div class="flex items-center justify-between mb-6 mt-5">
        <div>
            <h2 class="text-xl font-bold text-[#101827]">
                درباره ما
            </h2>
            <p class="text-sm text-gray-400 mt-2">
                مدیریت اطلاعات صفحه درباره ما
            </p>
        </div>

        <span class="bg-[#FB9413]/10 text-[#FB9413] px-4 py-2 rounded-xl text-sm font-semibold">
            {{ count($allAboutUs) }} مورد
        </span>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-4 md:p-6">

        <div class="overflow-x-auto rounded-xl border border-gray-100">

            <table class="w-full min-w-[1000px] text-sm text-center">

                <!-- سرستون ها -->
                <thead>
                    <tr class="bg-[#101827] text-white">

                        <th class="px-4 py-4 font-semibold">ردیف</th>

                        <th class="px-4 py-4 font-semibold">عنوان</th>

                        <th class="px-4 py-4 font-semibold">توضیحات</th>

                        <th class="px-4 py-4 font-semibold">تصویر</th>

                        <th class="px-4 py-4 font-semibold">تایتل عکس</th>

                        <th class="px-4 py-4 font-semibold">توضیحات عکس</th>

                        <th class="px-4 py-4 font-semibold">عملیات</th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">

                    @php
                        $i = 1;
                    @endphp

                    @forelse ($allAboutUs as $aboutUs)

                        <tr class="hover:bg-gray-50 transition duration-200">

                            <!-- ردیف -->
                            <td class="px-4 py-4 text-gray-500">
                                {{ $i }}
                            </td>

                            <!-- عنوان -->
                            <td class="px-4 py-4">
                                <span class="font-bold text-[#101827]">
                                    {{ $aboutUs->title }}
                                </span>
                            </td>

                            <!-- توضیحات -->
                            <td class="px-4 py-4 max-w-[220px]">
                                <p class="text-gray-500 leading-7 line-clamp-3">
                                    {{ $aboutUs->description ?: 'بدون توضیحات' }}
                                </p>
                            </td>

                            <!-- تصویر -->
                            <td class="px-4 py-4">

                                @if($aboutUs->image)

                                    <img
                                        src="{{ asset('storage/' . $aboutUs->image) }}"
                                        alt="{{ $aboutUs->image_title }}"
                                        class="w-24 h-16 object-cover rounded-lg mx-auto border border-gray-100"
                                    >

                                @else

                                    <span class="text-xs text-gray-400">
                                        بدون تصویر
                                    </span>

                                @endif

                            </td>

                            <!-- تایتل عکس -->
                            <td class="px-4 py-4">
                                <span class="text-gray-700">
                                    {{ $aboutUs->image_title ?: '-' }}
                                </span>
                            </td>

                            <!-- توضیحات عکس -->
                            <td class="px-4 py-4 max-w-[200px]">
                                <p class="text-gray-500 leading-7 line-clamp-3">
                                    {{ $aboutUs->image_description ?: '-' }}
                                </p>
                            </td>

                            <!-- عملیات -->
                            <td class="px-4 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <!-- ویرایش -->
                                    <a
                                        href="{{ route('aboutUs.create_edit', [$aboutUs]) }}"
                                        class="w-9 h-9 flex items-center justify-center bg-[#101827] hover:bg-[#FB9413] rounded-lg transition duration-200 group"
                                        title="ویرایش"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-4"
                                             viewBox="0 0 512 512">

                                            <path fill="white"
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>

                                        </svg>
                                    </a>

                                    <!-- حذف -->
                                    <a
                                        href="{{ route('aboutUs.delete', [$aboutUs]) }}"
                                        onclick="return confirm('آیا از حذف این اطلاعات اطمینان دارید؟')"
                                        class="w-9 h-9 flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-lg transition duration-200"
                                        title="حذف"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="size-4"
                                             viewBox="0 0 448 512">

                                            <path fill="white"
                                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>

                                        </svg>
                                    </a>

                                </div>

                            </td>

                        </tr>

                        @php
                            $i++;
                        @endphp

                    @empty

                        <tr>
                            <td colspan="7" class="py-12 text-center">

                                <div class="flex flex-col items-center gap-3">

                                    <span class="text-gray-400 text-sm">
                                        هنوز اطلاعاتی برای درباره ما ثبت نشده است.
                                    </span>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
