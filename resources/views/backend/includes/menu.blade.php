<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('/') }}backend/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}backend/assets/images/logo_sm.png" alt="" height="16">
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
                <a data-bs-toggle="collapse" href="#userManagement" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> User Management </span>
                </a>
                <div class="collapse" id="userManagement">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="">Admin</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('settings.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Settings </span>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
