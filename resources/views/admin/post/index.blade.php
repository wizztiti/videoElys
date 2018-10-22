@extends('layouts.back')

@section('main')

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
                <td><a href="{{ route('blog.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">{{ $post->slug }}</a></td>
                <td><a href="{{ route('blog.category.list', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a></td>
                <td>
                    <a href="{{ action('Admin\PostController@edit', $post) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('admin.post.destroy', $post) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Supprimer" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('blog.tag.list', ['tag' => $tag->slug]) }}" class="badge badge-info">{{ $tag->name }}</a>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
