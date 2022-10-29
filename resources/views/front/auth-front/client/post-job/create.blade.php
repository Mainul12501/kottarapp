@extends('front.auth-front.auth-master')

@section('title')
    post jobs
@endsection

@section('body')
    <div class="row job_section">
        <div class="col-sm-12">
            <div class="jm_headings">
                <h5>Post a job</h5>
                <a class="btn btn-primary mypbtn" href="compnay-profile-single.html">Company profile</a>
            </div>
            <div class="section-divider">
            </div>
            <form action="" method="post" enctype="multipart/form-data">
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
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  for="jobCategory">Job Sub Categroy</label>
                                <select name="skill_sub_category_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Job Category" id="jobSubCategory">
                                    <option {{ !isset($jobPost) ? 'selected' : '' }} disabled>Select a Job Category</option>
                                    @if(isset($jobPost))
{{--                                        <option value="{{ $jobPost-> }}"></option>    --}}
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Job Title</label>
                                <input type="text" name="project_title" class="form-control" placeholder="Write Job Title Here" />
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
                                        <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label  >Project Description</label>
                                <textarea class="form-control" name="project_description" id="editor"></textarea>
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
                                    <option value="0">Fixed</option>
                                    <option value="1">Per Hour</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Budget</label>
                                <input type="number" name="budget" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Hourly Rate</label>
                                <input type="number" name="budget_per_hour" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Total Hour</label>
                                <input type="number" name="total_hour" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Location</label>
                                <input type="text" class="form-control" placeholder="" value="London, United Kingdom ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="big-form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Job Type</label>
                                <input type="text" class="form-control" placeholder="" value="Full time ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Salary</label>
                                <input type="text" class="form-control" placeholder="" value="$35k - $38k">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Required experience</label>
                                <input type="text" class="form-control" placeholder="" value="5 Years ">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <div  class="col-md-9 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).on('change', '#jobCategory', function () {
            var categoryId = $(this).val();
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
        })
    </script>

    <script>
        CKEDITOR.replace( 'project_description' );
    </script>
@endsection
