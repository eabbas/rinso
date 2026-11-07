<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="author" content="Mahdi Hadidi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/mrChemistry/logo.png') }}" type="image/png">
    <title>مستر شیمی | خانه</title>
</head>
<body>
    <div class="relative hidden lg:block">
        <img src="{{ asset('storage/mrChemistry/home.png') }}" class="w-full h-dvh" alt="">
        <div class="absolute w-1/3 bg-whtie right-[2.5%] top-[3%] z-20 flex flex-row items-center justify-end gap-3">
            <div class="flex flex-col gap-2 w-[65%]">
                <div class="w-full flex flex-row items-center justify-between">
                    <span class="text-xs text-white in-fa">2450/4000</span>
                    <span class="text-sm text-white font-bol">محمد افتخاری</span>
                </div>
                <div class="w-full h-4 rounded-full bg-white">
                    <div class="w-7/12 h-full bg-[#a7e552] rounded-full float-end relative"></div>
                </div>
            </div>
            <div class="rounded-full size-[15%] relative">

                <img src="{{ asset('storage/images/1778599020_me.jpg') }}" class="absolute size-[86%] rounded-full top-[4%] left-[6%]" alt="">
                <img src="{{ asset('storage/mrChemistry/profile.png') }}" class="size-full" alt="">
            </div>
        </div>
        <div class="absolute w-1/3 bg-whtie left-[5%] top-[4%] z-20 flex flex-row items-center justify-end gap-3">
            <div class="ml-2 flex flex-row items-center gap-1">
                <span class="text-3xl font-bold text-[#083f1d]">Shimy</span>
                <span class="text-3xl font-bold text-lime-600">Mr</span>
            </div>
            <img src="{{ asset('storage/mrChemistry/logo.png') }}" class="rounded-full size-[15%]" alt="">
        </div>
        <div class="absolute w-[6%] left-[1.5%] top-[19%] flex flex-col items-center gap-5">
            <img src="{{ asset('storage/mrChemistry/tests.png') }}" class="w-10/12 ml-[5%]" alt="">
            <img src="{{ asset('storage/mrChemistry/quiz.png') }}" class="w-10/12 ml-[5%]" alt="">
            <img src="{{ asset('storage/mrChemistry/leeg.png') }}" class="w-10/12 ml-[5%]" alt="">

        </div>
        <div class="absolute w-[23%] right-[1.5%] top-[19%] flex flex-col items-center gap-5 h-1/2 justify-between">

            <div class="w-full h-1/4 bg-white/40 rounded-xl"></div>
            <div class="w-full h-1/4 bg-white/40 rounded-xl"></div>
            <div class="w-full h-1/4 bg-white/40 rounded-xl"></div>

        </div>
    </div>

    <div class="lg:hidden relative w-full h-dvh">
        <img src="{{ asset('storage/mrChemistry/mobileHome.png') }}" class="absolute w-full h-dvh" alt="">
        <div class="w-1/2 flex flex-row items-center gap-5 justify-between absolute top-[0.5%] right-[7%]">
            <div class="rounded-full size-1/4 relative">
                <img src="{{ asset('storage/images/1778599020_me.jpg') }}" class="absolute size-[86%] rounded-full top-[4%] left-[6%]" alt="">
                <img src="{{ asset('storage/mrChemistry/profile.png') }}" class="size-full" alt="">
            </div>
            <div class="flex flex-row items-center gap-3 pl-10">
                <span class="text-white">2025/4000</span>
            </div>
        </div>
        <a href="https://mrshimy.ir" class="absolute w-1/4 top-[2.5%] left-[7%] flex flex-row justify-center items-center">
            <img src="{{ asset('storage/mrChemistry/logo.png') }}" class="size-7/12" alt="">
        </a>
        <div class="absolute w-1/2 top-[11%] right-[5%] z-22 flex flex-row items-center gap-2">
            <div class="size-1/3">
                <img src="{{ asset('storage/mrChemistry/home01.png') }}" class="size-11/12" alt="">
            </div>
            <div class="size-1/3 relative" onclick="showMicroQuiz(this)">
                <img src="{{ asset('storage/mrChemistry/quiz.png') }}" class="size-full" alt="">
            </div>
            <div class="size-1/3">
                <img src="{{ asset('storage/mrChemistry/leeg.png') }}" class="size-full" alt="">
            </div>
        </div>
        <div class="absolute right-[7%] w-[83%] flex flex-row justify-between items-end bottom-[4.5%]">
            <div class="w-[41%]">
                <img src="{{ asset('storage/mrChemistry/test.png') }}" alt="">
            </div>
            <div class="w-[18%]">
                <img src="{{ asset('storage/mrChemistry/expriment.png') }}" alt="">
            </div>
            <div class="w-[25%] mb-[2%]">
                <img src="{{ asset('storage/mrChemistry/descriptive.png') }}" alt="">
            </div>
        </div>
        <div class="w-11/12 h-1/2 absolute right-[4%] top-[24%] flex flex-col gap-2.5" id="microQuiz"></div>
    </div>

    <script>
        let url = "{{ url('/') }}/"
        let image = "{{ asset('storage/') }}/"
        let microQuizBox = document.getElementById('microQuiz')
        function showMicroQuiz(el){
            let div = document.createElement('div')
            div.classList = 'w-full h-full top-0 right-0 absolute flex justify-center items-center'
            div.innerHTML = `<div class="size-10 border-4 border-white border-t-gray-500/0 rounded-full animate-spin"></div>`
            el.appendChild(div)
            $.ajax({
                url: url+"api/educational-base",
                type: "GET",
                success: function(response){
                    console.log(response)
                    microQuizBox.innerHTML = ''
                    el.children[1].remove()
                    response.forEach((base)=>{
                        microQuizBox.classList.remove('invisible')
                        microQuizBox.classList.remove('opacity-0')
                        let element = document.createElement('div')
                        element.classList = 'w-full h-1/5 relative cursor-pointer'
                        element.setAttribute('onclick', `showMQBase(this, ${base.id})`)
                        element.innerHTML = `
                            <div class="absolute w-full h-full top-0 right-0 z-20 flex justify-center items-center">
                                <span class="text-white font-bold opacity-100">میکرو آزمون های ${base.title}</span>
                            </div>
                            <img src="${image + 'mrChemistry/option.png'}" class="size-full" style="width: 100%; height: 100%; background: #2a9b2a; background: linear-gradient(0deg, rgba(42, 155, 42, 0.4) 0%, rgba(255, 255, 255, 0.4) 100%); clip-path: polygon(5% 0%, 95% 0%, 100% 50%, 95% 100%, 5% 100%, 0% 50%); display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: bold; transition: all 0.3s ease;" alt="">`
                        microQuizBox.appendChild(element)
                    })
                },
                error: function(){
                    console.log('error')
                }
            })
        }

        function showMQBase(el, baseId){
            
        }
    </script>
</body>
</html>