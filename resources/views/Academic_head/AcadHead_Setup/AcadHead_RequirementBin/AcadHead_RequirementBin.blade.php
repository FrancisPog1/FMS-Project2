@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">


            {{-- DATA TABLE --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_RequirementBin/data_table')

            {{-- EDIT MODAL --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_RequirementBin/edit_modal')

            {{-- CREATE MODAL --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_RequirementBin/create_modal')


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
    @include('Academic_head/AcadHead_Setup/AcadHead_RequirementBin/requirementbin_scripts')
@endsection
