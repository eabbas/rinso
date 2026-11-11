
@extends('admin.app.panel')

@section('title', 'همه کاربران')

@section('content')
<div class="w-full pb-6" dir="rtl">

    <div class="w-full rounded-2xl border border-[#E6E9EF] bg-white shadow-sm overflow-hidden">

        {{-- عنوان صفحه --}}
        <div class="px-5 py-5 md:px-7 border-b border-[#EEF0F3]">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#101827] text-[#FB9413]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-base md:text-lg font-bold text-[#101827]">لیست کاربران</h2>
                    <p class="mt-1 text-xs text-gray-400">مدیریت و مشاهده اطلاعات کاربران</p>
                </div>
            </div>
        </div>

        <form action="{{ route('user.deleteAll') }}" method="post" class="flex flex-col gap-5 p-4 md:p-6">
            @csrf

            {{-- جستجو --}}
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <input
                        class="w-full rounded-xl border border-[#E1E5EB] bg-[#F5F6F8] py-3 pr-4 pl-11 text-sm text-[#263449] outline-none transition placeholder:text-gray-400 focus:border-[#FB9413] focus:bg-white focus:ring-2 focus:ring-[#FB9413]/10"
                        type="text"
                        name="search"
                        placeholder="جستجو بر اساس نام یا شماره تلفن ..."
                        id="searchUser">

                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>

                <button
                    type="button"
                    onclick="searchUser()"
                    class="flex items-center justify-center gap-2 rounded-xl bg-[#101827] px-6 py-3 text-sm font-medium text-white transition hover:bg-[#263449]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    جستجو
                </button>
            </div>

            {{-- انتخاب و حذف گروهی --}}
            <div class="flex items-center justify-between rounded-xl border border-[#E6E9EF] bg-[#F8F9FB] px-4 py-3">
                <label for="all" class="flex cursor-pointer items-center gap-2.5 text-sm text-[#263449]">
                    <input
                        type="checkbox"
                        id="all"
                        onchange="checkAll()"
                        class="h-4 w-4 cursor-pointer rounded border-gray-300 accent-[#FB9413]">
                    انتخاب همه
                </label>

                <button
                    type="submit"
                    class="flex items-center gap-2 rounded-lg border border-red-100 bg-red-50 px-3 py-2 text-xs font-medium text-red-600 transition hover:bg-red-100"
                    title="حذف کاربران انتخاب‌شده">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                    </svg>
                    حذف انتخاب‌شده‌ها
                </button>
            </div>

            {{-- جدول کاربران --}}
            <div class="overflow-x-auto rounded-xl border border-[#E6E9EF]" style="scrollbar-width: thin;">
                <div class="min-w-[850px]">

                    {{-- سرستون‌ها --}}
                    <div class="grid grid-cols-11 items-center bg-[#F5F6F8] text-xs font-semibold text-[#526075]">
                        <div class="col-span-1 px-2 py-4 text-center">انتخاب</div>
                        <div class="col-span-1 px-2 py-4 text-center">ردیف</div>
                        <div class="col-span-1 px-2 py-4 text-center">تصویر</div>
                        <div class="col-span-2 px-2 py-4 text-center">نام و نام خانوادگی</div>
                        <div class="col-span-2 px-2 py-4 text-center">شماره تلفن</div>
                        <div class="col-span-1 px-2 py-4 text-center">نقش</div>
                        <div class="col-span-3 px-2 py-4 text-center">عملیات</div>
                    </div>

                    <div class="divide-y divide-[#EEF0F3] bg-white" id="userInfo">
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($users as $user)
                            <div class="grid grid-cols-11 items-center text-sm transition hover:bg-[#FAFBFC]">

                                <div class="col-span-1 flex items-center justify-center px-2 py-4">
                                    <input type="checkbox" class="check h-4 w-4 cursor-pointer rounded border-gray-300 accent-[#FB9413]" name="users[]" value="{{ $user->id }}">
                                </div>

                                <div class="col-span-1 px-2 py-4 text-center text-xs text-gray-500">
                                    {{ $i }}
                                </div>

                                <a href="{{ route('user.show', [$user]) }}" class="col-span-1 flex justify-center px-2 py-3">
                                    @if ($user->main_image)
                                        <img class="h-11 w-11 rounded-xl border border-[#E6E9EF] object-cover" src="{{ asset('storage/' . $user->main_image) }}">
                                    @endif
                                    @if (!$user->main_image)
                                        <img class="h-11 w-11 rounded-xl border border-[#E6E9EF] object-cover" src="{{ asset('assets/img/user.png') }}">
                                    @endif
                                </a>

                                <a href="{{ route('user.show', [$user]) }}" class="col-span-2 px-2 py-4 text-center text-xs font-medium text-[#263449] transition hover:text-[#FB9413]">
                                    {{ $user->name }} {{ $user->family }}
                                </a>

                                <a href="{{ route('user.show', [$user]) }}" class="col-span-2 px-2 py-4 text-center text-xs text-gray-500 transition hover:text-[#FB9413]">
                                    {{ $user->phoneNumber }}
                                </a>

                                <div class="col-span-1 px-2 py-4 text-center">
                                    <div class="flex flex-col items-center gap-1">
                                        @foreach ($user->roles as $role)
                                            <span class="rounded-md bg-[#F5F6F8] px-2 py-1 text-[10px] text-[#526075]">
                                                {{ $role }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-span-3 flex items-center justify-center gap-2 px-2 py-4">
                                    <a href="{{ route('user.show', [$user]) }}"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EEF4FF] text-[#3974C6] transition hover:bg-[#DCE9FF]"
                                        title="مشاهده">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 0 1 0-256z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('user.edit', [$user]) }}"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EFF8F2] text-[#29945A] transition hover:bg-[#DDF2E5]"
                                        title="ویرایش">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('user.delete', [$user]) }}"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#FFF0F0] text-red-500 transition hover:bg-[#FFE0E0]"
                                        title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7-24 24-24 0-24-10.7-24-24V128H80V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16-16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function searchUser() {
        let search = document.getElementById("searchUser")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url: "{{ route('user.search') }}",
            type: 'POST',
            dataType: "json",
            data: {
                'key': search.value
            },
            success: function(users) {
                console.log(users)
                let userInfo = document.getElementById("userInfo")
                userInfo.innerHTML = ``
                users.forEach((user, index) => {
                    let roles = user.roles
                    let roleTitle = ""
                    roles.forEach(role => {
                        roleTitle += role
                        roleTitle += "</br>"
                    })
                    let info = document.createElement("div")
                    info.classList = "grid grid-cols-11 items-center text-sm transition hover:bg-[#FAFBFC]"
                    info.innerHTML = `
                        <div class="col-span-1 flex items-center justify-center px-2 py-4">
                            <input type="checkbox" class="check h-4 w-4 cursor-pointer rounded border-gray-300 accent-[#FB9413]" name="users[]" value=${user.id}>
                        </div>

                        <div class="col-span-1 px-2 py-4 text-center text-xs text-gray-500">
                            ${index + 1}
                        </div>

                        <a href="${ '{{ url('users/show') }}/'+user.id }" class="col-span-1 flex justify-center px-2 py-3">
                            <img src="${user.main_image ? '{{ asset('storage/') }}/' + user.main_image : '{{ asset('storage/images/user.png') }}'}"
                                alt="user__avtar" class="h-11 w-11 rounded-xl border border-[#E6E9EF] object-cover">
                        </a>

                        <a href="${ '{{ url('users/show') }}/'+user.id }" class="col-span-2 px-2 py-4 text-center text-xs font-medium text-[#263449] hover:text-[#FB9413]">
                            ${user.name} ${user.family}
                        </a>

                        <a href="${ '{{ url('users/show') }}/'+user.id }" class="col-span-2 px-2 py-4 text-center text-xs text-gray-500 hover:text-[#FB9413]">
                            ${user.phoneNumber}
                        </a>

                        <div class="col-span-1 px-2 py-4 text-center">
                            <span class="text-xs text-[#526075]">${roleTitle}</span>
                        </div>

                        <div class="col-span-3 flex items-center justify-center gap-2 px-2 py-4">
                            <a href="{{ url('users/show/${user.id}') }}"
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EEF4FF] text-[#3974C6] transition hover:bg-[#DCE9FF]" title="مشاهده">
                                <span class="text-sm">◉</span>
                            </a>

                            <a href="{{ url('users/edit/${user.id}') }}"
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EFF8F2] text-[#29945A] transition hover:bg-[#DDF2E5]" title="ویرایش">
                                <span class="text-sm">✎</span>
                            </a>

                            <a href="{{ url('users/delete/${user.id}') }}"
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#FFF0F0] text-red-500 transition hover:bg-[#FFE0E0]" title="حذف">
                                <span class="text-sm">×</span>
                            </a>
                        </div>
                    `
                    userInfo.append(info)
                });

            },
            error: function() {
                alert('خطا در  دریافت داده')
            }
        });

    }
</script>

<script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
