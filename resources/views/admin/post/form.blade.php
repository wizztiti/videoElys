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

    <div class="form-group">
        <label class="control-label" for="name">Titre de l'article</label>
        {!!
            Form::text('title', isset($post) ? $post->title : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="name">Slug</label>
        {!!
            Form::text('slug', isset($post) ? $post->slug : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="name">Texte</label>
        {!!
            Form::textarea('text', isset($post) ? $post->text : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="name">Catégorie</label>
        {!!
            Form::select('category_id', \App\Models\Category::all()->pluck('name', 'id'), null,  ['class' => 'form-control'] )
        !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}
@endsection
