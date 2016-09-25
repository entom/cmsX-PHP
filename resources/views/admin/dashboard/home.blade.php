@extends('layouts.admin')

@section('content')
    <div class="row pt80 homepage">
        <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/users">Użytkownicy: <b>{{ $users_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-users blue-text"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/users">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/sites">Strony: <b>{{ $sites_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-th green-text"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/sites">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/blogs">Blog: <b>{{ $blogs_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-folder-open-o purple-text"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/blogs">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/news">Aktualności: <b>{{ $news_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-newspaper-o orange-text accent-4"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/news">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/albums">Galeria: <b>{{ $albums_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-picture-o red-text"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/albums">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/logos">Logotypy: <b>{{ $logos_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-file-image-o cyan-text accent-3"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/logos">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
