const categoryTable = document.getElementById('categoryTable')
const searchInput = document.getElementById('searchInput')
const masterCheckbox = document.getElementById('masterCheckbox')
const selectAllButton = document.getElementById('selectAllButton')
const deleteAllButton = document.getElementById('deleteAllButton')
const selectedCount = document.getElementById('selectedCount')
const editModal = document.getElementById('editModal')
const editForm = document.getElementById('editForm')

let currentRow = null;

function loader(status) {
    if (status === 'open') {
        document.getElementById('loader').classList.remove('invisible', 'opacity-0')
    }
    if (status === 'close') {
        document.getElementById('loader').classList.add('invisible', 'opacity-0')
    }
}

function getRows() {
    return [...categoryTable.querySelectorAll('.category-row')];
}

function getVisibleRows() {
    return getRows().filter(row => !row.classList.contains('hidden'));
}

function getSelectedRows() {
    return getRows().filter(row =>
        row.querySelector('.category-checkbox').checked
    );
}

function updateSelection() {
    const rows = getRows();
    const visibleRows = getVisibleRows();
    const selectedRows = getSelectedRows();

    selectedCount.textContent = `${selectedRows.length} مورد انتخاب شده`;

    deleteAllButton.disabled = selectedRows.length === 0;

    masterCheckbox.checked =
        visibleRows.length > 0 &&
        visibleRows.every(row => row.querySelector('.category-checkbox').checked);

    masterCheckbox.indeterminate =
        visibleRows.some(row => row.querySelector('.category-checkbox').checked) &&
        !masterCheckbox.checked;

    selectAllButton.textContent =
        visibleRows.length > 0 &&
            visibleRows.every(row => row.querySelector('.category-checkbox').checked) ?
            'لغو انتخاب همه' :
            'انتخاب همه';

    updateStatistics();
}


// بروزرسانی آمار
function updateStatistics() {
    const rows = getRows();
    const visibleRows = getVisibleRows();

    const total = rows.length;

    const used = rows.filter(row => {
        const count = Number(
            row.querySelector('td:nth-child(4) span').textContent.trim()
        );

        return count > 0;
    }).length;

    document.getElementById('totalCategories').textContent = total;
    document.getElementById('footerTotal').textContent = total;
    document.getElementById('visibleCount').textContent = visibleRows.length;
    document.getElementById('usedCategories').textContent = used;
    document.getElementById('activeCategories').textContent = total;
}


// انتخاب همه
selectAllButton.addEventListener('click', () => {
    const visibleRows = getVisibleRows();

    const allSelected =
        visibleRows.length > 0 &&
        visibleRows.every(row => row.querySelector('.category-checkbox').checked);

    visibleRows.forEach(row => {
        row.querySelector('.category-checkbox').checked = !allSelected;
    });

    updateSelection();
});


// چک‌باکس بالای جدول
masterCheckbox.addEventListener('change', () => {
    getVisibleRows().forEach(row => {
        row.querySelector('.category-checkbox').checked = masterCheckbox.checked;
    });

    updateSelection();
});


// تغییر انتخاب هر ردیف
categoryTable.addEventListener('change', event => {
    if (event.target.classList.contains('category-checkbox')) {
        updateSelection();
    }
});


// جست‌وجو
searchInput.addEventListener('input', () => {
    const keyword = searchInput.value.trim().toLowerCase();

    getRows().forEach(row => {
        const name = row.dataset.name.toLowerCase();
        const description = row.dataset.description.toLowerCase();

        const matched =
            name.includes(keyword) ||
            description.includes(keyword);

        row.classList.toggle('hidden', !matched);
    });

    document.getElementById('emptyState').classList.toggle(
        'hidden',
        getVisibleRows().length !== 0
    );

    updateSelection();
});


// باز کردن پاپ‌آپ ویرایش
function openEditModal(button, categoryId) {
    currentRow = button.closest('.category-row');
    document.getElementById('editName').value = currentRow.dataset.name;
    document.getElementById('editSlug').value = currentRow.dataset.slug;
    document.getElementById('editId').value = categoryId;
    document.getElementById('editDescription').value = currentRow.dataset.description;
    document.getElementById('editParentId').value = currentRow.dataset.parentId;
    editModal.classList.remove('hidden');
    editModal.classList.add('flex');
    document.getElementById('editName').focus();
}


// بستن پاپ‌آپ
function closeEditModal() {
    editModal.classList.add('hidden');
    editModal.classList.remove('flex');

    currentRow = null;
}


// ذخیره ویرایش
editForm.addEventListener('submit', event => {
    event.preventDefault();
    if (!currentRow) return;
    const title = document.getElementById('editName').value.trim();
    const slug = document.getElementById('editSlug').value.trim();
    const description = document.getElementById('editDescription').value.trim();
    const categoryId = document.getElementById('editId').value.trim(); 
    const parentId = document.getElementById('editParentId').value; 
    if (!title || !slug) return;
    loader('open')
    $.ajax({
        url: api +'updatePageCategory/'+categoryId,
        type: "POST",
        dataType: "json",
        data: {
            'title': title,
            'slug': slug,
            'description': description,
            'parent_id': parentId,
        },
        success: function(data){
            console.log(data)
            loader('close')
            currentRow.dataset.name = title;
            currentRow.dataset.slug = slug;
            currentRow.dataset.description = description;
            currentRow.querySelector('.category-name').textContent = title;
            currentRow.querySelector('.category-slug').textContent = slug;
            currentRow.querySelector('.category-description').textContent = description;
            closeEditModal();
            searchInput.dispatchEvent(new Event('input'));
        },
        error: function(xhr, status,error){
            loader('close')
            console.log(xhr.responseJSON.message)
        }
    })
});


// حذف یک دسته
function deleteCategory(button, categoryId) {
    const row = button.closest('.category-row')
    const name = row.dataset.name

    if (!confirm(`آیا از حذف دسته «${name}» مطمئن هستید؟`)) {
        return
    }
    loader('open')
    $.ajax({
        url: api+'deletePageCategory/'+categoryId,
        type: "GET",
        success: function(data){
            loader('close')
            row.remove()

            updateSelection()

            document.getElementById('emptyState').classList.toggle(
                'hidden',
                getVisibleRows().length !== 0
            )
        },
        error: function(){
            console.log('error')
            loader('close')
        }

    })

    
}


// حذف دسته‌های انتخاب‌شده
deleteAllButton.addEventListener('click', () => {
    const selectedRows = getSelectedRows();
    if (selectedRows.length === 0) return;
    if (!confirm(`آیا از حذف ${selectedRows.length} دسته انتخاب‌شده مطمئن هستید؟`)) {
        return;
    }
    loader('open')
    let ids = []
    selectedRows.forEach(row => {
        ids.push(row.dataset.id)
    })
    $.ajax({
        url: api+'deleteAllPageCategory',
        type: "POST",
        dataType: "json",
        data: {
            'categoryIds': ids
        },
        success: function(data){
            console.log(data)
            loader('close')
            selectedRows.forEach(row => row.remove())

            masterCheckbox.checked = false

            updateSelection()

            document.getElementById('emptyState').classList.toggle(
                'hidden',
                getVisibleRows().length !== 0
            )
        },
        error: function(){
            console.log('error')
            loader('close')
        }
    })
})


// بستن پاپ‌آپ با کلیک روی فضای بیرونی
editModal.addEventListener('click', event => {
    if (event.target === editModal) {
        closeEditModal()
    }
})


// بستن پاپ‌آپ با کلید Escape
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !editModal.classList.contains('hidden')) {
        closeEditModal()
    }
})


// مقداردهی اولیه
updateSelection()