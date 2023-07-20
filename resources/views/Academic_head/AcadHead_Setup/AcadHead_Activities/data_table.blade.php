<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title mt-2">List of Activities</h3>
                <div class="text-right">

                    <button data-toggle="modal" data-target="#modal-xl-restore" type="button" class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">
                        Restore</button>

                    <button data-toggle="modal" data-target="#modal-xl-create" type="button" class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">
                        Create Activity</button>
                </div>
            </div>

            {{-- CODE FOR THE FILTERING --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                        <select name="dataTable_length" aria-controls="dataTable" class="ml-2 col-3 custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-8 d-flex">
                        <div class="mr-2">
                            <select name="status" id="status" class="form-control">
                                <option value="all">All</option>
                                <option value="open">Open</option>
                                <option value="in-progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div style="width:20%;">
                            <select name="department" id="department" class="form-control">
                                <option value="all">All</option>
                                <option value="department-1">Department 1</option>
                                <option value="department-2">Department 2</option>
                                <option value="department-3">Department 3</option>
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
                            <th style="width: 28%;">Title</th>
                            <th style="width: 15%;">Type</th>
                            <th style="width: 12%;">Status</th>
                            <th style="width: 16%;">Date</th>
                            <th class="text-center" style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>
                                    {{ $activity->title }}
                                </td>
                                <td>
                                    {{ $activity->type_title }}
                                </td>
                                <td>
                                    <button type="button"
                                        class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">{{ $activity->status }}</button>
                                </td>
                                <td>
                                    {{ $activity->start_datetime }} - <br> {{ $activity->end_datetime }}
                                </td>

                                <td class="text-sm-center">
                                    <form method="POST" action="{{ route('admin.delete_activity', $activity->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">

                                        <a href="{{ route('admin.activities_participants.show', $activity->id)}}"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
                                        </a>

                                        <button data-toggle="modal" type="button" data-target="#modal-xl-edit-{{$activity->id}}"
                                            onclick="editDescription('#edit-description-{{$activity->id}}', '#edit-agenda-{{$activity->id}}'), editModal('{{ $activity->id }}')"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300 edit-button">
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

                        {{-- EDIT MODAL --}}
                        @include('Academic_head/AcadHead_Setup/AcadHead_Activities/edit_modal')

                        @endforeach
                    </tbody>
                    <tfoot>
                        <td class="dataTables_info text-col-1" id="dataTable_info" role="status" aria-live="polite"
                            colspan="5" style="font-size: .9rem;">
                            Showing x to x of x entries
                        </td>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
</section>
