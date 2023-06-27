<script>
    function openEditModal(email, userId, role) {
        // Set the values in the form fields
        document.getElementById('editForm').elements['email'].value = email;
        document.getElementById('editForm').elements['role'].value = role;
        document.getElementById('editForm').action = "{{ route('update_users', '') }}" + userId;

        // Open the edit modal
        $('#modal-xl-edit').modal('show');
    }

    // Add event listeners to close the modal
    document.getElementById('Edit_closeModalButton').addEventListener('click', function() {
        $('#modal-xl-edit').modal('hide');
    });

    document.getElementById('Edit_cancelButton').addEventListener('click', function() {
        $('#modal-xl-edit').modal('hide');
    });
</script>


<script>
    function openViewModal(email) {
        // Set the values in the form fields
        document.getElementById('viewForm').elements['email'].value = email;
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
