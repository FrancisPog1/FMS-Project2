  <!--Edit Modal-->
  <section class="content">
      <form id="editForm" action="" method="post">
          @method('PUT')
          @csrf
          <div class="modal fade" id="modal-xl-edit">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Create Requirement Bin</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                              id="closeModalButton">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body" style="height: 500px;">
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-md-12">
                                      <label class="required-input">Requirement Type</label>
                                      <select id="type" name="type" class="form-control form-control-lg">
                                          @foreach ($requirementtypes as $types)
                                              <option value="{{ $types->id }}">{{ $types->title }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-12">
                                      <label>Notes</label>
                                      <textarea type="text" class="form-control" id="notes" name="notes" placeholder="Description" tabindex="1"
                                          style="height: 100px;"></textarea>
                                  </div>
                              </div>

                          </div>
                      </div>

                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                              id="cancelButton">Close</button>
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
