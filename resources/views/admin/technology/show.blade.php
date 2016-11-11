@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row navigation-row">
        <div class="col s6">
            <h1>Technology {{ $technology->id }}</h1>
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

            <a href="{{ url('admin/technology/' . $technology->id . '/edit') }}" class="waves-effect waves-light btn right mr10" title="Edycja Technology"><i class="fa fa-pencil"></i></a>
        </div>
    </div>

    <div class="card card-view">
        <div class="card-content">
            <div class="row">
                <dl>
                    <dt>ID</dt>
                    <dd>{{ $technology->id }}</dd>

                    <tr><th> Title </th><td> {{ $technology->title }} </td></tr><tr><th> Subtitle </th><td> {{ $technology->subtitle }} </td></tr><tr><th> Content </th><td> {{ $technology->content }} </td></tr>

                </dl>
            </div>
        </div>
    </div>

</div>
@endsection
