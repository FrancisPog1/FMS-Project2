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
                                                <label class="form-check-label" for="check">Faculty 1</label>\
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

    $(document).on('click', '.remove-button', function(event) {
        event.preventDefault();

        var participant_id = this.getAttribute("name");
        var action = "{{ route('admin.remove_participants', '') }}" + participant_id; // Replace with the actual delete route

        Swal.fire({
            title: "Are you sure?",
            icon: "info",
            html: "The participant will be <b>removed</b> to this activity",
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
                createDeleteForm(action, participant_id);
            }
        });
    });
</script>
