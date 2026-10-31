@extends('admin.app.panel')
@section('title', 'لیست آزمون ها')
@section('content')
<div class="2xl:container w-full px-5 mx-auto flex flex-col gap-3 pb-5">
    <div class="w-full flex flex-row items-center justify-between">
        <div class="flex flex-col gap-1.5">
            <h2 class="text-md font-bold text-(--primary-text-color)">لیست آزمون ها</h2>
            <span class="text-xs text-(--secondary-text-color)">مدیریت و مشاهده آزمون ها</span>
        </div>
        <button class="flex flex-row items-center justify-center gap-2 px-3 py-1.5 rounded-md border-1 border-gray-200 bg-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-(--primary-text-color)" viewBox="0 0 512 512">
                <path d="M0 73.7C0 50.7 18.7 32 41.7 32H470.3c23 0 41.7 18.7 41.7 41.7c0 9.6-3.3 18.9-9.4 26.3L336 304.5V447.7c0 17.8-14.5 32.3-32.3 32.3c-7.3 0-14.4-2.5-20.1-7l-92.5-73.4c-9.6-7.6-15.1-19.1-15.1-31.3V304.5L9.4 100C3.3 92.6 0 83.3 0 73.7zM55 80L218.6 280.8c3.5 4.3 5.4 9.6 5.4 15.2v68.4l64 50.8V296c0-5.5 1.9-10.9 5.4-15.2L457 80H55z"/>
            </svg>
            <span class="text-xs font-bold text-(--primary-text-color)">فیلتر</span>
        </button>
    </div>

@foreach($tests as $test)
    <div class="w-full p-3 bg-white rounded-md flex flex-col shadow-[0px_0px_2px_1px_#e7e7ef]">
        <div class="w-full flex flex-row items-center justify-between pb-3 border-b border-[#e4e5ea]">
            <div class="flex flex-row items-center gap-2">
                <div class="size-8 bg-[#f4f4f6] rounded-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" class="size-8">
                        <circle cx="200" cy="130" r="170" fill="none" stroke="#b4b4c9" stroke-width="20"></circle>
                        <circle cx="200" cy="130" r="110" fill="none" stroke="#b9b9c7" stroke-width="30"></circle>
                        <circle cx="200" cy="130" r="40" fill="#4dabf7" opacity="1"></circle>
                    </svg>

                </div>
                <span class="font-bold text-xs text-(--primary-text-color) in-fa">{{ $test->title }}</span>
                <span class="text-[10px] px-2 py-0.5 rounded-full border-1 @if($test->base->id == 1) text-(--primary-color) bg-(--primary-color)/10 border-(--primary-color) @elseif($test->base->id == 2) text-(--color-green) bg-(--color-green)/10 border-(--color-green) @elseif($test->base->id == 3) text-(--color-blue) bg-(--color-blue)/10 border-(--color-blue) @endif">{{ $test->base->title }}</span>
            </div>
            <div class="flex flex-col gap-1.5 items-end">
                <span class="text-[10px] text-(--secondary-text-color)">تعداد شرکت کنندگان</span>
                <span class="text-xs font-bold text-(--primary-text-color)">23</span>
            </div>
        </div>
        <div class="pt-3 w-full flex flex-col gap-3.5">
            <div class="w-full flex flex-row items-center">
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" class="size-5">
                            <circle cx="60" cy="60" r="55" fill="#f4f6fa"/>
                            <rect x="35" y="28" width="50" height="64" rx="6" fill="none" stroke="#4f46e5" stroke-width="2.5"/>
                            <line x1="45" y1="44" x2="75" y2="44" stroke="#4f46e5" stroke-width="2" stroke-linecap="round"/>
                            <line x1="45" y1="56" x2="68" y2="56" stroke="#4f46e5" stroke-width="2" stroke-linecap="round"/>
                            <line x1="45" y1="68" x2="72" y2="68" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                            <line x1="45" y1="76" x2="65" y2="76" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="82" cy="76" r="14" fill="#4f46e5"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">تعداد سوال</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa">{{count($test->questions)}}</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5 border-l-1 border-[#e4e5ea]">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" class="size-5">
                            <circle cx="60" cy="60" r="55" fill="#f4f6fa"/>
                            <rect x="32" y="30" width="56" height="56" rx="6" fill="none" stroke="#10b981" stroke-width="2.5"/>
                            <line x1="42" y1="46" x2="78" y2="46" stroke="#10b981" stroke-width="2" stroke-linecap="round"/>
                            <line x1="42" y1="58" x2="78" y2="58" stroke="#10b981" stroke-width="2" stroke-linecap="round"/>
                            <line x1="42" y1="70" x2="65" y2="70" stroke="#10b981" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="42" cy="46" r="2.5" fill="#10b981"/>
                            <circle cx="42" cy="58" r="2.5" fill="#10b981"/>
                            <circle cx="42" cy="70" r="2.5" fill="#10b981"/>
                            <line x1="42" y1="80" x2="70" y2="80" stroke="#d1d5db" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">توضیحات آزمون</span>
                    </div>
                    <span class="text-xs in-fa @if($test->description) font-bold text-(--primary-text-color) @else text-(--secondary-text-color) @endif w-full truncate text-center">{{ $test->description ?? 'ندارد' }}</span>
                </div>
                <div class="w-1/3 flex flex-col items-center justify-center gap-1.5">
                    <div class="flex flex-row items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-5"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="var(--secondary-text-color)"
                             stroke-width="1.6"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6.8"/>
                            <path d="M12 8.5V12"/>
                            <path d="M12 12L14.8 13.8"/>
                        </svg>
                        <span class="text-[10px] text-(--secondary-text-color)">مدت آزمون</span>
                    </div>
                    <span class="text-xs font-bold text-(--primary-text-color) in-fa" dir="ltr">{{ intval($test->duration/60)."' : ".($test->duration%60).'"' }}</span>
                </div>
            </div>
            <div class="w-full flex flex-row items-center gap-2">
                <a href="{{route('mquestion.create', $test->id)}}" class="w-1/4 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-blue-100 text-blue-500 text-xs cursor-pointer">
                    ایجاد سوال
                </a>
                <a href="{{route('mtest.single', $test->id)}}" class="w-1/4 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 @if($test->base->id == 1) bg-(--primary-color) @elseif($test->base->id == 2) bg-(--color-green) @elseif($test->base->id == 3) bg-(--color-blue) @endif text-white text-xs cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-white" viewBox="0 0 576 512">
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                    مشاهده
                </a>
                <a href="{{route('mtest.edit', $test->id)}}" class="w-1/4 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-[#e4e5ea] text-(--secondary-text-color) text-xs cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3"
                         viewBox="0 0 512 512">
                        <path fill="var(--secondary-text-color)"
                              d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                    </svg>
                    ویرایش
                </a>
                <a href="{{ route('mtest.delete' , $test->id) }}" class="w-1/4 flex flex-row gap-1 items-center justify-center py-1.5 rounded-md border-1 border-rose-500 text-rose-500 text-xs cursor-pointer">
                    حذف
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-rose-500" viewBox="0 0 448 512">
                        <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

@endforeach

</div>
@endsection