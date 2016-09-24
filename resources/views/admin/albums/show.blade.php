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

            <a href="{{ url('admin/albums/' . $album->id . '/edit') }}" class="waves-effect waves-light btn right mr10" title="Edycja Album"><i class="fa fa-pencil"></i></a>
        </div>
    </div>

    <div class="card card-view">
        <div class="card-content">
            <div class="row">
                <dl>
                    <dt>ID</dt>
                    <dd>{{ $album->id }}</dd>

                    <tr><th> Title </th><td> {{ $album->title }} </td></tr><tr><th> Url </th><td> {{ $album->url }} </td></tr><tr><th> Content </th><td> {{ $album->content }} </td></tr>

                </dl>
            </div>
        </div>
    </div>

</div>
@endsection
