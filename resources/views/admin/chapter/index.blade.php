@extends('layouts.back')

@section('main')

    <H1>Gestion des chapitres</H1>

    <p class="text-right">
        <a href="{{ action('Admin\ChapterController@create') }}" class="btn btn-primary">Ajouter un chapitre</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>slug</th>
            <th>Formation</th>
            <th>Num dans la formation</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($chapters as $chapter)
            <tr>
                <td>{{ $chapter->title }}</td>
                <td><a href="">{{ $chapter->slug }}</a></td>
                <td><a href="">{{ isset($chapter->formation->title) ? $chapter->formation->title : null }}</a></td>
                <td></td>
                <td>
                    <a href="{{ action('Admin\ChapterController@edit', $chapter) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('admin.chapter.destroy', $chapter) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Supprimer" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    {{--@foreach($chapter->tags as $tag)
                        <a href="{{ route('blog.tag.list', ['tag' => $tag->slug]) }}" class="badge badge-info">{{ $tag->name }}</a>
                    @endforeach--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
