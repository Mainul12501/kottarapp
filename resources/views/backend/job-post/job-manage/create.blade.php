@extends('backend.master')

@section('title')
     Job Category
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Job post', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start"> Job Post</h4>
                    <a href="{{ route('job-post.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($group))
                            @method('put')
                        @endif
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Category Name
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write a student group name here" data-bs-placement="right"></i>--}}
                            </label>
                            <select name="" class="form-control select2" data-toggle="select2" id="">
                                <option value="">Select a category</option>
                                <option value="">Web Development</option>
                            </select>
{{--                            @error('group_name')<span class="text-danger f-s-12">{{ $errors->first('group_name') }}</span>@enderror--}}
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Sub Category Name
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write a student group name here" data-bs-placement="right"></i>--}}
                            </label>
                            <select name="" class="form-control select2" data-toggle="select2" id="">
                                <option value="">Select a category</option>
                                <option value="">PHP</option>
                            </select>
{{--                            @error('group_name')<span class="text-danger f-s-12">{{ $errors->first('group_name') }}</span>@enderror--}}
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Required Skills
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write a student group name here" data-bs-placement="right"></i>--}}
                            </label>
                            <select name="" class="form-control select2" data-toggle="select2" id="">
                                <option value="">Select a category</option>
                                <option value="">PHP</option>
                            </select>
{{--                            @error('group_name')<span class="text-danger f-s-12">{{ $errors->first('group_name') }}</span>@enderror--}}
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Title
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write note here if there has any" data-bs-placement="right"></i>--}}
                            </label>
                            <input type="text" class="form-control">
{{--                            @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span>@enderror--}}
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Budget
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write note here if there has any" data-bs-placement="right"></i>--}}
                            </label>
                            <input type="text" class="form-control">
{{--                            @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span>@enderror--}}
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Description
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write note here if there has any" data-bs-placement="right"></i>--}}
                            </label>
                            <textarea name="note" class="form-control" id="" cols="30" rows="5" placeholder="Note"></textarea>
{{--                            @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span>@enderror--}}
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Status
{{--                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select student group status here." data-bs-placement="right"></i>--}}
                            </label>
                            <div class="d-inline mt-3">
                                <input type="checkbox" name="status" id="switch1" checked data-switch="bool"/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
{{--                            @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span>@enderror--}}
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="col-6 mx-auto btn btn-success" value="Create Job Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
