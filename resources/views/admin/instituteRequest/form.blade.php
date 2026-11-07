@extends('admin.app.panel')
@section('title')
    ارسال درخواست 
@endsection

@section('content')
    <div class="pt-3 my-4 lg:my-8">
         <h2 class="text-lg font-bold text-gray-800 p-4 text-center">درخواست همکاری با آموزشگاه {{$institute->title}}</h2>
        <form action="{{ route('request.store') }}" method="post"
            class="rounded-lg pb-4 bg-white" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="institute_id" value="{{$institute->id}}">
            <div class="p-5 px-6">
                <div class="w-full">
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col lg:flex-row">
                            <div class="w-full lg:w-2/12 text-sm py-4">رشته های آموزشگاه</div>
                            <div class="w-full lg:w-10/12 text-sm">
                                <select
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                    name="field_id">
                                    @foreach ($institute->fields as $field)
                                        <option value="{{ $field->id }}">
                                            {{ $field->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-10  flex justify-end pl-6 gap-2">
                <button class="px-4 py-2 bg-[#1B84FF] rounded-[7px] text-white cursor-pointer" type="submit">
                    ارسال درخواست</button>
            </div>
        </form>
    </div>
@endsection
