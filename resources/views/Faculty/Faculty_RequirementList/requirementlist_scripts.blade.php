{{-- Scripts for showing the Upload modal --}}
<script>
    // Add event listener for upload buttons using event delegation
    document.addEventListener('click', function(event) {
        if (event.target.matches('.upload-button')) {
            var button = event.target;
            var status = button.getAttribute('data-status');
            var remarks = button.getAttribute('data-remarks');
            var requirementId = button.getAttribute('data-requirement-id');
            var reqBinId = button.getAttribute('data-req-bin-id');
            var user_id = button.getAttribute('data-user-id');
            var reviewer_name = button.getAttribute('data-name');
            var reviewed_at = button.getAttribute('data-reviewed_at');


            //Displaying the data to the page
            document.getElementById('remarks').value = remarks;
            document.getElementById("reviewed-at").innerHTML = reviewed_at;
            document.getElementById("reviewer-name").innerHTML = reviewer_name;
            document.getElementById("p-status").innerHTML = status;


            // Set the action of the form dynamically using JavaScript
            var form = document.getElementById('uploadForm');
            form.action = form.action.replace('__requirementId__', requirementId).replace('__req_bin_id__',
                reqBinId);

            $.ajax({
                url: "{{ route('faculty.files.view') }}",
                method: 'GET',
                data: {
                    req_bin_id: reqBinId,
                    user_id: user_id,
                    type_id: requirementId
                },
                success: function(data) {
                    var file = data.files;
                    var html = '';

                    // Update the modal content with the files
                    if (file.length > 0) {
                        for (let i = 0; i < file.length; i++) {

                        html += '<li id="list-' + file[i]['id'] + '" class="list-group-item rounded-pill border mb-2 shadow" style="background-color: rgba(54,151,99); color: white;" onclick="displayFileModal('+ "'" + file[i]['id'] + "'" + ')" >'+
                                                            '<div class="d-flex justify-content-between align-items-center">' +
                                                              '  <span>' + file[i]['file_name'] +'</span>' +
                                                                '<div class="d-flex">' +
                                                                   ' <button type="button" id="delete-file-button" onclick="deleteFile(this), event.stopPropagation();"'+
                                                                   'data-id="' + file[i]['id'] + '">' +
                                                                    '<i class="far fa-trash-alt" style="color: white;" title="Delete"></i></button>' +

                                                               ' </div>' +
                                                            '</div>' +
                                                        '</li>';
                        }
                    }
                    $('#files').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });

            // Open the upload modal
            $('#modal-xl-upload').modal('show');
        }
    });

    // Add event listener for modal shown event
    $('#modal-xl-upload').on('shown.bs.modal', function() {
        // Focus on the remarks input field when the modal is shown
        document.getElementById('changeStatus').focus();
    });

    // Add event listeners to close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        $('#modal-xl-upload').modal('hide');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        $('#modal-xl-upload').modal('hide');
    });
</script>


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

<style>
    .list-group-item:hover {
    /* Change the font size */
    font-size: 1.2em;



    }
</style>

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

{{-- SCRIPTS FOR FILE POND --}}

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);


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
</script>

{{-- <script>

$(document).ready(function() {
            var button1 = '.unsubmit-button';
            // Handle form submission
            $(button1).on('click', function(event) {
                event.preventDefault();
             var fileId = this.getAttribute("name");
             alert('Hello Francis');

             $.ajax({
                 url: 'faculty/unsubmit/files/' + fileId,
                 type: 'DELETE',
                 success: function(response) {
                 // If the request was successful, show a success message
                 alert('File deleted successfully!');

                 // Make an Ajax request to the `faculty.view_user_files` route
                 $.ajax({
                     url: 'faculty/view_user_files',
                     type: 'GET',
                     success: function(response) {
                     // Replace the contents of the `#user-files` element with the new records
                     $('#files').html(response);
                     },
                     error: function(error) {
                     // If the request failed, show an error message
                     alert(error);
                     }
                 });
                 },
                 error: function(error) {
                 // If the request fails, show an error message
                 alert(error);
                 }
             });
         });
    });

</script> --}}
