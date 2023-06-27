        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row-col-sm-6 mb-2">
                    <div class="col-md-3 ml-4">
                        <h1 class="m-0">Bin Setup</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="container">
            <div class="text-right">
                <button type="button" data-toggle="modal" data-target="#modal-xl-assign"
                    class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Assign
                    Requirement</button>
            </div> <br>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="col-3">Requirement Type</th>
                        <th scope="col" class="col-5">Notes</th>
                        <th scope="col" class="col-3">File Format</th>
                        <th scope="col" class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requirements as $requirement)
                        <tr>
                            <th scope="row">{{ $requirement->title }}</th>
                            <td>{{ $requirement->note }}</td>
                            <td>{{ $requirement->file_format }}</td>
                            <td> <button type="button" class="btn btn-danger " data-toggle="dropdown"
                                    aria-expanded="false">
                                    <h1>... </h1>
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('delete_requirements', $requirement->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button data-toggle="modal" type="button"
                                            onclick='openViewModal("{{ $requirement->title }}",  "{{ $requirement->note }}")'
                                            class="dropdown-item px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View</button>
                                        <button type="button"
                                            onclick='openEditModal("{{ $requirement->typeId }}", "{{ $requirement->id }}", "{{ $requirement->note }}")'
                                            class="dropdown-item px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">Edit</button>
                                        <button type="button"
                                            class="dropdown-item px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                            title="Delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><button type="button" class="btn btn-outline-primary btn-lg btn-block"
                                data-toggle="modal" data-target="#modal-xl-create">+Add
                                Requirement</button></td>
                    </tr>

                </tbody>
            </table>
        </section>
        <div class="d-flex justify-content-between">
            <a href="/RequirementBin" class="btn btn-outline-danger btn-lg" id="lower_button">Back</a>

            <button type="button" data-toggle="modal"
                data-target="#modal-xl-restore"class="btn btn-outline-success btn-lg" id="lower_button">Restore</button>

            <style>
                .d-flex {
                    gap: 1rem;
                }

                #lower_button {
                    margin-left: 10px;
                    margin-right: 10px;
                    margin-top: 8px;
                    margin-bottom: 8px;
                }
            </style>
        </div>
