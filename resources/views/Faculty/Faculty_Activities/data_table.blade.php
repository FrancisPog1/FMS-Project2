<!-- Main content -->
<section class="container">
    <div class="mr-5 ml-5">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title mt-2">List of Activities</h3>
                <div class="text-right">
                </div>
            </div>

            <!-- Tables of roles -->
            <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
                    <thead class="pal-1 text-col-2">
                        <tr>
                            <th style="width: 28%;">Title</th>
                            <th style="width: 15%;">Type</th>
                            <th style="width: 12%;">Status</th>
                            <th style="width: 16%;">Date</th>
                            <th class="text-center" style="width: 20%;">Action</th>
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
                                    <button type="button"
                                        class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-2 text-center mr-2 mb-2">{{ $activity->status }}</button>
                                </td>
                                <td>
                                    {{ $activity->start_datetime }} - <br> {{ $activity->end_datetime }}
                                </td>

                                <td class="text-sm-center">

                                        <a href="{{route('faculty.activity_details', $activity->id)}}" data-toggle="modal" data-target="#modal-xl-view-{{$activity->id}}"
                                            class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300 edit-button">
                                            <i class="far fa-eye"></i>
                                        </a>

                                </td>
                            </tr>


                        {{-- VIEW MODAL--}}
                        @include('Faculty/Faculty_Activities/details_modal')

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
