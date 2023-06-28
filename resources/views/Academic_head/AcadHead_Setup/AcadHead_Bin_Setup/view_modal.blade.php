 <!--View Modal-->
 <section class="content">
     <form id="viewForm" action="" method="">
         <div class="modal fade" id="modal-xl-view">
             <div class="modal-dialog modal-dialog-centered modal-xl">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">View Requirement</h4>
                         <button type="button" class="close" data-dismiss="modal" id="View_cancelButton"
                             aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body" style="height: 500px;">
                         <div class="card-body">
                             <div class="row">
                                 <div class="form-group col-md-12">
                                     <label class="required-input">Requirement Type</label>
                                     <input type="text" class="form-control" id="type" name="type"
                                         tabindex="1" readonly>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col-md-12">
                                     <label>Notes</label>
                                     <textarea type="text" class="form-control" id="notes" name="notes" placeholder="Description" tabindex="1"
                                         style="height: 100px;" readonly></textarea>
                                 </div>
                             </div>

                         </div>
                     </div>

                     <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-outline-danger" id="View_closeModalButton"
                             data-dismiss="modal">Close</button>
                     </div>
                     <!-- /.modal-content -->
                 </div>
                 <!-- /.modal-dialog -->
             </div>
     </form>
 </section>
