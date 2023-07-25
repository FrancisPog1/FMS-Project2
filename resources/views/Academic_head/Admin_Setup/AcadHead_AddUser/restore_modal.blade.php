    <!-- Restoring Modal -->
    <section class="content">
        <form action="{{ route('admin.restore_users') }}" method="post">
            @csrf
            <div class="modal fade" id="modal-xl-restore">
                <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 700px">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Reactivate Users</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body card-body">

                            <div class="row justify-content-between">

                                {{-- Check all button --}}
                                <div class="ml-2 mt-2">
                                    <label for="check-all-restore">Select/unselect all options: </label>
                                    <input type="checkbox" class="check-all-restore ml-2" id="check-all-restore">
                                </div>

                                <div class="col-md-12 form-group">
                                    {{-- Table body --}}
                                    <div class="card-body p-0">
                                        <table class="table table-striped" id="myTable1">
                                            <thead class="pal-1 text-col-2">
                                                <tr>
                                                    <th>Name</th>
                                                    <th style="width:40%;">Email</th>
                                                    <th style="width:20%;">Role</th>
                                                </tr>
                                            </thead>
                                            <tbody id="filtered-records">
                                                @foreach ($deactivated_users as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="ml-3">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="check" name="users[]"
                                                                    value="{{ $user->deact_id }}">
                                                                <label class="form-check-label" for="check">{{ $user->deact_firstname }} {{ $user->deact_lastname }}</label>
                                                            </div>

                                                        </td>
                                                        <td>{{ $user->deact_email }}</td>
                                                        <td>{{ $user->deact_user_role }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" {{-- Should have a modal for success assign in this element --}}
                                class="btn btn-outline-success ">Restore</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
    </section>
