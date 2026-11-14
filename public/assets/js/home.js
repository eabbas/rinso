
let home_hamburger_menu = document.getElementById('home_hamburger_menu')
function home_menu(state) {
    if (state == "open") {
        home_hamburger_menu.classList.remove('-right-full')
        home_hamburger_menu.classList.remove('opacity-0')
        home_hamburger_menu.classList.add('right-0')
    }
    if (state == "close") {
        home_hamburger_menu.classList.add('-right-full')
        home_hamburger_menu.classList.add('opacity-0')
        home_hamburger_menu.classList.remove('right-0')
    }
}

let careers = document.querySelectorAll('.careers')
let careerCat = document.querySelectorAll('.careerCat')
let careerCatTitle = document.getElementById('careerCatTitle')
function showCareer(index, el) {
    careerCatTitle.innerText = ""
    careers.forEach((item) => {
        item.classList.remove('flex')
        item.classList.add('hidden')
        if (item.getAttribute('data-index') == index) {
            item.classList.add('flex')
            item.classList.remove('hidden')
        }
        if (index == 0) {
            item.classList.add('flex')
            item.classList.remove('hidden')
        }
    })
    careerCat.forEach((element) => {
        element.classList.remove('activeCatCareer')
        element.children[0].classList.remove('block')
        element.children[0].classList.add('hidden')
    })
    el.children[0].classList.remove('hidden')
    el.classList.add('activeCatCareer')
    el.children[0].classList.add('block')
    careerCatTitle.innerHTML = `
        <span class="font-bold">${el.children[2].innerText}</span>
    `
}


let menuBlock = document.getElementById('menuBlock');
let menuBlockliet = document.getElementById('menuBlockliet');
let menuList = document.getElementById('menuList');

let searchP = document.getElementById('searchP');
let searchSection = document.getElementById('searchSection');

function hamburgerMenu(state) {
    if (state == "open") {
        menuBlock.classList.remove('invisible')
        menuBlock.classList.remove('opacity-0')
        menuList.classList.remove('translate-x-full')
        menuBlockliet.children[0].classList.add('-translate-x-[30px]')
        menuBlockliet.children[0].classList.add('opacity-0')
        menuBlockliet.children[1].classList.add('translate-x-[30px]')
        menuBlockliet.children[1].classList.add('opacity-0')
        menuBlockliet.children[2].classList.add('-translate-x-[30px]')
        menuBlockliet.children[2].classList.add('opacity-0')
    }
    if (state == "close") {
        console.log("asgfk.asjhgfkgsf")
        menuBlock.classList.add('invisible')
        menuBlock.classList.add('opacity-0')
        menuList.classList.add('translate-x-full')
        menuBlockliet.children[0].classList.remove('-translate-x-[30px]')
        menuBlockliet.children[0].classList.remove('opacity-0')
        menuBlockliet.children[1].classList.remove('translate-x-[30px]')
        menuBlockliet.children[1].classList.remove('opacity-0')
        menuBlockliet.children[2].classList.remove('-translate-x-[30px]')
        menuBlockliet.children[2].classList.remove('opacity-0')
    }
}

function searchPopup(state) {
    if (state == 'open') {
        searchP.classList.remove('invisible')
        searchP.classList.remove('opacity-0')
        searchSection.classList.remove('-translate-y-full')
    }
    if (state == 'close') {
        searchP.classList.add('invisible')
        searchP.classList.add('opacity-0')
        searchSection.classList.add('-translate-y-full')
    }
}

