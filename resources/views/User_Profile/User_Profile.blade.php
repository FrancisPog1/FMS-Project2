@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mt-5 ml-5">
                        <div class="col">
                            <h1 class="m-0">Hi! {User}</h1>

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ Breadcrumbs::render('Profile') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Main content -->
            <div class="content">
                <br>

                @include('User_Profile/profile_header')

                <div class="container-fluid">
                    <div class="row mx-auto col-11 align-content-between ">

                        <!-- Right container -->
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">

                                {{-- personal - view tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                                @include('User_Profile/view_profile')


                                {{-- personal - edit tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                                @include('User_Profile/edit_profile')

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

@include('User_Profile/styles')
@include('User_Profile/scripts')




@endsection
