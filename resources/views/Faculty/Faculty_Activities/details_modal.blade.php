
            <!--View Modal-->
            <section class="content">
                <div class="modal fade" id="modal-xl-view-{{$activity->id}}">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Activity Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="height: 500px; ">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body"  style="height: 460px; overflow:auto;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="font-weight-bold">Title:</h5>
                                                                <p>{{ $activity->title }}</p> <br>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <h5 class="font-weight-bold">Posted by:</h5>
                                                                <p>{{ $activity->first_name }} {{ $activity->last_name }}</p><br>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <h5 class="font-weight-bold">Assigned by:</h5>
                                                                <p>{{ $activity->assigner_firstname }} {{ $activity->assigner_lastname }}</p><br>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <h5 class="font-weight-bold">Posted at:</h5>
                                                                <p>{{ $activity->created_at }}</p> <br>
                                                                <h5 class="font-weight-bold">Activity type:</h5>
                                                                <p>{{ $activity->type_title }}</p> <br>
                                                             </div>

                                                            <div class="col-md-6">
                                                                <h5 class="font-weight-bold">Starting date:</h5>
                                                                <p>{{ $activity->start_datetime }}</p> <br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="font-weight-bold">Ending date:</h5>
                                                                <p>{{ $activity->end_datetime }}</p> <br>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <h5 class="font-weight-bold">Status:</h5>
                                                                <p>{{ $activity->status }}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card ">
                                                    <div class="card-body" style="height: 460px; overflow:auto;" >
                                                        <h5 class="font-weight-bold">Description:</h5>
                                                        <div>{!!$activity->description!!} </div> <br>
                                                        <h5 class="font-weight-bold">Location:</h5>
                                                        <p>{{ $activity->location }}</p><br>

                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>

                            <div class="modal-footer
                                    justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
