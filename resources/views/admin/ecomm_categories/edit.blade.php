@extends('admin.app.panel')
@section('title', 'ویرایش دسته ')
@section('content')
<?php //dd($ecomm_category->ecomm); ?>
<section class="2xl:container mx-auto">
    <div class="w-full mx-auto pb-5">
        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">
            <legend class="lg:text-3xl md:text-2xl text-md font-bold text-end text-gray-500 p-5 rounded-full">
     ویرایش اطلاعات دسته
            </legend>
            <form action="{{ route('ecomm_category.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="title" name="title" value="{{$ecomm_category->title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$ecomm_category->id}}">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="logo">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عکس دسته
                            </legend>
                            <input type="file" name="image_path" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>


                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">توضیحات
                            </legend>
                            <input type="description" name="description" value="{{$ecomm_category->description}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>


                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="address">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">فروشگاه
                            </legend>
                            <?php //dd($ecomm_category); ?>
                             <select  class="bg-grey-500" name="ecomm_id" id="ecomm_id" onchange="getEcommCategories(this,'edit')">
                                    @foreach($user->ecomms as $user_ecomm)
                                       <option value="<?php echo $user_ecomm->id;?>"  @if($user_ecomm->id==$ecomm_category->ecomm_id)
                                          {{"selected"}}
                                         @endif><?php echo $user_ecomm->title ?></option>
                                    @endforeach
                               </select>
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="address">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">والد دسته
                            </legend>
                             <select class="bg-grey-500" name="parent_id" id="ecomCategories">
                                    @foreach($ecomm->ecomm_category as $ecomm_categore)
                                    @if($ecomm_category!==$ecomm_categore)
                                    @if($ecomm_category!==1)
                                       <option value="<?php echo $ecomm_categore->id;?>"  @if($ecomm_category->parent_id==$ecomm_categore->id)
                                          {{"selected"}}
                                         @endif><?php echo $ecomm_categore->title ?></option>
                                             @endif
                                             @endif
                                    @endforeach
                                    <option value="0" @if(!$ecomm_category->parent_id) {{"selected"}}
                                        @endif>
                                    بدون والد</option>
                               </select>
                        </fieldset>
                    </div>


                  <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">

                        <lable class="w-30 text-sm mb-1 mt-2.5 flex">این محصول جز صفحه  اول هست</lable>
                              <input  value="1" type="checkbox" name="show_in_home"
                              @if ($ecomm_category->show_in_home) {{"checked"}} @endif
                             >
                     </div>
                </div>



                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ثبت</button>
                </div>
            </form>
        </fieldset>
    </div>
</section>
@endsection

