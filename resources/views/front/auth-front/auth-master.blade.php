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

{{--    temp css--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        .font-roboto {
            font-family: 'Roboto', sans-serif;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
{{--    temp css ends--}}

    <!-- CSS
    ================================================== -->
    @include('front.includes.assets.css')
    <style>
        .btn {
            padding: 0.375rem 0.75rem;
        }
    </style>

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

<!-- profile progress bar section -->
    @yield('profile-progress-bar')
<!-- end profile progress bar section -->

<!-- Main
================================================== -->
<main class="{{ isset($profilePercent) && $profilePercent < 100 ? '' : 'mt-5' }}">
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
