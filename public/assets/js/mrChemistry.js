let myForm = document.getElementById('myForm')
let questions = document.getElementById('questions')
let questionNum = 1
let optionCounter = 1
function addQuestion(){
    questionNum++
    optionCounter = 1
    let element = document.createElement('div')
    element.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4 p-2 border-1 border-gray-300 rounded-lg relative'
    element.setAttribute('data-question', questionNum)
    let inner = `
        <span class="text-md absolute -top-3 -left-3 p-2 rounded-full bg-white cursor-pointer" onclick="deleteQuestion(this)">❌</span>
        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
            <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1 in-fa">سوال ${questionNum}
                <span class="text-red-500">*</span>
            </label>
            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2 titles" 
                       name='question[${questionNum}][title]' placeholder="متن سوال" id="title"></textarea>
            </div>
        </div>
        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:col-span-2" data-question="${questionNum}"></div>
        <div class="w-full lg:col-span-2 lg:flex flex-row items-center justify-end" data-question="${questionNum}">
            <button type="button" class="px-4 py-2 w-10/12 bg-green-500 text-white text-xs font-bold rounded-md lg:w-30 cursor-pointer lg:col-span-2" onclick="addOption(this)"> گزینه +</button>
        </div>
        <div
            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
            <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
            <div
                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                <textarea rows="5" class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name='question[${questionNum}][description]' placeholder="توضیحات دوره"></textarea>
            </div>
        </div>`
    element.innerHTML = inner
    questions.appendChild(element)
}
function addOption(el){
    let optionNum = el.parentElement.previousElementSibling.children.length
    if(optionNum <= 3){
        questionNum = el.parentElement.getAttribute('data-question')
        let element = document.createElement('div')
        element.classList = 'relative'
        let inner = `
            <div
                    class="rounded-lg focus:border-none focus:outline-none text-[#99A1B7] w-full flex flex-row items-center gap-2">
                <input type="radio" name="question[${questionNum}][correct]" onchange="selectCorrect(this)">
                <input class="px-4 py-2 w-full focus:outline-none text-sm font-bold rounded-md mr-2 focus:bg-[#F1F1F4] bg-[#F9F9F9] inps" type="text"
                       name='question[${questionNum}][answer][${optionNum}]' placeholder="گزینه ${optionCounter}" id="title">
            </div>
            <span class="text-xs absolute top-4 left-0 cursor-pointer" onclick="deleteOpt(this)">❌</span>
        `
        element.innerHTML = inner
        el.parentElement.previousElementSibling.appendChild(element)
        console.log(element)
        optionCounter++
    }
}

function deleteOpt(el){
    el.parentElement.remove()
    optionCounter--
}

function deleteQuestion(el){
    el.parentElement.remove()
}

function selectCorrect(el) {
    let parent = el.parentElement.parentElement.parentElement.children
    for (let i = 0; i < parent.length; i++){
        if (parent[i] === el.parentElement.parentElement) {
            console.log(parent[i])
            el.value = i
            console.log(i += 1)
        }
    }
}

function submitForm(e){
    let flag = true
    console.log(flag)
    e.preventDefault()
    let inputs = document.querySelectorAll('.inps')
    console.log(inputs)
    inputs.forEach((inp)=>{
        if(inp.value === ''){
            console.log('option')
            flag = false
            inp.classList.add('border-1')
            inp.classList.add('border-red-500')
        }
    })
    let elements = document.querySelectorAll('.titles')
    console.log(elements)
    elements.forEach((el)=>{
        if(el.value === ''){
            console.log('title')
            flag = false
            el.classList.add('border-1')
            el.classList.add('border-red-500')
        }
    })
    if(flag){
        myForm.submit()
    }
    console.log(flag)

}