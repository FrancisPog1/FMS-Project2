<!DOCTYPE html>
<html>

<head>
    <!-- Title with PUP logo -->
    <link rel="icon" href="{{ asset('img/pup.png') }}" />
    <title>PUPQC | Faculty Records and Monitoring System</title>

    {{-- Iadded this code to fix the error in the csrf token in the requirementbin setupp age ->Assign modal scripts --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @yield('head')

    {{-- CSS DEPENDENCIES --}}
    @include('layouts.Dependencies.CSS_dependencies')

    {{-- HEAD JS DEPENDENCIES --}}
    @include('layouts.Dependencies.HEAD_JS_dependencies')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    {{-- TOP NAVBAR --}}
    @include('NavigationBar.AcadHead_Navbars.Top_NavBar')

    {{-- LEFT NAVBAR --}}
    @include('NavigationBar.AcadHead_Navbars.Left_NavBar')

    {{-- CONTENT OF THE PAGE --}}
    @yield('content')

    {{-- MODAL CONTENTS --}}
    @yield('modal_content')

    {{-- BODY JS DEPENDENCIES --}}
    @include('layouts.Dependencies.BODY_JS_dependencies')

    {{-- JS CONTENTS --}}
    @yield('js_content')
</body>
</html>
