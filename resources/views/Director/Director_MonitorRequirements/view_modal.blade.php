<section class="content">
        <div class="modal fade" id="modal-xl-view">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View Requirement</h4>
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
                                                        <label for="changeStatus">Status</label>
                                                        <input type="text" class="form-control" id="status" name="status" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="remarks">Remarks</label>
                                                        <textarea type="text" class="form-control" id="remarks" name="remarks" style="height: 200px; resize: none;" readonly>

                                                        </textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="card" style="height: 420px; ">
                                                <div class="card-header">
                                                    <h5 class="card-title">Uploaded Files</h5>
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
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
</section>
