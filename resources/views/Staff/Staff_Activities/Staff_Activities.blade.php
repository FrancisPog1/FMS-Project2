@extends('layouts.Staff_master')


{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

        {{-- New Page Header --}}
        <section class="content-header ">
            <div class="mr-5 ml-5" >
                <div class="card " >
                    <div class="card-header" style="height: 80px;">
                        <h1 class="m-0">Activity Dashboard</h1>
                        <h3 class="m-0">Dashboard / Activity</h3>
                    </div>
                </div>
            </div>
        </section>


            {{-- DATA TABLE --}}
            @include('Staff/Staff_Activities/data_table')


            {{-- VIEW MODAL --}}
            @include('Staff/Staff_Activities/view_modal')

            {{-- CREATE MODAL --}}
            @include('Staff/Staff_Activities/create_modal')

            {{-- RESTORE MODAL --}}
            @include('Staff/Staff_Activities/restore_modal')

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
    @include('Staff/Staff_Activities/activities_scripts')
@endsection
