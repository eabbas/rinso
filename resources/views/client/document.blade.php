@include('header')

    <main class="2xl:container mx-auto w-full bg-[#f5f7fa]">
        <div class="w-full pb-40 pt-16">
            @yield('content')
        </div>
    </main>
    
@include('footer')
@if(Route::is('client.menu'))
    @include('newMenuJs')
@endif
