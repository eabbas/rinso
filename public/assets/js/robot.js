let searching = document.getElementById('search_box')
function search_box(search){
    if(search=='open'){
        searching.classList.remove('invisible')   
        searching.classList.remove('opacity-0')   
    }
     if(search=='close'){
        searching.classList.add('invisible')   
        searching.classList.add('opacity-0')   
    }
}

let shopping_bage = document.getElementById('shopping_bag')
function shopping_bag(shopping){
    if(shopping=='open'){
        shopping_bage.classList.remove('invisible')   
        shopping_bage.classList.remove('opacity-0')   
    }
     if(shopping=='close'){
        shopping_bage.classList.add('invisible')   
        shopping_bage.classList.add('opacity-0')   
    }
}
let hambarger_meno = document.getElementById('hambarger_meno')
let hambarger_meno_open = document.getElementById('hambarger_meno_open')
function hamberger_menu(shopping){
    if(shopping=='open'){
        hambarger_meno.classList.remove('invisible')   
        hambarger_meno.classList.remove('opacity-0') 
        hambarger_meno_open.classList.remove('right-full') 
        hambarger_meno_open.classList.add('right-0') 
  
    }
    if(shopping=='close'){
        hambarger_meno.classList.add('invisible')   
        hambarger_meno.classList.add('opacity-0')   
        hambarger_meno_open.classList.remove('right-0') 
        hambarger_meno_open.classList.add('right-full')
       
    }
}

let course_meetingse=document.querySelectorAll('.course_meetingse')
// console.log(course_meetingse)
course_meetingse.forEach((item)=>{
    item.addEventListener('click',function(){
        if(item.children[0].classList.contains('invisible')){
            console.log("sdgfjlasg")
                item.children[0].classList.remove('invisible')
                item.children[0].classList.remove('opacity-0')
                item.children[0].classList.remove('bottom-full')
                item.children[0].classList.add('top-0')
                item.children[2].classList.remove('invisible')
                item.children[2].classList.remove('opacity-0')
                item.children[2].classList.remove('top-full')
                item.children[2].classList.add('bottom-0')
                item.children[1].children[0].classList.add('invisible')
                item.children[1].children[0].classList.add('opacity-0')
                item.children[1].children[2].classList.add('invisible')
                item.children[1].children[2].classList.add('opacity-0')
                item.children[4].classList.remove('invisible')
                item.children[4].classList.remove('opacity-0')

        }else{

                 console.log("123")
                 item.children[0].classList.add('invisible')
                 item.children[0].classList.add('opacity-0')
                 item.children[0].classList.add('bottom-full')
                 item.children[0].classList.remove('top-0')
                 item.children[2].classList.add('invisible')
                 item.children[2].classList.add('opacity-0')
                 item.children[2].classList.add('top-full')
                 item.children[2].classList.remove('bottom-0')
                  item.children[4].classList.add('invisible')
                item.children[4].classList.add('opacity-0')
                 item.children[1].children[0].classList.remove('invisible')
                item.children[1].children[0].classList.remove('opacity-0')
                item.children[1].children[2].classList.remove('invisible')
                item.children[1].children[2].classList.remove('opacity-0')
       
        }
        
    })
})



// let viwe_shoping_box=document.getElementById('viwe_shoping_box')
// let viwe_show=document.getElementById('viwe_show')
// let viwe_box_delete=document.getElementById('viwe_box_delete')
// function vere_viwe_section(viwe){
//     if(viwe=='open'){
//         viwe_shoping_box.classList.remove('bottom-full')
//         viwe_shoping_box.classList.remove('invisible')
//         viwe_shoping_box.classList.remove('opacity-0')
//         viwe_shoping_box.classList.add('top-0')
//         viwe_show.classList.remove('top-full')
//         viwe_show.classList.remove('invisible')
//         viwe_show.classList.remove('opacity-0')
//         viwe_show.classList.add('bottom-0')
//         viwe_box_delete.classList.remove('hidden')
//     }
//     if(viwe=='close'){
//         console.log("sgdfklsfdkgh")
//         viwe_shoping_box.classList.remove('top-0')
//         viwe_shoping_box.classList.add('bottom-full')
//         viwe_shoping_box.classList.add('invisible')
//         viwe_shoping_box.classList.add('opacity-0')
//         viwe_show.classList.remove('bottom-0')
//         viwe_show.classList.add('top-full')
//         viwe_show.classList.add('invisible')
//         viwe_show.classList.add('opacity-0')
//         viwe_box_delete.classList.add('hidden')
//     }
// }


let box_bottom=document.querySelectorAll('.box_bottom')
console.log(box_bottom)
box_bottom.forEach((item)=>{
    item.addEventListener('click',function(){
        if(item.children[1].classList.contains('max-h-0')){
            
            box_bottom.forEach((element)=>{
    
            element.classList.add('h-22')
            element.children[1].classList.remove('h-20')
             element.children[1].classList.add('max-h-0')
            element.children[1].classList.add('invisible')
            element.children[1].classList.add('opacity-0')
             element.children[1].children[0].classList.add('invisible')
            element.children[1].children[0].classList.add('opacity-0')
            element.children[0].children[1].classList.remove('rotate-180')
           element.children[0].children[1].children[0].classList.remove('hidden')
           element.children[0].children[1].children[1].classList.add('hidden')    
    
    
    
            })
        }
        if(item.children[1].classList.contains('max-h-0')){
            console.log("khsdfkgds")




            item.classList.remove('h-22')
            item.children[1].classList.remove('max-h-0')
            item.children[1].classList.add('h-20')
            item.children[1].classList.remove('invisible')
            item.children[1].classList.remove('opacity-0')
            item.children[1].children[0].classList.remove('invisible')
            item.children[1].children[0].classList.remove('opacity-0')
           item.children[0].children[1].classList.add('rotate-180')
           item.children[0].children[1].children[0].classList.add('hidden')
           item.children[0].children[1].children[1].classList.remove('hidden')
        }else{
            item.classList.add('h-22')
            item.children[1].classList.remove('h-20')
             item.children[1].classList.add('max-h-0')
            item.children[1].classList.add('invisible')
            item.children[1].classList.add('opacity-0')
             item.children[1].children[0].classList.add('invisible')
            item.children[1].children[0].classList.add('opacity-0')
            item.children[0].children[1].classList.remove('rotate-180')
           item.children[0].children[1].children[0].classList.remove('hidden')
           item.children[0].children[1].children[1].classList.add('hidden')
        }
        
    })
})



