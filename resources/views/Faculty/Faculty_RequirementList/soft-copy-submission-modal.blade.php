{{-- Soft Copy Submission Modal --}}

<section class="content">
    <form id="uploadForm-{{ $data->id }}" action={{ route('faculty.submit_uploads', $data->id) }} method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="soft-copy-modal-{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" >
                <div class="modal-content">
                    <div class="modal-header" >
                        <h4 class="modal-title">Soft Copy Submission</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="soft-copy-close-btn-{{ $data->id }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 500px;">
                        <div class="card-body" >

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Approval Status</h5>
                                        </div>
                                        <div class="card-body" style="height: 374px; overflow-y: auto;">
                                            <div class="row">
                                                @if ($data->reviewed_at)

                                                    <div class="col-md-6">
                                                        <h5 class="font-weight-bold ">Reviewed by</h5>
                                                        <p>{{ $data->first_name }} {{ $data->last_name }}</p><br>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h5 class="font-weight-bold ">Reviewed at</h5>
                                                        <p id=""> {{$data->reviewed_at}}</p><br>
                                                    </div>
                                                @else

                                                @endif



                                              </div>

                                              <div class="form-group">
                                                    <h5 class="font-weight-bold ">Status</h5>
                                                    <button type="button"
                                                        class="  font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2
                                                        {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : ($data->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}">
                                                        {{ $data->status }}
                                                    </button>
                                                </div>

                                            <div class="form-group">
                                                <label for="remarks">Remarks</label>
                                                <textarea class="form-control" id="remarks" name="remarks" style="height: 150px; resize: none;" readonly>
                                                    {{ $data->remarks }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Upload File</h5>
                                        </div>
                                        <div class="card-body" style="height: 374px; overflow-y: auto;">
                                            <div class="form-group">

                                                <input type="file" class="filepond" name="file" id="upload-file-{{ $data->id }}"
                                                    multiple credits="false">
                                            </div>

                                            {{-- This is where all the list of uploaded file will be shown --}}
                                            <ul id="list-of-files-{{ $data->id }}" class="list-group">

                                            </ul>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" id="soft-copy-close-btn-{{ $data->id }}">
                            Close
                        </button>
                        <button type="submit"  class="btn btn-outline-primary">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
</section>


<script>
    // FilePond.registerPlugin(FilePondPluginImagePreview);
    // Get a reference to the file input element
    const inputElement = document.querySelectorAll('.filepond');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);


    FilePond.setOptions({
        server: {
            process: {
                url: "{{ route('faculty.upload_file') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            revert: {
                url: "{{ route('faculty.delete_file') }}",
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        },
    });
</script>


{{-- Scripts for showing the Upload modal --}}
<script>
    // Add event listener for upload buttons using event delegation
    const myButton = document.getElementById('upload-button-{{ $data->id }}');
    myButton.addEventListener('click', function() {
        $.ajax({
            url: "{{ route('faculty.files.view') }}",
            method: 'GET',
            data: {
                req_bin_id: '{{ $req_bin_id }}',
                user_id: '{{ $user_id }}',
                type_id: '{{ $data->id }}'
            },
            success: function(data) {
                var file = data.files;
                var html = '';

                // Update the modal content with the files
                if (file.length > 0) {
                    for (let i = 0; i < file.length; i++) {

                    html += '<li id="list-' + file[i]['id'] + '" class=" btn list-group-item rounded border mb-2" onclick="displayFileModal('+ "'" + file[i]['id'] + "'" + ')" >'+
                                                        '<div class="d-flex justify-content-between align-items-center">' +
                                                        '  <span>' + file[i]['file_name'] +'</span>' +
                                                            '<div class="d-flex">' +
                                                            ' <button type="button" id="delete-file-button" onclick="deleteFile(this), event.stopPropagation();"'+
                                                            'data-id="' + file[i]['id'] + '">' +
                                                                '<i class="far fa-trash-alt" title="Delete"></i></button>' +

                                                        ' </div>' +
                                                        '</div>' +
                                                    '</li>';
                    }
                }
                $('#list-of-files-{{ $data->id }}').html(html);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });

        });

</script>




