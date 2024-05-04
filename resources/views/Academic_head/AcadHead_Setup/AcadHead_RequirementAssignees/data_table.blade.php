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

            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped"  id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style='width:20%'>Name</th>
                            <th style='width:20%'>Email</th>
                            <th style='width:10%' class="text-center">Role</th>
                            <th style='width:15%' class="text-center">Review Status </th>
                            <th style='width:17%' class="text-center">Compliance Status</th>
                            <th style='width:5%' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-assignees">
                        @foreach ($assigned_reqrs as $assigned_reqr)
                            <tr>
                                <td>{{ $assigned_reqr->first_name}} {{ $assigned_reqr->last_name}}</td>
                                <td>{{ $assigned_reqr->email }}</td>
                                <td class="text-center">{{ $assigned_reqr->role_type }}</td>

                                <td class="text-center">
                                    <button type="button"
                                        class="text-white {{ $assigned_reqr->review_status === 'Reviewed' ? 'bg-green-500' : 'bg-gray-400' }}
                                                                            font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2">{{ $assigned_reqr->review_status }}</button>
                                </td>

                                <td class="text-center">
                                    <button type="button"
                                        class="text-white {{ $assigned_reqr->compliance_status === 'Pending' ? 'bg-gray-400' : ($assigned_reqr->compliance_status === 'Incomplete' ? 'bg-red-500' : 'bg-green-500') }}
                                                                                font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2">{{ $assigned_reqr->compliance_status }}</button>
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('admin.monitor_requirements.show', [
                                        'user_id' => $assigned_reqr->user_id,
                                        'assigned_bin_id' => $assigned_reqr->id,
                                        'req_bin_id' => $assigned_reqr->req_bin_id,
                                    ]) }}"
                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Monitor</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
