<style>
    input:focus {
        color: #2196F3;
    }
    .required-star {
        color: red;
        margin-right: 4px;
    }
</style>

@extends('admin.app.panel')
@section('title', 'ویرایش آموزشگاه')
@section('content')

<div class="text-center mb-4">
    <h1 class="text-lg font-bold text-gray-800">ویرایش آموزشگاه</h1>
</div>

<form action="{{ route('institute.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="id" value="{{ $institute->id }}">

    <div class="min-h-screen flex items-start justify-center">
        <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
            <div class="text-center mb-4">
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">

                    <!-- نام آموزشگاه (ضروری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span> نام آموزشگاه
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                name="title" value="{{ old('title', $institute->title) }}" placeholder="نام آموزشگاه را وارد کنید" required>
                        </div>
                    </div>

                    <!-- شماره تلفن (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span>شماره تلفن
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm text-right font-bold mr-2"
                                type="tel" name="phone" value="{{ old('phone', $institute->phone) }}" placeholder="شماره تماس">
                        </div>
                    </div>

                    <!-- لوگو (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold cursor-pointer"
                                type="file" name="logo" accept="image/*">
                        </div>
                        @if($institute->logo)
                            <div class="text-xs text-gray-500 mt-1">لوگو فعلی: {{ $institute->logo }}</div>
                        @endif
                    </div>

                    <!-- تصویر کاور (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر کاور</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold cursor-pointer"
                                type="file" name="cover_img" accept="image/*">
                        </div>
                        @if($institute->cover_img)
                            <div class="text-xs text-gray-500 mt-1">کاور فعلی: {{ $institute->cover_img }}</div>
                        @endif
                    </div>

                    <!-- استان (ضروری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
<label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span> استان
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                name="province" id="province_select" onchange="changeCity(this)" required>
                                <option value="">انتخاب استان</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" @if(isset($institute->province_city) && ($province->id == $institute->province_city->parent)){{ 'selected' }}@endif>
                                        {{ $province->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- شهر (ضروری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span> شهر
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                name="city" id="city" placeholder="شهر خود را انخاب کنید" required>
                                 @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if($city->id == $institute->city_id){{ 'selected' }}@endif>{{ $city->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- آدرس سایت (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس سایت</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold"
                                type="texxt" name="website" value="{{ old('website', $institute->website) }}" placeholder="https://example.com">
                        </div>
                    </div>

                    <!-- آدرس ایمیل (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس ایمیل</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold"
                                type="email" name="email" value="{{ old('email', $institute->email) }}" placeholder="example@domain.com">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star">*</span>انتخاب شعبه</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="parent_id">
                                <option value="0">شعبه مرکزی</option>
                                @if(isset($institutes) && count($institutes))
                                    @foreach ($institutes as $inst)
                                        <option value="{{ $inst->id }}" 
                                            {{ $institute->parent_id == $inst->id ? 'selected' : '' }}>
                                            {{ $inst->title }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <!-- آدرس (ضروری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1 lg:col-span-2">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span> آدرس
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" rows="6"
                                name="address" placeholder="آدرس کامل آموزشگاه" required>{{ old('address', $institute->address) }}</textarea>
                        </div>
                    </div>

                    <!-- توضیحات (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1 lg:col-span-2">
<label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" rows="6"
                                name="description" placeholder="توضیحات (اختیاری)">{{ old('description', $institute->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="w-full text-left">
                    <button type="submit"
                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                        به‌روزرسانی
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let citySelect = document.getElementById('city');
    let provinceSelect = document.getElementById('province_select');
    let currentCityId = "{{ old('city', $institute->city_id) }}";

    function changeCity(el) {
        citySelect.innerHTML = '<option value="">در حال بارگیری...</option>';
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" }
        });
        $.ajax({
            url: "{{ route('pc.city') }}",
            type: "POST",
            dataType: "json",
            data: { id: el.value },
            success: function(datas) {
                citySelect.innerHTML = '<option value="">شهر را انتخاب کنید</option>';
                datas.forEach(data => {
                    let option = document.createElement('option');
                    option.value = data.id;
                    option.innerText = data.title;
                    citySelect.appendChild(option);
                });
                // پس از بارگذاری، مقدار قبلی شهر را تنظیم کن
                if (currentCityId) {
                    citySelect.value = currentCityId;
                }
            },
            error: function() {
                alert('خطا در دریافت اطلاعات شهرها');
                citySelect.innerHTML = '<option value="">خطا در بارگیری</option>';
            }
        });
    }

    // اگر استان از قبل انتخاب شده باشد (در ویرایش)، شهرها را بارگیری کن
    if (provinceSelect.value) {
        changeCity(provinceSelect);
    }
</script>

@endsection