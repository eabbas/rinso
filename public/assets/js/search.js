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


document.getElementById('clearFilters').addEventListener('click', () => {
    categories.forEach(category => {
        category.querySelector('input[type=checkbox]').checked = false
    })

    socialMedias.forEach(socialMedia => {
        socialMedia.checked = false
    })

    searchInput.value = ''
    fromDate.value = ''
    toDate.value = ''

    sortType.value = 'desc';

    filters = {
        keyword: '',
        category: ['all'],
        socialMedia: ['all'],
        fromDate: '',
        toDate: '',
        sortType: 'desc',
        sortBy: 'created_at'
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
    let pages = datas;

    let profileGrid = document.getElementById('profileGrid')
    let resultCount = document.getElementById('resultCount')
    let emptyState = document.getElementById('emptyState')
    let loadMore = document.getElementById('loadMore')

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
        let a = document.createElement('a')
        a.href = url+data.user_name
        a.classList = `block bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-[#ff9018] hover:shadow-md transition`
        let html = `
            <div class="h-28 relative bg-slate-100">
                <img
                    src="${ data.cover_path ? storage+data.cover_path : url+'assets/img/default-page.png' }"
             
                    alt="کاور {{ $data->title }}"
                    class="w-full h-full object-cover"
                >
                <div class="absolute -bottom-7 right-4 w-16 h-16 rounded-2xl border-4 border-white bg-white overflow-hidden shadow-sm">

                    <img
                        src="${ data.logo_path ? storage+data.logo_path : url+'assets/img/default-page.png' }"
                        alt="لوگوی ${ data.title }"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>

            <div class="pt-9 px-4 pb-4">
                <h3 class="font-bold text-[13px] text-[#142033] truncate">
                    ${ data.title }
                </h3>
                <p class="text-[11px] text-slate-400 mt-1 truncate">
                    ${ data.subTitle }
                </p>
            </div>

                        
        `
       a.innerHTML = html
       profileGrid.appendChild(a)
    })
}