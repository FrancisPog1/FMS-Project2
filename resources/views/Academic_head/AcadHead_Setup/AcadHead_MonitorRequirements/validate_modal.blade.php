<section class="content">
    <form id="Form-{{ $data->id }}"
        action=""
        method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="modal-xl-validate-{{ $data->id }}">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validate Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="closeModalButton-{{ $data->id }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px; overflow: scroll;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Validation Details</h5>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5 class="font-weight-bold ">Reviewed by:</h5>
                                                            <p> {{ $data->first_name }} {{ $data->last_name }}</p><br>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <h5 class="font-weight-bold ">Reviewed at:</h5>
                                                            <p> {{ $data->reviewed_at }}</p><br>
                                                        </div>
                                                      </div>

                                                    <div class="form-group">
                                                        <label for="remarks">Remarks</label>
                                                        <textarea type="text" class="form-control" id="remarks" name="remarks" style="height: 200px; resize: none;"> {{ $data->remarks }}</textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="card" style="height: 420px; ">
                                                <div class="card-header">
                                                    <h5 class="card-title">Files</h5>
                                                </div>
                                                <div class="card-body" style=" overflow-y: scroll;">
                                                    <!-- List of files goes here -->

                                                    <ul id="files-{{$data->id }}" class="list-group">

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger"
                                data-requirement-id="{{ $data->id }}"
                                data-user-id="{{ $data->user_id }}"
                                data-req-bin-id="{{ $req_bin_id }}"
                                data-assigned-bin-id="{{ $assigned_bin_id }}"
                                id="reject-button">Reject</button>

                        <button  class="btn btn-outline-primary swalDefaultSuccess"
                                type="button"
                                data-requirement-id="{{ $data->id }}"
                                data-user-id="{{ $data->user_id }}"
                                data-req-bin-id="{{ $req_bin_id }}"
                                data-assigned-bin-id="{{ $assigned_bin_id }}"
                                id="approve-button">Approve</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
