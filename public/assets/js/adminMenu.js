let dashboards = document.querySelectorAll(".dashboard")
dashboards.forEach(dashboard => {
    dashboard.children[0].addEventListener('click', () => {
        if (dashboard.children[1].classList.contains('max-h-0')) {
            dashboards.forEach((item) => {
                item.children[1].classList.remove('max-h-[500px]')
                item.children[1].classList.add('max-h-0')
                item.children[0].children[0].classList.remove('rotate-180')
                item.children[0].children[0].classList.add('rotate-0')
            })
            dashboard.children[1].classList.remove('max-h-0')
            dashboard.children[1].classList.add('max-h-[500px]')
            dashboard.children[0].children[0].classList.remove('rotate-0')
            dashboard.children[0].children[0].classList.add('rotate-180')
        } else {
            dashboard.children[1].classList.remove('max-h-[500px]')
            dashboard.children[1].classList.add('max-h-0')
            dashboard.children[0].children[0].classList.remove('rotate-180')
            dashboard.children[0].children[0].classList.add('rotate-0')
        }
    })
})