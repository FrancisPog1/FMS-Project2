

        <!-- Main content -->
        <section class="container">
            <div class="mr-5 ml-5">
                <div class="card">
                    <div class="card-header m-2">
                        <h3 class="card-title mt-2">List of Requirement Bin</h3>

                    </div>
                    <!-- Tables of roles -->
                    <div class="card-body p-0">
                        <table class="table table-striped" id="myTable">
                            <thead class="pal-1 text-col-2">
                                <tr>
                                    <th>Title</th>
                                    <th>Deadline</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id='filtered-bins'>
                                @foreach ($requirementbins as $requirementbin)
                                    <tr>
                                        <td>{{ $requirementbin->title }}</td>
                                        <td>{{ $requirementbin->deadline }}</td>

                                        <td class="text-center">
                                            <button type="button"
                                                class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300
                                                    font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">
                                                {{ $requirementbin->status }}
                                            </button>
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">

                                                    <a href="{{ route('director.requirementbin_content', $requirementbin->id) }}"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300"
                                                        role="button" aria-pressed="true">
                                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                                    </a>

                                                    <a href="{{ route('director.requirement_assignees', ['bin_id' => $requirementbin->id]) }}"
                                                        role="button" aria-pressed="true"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                        <i class="far fa-eye"></i>
                                                    </a>

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
