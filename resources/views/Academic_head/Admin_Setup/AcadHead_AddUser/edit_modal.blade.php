    {{-- To edit user role --}}
    <section class="content">
        <form id="editForm" action="" method="post">
            @method('PUT')
            @csrf
            <div class="modal fade" id="modal-xl-edit">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" id="Edit_closeModalButton"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" style="height: 400px;">
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="required-input">User Role</label>
                                        <select id="role" name="role" class="form-control select2">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="required-input">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="example@gmail.com" tabindex="1" required="">
                                        <span class="text-danger">
                                            @foreach ($errors->get('email') as $message)
                                                <p>{{ $message }}</p>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            tabindex="1">
                                        <span class="text-danger">
                                            @foreach ($errors->get('password') as $message)
                                                <p>{{ $message }}</p>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" tabindex="1">
                                        <span class="text-danger">
                                            @foreach ($errors->get('password_confirmation') as $message)
                                                <p>{{ $message }}</p>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" id="Edit_cancelButton"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary swalDefaultSuccess">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
    </section>
