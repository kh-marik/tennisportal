@extends('layouts.admin.app')
@section('content')

    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Category Panel</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/newscategories/'.$category->id, 'method' => 'put']) !!}
                        {!! Form::label('name', 'Category name') !!}
                        {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit('Update category', ["class" => "btn btn-default"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>

@endsection