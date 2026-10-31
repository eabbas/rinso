// // plus icon
// let block = document.getElementById('block')
//
//
// // create link and create socialmedia div
// let group = document.getElementById('group')
//
//
// // create socialmedia form
// let socialMediaForm = document.getElementById('socialMediaForm')
//
//
// // link form
// let siteLinkForm = document.querySelector('.createSiteLink')
//
// // Faq form
// let faqForm = document.querySelector('.createFaq')
//
// // edit socialmedia div
// let editSocialM = document.querySelector('.editsocialMediaForm')
//
// //qrcode
// let qrcode = document.getElementById('qrcode_card')
//
// function addBlock(state) {
//     if (state == 'open') {
//         block.classList.remove('invisible')
//         block.classList.remove('opacity-0')
//         group.classList.remove('scale-95')
//         group.classList.remove('opacity-0')
//         group.classList.remove('invisible')
//     }
//     if (state == 'close') {
//         block.classList.add('invisible')
//         block.classList.add('opacity-0')
//         group.classList.add('scale-95')
//         group.classList.add('opacity-0')
//         group.classList.add('invisible')
//     }
// }
//
// function addSocialMedia() {
//     group.classList.add('scale-95')
//     group.classList.add('opacity-0')
//     group.classList.add('invisible')
//     socialMediaForm.classList.remove('invisible')
//     socialMediaForm.classList.remove('opacity-0')
//     socialMediaForm.classList.remove('top-full')
//     socialMediaForm.classList.add('top-0')
//     socialMediaForm.classList.add('-translate-y-1/4')
// }
//
// function addLink() {
//     group.classList.add('scale-95')
//     group.classList.add('opacity-0')
//     group.classList.add('invisible')
//
//     siteLinkForm.classList.remove('invisible')
//     siteLinkForm.classList.remove('opacity-0')
//     siteLinkForm.classList.remove('top-full')
//     siteLinkForm.classList.add('top-0')
//     siteLinkForm.classList.add('-translate-y-1/4')
// }
//
// function addFaq() {
//     group.classList.add('scale-95')
//     group.classList.add('opacity-0')
//     group.classList.add('invisible')
//
//     faqForm.classList.remove('invisible')
//     faqForm.classList.remove('opacity-0')
//     faqForm.classList.remove('top-full')
//     faqForm.classList.add('top-0')
//     faqForm.classList.add('-translate-y-1/4')
// }
//
// let forms = document.querySelectorAll('.form')
// let editSMF = document.querySelector('.editSMF')
// let editSLF = document.querySelector('.editSLF')
// let editFAQ = document.querySelector('.editFAQ')
//
// function closeForm() {
//     forms.forEach((form) => {
//         form.classList.add('invisible')
//         form.classList.add('opacity-0')
//         form.classList.remove('-translate-y-1/4')
//     })
//     editSMF.classList.remove('max-h-[500px]')
//     editSMF.classList.add('max-h-0')
//     editSLF.classList.remove('max-h-[500px]')
//     editSLF.classList.add('max-h-0')
//     editFAQ.classList.remove('max-h-[500px]')
//     editFAQ.classList.add('max-h-0')
//     block.classList.add('invisible')
//     block.classList.add('opacity-0')
//     group.classList.add('scale-95')
//     group.classList.add('opacity-0')
//     group.classList.add('invisible')
// }
//
// function openDropdown(page) {
//     if (page == 'media') {
//         if (editSMF.classList.contains('max-h-0')) {
//             editSMF.classList.remove('max-h-0')
//             editSMF.classList.add('max-h-[500px]')
//         } else {
//             editSMF.classList.remove('max-h-[500px]')
//             editSMF.classList.add('max-h-0')
//         }
//     }
//     if (page == 'link') {
//         if (editSLF.classList.contains('max-h-0')) {
//             editSLF.classList.remove('max-h-0')
//             editSLF.classList.add('max-h-[500px]')
//         } else {
//             editSLF.classList.remove('max-h-[500px]')
//             editSLF.classList.add('max-h-0')
//         }
//     }
//     if (page == 'faq') {
//         if (editFAQ.classList.contains('max-h-0')) {
//             editFAQ.classList.remove('max-h-0')
//             editFAQ.classList.add('max-h-[500px]')
//         } else {
//             editFAQ.classList.remove('max-h-[500px]')
//             editFAQ.classList.add('max-h-0')
//         }
//     }
//     if (page == 'title') {
//         let editTLF = document.querySelector('.editTLF')
//         if (editTLF.classList.contains('max-h-0')) {
//             editTLF.classList.remove('max-h-0')
//             editTLF.classList.add('max-h-[500px]')
//         } else {
//             editTLF.classList.remove('max-h-[500px]')
//             editTLF.classList.add('max-h-0')
//         }
//     }
// }
// plus icon
let block = document.getElementById('block')


// create link and create socialmedia div
let group = document.getElementById('group')


// create socialmedia form
let socialMediaForm = document.getElementById('socialMediaForm')


// link form
let siteLinkForm = document.querySelector('.createSiteLink')

// Faq form
let faqForm = document.querySelector('.createFaq')

// edit socialmedia div
let editSocialM = document.querySelector('.editsocialMediaForm')

//qrcode
let qrcode = document.getElementById('qrcode_card')

//
let groupContactus = document.getElementById('contacts')


let contactusInput = document.getElementById('contactusInput')

//contactus
let contactusDiv = document.querySelector('.createContactus')
// description form
let pdForm = document.querySelector('.createDescription')
// description form edit
let pdeForm = document.querySelector('.editDescriptionForm')
//contactus form
let contactusForm = document.querySelector('.createPageContactus')


function addBlock(state) {
    if (state == 'open') {
        block.classList.remove('invisible')
        block.classList.remove('opacity-0')
        group.classList.remove('scale-95')
        group.classList.remove('opacity-0')
        group.classList.remove('invisible')
    }
    if (state == 'close') {
        block.classList.add('invisible')
        block.classList.add('opacity-0')
        group.classList.add('scale-95')
        group.classList.add('opacity-0')
        group.classList.add('invisible')
    }
}

function addSocialMedia() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    socialMediaForm.classList.remove('invisible')
    socialMediaForm.classList.remove('opacity-0')
    socialMediaForm.classList.remove('top-full')
    socialMediaForm.classList.add('top-0')
    socialMediaForm.classList.add('translate-y-1/4')
}

function addLink() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    siteLinkForm.classList.remove('invisible')
    siteLinkForm.classList.remove('opacity-0')
    siteLinkForm.classList.remove('top-full')
    siteLinkForm.classList.add('top-0')
    siteLinkForm.classList.add('translate-y-1/4')
}

function addFaq() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    faqForm.classList.remove('invisible')
    faqForm.classList.remove('opacity-0')
    faqForm.classList.remove('top-full')
    faqForm.classList.add('top-0')
    faqForm.classList.add('translate-y-1/6')
}
function addContactUs() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    contactusDiv.classList.remove('invisible')
    contactusDiv.classList.remove('opacity-0')
    contactusDiv.classList.remove('top-full')
    contactusDiv.classList.add('top-0')
    contactusDiv.classList.add('-translate-y-1/4')
}
function addDescription() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    pdForm.classList.remove('invisible')
    pdForm.classList.remove('opacity-0')
    pdForm.classList.remove('top-full')
    pdForm.classList.add('top-0')
    pdForm.classList.add('-translate-y-1/4')
}
let forms = document.querySelectorAll('.form')
let editSMF = document.querySelector('.editSMF')
let editSLF = document.querySelector('.editSLF')
let editFAQ = document.querySelector('.editFAQ')
let editPageContactus = document.querySelector('.editPageContactus')

function closeForm() {
    forms.forEach((form) => {
        form.classList.add('invisible')
        form.classList.add('opacity-0')
        form.classList.remove('-translate-y-1/4')
        form.classList.remove('translate-y-1/4')
    })
    editSMF.classList.remove('max-h-[500px]')
    editSMF.classList.add('max-h-0')
    editSLF.classList.remove('max-h-[500px]')
    editSLF.classList.add('max-h-0')
    editFAQ.classList.remove('max-h-[500px]')
    editFAQ.classList.add('max-h-0')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
}

function openDropdown(page) {
    if (page == 'media') {
        if (editSMF.classList.contains('max-h-0')) {
            editSMF.classList.remove('max-h-0')
            editSMF.classList.add('max-h-[500px]')
        } else {
            editSMF.classList.remove('max-h-[500px]')
            editSMF.classList.add('max-h-0')
        }
    }
    if (page == 'link') {
        if (editSLF.classList.contains('max-h-0')) {
            editSLF.classList.remove('max-h-0')
            editSLF.classList.add('max-h-[500px]')
        } else {
            editSLF.classList.remove('max-h-[500px]')
            editSLF.classList.add('max-h-0')
        }
    }
    if (page == 'faq') {
        if (editFAQ.classList.contains('max-h-0')) {
            editFAQ.classList.remove('max-h-0')
            editFAQ.classList.add('max-h-[500px]')
        } else {
            editFAQ.classList.remove('max-h-[500px]')
            editFAQ.classList.add('max-h-0')
        }
    }
    if (page == 'contactusEdit') {
        if (editPageContactus.classList.contains('max-h-0')) {
            editPageContactus.classList.remove('max-h-0')
            editPageContactus.classList.add('max-h-[500px]')
        } else {
            editPageContactus.classList.remove('max-h-[500px]')
            editPageContactus.classList.add('max-h-0')
        }
    }
    if (page == 'title') {
        let editTLF = document.querySelector('.editTLF')
        if (editTLF.classList.contains('max-h-0')) {
            editTLF.classList.remove('max-h-0')
            editTLF.classList.add('max-h-[500px]')
        } else {
            editTLF.classList.remove('max-h-[500px]')
            editTLF.classList.add('max-h-0')
        }
    }
}
function qrCard(state) {
    if (state == 'open') {
        qrcode.classList.remove('invisible')
        qrcode.classList.remove('opacity-0')
    }
    if (state == 'close') {
        qrcode.classList.add('invisible')
        qrcode.classList.add('opacity-0')
    }
}

function contactus(state) {
    contactusInput.innerHTML=""
    groupContactus.classList.add('scale-95')
    groupContactus.classList.add('opacity-0')
    groupContactus.classList.add('invisible')

    contactusForm.classList.remove('invisible')
    contactusForm.classList.remove('opacity-0')
    contactusForm.classList.remove('top-full')
    contactusForm.classList.add('top-0')
    // contactusForm.classList.add('translate-y-1/4')
    let div = document.createElement('div')
    if(state == "phone"){
        let element = `
            <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                <h2 class="text-md font-bold text-center">شماره موبایل</h2>
                <div class="w-full flex flex-col justify-center gap-5">
                    <input type="text" class="outline-hidden w-full py-3 text-sm" name="pageContactusTitle" id="page_contactus_title_create" placeholder="عنوان اصلی بلاک" autofocus>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentPageContacts"> 
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name="pageContactus[0][key]" id="key_input" placeholder="عنوان ایتم">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name="pageContactus[0][value]" id="value_input" placeholder="شماره موبایل خود را وارد کنید" maxlength="11">
                    </div>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1" id="parentContactus">
                    </div>
                    <button onclick="storePageContactus(event,this)" class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer">ثبت</button>
                </div>
            </div>
           
         `
        div.innerHTML = element
        contactusInput.appendChild(div)
    }
    if(state=="fixPhone"){
        let element = `
            <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                <h2 class="text-md font-bold text-center">شماره ثابت</h2>
                <div class="w-full flex flex-col justify-center gap-5">
                    <input type="text" class="outline-hidden w-full py-3 text-sm" name='pageContactusTitle' placeholder="عنوان اصلی بلاک" id="page_contactus_title_create" autofocus>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentPageContacts">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name='pageContactus[0][key]' id="key_input" placeholder="عنوان ایتم">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name='pageContactus[0][value]' id="value_input" placeholder="شماره ثابت خود را وارد کنید" maxlength="11">
                    </div>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1" id="parentContactus">
                    </div>
                    <button onclick="storePageContactus(event,this)" class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer">ثبت</button>
                </div>
            </div>
              
        `
        div.innerHTML = element
        contactusInput.appendChild(div)

    }
    if(state=="email"){
        let element = `
            <div  class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                <h2 class="text-md font-bold text-center">ایمیل </h2>
                <div class="w-full flex flex-col justify-center gap-5">
                    <input type="text" class="outline-hidden w-full py-3 text-sm" name='pageContactusTitle' id="page_contactus_title_create" placeholder="عنوان اصلی بلاک" autofocus>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentPageContacts">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name='pageContactus[0][key]' id="key_input" placeholder="عنوان ایتم">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="email" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name='pageContactus[0][value]' id="value_input" placeholder="ایمیل خود را وارد کنید">
                    </div>
                    
                    <button onclick="storePageContactus(event,this)" class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer">ثبت</button>
                </div>
            </div>
        `
        div.innerHTML = element
        contactusInput.appendChild(div)

    }
    if(state=="message"){

        let element = `
            <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
                <h2 class="text-md font-bold text-center">شماره پیامک </h2>
                <div class="w-full flex flex-col justify-center gap-5">
                    <input type="text" class="outline-hidden w-full py-3 text-sm" name='pageContactusTitle' id="page_contactus_title_create" placeholder="عنوان اصلی بلاک" autofocus>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 parentPageContacts">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire"name='pageContactus[0][key]' id="key_input"placeholder="عنوان ایتم">
                        <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>
                        <input type="text" class="outline-hidden w-full py-3 text-sm createPageContactusRequire" name='pageContactus[0][value]' id="value_input" placeholder=" شماره پیامک خود را وارد کنید" maxlength="11">
                    </div>
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1" id="parentContactus">
                    </div>
                    <button onclick="storePageContactus(event,this)" class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer">ثبت</button>
                </div>
            </div>
            
        `
        div.innerHTML = element
        contactusInput.appendChild(div)
    }

}
let PdForm = document.getElementById('PdForm')
function addFontSize(){
    let PD = document.querySelector('.createPDsize')

    PdForm.classList.add('invisible')
    PdForm.classList.add('opacity-0')
    PdForm.classList.add('top-full')
    PdForm.classList.remove('top-0')
    PdForm.classList.remove('-translate-y-1/4')


    PD.classList.remove('invisible')
    PD.classList.remove('opacity-0')
    PD.classList.remove('top-full')
    PD.classList.add('top-0')
    PD.classList.add('-translate-y-1/4')

}
function addFontDirection(){
    let PD = document.querySelector('.createPDdirection')
    PdForm.classList.add('invisible')
    PdForm.classList.add('opacity-0')
    PdForm.classList.add('top-full')
    PdForm.classList.remove('top-0')
    PdForm.classList.remove('-translate-y-1/4')

    PD.classList.remove('invisible')
    PD.classList.remove('opacity-0')
    PD.classList.remove('top-full')
    PD.classList.add('top-0')
    PD.classList.add('-translate-y-1/4')


}
// function sizeCreate(state){
//     let size_input = document.getElementById('size_input')
//     let createPDsize = document.querySelector('.createPDsize')
//     if(state=="s-txt"){
//         size_input.setAttribute('data-size' , 'text-16')
//         size_input.value = "متن کوچک"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//
//     }
//     if(state=="m-txt"){
//         size_input.setAttribute('data-size' , 'text-20')
//         size_input.value = "متن متوسط"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//
//     }
//     if(state=="l-txt"){
//         size_input.setAttribute('data-size' , 'text-24')
//         size_input.value = "متن بزرگ"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//
//     }
//     if(state=="s-lable"){
//         size_input.setAttribute('data-size' , 'font-xs')
//         size_input.value = "عنوان کوچک"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//
//     }
//     if(state=="m-lable"){
//         size_input.setAttribute('data-size' , 'font-semibold')
//         size_input.value = "عنوان متوسط"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//
//     }
//     if(state=="l-lable"){
//         size_input.setAttribute('data-size' , 'font-bold')
//         size_input.value = "عنوان بزرگ"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//
//     }
//     pdForm.classList.remove('invisible')
//     pdForm.classList.remove('opacity-0')
//     pdForm.classList.remove('top-full')
//     pdForm.classList.add('top-0')
//     pdForm.classList.add('-translate-y-1/4')
// }
// function directionCreate(state){
//     let direction_input = document.getElementById('direction_input')
//     let createPDdirection = document.querySelector('.createPDdirection')
//     if(state=="rtl"){
//         direction_input.setAttribute('data-direction' , 'text-right')
//         direction_input.value = "راست چین"
//         createPDdirection.classList.add('invisible')
//         createPDdirection.classList.add('opacity-0')
//
//     }
//     if(state=="center"){
//         direction_input.setAttribute('data-direction' , 'text-center')
//         direction_input.value = "وسط چین"
//         createPDdirection.classList.add('invisible')
//         createPDdirection.classList.add('opacity-0')
//
//     }
//     if(state=="ltr"){
//         direction_input.setAttribute('data-direction' , 'text-left')
//         direction_input.value = "چپ چین"
//         createPDdirection.classList.add('invisible')
//         createPDdirection.classList.add('opacity-0')
//
//     }
//     pdForm.classList.remove('invisible')
//     pdForm.classList.remove('opacity-0')
//     pdForm.classList.remove('top-full')
//     pdForm.classList.add('top-0')
//     pdForm.classList.add('-translate-y-1/4')
// }

function sizeCreate(state){
    let size_input = document.getElementById('size_input')
    let createPDsize = document.querySelector('.createPDsize')
    if(state=="s-txt"){
        size_input.setAttribute('data-size' , 'text-16')
        size_input.value = "متن کوچک"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')

    }
    if(state=="m-txt"){
        size_input.setAttribute('data-size' , 'text-20')
        size_input.value = "متن متوسط"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')

    }
    if(state=="l-txt"){
        size_input.setAttribute('data-size' , 'text-24')
        size_input.value = "متن بزرگ"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')

    }
    if(state=="s-lable"){
        size_input.setAttribute('data-size' , 'font-xs')
        size_input.value = "عنوان کوچک"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')

    }
    if(state=="m-lable"){
        size_input.setAttribute('data-size' , 'font-semibold')
        size_input.value = "عنوان متوسط"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')

    }
    if(state=="l-lable"){
        size_input.setAttribute('data-size' , 'font-bold')
        size_input.value = "عنوان بزرگ"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')

    }
    pdForm.classList.remove('invisible')
    pdForm.classList.remove('opacity-0')
    pdForm.classList.remove('top-full')
    pdForm.classList.add('top-0')
    pdForm.classList.add('-translate-y-1/4')
}
function directionCreate(state){
    let direction_input = document.getElementById('direction_input')
    let createPDdirection = document.querySelector('.createPDdirection')
    if(state=="rtl"){
        direction_input.setAttribute('data-direction' , 'text-right')
        direction_input.value = "راست چین"
        createPDdirection.classList.add('invisible')
        createPDdirection.classList.add('opacity-0')

    }
    if(state=="center"){
        direction_input.setAttribute('data-direction' , 'text-center')
        direction_input.value = "وسط چین"
        createPDdirection.classList.add('invisible')
        createPDdirection.classList.add('opacity-0')

    }
    if(state=="ltr"){
        direction_input.setAttribute('data-direction' , 'text-left')
        direction_input.value = "چپ چین"
        createPDdirection.classList.add('invisible')
        createPDdirection.classList.add('opacity-0')

    }
    pdForm.classList.remove('invisible')
    pdForm.classList.remove('opacity-0')
    pdForm.classList.remove('top-full')
    pdForm.classList.add('top-0')
    pdForm.classList.add('-translate-y-1/4')
}


// edit page description
let pdEditForm = document.getElementById('pdEditForm')
function addFontSizeEdit(){
    let PDE = document.querySelector('.createPDsizeEdit')

    pdEditForm.classList.add('invisible')
    pdEditForm.classList.add('opacity-0')
    // pdEditForm.classList.add('top-full')
    // pdEditForm.classList.remove('top-0')
    // pdEditForm.classList.remove('-translate-y-1/4')


    PDE.classList.remove('invisible')
    PDE.classList.remove('opacity-0')
    PDE.classList.remove('top-full')
    PDE.classList.add('top-0')
    PDE.classList.add('-translate-y-1/4')
}
function addFontDirectionEdit(){
    let PDE = document.querySelector('.createPDdirectionEdit')
    pdEditForm.classList.add('invisible')
    pdEditForm.classList.add('opacity-0')
    // pdEditForm.classList.add('top-full')
    // pdEditForm.classList.remove('top-0')
    // pdEditForm.classList.remove('-translate-y-1/4')

    PDE.classList.remove('invisible')
    PDE.classList.remove('opacity-0')
    PDE.classList.remove('top-full')
    PDE.classList.add('top-0')
    PDE.classList.add('-translate-y-1/4')


}
function sizeCreateEdit(state){
    let edit_size_input = document.getElementById('edit_size_input')
    let createPDsizeEdit = document.querySelector('.createPDsizeEdit')
    if(state=="s-txt"){
        edit_size_input.setAttribute('data-size-edit' , 'text-16')
        edit_size_input.value = "متن کوچک"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')

    }
    if(state=="m-txt"){
        edit_size_input.setAttribute('data-size-edit' , 'text-20')
        edit_size_input.value = "متن متوسط"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')

    }
    if(state=="l-txt"){
        edit_size_input.setAttribute('data-size-edit' , 'text-24')
        edit_size_input.value = "متن بزرگ"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')

    }
    if(state=="s-lable"){
        edit_size_input.setAttribute('data-size-edit' , 'font-xs')
        edit_size_input.value = "عنوان کوچک"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')

    }
    if(state=="m-lable"){
        edit_size_input.setAttribute('data-size-edit' , 'font-semibold')
        edit_size_input.value = "عنوان متوسط"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')

    }
    if(state=="l-lable"){
        edit_size_input.setAttribute('data-size-edit' , 'font-bold')
        edit_size_input.value = "عنوان بزرگ"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')

    }
    pdeForm.classList.remove('invisible')
    pdeForm.classList.remove('opacity-0')
    // pdeForm.classList.remove('top-full')
    // pdeForm.classList.add('top-0')
    // pdeForm.classList.add('-translate-y-1/4')
}
function directionCreateEdit(state){
    let edit_direction_input = document.getElementById('edit_direction_input')
    let createPDdirectionEdit = document.querySelector('.createPDdirectionEdit')
    if(state=="rtl"){
        edit_direction_input.setAttribute('data-direction-edit' , 'text-right')
        edit_direction_input.value = "راست چین"
        createPDdirectionEdit.classList.add('invisible')
        createPDdirectionEdit.classList.add('opacity-0')

    }
    if(state=="center"){
        edit_direction_input.setAttribute('data-direction-edit' , 'text-center')
        edit_direction_input.value = "وسط چین"
        createPDdirectionEdit.classList.add('invisible')
        createPDdirectionEdit.classList.add('opacity-0')

    }
    if(state=="ltr"){
        edit_direction_input.setAttribute('data-direction-edit' , 'text-left')
        edit_direction_input.value = "چپ چین"
        createPDdirectionEdit.classList.add('invisible')
        createPDdirectionEdit.classList.add('opacity-0')

    }
    pdeForm.classList.remove('invisible')
    pdeForm.classList.remove('opacity-0')
    pdeForm.classList.remove('top-full')
    // pdeForm.classList.add('top-0')
    // pdeForm.classList.add('-translate-y-1/4')
}
// function sizeCreateEdit(state){
//     let edit_size_input = document.getElementById('edit_size_input')
//     let createPDsizeEdit = document.querySelector('.createPDsizeEdit')
//     if(state=="s-txt"){
//         edit_size_input.setAttribute('data-size-edit' , 'text-16')
//         edit_size_input.value = "متن کوچک"
//         createPDsizeEdit.classList.add('invisible')
//         createPDsizeEdit.classList.add('opacity-0')
//
//     }
//     if(state=="m-txt"){
//         edit_size_input.setAttribute('data-size-edit' , 'text-20')
//         edit_size_input.value = "متن متوسط"
//         createPDsizeEdit.classList.add('invisible')
//         createPDsizeEdit.classList.add('opacity-0')
//
//     }
//     if(state=="l-txt"){
//         edit_size_input.setAttribute('data-size-edit' , 'text-24')
//         edit_size_input.value = "متن بزرگ"
//         createPDsizeEdit.classList.add('invisible')
//         createPDsizeEdit.classList.add('opacity-0')
//
//     }
//     if(state=="s-lable"){
//         edit_size_input.setAttribute('data-size-edit' , 'font-xs')
//         edit_size_input.value = "عنوان کوچک"
//         createPDsizeEdit.classList.add('invisible')
//         createPDsizeEdit.classList.add('opacity-0')
//
//     }
//     if(state=="m-lable"){
//         edit_size_input.setAttribute('data-size-edit' , 'font-semibold')
//         edit_size_input.value = "عنوان متوسط"
//         createPDsizeEdit.classList.add('invisible')
//         createPDsizeEdit.classList.add('opacity-0')
//
//     }
//     if(state=="l-lable"){
//         edit_size_input.setAttribute('data-size-edit' , 'font-bold')
//         edit_size_input.value = "عنوان بزرگ"
//         createPDsizeEdit.classList.add('invisible')
//         createPDsizeEdit.classList.add('opacity-0')
//
//     }
//     pdeForm.classList.remove('invisible')
//     pdeForm.classList.remove('opacity-0')
//     // pdeForm.classList.remove('top-full')
//     // pdeForm.classList.add('top-0')
//     // pdeForm.classList.add('-translate-y-1/4')
// }
// function directionCreateEdit(state){
//     let edit_direction_input = document.getElementById('edit_direction_input')
//     let createPDdirectionEdit = document.querySelector('.createPDdirectionEdit')
//     if(state=="rtl"){
//         edit_direction_input.setAttribute('data-direction-edit' , 'text-right')
//         edit_direction_input.value = "راست چین"
//         createPDdirectionEdit.classList.add('invisible')
//         createPDdirectionEdit.classList.add('opacity-0')
//
//     }
//     if(state=="center"){
//         edit_direction_input.setAttribute('data-direction-edit' , 'text-center')
//         edit_direction_input.value = "وسط چین"
//         createPDdirectionEdit.classList.add('invisible')
//         createPDdirectionEdit.classList.add('opacity-0')
//
//     }
//     if(state=="ltr"){
//         edit_direction_input.setAttribute('data-direction-edit' , 'text-left')
//         edit_direction_input.value = "چپ چین"
//         createPDdirectionEdit.classList.add('invisible')
//         createPDdirectionEdit.classList.add('opacity-0')
//
//     }
//     pdeForm.classList.remove('invisible')
//     pdeForm.classList.remove('opacity-0')
//     pdeForm.classList.remove('top-full')
//     // pdeForm.classList.add('top-0')
//     // pdeForm.classList.add('-translate-y-1/4')
// }
function qrCard(state) {
    if (state == 'open') {
        qrcode.classList.remove('invisible')
        qrcode.classList.remove('opacity-0')
    }
    if (state == 'close') {
        qrcode.classList.add('invisible')
        qrcode.classList.add('opacity-0')
    }
}


let introBox = document.getElementById('introBox')

function addIntroCategory(){
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introBox.classList.remove('invisible')
    introBox.classList.remove('opacity-0')
    introBox.classList.remove('top-full')
    introBox.classList.add('top-0')
}

let introProduct = document.getElementById('introProduct')

function addIntroProduct(){
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introProduct.classList.remove('invisible')
    introProduct.classList.remove('opacity-0')
    introProduct.classList.remove('top-full')
    introProduct.classList.add('top-0')
    introProduct.classList.add('-translate-y-1/6')
    setCategories()
}

let features = document.getElementById("features")
let featuresEdit = document.getElementById("featuresEdit")

function addAttribute(){
    let attrBox = document.createElement('div')
    attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
    attrBox.innerHTML = `
        <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
            type="text"
            placeholder="مقدار ویژگی">
        
        `
    attrBox.querySelector('.delete-btn').addEventListener('click', () => {
        attrBox.remove();
    });
    features.appendChild(attrBox)
}
function addAttributeEdit(){
    let attrBox = document.createElement('div')
    attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
    attrBox.innerHTML = `
        <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
            type="text"
            placeholder="مقدار ویژگی">
        
        `
    attrBox.querySelector('.delete-btn').addEventListener('click', () => {
        attrBox.remove();
    });
    featuresEdit.appendChild(attrBox)
}

function removeAttribute(el){
    el.parentElement.remove()
}

let introCatsList = document.getElementById('introCatsList')
function showIntroCats(){
    block.classList.remove('invisible')
    block.classList.remove('opacity-0')
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introCatsList.classList.remove('invisible')
    introCatsList.classList.remove('opacity-0')
    introCatsList.classList.remove('top-full')
    introCatsList.classList.add('top-0')
    // introCatsList.classList.add('-translate-y-1/6')
    showCategories()
}