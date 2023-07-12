

<!-- Activity Details -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card" style="height: 500px;">
            <div class="card-header">
                <h3 class="card-title mt-2">Activity Details</h3>
                <div class="text-right">
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($activities as $activity)

                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body" style="height: 400px; overflow:auto;">
                                    <h5 class="font-weight-bold ">Posted by:</h5>
                                    <p> {{ $activity->email }}</p><br>
                                    <h5 class="font-weight-bold">Posted at:</h5>
                                    <p>{{ $activity->created_at }}</p> <br>
                                    <h5 class="font-weight-bold">Title:</h5>
                                    <p>{{ $activity->title }}</p> <br>
                                    <h5 class="font-weight-bold">Activity type:</h5>
                                    <p>{{ $activity->type }}</p> <br>
                                    <h5 class="font-weight-bold" id="description">Description:</h5>
                                    <div>{!!$activity->description!!} </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body" style="height: 400px; overflow:auto;">
                                    <h5 class="font-weight-bold">Agenda:</h5>
                                    <div>{!!$activity->agenda!!}</div> <br>
                                    <h5 class="font-weight-bold">Location:</h5>
                                    <p>{{ $activity->location }}</p><br>
                                    <h5 class="font-weight-bold">Starting date:</h5>
                                    <p>{{ $activity->start_datetime }}</p> <br>
                                    <h5 class="font-weight-bold">Ending date:</h5>
                                    <p>{{ $activity->end_datetime }}</p> <br>
                                    <h5 class="font-weight-bold">Status:</h5>
                                    <p>{{ $activity->status }}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


