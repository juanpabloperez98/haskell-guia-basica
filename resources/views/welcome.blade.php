@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <div id="carouselExampleControls" class="carousel slide pt-5" data-ride="carousel">
        <div class="carousel-inner carousel-inner-main">
            <div class="carousel-item carousel-item-main active">
                <h3>APRENDE EL PARADIGMA DE PROGRAMACIÓN FUNCIONAL</h3>
                <img src="{{ asset('images/images_slider/1.jpg') }}" alt="imagen1">
            </div>
            <div class="carousel-item carousel-item-main">
                <h3>CONOCE EL LENGUAJE HASKELL</h3>
                <img src="{{ asset('images/images_slider/2.jpg') }}" alt="imagen2">
            </div>
            <div class="carousel-item carousel-item-main">
                <h3>UNA MANERA RAPIDA Y SENCILLA DE APRENDER A PROGRAMAR</h3>
                <img src="{{ asset('images/images_slider/3.jpg') }}" alt="imagen3">
            </div>
            <div class="carousel-item carousel-item-main">
                <h3>ENTIENDE LA PROGRAMACIÓN FUNCIONAL CON ESTA GUÍA</h3>
                <img src="{{ asset('images/images_slider/4.jpg') }}" alt="imagen4">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div id="body">
        <div class="row mx-auto p-2">
            <div class="col-lg-12 col-12 mt-1 explain">
                <h2 class="">¿Que es Haskell?</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, animi possimus corrupti, facilis
                    aspernatur est modi optio eos consequatur sint iusto, tempora excepturi id molestias. Aut odit accusamus
                    reprehenderit perspiciatis.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, animi possimus corrupti, facilis
                    aspernatur est modi optio eos consequatur sint iusto, tempora excepturi id molestias. Aut odit accusamus
                    reprehenderit perspiciatis.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 explain">
                <h2>¿Que son los módulos?</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit excepturi nesciunt at minus, distinctio
                    nostrum alias fugit ad suscipit aperiam?
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit excepturi nesciunt at minus, distinctio
                    nostrum alias fugit ad suscipit aperiam?
                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 explain">
                <h2>¿Que son los ejercicios?</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit excepturi nesciunt at minus, distinctio
                    nostrum alias fugit ad suscipit aperiam?
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit excepturi nesciunt at minus, distinctio
                    nostrum alias fugit ad suscipit aperiam?
                </p>
            </div>
            <div class="col-lg-12 col-12 mt-4 explain" id="modulos">
                <h2 class="">MÓDULOS</h2>
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
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 1</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 2</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 3</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-themes">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 4</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 5</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 6</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-themes">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 7</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 8</h3>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img-slide"><img src="{{ asset('images/operadores.png') }}" alt="imagen1"></div>
                                        <h3>TEMA 9</h3>
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
        $('#open-moduls').on('click',(e)=>{
            e.preventDefault()
            // alert("Oprimido")
            $('#moduls-content').toggle('explode')
            $('#arrow_open').toggle('explode')
        })
    </script>
@endsection
