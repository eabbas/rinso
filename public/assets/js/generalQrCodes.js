function addForm(qrCodeId) {
    let editFormOverlay = document.getElementById('editFormOverlay')
    editFormOverlay.classList.remove('opacity-0')
    editFormOverlay.classList.remove('invisible')
    editQrCode(qrCodeId)
}

function editQrCode(qrCodeId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
    $.ajax({
        url: editRoute,
        type: "POST",
        dataType: "json",
        data: {
            'id': qrCodeId
        },
        success: function (data) {
            let editFormFields = document.getElementById('editFormOverlay').querySelectorAll('input[type="text"]');
            editFormFields[0].value = data.link;
            editFormFields[1].value = data.title;
            editFormFields[2].value = data.description;
            let button = document.getElementById('editFormOverlay').querySelector('button[type="button"]')
            button.setAttribute('onClick', `updateQrCode(${qrCodeId}, this)`)
        },
        error: function () {
            alert('error')
        }
    })
}

function closeForm() {
    let editFormOverlay = document.getElementById('editFormOverlay')
    editFormOverlay.classList.add('opacity-0')
    editFormOverlay.classList.add('invisible')
}

function updateQrCode(qrCodeId, el) {
    let values = []
    let editFormInputs = el.parentElement.parentElement.querySelectorAll('input[type="text"]')
    editFormInputs.forEach((editFormInput) => {
        values.push(editFormInput.value)
    })
    updateQrCodeAjax(qrCodeId, values)
}

function updateQrCodeAjax(qrCodeId, values) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
    $.ajax({
        url: updateRoute,
        type: "POST",
        dataType: "json",
        data: {
            'id': qrCodeId,
            'values': values
        },
        success: function (data) {
            let qrCode = document.getElementById(`qrCode-${qrCodeId}`)
            // qrCode.children[1].src = `https://famenu.ir/storage/${data.image_path}`
            qrCode.children[1].src = imageAddress + '/' + data.image_path
            if (data.title) {
                qrCode.children[3].innerText = data.title
            } else {
                qrCode.children[3].innerText = ''
            }
            if (data.description) {
                qrCode.children[4].innerText = data.description
            } else {
                qrCode.children[4].innerText = ''
            }
            closeForm()
        }
        ,
        error: function () {
            alert('error')
        }
    })
}