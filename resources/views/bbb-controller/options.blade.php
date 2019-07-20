@extends('layout.app')



@section('content')

    <div class="row col-12 constant">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-branding-tab" data-toggle="pill" href="#v-pills-branding"
                   role="tab" aria-controls="v-pills-branding" aria-selected="true">Branding</a>
                <a class="nav-link" id="v-pills-server-tab" data-toggle="pill" href="#v-pills-server" role="tab"
                   aria-controls="v-pills-server" aria-selected="false">Server</a>
                <a class="nav-link" id="v-pills-notifications-tab" data-toggle="pill" href="#v-pills-notifications"
                   role="tab" aria-controls="v-pills-notifications" aria-selected="false">Notifications</a>
                <a class="nav-link" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab"
                   aria-controls="v-pills-general" aria-selected="false">General Settings</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-branding" role="tabpanel"
                     aria-labelledby="v-pills-branding-tab">
                    @include('bbb-controller.partial.branding')
                </div>
                <div class="tab-pane fade" id="v-pills-server" role="tabpanel" aria-labelledby="v-pills-server-tab">
                    @include('bbb-controller.partial.server')
                </div>
                <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel"
                     aria-labelledby="v-pills-notifications-tab">...
                </div>
                <div class="tab-pane fade" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                    @include('bbb-controller.partial.general')
                </div>
            </div>
        </div>
    </div>




@endsection