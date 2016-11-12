@extends('layouts.admin')

@section('content')

    <script src="/dashboard/js/controllers/photos.js"></script>

    <div class="col s12" ng-controller="PhotosController" ng-init="init({!! $album->id !!})">
        <header class="row">
            <div class="col s12">
                <h1>Album</h1>
            </div>
        </header>

        {!! Form::model($album, ['method' => 'PATCH', 'url' => ['/admin/albums', $album->id], 'class' => 'col s12', 'files' => true]) !!}
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#contentTab">Treść</a></li>
                    <li class="tab col s3"><a href="#seoTab">SEO</a></li>
                    <li class="tab col s3"><a href="#photosTab">Zdjęcia</a></li>
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

            <div id="photosTab" class="col s12">
                <div class="card">
                    <div class="card__header">
                        <span>Zdjęcia</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6">
                                <i class="waves-effect waves-light btn waves-input-wrapper" style="">
                                    <div class="waves-button-input" ng-file-select="saveFiles($files)" multiple="multiple">Wybierz pliki</div>
                                </i>

                                <i ng-show="uploading" class="fa fa-spinner faa-spin animated ajax-loader"></i>
                            </div>
                            <div class="col s6">
                                <span ng-show="uploading" class="badge new blue" data-badge-caption="">[[percentage]]% [[ files[counter].name ]]</span>
                            </div>
                            <div class="col s12">
                                <div class="progress">
                                    <div class="determinate" style="width: [[percentage]]%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m3 s4 photo-preview" ng-repeat="photo in photos">
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" ng-src="/files/thumb/photos/300x300_[[ photo.file ]]">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">[[ photo.title ? photo.title : 'Tytuł' ]]<i class="material-icons right">more_vert</i></span>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">[[ photo.title ? photo.title : 'Tytuł' ]]<i class="material-icons right">close</i></span>
                                        <div class="input-field col s12">
                                            <input ng-model="photo.title" placeholder="Tytuł" id="title[[photo.id]]" type="text" class="validate">
                                            <label for="title[[photo.title]]">Tytuł</label>
                                        </div>

                                        <div class="fixed-action-btn horizontal">
                                            <a class="btn-floating btn-large red">
                                                <i class="large material-icons">mode_edit</i>
                                            </a>
                                            <ul>
                                                <li><a ng-click="removeFile($index, photo)" class="btn-floating red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Usuń"><i class="fa fa-remove"></i></a></li>
                                                <li><a ng-click="updateFile($index, photo)" class="btn-floating blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Zapisz"><i class="fa fa-save"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
