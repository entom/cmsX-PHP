<div class="file-field input-field col s12 m6 {{ $errors->has('active') ? 'has-error' : ''}}">
    <div class="btn">
        <span>Plik</span>
        <input type="file" name="file">
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
    </div>
    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
</div>