@extends('layout.app')


@section('content')
    @include('records.details');

    <div class="table-responsive">
        <!-- Projects table -->
        <table id="records_table" class="table align-items-center table-flush table-bordered table-striped">
            <caption>List of Published Records:</caption>
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Meeting ID</th>
                <th scope="col">Meeting Name</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Duration</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody style="background-color: white">
            @foreach($records_info as $key => $info)
                <tr>
                    <td>{{++$key}}</td>
                    <td class="test">{{$info['meeting_id']}}</td>
                    <td>{{$info['meeting_name']}}</td>
                    <td>{{$info['start_time']}}</td>
                    <td>{{$info['end_time']}}</td>
                    <td>{{$info['record_duration']}}</td>
                    <td>

                        <a href="#" class="btn btn-primary" data-record-id="{{$key - 1}}" data-toggle="modal" data-target="#detailsModal">Details</a>
                        <a href="#" id="ff" class="btn btn-danger" data-meeting-id="{{$info['meeting_id']}}" data-toggle="modal" data-target="#confirmModal">Delete</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
