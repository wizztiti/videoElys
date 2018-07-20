@extends('layouts.default')

@section('content')

    @if(isset($post))
        <h1>Edition de l'article</h1>
    @else
        <h1>Nouvel article</h1>
    @endif

    {!!
        Form::open([
            'url' => isset($post)
                ? route('post.update', $post)
                : route('post.store'),
            'method' => 'POST'
        ])
    !!}

    @if(isset($post))
        {!! Form::hidden('_method', 'PUT') !!}
    @endif

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Titre de l'article</label>
        {!!
            Form::text('title', isset($post) ? $post->title : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="slug">Slug</label>
        {!!
            Form::text('slug', isset($post) ? $post->slug : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
        <label class="control-label" for="text">Texte</label>
        {!!
            Form::textarea('text', isset($post) ? $post->text : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('text', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
        <label class="control-label" for="category_id">Catégorie</label>
        {!!
            Form::select('category_id', \App\Models\Category::all()->pluck('name', 'id'), null,  ['class' => 'form-control'] )
        !!}
        {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
        <label class="control-label" for="tags">Tags</label>
        {!!
            Form::text('tags', isset($post) ? $post->tagsList : null, ['class' => 'form-control', 'id' => 'tokenfield'])
        !!}
        {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}
@endsection
