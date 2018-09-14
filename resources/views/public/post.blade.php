@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h1>{!! $post->title !!}</h1>

                 Catégorie :  <a href="/post/{{ $post->category->slug }}">{!! $post->category->name !!}</a> <br><br>
                    <iframe src="https://www.youtube.com/embed/abcde" frameborder="0"></iframe>
                    <br>
                    Contenu:
                    <br>
                {!! $post->text !!}
                    <br>

                    _________________________________
                    <br>
                    @foreach($post->tags as $tag)
                        <a href="/post/tag:{{ $tag->slug }}" class="badge badge-info">{{ $tag->name }}</a>
                    @endforeach

            </div>
        </div>
    </div>
@endsection