<!-- Title with PUP logo -->
<link rel="icon" href="{{ asset('images/pup.png') }}" />

<title>PUPQC | Faculty Records and Monitoring System</title>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">


        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <div class="spinner-border text-danger" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div> --}}

        <!-- Main Sidebar Container -->
        <div class="main-sidebar elevation-1 transpa">
            <!-- PUP Logo -->
            <a href="#" class="brand-link" style="height: 70px;">
                <div class="mt-2">
                    <img src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png" class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-bolder" style="color: var(--pallete-4);">PUPQC-FARMS</span>
                </div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <div class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="AcadHead_Dashboard" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-lock"></i>
                                <p>
                                    Administrator
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Role" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p class="p-drop">System Role</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="AddUser" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p class="p-drop">Add User</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="AcadHead" class="nav-link">
                                        <i class="far fa-star nav-icon"></i>
                                        <p class="p-drop">Academic Rank</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="FacultyType" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p class="p-drop">Faculty Type</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="RequirementType" class="nav-link">
                                        <i class="fas fa-folder-plus nav-icon"></i>
                                        <p class="p-drop">Requirement Type</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="ActivityType" class="nav-link">
                                        <i class="fas fa-envelope-open-text nav-icon"></i>
                                        <p class="p-drop">Activity Type</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="Designation" class="nav-link">
                                        <i class="fas fa-user-graduate nav-icon"></i>
                                        <p class="p-drop">Designation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Program" class="nav-link">
                                        <i class="fas fa-archive nav-icon"></i>
                                        <p class="p-drop">Programs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Specialization" class="nav-link">
                                        <i class="fas fa-hat-wizard nav-icon"></i>
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
                                    <a href="RequirementBin" class="nav-link">
                                        <i class="fas fa-folder nav-icon"></i>
                                        <p class="p-drop">Requirement Bins</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="AcadHead_Activities" class="nav-link">
                                        <i class="fas fa-sticky-note nav-icon"></i>
                                        <p class="p-drop">Activity</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-bullhorn nav-icon"></i>
                                        <p class="p-drop">Announcement</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="ClassSchedule" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p class="p-drop">Class Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ClassObservation" class="nav-link">
                                        <i class="fas fa-list-ol nav-icon"></i>
                                        <p class="p-drop">Class Observation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Reports" class="nav-link">
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
