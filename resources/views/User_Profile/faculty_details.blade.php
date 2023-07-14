<div class="tab-pane fade" id="faculty" role="tabpanel"  >
    <div class="card">
        <div class="card-body" >
            {{-- edit icon --}}
            <ul class="nav nav-tabs float-right" id="custom-content-above-tab" role="tablist" style="border-bottom:none !important;">
                <li class="nav-item " role="presentation">
                    <a href="nav-link active"
                    id="faculty-edit-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#faculty-edit"
                    type="button" role="tab"
                    aria-controls="faculty-edit"
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
                        <label class="mt-2" style="font-size: 1.1rem;">Faculty Details</label>
                    </div>

                    <div class="row">
                        <div class="col-6 ">
                            <div style="margin-left: 8rem!important;">
                                <div class="form-group">
                                    <label for="faculty_type">Faculty Type:</label>
                                    {{-- <select id="faculty_type" name="faculty_type" class="form-control">
                                        <option value="">-- Select Faculty Type --</option>
                                        @foreach ($faculty_types as $facultytype)
                                            <option value="{{ $facultytype->id }}">{{ $facultytype->title }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>

                                <div class="form-group">
                                    <label for="academic_rank">Academic Rank:</label>

                                </div>

                                <div class="form-group">
                                    <label for="designation">Designation:</label>

                                </div>

                                <div class="form-group">
                                    <label for="specialization">Specialization:</label>

                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="faculty_type">Faculty Extensionist</label>
                                {{-- <select id="faculty_type" name="faculty_type" class="form-control">
                                    <option value="">-- Select Faculty Type --</option>
                                    @foreach ($faculty_types as $facultytype)
                                        <option value="{{ $facultytype->id }}">{{ $facultytype->title }}</option>
                                    @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group">
                                <label for="academic_rank">Instructor</label>

                            </div>

                            <div class="form-group">
                                <label for="designation">Faculty Management</label>

                            </div>

                            <div class="form-group">
                                <label for="specialization">Human Resource Management</label>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- faculty - edit tab --}}
<div class="tab-pane fade" id="faculty-edit" role="tabpanel"  >
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
            {{-- break --}}
            <div class="tab-content">
                <div class="ml-3 mt-3 mb-3">

                    <div class="row">
                        <label class="mt-2" style="font-size: 1.1rem;">Faculty Details</label>
                    </div>
                    <div class="row">
                        <div class="row mx-auto">
                            <div class="col-md-6">
                                <label class="required-input">Faculty Type</label>
                                <input id="selectedOption" readonly type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Regular">
                                    <div class="dropdown-menu" id="myDropdown">
                                        <button class="dropdown-item d1" type="button">Faculty extensionist</button>
                                        <button class="dropdown-item d1" type="button">Part-time faculty</button>
                                        <button class="dropdown-item d1" type="button">Regular faculty</button>
                                    </div>
                                {{-- <select id="" name="" class="form-control select2">
                                    <option disabled selected>List of Faculty types</option>
                                    @foreach ($faculty_types as $facultytype)
                                        <option value="{{ $facultytype->id }}">{{ $facultytype->title }}
                                        </option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="col-md-6">
                                <label class="required-input">Academic Rank</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Instructor">
                                    <div class="dropdown-menu" id="myDropdown">
                                        <button class="dropdown-item" type="button">Option 1</button>
                                        <button class="dropdown-item" type="button">Option 2</button>
                                        <button class="dropdown-item" type="button">Instructor</button>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <label class="required-input">Designation</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Faculty Mgmt.">
                                    <div class="dropdown-menu" id="myDropdown">
                                        <button class="dropdown-item" type="button">Option 1</button>
                                        <button class="dropdown-item" type="button">Administrative Personnel</button>
                                        <button class="dropdown-item" type="button">Faculty Management</button>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <label class="required-input">Specialization</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. H.R. Mgmt.">
                                    <div class="dropdown-menu" id="myDropdown">
                                        <button class="dropdown-item" type="button">Option 1</button>
                                        <button class="dropdown-item" type="button">Option 2</button>
                                        <button class="dropdown-item" type="button">Human Resource Management</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
