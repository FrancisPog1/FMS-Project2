@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header ">
                <div class="mr-5 ml-5">
                    <div class="card ">
                        <div class="card-header" style="height: 85px;">
                            <div class="col">
                                <h1 class="m-0">Hi! {User}</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">{{ Breadcrumbs::render('Profile') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">

                {{-- The Pictures --}}
                @include('User_Profile/user_picture')

                <div class="container-fluid">
                    <div class="row mx-auto col-11 align-content-between ">

                        {{-- ABOUT ME CARD
                        @include('User_Profile/about_me')--}}


                        <!-- Right container cards-->
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">

                                {{-- PERSONAL INFORMATION AND EDIT CARD --}}
                                @include('User_Profile/personal_info')


                                {{-- VICINITY DETAILS AND EDIT CARD
                                @include('User_Profile/vicinity_info')--}}



                                {{-- FACULTY DETAILS AND EDIT CARD
                                @include('User_Profile/faculty_details')--}}


                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Footer Container -->
        <footer class="main-footer">
            <strong>
                Faculty Records & Monitoring System &copy; 2024
                    <a href="https://pup.edu.ph">PUPQC.</a>
            </strong>

                All rights reserved.

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
    </div>

    {{-- SCRIPTS --}}
    @include('User_Profile/scripts')

    {{-- STYLE --}}
    @include('User_Profile/style')
@endsection


