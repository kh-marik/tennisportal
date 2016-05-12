@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">News for category: {{ $category->name }}</div>
                    @if(count($category->news) == 0)
                        <div class="panel-body alert-danger">
                            There is no news in this category
                        </div>
                    @else
                        <div class="panel-body">
                            <ol>
                                @foreach($category->news as $news)
                                    <li>{{ $news->title }}</li>
                                @endforeach
                            </ol>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
@endsection