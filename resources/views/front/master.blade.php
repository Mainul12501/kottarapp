<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Knotter - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('/') }}frontend/assets/images/fav.png" type="image/gif" sizes="64x64">

    <!-- CSS
    ================================================== -->
    @include('front.includes.assets.css')
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 {{ url()->current() !== url('/') ? 'header_inner' : '' }}">
    <div class="header_main {{ request()->segment(1) == 'freelancer' && request()->segment(2) == 'gig-details' ? 'header_job_single_main' : '' }} ">
        @include('front.includes.menu')
        @yield('home-page-header-only')
    </div>
</header>


<!-- End Header 02
================================================== -->



<!-- Main
================================================== -->
<main>
    @yield('body')
</main>


<!-- Footer Container
================================================== -->
@include('front.includes.footer')


<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
@include('front.includes.assets.js')


</body>
</html>
