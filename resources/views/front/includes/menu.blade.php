<div class="header_menu fixed-top">
    <div class="container">
        <div class="header_top">
            <div class="logo">
                <a href="index.html">
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
                            <a href="index.html">Job Seekers</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="job-seeker-dashboard.html">Job dashboard</a>
                                </li>
                                <li>
                                    <a href="browse-jobs.html">Browse jobs</a>
                                </li>

                                <li>
                                    <a href="job-single.html">Job single</a>
                                </li>

                                <li>
                                    <a href="my-stared-jobs.html">My stared jobs</a>
                                </li>
                                <li>
                                    <a href="staff-profile-single.html">Job seeker profile</a>
                                </li>
                                <li>
                                    <a href="edit-profile.html">Update my profile</a>
                                </li>

                                <li>
                                    <a href="edit-password.html">Change password</a>
                                </li>
                                <li>
                                    <a href="registration.html">Registration</a>
                                </li>
                                <li>
                                    <a href="browse-companies.html">Browse companies</a>
                                </li>
                            </ul>
                        </li>


                        <li class="has-sub-menu">
                            <a href="#">For employers</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="job-dashboard.html">Job dashboard</a>
                                </li>
                                <li>
                                    <a href="post-a-job.html">Post a job</a>
                                </li>
                                <li>
                                    <a href="my-job-listing.html">My Jobs listing</a>
                                </li>
                                <li>
                                    <a href="find-staff.html">Find staff</a>
                                </li>
                                <li>
                                    <a href="compnay-profile-single.html">Company profile</a>
                                </li>

                                <li>
                                    <a href="emp-edit-profile.html">Update profile</a>
                                </li>
                                <li>
                                    <a href="emp-edit-password.html">Change password</a>
                                </li>
                                <li>
                                    <a href="emp-registration.html">Employer registration</a>
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
                                <button class="btn btn-primary withdp"><img alt=""  src="assets/images/c-logo-03.webp"> Donec Software   <i class="fas fa-caret-down"></i></button>
                                <div class="login_pop_box login_pop_box_menu">
                                    <div class="login_pop_box_head">
                                        <div class=" ">
                                            <img alt=""  src="assets/images/c-logo-03.webp">
                                            <span> New York, London </span>
                                            <h5>Donec Software </h5>
                                            <h6>&nbsp;</h6>
                                        </div>
                                    </div>
                                    <ul class="user_navigation">
                                        <li>
                                            <a href="find-staff.html"><i class="fas fa-border-all"></i> Job Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="find-staff.html"><i class="fas fa-search"></i> Find Staff </a>
                                        </li>
                                        <li>
                                            <a href="post-a-job.html"><i class="fas fa-paper-plane"></i> Post Job</a>
                                        </li>
                                        <li>
                                            <a href="job-dashboard.html"><i class="far fa-list-alt"></i> My job listings</a>
                                        </li>
                                        <li>
                                            <a href="emp-edit-profile.html"><i class="fas fa-user"></i> Update My Profile</a>
                                        </li>
                                        <li>
                                            <a href="emp-edit-password.html"><i class="fas fa-key"></i>Change Password</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-power-off"></i> Logout</a>
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
                                        <li><img alt="" src="assets/images/profile-1.png"><a href="#"> John Stone applying this job  contact  </a> </li>
                                        <li><img alt="" src="assets/images/profile-2.png"><a href="#">Nguta Ithya  applying this job  contact  </a> </li>
                                        <li><img alt="" src="assets/images/profile-4.png"><a href="#">Salome Simoes applying this job</a> </li>
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
                                                <a class=" signjs_btn" href="{{ route('front.register') }}">
                                                <span>Job seekers</span> Sign up
                                                <i class="far fa-user"></i>
                                                </a>
                                            <a class=" signrs_btn" href="{{ route('front.register') }}">	<span>EMPLOYERS</span> Sign up
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
