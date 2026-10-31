
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