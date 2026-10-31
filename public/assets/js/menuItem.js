let ingredients = document.getElementById('ingredients')

let num = 0

if (count) {
    num = count
}
function addIngre(){
   let div = document.createElement('div')
   div.classList = 'w-full flex flex-col my-4 bg-gray-200 p-3 rounded-lg'
   let element = `
    <div class="flex justify-end pb-4">
        <button type="button" onclick="removeIngre(this)" class="p-1 rounded-md bg-red-300 hover:bg-red-500 text-sm cursor-pointer hover:text-white">حذف</button>
    </div>
   <div class="flex lg:flex-row flex-col gap-3">
        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row">
                <span>عنوان :</span>
                <span class="text-rose-500">*</span>
            </label>

            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text" placeholder="عنوان" name="ingredients[${num}][title]" required>
            </div>
        </div>
        
        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
            <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                    name='ingredients[${num}][description]' placeholder="توضیحات ">
            </div>
        </div>
   </div>

    <div class="flex lg:flex-row flex-col gap-3">
        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
            <label class="w-30 text-sm mb-1 mt-2.5 flex">قیمت واحد</label>
            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                    name='ingredients[${num}][price_per_unit]' placeholder="قیمت واحد" required>
            </div>
        </div>
        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
            <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر</label>
            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                    name='ingredients[${num}][image]'>
            </div>
        </div>

         <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
            <label class="w-30 text-sm mb-1 mt-2.5 flex">بیشترین حد مجاز</label>
            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number"
                    name='ingredients[${num}][max_unit_amount]' placeholder="x واحد" required>
            </div>
        </div>
    </div>

    
   `
   div.innerHTML = element
   ingredients.appendChild(div)
   console.log(num);
   num++
}

function removeIngre(el){
    el.parentElement.parentElement.remove()
}