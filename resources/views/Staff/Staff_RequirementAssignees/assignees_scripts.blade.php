
 <script>
 $(document).ready(function() {
    var filteredAndSortedAssigneesUrl = "{{ route('staff_filtered_and_sorted_assignees', ':bin_id') }}";
    var binId = "{{$bin_id}}"; // Assuming you have the bin_id value available in the template

    $("#filter, #sort").on('change', function() {
        var filterOption = $("#filter").val();
        var sortOption = $("#sort").val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: filteredAndSortedAssigneesUrl.replace(':bin_id', binId),
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                'filter_option': filterOption,
                'sort_option': sortOption
            },
            success: function(data) {
                var assignees = data.assignees;
                var html = '';
                var monitorRoute = "{{ route('acadhead_MonitorRequirements', ['user_id' => ':user_id', 'assigned_bin_id' => ':assigned_req_id', 'req_bin_id' => ':req_bin_id']) }}";
                if (assignees.length > 0) {
                    for (let i = 0; i < assignees.length; i++) {
                        html += '<tr>' +
                            '<td>' + assignees[i]['first_name'] + " " + assignees[i]['last_name'] + '</td>' +
                            '<td>' + assignees[i]['email'] + '</td>' +
                            '<td class="text-center">' + assignees[i]['role_type'] + '</td>' +

                            '<td class="text-center">' +
                            '<button type="button" class="text-white ' + (assignees[i]['review_status'] === "Reviewed" ? "bg-green-500" : "bg-gray-400") + ' font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2">' + assignees[i]['review_status'] + '</button>' +
                            '</td>' +

                            '<td class="text-center"><button type="button" class="text-white ' + (assignees[i]['compliance_status'] === "Pending" ? "bg-gray-400" : (assignees[i]['compliance_status'] === "Incomplete" ? "bg-red-500" : "bg-green-500")) + ' font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2">' + assignees[i]['compliance_status'] + '</button>' +
                            '</td>' +

                            '<td class="text-center">' +
                            '<a href="' + monitorRoute.replace(':user_id', assignees[i]['user_id']).replace(':assigned_req_id', assignees[i]['id']).replace(':req_bin_id', assignees[i]['req_bin_id']) + '"' +
                            'class="px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Monitor</a>' +
                            '</td>' +
                            '</tr>';
                    }
                } else {
                    html += '<tr><td> No Records </td></tr>';
                }

                $('#filtered-assignees').html(html);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>
