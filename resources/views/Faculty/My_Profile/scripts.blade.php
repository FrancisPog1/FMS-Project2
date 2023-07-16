
    <!-- Local scipt for choosing dropdown item -->
    <script src="{{ asset('js/farms.dropitem.js') }}"></script>

    <!-- Local script for warning modals -->
    <script src="{{ asset('js/farms.swal.warning.modal.js') }}"></script>

    <!-- Local script for success modals -->
    <script src="{{ asset('js/farms.swal.success.modal.js') }}"></script>

    <!-- Script for Date picker -->
    <script src="{{ asset('js/farms.datepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#editButton').click(function() {
                // Swap positions of Card 1 and Card 2
                $('#view-card').insertAfter('#edit-card');
                $('#view-card').removeClass('active');
                $('#edit-card').addClass('active');
            });

            $('#viewButton').click(function() {
                // Swap positions of Card 1 and Card 2
                $('#edit-card').insertAfter('#view-card');
                $('#edit-card').removeClass('active');
                $('#view-card').addClass('active');
            });
        });

        $(document).ready(function() {
            $('#viewButton, #editButton').click(function() {
            $(this).toggleClass('clicked');
            });
        });
    </script>


