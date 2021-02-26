@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')
    @include('funcional.ejemplos.slider')
    <div class="row section-info-moduls" style="min-height: 100vh">
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo1">
            <h5 class="color-yellow">Ejemplo 1</h5>
            <p class="my-4 bg-light p-3">Defina una función que se llame aEntero y transforme una lista de dígitos en el
                correspondiente valor entero (max 3 elementos en lista)</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            aEntero :: [Integer] -> Integer;
                            aEntero [d] = d
                            aEntero (d:m:xs) = aEntero((10 * d + m) : xs)
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
                            placeholder="Ingrese la lista de números [1,2,3,4]">
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

                    <span style="font-size: 10px">Para escribir una lista utilice la siguiente notación ej: [1,2,3]</span>
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
            <p class="my-4 bg-light p-3">Defina una función que se llame aLista y agregue cada uno de los dígitos de un
                número a una lista</p>


            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            aLista :: Integer -> [Integer]
                            aLista 0 = []
                            aLista x = (mod x 10 : (aLista (div x 10)))

                            reverseList :: [Integer] -> [Integer]
                            reverseList [] = []
                            reverseList (x:xs) = reverseList xs  ++ [x]

                            invtrans :: Integer -> [Integer]
                            invtrans x = do
                                let x_ = aLista x 
                                reverseList x_ 
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
            <p class="my-4 bg-light p-3">Escribir una función que determine si un año es bisiesto. Un año es bisiesto si es múltiplo de 4. Una excepción a la regla anterior es que los años múltiplos de 100 sólo son bisiestos cuando a su vez son múltiplos de 400</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                esMultiploDe::Integer->Integer->Bool 
                                esMultiploDe a b = (mod a b == 0)

                                esBisiesto :: Integer -> Bool 
                                esBisiesto x = esMultiploDe x 4 && (esMultiploDe x 100 && esMultiploDe x 400)
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
            <p class="my-4 bg-light p-3">Escriba una función que añada un dígito a la derecha de un número entero</p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                                aLaDerechaDe :: Integer -> Integer -> Integer 
                                aLaDerechaDe x y = x*10 + y
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

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo5">
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
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const id = {!! $identity !!}
    </script>
    <script src="{{ asset('js/ejemplos/mod2/mod.js') }}"></script>
    <script src="{{ asset('js/ejemplos/index.js') }}"></script>
@endsection
