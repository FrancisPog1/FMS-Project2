   <!--Edit Modal-->
   <section class="content">
       <form id="editForm-{{$activity->id}}" action="{{ route('staff_update_activities', $activity->id) }}" method="post">
           @method('PUT')
           @csrf
           <div class="modal fade" id="modal-xl-edit-{{ $activity->id }}">
               <div class="modal-dialog modal-dialog-centered modal-xl">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 class="modal-title">Edit New Activity</h4>
                           <button type="button" class="close" data-dismiss="modal" id="cancelButton-{{$activity->id}}"
                               aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body" style="height: 500px; overflow: scroll;">
                           <div class="card-body">

                               <div class="row">
                                   <div class="form-group col-md-9">
                                       <label class="required-input">Title</label>
                                       <input type="text" class="form-control" id="title" name="title" value=" {{ $activity->title }}"
                                           placeholder="Title" tabindex="1" required="">
                                   </div>

                                   <div class="form-group col-md-3">
                                       <label class="required-input">Type</label>
                                       <select id="type" name="type" class="form-control select">
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
                                       <textarea type="text" class="form-control" id="edit-description-{{$activity->id}}" name="description"
                                        placeholder="Description" >{!!$activity->description !!}</textarea>
                                   </div>
                               </div>

                               <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Agenda</label>
                                    <textarea type="text" class="form-control" id="edit-agenda-{{$activity->id}}" name="agenda"
                                        tabindex="1" style="height: 100px;">{{ $activity->agenda }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{$activity->location}}"
                                        placeholder="Location" tabindex="1" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 additional-input">
                                    <label class="required-input">Start time</label>
                                    <input type="datetime-local" class="form-control" id="start_datetime"
                                        name="start_datetime" tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                        min="{{ date('Y-m-d 00:00:00') }}" data-parsley-excluded="true">
                                </div>

                                <div class="form-group col-md-6 additional-input">
                                    <label class="required-input">End time</label>
                                    <input type="datetime-local" class="form-control" id="end_datetime"
                                        name="end_datetime" tabindex="1" value="{{ date('Y-m-d 00:00:00') }}"
                                        min="{{ date('Y-m-d 00:01:00') }}" data-parsley-excluded="true">
                                </div>
                            </div>
                        </div>
                       </div>
                       <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                               id="closeModalButton-{{$activity->id}}">Close</button>
                           <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save
                               Changes</button>
                       </div>
                   </div>
                   <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
           </div>
       </form>
   </section>
