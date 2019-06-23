<div class="row justify-content-center" style="flex-wrap: unset">
    <div class="card col-md-4 border-dark mb-3" style="margin-right: 20px;height: 150px;width: 250px">
        <div class="card-header">RAM</div>
        <div class="card-body text-dark">

            <div id="ram-total">
                <h5>Total Memory : <small class="text-muted">{{$ram}}</small></h5>

            </div>
            <div id="ram-usage">
                <h5>Memory Usage : <small class="text-muted">2 GB</small></h5>

            </div>


        </div>
    </div>

    <div class="card border-dark mb-3" style="margin-right: 20px;height: 150px;width: 250px">
        <div class="card-header">CPU</div>
        <div class="card-body text-dark">

            <div id="ram-total">
                <h5>TOTAL : <small class="text-muted">8 GB</small></h5>

            </div>
            <div id="ram-usage">
                <h5>USAGE : <small class="text-muted">{{$cpu}}</small></h5>

            </div>


        </div>
    </div>

    <div class="card border-dark mb-3" style="margin-right: 20px;height: 150px;width: 250px">
        <div class="card-header">HDD</div>
        <div class="card-body text-dark">

            <div id="ram-total">
                <h5>TOTAL : <small class="text-muted">8 GB</small></h5>

            </div>
            <div id="ram-usage">
                <h5>USAGE : <small class="text-muted">{{$hdd}}</small></h5>

            </div>

        </div>
    </div>
</div>