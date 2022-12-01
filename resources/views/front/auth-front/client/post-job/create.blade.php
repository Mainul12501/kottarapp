@extends('front.auth-front.auth-master')

@section('title')
    post jobs
@endsection

@section('body')
    <div class="row job_section">
        <div class="col-sm-12">
            <div class="jm_headings">
                <h5>Post a Gig</h5>
                <a class="btn btn-primary mypbtn" href="#">Company profile</a>
            </div>
            <div class="section-divider">
            </div>
            <form action="{{ isset($jobPost) ? route('client.job-post.update', $jobPost->id) : route('client.job-post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($jobPost))
                    @method('put')
                @endif
                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  for="jobCategory">Job Categroy</label>
                                <select name="skill_category_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Job Category" id="jobCategory">
                                    <option {{ !isset($jobPost) ? 'selected' : '' }} disabled>Select a Job Category</option>
                                    @foreach($skillCategories as $skillCategory)
                                        <option value="{{ $skillCategory->id }}" {{ isset($jobPost) && $jobPost->skill_category_id == $skillCategory->id ? 'selected' : '' }}>{{ $skillCategory->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('skill_category_id') ? $errors->first('skill_category_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  for="jobCategory">Job Sub Categroy</label>
                                <select name="skill_sub_category_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Job Category" id="jobSubCategory">
                                    <option {{ !isset($jobPost) ? 'selected' : '' }} disabled>Select a Job Category</option>
                                    @if(isset($jobPost))
                                        <option value="{{ $jobPost->skillSubCategory->sub_category_name }}"></option>
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->has('skill_sub_category_id') ? $errors->first('skill_sub_category_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Job Title</label>
                                <input type="text" name="project_title" value="{{ isset($jobPost) ? $jobPost->project_title : '' }}" class="form-control" placeholder="Write Job Title Here" />
                                <span class="text-danger">{{ $errors->has('project_title') ? $errors->first('project_title') : '' }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Required Skills</label>
                                <select name="required_skills[]" class="form-control select2" multiple="multiple" data-toggle="select2" data-placeholeder="Select required skills" id="">
                                    <option  disabled>Select required skills</option>
                                    {{--                                    <option value=""></option>--}}
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}"
                                                @if(isset($jobPost) && !empty($jobPost->skills))
                                                    @foreach($jobPost->skills as $selectedSkill)

                                                        @if($selectedSkill->id == $skill->id)
                                                            selected
                                                        @endif
                                                    @endforeach
                                                @endif>{{ $skill->skill_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('required_skills') ? $errors->first('required_skills') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Minimum Exiperience Level</label>
                                <select name="experience_level" class="form-control select2" required id="">
                                    <option value="0" {{ isset($jobPost) && $jobPost->experience_level == 0 ? 'selected' : '' }}>Excited</option>
                                    <option value="1" {{ isset($jobPost) && $jobPost->experience_level == 1 ? 'selected' : '' }}>Eager</option>
                                    <option value="2" {{ isset($jobPost) && $jobPost->experience_level == 2 ? 'selected' : '' }}>Experienced</option>
                                    <option value="3" {{ isset($jobPost) && $jobPost->experience_level == 3 ? 'selected' : '' }}>Expert</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('experience_level') ? $errors->first('experience_level') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label  >Project Description</label>
                                <textarea class="form-control" name="project_description" id="editor">{!! isset($jobPost) && $jobPost->project_description !!}</textarea>
                                <span class="text-danger">{{ $errors->has('project_description') ? $errors->first('project_description') : '' }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Project Payment Type</label>
                                <select name="budget_type" class="form-control select2" data-toggle="select2">
                                    <option value="0" {{ isset($jobPost) && $jobPost->experience_level == 0 ? 'selected' : '' }}>Fixed</option>
{{--                                    <option value="1" {{ isset($jobPost) && $jobPost->experience_level == 1 ? 'selected' : '' }}>Per Hour</option>--}}
                                </select>
                                <span class="text-danger">{{ $errors->has('budget_type') ? $errors->first('budget_type') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Budget</label>
                                <input type="number" name="budget" value="{{ isset($jobPost) && $jobPost->budget }}" class="form-control" />
                                <span class="text-danger">{{ $errors->has('budget') ? $errors->first('budget') : '' }}</span>
                            </div>
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group ">--}}
{{--                                <label  >Hourly Rate</label>--}}
{{--                                <input type="number" name="budget_per_hour" value="{{ isset($jobPost) && $jobPost->budget }}" class="form-control" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group ">--}}
{{--                                <label  >Total Hour</label>--}}
{{--                                <input type="number" name="total_hour" value="{{ isset($jobPost) && $jobPost->total_hour }}" class="form-control" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group ">--}}
{{--                                <label  >Freelancer Work Type</label>--}}
{{--                                <select name="freelancer_working_type" class="form-control select2" id="freelancerWorkType">--}}
{{--                                    <option value="0" {{ empty($jobPost) ? 'selected' : ($jobPost->freelancer_working_type == 0 ? 'selected' : '') }}>Remotely</option>--}}
{{--                                    <option value="1" {{ isset($jobPost) && $jobPost->freelancer_working_type == 1 ? 'selected' : '' }}>Remotely on country</option>--}}
{{--                                    <option value="2" {{ isset($jobPost) && $jobPost->freelancer_working_type == 2 ? 'selected' : '' }}>On Site</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 d-none" id="freelancerLocationCountry">--}}
{{--                            <div class="form-group">--}}
{{--                                <label >Freelancer Country</label>--}}
{{--                                <select name="preffered_freelancer_location_country" class="form-control select2" id="">--}}
{{--                                    <option value="UAE" {{ isset($jobPost) && $jobPost->freelancer_working_type == 1 ? 'selected' : '' }}>UAE</option>--}}
{{--                                    <option value="USA" {{ isset($jobPost) && $jobPost->freelancer_working_type == 1 ? 'selected' : '' }}>USA</option>--}}
{{--                                    <option value="Saudi Arabia" {{ isset($jobPost) && $jobPost->freelancer_working_type == 1 ? 'selected' : '' }}>Saudi Arabia</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 on-site-columns">--}}
{{--                            <div class="form-group">--}}
{{--                                <label >City</label>--}}
{{--                                <input type="text" class="form-control" name="job_location_city" value="{{ isset($jobPost) ? $jobPost->job_location_city : '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 on-site-columns">--}}
{{--                            <div class="form-group">--}}
{{--                                <label >Starting Date</label>--}}
{{--                                <input type="text" class="form-control" name="job_starting_date" value="{{ isset($jobPost) ? $jobPost->job_starting_date : '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 on-site-columns">--}}
{{--                            <div class="form-group">--}}
{{--                                <label >Ending Date</label>--}}
{{--                                <input type="text" class="form-control" name="job_ending_time" value="{{ isset($jobPost) ? $jobPost->job_ending_time : '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label >Project Duration</label>--}}
{{--                                <select name="estimate_project_duration_type" class="form-control select2" id="">--}}
{{--                                    <option value="1 Day or less" {{ isset($jobPost) && $jobPost->estimate_project_duration_type == '1 Day or less' ? 'selected' : '' }}>1 Day or less</option>--}}
{{--                                    <option value="2 days to 4 days" {{ isset($jobPost) && $jobPost->estimate_project_duration_type == '2 days to 4 days' ? 'selected' : '' }}>2 days to 4 days</option>--}}
{{--                                    <option value="Less than a week" {{ isset($jobPost) && $jobPost->estimate_project_duration_type == 'Less than a week' ? 'selected' : '' }}>Less than a week</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Want to ask a question?</label>
                                <select name="job_questions[]" multiple class="form-control select2" id="">
                                    @foreach($questions as $question)
                                        <option value="{{ $question->id }}"
                                                @if(isset($jobPost) && !empty($jobPost->jobPostQuestions))
                                                    @foreach($jobPost->jobPostQuestions as $selectedQuestion)
                                                        @if($selectedQuestion->id == $question->id)
                                                            selected
                                                        @endif
                                                    @endforeach
                                            @endif>{{ $question->question }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('job_questions') ? $errors->first('job_questions') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Upload Files</label>
                                <input type="file" name="files[]" multiple />
                                <span class="text-danger">{{ $errors->has('files') ? $errors->first('files') : '' }}</span>
                                @if(isset($jobPost) && !empty($jobPost->jobPostFiles))
                                    <ul class="nav">
                                        @foreach($jobPost->jobPostFiles as $file)
                                            <li><a href="{{ asset($file->file_url) }}" download="" class="nav-link">file-{{ $loop->iteration }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="big-form-group">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group ">--}}
{{--                                <label  >Job Type</label>--}}
{{--                                <input type="text" class="form-control" placeholder="" value="Full time ">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group ">--}}
{{--                                <label  >Salary</label>--}}
{{--                                <input type="text" class="form-control" placeholder="" value="$35k - $38k">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group ">--}}
{{--                                <label  >Required experience</label>--}}
{{--                                <input type="text" class="form-control" placeholder="" value="5 Years ">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}



                <div class="form-group row">
                    <div  class="col-md-9 ">
                        <button type="submit" class="btn btn-primary">{{ isset($jobPost) ? 'Update' : 'Create' }} Gig</button>
                    </div>
                </div>

            </form>
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
        $(document).on('change', '#jobCategory', function () {
            getSubCategoryByCategory();
        })

        function getSubCategoryByCategory() {
            var categoryId = $('#jobCategory').val();
            $.ajax({
                url: baseUrl+'get-skill-sub-categories/'+categoryId,
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    var option = '';
                    $.each(data, function (key, item) {
                        option += '<option value="'+item.id+'">'+item.sub_category_name+'</option>';
                    })
                    $('#jobSubCategory').empty().append(option);
                },
                error: function (error)
                {
                    toastr.error('Someting went wrong. please try again.');
                }
            })
        }
    </script>

    @if(isset($jobPost))
        <script>
            $(function () {
                setTimeout(function () {
                    getSubCategoryByCategory();
                }, 1000)
            })
        </script>
    @endif

    <script>
        CKEDITOR.replace( 'project_description' );
    </script>

    <script>
        $(document).on('change', '#freelancerWorkType', function () {
            var selectedWorkType = $(this).val();
            if(selectedWorkType == 1)
            {
                $('#freelancerLocationCountry').removeClass('d-none');
            } else {
                $('#freelancerLocationCountry').addClass('d-none');
            }
        })
    </script>
@endsection
