@extends('front.master')

@section('home-page-header-only')
    <div class="header_btm">
        <h2>Login</h2>
    </div>
@endsection
@section('body')
    <div class="only-form-pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="only-form-box">
                        <form action="{{ route('front.login') }}" method="POST">
                            @csrf
                            <div class="com_class_form">
                                <div class="form-group">

                                    <input class="form-control" type="text" name="email" size="40" placeholder="email address * ">
                                </div>
                                <div class="form-group">

                                    <input class="form-control" type="password" name="password" placeholder=" Password * ">
                                </div>


                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Login">
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"> Remember me
                                    </label>
                                </div>
                                <div>
                                    <a class="lost_password" href="lost-password.html"> Lost your password?</a>
                                </div>
                            </div>
                        </form>
                        <div class="social_login">
                            <p class="or_span"><span>or</span></p>
                            <a class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                            <a class="btn btn-google"><i class="fab fa-google-plus-g"></i> Register via Google</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
