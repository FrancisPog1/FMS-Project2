    <!-- Restoring Modal -->
    <section class="content">
        <form action="{{ route('restore_requirements') }}" method="post">
            @csrf
            <div class="modal fade" id="modal-xl-restore">
                <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 700px">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Restore requirements</h4>
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
                                        <table class="table table-striped">
                                            <thead class="pal-1 text-col-2">
                                                <tr>
                                                    <th>Requirement Type</th>
                                                    <th style="width:40%;">File format</th>
                                                    <th style="width:20%;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deleted_requirements as $deleted_requirement)
                                                    <tr>
                                                        <td>
                                                            <div class="ml-3">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="checkbox-0_0" name="deleted_reqs[]"
                                                                    value="{{ $deleted_requirement->id }}">

                                                                <label class="form-check-label"
                                                                    for="checkbox-0_0">{{ $deleted_requirement->title }}</label>
                                                            </div>

                                                        </td>
                                                        <td>{{ $deleted_requirement->file_format }}</td>

                                                        <td>
                                                            <button type="button"
                                                                class="ml-2 px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 destroy-button"
                                                                name="{{ $deleted_requirement->id }}"
                                                                data-name="{{ $deleted_requirement->id }}">
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
