/**
 * Created by tomasz on 03.09.2016.
 */

cmsx.controller('BlogsController', function ($scope, $http) {

    /**
     * blogs array
     * @type {Array}
     */
    $scope.blogs = [];

    /**
     * initiate functions
     */
    $scope.initiate = function () {
        console.log('BlogsController :: initiate');
        $scope.getBlogs();
    };

    /**
     * getBlogs function
     */
    $scope.getBlogs = function () {

    };

});