<script src="/dashboard/js/controllers/photos.js"></script>

<div id="photosTab" class="col s12" ng-controller="PhotosController" ng-init='init({!! $id !!}, "{!! $model !!}")'>
    <div class="card">
        <div class="card__header">
            <span>Zdjęcia</span>
        </div>
        <div class="card-content">
            <div class="row">
                <div class="col s6">
                    <i class="waves-effect waves-light btn waves-input-wrapper" style="">
                        <div class="waves-button-input" ng-file-select="saveFiles($files)" multiple="multiple">Wybierz pliki</div>
                    </i>

                    <i ng-show="uploading" class="fa fa-spinner faa-spin animated ajax-loader"></i>
                </div>
                <div class="col s6">
                    <span ng-show="uploading" class="badge new blue" data-badge-caption="">[[percentage]]% [[ files[counter].name ]]</span>
                </div>
                <div class="col s12">
                    <div class="progress">
                        <div class="determinate" style="width: [[percentage]]%"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m3 s4 photo-preview" ng-repeat="photo in photos">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" ng-src="/files/thumb/photos/300x300_[[ photo.file ]]">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">[[ photo.title ? photo.title : 'Tytuł' ]]<i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">[[ photo.title ? photo.title : 'Tytuł' ]]<i class="material-icons right">close</i></span>
                            <div class="input-field col s12">
                                <input ng-model="photo.title" placeholder="Tytuł" id="title[[photo.id]]" type="text" class="validate">
                                <label for="title[[photo.title]]">Tytuł</label>
                            </div>

                            <div class="fixed-action-btn horizontal">
                                <a class="btn-floating btn-large red">
                                    <i class="large material-icons">mode_edit</i>
                                </a>
                                <ul>
                                    <li><a ng-click="removeFile($index, photo)" class="btn-floating red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Usuń"><i class="fa fa-remove"></i></a></li>
                                    <li><a ng-click="updateFile($index, photo)" class="btn-floating blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Zapisz"><i class="fa fa-save"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>