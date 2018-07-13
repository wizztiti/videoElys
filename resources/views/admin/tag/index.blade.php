@extends('layouts.default')

@section('content')

    <H1>Gestion des tags</H1>

    <p class="text-right">
        <a href="{{ action('Admin\TagController@create') }}" class="btn btn-primary">Ajouter un tag</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    <a href="{{ action('Admin\TagController@edit', $tag) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('tag.destroy', $tag) }}" method="POST">
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