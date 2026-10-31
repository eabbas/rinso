let eduBlock = document.getElementById('edu')
let parentsEdu = document.querySelectorAll('.parentEdu')
let childrenEdu = document.querySelectorAll('.childEdu')
let steps = document.querySelectorAll('.step')

let currentStep = 0
let nextStep = 0

steps.forEach((step)=>{
    step.addEventListener('click', ()=>{
        if (step.getAttribute('data-state') == "+"){
            currentStep = step.parentElement.getAttribute('data-edu-step')
            nextStep = currentStep
            nextStep++
        }
        if (step.getAttribute('data-state') == "-"){
            currentStep = step.parentElement.getAttribute('data-edu-step')
            nextStep = currentStep
            nextStep--
        }
        if(step.getAttribute('data-state') == 'end'){
            eduBlock.classList.add('hidden')
            currentStep = 0
            nextStep = 0
        }

        console.log('current'+currentStep)
        console.log('next'+nextStep)

        parentsEdu.forEach((parent)=>{
            if(parent.getAttribute('data-edu-step') == nextStep){
                parent.classList.add('z-9999999')
            } else {
                parent.classList.remove('z-9999999')
            }
        })
        childrenEdu.forEach((child)=>{
            if(child.getAttribute('data-edu-step') == nextStep){
                child.classList.remove('hidden')
            } else {
                child.classList.add('hidden')
            }
        })
    })
})