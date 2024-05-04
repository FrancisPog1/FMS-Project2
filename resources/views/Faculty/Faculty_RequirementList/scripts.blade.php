<style>
    .list-group-item {
/* Change the target property to 'color' */
        color: rgb(0, 0, 0); /* Or whatever your default text color is */
    }

    .list-group-item:hover {
      /* Or your desired hover color */

        background-color: rgba(54,151,99);
        color: white;
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
    // This is for deleting the files
    function deleteFile(button) {
        var id = button.getAttribute('data-id');
        var deleteFile = "{{ route('faculty.files.unsubmit', ':id')}}";
        var deleteRoute = deleteFile.replace(':id', id);

        // Make an Ajax request to delete the file.
        $.ajax({
            url: deleteRoute,
            type: 'get',
            success: function() {
                $('#list-'+id).hide(500);
            },
            error: function() {
                // File deletion failed.
            }
        });
    }

    document.addEventListener('click', function(event) {
        if (event.target.matches('#delete-file-button')) {
            deleteFile(event.target);
        }
    });

</script>





<script>
    function displayFileModal(file_id) {
        var Url = "{{ route('faculty.files.display') }}";
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
    $(document).ready(function() {
        var countdown = 2;

        // Handle form submission
        $('.hard-copy-form').on('submit', function(event) {
            var id = $(this).data('id');
            event.preventDefault();
            event.stopPropagation();
            var serializedData = $("#hard-copy-form-"+id).serialize();
            url =

            jQuery.ajax({
                type: 'post',
                url: "{{ route('faculty.upload_hardcopy') }}",
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FilePond.registerPlugin(FilePondPluginImagePreview);
            // Get a reference to the file input element
            const inputElement_{{ $loop->iteration }} = document.querySelector('#upload-file-{{ $data->id }}');

            // Create a FilePond instance
            var pond = FilePond.create(inputElement_{{ $loop->iteration }});


            FilePond.setOptions({
                server: {
                    process: {
                        url: "{{ route('faculty.upload_file') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    revert: {
                        url: "{{ route('faculty.delete_file') }}",
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                },
            });
        });
    </script>


    {{-- Scripts for showing the Upload modal --}}
    <script>
        // Add event listener for upload buttons using event delegation
        const myButton_{{ $loop->iteration }} = document.getElementById('upload-button-{{ $data->id }}');
        myButton_{{ $loop->iteration }}.addEventListener('click', function() {
            $.ajax({
                url: "{{ route('faculty.files.view') }}",
                method: 'GET',
                data: {
                    req_bin_id: '{{ $req_bin_id }}',
                    user_id: '{{ $user_id }}',
                    type_id: '{{ $data->id }}'
                },
                success: function(data) {
                    var file = data.files;
                    var html = '';

                    // Update the modal content with the files
                    if (file.length > 0) {
                        for (let i = 0; i < file.length; i++) {

                        html += '<li id="list-' + file[i]['id'] + '" class=" btn list-group-item rounded border mb-2" onclick="displayFileModal('+ "'" + file[i]['id'] + "'" + ')" >'+
                                                            '<div class="d-flex justify-content-between align-items-center">' +
                                                            '  <span>' + file[i]['file_name'] +'</span>' +
                                                                '<div class="d-flex">' +
                                                                ' <button type="button" id="delete-file-button" onclick="deleteFile(this), event.stopPropagation();"'+
                                                                'data-id="' + file[i]['id'] + '">' +
                                                                    '<i class="far fa-trash-alt" title="Delete"></i></button>' +

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
