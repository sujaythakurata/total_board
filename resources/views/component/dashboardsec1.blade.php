<div class="col-sm-12">
    <ul class="list-group comman-list-group no-default-space-clg list-group-horizontal">
        <li class="list-group-item bgl-dblack dash-large-box">
            <table class="stage-table">
                <thead>
                    <tr>
                        <td colspan="2">
                            Target(Cartons)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bottles
                            <h6 class="h-32 cl-green" id='tgb'>0</h6>
                        </td>
                        <td>
                            Cartons
                            <h6 class="h-32 cl-green" id='tgc'>0</h6>
                        </td>
                    </tr>
                </thead>
            </table>
        </li>
        <li class="list-group-item bgl-dblack dash-large-box">
            <table class="stage-table">
                <thead>
                    <tr>
                        <td colspan="2">
                            Produced Quantity
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bottles
                            <h5 class="h-32 cl-green" id="producedQtyB">0</h5>
                        </td>
                        <td>
                            Cartons
                            <h5 class="h-32 cl-green" id="producedQty">0</h5>
                        </td>
                    </tr>
                </thead>
            </table>
        </li>
        <li class="list-group-item bgl-dblack dash-large-box">
            <table class="stage-table">
                <thead>
                    <tr>
                        <td colspan="2">
                            Shift Production
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bottles
                            <h5 class="h-32 cl-green" id="shiftProductionB">0</h5>
                        </td>
                        <td>
                            Cartons
                            <h5 class="h-32 cl-green" id="shiftProduction">0</h5>
                        </td>
                    </tr>
                </thead>
            </table>
        </li>
        <li class="list-group-item bgl-dblack dash-small-box">
            <p class="h-16 cl-green">Batch Start<br>Time</p>
            <h5 class="h-20 cl-white badge badge-success mt5" id="batchStartTime">00:00:00</h5>
        </li>
        <li class="list-group-item bgl-dblack dash-small-box">
            <p class="h-16 cl-red">Shift Downtime<br>duration</p>
            <h5 class="h-20 cl-white badge badge-danger mt5" id="shiftDownTime">00:00:00</h5>
        </li>
        <li class="list-group-item bgl-dblack dash-small-box">
            <p class="h-16 cl-white">Time<br><br></p>
            <h5 class="h-20 cl-white badge badge-info mt5" id="currentTime">00:00:00</h5>
        </li>
        <li class="list-group-item bgl-dblack dash-small-box">
            <p class="h-16 cl-white">Shift</p>
            <div class="comman-btn-group btn-group btn-group-sm btn-group-toggle mt5">
                <label class="btn btn-light enb" >
                    <input type="radio" disabled name="selectedShift" value="1" autocomplete="off" checked>1
                </label>
                <label class="btn btn-light enb" >
                    <input type="radio" disabled name="selectedShift" value="2" autocomplete="off">2
                </label>
                <label class="btn btn-light enb" >
                    <input type="radio" disabled name="selectedShift" value="3" autocomplete="off">3
                </label>
            </div>
        </li>
    </ul>
</div>