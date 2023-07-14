<div class="tab-pane fade" id="vicinity" role="tabpanel" >
    <div class="card">
        <div class="card-body" >
            {{-- edit icon --}}
            <ul class="nav nav-tabs float-right" id="custom-content-above-tab" role="tablist" style="border-bottom:none !important;">
                <li class="nav-item " role="presentation">
                    <a href="nav-link active"
                    id="vicinity-edit-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#vicinity-edit"
                    type="button" role="tab"
                    aria-controls="vicinity-edit"
                    aria-selected="true"
                    style="color: var(--text-color-1);
                            font-size: 1.2rem;">
                        <i class="fas fa-pen mr-1 float-right"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="ml-3 mt-3 mb-3">

                    <div class="row">
                        <label class="mt-2" style="font-size: 1.1rem;">Vicinity Details</label>
                    </div>

                    <div class="row">
                        <div class="col-6 ">
                            <div style="margin-left: 8rem!important;">
                                <div class="form-group">
                                    <label for="faculty_type">Municipality:</label>
                                    {{-- <select id="faculty_type" name="faculty_type" class="form-control">
                                        <option value="">-- Select Faculty Type --</option>
                                        @foreach ($faculty_types as $facultytype)
                                            <option value="{{ $facultytype->id }}">{{ $facultytype->title }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group">
                                    <label for=" ">Barangay:</label>
                                </div>
                                <div class="form-group">
                                    <label for=" ">Streetname:</label>
                                </div>
                                <div class="form-group">
                                    <label for=" ">House/Blk/Lot no.:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="faculty_type">Quezon City</label>
                                {{-- <select id="faculty_type" name="faculty_type" class="form-control">
                                    <option value="">-- Select Faculty Type --</option>
                                    @foreach ($faculty_types as $facultytype)
                                        <option value="{{ $facultytype->id }}">{{ $facultytype->title }}</option>
                                    @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group">
                                <label for=" ">Holy Spirit</label>
                            </div>
                            <div class="form-group">
                                <label for=" ">1st Street</label>
                            </div>
                            <div class="form-group">
                                <label for=" ">2903</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- vicinity - edit tab --}}
<div class="tab-pane fade" id="vicinity-edit" role="tabpanel" >
    <div class="card">
        <div class="card-body" >
            {{-- save icon --}}
            <ul class="nav nav-tabs float-right"  style="border-bottom:none !important;">
                <li class="nav-item " role="presentation">
                    <a type="button" class="delete-button" style="color: var(--text-color-1); font-size: 1.2rem;">
                        <i class="fas fa-check mr-1 float-right"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div>
                    <div class="row">
                        <label class="ml-3 mt-3 mb-3" style="font-size: 1.1rem;">Vicinity Information</label>
                    </div>
                    <div class="row">
                        <div class="row mx-auto">
                            <div class="col-md-6">
                                <label class="required-input">Municipality</label>
                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Quezon City">
                            </div>
                            <div class="col-md-6">
                                <label class="required-input">Baranggay</label>
                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. West Triangle">
                            </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-md-12">
                                <label class="required-input">Street Name</label>
                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Ecol St.">
                            </div>
                            <div class="col-md-12">
                                <label class="required-input">House/Blk/Lot no.</label>
                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g.  0988">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
