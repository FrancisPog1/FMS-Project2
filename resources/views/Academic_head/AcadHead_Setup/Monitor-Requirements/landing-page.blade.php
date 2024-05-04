@extends('layouts.master')

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
            @include('Academic_head/AcadHead_Setup/Monitor-Requirements/data-table')


            {{-- Display File Modal --}}
            @include('Academic_head/AcadHead_Setup/Monitor-Requirements/file-modal')


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

@endsection


@section('modal_content')
    @foreach ($datas as $data)
        {{-- Validate Soft Copy Modal --}}
        @include('Academic_head/AcadHead_Setup/Monitor-Requirements/validate-soft-copy-modal')

        {{-- Validate Hard Copy Modal --}}
        @include('Academic_head/AcadHead_Setup/Monitor-Requirements/validate-hard-copy-modal')

        {{-- Validate No Submission Modal --}}
        @include('Academic_head/AcadHead_Setup/Monitor-Requirements/validate-no-submission-modal')
    @endforeach
@endsection



@section('js_content')
    {{-- Scripts --}}
    @include('Academic_head/AcadHead_Setup/Monitor-Requirements/scripts')
@endsection
