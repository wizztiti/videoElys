@extends('layouts.app')

@section('content')

    <H1>Gestion des vidéos</H1>

    <p class="text-right">
        <a href="{{ action('Admin\VideoController@create') }}" class="btn btn-primary">Ajouter une vidéo</a>
    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>slug</th>
            <th>Description</th>
            <th>Durée</th>
            <th>url du Teaser</th>
            <th>Fichier vidéo</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->title }}</td>
                <td>{{ $video->slug }}</td>
                <td>{{ $video->description }}</td>
                <td>{{ $video->duration }}</td>
                <td>{{ $video->teaser_url }}</td>
                <td>{{ $video->video_file }}</td>
                <td>
                    <a href="{{ action('Admin\VideoController@edit', $video) }}" class="btn btn-primary">Editer</a>
                    <form action="{{ route('admin.video.destroy', $video) }}" method="POST">
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