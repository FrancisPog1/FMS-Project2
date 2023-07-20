        <!-- Main content -->
        <section class="container">
            <div class="mr-5 ml-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">List of Requirement Type</h3>
                        <div class="text-right">
                            <button data-toggle="modal" data-target="#modal-xl-restore" type="button"
                                class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">
                                Restore</button>

                            <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">Create
                                New Requirement Type</button>
                        </div>
                    </div>

                    {{-- CODE FOR THE FILTERING --}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5">
                                <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                                <select name="dataTable_length" aria-controls="dataTable" class="ml-2 col-3 custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col-7 d-flex">

                                <div style="width:20%;">
                                    <select name="sort" id="sort" class="form-control">
                                        <option selected="" disabled="">Sort by</option>
                                        <option value="All">All</option>
                                        <option value="az">Title: A to Z</option>
                                        <option value="za">Title: Z to A</option>
                                        <option value="oldest">Deadline: Oldest to Newest</option>
                                        <option value="newest">Deadline: Newest to Oldest</option>
                                    </select>
                                </div>
                                <div class="ml-auto" style="width:40%;">
                                    <form class="d-flex">
                                        <input class="form-control me-2 rounded-lg" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tables of roles -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead class="pal-1 text-col-2">
                                <tr>
                                    <th class="text-center">Title</th>
                                    <th class="text-center" style="width: 42%;">Description</th>
                                    <th class="text-center" style="width: 25%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="filtered-types">
                                @foreach ($requirement_types as $requirement_type)
                                    <tr>
                                        <td>{{ $requirement_type->title }}</td>
                                        <td>{{ $requirement_type->description }}</td>
                                        <td class="text-center">
                                            <form method="POST"
                                                action="{{ route('admin.delete_requirementtypes', $requirement_type->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">

                                                <button data-toggle="modal"
                                                    onclick="openViewModal('{{ $requirement_type->title }}', '{{ $requirement_type->description }}')"
                                                    data-target="#modal-xl-view" type="button"
                                                    class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                <button type="button"
                                                    onclick="openEditModal('{{ $requirement_type->title }}', '{{ $requirement_type->description }}',  '{{ $requirement_type->id }}')"
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
                                @endforeach
                            </tbody>
                            <tfoot class="text-col-1" style="font-size: .9rem;">
                                <tr>
                                    <td colspan="3">
                                        <div class="col-sm-12">
                                            <div class="dataTables_info" id="dataTable_info" role="status"
                                                aria-live="polite">
                                                Showing 1 to 4 of 4 entries
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
<br>
