{{-- Scripts for showing the Upload modal --}}
<script>
    function openUploadModal(status, remarks, requirementId, req_bin_id) {
        // Set the values in the form fields


        document.getElementById('changeStatus').value = status;
        document.getElementById('remarks').value = remarks;

        // Set the action of the form dynamically using JavaScript
        var form = document.getElementById('uploadForm');
        form.action = form.action.replace('__requirementId__', requirementId).replace('__req_bin_id__', req_bin_id);



        // Open the upload modal
        $('#modal-xl-upload').modal('show');
    }

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

<!-- June 17, 2023 <Sat> Daniel's modified part -->

<script type="text/javascript">
    // To upload
</script>
