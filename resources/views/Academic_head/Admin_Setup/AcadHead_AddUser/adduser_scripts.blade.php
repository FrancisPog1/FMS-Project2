<script>
    function openEditModal(email, userId, role) {
        // Set the values in the form fields
        document.getElementById('editForm').elements['email'].value = email;
        document.getElementById('editForm').elements['role'].value = role;

        // Open the edit modal
        $('#modal-xl-edit').modal('show');

        // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
        $(document).ready(function() {
            var countdown = 2;
            // Handle form submission
            $('#editForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                jQuery.ajax({
                    type: 'post',
                    url: "{{ route('admin.update_users', '') }}" + userId,
                    data: jQuery('#editForm').serialize(), // Serialize the form data

                    success: function(response) {
                        if (response.success === true) {
                            // Hide the modal using the modal's instance
                            $('#modal-xl-edit').modal('hide');
                            toastr.success(response.message, 'Success Alert', {
                                timeOut: 5000
                            });

                                //Countdown before showing the toastr
                                var timer = setInterval(function() {
                                countdown--;

                                if (countdown === 0) {
                                    clearInterval(timer);
                                     location.reload();
                                }
                            }, 1000);

                        } else {
                            // Display validation errors using toastr
                            if (response.errors) {
                                $.each(response.errors, function(key, value) {
                                    toastr.error(value[0], 'Validation Error', {
                                        timeOut: 3000
                                    });
                                });
                            } else {
                                toastr.error(response.message, 'Error Alert', {
                                    timeOut: 3000
                                });
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log any errors to the console
                    }
                });
            });


        });
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
<script>
    //For showing and hiding the password
    $('.show-password').on('click', function() {
        let passwordInput = $(this).closest('.input-group').find('input');
        let passwordFieldType = passwordInput.attr('type');
        let confirmPasswordFieldType = passwordFieldType == 'password' ? 'text' : 'password';
        passwordInput.attr('type', confirmPasswordFieldType);
        $(this).html(confirmPasswordFieldType === 'password' ?
            '<i class="fas fa-eye"  style="font-size: 18px;"></i>' :
            '<i class="fas fa-eye-slash"  style="font-size: 18px;"></i>'
        );



    });
</script>


<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    $(document).ready(function() {
        var countdown = 2;
        // Handle form submission
        $('#adduser').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'post',
                url: "{{ route('admin.register_user') }}",
                data: jQuery('#adduser').serialize(), // Serialize the form data

                success: function(response) {
                    if (response.success === true) {
                        // Hide the modal using the modal's instance
                        $('#modal-xl-create').modal('hide');
                        toastr.success(response.message, 'Success Alert', {
                        timeOut: 5000
                         });

                            //Countdown before showing the toastr
                            var timer = setInterval(function() {
                                countdown--;

                                if (countdown === 0) {
                                    clearInterval(timer);
                                     location.reload();
                                }
                            }, 1000);


                    } else {
                        // Display validation errors using toastr
                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                toastr.error(value[0], 'Validation Error', {
                                    timeOut: 3000
                                });
                            });
                        } else {
                            toastr.error(response.message, 'Error Alert', {
                                timeOut: 3000
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to the console
                }
            });
        });


    });
</script>

    {{-- Local Warning Modal Before Deleting--}}
<script>
    $(document).on('click', '.local-delete-button', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var form = $(this).closest("form");
    var name = $(this).data("name");

    Swal.fire({
        title: "Are you sure?",
        icon: "info",
        html: "Do you want to <b>delete</b> this?",
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: "Yes",
        confirmButtonColor: "#3085d6",
        confirmButtonAriaLabel: "...",
        cancelButtonColor: "#d33",
        cancelButtonAriaLabel: "...",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // Submit the form for deletion
        }
    });
});
</script>
