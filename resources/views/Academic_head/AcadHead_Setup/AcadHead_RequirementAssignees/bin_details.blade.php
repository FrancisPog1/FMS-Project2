

<!-- Activity Details -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card" style="height: 400px;">
            <div class="card-header">
                <h3 class="card-title mt-2">Requirement Details</h3>
                <div class="text-right">
                </div>
            </div>
            <div class="card-body" style="overflow: auto;" >
                <div  class="">
                    @foreach ( $requirementbin as $detail)
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold ">Posted by:</h5>
                            <p> {{ $detail->email }}</p><br>
                        </div>

                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Starting date:</h5>
                            <p>{{ $detail->bin_start_datetime }}</p> <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Posted at:</h5>
                            <p>{{ $detail->bin_created_at }}</p> <br>
                        </div>

                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Ending date:</h5>
                            <p>{{ $detail->bin_end_datetime }}</p> <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Title:</h5>
                            <p>{{ $detail->bin_title }}</p> <br>
                        </div>

                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Status:</h5>
                            <p>{{ $detail->bin_status }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="font-weight-bold" id="description">Description:</h5>
                            <div>{!!$detail->bin_description!!} </div>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>


