<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">

            <div class="card-header">
                <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                <select name="dataTable_length" aria-controls="dataTable"
                    class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                    <option value="10">
                        10
                    </option>
                    <option value="25">
                        25
                    </option>
                    <option value="50">
                        50
                    </option>
                    <option value="100">
                        100
                    </option>
                </select>

                <div class="row float-right justify-content-between">
                    <div class="col-6">
                        <input type="search" class="" placeholder=" Search activites" aria-controls=""
                            style="width: 150px; height: 30px; font-size: .9rem; border-radius: 5px;">
                    </div>
                    <div class="col-6">
                        <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                            class="text-col-1 btn btn-success btn-m p-drop">
                            Create activity &nbsp;
                            <i class="fas fa-plus"></i>
                        </button>
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
                                    <button data-toggle="modal" data-target="#modal-xl" type="button"
                                        class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <i class="far fa-eye"></i>
                                    </button>
                                    <button data-toggle="modal" type="button" data-target="#modal-xl-edit"
                                        onclick="openEditModal('{{ $activity->title }}', '{{ $activity->type }}', '{{ $activity->description }}','{{ $activity->location }}', '{{ $activity->status }}', '{{ $activity->start_datetime }}', '{{ $activity->end_datetime }}', '{{ $activity->id }}')"
                                        class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button id="button1" type=""
                                        class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300">
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
