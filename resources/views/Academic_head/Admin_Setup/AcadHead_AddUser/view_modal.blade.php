{{-- To view user role --}}
<section class="content">
    <form id="viewForm" action="" method="post">
        <div class="modal fade" id="modal-xl-view">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View User</h4>
                        <button type="button" class="close" data-dismiss="modal" id="View_closeModalButton"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 400px;">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="required-input">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        tabindex="1" readonly>
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                            id="View_cancelButton">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
