<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('admin.includes.header.meta-header')
    @yield('css')
</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/admin/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

@include('admin.includes.header.main-header')

@include('admin.includes.sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">

    <h4>@yield('page-header')</h4>

    @yield('content')

    <!--=================================
 wrapper -->

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
@yield('script')
</body>

</html>
