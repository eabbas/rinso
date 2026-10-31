let attributes = document.getElementById('attributes')
if(index != 0){
    let index = 0
}
function add(){
    let div = document.createElement('div')
    div.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 relative p-3 rounded-md border-1 border-gray-300'
    div.innerHTML = `
        <span class="absolute -top-2 -left-2 cursor-pointer" onclick="deleteAttr(this)">❌</span>
        <input type="text" class="outline-none px-3 lg:px-5 py-1 lg:py-2 border-1 border-gray-200 text-sm rounded-md" name="attributes[${index}][key]" placeholder="نام ویژگی">
        <input type="text" class="outline-none px-3 lg:px-5 py-1 lg:py-2 border-1 border-gray-200 text-sm rounded-md" name="attributes[${index}][value]" placeholder="مقدار ویژگی">
    `
    attributes.appendChild(div)
    index++
}

function deleteAttr(el){
    el.parentElement.remove()
}