@extends('layout.app')



@section('content')

    @include('users.models.user_form')
    @include('users.models.details')


<div class="table-responsive" style="width: 1000px">
{{--    <a  href=""  class="btn btn-default mb-4" data-toggle="modal" data-target="#modalCreateForm">Create</a>--}}
    <a  href="javascript:void(0)"  class="btn btn-default mb-4" id="createUser">Create</a>

    <table id="users_table" class="table table-striped" style="text-align: center">
        <thead class="table-dark">
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        </thead>

    </table>
</div>
@endsection
