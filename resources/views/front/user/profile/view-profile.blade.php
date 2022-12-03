@extends('front.master')

@section('title')
    {{ $user->name }}
@endsection

@section('home-page-header-only')
    @if($user->user_role_type == 1)
        <div class="header_btm header_job_single">
            <div class="header_job_single_inner container">
                <div class="poster_staff">
                    <img alt="brand logo" src="{{ isset($user->userDetails->profile_image) ? asset($user->userDetails->profile_image) : asset('frontend/assets/images/logo/Logo-orange.svg') }}">
                </div>
                <div class="poster_details">
                    <h2>{{ $user->name }} @if($user->account_status == 1) <span class="varified"><i class="fas fa-check"></i>Verified</span> @endif</h2>
                    <h5>{{ isset($user->userDetails->freelancer_job_title) ? $user->userDetails->freelancer_job_title : 'Student Account Title' }}</h5>
{{--                    {{ $user->userDetails->freelancer_job_title }}--}}
                    <div class="staff_rating">
                        <span>4.5</span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    @elseif($user->user_role_type == 2)
        <div class="header_btm header_job_single">
            <div class="header_job_single_inner container">
                <div class="poster_company">
                    <img alt="brand logo" src="{{ isset($user->userDetails->profile_image) ? asset($user->userDetails->profile_image) : asset('frontend/assets/images/logo/Logo-orange.svg') }}">
                </div>
                <div class="poster_details">
                    <h2>{{ $user->name }} @if($user->account_status == 1) <span class="varified"><i class="fas fa-check"></i>Verified</span> @endif</h2>
                    <h5>About company</h5>
                    <ul>
                        <li>
                            <div class="staff_rating">
                                <span>4.9</span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{--                            New York, London &amp; 15 more--}}
                            {{ $user->userDetails->country }}
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            Since {{ $user->userDetails->company_establish_year }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('body')
    @if($user->user_role_type == 1)
        <div class="single_job">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row ">
                            <div class="col-md-12 single_job_main">
                                <h2>Student Description</h2>
                                {!! isset($user->userDetails->description) ? $user->userDetails->description : 'No description added.' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="single-job-sidebar">
                            <div class="sjs_box">
                                <h3>Student Summary</h3>
                                <ul class="single-job-sidebar-features">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h6>Location</h6>
                                        <p>{{ $user->userDetails->emirate_state_name }}, {{ $user->userDetails->country }}</p>
                                    </li>
                                    {{--                                    <li>--}}
                                    {{--                                        <i class="fas fa-briefcase"></i>--}}
                                    {{--                                        <h6>Job Type</h6>--}}
                                    {{--                                        <p>Full Time</p>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <i class="fas fa-money-bill-alt"></i>--}}
                                    {{--                                        <h6>Expected Salary</h6>--}}
                                    {{--                                        <p>$35k - $38k</p>--}}
                                    {{--                                    </li>--}}
                                    <li>
                                        <i class="far fa-clock"></i>
                                        <h6>Registration date</h6>
                                        <p>{{ $user->created_at->format('d-m-Y') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="sjs_box">
                                <h3>Skills</h3>
                                <ul class="tags">
                                    @forelse($user->skills as $skill)
                                        <li>{{ $skill->skill_name }}</li>
                                    @empty
                                        <li>No skill has been added yet.</li>
                                    @endforelse
                                </ul>
                            </div>


                        </div>
                        {{--                        <div class="sjs_box sjs_box_action">--}}
                        {{--                            <h3>Attachments</h3>--}}
                        {{--                            <a target="_blank" class="download-cv" href="#"><i class="fas fa-file-download"></i><span>Curriculum Vitae</span></a>--}}
                        {{--                            <a class="btn btn-primary" href="#">Hire me</a>--}}
                        {{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    @elseif($user->user_role_type == 2)
        <div class="single_job">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row ">
                            <div class="col-md-12 single_job_main">
                                <h2>About Company</h2>
                                {!! isset($user->userDetails->description) ? $user->userDetails->description : 'No description added.' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
