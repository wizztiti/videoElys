@extends('layouts.default')

@section('content')

    @if(isset($tag))
        <h1>Edition du tag</h1>
    @else
        <h1>Nouveau tag</h1>
    @endif

    {!!
        Form::open([
            'url' => isset($tag)
                ? route('tag.update', $tag)
                : route('tag.store'),
            'method' => 'POST'
        ])
    !!}

    @if(isset($tag))
        {!! Form::hidden('_method', 'PUT') !!}
    @endif

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="control-label" for="name">Nom du tag</label>
        {!!
            Form::text('name', isset($tag) ? $tag->name : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="name">Slug</label>
        {!!
            Form::text('slug', isset($tag) ? $tag->slug : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}
@endsection
