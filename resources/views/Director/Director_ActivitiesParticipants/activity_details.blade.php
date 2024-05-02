

<!-- Activity Details -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">Activity Details</h3>
                <div class="text-right">
                    <button class="btn btn-link" id="hideButton">Hide</button>
                </div>
            </div>
            <div class="card-body" id="cardBody">
                <div class="row">

                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body" style="height: 400px; overflow:auto;">

                                    <h5 class="font-weight-bold ">Posted by:</h5>
                                    <p> {{ $detail->first_name }} {{ $detail->last_name }}</p><br>

                                    <h5 class="font-weight-bold">Posted at:</h5>
                                    <p>{{ $detail->created_at }}</p> <br>
                                    <h5 class="font-weight-bold">Title:</h5>
                                    <p>{{ $detail->title }}</p> <br>
                                    <h5 class="font-weight-bold">Activity type:</h5>
                                    <p>{{ $detail->type }}</p> <br>
                                    <h5 class="font-weight-bold" id="description">Description:</h5>
                                    <div>{!!$detail->description!!} </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body" style="height: 400px; overflow:auto;">
                                    <h5 class="font-weight-bold">Location:</h5>
                                    <p>{{ $detail->location }}</p><br>
                                    <h5 class="font-weight-bold">Starting date:</h5>
                                    <p>{{ $detail->start_datetime }}</p> <br>
                                    <h5 class="font-weight-bold">Ending date:</h5>
                                    <p>{{ $detail->end_datetime }}</p> <br>
                                    <h5 class="font-weight-bold">Status:</h5>
                                    <p>{{ $detail->status }}</p>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Get the button
    const hideButton = document.getElementById('hideButton');

    // Get the card body
    const cardBody = document.getElementById('cardBody');

    // Toggle the visibility of the card body
    hideButton.addEventListener('click', function() {
        cardBody.classList.toggle('d-none');

        // Change the text of the button
        if (cardBody.classList.contains('d-none')) {
            hideButton.textContent = 'Show';
        } else {
            hideButton.textContent = 'Hide';
        }
    });
</script>

