@extends('layout.app')



@section('content')

    <a href="{{route('user.create')}}" class="btn btn-primary" style="margin-bottom: 20px;color: white">Create User</a>

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