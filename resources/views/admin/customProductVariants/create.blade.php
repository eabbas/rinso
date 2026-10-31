@extends('admin.app.panel')
@section('title', 'ثبت انواع محصول شخصی سازی شده')
@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-bold mb-6 text-gray-800 border-b pb-2">افزودن نوع جدید محصول شخصی‌سازی شده</h2>
        
        <form action="{{ route('cpv.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- عنوان -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        عنوان <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="title" 
                           id="title"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>

                <!-- حداقل واحد مقدار -->
                <div>
                    <label for="min_amount_unit" class="block text-sm font-medium text-gray-700 mb-2">
                        حداقل واحد مقدار
                    </label>
                    <input type="number" 
                           name="min_amount_unit" 
                           id="min_amount_unit"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>

                <!-- مدت زمان -->
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                        مدت زمان آماده سازی (دقیقه)
                    </label>
                    <input type="number" 
                           name="duration" 
                           id="duration"
                           min="1"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>

                <!-- محصول اصلی -->
                {{-- @dd($custom_product->career->id) --}}
                    <input type="hidden" name="custom_product_id" value="{{ $custom_product->id }}">
                    <input type="hidden" name="career_id" value="{{ $custom_product->career->id }}">

                <!-- تصویر -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        تصویر
                    </label>
                    <div class="flex items-center space-x-4">
                        <div class="flex-1">
                            <input type="file" 
                                   name="image" 
                                   id="image"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div class="image-preview hidden">
                            <img id="preview" class="w-20 h-20 object-cover rounded-lg border">
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">فرمت‌های مجاز: JPG, PNG, GIF. حداکثر سایز: 2MB</p>
                </div>

                <!-- توضیحات -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        توضیحات
                    </label>
                    <textarea name="description" 
                              id="description"
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"></textarea>
                </div>
            </div>

            <!-- دکمه‌های فرم -->
            <div class="flex justify-end space-x-4 pt-4 border-t">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    ثبت نوع محصول
                </button>
            </div>
        </form>
    </div>
@endsection