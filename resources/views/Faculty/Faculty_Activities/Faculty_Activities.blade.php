@extends('layouts.Faculty_master')

{{-- CONTENTS --}}
@section('content')

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            {{-- New Page Header --}}
            <section class="content-header ">
                <div class="mr-5 ml-5" >
                    <div class="card " >
                        <div class="card-header" style="height: 85px;">
                            <h1 class="m-0">Activities</h1>

                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item active">{{ Breadcrumbs::render('Reports') }}</li> --}}
                                <li class="breadcrumb-item active"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Activities</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            {{-- DATA TABLE--}}
            @include('Faculty/Faculty_Activities/data_table')


        </div>

        <!-- Footer Container -->
        <footer class="main-footer">
            <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>

        @include('Faculty/Faculty_Activities/scripts')
    @endsection

