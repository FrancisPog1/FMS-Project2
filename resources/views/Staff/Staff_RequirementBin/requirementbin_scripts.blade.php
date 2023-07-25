<script>
    $(document).ready(function() {
      var summernote = $('#description').summernote({
        height: 200,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'strikethrough']],
          ['font', ['fontname', 'fontsize']],
          ['color', ['forecolor', 'backcolor']],
          ['para', ['paragraph']],
          ['insert', ['link']],
          ['table', ['table']],
          ['tools', ['undo', 'redo', 'fullscreen']],

        ]
      });
    });


    function editDescription(editDesc){
        $(document).ready(function() {
        var summernote = $(editDesc).summernote({
            height: 200,
            toolbar: [
            ['style', ['bold', 'italic', 'underline', 'strikethrough']],
            ['font', ['fontname', 'fontsize']],
            ['color', ['forecolor', 'backcolor']],
            ['para', ['paragraph']],
            ['insert', ['link']],
            ['table', ['table']],
            ['tools', ['undo', 'redo', 'fullscreen']],
            ]
        });
        });
    }
    </script>


<script>
        //---------------------- AJAX CODES FOR EDIT MODAL ------------------------//
     function editModal(binId){
          // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
        $(document).ready(function() {
            var countdown = 2;
            var formID = '#editForm-' + binId;


            var route = "{{ route('staff.update_requirementbins', ':id') }}"; // Replace with the actual delete route
            var Url = route.replace(':id', binId);

            // Handle form submission
            $(formID).on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission behavior
                jQuery.ajax({
                    type: 'put',
                    url: Url,
                    data: jQuery(formID).serialize(), // Serialize the form data

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

    $(document).on('click', '.destroy-button', function(event) {
    event.preventDefault(); // Prevent the default form submission

        var name = this.getAttribute("name");
        var route = "{{ route('staff.destroy_requirementbins', ':id') }}"; // Replace with the actual delete route
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

});
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


<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    $(document).ready(function() {
        var countdown = 2;
        // Handle form submission
        $('#create_bin').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'post',
                url: "{{ route('staff.requirement_bins.store') }}",
                data: jQuery('#create_bin').serialize(), // Serialize the form data

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



