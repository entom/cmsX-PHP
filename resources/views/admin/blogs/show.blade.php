@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Blog {{ $blog->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/blogs', $blog->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń wpis',
                        'onclick'=>'return confirm("Czy na pewno chcesz usunąć?")'
                ))!!}
                {!! Form::close() !!}
                <a href="{{ url('admin/blogs/' . $blog->id . '/edit') }}" class="waves-effect waves-light btn right mr10"
                   title="Edycja wpisu"><i class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $blog->id }}</dd>
                        <dt> Tytuł</dt>
                        <dd> {{ $blog->title }} </dd>
                        <dt> Treść</dt>
                        <dd> {{ $blog->content }} </dd>
                        <dt> Aktywny</dt>
                        <dd> {{ $blog->active }} </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
