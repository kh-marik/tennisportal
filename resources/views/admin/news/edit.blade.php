@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">News Edit Panel</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/news/'.$record->id, 'files' => true, 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::label('title', 'Title',['class' => 'control-label']) !!}
                        {!! Form::text('title', $record->title,['class' => 'form-control']) !!}
                        {!! Form::label('description', 'Description',['class' => 'control-label']) !!}
                        {!! Form::text('description', $record->description,['class' => 'form-control']) !!}
                        {!! Form::label('body', 'Body',['class' => 'control-label']) !!}
                        {!! Form::textarea('body', $record->body,['class' => 'form-control']) !!}
                        <br>
                        {!! Form::label('newscategory_id', 'News category',['class' => 'control-label']) !!}
                        {!! Form::select('newscategory_id', $cats) !!}
                        <br><br>
                        {!! Form::label('sex', 'News subcategory',['class' => 'control-label']) !!}
                        {!! Form::select('sex', ['male' => 'Male', 'female' => 'Female'], $record->sex) !!}
                        <br><br>
                        {!! Form::hidden('pic', 'present') !!}
                        {!! Form::label('picture', 'Picture',['class' => 'control-label']) !!}
                        {!! Form::file('picture', ['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::submit('Update record') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
@endsection