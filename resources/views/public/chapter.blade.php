@extends('layouts.app')

@section('content')
    <div class="chapter">
        <div class="row justify-content-center">
            <div class="col">
                <div class="teaser-video">
                    <img src="/img/teaser-video.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="chapter-resume">
                    <h1>{{ $chapter->title }}</h1>                                   <!--   $chapter->title  -->

                    <div class="resume">
                        <p>
                            {!! $chapter->text !!}
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
