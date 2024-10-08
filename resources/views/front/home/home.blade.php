@extends('front.master')

@section('title')
    Home page
@endsection

@section('home-page-header-only')
    <div class="header_btm">
        <!-- <div class="bg-v" >
            <div class="bg-v-2 bg-b-r">
            </div>
        </div> -->
        <div class="container">
            <div class="banner_slider ">
                <div class="">
                    <div class="row align-items-center">
                        <div class="col-lg-4" data-aos="fade-down" data-aos-delay="200">
                            <h2>Find the  most exciting<br> starup jobs</h2>
                            <p>Most complete 2020 template for Job board sites.</p>
                            <a class="btn btn-primary" href="browse-jobs.html">Know more
                                <i class="material-icons">arrow_right_alt</i>
                            </a>
                        </div>
                        <div class="col-lg-8" >
                            <div class="banner_form_cont" >
                                <form action="http://veepixel.com/tf/html/jodice/browse-jobs.html">
                                    <div class="banerSearch" data-aos="fade-up" data-aos-delay="200">
                                        <div class="fild-wrap fw-job-title">
                                            <i class="fas fa-briefcase"></i>
                                            <select class="js-example-basic-multiple" name="state">
                                                <option value="AL"> JOB TITLE, SKILL, INDUSTRY</option>
                                                <option value="1">Concierge</option>
                                                <option value="2">Event Planner</option>
                                                <option value="3">Executive Chef</option>
                                                <option value="4">General Manager</option>

                                            </select>
                                        </div>
                                        <div class="fild-wrap fw-job-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <select class="js-example-basic-single" name="state">
                                                <option value="AL">ALABAMA</option>
                                                <option value="WY">WYOMING</option>
                                            </select>
                                        </div>
                                        <div class="fild-wrap fw-submit">
                                            <button type="submit" class="btn btn-primary" value="">
                                                <i class="material-icons">search</i> SEARCH JOBS
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="user_type">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="user_type_inner  user_type_seeker" >
                                                <a href="browse-jobs.html">
                                                    <div class="usertype_img">
                                                        <img alt="" src="{{ asset('/') }}frontend/assets/images/usertype-2.png">
                                                        <img alt="" class="usertype-addon" src="{{ asset('/') }}frontend/assets/images/usertype-2-addon.png">
                                                    </div>
                                                    <div>
                                                        <h3>I'm looking for a job</h3>
                                                        <p>Post CV and apply job you love</p>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="user_type_inner user_type_post" >
                                                <a href="post-a-job.html">
                                                    <div class="usertype_img">
                                                        <img alt=""  src="{{ asset('/') }}frontend/assets/images/usertype-1.png">
                                                        <img alt=""  class="usertype-addon" src="{{ asset('/') }}frontend/assets/images/usertype-1-addon.png">
                                                    </div>
                                                    <div>
                                                        <h3>I want to post job</h3>
                                                        <p>Post jobs & hire porfessionls</p>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection

@section('body')
    <div class="section category-section ">
        <div class="bg-v">
            <div class="bg-v-1 bg-t-l" data-aos="zoom-in">
            </div>
            <div class="bg-v-2 bg-b-r" data-aos="zoom-in">
            </div>
            <!-- <div class="bg-v-4">
            </div>
            <div class="bg-v-5">
            </div>
            <div class="bg-v-6">
            </div>
            <div class="bg-v-7">
            </div>
            <div class="bg-v-8">
            </div>
            <div class="bg-v-9">
            </div>
            <div class="bg-v-10">
            </div>
            <div class="bg-v-11">
            </div> -->
        </div>
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Popular Job Categories</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-code.png">
                            <span class="job_count">363</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Web & Software Dev</h3>
                            <p>Software Engineer, Web / Mobile Developer &amp; More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-server.png">
                            <span class="job_count">572</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Data Science & Analitycs</h3>
                            <p>Data Specialist / Scientist, Data Analyst & More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-calculator.png">
                            <span class="job_count">252</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Accounting & Consulting</h3>
                            <p>Auditor, Accountant, Fnancial Analyst & More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-pan.png">
                            <span class="job_count">523</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Writing & Translations</h3>
                            <p>Copywriter, Creative Writer, Translator & More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-chart.png">
                            <span class="job_count">98</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Sales & Marketing</h3>
                            <p>Brand Manager, Marketing Coordinator & More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-graphic.png">
                            <span class="job_count">53</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Graphics & Design</h3>
                            <p>Creative Director, Web Designer & More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-digital.png">
                            <span class="job_count">75</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Digital Marketing</h3>
                            <p>Darketing Analyst, Social Profile Admin & More</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" >
                    <div class="category_box" >
                        <div class="cb_header">
                            <img alt=""  src="{{ asset('/') }}frontend/assets/images/i-education.png">
                            <span class="job_count">366</span>
                        </div>
                        <div class="cb_bottom">
                            <h3>Education & Training</h3>
                            <p>Advisor, Coach, Education Coordinator & More</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section dark-section featured_section">
        <div class="bg-v">
            <div class="bg-v-3 bg-t-r">
            </div>
            <div class="bg-v-3 bg-b-l">
            </div>
        </div>
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Featured Jobs</h2>
            <div class="row two_col featured_box_outer">
                <div class="col-sm-6" >
                    <div class="featured_box ">
                        <div class="fb_image" >
                            <a href="compnay-profile-single.html">
                                <img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-01.webp">
                            </a>
                        </div>
                        <div class='fb_content' >
                            <h4>
                                <a href="job-single.html">2000 Words English to German</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-landmark"></i>
                                        Magna Aliqua
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-clock"></i>
                                        2 days ago
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action" >
                            <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>
                            <a class="btn btn-third" href="job-single.html">Apply Now</a>
                            <ul class="tags">
                                <li>copywriting</li>
                                <li>translating</li>
                                <li>editing</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="featured_box ">
                        <div class="fb_image" >
                            <a href="compnay-profile-single.html">
                                <img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-02.webp">
                            </a>
                        </div>
                        <div class='fb_content' >
                            <h4>
                                <a href="job-single.html">Fix Python Selenium Code</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-landmark"></i>
                                        Magna Aliqua
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-clock"></i>
                                        3 days ago
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action"  >
                            <a title="add to favourite" href="#"><i class="fas fa-heart"></i></a>
                            <a class="btn btn-third" href="job-single.html">Apply Now</a>
                            <ul class="tags">
                                <li>Python</li>
                                <li>Flask</li>
                                <li>API Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="featured_box ">
                        <div class="fb_image" >
                            <a href="compnay-profile-single.html">
                                <img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-03.webp">
                            </a>
                        </div>
                        <div class='fb_content'>
                            <h4>
                                <a href="job-single.html">Restaurant General Manager</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-landmark"></i>
                                        Magna Aliqua
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-clock"></i>
                                        5 days ago
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action" >
                            <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>
                            <a class="btn btn-third disabled" href="job-single.html">Applied</a>
                            <ul class="tags">
                                <li>Python</li>
                                <li>Flask</li>
                                <li>API Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="featured_box ">
                        <div class="fb_image" >
                            <a href="compnay-profile-single.html">
                                <img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-05.webp">
                            </a>
                        </div>
                        <div class='fb_content' >
                            <h4>
                                <a href="job-single.html">PHP Core Website Fixes</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-landmark"></i>
                                        Magna Aliqua
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-clock"></i>
                                        5 days ago
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action" >
                            <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>
                            <a class="btn btn-third" href="job-single.html">Apply Now</a>
                            <ul class="tags">
                                <li>PHP</li>
                                <li>MySQL </li>
                                <li>API Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"  >
                    <div class="featured_box ">
                        <div class="fb_image" >
                            <a href="compnay-profile-single.html">
                                <img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-05.webp">
                            </a>
                        </div>
                        <div class='fb_content' >
                            <h4>
                                <a href="job-single.html">Restaurant General Manager</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-landmark"></i>
                                        Magna Aliqua
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-clock"></i>
                                        7 days ago
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action" >
                            <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>
                            <a class="btn btn-third" href="job-single.html">Apply Now</a>
                            <ul class="tags">
                                <li>PHP</li>
                                <li>MySQL </li>
                                <li>API Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="featured_box ">
                        <div class="fb_image" >
                            <a href="compnay-profile-single.html">
                                <img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/c-logo-05.webp">
                            </a>
                        </div>
                        <div class='fb_content' >
                            <h4>
                                <a href="job-single.html">Food Delviery Mobile App</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-landmark"></i>
                                        Magna Aliqua
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-clock"></i>
                                        9 days ago
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="fb_action" >
                            <a title="add to favourite" href="#"><i class="far fa-heart"></i></a>
                            <a class="btn btn-third" href="job-single.html">Apply Now</a>
                            <ul class="tags">
                                <li>IOS</li>
                                <li>Android</li>
                                <li>mobile apps</li>
                                <li>design</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-right" >
                    <a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary" href="browse-jobs.html">Browse All Jobs <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="section  paln_section">--}}
    {{--        <div class="bg-v">--}}
    {{--            <div class="bg-v-1 bg-t-l">--}}
    {{--            </div>--}}
    {{--            <div class="bg-v-2 bg-b-l">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="container">--}}
    {{--            <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Membership Plans</h2>--}}
    {{--            <div class="planduration" data-aos="fade-in" data-aos-delay="400">--}}
    {{--                <div class="custom-control custom-switch text-center">--}}
    {{--                    <label class="before-custom-control-label" for="customSwitch1"> <span>Billed Monthly</span></label>--}}
    {{--                    <input type="checkbox" class="custom-control-input" id="customSwitch1">--}}
    {{--                    <label class="custom-control-label" for="customSwitch1"> <span>Billed Yearly</span> </label>--}}
    {{--                    <div class="small-alert alert-success"> Save 21%  </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-4" data-aos="fade-left" data-aos-delay="600">--}}
    {{--                    <div class="plan_box">--}}
    {{--                        <h3>Basic Plan</h3>--}}
    {{--                        <p>One time fee for one listing or task highlighted in search results.</p>--}}
    {{--                        <div class="plan_price pl-monthly">--}}
    {{--                            <h4><strong>$19</strong>/ monthly</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="plan_price pl-yearly hide">--}}
    {{--                            <h4><strong>$200</strong>/ yearly</h4>--}}
    {{--                        </div>--}}
    {{--                        <h5>Features of Basic Plan</h5>--}}
    {{--                        <ul>--}}
    {{--                            <li><i class="fas fa-check"></i> 1 Listing</li>--}}
    {{--                            <li><i class="fas fa-check"></i> 30 Days Visibility</li>--}}
    {{--                            <li><i class="fas fa-check"></i> Highlighted in Search Results</li>--}}
    {{--                            <li><i class="fas fa-check"></i>Fraud protection</li>--}}
    {{--                            <li><i class="fas fa-check"></i>Featured Listing</li>--}}
    {{--                        </ul>--}}
    {{--                        <a class="btn btn-third" href="#">Buy Now</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="plan_box plan_box_hoverd">--}}
    {{--                        <div class="populer_plan">--}}
    {{--                            Most Populer--}}
    {{--                        </div>--}}
    {{--                        <h3>Standard Plan</h3>--}}
    {{--                        <p>One time fee for one listing or task highlighted in search results.</p>--}}
    {{--                        <div class="plan_price">--}}
    {{--                            <h4><strong>$36</strong>/ monthly</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="plan_price pl-yearly hide">--}}
    {{--                            <h4><strong>$396</strong>/ yearly</h4>--}}
    {{--                        </div>--}}
    {{--                        <h5>Features of Standard Plan</h5>--}}
    {{--                        <ul>--}}
    {{--                            <li><i class="fas fa-check"></i> 6 Listing</li>--}}
    {{--                            <li><i class="fas fa-check"></i> 65 Days Visibility</li>--}}
    {{--                            <li><i class="fas fa-check"></i> Highlighted in Search Results</li>--}}
    {{--                            <li><i class="fas fa-check"></i>Fraud protection</li>--}}
    {{--                            <li><i class="fas fa-check"></i>Featured Listing</li>--}}
    {{--                        </ul>--}}
    {{--                        <a class="btn btn-third" href="#">Buy Now</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4" data-aos="fade-right" data-aos-delay="600">--}}
    {{--                    <div class="plan_box">--}}

    {{--                        <h3>Extended Plan</h3>--}}
    {{--                        <p>One time fee for one listing or task highlighted in search results.</p>--}}
    {{--                        <div class="plan_price">--}}
    {{--                            <h4><strong>$79</strong>/ monthly</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="plan_price pl-yearly hide">--}}
    {{--                            <h4><strong>$850</strong>/ yearly</h4>--}}
    {{--                        </div>--}}
    {{--                        <h5>Features of Extended Plan</h5>--}}
    {{--                        <ul>--}}
    {{--                            <li><i class="fas fa-check"></i> Unlimited Listings Listing</li>--}}
    {{--                            <li><i class="fas fa-check"></i> 100 Days Visibility</li>--}}
    {{--                            <li><i class="fas fa-check"></i> Highlighted in Search Results</li>--}}
    {{--                            <li><i class="fas fa-check"></i>Fraud protection</li>--}}
    {{--                            <li><i class="fas fa-check"></i>Featured Listing</li>--}}
    {{--                        </ul>--}}
    {{--                        <a class="btn btn-third" href="#">Buy Now</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <div class="section post_section">--}}
    {{--        <div class="bg-v">--}}
    {{--            <div class="bg-v-2 bg-t-l">--}}
    {{--            </div>--}}
    {{--            <div class="bg-v-2 bg-b-r">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="container">--}}
    {{--            <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Featured Posts</h2>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-4" >--}}
    {{--                    <div class="post_box">--}}
    {{--                        <img  alt="" src="{{ asset('/') }}frontend/assets/images/blog1.jpg" class="img-responsive">--}}
    {{--                        <div class="post_content">--}}
    {{--                            <h6>--}}
    {{--                                <a href="blog-single.html">4 Secrets To Be Strategic About Your Job Search</a>--}}
    {{--                            </h6>--}}
    {{--                            <p>Queequeg removed himself to just beyond the head of the … </p>--}}
    {{--                            <a class="btn btn-secondary btn-rounded" href="blog-single.html">Continue reading</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="post_box">--}}
    {{--                        <img   alt="" src="{{ asset('/') }}frontend/assets/images/blog2.jpg" class="img-responsive">--}}
    {{--                        <div class="post_content">--}}
    {{--                            <h6>--}}
    {{--                                <a href="blog-single.html">Why Long-Term Unemployment Isn’t As Bad As You Think</a>--}}
    {{--                            </h6>--}}
    {{--                            <p>Queequeg removed himself to just beyond the head of the … </p>--}}
    {{--                            <a class="btn btn-secondary btn-rounded" href="blog-single.html">Continue reading</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4" >--}}
    {{--                    <div class="post_box">--}}
    {{--                        <img  alt="" src="{{ asset('/') }}frontend/assets/images/blog3.jpg" class="img-responsive">--}}
    {{--                        <div class="post_content">--}}
    {{--                            <h6>--}}
    {{--                                <a href="blog-single.html">6 Ways Your Job is Losing You Future Earnings</a>--}}
    {{--                            </h6>--}}
    {{--                            <p>Queequeg removed himself to just beyond the head of the … </p>--}}
    {{--                            <a class="btn btn-secondary btn-rounded" href="blog-single.html">Continue reading</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="section status_section">
        <div class="bg-v">
            <div class="bg-v-1 bg-t-r">
            </div>
            <div class="bg-v-2 bg-b-l">
            </div>
        </div>
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">JoDice Status</h2>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="status_box" data-aos="fade-in" data-aos-delay="600">
                        <img alt=""  data-aos="fade-up" data-aos-delay="1000" src="{{ asset('/') }}frontend/assets/images/i-paper-plane.png">

                        <h3>83</h3>
                        <p>Job Posted.</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="status_box" data-aos="fade-in" data-aos-delay="800">
                        <img alt=""  data-aos="fade-up" data-aos-delay="1200" src="{{ asset('/') }}frontend/assets/images/i-doctor.png">

                        <h3>16</h3>
                        <p>Job Filled.</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="status_box" data-aos="fade-in" data-aos-delay="1000">
                        <img alt=""  data-aos="fade-up" data-aos-delay="1400" src="{{ asset('/') }}frontend/assets/images/i-company.png">
                        <h3>36</h3>
                        <p>Companies</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="status_box" data-aos="fade-in" data-aos-delay="1200">
                        <img alt=""  data-aos="fade-up" data-aos-delay="1600" src="{{ asset('/') }}frontend/assets/images/i-mamber.png">
                        <h3>175</h3>
                        <p>Members</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section gray  partner_section">
        <div class="bg-v">
            <div class="bg-v-1 bg-t-l">
            </div>
            <div class="bg-v-3 bg-b-r">
            </div>
        </div>
        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Our Partners</h2>
            <ul class="partner_carousel owl-carousel owl-theme">
                <li>
                    <a href="#"><img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-1.svg"></a>
                </li>
                <li>
                    <a href="#"><img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-2.svg"></a>
                </li>
                <li>
                    <a href="#"><img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-3.svg"></a>
                </li>
                <li>
                    <a href="#"><img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-4.png"></a>
                </li>
                <li>
                    <a href="#"><img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-5.png"></a>
                </li>
                <li>
                    <a href="#"><img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-1.svg"></a>
                </li>
                <li>
                    <a href="#"><img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-2.svg"></a>
                </li>
                <li>
                    <a href="#"><img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-3.svg"></a>
                </li>
                <li>
                    <a href="#"><img   alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-4.png"></a>
                </li>
                <li>
                    <a href="#"><img  alt="brand logo" src="{{ asset('/') }}frontend/assets/images/company-logo-5.png"></a>
                </li>
            </ul>
        </div>
    </div>
@endsection

