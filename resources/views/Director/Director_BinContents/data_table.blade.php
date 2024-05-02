<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">
            {{-- Table header --}}
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="flex-wrap">
                        <b>
                            <h1 class="ml-1 mt-2">Contents of the Requirement Bin
                                [{{ $requirement_bin->title }}]
                            </h1>
                        </b>
                    </div>
                </div>
            </div>
            {{-- Table body --}}

            <div class="card-body p-0">
                <table class="table table-striped"  id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th>Requirement Type</th>
                            <th>Category</th>

                            <th class="text-center" style="width:20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirements as $requirement)
                            <tr>
                                <th scope="row">{{ $requirement->title }}</th>

                                <td>Category Name </td>

                                <td class="text-center">

                                        <button
                                            onclick="openViewModal('{{ $requirement->title }}')"
                                            type="button"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="far fa-eye"></i>
                                        </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>

