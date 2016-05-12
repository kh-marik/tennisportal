@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $record->title }}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-responsive" src="{{config('portal.uploads') . 'news/' . $record->picture}}" alt="{{  $record->title }}">
                            </div>
                            <div class="col-md-9">
                                {{ $record->body }}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Author: {{ $record->users->name }} | Published: {{ $record->created_at }} | Category:
                        <a href="{{ url('/category/'.$record->newscategories->id) }}">{{ $record->newscategories->name }}</a></div>
                </div>
            </div>
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
        </div>
    </div>
@endsection
