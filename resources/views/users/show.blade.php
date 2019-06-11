@extends('layout.app')



@section('content')

<a href=""  class="btn btn-default mb-4" data-toggle="modal" data-target="#modalCreateForm">Create</a>

<form id="create_user" method="POST" action="{{route('user.store')}}">
    @csrf
    @include('users.models.create_user')
</form>

<div class="table-responsive">

    <table class="table table-striped">
        <thead class="table-dark">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>test</td>
                <td>
                    <a href="" class="btn btn-info">Profile</a>
                    <a href="" class="btn btn-danger">Delete</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')

@endsection