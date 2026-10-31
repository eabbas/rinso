<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('settings.mainAds.upsertMainAds')}}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="block text-purple-700 text-2xl mb-10 mt-10 text-center ">ایجاد  بنر تبلیغاتی سایت </label>
            <div class="relative">
                <input type="file" name="mainAdsImage" class="w-1/2 flex mx-auto px-4 py-3 pr-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                <i class="fas fa-camera absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <!-- پیش‌نمایش عکس‌ها -->
            <div i3d="imagePreview" class="mt-4 grid grid-cols-3 gap-2 hidden">
            <!-- پیش‌نمایش عکس‌ها اینجا نمایش داده می‌شود -->
            </div>
        </div>
        @csrf
        <div class="px-8 py-6">
                    <button type="submit" class="w-1/6 flex mx-auto bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium py-4 px-6 rounded-xl transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                        <i class="fas fa-plus-circle ml-2"></i>
                        ایجاد بنر تبلیغاتی
                    </button>
                </div>
    </form>
</body>
</html>