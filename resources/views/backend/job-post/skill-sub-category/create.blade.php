@extends('backend.master')

@section('title')
     Skills Sub Category
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Skill Sub Category', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start"> Skill Sub Category</h4>
                    <a href="{{ route('skills-sub-category.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($skillSubCategory) ? route('skills-sub-category.update', $skillSubCategory->id) : route('skills-sub-category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($skillSubCategory))
                            @method('put')
                        @endif
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Category Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select skill category name here" data-bs-placement="right"></i>
                            </label>
                            <select name="skill_category_id" class="form-control select2" data-toggle="select2" id="" data-placeholder="Select a Skill category">
                                <option value=""></option>
                                @foreach($skillCategories as $skillCategory)
                                    <option value="{{ $skillCategory->id }}" {{ isset($skillSubCategory) && $skillSubCategory->skill_category_id == $skillCategory->id ? 'selected' : '' }}>{{ $skillCategory->category_name }}</option>
                                @endforeach
                            </select>
                            @error('skill_category_id')<span class="text-danger f-s-12">{{ $errors->first('skill_category_id') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Sub Category Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write skill sub category name here" data-bs-placement="right"></i>
                            </label>
                            <input type="text" class="form-control mb-1" name="sub_category_name" value="{{ isset($skillSubCategory) ? $skillSubCategory->sub_category_name : '' }}" placeholder="Skill Sub Category Name" >
                            @error('sub_category_name')<span class="text-danger f-s-12">{{ $errors->first('sub_category_name') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Publication Status
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Publication Status" data-bs-placement="right"></i>
                            </label>
                            <div class="d-inline mt-3">
                                <input type="checkbox" name="status" id="switch1" {{ isset($skillSubCategory) && $skillSubCategory->status == 0 ? '' : 'checked' }} data-switch="bool"/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                            @error('status')<span class="text-danger f-s-12">{{ $errors->first('status') }}</span>@enderror
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="col-6 mx-auto btn btn-success" value="{{ isset($skillSubCategory) ? 'Update' : 'Create' }} Skill Sub Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
