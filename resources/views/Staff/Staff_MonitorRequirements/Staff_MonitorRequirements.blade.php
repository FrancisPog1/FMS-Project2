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
                        <div class="card-header" style="height: 85px;">
                            <h1 class="m-0">Monitoring Page</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ Breadcrumbs::render('Monitor User', $req_bin_id) }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Data Table --}}
            @include('Staff/Staff_MonitorRequirements/monitor_reqs_dataTable')


            {{-- Validate Modal --}}
            @include('Staff/Staff_MonitorRequirements/validate_modal')

            {{-- Display File Modal --}}
            @include('Staff/Staff_MonitorRequirements/file_modal')


            {{-- <div class="d-flex justify-content-between">
                <a href="{{ route('acadhead_RequirementAssignees', $req_bin_id) }}" class="btn btn-outline-danger btn-lg"
                    id="lower_button">Back</a>

                <form
                    action="{{ route('acadhead_ReviewRequirements', ['assigned_bin_id' => $assigned_bin_id, 'req_bin_id' => $req_bin_id]) }}"
                    method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-lg" id="lower_button">Mark as Reviewed</button>
                </form>
            </div> --}}
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
    @include('Staff/Staff_MonitorRequirements/monitor_reqs_scripts')
@endsection
