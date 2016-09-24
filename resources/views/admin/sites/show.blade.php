@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Strona {{ $site->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/sites', $site->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs right',
                        'title' => 'Usuń wpis',
                        'onclick'=>'return confirm("Czy na pewno chcesz usunąć?")'
                ))!!}
                {!! Form::close() !!}
                <a href="{{ url('admin/sites/' . $site->id . '/edit') }}" class="btn btn-primary btn-xs right mr10"
                   title="Edycja wpisu"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $site->id }}</dd>
                        <dt> Tytuł</dt>
                        <dd> {{ $site->title }} </dd>
                        <dt> Treść</dt>
                        <dd> {{ $site->content }} </dd>
                        <dt> Aktywny</dt>
                        <dd> {{ $site->active }} </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
