@extends('layouts.admin')

@section('content')

<script src="/dashboard/js/controllers/calendar.js"></script>

<div class="col s12" ng-controller="CalendarController">
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
                    <div ui-calendar="uiConfig.calendar" ng-model="eventSources"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
