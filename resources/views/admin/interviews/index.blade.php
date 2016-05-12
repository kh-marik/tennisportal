@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Interviews Panel</div>
                    @if(count($interviews) == 0)
                        <div class="panel-body alert-danger">
                            There is no news, do you want to add <a href="{{url('/admin/interviews/create ')}}">New interview</a>?
                        </div>
                    @else
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created At</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($interviews as $interview)
                                    <tr>
                                        <td>{{ $interview->id }}</td>
                                        <td>
                                            <a href="{{ url('admin/interviews/'.$interview->id) }}">{{ $interview->title }}</a>
                                        </td>
                                        <td>
                                            {{ $interview->users->name }}
                                        </td>
                                        <td>{{ $interview->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/admin/interviews/'. $interview->id .'/edit') }}">Edit</a>
                                        </td>
                                        <td>
                                            {{ Form::open(['url' => 'admin/interviews/'.$interview->id, 'method' => 'delete']) }}
                                            {!! Form::submit('Delete record') !!}
                                            {{ Form::close() }}
                                        </td>
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