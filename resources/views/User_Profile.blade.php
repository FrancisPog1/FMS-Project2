@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')

<style>
    .profile-cover__action {
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    padding: 215px 30px 10px 185px;
    border-radius: 5px;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-pack: end;
    -webkit-box-pack: end;
    justify-content: flex-end;
    overflow: hidden;
    background: url(../img/cover_test.png) no-repeat;
    background-color: red;
    background-size: cover;
    }

    .profile-cover__img {
    display: flex;
    border-radius: 11px;
    color: #fff;
    position: absolute;
    left: 50px;
    top: -32px;
    text-align: center;
    z-index: 1;
    }

    .profile-cover__img .profile-img-1>img {
    max-width: 185px;
    border: 5px solid #ffffff;
    border-radius: 50%;
    margin-top: 25px;
    margin-left: -9px;
    }

    .profile-cover__img .profile-img-content {
    margin-top: 60px;
    display: flex;
    margin-left: 10px;
    }

    img {
    max-width: 100%;
    }

    img {
    vertical-align: middle;
    border-style: none;
    }
    img, svg {
    vertical-align: middle;
    }

    img {
    overflow-clip-margin: content-box;
    overflow: clip;
    }

    .text-dark {
    color: #100f15 !important;
    }

    .text-start {
    text-align: left !important;
    }



</style>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center
            align-items-center">
            <img class="animation__shake" src="/img/pup.png" height="60"
                width="60">
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <!--div class="content-header">
                <div class="container-fluid">
                    <div class="row mt-5 ml-5">
                        <div class="col">
                            <h1 class="m-0">Hi! {User}</h1>

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div-->

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mt-5 ml-5">
                        <div class="col">
                            <h1 class="m-0">Hi! {User}</h1>

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ Breadcrumbs::render('Profile') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">

                {{-- The Pictures --}}
                <div class="container-fluid">
                    <div class="mx-auto col-11 card card-primary ">
                        <div class="card-body" style="padding-bottom: 100px !important;">
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
                                                        <h3 class="h3 mb-1" style="font-weight: 600">Demelyn Monzon, MSIT</h3>
                                                        <h5 class="text-muted">Academic Head, PUP-QC</h5>
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

                <div class="container-fluid">
                    <div class="row mx-auto col-11 align-content-between ">
                        <!-- Left container -->
                        <!--div class="col-md-4">
                            <div class="card ">
                                <div class="card-header pal-1 text-col-2">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav col-12    nav-tabs" id="custom-content-above-tab" role="tablist" style="border-bottom:none !important;">
                                        <li class="nav-item mb-3" role="presentation">
                                            <a href="nav-link active"
                                            id="personal-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#personal"
                                            type="button" role="tab"
                                            aria-controls="personal"
                                            aria-selected="true"
                                            style="color: var(--text-color-1);">
                                                <strong><i class="fas fa-book mr-1"></i> Personal Information</strong>
                                            </a>
                                        </li>

                                        <li class="nav-item  mb-3" role="presentation">
                                            <a href="nav-link active"
                                            id="vicinity-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#vicinity"
                                            type="button" role="tab"
                                            aria-controls="vicinity"
                                            aria-selected="true"
                                            style="color: var(--text-color-1);">
                                                <strong><i class="fas fa-book mr-1"></i> Vicinity Information</strong>
                                            </a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a href="nav-link active"
                                            id="faculty-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#faculty"
                                            type="button" role="tab"
                                            aria-controls="faculty"
                                            aria-selected="true"
                                            style="color: var(--text-color-1);">
                                                <strong><i class="fas fa-book mr-1"></i> Faculty Details</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div-->
                        <!-- Right container -->
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                {{-- personal - view tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                                <div class="tab-pane fade show active" role="tabpanel" >
                                    <div class="card">
                                        <div class="card-body" >
                                            {{-- edit icon --}}
                                            <ul class="nav nav-tabs float-right" id="custom-content-above-tab" role="tablist" style="border-bottom:none !important;">
                                                <li class="nav-item " role="presentation">
                                                    <a href="nav-link active"
                                                    id="profile-edit-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#profile-edit"
                                                    type="button" role="tab"
                                                    aria-controls="profile-edit"
                                                    aria-selected="true"
                                                    style="color: var(--text-color-1);
                                                            font-size: 1.2rem;">
                                                        <i class="fas fa-pen mr-1 float-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                {{-- Personal Info --}}
                                                <div>
                                                    <div class="row">
                                                        <label class="ml-3 mt-3 mb-3" style="font-size: 1.1rem;">Personal Information</label>
                                                    </div>
                                                    <div class="col-12 p-4">
                                                        <div class="row justify-content-around">
                                                            <div class="col-3">
                                                                <label class="required-input">Surname</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Dela Cruz">
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">First name</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Juan">
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">Middle name</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Santos">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Extension name</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. II, Jr.">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Salutation</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Phd, Engr">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                {{-- just a space container, nothing more --}}
                                                            </div>
                                                        </div>

                                                        <br><hr class="solid-gray-line"><br>

                                                        <div class="row justify-content-around">
                                                            <div class="col-3">
                                                                <label class="required-input">Birthday</label>
                                                                <input type="date" class="form-control date-range-filter" id="date_from" name="date_from" placeholder="date" tabindex="1" required="" readonly value="2023-07-14">
                                                            </div>

                                                            <div class="col-3">
                                                                <label class="required-input">Birthplace</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Quezon City">
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">Province</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Tondo, Romblon">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Phone No.</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. 09123456789">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Hire date</label>
                                                                <input type="date" class="form-control date-range-filter" id="date_from" name="date_from" placeholder="date" tabindex="1" required="" readonly value="2023-07-14">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                {{-- just a space container, nothing more --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr class="solid-gray-line"><br>
                                                {{-- Vicinity Info --}}
                                                <div>
                                                    <div class="row">
                                                        <label class="ml-4 mt-3 mb-3" style="font-size: 1.1rem;">Vicinity Information</label>
                                                    </div>
                                                    <div class="col-12 p-5" style="padding-top: 0px !important;">
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Municipality</label>
                                                                <input readonly class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Quezon City">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Baranggay</label>
                                                                <input readonly class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. West Triangle">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Street Name</label>
                                                                <input readonly class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Ecol St.">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">House/Blk/Lot no.</label>
                                                                <input readonly class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g.  0988">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr class="solid-gray-line"><br>
                                                {{-- Faculty Info --}}
                                                <div>
                                                    <div class="row">
                                                        <label class="ml-4 mt-3 mb-3" style="font-size: 1.1rem;">Faculty Information</label>
                                                    </div>
                                                    <div class="col-12 p-5" style="padding-top: 0px !important;">
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Faculty Type</label>
                                                                <input id="selectedOption" readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Regular">
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
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Academic Rank</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Instructor">
                                                                    <div class="dropdown-menu" id="myDropdown">
                                                                        <button class="dropdown-item" type="button">Option 1</button>
                                                                        <button class="dropdown-item" type="button">Option 2</button>
                                                                        <button class="dropdown-item" type="button">Instructor</button>
                                                                    </div>
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Designation</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Faculty Mgmt.">
                                                                    <div class="dropdown-menu" id="myDropdown">
                                                                        <button class="dropdown-item" type="button">Option 1</button>
                                                                        <button class="dropdown-item" type="button">Administrative Personnel</button>
                                                                        <button class="dropdown-item" type="button">Faculty Management</button>
                                                                    </div>
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Specialization</label>
                                                                <input readonly class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. H.R. Mgmt.">
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
                                {{-- personal - edit tab [UPDATE: SINGLE CARD WITH DUPLICATE DIV FOR EDITING]--}}
                                <div class="tab-pane fade" id="profile-edit" role="tabpanel" >
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
                                                {{-- Personal Info --}}
                                                <div>
                                                    <div class="row">
                                                        <label class="ml-3 mt-3 mb-3" style="font-size: 1.1rem;">Personal Information</label>
                                                    </div>
                                                    <div class="col-12 p-4">
                                                        <div class="row justify-content-around">
                                                            <div class="col-3">
                                                                <label class="required-input">Surname</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Dela Cruz">
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">First name</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Juan">
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">Middle name</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Santos">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Extension name</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. II, Jr.">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Salutation</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Phd, Engr">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                {{-- just a space container, nothing more --}}
                                                            </div>
                                                        </div>

                                                        <br><hr class="solid-gray-line"><br>

                                                        <div class="row justify-content-around">
                                                            <div class="col-3">
                                                                <label class="required-input">Birthday</label>
                                                                <input type="date" class="form-control date-range-filter" id="date_from" name="date_from" placeholder="date" tabindex="1" required>
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">Birthplace</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Quezon City">
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="required-input">Province</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Tondo, Romblon">
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Phone No.</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. 09123456789">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Hire date</label>
                                                                <input type="date" class="form-control date-range-filter" id="date_from" name="date_from" placeholder="date" tabindex="1" required>
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                {{-- just a space container, nothing more --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr class="solid-gray-line"><br>
                                                {{-- Vicinity Info --}}
                                                <div>
                                                    <div class="row">
                                                        <label class="ml-4 mt-3 mb-3" style="font-size: 1.1rem;">Vicinity Information</label>
                                                    </div>
                                                    <div class="col-12 p-5" style="padding-top: 0px !important;">
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Municipality</label>
                                                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Quezon City">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Baranggay</label>
                                                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. West Triangle">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Street Name</label>
                                                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Ecol St.">
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">House/Blk/Lot no.</label>
                                                                <input type="text" class="form-control dropdown-toggle" aria-haspopup="true" aria-expanded="false" placeholder="e.g.  0988">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr class="solid-gray-line"><br>
                                                {{-- Faculty Info --}}
                                                <div>
                                                    <div class="row">
                                                        <label class="ml-4 mt-3 mb-3" style="font-size: 1.1rem;">Faculty Information</label>
                                                    </div>
                                                    <div class="col-12 p-5" style="padding-top: 0px !important;">
                                                        <div class="row justify-content-around">
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Faculty Type</label>
                                                                <input id="selectedOption" type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Regular">
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
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Academic Rank</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Instructor">
                                                                    <div class="dropdown-menu" id="myDropdown">
                                                                        <button class="dropdown-item" type="button">Option 1</button>
                                                                        <button class="dropdown-item" type="button">Option 2</button>
                                                                        <button class="dropdown-item" type="button">Instructor</button>
                                                                    </div>
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
                                                                <label class="required-input">Designation</label>
                                                                <input type="text" class="form-control dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="e.g. Faculty Mgmt.">
                                                                    <div class="dropdown-menu" id="myDropdown">
                                                                        <button class="dropdown-item" type="button">Option 1</button>
                                                                        <button class="dropdown-item" type="button">Administrative Personnel</button>
                                                                        <button class="dropdown-item" type="button">Faculty Management</button>
                                                                    </div>
                                                            </div>
                                                            <div class="col-3 mt-3 mb-0">
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
                                {{-- vicinity - view tab --}}
                                <!--div class="tab-pane fade" id="vicinity" role="tabpanel" >
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
                                </div-->
                                {{-- vicinity - edit tab --}}
                                <!--div class="tab-pane fade" id="vicinity-edit" role="tabpanel" >
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
                                </div-->
                                {{-- faculty - view tab --}}
                                <!--div class="tab-pane fade" id="faculty" role="tabpanel"  >
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
                                </div-->
                                {{-- faculty - edit tab --}}
                                <!--div class="tab-pane fade" id="faculty-edit" role="tabpanel"  >
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
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Container -->
        <footer class="main-footer">
            <strong>
                Faculty Records & Monitoring System &copy; 2024
                    <a href="https://pup.edu.ph">PUPQC.</a>
            </strong>

                All rights reserved.

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
    </div>

    <!-- Local scipt for choosing dropdown item -->
    <script src="{{ asset('js/farms.dropitem.js') }}"></script>

    <!-- Local script for warning modals -->
    <script src="{{ asset('js/farms.swal.warning.modal.js') }}"></script>

    <!-- Local script for success modals -->
    <script src="{{ asset('js/farms.swal.success.modal.js') }}"></script>

    <!-- Script for Date picker -->
    <script src="{{ asset('js/farms.datepicker.js') }}"></script>
@endsection
