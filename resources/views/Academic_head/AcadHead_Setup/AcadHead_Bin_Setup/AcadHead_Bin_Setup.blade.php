@extends('layouts.master')

@section('content')
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center
                    align-items-center">
            <img class="animation__shake" src="img/pup.png" height="60" width="60">
        </div>
        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            {{-- Data TABLE --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/data_table')

            {{-- View Modal --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/view_modal')

            {{-- Edit Modal --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/edit_modal')

            {{-- Create Modal --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/create_modal')

            {{-- Assign Modal --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/assign_modal')

            {{-- Restore Modal --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/restore_modal')


        </div>

        <!-- Footer Container -->
        <footer class="main-footer">
            <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
    </div>

    {{-- Edit Modal --}}
    @include('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/bin_setup_scripts')
@endsection
