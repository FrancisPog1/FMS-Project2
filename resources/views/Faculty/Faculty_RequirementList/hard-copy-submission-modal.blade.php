{{-- Hard Copy Submission Modal --}}

<section class="content">
    <form
        id="hard-copy-form-{{ $data->id }}"
        autocomplete="off"
        class="hard-copy-form"
        data-id="{{ $data->id }}">
        @method('POST')
        @csrf
        <div class="modal fade" id="hard-copy-modal-{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-m" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hard Copy Submission</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <input type="hidden" name="requirement_id" id={{$data->id}} value="{{ $data->id }}">
                            <div class="form-group">
                                <label class="required-input">Date of Submission *</label>
                                <input type="datetime-local" class="form-control" id="submission-date-{{ $data->id }}" name="submission_date"
                                    tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                    min="" data-parsley-excluded="true">

                            </div>



                            <div class="form-group">
                                <label>Comments <small class="text-muted">(Optional) </small></label>
                                <textarea type="text" class="form-control" id="comments-{{$data->id}}" name="comments" placeholder="Please enter your comments here..."
                                    tabindex="1" style="height: 100px;"></textarea>
                            </div>


                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit"  class="btn btn-outline-primary">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>


