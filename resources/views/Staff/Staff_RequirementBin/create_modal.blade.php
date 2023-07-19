   <!--Create Modal-->
   <section class="content">
       <form id="create_bin" action="{{ route('staff.requirement_bins.store') }}" method="post">
           @csrf
           <div class="modal fade" id="modal-xl-create">
               <div class="modal-dialog modal-dialog-centered modal-xl">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 class="modal-title">Create Requirement Bin</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body" style="height: 500px; overflow:auto;">
                           <div class="card-body">
                               <div class="row">
                                   <div class="form-group col-md-12">
                                       <label class="required-input">Title</label>
                                       <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Title" tabindex="1" required="">
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-12">
                                       <label>Description</label>
                                       <textarea type="text" class="form-control" id="description" name="description" placeholder="Description"
                                           tabindex="1" style="height: 100px;"></textarea>
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
                           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save</button>
                       </div>
                   </div>
                   <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
           </div>
       </form>
   </section>
