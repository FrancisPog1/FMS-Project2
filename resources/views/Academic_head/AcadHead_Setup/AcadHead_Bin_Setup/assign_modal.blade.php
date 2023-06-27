<!--Assign Requirement Modal-->
<section class="content">
    <form action="{{ route('Assign_Requirement', $bin_id) }}" method="post">
        @csrf
        <div class="modal fade" id="modal-xl-assign">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Requirement Bin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px;">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="role">Filter by Role</label>
                                    <select id="role" name="role" class="form-control">
                                        <option selected>Choose Role/s</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-5">
                                    <label>Select All</label>
                                    <input type="checkbox" id="switch" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6"></div>
                                <div class=" form-group col-sm-12 col-md-3">

                                    <input type="search" class="form-control" placeholder="Search"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">

                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead class="pal-1 text-col-2">
                                                <tr>
                                                    <th style="width: 1%;"></th>
                                                    <th style="width: 35%;">Name</th>
                                                    <th style="width: 25%;">Email</th>
                                                    <th style="width: 15%;">Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td> <input type="checkbox" name="users[]"
                                                                value="{{ $user->id }}"></td>
                                                        <td>Name 1</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="text-col-1" style="font-size: .9rem;">
                                                <tr>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="dataTables_info" id="dataTable_info"
                                                                role="status" aria-live="polite">
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
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>

<script>
    var switchButton = document.getElementById("switch");
    var checkboxes = document.querySelectorAll("input[type='checkbox']");

    switchButton.addEventListener("change", function() {
        for (var checkbox of checkboxes) {
            checkbox.checked = switchButton.checked;
        }
    });
</script>
