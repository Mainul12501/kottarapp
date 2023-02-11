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
        <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(auth()->user()->user_role_type == 2)
                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" value="{{ $user->userDetails->first_name }}">
                                <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" value="{{ $user->userDetails->last_name }}">
                                <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Email</label>
                                <input type="text" class="form-control disabled" name="email" placeholder="Enter your company official email" value="{{ $user->email }}">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ $user->userDetails->phone }}">
                                <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Profile Image</label>
                                <input type="file" name="profile_image" class="form-control" accept="image/*">
                                <span class="text-danger">{{ $errors->has('profile_image') ? $errors->first('profile_image') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Company name</label>
                                <input type="text" class="form-control" placeholder="Enter your company name" name="company_name" value="{{ $user->userDetails->company_name }}">
                                <span class="text-danger">{{ $errors->has('company_name') ? $errors->first('company_name') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Location</label>
                                <select name="country" class="form-control select2" data-placeholder="Select a country">
                                    <option></option>
                                    <option value="United Arab Emirates" selected>UNITED ARAB EMIRATES</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('country') ? $errors->first('country') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Emirate State Name</label>
                                <select name="emirate_state_name" id="" class="form-control select2" data-placeholder="Select a state Name">
                                    <option></option>
                                    <option value="Abu Dhabi" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Abu Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                    <option value="Dubai" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                    <option value="Sharjah" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                    <option value="Ajman" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                    <option value="Fujairah" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                    <option value="Ras Al-Khaimah" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Ras Al-Khaimah' ? 'selected' : '' }}>Ras Al-Khaimah</option>
                                    <option value="Umm al Quwain" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Umm al Quwain' ? 'selected' : '' }}>Umm al Quwain</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('emirate_state_name') ? $errors->first('emirate_state_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Established Year</label>
                                <input type="text" class="form-control" name="company_establish_year" placeholder="Enter Company Established Year" value="{{ $user->userDetails->company_establish_year }}">
                                <span class="text-danger">{{ $errors->has('company_establish_year') ? $errors->first('company_establish_year') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Are you</label>
                                <select class="form-control select2" name="company_status" data-placeholder="Select an option">
                                    <option value="Start-up, Young company" {{ $user->userDetails->company_status == 'Start-up, Young company' ? 'selected' : '' }}>Start-up, Young company</option>
                                    <option value="Enterprise, Government" {{ $user->userDetails->company_status == 'Enterprise, Government' ? 'selected' : '' }}>Enterprise, Government</option>
                                    <option value="Entity, Private Entity, Others" {{ $user->userDetails->company_status == 'Entity, Private Entity, Others' ? 'selected' : '' }}>Entity, Private Entity, Others</option>
                                    <option value="Other" {{ $user->userDetails->company_status == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('company_status') ? $errors->first('company_status') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Business Name</label>
                                <input type="text" class="form-control" name="business_name" placeholder="Enter business name" value="{{ $user->userDetails->business_name }}">
                                <span class="text-danger">{{ $errors->has('business_name') ? $errors->first('business_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Company Size</label>
                                <select class="form-control select2" name="company_size" data-placeholder="Select company size">
                                    <option value="01-10 Person" {{ $user->userDetails->company_size == '01-10 Person' ? 'selected' : '' }}>01-10 Person</option>
                                    <option value="15-50 Person" {{ $user->userDetails->company_size == '15-50 Person' ? 'selected' : '' }}>15-50 Person</option>
                                    <option value="51-100 Person" {{ $user->userDetails->company_size == '51-100 Person' ? 'selected' : '' }}>51-100 Person</option>
                                    <option value="501-1000 Person or more" {{ $user->userDetails->company_size == '501-1000 Person or more' ? 'selected' : '' }}>501-1000 Person or more</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('company_size') ? $errors->first('company_size') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Sector Speciality</label>
                                <select class="form-control select2" name="company_speciality" data-placeholder="Select company speciality">
                                    <option value="Event Management" {{ $user->userDetails->company_speciality == 'Event Management' ? 'selected' : '' }}>Event Management</option>
                                    <option value="Hospitals" {{ $user->userDetails->company_speciality == 'Hospitals' ? 'selected' : '' }}>Hospitals</option>
                                    <option value="Ecommerce industry" {{ $user->userDetails->company_speciality == 'Ecommerce industry' ? 'selected' : '' }}>Ecommerce industry</option>
                                    <option value="Food industry" {{ $user->userDetails->company_speciality == 'Food industry' ? 'selected' : '' }}>Food industry</option>
                                    <option value="Automobiles industry" {{ $user->userDetails->company_speciality == 'Automobiles industry' ? 'selected' : '' }}>Automobiles industry</option>
                                    <option value="Power industry" {{ $user->userDetails->company_speciality == 'Power industry' ? 'selected' : '' }}>Power industry</option>
                                    <option value="Garment and textiles" {{ $user->userDetails->company_speciality == 'Garment and textiles' ? 'selected' : '' }}>Garment and textiles</option>
                                    <option value="Financial institution" {{ $user->userDetails->company_speciality == 'Financial institution' ? 'selected' : '' }}>Financial institution</option>
                                    <option value="Agribusiness" {{ $user->userDetails->company_speciality == 'Agribusiness' ? 'selected' : '' }}>Agribusiness</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('company_speciality') ? $errors->first('company_speciality') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Select Services</label>
                                <select class="form-control select2" name="company_service" data-placeholder="Select company Service">
                                    <option value="Event Management" {{ $user->userDetails->company_service == 'Event Management' ? 'selected' : '' }}>Event Management</option>
                                    <option value="Hospitals" {{ $user->userDetails->company_service == 'Hospitals' ? 'selected' : '' }}>Hospitals</option>
                                    <option value="Ecommerce industry" {{ $user->userDetails->company_service == 'Ecommerce industry' ? 'selected' : '' }}>Ecommerce industry</option>
                                    <option value="Food industry" {{ $user->userDetails->company_service == 'Food industry' ? 'selected' : '' }}>Food industry</option>
                                    <option value="Automobiles industry" {{ $user->userDetails->company_service == 'Automobiles industry' ? 'selected' : '' }}>Automobiles industry</option>
                                    <option value="Power industry" {{ $user->userDetails->company_service == 'Power industry' ? 'selected' : '' }}>Power industry</option>
                                    <option value="Garment and textiles" {{ $user->userDetails->company_service == 'Garment and textiles' ? 'selected' : '' }}>Garment and textiles</option>
                                    <option value="Financial institution" {{ $user->userDetails->company_service == 'Financial institution' ? 'selected' : '' }}>Financial institution</option>
                                    <option value="Agribusiness" {{ $user->userDetails->company_service == 'Agribusiness' ? 'selected' : '' }}>Agribusiness</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('company_service') ? $errors->first('company_service') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Trade license Number</label>
                                <input type="text" name="trade_license_no" value="{{ $user->userDetails->trade_license_no }}" class="form-control" placeholder="Trade license Number" />
                                <span class="text-danger">{{ $errors->has('trade_license_no') ? $errors->first('trade_license_no') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label  >Trade license File</label>
                                <input type="file" name="user_document_files[]" multiple class="form-control" />
                                <span class="text-danger">{{ $errors->has('user_document_files') ? $errors->first('user_document_files') : '' }}</span>
                                @if(!empty($user))

                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @elseif(auth()->user()->user_role_type == 1)
                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" value="{{ $user->userDetails->first_name }}">
                                <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" value="{{ $user->userDetails->last_name }}">
                                <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter your company official email" value="{{ $user->email }}">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ $user->userDetails->phone }}">
                                <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Profile Image</label>
                                <input type="file" name="profile_image" class="form-control" accept="image/*">
                                <span class="text-danger">{{ $errors->has('profile_image') ? $errors->first('profile_image') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Date of Birth</label>
                                <input type="text" class="form-control" name="dob" id="datepicker" value="{{ !empty($user->userDetails->userDetails->dob) ? $user->userDetails->userDetails->dob->format('m/d/Y') : date('m/d/Y') }}" />
                                <span class="text-danger">{{ $errors->has('dob') ? $errors->first('dob') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Gender</label>
                                <select name="gender" class="form-control select2" data-placeholder="Select your gender">
                                    <option></option>
                                    <option value="male" {{ $user->userDetails->gender == 'male' ? "selected" : '' }}>Male</option>
                                    <option value="female" {{ $user->userDetails->gender == 'female' ? "selected" : '' }}>Female</option>
                                    <option value="other" {{ $user->userDetails->gender == 'other' ? "selected" : '' }}>Other</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('gender') ? $errors->first('gender') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Skills</label>
                                <select name="skills[]" multiple class="form-control select2" data-placeholder="Select your skills">
                                    <option></option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}" @if(!empty($user->skills)) @foreach($user->skills as $userSkill) @if($userSkill->id == $skill->id) selected @endif @endforeach @endif>{{ $skill->skill_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('skills') ? $errors->first('skills') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Location</label>
                                <select name="country" class="form-control select2" data-placeholder="Select a country">
                                    <option></option>
                                    <option value="United Arab Emirates" selected>UNITED ARAB EMIRATES</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('country') ? $errors->first('country') : '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Emirate State Name</label>
                                <select name="emirate_state_name" id="" class="form-control select2" data-placeholder="Select a state Name">
                                    <option></option>
                                    <option value="Abu Dhabi" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Abu Dhabi' ? 'selected' : '' }}>Abu Dhabi</option>
                                    <option value="Dubai" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                    <option value="Sharjah" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Sharjah' ? 'selected' : '' }}>Sharjah</option>
                                    <option value="Ajman" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Ajman' ? 'selected' : '' }}>Ajman</option>
                                    <option value="Fujairah" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Fujairah' ? 'selected' : '' }}>Fujairah</option>
                                    <option value="Ras Al-Khaimah" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Ras Al-Khaimah' ? 'selected' : '' }}>Ras Al-Khaimah</option>
                                    <option value="Umm al Quwain" {{ !empty($user->userDetails->emirate_state_name) && $user->userDetails->emirate_state_name == 'Umm al Quwain' ? 'selected' : '' }}>Umm al Quwain</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('emirate_state_name') ? $errors->first('emirate_state_name') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Are you</label>
                                <select class="form-control select2" name="company_status" data-placeholder="Select an option">
                                    <option value="High School Graduate" {{ $user->userDetails->company_status == 'High School Graduate' ? 'selected' : '' }}>High School Graduate</option>
                                    <option value="University Student" {{ $user->userDetails->company_status == 'University Student' ? 'selected' : '' }}>University Student</option>
                                    <option value="Fresh Graduate" {{ $user->userDetails->company_status == 'Fresh Graduate' ? 'selected' : '' }}>Fresh Graduate</option>
                                    <option value="Other" {{ $user->userDetails->company_status == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('company_status') ? $errors->first('company_status') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >University or School</label>
                                <select class="form-control select2" name="university_name" data-placeholder="Select University or School">
                                    <option value="Zayed University - Abu Dhabi" {{ $user->userDetails->university_name == 'Zayed University - Abu Dhabi' ? 'selected' : '' }}>Zayed University - Abu Dhabi</option>
                                    <option value="Zayed University - Dubai" {{ $user->userDetails->university_name == 'Zayed University - Dubai' ? 'selected' : '' }}>Zayed University - Dubai</option>
                                    <option value="Khalifa University of Science and Technology" {{ $user->userDetails->university_name == 'Khalifa University of Science and Technology' ? 'selected' : '' }}>Khalifa University of Science and Technology</option>
                                    <option value="Abu Dhabi University" {{ $user->userDetails->university_name == 'Abu Dhabi University' ? 'selected' : '' }}>Abu Dhabi University</option>
                                    <option value="United Arab Emirates University" {{ $user->userDetails->university_name == 'United Arab Emirates University' ? 'selected' : '' }}>United Arab Emirates University</option>
                                    <option value="Fatima College Of Health Sciences" {{ $user->userDetails->university_name == 'Fatima College Of Health Sciences' ? 'selected' : '' }}>Fatima College Of Health Sciences</option>
                                    <option value="NYU Abu Dhabi" {{ $user->userDetails->university_name == 'NYU Abu Dhabi' ? 'selected' : '' }}>NYU Abu Dhabi</option>
                                    <option value="Higher Colleges of Technology" {{ $user->userDetails->university_name == 'Higher Colleges of Technology' ? 'selected' : '' }}>Higher Colleges of Technology</option>
                                    <option value="Sorbonne University, Abu Dhabi" {{ $user->userDetails->university_name == 'Sorbonne University, Abu Dhabi' ? 'selected' : '' }}>Sorbonne University, Abu Dhabi</option>
                                    <option value="United Arab Emirates University" {{ $user->userDetails->university_name == 'United Arab Emirates University' ? 'selected' : '' }}>United Arab Emirates University</option>
                                    <option value="Ajman University" {{ $user->userDetails->university_name == 'Ajman University' ? 'selected' : '' }}>Ajman University</option>
                                    <option value="American University of Sharjah" {{ $user->userDetails->university_name == 'American University of Sharjah' ? 'selected' : '' }}>American University of Sharjah</option>
                                    <option value="Other" {{ $user->userDetails->university_name == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('university_name') ? $errors->first('university_name') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Emirates ID No.</label>
                                <input type="text" name="emirates_id_no" class="form-control" value="{{ $user->userDetails->emirates_id_no }}" placeholder="Emirate ID Number" />
                                <span class="text-danger">{{ $errors->has('emirates_id_no') ? $errors->first('emirates_id_no') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label  >Upload Emirates ID</label>
                                <input type="file" name="user_document_files[]" multiple class="form-control" />
                                <span class="text-danger">{{ $errors->has('user_document_files') ? $errors->first('user_document_files') : '' }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="big_form_group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label  >About Student</label>
                                <textarea class="form-control" name="description"></textarea>
                                <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group row">
                <div  class="col-md-8 mx-auto text-center">
                    <button type="submit" class="btn btn-primary">{{ auth()->user()->submit_status == 0 ? 'Submit Profile' : 'Update' }}</button>
                </div>
            </div>

        </form>
    </div>

@endsection

@section('script')
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection
