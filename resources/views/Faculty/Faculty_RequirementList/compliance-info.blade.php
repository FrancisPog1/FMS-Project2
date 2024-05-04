<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">User's Compliance Information</h3>
                {{-- <div class="text-right">
                    <button class="btn btn-link" id="hideButton">Hide</button>
                </div> --}}
            </div>
            <div class="card-body" style="overflow: auto;" id="cardBody">
                <div class="row">

                    <div class="col">

                        <small class="text-uppercase text-muted font-weight-bold">Requirement Bin</small>
                        <p>{{$requirementbin->bin_title}}</p> <br>

                        <small class="text-uppercase text-muted font-weight-bold">Deadline</small>
                        <p>{{$requirementbin->deadline}}</p> <br>

                        <small class="text-uppercase text-muted font-weight-bold">Requiremen Bin Status</small>

                            @php
                                // Get today's date
                                $todayDate = \Carbon\Carbon::now();

                                // Get deadline date (assuming you have this from your data)
                                $deadlineDate = \Carbon\Carbon::parse($requirementbin->deadline);

                                // Calculate difference from today to deadline
                                $deadlineDiff = $todayDate->diffInDays($deadlineDate);
                            @endphp


                            @if ($deadlineDate > $todayDate || $deadlineDiff == 0)
                                <p><span class="badge badge-info" style="font-size: 1em; padding: 0.4em 0.6em;">{{ $compliance_info->compliance_status }}</span></p>

                            @else
                                <p><span class="badge badge-secondary" style="font-size: 1em; padding: 0.4em 0.6em;">Deadline Passed</span></p>
                            @endif

                    </div>

                    <div class="col">
                        <small class="text-uppercase text-muted font-weight-bold">Compliance Status</small>
                            @if ($compliance_info->compliance_status === 'Pending')
                                <p><span class="badge bg-gray fg-white badge-light" style="font-size: 1em; padding: 0.4em 0.6em;">{{ $compliance_info->compliance_status }}</span></p>

                            @elseif ($compliance_info->compliance_status === 'Incomplete')
                                <p><span class="badge badge-warning" style="font-size: 1em; padding: 0.4em 0.6em;">{{ $compliance_info->compliance_status }}</span></p>

                            @else
                                <p><span class="badge badge-success" style="font-size: 1em; padding: 0.4em 0.6em;">{{ $compliance_info->compliance_status }}</span></p>
                            @endif

                        <br>

                        <small class="text-uppercase text-muted font-weight-bold">Review Status</small>
                            @if ($compliance_info->review_status === 'Reviewed')
                                <p><span class="badge badge-success" style="font-size: 1em; padding: 0.4em 0.6em;">{{ $compliance_info->review_status }}</span></p>
                            @else
                                <p><span class="badge bg-gray fg-white badge-light" style="font-size: 1em; padding: 0.4em 0.6em;">{{ $compliance_info->review_status }}</span></p>
                            @endif


                </div>



                </div>

            </div>
        </div>
    </div>
</section>
