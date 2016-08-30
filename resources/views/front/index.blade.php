@extends('layouts.default')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m3">
                <h5>Brands</h5>
                <ul>
                    @foreach($brands as $brand)
                        <li>{{$brand->name}}</li>
                    @endforeach
                </ul>
                <h5>Categories</h5>
                <ul>
                    @foreach($categories as $category)
                        <li>{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col s12 m9">
                <h1>{{$title}}</h1>
            </div>
        </div>
    </div>
@endsection