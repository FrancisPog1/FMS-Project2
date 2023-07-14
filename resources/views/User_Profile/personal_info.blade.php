<div class="tab-pane fade show active" id="personal" role="tabpanel"  >
    <div class="card">
        <div class="card-body" >

            {{-- edit icon --}}
            <ul class="nav nav-tabs float-right" id="custom-content-above-tab" role="tablist" style="border-bottom:none !important;">
                <li class="nav-item " role="presentation">
                    <a href="nav-link active"
                    id="personal-edit-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#personal-edit"
                    type="button" role="tab"
                    aria-controls="personal-edit"
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
                        <label class="mt-2" style="font-size: 1.1rem;">Personal Details</label>
                    </div>

                    <div class="row">
                        <div class="col-6 ">
                            <div style="margin-left: 8rem!important;">
                                <div class="form-group">
                                    <label for="faculty_type">Name:</label>
                                    {{-- <select id="faculty_type" name="faculty_type" class="form-control">
                                        <option value="">-- Select Faculty Type --</option>
                                        @foreach ($faculty_types as $facultytype)
                                            <option value="{{ $facultytype->id }}">{{ $facultytype->title }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="form-group">
                                    <label for="academic_rank">Phone number:</label>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Birth date:</label>
                                </div>
                                <div class="form-group">
                                    <label for="specialization">Hire date:</label>
                                </div>
                                <div class="form-group">
                                    <label for="specialization">Birthplace:</label>
                                </div>
                                <div class="form-group">
                                    <label for="specialization">Province:</label>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="faculty_type">Demelyn Monzon, MIT</label>
                                {{-- <select id="faculty_type" name="faculty_type" class="form-control">
                                    <option value="">-- Select Faculty Type --</option>
                                    @foreach ($faculty_types as $facultytype)
                                        <option value="{{ $facultytype->id }}">{{ $facultytype->title }}</option>
                                    @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group">
                                <label for="academic_rank">+639123456789</label>
                            </div>
                            <div class="form-group">
                                <label for="designation">Jan 01, 2024</label>
                            </div>
                            <div class="form-group">
                                <label for="designation">Jan 02, 2024</label>
                            </div>
                            <div class="form-group">
                                <label for="specialization">Metro Manila</label>
                            </div>
                            <div class="form-group">
                                <label for="specialization">Albay, Iloilo City</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- personal - edit tab --}}
<div class="tab-pane fade" id="personal-edit" role="tabpanel" >
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
                        <label class="ml-3 mt-3 mb-3" style="font-size: 1.1rem;">Personal Information</label>
                    </div>
                    <div class="row p-3">
                        <div class="mx-auto col-6">
                            <div class="mt-3 mb-0">
                                <label class="required-input">Surname</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Dela Cruz">
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">First name</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Juan">
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Middle name</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Santos">
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Extension name</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. II, Jr.">
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Salutation</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Phd, Engr">
                            </div>
                        </div>
                        <div class="mx-auto col-6">
                            <div class="mt-3 mb-0">
                                <label class="required-input">Phone No.</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. 09123456789">
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Hire date</label>
                                <input type="date" class="form-control date-range-filter" id="date_from" name="date_from" placeholder="date" tabindex="1" required>
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Birthday</label>
                                <input type="date" class="form-control date-range-filter" id="date_from" name="date_from" placeholder="date" tabindex="1" required>
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Birthplace</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Quezon City">
                            </div>
                            <div class="mt-3 mb-0">
                                <label class="required-input">Province</label>
                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Tondo, Romblon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
