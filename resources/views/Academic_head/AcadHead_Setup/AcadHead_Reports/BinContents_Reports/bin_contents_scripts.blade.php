<style>
    .col-md-4 {
        padding-right: 150px;
        padding-left: 150px;
    }
</style>



<script>
    function openViewModal(type, notes) {
        // Set the values in the form fields

        // Set the value of the `type` element in the `editForm` form to the selected value
        document.getElementById('viewForm').elements['type'].value = type;
        document.getElementById('viewForm').elements['notes'].value = notes;

        // Open the edit modal
        $('#modal-xl-view').modal('show');
    }

    // Add event listeners to close the modal
    document.getElementById('View_closeModalButton').addEventListener('click', function() {
        $('#modal-xl-view').modal('hide');
    });

    document.getElementById('View_cancelButton').addEventListener('click', function() {
        $('#modal-xl-view').modal('hide');
    });
</script>







