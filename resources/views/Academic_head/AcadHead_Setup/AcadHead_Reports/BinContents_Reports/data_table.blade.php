<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            {{-- Table header --}}
            <div class="card-header">
                    <h1 class="card-title mt-2">Contents of the Requirement Bin
                        [{{ $requirement_bin->title }}]
                    </h1>
                    <div class="text-right">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-pdf
                                buttons-html5 btn btn-primary mr-2"
                                title="PDF export.">
                                <span>Export as PDF</span>
                            </button>
                            <button tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-excel
                                buttons-html5 btn btn-success"
                                title="Excel export.">
                                <span>Export as XLS</span>
                            </button>
                        </div>
                </div>
            </div>

            <div class="card-header">
                <div class="row">
                    <div class="text-right">

                        {{-- Search bar --}}
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="e.g. SALN" />
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="mr-2">
                            <select name="status" id="status" class="form-control">
                                <option value="all">All</option>
                                <option value="open">Open</option>
                                <option value="in-progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div>
                            <select name="department" id="department" class="form-control">
                                <option value="all">All</option>
                                <option value="department-1">Department 1</option>
                                <option value="department-2">Department 2</option>
                                <option value="department-3">Department 3</option>
                            </select>
                        </div>
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
                            <th style="width:20%;">File Format</th>
                            <th class="text-center" style="width:20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirements as $requirement)
                            <tr>
                                <th scope="row">{{ $requirement->title }}</th>
                                <td>{{ $requirement->note }}</td>
                                <td>{{ $requirement->file_format }}</td>

                                <td class="text-center">

                                        <button
                                            onclick="openViewModal('{{ $requirement->title }}',  '{{ $requirement->note }}')"
                                            type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
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

