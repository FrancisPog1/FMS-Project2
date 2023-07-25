


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
                            <th>Requirement Type</th>
                            <th style="width:30%;">Date of submission</th>
                            <th style="width:13%;" class="text-center ">Status</th>
                            <th class="text-center" style="width:20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $data->type }}</th>
                                <td>{{ $data->submission_date }}</td>
                                <td class="text-center ">
                                    <button type="button"
                                        class="  font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2
                                    {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : ($data->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}
                                    ">{{ $data->status }}</button>
                                </td>
                                <td class="text-center">
                                    <button type="button" data-status="{{ $data->status }}"
                                        data-remarks="{{ $data->remarks }}"
                                        data-requirement-id="{{ $data->id }}"
                                        data-req-bin-id="{{ $req_bin_id }}"
                                        data-name="{{ $data->first_name }} {{ $data->last_name }}"
                                        data-reviewed_at = "{{ $data->reviewed_at}}"
                                        data-user-id = "{{ $user_id }}"

                                        class="upload-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        {{ $data->status == 'Rejected' ? 'Reupload' : ($data->status == 'In review' || $data->status == 'Approved' ? 'View' :  'Upload')}}
                                    </button>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
