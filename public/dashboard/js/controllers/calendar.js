/**
 * Created by tomasz on 22.10.2016.
 */
cmsx.controller('CalendarController', function ($scope, $http) {

    $scope.eventSources = [];

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
            eventClick: $scope.alertEventOnClick,
            eventDrop: $scope.alertOnDrop,
            eventResize: $scope.alertOnResize
        }
    };

    $scope.alertEventOnClick = function () {

    };

    $scope.alertOnDrop = function () {

    };

    $scope.alertOnResize = function () {

    };

});