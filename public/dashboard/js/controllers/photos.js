/**
 * Created by tomasz on 12.11.2016.
 */
cmsx.controller('PhotosController', function ($scope, $http, $upload) {

    /**
     * uploading
     * @type {boolean}
     */
    $scope.uploading = false;

    /**
     * album_id
     * @type {number}
     */
    $scope.album_id = 0;

    /**
     * percentage
     * @type {number}
     */
    $scope.percentage = 0;

    /**
     * files
     * @type {Array}
     */
    $scope.files = [];

    /**
     * counter
     * @type {number}
     */
    $scope.counter = 0;

    /**
     * photos
     * @type {Array}
     */
    $scope.photos = [];

    /**
     * init method
     * @param album_id
     */
    $scope.init = function (album_id) {
        console.log('::PhotosController ::init');
        $scope.album_id = album_id;
        $scope.getFiles();
    };

    /**
     * getFiles method
     */
    $scope.getFiles = function () {
        $http.get('/api/photos/' + $scope.album_id).then(function (resp) {
            $scope.photos = resp.data.photos;
        });
    };

    /**
     * saveFiles method
     * @param files
     */
    $scope.saveFiles = function ($files) {
        $scope.uploading = true;

        $scope.files = $files;

        $scope.uploadFile();
    };

    /**
     * updateFile method
     * @param index
     * @param file
     */
    $scope.updateFile = function (index, file) {
        var config = {};
        var data = file;
        $http.put('/api/photos/' + file.id, data, config).then(function (resp) {
            Materialize.toast(resp.data.message, 5000);
        });
    };

    /**
     * removeFile method
     * @param index
     * @param file
     */
    $scope.removeFile = function (index, file) {
        var config = {};
        var data = {};
        $http.delete('/api/photos/' + file.id, data, config).then(function (resp) {
            Materialize.toast(resp.data.message, 5000);
            $scope.photos.splice(index, 1);
        });
    };

    /**
     * uploadFile method
     */
    $scope.uploadFile = function () {
        $scope.percentage = 0;
        if($scope.counter < $scope.files.length) {
            $scope.upload = $upload.upload({
                url: '/api/photos',
                method: 'POST',
                data: {
                    album_id: $scope.album_id
                },
                file: $scope.files[$scope.counter]
            }).progress(function(evt) {
                $scope.percentage = parseInt(100.0 * evt.loaded / evt.total);
            }).success(function(data, status, headers, config) {
                console.log(data);
                $scope.counter++;
                $scope.uploadFile();
            });
        } else {
            $scope.uploading = false;
            $scope.files = [];
            $scope.counter = 0;
            $scope.getFiles();
        }
    };

});