@extends('front.master')

@section('title')
    {{ $gig->job_post_slug }}
@endsection
@section('home-page-header-only')
    <div class="header_btm header_job_single">
        <div class="header_job_single_inner container">
            <div class="poster_company">
{{--                <img alt="brand logo" src="{{ asset('/') }}frontend/assets/images/demologo.png">--}}
                <img alt="brand logo" src="{{ asset($gig->user->userDetails->profile_image) }}">
            </div>
            <div class="poster_details">
                <h2>
                    {{ $gig->project_title }}
                    @php($currentApplyJob = $gig->applyJobs()->where('freelancer_user_id', auth()->id())->first())
                    @if(isset($currentApplyJob) && ($currentApplyJob->status == 0 || $currentApplyJob->status == 1))
                        <span class="varified bg-danger"><i class="fas fa-times bg-danger"></i>Rejected</span>
                    @endif
                </h2>
{{--                <h5>About the Employer</h5>--}}
                <ul>
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fas fa-landmark"></i>--}}
{{--                            Magna Aliqua--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="#">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ !empty($gig->user->userDetails->country) ? $gig->user->userDetails->country : 'UAE' }}
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="far fa-clock"></i>
                            {{ $gig->created_at->diffForHumans() }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="poster_action">
{{--                <a class="addtofav" title="add to favourite" href="#"><i class="far fa-heart"></i></a>--}}
{{--                <a class="btn btn-third" href="#">Apply Now</a>--}}
                <a id="applyGigBtn" class="btn btn-third @foreach($gig->applyJobs as $applyJob) @if($applyJob->freelancer_user_id == auth()->id()) disabled-btn d-none @endif @endforeach" href="#" >Apply Now</a>
                <form action="{{ route('freelancer.apply-gig', ['slug' => $gig->job_post_slug]) }}" method="post" style="display: none" id="applyGig">
                    @csrf
                </form>
                @if(isset($currentApplyJob) && $currentApplyJob->status == 2)
                    <a href="{{ route('freelancer.freelancer-submit-order', ['slug' => $gig->job_post_slug]) }}" class="btn btn-third">Submit Order</a>
                @endif
            </div>
        </div>

    </div>
@endsection

@section('body')
    <div class="single_job">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row ">
                        <div class="col-md-12 single_job_main">
                            <h2>Job Description</h2>
                            {!! $gig->project_description !!}
                        </div>
{{--                        <div class="section-divider"></div>--}}
{{--                        <div class="col-md-12 single_job_main">--}}
{{--                            <h2>Location</h2>--}}
{{--                            <iframe class="full-width-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3428.916507434128!2d76.78322631470263!3d30.748846681631466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed76ab9f14c1%3A0xd6362b158b8994aa!2sEiffel%20Tower%20Replica!5e0!3m2!1sen!2sin!4v1581932177674!5m2!1sen!2sin" height="450" style="border:0;" allowfullscreen=""></iframe>--}}
{{--                        </div>--}}

{{--                        <div class="section-divider"></div>--}}
{{--                        <div class="col-md-12 single_job_main">--}}
{{--                            <h2>Similar Jobs</h2>--}}
{{--                            <div class="row two_col featured_box_outer">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="featured_box ">--}}
{{--                                        <div class="fb_image">--}}
{{--                                            <img alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-01.webp">--}}
{{--                                        </div>--}}
{{--                                        <div class="fb_content">--}}
{{--                                            <h4>2000 Words English to German</h4>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <i class="fas fa-landmark"></i>--}}
{{--                                                        Magna Aliqua--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <i class="fas fa-map-marker-alt"></i>--}}
{{--                                                        New York--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <i class="far fa-clock"></i>--}}
{{--                                                        2 days ago--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="fb_action">--}}
{{--                                            <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>--}}
{{--                                            <a class="btn btn-third" href="job-single.html">Apply Now</a>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="featured_box ">--}}
{{--                                        <div class="fb_image">--}}
{{--                                            <img alt="brand logo" src="assets/images/c-logo-02.webp">--}}
{{--                                        </div>--}}
{{--                                        <div class="fb_content">--}}
{{--                                            <h4>Fix Python Selenium Code</h4>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <i class="fas fa-landmark"></i>--}}
{{--                                                        Magna Aliqua--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <i class="fas fa-map-marker-alt"></i>--}}
{{--                                                        New York--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <i class="far fa-clock"></i>--}}
{{--                                                        3 days ago--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="fb_action">--}}
{{--                                            <a title="add to favourite" href="#"><i class="fas fa-heart"></i></a>--}}
{{--                                            <a class="btn btn-third" href="job-single.html">Apply Now</a>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 text-center">--}}
{{--                                    <a class="btn btn-primary" href="browse-jobs.html">Browse All Jobs <i class="fas fa-long-arrow-alt-right"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="single-job-sidebar">
                        <div class="sjs_box">
                            <h3>Job Summary</h3>
                            <ul class="single-job-sidebar-features">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h6>Location</h6>
                                    <p>{{ $gig->user->userDetails->country }}</p>
                                </li>
{{--                                <li>--}}
{{--                                    <i class="fas fa-briefcase"></i>--}}
{{--                                    <h6>Job Type</h6>--}}
{{--                                    <p>Full Time</p>--}}
{{--                                </li>--}}
                                <li>
                                    <i class="fas fa-money-bill-alt"></i>
                                    <h6>Budget</h6>
                                    <p>${{ $gig->budget }}</p>
                                </li>
                                <li>
                                    <i class="far fa-clock"></i>
                                    <h6>Date Posted</h6>
                                    <p>{{ $gig->created_at->format('d M Y') }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="sjs_box">
                            <h3>Tags</h3>
                            <ul class="tags">
                                @foreach($gig->skills as $skill)
                                    <li>{{ $skill->skill_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
{{--                    <div class=" sjs_box_action">--}}
{{--                        <a class="btn btn-third" href="#">Contact Employer</a>--}}
{{--                        <p>- or -</p>--}}
{{--                        <a class="btn btn-primary" href="#">Apply Job</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            checkAndApplyDisableBtn();
        })
        $(document).on('click', '#applyGigBtn', function () {
            event.preventDefault();
            if ($(this).hasClass('disabled-btn'))
            {
                $('#applyGig').attr('action', '');
                $(this).addClass('d-none');
                toastr.error("You already applied for this gig.");
            } else {
                document.getElementById('applyGig').submit();
                // alert('sdf');
            }
        });
        function checkAndApplyDisableBtn() {
            if($('#applyGigBtn').hasClass('disabled-btn'))
            {
                $('#applyGig').attr('action', '');
                $('#applyGigBtn').addClass('d-none');
            }
        }
    </script>
@endsection
