<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.header.meta-header')
</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

@include('admin.includes.header.main-header')

@include('admin.includes.sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-4">الرئيسية</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-4 col-lg-8 col-md-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-list-alt highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-left text-right ml-3 text-center">
                                <p class="card-text text-dark">أقسام الموقع</p>
                                <h4>{{$category}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-8 col-md-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-newspaper-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-left text-right ml-3 text-center">
                                <p class="card-text text-dark">الاخبار</p>
                                <h4>{{$news}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-8 col-md-8 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-left text-right ml-3 text-center">
                                <p class="card-text text-dark">المستخدمين</p>
                                <h4>{{$user}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--=================================
footer -->

        @include('admin.includes.footer.main-footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('admin.includes.footer.script-footer')

</body>

</html>
