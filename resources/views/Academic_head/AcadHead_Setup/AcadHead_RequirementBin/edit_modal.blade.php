<!--Edit Modal-->
<section class="content">
    <form id="editForm-{{$requirementbin->id}}" action="{{ route('update_requirementbins', $requirementbin->id) }}"  method="post">
        @method('PUT')
        @csrf
        <div class="modal fade" id="modal-xl-edit-{{$requirementbin->id}}">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Requirement Bin</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cancelButton-{{$requirementbin->id}}" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px; overflow:auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="required-input">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$requirementbin->title}}"
                                        placeholder="Title" tabindex="1" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" id="edit-description-{{$requirementbin->id}}" name="description" placeholder="Description"
                                        tabindex="1" style="height: 100px;">{{$requirementbin->description}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="required-input">Starting date</label>
                                    <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                        tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                        min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">

                                </div>

                                <div class="form-group col-md-6">
                                     <label class="required-input">Ending date</label>
                                     <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                         tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                         min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">

                                 </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" id="closeModalButton-{{$requirementbin->id}}"
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
