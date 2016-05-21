@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Comments Panel</div>
                    @if(count($comments) == 0)
                        <div class="panel-body alert-danger">
                            There is no comments at all.
                        </div>
                    @else
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Comment</th>
                                    <th>Record</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ $comment->news->title }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td><a href="{{ url("admin/comments/$comment->id/delete") }}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection