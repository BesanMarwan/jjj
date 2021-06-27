@extends('front.layouts.site')
@section('title',$category->name)

@section('content')
<div class="container">
        <div class="bredcrumb mar-60 ">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                </ol>
            </nav>
        </div>
        <div class="row d-flex ">
            @if($category->posts)
          @foreach($category->posts as $post)
            <div class="col-md-4">
                <a href="{{route('front.post',$post->id)}}">
                    <div class="new-box shadow rounded pb-2 mt-30 ">
                        <div class="img-box">
                            <div class="img-box">
                                <div class="img-new">
                                    @if($post->media)
                                        @foreach($post->media as $media)
                                    <img src="{{asset(''.$media->file_name)}}" alt="News picture" class="w-100"  title="picture news">
                                     @endforeach
                                      @endif
                                </div>
                                <div class="img-text pr-2">
                                    <span class="date">
                                        <i class="fas fa-calendar-alt ml-2"></i>{{$post->created_at->format('Y/m/d')}}
                                    </span>
                                    <a href="{{route('front.post',$post->id)}}">
                                        <h6 class="">
                                         {{$post->title}}

                                        </h6>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
                @endif
        </div>
    </div>

@endsection
