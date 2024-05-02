<!DOCTYPE html>
<html>

<head>
    <!-- Title with PUP logo -->
    <link rel="icon" href="{{ asset('img/pup.png') }}" />
    <title>PUPQC | Faculty Records and Monitoring System</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')

    {{-- CSS DEPENDENCIES --}}
    @include('layouts.Dependencies.CSS_dependencies')

    {{-- HEAD JS DEPENDENCIES --}}
    @include('layouts.Dependencies.HEAD_JS_dependencies')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- TOP NAVBAR --}}
        @include('NavigationBar.Staff_Navbars.Staff_Top_NavBar')

        {{-- LEFT NAVBAR --}}
        @include('NavigationBar.Staff_Navbars.Staff_Left_NavBar')

        {{-- CONTENTS --}}
        @yield('content')

    </div>

    {{-- MODAL CONTENTS --}}
    @yield('modal_content')

    {{-- BODY JS DEPENDENCIES --}}
    @include('layouts.Dependencies.BODY_JS_dependencies')

    {{-- JS CONTENTS --}}
    @yield('js_content')
</body>

</html>
