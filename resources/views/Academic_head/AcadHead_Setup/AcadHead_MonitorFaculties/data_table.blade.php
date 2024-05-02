

        <!-- Main content -->
        <section class="container">
            <div class="mr-5 ml-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">List of Faculties</h3>
                    </div>

                    <!-- Tables of roles -->
                    <div class="card-body p-0">
                        <div>
                        <table class="table table-striped" id="myTable" >
                            <thead class="pal-1 text-col-2">
                                <tr class="small-font">
                                    <th style="width: 15%" >Name</th>
                                    <th style="width: 18%">Requirement Type</th>
                                    <th style="width: 21%">Requirement Bin</th>
                                    <th style="width: 12% "class="text-center">Submission Date</th>
                                    <th style="width: 4% "class="text-center">Status</th>
                                    <th style="width: 5%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id='filtered-bins'>
                                @foreach ( $users as $user)


                                    <tr class="small-font">
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->requirement_bin }}</td>
                                        <td>{{ $user->assigned_bin_id }}</td>



                                        <td class="text-center">
                                            <button type="button"
                                            class="  font-medium rounded-full text-sm  px-3 py-1 text-center mr-2 mb-2
                                        {{ $user->status == 'Pending' ? 'text-white bg-gray-400' : ($user->status == 'Rejected' ? 'text-white bg-red-500' : ($user->status == 'In review' ? 'text-white bg-blue-500' : 'text-white bg-green-500')) }}
                                        ">{{ $user->status }}</button>
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                    <a href="#"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300"
                                                        role="button" aria-pressed="true">
                                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                                    </a>
                                                    <button type="button" data-status="{{ $user->status }}"
                                                        data-remarks="{{ $user->remarks }}"
                                                        data-requirement-id="{{ $user->id }}"
                                                        data-user-id="{{ $user->user_id }}"
                                                        data-req-bin-id="{{ $user->req_bin_id }}"
                                                        data-toggle="modal" data-target="#modal-xl-validate-{{$user->id}}"
                                                        class="validate-button px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                        Validate
                                                    </button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Validate Modal --}}
                                    @include('Academic_head/AcadHead_Setup/AcadHead_MonitorFaculties/validate_modal')

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </section>
<br>
