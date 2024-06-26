<style>
    .col-md-4 {
        padding-right: 150px;
        padding-left: 150px;
    }
</style>

<script>
    function openEditModal(type, reqId) {
        // Set the values in the form fields

        // Set the value of the `type` element in the `editForm` form to the selected value
        document.getElementById('editForm').elements['type'].value = type;
        // document.getElementById('editForm').elements['notes'].value = notes;

        document.getElementById('editForm').action = "{{ route('admin.update_requirements', '') }}" + reqId;

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

<script>
    function openViewModal(type) {
        // Set the values in the form fields

        // Set the value of the `type` element in the `editForm` form to the selected value
        document.getElementById('viewForm').elements['type'].value = type;

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
    //Function to check all checkboxes on ASSIGN
    $(document).ready(function() {
        // Check
        $("#check-all-assign").on("click", function() {
            if ($(this).prop("checked")) {
                $("input[type='checkbox']").prop("checked", true);
            } else {
                $("input[type='checkbox']").prop("checked", false);
            }
        });

        // Uncheck
        $("input[type='checkbox']").on("change", function() {
            if (!$(this).prop("checked")) {
                $("#check-all-assign").prop("checked", false);
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


        $("#check-all-add").on("click", function() {
            if ($(this).prop("checked")) {
                $("input[type='checkbox']").prop("checked", true);
            } else {
                $("input[type='checkbox']").prop("checked", false);
            }
            });

            // Uncheck
            $("input[type='checkbox']").on("change", function() {
            if (!$(this).prop("checked")) {
                $("#check-all-add").prop("checked", false);
            }

            });
    });
</script>

<script>
    //Function to check all checkboxes on ASSIGN
    var switchButton = document.getElementById("switch");
    var checkboxes = document.querySelectorAll("input[type='checkbox']");

    switchButton.addEventListener("change", function() {
        for (var checkbox of checkboxes) {
            checkbox.checked = switchButton.checked;
        }
    });
</script>




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
        var route = "{{ route('admin.destroy_requirements', ':id') }}"; // Replace with the actual delete route
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


{{--

<script>
    document.getElementById("assign").elements["types"].addEventListener("change", function() {
        var selectedOption = this.value;
        //alert("You selected: " + selectedOption);

    });
</script> --}}



<script>
$(document).ready(function() {
    var filteredUsersUrl = "{{ route('admin.filtered_users') }}";
    $("#types").on('change', function() {
        var types = $(this).val();
        // alert('Hello fuck');

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: filteredUsersUrl,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
            },
            data: {'types': types},
            success: function(data) {
                var users = data.users;
                var html = '';
                if(users.length > 0){
                    for(let i = 0; i < users.length; i++){
                        html += '<tr>\
                                    <td>\
                                        <div class="ml-3">\
                                            <input type="checkbox" class="form-check-input" id="check" name="users[]" value="' + users[i]['id'] + '">\
                                            <label class="form-check-label" for="check">' + users[i]['first_name'] + " " + users[i]['last_name'] +'</label>\
                                        </div>\
                                    </td>\
                                    <td>' + users[i]['email'] + '</td>\
                                    <td>' + users[i]['role'] + '</td>\
                                </tr>';
                    }
                } else {
                    html += '<tr><td> No Records </td> </tr>';
                }

                $('#filtered-records').html(html);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});

</script>

