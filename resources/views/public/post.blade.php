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

                 Catégorie :  {!! $post->category->name !!}} <br>
                    _________________________________<br>

                    Contenu:<br>
                {!! $post->text !!}}<br>

                    _________________________________<br>
                {!! $post->tagsList !!}

            </div>
        </div>
    </div>
@endsection