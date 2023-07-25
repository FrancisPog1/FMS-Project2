<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">List of Users</h3>
                <div class="text-right">
                    <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                        class="px-4 py-2 text-sm font-medium text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">Add
                        New User</button>
                </div>
            </div>


            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style="width: 30%;">Name</th>
                            <th style="width: 28%;">Email</th>
                            <th >Role</th>
                            <th class= "text-center" style="width: 8%;">Status</th>
                            <th class="text-center" style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-users">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_role }}</td>
                                <!--This should be a toggle switch with funct.-->
                                <td class="text-center">
                                    <button type="button"
                                        class="  font-medium rounded-full text-sm  px-3 py-1 mr-2 mb-2
                                {{ $user->status == 'Offline' ? 'text-white bg-gray-500' : 'text-white bg-green-400' }}
                                ">{{ $user->status }}</button>
                                </td>

                                <td class="text-center">

                                    <div class="btn-group">
                                        <form method="POST" action="{{ route('admin.delete_users', $user->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">

                                            <a href="{{ route('admin.show_profile', $user->id) }}"
                                                class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300"
                                                role="button" aria-pressed="true">
                                                <i class="fa fa-window-restore" aria-hidden="true"></i>
                                            </a>

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
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<br>
