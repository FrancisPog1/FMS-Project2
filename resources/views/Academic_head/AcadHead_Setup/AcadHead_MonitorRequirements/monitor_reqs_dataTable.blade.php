<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row-col-sm-6 mb-2">
            <div class="col-md-6 ml-4">
                <h1 class="m-0">Monitor User Requirements</h1>
            </div>
        </div>
    </div>
</div>


<!-- Main content -->
<section class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-3">Requirement Type</th>
                <th scope="col" class="col-5">Notes</th>
                <th scope="col" class="col-3 text-center">Status</th>
                <th scope="col" class="col-1 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <th scope="row">{{ $data->type }}</th>
                    <td>{{ $data->notes }}</td>
                    <td class="text-center ">
                        <button
                            class="px-3 py-2 text-sm font-medium text-center
                            {{ $data->status == 'Pending' ? 'text-white bg-gray-400' : ($data->status == 'Rejected' ? 'text-white bg-red-500' : 'text-white bg-green-500') }}
                             rounded-lg">{{ $data->status }}</button>
                    </td>
                    <td class="text-center">
                        <button type="button"
                            onclick="openValidateModal('{{ $data->status }}', '{{ $data->remarks }}','{{ $data->id }}')"
                            class="px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 ">Validate</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
