<div id="seoTab" class="col s12">
    <div class="card">
        <div class="card__header">
            <span>SEO - Meta dane</span>
        </div>
        <div class="card-content">
            <div class="row">
                <div class="input-field col s12 m6 {{ $errors->has('meta_title') ? 'has-error' : ''}}">
                    {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
                    {!! Form::text('meta_title', null, []) !!}
                    {!! Form::label('meta_title', 'Tytuł', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                </div>

                <div class="input-field col s12 m6 {{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
                    {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
                    {!! Form::text('meta_keywords', null, []) !!}
                    {!! Form::label('meta_keywords', 'Słowa kluczowe', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                </div>

                <div class="input-field col s12 m12 {{ $errors->has('meta_description') ? 'has-error' : ''}}">
                    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
                    {!! Form::text('meta_description', null, []) !!}
                    {!! Form::label('meta_description', 'Opis', ['data-error' => 'wrong', 'data-success' => 'right']) !!}
                </div>
            </div>
        </div>
    </div>
</div>