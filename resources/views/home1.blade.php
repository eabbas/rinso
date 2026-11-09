@extends('client.document')
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
@section('title', 'رینسو | منوی دیجیتال کسب و کار شما')
@section('content')

<style>
    @import url(./fontiran.css);

    * {
        font-family: IRANSansXFaNum;
    }
</style>


<div class="w-full h-dvh relative flex gap-2 justify-center items-center">
    <p class="xl:text-6xl text-[7vw] font-bold text-[#FE9500]">در حال ساخت خانه هستیم </p>
    <span class="xl:text-6xl text-[7vw] font-bold text-[#FE9500]">...</span>
</div>


@endsection