<!DOCTYPE html>
<html>
<head>
    <title>Faculty Requirement Compliance Report</title>
    <style>
        /* Basic Styling */
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }

        /* Header Styling */
        .header { text-align: center; }
        .header img { float: left; margin-right: 20px; }
        .header-titles h1 { font-weight: normal; }
        .header-titles h2 { font-weight: bold; font-size: 1.2em; }
        .header-titles h3 { font-weight: bold; }

        /* Maroon Color */
        .maroon { background-color: #830000; color: white; }
    </style>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

    <div class="header">
        <img src="your_pup_logo.jpg" alt="PUP Logo" height="80">
        <div class="header-titles">
            <h1>Republic of the Philippines</h1>
            <h2>Polytechnic University of the Philippines</h2>
            <h3>Quezon City Branch</h3>
        </div>
    </div>


    <table class="table table-striped"  id="myTable">
        <thead class="pal-1 text-col-2 maroon">
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




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<body>
</html>

