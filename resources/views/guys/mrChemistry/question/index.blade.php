@extends('admin.app.panel')
@section('title', 'لیست سوالات')
@section('content')
    <style>

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* اسکرول بار سفارشی */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c7d2fe;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #818cf8;
        }

        /* انیمیشن‌ها */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .question-card {
            animation: fadeIn 0.4s ease-out;
        }

        /* ریسپانسیو فونت */
        @media (max-width: 640px) {
            .question-title {
                font-size: 1rem;
            }

            .option-text {
                font-size: 0.875rem;
            }
        }
    </style>


    <!-- کانتینر اصلی -->
    <div class="max-w-4xl mx-auto">

        <!-- هدر آزمون -->
        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-6 mb-4 sm:mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg sm:text-2xl font-bold text-gray-800 in-fa">{{$test->title}}</h1>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5 sm:mt-1 in-fa">({{count($test->questions)}}
                            )</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <div class="bg-amber-50 rounded-xl px-3 sm:px-4 py-2 flex-1 sm:flex-none text-center">
                        <p class="text-amber-600 text-xs sm:text-sm">زمان ازمون</p>
                        <p class="text-amber-700 font-bold text-sm sm:text-base in-fa">{{$test->duration}}ثانیه</p>
                    </div>
                    {{--                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 sm:px-6 py-2 rounded-xl text-sm sm:text-base font-medium transition-all duration-200 shadow-md hover:shadow-lg">--}}
                    {{--                    ثبت نهایی--}}
                    {{--                </button>--}}
                </div>
            </div>

            <!-- نوار پیشرفت -->
            <div class="mt-4 sm:mt-6">
                <div class="flex justify-between text-xs sm:text-sm text-gray-600 mb-2">
                    <span>پیشرفت آزمون</span>
                    <span class="font-medium text-indigo-600 in-fa">۳/۵ سوال</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 rounded-full transition-all duration-500"
                         style="width: 60%"></div>
                </div>
            </div>
        </div>

        <!-- لیست سوالات -->
        <div class="space-y-4 sm:space-y-6">

            <!-- سوال ۱ -->
            @foreach($test->questions as $question)
                <div class="question-card bg-white rounded-2xl shadow-lg overflow-hidden"
                     data-question-id="{{ $question->id }}">
                    <div class="p-4 sm:p-6">
                        <!-- هدر سوال -->
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3 mb-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                    <span class="text-indigo-700 font-bold text-sm">۱</span>
                                </div>
                                <h3 class="question-title font-semibold text-gray-800 leading-relaxed text-sm sm:text-base in-fa titles" data-question-id="{{ $question->id }}">
                                    {{$question->title}}
                                </h3>
                            </div>
                            <div class="flex gap-2">
                                <button class="text-gray-400 hover:text-yellow-500 transition text-sm sm:text-base">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- گزینه‌ها -->
                        <div class="space-y-2 sm:space-y-3" id="optionQuestion">
                            @foreach($question->options as $options)
                                <label class="flex items-start p-3 sm:p-4 @if($options->right_answer==1) bg-green-500 text-white @else bg-gray-50 @endif rounded-xl transition-all duration-200 cursor-pointer border-2 border-transparent">
                                    <span class="option-text @if($options->right_answer==1) text-white @else text-gray-700 @endif text-sm sm:text-base leading-relaxed in-fa" >{{$options->option}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- فوتر سوال -->
                    <div class="bg-gray-50 px-4 sm:px-6 py-5 bordere border-t border-gray-100 flex justify-between">
                        <a href="{{route('mquestion.delete' , $question->id)}}"
                           class="text-gray-500 hover:text-indigo-600 text-sm text-red-500 sm:text-sm transition flex items-center gap-1">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            حذف
                        </a>
                        <button onclick="editQuestion({{ $question->id }})"
                                href="{{route('mquestion.edit' , $question->id)}}"
                                class="cursor-pointer px-3 py-1.5 bg-blue-500 rounded-md text-sm sm:text-sm text-white">
                            ویرایش
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="questionBlock"
         class="fixed w-full h-dvh bg-black/50 top-0 right-0 z-999999 transition-all duration-300 invisible opacity-0">
        <div class="w-full lg:w-[calc(100%-265px)] lg:float-end flex justify-center items-center h-full">
            <div class="w-11/12 lg:w-3/4 p-3 rounded-lg bg-white relative">
                <span class="absolute -top-3 -right-3 cursor-pointer bg-white p-3 rounded-full text-lg" onclick="closeForm()">❌</span>
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4 p-2 max-h-[600px] overflow-y-auto" style="scrollbar-width: thin;"
                     id="questionForm">
                    <input type="hidden" id="questionId">
                    <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex flex-row gap-1 in-fa">سوال
                            <span class="text-red-500">*</span>
                        </label>
                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                   name='title' placeholder="متن سوال" id="title">
                        </div>
                    </div>
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:col-span-2" id="options"></div>
                    <div
                            class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                        <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                        <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                            <textarea rows="5" class="p-4 w-full focus:outline-none text-sm font-bold mr-2" name='description' id="description" placeholder="توضیحات سوال"></textarea>
                        </div>
                    </div>
                    <div class="w-full text-left">
                        <button onclick="updateQuestion()"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] btn text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let questionBlock = document.getElementById('questionBlock')
        let questionIdInp = document.getElementById('questionId')
        let optionsBlock = document.getElementById('options')
        let allQuestoins = document.querySelectorAll('.question-card')
        let title = document.getElementById('title')
        let description = document.getElementById('description')
        let buttonBox = document.getElementById('buttonBox')
        let optionQuestion=document.getElementById('optionQuestion')
        let titles = document.querySelectorAll('.titles')

        function editQuestion(questionId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('mr-chemistry/question/edit') }}/"+questionId,
                type: "GET",
                success: function(data){
                    console.log(data)
                    optionsBlock.innerHTML = ""
                    questionBlock.classList.remove('invisible')
                    questionBlock.classList.remove('opacity-0')
                    title.value = data.title
                    description.innerText = data.description
                    questionIdInp.value = data.id
                    let options = data.options
                    let i = 1
                    options.forEach((option)=>{
                        let div = document.createElement('div')
                        div.classList = 'relative'
                        let inner = `
                            <div
                                    class="rounded-lg focus:border-none focus:outline-none text-[#99A1B7] w-full flex flex-row items-center gap-2">
                                <input type="radio" name="question[correct]" onchange="selectCorrect(this)" ${ option.right_answer == 1 ? 'checked' : '' } value="${ i }">
                                <input class="px-4 py-2 w-full focus:outline-none text-sm font-bold rounded-md mr-2 focus:bg-[#F1F1F4] bg-[#F9F9F9]" type="text"
                                       name='question[answer][${i}]' placeholder="گزینه ${i}" value="${option.option}" id="title">
                            </div>`
                        div.innerHTML = inner
                        optionsBlock.appendChild(div)
                    })
                },
                error: function(){
                    console.log('error')
                }
            })
        }

        function updateQuestion(){
            let children = optionsBlock.children
            let answers = []
            let correct = ''
            for(let i = 0; i<children.length; i++){
                answers.push(children[i].children[0].children[1].value)
                if(children[i].children[0].children[0].checked){
                    correct = i
                }
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ url('mr-chemistry/question/update') }}/"+questionIdInp.value,
                type: "POST",
                dataType: "json",
                data: {
                    'title': title.value !== "" ? title.value : null,
                    'description': description.value !== '' ? description.value : null,
                    'answers': answers,
                    'correct': correct
                },
                success: function(data){
                    console.log(data)
                    optionQuestion.innerHTML=""
                    let div=document.createElement('div')
                    data.options.forEach((option)=>{
                    let element=document.createElement('label')
                    element.classList=`flex items-start p-3 sm:p-4 ${ option.right_answer==1 ? 'bg-green-500 text-white' : 'bg-gray-50'} rounded-xl transition-all duration-200 cursor-pointer border-2 border-transparent`
                        element.innerHTML=`<span class="option-text ${ option.right_answer==1 ?  'text-white' : 'text-gray-700'} text-sm sm:text-base leading-relaxed in-fa" >${option.option}</span>`
                    div.appendChild(element)
                    })
                    optionQuestion.appendChild(div)
                    titles.forEach((title)=>{
                        if(title.getAttribute('data-question-id') == data.id){
                            title.innerText = data.title
                        }
                    })
                    closeForm()
                },
                error: function(){
                    console.log('error')
                }
            })
        }

        function closeForm(){
            questionBlock.classList.add('invisible')
            questionBlock.classList.add('opacity-0')
            title.value = ""
            description.innerText = ""
            questionIdInp.value = ""
        }

        function selectCorrect(el) {
            let parent = el.parentElement.parentElement.parentElement.children
            for (let i = 0; i < parent.length; i++){
                if (parent[i] === el.parentElement.parentElement) {
                    console.log(parent[i])
                    el.value = i
                    console.log(i += 1)
                }
            }
        }
    </script>
@endsection