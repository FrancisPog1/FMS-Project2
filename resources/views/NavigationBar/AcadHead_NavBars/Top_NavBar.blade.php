<!-- Top Navigation -->
<nav class="main-header navbar navbar-expand">
    <!-- Left -->
    <ul class="navbar-nav mt-2">
        <li class="nav-item except text-pal-1" >
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
            style="color: var(--text-pal-1);">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right -->
    <ul class="navbar-nav ml-auto">

        <!-- Message Dropdown Menu -->
        <li class="nav-item dropdown text-pal-1">
            <a class="nav-link" data-toggle="dropdown" href="#" style="color: var(--text-pal-1); transform: none !important;">
                <i class="mt-2 far fa-envelope-open" style="font-size: 1.3em"></i>
                <span class="badge badge-primary navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">3 Messages</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> ...
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> ....
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> ...
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown text-pal-1">
            <a class="nav-link" data-toggle="dropdown" href="#" style="color: var(--text-pal-1); transform: none !important;">
                <i class="mt-2 far fa-bell" style="font-size: 1.3em"></i>
                <span class="badge badge-warning navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">3 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> ...
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> ....
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> ...
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <!-- User Panel -->
        <div id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
            class="user-panel d-flex" style="cursor: pointer;">
            <div class="image mt-2">
                <img src="https://lh3.googleusercontent.com/a-/ACB-R5SPNI6x5R3YO5R7LcdJlXMQGtn6kMwaDgvvu2S6=s40-c"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info m-auto">
                <a href="#" class="d-block text-bold text-pal-1">Demelyn Monzon</a>
                <span class="d-block text-regular text-pal-1" style="font-size: .8rem;">Academic Head</span>
            </div>
        </div>

        <!-- Profile Dropdown -->
        <div id="dropdownHover" class="z-10 hidden pal-1 divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                <a href="{{ route('admin.my_profile.show') }}" class="block px-4 py-2 text-white">Profile</a>
                </li>
                <li>
                    <a id="show-modal-logout" class="block px-4 py-2 text-white"><button>Log out</button></a>

                </li>
            </ul>
        </div>
    </ul>
</nav>
