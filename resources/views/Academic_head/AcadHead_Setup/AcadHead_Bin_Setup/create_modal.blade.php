<!-- Assigning Modal -->
    <section class="content">
        <form action="{{ route('admin.requirementbin_setup.store', $bin_id) }}"
         method="post">
            @csrf
            <div class="modal fade" id="modal-xl-create">
                <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 700px">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Add requirements</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body card-body">

                            <div class="row justify-content-between">

                                <div class="col-md-12 form-group">
                                    {{-- Table body --}}
                                    <div class="card-body p-0">
                                        <table class="table table-striped" id="myTable1">
                                            <thead class="pal-1 text-col-2">
                                                <tr>
                                                    <th><input type="checkbox" class="check-all-assign" id="check-all-add">
                                                    </th>

                                                    <th style="width:60%;">Requirement Types</th>
                                                    <th style="width:30%;">Category</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($requirementtypes as $type)
                                                    <tr>
                                                        <td><input type="checkbox"
                                                            id="check" name="types[]"
                                                            value="{{ $type->id }}">
                                                        </td>
                                                        <td>{{ $type->title }}</td>
                                                        <td>Category Name</td>

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
                                class="btn btn-outline-success swalDefaultSuccess">Add</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
    </section>


