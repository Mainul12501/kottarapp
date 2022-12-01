@extends('backend.master')

@section('title')
    Knotter App - Settings
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Settings', 'child' => 'Create'])
@endsection

@section('style')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <style>
        .settings-tabs #pills-tab .nav-item .active {
            background-color: orange;
        }
        .settings-tabs #pills-tab .nav-item .nav-link {
            color: black;
        }
    </style>
<!-- Quill css -->
<link href="{{ asset('/') }}backend/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}backend/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="settings-tabs card card-body">
                        <div class="" >
                            <div class="position-absolute border-1 d-flex justify-content-between align-items-center" style="top: -9px">
                                <h5 class="card-title mb-0">
                                    <span class="px-2 py-1 bg-white" style="border: 1px solid lightgrey!important;">Site Configuration</span>
                                </h5>
                            </div>
                            <div class="pt-2">
                                <form action="{{ isset($setting) ? route('settings.update', $setting->id) : route('settings.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($setting))
                                        @method('put')
                                    @endif
                                    <fieldset >
                                        <input type="hidden" name="setting_category" value="general">
                                        {{--                                                            <input type="hidden" name="setting_id" value="{{ isset($setting) ? $setting->id : '' }}">--}}
                                        <div class="form-group row mt-2">
                                            <div class="col-md-4 ">
                                                <label for="disabledTextInput" class="form-label f-s-11">
                                                    Website Title
                                                    <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set your site title here" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="site_title" placeholder="" value="{{ $errors->any() ? old('site_title') : (isset($setting) ? $setting->site_title : '') }}">
                                                @error('site_title')<span class="text-danger f-s-12">{{ $errors->first('site_title') }}</span>@enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label f-s-12">
                                                    Website Name
                                                    <i class="dripicons-question f-s-12 text-danger" data-bs-toggle="tooltip" data-bs-title="Set your site Name here" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="site_name" placeholder="" value="{{ $errors->any() ? old('site_name') : (isset($setting) ? $setting->site_name : '') }}">
                                                @error('site_name')<span class="text-danger f-s-12">{{ $errors->first('site_name') }}</span>@enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="disabledTextInput" class="form-label f-s-12">
                                                    Site Author Name
                                                    <i class="dripicons-question f-s-12 text-danger" data-bs-toggle="tooltip" data-bs-title="Set your site Author Name here" data-bs-placement="right"></i>
                                                </label>
                                                <input type="text"  class="form-control" name="author_name" placeholder="" value="{{ $errors->any() ? old('author_name') : (isset($setting) ? $setting->author_name : '') }}">
                                                @error('author_name')<span class="text-danger f-s-12">{{ $errors->first('author_name') }}</span>@enderror
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="disabledTextInput" class="form-label f-s-12">
                                                    Website Favicon
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set your site Favicon here" data-bs-placement="right"></i>
                                                </label>
                                                <input type="file"  class="form-control" name="site_favicon" placeholder="" accept="image/*">
                                                <span class="text-danger">{{ $errors->has('site_favicon') ? $errors->first('site_favicon') : '' }}</span>
                                                @if(!empty($setting->site_favicon))
                                                    <img src="{{ asset($setting->site_favicon)}}" style="height: 16px;width: 16px" alt="site-favicon">
                                                @endif
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="disabledTextInput" class="form-label f-s-12">
                                                    Website Logo
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set your site Logo here" data-bs-placement="right"></i>
                                                </label>
                                                <input type="file"  class="form-control" name="site_logo" placeholder="" accept="image/*" />
                                                <span class="text-danger">{{ $errors->has('site_logo') ? $errors->first('site_logo') : '' }}</span>
                                                @if(!empty($setting->site_logo))
                                                    <img src="{{ asset($setting->site_logo)}}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="disabledTextInput" class="form-label f-s-12">Website Banner</label>
                                                <input type="file" class="form-control" name="site_banner" placeholder="" accept="image/*" />
                                                <span class="text-danger">{{ $errors->has('site_banner') ? $errors->first('site_banner') : '' }}</span>
                                                @if(!empty($setting->site_banner))
                                                    <img src="{{ asset($setting->site_banner)}}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                            </div>
{{--                                            <div class="col-md-4">--}}
{{--                                                <label for="disabledTextInput" class="form-label f-s-12">--}}
{{--                                                    Gig Post Valid Duration--}}
{{--                                                    <i class="dripicons-question f-s-12 text-danger" data-bs-toggle="tooltip" data-bs-title="Set your Gig Post Valid Duration here" data-bs-placement="right"></i>--}}
{{--                                                </label>--}}
{{--                                                <input type="number"  class="form-control" name="job_post_validate_time" placeholder="" value="{{ $errors->any() ? old('job_post_validate_time') : (isset($setting) ? $setting->job_post_validate_time : '') }}">--}}
{{--                                                @error('job_post_validate_time')<span class="text-danger f-s-12">{{ $errors->first('job_post_validate_time') }}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-4">--}}
{{--                                                <label for="disabledTextInput" class="form-label f-s-12">--}}
{{--                                                    Gig Post Valid Duration--}}
{{--                                                    <i class="dripicons-question f-s-12 text-danger" data-bs-toggle="tooltip" data-bs-title="Set your Gig Post Valid Duration here" data-bs-placement="right"></i>--}}
{{--                                                </label>--}}
{{--                                                <input type="number"  class="form-control" name="job_service_charge" placeholder="" value="{{ $errors->any() ? old('job_service_charge') : (isset($setting) ? $setting->job_service_charge : '') }}">--}}
{{--                                                @error('job_service_charge')<span class="text-danger f-s-12">{{ $errors->first('job_service_charge') }}</span>@enderror--}}
{{--                                            </div>--}}
                                            <div class="col-md-4 mt-2">
                                                <label for="disabledTextInput" class="form-label f-s-12">Website Meta</label>
                                                <textarea name="site_meta" id="snow-editor" style="height: 200px" class="form-control" cols="30" rows="2">{!! $errors->any() ? old('site_meta') : (isset($setting) ? $setting->site_meta : '') !!}</textarea>
                                                @error('site_meta')<span class="text-danger f-s-12">{{ $errors->first('site_meta') }}</span>@enderror
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="disabledTextInput" class="form-label f-s-12">Seo Header Content</label>
                                                <textarea name="seo_header" id=""  style="height: 200px" class="form-control snow-editor" cols="30" rows="2">{!! $errors->any() ? old('seo_header') : (isset($setting) ? $setting->seo_header : '') !!}</textarea>
                                                @error('seo_header')<span class="text-danger f-s-12">{{ $errors->first('seo_header') }}</span>@enderror
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="disabledTextInput" class="form-label f-s-12">Seo Footer Content</label>
                                                <textarea name="seo_footer" id="seo-footer"  style="height: 200px" class="form-control" cols="30" rows="2">{!! $errors->any() ? old('seo_footer') : (isset($setting) ? $setting->seo_footer : '') !!}</textarea>
                                                @error('seo_footer')<span class="text-danger f-s-12">{{ $errors->first('seo_footer') }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-12">
                                                <input type="submit" class="mt-3 btn btn-outline-warning text-center" value="Update Settings">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
{{--    <script src="{{ asset('/') }}backend/assets/js/district/javascript.js"></script>--}}
    <!-- quill js -->
    <script src="{{ asset('/') }}backend/assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="{{ asset('/') }}backend/assets/js/pages/demo.quilljs.js"></script>

    <script>
        var quill = new Quill(".snow-editor", {
            theme: "snow",
            modules: {
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        script: "super"
                    }, {
                        script: "sub"
                    }],
                    [{
                        header: [!1, 1, 2, 3, 4, 5, 6]
                    }, "blockquote", "code-block"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }, {
                        indent: "-1"
                    }, {
                        indent: "+1"
                    }],
                    ["direction", {
                        align: []
                    }],
                    ["link", "image", "video"],
                    ["clean"]
                ]
            }
        })
    </script>
    <script>
        var quill = new Quill("#seo-footer", {
            theme: "snow",
            modules: {
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        script: "super"
                    }, {
                        script: "sub"
                    }],
                    [{
                        header: [!1, 1, 2, 3, 4, 5, 6]
                    }, "blockquote", "code-block"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }, {
                        indent: "-1"
                    }, {
                        indent: "+1"
                    }],
                    ["direction", {
                        align: []
                    }],
                    ["link", "image", "video"],
                    ["clean"]
                ]
            }
        })
    </script>

@endsection
