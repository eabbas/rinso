let rules_element = document.getElementById('rules')

function rules(state) {
    if (state == 'open') {
        rules_element.classList.remove('invisible')
        rules_element.classList.remove('opacity-0')
        rules_element.children[0].classList.remove('scale-75')
        rules_element.children[0].classList.remove('opacity-0')
    }
    if (state == 'close') {
        rules_element.classList.add('invisible')
        rules_element.classList.add('opacity-0')
        rules_element.children[0].classList.add('scale-75')
        rules_element.children[0].classList.add('opacity-0')
    }
}

let signupButton = document.getElementById('signupButton')
let rule = document.getElementById('rule')
function checkRule() {
    if (rule.checked) {
        signupButton.classList.remove('bg-(--secondary-text-color)/50')
        signupButton.classList.add('bg-(--primary-color)')
        signupButton.classList.add('cursor-pointer')
        signupButton.removeAttribute('disabled')
    }
    if (!rule.checked) {
        signupButton.classList.add('bg-(--secondary-text-color)/50')
        signupButton.classList.remove('bg-(--primary-color)')
        signupButton.classList.remove('cursor-pointer')
        signupButton.setAttribute('disabled', true)
    }
}