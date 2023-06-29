<div class="content-header">
    <div class="container-fluid">
        <div class="row-col-sm-6 mb-2">
            <div class="col-md-3 ml-2">
                <h1 class="mt-4">Monitor User Requirements</h1>
            </div>
        </div>
    </div>
</div>

<br><br>

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
                                    <h1 class="ml-1 mt-2">Gusto mo ng Lemon, meron akong tequila
                                    </h1>
                                </b>
                            </div>

                            <div class="text-right">
                                <button type="button" data-toggle="modal" data-target="#modal-xl-create"
                                    class="px-2 py-2 text-sm rounded-lg text-pal-1 hover:bg-gray-200">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Table body --}}
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead class="pal-1 text-col-2">
                                <tr>
                                    <th>Requirement Type</th>
                                    <th style="width:30%;">Notes</th>
                                    <th style="width:13%;" class="text-center ">Status</th>
                                    <th class="text-center" style="width:20%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <th scope="row">{{ $data->type }}</th>
                                        <td>{{ $data->notes }}</td>
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
                                                class="upload-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                Upload
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="col ">
                <div class="m-4">
                    <div class="text-center">
                        {{-- Search bar --}}
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="e.g. SALN" />
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>

                        <br>

                        {{-- assign button --}}
                        <form
                            action="{{ route('acadhead_ReviewRequirements', ['assigned_bin_id' => $assigned_bin_id, 'req_bin_id' => $req_bin_id]) }}"
                            method="post">
                            @method('PUT')
                            @csrf
                            <button type="submit"
                                class="px-5 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">Mark
                                as Reviewed
                            </button>
                        </form>


                    </div>

                    <br>

                    {{-- column row on button back --}}
                    <div class="col">
                        <div class="text-right">
                            <a type="button" href="{{ route('acadhead_RequirementAssignees', $req_bin_id) }}"
                                class="px-2 py-2 text-sm text-center rounded-lg text-pal-1 hover:bg-gray-200 text-center mr-2 mb-2">

                                <i class="fa fa-arrow-left"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
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
