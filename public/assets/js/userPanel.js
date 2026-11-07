// let menuBlockliet = document.getElementById('menuBlockliet')
let menuList = document.getElementById('menuList')
function hamburgerMenu(state){
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

// let menus = document.querySelectorAll('.dashboard')
// menus.forEach((element)=>{
//     element.children[0].addEventListener('click', ()=>{
//         menus.forEach((item)=>{
//             item.children[1].classList.remove('max-h-[500px]')
//             item.children[1].classList.add('max-h-0')
//         })
//         element.children[1].classList.remove('max-h-0');
//         element.children[1].classList.add('max-h-[500px]');
//     })
// })
let dashboards = document.querySelectorAll(".dashboard")
dashboards.forEach(dashboard => {
    dashboard.children[0].addEventListener('click',()=>{
        if (dashboard.children[1].classList.contains('max-h-0')) {
            dashboards.forEach((item)=>{
                item.children[1].classList.remove('max-h-[500px]')
                item.children[1].classList.add('max-h-0')
                item.children[0].children[0].classList.remove('rotate-180')
                item.children[0].children[0].classList.add('rotate-0')
            })
            dashboard.children[1].classList.remove('max-h-0')
            dashboard.children[1].classList.add('max-h-[500px]')
            dashboard.children[0].children[0].classList.remove('rotate-0')
            dashboard.children[0].children[0].classList.add('rotate-180')
        }else{
            dashboard.children[1].classList.remove('max-h-[500px]')
            dashboard.children[1].classList.add('max-h-0')
            dashboard.children[0].children[0].classList.remove('rotate-180')
            dashboard.children[0].children[0].classList.add('rotate-0')
        }
    })
})


let parentFields = document.querySelectorAll('.parentFields')
parentFields.forEach((parentField) => {
    parentField.addEventListener('click', () => {
        if (parentField.nextElementSibling.classList.contains('max-h-0')) {
            parentFields.forEach(row => {
                row.nextElementSibling.classList.remove('max-h-[1000px]')
                row.children[1].classList.remove('rotate-180')
                row.nextElementSibling.classList.add('max-h-0')
            })
            parentField.nextElementSibling.classList.remove('max-h-0')
            parentField.nextElementSibling.classList.add('max-h-[1000px]')
            parentField.children[1].classList.add('rotate-180')
        } else {
            parentField.nextElementSibling.classList.remove('max-h-[1000px]')
            parentField.children[1].classList.remove('rotate-180')
            parentField.nextElementSibling.classList.add('max-h-0')
        }
    })
})

// search popup

let searchP = document.getElementById('searchP')
let searchSection = document.getElementById('searchSection')

function searchPopup(state){
    if(state == 'open'){
        searchP.classList.remove('invisible')
        searchP.classList.remove('opacity-0')
        searchSection.classList.remove('-translate-y-full')
    }
    if(state == 'close'){
        searchP.classList.add('invisible')
        searchP.classList.add('opacity-0')
        searchSection.classList.add('-translate-y-full')
    }
}
