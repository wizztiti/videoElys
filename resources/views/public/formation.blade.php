@extends('layouts.app')

@section('content')
    <div class="formation">
        <div class="row justify-content-center">
            <div class="col">
                <div class="teaser-video">
                    <img src="/img/teaser-video.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="formation-resume">
                    <h1>{!! $formation->title !!} </h1>                                   <!--   $formation->title  -->

                    <div class="tags">                                            <!--  foreach sur les tags -->
                        @foreach($formation->tags as $tag)
                            <a href="{{ route('tag.list', ['tag' => $tag->slug]) }}" class="tag">#{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <div class="resume">
                        <p>
                            {!! $formation->resume !!}

                        </p>
                        <!--hr>
                        <!--p class="citation">
                            “Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.”
                        </p-->
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <section class="aside">
                    <p class="price">Price : {{ $formation->price }}€</p>
                    <a href="{{ route('formation.purchase', [
                            'category' => $formation->category->slug,
                            'formation' => $formation->slug,
                            ]) }}"
                       type="button" class="btn btn-block btn-comprar">Comprar</a>

                    <div class="sumary">
                        <h2>Sumary</h2>
                            @foreach($chapters as $chapter)
                                <div class="sumary_item">
                                    <a href="{{ route('chapter.show', [
                                    'category' => $formation->category->slug,
                                    'formation' => $formation->slug,
                                    'chapter' => $chapter->slug,
                                ]) }}">{{ $chapter->title }}</a>
                                </div>
                            @endforeach
                    </div>

                    <div class="author">
                        <div class="logo"><img src="/img/icone-author.jpg" alt=""></div>

                        <div class="identity">
                            <p class="name">Elisenda Pascual</p>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                ero labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection
