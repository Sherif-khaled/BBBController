@extends('layout.app')



@section('content')


<div class="row w-100 d-flex justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                Branding Settings
            </div>
            <div class="card-body">
                @include('bbb-controller.partial.branding')

            </div>
        </div>
    </div>
</div>


<div class="row w-100 d-flex justify-content-center" style="margin-top: 20px;">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                General Settings
            </div>
            <div class="card-body">
                @include('bbb-controller.partial.general')
            </div>
        </div>
    </div>
</div>



@endsection