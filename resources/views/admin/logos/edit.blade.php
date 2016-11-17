@extends('layouts.admin')

@section('content')

    <div class="col s12">
        <header class="row">
            <div class="col s12">
                <h1>Logotypy</h1>
            </div>
        </header>

        {!! Form::model($logo, ['method' => 'PATCH', 'url' => ['/admin/logos', $logo->id], 'class' => 'col s12', 'files' => true]) !!}
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#contentTab">Treść</a></li>
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
                                {!! Form::label('title', 'Tytuł', ['class' => 'col-sm-3 control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="input-field col s12 m6 {{ $errors->has('link') ? 'has-error' : ''}}">
                                {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                                {!! Form::label('link', 'Link', ['class' => 'col-sm-3 control-label']) !!}
                                {!! Form::text('link', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="input-field col s12 m6 {{ $errors->has('active') ? 'has-error' : ''}}">
                                {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                                {!! Form::select('active', [1 => 'Tak', 0 => 'Nie']) !!}
                                {!! Form::label('active', 'Aktywny', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                            </div>

                            @include('admin.partials.form.file')

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