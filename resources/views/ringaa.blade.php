
<div class="max-w-[1700px] flex flex-col">
    @include('header')

    <footer class="w-full flex justify-center rounded-t-4xl bg-white fixed bottom-0">
        <div class="w-11/12 mt-2 flex justify-between items-center ">
            <div class="flex flex-col items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4" fill="#fc8e21">
                    <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <span class="text-[10px] text-[#fc8e21]">خانه</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <svg  viewBox="0 0 512 512" class="w-4" fill="#7f7e84"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                <span class="text-[10px]">علاقه مندی ها</span>
            </div>
            <div class="flex flex-col items-center mb-3">
                <div class="size-11 bg-white flex justify-center items-center rounded-full relative -top-5">
                    <div class="size-8 bg-[#fc8e21] rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-6 fill-white" fill="#7f7e84">
                            <path d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z"/>
                        </svg>
                    </div>
                </div>
                <span class="text-[10px]">ثبت آگهی</span>
            </div>
            <div class="flex flex-col items-center gap-2 relative">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4" fill="#7f7e84"><path d="M160 512l48-32 96-64H464h48V368 48 0H464 48 0V48 368v48H48h64 48v38.3V464v48zM277.4 376.1L208 422.3V416 368H160 48V48H464V368H304 289.5l-12.1 8.1zM144 240a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                <span class="text-[10px]">پیام ها</span>
                <span class="w-2 h-2 rounded-full bg-[#fc8e21] absolute -right-1 -top-2"></span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4" fill="#7f7e84">
                    <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                </svg>
                <span class="text-[10px]">پرو فایل</span>
            </div>
        </div>
    </footer>



</div>
{{--<script src="{{ asset('assets/js/userPanel.js') }}"></script>--}}

</body>
</html>
