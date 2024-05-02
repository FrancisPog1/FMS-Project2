
<!-- DATA TABLE -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card" >

            <div class="card-header">
                <h3 class="card-title mt-2">List of Participants</h3>
                <div class="text-right">

                        <div class="dt-buttons btn-group flex-wrap">
                            <button tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-pdf
                                buttons-html5 btn btn-primary mr-2"
                                title="PDF export.">
                                <span>Export as PDF</span>
                            </button>
                            <button tabindex="0"
                                aria-controls="dataTable" type="button"
                                class="text-col-1 buttons-excel
                                buttons-html5 btn btn-success"
                                title="Excel export.">
                                <span>Export as XLS</span>
                            </button>
                        </div>
                </div>
            </div>

            <!-- Tables of roles -->
            <div class="card-body p-0" >
                <table class="table table-striped" id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style="width: 25%;">Name</th>
                            <th style="width: 18%;">Email</th>
                            <th style="width: 5%;">Role</th>
                            <th style="width: 5%;" class="text-center">Status</th>
                            {{-- <th class="text-center" style="width: 20%;">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr>

                                <td>
                                    {{ $participant->first_name }} {{ $participant->last_name }}
                                </td>

                                <td>
                                    {{ $participant->email }}
                                </td>

                                <td>
                                    {{ $participant->role }}
                                </td>

                                <td class="text-sm-center">
                                        <button type="button"
                                            class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">Status</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
