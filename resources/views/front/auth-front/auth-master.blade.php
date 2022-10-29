<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>KnotterApp - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/') }}frontend/assets/images/fav.png" type="image/gif" sizes="64x64">

    <!-- CSS
    ================================================== -->
    @include('front.includes.assets.css')

    <script>
        let baseUrl = {!! json_encode(url('/')) !!} + '/';
    </script>
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
    <div class="header_main">
        @include('front.includes.menu')

    </div>
</header>


<!-- End Header 02
================================================== -->



<!-- Main
================================================== -->
<main class="mt-5">
    <div class="job_container">
        <div class="container">
            <div class="row job_main">
                @include('front.auth-front.includes.side-menu')
                <div class="job_main_right">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
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
