<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('/') }}frontend/assets/images/logo/Logo -orange.svg" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}frontend/assets/images/logo/Logo Icon-Orange.svg" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('/') }}backend/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}backend/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Menu Options</li>
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Only for admin</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#RolePermission" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Role Management </span>
                </a>
                <div class="collapse" id="RolePermission">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('permissions.index') }}">Permission</a>
                        </li>
                        <li>
                            <a href="{{ route('roles.index') }}">Role</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#skillManagement" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Skill Management </span>
                </a>
                <div class="collapse" id="skillManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('skills-category.index') }}">Skills Category</a>
                        </li>
                        <li>
                            <a href="{{ route('skills-sub-category.index') }}">Skills Sub Category</a>
                        </li>
                        <li>
                            <a href="{{ route('skills.index') }}">Skills</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#jobPostManagement" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Job Management </span>
                </a>
                <div class="collapse" id="jobPostManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('job-questions.index') }}">Job Questions</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#userManagement" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> User Management </span>
                </a>
                <div class="collapse" id="userManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="">Buyer</a>
                        </li>
                        <li>
                            <a href="">Seller</a>
                        </li>
                        <li>
                            <a href="">Trainer</a>
                        </li>
                        <li>
                            <a href="">User</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Logout </span>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
