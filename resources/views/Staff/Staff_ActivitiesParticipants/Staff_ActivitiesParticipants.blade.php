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
                            <h1 class="m-0">Activity Participants</h1>
                            <h3 class="m-0">Dashboard / Activity / Activity Details</h3>
                        </div>
                    </div>
                </div>
            </section>


            {{-- Activity Details --}}
            @include('Staff/Staff_ActivitiesParticipants/activity_details')

            {{-- DATA TABLE --}}
            @include('Staff/Staff_ActivitiesParticipants/data_table')

            {{-- EDIT MODAL --}}
            @include('Staff/Staff_ActivitiesParticipants/add_participants_modal')


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
    @include('Staff/Staff_ActivitiesParticipants/participants_scripts')
@endsection
