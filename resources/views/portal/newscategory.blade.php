@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">News in category : {{ $newscategory->name }}</div>
                    @if(count($newscategory->news) == 0)
                        <div class="panel-body alert-danger">
                            There is no news in this category
                        </div>
                    @else
                        <ul class="list-group">
                            @foreach($newscategory->news as $record)
                                <li class="list-group-item"><a href="{{ url('/news/'.$record->id) }}">{{ $record->title }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
        </div>
    </div>
@endsection
