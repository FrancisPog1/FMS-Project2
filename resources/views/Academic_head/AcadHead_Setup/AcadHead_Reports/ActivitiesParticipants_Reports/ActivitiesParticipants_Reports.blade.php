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
                        <div class="card-header" style="height: 80px;">
                            <h1 class="m-0">Activity Participants</h1>
                            <h3 class="m-0">Dashboard / Activity / Activity Details</h3>
                        </div>
                    </div>
                </div>
            </section>


            {{-- Activity Details --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Reports/ActivitiesParticipants_Reports/activity_details')


            {{-- DATA TABLE --}}
            @include('Academic_head/AcadHead_Setup/AcadHead_Reports/ActivitiesParticipants_Reports/data_table')


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
    @include('Academic_head/AcadHead_Setup/AcadHead_Reports/ActivitiesParticipants_Reports/participants_scripts')
@endsection
