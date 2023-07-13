
<!-- DATA TABLE -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card" >

            <div class="card-header">
                <h3 class="card-title mt-2">List of Participants</h3>
                <div class="text-right">

                    <button data-toggle="modal" data-target="#modal-xl-add-participants" type="button"
                        class="text-col-1 btn btn-success btn-m p-drop">
                        Add Participants &nbsp;
                        <i class="fas fa-plus"></i>
                    </button>

                </div>
            </div>

            {{-- CODE FOR THE FILTERING --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                        <select name="dataTable_length" aria-controls="dataTable"
                            class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
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


            <!-- Tables of roles -->
            <div class="card-body p-0" >
                <table class="table table-striped">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style="width: 28%;">Name</th>
                            <th style="width: 15%;">Email</th>
                            <th style="width: 12%;">Role</th>
                            <th class="text-center" style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr>

                                <td>
                                    Name 1
                                </td>

                                <td>
                                    {{ $participant->email }}
                                </td>

                                <td>
                                    {{ $participant->role }}
                                </td>

                                <td class="text-sm-center">

                                        <button type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 remove-button"
                                            name="{{ $participant->id }}"
                                            title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td class="dataTables_info text-col-1" id="dataTable_info" role="status" aria-live="polite"
                            colspan="12" style="font-size: .9rem;">
                            Showing x to x of x entries
                        </td>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
</section>
