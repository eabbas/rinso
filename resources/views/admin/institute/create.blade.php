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
@section('title', 'ایجاد آموزشگاه')
@section('content')

<div class="text-center mb-4">
    <h1 class="text-lg font-bold text-gray-800">
        ایجاد آموزشگاه
    </h1>
</div>

<form action="{{ route('institute.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <div class="min-h-screen flex items-start justify-center">
        <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
            <div class="text-center mb-4">
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">

                    <!-- عنوان آموزشگاه (ضروری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span> نام آموزشگاه
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                name="title" placeholder="نام آموزشگاه" required>
                        </div>
                    </div>

                    <!-- شماره تلفن (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span>شماره تلفن
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm text-right font-bold mr-2"
                                type="text" name="phone" placeholder="شماره تماس" required>
                        </div>
                    </div>

                    <!-- لوگو (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold cursor-pointer"
                                type="file" name="logo" accept="image/*">
                        </div>
                    </div>

                    <!-- تصویر کاور (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر کاور</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold cursor-pointer"
                                type="file" name="cover_img" accept="image/*">
                        </div>
                    </div>

                    <!-- استان (ضروری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">
                            <span class="required-star">*</span> استان
                        </label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2"
                                name="province" onchange="changeCity(this)" required>
                                <option value="">انتخاب استان</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->title }}</option>
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
                                name="city" id="city" required>
                                <option value="">ابتدا استان را انتخاب کنید</option>
                            </select>
                        </div>
                    </div>

                    <!-- آدرس سایت (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس سایت</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold"
                                type="text" name="website" placeholder="https://example.com">
                        </div>
                    </div>

                    <!-- آدرس ایمیل (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس ایمیل</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold"
                                type="email" name="email" placeholder="example@domain.com">
                        </div>
                    </div>

                    <!-- انتخاب شعبه (اختیاری) -->
                   <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex"><span class="required-star">*</span>انتخاب شعبه</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <select class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name="parent_id">
                                <option value="0">شعبه مرکزی</option>
                                @if(isset($institutes) && count($institutes))
                                    @foreach ($institutes as $inst)
                                        <option value="{{ $inst->id }}" 
                                            {{ request()->get('parent_id') == $inst->id ? 'selected' : '' }}>
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
                                name="address" placeholder="آدرس کامل آموزشگاه را وارد کنید" required></textarea>
                        </div>
                    </div>
<!-- توضیحات (اختیاری) -->
                    <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1 lg:col-span-2">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                        <div class="rounded-lg bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" rows="6"
                                name="description" placeholder="توضیحات (اختیاری)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="w-full text-left">
                    <button type="submit"
                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                        ثبت
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let citySelect = document.getElementById('city');

    function changeCity(el) {
        citySelect.innerHTML = '<option value="">در حال بارگیری...</option>';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "{{ route('pc.city') }}",
            type: "POST",
            dataType: "json",
            data: { id: el.value },
            success: function (datas) {
                citySelect.innerHTML = '<option value="">شهر را انتخاب کنید</option>';
                datas.forEach(data => {
                    let option = document.createElement('option');
                    option.value = data.id;
                    option.innerText = data.title;
                    citySelect.appendChild(option);
                });
            },
            error: function () {
                alert('خطا در دریافت اطلاعات شهرها');
                citySelect.innerHTML = '<option value="">خطا در بارگیری</option>';
            }
        });
    }

    // در صورت وجود مقدار از قبل انتخاب شده برای استان (مثل ویرایش)، می‌توانید city را بارگیری کنید
    @if(old('province') || (isset($institute) && $institute->province_id))
        window.addEventListener('DOMContentLoaded', function() {
            let provinceSelect = document.querySelector('select[name="province"]');
            if(provinceSelect) {
                changeCity(provinceSelect);
                // مقدار قبلی شهر را تنظیم کنید (در صورت نیاز)
                let oldCity = "{{ old('city', isset($institute) ? $institute->city_id : '') }}";
                if(oldCity) {
                    setTimeout(function() {
                        citySelect.value = oldCity;
                    }, 300);
                }
            }
        });
    @endif
</script>

@endsection