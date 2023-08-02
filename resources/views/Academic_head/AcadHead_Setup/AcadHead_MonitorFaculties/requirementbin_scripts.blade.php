<style>
    /* Custom CSS for smaller font size in table headers */
    .small-font {
        font-size: 13px; /* Adjust the font size as per your requirement */
    }
</style>

<script>
    // Add event listener for upload buttons using event delegation
    document.addEventListener('click', function(event) {
        if (event.target.matches('.validate-button')) {
            var button = event.target;
            var remarks = button.getAttribute('data-remarks');
            var requirementId = button.getAttribute('data-requirement-id');
            var reqBinId = button.getAttribute('data-req-bin-id');
            var user_id = button.getAttribute('data-user-id');
            var viewFiles = "#files-" + requirementId;

            $.ajax({
                url: "{{ route('admin.files.view') }}",
                method: 'GET',
                data: {
                    req_bin_id: reqBinId,
                    user_id: user_id,
                    type_id: requirementId
                },
                success: function(data) {
                    var file = data.files;
                    var html = '';
                    var downloadRoute = "{{ route('admin.files.download', ':file_id')}}";
                    // Update the modal content with the files
                    if (file.length > 0) {
                        for (let i = 0; i < file.length; i++) {

                        html += '<li class="list-group-item rounded-pill border mb-2 shadow" style="background-color: rgba(54,151,99); color: white;" onclick="displayFileModal('+ "'" + file[i]['id'] + "'" + ')" >'+
                                                            '<div class="d-flex justify-content-between align-items-center">' +
                                                              '  <span>' + file[i]['file_name'] +'</span>' +
                                                                '<div class="d-flex">' +
                                                                    '<a href="' + downloadRoute.replace(':file_id', file[i]['id'])  + '" onclick="event.stopPropagation();"> <i class="fa fa-download fa-s" style="color: white;"  title="Download"></i></a>' +
                                                               ' </div>' +
                                                            '</div>' +
                                                        '</li>';
                        }
                    }
                    $(viewFiles).html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
                });
        }
    });

</script>

<style>
    .list-group-item:hover {
    /* Change the font size */
    font-size: 1.2em;
    }
</style>

<script>
function displayFileModal(file_id) {

        var Url = "{{ route('admin.files.display') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: Url,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    'file_id': file_id,
                },
                success: function(data) {
                    var files = data.files;
                    var html = '';

                    if (files != null) {

                            html += '<iframe src="http://localhost:8000/storage/uploaded_files/' + files['file_path'] + '" width="100%" height="600px"> </iframe>';

                    } else {
                        html += ' No Records';
                    }

                    $('#display-files').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });

            $('#modal-xl-show-file').modal('show');

            document.getElementById('closeFileButton').addEventListener('click', function() {
            $('#modal-xl-show-file').modal('hide');
            });
}

    </script>

<style>
    .d-flex {
        gap: 1rem;
    }

    #lower_button {
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 8px;
        margin-bottom: 8px;
    }
</style>

<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    document.addEventListener('click', function(event) {
        if (event.target.matches('#reject-button')) {
            var button = event.target;
            var remarks = button.getAttribute('data-remarks');
            var requirementId = button.getAttribute('data-requirement-id');
            var reqBinId = button.getAttribute('data-req-bin-id');
            var assignedBinId = button.getAttribute('data-assigned-bin-id');
            var user_id = button.getAttribute('data-user-id');
            var countdown = 2;
            var formID = "#Form-" + requirementId;

            alert("Assigned bin id = " + assignedBinId );

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var rejectRoute = "{{ route('admin.reject_requirements', ['requirementId' => ':requirementId', 'req_bin_id' => ':req_bin_id', 'assigned_bin_id' => ':assignId']) }}";
            var rejectUrl = rejectRoute.replace(':requirementId', requirementId).replace(':req_bin_id', reqBinId).replace(':assignId', assignedBinId);
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: rejectUrl,
                data: jQuery(formID).serialize(), // Serialize the form data

                success: function(response) {
                    if (response.success === true) {
                        // Hide the modal using the modal's instance
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                        toastr.success(response.message, 'Success Alert', {
                            timeOut: 5000
                        });

                        //Countdown before reloading the page
                        var timer = setInterval(function() {
                            countdown--;

                            if (countdown === 0) {
                                clearInterval(timer);
                                location.reload();
                            }
                        }, 1000);
                    } else {
                        // Display validation errors using toastr
                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                toastr.error(value[0], 'Validation Error', {
                                    timeOut: 3000
                                });
                            });
                        } else {
                            toastr.error(response.message, 'Error Alert', {
                                timeOut: 3000
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                }
            });
        }

        else if (event.target.matches('#approve-button')) {
            var button = event.target;
            var remarks = button.getAttribute('data-remarks');
            var requirementId = button.getAttribute('data-requirement-id');
            var reqBinId = button.getAttribute('data-req-bin-id');
            var assignedBinId = button.getAttribute('data-assigned-bin-id');
            var user_id = button.getAttribute('data-user-id');
            var countdown = 2;
            alert("Assigned bin id = " + assignedBinId );
            var formAID = "#Form-" + requirementId;
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var approveRoute = "{{ route('admin.approve_requirements', ['requirementId' => ':requirementId', 'req_bin_id' => ':req_bin_id', 'assigned_bin_id' => ':assignId']) }}";
            var approveUrl = approveRoute.replace(':requirementId', requirementId).replace(':req_bin_id', reqBinId).replace(':assignId', assignedBinId);
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: approveUrl,
                data: jQuery(formAID).serialize(), // Serialize the form data

                success: function(response) {
                    if (response.success === true) {
                        // Hide the modal using the modal's instance
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                        toastr.success(response.message, 'Success Alert', {
                            timeOut: 5000
                        });

                        //Countdown before reloading the page
                        var timer = setInterval(function() {
                            countdown--;

                            if (countdown === 0) {
                                clearInterval(timer);
                                location.reload();
                            }
                        }, 1000);
                    } else {
                        // Display validation errors using toastr
                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                toastr.error(value[0], 'Validation Error', {
                                    timeOut: 3000
                                });
                            });
                        } else {
                            toastr.error(response.message, 'Error Alert', {
                                timeOut: 3000
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                }
            });
        }

    });



</script>

