@extends('layouts.admin.app')
@section('content')

    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">News Categories Panel</div>
                    @if(count($newscategories) == 0)
                        <div class="panel-body alert-danger">
                            There is no categories, do you want to add
                            <a href="{{url('/admin/newscategories/create')}}">New category</a>?
                        </div>
                    @else
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newscategories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <a href="{{ url('admin/newscategories/'.$category->id) }}">{{ $category->name }}</a>
                                            <span class="badge">{{ count($category->news) }}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-default" href="{{ url('/admin/newscategories/'. $category->id .'/edit') }}">Edit</a>
                                        </td>
                                        <td>
                                            {{ Form::open(['url' => 'admin/newscategories/'.$category->id, 'method' => 'delete']) }}
                                            {!! Form::submit('Delete category!', ["class" => "btn btn-default"]) !!}
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