@extends('front.layouts.site')
@section('title','اتصل بنا')

@section('content')
    <link href="{{asset('assets/front/css/contact-style.css')}}" rel="stylesheet">

    <main>


        <div class="container">
            <div class="bredcrumb mar-60 ">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">اتصل بنا</li>
                    </ol>
                </nav>
            </div>
            <form method="get" action="{{route('front.contact')}}">

                <ul>
                    <li>
                        <label for="name"><span>لاسم <span class="required-star">*</span></span></label>
                        <input type="text" id="name" name="user_name">
                    </li>
                    <li>
                        <label for="mail"><span>البريد الالكتروني <span class="required-star">*</span></span></label>
                        <input type="email" id="mail" name="user_email">
                    </li>
                    <li>
                        <label for="name"><span>الموضوع <span class="required-star">*</span></span></label>
                        <input type="text" id="subject" name="subject">
                    </li>

                    <li>

                        <label for="msg"><span>نص الرسالة</span></label>
                        <textarea rows="4" cols="50" name="message"></textarea>
                    </li>
                    <li>
                        <input type="submit" name="submit" value="ارسل">
                    </li>
                </ul>
            </form>
        </div </div>
        </div>
    </main>

@endsection
