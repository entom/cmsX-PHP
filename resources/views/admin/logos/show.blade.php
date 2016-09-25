@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Logotypy {{ $logo->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/logos', $logo->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń Logo',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
                {!! Form::close() !!}

                <a href="{{ url('admin/logos/' . $logo->id . '/edit') }}"
                   class="waves-effect waves-light btn right mr10" title="Edycja Logo"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $logo->id }}</dd>

                        <dt> Title</dt>
                        <dd> {{ $logo->title }} </dd>

                        <dt> Link</dt>
                        <dd> {{ $logo->link }} </dd>

                        <dt> Active</dt>
                        <dd> {{ $logo->active }} </dd>

                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
