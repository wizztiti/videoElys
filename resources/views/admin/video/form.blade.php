@extends('layouts.default')

@section('content')

    @if(isset($video))
        <h1>Edition de la vidéo</h1>
    @else
        <h1>Nouvelle vidéo</h1>
    @endif

    {!!
        Form::open([
            'url' => isset($video)
                ? route('video.update', $video)
                : route('video.store'),
            'method' => 'POST'
        ])
    !!}

    @if(isset($video))
        {!! Form::hidden('_method', 'PUT') !!}
    @endif

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Titre de la vidéo</label>
        {!!
            Form::text('title', isset($video) ? $video->title : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="slug">Slug</label>
        {!!
            Form::text('slug', isset($video) ? $video->slug : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label class="control-label" for="description">Description</label>
        {!!
            Form::text('description', isset($video) ? $video->description : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
        <label class="control-label" for="duration">Durée</label>
        {!!
            Form::text('duration', isset($video) ? $video->duration : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('duration', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('teaser_url') ? 'has-error' : '' }}">
        <label class="control-label" for="teaser_url">Url du teaser</label>
        {!!
            Form::text('teaser_url', isset($video) ? $video->teaser_url : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('teaser_url', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="video_file">Fichier de la vidéo</label>
        {!!
            Form::text('video_file', isset($video) ? $video->video_file : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('video_file', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}
@endsection
