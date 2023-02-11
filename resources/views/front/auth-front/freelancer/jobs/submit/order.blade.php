@extends('front.master')

@section('title')
    {{ $gig->job_post_slug }}
@endsection

@section('body')
    <div class="single_job mt-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row card card-body">
                        <div class="col-md-12 single_job_main">
                            <div>
                                <h1>{{ $gig->project_title }}</h1>
                            </div>
                            <div class="mt-4 text-justify">
                                {!! $gig->project_description !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 card card-body">
                        <div class="col-md-12">
                            <h2>Submit Project</h2>
                            <div>
                                <form action="{{ route('freelancer.freelancer-submit-gig-files') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="gig_id" value="{{ $gig->id }}" />
                                    <input type="hidden" name="apply_job_id" value="{{ $appliedJob->id }}" />
                                    <div class="mb-3">
                                        <label for="message">Message</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="">
                                        <label for="" class="">File Upload</label>
                                        <div class="">
                                            <input type="file" name="files[]" id="fileUpload" multiple />
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="" class=""></label>
                                        <div class="">
                                            <input type="submit" class="btn btn-success" />
                                        </div>
                                    </div>
                                </form>
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
                                    <p>{{ $appliedJob->updated_at->format('d-M-Y') }}</p>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/fancyFileUploader/fancy_fileupload.css" />
@endsection

@section('script')
    <script src="{{ asset('/') }}frontend/assets/js/fancyFileUploader/jquery.ui.widget.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/fancyFileUploader/jquery.fileupload.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/fancyFileUploader/jquery.iframe-transport.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/fancyFileUploader/jquery.fancy-fileupload.js"></script>
    <script>
        $('#fileUpload').FancyFileUpload({
            params: {
                action: 'fileUploader',
            },
            maxfilesize: -1
        });
    </script>
@endsection
