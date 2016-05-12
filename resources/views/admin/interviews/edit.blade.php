@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Interview Create Panel</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/interviews/'.$interview->id, 'files' => true, 'method' => 'put','class' => 'form-horizontal']) !!}
                        {!! Form::label('title', 'Title',['class' => 'control-label']) !!}
                        {!! Form::text('title', $interview->title,['class' => 'form-control']) !!}
                        {!! Form::label('description', 'Description',['class' => 'control-label']) !!}
                        {!! Form::text('description', $interview->description,['class' => 'form-control']) !!}
                        {!! Form::label('body', 'Body',['class' => 'control-label']) !!}
                        {!! Form::textarea('body', $interview->body, ['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::hidden('pic', 'present') !!}
                        {!! Form::label('picture', 'Picture',['class' => 'control-label']) !!}
                        {!! Form::file('picture', ['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::submit('Update interview') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
@endsection