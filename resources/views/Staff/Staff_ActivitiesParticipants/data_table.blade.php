
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

            <!-- Tables of roles -->
            <div class="card-body p-0" >
                <table class="table table-striped" id="myTable">
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
                                    {{ $participant->first_name }}  {{ $participant->last_name }}
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

                </table>
            </div>
        </div>
    </div>
</section>
