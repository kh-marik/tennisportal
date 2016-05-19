@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $interview->title }}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-lightbox="{{ $interview->title }}" href="{{ url('images/interviews/'.$interview->picture) }}"><img class="img-responsive" src="{{ url('images/interviews/'.$interview->picture) }}" alt="{{  $interview->title }}"></a>
                            </div>
                            <div class="col-md-9">
                                {!! $interview->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Author: {{ $interview->users->name }} | Published: {{ $interview->created_at }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
        </div>
    </div>
@endsection
