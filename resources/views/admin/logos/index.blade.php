@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <header class="row navigation-row">
            <div class="col s6">
                <h1>Logotypy</h1>
            </div>
            <div class="col s6">
                <a href="{{ url('/admin/logos/create') }}" class="waves-effect waves-light btn right"
                   title="Dodaj nowy wpis"><i class="fa fa-plus"></i></a>
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
                                <th class="center"></th>
                                <th class="center"> #</th>
                                <th> Title</th>
                                <th> Link</th>
                                <th class="center"> Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="sortable" data-entityname="logos">
                            @foreach($logos as $item)
                                <tr data-itemId="{{ $item->id }}">
                                    <td class="center sortable-handle"><span class="fa fa-sort"></span></td>
                                    <td class="center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td class="center">
                                        @if ($item->active === 1)
                                            <span class="new badge blue" data-badge-caption="">Tak</span>
                                        @else
                                            <span class="new badge red" data-badge-caption="">Nie</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/logos/' . $item->id) }}"
                                           class="waves-effect waves-light btn"
                                           title="Zobacz"><i class="fa fa-folder-open"></i></a>
                                        <a href="{{ url('/admin/logos/' . $item->id . '/edit') }}"
                                           class="waves-effect waves-light btn"
                                           title="Edycja"><i class="fa fa-edit"></i></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/logos', $item->id],
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
                        <div class="pagination-wrapper"> {!! $logos->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection