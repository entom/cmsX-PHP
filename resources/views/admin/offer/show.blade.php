@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row navigation-row">
        <div class="col s6">
            <h1>Offer {{ $offer->id }}</h1>
        </div>
        <div class="col s6">
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/offer', $offer->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń Offer',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
            {!! Form::close() !!}

            <a href="{{ url('admin/offer/' . $offer->id . '/edit') }}" class="waves-effect waves-light btn right mr10" title="Edycja Offer"><i class="fa fa-pencil"></i></a>
        </div>
    </div>

    <div class="card card-view">
        <div class="card-content">
            <div class="row">
                <dl>
                    <dt>ID</dt>
                    <dd>{{ $offer->id }}</dd>

                    <tr><th> Title </th><td> {{ $offer->title }} </td></tr><tr><th> Content </th><td> {{ $offer->content }} </td></tr><tr><th> Short Content </th><td> {{ $offer->short_content }} </td></tr>

                </dl>
            </div>
        </div>
    </div>

</div>
@endsection
