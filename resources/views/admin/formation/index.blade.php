@extends('layouts.back')

@section('pageTitle')
    <h1>Gestion des formations</h1>
@endsection

@section('main')
<div class="adminFormations">

    <p class="text-right">
        <a href="{{ action('Admin\FormationController@create') }}" class="btn btn-primary">Ajouter une formation</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>slug</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($formations as $formation)
            <tr>
                <td>{{ $formation->id }}</td>
                <td>{{ $formation->title }}</td>
                <td><a href="{{ route('formation.list', ['category' => $formation->category->slug, 'formation' => $formation->slug]) }}">{{ $formation->slug }}</a></td>
                <td><a href="{{ route('formation.category.list', ['category' => $formation->category->slug]) }}">{{ $formation->category->name }}</a></td>
                <td>
                    <a href="{{ action('Admin\FormationController@edit', $formation) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('admin.formation.destroy', $formation) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Supprimer" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    {{--@foreach($formation->tags as $tag)
                        <a href="{{ route('blog.tag.list', ['tag' => $tag->slug]) }}" class="badge badge-info">{{ $tag->name }}</a>
                    @endforeach--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
