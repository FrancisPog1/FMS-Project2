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

            // Set the values in the form fields
            document.getElementById('changeStatus').value = status;
            document.getElementById('remarks').value = remarks;

            // Set the action of the form dynamically using JavaScript
            var form = document.getElementById('uploadForm');
            form.action = form.action.replace('__requirementId__', requirementId).replace('__req_bin_id__',
                reqBinId);

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
                url: '/upload-file',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            revert: {
                url: "{{ route('delete_file') }}",
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        },
    });
</script>
