<div class="tab-pane fade" id="profile-edit" role="tabpanel" aria-labelledby="profile-edit-tab">
    <div class="card">
        <div class="card-body" >
            {{-- save icon --}}
            <ul class="nav nav-tabs float-right"  style="border-bottom:none !important;">
                <li class="nav-item " role="presentation">
                    <a href="nav-link active"
                    id="profile-view-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#profile-view"
                    type="button" role="tab"
                    aria-controls="profile-view"
                    aria-selected="true"
                    style="color: var(--text-color-1);
                            font-size: 1.2rem;">
                        <i class="fas fa-times fa-lg mr-1 float-right"></i>
                    </a>
                </li>
            </ul>

            <form id="" action="" method="post">
             @csrf
                <div class=" tab-content card-body mr-4 ml-4" id="cardBody">
                    <div class="form-group">
                        <h5 class="font-weight-bold">Account Information</h5>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control rounded cool-white-input" id="firstname" name="firstname">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control rounded cool-white-input" id="lastname" name="lastname">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control rounded cool-white-input" id="middlename" name="middlename">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="extensionname">Extension Name</label>
                            <input type="text" class="form-control rounded cool-white-input" id="extensionname" name="extensionname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select class="form-control rounded cool-white-input" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control rounded cool-white-input" id="birthdate" name="birthdate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="birthplace">Birthplace</label>
                            <input type="text" class="form-control rounded cool-white-input" id="birthplace" name="birthplace">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control rounded cool-white-input" id="email" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control rounded cool-white-input" id="phone" name="phone">
                        </div>
                    </div>
                    <br>
                    <hr class="mb-4"> <!-- Line to separa   te sections -->

                    <div class="form-group">
                        <h5 for="physicaladdress" class="font-weight-bold">Physical Address</h5>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="province">Province</label>
                            <input type="text" class="form-control rounded cool-white-input" id="province" name="province">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control rounded cool-white-input" id="city" name="city">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control rounded cool-white-input" id="barangay" name="barangay">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="street">Street</label>
                            <input type="text" class="form-control rounded cool-white-input" id="street" name="street">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="housenumber">House Number</label>
                            <input type="text" class="form-control rounded cool-white-input" id="housenumber" name="housenumber">
                        </div>
                    </div>
                    <br>
                    <hr> <!-- Line to separate sections -->

                    <div class="form-group">
                        <h5 class="font-weight-bold">Faculty Details</h5>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="facultytype">Faculty Type</label>
                            <select class="form-control rounded cool-white-input" id="facultytype" name="facultytype">
                                <option value="type1">Type 1</option>
                                <option value="type2">Type 2</option>
                                <option value="type3">Type 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="academicrank">Academic Rank</label>
                            <select class="form-control rounded cool-white-input" id="academicrank" name="academicrank">
                                <option value="rank1">Rank 1</option>
                                <option value="rank2">Rank 2</option>
                                <option value="rank3">Rank 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="designation">Designation</label>
                            <select class="form-control rounded cool-white-input" id="designation" name="designation">
                                <option value="designation1">Designation 1</option>
                                <option value="designation2">Designation 2</option>
                                <option value="designation3">Designation 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="specialization">Specialization</label>
                            <select class="form-control rounded cool-white-input" id="specialization" name="specialization">
                                <option value="specialization1">Specialization 1</option>
                                <option value="specialization2">Specialization 2</option>
                                <option value="specialization3">Specialization 3</option>
                            </select>
                        </div>
                    <div class="form-group col-md-6">
                        <label for="hiredate">Hire Date</label>
                        <input type="date" class="form-control rounded cool-white-input" id="hiredate" name="hiredate">
                    </div>
                    </div>


                    <hr> <!-- Line to separate sections -->
                    <br>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>


        </div>
    </div>
</div>
