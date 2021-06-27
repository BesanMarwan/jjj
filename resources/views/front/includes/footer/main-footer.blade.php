</main>
<footer class="mar-60">
        <div class="container-fluid   bg-foot pb-3 pt-2">
            <div class="container animate-box">
                <div class="row ">

                    <div class="col-12 col-md-4 pr-5">
                        <a href="{{route('front.home')}}">
                        <div class="logo ">
                            <img src="{{asset(''.getSettingsOf('site_logo'))}}" alt="" class="img-fluid ">
                            <p>{{getSettingsOf('site_description')}}</p>

                        </div>
                        </a>

                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="footer_main_title py-3 text-right color-secon" style="padding-right: 60px;"> أقسام الموقع</div>
                        <ul class=" row pr-5">
                            <nav>
                                <ul class="useful-links row list-unstyled">
                                    <li class="col-6 col-md-6  mb-1"><a href="{{route('front.home')}}"><i class="fa fa-angle-left"></i>&nbsp;&nbsp; الرئيسة</a></li>
                                    @foreach($categories as $category)
                                    <li class="col-6 col-md-6  mb-1"><a href="{{route('front.category',$category->id)}}"><i class="fa fa-angle-left"></i>&nbsp;&nbsp; {{$category->name}}  </a></li>
                                    @endforeach

                                </ul>
                            </nav>
                        </ul>
                    </div>


                    <div class="col-12 col-md-4 position_footer_relative">

                        <div class="footer_main_title mt-3   mb-2 color-secon mr-5 " style="margin-top: 10px"> روابط مفيدة </div>
                        <ul class="nav mb-3 mt-1 pr-4">
                            <li class="col-12 col-md-12  mb-1"><a href=""><i class="fa fa-angle-left"></i>&nbsp;&nbsp; من نحن</a></li>
                            <li class="col-12 col-md-12  mb-1"><a href=""><i class="fa fa-angle-left"></i>&nbsp;&nbsp; اتصل بنا </a></li>
                            <li class="col-12  col-md-12 mb-1 "><a href=""><i class="fa fa-angle-left"></i>&nbsp;&nbsp; سياسة الخصوصية </a></li>

                        </ul>
                        <div class="social social-f d-flex  mr-5">
                            <a href="{{getSettingsOf('youtube_id')}}" target="_blank" class="ease-all"><i class="fab fa-youtube"></i></a>
                            <a href="{{getSettingsOf('facebook_id')}}"target="_blank" class="ease-all"><i class="fab fa-facebook "></i></a>
                            <a href="{{getSettingsOf('twitter_id')}}" target="_blank" class="ease-all"> <i class="fab fa-twitter "></i></a>
                            <a href="{{getSettingsOf('whatsapp_id')}}"target="_blank" class="ease-all"><i class="fab fa-whatsapp "></i></a>
                        </div>


                    </div>
                </div>
            </div>
            <hr class="mt-3">
            <div class="container-fluid ">
                <div class="container">
                    <div class="container block-p mt-3 copy-right d-flex justify-content-between text-white">
                        <p class="copy-right "> جميع الحقوق محفوظة لموقع One Time News &copy; 2021</p>
                        <p class=""><a href="http://www.high-five.co" target="_blank"> برمجة وتطوير <img src="{{asset('assets/front/images/high5.png')}}" style="width:22px" alt="high-five.co"> هاي فايف</a></p>
                    </div>

                </div>
            </div>

        </div>
    </footer>
