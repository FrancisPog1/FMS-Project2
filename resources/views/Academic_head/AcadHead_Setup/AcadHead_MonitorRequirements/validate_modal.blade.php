<section class="content">

    <form id="validateForm"
        action="{{ route('admin.validate_requirements', ['requirementId' => '__requirementId__', 'req_bin_id' => '__req_bin_id__', 'assigned_bin_id' => $assigned_bin_id]) }}"
        method="POST">

        @method('PUT')
        @csrf
        <div class="modal fade" id="modal-xl-validate">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Validate Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="closeModalButton">
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
                                                    <div class="form-group">
                                                        <label for="changeStatus">Change Status</label>
                                                        <select class="form-control" id="changeStatus"
                                                            name="changeStatus">
                                                            <!-- Add your options here -->
                                                            <option disabled selected value="Pending">Select a status
                                                            </option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="remarks">Remarks</label>
                                                        <textarea type="text" class="form-control" id="remarks" name="remarks" style="height: 200px; resize: none;">
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

                                                    <ul id="files" class="list-group">

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
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                            id="cancelButton">Close</button>
                        <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
