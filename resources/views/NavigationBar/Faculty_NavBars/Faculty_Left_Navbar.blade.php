<!-- Sidebar Container -->
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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('faculty.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" style="cursor: pointer !important;">
                        <i class="nav-icon fa-sharp fa-solid fa-people-group"></i>
                        <p> Class Setup<i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('faculty.class_schedule') }}" class="nav-link">
                                <i class="fa-regular fa-note-sticky nav-icon"></i>
                                <p class="p-drop">Class Schedule</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faculty.class_observation') }}" class="nav-link">
                                <i class="fa-solid fa-location-pin nav-icon"></i>
                                <p class="p-drop">Class Observation</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}

                {{-- <li class="nav-item">
                    <a href="{{ route('faculty.class_schedule') }}" class="nav-link">
                        <i class="fa-regular fa-note-sticky nav-icon"></i>
                        <p class="p-drop">Class Schedule</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faculty.class_observation') }}" class="nav-link">
                        <i class="fa-solid fa-location-pin nav-icon"></i>
                        <p class="p-drop">Class Observation</p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('faculty.requirement_bins.show') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-bookmark"></i>
                        <p>
                            Requirement Bin
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('faculty.activities') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-flag"></i>
                        <p>
                            Activities
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('faculty.reports') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-book-bookmark"></i>
                        <p>
                            Reports
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
