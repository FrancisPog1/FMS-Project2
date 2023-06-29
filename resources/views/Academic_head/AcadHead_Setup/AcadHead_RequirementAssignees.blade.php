@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col ml-4">
                            <h1 class="m-0">Requirement Assignees</h1>
                        </div>
                        <div class="col ml-4">
                            <ol class="breadcrumb float-right mr-5">
                                <li class="breadcrumb-item active">{{ Breadcrumbs::render('Evaluation') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of Assignees</h3>
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
                                        <th style='width:20%' class="text-center">Name</th>
                                        <th style='width:25%' class="text-center">Email</th>
                                        <th style='width:10%' class="text-center">Role</th>
                                        <th style='width:15%' class="text-center">Review Status </th>
                                        <th style='width:15%' class="text-center">Compliance Status</th>
                                        <th style='width:5%' class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigned_reqrs as $assigned_reqr)
                                        <tr>
                                            <td>Sample Name</td>
                                            <td>{{ $assigned_reqr->email }}</td>
                                            <td class="text-center">{{ $assigned_reqr->role_type }}</td>

                                            <td class="text-center">
                                                <button type="button"
                                                    class="text-white {{ $assigned_reqr->review_status === 'Reviewed' ? 'bg-green-500' : 'bg-gray-400' }}
                                                                                        font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2">{{ $assigned_reqr->review_status }}</button>
                                            </td>

                                            <td class="text-center"><button type="button"
                                                    class="text-white {{ $assigned_reqr->compliance_status === 'Pending' ? 'bg-gray-400' : ($assigned_reqr->compliance_status === 'Incomplete' ? 'bg-red-500' : 'bg-green-500') }}
                                                                                            font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2">{{ $assigned_reqr->compliance_status }}</button>
                                            </td>

                                            <td class="text-center">

                                                <a href="{{ route('acadhead_MonitorRequirements', [
                                                    'user_id' => $assigned_reqr->user_id,
                                                    'assigned_bin_id' => $assigned_reqr->id,
                                                    'req_bin_id' => $assigned_reqr->req_bin_id,
                                                ]) }}"
                                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Monitor</a>

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
