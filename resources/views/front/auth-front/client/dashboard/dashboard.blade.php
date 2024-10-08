@extends('front.auth-front.auth-master')

@section('title')
    client dashboard
@endsection

@section('profile-progress-bar')
    @if(isset($profilePercent) && $profilePercent < 100)
        <section class="pt-5 m-t-50 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div style="height: 100px; width: 100px">
                                                <img style="border-radius: 50%" src="{{ asset(auth()->user()->userDetails->profile_image) }}" alt="" class="card-img" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <h4>{{ isset(auth()->user()->name) ? auth()->user()->name : 'User' }}</h4>
                                            <p>{{ auth()->user()->freelancer_job_title }}</p>
                                            <div class="progress-bar">
                                                <div class="progress"
                                                     data-percent="{{ $profilePercent }}"
                                                     data-color="green">
                                                    <span>{{ $profilePercent }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p style="text-align: justify" class="mt-4 text-warning">Your profile is {{ $profilePercent }}% complete. Please update your profile and submit for review</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('body')
    <div class="row job_section">
        <div class="col-sm-12">
            <div class="jm_headings">
                <h4>Hello, Donec Software !</h4>
            </div>
            <div class="dashboard_boxes row">
                <div class="col-md-4">
                    <div class="dashboard_box ">
                        <i class="fas fa-paper-plane"></i>
                        <h2><span>18</span>Jobs Posted</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard_box ">
                        <i class="fas fa-user-check"></i>
                        <h2><span>68</span>job Seekers Applied </h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard_box ">
                        <i class="fas fa-comments"></i>
                        <h2><span>28</span>Reviews </h2>
                    </div>
                </div>
            </div>
            <div class="section-divider">
            </div>

            <h4> Your Profile Views</h4>
            <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
            <div class="section-divider">
            </div>
            <div class="col-md-12">
                <div class=" job_seekernotifi ondahsboard">
                    <h4>Inbox</h4>
                    <ul>
                        <li><img alt=""  src="{{ asset('/') }}frontend/assets/images/profile-1.png"><a href="#"> John Stone applying this job  contact  </a> </li>
                        <li><img alt=""  src="{{ asset('/') }}frontend/assets/images/profile-2.png"><a href="#">Nguta Ithya  applying this job  contact  </a> </li>
                        <li><img alt=""  src="{{ asset('/') }}frontend/assets/images/profile-4.png"><a href="#">Salome Simoes applying this job</a> </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/progress-bar.css" />
    <style>
        .progress-bar {
            width: 100%;
            /* margin: 1.5rem auto; */
             margin-top: 0px;
            background-color: #ddd;
            border-radius: 6px;
            height: 24px;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('/') }}frontend/assets/www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="{{ asset('/') }}frontend/assets/www.amcharts.com/lib/3/serial.js"></script>
    <script src="{{ asset('/') }}frontend/assets/www.amcharts.com/lib/3/themes/patterns.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/amchart-custom.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/progress-bar.js"></script>
    <script>
        $(function () {
            $(".progress-bar").ProgressBar();
        })
    </script>
@endsection
