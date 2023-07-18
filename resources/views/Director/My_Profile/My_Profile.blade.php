@extends('layouts.Director_master')

{{-- CONTENTS --}}
@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

                <br>
                @include('Director/My_Profile/profile_header')

                <section class="container">
                    <div class="mr-5 ml-5">

                            {{-- personal - view tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                            @include('Director/My_Profile/view_profile')


                            {{-- personal - edit tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                            @include('Director/My_Profile/edit_profile')
                    </div>
                </section>
                <br>

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

@include('Director/My_Profile/styles')
@include('Director/My_Profile/scripts')




@endsection
