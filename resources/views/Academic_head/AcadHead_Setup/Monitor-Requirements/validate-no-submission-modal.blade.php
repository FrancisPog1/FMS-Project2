<section class="content">
    <form id="no-submission-form-{{ $data->id }}"
        class="no-submission-form"
        action=""
        method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="no-submission-modal-{{ $data->id }}">
            <div class="modal-dialog modal-dialog-centered modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validate Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="closeModalButton-{{ $data->id }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <input type="hidden" id="no-submission-requirement-id-{{ $data->id }}" name="requirementId" value="{{ $data->id }}">

                        <input type="hidden" id="no-submission-bin-{{ $data->id }}" name="req_bin_id" value="{{$req_bin_id}}">

                        <input type="hidden" id="no-submission-assigned-bin-{{ $data->id }}" name="assigned_bin_id" value="{{$assigned_bin_id}}">

                        <div>
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
                                <textarea type="text" class="form-control rounded-md" id="remarks" name="remarks" style="height: 200px; resize: none;"> {{ $data->remarks }}</textarea>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger reject-button"
                                data-formID="#no-submission-form-{{ $data->id }}"
                                data-id="{{ $data->id }}"
                                id="no-submission-reject-button-{{ $data->id }}">Reject
                        </button>

                        <button  class="btn btn-outline-primary approve-button"
                                type="button"
                                data-formID="#no-submission-form-{{ $data->id }}"
                                data-id="{{ $data->id }}"
                                id="no-submission-approve-button-{{ $data->id }}">Approve
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
