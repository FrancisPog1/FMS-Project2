<!-- Activity Details -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">Requirement Bin Details</h3>
                <div class="text-right">
                    <button class="btn btn-link" id="hideButton">Hide</button>
                </div>
            </div>
            <div class="card-body" style="overflow: auto;" id="cardBody">
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
