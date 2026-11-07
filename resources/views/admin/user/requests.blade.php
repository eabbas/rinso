@extends('admin.app.panel')
@section('title', 'لیست درخواست های کاربران')
@section('content')

    <div class="w-full flex flex-col pb-4">
         <div class="bg-white rounded-lg">

             <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست درخواست ها</h2>

             <form action="{{ route('user.requestEvent') }}" method="post" class="flex flex-col gap-5">
                 @csrf
                 <div class="w-11/12 mx-auto flex flex-row justify-between items-center">
                     <div class="flex flex-row items-center gap-3">
                         <input type="checkbox" id="all" onchange="checkAll()">
                         <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                     </div>
                     <div class="flex flex-row items-center gap-5">
                        <select name="status" class="border-1 border-gray-300 rounded-md px-5 py-1.5">
                            <option value="accept">پذیرش</option>
                            <option value="delete">حذف</option>
                        </select>
                         <div class="flex justify-center">
                             <button
                                 class="w-fit flex flex-row items-center justify-center bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-sm cursor-pointer"
                                 title="ثبت">
                                 ثبت
                             </button>
                         </div>
                     </div>
                 </div>
                 <div class="w-11/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                     <div
                         class="w-full flex flex-row lg:grid lg:grid-cols-10 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                         <div class="text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                             <div class="w-10 lg:w-full h-10 text-gray-100"></div>
                         </div>
                         <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                             <span class="block w-20 lg:w-full">ردیف</span>
                         </div>
                         <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                             <span class="block w-20 lg:w-full">تصویر</span>
                         </div>
                         <div
                             class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                             <span class="block w-20 lg:w-full">نام</span>
                         </div>
                         <div
                             class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                             <span class="block w-20 lg:w-full">شماره تلفن</span>
                         </div>
                         {{-- <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                             <span class="block w-26 lg:w-full text-center">نقش</span>
                         </div> --}}
                         <div
                             class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-3">
                             <span class="block w-[270px] lg:w-full">عملیات</span>
                         </div>
                     </div>
                     <div class="bg-white divide-y divide-[#f1f1f4]" id="userInfo">
                         @php
                             $i = 1;
                         @endphp

                         @foreach ($requests as $request)
                         @php
                             Log::info($request)
                         @endphp
                             <div
                                 class="w-full flex flex-row lg:grid lg:grid-cols-10 items-center divide-x divide-[#f1f1f4]">
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                     <div class="w-10 lg:w-full">
                                         <input type="checkbox" class="check" name="requests[]" value="{{ $request->id }}">
                                     </div>
                                 </div>
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                     <span class="block w-20 lg:w-full">{{ $i }}</span>
                                 </div>
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                     <div class="w-20 lg:w-full">
                                         @if (isset($request->user->main_image))
                                             <a href="{{ route('user.show', [$request->user->id]) }}">
                                                 <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                     src="{{ asset('storage/' . $request->user->main_image) }}">
                                             </a>

                                         @endif
                                         @if (!isset($request->user->main_image))
                                             <a href="{{ route('user.show', [$request->user->id]) }}">
                                                 <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover rounded-md"
                                                     src="{{ asset('assets/img/user.png') }}">
                                             </a>

                                         @endif
                                     </div>
                                 </div>
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                     <span class="block w-20 lg:w-full">{{ $request->user->name }} {{ $request->user->family }}</span>
                                 </div>
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                     <span class="block w-20 lg:w-full">{{ $request->user->phoneNumber }}</span>
                                 </div>
                                 {{-- <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                     <span class="block w-24 lg:w-full text-xs">
                                         @foreach ($request->user->roles as $role)
                                             {{ $role }} </br>
                                         @endforeach
                                     </span>
                                 </div> --}}

                                 <div class="col-span-3">
                                     <div class="w-[270px] grid grid-cols-2 divide-x divide-[#f1f1f4] items-center">
                                       
                                         <div
                                             class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                            <a href="{{ route('user.acceptRequest', [$request->id]) }}" class="text-sky-700">
                                                پذیرش    
                                            </a>
                                         </div>
                                         <div
                                             class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                            <a href="{{ route('user.deleteRequest', [$request->id]) }}" class="text-red-700">
                                                حذف      
                                            </a>
                                         </div>
                                     </div>

                                 </div>
                             </div>

                             @php
                                 $i++;
                             @endphp
                         @endforeach
                     </div>
                 </div>
             </form>
         </div>
     </div>
 <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection