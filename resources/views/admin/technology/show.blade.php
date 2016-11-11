@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Technologie {{ $technology->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/technology', $technology->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń Technology',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
                {!! Form::close() !!}

                <a href="{{ url('admin/technology/' . $technology->id . '/edit') }}"
                   class="waves-effect waves-light btn right mr10" title="Edycja Technology"><i
                            class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $technology->id }}</dd>

                        <dt> Tytuł</dt>
                        <dd> {{ $technology->title }} </dd>

                        <dt> Podtytuł</dt>
                        <dd> {{ $technology->subtitle }} </dd>

                        <dt> Aktywny</dt>
                        <dd>
                            @if($technology->active == 1)
                                TAK
                            @else
                                NIE
                            @endif
                        </dd>

                        @if ($technology->file != NULL)
                            <dt>Miniaturka</dt>
                            <dd>
                                <img src="/files/thumb/technologies/300x300_{{$technology->file}}" />
                            </dd>
                        @endif

                        <dt> Treść</dt>
                        <dtt> {{ $technology->content }} </dtt>

                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
