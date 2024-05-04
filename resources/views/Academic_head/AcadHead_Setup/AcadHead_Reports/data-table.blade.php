
    <section class="container">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mt-2">Faculty Requirement Compliance Statuses</h3>
                    <div class="text-right">
                        <div class="dt-buttons btn-group flex-wrap text-right">
                            <a href = "{{ route('pdf-reports') }}"
                                tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-pdf
                                buttons-html5 btn btn-primary mr-2"
                                title="PDF export.">
                                <span>Generate Report</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tables of roles -->
                <div class="card-body p-0">
                    <table class="table table-striped"  id="myTable">
                        <thead class="pal-1 text-col-2">
                            <tr>
                                <th>Faculty Name</th>
                                <th>Requirement Bin</th>
                                <th>Category</th>
                                <th>Requirement</th>
                                <th>Submission Type</th>
                                <th>Deadline</th>
                                <th>Date Submitted</th>
                                <th>Timeliness</th>
                                <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id='filtered-bins'>
                            @foreach ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $data->first_name }} {{ $data->last_name }}</th>
                                    <td>{{ $data->bin_title }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->requirement }}</td>
                                    <td>
                                        @if ($data->submission_type)
                                            {{ $data->submission_type }}
                                        @else
                                            <p>For Compliance</p>
                                        @endif
                                    </td>

                                    <td>{{ $data->bin_deadline }}</td>
                                    <td>{{ $data->submission_date == Null ? 'For Compliance': $data->submission_date  }}</td>

                                    <td>
                                        @php
                                            // 1. Get today's date
                                            $todayDate = \Carbon\Carbon::now();
                                            $status = $data->status;

                                            // 3. Get deadline date (assuming you have this from your data)
                                            $deadlineDate = \Carbon\Carbon::parse($data->bin_deadline);

                                            $TodayDeadlineDiff = $deadlineDate->diffInDays($todayDate);

                                            if ($data->submission_date){
                                                                                        // 2. Get submission date (assuming you have this from your data)
                                                $submissionDate = \Carbon\Carbon::parse($data->submission_date);
                                                $daysDiff = $deadlineDate->diffInDays($submissionDate);

                                                // Output (you can customize this)
                                                if ($deadlineDate > $submissionDate) {
                                                    echo abs($daysDiff+1) . " days ahead of deadline";

                                                } elseif ($daysDiff == 0) {
                                                    echo "On time";

                                                } else {

                                                    echo abs($daysDiff) . " days late";
                                                }
                                            }

                                            else {

                                                if ($deadlineDate > $todayDate || $TodayDeadlineDiff == 0 && $status == 'Pending' ) {
                                                    echo "For Compliance";
                                                }

                                                elseif ($deadlineDate < $todayDate && $status == 'Pending' || $status == 'Approved') {
                                                    echo abs($TodayDeadlineDiff) . " days late";
                                                }
                                            }

                                        @endphp
                                    </td>

                                    <td class="text-center ">
                                        <button type="button"
                                            class="  font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2
                                        {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : ($data->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}
                                        ">{{ $data->status }}</button>
                                    </td>

                                </tr>

                            @endforeach
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
    </section>

