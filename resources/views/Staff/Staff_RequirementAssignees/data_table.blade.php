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

                    {{-- CODE FOR THE FILTERING UI --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                        <select name="dataTable_length" aria-controls="dataTable"
                            class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="mr-2">
                            <select name="filter" id="filter" class="form-control">
                                <option selected disabled>Filter by</option>
                                <option value="All">All</option>
                                <option value="Faculty">Role: Faculty</option>
                                <option value="Staff">Role: Staff</option>
                                <option value="Director">Role: Director</option>

                                <option value="Reviewed">Review status: Reviewed</option>
                                <option value="Pending">Review status: Pending</option>

                                <option value="Completed">Compliance status: Completed</option>
                                <option value="Incomplete">Compliance status: Incomplete</option>
                                <option value="Pending">Compliance status: Pending</option>

                            </select>
                        </div>
                        <div>
                            <select name="sort" id="sort" class="form-control">
                                <option selected disabled>Sort by</option>
                                <option value="az">Name: A to Z</option>
                                <option value="za">Name: Z to A</option>
                                <option value="e_az">Email: A to Z</option>
                                <option value="e_za">Email: Z to A</option>
                            </select>
                        </div>
                    </div>
                </div>
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
                    <tbody id="filtered-assignees">
                        @foreach ($assigned_reqrs as $assigned_reqr)
                            <tr>
                                <td>{{ $assigned_reqr->first_name }} {{ $assigned_reqr->last_name }}</td>
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

                                    <a href="{{ route('staff_MonitorRequirements', [
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
