@extends('layouts.admin')

@section('content')
    <div class="row pt80 homepage">
        <div class="col s12 m3 animated flipInX">
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

        <div class="col s12 m3 animated flipInX">
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

        <div class="col s12 m3 animated flipInX">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/sliders">Banery: <b>{{ $sliders_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-picture-o pink-text lighten-1"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/sliders">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3 animated flipInX">
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

        <div class="col s12 m3 animated flipInX">
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

        <div class="col s12 m3 animated flipInX">
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

        <div class="col s12 m3 animated flipInX">
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

        <div class="col s12 m3 animated flipInX">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/calendar">Zadania: <b>{{ $calendar_events_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/calendar">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3 animated flipInX">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/paralax">Zdjęcia w tle: <b>{{ $paralax_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-file-picture-o  deep-purple-text lighten-1"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/paralax">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3 animated flipInX">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/offer">Oferta: <b>{{ $offers_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-list-ul  light-green-text accent-3"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/offer">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3 animated flipInX">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/realizations">Realizacje: <b>{{ $realizations_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-briefcase amber-text lighten-1"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/realizations">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m3 animated flipInX">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-action center">
                        <a href="/admin/technology">Technologie: <b>{{ $technologies_counter }}</b></a>
                    </div>
                    <div class="card-content center">
                        <i class="fa fa-tags pink-text lighten-1"></i>
                    </div>
                    <div class="card-action center">
                        <a href="/admin/technology">Zobacz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
