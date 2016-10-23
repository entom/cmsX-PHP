@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <header class="row navigation-row">
            <div class="col s6">
                <h1>Kalendarz: kategorie</h1>
            </div>
            <div class="col s6">
                <a href="{{ url('/admin/calendar-event-category/create') }}" class="waves-effect waves-light btn right"
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
                                <th class="center"> #</th>
                                <th> Tytuł</th>
                                <th> Kolor</th>
                                <th>Akcje</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($calendareventcategory as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <span class="color-preview" style="background-color: {{ $item->color }}"></span>
                                        <span>{{ $item->color }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/calendar-event-category/' . $item->id) }}"
                                           class="waves-effect waves-light btn"
                                           title="Zobacz"><i class="fa fa-folder-open"></i></a>
                                        <a href="{{ url('/admin/calendar-event-category/' . $item->id . '/edit') }}"
                                           class="waves-effect waves-light btn"
                                           title="Edycja"><i class="fa fa-edit"></i></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/calendar-event-category', $item->id],
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
                        <div class="pagination-wrapper"> {!! $calendareventcategory->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection