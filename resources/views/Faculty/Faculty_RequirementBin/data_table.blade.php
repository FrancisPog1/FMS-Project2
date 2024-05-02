<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">List of requirements</h3>
            </div>


            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style='width:26%' class="small-font">Title</th>
                            <th class="small-font">Category</th>
                            <th style='width:16%'  class="small-font">Deadline</th>
                            <th style='width: 1%' class="text-center small-font">Status</th>
                            <th style='width:7%' class="text-center small-font">Review Status </th>
                            <th style='width:13%' class="text-center small-font">Compliance Status</th>
                            <th style='width:1%' class="text-center small-font">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirement_bins as $requirement_bin)
                            <tr>
                                <td class="small-font">{{ $requirement_bin->title }}</td>
                                <td class="small-font">{{ $requirement_bin->category }}</td>
                                <td class="small-font">{{ $requirement_bin->deadline }} </td>
                                <td class="text-center small-font">
                                    <button type="button"
                                        class="text-white {{ $requirement_bin->review_status === 'Reviewed' ? 'bg-green-500' : 'bg-gray-400' }}
                                                                        font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2 small-font">{{ $requirement_bin->status }}</button>
                                </td>

                                <td class="text-center small-font">
                                    <button type="button"
                                        class="text-white {{ $requirement_bin->review_status === 'Reviewed' ? 'bg-green-500' : 'bg-gray-400' }}
                                                                        font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2 small-font">{{ $requirement_bin->review_status }}</button>
                                </td>

                                <td class="text-center small-font"><button type="button"
                                        class="text-white {{ $requirement_bin->compliance_status === 'Pending' ? 'bg-gray-400' : ($requirement_bin->compliance_status === 'Incomplete' ? 'bg-red-500' : 'bg-green-500') }}
                                                                            font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2 small-font">{{ $requirement_bin->compliance_status }}</button>
                                </td>

                                <td class="text-center small-font">

                                    <a href="{{ route('faculty.requirements.show', [
                                        'assigned_bin_id' => $requirement_bin->id,
                                        'req_bin_id' => $requirement_bin->req_bin_id,
                                    ]) }}"
                                        class="small-font px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


