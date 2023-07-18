

    <section class="container">
        <div class="mr-5 ml-5">
            <div class="card rounded-lg">
                <div class="card-header" style="height: 145px">
                    <div class="panel profile-cover">
                        <div class="profile-cover__img">
                            <div class="profile-img-1">
                                <img src="https://lh3.googleusercontent.com/a-/ACB-R5SPNI6x5R3YO5R7LcdJlXMQGtn6kMwaDgvvu2S6=s75-c" alt="img" style="height: 120px; width: 120px;">
                            </div>
                            <div class="profile-img-content text-dark text-start">
                                <div class="text-dark">
                                    <h3 class="h3 mb-1" style="font-weight: 600">{{$user_profile->first_name}} {{$user_profile->middle_name }}
                                        {{$user_profile->last_name}} {{$user_profile->extension_name}}</h3>
                                    <h5 class="h5 mb-1 text-muted">{{ $email }}</h5>
                                    <p class="text-muted">{{ $role }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" id="card-body-1">


                        <button id="viewButton" class="btn btn-link font-weight-bold ">My Profile</button>
                        <button id="editButton" class="btn btn-link  font-weight-bold ">Edit Profile</button>

                </div>
            </div>
        </div>
    </section>

