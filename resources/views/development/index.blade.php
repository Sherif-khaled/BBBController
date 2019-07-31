@extends('layout.app')

@section('content')
    {{--    @include('layout.modals.confirm')--}}
    <div class="row col-12 constant">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-roles_permissions-tab" data-toggle="pill"
                   href="#v-pills-roles_permissions"
                   role="tab" aria-controls="v-pills-roles_permissions" aria-selected="true">Roles/Permissions</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-roles_permissions" role="tabpanel"
                     aria-labelledby="v-pills-roles_permissions-tab">
                    @include('development.partial.rolesAndPermissions')
                </div>

            </div>
        </div>
    </div>
@endsection


