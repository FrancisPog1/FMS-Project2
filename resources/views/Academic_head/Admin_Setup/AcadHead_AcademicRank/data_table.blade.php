 <!-- Main content -->
 <section class="container">
     <div class="mr-5 ml-5">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title mt-2">List of Ranks</h3>
                 <div class="text-right">
                     <button data-toggle="modal" data-target="#modal-xl-restore" type="button"
                         class="px-4 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300">
                         Restore</button>

                     <button data-toggle="modal" data-target="#modal-xl-create" type="button"
                         class="px-4 py-2 text-sm font-medium text-center text-white bg-green-800 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">Create
                         New Rank</button>
                 </div>
             </div>

            {{-- CODE FOR THE FILTERING --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-title ml-4 mt-1 row-cols-2" style="font-size: .95rem;">Show entries</p>
                        <select name="dataTable_length" aria-controls="dataTable"
                            class="ml-5 col-1 custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div>
                            <select name="sort" id="sort" class="form-control">
                                <option selected disabled>Sort by</option>
                                <option value="az">Title: A to Z</option>
                                <option value="za">Title: Z to A</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


             <!-- Tables of Ranks -->
             <div class="card-body p-0">
                 <table class="table table-striped">
                     <thead class="pal-1 text-col-2">
                         <tr>
                             <th>Title</th>
                             <th style="width: 50%;">Description</th>
                             <th class="text-center" style="width: 25%;">Actions</th>
                         </tr>
                     </thead>
                     <tbody id="filtered-ranks">
                         @foreach ($acadranks as $acadrank)
                             <tr>
                                 <td>{{ $acadrank->title }}</td>
                                 <td>{{ $acadrank->description }}</td>
                                 <td class="text-center">
                                     <form method="POST" action="{{ route('delete_ranks', $acadrank->id) }}">
                                         @csrf
                                         <input name="_method" type="hidden" value="DELETE">

                                         <button data-toggle="modal"
                                             onclick="openViewModal('{{ $acadrank->title }}', '{{ $acadrank->description }}')"
                                             data-target="#modal-xl-view" type="button"
                                             class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                             <i class="far fa-eye"></i>
                                         </button>
                                         <button type="button"
                                             onclick="openEditModal('{{ $acadrank->title }}', '{{ $acadrank->description }}',  '{{ $acadrank->id }}')"
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
                             <td>
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
