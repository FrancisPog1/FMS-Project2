@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mt-5 ml-5">
                        <div class="col">
                            <h1 class="m-0">Requirement Assignees</h1>

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ Breadcrumbs::render('Requirement Assignees',$bin_id) }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DATA TABLE --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_RequirementAssignees/data_table')



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
            @include('Academic_head/AcadHead_Setup/AcadHead_RequirementAssignees/assignees_scripts')
@endsection
