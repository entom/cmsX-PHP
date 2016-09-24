@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Użytkownik {{ $user->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/users', $user->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń użytkownika',
                        'onclick'=>'return confirm("Czy na pewno chcesz usunąć?")'
                ))!!}
                {!! Form::close() !!}
                <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="waves-effect waves-light btn right mr10"
                   title="Edycja użytkownika"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $user->id }}</dd>
                        <dt> Email</dt>
                        <dd> {{ $user->email }} </dd>
                        <dt> Administrator</dt>
                        <dd> {{ $user->admin }} </dd>
                        <dt> Aktywny</dt>
                        <dd> {{ $user->active }} </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
