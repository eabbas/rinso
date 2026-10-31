@extends('admin.app.panel')

@section('title', 'ثبت محصول شخصی‌سازی شده')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-4 border-b border-gray-200">
            <i class="fas fa-plus-circle ml-2 text-blue-500"></i>
            ثبت محصول شخصی‌سازی شده جدید
        </h2>

        <form action="{{ route('cp.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Title Field -->
            <div class="form-group">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-heading ml-2 text-gray-500"></i>
                    عنوان محصول
                </label>
                <input 
                    type="text" 
                    name="title" 
                    id="title"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                    placeholder="عنوان محصول را وارد کنید"
                >
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-align-left ml-2 text-gray-500"></i>
                    توضیحات
                </label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 resize-none"
                    placeholder="توضیحات محصول را وارد کنید"
                ></textarea>
            </div>

            <!-- Image Upload Field -->
            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-image ml-2 text-gray-500"></i>
                    تصویر محصول
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-blue-400 transition duration-200">
                    <div class="space-y-1 text-center">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mx-auto"></i>
                        <div class="flex text-sm text-gray-600">
                            <label for="customProductImage" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                <span>آپلود فایل</span>
                                <input 
                                    id="customProductImage" 
                                    name="customProductImage" 
                                    type="file" 
                                    accept="image/*"
                                    class="sr-only"
                                >
                            </label>
                            <p class="pr-1">یا کشیدن و رها کردن</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF تا 2MB</p>
                    </div>
                </div>
                <div id="imagePreview" class="mt-4 hidden">
                    <img id="previewImage" class="max-h-48 rounded-lg shadow-md mx-auto">
                </div>
            </div>

            <!-- Material Limit Field -->
            <div class="form-group">
                <label for="material_limit" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-ruler-combined ml-2 text-gray-500"></i>
                    محدودیت متریال
                </label>
                <input 
                    type="text" 
                    name="material_limit" 
                    id="material_limit"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                    placeholder="محدودیت متریال را وارد کنید"
                >
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-gray-200">
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-3.5 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    <i class="fas fa-check ml-2"></i>
                    ثبت محصول
                </button>
            </div>
        </form>
    </div>

    <script>
        // Image Preview Script
        document.getElementById('customProductImage').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('previewImage');
                const previewContainer = document.getElementById('imagePreview');
                
                preview.src = URL.createObjectURL(file);
                previewContainer.classList.remove('hidden');
                
                preview.onload = function() {
                    URL.revokeObjectURL(preview.src);
                }
            }
        });

        // Form Validation Animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('border-red-500', 'ring-2', 'ring-red-200');
                    isValid = false;
                    
                    // Remove error class after 2 seconds
                    setTimeout(() => {
                        field.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
                    }, 2000);
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });

        // Input focus effects
        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-100', 'rounded-lg');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-100', 'rounded-lg');
            });
        });
    </script>

    <style>
        .form-group label {
            display: flex;
            align-items: center;
        }
        
        input:focus, textarea:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        #imagePreview img {
            max-width: 100%;
            height: auto;
            border: 2px solid #e5e7eb;
        }
    </style>
@endsection