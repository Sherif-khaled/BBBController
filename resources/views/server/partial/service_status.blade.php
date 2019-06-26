<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h4 class="mb-0 text-muted">
                Services Status
            </h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Enabled</th>
                    <th>Current State</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->interface_name}}</td>
                        <td>{{$service->enable == 1 ? 'True' : 'False'}}</td>
                        <td>{{$service->current_status}}</td>
                        <td>
                            <input class="enbchk" id="{{$service->id}}" name="enable" {{$service->enable == 1 ? 'checked' : '' }} data-id="{{$service->id}}" type="checkbox" data-toggle="toggle" data-size="mini" data-style="ios" data-onstyle="success" data-offstyle="danger">

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
</style>

