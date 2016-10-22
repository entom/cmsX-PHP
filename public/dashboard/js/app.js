/**
 * Created by tomasz on 03.09.2016.
 */

var cmsx = angular.module('cmsxApp', ['ui.calendar'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});