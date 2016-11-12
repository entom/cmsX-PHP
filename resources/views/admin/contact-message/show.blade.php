@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Wiadomości {{ $contactmessage->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/contactmessage', $contactmessage->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń ContactMessage',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
                {!! Form::close() !!}
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $contactmessage->id }}</dd>

                        <dt> Nazwa</dt>
                        <dd> {{ $contactmessage->name }} </dd>

                        <dt> Email</dt>
                        <dd> {{ $contactmessage->email }} </dd>

                        <dt> Telefon</dt>
                        <dd> {{ $contactmessage->phone }} </dd>

                        <dt> Firma</dt>
                        <dd> {{ $contactmessage->company }} </dd>

                        <th> Tytuł</th>
                        <td> {{ $contactmessage->title }} </td>

                        <th> Treść</th>
                        <td> {{ $contactmessage->content }} </td>

                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
