<div class="tab-pane fade"
id="custom-content-above-settings" role="tabpanel"
aria-labelledby="custom-content-above-settings-tab">
<!-- Activity Reports -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="dt-buttons btn-group flex-wrap">
                        <a href="{{ route('admin.activities_export_pdf') }}"
                            tabindex="0"
                            aria-controls="dataTable" type="button"
                            class="text-col-1 buttons-pdf
                            buttons-html5 btn btn-primary mr-2"
                            title="PDF export.">
                            <span>Export as PDF</span>
                        </a>
                        <a href = "{{ route('admin.activities_export_xls') }}"
                            tabindex="0"
                            aria-controls="dataTable" type="button"
                            class="text-col-1 buttons-excel
                            buttons-html5 btn btn-success"
                            title="Excel export.">
                            <span>Export as XLS</span>
                         </a>
                    </div>
                    <!-- Search function --->
                    <div class="text-right">
                        <div class="form-inline float-right">
                            <div class="input-group"
                                data-widget="sidebar-search">
                                <input class="form-control
                                    form-control-sidebar px-4 py-2
                                    text-sm font-medium"
                                    type="search"
                                    placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                        <i class="fas fa-search
                                            fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style="width: 28%;">Title</th>
                            <th style="width: 15%;">Type</th>
                            <th style="width: 16%;">Dates</th>
                            <th style="width: 5%;">Status</th>
                            <th class="text-center" style="width: 5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>
                                    {{ $activity->title }}
                                </td>
                                <td>
                                    {{ $activity->type_title }}
                                </td>
                                <td>
                                    {{ $activity->start_datetime }} - <br> {{ $activity->end_datetime }}
                                </td>

                                <td>
                                    <button type="button"
                                        class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">{{ $activity->status }}</button>
                                </td>
                                <td class="text-sm-center">

                                        <a href="{{ route('admin.activity_participants_reports', $activity->id)}}"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
                                        </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                        <tfoot>
                            <td class="dataTables_info text-col-1"
                                id="dataTable_info" role="status"
                                aria-live="polite" colspan="12"
                                style="font-size: .9rem;">
                                Showing x to x of x entries
                            </td>
                        </tfoot>

                    </table>
                </div>
            </div>
    </div>
</section>
</div>