<!-- Title with PUP logo -->
<link rel="icon" href="{{ asset('images/pup.png') }}" />

<title>PUPQC | Faculty Records and Monitoring System</title>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <div class="main-sidebar elevation-1 transpa">
            <!-- PUP Logo -->
            <a href="#" class="brand-link" style="height: 70px;">
                <div class="mt-2">
                    <img src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png" class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-bolder" style="color: var(--pallete-4);">PUPQC-FARMS</span>
                </div>
            </a>

            <!-- Sidebar Menu -->
            <div class="sidebar">
                <div class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard.show')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-gear"></i>
                                <p>
                                    Administrator
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.show')}}" class="nav-link">
                                        <i class="fa-solid fa-scroll nav-icon"></i>
                                        <p class="p-drop">System Role</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.users.show')}}" class="nav-link">
                                        <i class="fa-solid fa-user-plus nav-icon"></i>
                                        <p class="p-drop">System Users</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.ranks.show')}}" class="nav-link">
                                        <i class="fa-solid fa-medal nav-icon"></i>
                                        <p class="p-drop">Academic Rank</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.faculty_types.show')}}" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p class="p-drop">Faculty Type</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.show')}}" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p class="p-drop">Requirement Category</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('admin.requirement_types.show')}}" class="nav-link">
                                        <i class="fas fa-folder-plus nav-icon"></i>
                                        <p class="p-drop">Requirement Type</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.activity_types.show')}}" class="nav-link">
                                        <i class="fa-regular fa-folder-open nav-icon"></i>
                                        <p class="p-drop">Activity Type</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.designations.show')}}" class="nav-link">
                                        <i class="fa-solid fa-thumbtack nav-icon"></i>
                                        <p class="p-drop">Designation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.programs.show')}}" class="nav-link">
                                        <i class="fa-solid fa-graduation-cap nav-icon"></i>
                                        <p class="p-drop">Programs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.specializations.show')}}" class="nav-link">
                                        <i class="fa-solid fa-wand-sparkles nav-icon"></i>
                                        <p class="p-drop">Specialization</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    Academic head
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.requirement_bins.show')}}" class="nav-link">
                                        <i class="fas fa-folder nav-icon"></i>
                                        <p class="p-drop">Requirement Bins</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.monitor_faculties.show')}}" class="nav-link">
                                        <i class="fas fa-folder nav-icon"></i>
                                        <p class="p-drop">Monitor Faculties</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('admin.activities.show')}}" class="nav-link">
                                        <i class="fas fa-sticky-note nav-icon"></i>
                                        <p class="p-drop">Activity</p>
                                    </a>
                                </li>


                                {{-- <li class="nav-item">
                                    <a href="{{ route('admin.announcements.show')}}" class="nav-link">
                                        <i class="fas fa-bullhorn nav-icon"></i>
                                        <p class="p-drop">Announcements</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.class_schedules.show')}}" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p class="p-drop">Class Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.class_observations.show')}}" class="nav-link">
                                        <i class="fas fa-list-ol nav-icon"></i>
                                        <p class="p-drop">Class Observation</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('admin.reports.show')}}" class="nav-link">
                                        <i class="fas fa-clipboard nav-icon"></i>
                                        <p class="p-drop">Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
