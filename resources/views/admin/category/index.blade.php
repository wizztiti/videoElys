@extends('layouts.back')

@section('main')

    <H1>Gestion des catégories</H1>

    <p class="text-right">
        <a href="{{ action('Admin\CategoryController@create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    </p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ action('Admin\CategoryController@edit', $category) }}" class="btn btn-primary">Editer</a>
                        <form action="{{ route('admin.category.destroy', $category) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
