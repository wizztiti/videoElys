@extends('layouts.default')

@section('content')

    <H1>Gestion des catégories</H1>

    <p class="text-right">
        <a href="{{ action('CategoryController@create') }}" class="btn btn-primary">Ajouter une catégorie</a>
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
                        <a href="{{ action('CategoryController@edit', $category) }}" class="btn btn-primary">Editer</a>
                        <a href="{{ action('CategoryController@destroy', $category) }}" class="btn btn-primary">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection