{{-- Scripts for showing the validate modal --}}
{{-- Scripts for showing the Upload modal --}}
<script>
    // Add event listener for upload buttons using event delegation
    document.addEventListener('click', function(event) {
        if (event.target.matches('.validate-button')) {
            var button = event.target;
            var status = button.getAttribute('data-status');
            var remarks = button.getAttribute('data-remarks');
            var requirementId = button.getAttribute('data-requirement-id');
            var reqBinId = button.getAttribute('data-req-bin-id');
            var user_id = button.getAttribute('data-user-id');

            // Set the values in the form fields
            document.getElementById('changeStatus').value = status;
            document.getElementById('remarks').value = remarks;


            // Set the action of the form dynamically using JavaScript
            var form = document.getElementById('validateForm');
            form.action = form.action.replace('__requirementId__', requirementId).replace('__req_bin_id__',
                reqBinId);
            $.ajax({
                url: "{{ route('files.view') }}",
                method: 'GET',
                data: {
                    req_bin_id: reqBinId,
                    user_id: user_id,
                    type_id: requirementId
                },
                success: function(data) {
                    var file = data.files;
                    var html = '';
                    var downloadRoute = "{{ route('files.download', ':file_id')}}";
                    // Update the modal content with the files
                    if (file.length > 0) {
                        for (let i = 0; i < file.length; i++) {

                        html += '<li class="list-group-item rounded-pill border mb-2 shadow">'+
                                                            '<div class="d-flex justify-content-between align-items-center">' +
                                                              '  <span>' + file[i]['file_name'] +'</span>' +
                                                                '<div class="d-flex">' +
                                                                   ' <button type="button" onclick="displayFileModal('+ "'" + file[i]['id'] + "'" + ')" > <i class="far fa-eye" style="color: #3a86e9;"></i></button>' +

                                                                    '<a href="' + downloadRoute.replace(':file_id', file[i]['id'])  + '"> <i class="fa fa-download fa-2xs" style="color: #8edb1a;"></i></a>' +
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
            $('#modal-xl-validate').modal('show');

        }
    });

    // Add event listener for modal shown event
    $('#modal-xl-validate').on('shown.bs.modal', function() {
        // Focus on the remarks input field when the modal is shown
        document.getElementById('changeStatus').focus();
    });

    // Add event listeners to close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        $('#modal-xl-validate').modal('hide');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        $('#modal-xl-validate').modal('hide');
    });
</script>



<script>

function displayFileModal(file_id) {

        var Url = "{{ route('files.display') }}";
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


{{-- <script>
    function openValidateModal(status, remarks, requirementId, req_bin_id) {
        // Set the values in the form fields


        document.getElementById('changeStatus').value = status;
        document.getElementById('remarks').value = remarks;

        // Set the action of the form dynamically using JavaScript
        var form = document.getElementById('validateForm');
        form.action = form.action.replace('__requirementId__', requirementId).replace('__req_bin_id__', req_bin_id);



        // Open the validate modal
        $('#modal-xl-validate').modal('show');
    }

    // Add event listener for modal shown event
    $('#modal-xl-validate').on('shown.bs.modal', function() {
        // Focus on the remarks input field when the modal is shown
        document.getElementById('changeStatus').focus();
    });

    // Add event listeners to close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        $('#modal-xl-validate').modal('hide');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        $('#modal-xl-validate').modal('hide');
    });
</script> --}}


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
