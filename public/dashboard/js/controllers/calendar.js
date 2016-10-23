/**
 * Created by tomasz on 22.10.2016.
 */
cmsx.controller('CalendarController', function ($scope, $http, $compile, uiCalendarConfig) {

    /**
     * event
     * @type {{date: string, title: string, description: string}}
     */
    $scope.event = {
        date: '',
        title: '',
        description: ''
    };

    /**
     * errors
     * @type {{event: {title: string}}}
     */
    $scope.errors = {
        event : {
            title: ''
        }
    };

    /**
     * events
     * @type {*[]}
     */
    $scope.events = [];

    /**
     * init method
     */
    $scope.init = function () {
        $scope.getEvents();
    };

    /**
     * showEventModal method
     */
    $scope.showEventModal = function () {
        $('#EventModal').openModal();
    };

    /**
     * saveEvent method
     */
    $scope.saveEvent = function () {
        console.log('SaveEvent');
        var errors = false;
        if($scope.event.title.length == 0) {
            errors = true;
            $scope.errors.event.title = 'Proszę podać tytuł';
        } else {
            $scope.errors.event.title = '';
        }

        if(!errors) {
            var config = {};
            var data = $scope.event;
            $http.post('/admin/calendar', data, config).then(function (resp) {
                if(resp.data.success) {
                    $('#EventModal').closeModal();
                    Materialize.toast('Zadanie zostało zapisane', 5000);
                }
            });
        }
    };

    /**
     * getEvents method
     */
    $scope.getEvents = function () {
        $http.get('/admin/calendar_events').then(function (resp) {
            console.log(resp);
            var events = resp.data.events;

            for(var event in events) {
                events[event].start = events[event].event_date;
                $scope.events.push(events[event]);
            }
        });
    };

    /**
     * alertDayOnClick method
     * @param date
     * @param allDay
     * @param jsEvent
     * @param view
     */
    $scope.alertDayOnClick = function (date,allDay,jsEvent, view) {
        console.log('DayOnClick');
        $scope.event.date = date.format();
        $scope.showEventModal();
    };

    /**
     * alertOnEventClick method
     * @param date
     * @param jsEvent
     * @param view
     */
    $scope.alertOnEventClick = function( date, jsEvent, view){
        $scope.alertMessage = (date.title + ' was clicked ');
    };

    /**
     * alertOnDrop method
     * @param event
     * @param delta
     * @param revertFunc
     * @param jsEvent
     * @param ui
     * @param view
     */
    $scope.alertOnDrop = function(event, delta, revertFunc, jsEvent, ui, view){
        $scope.alertMessage = ('Event Droped to make dayDelta ' + delta);
    };

    /**
     * alertOnResize method
     * @param event
     * @param delta
     * @param revertFunc
     * @param jsEvent
     * @param ui
     * @param view
     */
    $scope.alertOnResize = function(event, delta, revertFunc, jsEvent, ui, view ){
        $scope.alertMessage = ('Event Resized to make dayDelta ' + delta);
    };

    /**
     * changeView method
     * @param view
     * @param calendar
     */
    $scope.changeView = function(view,calendar) {
        uiCalendarConfig.calendars[calendar].fullCalendar('changeView',view);
    };

    /**
     * renderCalender method
     * @param calendar
     */
    $scope.renderCalender = function(calendar) {
        if(uiCalendarConfig.calendars[calendar]){
            uiCalendarConfig.calendars[calendar].fullCalendar('render');
        }
    };

    /**
     * eventRender method
     * @param event
     * @param element
     * @param view
     */
    $scope.eventRender = function( event, element, view ) {
        element.attr({'tooltip': event.title,
            'tooltip-append-to-body': true});
        $compile(element)($scope);
    };

    /**
     * uiConfig
     * @type {}
     */
    $scope.uiConfig = {
        calendar:{
            height: 550,
            editable: true,
            lang: 'pl',
            header:{
                left: 'title',
                center: '',
                right: 'today prev,next'
            },
            eventClick: $scope.alertOnEventClick,
            eventDrop: $scope.alertOnDrop,
            eventResize: $scope.alertOnResize,
            eventRender: $scope.eventRender,
            dayClick: $scope.alertDayOnClick
        }
    };

    /**
     * eventSources
     * @type {*[]}
     */
    $scope.eventSources = [$scope.events];

});