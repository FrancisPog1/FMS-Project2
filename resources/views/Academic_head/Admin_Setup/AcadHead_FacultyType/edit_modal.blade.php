<section class="content">
    <form id="editForm" action="" method="post">
        @method('PUT')
        @csrf

        <div class="modal fade" id="modal-xl-edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Rank</h4>
                        <button type="button" class="close" data-dismiss="modal" id="Edit_cancelButton"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 400px;">
                        <div class="card-body">
                            @include('Form_Group.edit_form')
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" id="Edit_closeModalButton"
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
