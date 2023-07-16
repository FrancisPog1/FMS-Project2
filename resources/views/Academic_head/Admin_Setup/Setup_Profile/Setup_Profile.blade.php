@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

                <br>

                {{-- Profile Header --}}
                @include('/Academic_head/Admin_Setup/Setup_Profile/profile_header')

                <section class="container">
                    <div class="mr-5 ml-5">

                        {{-- personal - edit tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                        @include('/Academic_head/Admin_Setup/Setup_Profile/setup_form')

                    </div>
                </section>


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
