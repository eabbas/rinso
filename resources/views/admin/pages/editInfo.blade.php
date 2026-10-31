<div class="relative p-2 border-2 border-zinc-400 border-dashed rounded-lg">
    <div class="relative">
        <button onclick="pup_up_edit('oppen')" class=" absolute -top-5 -right-5 w-8 h-8 bg-zinc-200 rounded-lg cursor-pointer flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">
                <path d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z"/>
            </svg>
        </button>
        <div id="pup_up_edit_profile" class="fixed top-0 left-0 lg:w-[calc(100%-265px)] w-full h-full bg-black/30 z-50 flex items-center justify-center opacity-0 invisible transition-all duration-500">
            <div class="w-96 bg-white rounded-xl z-50 p-5 shadow-2xl">
                <div class="flex justify-start mb-4">
                    <button onclick="pup_up_edit('close')" class="w-7 h-7 border rounded-md flex items-center justify-center fill-gray-500 hover:fill-red-500 hover:border-red-500 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                        </svg>
                    </button>
                </div>

                <!-- بخش آپلود عکس‌ها -->
                <div class="flex flex-col gap-4 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">عکس کاور :</label>
                        <input type="file" name="cover_image" id="cover_image" accept="image/*" class="w-full bg-gray-50 rounded-lg p-1.5 border border-gray-300 focus:outline-none focus:border-gray-500 transition-all duration-300 text-sm file:mr-3 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">عکس لوگو :</label>
                        <input type="file" name="logo_image" id="logo_image" accept="image/*" class="w-full bg-gray-50 rounded-lg p-1.5 border border-gray-300 focus:outline-none focus:border-gray-500 transition-all duration-300 text-sm file:mr-3 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    </div>
                </div>

                <!-- بخش name -->
                <div class="w-full py-2 border-t border-gray-200 mb-4">
                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded-lg border-1 border-gray-400">
                       
                       <input type="text" name="title" class="w-full outline-none" value="{{ $page->title }}" id="titleInput">
                    </div>
                </div>
                {{-- بخش ساب تایتل --}}
                <div class="w-full py-2 border-t border-gray-200 mb-4">
                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded-lg border-1 border-gray-400">
                       <input type="text" name="subTitle" class="w-full outline-none" value="{{ $page->subTitle }}" id="subTitleInput">
                    </div>
                </div>

                {{-- <div class="w-full py-2 border-t border-gray-200 mb-4">
                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded-lg">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-gray-500">
                                <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM256 336c-18 0-32 14-32 32s14 32 32 32s32-14 32-32S274 336 256 336zM256 288c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32s32 14.33 32 32v128C288 273.7 273.7 288 256 288z"/>
                            </svg>
                            <div class="text-display">
                                @if($page->title)
                                    <span class="text-gray-800 text-sm">
                                {{ $page->title }}
                            </span>
                                @else
                                    <span class="text-gray-400 text-sm">
                                    عنوان صفحه
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-center cursor-pointer states" data-state="title" onclick='editInfo(this, "title", "{{ $page->title }}")'>
                    <span class="w-6 h-6 flex flex-row items-center justify-center rounded-md hover:bg-gray-200 transition-all duration-300" title="ویرایش">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-gray-500" viewBox="0 0 512 512">
                            <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                        </svg>
                    </span>
                        </div>
                    </div>
                </div> --}}


                <!-- بخش عنوان فرعی -->
                {{-- <div class="w-full py-2 border-t border-gray-200 mb-4">
                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded-lg">
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-gray-500">
                                <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM256 336c-18 0-32 14-32 32s14 32 32 32s32-14 32-32S274 336 256 336zM256 288c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32s32 14.33 32 32v128C288 273.7 273.7 288 256 288z"/>
                            </svg>
                            <div class="text-display">
                                @if($page->subTitle)
                                    <span class="text-gray-800 text-sm">
                                {{ $page->subTitle }}
                            </span>
                                @else
                                    <span class="text-gray-400 text-sm">
                                عنوان فرعی
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-center cursor-pointer states" data-state="subtitle" onclick='editInfo(this, "subtitle", "{{ $page->subTitle }}")'>
                            <span class="w-6 h-6 flex flex-row items-center justify-center rounded-md hover:bg-gray-200 transition-all duration-300" title="ویرایش">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-gray-500" viewBox="0 0 512 512">
                                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div> --}}
                <input type="hidden" id="page_id" value="{{ $page->id }}">
                <div class="flex justify-center">
                    <button onclick="saveAllChanges()" class="w-24 bg-[#eb3153] rounded-md text-white flex items-center justify-center p-1.5 text-sm hover:bg-gray-900 transition-all duration-300">
                        ثبت
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="">
            <img class="w-full h-[130px] object-cover lg:h-[200px] rounded-md" id="pageCover"
                 src="{{ $page->cover_path ? asset('storage/' . $page->cover_path) : asset('assets/img/bg-page.jpg')}}" alt="">
    </div>
    <div class="flex flex-col items-center justify-end w-full h-[100px]">
        <h2 class="text-center text-base lg:text-lg font-bold text-gray-800" id="pageTitle">
            {{ $page->title }}
        </h2>
        <span class="block text-cetner text-sm lg:text-md text-gray-500" id="pageSubTitle">
                    {{ $page->subTitle }}
        </span>
    </div>
        <img src="{{ $page->logo_path ? asset('storage/' . $page->logo_path) : asset('assets/img/user.png') }}" id="pageLogo"
             class="size-20 lg:size-30 rounded-full absolute inset-1/2 translate-x-1/2 -translate-y-1/5 object-cover"
             alt="">
</div>
<script>
    let pup_up_edit_profile= document.getElementById('pup_up_edit_profile')
    function pup_up_edit(viwe){
        if(viwe =='oppen'){
            pup_up_edit_profile.classList.remove('opacity-0')
            pup_up_edit_profile.classList.remove('invisible')
        }
        if(viwe =='close'){

            pup_up_edit_profile.classList.add('opacity-0')
            pup_up_edit_profile.classList.add('invisible')
        }
    }
</script>