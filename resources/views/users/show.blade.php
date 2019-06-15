@extends('layout.app')



@section('content')

<form id="create_user" name="create_user">
    @csrf
    @include('users.models.create_user')
</form>

<div class="table-responsive">
    <a  href=""  class="btn btn-default mb-4" data-toggle="modal" data-target="#modalCreateForm">Create</a>

    <table id="users_table" class="table table-striped">
        <thead class="table-dark">
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
{{--        <th>Role</th>--}}
        <th>Action</th>
        </thead>
{{--        <tbody>--}}
{{--        @foreach($users as $user)--}}
{{--            <tr>--}}
{{--                <td>{{$user->id}}</td>--}}
{{--                <td>{{$user->name}}</td>--}}
{{--                <td>{{$user->email}}</td>--}}
{{--                <td>test</td>--}}
{{--                <td>--}}
{{--                    <a href="" class="btn btn-info">Profile</a>--}}
{{--                    <a href="" class="btn btn-danger">Delete</a>--}}

{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
    </table>
</div>
@endsection
