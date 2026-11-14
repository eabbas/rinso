@include('header')

    <main class="2xl:container mx-auto w-full bg-[#f5f7fa]">
        {{-- pb-40 pt-16 --}}
        <div class="w-full">
            @yield('content')
        </div>
    </main>
    
@include('footer')
@if(Route::is('client.menu'))
    @include('newMenuJs')
@endif
