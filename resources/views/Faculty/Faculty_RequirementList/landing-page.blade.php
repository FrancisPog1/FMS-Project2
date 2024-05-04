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
            @include('Faculty/Faculty_RequirementList/compliance-info')


            {{-- Data Table --}}
            @include('Faculty/Faculty_RequirementList/data-table')


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


@endsection

@section('modal_content')

    @foreach ($datas as $data)
        {{-- Hard Copy Submission Modal --}}
        @include('Faculty/Faculty_RequirementList/hard-copy-submission-modal')

        {{-- Soft Copy Submission Modal --}}
        @include('Faculty/Faculty_RequirementList/soft-copy-submission-modal')
    @endforeach

@endsection

@section('js_content')
    <!-- Faculty/Faculty_RequirementList Scripts -->
    @include('Faculty/Faculty_RequirementList/scripts')
@endsection



