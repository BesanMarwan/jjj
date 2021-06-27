@extends('front.layouts.site')
@section('title',getSettingsOf('site_title'))

@section('content')
    <div class="slider  mt-30">
        <div class="container  ">
            <img src="{{asset('assets/front/images/5VuE0.jpeg')}}" class="img-fluid w-100" alt="turkey pazzar">
        </div>
    </div>

    <!--    start  news section -->
    <section class="news container mt-30">
        <div class="row">
            <div class="col-md-4">
                <div class="block-content latest  shadow">
                    <div class="block-title pl-2 ">
                        <h5 class="p-3 font-weight-bold">آخر الاخبار</h5>
                    </div>
                    @if($latest)
                        @foreach($latest as $post)
                            <div class="latest-box d-flex">
                                <div class="latest-img col-md-5">
                                    @foreach($post->media as $media)
                                    <img src="{{asset($media->file_name)}}" class="img-fluid " alt="{{$media->alt}}">
                                    @endforeach
                                </div>
                                <div class="new-box-text col-md-7">
                                    @if($post->category)
                                    <span class="list-1__date font-weight-bold type">{{$post->category->name}}</span>
                                    @endif
                                    <a href="{{route('front.post',$post->id)}}">
                                        <h6 class="pt-1 text-bold">{{$post->title}}</h6>
                                    </a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="col-md-5">
               @if($postRand)
                    <div class="new-box-lg shadow rounded">
                        <div class="img-new">
                            @foreach($postRand->media as $media)
                            <img src="{{asset(''.$media->file_name)}}" title="{{$media->alt}}" class="img-fluid w-100" alt="{{$media->alt}}">
                            @endforeach
                        </div>
                        <div class="new-text px-1">
                           <span class="date font-weight-bold">
                               <i class="fas fa-calendar-alt ml-2"></i>{{$postRand->created_at->format('Y/m/d')}}
                           </span>
                            <a href="{{route('front.post',$postRand->id)}}">
                                <h5 class="font-weight-bold text-white mb-0">{{$postRand->title}}</h5>
                            </a>
                            <p class="pt-1 text-white">{!! ControlText($postRand->content) !!}
                            </p>
                        </div>
                    </div>
               @endif
                   <div class="adv mt-30">
                       <img src="{{asset('assets/front/images/k7UpZ.png')}}" class="img-fluid" style="height:100px" alt="">
                   </div>
            </div>
            <div class="col-md-3">
                <div class="row d-flex justify-content-between">
                 @if($postRand2)
                     @foreach($postRand2 as $post)
                            <div class="col-md-12 mb-30">
                                <div class="new-box shadow rounded pb-2">
                                    <div class="img-box">
                                        <div class="img-box">
                                            <div class="img-new">
                                                @foreach($post->media as $media)
                                                <img src="{{asset(''.$media->file_name)}}" alt="{{$media->alt}}" class="img-fluid w-100" title="{{$media->alt}}">
                                                @endforeach
                                            </div>
                                            <div class="img-text pr-2">
                                           <span class="date">
                                               <i class="fas fa-calendar-alt ml-2"></i>{{$post->created_at->format('Y/m/d')}}
                                           </span>
                                                <a href="">
                                                    <h6 class="">
                                                        {{$post->title}}

                                                    </h6>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                 @endif
                </div>
            </div>
        </div>
    </section>

    <!--    start ecnomics news section -->
    <div class="ecnomic-bg">
        <section class="ecnomic container  mar-60">
            <div class="row ">
                <div class="col-md-6">
                    <div class="title d-flex p-1">
                        <h4 class="pr-3 font-weight-bold">اقتصاد تركيا</h4>
                        <a href="{{route('front.category',2)}}">
                        <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
                        </a>
                    </div>
                    @if($postEcno_lg)
                    <div class="ecno-post shadow pb-2 rounded">
                        <div class="ecno-img">
                            @foreach($postEcno_lg->media as $media)
                              <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="{{$media->alt}}">
                            @endforeach
                        </div>
                        <div class="ecno-text px-2">
                            <a href="{{route('front.post',$postEcno_lg->id)}}">
                                <a href="{{route('front.post',$postEcno_lg->id)}}">
                                    <h6 class="pt-1 font-weight-bold">
                                        {{$postEcno_lg->title}}
                                    </h6>
                                </a>
                            </a>
                            <p class="mb-0 font-black">{!! controlText($postEcno_lg->content) !!}.
                            </p>
                            <span class="date-publish font-weight-bold">
                                    <i class="fas fa-calendar-alt ml-2"></i>{{$postEcno_lg->created_at->format('Y/m/d')}}
                                </span>
                        </div>
                    </div>
                    @endif
                    @if($postEcno)
                    <div class="row d-flex mt30">
                        @foreach($postEcno as $post)
                        <div class="col-md-6  ">
                            <div class="ecno-post ecno1 shadow pb-2 rounded">
                                <div class="ecn-img">
                                    @foreach($post->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                                    @endforeach
                                </div>
                                <div class="ecno-text pr-2">
                                        <span class="date font-weight-bold">
                                            <i class="fas fa-calendar-alt ml-2 pt-2"></i>{{$post->created_at->format('Y/m/d')}}
                                        </span>
                                    <a href="{{route('front.post',$post->id)}}">
                                    <h6 class="pt-1">{{$post->title}}
                                    </h6></a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="title d-flex p-1">
                        <h4 class="pr-3 font-weight-bold">آراء ومختارات </h4>
                        <a href="{{route('front.category',8)}}">
                        <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
                        </a>
                    </div>
                    @if($postOpin_lg)
                    <div class="ecno-post shadow pb-2 rounded">
                        <div class="ecno-img">
                            @foreach($postOpin_lg->media as $media)
                              <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="{{$media->alt}}">
                            @endforeach
                        </div>
                        <div class="ecno-text px-2">
                            <a href="{{route('front.post',$postOpin_lg->id)}}">
                                <a href="{{route('front.post',$postOpin_lg->id)}}">
                                    <h6 class="pt-1 font-weight-bold">
                                        {{$postOpin_lg->title}}
                                    </h6>
                                </a>
                            </a>
                            <p class="mb-0 font-black">{!! controlText($postOpin_lg->content) !!}.
                            </p>
                            <span class="date-publish font-weight-bold">
                                    <i class="fas fa-calendar-alt ml-2"></i>{{$postOpin_lg->created_at->format('Y/m/d')}}
                                </span>
                        </div>
                    </div>
                    @endif
                    @if($postOpin)
                    <div class="row d-flex mt30">
                        @foreach($postOpin as $post)
                        <div class="col-md-6  ">
                            <div class="ecno-post ecno1 shadow pb-2 rounded">
                                <div class="ecn-img">
                                    @foreach($post->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                                    @endforeach
                                </div>
                                <div class="ecno-text pr-2">
                                        <span class="date font-weight-bold">
                                            <i class="fas fa-calendar-alt ml-2 pt-2"></i>{{$post->created_at->format('Y/m/d')}}
                                        </span>
                                    <a href="{{route('front.post',$post->id)}}">
                                    <h6 class="pt-1">{{$post->title}}
                                    </h6></a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <!--    end ecnomics news section -->
    <!--       start read news section-->
    <section class="read mar-60">
        <div class="container">
            <div class="read-title">
                <h4>الاكثر قراءة</h4>
            </div>

            <div class="row d-flex" style="width:99%;margin:0 auto">
                @if($moreRead)
                    @foreach($moreRead as $post)
                        <div class="col-md-4">
                            <div class="read-box">
                                <div class="read-img">
                                    @foreach($post->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                                    @endforeach
                                </div>
                                <div class="read-text px-2 py-1 pl-1">
                               <span class="type font-weight-bolder">
                                   {{$post->created_at->format('Y/m/d')}}
                               </span>
                                    <a href="{{route('front.post',$post->id)}}">
                                        <h5 class="text-white">{{$post->title}} </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!--       end read news section-->

            <!--       start travels news section-->
    <section class="travel mar-60 container">
        <div class="col-md-12">
            <div class="title d-flex p-1">
                <h4 class="pr-3 font-weight-bold">سياحة وسفر </h4>
                <a href="{{route('front.category',6)}}">

                    <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
            </div>

            <div class="row">
                <div class="col-md-6 col-12 col-md-6" >
                @if($newTrav)
                    <div class="travel-box  mb-30">
                            <div class="travel-img">
                                @foreach($newTrav->media as $media)
                                <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100 " style="height:420px !important"alt=""{{$media->alt}}>
                                @endforeach
                            </div>
                            <div class="travel-text pr-1 ">

                                <a href="{{route('front.post',$newTrav->id)}}">
                                    <h6 class="pt-1 text-white mb-0 font-weight-bold">{{$newTrav->title}}
                                    </h6>
                                </a>
                                <span class="dateN">
                                   <i class="fas fa-calendar-alt ml-2  pb-2"></i>{{$newTrav->created_at->format('Y/m/d')}}
                               </span>
                            </div>
                        </div>
                 @endif
                </div>

                <div class="col-12  col-md-3 " style="margin-right:-12px">
                        @if($preTrav)
                            @foreach($preTrav as $post)
                                <div class="travel-box  mb-30">
                                    <div class="travel-img">
                                        @foreach($post->media as $media)
                                        <img src="{{asset(''.$media->file_name)}}" class="img-fluid " alt="{{$media->alt}}">
                                        @endforeach
                                    </div>
                                    <div class="travel-text pr-1 ">

                                        <a href="{{route('front.post',$post->id)}}">
                                            <h6 class="pt-1 text-white mb-0 font-weight-bold">{{$post->title}}
                                            </h6>
                                        </a>
                                        <span class="dateN">
                                   <i class="fas fa-calendar-alt ml-2  pb-2"></i>{{$post->created_at->format('Y/m/d')}}
                               </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                @if($preTrav3 != '')
                    <div class="col-md-3 travel-text-box  w-100" style="margin-right:0px;">
                        <div class="travels-text-box shadow">
                              @foreach($preTrav as $post)
                                    <div class="travels-text mb-3">
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i>{{$post->created_at->format('Y/m/d')}}
                               </span>
                                        <a href="{{route('front.post',$post->id)}}">
                                            <h6 class="pt-1">{{$post->title}}
                                            </h6>
                                        </a>
                                    </div>
                                    <hr style="width:100%;margin-right:-8px">

                                @endforeach
                        </div>
                    </div>
                @endif

            </div>
            </div>
    </section>
    <!--       end travels news section-->


    <!-- start estate news section-->
    <section class="estate container  mar-60">
        <div class="col-md-12 ">
            <div class="title d-flex p-1">
                <h4 class="pr-3 font-weight-bold">عقارات </h4>
                <a href="route('front.post',5)">

                    <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
                    < </div>
        </div>
        <div class="row" style="margin-right:13px;width:99.8%">
             @if($newEstate)
                 @foreach($newEstate as $new)
                <div class="col-md-6">

                    <div class="estate-box mb-30 shadow d-flex">
                        <div class="estate-img">
                            @foreach($new->media as $media)
                            <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="{{$media->alt}}">
                                @endforeach
                        </div>
                        <div class="estate-text pr-2 mt-4">

                            <a href="{{route('front.post',$new->title)}}">
                                <h6>
                                    {{$new->title}}
                                </h6>
                            </a>
                            <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i>{{$new->created_at->format('Y/m/d')}}
                               </span>

                        </div>
                    </div>
                </div>

                @endforeach
                 @endif
             </div>
    </section>
    <!-- end estate new section -->
    <!--       start technicals news section-->
    <section class="technical mar-60 container">
        <div class="col-md-12">
            <div class="title d-flex p-1">
                <h4 class="pr-3 font-weight-bold text-white">تقنية </h4>
                <a href="{{route('front.category',1)}}">

                    <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
            </div>
            <div class="row">
                @if($newTech)
                    <div class="col-md-6">
                        <div class="tech-box-lg shadow pb-2 ">
                            <div class="tech-img">
                                @foreach($newTech->media as $media)
                                <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                                @endforeach
                            </div>
                            <div class="travel-text pr-2 pt-2">
                                <a href="{{route('front.post',$newTech->id)}}">
                                    <h6 class="pt-1 font-weight-bold">{{$newTech->title}} </h6>
                                </a>
                                <p class="pr-2 ">{!! controlText($newTech->content) !!}
                                </p>
                                <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2 "></i>{{$newTech->created_at->format('Y/m/d')}}
                               </span>

                            </div>
                        </div>

                    </div>
                @endif
                    <div class="col-md-6 " style="margin-bottom:0px !important">
                        <div class="row tech" id="tech">
                            @if($preTech)
                                @foreach($preTech as $post)
                                    <div class="col-md-6">
                                        <div class="tech-box tech-box-mo shadow pb-2 mb-30 ">
                                            <div class="tech-img">
                                                @foreach($post->media as $media)
                                                <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                                                @endforeach
                                            </div>
                                            <div class="travel-text pr-2">
                                       <span class="date font-weight-bold">
                                           <i class="fas fa-calendar-alt ml-2 pt-2"></i>{{$post->created_at->format('Y/m/d')}}
                                       </span>
                                                <a href="{{route('front.post',$post->id)}}">
                                                    <h6 class="pt-1">{{$post->title }}
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                            @endforeach
                            @endif
                        </div>
                    </div>
            </div>
        </div>

    </section>
    <!--       end technicals news section-->


    <!--       start cokktil news section-->
    <section class="cooktil mar-30 container">
        <div class="col-md-12">
            <div class="title d-flex p-1">
                <h4 class="pr-3 font-weight-bold">منوعات </h4>
                <a href="{{route('front.category',3)}}">

                    <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @if($preCook)
                        @foreach($preCook as $post)
                            <div class="estate-box mb-30 shadow d-flex">
                                <div class="estate-img">
                                    @foreach($post->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="{{$media->alt}}">
                                        @endforeach
                                </div>
                                <div class="estate-text pr-2 mt-4">

                                    <a href="{{route('front.post',$post->id)}}">
                                        <h6>
                                            {{$post->title}}
                                        </h6>
                                    </a>
                                    <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i>{{$post->created_at->format('Y/m/d')}}
                               </span>

                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if($newCook)
                    <div class="col-md-6">
                        <div class="tech-box-lg shadow pb-2 ">
                            <div class="tech-img">
                                @foreach($newCook->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" class="img-fluid w-100" alt="{{$media->alt}}">
                                @endforeach
                            </div>
                            <div class="travel-text pr-2 pt-2">
                                <a href="{{route('front.post',$newCook->id)}}">
                                    <h6 class="pt-1 font-weight-bold">{{$newCook->title}} </h6>
                                </a>
                                <p class="pr-2 ">{!! controlText($newCook->content) !!}
                                </p>
                                <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2 "></i>{{$newCook->created_at->format('Y/m/d')}}
                               </span>

                            </div>
                        </div>

                    </div>
                @endif
            </div>
            </div>
    </section>

    <!--       end cokktil news section-->

    <!--       start companies news section-->
    <section class="companies container mar-30">
        <div class="col-md-12">
            <div class="title p-1 mb-0">
                <h4 class="pr-3 font-weight-bold">شركات </h4>
                <a href="{{route('front.category',9)}}">

                    <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>

            </div>
            <div class="row container shadow rounded pt-4 pb-3" style="margin-right:0px;">
                @if($newComp)
                    @foreach($newComp as $new)
                        <div class="col-md-3">
                            <div class="comaney-box">
                                <div class="comp-img">
                                    @foreach($new->media as $media)
                                        <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="">
                                    @endforeach
                                </div>
                                <div class="comp-text">
                                    <a href="route('front.post')">
                                        <h6 class="p-2">
                                            {{$new->title}}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--       end companies news section-->

                <!--       start cars news section-->
    <section class="companies container  mar-60">
        <div class="col-md-12  ">
            <div class="title p-1 mb-0">
                <h4 class="pr-3 font-weight-bold">سيارات </h4>
                <a href="{{route('front.category',9)}}">

                    <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>

            </div>

            <div class="row container shadow rounded pt-4 pb-3" style="margin-right:0px;">
                @if($newCars)
                    @foreach($newCars as $new)
                        <div class="col-md-3">
                            <div class="comaney-box">
                                <div class="comp-img">
                                    @foreach($new->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" class="img-fluid" alt="">
                                    @endforeach
                                </div>
                                <div class="comp-text">
                                    <a href="route('front.post')">
                                        <h6 class="p-2">
                                            {{$new->title}}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--       end cars news section-->

@endsection
