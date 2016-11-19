<div class="input-field col s12 m6 {{ $errors->has('active') ? 'has-error' : ''}}">
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    {!! Form::select('active', [1 => 'Tak', 0 => 'Nie']) !!}
    {!! Form::label('active', 'Aktywny', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
</div>