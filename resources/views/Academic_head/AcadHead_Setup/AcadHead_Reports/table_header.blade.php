<div class="tab-content">
    <div class="card-header">
        <!-- Date range -->
        <div class="row justify-content-between"
            style="height: 40px;">
            <div class="btn-group btn-group-sm">
                <div>
                    <p class="text-dark pl-3 pr-2 mt-2">Date
                        From:</p>
                </div>&nbsp;&nbsp;
                <div>
                    <input type="date" class="form-control
                        date-range-filter" id="date_from"
                        name="date_from" placeholder="date"
                        tabindex="1" required>
                </div>&nbsp;&nbsp;
                <div>
                    <p class="text-dark pl-3 pr-2 mt-2">Date
                        To: </p>
                </div>&nbsp;&nbsp;
                <div>
                    <input type="date" class="form-control
                        date-range-filter" id="date_to"
                        name="date_to" placeholder="date"
                        tabindex="1" required>
                </div>
                <div>
                    <button id="btnDateReset" type="button"
                        class="text-col-1 btn btn-secondary
                        btn-s p-drop ml-2 mb-5 pr-3 mt-1">Reset</button>
                </div>
            </div>

            <div class="btn-group btn-group-sm">
                <div>
                    <p class="text-dark pl-3 pr-2 mt-2">Status
                        Filter:</p>
                </div>&nbsp;&nbsp;


                <div class="btn-group btn-group-sm">
                            <div>
                                <button data-toggle="modal"
                                        data-target="#modal-xl-view" type="button"
                                        class="px-2 py-2 text-sm text-center rounded-lg text-yellow focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                        <i class="fa-solid fa-exclamation"></i>
                                </button>
                            </div>
                            <div>
                                <button data-toggle="modal"
                                        data-target="#modal-xl-edit" type="button"
                                        class="px-2 py-2 text-sm text-center rounded-lg text-red focus:ring-4 focus:outline-none focus:ring-red-300">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                </button>
                            </div>
                            <div>
                                <button type="button"
                                        class="px-2 py-2 text-sm text-center rounded-lg text-blue focus:ring-4 focus:outline-none focus:ring-blue-300"
                                        title="">
                                        <i class="fa-regular fa-flag"></i>
                                </button>
                            </div>
                            <div>
                                <button data-toggle="modal"
                                        data-target="#modal-xl-view" type="button"
                                        class="px-2 py-2 text-sm text-center rounded-lg text-green focus:ring-4 focus:outline-none focus:ring-green-300">
                                        <i class="fa-solid fa-check"></i>
                                </button>
                            </div>

                        </div>
            </div>
        </div>
    </div>
</div>

<style>
#card-body-1 {
    padding: 0.1rem;
    margin-left: 10px;
}
</style>
