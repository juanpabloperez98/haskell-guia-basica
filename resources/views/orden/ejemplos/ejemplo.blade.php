@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')
    @include('funcional.ejemplos.slider')
    <div class="row section-info-moduls" style="min-height: 100vh">
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo1">
            <h5 class="color-yellow">Ejemplo 1</h5>
            <p class="my-4 bg-light p-3">Utilizando notación lamda, realice una función que determine si un número es par o impar, de ser par a dicho número se le sumara 2, de lo contrario se le sumara 1</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            esPar :: Integer -> Bool
                            esPar = \x -> mod x 2 == 0

                            sumaNum :: Integer -> Integer
                            sumaNum = \x -> if esPar x then x + 2 else x + 1
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
            <p class="my-4 bg-light p-3">Utilizando notación lamda, cree una función que permita recibir tres números y los junte de manera inversa (Por ejemplos 1 2 3, se debe juntar como el número 321)</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            maneraInversa :: Integer -> Integer -> Integer -> Integer 
                            maneraInversa = \x y z -> z*100 + y*10 + x 
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
            <p class="my-4 bg-light p-3">Realice una función que permite recibir dos números y devuelva una serie de números convertidos a cadenas, el primer número indicara desde que número se desea imprimir la serie y el segundo número indicara de ahí en adelante cuantos números se desea mostrar. Por ejemplo 3 4, el resultado seria “4 5 6 7”. Nota: es necesario utilizar parcialización un operador de sección para realizar este ejercicio</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                sumNum :: Integer -> Integer 
                                sumNum = (+ 1)

                                serieNums :: Integer-> Integer -> String
                                serieNums a 0 = ""
                                serieNums a n = show(sumNum(a))++ " " ++ serieNums(a+1)(n-1)
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
            <p class="my-4 bg-light p-3">Utilizando funciones de orden superior realice una función que calcule el cuadrado de un número, luego se requiere que al resultado de esa operación se le vuelva a calcular el cuadrado, es necesario poder utilizar operadores de sección. Por ejemplo, si el número ingresado es 3, el primer cuadrado sería 9, y el segundo cuadrado sería 81.</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                exponente :: Float -> Float  
                                exponente = (**2)
                                
                                dosVeces :: (Float -> Float) -> Float -> Float
                                dosVeces f x = f (f x)

                                calcularExpo :: Float -> Float 
                                calcularExpo n = dosVeces exponente n
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
                        <input type="text" class="form-control" id="input4" placeholder="Ingrese numero">
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

        {{-- <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo5">
            <h5 class="color-yellow">Ejemplo 5</h5>
            <p class="my-4 bg-light p-3">Escriba una función que devuelva la multiplicación de dos números utilizando sumas</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                multiNums :: Integer -> Integer -> Integer
                                multiNums x y 
                                    | y <= 0 = 0
                                    | otherwise = do
                                        let newy = y-1 
                                        x + multiNums x newy
                            </code>
                        </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro5">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%" alt="flecha izquierda">
                    </div>

                    <div class="bg-light p-2 desactivate" id="resultado5" style="min-height: 60px;">
                        <h6 class="text-center font-weight-bold">Resultado</h6>
                        <p class="text-center" id="resultp5"></p>
                    </div>

                    <form action="" data-form="5" id="form5" class="formulario desactivate">
                        <input type="text" class="form-control" id="input5" placeholder="Ingrese numero">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                alt="run logo">
                        </button>
                    </form>

                    <div class="botones">
                        <a href="#" data-btnIdentity="5" class="btn btn-azul probar">
                            Probar <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-0 text-center desactivate" id="explain5">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 400px; min-height: 80px; margin: auto">
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
            <p class="my-4 bg-light p-3">Sea una lista de números enteros |f1, f2, …, fn| defina un operador (|>) de forma
                que se tenga |f1*x, f2*x, …, fn*x|</p>


                <div class="row mx-auto mt-5">
                    <div class="col-lg-6 p-0">
                        <h5 class="color-yellow">Codigo</h5>
                        <pre class="line-numbers">
                                <code class="language-haskell">
                                    funprueba :: Integer -> Integer 
                                    funprueba n = n * 2

                                    funprueba2 :: Integer -> Integer 
                                    funprueba2 n = n * 3

                                    funprueba3 :: Integer -> Integer 
                                    funprueba3 n = n * 4

                                    (|>) :: [Integer->Integer] -> Integer -> [Integer]
                                    [] |> x = []
                                    (f : fs) |> x = f x : (fs |> x) 

                                    implement :: Integer  -> [Integer]
                                    implement n = [funprueba,funprueba2,funprueba3] |> n
                                </code>
                            </pre>
                        <div class="desactivate ejemplocuadro" id="ejemplocuadro6">
                            <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%" alt="flecha izquierda">
                        </div>
    
                        <div class="bg-light p-2 desactivate" id="resultado6" style="min-height: 60px;">
                            <h6 class="text-center font-weight-bold">Resultado</h6>
                            <p class="text-center" id="resultp6"></p>
                        </div>
    
                        <form action="" data-form="6" id="form6" class="formulario desactivate">
                            <input type="text" class="form-control" id="input6" placeholder="Ingrese numero">
                            <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                                <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/next.png') }}"
                                    alt="run logo">
                            </button>
                        </form>
    
                        <div class="botones">
                            <a href="#" data-btnIdentity="6" class="btn btn-azul probar">
                                Probar <img class="ml-1" style="width: 30px" src="{{ asset('images/icons/run.png') }}"
                                    alt="run logo">
                            </a>
                        </div>
                    </div>
    
                    <div class="col-lg-6 p-0 text-center desactivate" id="explain6">
                        <h5 class="color-blue">Explicación</h5>
                        <div class="bg-light p-2" style="width: 400px; min-height: 80px; margin: auto">
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
        </div> --}}
    </div>
@endsection

@section('scripts')
    <script>
        const id = {!! $identity !!}
        let page = '{!! $dad_page !!}'
    </script>
    <script src="{{ asset('js/ejemplos/mod3/mod.js') }}"></script>
    <script src="{{ asset('js/ejemplos/index.js') }}"></script>
@endsection
