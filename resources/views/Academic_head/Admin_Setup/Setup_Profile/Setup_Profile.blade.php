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


                {{-- Profile Header --}}
                @include('/Academic_head/Admin_Setup/Setup_Profile/profile_header')


                {{-- personal - edit tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                @include('/Academic_head/Admin_Setup/Setup_Profile/setup_form')


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

@include('/Academic_head/Admin_Setup/Setup_Profile/scripts')
@include('/Academic_head/Admin_Setup/Setup_Profile/styles')




@endsection
