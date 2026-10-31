@extends('admin.app.panel')
@section('title', 'لیست پیشنهادات')
@section('content')
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg px-3">
            <div class="pb-4">
                <h2 class="text-lg font-bold text-gray-800 py-3">لیست پیشنهادات </h2>
            </div>
             <div class="flex justify-end w-10/12 mx-auto">
                    <a href="{{ route('suggestion.create') }}"
                        class="px-5 py-1 mb-4 rounded-sm bg-[#eb3254] hover:bg-rose-600 text-white text-xs lg:text-base">افزودن +</a>
                </div>
            <div class="flex flex-col gap-5">
                <div class="w-10/12 mx-auto rounded mb-5 overflow-x-auto">
                    <div
                        class="w-full flex flex-row lg:grid lg:grid-cols-4 items-center divide-x divide-gray-100 sticky -top-5">
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">عنوان</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-20 lg:w-full">توضیحات</span>
                            </div>
                         <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                             <span class="block w-24 lg:w-full">عملیات</span>
                         </div>

                     </div>
                     <div class="bg-white divide-y divide-gray-100">
                         @php
                             $i = 1;
                         @endphp

                         @foreach ($suggestions as $suggestion)
                             <div
                                 class="w-full flex flex-row lg:grid lg:grid-cols-4 items-center divide-x divide-gray-100">
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                     <span class="block w-20 lg:w-full">{{ $i }}</span>
                                 </div>
                                
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                     <span class="block w-20 lg:w-full">{{ $suggestion->title }}</span>
                                 </div>
                                 <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <div class="block w-20 lg:w-full max-h-24 overflow-y-auto break-words scrolling-auto">
                                        {{ $suggestion->description }}
                                    </div>
                                </div>


                                 <ul class="w-24 p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center ">
                                     <li class="w-full flex justify-center items-center">
                                         <a href="{{ route('suggestion.delete', [$suggestion]) }}"
                                             class="w-10 flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm mx-auto lg:mx-0"
                                             title="حذف">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                 <path fill="white"
                                                     d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                             </svg>
                                         </a>
                                     </li>
                                 </ul>

                             </div>

                             @php
                                 $i++;
                             @endphp
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection