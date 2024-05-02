

<!-- Content Body (Page Body) -->
<div class="container">
    <div class="row">

        <div class="col-md-9">
            {{-- column row on data table --}}
            <div class="col">
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
                                    {{-- Validate Modal --}}
                                    @include('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/validate_modal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            {{-- specific user match in specific requirement --}}
            <div class="col p-auto">
                <div class="m-auto p-4 bg-gray-200 rounded-md">
                    <div class="d-flex">
                        <span class="d-block text-bold" style="font-size: 1.2rem">
                            Requirements of:
                        </span>
                    </div>
                    <br>
                    <div class="user-panel d-flex">
                        <div class="image mt-2">
                            <img src="https://rb.gy/1islm" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info m-auto">
                            <span class="d-block text-pal-1 text-bold">Irynne Gatchalian</span>
                            <span class="d-block text-pal-1 text-regular" style="font-size: .8rem;">Faculty
                                Instructor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
