@extends('layouts.back')

@section('main')

    @if(isset($formation))
        <h1>Edition de la formation</h1>
    @else
        <h1>Nouvelle formation</h1>
    @endif

    {!!
        Form::open([
            'url' => isset($formation)
                ? route('admin.formation.update', $formation)
                : route('admin.formation.store'),
            'method' => 'POST'
        ])
    !!}

    @if(isset($formation))
        {!! Form::hidden('_method', 'PUT') !!}
    @endif

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Titre de la formation</label>
        {!!
            Form::text('title', isset($formation) ? $formation->title : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="slug">Slug</label>
        {!!
            Form::text('slug', isset($formation) ? $formation->slug : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group {{ $errors->has('resume') ? 'has-error' : '' }}">
        <label class="control-label" for="text">Résumé</label>

        <textarea name="resume">{!! isset($formation) ? $formation->resume : null !!}</textarea>

        {!! $errors->first('resume', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="teaser_path">Teaser Url</label>
        {!!
            Form::text('teaser_path', isset($formation) ? $formation->teaser_path : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
        <label class="control-label" for="category_id">Catégorie</label>
        {!!
            Form::select('category_id', \App\Models\Category::all()->pluck('name', 'id'), null,  ['class' => 'form-control'] )
        !!}
        {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
    </div>

    <!--div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
        <label class="control-label" for="tags">Tags</label>
        {!!
            Form::text('tags', isset($formation) ? $formation->tagsList : null, ['class' => 'form-control', 'id' => 'tokenfield'])
        !!}
        {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
    </div-->

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}

    <!--script>
        $('#tokenfield').tokenfield({
            autocomplete: {
                source: "/api/tags",
                minLength: 2
            },
            showAutocompleteOnFocus: true
        })
    </script-->

    <script>
        CKEDITOR.replace( 'resume' );
    </script>

@endsection

@push('javascript-libs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" />

    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

@endpush
