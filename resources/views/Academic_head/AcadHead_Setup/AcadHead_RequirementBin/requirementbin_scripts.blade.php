<script>
    function openEditModal(title, description, binId, deadline, status) {
        // Set the values in the form fields
        document.getElementById('editForm').elements['title'].value = title;
        document.getElementById('editForm').elements['description'].value = description;
        document.getElementById('editForm').elements['deadline'].value = deadline;
        document.getElementById('editForm').elements['status'].value = status;
        document.getElementById('editForm').action = "{{ route('update_requirementbins', '') }}" + binId;

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
