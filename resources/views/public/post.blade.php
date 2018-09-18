@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="post-content col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <img src="/img/image.jpg" class="img-fluid">

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
                    {!! $post->text !!}
                </div>

            </div>
            <section class="aside col-4">
                <h3>Videos relacionadas</h3>

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
            </section>
        </div><!-- row -->

        <div class="post-links">
            <h3>Articulos relacionados</h3>
            <div class="row">
                <div class="col-4">
                    <div class="post">
                        <img src="/img/image-blue.jpg" class="img-fluid">
                        <div class="resume">
                            <h4>Excepteur sint.</h4>
                            <div class="text">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            </div>
                            <div class="links">
                                <div class="love"><img src="" alt="">609</div>
                                <div class="comments"><img src="" alt="">120</div>
                                <span class="share">Share</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="post">
                        <img src="/img/image-blue.jpg" class="img-fluid">
                        <div class="resume">
                            <h4>Excepteur sint.</h4>
                            <div class="text">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            </div>
                            <div class="links">
                                <div class="love"><img src="" alt="">609</div>
                                <div class="comments"><img src="" alt="">120</div>
                                <span class="share">Share</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="post">
                        <img src="/img/image-blue.jpg" class="img-fluid">
                        <div class="resume">
                            <h4>Excepteur sint.</h4>
                            <div class="text">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            </div>
                            <div class="links">
                                <div class="love"><img src="" alt="">609</div>
                                <div class="comments"><img src="" alt="">120</div>
                                <span class="share">Share</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection