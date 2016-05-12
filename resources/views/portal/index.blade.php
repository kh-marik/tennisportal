@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Man Tennis news</div>
                        {{--<div class="panel-body">--}}
                        {{--</div>--}}
                        <ul class="list-group">
                            @foreach($mannews as $record)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ url('/news/'.$record->id) }}">
                                                <img class="media-object img-responsive img-thumbnail center-block" style="max-width:64px"; src="{{config('portal.uploads') . 'news/' . $record->picture}}" alt="{{  $record->title }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="{{ url('/news/'.$record->id) }}">{{ $record->title }}</a></h5    >
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Woman Tennis news</div>
                        {{--<div class="panel-body">--}}
                        {{--</div>--}}
                        <ul class="list-group">
                            @foreach($womannews as $record)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ url('/news/'.$record->id) }}">
                                                <img class="media-object img-responsive img-thumbnail center-block" style="max-width:64px"; src="{{config('portal.uploads') . 'news/' . $record->picture}}" alt="{{  $record->title }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="{{ url('/news/'.$record->id) }}">{{ $record->title }}</a></h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Interviews</div>
                        {{--<div class="panel-body">--}}
                        {{--</div>--}}
                        <ul class="list-group">
                            @foreach($interviews as $interview)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ url('/interview/'.$interview->id) }}">
                                                <img class="media-object img-responsive img-thumbnail pull-left" style="max-width: 64px;" src="{{config('portal.uploads') . 'interviews/' . $interview->picture}}" alt="{{  $record->title }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="{{ url('/interview/'.$interview->id) }}">{{ $interview->title }}</a></h5>
                                        </div>
</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
