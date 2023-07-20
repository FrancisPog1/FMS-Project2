<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">List of requirements</h3>
                <!-- Search function --->
                <div class="text-right">
                    <div class="form-inline float-right">
                        <div class="input-group" data-widget="sidebar-search">
                            <input
                                class="form-control
                                form-control-sidebar px-4 py-2
                                text-sm font-medium"
                                type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header">
                <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                <select name="dataTable_length" aria-controls="dataTable"
                    class="ml-5 col-1
                    custom-select custom-select-sm form-control
                    form-control-sm">
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
                            <th style='width:30%' >Title</th>
                            <th style='width:25%' >Dates</th>
                            <th style='width:10%' class="text-center">Status</th>
                            <th style='width:10%' class="text-center">Review Status </th>
                            <th style='width:12%' class="text-center">Compliance Status</th>
                            <th style='width:5%' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirement_bins as $requirement_bin)
                            <tr>
                                <td>{{ $requirement_bin->title }}</td>
                                <td>{{ $requirement_bin->start_datetime }} - {{ $requirement_bin->end_datetime }} </td>
                                <td class="text-center">
                                    <button type="button"
                                        class="text-white {{ $requirement_bin->review_status === 'Reviewed' ? 'bg-green-500' : 'bg-gray-400' }}
                                                                        font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2">{{ $requirement_bin->status }}</button>
                                </td>

                                <td class="text-center">
                                    <button type="button"
                                        class="text-white {{ $requirement_bin->review_status === 'Reviewed' ? 'bg-green-500' : 'bg-gray-400' }}
                                                                        font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2">{{ $requirement_bin->review_status }}</button>
                                </td>

                                <td class="text-center"><button type="button"
                                        class="text-white {{ $requirement_bin->compliance_status === 'Pending' ? 'bg-gray-400' : ($requirement_bin->compliance_status === 'Incomplete' ? 'bg-red-500' : 'bg-green-500') }}
                                                                            font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2">{{ $requirement_bin->compliance_status }}</button>
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('faculty.requirements.show', [
                                        'assigned_bin_id' => $requirement_bin->id,
                                        'req_bin_id' => $requirement_bin->req_bin_id,
                                    ]) }}"
                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-col-1" style="font-size:
                        .9rem;">
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
