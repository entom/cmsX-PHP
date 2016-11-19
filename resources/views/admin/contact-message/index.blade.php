@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <header class="row navigation-row">
            <div class="col s6">
                <h1>Wiadomości</h1>
            </div>
            <div class="col s6">

            </div>
        </header>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card__header">
                        <span>Lista wpisów</span>
                    </div>
                    <div class="card-content">
                        <table class="responsive-table bordered striped highlight">
                            <thead>
                            <tr>
                                <th class="center"> #</th>
                                <th class="center">Status</th>
                                <th> Email</th>
                                <th> Telefon</th>
                                <th> Treść</th>
                                <th> Akcje</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contactmessage as $item)
                                <tr>
                                    <td class="center">{{ $loop->iteration }}</td>
                                    <td class="center">
                                        @if($item->readed == 1)
                                            <span class="new red badge" data-badge-caption="">Przeczytane</span>
                                        @else
                                            <span class="badge new blue" data-badge-caption="">Nowe</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ str_limit($item->content, 64, '...') }}</td>
                                    <td>
                                        @if($item->readed==0)
                                            <a class="waves-effect waves-light btn" href="{{'/admin/contact-message/read/'}}{{$item->id}}"><i class="fa fa-check"></i></a>
                                        @endif
                                        <a href="{{ url('/admin/contact-message/' . $item->id) }}"
                                           class="waves-effect waves-light btn"
                                           title="Zobacz"><i class="fa fa-folder-open"></i></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/contact-message', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'waves-effect waves-light btn',
                                                'title' => 'Usuń wpis',
                                                'onclick'=>'return confirm("Czy na pewno usunąć?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @include('admin.partials.form.pagination', ['items' => $contactmessage])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection