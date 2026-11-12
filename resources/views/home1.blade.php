@extends('client.document')
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
@section('title', 'رینسو | منوی دیجیتال کسب و کار شما')
@section('content')

<div id="message" class="fixed lg:top-28 top-10 left-10 lg:left-20 bg-white rounded-lg p-3 shadow-sm transition-all duration-300 @if(!session('message')) invisible opacity-0 @endif">
    <span class="text-sm text-(--primary-text-color)">{{ session('message') }}</span>
</div>

<div class="w-full h-dvh relative flex gap-2 justify-center items-center">
    <p class="xl:text-6xl text-[7vw] font-bold text-[#FE9500]">در حال ساخت خانه هستیم </p>
    <span class="xl:text-6xl text-[7vw] font-bold text-[#FE9500]">...</span>
</div>

<script>
    let message = document.getElementById('message')
    if(!message.classList.contains('invisible')){
        setTimeout(()=>{
            message.classList.add('invisible', 'opacity-0')
        }, 2000)
    }
</script>


@endsection