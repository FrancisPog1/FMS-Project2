<div class="tab-content">
            <!-- Menu toggle -->
            <ul class="nav nav-tabs justify-content-center" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active"
                        id="custom-content-above-home-tab"
                        data-toggle="pill"
                        href="#custom-content-above-home" role="tab"
                        aria-controls="custom-content-above-home"
                        aria-selected="true"
                        style="color: var(--pallete-1);">Class Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        id="custom-content-above-profile-tab"
                        data-toggle="pill"
                        href="#custom-content-above-profile" role="tab"
                        aria-controls="custom-content-above-profile"
                        aria-selected="false"
                        style="color: var(--pallete-1);">Observation Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        id="custom-content-above-messages-tab"
                        data-toggle="pill"
                        href="#custom-content-above-messages" role="tab"
                        aria-controls="custom-content-above-messages"
                        aria-selected="false"
                        style="color: var(--pallete-1);">Requirement Submission Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        id="custom-content-above-settings-tab"
                        data-toggle="pill"
                        href="#custom-content-above-settings" role="tab"
                        aria-controls="custom-content-above-settings"
                        aria-selected="false"
                        style="color: var(--pallete-1);">Activity Reports</a>
                </li>
            </ul>

            <!-- Table Header -->
            <div class="tab-content">
                <div class="m-3">
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
                            </div>
                            {{-- &nbsp;&nbsp;
                            <div>
                                <button type="button"
                                    class="text-col-1 btn btn-block
                                    btn-warning btn-s p-drop">Pending</button>
                            </div>
                            <div>
                                <button type="button"
                                    class="text-col-1 btn btn-block
                                    btn-danger btn-s p-drop">Cancelled</button>
                            </div>
                            <div>
                                <button type="button"
                                    class="text-col-1 btn btn-block
                                    btn-info btn-s p-drop">Ongoing</button>
                            </div>
                            <div>
                                <button type="button"
                                    class="text-col-1 btn btn-block
                                    btn-success btn-s p-drop">Done</button>
                            </div> --}}
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
