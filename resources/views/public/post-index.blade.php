@extends('layouts.app')

@section('content')

    <h3>Blog</h3>

    <div class="post-links">

        <div class="row">

            @foreach($posts as $post)
                <div class="col-xs col-sm-6 col-md-4">
                    <div class="post">
                        <a href="/post/{{ $post->category->slug }}/{{ $post->slug }}"><img src="/img/teaser-post.jpg" class="img-fluid"></a>
                        <div class="resume">
                            <h4><a href="/post/{{ $post->category->slug }}/{{ $post->slug }}">{!! $post->title !!}</a></h4>
                            <div class="text">
                                {{ substr($post->text, 0, 120) }}
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

@endsection
