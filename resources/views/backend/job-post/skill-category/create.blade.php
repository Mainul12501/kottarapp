@extends('backend.master')

@section('title')
     Skill Category
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Skill Category', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start"> Skill Category</h4>
                    <a href="{{ route('skills-category.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($skillCategory) ? route('skills-category.update', $skillCategory->id) : route('skills-category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($skillCategory))
                            @method('put')
                        @endif
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Category Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write skill category name." data-bs-placement="right"></i>
                            </label>
                            <input type="text" class="form-control mb-1" name="category_name" value="{{ isset($skillCategory) ? $skillCategory->category_name : '' }}" placeholder="Skill Category name" >
                            @error('category_name')<span class="text-danger f-s-12">{{ $errors->first('category_name') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Status
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select publication status here." data-bs-placement="right"></i>
                            </label>
                            <div class="d-inline mt-3">
                                <input type="checkbox" name="status" id="switch1" {{ (isset($skillCategory)&& $skillCategory->status == 0) ? '' : 'checked' }} data-switch="bool"/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                            @error('status')<span class="text-danger f-s-12">{{ $errors->first('status') }}</span>@enderror
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="col-6 mx-auto btn btn-success" value="{{ isset($skillCategory) ? 'Update' : 'Create' }} Skill Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
