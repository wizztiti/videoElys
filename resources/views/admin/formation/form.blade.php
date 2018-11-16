@extends('layouts.back')

@section('pageTitle')
    @if(isset($formation))
        <h1>Edition de la formation</h1>
    @else
        <h1>Nouvelle formation</h1>
    @endif
@endsection

@section('main')

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

        <textarea name="resume">{!! isset($formation) ? $formation->resume : old('resume') !!}</textarea>

        {!! $errors->first('resume', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="teaser_path">Teaser Url</label>
        {!!
            Form::text('teaser_path', isset($formation) ? $formation->teaser_path : null, ['class' => 'form-control'])
        !!}

        {!! $errors->first('teaser_path', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
        <label class="control-label" for="category_id">Catégorie</label>
        {!!
            Form::select(
                'category_id',
                $categories->pluck('name', 'id'),
                isset($formation) ? $formation->category->id : null,
                ['class' => 'form-control'] )
        !!}
        {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
        <label class="control-label" for="tags">Tags</label>
        {!!
            Form::text('tags', isset($formation) ? $formation->tagsList : null, ['class' => 'form-control', 'id' => 'tokenfield'])
        !!}
        {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
    </div>

    <label>Chapitres</label>
    <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
        </div>

        <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list ui-sortable" data-widget="todo-list">
                @if(isset($chapters))
                    @foreach($chapters as $chapter)
                        <li class="" style="">
                            <!-- drag handle -->
                            <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                            <!-- todo text -->
                            <span class="text">{{ $chapter->title }}</span>

                            <input type="hidden" name="summary[]" value="{{ $chapter->id }}">
                            <!-- Emphasis label -->
                            <small class="label><i class="fa fa-clock-o"></i></small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a href="{{ route('admin.chapter.edit', ['chapter' => $chapter]) }}"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o toogle-chapter-remove"></i>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <script>
            $('.toogle-chapter-remove').on('click', function(e){
                e.preventDefault();
                $(this).parent().parent().remove();
            });

        </script>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            @if(isset($formation))
                <a href="{{ route('admin.chapter.create', ['formation' => $formation]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add chapter</a>
            @endif
        </div>
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

    <script>
        $('#tokenfield').tokenfield({
            autocomplete: {
                source: "/api/tags",
                minLength: 2
            },
            showAutocompleteOnFocus: true
        })
    </script>

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
