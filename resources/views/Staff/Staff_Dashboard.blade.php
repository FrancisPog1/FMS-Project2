@extends('layouts.Staff_master')

{{-- CONTENTS --}}
@section('content')
    <!-- Content Wrapper. Outer Container -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row-col-sm-6 mb-2">
                    <div class="col-md-6 ml-4">
                        <h1 class="m-0">{{$greeting}} {{$name}}!</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <!-- Summary Cards -->
        <div class="pl-5 pr-5 pt-2">
            <div class="col-md-12 m-auto">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="container-fluid">
                            <div class="info-box">
                                <span class="info-box-icon pal-1 text-col-2 elevation-1"><i class="fas fa-folder"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">No. of Activities</span>
                                    <span class="info-box-number">
                                        23
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="container-fluid">
                            <div class="info-box">
                                <span class="info-box-icon pal-1 text-col-2 pal-1 elevation-1"><i
                                        class="fas fa-user-graduate"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Faculty Schedules</span>
                                    <span class="info-box-number">
                                        70
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Graphs -->
            <div class="col-md-12 m-auto">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                            <div class="card-header">
                                <label>Activity Status</label>
                            </div>
                            <div>
                                <canvas id="" width="324" height="269"
                                    style="display: block; box-sizing: border-box; height: 300px; width: 360px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" style="display: inline-block; width: 100%; border-top: 2px solid #800000;">
                            <div class="card-header">
                                <label>Requirements Status</label>
                            </div>
                            <div>
                                <canvas id="" width="324" height="269"
                                    style="display: block; box-sizing: border-box; height: 300px; width: 360px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer Container -->
    <footer class="main-footer">
        <strong>director Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.2.0
        </div>
    </footer>
    </div>
@endsection
