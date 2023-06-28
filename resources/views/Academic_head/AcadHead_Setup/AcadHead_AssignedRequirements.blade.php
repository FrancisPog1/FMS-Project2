@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row-col-sm-6 mb-2">
                        <div class="col-md-3 ml-4">
                            <h1 class="m-0">Assigned Requirement</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of Requirement Bins</h3>
                            {{-- <div class="text-right">
                                <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                    class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Create
                                    Requirement Bin</button>
                            </div> --}}
                        </div>

                        <div class="card-header">
                            <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                            <select name="dataTable_length" aria-controls="dataTable"
                                class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">
                                    10
                                </option>
                                <option value="25">
                                    25
                                </option>
                                <option value="50">
                                    50
                                </option>
                                <option value="100">
                                    100
                                </option>
                            </select>
                        </div>

                        <!-- Tables of roles -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="pal-1 text-col-2">
                                    <tr>
                                        <th style='width:20%'>Title</th>
                                        <th style='width:30%'>Description</th>
                                        <th>Deadline</th>
                                        <th style="">Status</th>
                                        <th class="text-center" style="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requirementbins as $requirementbin)
                                        <tr>
                                            <td>{{ $requirementbin->title }}</td>
                                            <td>{{ $requirementbin->description }}</td>
                                            <td>{{ $requirementbin->deadline }}</td>

                                            <td><button type="button"
                                                    class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300
                                                font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">{{ $requirementbin->status }}</button>
                                            </td>

                                            <td>
                                                <!-- Example single danger button -->

                                                <a href="{{ route('acadhead_RequirementAssignees', ['bin_id' => $requirementbin->id]) }}"
                                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Assignees</a>
                                            </td>


                                            <td class="text-center">

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="text-col-1" style="font-size: .9rem;">
                                    <tr>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="dataTables_info" id="dataTable_info" role="status"
                                                    aria-live="polite">
                                                    Showing 1 to 4 of 4 entries
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
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
