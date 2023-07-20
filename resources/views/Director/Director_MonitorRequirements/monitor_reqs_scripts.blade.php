{{-- Scripts for showing the validate modal --}}
{{-- Scripts for showing the Upload modal --}}
<script>
    // Add event listener for upload buttons using event delegation
    document.addEventListener('click', function(event) {
        if (event.target.matches('.view-button')) {
            var button = event.target;
            var status = button.getAttribute('data-status');
            var remarks = button.getAttribute('data-remarks');
            var requirementId = button.getAttribute('data-requirement-id');
            var reqBinId = button.getAttribute('data-req-bin-id');
            var user_id = button.getAttribute('data-user-id');

            // Set the values in the form fields
            document.getElementById('status').value = status;
            document.getElementById('remarks').value = remarks;

            $.ajax({
                url: "{{ route('director.files.view') }}",
                method: 'GET',
                data: {
                    req_bin_id: reqBinId,
                    user_id: user_id,
                    type_id: requirementId
                },
                success: function(data) {
                    var file = data.files;
                    var html = '';
                    var downloadRoute = "{{ route('director.files.download', ':file_id')}}";
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
                    $('#files').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
                });

            // Open the upload modal
            $('#modal-xl-view').modal('show');

        }
    });

    // Add event listener for modal shown event
    $('#modal-xl-view').on('shown.bs.modal', function() {
        // Focus on the remarks input field when the modal is shown
        document.getElementById('changeStatus').focus();
    });

    // Add event listeners to close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        $('#modal-xl-view').modal('hide');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        $('#modal-xl-view').modal('hide');
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

            var Url = "{{ route('director.files.display') }}";
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


