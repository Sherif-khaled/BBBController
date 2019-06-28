@extends('layout.app')



@section('content')

    @include('users.models.user_form')
    @include('users.models.details')


    <div class="table-responsive col-md-11">
    <a  href="javascript:void(0)"  class="btn btn-default mb-4" id="createUser">Create</a>

        <table id="users_table" class="table table-striped align-items-center">
        <thead class="table-dark">
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        </thead>

    </table>
</div>
@endsection
<style>
    .table td {
        text-align: center;
    }

    .table th {
        text-align: center;
    }
</style>
