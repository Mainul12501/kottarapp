@extends('backend.master')

@section('title')
     Job Questions
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Job Questions', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start"> Job Questions</h4>
                    <a href="{{ route('job-questions.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($question) ? route('job-questions.update', $question->id) : route('job-questions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($question))
                            @method('put')
                        @endif
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Question
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write Job Question Here." data-bs-placement="right"></i>
                            </label>
                            <input type="text" class="form-control mb-1" name="question" value="{{ isset($question) ? $question->question : '' }}" placeholder="Full Question" >
                            @error('question')<span class="text-danger f-s-12">{{ $errors->first('question') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Status
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select publication status here." data-bs-placement="right"></i>
                            </label>
                            <div class="d-inline mt-3">
                                <input type="checkbox" name="status" id="switch1" {{ (isset($question)&& $question->status == 0) ? '' : 'checked' }} data-switch="bool"/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                            @error('status')<span class="text-danger f-s-12">{{ $errors->first('status') }}</span>@enderror
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="col-6 mx-auto btn btn-success" value="{{ isset($question) ? 'Update' : 'Create' }} Job Question">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
