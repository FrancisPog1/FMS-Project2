
    <form action=" {{ route('update_profile', $profile_id) }}" method="post">
    @method('PUT')
    @csrf

    <div class="card">
        <div class="card-body mr-4 ml-4" id="cardBody">
            <div class="form-group">
                <h5 class="h3 font-weight-bold">Account Information</h5>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control rounded cool-white-input" id="firstname" name="firstname" value="{{ $user_profile->first_name }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control rounded cool-white-input" id="lastname" name="lastname" value="{{ $user_profile->last_name }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="middlename">Middle Name</label>
                    <input type="text" class="form-control rounded cool-white-input" id="middlename" name="middlename" value="{{ $user_profile->middle_name }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="extensionname">Extension Name</label>
                    <input type="text" class="form-control rounded cool-white-input" id="extensionname" name="extensionname" value="{{ $user_profile->extension_name }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select class="form-control rounded cool-white-input" id="gender" name="gender">
                        <option disabled selected>Select options</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control rounded cool-white-input" id="birthdate" name="birthdate" >
                </div>
                <div class="form-group col-md-4">
                    <label for="birthplace">Birthplace</label>
                    <input type="text" class="form-control rounded cool-white-input" id="birthplace" name="birthplace" value="{{ $user_profile->birthplace }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control rounded cool-white-input" id="email" name="email" value="{{ $email }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control rounded cool-white-input" id="phone" name="phone" value="{{ $user_profile->phone_number }}">
                </div>
            </div>

            <br>
            <hr class="mb-4"> <!-- Line to separate sections -->

            <div class="form-group">
                <h3 for="physicaladdress" class=" h3 font-weight-bold">Physical Address</h3>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="province">Province</label>
                    <input type="text" class="form-control rounded cool-white-input" id="province" name="province" value="{{ $user_profile->province }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control rounded cool-white-input" id="city" name="city" value="{{ $user_profile->city }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="barangay">Barangay</label>
                    <input type="text" class="form-control rounded cool-white-input" id="barangay" name="barangay" value="{{ $user_profile->barangay }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="street">Street</label>
                    <input type="text" class="form-control rounded cool-white-input" id="street" name="street" value="{{ $user_profile->street }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="housenumber">House Number</label>
                    <input type="text" class="form-control rounded cool-white-input" id="housenumber" name="housenumber" value="{{ $user_profile->house_number }}">
                </div>
            </div>
            <br>
            <hr class="mb-4"> <!-- Line to separate sections -->

            <div class="form-group">
                <h3 class="h3 font-weight-bold">Faculty Details</h3>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="facultytype">Faculty Type</label>
                    <select class="form-control rounded cool-white-input" id="facultytype" name="facultytype">
                        <option disabled selected>Select options</option>
                        @foreach ( $faculty_types as $type)
                        <option value="{{$type->id}}">{{ $type->title }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="academicrank">Academic Rank</label>
                    <select class="form-control rounded cool-white-input" id="academicrank" name="academicrank">
                        <option disabled selected>Select options</option>

                        @foreach ( $acad_ranks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->title }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="designation">Designation</label>
                    <select class="form-control rounded cool-white-input" id="designation" name="designation">
                        <option disabled selected>Select options</option>

                        @foreach ( $designations as $designations)
                            <option value="{{ $designations->id }}">{{ $designations->title }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="specialization">Specialization</label>
                    <select class="form-control rounded cool-white-input" id="specialization" name="specialization">
                        <option disabled selected>Select options</option>

                        @foreach ( $specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->title }}</option>
                        @endforeach

                    </select>
                </div>
            <div class="form-group col-md-6">
                <label for="hiredate">Hire Date</label>
                <input type="date" class="form-control rounded cool-white-input" id="hiredate" name="hiredate">
            </div>
            </div>


            <hr> <!-- Line to separate sections -->

            <div class="form-group text-right">
                <label for="submit">Submit</label>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </form>
