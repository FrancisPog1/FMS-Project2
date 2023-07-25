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
                            <h1 class="m-0">Requirement Category</h1>

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ Breadcrumbs::render('Requirement Category') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            {{-- DATA TABLE --}}
            @include('Academic_head/Admin_Setup/AcadHead_RequirementCategory/data_table')

            {{-- VIEW MODAL --}}
            @include('Academic_head/Admin_Setup/AcadHead_RequirementCategory/view_modal')

            {{-- EDIT MODAL --}}
            @include('Academic_head/Admin_Setup/AcadHead_RequirementCategory/edit_modal')

            {{-- CREATE MODAL --}}
            @include('Academic_head/Admin_Setup/AcadHead_RequirementCategory/create_modal')

            {{-- RESTORE MODAL --}}
            @include('Academic_head/Admin_Setup/AcadHead_RequirementCategory/restore_modal')

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
    @include('Academic_head/Admin_Setup/AcadHead_RequirementCategory/scripts')
@endsection
