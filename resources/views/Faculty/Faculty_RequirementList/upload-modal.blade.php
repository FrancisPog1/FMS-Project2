<section class="content">
    <form id="uploadForm" action="{{ route('faculty.submit_uploads', '__requirementId__') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="modal-xl-upload">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="closeModalButton">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px;">
                        <div class="card-body" >

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Requirement Details</h5>
                                        </div>
                                        <div class="card-body" style="height: 374px; overflow-y: auto;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="font-weight-bold ">Reviewed by</h5>
                                                    <p id="reviewer-name"> </p><br>
                                                </div>

                                                <div class="col-md-6">
                                                    <h5 class="font-weight-bold ">Reviewed at</h5>
                                                    <p id="reviewed-at"> </p><br>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <h5 class="font-weight-bold ">Status</h5>
                                                <p id="p-status"> </p>
                                                </div>

                                            <div class="form-group">
                                                <label for="remarks">Remarks</label>
                                                <textarea class="form-control" id="remarks" name="remarks" style="height: 150px; resize: none;" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Upload File</h5>
                                        </div>
                                        <div class="card-body" style="height: 374px; overflow-y: auto;">
                                            <div class="form-group">

                                                <input type="file" class="filepond" name="file" id="file"
                                                    multiple credits="false">
                                            </div>

                                            {{-- This is where all the list of uploaded file will be shown --}}
                                            <ul id="files" class="list-group">

                                            </ul>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                            id="cancelButton">Close</button>
                        <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
