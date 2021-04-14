@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')
    @include('funcional.ejemplos.slider')
    <div class="row section-info-moduls" style="min-height: 100vh">
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo1">
            <h5 class="color-yellow">Ejemplo 1</h5>
            <p class="my-4 bg-light p-3">Definir una instancia de Ord para el tipo data Nat = Cero | Suc Nat</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            data Nat = Cero | Suc Nat
                            instance Ord Nat where
                                Cero <=  _ = True
                                Suc _ <= Cero = False
                                Suc n <= Suc m = n <= m
                        </code>
                    </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro1">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="botones">
                        <a href="#" data-btnIdentity="1" class="btn btn-azul probar reduccion">
                            Probar <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-0 text-center desactivate" id="explain1">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 400px; min-height: 80px; margin: auto">
                        <p id="explain_code1" class="text-left p-2"></p>
                    </div>
                    <div class="botonespaso mt-md-2">
                        <a href="#" data-exercise="1" class="btn btn-azul paso-left">
                            <img src="{{ asset('/images/icons/left-arrow.png') }}" alt="left-arrow">
                        </a>
                        <a href="#" data-exercise="1" class="btn btn-azul paso-right">
                            <img src="{{ asset('/images/icons/right-arrow.png') }}" alt="right-arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 mb-5 desactivate" id="ejemplo2">
            <h5 class="color-yellow">Ejemplo 2</h5>
            <p class="my-4 bg-light p-3">Definir una instancia de Eq y una instancia de Ord para el tipo ColorSimple: data ColorSimple = Violeta | Azul | Verde | Amarillo | Naranja | Rojo teniendo en cuenta que dos colores simples son iguales si son idénticos y que el orden de los colores es el que viene determinado por la enumeración dada.</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            dataColSimp = Violeta|Anil|Azul|Verde|Amarillo|Naranja|Rojo deriving(Eq,Ord)
                        </code>
                    </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro2">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="botones">
                        <a href="#" data-btnIdentity="2" class="btn btn-azul probar reduccion">
                            Probar <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-0 text-center desactivate" id="explain2">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 400px; min-height: 80px; margin: auto">
                        <p id="explain_code2" class="text-left p-2"></p>
                    </div>
                    <div class="botonespaso mt-md-2">
                        <a href="#" data-exercise="2" class="btn btn-azul paso-left">
                            <img src="{{ asset('/images/icons/left-arrow.png') }}" alt="left-arrow">
                        </a>
                        <a href="#" data-exercise="2" class="btn btn-azul paso-right">
                            <img src="{{ asset('/images/icons/right-arrow.png') }}" alt="right-arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo3">
            <h5 class="color-yellow">Ejemplo 3</h5>
            <p class="my-4 bg-light p-3">Definir una instancia de Eq para el tipo Color:
                data Color = Violeta | Azul | Verde | Amarillo | Naranja | Rojo | Mezcla Color Color <br>
                Teniendo en cuenta que dos colores son iguales si, o bien siendo simples son idénticos, o bien siendo compuestos tienen el mismo porcentaje de cada color.</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                data Marcador = M(Int,Int,Int,Int,Int,Int,Int)
                                instance Eq Marcador where
                                    M(a1,a2,a3,a4,a5,a6,a7) == M(b1,b2,b3,b4,b5,b6,b7) = 
                                    (a1==b1) && (a2==b2) && (a3==b3) && (a4==b4) && 
                                    (a5==b5) && (a6==b6) && (a7==b7
                                instance Eq Color where
                                    c1 == c2 = (creaMarcador c1) == (creaMarcador c2)
                            </code>
                        </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro3">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="bg-light p-2 desactivate" id="resultado3" style="min-height: 60px;">
                        <h6 class="text-center font-weight-bold">Resultado</h6>
                        <p class="text-center" id="resultp3"></p>
                    </div>

                   {{--  <form action="" data-form="3" id="form3" class="formulario desactivate">
                        <input type="text" class="form-control" id="input3" placeholder="Ingrese nombre">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                alt="run logo">
                        </button>
                    </form> --}}

                    <div class="botones">
                        <a href="#" data-btnIdentity="3" class="btn btn-azul probar reduccion">
                            Probar <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-0 text-center desactivate" id="explain3">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 400px; min-height: 80px; margin: auto">
                        <p id="explain_code3" class="text-left p-2"></p>
                    </div>
                    <div class="botonespaso mt-md-2">
                        <a href="#" data-exercise="3" class="btn btn-azul paso-left">
                            <img src="{{ asset('/images/icons/left-arrow.png') }}" alt="left-arrow">
                        </a>
                        <a href="#" data-exercise="3" class="btn btn-azul paso-right">
                            <img src="{{ asset('/images/icons/right-arrow.png') }}" alt="right-arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo4">
            <h5 class="color-yellow">Ejemplo 4</h5>
            <p class="my-4 bg-light p-3">Una mochila es como un conjunto excepto en que un elemento dailo puede estar más de una vez; suponiendo que el tipo base de la mochila dispone de la igualdad y de una relación de orden: <br>
                Escriba una definición polimórfica para mochilas
            </p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                dataMochila a=M[(a,Int)]
                            </code>
                        </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro4">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="bg-light p-2 desactivate" id="resultado4" style="min-height: 60px;">
                        <h6 class="text-center font-weight-bold">Resultado</h6>
                        <p class="text-center" id="resultp4"></p>
                    </div>

                    <div class="botones">
                        <a href="#" data-btnIdentity="4" class="btn btn-azul probar reduccion">
                            Probar <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-0 text-center desactivate" id="explain4">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 400px; min-height: 80px; margin: auto">
                        <p id="explain_code4" class="text-left p-2"></p>
                    </div>
                    <div class="botonespaso mt-md-2">
                        <a href="#" data-exercise="4" class="btn btn-azul paso-left">
                            <img src="{{ asset('/images/icons/left-arrow.png') }}" alt="left-arrow">
                        </a>
                        <a href="#" data-exercise="4" class="btn btn-azul paso-right">
                            <img src="{{ asset('/images/icons/right-arrow.png') }}" alt="right-arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const id = {!! $identity !!}
        let page = '{!! $dad_page !!}'
    </script>
    <script src="{{ asset('js/ejemplos/mod5/mod.js') }}"></script>
    <script src="{{ asset('js/ejemplos/index.js') }}"></script>
@endsection
