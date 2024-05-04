<section class="content">
    <form id="hard-copy-form-{{ $data->id }}"
        action="hard-copy-form"
        data-id="{{ $data->id }}"
        method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="hard-copy-modal-{{ $data->id }}">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validate Harc Copy Submission</h4>
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
                                                    <input type="hidden" id="hard-copy-requirement-id-{{ $data->id }}" name="requirementId" value="{{ $data->id }}">

                                                    <input type="hidden" id="hard-copy-bin-{{ $data->id }}" name="req_bin_id" value="{{$req_bin_id}}">

                                                    <input type="hidden" id="hard-copy-assigned-bin-{{ $data->id }}" name="assigned_bin_id" value="{{$assigned_bin_id}}">

                                                    @if ($data->reviewed_at)
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <small class="font-weight-bold ">Reviewed by</small>
                                                                <p> {{ $data->first_name }} {{ $data->last_name }}</p><br>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <small class="font-weight-bold ">Reviewed at</small>
                                                                <p> {{ $data->reviewed_at }}</p><br>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="remarks">Remarks <small class="text-muted">(Optional)</small></label>
                                                        <textarea type="text" class="form-control rounded-md" id="remarks" name="remarks" style="height: 200px; resize: none;">{{ $data->remarks }}</textarea>

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
                                                    <div>
                                                        <small class="text-uppercase text-muted font-weight-bold ">SUBMISSION DATE</small>
                                                        <p>{{$data->submission_date}}</p><br>
                                                    </div>

                                                    <div>
                                                        <small class="text-uppercase text-muted font-weight-bold ">UPLOADER'S COMMENTS</small>
                                                        <p>{{$data->uploader_comments}}</p><br>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger reject-button"
                                data-formID="#hard-copy-form-{{ $data->id }}"
                                data-id="{{ $data->id }}"
                                id="hard-copy-reject-button-{{ $data->id }}">Reject
                        </button>

                        <button  class="btn btn-outline-primary approve-button"
                                type="button"
                                data-formID="#hard-copy-form-{{ $data->id }}"
                                data-id="{{ $data->id }}"
                                id="hard-copy-approve-button-{{ $data->id }}">Approve
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
