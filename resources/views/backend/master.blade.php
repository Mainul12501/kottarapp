<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Knotter - @yield('title')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ isset($backendSetting->site_favicon) ? asset($backendSetting->site_favicon) : asset('/').'backend/assets/images/favicon.ico' }}">

   @include('backend.includes.assets.css')


</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.includes.menu')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->

            @include('backend.includes.header')
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                @yield('body-title-section')
                <!-- end page title -->

                @yield('body')

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('backend.includes.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>

<!-- END wrapper -->

<!-- Right Sidebar -->
@include('backend.includes.right-bar-color-settings')
<!-- /End-bar -->
<div id="fakeloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner">
            <div class="loader"></div>
        </div>
    </div>
</div>
@include('backend.includes.assets.js')

</body>

</html>
