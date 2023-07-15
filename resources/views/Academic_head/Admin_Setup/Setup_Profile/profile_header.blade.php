      {{-- The Pictures --}}
      <div class="container-fluid">
        <div class="mx-auto col-11 card card-primary ">
            <div class="card-body" style="padding-bottom: 140px !important;">
                <div class="wideget-user mb-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="panel profile-cover">

                                <div class="profile-cover__img">
                                    <div class="profile-img-1">
                                        <img src="https://lh3.googleusercontent.com/a-/ACB-R5SPNI6x5R3YO5R7LcdJlXMQGtn6kMwaDgvvu2S6=s75-c" alt="img" style="height: 120px; width: 120px;">
                                    </div>
                                    <div class="profile-img-content text-dark text-start">
                                        <div class="text-dark">
                                            <h3 class="h3 mb-1" style="font-weight: 600">{{$user_profile->first_name}} {{$user_profile->middle_name }}
                                            {{$user_profile->last_name}} {{$user_profile->extension_name}}</h3>
                                            <h5 class="h4 mb-1 text-muted ">{{ $email }}</h5>
                                            <p class="text-muted">{{ $role }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
