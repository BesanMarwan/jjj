<div class="col-md-4 mt-30">

    <div class="title d-flex p-1 mar-60">
        <h6 class=" pr-3 font-weight-bold"> اقرأ أيضا  </h6>
        <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
    </div>
    <div class="news-box-related box">
        <div class="travel-box  pt-2 ">
            <div class="travel-img">
                @foreach($postRand1->media as $media)
                <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                @endforeach
            </div>
            <div class="travel-text   pr-1 ">

                <h6 class="pt-1 mb-0 font-weight-bold">{{$postRand1->title}}
                </h6>
                <span class="dateN">
                                    <i class="fas fa-calendar-alt ml-2  pb-2"></i>{{$postRand1->created_at->format('Y/m/d')}}
                                </span>
            </div>
        </div>
         @if($postRand3)
             @foreach($postRand3 as $post)
                 <a href="{{route('front.post',$post->id)}}">
        <div class="relate-box mt-30 d-flex">
            <div class="relate-img col-md-6 ">
                @foreach($post->media as $media)
                <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="{{$media->alt}}">
                @endforeach
            </div>
            <div class="relate-text  mt-1">

                <h6>{{$post->title}}
                </h6>
                <span class="date font-weight-bold">
                                    <i class="fas fa-calendar-alt ml-2"></i>
{{$post->created_at->format('Y/m/d')}}                                </span>

            </div>
        </div>
                 </a>
            @endforeach
        @endif

    </div>
</div>


</div>
