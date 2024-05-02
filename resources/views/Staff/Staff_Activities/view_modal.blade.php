<!--View Modal-->

<section class="content">
    <form id="viewForm" action="" method="">
        <div class="modal fade" id="modal-xl-view">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">View Activity</h4>
                        <button type="button" class="close" data-dismiss="modal" id="cancelviewButton"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px; overflow: scroll;">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-9">
                                    <label class="required-input">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Title" tabindex="1" readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="required-input">Type</label>
                                    <select id="type" name="type" class="form-control select" disabled>
                                        <option disabled selected>List of type/s</option>
                                        @foreach ($activitytypes as $activitytype)
                                            <option value="{{ $activitytype->id }}">
                                                {{ $activitytype->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" id="inputField" name="description" placeholder="Description"
                                        tabindex="1" style="height: 100px;" readonly></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Location" tabindex="1" readonly>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="required-input">Status</label>
                                    <input class="form-control" name="status" id="status" type="text"
                                        value="ONGOING" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 additional-input">
                                    <label class="required-input">Start time</label>
                                    <input type="text" class="form-control" id="start_datetime" name="start_datetime"
                                        tabindex="1" readonly>
                                </div>

                                <div class="form-group col-md-6 additional-input">
                                    <label class="required-input">End time</label>
                                    <input type="text" class="form-control" id="end_datetime" name="end_datetime"
                                        tabindex="1" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="" id="memo_upload">
                                    <div class="dz-default dz-message"><button class="dz-button" type="button">Drop
                                            files here to upload</button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                            id="closeviewModalButton">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>
