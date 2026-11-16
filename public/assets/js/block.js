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
let pdeForm = document.getElementById('pdEditForm')
//contactus form
let contactusForm = document.querySelector('.createPageContactus')


function addBlock(state) {
    if (state === 'open') {
        block?.classList.remove('invisible', 'opacity-0');
        group?.classList.remove('scale-95', 'opacity-0', 'invisible');
    }

    if (state === 'close') {
        block?.classList.add('invisible', 'opacity-0');
        group?.classList.add('scale-95', 'opacity-0', 'invisible');
    }
}

function addSocialMedia() {
    group?.classList.add('scale-95', 'opacity-0', 'invisible');
    socialMediaForm?.classList.remove('invisible', 'opacity-0', 'top-full');
    socialMediaForm?.classList.add('top-0', 'translate-y-1/4');
}

function addLink() {
    group?.classList.add('scale-95', 'opacity-0', 'invisible');
    siteLinkForm?.classList.remove('invisible', 'opacity-0', 'top-full');
    siteLinkForm?.classList.add('top-0');
}

function addFaq() {
    group?.classList.add('scale-95', 'opacity-0', 'invisible');
    faqForm?.classList.remove('invisible', 'opacity-0', 'top-full');
    faqForm?.classList.add('top-0', 'translate-y-1/6');
}

function addContactUs() {
    group?.classList.add('scale-95', 'opacity-0', 'invisible');
    contactusDiv?.classList.remove('invisible', 'opacity-0', 'top-full');
    contactusDiv?.classList.add('top-0', '-translate-y-1/4');
}

function addDescription() {
    group?.classList.add('scale-95', 'opacity-0', 'invisible');
    pdForm?.classList.remove('invisible', 'opacity-0', 'top-full');
    pdForm?.classList.add('top-0', '-translate-y-1/4');
}

let forms = document.querySelectorAll('.form')
let editSMF = document.querySelector('.editSMF')
let editSLF = document.querySelector('.editSLF')
let editFAQ = document.querySelector('.editFAQ')
let editPageContactus = document.querySelector('.editPageContactus')

function closeForm() {
    document.querySelectorAll('.form').forEach((form) => {
        form.classList.add('invisible', 'opacity-0');
        form.classList.remove(
            '-translate-y-1/4',
            'translate-y-1/4',
            'translate-y-1/6'
        );
    });

    [
        '.editSMF',
        '.editSLF',
        '.editFAQ',
        '.editPageContactus',
        '.editTLF'
    ].forEach((selector) => {
        const dropdown = document.querySelector(selector);
        if (!dropdown) return;
        dropdown.classList.remove('max-h-[500px]');
        dropdown.classList.add('max-h-0');
    });

    if (block) block.classList.add('invisible', 'opacity-0');
    if (group) group.classList.add('scale-95', 'opacity-0', 'invisible');
}

function openDropdown(page) {
    const dropdowns = {
        media: document.querySelector('.editSMF'),
        link: document.querySelector('.editSLF'),
        faq: document.querySelector('.editFAQ'),
        contactusEdit: document.querySelector('.editPageContactus'),
        title: document.querySelector('.editTLF')
    };

    const dropdown = dropdowns[page];
    if (!dropdown) return;

    const isClosed = dropdown.classList.contains('max-h-0');

    dropdown.classList.toggle('max-h-0', !isClosed);
    dropdown.classList.toggle('max-h-[500px]', isClosed);
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
    if (!contactusInput || !contactusForm) return;

    const fields = {
        phone: {
            title: 'شماره موبایل',
            placeholder: 'شماره موبایل خود را وارد کنید',
            type: 'text',
            maxlength: '11',
            hasExtra: true
        },
        fixPhone: {
            title: 'شماره ثابت',
            placeholder: 'شماره ثابت خود را وارد کنید',
            type: 'text',
            maxlength: '11',
            hasExtra: true
        },
        email: {
            title: 'ایمیل',
            placeholder: 'ایمیل خود را وارد کنید',
            type: 'email',
            maxlength: '',
            hasExtra: false
        },
        message: {
            title: 'شماره پیامک',
            placeholder: 'شماره پیامک خود را وارد کنید',
            type: 'text',
            maxlength: '11',
            hasExtra: true
        }
    };

    const field = fields[state];
    if (!field) return;

    if (groupContactus) {
        groupContactus.classList.add('scale-95', 'opacity-0', 'invisible');
    }

    contactusForm.classList.remove('invisible', 'opacity-0', 'top-full');
    contactusForm.classList.add('top-0');

    contactusInput.innerHTML = `
        <div class="w-11/12 p-4 bg-[#fff] rounded-lg flex flex-col gap-4">
            <h2 class="text-md font-bold text-center">${field.title}</h2>

            <div class="w-full flex flex-col justify-center gap-5">
                <div class="w-full flex flex-col gap-3 items-center max-md:flex-col max-md:gap-1 parentPageContacts">
                    <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>

                    <input
                        type="text"
                        class="outline-hidden w-full py-3 text-sm createPageContactusRequire"
                        name="pageContactus[0][key]"
                        id="key_input"
                        placeholder="عنوان آیتم">

                    <span class="w-full h-[1px] bg-[#e4e6eb] rounded-2xl"></span>

                    <input
                        type="${field.type}"
                        class="outline-hidden w-full py-3 text-sm createPageContactusRequire"
                        name="pageContactus[0][value]"
                        id="value_input"
                        placeholder="${field.placeholder}"
                        ${field.maxlength ? `maxlength="${field.maxlength}"` : ''}>
                </div>

                ${field.hasExtra
            ? '<div class="w-full flex flex-col gap-3 items-center max-md:flex-col max-md:gap-1" id="parentContactus"></div>'
            : ''
        }

                <button
                    type="button"
                    onclick="storePageContactus(event,this)"
                    class="w-3/12 py-1 mx-auto bg-[#eb3153] text-md text-[#fff] rounded-md cursor-pointer">
                    ثبت
                </button>
            </div>
        </div>
    `;
}

let PdForm = document.getElementById('PdForm')

function addFontSize() {
    const chooser = document.querySelector('#pageDescriptionSize');
    PdForm?.classList.add('invisible', 'opacity-0', 'top-full');
    PdForm?.classList.remove('top-0', '-translate-y-1/4');
    chooser?.classList.remove('invisible', 'opacity-0', 'top-full');
    chooser?.classList.add('top-0', '-translate-y-1/4');
}

function addFontDirection() {
    const chooser = document.querySelector('#pageDescriptionDirection');
    PdForm?.classList.add('invisible', 'opacity-0', 'top-full');
    PdForm?.classList.remove('top-0', '-translate-y-1/4');
    chooser?.classList.remove('invisible', 'opacity-0', 'top-full');
    chooser?.classList.add('top-0', '-translate-y-1/4');
}

// function sizeCreate(state){
//     let size_input = document.getElementById('size_input')
//     let createPDsize = document.querySelector('#pageDescriptionSize')
//     if(state=="s-txt"){
//         size_input.setAttribute('data-size' , 'text-16')
//         size_input.value = "متن کوچک"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//     }
//     if(state=="m-txt"){
//         size_input.setAttribute('data-size' , 'text-20')
//         size_input.value = "متن متوسط"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//     }
//     if(state=="l-txt"){
//         size_input.setAttribute('data-size' , 'text-24')
//         size_input.value = "متن بزرگ"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//     }
//     if(state=="s-lable"){
//         size_input.setAttribute('data-size' , 'font-xs')
//         size_input.value = "عنوان کوچک"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//     }
//     if(state=="m-lable"){
//         size_input.setAttribute('data-size' , 'font-semibold')
//         size_input.value = "عنوان متوسط"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//     }
//     if(state=="l-lable"){
//         size_input.setAttribute('data-size' , 'font-bold')
//         size_input.value = "عنوان بزرگ"
//         createPDsize.classList.add('invisible')
//         createPDsize.classList.add('opacity-0')
//     }
//     pdForm.classList.remove('invisible')
//     pdForm.classList.remove('opacity-0')
//     pdForm.classList.remove('top-full')
//     pdForm.classList.add('top-0')
//     pdForm.classList.add('-translate-y-1/4')
// }

// function directionCreate(state){
//     let direction_input = document.getElementById('direction_input')
//     let createPDdirection = document.querySelector('#pageDescriptionDirection')
//     if(state=="rtl"){
//         direction_input.setAttribute('data-direction' , 'text-right')
//         direction_input.value = "راست چین"
//         createPDdirection.classList.add('invisible')
//         createPDdirection.classList.add('opacity-0')
//     }
//     if(state=="center"){
//         direction_input.setAttribute('data-direction' , 'text-center')
//         direction_input.value = "وسط چین"
//         createPDdirection.classList.add('invisible')
//         createPDdirection.classList.add('opacity-0')
//     }
//     if(state=="ltr"){
//         direction_input.setAttribute('data-direction' , 'text-left')
//         direction_input.value = "چپ چین"
//         createPDdirection.classList.add('invisible')
//         createPDdirection.classList.add('opacity-0')
//     }
//     pdForm.classList.remove('invisible')
//     pdForm.classList.remove('opacity-0')
//     pdForm.classList.remove('top-full')
//     pdForm.classList.add('top-0')
//     pdForm.classList.add('-translate-y-1/4')
// }
function sizeCreate(state) {
    const size_input = document.getElementById('size_input');
    const createPDsize = document.querySelector('#pageDescriptionSize');
    if (!size_input || !createPDsize || !pdForm) return;

    if (state == "s-txt") {
        size_input.setAttribute('data-size', 'text-16')
        size_input.value = "متن کوچک"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')
    }

    if (state == "m-txt") {
        size_input.setAttribute('data-size', 'text-20')
        size_input.value = "متن متوسط"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')
    }

    if (state == "l-txt") {
        size_input.setAttribute('data-size', 'text-24')
        size_input.value = "متن بزرگ"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')
    }

    if (state == "s-lable") {
        size_input.setAttribute('data-size', 'font-xs')
        size_input.value = "عنوان کوچک"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')
    }

    if (state == "m-lable") {
        size_input.setAttribute('data-size', 'font-semibold')
        size_input.value = "عنوان متوسط"
        createPDsize.classList.add('invisible')
        createPDsize.classList.add('opacity-0')
    }

    if (state == "l-lable") {
        size_input.setAttribute('data-size', 'font-bold')
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

function directionCreate(state) {
    const direction_input = document.getElementById('direction_input');
    const createPDdirection = document.querySelector('#pageDescriptionDirection');
    if (!direction_input || !createPDdirection || !pdForm) return;

    if (state == "rtl") {
        direction_input.setAttribute('data-direction', 'text-right')
        direction_input.value = "راست چین"
        createPDdirection.classList.add('invisible')
        createPDdirection.classList.add('opacity-0')
    }

    if (state == "center") {
        direction_input.setAttribute('data-direction', 'text-center')
        direction_input.value = "وسط چین"
        createPDdirection.classList.add('invisible')
        createPDdirection.classList.add('opacity-0')
    }

    if (state == "ltr") {
        direction_input.setAttribute('data-direction', 'text-left')
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

function addFontSizeEdit() {
    const chooser = document.querySelector('#pageDescriptionSizeEdit');
    pdEditForm?.classList.add('invisible', 'opacity-0');
    chooser?.classList.remove('invisible', 'opacity-0', 'top-full');
    chooser?.classList.add('top-0', '-translate-y-1/4');
}

function addFontDirectionEdit() {
    const chooser = document.querySelector('#pageDescriptionDirectionEdit');
    pdEditForm?.classList.add('invisible', 'opacity-0');
    chooser?.classList.remove('invisible', 'opacity-0', 'top-full');
    chooser?.classList.add('top-0', '-translate-y-1/4');
}

function sizeCreateEdit(state) {
    const edit_size_input = document.getElementById('edit_size_input');
    const createPDsizeEdit = document.querySelector('#pageDescriptionSizeEdit');
    if (!edit_size_input || !createPDsizeEdit || !pdeForm) return;

    if (state == "s-txt") {
        edit_size_input.setAttribute('data-size-edit', 'text-16')
        edit_size_input.value = "متن کوچک"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')
    }

    if (state == "m-txt") {
        edit_size_input.setAttribute('data-size-edit', 'text-20')
        edit_size_input.value = "متن متوسط"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')
    }

    if (state == "l-txt") {
        edit_size_input.setAttribute('data-size-edit', 'text-24')
        edit_size_input.value = "متن بزرگ"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')
    }

    if (state == "s-lable") {
        edit_size_input.setAttribute('data-size-edit', 'font-xs')
        edit_size_input.value = "عنوان کوچک"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')
    }

    if (state == "m-lable") {
        edit_size_input.setAttribute('data-size-edit', 'font-semibold')
        edit_size_input.value = "عنوان متوسط"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')
    }

    if (state == "l-lable") {
        edit_size_input.setAttribute('data-size-edit', 'font-bold')
        edit_size_input.value = "عنوان بزرگ"
        createPDsizeEdit.classList.add('invisible')
        createPDsizeEdit.classList.add('opacity-0')
    }

    pdeForm.classList.remove('invisible')
    pdeForm.classList.remove('opacity-0')
}

function directionCreateEdit(state) {
    const edit_direction_input = document.getElementById('edit_direction_input');
    const createPDdirectionEdit = document.querySelector('#pageDescriptionDirectionEdit');
    if (!edit_direction_input || !createPDdirectionEdit || !pdeForm) return;

    if (state == "rtl") {
        edit_direction_input.setAttribute('data-direction-edit', 'text-right')
        edit_direction_input.value = "راست چین"
        createPDdirectionEdit.classList.add('invisible')
        createPDdirectionEdit.classList.add('opacity-0')
    }

    if (state == "center") {
        edit_direction_input.setAttribute('data-direction-edit', 'text-center')
        edit_direction_input.value = "وسط چین"
        createPDdirectionEdit.classList.add('invisible')
        createPDdirectionEdit.classList.add('opacity-0')
    }

    if (state == "ltr") {
        edit_direction_input.setAttribute('data-direction-edit', 'text-left')
        edit_direction_input.value = "چپ چین"
        createPDdirectionEdit.classList.add('invisible')
        createPDdirectionEdit.classList.add('opacity-0')
    }

    pdeForm.classList.remove('invisible')
    pdeForm.classList.remove('opacity-0')
}

// function sizeCreateEdit(state){
//     ...
// }



let introBox = document.getElementById('introBox')

function addIntroCategory() {
    if (!introBox || !group) return;
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introBox.classList.remove('invisible')
    introBox.classList.remove('opacity-0')
    introBox.classList.remove('top-full')
    introBox.classList.add('top-0')
}

let introProduct = document.getElementById('introProduct')

function addIntroProduct() {
    if (!introProduct || !group) return;
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

function addAttribute(event) {
    event?.preventDefault();
    if (!features) return;

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

function addAttributeEdit(event) {
    event?.preventDefault();
    if (!featuresEdit) return;

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

function removeAttribute(el) {
    el.parentElement.remove()
}

let introCatsList = document.getElementById('introCatsList')

function showIntroCats() {
    if (!introCatsList || !block || !group) return;

    block.classList.remove('invisible')
    block.classList.remove('opacity-0')
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introCatsList.classList.remove('invisible')
    introCatsList.classList.remove('opacity-0')
    introCatsList.classList.remove('top-full')
    introCatsList.classList.add('top-0')
    showCategories()
}
/* =========================================
   RINSO - Modal & Action Button Manager
========================================= */

(() => {
    'use strict';

    // بستن پاپ‌آپ با کلیک روی فضای بیرونی
    document.addEventListener('click', (event) => {
        const target = event.target;

        if (!(target instanceof Element)) return;

        // QR popup
        const qrOverlay = target.closest('#qrcode_card');

        if (qrOverlay && !target.closest('#qrcode_card .bg-white')) {
            if (typeof window.qrCard === 'function') {
                window.qrCard('close');
            }
            return;
        }

        // سایر پاپ‌آپ‌ها
        const blockOverlay = target.closest('#block');

        if (
            blockOverlay &&
            !target.closest('#group') &&
            !target.closest('#block .form')
        ) {
            if (typeof window.closeForm === 'function') {
                window.closeForm();
            } else if (typeof window.addBlock === 'function') {
                window.addBlock('close');
            }
        }
    });

    // بستن با Escape
    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;

        const qr = document.getElementById('qrcode_card');

        if (qr && !qr.classList.contains('invisible')) {
            window.qrCard?.('close');
            return;
        }

        const overlay = document.getElementById('block');

        if (overlay && !overlay.classList.contains('invisible')) {
            window.closeForm?.();
        }
    });

    // یکسان‌سازی دکمه‌های ویرایش و حذف
    function normalizeActionButtons(root = document) {

        root.querySelectorAll('[onclick]').forEach(element => {

            if (!element.querySelector('svg')) return;

            const action = (
                element.getAttribute('onclick') || ''
            ).trim().toLowerCase();

            const isDelete = /^(delete|remove)/.test(action);
            const isEdit = /^edit/.test(action);

            if (!isDelete && !isEdit) return;

            const classes = element.classList;

            const compact =
                classes.contains('p-1.5') ||
                classes.contains('bg-green-500') ||
                classes.contains('bg-red-500') ||
                classes.contains('bg-zinc-300') ||
                (
                    classes.contains('rounded-full') &&
                    classes.contains('w-full')
                );

            if (!compact) return;

            element.classList.add('rinso-action-btn');

            element.classList.add(
                isDelete
                    ? 'rinso-action-delete'
                    : 'rinso-action-edit'
            );

            element.setAttribute('role', 'button');
            element.setAttribute('tabindex', '0');
            element.setAttribute(
                'title',
                isDelete ? 'حذف' : 'ویرایش'
            );
        });
    }

    // اجرای اولیه
    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            () => normalizeActionButtons(),
            { once: true }
        );
    } else {
        normalizeActionButtons();
    }

    // پشتیبانی از آیتم‌هایی که با AJAX ساخته می‌شوند
    const observer = new MutationObserver(mutations => {

        mutations.forEach(mutation => {

            mutation.addedNodes.forEach(node => {

                if (node.nodeType === Node.ELEMENT_NODE) {
                    normalizeActionButtons(node);
                }

            });

        });

    });

    observer.observe(document.documentElement, {
        childList: true,
        subtree: true
    });

})();