let featureCount = 1
if (rowCount) {
    featureCount = rowCount
}

let valueCount = 0
if (v_count) {
    valueCount = v_count
}
let attribute = document.getElementById('attribute')
function add() {
    valueCount = 0
    let div = document.createElement('div')
    div.setAttribute('data-count', featureCount);
    let element = `
    <div class="w-full flex flex-col items-end gap-3 lg:gap-5 mt-3 md:mt-5 border-b border-gray-300 pb-3">
        <div class="w-full flex flex-row max-md:flex-col items-end gap-1 lg:gap-5 mt-3 md:mt-5 pb-3 relative">
            <div class="w-full flex flex-row gap-3 items-center max-md:justify-center">
                <div class="w-55 max-md:w-4/12 flex flex-col">
                    <label class="max-md:text-sm mb-2 font-bold">عنوان منو</label>
                    <input type="text"
                        class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                        placeholder="نام" name="menu_data[${featureCount}][name]">
                </div>
                <div class="w-55 max-md:w-4/12 flex flex-col">
                    <label class="max-md:text-sm mb-2 font-bold">تصویر منو</label>
                    <input type="file"
                        class="outline-none pr-5 py-2 bg-[#F9F9F9] border border-gray-300 rounded-xl focus:bg-[#f1f1f4]"
                        name="menu_data[${featureCount}][menu_image]">
                </div>
            </div>
            <button type="button" class="absolute -top-5 left-5 text-xs lg:text-base p-1 lg:p-2 rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                onclick="remove(this)">حذف</button>
        </div>
        <div class="w-full flex flex-col gap-2" data-value="1">
            <div class="w-12/12 flex flex-row max-md:flex-col items-end gap-3 my-2">
                <div class="w-full flex flex-row max-md:grid max-md:grid-cols-2 items-center gap-3 mb-0">
                    <div class="w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2">نام آیتم</label>
                        <input type="text"
                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            placeholder="نوشابه" name="menu_data[${featureCount}][values][${valueCount}][title]">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2">قیمت آیتم</label>
                        <input type="number" placeholder="500.000تومان"
                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            name="menu_data[${featureCount}][values][${valueCount}][price]">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2">توضیحات آیتم </label>
                        <input type="text"
                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            placeholder="بدون قند" name="menu_data[${featureCount}][values][${valueCount}][description]">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2"> تصویر آیتم</label>
                        <input type="file"
                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            name="menu_data[${featureCount}][values][${valueCount}][gallery]">
                    </div>
                </div>
                <div class="flex items-end max-md:w-full max-md:justify-end">
                    <button type="button"
                        class="mt-2 size-8 mb-[3px] max-md:h-9 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                        onclick="removeAttrButton(this)">X</button>
                </div>
            </div>
        </div>
        <button type="button"
            class="w-6/12 font-bold md:w-8/12 h-10 mx-auto rounded-[8px] bg-green-500 text-white text-lgd:jus text-center inline-block mt-3"
            onclick="addAttr(this)">+</button>
    </div>
        `
    div.innerHTML = element
    attribute.appendChild(div)
    featureCount++
    console.log(valueCount);

}


function addAttr(el) {
    let num = el.parentElement.parentElement.getAttribute('data-count')
    let div = document.createElement('div')
    valueCount++
    div.classList = "w-full flex flex-row items-end gap-3"
    let element = `
        <div class="w-full flex flex-col gap-2" data-value="${valueCount}">
            <div class="w-full flex flex-row max-md:flex-col items-end gap-3">
            <div class="w-full flex flex-row max-md:grid max-md:grid-cols-2 items-center gap-3 mb-0">
                    <div class="w-3/12 max-md:w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2"> نام آیتم</label>
                        <input type="text"
                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            placeholder="نوشابه" name="menu_data[${num}][values][${valueCount}][title]">
                    </div>
                    <div class="w-3/12 max-md:w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2"> قیمت آیتم</label>
                        <input type="number" placeholder="500.000تومان"
                            class="  border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer" name="menu_data[${num}][values][${valueCount}][price]">
                    </div>
                    <div class="w-3/12 max-md:w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2"> توضیحات آیتم</label>
                        <input type="text"
                            class="  border border-gray-300 rounded-[8px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            placeholder="بدون قند" name="menu_data[${num}][values][${valueCount}][description]">
                    </div>
                    <div class="w-3/12 max-md:w-full flex flex-col">
                        <label class="text-gray-600 font-bold mb-2"> تصویر آیتم</label>
                        <input type="file"
                            class="border border-gray-300 rounded-[8px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                            name="menu_data[${num}][values][${valueCount}][gallery]">
                    </div>
                </div>
                <div class="flex items-end max-md:w-full max-md:justify-end">
                    <button type="button" class="mt-2 size-8 mb-[3px] max-md:h-9 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer" onclick="removeAttrButton(this)">X</button>
            </div>
        </div>
        </div> `
    div.innerHTML = element
    el.parentElement.children[1].appendChild(div)
    console.log(valueCount);


}

function removeAttrButton(element) {
    element.parentElement.parentElement.remove()
    element.parentElement.parentElement.remove()
}

function remove(el) {
    let element = el.parentElement.parentElement.parentElement
    if (element) {
        element.remove()
    }
}