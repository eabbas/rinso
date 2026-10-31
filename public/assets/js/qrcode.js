let forms = document.querySelectorAll('.form')
function closeForm(){
    forms.forEach((form)=>{
        form.classList.add('invisible')
        form.classList.add('opacity-0')
        form.classList.remove('lg:-translate-y-1/7')
    })
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    loading.classList.add('invisible')
    loading.classList.add('opacity-0')
    editQr.classList.add('scale-95')
    editQr.classList.add('opacity-0')
    editQr.classList.add('invisible')
}