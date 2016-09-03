@extends('layouts.admin')

@section('content')
<div class="container">

    <h1>Blog <a href="{{ url('/admin/blogs/create') }}" class="btn btn-primary btn-xs" title="Dodaj nowy wpis"><i class="fa fa-plus"></i></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Title </th><th> Content </th><th> Active </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($blogs as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->content }}</td><td>{{ $item->active }}</td>
                    <td>
                        <a href="{{ url('/admin/blogs/' . $item->id) }}" class="btn btn-success btn-xs" title="Zobacz"><i class="fa fa-folder-open"></i></a>
                        <a href="{{ url('/admin/blogs/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edycja"><i class="fa fa-edit"></i></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/blogs', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Usuń',
                                    'onclick'=>'return confirm("Potwierdź usunięcie?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $blogs->render() !!} </div>
    </div>

</div>
@endsection
