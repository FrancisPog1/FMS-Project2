<script>
    function openEditModal(title, type, description, location, status, start_datetime, end_datetime, id) {
        // Set the values in the form fields
        document.getElementById('editForm').elements['title'].value = title;
        document.getElementById('editForm').elements['description'].value = description;
        document.getElementById('editForm').elements['type'].value = type;
        document.getElementById('editForm').elements['location'].value = location;
        document.getElementById('editForm').elements['status'].value = status;
        document.getElementById('editForm').elements['start_datetime'].value = start_datetime;
        document.getElementById('editForm').elements['end_datetime'].value = end_datetime;
        document.getElementById('editForm').action = "{{ route('update_activities', '') }}" + id;

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
