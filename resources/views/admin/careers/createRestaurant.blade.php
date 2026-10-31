@extends('admin.app.panel')
@section('title', 'ایجاد رستوران')
@section('content')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    @if ($user !== Auth::user())
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ایجاد رستوران برای {{ $user->name }}
            {{ $user->family }}</h1>
    @else
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">فرم اطلاعات رستوران</h1>
    @endif
    <form action="{{ route('career.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="page_id" value="{{ $page->id }}">
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">

                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">نام رستوران</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                       name='title' placeholder="نام رستوران خود را وارد کنید" required>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">نوع رستوران</label>
                            <div
                                    class="p-3 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex pl-3">
                                <select name="careerCategory"
                                        class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer" required>
                                    @foreach ($careerCategories as $careerCategory)
                                        <option value="{{ $careerCategory->id }}">{{ $careerCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">تعداد میز</label>
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                                       name='qr_count' min="0" value="0">
                            </div>
                        </div>

                    </div>
                    <div class="w-full text-left ">
                        <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pinter">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
