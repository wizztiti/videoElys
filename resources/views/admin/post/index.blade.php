@extends('layouts.default')

@section('content')

    <H1>Gestion des articles</H1>

    <p class="text-right">
        <a href="{{ action('Admin\PostController@create') }}" class="btn btn-primary">Ajouter un article</a>
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
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="{{ action('Admin\PostController@edit', $post) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('post.destroy', $post) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Supprimer" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('posts.tag', ['slug' => $tag->slug]) }}" class="badge badge-info">{{ $tag->name }}</a>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection