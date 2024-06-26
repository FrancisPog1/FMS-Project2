<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUPQC | Faculty Records and Monitoring System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('css/farms.min.css') }}">

    <!-- Pallete style -->
    <link rel="stylesheet" href="{{ asset('css/farms.pallete.css') }}">

</head>

<body>

    <style>
        body {
            overflow: hidden;
        }

        .card {
            height: 100vh;
            display: flex;
            flex-direction: column;
            border-style: none;
        }

        .card-body {
            flex-grow: 1;
        }
    </style>
    <!-- For main content -->
    <div class="container-fluid">
        <div class="row justify-content-between">
            <!-- Dashboard left side -->
            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 pal-1
                                                                text-col-2
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-user-shield"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Academic
                                                                Heads</span>
                                                            <span class="info-box-number">
                                                                0
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-folder"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Faculty
                                                                Bin
                                                                Percentage</span>
                                                            <span class="info-box-number">
                                                                0
                                                                <small>%</small>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                pal-1
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-user-graduate"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">University
                                                                Directors</span>
                                                            <span class="info-box-number">
                                                                0
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                pal-1
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-user-friends"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Total
                                                                Meetings</span>
                                                            <span class="info-box-number">
                                                                0
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                pal-1
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-users-cog"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Staff
                                                                & Checkers</span>
                                                            <span class="info-box-number">
                                                                0
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                pal-1
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-flag"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Total
                                                                Activities</span>
                                                            <span class="info-box-number">
                                                                0
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                pal-1
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-user-plus"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Total
                                                                Faculty
                                                                Members</span>
                                                            <span class="info-box-number">
                                                                0
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="info-box">
                                                        <span
                                                            class="info-box-icon
                                                                pal-1 text-col-2
                                                                pal-1
                                                                elevation-1"><i
                                                                class="fas
                                                                    fa-clipboard-list"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Reports
                                                                Status</span>
                                                            <span class="info-box-number">
                                                                0 <small>%</small>
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-center">
                                            <strong>Monitoring Status: 1
                                                Jan, 2024 - 30 Nov, 2024</strong>
                                        </p>

                                        <div class="chart">
                                            <canvas id="salesChart" height="180"
                                                style="height:
                                                    180px;"></canvas>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <strong>Goal Completion</strong>
                                        </p>

                                        <div class="progress-group">
                                            Overall Progress
                                            <span class="float-right"><b>80</b>/100</span>
                                            <div
                                                class="progress
                                                    progress-sm">
                                                <div class="progress-bar
                                                        bg-primary"
                                                    style="width: 80%"></div>
                                            </div>
                                        </div>


                                        <div class="progress-group">
                                            Submitted Requirement Bin
                                            <span class="float-right"><b>310</b>/400</span>
                                            <div
                                                class="progress
                                                    progress-sm">
                                                <div class="progress-bar
                                                        bg-success"
                                                    style="width: 75%"></div>
                                            </div>
                                        </div>


                                        <div class="progress-group">
                                            <span class="progress-text">Activity
                                                Statuses</span>
                                            <span class="float-right"><b>30</b>/50</span>
                                            <div
                                                class="progress
                                                    progress-sm">
                                                <div class="progress-bar
                                                        bg-warning"
                                                    style="width: 60%"></div>
                                            </div>
                                        </div>


                                        <div class="progress-group">
                                            Monthly Reports
                                            <span class="float-right"><b>30</b>/500</span>
                                            <div
                                                class="progress
                                                    progress-sm">
                                                <div class="progress-bar
                                                        bg-danger"
                                                    style="width:
                                                        10%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div
                                            class="description-block
                                                border-right">
                                            <span
                                                class="description-percentage
                                                    text-success"><i
                                                    class="fas
                                                        fa-caret-up"></i>
                                                80%</span>
                                            <h5 class="description-header">Overall</h5>
                                            <span class="description-text">Progress</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div
                                            class="description-block
                                                border-right">
                                            <span
                                                class="description-percentage
                                                    text-danger"><i
                                                    class="fas
                                                        fa-caret-down"></i>
                                                30%</span>
                                            <h5 class="description-header">Per
                                                term</h5>
                                            <span class="description-text">Reports</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div
                                            class="description-block
                                                border-right">
                                            <span
                                                class="description-percentage
                                                    text-success"><i
                                                    class="fas
                                                        fa-caret-up"></i>
                                                20%</span>
                                            <h5 class="description-header">Requirement</h5>
                                            <span class="description-text">Requirement</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block">
                                            <span
                                                class="description-percentage
                                                    text-warning"><i
                                                    class="fas
                                                        fa-caret-down"></i>
                                                38%</span>
                                            <h5 class="description-header">GOAL</h5>
                                            <span class="description-text">COMPLETIONS</span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Login right side -->
            <div class="col-3">
                <div class="container">
                    <div class="card">
                        <div class="card-body my-lg-5" style="background-color: #fff;">
                            <div class="text-center">
                                <img alt="PUP" class="img-circle"
                                    src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png">
                            </div>

                            <h5 class="text-center">Welcome to</h5>
                            <h1 class="text-center"
                                style="font-size:
                                    2.5rem; font-display: fl;">
                                <b>FARMS</b><span style="font-size: 12px;">
                                    v2</span>
                                <span class="">
                                    <p class="text-muted" style="font-size: .8rem;">PUPQC-Faculty
                                        Monitoring System</p>
                                </span>

                            </h1>
                        </div>

                        <!--Error Message-->
                        <span class="text-danger text-center">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger text-center">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="card-body">
                            <p class="text-muted text-center" style="font-size: .8rem;">
                                Sign in to start your session</p>

                            <form action="{{ route('login_user') }}" method="post">
                                @csrf
                                <input id="email" type="email" class="form-control
                                        mb-2" name="email"
                                    placeholder="Email" :value="old('email')" required autofocus
                                    autocomplete="username">


                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required autocomplete="current-password">


                                {{-- <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                    </label>
                                </div> --}}

                                {{-- <div class="row btn-group mt-lg-12"> --}}
                                    {{-- <div class="col-9">
                                        @if (Route::has('password.request'))
                                            <a id="show-modal" class="btn btn-danger d-inline-block m-0"
                                                href="{{ route('password.request') }}">Forgot Password</a>
                                        @endif
                                    </div> --}}

                                    <div class="col-lg-12 mt-4">
                                        <button class="btn btn-primary d-inline-block col-12" type="submit">
                                            Login
                                        </button>
                                    </div>
                                {{-- </div> --}}
                            </form>
                        </div>
                        <div class="card-footer text-muted my-3"
                            style="font-size: .6rem; background-color:
                                white;">
                            <div class="text-center">
                                PUP QUEZON CITY - FACULTY MONITORING SYSTEM
                                @2023
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('js/farms.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <!-- FARMS DB 2 -->
    <script src="{{ asset('js/pages/dashboard2.js') }}"></script>

    <!-- SWEETALERTS SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Local script for warning modals -->
    <script src="{{ asset('js/farms.swal.warning.modal.js') }}"></script>

    <!-- Local script for success modals -->
    <script src="{{ asset('js/farms.swal.success.modal.js') }}"></script>

</body>
