<script>
    function openEditModal(title, description, specializationId) {
        // Set the values in the form fields
        document.getElementById('editForm').elements['title'].value = title;
        document.getElementById('editForm').elements['description'].value = description;
        document.getElementById('editForm').action = "{{ route('update_specializations', '') }}" + specializationId;

        // Open the edit modal
        $('#modal-xl-edit').modal('show');
    }

    // Add event listeners to close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        $('#modal-xl-edit').modal('hide');
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        $('#modal-xl-edit').modal('hide');
    });
</script>


<script>
    function openViewModal(title, description) {
        // Set the values in the form fields
        document.getElementById('viewForm').elements['title'].value = title;
        document.getElementById('viewForm').elements['description'].value = description;
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
