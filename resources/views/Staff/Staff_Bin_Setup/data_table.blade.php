

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
                                    <h1 class="ml-1 mt-2">Please setup the requirements for the
                                        [{{ $requirement_bin->title }}]
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
                                    {{-- <th style="width:30%;">Notes</th>
                                    <th style="width:20%;">File Format</th> --}}
                                    <th class="text-center" style="width:20%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requirements as $requirement)
                                    <tr>
                                        <th scope="row">{{ $requirement->title }}</th>
                                        {{-- <td>{{ $requirement->note }}</td>
                                        <td>{{ $requirement->file_format }}</td> --}}

                                        <td class="text-center">
                                            <form action="{{ route('staff.delete_requirements', $requirement->id) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" data-target="#modal-xl-view-{{ $requirement->id }}" data-toggle="modal"
                                                    class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <i class="far fa-eye"></i>
                                                </button>

                                                <button type="button"
                                                    onclick='openEditModal("{{ $requirement->typeId }}", "{{ $requirement->id }}")'
                                                    class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                                    <i class="far fa-edit"></i>
                                                </button>

                                                <button type="button"
                                                    class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                                    title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                {{-- View Modal --}}
                                @include('Staff/Staff_Bin_Setup/view_modal')

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
                        <button data-toggle="modal" data-target="#modal-xl-assign" type="button"
                            class="px-5 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-green-300">
                            Assign a requirement
                        </button>
                    </div>

                    <br>

                    {{-- column row on button back and restore --}}
                    <div class="col">
                        <div class="text-right">
                            <a type="button" href="/RequirementBin"
                                class="px-2 py-2 text-sm text-center rounded-lg text-pal-1 hover:bg-gray-200 text-center mr-2 mb-2">

                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <button type="button" data-toggle="modal" data-target="#modal-xl-restore"
                                class="px-2 py-2 text-sm text-center rounded-lg hover:bg-gray-200 text-center mr-2 mb-2"
                                style="color: #28a745">
                                <i class="fa fa-undo"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
