


<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            {{-- Table header --}}
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="flex-wrap">
                        <b>
                            <h1 class="ml-1 mt-2">Upload your requirements here
                            </h1>
                        </b>
                    </div>

                </div>
            </div>
            {{-- Table body --}}
            <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
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

                                            elseif ($deadlineDate < $todayDate && $status == 'Pending') {
                                                echo abs($TodayDeadlineDiff) . " days late";
                                            }
                                        }

                                    @endphp

                                </td>

                                <td>
                                    {{ $data->submission_type }}
                                </td>

                                <td class="text-center ">
                                    <button type="button"
                                        class="  font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2
                                    {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : ($data->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}
                                    ">{{ $data->status }}</button>
                                </td>

                                <td class="text-center">

                                    <div class="btn-group text-center">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle  text-center" data-toggle="dropdown" aria-expanded="false" id="dropdown-button-{{ $data->id }}">
                                          Submit
                                        </button>
                                        <div class="dropdown-menu" id="drop-down-menu-{{ $data->id  }}">
                                            <button class="dropdown-item upload-button" id="upload-button-{{ $data->id }}" href="#" data-toggle="modal" data-target="#soft-copy-modal-{{ $data->id }}">
                                            {{ $data->status == 'Rejected' ? 'Soft Copy Resubmission' : ($data->status == 'In review' || $data->status == 'Approved' ? 'View Soft Copy Submission' :  'Soft Copy Submission')}}
                                            </button>
                                            <div class="dropdown-divider" ></div>
                                            <button class="dropdown-item" id="hard-copy-button-{{$data->id}}" href="#" data-toggle="modal" data-target="#hard-copy-modal-{{ $data->id }}">Hard Copy Submission</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            {{-- Hard Copy Submission Modal --}}
                            @include('Faculty/Faculty_RequirementList/hard-copy-submission-modal')

                            {{-- Soft Copy Submission Modal --}}
                            @include('Faculty/Faculty_RequirementList/soft-copy-submission-modal')



                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>

