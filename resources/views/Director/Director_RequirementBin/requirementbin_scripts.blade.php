


{{-- AJAX SCRIPT FOR SORTING --}}
<script>
    $(document).ready(function() {
        var filteredAndSortedBinsUrl = "{{ route('director.filtered_and_sorted_bins') }}";

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
                    var binSetupRoute = "{{ route('director.requirementbin_content', ['id' => ':id']) }}";
                    // Generate the route URL on the server-side
                    var requirementAssigneesRoute = "{{ route('director.requirement_assignees', ['bin_id' => ':bin_id']) }}";


                    if (bins.length > 0) {
                        for (let i = 0; i < bins.length; i++) {

                            html += '<tr>' +
                                        '<td>' + bins[i]['title'] + '</td>' +
                                        '<td>' + bins[i]['deadline'] + '</td>' +
                                        '<td class="text-center">' +
                                            '<button type="button" class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">' + bins[i]['status'] + '</button>' +
                                        '</td>' +
                                        '<td class="text-center">' +
                                            '<div class="btn-group">' +
                                                    '<a href="' + binSetupRoute.replace(':id', bins[i]['id']) + '" class="px-2 py-2 text-sm text-center rounded-lg text-green focus:ring-4 focus:outline-none focus:ring-blue-300" role="button" aria-pressed="true">' +
                                                        '<i class="fa fa-window-restore" aria-hidden="true"></i>' +
                                                    '</a>' +
                                                    '<input name="_method" type="hidden" value="DELETE">' +
                                                    '<a href="' + requirementAssigneesRoute.replace(':bin_id', bins[i]['id']) + '" role="button" aria-pressed="true" class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">' +
                                                        '<i class="far fa-eye"></i>' +
                                                    '</a>' +
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




