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
                    <h1>Formation 1</h1>                                   <!--   $formation->title  -->

                    <div class="tags">                                            <!--  foreach sur les tags -->
                        <a href="http://127.0.0.1:8080/blog/tag:acompanyment" class="tag">#acompanyment</a>
                        <a href="http://127.0.0.1:8080/blog/tag:acompanyment" class="tag">#acompanyment</a>
                    </div>

                    <div class="resume">
                        <p>
                            Culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
                            error sit voluptartem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                            illo inventore veritatis et quasi ropeior architecto beatae vitae dicta sunt explicabo. Nemo
                            eniem ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                            magni dolores eosep quiklop ratione voluptatem sequi nesciunt. Neque porro quisquam est, quepi
                            dolorem ipsum quia dolor srit amet, consectetur adipisci velit, seid quia non numquam eiuris
                            modi tempora incidunt ut labore et dolore magnam aliquam quaerat iope voluptatem.
                            Lorem ipsum dolor sit amet, consectetur adipisifwcing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore roipi magna aliqua. Ut enim ad minim veeniam, quis nostruklad exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in tufpoy voluptate velit esse cillum dolore eu fugiat nulla parieratur. Excepteur sint occaecat
                            cupidatat.

                            Lorem ipsum dolor sit amet, consectetur adipisifwcing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore roipi magna aliqua. Ut enim ad minim veeniam, quis nostruklad exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in tufpoy voluptate velit esse cillum dolore eu fugiat nulla parieratur. Excepteur sint occaecat
                            cupidatat.

                        </p>
                        <hr>
                        <p class="citation">
                            “Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.”
                        </p>
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
