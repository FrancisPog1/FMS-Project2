@extends('layouts.Director_master')

@section('content')
    <div class="wrapper">

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            {{-- New Page Header --}}
            <section class="content-header ">
                <div class="mr-5 ml-5" >
                    <div class="card " >
                        <div class="card-header" style="height: 85px;">
                            <h1 class="m-0">Requirement Bin Contents</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> {{ Breadcrumbs::render('Requirement Setup', $bin_id) }} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Data TABLE --}}
            @include('Director/Director_BinContents/data_table')

            {{-- View Modal --}}
            @include('Director/Director_BinContents/view_modal')


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

    {{-- Edit Modal --}}
    @include('Director/Director_BinContents/bin_contents_scripts')
@endsection
