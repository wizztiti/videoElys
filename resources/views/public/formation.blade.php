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
                        <a href="http://127.0.0.1:8080/blog/tag:acompanyment" class="tag">#acompanyment</a>
                        <a href="http://127.0.0.1:8080/blog/tag:acompanyment" class="tag">#acompanyment</a>
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

                    <button type="button" class="btn btn-block btn-comprar">Comprar</button>

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
