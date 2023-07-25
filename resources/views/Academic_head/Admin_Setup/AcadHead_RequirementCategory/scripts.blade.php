<script>
    function openEditModal(title, description, roleId) {
        // Set the values in the form fields
        document.getElementById('editForm').elements['title'].value = title;
        document.getElementById('editForm').elements['description'].value = description;

        // Open the edit modal
        $('#modal-xl-edit').modal('show');

        //---------------------- AJAX CODES FOR EDIT MODAL ------------------------//
        $(document).ready(function() {
            var countdown = 2;

            // Handle form submission
            $('#editForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission behavior
                var route = "{{ route('admin.update_category', ':id') }}";


                jQuery.ajax({
                    type: 'put',
                    url: route.replace(':id', roleId),
                    data: jQuery('#editForm').serialize(), // Serialize the form data

                    success: function(response) {
                        if (response.success === true) {
                            // Hide the modal using the modal's instance
                            $('.modal').hide();
                            $('.modal-backdrop').remove();
                            toastr.success(response.message, 'Success Alert', {
                                timeOut: 5000
                            });

                            //Countdown before reloading the page
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
        //---------------------- END OF AJAX CODES ------------------------//


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


<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    $(document).ready(function() {
        var countdown = 2;

        // Handle form submission
        $('#create_rank').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'post',
                url: "{{ route('admin.category.store') }}",
                data: jQuery('#create_rank').serialize(), // Serialize the form data

                success: function(response) {
                    if (response.success === true) {
                        // Hide the modal using the modal's instance
                        $('.modal').hide();
                        $('.modal-backdrop').remove();
                        toastr.success(response.message, 'Success Alert', {
                            timeOut: 5000
                        });

                        //Countdown before reloading the page
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


{{-- DESTROY OR HARD DELETE A RECORD --}}
<script>
    function createDeleteForm(action, inputValue) {
        var form = document.createElement("form");
        form.method = "POST";
        form.action = action;

        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "_method";
        input.value = "DELETE";

        var csrfToken = document.createElement("input");
        csrfToken.type = "hidden";
        csrfToken.name = "_token";
        csrfToken.value = "{{ csrf_token() }}";

        var inputVariable = document.createElement("input");
        inputVariable.type = "hidden";
        inputVariable.name = "variableName";
        inputVariable.value = inputValue;

        form.appendChild(input);
        form.appendChild(csrfToken);

        document.body.appendChild(form);
        form.submit();
    }

    function localWarning(event) {
        event.preventDefault();

        var name = this.getAttribute("name");

        var route = "{{ route('admin.destroy_category', ':id') }}"; // Replace with the actual delete route
        var action = route.replace(':id', name);

        Swal.fire({
            title: "Are you sure?",
            icon: "info",
            html: "The requirement will be <b>permanently deleted</b>",
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "Yes",
            confirmButtonColor: "#3085d6",
            confirmButtonAriaLabel: "...",
            cancelButtonColor: "#d33",
            cancelButtonAriaLabel: "...",
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                createDeleteForm(action, name);
            }
        });
    }

    const button = document.querySelector('.destroy-button');
    button.addEventListener('click', localWarning);
</script>

<script>
    //Function to check all checkboxes on RESTORE
    $(document).ready(function() {
        // Check
        $("#check-all-restore").on("click", function() {
            if ($(this).prop("checked")) {
                $("input[type='checkbox']").prop("checked", true);
            } else {
                $("input[type='checkbox']").prop("checked", false);
            }
        });

        // Uncheck
        $("input[type='checkbox']").on("change", function() {
            if (!$(this).prop("checked")) {
                $("#check-all-restore").prop("checked", false);
            }
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


