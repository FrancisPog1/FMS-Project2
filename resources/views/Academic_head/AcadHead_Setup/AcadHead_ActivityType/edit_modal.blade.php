{{-- Edit Modal --}}

<section class="content">
    <form id="editForm" action="" method="post">
        @method('PUT')
        @csrf

        <div class="modal fade" id="modal-xl-edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Activity Type</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cancelButton" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 400px;">
                        <div class="card-body">

                            @include('Form_Group.edit_form')

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="required-input">Category</label>
                                    <select id="category" name="category" class="form-control select2">
                                        <option disabled selected>List of category/s</option>
                                        <option value="Activity">Activity</option>
                                        <option value="Meeting">Meeting</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" id="closeModalButton"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save
                            changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
