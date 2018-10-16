@extends('layouts.app')

@section('content')
    <div class="explore">
        <h3>Explore</h3>

        <h4>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</h4>

        <div class="post-links">

            <div class="row">

                @foreach($formations as $formation)
                    <div class="col-xs col-sm-6 col-md-4">
                        <div class="post">
                            <a href="{{ route('formation.show', ['category' => $formation->category->slug, 'formation' => $formation->slug]) }}"><img src="/img/teaser-post.jpg" class="img-fluid"></a>
                            <div class="resume">
                                <h4><a href="{{ route('formation.show', ['category' => $formation->category->slug, 'formation' => $formation->slug]) }}">{!! $formation->title !!}</a></h4>
                                <div class="text">
                                    {!! substr($formation->resume, 0, 120) !!}
                                </div>
                                <div class="links">
                                    <div class="love"><img src="" alt="">609</div>
                                    <div class="comments"><img src="" alt="">120</div>
                                    <span class="share">Share</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>


@endsection
