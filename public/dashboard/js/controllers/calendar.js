/**
 * Created by tomasz on 22.10.2016.
 */
cmsx.controller('CalendarController', function ($scope, $http) {

    $scope.eventSources = [];

    $scope.alertDayOnClick = function (date,allDay,jsEvent, view) {
        console.log('DayOnClick');
        $scope.event.date = date.format();
        $scope.showEventModal();
    };

    $scope.alertEventOnClick = function () {
        console.log('EventOnClick');
    };

    $scope.alertOnDrop = function () {
        console.log('AlertOnDrop');
    };

    $scope.alertOnResize = function () {
        console.log('AlertOnResize');
    };

    $scope.uiConfig = {
        calendar:{
            height: 550,
            lang: 'pl',
            editable: true,
            header:{
                left: 'month basicWeek basicDay agendaWeek agendaDay',
                center: 'title',
                right: 'today prev,next'
            },
            dayClick: $scope.alertDayOnClick,
            eventClick: $scope.alertEventOnClick,
            eventDrop: $scope.alertOnDrop,
            eventResize: $scope.alertOnResize
        }
    };

    $scope.event = {
        date: '',
        title: '',
        description: ''
    };

    $scope.errors = {
        event : {
            title: ''
        }
    };

    $scope.showEventModal = function () {
        $('#EventModal').openModal();
    };

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
                console.log(resp);
            });
        }
    };

});