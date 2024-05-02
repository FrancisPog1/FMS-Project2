<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">List of Roles</h3>
                <div class="text-right">

                    <button data-toggle="modal" data-target="#modal-xl-restore" type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">
                        Restore</button>

                    <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">Create
                        New Role</button>
                </div>
            </div>

            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped"  id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style="width: 20%;">Roles</th>
                            <th style="width: 50%;">Description</th>
                            <th class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="filtered-roles">
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->title }}</td>
                                <td>{{ $role->description }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('admin.delete_roles', $role->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button data-toggle="modal"
                                            onclick="openViewModal('{{ $role->title }}', '{{ $role->description }}')"
                                            data-target="#modal-xl-view" type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
                                        </button>
                                        <button type="button"
                                            onclick="openEditModal('{{ $role->title }}', '{{ $role->description }}',  '{{ $role->id }}')"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                            <i class="far fa-edit"></i>
                                        </button>

                                        @if ($role->title != 'Admin' && $role->title != 'Staff')
                                            <button type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300 delete-button"
                                            title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                            </button>

                                        @endif

                                    </form>
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
