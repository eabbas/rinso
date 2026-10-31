@extends('admin.app.panel')
    @section('title', ' لیست علاقه مندی ')
    @section('content')


    <div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800"> لیست علاقه مندی ها </h2>
        </div>
        <div class="flex flex-col gap-5">
            <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                <div class="min-w-full bg-gray-200">
                    <div class="bg-gray-100 grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">عنوان</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-2">نام صاحب کسب و کار</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">توضیحات</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">لوگو</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-3">عملیات</div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
      @foreach($careers as $career)
                        @if($career)
                        <div class="grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $career->title}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900 col-span-2">{{ $career?->user?->name }} {{ $career?->user?->family }}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $career->description}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $career->logo) ?>">
                            </div>
                            <div class="w-full grid grid-cols-4 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('favoriteCareer.delete', [$career->id])}}" class="ml-4 text-sky-700">حذف</a>
                                </div>
                                @if($career->menu)
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    {{-- <a href="{{ route('menu.list', [$career])}}" class="ml-4 text-sky-700">مشاهده منو</a> --}}
                                </div>
                                @endif
                            </div>
                        </div>
                        @else
                        <div>
                            <div class="px-6 py-4 text-center text-sm text-gray-500">
                                هیچ اطلاعاتی یافت نشد
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    @endsection