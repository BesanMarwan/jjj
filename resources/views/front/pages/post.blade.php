@extends('front.layouts.site')

@section('content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v10.0&appId=533194210965005&autoLogAppEvents=1" nonce="GD8hEuOo"></script>

    <main>


        <div class="container">
            <div class="bredcrumb mar-60">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$post->category->name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="row ">
                <div class="col-md-8">
                    <div class="post-box-lg mt-30">
                        <h3 class="mb-30">{{$post->title}}</h3>
                          @if($post->media)
                              @foreach($post->media as $media)
                        <div class="img-post">
                            <img src="{{asset(''.$media->file_name)}}" class="" width="705px" height="393px" alt="">
                        </div>
                         <p class="top-picture p-2"> {{$media->alt}} </p>
                            @endforeach
                          @endif
                        <div class="text-post  ">


                            <div class="share d-flex justify-content-between">
                                <span class="date-publish pr-1 mt-1">تاريخ النشر:{{ $post->created_at->format('Y/m/d') }}</span>

                                <div class=" social-sh justify-content-end share-social-info pl-2">

                                    <span>مشاركة عبر :</span>
                                    <a href="#"><i class="fa fa-facebook" style="padding-right:14px"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="clear-fix"></div>
                            <p class="px-2 py-3 font-size-16">
                                {!! $post->content!!}
                            </p>

                        </div>

{{--                        <hr>--}}

{{--                        <div class="row container">--}}

{{--                            <div class="author-box d-flex mt-30 mb-30 mr-20  ">--}}
{{--                                <div class=" col-md-3 auther-img">--}}
{{--                                    <img src="" height="120px " width="120px" alt="auther picture profile" class="img-fluid ">--}}

{{--                                </div>--}}

{{--                                <div class="post-author-desc pl-4">--}}
{{--                                    <a href="#" class="author-name">{{$post->user->name}}</a>--}}
{{--                                    <p></p>--}}
{{--                                    <div class="post-author-social-info">--}}
{{--                                        <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-pinterest"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-linkedin"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-dribbble"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                    <!-- Contenedor Principal -->
                    <div class="comments-container mt-30 mb-30 ">
                        <h4>التعليقات </h4>
                        <div class="fb-comments" data-href="http://localhost/turk-ecno/post.php" data-width="" data-numposts=""></div>

                    </div>
                </div>
                @include('front.includes.sidebar')


            </div>

        </div>
    </main>

    @endsection
