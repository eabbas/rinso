let forms = document.querySelectorAll(".form")

function closeForm(){
    forms.forEach((form)=>{
        form.classList.add('invisible')
        form.classList.add('opacity-0')
    })
}