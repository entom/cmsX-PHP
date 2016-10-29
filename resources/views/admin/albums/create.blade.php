@extends('layouts.admin')

@section('content')

    <div class="col s12">
        <header class="row">
            <div class="col s12">
                <h1>Album</h1>
            </div>
        </header>

        {!! Form::open(['url' => '/admin/albums', 'class' => 'col s12', 'files' => true]) !!}
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#contentTab">Treść</a></li>
                    <li class="tab col s3"><a href="#seoTab">SEO</a></li>
                </ul>
            </div>
            <div id="contentTab" class="col s12">
                <div class="card">
                    <div class="card__header">
                        <span>Treść</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12 m6 {{ $errors->has('title') ? 'has-error' : ''}}">
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                {!! Form::text('title', null, []) !!}
                                {!! Form::label('title', 'Tytuł', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m6 {{ $errors->has('active') ? 'has-error' : ''}}">
                                {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                                {!! Form::select('active', [1 => 'Tak', 0 => 'Nie']) !!}
                                {!! Form::label('active', 'Aktywny', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="file-field input-field col s12 m6 {{ $errors->has('active') ? 'has-error' : ''}}">
                                <div class="btn">
                                    <span>Plik</span>
                                    <input type="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="input-field col s12 m12 {{ $errors->has('content') ? 'has-error' : ''}}">
                                {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                                {!! Form::label('content', 'Treść', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                                {!! Form::textarea('content', null, ['class' => 'editor']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="seoTab" class="col s12">
                <div class="card">
                    <div class="card__header">
                        <span>SEO</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12 m6 {{ $errors->has('meta_title') ? 'has-error' : ''}}">
                                {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
                                {!! Form::text('meta_title', null, []) !!}
                                {!! Form::label('meta_title', 'Tytuł', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m6 {{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
                                {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
                                {!! Form::text('meta_keywords', null, []) !!}
                                {!! Form::label('meta_keywords', 'Słowa kluczowe', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m12 {{ $errors->has('meta_description') ? 'has-error' : ''}}">
                                {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
                                {!! Form::text('meta_description', null, []) !!}
                                {!! Form::label('meta_description', 'Opis', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m12">
            <div class="pt20">
                {!! Form::submit('Zapisz', ['class' => 'waves-effect waves-light btn']) !!}
            </div>
        </div>
        @if ($errors->any())
            <ul class="col s12 alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::close() !!}
    </div>
@endsection