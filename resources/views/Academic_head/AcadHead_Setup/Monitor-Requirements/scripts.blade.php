<style>
    .list-group-item {
/* Change the target property to 'color' */
        color: rgb(101, 101, 101); /* Or whatever your default text color is */
    }

    .list-group-item:hover {
      /* Or your desired hover color */

        background-color: rgba(54,151,99);
        color: white;
    }

    .list-group-item:hover a {
    background-color: rgba(54,151,99);
    color: white;
    }

    .list-group-item a {
        color: rgb(101, 101, 101);
    }

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

                            // Construct the file URL dynamically
                            const baseUrl = window.location.origin; // Gets the current domain
                            const fileUrl = baseUrl + '/storage/uploaded_files/' + files['file_path'];

                            // Open the file in a new tab
                            window.open(fileUrl, '_blank');

                        } else {
                            html += ' No Records';
                        }

                        $('#display-files').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });

    }

</script>

<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    document.addEventListener('DOMContentLoaded', function() {
        var countdown = 2;

        // Handle form submission
        $(".reject-button").click(function(event) {
            var id = $(this).data('id');
            var formID = $(this).data('formid');
            event.preventDefault();
            event.stopPropagation();
            var serializedData = $(formID).serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var rejectRoute = "{{ route('admin.reject_requirements') }}";

            jQuery.ajax({
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: rejectRoute,
                data: serializedData,          // Serialize the form data

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
        });
    });
</script>


<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    $(document).ready(function() {
        var countdown = 2;

        // Handle form submission
        $(".approve-button").click(function(event) {
            var id = $(this).data('id');
            var formID = $(this).data('formid');
            event.preventDefault();
            event.stopPropagation();
            var serializedData = $(formID).serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var approveRoute = "{{ route('admin.approve_requirements') }}";


            jQuery.ajax({
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: approveRoute,
                data: serializedData, // Serialize the form data


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
        });
    });
</script>


@foreach ($datas as $data)

    {{-- Scripts for showing the validate modal --}}
    {{-- Scripts for showing the Upload modal --}}
    <script>
        // Add event listener for upload buttons using event delegation
        const myButton_{{ $loop->iteration }} = document.getElementById('soft-copy-button-{{ $data->id }}');
        myButton_{{ $loop->iteration }}.addEventListener('click', function() {

            $.ajax({
                url: "{{ route('admin.files.view') }}",
                method: 'GET',
                data: {
                    req_bin_id: '{{ $req_bin_id }}',
                    user_id: '{{ $user_id }}',
                    type_id: '{{ $data->id }}'
                },
                success: function(data) {
                    var file = data.files;
                    var html = '';
                    var downloadRoute = "{{ route('admin.files.download', ':file_id')}}";
                    // Update the modal content with the files
                    if (file.length > 0) {
                        for (let i = 0; i < file.length; i++) {

                        html += '<li class="list-group-item rounded border mb-2" onclick="displayFileModal('+ "'" + file[i]['id'] + "'" + ')" >'+
                                                            '<div class="d-flex justify-content-between align-items-center">' +
                                                            '  <span>' + file[i]['file_name'] +'</span>' +
                                                                '<div class="d-flex">' +
                                                                    '<a href="' + downloadRoute.replace(':file_id', file[i]['id'])  + '" onclick="event.stopPropagation();"> <i class="fa fa-download fa-s" title="Download"></i></a>' +
                                                            ' </div>' +
                                                            '</div>' +
                                                        '</li>';
                        }
                    }
                    $('#list-of-files-{{ $data->id }}').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
                });
        });

    </script>

@endforeach
