@extends('admin.app.panel')
@section('title', 'ثبت انواع محصول شخصی سازی شده')
@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-6 text-gray-800">افزودن نوع محصول جدید</h1>

    <form action="{{ route('cpm.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- ستون اول -->
            <div class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium mb-1">
                        عنوان *
                    </label>
                    <input type="text" 
                           name="title" 
                           id="title"
                           required
                           class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium mb-1">
                        توضیحات
                    </label>
                    <textarea name="description" 
                              id="description"
                              rows="3"
                              class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none"></textarea>
                </div>

                <div>
                    <label for="price_per_unit" class="block text-sm font-medium mb-1">
                        قیمت هر واحد *
                    </label>
                    <input type="number" 
                           name="price_per_unit" 
                           id="price_per_unit"
                           required
                           min="0"
                           class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium mb-1">
                        ترتیب
                    </label>
                    <input type="number" 
                           name="order" 
                           id="order"
                           min="0"
                           required
                           class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                </div>
            </div>

            <!-- ستون دوم -->
            <div class="space-y-4">
                <div>
                    <label for="image" class="block text-sm font-medium mb-1">
                        تصویر
                    </label>
                    <input type="file" 
                           name="image" 
                           id="image"
                           accept="image/*"
                           class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="max_unit_amount" class="block text-sm font-medium mb-1">
                        حداکثر تعداد واحد
                    </label>
                    <input type="number" 
                           name="max_unit_amount" 
                           id="max_unit_amount"
                           min="1"
                           required
                           class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                </div>
                {{-- @dd($customCategory->id); --}}
                <input type="hidden" name="custom_pro_id" value="{{ $customCategory->custom_products->id }}">
                <input type="hidden" name="category_id" value="{{ $customCategory->id }}">
                <div class="flex items-center">
                    <input type="checkbox" 
                           name="required" 
                           id="required"
                           value="1"
                           class="ml-2">
                    <label for="required" class="text-sm">
                        اجباری
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                ثبت محصول
            </button>
        </div>
    </form>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        const price = document.getElementById('price_per_unit').value;
        const product = document.querySelector('[name="custom_product_id"]').value;
        const category = document.querySelector('[name="custom_category_id"]').value;
        
        if (!title) {
            e.preventDefault();
            alert('لطفا عنوان را وارد کنید');
            return false;
        }
        
        if (!price || price < 0) {
            e.preventDefault();
            alert('لطفا قیمت معتبر وارد کنید');
            return false;
        }
        
        if (!product) {
            e.preventDefault();
            alert('لطفا محصول اصلی را انتخاب کنید');
            return false;
        }
        
        if (!category) {
            e.preventDefault();
            alert('لطفا دسته بندی را انتخاب کنید');
            return false;
        }
    });
</script>
@endsection