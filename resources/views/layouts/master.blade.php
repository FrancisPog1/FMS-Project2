<!DOCTYPE html>
<html>

<head>
<<<<<<< HEAD
    <!-- Title with PUP logo -->
    <link rel="icon" href="{{ asset('img/pup.png') }}" />
    <title>PUPQC | Faculty Records and Monitoring System</title>

=======
        <!-- Title with PUP logo -->
        <link rel="icon" href="{{ ('/img/pup.png') }}" />
        <title>PUPQC | Faculty Records and Monitoring System</title>
>>>>>>> 1734f1ebdcd5bab45f905e945459ccebba1b2c5d

    @yield('head')

    {{-- CSS DEPENDENCIES --}}
    @include('layouts.Dependencies.CSS_dependencies')

    {{-- HEAD JS DEPENDENCIES --}}
    @include('layouts.Dependencies.HEAD_JS_dependencies')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<<<<<<< HEAD
    {{-- TOP NAVBAR --}}
    @include('NavigationBar.AcadHead_Navbars.Top_NavBar')

    {{-- LEFT NAVBAR --}}
    @include('NavigationBar.AcadHead_Navbars.Left_NavBar')

    @yield('content')

=======
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('/img/pup.png') }}" height="60" width="60">
        </div>

        {{-- TOP NAVBAR --}}
        @include('NavigationBar.AcadHead_Navbars.Top_NavBar')

        {{-- LEFT NAVBAR --}}
        @include('NavigationBar.AcadHead_Navbars.Left_NavBar')

        {{-- CONTENTS --}}
        @yield('content')

    </div>

>>>>>>> 1734f1ebdcd5bab45f905e945459ccebba1b2c5d
    {{-- BODY JS DEPENDENCIES --}}
    @include('layouts.Dependencies.BODY_JS_dependencies')


</body>
<<<<<<< HEAD

=======
>>>>>>> 1734f1ebdcd5bab45f905e945459ccebba1b2c5d
</html>
