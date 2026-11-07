<style>
    input:focus, textarea:focus {
        border-color: #3B82F6;
        box-shadow: 0 0 0 2px rgba(59,130,246,0.1);
        outline: none;
    }

    @media (max-width: 640px) {
        .task-row {
            flex-direction: column !important;
            gap: 0.75rem !important;
        }
        .checkbox-wrapper {
            padding-top: 0 !important;
        }
    }
</style>

@extends('admin.app.panel')
@section('title', 'ایجاد چک لیست')
@section('content')
    <div class="w-full max-w-4xl mx-auto px-3 sm:px-4 md:px-6 py-4 sm:py-6 md:py-8">
        <!-- Header -->
        <div class="mb-5 sm:mb-6 md:mb-7">
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-800 tracking-tight">ایجاد چک لیست جدید</h1>
            <p class="text-xs sm:text-sm text-gray-400 mt-1 sm:mt-1.5">وظایف و توضیحات مورد نیاز را ثبت کنید</p>
        </div>

        <!-- Form -->
        <form action="{{route('checkList.storeCheckList')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded-xl sm:rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                <!-- Programming Task -->
                <div class="p-4 sm:p-5 border-b border-gray-50 hover:bg-gray-50/40 transition task-row">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                        <div class="checkbox-wrapper pt-0.5">
                            <input type="checkbox" value="1" name="programming_time"
                                   class="w-4 h-4 sm:w-4.5 sm:h-4.5 text-blue-500 rounded border-gray-300 focus:ring-2 focus:ring-blue-200 focus:ring-offset-0">
                        </div>
                        <div class="flex-1 w-full">
                            <label class="block text-sm font-medium text-gray-800 mb-1.5 sm:mb-2">برنامه نویسی</label>
                            <input type="text" name="programming_description"
                                   placeholder="مثال: رفع باگ، پیاده سازی ماژول جدید ..."
                                   class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition text-gray-700">
                        </div>
                    </div>
                </div>

                <!-- English Task -->
                <div class="p-4 sm:p-5 border-b border-gray-50 hover:bg-gray-50/40 transition task-row">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                        <div class="checkbox-wrapper pt-0.5">
                            <input type="checkbox" value="1" name="english_time"
                                   class="w-4 h-4 sm:w-4.5 sm:h-4.5 text-blue-500 rounded border-gray-300 focus:ring-2 focus:ring-blue-200">
                        </div>
                        <div class="flex-1 w-full">
                            <label class="block text-sm font-medium text-gray-800 mb-1.5 sm:mb-2">زبان انگلیسی</label>
                            <input type="text" name="english_description"
                                   placeholder="مثال: مطالعه رمان، تمرین گرامر ..."
                                   class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition text-gray-700">
                        </div>
                    </div>
                </div>

                <!-- Reading Task -->
                <div class="p-4 sm:p-5 border-b border-gray-50 hover:bg-gray-50/40 transition task-row">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                        <div class="checkbox-wrapper pt-0.5">
                            <input type="checkbox" value="1" name="reading_time"
                                   class="w-4 h-4 sm:w-4.5 sm:h-4.5 text-blue-500 rounded border-gray-300 focus:ring-2 focus:ring-blue-200">
                        </div>
                        <div class="flex-1 w-full">
                            <label class="block text-sm font-medium text-gray-800 mb-1.5 sm:mb-2">کتاب خوانی</label>
                            <input type="text" name="reading_description"
                                   placeholder="مثال: ۵۰ صفحه کتاب، خلاصه نویسی ..."
                                   class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-blue-400 transition text-gray-700">
                        </div>
                    </div>
                </div>

                <!-- Global Description -->
                <div class="p-4 sm:p-5 bg-gray-50/60">
                    <label class="block text-sm font-medium text-gray-800 mb-1.5 sm:mb-2">توضیحات تکمیلی</label>
                    <textarea name="description" rows="3"
                              placeholder="توضیحات کلی درباره این چک لیست..."
                              class="w-full px-3 py-2 text-sm bg-white border border-gray-200 rounded-lg focus:border-blue-400 transition text-gray-700 resize-none"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="px-4 py-3 sm:px-5 sm:py-4 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-xl transition shadow-sm hover:shadow">
                        ثبت چک لیست
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection