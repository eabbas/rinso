<div id="addCustomer">

    @if(!Auth::check())
        <div class="flex justify-center items-center w-40 py-2 bg-[#fc8e21] text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this , 'resturant')">
            عضویت در باشگاه مشتریان
        </div>
    @elseif(Auth::check() && ($career->user->id != Auth::id()))
        <div class="flex justify-center items-center w-40 py-2 bg-[#fc8e21] text-white text-xs font-bold rounded-sm cursor-pointer" onclick="addSpecialCustomer(this , 'resturant')">
            عضویت در باشگاه مشتریان
        </div>
    @elseif(Auth::check() && ($career->user->id == Auth::id()))
        <a href="{{ route('special-user.index', [$career->page->id]) }}" class="flex justify-center items-center w-40 py-2 bg-[#fc8e21] text-white text-xs font-bold rounded-sm cursor-pointer" onclick="specialCustomers(this)">
            باشگاه مشتریان
        </a>
    @endif
</div>