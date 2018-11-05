@extends('layouts.back')

@section('main')

    @if(isset($chapter))
        <h1>Edition du chapitre</h1>
    @else
        <h1>Nouveau chapitre</h1>
    @endif

    {!!
        Form::open([
            'url' => isset($chapter)
                ? route('admin.chapter.update', $chapter)
                : route('admin.chapter.store'),
            'method' => 'POST'
        ])
    !!}

    @if(isset($chapter))
        {!! Form::hidden('_method', 'PUT') !!}
    @endif

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Titre du chapitre</label>
        {!!
            Form::text('title', isset($chapter) ? $chapter->title : null, ['class' => 'form-control'])
        !!}
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label class="control-label" for="slug">Slug</label>
        {!!
            Form::text('slug', isset($chapter) ? $chapter->slug : null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
        <label class="control-label" for="text">Texte</label>

        <textarea name="text">{!! isset($chapter) ? $chapter->text : null !!}</textarea>

        {!! $errors->first('text', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('formation_id') ? 'has-error' : '' }}">
        <label class="control-label" for="formation_id">Formation</label>

        {!!
            Form::select(
                'formation_id',
                $formations->pluck('title', 'id'),
                isset($chapter) ? $chapter->formation->id : null,
                ['class' => 'form-control'] )
        !!}
        {!! $errors->first('formation_id', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace( 'text' );
    </script>

@endsection

@push('javascript-libs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" />

    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

@endpush
