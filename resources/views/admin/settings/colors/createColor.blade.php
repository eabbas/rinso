<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
   <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
   <title>color settings</title>
</head>

<body>


   <div class="w-full h-svh bg-[url('https://keenthemes.com/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-10.png')] bg-cover bg-no-repeat">
      <h2 class="text-3xl text-center font-bold py-10 text-[#425A8B]">فرم رنگ های وبسایت</h2>
      <div class="w-2/3 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white">

         <form action="{{route('settings.colors.upsertColor')}}" method="post">
            @csrf

            <div class="grid grid-cols-3 gap-5">


               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[0]->meta_key }}">
                    رنگ اصلی:
                  </label>
                  <input type="color" value="{{ $settings[0]->meta_value }}" class="size-10 outline-none" name="{{ $settings[0]->meta_key }}" id="{{ $settings[0]->meta_key }}">
               </div>

               
               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[1]->meta_key }}">
                   رنگ دکمه های ساب هدر:
                  </label>
                  <input type="color" value="{{ $settings[1]->meta_value }}" class="size-10 outline-none" name="{{ $settings[1]->meta_key }}" id="{{ $settings[1]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[2]->meta_key }}">
                   رنگ متن ها:
                  </label>
                  <input type="color" value="{{ $settings[2]->meta_value }}" class="size-10 outline-none" name="{{ $settings[2]->meta_key }}" id="{{ $settings[2]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[3]->meta_key }}">
                  رنگ متن های فرعی:
                  </label>
                  <input type="color" value="{{ $settings[3]->meta_value }}" class="size-10 outline-none" name="{{ $settings[3]->meta_key }}" id="{{ $settings[3]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[4]->meta_key }}">
                  رنگ متن های اصلی:
                  </label>
                  <input type="color" value="{{ $settings[4]->meta_value }}" class="size-10 outline-none" name="{{ $settings[4]->meta_key }}" id="{{ $settings[4]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[5]->meta_key }}">
                  رنگ دکمه کارت های محصول:
                  </label>
                  <input type="color" value="{{ $settings[5]->meta_value }}" class="size-10 outline-none" name="{{ $settings[5]->meta_key }}" id="{{ $settings[5]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[6]->meta_key }}">
                  رنگ هاور دکمه:
                  </label>
                  <input type="color" value="{{ $settings[6]->meta_value }}" class="size-10 outline-none" name="{{ $settings[6]->meta_key }}" id="{{ $settings[6]->meta_key }}">
               </div>


               <div class="w-full flex flex-row items-center justify-between gap-2">
               <label for="{{ $settings[7]->meta_key }}">
                  رنگ دکمه های اصلی:
                  </label>
               <input type="color" value="{{ $settings[7]->meta_value }}" class="size-10 outline-none" name="{{ $settings[7]->meta_key }}" id="primary-btn">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[8]->meta_key }}">
                  رنگ هاور دکمه های اصلی:
                  </label>
                  <input type="color" value="{{ $settings[8]->meta_value }}" class="size-10 outline-none" name="{{ $settings[8]->meta_key }}" id="{{ $settings[8]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[9]->meta_key }}">
                  رنگ زمینه سکشن ارتباط با ما:
                  </label>
                  <input type="color" value="{{ $settings[9]->meta_value }}" class="size-10 outline-none" name="{{ $settings[9]->meta_key }}" id="{{ $settings[9]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[10]->meta_key }}">
                  رنگ دکمه سکشن ارتباط با ما:
                  </label>
                  <input type="color" value="{{ $settings[10]->meta_value }}" class="size-10 outline-none" name="{{ $settings[10]->meta_key }}" id="{{ $settings[10]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[11]->meta_key }}">
                  رنگ هاور دکمه سکشن ارتباط با ما:
                  </label>
                  <input type="color" value="{{ $settings[11]->meta_value }}" class="size-10 outline-none" name="{{ $settings[11]->meta_key }}" id="{{ $settings[11]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[12]->meta_key }}">
                 رنگ بوردر ها:
                  </label>
                  <input type="color" value="{{ $settings[12]->meta_value }}" class="size-10 outline-none" name="{{ $settings[12]->meta_key }}" id="{{ $settings[12]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[13]->meta_key }}">
                 رنگ پس زمینه تخفیف ها:
                  </label>
                  <input type="color" value="{{ $settings[13]->meta_value }}" class="size-10 outline-none" name="{{ $settings[13]->meta_key }}" id="{{ $settings[13]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[14]->meta_key }}">
                رنگ آیکون ها:
                  </label>
                  <input type="color" value="{{ $settings[14]->meta_value }}" class="size-10 outline-none" name="{{ $settings[14]->meta_key }}" id="{{ $settings[14]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[15]->meta_key }}">
               رنگ ثانویه :
                  </label>
                  <input type="color" value="{{ $settings[15]->meta_value }}" class="size-10 outline-none" name="{{ $settings[15]->meta_key }}" id="{{ $settings[15]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[16]->meta_key }}">
                     رنگ پس زمینه عملکرد ها:
                  </label>
                  <input type="color" value="{{ $settings[16]->meta_value }}" class="size-10 outline-none" name="{{ $settings[16]->meta_key }}" id="{{ $settings[16]->meta_key }}">
               </div>

               <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[17]->meta_key }}">
                     رنگ اعلان های اضطراری:
                  </label>
                  <input type="color" value="{{ $settings[17]->meta_value }}" class="size-10 outline-none" name="{{ $settings[17]->meta_key }}" id="{{ $settings[17]->meta_key }}">
               </div>


                <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[18]->meta_key }}">
                    رنگ آیکون اینفو:
                  </label>
                  <input type="color" value="{{ $settings[18]->meta_value }}" class="size-10 outline-none" name="{{ $settings[18]->meta_key }}" id="{{ $settings[18]->meta_key }}">
               </div>


                <div class="w-full flex flex-row items-center justify-between gap-2">
                  <label for="{{ $settings[19]->meta_key }}">
                   رنگ پس زمینه ثانویه:
                  </label>
                  <input type="color" value="{{ $settings[19]->meta_value }}" class="size-10 outline-none" name="{{ $settings[19]->meta_key }}" id="{{ $settings[19]->meta_key }}">
               </div>




            </div>


            
            <div class="mt-5 text-center">
              <button type="submit" class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
           </div>
         </form>
      </div>
   </div>
</body>

</html>