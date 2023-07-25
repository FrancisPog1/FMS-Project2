        <!-- Main content -->
        <section class="container">
            <div class="mr-5 ml-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">List of Requirement Type</h3>
                        <div class="text-right">
                            <button data-toggle="modal" data-target="#modal-xl-restore" type="button"
                                class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">
                                Restore</button>

                            <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">Create
                                New Requirement Type</button>
                        </div>
                    </div>

                    <!-- Tables of roles -->
                    <div class="card-body p-0">
                        <table class="table table-striped"  id="myTable">
                            <thead class="pal-1 text-col-2">
                                <tr>
                                    <th>Title</th>
                                    <th style="width: 42%;">Description</th>
                                    <th >Category</th>
                                    <th class="text-center" style="width: 25%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="filtered-types">
                                @foreach ($requirement_types as $requirement_type)
                                    <tr>
                                        <td>{{ $requirement_type->title }}</td>
                                        <td>{{ $requirement_type->description }}</td>
                                        <td>   </td>
                                        <td class="text-center">
                                            <form method="POST"
                                                action="{{ route('admin.delete_requirementtypes', $requirement_type->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">

                                                <button data-toggle="modal"
                                                    onclick="openViewModal('{{ $requirement_type->title }}', '{{ $requirement_type->description }}')"
                                                    data-target="#modal-xl-view" type="button"
                                                    class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                <button type="button"
                                                    onclick="openEditModal('{{ $requirement_type->title }}', '{{ $requirement_type->description }}',  '{{ $requirement_type->id }}')"
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
                        </table>
                    </div>
                </div>
            </div>
        </section>
<br>
