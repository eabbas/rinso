let menuCat = document.getElementById('menuCat')
let num = 1
function newMenuCat(){
    let div = document.createElement('div')
    div.classList = 'w-full flex lg:flex-row flex-col gap-3 my-4 border-t border-gray-300 lg:border-none'
    let element = `
            <div class="lg:hidden flex flex-row justify-end items-end pt-4">
                <button type="button" onclick="removeCat(this)" class="p-1 rounded-md bg-red-300 hover:bg-red-500 text-sm cursor-pointer hover:text-white">حذف</button>
            </div>
            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row">
                    <span>عنوان دسته:</span>
                    <span class="text-rose-500">*</span>
                </label>

                <div
                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                        name='menuCat[${num}][title]' placeholder="نوشیدنی" title="عنوان دسته منو" required>
                </div>
            </div>
            
            
            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته:</label>

                <div
                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer" type="file"
                        name="menuCat[${num}][image]" title="تصویر دسته">
                </div>
            </div>
            <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                <div
                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                        name='menuCat[${num}][description]' placeholder="توضیحات دسته"
                        class="w-full px-3 py-1 md:px-2 outline-none text-gray-500">
                </div>
            </div>
            <div class="hidden lg:flex items-end pb-4">
                <button type="button" onclick="removeCat(this)" class="p-1 rounded-md bg-red-300 hover:bg-red-500 text-sm cursor-pointer hover:text-white">حذف</button>
            </div>
    `
    div.innerHTML = element
    menuCat.appendChild(div)
    num++
}

function removeCat(el){
    console.log(555);
    
    el.parentElement.parentElement.remove()
}

let activities = document.querySelectorAll('.activities')
activities.forEach((item)=>{
    item.addEventListener('click', ()=>{
        if (item.nextElementSibling.classList.contains('invisible')) {
            activities.forEach((actItem)=>{
                actItem.nextElementSibling.classList.add('invisible')
                actItem.nextElementSibling.classList.add('opacity-0')
                actItem.nextElementSibling.classList.add('-translate-y-5')
                actItem.classList.remove('bg-gray-300')
                actItem.classList.add('bg-gray-200')
            })
            item.nextElementSibling.classList.remove('invisible')
            item.nextElementSibling.classList.remove('opacity-0')
            item.nextElementSibling.classList.remove('-translate-y-5')
            item.classList.remove('bg-gray-200')
            item.classList.add('bg-gray-300')
        } else {
            item.nextElementSibling.classList.add('invisible')
            item.nextElementSibling.classList.add('opacity-0')
            item.nextElementSibling.classList.add('-translate-y-5')
            item.classList.remove('bg-gray-300')
            item.classList.add('bg-gray-200')
        }
    })
})
