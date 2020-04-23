<div class="col-md-5 col-lg-4 col-sm-12">
    <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Carton Info</h4>
    <div class="card bgl-dblack card-same-height">
        <div class="card-body">
            <div class="chart-wrap" style="position: relative; height: 170px;">
                <table class="table table-hover table-dark bgl-dblack" style="vertical-align: middle">
                    <tbody>
                        <tr>
                            <td class="bt0">
                                Carton Completed
                            </td>
                            <td class="bt0">
                                <h5 class="h-20 cl-white badge badge-success mt5" id="cartonCompleted"><span id="completecarton">0</span>/<span id="targetcarton">0</span></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-5 col-lg-4 col-sm-12">
    <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">
        OEE:
    </h4>
    <div class="card bgl-dblack card-same-height">
        <div class="card-body">
            <div class="chart-wrap" style="position: relative; height: 170px;">
                <canvas id="cartonComplCanvas"></canvas>
                <div class="canvas-text-center text-info">
                    <h5><br /><b id="machine-rate-txt">10</b>%</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-5 col-lg-4 col-sm-12">
    <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">
        Production Completion Level
    </h4>
    <div class="card bgl-dblack card-same-height">
        <div class="card-body">
            <div class="chart-wrap" style="position: relative; height: 170px;">
                <canvas id="todayProduction"></canvas>
                <div class="canvas-text-center text-success">
                    <h5><b id="production-rate-txt">10</b>%</h5>
                </div>
            </div>
        </div>
    </div>
</div>