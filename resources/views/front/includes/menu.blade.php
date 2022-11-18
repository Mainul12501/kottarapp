<div class="header_menu fixed-top">
    <div class="container">
        <div class="header_top">
            <div class="logo">
                <a href="{{ route('front.home') }}">
{{--                    <img  alt="JoDice" class="img-fluid" src="{{ asset('/') }}frontend/assets/images/dice-logo.png">--}}
                    <img  alt="Knotters" class="img-fluid" src="{{ asset('/') }}frontend/assets/images/logo/Logo -orange.svg">
                </a>
            </div>
            <div class="navigation">
                <nav>
                    <div class="hamburger hamburger--spring js-hamburger ">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <ul>
                        <li class="current_page">
                            <a href="{{ route('front.home') }}" >Home</a>
{{--                            <ul class="sub-menu">--}}
{{--                                <li class="current_page">--}}
{{--                                    <a href="index.html">Homepage 1</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="home-page-2.html">Homepage 2</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="home-page-3.html">Homepage 3</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="home-page-4.html">Homepage 4</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </li>
                        <li class="has-sub-menu">
                            <a href="javascript:void(0)">Student</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('client.dashboard') }}">dashboard</a>
                                </li>
                                <li>
                                    <a href="">Browse Gigs</a>
                                </li>

                                <li>
                                    <a href="">Job single</a>
                                </li>

                                <li>
                                    <a href="">My stared jobs</a>
                                </li>
                                <li>
                                    <a href="">Job seeker profile</a>
                                </li>
                                <li>
                                    <a href="">Update my profile</a>
                                </li>

                                <li>
                                    <a href="">Change password</a>
                                </li>
                                <li>
                                    <a href="">Registration</a>
                                </li>
                                <li>
                                    <a href="">Browse companies</a>
                                </li>
                            </ul>
                        </li>


                        <li class="has-sub-menu">
                            <a href="#">SME</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('client.dashboard') }}">Job dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('client.job-post.create') }}">Post a Gig</a>
                                </li>
                                <li>
                                    <a href="{{ route('client.job-post.index') }}">My Jobs listing</a>
                                </li>
                                <li>
                                    <a href="">Find staff</a>
                                </li>
                                <li>
                                    <a href="">Company profile</a>
                                </li>

                                <li>
                                    <a href="">Update profile</a>
                                </li>
                                <li>
                                    <a href="">Change password</a>
                                </li>
                                <li>
                                    <a href="">Employer registration</a>
                                </li>
                            </ul>
                        </li>

{{--                        <li class="has-sub-menu">--}}
{{--                            <a href="#">Pages</a>--}}
{{--                            <ul class="sub-menu">--}}

{{--                                <li>--}}
{{--                                    <a href="blog.html">blog</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="blog-single.html">Blog single</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="contact-us.html">Contact us</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="plan-page.html">Membership Plans</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="login.html">Login</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="lost-password.html">Lost password</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="user-interface-elements.html">User interface elements</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="404.html">404</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                    </ul>
                </nav>
                <div class="ac_nav @if(auth()->check()) after_login_ac_nav @endif">
                    @if(auth()->check())
                        <!-- logedin-->
                            <div class="login_pop after_login">
                                <button class="btn btn-primary withdp"><img alt=""  src="{{ isset(auth()->user()->userDetails->profile_image) ? asset(auth()->user()->userDetails->profile_image) : asset('frontend/assets/images/c-logo-03.webp') }}"> {{ auth()->user()->name }}   <i class="fas fa-caret-down"></i></button>
                                <div class="login_pop_box login_pop_box_menu">
                                    <div class="login_pop_box_head">
                                        <div class=" ">
                                            <img alt=""  src="{{ isset(auth()->user()->userDetails->profile_image) ? asset(auth()->user()->userDetails->profile_image) : asset('frontend/assets/images/c-logo-03.webp') }}">
                                            <span> New York, London </span>
                                            <h5>Donec Software </h5>
                                            <h6>&nbsp;</h6>
                                        </div>
                                    </div>
                                    <ul class="user_navigation">
                                        <li>
                                            <a href="{{ route('client.dashboard') }}"><i class="fas fa-border-all"></i> Job Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-search"></i> Find Staff </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('client.job-post.create') }}"><i class="fas fa-paper-plane"></i> Post Job</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('client.job-post.index') }}"><i class="far fa-list-alt"></i> My job listings</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-user"></i> Update My Profile</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-key"></i>Change Password</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"><i class="fas fa-power-off"></i> Logout</a>
                                            <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="login_pop after_login">
                                <button class="btn btn-msg">
                                    <i class="fas fa-envelope"></i>
                                    <span class="msg-count">2</span>
                                </button>
                                <div class="login_pop_box job_seekernotifi ">
                                    <h6>Inbox</h6>
                                    <ul>
                                        <li><img alt="" src="{{ asset('/') }}frontend/assets/images/profile-1.png"><a href="#"> John Stone applying this job  contact  </a> </li>
                                        <li><img alt="" src="{{ asset('/') }}frontend/assets/images/profile-2.png"><a href="#">Nguta Ithya  applying this job  contact  </a> </li>
                                        <li><img alt="" src="{{ asset('/') }}frontend/assets/images/profile-4.png"><a href="#">Salome Simoes applying this job</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end logedin-->
                    @else
                        <!--Not logedin-->
                        <div class="login_pop">
                            <button class="btn btn-primary">Login / Sign up <i class="fas fa-caret-down"></i></button>
                            <div class="login_pop_box">
                                <span class="twobtn_cont">
                                    <a class="signjs_btn" href="{{ route('front.register') }}?type=0">
                                        <span>Student</span> Sign up
                                        <i class="far fa-user"></i>
                                    </a>
                                    <a class=" signrs_btn" href="{{ route('front.register') }}?type=1">
                                        <span>SME</span> Sign up
                                        <i class="fas fa-landmark"></i>
                                    </a>
                                </span>
                                <div>
                                    <span class="member_btn">Already a member?</span>
                                    <a class="lgin_btn btn btn-primary" href="{{ route('front.login') }}">
                                        Login
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end logedin-->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
