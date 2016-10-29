@extends('layouts.default')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m3">
                <h5>Site menu</h5>
            </div>
            <div class="col s12 m9">
                <h1>{{$site->title}}</h1>

                <div class="site-content">
                    {!! $site->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection