@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row navigation-row">
            <div class="col s6">
                <h1>Baner {{ $slider->id }}</h1>
            </div>
            <div class="col s6">
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/sliders', $slider->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', array(
                        'type' => 'submit',
                        'class' => 'waves-effect waves-light btn right',
                        'title' => 'Usuń slider',
                        'onclick'=>'return confirm("Czy na pewno usunąć?")'
                ))!!}
                {!! Form::close() !!}

                <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                   class="waves-effect waves-light btn right mr10" title="Edycja slider"><i
                            class="fa fa-pencil"></i></a>
            </div>
        </div>

        <div class="card card-view">
            <div class="card-content">
                <div class="row">
                    <dl>
                        <dt>ID</dt>
                        <dd>{{ $slider->id }}</dd>

                        <dt> Title</dt>
                        <dd> {{ $slider->title }} </dd>

                        <dt>Miniaturka</dt>
                        <dd>
                        @if ($slider->file != NULL)
                            <dt>Miniaturka</dt>
                            <dd>
                                <img src="/files/thumb/sliders/300x300_{{$slider->file}}" />
                            </dd>
                            @endif
                        </dd>

                        <dt> Link</dt>
                        <dd> {{ $slider->link }} </dd>

                        <dt> Active</dt>
                        <dd>
                            @if($slider->active == 1)
                                TAK
                            @else
                                NIE
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
@endsection
