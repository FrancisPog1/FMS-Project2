@extends('layouts.master')


{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row-col-sm-6 mb-2">
                        <div class="col-md-6 ml-4">
                            <h1 class="m-0">Activity Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>


            {{-- DATA TABLE --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Activities/data_table')

            {{-- EDIT MODAL --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Activities/edit_modal')

            {{-- VIEW MODAL --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Activities/view_modal')

            {{-- CREATE MODAL --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Activities/create_modal')

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

    {{-- SCRIPTS --}}
    @include('Academic_head/AcadHead_Setup/AcadHead_Activities/activities_scripts')
@endsection
