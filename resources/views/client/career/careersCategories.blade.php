@extends('client.document')
@section('title', 'همه دسته ها')
@section('content')
    <div class="w-11/12 mx-auto min-h-[calc(100vh-100px)] pt-5 samim">
        <section>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h1 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                 همه دسته ها    
                </h1>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-8 gap-4">
                @foreach ($careerCategories as $careerCategory)
                @if(count($careerCategory->careers))
                <div class="relative careers bg-white rounded-md">
                    <a href="{{ route('career.categoryCareers', [$careerCategory]) }}" 
                    class="px-5 w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2">
                        <div class="w-full h-28 rounded-md overflow-hidden">
                            @if ($careerCategory->main_image)
                            <img class="h-full w-full rounded-lg object-cover" 
                                src="{{ asset('storage/'.$careerCategory->main_image) }}" alt="career category avatar">
                            @else
                            <img class="h-full w-full rounded-lg object-cover"
                                src="{{ asset('assets/img/cash-machine.png') }}" alt="career category icon">
                            @endif
                        </div>
                        <span class="text-gray-500 text-sm font-medium">
                            {{ $careerCategory->title }}
                        </span>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
         
           
        </section>
    </div>
 <script>
    //    function favoriteCareer(id,el){
    //     // event.preventDefault();
    //     el.children[0].setAttribute('fill', 'red');

    //     $.ajaxSetup({
    //         headers:{
    //             'X-CSRF-TOKEN':"{{csrf_token()}}"
    //         }
    //     });

    //     $.ajax({
    //         url:"{{route('favoriteCareer.create')}}",
    //         type:'POST',
    //         dataType:'json',
    //         data:{'id':id},
    //         success:function(response){
    //             console.log("success")
    //         }

    //     })
    //    }
    </script>
@endsection
