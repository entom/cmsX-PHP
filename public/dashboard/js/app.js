/**
 * Created by tomasz on 03.09.2016.
 */

var cmsx = angular.module('cmsxApp', ['ui.calendar', 'angularFileUpload'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});