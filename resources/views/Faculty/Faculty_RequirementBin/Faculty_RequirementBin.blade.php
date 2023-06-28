@extends('layouts.Faculty_master')
{{-- CONTENTS --}}
@section('content')
    <!-- Content Wrapper. Outer Container -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row-col-sm-6 mb-2">
                    <div class="col-md-6 ml-4">
                        <h1 class="m-0">Requirement Bin</h1>
                    </div>
                </div>
            </div>
        </div>


        {{-- DATA TABLE --}}
        @include('Faculty/Faculty_RequirementBin/data_table')


    </div>

    <!-- Footer Container -->
    <footer class="main-footer">
        <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.2.0
        </div>
    </footer>


    {{-- SCRIPTS --}}
    @include('Faculty/Faculty_RequirementBin/requirementbin_scripts')
@endsection
