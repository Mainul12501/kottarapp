@extends('front.auth-front.auth-master')

@section('title')
    Gig Details
@endsection

@section('body')
    <div class="row job_section">
        <div class="col-sm-12">
            <div class="jm_headings">
                <h5>Show Gig</h5>
            </div>
            <div class="section-divider">
            </div>

            <div class="big_form_group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  for="jobCategory">Gig Categroy</label>
                            <div>
                                <p>{{ $gig->skillCategory->category_name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  for="jobCategory">Gig Sub Categroy</label>
                            <div>
                                <p>{{ $gig->skillSubCategory->sub_category_name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Job Title</label>
                            <div>
                                <p>{{ $gig->project_title }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Required Skills</label>
                            <div>
                                <p>
                                    @php
                                        $skills = '';
                                        foreach($gig->skills as $skill)
                                        {
                                            $skills .= $skill->skill_name.', ';
                                        }
                                        echo rtrim($skills,', ');
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Minimum Exiperience Level</label>
                            <div>
                                <p>
                                    {{ $gig->experience_level == 0 ? 'Excited' : '' }}
                                    {{ $gig->experience_level == 1 ? 'Eager' : '' }}
                                    {{ $gig->experience_level == 2 ? 'Experienced' : '' }}
                                    {{ $gig->experience_level == 3 ? 'Expert' : '' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group ">
                            <label  >Project Description</label>
                            <div>
                                {!! $gig->project_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="big_form_group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Project Payment Type</label>
                            <div>
                                <p>Fixed</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Budget</label>
                            <div>
                                <p>{{ $gig->budget }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Want to ask a question?</label>
                            <div>
                                @forelse($gig->jobPostQuestions as $question)
                                    <p>{{ $question->question }}</p>
                                @empty
                                    <p>No questions added.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Upload Files</label>
                            <div>
                                <ul class="nav">
                                    @foreach($gig->jobPostFiles as $file)
                                        <li><a href="{{ asset($file->file_url) }}" download="" class="nav-link">file-{{ $loop->iteration }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="big_form_group">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Offers from Students ({{ count($gig->applyJobs) }} Offers)</h3>
                            </div>
                            <div class="card-body">
                                @forelse($gig->applyJobs as $appliedJob)
                                    <div class="row">
                                        <div class="col-md-12 big-div" data-id="{{ $appliedJob->id }}" id="big-div{{ $appliedJob->id }}">
                                            <div style="height: 100px" class="float-left">
                                                <img src="{{ isset($appliedJob->freelancerDetails->userDetails->profile_image) ? asset($appliedJob->freelancerDetails->userDetails->profile_image) : asset('frontend/assets/images/default-user.png') }}" alt="" style="border-radius: 50%; height: 50px; width: 50px">
                                            </div>
                                            <h4 class="float-left ml-4">{{ isset($appliedJob->freelancerDetails->name) ? $appliedJob->freelancerDetails->name : 'Unknown Student' }}</h4>
                                            <a href="javascript:void(0)" class="btn btn-light float-right arrow-right-icon">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-3 small-div d-none" id="small-div{{ $appliedJob->id }}" data-id="{{ $appliedJob->id }}">
                                            <div class="float-right">
                                                <a href="{{ route('view-profile', ['id' => $appliedJob->freelancerDetails->id]) }}" class="btn btn-primary btn-sm f-s-10 px-2 py-1 " title="View Student Profile">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                                <form action="" method="post" style="display: inline-block" title="Hire This Student">
                                                    @csrf
                                                    <input type="hidden" name="job_id" value="{{ $gig->id }}">
                                                    <input type="hidden" name="freelancer_id" value="{{ $appliedJob->freelancerDetails->id }}">
                                                    <button type="submit" class="btn btn-success btn-sm f-s-10 px-2 py-1">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('freelancer.decline-gig-offer', ['id' => $appliedJob->id]) }}" title="Reject Offer" class="btn btn-danger btn-sm f-s-10 px-2 py-1">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td>None applied yet.</td>
                                    </tr>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('style')
    <style>
        .on-site-columns {
            display: none;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).on('click', '.arrow-right-icon', function () {
            var dataId = $(this).parent().attr('data-id');
            var bigDiv = $('#big-div'+dataId);
            var smallDiv = $('#small-div'+dataId);

            bigDiv.removeClass('col-md-12');
            bigDiv.addClass('col-md-9');
            smallDiv.removeClass('d-none');

            $(this).children().removeClass('fa-arrow-left').addClass('fa-arrow-right');
        })
    </script>
@endsection
