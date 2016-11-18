@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Pomoc</h1>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <p class="mb15">Poniżej zamieszczam krótką instrukcję jak korzystać z CMS. Zamieszczam również infomacje o poszczególnych przyciskach jakie można znaleźć w panelu.</p>

                        <div class="row help-row">
                            <div class="col s2">
                                <a class="waves-effect waves-light btn" title="Dodaj nowy wpis"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="col s10">
                                Przycisk umożliwia tworzenie nowego wpisu, strony, rekordu.
                            </div>
                        </div>

                        <div class="row help-row">
                            <div class="col s2">
                                <a class="waves-effect waves-light btn" title="Zobacz"><i class="fa fa-folder-open"></i></a>
                            </div>
                            <div class="col s10">
                                Kliknięcie w przycisk otworzy stronę z wszystkimi informacjami o wybranym elemencie.
                            </div>
                        </div>

                        <div class="row help-row">
                            <div class="col s2">
                                <a class="waves-effect waves-light btn" title="Edycja"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="col s10">
                                Przycisk umożliwia edycję wybranego wpisu.
                            </div>
                        </div>

                        <div class="row help-row">
                            <div class="col s2">
                                <a class="waves-effect waves-light btn" title="Edycja"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="col s10">
                                Przycisk udostępnia funkcję usuwania wpisów.
                            </div>
                        </div>

                        <div class="row help-row">
                            <div class="col s2">
                                <div class="btn">
                                    <span>Plik</span>
                                </div>
                            </div>
                            <div class="col s10">
                                Przycisk pozwala na przesyłanie plików, najczęściej są to miniaturki to wpisów, zdjęcia, banery lub załączników do artykułów.
                            </div>
                        </div>

                        <div class="row help-row">
                            <div class="col s2">
                                <a class="waves-effect waves-light btn"><i class="fa fa-check"></i></a>
                            </div>
                            <div class="col s10">
                                Przycisk służy do potwierdzania akcji, oznacza również wiadomości otwarte/przeczytane.
                            </div>
                        </div>

                        <div class="row help-row">
                            <div class="col s2">
                                <span class="fa fa-sort"></span>
                            </div>
                            <div class="col s10">
                                Przycisk pozwala na zmianę kolejności rekordów w widoku tabelki - listy wpisów. Proszę kursorem myszki chwycić strzałki i przeciągnąć w wybrane miejsce.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection