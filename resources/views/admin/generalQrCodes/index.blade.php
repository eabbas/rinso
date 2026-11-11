
@extends('admin.app.panel')

@section('title', 'لیست کیوآر کد ها')

@section('content')

    <div class="w-full py-5" dir="rtl">

        <!-- عنوان و دکمه ایجاد -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7">
            <div>
                <h1 class="text-xl font-bold text-[#101827]">
                    لیست کیوآر کدها
                </h1>
                <p class="text-sm text-gray-500 mt-2">
                    مدیریت و ویرایش کیوآر کدهای ایجادشده
                </p>
            </div>

            <a href="{{ route('generalQrCodes.create') }}"
               class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#101827] hover:bg-[#FB9413] text-white text-sm font-semibold transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/>
                </svg>
                ایجاد QR Code جدید
            </a>
        </div>

        <!-- لیست QR کدها -->
        @php
            $i = 0;
        @endphp

        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

            @foreach($qrCodes as $qrCode)
                @php
                    $i++;
                @endphp

                <div id="qrCode-{{$qrCode->id}}"
                     class="group w-full bg-white rounded-2xl border border-[#E6E9EF] shadow-sm hover:shadow-md hover:border-[#FB9413]/40 transition-all duration-200 overflow-hidden">

                    <!-- نوار بالای کارت -->
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                        <span class="text-xs font-medium text-gray-400">
                            QR Code شماره {{ $i }}
                        </span>

                        <div class="flex items-center gap-2">

                            <!-- ویرایش -->
                            <button type="button"
                                    onclick="addForm({{ $qrCode->id }})"
                                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#F7F8FA] text-[#101827] hover:bg-[#101827] hover:text-white transition-all duration-200"
                                    title="ویرایش">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                </svg>
                            </button>

                            <!-- حذف -->
                            <a href="{{ route('generalQrCodes.delete', [$qrCode]) }}"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#FFF5F3] text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200"
                               title="حذف">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                          d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2-16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                </svg>
                            </a>

                        </div>
                    </div>

                    <!-- محتوای کارت -->
                    <div class="flex flex-col items-center text-center p-5 gap-3">

                        <div class="w-36 h-36 flex items-center justify-center rounded-2xl bg-[#F7F8FA] border border-gray-100 p-3">
                            <img class="w-full h-full object-contain"
                                 src="{{ asset('storage/' . $qrCode->image_path) }}"
                                 alt="QR Code">
                        </div>

                        <div class="w-full">
                            <p class="qrCode_title text-base font-bold text-[#101827] truncate">
                                {{ $qrCode->title }}
                            </p>

                            <p class="qrCode_description text-xs text-gray-500 mt-2 leading-6 line-clamp-2">
                                {{ $qrCode->description }}
                            </p>
                        </div>

                        <div class="w-full h-px bg-gray-100"></div>

                        <span class="text-xs text-gray-400">
                            کد شماره {{ $i }}
                        </span>

                    </div>
                </div>

            @endforeach

        </div>

    </div>

    <!-- فرم ویرایش -->
    <div id="editFormOverlay"
         class="w-full lg:w-[calc(100%-265px)] h-dvh bg-[#101827]/60 backdrop-blur-sm z-50 fixed left-0 top-0 flex justify-center items-center invisible opacity-0 transition-all duration-300 p-4">

        <div class="w-full max-w-2xl max-h-[90vh] overflow-y-auto relative bg-white rounded-2xl shadow-2xl">

            <!-- دکمه بستن -->
            <button type="button"
                    class="absolute left-4 top-4 w-9 h-9 rounded-lg bg-gray-100 hover:bg-red-50 text-gray-500 hover:text-red-500 flex justify-center items-center cursor-pointer transition-all z-20"
                    onclick="closeForm()">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 384 512">
                    <path fill="currentColor"
                          d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                </svg>
            </button>

            <div id="editForm">

                <div class="bg-[#101827] px-6 py-5 rounded-t-2xl">
                    <h2 class="text-white text-lg font-bold">
                        ویرایش اطلاعات QR Code
                    </h2>
                    <p class="text-gray-400 text-xs mt-1">
                        اطلاعات موردنظر را ویرایش کنید.
                    </p>
                </div>

                <div class="p-6 md:p-8">

                    <div class="w-full grid grid-cols-1 gap-5">

                        <div class="w-full flex flex-col gap-2">
                            <label for="link" class="text-sm font-semibold text-[#344054]">
                                لینک کیوآر کد
                            </label>

                            <input id="link"
                                   class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-sm text-[#101827] outline-none transition-all focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                                   type="text"
                                   name="link"
                                   placeholder="لینک"
                                   title="لینک"
                                   pattern="[A-Za-z]*"
                                   required>
                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <label for="title" class="text-sm font-semibold text-[#344054]">
                                عنوان کیوآر کد
                            </label>

                            <input type="text"
                                   id="title"
                                   class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-sm text-[#101827] outline-none transition-all focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                                   name="title"
                                   placeholder="عنوان کیوآر کد"
                                   title="عنوان کیوآر کد">
                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <label for="description" class="text-sm font-semibold text-[#344054]">
                                توضیحات کیوآر کد
                            </label>

                            <input type="text"
                                   id="description"
                                   class="w-full h-12 px-4 rounded-xl bg-[#F7F8FA] border border-[#E5E7EB] text-sm text-[#101827] outline-none transition-all focus:bg-white focus:border-[#FB9413] focus:ring-2 focus:ring-[#FB9413]/10"
                                   name="description"
                                   placeholder="توضیحات کیوآر کد"
                                   title="توضیحات کیوآر کد">
                        </div>

                    </div>

                    <div class="flex justify-end mt-8 pt-5 border-t border-gray-100">
                        <button type="button"
                                onclick="updateQrCode(this)"
                                class="px-8 py-3 rounded-xl bg-[#101827] text-white text-sm font-semibold hover:bg-[#FB9413] transition-all duration-200">
                            ثبت تغییرات
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

<script>
    const csrfToken = "{{ csrf_token() }}"
    const editRoute = "{{ route('generalQrCodes.edit') }}"
    const updateRoute = "{{ route('generalQrCodes.update') }}"
    const imageAddress = "{{ asset('storage/') }}"
</script>

<script src="{{ asset('assets/js/generalQrCodes.js') }}"></script>
