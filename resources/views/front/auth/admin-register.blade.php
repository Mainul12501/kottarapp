@extends('front.master')
@section('home-page-header-only')
    <div class="header_btm">
        <h2>Register</h2>
    </div>
@endsection

@section('style')
    <style>
        .only-form-box {
            max-width: 500px;
        }
    </style>
@endsection

@section('body')
    <div class="only-form-pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="only-form-box">
                        <div class="welcome-text text-center mb-5">
                            <h5 class="mb-0">Create an account!</h5>
                            <span>Already have an account? <a href="{{ route('login') }}">Log In!</a></span>
                        </div>
                        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="com_class_form">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name" size="40" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" size="40" placeholder="Username ">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" size="40" placeholder="Email address* ">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder=" Password * ">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Re-enter Password * ">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Register" >
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"> Remember me
                                    </label>
                                </div>

                            </div>
                        </form>
                        <div class="social_login">
                            <p class="or_span"><span>or</span></p>
                            <button class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Log In via Facebook</button>
                            <button class="btn btn-google"><i class="fab fa-google-plus-g"></i> Register via Google+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@section('script')--}}
{{--    --}}
{{--@endsection--}}
