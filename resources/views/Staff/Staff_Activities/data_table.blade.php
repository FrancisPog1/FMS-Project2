<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title mt-2">List of Activities</h3>
                <div class="text-right">

                    <button data-toggle="modal" data-target="#modal-xl-restore" type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300">
                        Restore</button>

                    <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                        class="text-col-1 btn btn-success btn-m p-drop">
                        Create activity &nbsp;
                        <i class="fas fa-plus"></i>
                    </button>

                </div>
            </div>

            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
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
                                    <form method="POST" action="{{ route('staff.delete_activity', $activity->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">

                                        <a href="{{ route('staff.activity_participants.show', $activity->id)}}"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
                                        </a>

                                        <button data-toggle="modal" type="button" data-target="#modal-xl-edit-{{$activity->id}}"
                                            onclick="editDescription('#edit-description-{{$activity->id}}'), editModal('{{ $activity->id }}')"
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
                </table>
            </div>
        </div>
    </div>
</section>
