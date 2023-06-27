@extends('layouts.master')


{{-- CONTENTS --}}
@section('content')
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="img/pup.png" height="60" width="60">
        </div>

        <!-- Content Wrapper. Outer Container -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row-col-sm-6 mb-2">
                        <div class="col-md-3 ml-4">
                            <h1 class="m-0">Activity Type</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="container">
                <div class="mr-5 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">List of Activity Type</h3>
                            <div class="text-right">
                                <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                    class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Create
                                    New Activity Type</button>
                            </div>
                        </div>

                        <div class="card-header row">
                            <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .9rem;">Show entries</p>
                            <select name="dataTable_length" aria-controls="dataTable"
                                class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">
                                    10
                                </option>
                                <option value="25">
                                    25
                                </option>
                                <option value="50">
                                    50
                                </option>
                                <option value="100">
                                    100
                                </option>
                            </select>
                        </div>

                        <!-- Tables of roles -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead class="pal-1 text-col-2">
                                    <tr>
                                        <th>Title</th>
                                        <th style="width: 25%;">Description</th>
                                        <th style="width: 25%;">Category</th>
                                        <th class="text-center" style="width: 25%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activitytypes as $activitytype)
                                        <tr>
                                            <td>{{ $activitytype->title }}</td>
                                            <td>{{ $activitytype->category }}</td>
                                            <td>{{ $activitytype->description }}</td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('delete_activitytypes', $activitytype->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button data-toggle="modal" onclick="openViewModal('{{ $activitytype->title }}', '{{ $activitytype->description }}', '{{ $activitytype->category }}')" data-target="#modal-xl-view" type="button" class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                        <i class="far fa-eye"></i>
                                                    </button>

                                                    <button type="button" onclick="openEditModal('{{ $activitytype->title }}', '{{ $activitytype->description }}', '{{ $activitytype->category }}' ,'{{ $activitytype->id }}')" class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                                        <i class="far fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 delete-button" title="Delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="text-col-1" style="font-size: .9rem;">
                                    <tr>
                                        <td>
                                            <div class="col-sm-12">
                                                <div class="dataTables_info" id="dataTable_info" role="status"
                                                    aria-live="polite">
                                                    Showing 1 to 4 of 4 entries
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <form id="viewForm" action="" method="post">
                    <div class="modal fade" id="modal-xl-view">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">View</h4>
                                    <button type="button" class="close" data-dismiss="modal" id="View_closeModalButton"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height: 400px;">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title" tabindex="1" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" placeholder="Description" tabindex="1" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="required-input" readonly>Category</label>
                                                <input type="text" class="form-control" id="category"
                                                    name="category" placeholder="Description" tabindex="1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" id="View_cancelButton"
                                        data-dismiss="modal">Close</button>

                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>

        </div>
        </form>
        </section>

        <section class="content">
            <form id="editForm" action="" method="post">
                @method('PUT')
                @csrf

                <div class="modal fade" id="modal-xl-edit">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Activity Type</h4>
                                <button type="button" class="close" data-dismiss="modal" id="cancelButton"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="height: 400px;">
                                <div class="card-body">

                                    @include('Form_Group.edit_form')

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="required-input">Category</label>
                                            <select id="category" name="category" class="form-control select2">
                                                <option disabled selected>List of category/s</option>
                                                <option value="Activity">Activity</option>
                                                <option value="Meeting">Meeting</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger" id="closeModalButton"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save
                                    changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>
        <section class="content">
            <form action="{{ route('Create_ActivityType') }}" method="post">
                @csrf
                <div class="modal fade" id="modal-xl-create">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create New Activity Type</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="height: 400px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="required-input">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Title" tabindex="1" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Description</label>
                                            <input type="text" class="form-control" id="description"
                                                name="description" placeholder="Description" tabindex="1">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="required-input">Category</label>
                                            <select id="category" name="category" class="form-control select2">
                                                <option disabled selected>List of category/s</option>
                                                <option value="Activity">Activity</option>
                                                <option value="Meeting">Meeting</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
        </section>

    </div>

    <!-- Footer Container -->
    <footer class="main-footer">
        <strong>Faculty Records & Monitoring System &copy; 2024 <a href="https://pup.edu.ph">PUPQC.</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.2.0
        </div>
    </footer>
    </div>

    <script>
        function openEditModal(title, description, category, typeId) {
            // Set the values in the form fields
            document.getElementById('editForm').elements['title'].value = title;
            document.getElementById('editForm').elements['description'].value = description;
            document.getElementById('editForm').elements['category'].value = category;
            document.getElementById('editForm').action = "{{ route('update_activitytypes', '') }}" + typeId;

            // Open the edit modal
            $('#modal-xl-edit').modal('show');
        }

        // Add event listeners to close the modal
        document.getElementById('closeModalButton').addEventListener('click', function() {
            $('#modal-xl-edit').modal('hide');
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            $('#modal-xl-edit').modal('hide');
        });
    </script>


    <script>
        function openViewModal(title, description, category) {
            // Set the values in the form fields
            document.getElementById('viewForm').elements['title'].value = title;
            document.getElementById('viewForm').elements['description'].value = description;
            document.getElementById('viewForm').elements['category'].value = category;
            // Open the edit modal
            $('#modal-xl-view').modal('show');
        }

        // Add event listeners to close the modal
        document.getElementById('View_closeModalButton').addEventListener('click', function() {
            $('#modal-xl-view').modal('hide');
        });

        document.getElementById('View_cancelButton').addEventListener('click', function() {
            $('#modal-xl-view').modal('hide');
        });
    </script>
@endsection
