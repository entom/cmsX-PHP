@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Kalendarz: kategorie {{ $calendareventcategory->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/calendareventcategory', $calendareventcategory->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń CalendarEventCategory',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
                {!! Form::close() !!}

                <a href="{{ url('admin/calendar-event-category/' . $calendareventcategory->id . '/edit') }}"
                   class="waves-effect waves-light btn right mr10" title="Edycja CalendarEventCategory"><i
                            class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $calendareventcategory->id }}</dd>

                        <dl> Tyutł</dl>
                        <dd> {{ $calendareventcategory->title }} </dd>

                        <dl> Kolor</dl>
                        <dd> {{ $calendareventcategory->color }} </dd>

                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
