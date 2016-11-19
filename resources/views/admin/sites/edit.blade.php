@extends('layouts.admin')

@section('content')

    <div class="col s12">
        <header class="row">
            <div class="col s12">
                <h1>Strony</h1>
            </div>
        </header>

        {!! Form::model($site, ['method' => 'PATCH', 'url' => ['/admin/sites', $site->id], 'class' => 'col s12', 'files' => true]) !!}
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#contentTab">Treść</a></li>
                    @include('admin.partials.seo_tab')
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

                            @include('admin.partials.form.active')

                            <div class="input-field col s12 m12 {{ $errors->has('description') ? 'has-error' : ''}}">
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                {!! Form::label('description', 'Krótka treść', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                                {!! Form::textarea('description', null, ['class' => 'editor']) !!}
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
            @include('admin.partials.seo_tab_content')
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