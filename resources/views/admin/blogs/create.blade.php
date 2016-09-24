@extends('layouts.admin')

@section('content')

    <div class="col s12">
        <header class="row">
            <div class="col s12">
                <h1>Blog</h1>
            </div>
        </header>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card__header">
                        <span>Nowy wpis</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            {!! Form::open(['url' => '/admin/blogs', 'class' => 'col s12', 'files' => true]) !!}
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

                                <div class="input-field col s12 m12 {{ $errors->has('content') ? 'has-error' : ''}}">
                                    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                                    {!! Form::label('content', 'Treść', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                                    {!! Form::textarea('content', null, ['class' => 'editor']) !!}
                                </div>

                                <div class="col s12 m12">
                                    <div class="pt20">
                                        {!! Form::submit('Zapisz', ['class' => 'btn btn-primary']) !!}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection