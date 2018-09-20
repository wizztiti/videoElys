@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col">
                <div class="post-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="/img/image.jpg" class="img-fluid" alt="">

                    <div class="links text-center">
                        <a href="/post/{{ $post->category->slug }}" class="category">{!! $post->category->name !!}</a>
                    </div>

                    <h1 class="text-center">{!! $post->title !!}</h1>

                    <div class="tags text-center">
                        @foreach($post->tags as $tag)
                            <a href="/post/tag:{{ $tag->slug }}" class="tag">#{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <div class="text">
                        <article>
                            {!! $post->text !!}
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <section class="aside">
                    <h3>Videos relacionadas</h3>

                    <div class="row">
                        <div class="col-xs col-sm-6 col-lg-12">
                            <div class="video">
                                <h4>Educació respectuosa</h4>
                                <div class="links">
                                    <div class="love"><img src="" alt="">609</div>
                                    <div class="duration"><img src="" alt="">1h10</div>
                                </div>
                                <div class="resume">
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                </div>
                            </div>
                        </div>
                        <div class="col-xs col-sm-6 col-lg-12">
                            <div class="video">
                                <h4>Educació respectuosa</h4>
                                <div class="links">
                                    <div class="love"><img src="" alt="">609</div>
                                    <div class="duration"><img src="" alt="">1h10</div>
                                </div>
                                <div class="resume">
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                </div>
                            </div>
                        </div>

                        <div class="col-xs col-sm-6 col-lg-12">
                            <div class="video">
                                <h4>Educació respectuosa</h4>
                                <div class="links">
                                    <div class="love"><img src="" alt="">609</div>
                                    <div class="duration"><img src="" alt="">1h10</div>
                                </div>
                                <div class="resume">
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="image d-none d-lg-block">
                        <img src="/img/image-aside.jpg" class="img-fluid" alt="">
                    </div>
                </section>
            </div>

        </div><!-- row -->

        <div class="post-links">
            <h3>Articulos relacionados</h3>
            <div class="row">
                @foreach($postLinks as $post)
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
