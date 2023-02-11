@extends('front.master')

@section('title')
    {{ $gig->job_post_slug }}
@endsection

@section('body')
    <div class="single_job mt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row ">
                        <div class="col-md-12 single_job_main">
                            <div>
                                <h1>{{ $gig->project_title }}</h1>
                            </div>
                            <div class="mt-4 text-justify">
                                {!! $gig->project_description !!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="single-job-sidebar">
                        <div class="sjs_box">
                            <h3>Gig Summary</h3>
                            <ul class="single-job-sidebar-features">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h6>Gig Code</h6>
                                    <p>{{ $gig->job_unique_code }}</p>
                                </li>
                                <li>
                                    <i class="fas fa-money-bill-alt"></i>
                                    <h6>Budget</h6>
                                    <p>${{ $gig->budget }}</p>
                                </li>
                                <li>
                                    <i class="far fa-clock"></i>
                                    <h6>Starting Date</h6>
                                    <p>{{ $gig->applyJobs()->where('freelancer_user_id', auth()->id())->first()->updated_at->format('d-M-Y') }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="sjs_box">
                            <h3>Required Skills</h3>
                            <ul class="tags">
                                @foreach($gig->skills as $skill)
                                    <li>{{ $skill->skill_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
