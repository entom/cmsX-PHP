@extends('layouts.admin')

@section('content')

    <div class="col s12">
        <header class="row">
            <div class="col s12">
                <h1>Użytkownicy</h1>
            </div>
        </header>

        {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/admin/users', $user->id], 'class' => 'col s12', 'files' => true]) !!}
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#contentTab">Dane</a></li>
                </ul>
            </div>
            <div id="contentTab" class="col s12">
                <div class="card">
                    <div class="card__header">
                        <span>Treść</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12 m6 {{ $errors->has('name') ? 'has-error' : ''}}">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                {!! Form::text('name', null, []) !!}
                                {!! Form::label('name', 'Imię', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m6 {{ $errors->has('email') ? 'has-error' : ''}}">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                {!! Form::text('email', null, []) !!}
                                {!! Form::label('email', 'Email', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m12">
                                {!! Form::checkbox('change_password', null, [], ['id' => 'change_password']) !!}
                                {!! Form::label('change_password', 'Czy zmienić hasło?', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m12 {{ $errors->has('password') ? 'has-error' : ''}}">
                                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                {!! Form::password('password', null, []) !!}
                                {!! Form::label('password', 'Hasło', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m6 {{ $errors->has('active') ? 'has-error' : ''}}">
                                {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                                {!! Form::select('active', [1 => 'Tak', 0 => 'Nie']) !!}
                                {!! Form::label('active', 'Aktywny', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            <div class="input-field col s12 m6 {{ $errors->has('admin') ? 'has-error' : ''}}">
                                {!! $errors->first('admin', '<p class="help-block">:message</p>') !!}
                                {!! Form::select('admin', [1 => 'Tak', 0 => 'Nie']) !!}
                                {!! Form::label('admin', 'Administrator', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m12">
            <div class="pt20">
                {!! Form::submit('Edytuj', ['class' => 'waves-effect waves-light btn']) !!}
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