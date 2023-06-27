{{-- Scripts for showing the validate modal --}}
<script>
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
