@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')
    @include('funcional.ejemplos.slider')
    <div class="row section-info-moduls" style="min-height: 100vh">
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo1">
            <h5 class="color-yellow">Ejemplo 1</h5>
            <p class="my-4 bg-light p-3">Defina una función mapSucesor dada una lista de enteros, y que esta devuelva la lista de sucesores de cada entero</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            mapSucesor :: [Integer] -> [Integer]
                            mapSucesor [] = []
                            mapSucesor (x:xs) = x+1 :  mapSucesor xs
                        </code>
                    </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro1">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="bg-light p-2 desactivate" id="resultado1" style="min-height: 60px;">
                        <h6 class="text-center font-weight-bold">Resultado</h6>
                        <p class="text-center" id="resultp1"></p>
                    </div>

                    <form action="" data-form="1" id="form1" class="formulario desactivate">
                        <input type="text" class="form-control" id="input1"
                            placeholder="Ingrese un número">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                alt="run logo">
                        </button>
                    </form>

                    <div class="botones">
                        <a href="#" data-btnIdentity="1" class="btn btn-azul probar">
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
            <p class="my-4 bg-light p-3">Realizar una función que, dada una lista de enteros, devuelve una lista con los elementos que son positivos</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            filterPositivos  :: [Integer] -> [Integer]
                            filterPositivos [] = []
                            filterPositivos (x:xs) | x>=0 = x : filterPositivos xs 
                                                    |otherwise = filterPositivos xs 
                        </code>
                    </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro2">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="bg-light p-2 desactivate" id="resultado2" style="min-height: 60px;">
                        <h6 class="text-center font-weight-bold">Resultado</h6>
                        <p class="text-center" id="resultp2"></p>
                    </div>

                    <form action="" data-form="2" id="form2" class="formulario desactivate">
                        <input type="text" class="form-control" id="input2" placeholder="Ingrese numero">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                alt="run logo">
                        </button>
                    </form>

                    <div class="botones">
                        <a href="#" data-btnIdentity="2" class="btn btn-azul probar">
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
            <p class="my-4 bg-light p-3">Defina recursivamente una función que, dada una lista, devuelve su último elemento</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                lasts :: [a] -> a
                                lasts [] = error "Lista vacia"
                                lasts [n] = n
                                lasts (x:xs) = lasts xs 
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

                    <form action="" data-form="3" id="form3" class="formulario desactivate">
                        <input type="text" class="form-control" id="input3" placeholder="Ingrese numero">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                alt="run logo">
                        </button>
                    </form>

                    <div class="botones">
                        <a href="#" data-btnIdentity="3" class="btn btn-azul probar">
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
            <p class="my-4 bg-light p-3">Dada una lista x y un número n, devuelve una lista con los primeros n elementos de lista recibida. Si la lista recibida tuviera menos de n elementos, devuelve la lista completa.</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                takeN :: [a] -> Int -> [a]
                                takeN [] n =[]
                                takeN (x:xs) n | not( n == 0) = x : takeN xs (n-1)
                                               | otherwise = [] 
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

                    <form action="" data-form="4" id="form4" class="formulario desactivate">
                        <input type="text" class="form-control" id="input4" placeholder="Ingrese lista">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                alt="run logo">
                        </button>
                    </form>

                    <div class="botones">
                        <a href="#" data-btnIdentity="4" class="btn btn-azul probar">
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
    <script src="{{ asset('js/ejemplos/mod6/mod.js') }}"></script>
    <script src="{{ asset('js/ejemplos/index.js') }}"></script>
@endsection
