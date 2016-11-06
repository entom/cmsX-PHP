@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row navigation-row">
        <div class="col s6">
            <h1>Paralax {{ $paralax->id }}</h1>
        </div>
        <div class="col s6">
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/paralax', $paralax->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń Paralax',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
            {!! Form::close() !!}

            <a href="{{ url('admin/paralax/' . $paralax->id . '/edit') }}" class="waves-effect waves-light btn right mr10" title="Edycja Paralax"><i class="fa fa-pencil"></i></a>
        </div>
    </div>

    <div class="card card-view">
        <div class="card-content">
            <div class="row">
                <dl>
                    <dt>ID</dt>
                    <dd>{{ $paralax->id }}</dd>

                    <tr><th> Title </th><td> {{ $paralax->title }} </td></tr><tr><th> Codename </th><td> {{ $paralax->codename }} </td></tr><tr><th> File </th><td> {{ $paralax->file }} </td></tr>

                </dl>
            </div>
        </div>
    </div>

</div>
@endsection
