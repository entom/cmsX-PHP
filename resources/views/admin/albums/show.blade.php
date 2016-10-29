@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Album {{ $album->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/albums', $album->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń Album',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
                {!! Form::close() !!}

                <a href="{{ url('admin/albums/' . $album->id . '/edit') }}"
                   class="waves-effect waves-light btn right mr10" title="Edycja Album"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl class="col s6">
                        <dt>ID</dt>
                        <dd>{{ $album->id }}</dd>

                        <dt> Tytuł</dt>
                        <dd> {{ $album->title }} </dd>

                        <dt> Url</dt>
                        <dd> {{ $album->url }} </dd>

                        <dt>Aktywny</dt>
                        <dd>
                            @if($album->active == 1)
                                TAK
                            @else
                                NIE
                            @endif
                        </dd>

                        @if ($album->file != NULL)
                            <dt>Miniaturka</dt>
                            <dd>
                                <img src="/files/thumb/albums/300x300_{{$album->file}}" />
                            </dd>
                        @endif

                        <dt> Treść</dt>
                        <dd> {{ $album->content }} </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
