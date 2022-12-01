@extends('front.auth-front.auth-master')

@section('title')
    Browse Gigs
@endsection

@section('body')
    <div class="jm_headings">
        <h5 class="text-center">Browse Gigs</h5>
    </div>

    <div class="row full_width featured_box_outer">
        @foreach($gigs as $gig)
            <a href="{{ route('freelancer.gig-details',['slug' => $gig->job_post_slug]) }}">
                <div class="col-sm-12">
                    <div class="featured_box ">
                        <div class="fb_image">
                            <img alt="brand logo" src="{{ asset($gig->user->userDetails->profile_image) }}">
                        </div>
                        <div class="fb_content">
                            <h4>{{ $gig->project_title }}</h4>
                            <ul>
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fas fa-landmark"></i>--}}
{{--                                        Magna Aliqua--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li>
                                    <div href="javascript:void(0)">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $gig->user->userDetails->country }}
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="far fa-clock"></i>
                                        {{ $gig->created_at->diffForHumans() }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action">
                            {{--                        <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>--}}
                            {{--                        <a class="btn btn-primary" href="#">Apply Now</a>--}}
                            <span class="font-weight-bold f-s-30">${{ $gig->budget }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
