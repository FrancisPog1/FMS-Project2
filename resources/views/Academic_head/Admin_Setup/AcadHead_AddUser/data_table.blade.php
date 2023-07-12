<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">List of Users</h3>
                <div class="text-right">
                    <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Add
                        New User</button>
                </div>
            </div>

                           {{-- CODE FOR THE FILTERING --}}
                           <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                                    <select name="dataTable_length" aria-controls="dataTable"
                                        class="ml-2 col-3 custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="col-8 d-flex">
                                    <div class="mr-2">
                                        <select name="filter" id="filter" class="form-control">
                                            <option selected disabled>Filter by</option>
                                            <option value="All">All</option>
                                            <option value="Faculty">Role: Faculty</option>
                                            <option value="Staff">Role: Staff</option>
                                            <option value="Academic Head">Role: Academic Head</option>
                                            <option value="Director">Role: Director</option>
                                            <option value="Active">Status: Active</option>
                                            <option value="Inactive">Status: Inactive</option>
                                        </select>
                                    </div>
                                    <div style="width:20%;">
                                        <select name="sort" id="sort" class="form-control">
                                            <option selected disabled>Sort by</option>
                                            <option value="All">All</option>
                                            <option value="az">Name: A to Z</option>
                                            <option value="za">Name: Z to A</option>
                                            <option value="e_az">Email: A to Z</option>
                                            <option value="e_za">Email: Z to A</option>
                                            <option value="r_az">Role: A to Z</option>
                                            <option value="r_za">Role: Z to A</option>
                                        </select>
                                    </div>
                                    <div class="ml-auto" style="width:40%;">
                                        <form class="d-flex">
                                            <input class="form-control me-2 rounded-lg" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th>Email</th>
                            <th style="width: 25%;">Role</th>
                            <th class= "text-center" style="width: 15%;">Status</th>
                            <th class="text-center" style="width: 25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-users">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_role }}</td>
                                <!--This should be a toggle switch with funct.-->
                                <td class="text-center">
                                    <button type="button"
                                        class="  font-medium rounded-full text-sm  px-3 py-1 mr-2 mb-2
                                {{ $user->status == 'Inactive' ? 'text-white bg-red-500' : 'text-white bg-green-400' }}
                                ">{{ $user->status }}</button>
                                </td>

                                <td class="text-center">
                                    <form method="POST" action="{{ route('delete_users', $user->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">

                                        <button data-toggle="modal" onclick="openViewModal('{{ $user->email }}')"
                                            data-target="#modal-xl-view" type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        <button data-toggle="modal"
                                            onclick="openEditModal('{{ $user->email }}', '{{ $user->id }}')"
                                            data-target="#modal-xl-edit" type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                            title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-col-1" style="font-size: .9rem;">
                        <tr>
                            <td colspan="4">
                                <div class="col-sm-12">
                                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
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
