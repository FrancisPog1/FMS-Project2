        <!-- Create Modal -->
        <section class="content">
            <form action="{{ route('Setup_RequirementBin', $bin_id) }}" method="post">
                @csrf
                <div class="modal fade" id="modal-xl-create">
                    <div class="modal-dialog modal-dialog-centered modal-l">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Create Requirement</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row justify-content-between p-6">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="required-input">Requirement Type</label>
                                                <select id="type" name="type"
                                                    class="form-control form-control-md">
                                                    <option disabled selected>List of Requirement type/s</option>
                                                    @foreach ($requirementtypes as $types)
                                                        <option value="{{ $types->id }}">{{ $types->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Notes</label>
                                                <textarea type="text" class="form-control" id="notes" name="notes" placeholder="Notes" tabindex="1"
                                                    style="height: 100px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group ml-3">
                                                <label>Please select acceptable file format:</label>
                                                <div class="row ml-4" id="checkbox_containter">
                                                    <div class="form-group col">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.PDF</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-0_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-0_0">.DOC/DOCX</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-0_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-0_0">.PPT/PPTX</label>
                                                    </div>
                                                    <div class="form-group col">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-0_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-0_0">.JPG/JPEG</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-0_0">
                                                        <label class="form-check-label" for="checkbox-0_0">.PNG</label>

                                                        <br>
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkbox-0_0">
                                                        <label class="form-check-label"
                                                            for="checkbox-0_0">.XLS/XLSX</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger"
                                    data-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-outline-success swalDefaultSuccess">Create</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>
