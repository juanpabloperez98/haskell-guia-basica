@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')
    @include('funcional.ejemplos.slider')
    <div class="row section-info-moduls" style="min-height: 100vh">
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo1">
            <h5 class="color-yellow">Ejemplo 1</h5>
            <p class="my-4 bg-light p-3">
                Según la definición de función, se pide que declare una función llamada
                dobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2 <br>
                <span style="color: #f8c555; font-weight: bold">Nota</span>: tenga en cuenta que esta función no es sintaxis
                del lenguaje Haskell
            </p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                dobleNumero: Z -> Z
                                dobleNumero: (x) -> x * 2
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
                        <input type="text" class="form-control" id="input1" placeholder="Ingresa el valor de X">
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
            <p class="my-4 bg-light p-3">
                Se requiere realizar una función que permita pedirle un número al usuario por pantalla y luego utilizando la
                función dobleNumero() pasándole como parámetro el número ingresado por el usuario, calcule la suma entre lo
                que devuelva la función y el número ingresado anteriormente
            </p>


            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            dobleNumero :: Int -> Int;
                                            dobleNumero x = x * 2
                                            ex :: IO ()
                                            ex = do
                                                putStrLn ("Ingrese numero")
                                                line1 <- getLine
                                                let num = (read line1 :: Int)
                                                let doble = dobleNumero(num)
                                                let suma = doble + num
                                                print("La suma del doble del numero mas el numeros es: " ++ show suma)
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
            <p class="my-4 bg-light p-3">
                Realice una función que pida un número a un usuario, y calcule la suma de los números comprendidos desde 1
                hasta el número ingresado por el usuario
            </p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                                    <code class="language-haskell">
                                        ex2 :: IO ()
                                        ex2 = do
                                            putStrLn ("Ingrese numero")
                                            line1 <- getLine
                                            let num = (read line1 :: Int)
                                            let suma = sum[1..num]
                                            print("La suma de los numeros comprendidos es: " ++ show suma)
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
            <p class="my-4 bg-light p-3">
                Dada una expresión, se pide que realice la reducción de la expresión hasta llegar a su forma normal
                (utilizando el método de reducción aplicativo)
            </p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-4 col-md-4 p-0">
                    <h5 class="color-yellow">Expresion</h5>
                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            tresVecesnum :: Int -> Int
                                            tresVecesnum y = y + y + y

                                            (3 + tresVecesnum 2) + tresVecesnum 3 
                                        </code>
                                </pre>

                    <div class="botones">
                        <a href="#" data-btnIdentity="4" class="btn btn-azul probar reduccion">
                            Ver Reducción <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 px-md-3 text-center desactivate" id="reducc4">
                    <h5 class="color-blue">Reducción</h5>
                    <pre class="line-numbers">
                                    <code class="language-haskell">
                                        (3 + tresVecesnum 2) + tresVecesnum 3 
                                        => { Por definición de tresVecesnum }
                                        (3 + tresVecesnum 2) + (3 + 3 + 3) 
                                        => { Por operador (+) }
                                        (3 + tresVecesnum 2) + 9
                                        => { Por definición de tresVecesnum }
                                        (3 + (2 + 2 + 2)) + 9
                                        => { Por operador (+) }
                                        (3 + 6) + 9
                                        => { Por operador (+) }
                                        9 + 9
                                        => { Por operador (+) }
                                        18
                                    </code>
                                </pre>
                </div>

                <div class="col-lg-4 col-md-4 p-0 text-center desactivate" id="explain4">
                    <h5 class="color-yellow">Explicación</h5>
                    <div class="bg-light p-2" style="width: 300px; min-height: 80px; margin: auto">
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

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo5">
            <h5 class="color-yellow">Ejemplo 5</h5>
            <p class="my-4 bg-light p-3">
                Dada una expresión, se pide que realice la reducción de la expresión hasta llegar a su forma normal
                (utilizando el método de reducción normal)
            </p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-4 col-md-4 col-12 p-0">
                    <h5 class="color-yellow">Expresion</h5>
                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            multiplica :: Int -> Int -> Int
                                            multiplica x y = x * y

                                            tresVecesnum :: Int -> Int
                                            tresVecesnum y = y + y + y

                                            (4 + tresVecesnum 2) - ((multiplica 2 3) + 4) + 1
                                        </code>
                                </pre>

                    <div class="botones">
                        <a href="#" data-btnIdentity="5" class="btn btn-azul probar reduccion">
                            Ver Reducción <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12 px-md-3 text-center desactivate" id="reducc5">
                    <h5 class="color-blue">Reducción</h5>
                    <pre class="line-numbers">
                                    <code class="language-haskell">
                                        (4 + tresVecesnum 2) - ((multiplica 2 3) + 4) + 1
                                        => { Por definición de tresVecesnum }
                                        (4 + (2 + 2 + 2)) - ((multiplica 2 3) + 4) + 1
                                        => { Por operador (+) }
                                        (4 + 6) - ((multiplica 2 3) + 4) + 1
                                        => { Por operador (+) }
                                        10 - ((multiplica 2 3) + 4) + 1
                                        => { Por definición de multiplica }
                                        10 - ((2 * 3) + 4) + 1
                                        => { Por operador (*) }
                                        10 - (6 + 4) + 1
                                        => { Por operador (+) }
                                        10 - 10 + 1
                                        => { Por operador (-) }
                                        0 + 1
                                        => { Por operador (+) }
                                        1
                                    </code>
                                </pre>
                </div>

                <div class="col-lg-4 col-md-4 col-12 p-0 text-center desactivate" id="explain5">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 300px; min-height: 80px; margin: auto">
                        <p id="explain_code5" class="text-left p-2"></p>
                    </div>
                    <div class="botonespaso mt-md-2">
                        <a href="#" data-exercise="5" class="btn btn-azul paso-left">
                            <img src="{{ asset('/images/icons/left-arrow.png') }}" alt="left-arrow">
                        </a>
                        <a href="#" data-exercise="5" class="btn btn-azul paso-right">
                            <img src="{{ asset('/images/icons/right-arrow.png') }}" alt="right-arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo6">
            <h5 class="color-yellow">Ejemplo 6</h5>
            <p class="my-4 bg-light p-3">
                Dada una expresión, se pide que realice la reducción de la expresión hasta llegar a su forma normal
                (utilizando el método de reducción perezosa)
            </p>


            <div class="row mx-auto mt-5">
                <div class="col-lg-4 p-0">
                    <h5 class="color-yellow">Expresion</h5>
                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            tresVecesnum :: Int -> Int
                                            tresVecesnum y = y + y + y

                                            tresVecesnum( tresVecesnum 3 ) + tresVecesnum( tresVecesnum 2 ) 
                                        </code>
                                </pre>

                    <div class="botones">
                        <a href="#" data-btnIdentity="6" class="btn btn-azul probar reduccion">
                            Ver Reducción <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 px-md-3 text-center desactivate" id="reducc6">
                    <h5 class="color-blue">Reducción</h5>
                    <pre class="line-numbers">
                                    <code class="language-haskell">
                                        tresVecesnum( tresVecesnum 3 ) + tresVecesnum( tresVecesnum 2 )
                                        => { Por definición de tresVecesnum }
                                        a + a + a donde a = tresVecesnum 3
                                        => { Por definición de tresVecesnum }
                                        a + a + a donde a = b + b + b y donde b = 3
                                        => { Por el operador (+) }
                                        a + a + a donde a = 9
                                        => { Por el operador (+) }
                                        27
                                        => { Por definición de tresVecesnum }
                                        a + a + a donde a = tresVecesnum 2
                                        => { Por definición de tresVecesnum }
                                        a + a + a donde a = b + b + b y donde b = 2
                                        => { Por el operador (+) }
                                        a + a + a donde a = 6
                                        => { Por el operador (+) }
                                        18
                                        => { Por el operador (+) }
                                        45
                                    </code>
                                </pre>
                </div>

                <div class="col-lg-4 p-0 text-center desactivate" id="explain6">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 300px; min-height: 80px; margin: auto">
                        <p id="explain_code6" class="text-left p-2"></p>
                    </div>
                    <div class="botonespaso mt-md-2">
                        <a href="#" data-exercise="6" class="btn btn-azul paso-left">
                            <img src="{{ asset('/images/icons/left-arrow.png') }}" alt="left-arrow">
                        </a>
                        <a href="#" data-exercise="6" class="btn btn-azul paso-right">
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
    <script src="{{ asset('js/ejemplos/mod1/mod.js') }}"></script>
    <script src="{{ asset('js/ejemplos/index.js') }}"></script>
@endsection
