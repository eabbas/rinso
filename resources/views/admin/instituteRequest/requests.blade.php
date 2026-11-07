@extends('admin.app.panel')
@section('title', 'درخواست ها')
@section('content')
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">

            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست درخواست های آموزشگاه {{$institute->title}}</h2>

            <form class="flex flex-col gap-5" action="{{ route('career.deleteAll') }}" method="post">
                @csrf
                <div class="w-11/12 mx-auto flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-3">
                        <input type="checkbox" id="all" onchange="checkAll()">
                        <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                    </div>
                    <div class="flex justify-center">
                        <button
                            class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                            title="حذف">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div
                    class="w-11/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                    <div
                        class="w-full flex flex-row lg:grid lg:grid-cols-11 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                        <div class="px-1 text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                            <div class="w-10 lg:w-full h-10"></div>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-10 lg:w-full">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">تصویر</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">نام استاد</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-1">
                            <span class="block w-20 lg:w-full">رشته</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">شماره تلفن</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-3">
                            <span class="block w-[320px] lg:w-full">عملیات</span>
                        </div>

                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @php
                            $i = 1;
                        @endphp
                        @if($institute->users)
                        @foreach ($institute->users as $user)
                                <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-11 items-center divide-x divide-[#f1f1f4]">
                                <div
                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <div class="w-10 lg:w-full">
                                    <input type="checkbox" class="check" name="institutes[]" value="{{ $user->id }}">
                                </div>
                            </div>
                            <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-10 lg:w-full">{{ $i }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                            <div class="w-20 lg:w-full">
                                                @if ($user->main_image)
                                             <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                 src="{{ asset('storage/' . $user->main_image) }}">
                                                @endif
                                                @if (!$user->main_image)
                                             <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                 src="{{ asset('assets/img/user.png') }}">
                                               @endif
                                            </div>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                            <a href="{{ route('user.show', [$user->id]) }}"
                                                class="block w-20 lg:w-full">{{ $user->name }} {{$user->family}}</a>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-1">
                                            <a href="{{ route('field.single', [$field->id]) }}"
                                                class="block w-20 lg:w-full">{{ $field->title }}</a>
                                        </div>
                                        <div
                                         class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center col-span-2">
                                        <span class="block w-24 lg:w-full">{{ $user->phoneNumber }}</span>
                                        </div>
                                
                                <div class="flex items-center justify-center col-span-3">
                                     <div class="w-[270px] grid grid-cols-3 divide-x divide-[#f1f1f4] items-center">
                                        <div
                                             class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                             <a href="{{ route('institute.master_classes', [$user]) }}" class="text-sky-700">کلاس ها</a>
                                         </div>
                                         {{-- @dd($user); --}}
                                         @if($user->pivot->status == '0')
                                         <div  class="inline-block px-3 py-2 mr-5 rounded-md border border-blue-600 text-blue-600 text-center hover:bg-blue-50">
                                             <a href="{{route('request.request_approve' , [$user->id , $institute->id])}}">
                                                 تایید
                                             </a>
                                         </div>
                                        @endif
                                        @if($user->pivot->status == '1')
                                        <div class="inline-block px-3 py-1.5 mr-5 rounded-md border border-green-600 text-green-600 text-nowrap">
                                            <span >
                                                تایید شد
                                            </span>
                                        </div>
                                        @endif
                                         <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-1">
                                             <li class="flex justify-center">
                                                 <a href="{{ route('request.userDelete', [$user,$institute]) }}"
                                                     class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm"
                                                     title="حذف">
                                                     <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                         viewBox="0 0 448 512">
                                                         <path fill="white"
                                                             d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                     </svg>
                                                 </a>
                                             </li>
                                         </ul>
                                    </div>
                                 </div>
                            </div>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @else
                                <div>
                                    <div class="px-1 lg:px-6 py-4 text-center text-xs lg:text-sm text-gray-500">
                                        هیچ اطلاعاتی یافت نشد
                                    </div>
                                </div>

                        @endif
                    </div>
                </div>
            </form>
        </div>
        {{-- دکمه بازگشت --}}
        {{-- <div class="w-11/12 mx-auto pb-6 flex justify-end mt-3">
            <a href="{{ route('institute.single' , [$institute]) }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
                بازگشت
            </a>
        </div> --}}
    </div>
    
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection