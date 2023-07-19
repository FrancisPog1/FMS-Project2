@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')



<div class="wrapper">

    <!-- Content Wrapper. Outer Container -->
    <div class="content-wrapper">

        <br>
      <!-- Content Header -->
      @include('Academic_head/AcadHead_Setup/AcadHead_Reports/reports_header')


        <!-- Content Body -->
        <div class="card-body">

         <!-- Menu toggle -->
         @include('Academic_head/AcadHead_Setup/AcadHead_Reports/menu_toggle')

            <!-- Table Header -->
            @include('Academic_head/AcadHead_Setup/AcadHead_Reports/table_header')

            <!-- Actual Table    -->
            <div class="tab-content" id="custom-content-above-tabContent">

                {{-- Attendance Reports --}}
                @include('Academic_head/AcadHead_Setup/AcadHead_Reports/attendance_reports')

                <!-- Class Observation Reports -->
                @include('Academic_head/AcadHead_Setup/AcadHead_Reports/observation_reports')


                <!-- Submission Reqs Reports -->
                @include('Academic_head/AcadHead_Setup/AcadHead_Reports/submission_reports')


                <!-- Activity Reports -->
                @include('Academic_head/AcadHead_Setup/AcadHead_Reports/activity_reports')

            </div>
        </div>
    </div>

        <!-- Content Footer -->
        <footer class="main-footer">
            <strong>Faculty Records & Monitoring System &copy; 2024 <a
                    href="https://pup.edu.ph">PUPQC.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
</div>

<!-- Local script for warning modals -->
<script src="{{ asset('js/farms.swal.warning.modal.js') }}"></script>

<!-- Script for Date picker -->
<script src="{{ asset('js/farms.datepicker.js') }}"></script>

<style>
    #card-body-1 {
        padding: 0.1rem;
        margin-left: 10px;
    }
    </style>

@endsection

