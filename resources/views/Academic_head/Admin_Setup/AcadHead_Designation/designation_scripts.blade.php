<script>
    function openEditModal(title, description, designationId) {
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

                jQuery.ajax({
                    type: 'post',
                    url: "{{ route('update_designations', '') }}" + designationId,
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
        $('#create_designation').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'post',
                url: "{{ route('CreateDesignation') }}",
                data: jQuery('#create_designation').serialize(), // Serialize the form data

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
        var action = "{{ route('destroy_designations', '') }}" + name; // Replace with the actual delete route

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


{{-- AJAX SCRIPT FOR SORTING --}}
<script>
    $(document).ready(function() {
        var sortedRoute = "{{ route('sorted_designations') }}";

        $("#sort").on('change', function() {
            var sortOption = $("#sort").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: sortedRoute,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    'option': sortOption
                },
                success: function(data) {
                    var designations = data.designations;
                    var html = '';
                    var deleteRoute = "{{ route('delete_designations', ':id') }}";

                    if (designations.length > 0) {
                        for (let i = 0; i < designations.length; i++) {
                            html += '<tr>' +
                                   '<td>' + designations[i]['title'] + '</td>' +
                                   '<td>' + designations[i]['description'] + '</td>' +
                                  ' <td class="text-center">' +
                                       '<form method="POST" action=" '+ deleteRoute.replace(':id', designations[i]['id']) +' ">' +
                                           '@csrf' +
                                         ' <input name="_method" type="hidden" value="DELETE">' +
                                           '<button data-toggle="modal"' +
                                              'onclick="openViewModal(' +"'"+ designations[i]['title'] + "', '" + designations[i]['description'] + "'"+ ')" ' +
                                              ' data-target="#modal-xl-view" type="button"' +
                                               'class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">' +
                                             '  <i class="far fa-eye"></i>' +
                                        '   </button>' +
                                           '<button type="button"' +
                                              ' onclick="openEditModal(' +" ' "+ designations[i]['title'] + " ' " + ", '" + designations[i]['description'] + " ' " + ", '" + designations[i]['id'] + "' " + ' )" ' +
                                               'class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">' +
                                              ' <i class="far fa-edit"></i>' +
                                           '</button>' +
                                         '  <button type="button"' +
                                             '  class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 local-delete-button"' +
                                              ' title="Delete">' +
                                             '  <i class="far fa-trash-alt"></i>' +
                                           '</button>' +
                                       '</form>' +
                                 '  </td>' +
                              ' </tr>';
                        }
                    } else {
                        html += '<tr><td> No Records </td></tr>';
                    }

                    $('#filtered-designations').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
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

