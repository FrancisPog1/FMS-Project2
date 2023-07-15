@extends('layouts.master')

{{-- CONTENTS --}}
@section('content')

    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{-- <div class="content-header">
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
            </div> --}}

            <!-- Main content -->
            <div class="content">
                <br>

                @include('User_Profile/profile_header')

                <div class="container-fluid">
                    <div class="row mx-auto col-11 align-content-between ">

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

@include('User_Profile/styles')
@include('User_Profile/scripts')




@endsection
