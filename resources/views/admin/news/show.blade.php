@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Aktualność {{ $news->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/news', $news->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń wpis',
                        'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
                {!! Form::close() !!}
                <a href="{{ url('admin/news/' . $news->id . '/edit') }}" class="mr10 waves-effect waves-light btn right"
                   title="Edycja wpisu"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $news->id }}</dd>
                        <dt> Tytuł</dt>
                        <dd> {{ $news->title }} </dd>
                        <dt> Url</dt>
                        <dd> {{ $news->url }} </dd>
                        <dt> Treść</dt>
                        <dd> {{ $news->content }} </dd>
                        <dt> Aktywny</dt>
                        <dd> {{ $news->active }} </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
