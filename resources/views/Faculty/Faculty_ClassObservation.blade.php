@extends('layouts.Faculty_master')


{{-- CONTENTS --}}
@section('content')

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header ">
                <div class="mr-5 ml-5" >
                    <div class="card " >
                        <div class="card-header" style="height: 85px;">
                            <h1 class="m-0">Observation</h1>

                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item active">{{ Breadcrumbs::render('Reports') }}</li> --}}
                                <li class="breadcrumb-item active"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Observation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of class observation</h3>
                            <!-- Search function --->
                            <div class="text-right">
                                <div class="form-inline float-right">
                                    <div class="input-group" data-widget="sidebar-search">
                                        <input class="form-control
                                            form-control-sidebar px-4 py-2
                                            text-sm font-medium" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sidebar">
                                                <i class="fas fa-search fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                            <select name="dataTable_length" aria-controls="dataTable" class="ml-5 col-1
                                custom-select custom-select-sm form-control
                                form-control-sm">
                                <option value="10">
                                    10
                                </option>
                                <option value="25">
                                    25
                                </option>
                                <option value="50">
                                    50
                                </option>
                                <option value="100">
                                    100
                                </option>
                            </select>
                        </div>

                        <!-- Tables of roles -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="pal-1 text-col-2">
                                    <tr>
                                        <th>Faculty</th>
                                        <th>Date of Observation</th>
                                        <th>Status<th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Irynne Gatchalian
                                        </td>
                                        <td>
                                            April 28, 2023, Tues - 11:30AM-12:00PM
                                        </td>
                                        <td>
                                            <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">Cancelled</button>
                                        </td>
                                        <td></td>
                                        <td class="text-center">
                                            <button data-toggle="modal" data-target="#modal-xl" type="button" class="px-3 py-2
                                                text-sm font-medium text-center
                                                text-white bg-blue-700
                                                rounded-lg hover:bg-blue-800
                                                focus:ring-4 focus:outline-none
                                                focus:ring-blue-300


                                               ">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="text-col-1" style="font-size:
                                    .9rem;">
                                    <tr>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="dataTables_info" id="dataTable_info" role="status"
                                                    aria-live="polite">
                                                    Showing 1 to 4 of 4 entries
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!--View Modal-->
            <section class="content">
                <div class="modal fade" id="modal-xl">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Observation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-6">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="container col-sm-5" style=" padding: 80px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);">
                                                <p style="font-size: 1.2rem;">
                                                    <b>Observation Details</b>
                                                </p> <br><br>
                                                <p style="margin-left: 20px;">
                                                    Status: <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">Cancelled</button> <br>
                                                    Date of Observation: <b>April 28, 2023, 07:00 am - 01:00 pm</b> <br>
                                                    Remarks:
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container col-sm-5 pr-3" style="padding: 80px; box-shadow: 0px
                                        0px 20px rgba(0, 0, 0, 0.1);">
                                        <p style="font-size: 1.2rem;">
                                            <b>Subject Details</b>
                                        </p> <br>
                                        <p style="margin-left: 20px;">
                                            Assign Code: <b>P</b> <br>
                                            Subject Code: <b>COMP-GEED</b> <br>
                                            Subject Title: <b>Computer
                                                Programming</b> <br>
                                            Units: <b>32</b> <br>
                                            Year & Section: <b>BSIT 2-2</b> <br>
                                            Room: <b>ACAD - 202</b> <br>
                                            Subj Sched: <b>Tues -
                                                11:30AM-12:00PM</b>
                                        </p>
                                    </div>
                                    <div class="container col-sm-5" style="padding: 80px; box-shadow: 0px
                                        0px 20px rgba(0, 0, 0, 0.1);">
                                        <p style="font-size: 1.2rem;">
                                            <b>Room Details</b>
                                        </p> <br>
                                        <p style="margin-left: 20px;">
                                            Building: <b>ACAD</b> <br>
                                            Floor: <b>1st</b> <br>
                                            Status: <b>Available</b> <br>
                                            Units: <b>32</b> <br>
                                            Room Number: <b>202</b> <br>
                                            Room Type: <b>Lecture</b>
                                        </p>
                                    </div>
                                </div>

                                <div class="row mt-6">
                                    <div class="container col-sm-5 pr-3" style="padding: 80px; box-shadow: 0px
                                        0px 20px rgba(0, 0, 0, 0.1);">
                                        <p style="font-size: 1.2rem;">
                                            <b>Faculty</b>
                                        </p> <br>
                                        <p style="margin-left: 20px;">

                                            Name: <b>Philip Soberano</b> <br>
                                            Faculty Type: <b>Regular</b> <br>
                                            Academic Rank: <b>Professor</b> <br>
                                            Designation: <b>Research Professor</b>
                                        </p>
                                    </div>
                                    <div class="container col-sm-5" style="padding: 80px; box-shadow: 0px
                                        0px 20px rgba(0, 0, 0, 0.1);">
                                        <p style="margin-left: 20px;">

                                            Role: <b>Faculty</b> <br>
                                            Specialization: <b>Public
                                                Administration</b> <br>
                                            Program: <b>HRM, MM, Entrep</b>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer
                                    justify-content-between">
                                <button type="button" class="btn
                                        btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>

        <!-- Footer Container -->
        <footer class="main-footer">
            <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
@endsection

