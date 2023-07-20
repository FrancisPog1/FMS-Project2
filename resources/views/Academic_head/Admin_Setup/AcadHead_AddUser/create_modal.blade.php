{{-- To add user role --}}
<section class="content">
    <form id="adduser" action="{{ route('admin.register_user') }}" method="post">
        @csrf
        <div class="modal fade" id="modal-xl-create">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="required-input">User Role</label>
                                    <select id="role" name="role" class="form-control select2 rounded">
                                        <option disabled selected>List of User role/s</option>
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
                                    <input type="email" class="form-control rounded" id="email" name="email"
                                        placeholder="example@gmail.com" tabindex="1" required="">
                                    <div class="email-error"></div> {{-- Container for email validation error --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control rounded" id="password"
                                            name="password" tabindex="1">
                                        <div class="input-group-append">
                                            <span class="input-group-text show-password" style="cursor: pointer;">
                                                <i class="fas fa-eye" style="font-size: 18px;"></i>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control rounded" id="password_confirmation"
                                            name="password_confirmation" tabindex="1">
                                        <div class="input-group-append ">
                                            <span class="input-group-text show-password" id="toggleConfirmPassword"
                                                style="cursor: pointer;">
                                                <i class="fas fa-eye" id="eyeicon" style="font-size: 18px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="text-danger">
                                        @foreach ($errors->get('password') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </span>
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
    <div id="message"></div>
</section>
