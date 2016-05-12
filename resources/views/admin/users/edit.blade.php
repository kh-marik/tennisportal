@extends('layouts.admin.app')
@section('content')

    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Users Panel</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/users/'.$user->id, 'method' => 'put']) !!}
                        {!! Form::label('name', 'Users name') !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        <br/>
                        {!! Form::label('is_admin', 'Is user admin?') !!}
                        {!! Form::select('is_admin', array('1' => 'Yep', '0' => 'Nope'), '0') !!}
                        <br/>
                        {!! Form::submit('Update user!') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>

@endsection