    <!-- Sidebar Container -->
    <aside class="main-sidebar elevation-1 transpa">
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
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('staff.dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>


                            <li class="nav-item">
                                <a href="{{ route('staff.requirement_bins.show')}}" class="nav-link">
                                    <i class="nav-icon fa-solid fa-bookmark"></i>
                                    <p class="p-drop">Requirements Bin</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('staff.activities.show')}}" class="nav-link">
                                    <i class="nav-icon fa-solid fa-flag"></i>
                                    <p class="p-drop">Activity</p>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ route('staff.class_schedule')}}" class="nav-link">
                                    <i class="fa-solid fa-users-line nav-icon"></i>
                                    <p class="p-drop">Class Schedule</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('staff.class_observation')}}" class="nav-link">
                                    <i class="fa-solid fa-users-gear nav-icon"></i>
                                    <p class="p-drop">Class Observation</p>
                                </a>
                            </li> --}}

                    <li class="nav-item">
                        <a href="{{ route('staff.reports')}}" class="nav-link">
                            <i class="nav-icon fa-solid fa-book-bookmark"></i>
                            <p>
                                Reports
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
