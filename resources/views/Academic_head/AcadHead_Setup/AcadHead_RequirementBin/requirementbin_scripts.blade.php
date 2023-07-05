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
        var action = "{{ route('destroy_requirementbins', '') }}" + name; // Replace with the actual delete route

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


{{-- AJAX SCRIPT FOR FILTERING --}}
<script>
    $(document).ready(function() {
        var filteredBinsUrl = "{{ route('filtered_bin') }}";
        $("#filter").on('change', function() {
            var bins = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: filteredBinsUrl,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {'bins': bins},
                success: function(data) {
                    var bins = data.requirementbins;
                    var html = '';

                    // Generate the route URL on the server-side
                    var binSetupRoute = "{{ route('acadhead_bin_setup', ['id' => ':id']) }}";
                    // Generate the route URL on the server-side
                    var requirementAssigneesRoute = "{{ route('acadhead_RequirementAssignees', ['bin_id' => ':bin_id']) }}";
                    var deleteBinRoute = "{{ route('delete_requirementbins', ['requirementbinId' => ':id']) }}";


                    var deleteButton = "<button type='button' class='px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 local-delete-button' title='Delete'>";


                    if (bins.length > 0) {
                        for (let i = 0; i < bins.length; i++) {
                            var description = bins[i]['description'].replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/'/g, "\\'");
                            deleteBinRoute = deleteBinRoute.replace(':id', bins[i]['id']);

                            html += '<tr>' +
                                        '<td class="text-center">' + bins[i]['title'] + '</td>' +
                                        '<td>' + bins[i]['description'] + '</td>' +
                                        '<td>' + bins[i]['deadline'] + '</td>' +
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
                                                    '<button type="button" onclick="openEditModal(\'' + bins[i]['title'] + '\', \'' + description + '\', \'' + bins[i]['id']  + '\', \'' + bins[i]['deadline'] + '\', \'' + bins[i]['status'] + '\')" class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">'
                                                       +'<i class="far fa-edit"></i>' +
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




{{-- AJAX SCRIPT FOR SORTING --}}
<script>
    $(document).ready(function() {
        var filteredBinsUrl = "{{ route('sorted_bin') }}";
        $("#sort").on('change', function() {
            var bins = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: filteredBinsUrl,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {'bins': bins},
                success: function(data) {
                    var bins = data.requirementbins;
                    var html = '';

                    // Generate the route URL on the server-side
                    var binSetupRoute = "{{ route('acadhead_bin_setup', ['id' => ':id']) }}";
                    // Generate the route URL on the server-side
                    var requirementAssigneesRoute = "{{ route('acadhead_RequirementAssignees', ['bin_id' => ':bin_id']) }}";
                    var deleteBinRoute = "{{ route('delete_requirementbins', ['requirementbinId' => ':id']) }}";
                    var deleteButton = "<button type='button' class='px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 local-delete-button' title='Delete'>";


                    if (bins.length > 0) {
                        for (let i = 0; i < bins.length; i++) {
                            var description = bins[i]['description'].replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/'/g, "\\'");
                            deleteBinRoute = deleteBinRoute.replace(':id', bins[i]['id']);

                            html += '<tr>' +
                                        '<td class="text-center">' + bins[i]['title'] + '</td>' +
                                        '<td>' + bins[i]['description'] + '</td>' +
                                        '<td>' + bins[i]['deadline'] + '</td>' +
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
                                                    '<button type="button" onclick="openEditModal(\'' + bins[i]['title'] + '\', \'' + description + '\', \'' + bins[i]['id']  + '\', \'' + bins[i]['deadline'] + '\', \'' + bins[i]['status'] + '\')" class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">'
                                                       +'<i class="far fa-edit"></i>' +
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


