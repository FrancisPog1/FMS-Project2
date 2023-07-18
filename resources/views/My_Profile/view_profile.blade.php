<div id="view-card" class="card card-transition active">
    <div class="card-body mr-4 ml-4" id="cardBody">
        <div class="form-group">
            <h5 class="h3 font-weight-bold">Account Information</h5>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="firstname">First Name</label>
                <input readonly class="form-control rounded cool-white-input" id="firstname1" name="firstname1" value="{{ $user_profile->first_name }}">
            </div>
            <div class="form-group col-md-3">
                <label for="lastname">Last Name</label>
                <input readonly class="form-control rounded cool-white-input" id="lastname1" name="lastname1" value="{{ $user_profile->last_name }}">
            </div>
            <div class="form-group col-md-3">
                <label for="middlename">Middle Name</label>
                <input readonly class="form-control rounded cool-white-input" id="middle1name" name="middlen1ame" value="{{ $user_profile->middle_name }}">
            </div>
            <div class="form-group col-md-3">
                <label for="extensionname">Extension Name</label>
                <input readonly class="form-control rounded cool-white-input" id="exte1nsionname" name="extension1name" value="{{ $user_profile->extension_name }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select readonly class="form-control rounded cool-white-input" id="gender" name="gen1der" readonly>
                    <option disabled selected>Select options</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="birthdate">Birthdate</label>
                <input type="date" readonly class="form-control rounded cool-white-input" id="birthdate" name="bi1rthdate" >
            </div>
            <div class="form-group col-md-4">
                <label for="birthplace">Birthplace</label>
                <input readonly class="form-control rounded cool-white-input" id="birthplace" name="bir1thplace" value="{{ $user_profile->birthplace }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" readonly class="form-control rounded cool-white-input" id="email" name="e1mail" value="{{ $email }}">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="tel" readonly class="form-control rounded cool-white-input" id="phone" name="pho1ne" value="{{ $user_profile->phone_number }}">
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
                <input readonly class="form-control rounded cool-white-input" id="province" name="provi1nce" value="{{ $user_profile->province }}">
            </div>
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input readonly class="form-control rounded cool-white-input" id="city" name="ci1ty" value="{{ $user_profile->city }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="barangay">Barangay</label>
                <input readonly class="form-control rounded cool-white-input" id="barangay" name="bara1ngay" value="{{ $user_profile->barangay }}">
            </div>
            <div class="form-group col-md-4">
                <label for="street">Street</label>
                <input readonly class="form-control rounded cool-white-input" id="street" name="str1eet" value="{{ $user_profile->street }}">
            </div>
            <div class="form-group col-md-4">
                <label for="housenumber">House Number</label>
                <input readonly class="form-control rounded cool-white-input" id="housenumber" name="hous1enumber" value="{{ $user_profile->house_number }}">
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
                <select readonly class="form-control rounded cool-white-input" id="facultytype" name="facul1tytype">
                    <option disabled selected>Select options</option>
                    @foreach ( $faculty_types as $type)
                    <option value="{{$type->id}}">{{ $type->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="academicrank">Academic Rank</label>
                <select readonly class="form-control rounded cool-white-input" id="academicrank" name="academ1icrank">
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
                <select readonly class="form-control rounded cool-white-input" id="designation" name="desig1nation">
                    <option disabled selected>Select options</option>

                    @foreach ( $designations as $designations)
                        <option value="{{ $designations->id }}">{{ $designations->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="specialization">Specialization</label>
                <select readonly class="form-control rounded cool-white-input" id="specialization" name="special1ization">
                    <option disabled selected>Select options</option>

                    @foreach ( $specializations as $specialization)
                        <option value="{{ $specialization->id }}">{{ $specialization->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="hiredate">Hire Date</label>
                <input type="date" readonly class="form-control rounded cool-white-input" id="hiredate" name="hir1edate">
            </div>
        </div>
    </div>
</div>
