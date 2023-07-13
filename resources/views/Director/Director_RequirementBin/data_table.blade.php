

        <!-- Main content -->
        <section class="container">
            <div class="mr-5 ml-5">
                <div class="card">
                    <div class="card-header m-2">
                        <h3 class="card-title mt-2">List of Requirement Bin</h3>

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
                                        <option value="Pending">Pending</option>
                                        <option value="In progress">In Progress</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                                <div style="width:20%;">
                                    <select name="sort" id="sort" class="form-control">
                                        <option selected disabled>Sort by</option>
                                        <option value="All">All</option>
                                        <option value="az">Title: A to Z</option>
                                        <option value="za">Title: Z to A</option>
                                        <option value="oldest">Deadline: Oldest to Newest</option>
                                        <option value="newest">Deadline: Newest to Oldest</option>
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
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Starting date</th>
                                    <th class="text-center">Ending date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id='filtered-bins'>
                                @foreach ($requirementbins as $requirementbin)
                                    <tr>
                                        <td class="text-center">{{ $requirementbin->title }}</td>
                                        <td>{{ $requirementbin->start_datetime }}</td>
                                        <td>{{ $requirementbin->end_datetime }}</td>

                                        <td class="text-center">
                                            <button type="button"
                                                class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300
                                                    font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">
                                                {{ $requirementbin->status }}
                                            </button>
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">

                                                    <a href="{{ route('director_bin_content', $requirementbin->id) }}"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300"
                                                        role="button" aria-pressed="true">
                                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                                    </a>

                                                    <a href="{{ route('director_RequirementAssignees', ['bin_id' => $requirementbin->id]) }}"
                                                        role="button" aria-pressed="true"
                                                        class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">

                                                        <i class="far fa-eye"></i>
                                                    </a>

                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                            <tfoot class="text-col-1" style="font-size: .9rem;">
                                <tr>
                                    <td colspan="5">
                                        <div>
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
