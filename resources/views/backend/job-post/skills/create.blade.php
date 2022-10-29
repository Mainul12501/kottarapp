@extends('backend.master')

@section('title')
     Skills Sub Category
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Skills', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start"> Skills</h4>
                    <a href="{{ route('skills.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($skill) ? route('skills.update', $skill->id) : route('skills.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($skill))
                            @method('put')
                        @endif
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Category Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select skills category name here" data-bs-placement="right"></i>
                            </label>
                            <select name="skill_category_id" class="form-control select2" data-toggle="select2" data-placeholder="Select a Skill category">
                                <option value=""></option>
                                @foreach($skillCategories as $skillCategory)
                                    <option value="{{ $skillCategory->id }}" {{ isset($skill) && $skill->skill_category_id == $skillCategory->id ? 'selected' : '' }}>{{ $skillCategory->category_name }}</option>
                                @endforeach
                            </select>
                            @error('skill_category_id')<span class="text-danger f-s-12">{{ $errors->first('skill_category_id') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Sub Category Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select skills sub category name here" data-bs-placement="right"></i>
                            </label>
                            <select name="skill_sub_category_id" class="form-control select2" data-toggle="select2" data-placeholder="Select a Skill category">
                                <option value=""></option>
                                @foreach($skillSubCategories as $skillSubCategory)
                                    <option value="{{ $skillSubCategory->id }}" {{ isset($skill) && $skill->skill_sub_category_id == $skillSubCategory->id ? 'selected' : '' }}>{{ $skillSubCategory->sub_category_name }}</option>
                                @endforeach

                            </select>
                            @error('skill_sub_category_id')<span class="text-danger f-s-12">{{ $errors->first('skill_sub_category_id') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Skills Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write skills name here" data-bs-placement="right"></i>
                            </label>
                            <input type="text" class="form-control mb-1" name="skill_name" value="{{ isset($skill) ? $skill->skill_name : '' }}" placeholder="Skill Name" >
                            @error('Skill_name')<span class="text-danger f-s-12">{{ $errors->first('Skill_name') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Status
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Skill Publication status here." data-bs-placement="right"></i>
                            </label>
                            <div class="d-inline mt-3">
                                <input type="checkbox" name="status" id="switch1" {{ isset($skill) && $skill->status == 0 ? '' : 'checked' }} data-switch="bool"/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                            @error('status')<span class="text-danger f-s-12">{{ $errors->first('status') }}</span>@enderror
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="col-6 mx-auto btn btn-success" value="{{ isset($skill) ? 'Update' : 'Create' }} Skill Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
