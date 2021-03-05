@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <div class="bg-light">
        <main id="main">
            <div class="row mx-auto">
                <div class="col-lg-6 col-md-6">
                    <h3 class="color-yellow">Guía del paradigma funcional con haskell</h3>
                    <p>
                        Este es un nuevo software desarrollado por la Universidad Tecnológica de Pereira, el cual busca
                        servir como ayuda para el aprendizaje de la programación funcional basados en el lenguaje de
                        programación Haskell. En este software se puede encontrar temas relacionados con la programación
                        funcional y sobre Haskell como lenguaje de programación, se cuenta con un conjunto de módulos, en
                        los cuales cada módulo cuenta con unos apartados teóricos en donde explican los temas a tratar, y a
                        su vez un apartado de ejemplos, donde se muestra a la parte partica la teoría explicada en cada
                        módulo.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <aside id="main-image-content">
                        <img src="{{ asset('images/all/utpHaskell.png') }}" alt="HaskellLogo">
                    </aside>
                </div>
            </div>
        </main>
    </div>
    <div class="body">
        <div class="row mx-auto p-2 recuadros">
            <div class="col-lg-12 col-12 mt-1 explain">
                <h2 class="color-blue">¿Qué es Haskell?</h2>
                <p>
                    Haskell es uno de los lenguajes lideres a la hora de enseñar programación funcional, pues permite
                    escribir código simple y claro, enseña como estructurar y razonar programas. Haskell es diferente a
                    otros tipos de lenguajes de programación, pues Haskell promueve el estilo funcional o paradigma de
                    programación funcional. Con Haskell se pretende aprender crear programas considerablemente más simples
                    que con otros lenguajes y se busca obtener herramientas para estructurar y razonar sobre los programas.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 explain">
                <h2 class="color-yellow">¿Qué son los módulos?</h2>
                <p>
                    Los módulos son secciones en esta pagina donde se encuentran todos los temas relacionados a la
                    programación funcional y al lenguaje de programación Haskell, cada uno de estos módulos cuenta con una
                    sección de ejemplos en donde se muestra cómo poner en práctica, toda la teoría explicada en los módulos.
                    Este software cuenta con 9 módulos en total los cuales se encuentran abajo.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 explain">
                <h2 class="color-blue">¿Qué son los ejercicios?</h2>
                <p>
                    Los ejercicios se encuentran en un apartado dentro de cada módulo, estos ejercicios son problemas
                    planteados los cuales se le piden al usuario desarrollar dentro del software. Estos ejercicios buscan
                    afianzar los conocimientos del usuario en el paradigma funcional utilizando la sintaxis del lenguaje de
                    programación Haskell.
                </p>
            </div>
        </div>
    </div>
    <div class="row mx-auto p-2 bg-light">
        <div class="body">
            <div class="col-lg-12 col-12 mt-4 explain" id="modulos">
                <h2 class="color-yellow">MÓDULOS</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, animi possimus corrupti, facilis
                    aspernatur est modi optio eos consequatur sint iusto, tempora excepturi id molestias. Aut odit accusamus
                    reprehenderit perspiciatis.
                </p>
                <div id="arrow_open" class="mr-auto text-left">
                    <a href="#" id="open-moduls" class="">
                        <img src="{{ asset('images/icons/arrow-right.png') }}" alt="">
                        Abrir Módulos
                    </a>
                </div>
                <div id="moduls-content" class="desactivate">
                    <div id="carouselModuls" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item carousel-item-themes active">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img
                                                src="{{ asset('images/programacionFuncional/funciones.png') }}"
                                                alt="imagen"></div>
                                        <h3><a href="{{ route('funcional') }}">Programación Funcional</a></h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img
                                                src="{{ asset('images/queesHaskell/logo_haskell.png') }}" alt="imagen2">
                                        </div>
                                        <h3><a href="{{ route('introhaskell') }}">¿Qué es haskell?... introducción</a></h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img
                                                src="{{ asset('images/polimorfismo/poliformismo.png') }}" alt="imagen">
                                        </div>
                                        <h3><a href="{{ route('orden-superior') }}">Funciones de orden superior y polimorfismo</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-themes">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}"
                                                alt="imagen"></div>
                                        <h3><a href="#">Definición de tipos</a></h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}"
                                                alt="imagen"></div>
                                        <h3><a href="#">Sistema de clases en haskell</a></h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}"
                                                alt="imagen"></div>
                                        <h3>Listas</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-themes">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}"
                                                alt="imagen"></div>
                                        <h3><a href="#">Entrada y salida</a></h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}"
                                                alt="imagen"></div>
                                        <h3><a href="#">Arboles y grafos</a></h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}"
                                                alt="imagen"></div>
                                        <h3><a href="#">Tipos de datos abstractos</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselModuls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselModuls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#open-moduls').on('click', (e) => {
            e.preventDefault()
            // alert("Oprimido")
            $('#moduls-content').toggle('explode')
            $('#arrow_open').toggle('explode')
        })

    </script>
@endsection
