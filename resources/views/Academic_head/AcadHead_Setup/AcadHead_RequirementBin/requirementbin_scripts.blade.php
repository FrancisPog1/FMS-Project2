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
            // Handle form submission
            $(formID).on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission behavior
                jQuery.ajax({
                    type: 'put',
                    url: "{{ route('admin.update_requirementbins', '') }}" + binId,
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
        form.method = "DELETE";
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
        var action = "{{ route('admin.destroy_requirementbins', '') }}" + name; // Replace with the actual delete route

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


{{-- AJAX SCRIPT FOR SORTING --}}
<script>
    $(document).ready(function() {
        var filteredAndSortedBinsUrl = "{{ route('admin.filtered_and_sorted_bins') }}";

        $("#filter, #sort").on('change', function() {
            var filterOption = $("#filter").val();
            var sortOption = $("#sort").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: filteredAndSortedBinsUrl,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    'filter_option': filterOption,
                    'sort_option': sortOption
                },
                success: function(data) {
                    var bins = data.requirementbins;
                    var html = '';

                    // Generate the route URL on the server-side
                    var binSetupRoute = "{{ route('admin.requirementbin_setup.show', ['id' => ':id']) }}";
                    // Generate the route URL on the server-side
                    var requirementAssigneesRoute = "{{ route('admin.requirement_assignees.show', ['bin_id' => ':bin_id']) }}";
                    var deleteBinRoute = "{{ route('admin.delete_requirementbins', ['requirementbinId' => ':id']) }}";
                    var deleteButton = "<button type='button' class='px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 local-delete-button' title='Delete'>";


                    if (bins.length > 0) {
                        for (let i = 0; i < bins.length; i++) {
                            deleteBinRoute = deleteBinRoute.replace(':id', bins[i]['id']);

                            html += '<tr>' +
                                        '<td class="text-center">' + bins[i]['title'] + '</td>' +
                                        '<td>' + bins[i]['start_datetime'] + '</td>' +
                                        '<td>' + bins[i]['end_datetime'] + '</td>' +
                                        '<td class="text-center">' +
                                            '<button type="button" class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">' + bins[i]['status'] + '</button>' +
                                        '</td>' +
                                        '<td class="text-center">' +
                                            '<div class="btn-group">' +
                                                '<form method="POST" action="' + deleteBinRoute + '">' +
                                                    '@csrf' +
                                                    '<a href="' + binSetupRoute.replace(':id', bins[i]['id']) + '" class="px-2 py-2 text-sm text-center rounded-lg text-green focus:ring-4 focus:outline-none focus:ring-blue-300" role="button" aria-pressed="true">' +
                                                        '<i class="fa fa-window-restore" aria-hidden="true"></i>' +
                                                    '</a>' +
                                                    '<input name="_method" type="hidden" value="DELETE">' +
                                                    '<a href="' + requirementAssigneesRoute.replace(':bin_id', bins[i]['id']) + '" role="button" aria-pressed="true" class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">' +
                                                        '<i class="far fa-eye"></i>' +
                                                    '</a>' +
                                                    '<button type="button" data-toggle="modal" data-target="#modal-xl-edit-' + bins[i]['id'] + '"' +
                                                        + ' data-requirementbin-id =" '+  bins[i]['id'] + ' " ' +
                                                        'class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">' +
                                                       '<i class="far fa-edit"></i>' +
                                                    '</button>' +
                                                         deleteButton +
                                                    '<i class="far fa-trash-alt"></i>'+
                                                    '</button>'+
                                                '</form>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';
                        }
                    } else {
                        html += '<tr><td> No Records </td></tr>';
                    }

                    $('#filtered-bins').html(html);
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


<script>
    // AJAX CODES TO MAKE THE MODAL TO NOT RELOAD
    $(document).ready(function() {
        var countdown = 2;
        // Handle form submission
        $('#create_bin').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            jQuery.ajax({
                type: 'post',
                url: "{{ route('admin.requirement_bins.store') }}",
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



