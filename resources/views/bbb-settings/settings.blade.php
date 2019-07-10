@extends('layout.app')



@section('content')



    <div class="row col-12 constant">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-bigbluebutton-tab" data-toggle="pill"
                   href="#v-pills-bigbluebutton"
                   role="tab" aria-controls="v-pills-bigbluebutton" aria-selected="true">Bigbluebutton</a>
                <a class="nav-link" id="v-pills-html5-tab" data-toggle="pill" href="#v-pills-html5" role="tab"
                   aria-controls="v-pills-html5" aria-selected="false">HTML5</a>
                <a class="nav-link" id="v-pills-records-tab" data-toggle="pill" href="#v-pills-records"
                   role="tab" aria-controls="v-pills-records" aria-selected="false">Records</a>
                <a class="nav-link" id="v-pills-advanced-tab" data-toggle="pill" href="#v-pills-advanced" role="tab"
                   aria-controls="v-pills-advanced" aria-selected="false">Advanced Settings</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-bigbluebutton" role="tabpanel"
                     aria-labelledby="v-pills-bigbluebutton-tab">
                    @include('bbb-settings.partial.bigbluebutton')
                </div>
                <div class="tab-pane fade" id="v-pills-html5" role="tabpanel" aria-labelledby="v-pills-html5-tab">
                    {{--                    @include('bbb-controller.partial.server')--}}
                </div>
                <div class="tab-pane fade" id="v-pills-records" role="tabpanel"
                     aria-labelledby="v-pills-records-tab">...
                </div>
                <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab">
                    {{--                    @include('bbb-controller.partial.general')--}}
                </div>
            </div>
        </div>
    </div>




@endsection