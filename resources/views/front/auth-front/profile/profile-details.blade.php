@extends('front.auth-front.auth-master')

@section('title')
    Update Profile
@endsection

@section('body')
    <div class="col-sm-12">
        <div class="jm_headings">
            <h5>Update My Profile</h5>
            <a class="btn btn-primary mypbtn" href="#"> {{ $user->user_role_type == 1 ? 'SME' : '' }} {{ $user->user_role_type == 0 ? 'Student' : '' }} profile</a>
        </div>
        <div class="section-divider">
        </div>
        <form>
            <div class="big_form_group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >First Name</label>
                            <input type="text" class="form-control" placeholder="" value="Dedolp ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Last Name</label>
                            <input type="text" class="form-control" placeholder="" value="Seofls ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Email</label>
                            <input type="text" class="form-control" placeholder="" value="Seofls@itsexample.com ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Company name</label>
                            <input type="text" class="form-control" placeholder="" value="Donec Software  ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="big_form_group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Location</label>
                            <input type="text" class="form-control" placeholder="" value="London, United Kingdom ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Job Type</label>
                            <input type="text" class="form-control" placeholder="" value="Full time ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Expected Salary</label>
                            <input type="text" class="form-control" placeholder="" value="$35k - $38k">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Total experience</label>
                            <input type="text" class="form-control" placeholder="" value="5 Years ">
                        </div>
                    </div>
                </div>
            </div>

            <div class="big_form_group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label  >Skills</label>
                            <select class="form-control">
                                <option>
                                    PHP
                                </option>
                                <option>
                                    MySQL
                                </option>
                                <option>
                                    API Development
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group ">
                            <label  >About Company Description</label>
                            <textarea class="form-control" ></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group row">
                <div  class="col-md-9 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>

@endsection
