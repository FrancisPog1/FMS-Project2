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
                    url: "{{ route('update_users', '') }}" + userId,
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
                url: "{{ route('register_user') }}",
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


<script>
    $(document).ready(function() {
        var filteredAndSortedUsersUrl = "{{ route('filtered_and_sorted_users') }}";
        $("#filter, #sort").on('change', function() {
            var filterOption = $("#filter").val();
            var sortOption = $("#sort").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(filteredAndSortedUsersUrl);

            $.ajax({
                url: filteredAndSortedUsersUrl,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    'filter_option': filterOption,
                    'sort_option': sortOption
                },
                success: function(data) {
                    var users = data.users;
                    var html = '';
                    var deleteRoute = "{{ route('delete_users', ':user_id') }}";
                    if (users.length > 0) {
                        for (let i = 0; i < users.length; i++) {
                            html +=  '<tr>' +
                                            '<td>' + users[i]['first_name'] + " " + users[i]['last_name']  +'</td>' +
                                            '<td>' + users[i]['email'] + '</td>' +
                                            '<td>' + users[i]['role_type'] + '</td>' +
                                        ' <td class="text-center">' +
                                            '<button type="button" class="font-medium rounded-full text-sm px-3 py-1 mr-2 mb-2 ' +
                                            (users[i]['status'] === 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-green-400') +
                                            '">' + users[i]['status'] + '</button>' +
                                        ' </td>' +

                                            '<td class="text-center">' +
                                                '<form method="POST" action="'+ deleteRoute.replace(':user_id', users[i]['user_id']) +' ">' +
                                                    '@csrf' +
                                                ' <input name="_method" type="hidden" value="DELETE">' +

                                                ' <button data-toggle="modal" onclick="openViewModal(' +"'"+ users[i]['email'] + "'" +')"' +
                                                        'data-target="#modal-xl-view" type="button"' +
                                                        'class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">' +
                                                        '<i class="far fa-eye"></i>' +
                                                    '</button>' +
                                                    '<button data-toggle="modal"' +
                                                        'onclick="openEditModal(' + " ' " + users[i]['email'] + "', '" + users[i]['user_id'] + "'" + ' )" ' +
                                                    ' data-target="#modal-xl-edit" type="button"' +
                                                        'class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">' +
                                                        '<i class="far fa-edit"></i>' +
                                                ' </button>' +
                                                    '<button type="button"' +
                                                        'class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 local-delete-button"' +
                                                        'title="Delete">' +
                                                        '<i class="far fa-trash-alt"></i>' +
                                                    '</button>' +
                                                '</form>' +
                                            '</td>' +
                                        '</tr>';
                            }
                    } else {
                        html += '<tr><td colspan="4"> No Records </td></tr>';
                    }

                    $('#filtered-users').html(html);
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
