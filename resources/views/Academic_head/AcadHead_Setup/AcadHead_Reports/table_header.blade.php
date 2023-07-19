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
