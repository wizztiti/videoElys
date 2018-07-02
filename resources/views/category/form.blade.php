{!! Form::model($category, [
    'url' => action("CategoryController@$action", $category),
    'method' => $action == 'store' ? 'POST': 'PUT'
]) !!}

    <div class="form-group">
        <label class="control-label" for="name">Nom de la catégorie</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="name">Slug</label>
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </div>

{!! Form::close() !!}