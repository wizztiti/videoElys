@extends('layouts.back')

@section('pageTitle')
    <h1>{{ isset($tag) ? 'Edition du tag' : 'Nouveau tag' }}</h1>
@endsection

@section('main')

    {!!
        Form::open([
            'url' => isset($tag)
                ? route('admin.tag.update', $tag)
                : route('admin.tag.store'),
            'method' => 'POST'
        ])
    !!}

    @if(isset($tag))
        {!! Form::hidden('_method', 'PUT') !!}
    @endif

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="control-label" for="name">Nom du tag</label>
        {!!
            Form::text(
                'name',
                isset($tag) ? $tag->name : null,
                [
                    'class' => 'form-control'
                ]
            )
        !!}

        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="name">Slug</label>
        {!!
            Form::text(
                'slug',
                isset($tag) ? $tag->slug : null,
                [
                    'class' => 'form-control'
                ]
            )
        !!}

        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}

@endsection
