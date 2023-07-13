        <!-- Assigning Modal -->
        <section class="content">
            <form id="assign" action="{{ route('staff_add_participants', $activity_id) }}" method="post">
                @csrf
                <div class="modal fade" id="modal-xl-add-participants">
                    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 700px">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Add Participants</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body card-body">

                                <div class="row justify-content-between">

                                    <div class="row col-md-12">

                                        <div class="col-4 form-group">
                                            <select id="types" name="types" class="form-control form-control-md">
                                                <option selected disabled>Choose Role/s</option>
                                                <option value="All"> All</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            {{-- Search bar --}}
                                            <div class="input-group">
                                                <input type="search" class="form-control"
                                                    placeholder="Search a user" />
                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- Check all button --}}
                                        <div class="col-2 mt-2">
                                            <input type="checkbox" class="check-all-assign" id="check-all-assign">
                                            <label for="check-all-assign">Add all</label>
                                        </div>

                                    </div>

                                    <div class="col-md-12 form-group">
                                        {{-- Table body --}}
                                        <div class="card-body p-0">
                                            <table class="table table-striped">
                                                <thead class="pal-1 text-col-2">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th style="width:40%;">Email</th>
                                                        <th style="width:20%;">Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="filtered-records">
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>
                                                                <div class="ml-3">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="check" name="users[]"
                                                                        value="{{ $user->id }}">
                                                                    <label class="form-check-label" for="check">
                                                                        Faculty
                                                                        1</label>
                                                                </div>

                                                            </td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->role }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" {{-- Should have a modal for success assign in this element --}}
                                    class="btn btn-outline-success swalDefaultSuccess">Assign</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>


