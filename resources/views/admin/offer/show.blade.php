@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Oferta {{ $offer->id }}</h1>
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

                <a href="{{ url('admin/offer/' . $offer->id . '/edit') }}"
                   class="waves-effect waves-light btn right mr10" title="Edycja Offer"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $offer->id }}</dd>

                        <dt> Tytuł</dt>
                        <dd> {{ $offer->title }} </dd>

                        <dt> URL</dt>
                        <dd> {{ $offer->url }} </dd>

                        <dt>Aktywne</dt>
                        <dd>
                            @if($offer->active == 1)
                                TAK
                            @else
                                NIE
                            @endif
                        </dd>

                        @if ($offer->file != NULL)
                            <dt>Miniaturka</dt>
                            <dd>
                                <img src="/files/thumb/offers/300x300_{{$offer->file}}" />
                            </dd>
                        @endif

                        <dt> Short Content</dt>
                        <dd> {!! $offer->short_content !!} </dd>

                        <dt> Content</dt>
                        <dd> {!! $offer->content !!} </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
