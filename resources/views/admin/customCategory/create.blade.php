@extends('admin.app.panel')
@section('title', 'ثبت دسته بندی')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-xl font-bold mb-6 text-gray-800">ثبت دسته بندی جدید</h1>

        <form action="{{ route('custmCategory.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium mb-2">
                    عنوان دسته بندی
                </label>
                <input type="text" 
                       name="title" 
                       id="title"
                       required
                       class="w-3/12 p-2 border rounded focus:border-blue-500 focus:outline-none">
            </div>
            <div class="mb-4">
                <label for="required" class="block text-sm font-medium">
                     الزامی بودن یا نبودن 
                </label>
                <input type="checkbox" 
                       name="required" 
                       value="1"
                       class="w-3/12 p-1 border rounded focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="max_item_amount" class="block text-sm font-medium mb-2">
                    حداکثر تعداد آیتم
                </label>
                <input type="number" 
                       name="max_item_amount" 
                       id="max_item_amount"
                       required
                       min="1"
                       class="w-3/12 p-2 rounded border-gray-300 rounded focus:border-blue-500 focus:outline-none">
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    ثبت
                </button>
            </div>
            {{-- @dd($cpVariant->custom_product->career->id) --}}
            <input type="hidden" name="custom_pro_id" value="{{ $custom_product->id }}">
                <input type="hidden" name="career_id" value="{{ $custom_product->career->id }}">
        </form>
    </div>

    <script>
        // اعتبارسنجی ساده
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const maxItem = document.getElementById('max_item_amount').value;
            
            if (!title) {
                e.preventDefault();
                alert('لطفا عنوان را وارد کنید');
                return false;
            }
            
            if (!maxItem || maxItem < 1) {
                e.preventDefault();
                alert('لطفا یک عدد معتبر وارد کنید');
                return false;
            }
        });
    </script>
@endsection