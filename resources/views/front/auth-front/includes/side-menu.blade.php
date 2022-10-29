<div class="sidebar">
    <ul class="user_navigation">
        <li  >
            <a href="find-staff.html"><i class="fas fa-search"></i> Find Staff </a>
            <a class="filter_btn" href="#sidebar_filter_option">
                <i class="fas fa-filter"></i>
                <i class="fas fa-times"></i>
            </a>
        </li>
        <li>
            <form id="#sidebar_filter_option" class="filter_option">
                <div class="form-group">
                    <label>Location</label>
                    <div class="field">
                        <i class="fas fa-map-marker-alt"></i>
                        <select class="js-example-basic-single" name="state">
                            <option value="AL">ALABAMA</option>
                            <option value="WY">WYOMING</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keywords</label>
                    <div class="field">
                        <i class="fas fa-briefcase"></i>
                        <select class="js-example-basic-single" name="state">
                            <option value="AL">e.g. job title</option>
                            <option value="WY">Title 1</option>
                            <option value="WY">Title 2</option>
                            <option value="WY">Title 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <div class="field">
                        <i class="fas fa-briefcase"></i>
                        <select class="js-example-basic-single" name="state">
                            <option>Admin Support</option>
                            <option>Customer Service</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Salary</label>
                    <div class="field">
                        <input type="text" placeholder="e.g. 10k" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <div class="field">
                        <div class="form-group custom_checkboxes">
                            <label class="custom_checkbox" for="tag-1">
                                <input type="checkbox" name="usertype" id="tag-1" value="job seeker">
                                <span><i class="fas fa-check"></i>PHP</span>
                            </label>
                            <label class="custom_checkbox" for="tag-2">
                                <input type="checkbox" name="usertype" id="tag-2" value="employer">
                                <span><i class="fas fa-check"></i> MySQL</span>
                            </label>
                            <label class="custom_checkbox" for="tag-3">
                                <input type="checkbox" name="usertype" id="tag-3" value="employer">
                                <span><i class="fas fa-check"></i> API</span>
                            </label>
                            <label class="custom_checkbox" for="tag-4">
                                <input type="checkbox" name="usertype" id="tag-4" value="employer">
                                <span><i class="fas fa-check"></i> react</span>
                            </label>
                            <label class="custom_checkbox" for="tag-5">
                                <input type="checkbox" name="usertype" id="tag-5" value="employer">
                                <span><i class="fas fa-check"></i> design</span>
                            </label>
                        </div>
                    </div>
                </div>

            </form>
        </li>
        <li class="is-active" >
            <a href="{{ route('client.dashboard') }}">
                <i class="fas fa-border-all"></i> Client Dashboard </a>
        </li>
    </ul>
    <h5>Organize and Manage</h5>
    <ul class="user_navigation">
        <li >
            <a href="{{ route('client.job-post.create') }}"><i class="fas fa-paper-plane"></i> Post Job</a>
        </li>
        <li>
            <a href="{{ route('client.job-post.index') }}"><i class="far fa-list-alt"></i> My job listings</a>
        </li>


    </ul>
    <h5>Account</h5>
    <ul class="user_navigation">
        <li>
            <a href="emp-edit-profile.html"><i class="fas fa-user"></i> Update My Profile</a>
        </li>
        <li >
            <a href="emp-edit-password.html"><i class="fas fa-key"></i>Change Password</a>
        </li>
        <li>
            <a href="#"><i class="fas fa-power-off"></i> Logout</a>
        </li>
    </ul>
</div>
