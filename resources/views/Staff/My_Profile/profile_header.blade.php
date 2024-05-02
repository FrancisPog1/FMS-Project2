

    <section class="container">
        <div class="mr-5 ml-5">
            <div class="card rounded-lg">
                <div class="card-header" style="height: 145px">
                    <div class="panel profile-cover">
                        <div class="profile-cover__img">
                            <div class="profile-img-1">
                                <img src="https://scontent.fmnl8-3.fna.fbcdn.net/v/t39.30808-6/240729294_1157862864622563_4820311260532742165_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=174925&_nc_eui2=AeHAn3-_00zp2c26NgHE1mWuh1dt5xrcsGeHV23nGtywZyCs6GVkrW9EIfCQxYjQJgp7BkYfSCEuuHCplp1EmK19&_nc_ohc=s_9pCOZLgpkAX_Nsghh&_nc_ht=scontent.fmnl8-3.fna&oh=00_AfA3tVB32G8FYNJFksc-RNnvF1fUHoiDvNRgJ4LIItpQBA&oe=64BC8392" alt="img" style="height: 120px; width: 120px;">
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

