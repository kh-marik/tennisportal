@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @foreach($interviews as $interview)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $interview->title }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-responsive" src="{{config('portal.uploads') . 'interviews/' . $interview->picture}}" alt="{{  $interview->title }}">
                                </div>
                                <div class="col-md-9">
                                    {!! mb_substr($interview->body, 0, 255) !!} ...
                                    <a href="{{ url('/interview/'.$interview->id) }}">Read more...</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            Author: {{ $interview->users->name }} | Published: {{ $interview->created_at }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
            <div class="row text-center">
                <div class="col-md-9">
                    {!! $interviews->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
