

<!-- Content Body (Page Body) -->
<div class="container ">

    {{-- Display File Modal --}}
    @include('Academic_head/AcadHead_Setup/Monitor-Requirements/compliance-info')

    <br>

    <div class=" mr-5 ml-5">
        {{-- column row on data table --}}

        <div class="card">
            {{-- Table header --}}
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="flex-wrap">
                        <b>
                            <h1 class="ml-1 mt-2">Validate user requirements
                            </h1>
                        </b>
                    </div>
                </div>
            </div>

            {{-- Table body --}}
            <div class="card-body p-0">
                <table class="table table-striped"  id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th>Requirement</th>
                            <th style="width:25%;">Date of submission</th>
                            <th style="width:20%;">Timeliness</th>
                            <th style="">Submission Type</th>
                            <th style="width:13%;" class="text-center ">Status</th>
                            <th class="text-center" style="width:10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $data->type }}</th>
                                <td>
                                    {{ $data->submission_date == Null ? 'For Compliance': $data->submission_date  }}
                                </td>

                                <td>
                                    @php
                                        // 1. Get today's date
                                        $todayDate = \Carbon\Carbon::now();
                                        $status = $data->status;

                                        // 3. Get deadline date (assuming you have this from your data)
                                        $deadlineDate = \Carbon\Carbon::parse($requirementbin->deadline);

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

                                <td>

                                    @if ($data->submission_type)
                                        {{ $data->submission_type }}
                                    @else
                                        <p>For Compliance</p>

                                    @endif

                                </td>

                                <td class="text-center ">
                                    <button type="button"
                                        class="  font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2
                                    {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : ($data->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}
                                    ">{{ $data->status }}</button>
                                </td>

                                <td class="text-center">

                                    @if ($data->submission_type=='Soft Copy')
                                        <button type="button" id='soft-copy-button-{{ $data->id }}'
                                            data-toggle="modal" data-target="#soft-copy-modal-{{$data->id}}"
                                            class="validate-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            Validate
                                        </button>

                                    @elseif ($data->submission_type == 'Hard Copy')
                                        <button type="button"
                                            data-toggle="modal" data-target="#hard-copy-modal-{{$data->id}}"
                                            class="validate-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            Validate
                                        </button>

                                    @else
                                        <button type="button"
                                            data-toggle="modal" data-target="#no-submission-modal-{{$data->id}}"
                                            class="validate-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            Validate
                                        </button>

                                    @endif




                                </td>

                            </tr>

                        @endforeach




                        {{-- @foreach ($datas as $data)

                            <tr>
                                <th scope="row">{{ $data->type }}</th>
                                <td>{{ $data->submission_date }}</td>
                                <td class="text-center ">
                                    <button type="button"
                                        class="  font-medium rounded-full text-sm  px-3 py-1 mr-2 mb-2
                                {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : ($data->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}
                                ">{{ $data->status }}</button>
                                </td>
                                <td class="text-center">
                                    <button type="button" data-status="{{ $data->status }}"
                                        data-remarks="{{ $data->remarks }}"
                                        data-requirement-id="{{ $data->id }}"
                                        data-user-id="{{ $data->user_id }}"
                                        data-req-bin-id="{{ $req_bin_id }}"
                                        data-toggle="modal" data-target="#modal-xl-validate-{{$data->id}}"
                                        class="validate-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Validate
                                    </button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
