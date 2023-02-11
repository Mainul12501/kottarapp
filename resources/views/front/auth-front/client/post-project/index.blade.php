@extends('front.auth-front.auth-master')

@section('title')
    Manage Projects
@endsection

@section('body')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">Manage Projects</h3>
                <a href="#" class="btn btn-success float-right mt-2" title="Create Project" data-toggle="modal" data-target="#createProjectModal">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    @forelse($projects as $project)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <div class="float-left">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $project->id }}" aria-expanded="true" aria-controls="collapseOne">
                                            {{ $project->title }}
                                        </button>
                                    </h2>
                                </div>
                                <div class="float-right">
                                    <a href="" class="btn btn-success btn-sm" title="Add new gig" data-toggle="modal" data-target="#createJobModal"><i class="fas fa-plus-circle"></i></a>
                                    <a href="" class="btn btn-primary btn-sm" title="Show Gigs" data-toggle="collapse" data-target="#collapse{{ $project->id }}"><i class="fas fa-arrow-down"></i></a>
                                    <a href="" class="btn btn-secondary btn-sm edit-project" data-id="{{ $project->id }}" title="Edit Project"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('client.projects.destroy', $project->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this project? All associate GIGS will be deleted too. Once deleted this can not be undone.')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete this project?">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div id="collapse{{ $project->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-cont ">
                                        @if($project->jobPosts->isEmpty())
                                            <p>No gig has been created under this project yet.</p>
                                        @else
                                            <table class="table display" id="datatable-buttons">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Code</th>
                                                    <th>Exp. Lv</th>
                                                    <th>Total Budget</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($project->jobPosts as $jobPost)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $jobPost->project_title }}</td>
                                                        <td>{{ $jobPost->job_unique_code }}</td>
                                                        <td>
                                                            {{ $jobPost->experience_level == 0 ? 'Excited' : '' }}
                                                            {{ $jobPost->experience_level == 1 ? 'Eager' : '' }}
                                                            {{ $jobPost->experience_level == 2 ? 'Experienced' : '' }}
                                                            {{ $jobPost->experience_level == 3 ? 'Expert' : '' }}
                                                        </td>
                                                        <td>${{ $jobPost->budget }}</td>
                                                        <td>{!! substr_replace($jobPost->project_description, '', 50) !!}</td>
                                                        <td>
                                                            {{ $jobPost->status == 0 ? 'Pending' : '' }}
                                                            {{ $jobPost->status == 1 ? 'Approved' : '' }}
                                                            {{ $jobPost->status == 2 ? 'Completed' : '' }}
                                                            {{ $jobPost->status == 3 ? 'Rejected' : '' }}
                                                        </td>
                                                        <td>
                                                            <ul class="job-dashboard-actions" >
                                                                <li>
                                                                    <a href="{{ route('client.job-post.show', $jobPost->id) }}" class="job-dashboard-action-mark_filled">
                                                                        {{--                                                Edit--}}
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('client.job-post.edit', $jobPost->id) }}" data-gig-id="{{ $jobPost->id }}" data-project-id="{{ $project->id }}" class="job-dashboard-action-edit">
                                                                        {{--                                                Edit--}}
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                </li>
                                                                {{--                                        <li>--}}
                                                                {{--                                            <a href="#" class="job-dashboard-action-mark_filled text-danger">--}}
                                                                {{--                                                Deactivate--}}
                                                                {{--                                                <i class="fas fa-arrow-circle-down"></i>--}}
                                                                {{--                                            </a>--}}
                                                                {{--                                        </li>--}}
                                                                <li>
                                                                    <a href="#" class="job-dashboard-action-delete" onclick="event.preventDefault();if (!confirm('Are you sure to delete this Gig')){return false};document.getElementById('gig{!! $jobPost->id !!}').submit()">
                                                                        {{--                                                Delete--}}
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('client.job-post.destroy', $jobPost->id) }}" id="gig{{ $jobPost->id }}" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No Project has been created yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- create project modal -->
    <div class="modal fade" id="createProjectModal" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Project</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.projects.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4">Project Name</label>
                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control" placeholder="Project Name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <input type="radio" name="status" value="1" style="width: auto!important;" checked> Published
                                <input type="radio" name="status" value="0" style="width: auto!important;"> Unpublished
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-primary btn-sm">Reset</button>
                        <button type="submit" class="btn btn-success">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    edit project modal--}}
    <div class="modal fade" id="editProjectModal" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Project</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4">Project Name</label>
                            <div class="col-md-8">
                                <input type="text" id="editTitle" name="title" class="form-control" placeholder="Project Name" />
                            </div>
                        </div>
{{--                        <div class="form-group row">--}}
{{--                            <label class="col-md-4">Status</label>--}}
{{--                            <div class="col-md-8">--}}
{{--                                <input type="radio" name="status" value="1" style="width: auto!important;" id="editStatusPublished"> Published--}}
{{--                                <input type="radio" name="status" value="0" style="width: auto!important;" id="editStatusUnpublished"> Unpublished--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-primary btn-sm">Reset</button>
                        <button type="submit" class="btn btn-success">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- create job modal -->
    <div class="modal fade" id="createJobModal" >
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Gig</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('client.job-post.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="big_form_group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label  for="jobCategory">Project Name</label>
                                        <select name="project_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Project">
                                            <option selected disabled>Select a Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->has('project_id') ? $errors->first('project_id') : '' }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label  for="jobCategory">Job Categroy</label>
                                        <select name="skill_category_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Job Category" id="jobCategory">
                                            <option selected disabled>Select a Job Category</option>
                                            @foreach($skillCategories as $skillCategory)
                                                <option value="{{ $skillCategory->id }}">{{ $skillCategory->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->has('skill_category_id') ? $errors->first('skill_category_id') : '' }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label  for="jobCategory">Job Sub Categroy</label>
                                        <select name="skill_sub_category_id" class="form-control select2" required data-toggle="select2" data-placeholeder="Select a Job Category" id="jobSubCategory">
                                            <option selected disabled>Select a Job Category</option>
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
                                        <input type="text" name="project_title" class="form-control" placeholder="Write Job Title Here" />
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
                                                <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->has('required_skills') ? $errors->first('required_skills') : '' }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Minimum Exiperience Level</label>
                                        <select name="experience_level" class="form-control select2" required id="">
                                            <option value="0">Excited</option>
                                            <option value="1">Eager</option>
                                            <option value="2">Experienced</option>
                                            <option value="3">Expert</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->has('experience_level') ? $errors->first('experience_level') : '' }}</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label  >Project Description</label>
                                        <textarea class="form-control" name="project_description" id="editor"></textarea>
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
                                        <input type="number" name="budget" value="" class="form-control" />
                                        <span class="text-danger">{{ $errors->has('budget') ? $errors->first('budget') : '' }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Want to ask a question?</label>
                                        <select name="job_questions[]" multiple class="form-control select2" id="">
                                            @foreach($questions as $question)
                                                <option value="{{ $question->id }}">{{ $question->question }}</option>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-primary btn-sm">Reset</button>
                        <button type="submit" class="btn btn-success">Create Gig</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editJobModal" >
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Gig</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form action=" " id="editForm" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div id="editGigBody"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-primary btn-sm">Reset</button>
                        <button type="submit" class="btn btn-success">Update Gig</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="lee"></div>
@endsection

@section('script')
    <!-- Datatables js -->
    <script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/datatables.min.js"></script>
    <script>
        $(function () {
            $('.datatable-buttons').DataTable({
                // dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        })
    </script>
    <script>
        $(document).on('change', '#jobCategory', function () {
            getSubCategoryByCategory();
        })
    </script>
    <script>
        CKEDITOR.replace( 'project_description' );
    </script>

    <script>
        $(document).on('click', '.job-dashboard-action-edit', function () {
            event.preventDefault();
            var projectId = $(this).attr('data-project-id');
            var gigId = $(this).attr('data-gig-id');
            $.ajax({
                url: baseUrl+"client/edit-project-gig-ajax",
                method: "POST",
                // dataType: "JSON",
                data: {project_id:projectId, gig_id: gigId},
                success: function (data) {
                    // console.log(data);
                    $('#editGigBody').empty().append(data);
                    $('#editForm').attr('action', baseUrl+'client/job-post/'+gigId)
                    $('.select2').select2({
                        width: 'resolve',
                        placeholder: $(this).attr('data-placeholder'),
                    });
                    $('#editJobModal').modal('show');
                    CKEDITOR.replace( 'projectDescriptionEdit' );
                }
            })
        })

    </script>
    <script>
        $(document).on('click', '.edit-project', function () {
            event.preventDefault();
            var projectId = $(this).data('id');
            $.ajax({
                url: baseUrl+'client/projects/'+projectId+'/edit',
                method: 'GET',
                data: {project_id: projectId},
                success: function (data) {
                    console.log(data);
                    $('#editProjectModal form').attr('action', baseUrl+'client/projects/'+projectId).append('<input type="hidden" name="_method" value="put">');
                    $('#editTitle').val(data.title);
                    // if (data.status == 1)
                    // {
                    //     $('#editStatusPublished').attr('checked', true);
                    // } else {
                    //     $('#editStatusUnpublished').attr('checked', true);
                    // }

                    $('#editProjectModal').modal('show');
                },
                error: function () {
                    toastr.error('Something went wrong. Please try again.');
                }
            })
        })
    </script>
@endsection
