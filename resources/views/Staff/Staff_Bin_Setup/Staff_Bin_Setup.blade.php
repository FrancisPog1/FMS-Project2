@extends('layouts.Staff_master')

@section('content')
    <div class="wrapper">

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

                      {{-- New Page Header --}}
          <section class="content-header ">
            <div class="mr-5 ml-5" >
                <div class="card " >
                    <div class="card-header" style="height: 85px;">
                        <h1 class="m-0">Requirement Bin Setup</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Requirement Bin</a></li>
                            <li class="breadcrumb-item active">Bin Setup</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

            {{-- Data TABLE --}}
            @include('Staff/Staff_Bin_Setup/data_table')

            {{-- Edit Modal --}}
            @include('Staff/Staff_Bin_Setup/edit_modal')

            {{-- Create Modal --}}
            @include('Staff/Staff_Bin_Setup/create_modal')

            {{-- Assign Modal --}}
            @include('Staff/Staff_Bin_Setup/assign_modal')

            {{-- Restore Modal --}}
            @include('Staff/Staff_Bin_Setup/restore_modal')


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
    @include('Staff/Staff_Bin_Setup/bin_setup_scripts')
@endsection
