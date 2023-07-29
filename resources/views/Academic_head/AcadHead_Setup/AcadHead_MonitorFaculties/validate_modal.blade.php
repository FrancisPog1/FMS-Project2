<section class="content">
    <form id="Form-{{ $user->id }}"
        action=""
        method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="modal-xl-validate-{{ $user->id }}">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validate Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="closeModalButton-{{ $user->id }}">
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
                                                            <p> {{ $user->first_name }} {{ $user->last_name }}</p><br>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <h5 class="font-weight-bold ">Reviewed at:</h5>
                                                            <p> {{ $user->reviewed_at }}</p><br>
                                                        </div>
                                                      </div>

                                                    <div class="form-group">
                                                        <label for="remarks">Remarks</label>
                                                        <textarea type="text" class="form-control" id="remarks" name="remarks" style="height: 200px; resize: none;"> {{ $user->remarks }}
                                                        </textarea>

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

                                                    <ul id="files-{{$user->id }}" class="list-group">

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
                                data-requirement-id="{{ $user->id }}"
                                data-user-id="{{ $user_id }}"
                                data-req-bin-id="{{ $user->req_bin_id }}"
                                data-assigned-bin-id="{{ $user->assigned_bin_id }}"
                                id="reject-button">Reject</button>

                        <button  class="btn btn-outline-primary swalDefaultSuccess"
                                type="button"
                                data-requirement-id="{{ $user->id }}"
                                data-user-id="{{ $user_id }}"
                                data-req-bin-id="{{ $user->req_bin_id }}"
                                data-assigned-bin-id="{{ $user->assigned_bin_id }}"
                                id="approve-button">Approve</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
