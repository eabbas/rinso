

// let menuCategory = document.querySelectorAll('.menu_category')
// function showItems(index) {
//     menuCategory.forEach((element) => {
//         element.classList.add('hidden')
//         element.classList.remove('flex')
//         if (index == element.getAttribute('data-item-menu')) {
//             element.classList.remove('hidden')
//             element.classList.add('flex')
//         }
//     });
// }




function calc(el, state) {
    console.log(5555)
    if (state == '+') {
        el.parentElement.children[0].value++
    }
    if (state == '-') {
        el.parentElement.children[0].value--
        if (el.parentElement.children[0].value < 0) {
            el.parentElement.children[0].value = 0
        }
    }
}

// function hamburgerMenu(state, element){
//     if (state == "open") {
//         element.parentElement.nextElementSibling.classList.remove('-left-full')
//         element.parentElement.nextElementSibling.classList.add('left-0')
//         element.children[0].classList.add('-translate-x-[30px]')
//         element.children[0].classList.add('opacity-0')
//         element.children[1].classList.add('translate-x-[30px]')
//         element.children[1].classList.add('opacity-0')
//         element.children[2].classList.add('-translate-x-[30px]')
//         element.children[2].classList.add('opacity-0')
//     }
//     if (state == "close") {
//         element.parentElement.classList.remove('left-0')
//         element.parentElement.classList.add('-left-full')
//         element.parentElement.previousElementSibling.children[1].children[0].classList.remove('-translate-x-[30px]')
//         element.parentElement.previousElementSibling.children[1].children[0].classList.remove('opacity-0')
//         element.parentElement.previousElementSibling.children[1].children[1].classList.remove('translate-x-[30px]')
//         element.parentElement.previousElementSibling.children[1].children[1].classList.remove('opacity-0')
//         element.parentElement.previousElementSibling.children[1].children[2].classList.remove('-translate-x-[30px]')
//         element.parentElement.previousElementSibling.children[1].children[2].classList.remove('opacity-0')
//     }
// }


