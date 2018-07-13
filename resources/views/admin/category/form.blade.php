@extends('layouts.default')

@section('content')

    @if(isset($category))
        <h1>Edition de la catégorie</h1>
    @else
        <h1>Nouvelle catégorie</h1>
    @endif

    {!!
        Form::open([
            'url' => isset($category)
                ? route('category.update', $category)
                : route('category.store'),
            'method' => 'POST'
        ])
    !!}

        @if(isset($category))
            {!! Form::hidden('_method', 'PUT') !!}
        @endif

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="control-label" for="name">Nom de la catégorie</label>
            {!!
                Form::text('name', isset($category) ? $category->name : null, ['class' => 'form-control'])
            !!}
            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label class="control-label" for="name">Slug</label>
            {!!
                Form::text('slug', isset($category) ? $category->slug : null, ['class' => 'form-control'])
            !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>

    {!! Form::close() !!}
@endsection
