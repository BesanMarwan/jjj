<!doctype html>
<html lang="en">

<head>
    @include('front.includes.header.meta-header')
    <title>@yield('title')</title>
</head>
@include('front.includes.header.main-header')

<main>
    @yield('content')
</main>
@include('front.includes.footer.main-footer')
@include('front.includes.footer.script-footer')

