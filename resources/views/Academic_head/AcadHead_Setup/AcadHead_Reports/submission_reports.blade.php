
    <section class="container">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mt-2">List of Requirement Bins</h3>
                    <div class="text-right">
                        <div class="dt-buttons btn-group flex-wrap text-right">
                            <a href = "{{ route('admin.requirementbins_export_pdf') }}"
                                tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-pdf
                                buttons-html5 btn btn-primary mr-2"
                                title="PDF export.">
                                <span>Export as PDF</span>
                            </a>
                            <a href="{{ route('admin.requirementbins_export') }}"
                                tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-excel
                                buttons-html5 btn btn-success"
                                title="Excel export.">
                                <span>Export as XLS</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tables of roles -->
                <div class="card-body p-0">
                    <table class="table table-striped"  id="myTable">
                        <thead class="pal-1 text-col-2">
                            <tr>
                                <th>Title</th>
                                <th>Deadline</th>
                                <th>Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody id='filtered-bins'>
                            @foreach ($requirementbins as $requirementbin)
                                <tr>
                                    <td>{{ $requirementbin->title }}</td>
                                    <td>{{ $requirementbin->deadline }}</td>
                                    <td>Category Name</td>

                                    <td class="text-center">
                                        <button type="button"
                                            class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300
                                                font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">
                                            {{ $requirementbin->status }}
                                        </button>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group">

                                                <a href="{{ route('admin.bin_content_reports', $requirementbin->id) }}"
                                                    class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300"
                                                    role="button" aria-pressed="true">
                                                    <i class="fa fa-window-restore" aria-hidden="true"></i>
                                                </a>

                                                <a href="{{ route('admin.requirement_assignees_reports', ['bin_id' => $requirementbin->id]) }}"
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

