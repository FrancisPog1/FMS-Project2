

        <!-- Main content -->
        <section class="container">
            <div class="mr-5 ml-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">List of Requirement Bin</h3>
                        <div class="text-right">

                            <button data-toggle="modal" data-target="#modal-xl-restore" type="button"
                                class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">
                                Restore</button>

                            <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                                class="px-4 py-2 text-sm font-medium text-center text-white pal-1 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300">Create
                                Requirement Bin</button>
                        </div>
                    </div>

                    <!-- Tables of roles -->
                    <div class="card-body p-0">
                        <div>
                        <table class="table table-striped" id="myTable" >
                            <thead class="pal-1 text-col-2">
                                <tr>
                                    <th style="width: ">Title</th>
                                    <th style="width: 18%">Category</th>
                                    <th style="width: 21%">Deadline</th>
                                    <th style="width: 4% "class="text-center">Status</th>
                                    <th style="width: 16%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id='filtered-bins'>
                                @foreach ($requirementbins as $requirementbin)
                                    <tr>
                                        <td>{{ $requirementbin->title }}</td>
                                        <td>{{ $requirementbin->cat_title }}</td>
                                        <td>{{ $requirementbin->deadline }}</td>

                                        <td class="text-center">
                                            @php
                                                // Get today's date
                                                $todayDate = \Carbon\Carbon::now();

                                                // Get deadline date (assuming you have this from your data)
                                                $deadlineDate = \Carbon\Carbon::parse($requirementbin->deadline);

                                                // Calculate difference from today to deadline
                                                $deadlineDiff = $todayDate->diffInDays($deadlineDate);
                                            @endphp


                                            @if ($deadlineDate > $todayDate || $deadlineDiff == 0)
                                                <p><span class="badge badge-info" style="font-size: 1em; padding: 0.4em 0.6em;">Ongoing</span></p>

                                            @else
                                                <p><span class="badge badge-secondary" style="font-size: 1em; padding: 0.4em 0.6em;">Deadline Passed</span></p>
                                            @endif

                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <form method="POST"
                                                    action="{{ route('admin.delete_requirementbins', $requirementbin->id) }}">
                                                    @csrf
                                                    <a href="{{ route('admin.requirementbin_setup.show', $requirementbin->id) }}"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300"
                                                        role="button" aria-pressed="true">
                                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                                    </a>
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <a href="{{ route('admin.requirement_assignees.show', ['bin_id' => $requirementbin->id]) }}"
                                                        role="button" aria-pressed="true"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">

                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-toggle="modal" data-target="#modal-xl-edit-{{$requirementbin->id}}"
                                                        onclick=" editModal('{{ $requirementbin->id }}'), editDescription('#edit-description-{{$requirementbin->id}}')"
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

                                    {{-- EDIT MODAL --}}
                                    @include('Academic_head/AcadHead_Setup/AcadHead_RequirementBin/edit_modal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </section>
<br>
