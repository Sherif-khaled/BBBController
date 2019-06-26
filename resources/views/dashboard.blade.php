@extends('layout.app')

@section('content')

    <div class="row">
        @include('server.partial.hardware_activity')
    </div>
    <div class="row">
        <div class="card-group">
{{--            @include('server.partial.server_information')--}}


            @include('server.partial.service_status')

        </div>



    </div>




@endsection