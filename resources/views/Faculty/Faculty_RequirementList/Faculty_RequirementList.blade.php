@extends('layouts.Faculty_master')

{{-- ADDING THE DEPENDENCY FOR THE FILEPOND --}}
@section('head')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection


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
                            <h1 class="m-0">List of Requirements</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard / Requirement Bin / List of Requirements</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Requirement Bin details --}}
            @include('Faculty/Faculty_RequirementList/bin_details')


            {{-- Data Table --}}
            @include('Faculty/Faculty_RequirementList/data_table')



            {{-- Upload Modal --}}
            @include('Faculty/Faculty_RequirementList/upload_modal')

                {{-- File Modal --}}
            @include('Faculty/Faculty_RequirementList/file_modal')


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
    @include('Faculty/Faculty_RequirementList/requirementlist_scripts')
@endsection
