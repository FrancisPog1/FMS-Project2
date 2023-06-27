@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            {{-- Data Table --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/monitor_reqs_dataTable')


            {{-- Validate Modal --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/validate_modal')


            <div class="d-flex justify-content-between">
                <a href="{{ route('acadhead_RequirementAssignees', $req_bin_id) }}" class="btn btn-outline-danger btn-lg"
                    id="lower_button">Back</a>

                <form action="{{ route('acadhead_ReviewRequirements', $assigned_bin_id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-lg" id="lower_button">Mark as Reviewed</button>
                </form>
            </div>
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



    {{-- Scripts --}}
    @include('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/monitor_reqs_scripts')
@endsection
