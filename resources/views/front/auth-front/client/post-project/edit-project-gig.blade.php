<div class="big_form_group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group ">
                <label  for="jobCategory">Project Name</label>
                <select name="project_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Project">
                    <option selected disabled>Select a Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $selectedProject->id ? 'selected' : '' }}>{{ $project->title }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->has('project_id') ? $errors->first('project_id') : '' }}</span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group ">
                <label  for="jobCategory">Job Categroy</label>
                <select name="skill_category_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Job Category" id="jobCategory">
                    <option disabled>Select a Job Category</option>
                    @foreach($skillCategories as $skillCategory)
                        <option value="{{ $skillCategory->id }}" {{ $skillCategory->id == $jobPost->skill_category_id ? 'selected' : '' }}>{{ $skillCategory->category_name }}</option>
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
                        <option value="{{ $jobPost->skillSubCategory->id }}">{{ $jobPost->skillSubCategory->sub_category_name }}</option>
                    @endif
                </select>
                <span class="text-danger">{{ $errors->has('skill_sub_category_id') ? $errors->first('skill_sub_category_id') : '' }}</span>
            </div>
        </div>

        <div class="col-md-6">
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
{{--                <textarea class="form-control" name="project_description" id="projectDescriptionEdit">{{ html_entity_decode(strip_tags($jobPost->project_description)) }}</textarea>--}}
                <textarea class="form-control" name="project_description" id="projectDescriptionEdit">{!! $jobPost->project_description !!}</textarea>
                <span class="text-danger">{{ $errors->has('project_description') ? $errors->first('project_description') : '' }}</span>
            </div>
        </div>
    </div>
</div>
{{--<script>--}}
{{--    document.getElementById('xx').innerHTML = {!! $jobPost->project_description !!};--}}
{{--</script>--}}
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
                <input type="number" name="budget" value="{{ isset($jobPost) && isset($jobPost->budget) ? $jobPost->budget : '' }}" class="form-control" />
                <span class="text-danger">{{ $errors->has('budget') ? $errors->first('budget') : '' }}</span>
            </div>
        </div>

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

