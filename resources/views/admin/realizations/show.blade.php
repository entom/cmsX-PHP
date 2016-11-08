@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row navigation-row">
        <div class="col s6">
            <h1>Realization {{ $realization->id }}</h1>
        </div>
        <div class="col s6">
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/realizations', $realization->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń Realization',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
            {!! Form::close() !!}

            <a href="{{ url('admin/realizations/' . $realization->id . '/edit') }}" class="waves-effect waves-light btn right mr10" title="Edycja Realization"><i class="fa fa-pencil"></i></a>
        </div>
    </div>

    <div class="card card-view">
        <div class="card-content">
            <div class="row">
                <dl>
                    <dt>ID</dt>
                    <dd>{{ $realization->id }}</dd>

                    <tr><th> Title </th><td> {{ $realization->title }} </td></tr><tr><th> Content </th><td> {{ $realization->content }} </td></tr>

                </dl>
            </div>
        </div>
    </div>

</div>
@endsection
