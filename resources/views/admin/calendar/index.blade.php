@extends('layouts.admin')

@section('content')

<script src="/dashboard/js/controllers/calendar.js"></script>

<div class="col s12" ng-controller="CalendarController" ng-init="init()">
    <header class="row navigation-row">
        <div class="col s6">
            <h1>Kalendarz</h1>
        </div>
        <div class="col s6">
            {{--<a href="{{ url('/admin/calendar/create') }}" class="waves-effect waves-light btn right" title="Dodaj nowy wpis"><i class="fa fa-plus"></i></a>--}}
        </div>
    </header>
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div ui-calendar="uiConfig.calendar" ng-model="eventSources" calendar="CalendarEvent"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="EventModal" class="modal">
        <div class="modal-content">
            <h4>Zadanie: [[event.date]]</h4>
            <div class="row">
                <div class="input-field col s12 m6">
                    <div class="error-message" ng-show="errors.event.title.length>0">[[errors.event.title]]</div>
                    <input name="title" type="text" ng-model="event.title">
                    <label for="title" data-error="wrong" data-success="right" class="">Tytuł</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="calendar_event_category_id"
                            ng-model="event.calendar_event_category_id"
                            ng-options="option.title for option in event_categories track by option.id"></select>
                    <label for="calendar_event_category_id">Wybierz kategorię (opcjonalnie)</label>

                </div>

                <div class="input-field col s12">
                    <textarea ng-model="event.description" id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Opis</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action waves-effect waves-green btn-flat" ng-click="saveEvent()">Zapisz</a>
        </div>
    </div>

    <div id="EventShowModal" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Zadanie [[ event_selected.event_date ]]</h4>
            <h5>[[ event_selected.title ]]</h5>
            <p>[[ event_selected.description ]]</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn mr10" ng-click="removeEvent(event_selected.id)"><i class="fa fa-trash"></i> Usuń</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn mr10"><i class="fa fa-check"></i> OK</a>
        </div>
    </div>

</div>
@endsection
