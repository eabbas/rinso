let searchInput = document.getElementById('searchInput')
let sortType = document.getElementById('sortType')
let categories = document.querySelectorAll('.categories')
let socialMedias = document.querySelectorAll('.socialMedias')
let fromDate = document.getElementById('fromDate')
let toDate = document.getElementById('toDate')
let timeout
searchInput.addEventListener('input', ()=>{
    clearTimeout(timeout)
    timeout = setTimeout(()=>{
        filters.keyword = searchInput.value
        getFilters()
    }, 500)
})

categories.forEach(category=>{
    category.addEventListener('change', ()=>{
        filters.category = []
        document.querySelectorAll('.categories').forEach(cat=>{
            if(cat.querySelector('input[type=checkbox]').checked){
                filters.category.push(cat.dataset.categoryId)
                console.log(cat.querySelector('input[type=checkbox]').value)
            }
        })
        getFilters()
    })
})


socialMedias.forEach(socialMedia=>{
    socialMedia.addEventListener('change', ()=>{
        filters.socialMedia = []
        document.querySelectorAll('.socialMedias').forEach(media=>{
            if(media.checked){
                filters.socialMedia.push(media.dataset.socialMediaId)
            }
        })
        getFilters()
    })
})

fromDate.addEventListener('input', ()=>{
    filters.fromDate = fromDate.value
    getFilters()
})
toDate.addEventListener('input', ()=>{
    filters.toDate = toDate.value
    getFilters()
})


sortType.addEventListener('change' ,()=>{
    filters.sortType = sortType.value
    getFilters()
})

document.getElementById('clearFilters').addEventListener('click', ()=>{
    categories.forEach(category=>{
        category.querySelector('input[type=checkbox]').checked = false
    })
    socialMedias.forEach(socialMedia=>{
        socialMedia.querySelector('input[type=checkbox]').checked = false
    })
    searchInput.value = ""

    filters = {
        'keyword': null,
        'category': ['all'],
        'socialMedia': ['all'],
        'sortType': 'desc',
        'sortBy': 'created_at',
    }
    getFilters()
})

function getFilters(){
    $.ajax({
        url: api+'getFilters',
        type: "POST",
        dataType: "json",
        data: {
            'filters': filters
        },
        success: function(response){
            loadDatas(response)
        },
        error: function(){
            console.error('failed to load data')
        }
    })
}

function loadDatas(datas) {
    let pages = datas[0];

    let profileGrid = document.getElementById('profileGrid');
    let resultCount = document.getElementById('resultCount');
    let emptyState = document.getElementById('emptyState');
    let loadMore = document.getElementById('loadMore');

    profileGrid.innerHTML = '';

    resultCount.innerText = pages.length;

    if (pages.length === 0) {
        emptyState.classList.remove('hidden');
        loadMore.classList.add('hidden');
        return;
    }

    emptyState.classList.add('hidden');
    loadMore.classList.remove('hidden');

    pages.forEach(data => {
        profileGrid.innerHTML += `
            <div class="bg-white border border-slate-200 rounded-2xl p-4 hover:border-[#ff9018] transition">

                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-[#ff9018] font-bold">
                       ${ data.title ?? '' }
                    </div>

                    <div class="min-w-0">
                        <h3 class="font-bold text-[13px] text-[#142033] truncate">
                            ${data.title ?? ''}
                        </h3>

                        <p class="text-[11px] text-slate-400 mt-1 truncate">
                            ${data.subTitle ?? ''}
                        </p>
                    </div>
                </div>

                <p class="text-[11px] text-slate-500 leading-6 line-clamp-2">
                    ${data.description ?? ''}
                </p>

            </div>
        `
    })
}