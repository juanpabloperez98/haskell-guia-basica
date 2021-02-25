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
        var pasoapaso = {
            'ejercicio1': {
                1: "1 Se declara la sentencia dobleNumero en forma de función, indicándole que recibe un valor y retorna otro valor",
                2: "2 Se inicializa la sentencia dobleNumero, se le indica que recibe un parámetro x y esta función retornara el valor de multiplicar x * 2",
                'line_actual': 1,
                'total_lines': 2
            },
            'ejercicio2': {
                1: "1 Se declara la sentencia dobleNumero la cual se indica que recibirá un valor entero y se retornará otro valor entero",
                2: "2 Se inicializa la sentencia dobleNumero, se le indica que recibe un parámetro x y esta función retornara el valor de multiplicar x * 2",
                3: "3 Se crea una sesión la cual se llamara ex (NOTA: la expresión IO() se le indica a la sesión para declarar que se van a usar acciones de entrada y salida para poder pedir datos al usuario)",
                4: "4 La sentencia creada se iguala a un bloque de instrucciones (NOTA: la expresión do, sirve para indicar que se va hacer un bloque que contendrá múltiples acciones I/O)",
                5: "5 Se utiliza la función putStrLn para imprimir pon pantalla un mensaje, en este caso el mensaje es: “Ingrese número”",
                6: "6 La función getLine es una función de entrada, por lo que permite que un usuario ingrese un dato, al utilizar el <- se le asigna el valor ingresado por el usuario a una variable llamada line1",
                7: "7 Cada dato que ingrese el usuario utilizando la función getLine, es tomado como un dato de tipo string, por lo que para convertirlo a entero se utiliza la función read seguido de la variable que almacena el dato ingresado, en este caso line1 y luego se le indica con :: Int que se quiere convertir a un tipo de dato entero, el valor convertido será almacenado en una variable llamada num",
                8: "8 Ahora se hace el llamado a la función dobleNumero pasándole como parámetro la variable num (Recordar que esta función retorna el número pasado como parámetro multiplicado por 2), el resultado retornado se almacenara en la variable doble",
                9: "9 Luego se realiza la suma entre los valores almacenados en las variables doble (recordar que el valor de esta variable fue lo que retorno la función dobleNumero) y num (recordar que el valor de esta variable es el dato ingresado por el usuario), esta operación es almacenada en una variable llamada suma",
                10: "10 Por ultimo se imprime un mensaje con el resultado de la suma (NOTA: se utiliza la función print puesto que esta imprime cualquier tipo de valor ya sea string, entero o cualquier otro sin embargo, para concatenar el mensaje y el valor de la suma es necesario usar la función show que permite convertir a string un entero, en este caso el entero de la variable suma)",
                'line_actual': 1,
                'total_lines': 10
            },
            'ejercicio3': {
                1: "1 Se crea una sesión llamada ex2 (Similar a la del ejemplo anterior) y se le indica que va a usar acciones de entrada y salida",
                2: "2 La sentencia creada se iguala a un bloque de instrucciones",
                3: "3 Se utiliza la función putStrLn para imprimir pon pantalla un mensaje, en este caso el mensaje es: “Ingrese número”",
                4: "4 Se utiliza la función getLine para pedirle un número al usuario, este dato se almacena en la variable num",
                5: "5 Se convierte el dato a entero utilizando la función read",
                6: "6 Se utiliza la función sum indicándole que se quiere sumar todos los números comprendidos entre 1 y el número ingresado por el usuario, el resultado de esa suma, es almacenado en la variable suma",
                7: "7 Se imprime el mensaje del total de la suma, utilizando la función show se convierte la variable suma en string para poder concatenarla con el mensaje",
                'line_actual': 1,
                'total_lines': 7
            },
            'ejercicio4': {
                1: "Esta es la línea 1 de la explicación paso a paso",
                2: "Esta es la línea 2 de la explicación paso a paso",
                3: "Esta es la línea 3 de la explicación paso a paso",
                4: "Esta es la línea 4 de la explicación paso a paso",
                5: "Esta es la línea 5 de la explicación paso a paso",
                6: "Esta es la línea 6 de la explicación paso a paso",
                7: "Esta es la línea 7 de la explicación paso a paso",
                8: "Esta es la línea 8 de la explicación paso a paso",
                9: "Esta es la línea 9 de la explicación paso a paso",
                10: "Esta es la línea 10 de la explicación paso a paso",
                11: "Esta es la línea 11 de la explicación paso a paso",
                12: "Esta es la línea 12 de la explicación paso a paso",
                13: "Esta es la línea 13 de la explicación paso a paso",
                'line_actual': 1,
                'total_lines': 13
            },
            'ejercicio5': {
                1: "Esta es la línea 1 de la explicación paso a paso",
                2: "Esta es la línea 2 de la explicación paso a paso",
                3: "Esta es la línea 3 de la explicación paso a paso",
                4: "Esta es la línea 4 de la explicación paso a paso",
                5: "Esta es la línea 5 de la explicación paso a paso",
                6: "Esta es la línea 6 de la explicación paso a paso",
                7: "Esta es la línea 7 de la explicación paso a paso",
                8: "Esta es la línea 8 de la explicación paso a paso",
                9: "Esta es la línea 9 de la explicación paso a paso",
                10: "Esta es la línea 10 de la explicación paso a paso",
                11: "Esta es la línea 11 de la explicación paso a paso",
                12: "Esta es la línea 12 de la explicación paso a paso",
                13: "Esta es la línea 13 de la explicación paso a paso",
                14: "Esta es la línea 14 de la explicación paso a paso",
                15: "Esta es la línea 15 de la explicación paso a paso",
                16: "Esta es la línea 16 de la explicación paso a paso",
                17: "Esta es la línea 17 de la explicación paso a paso",
                'line_actual': 1,
                'total_lines': 17
            },
            'ejercicio6': {
                1: "Esta es la línea 1 de la explicación paso a paso",
                2: "Esta es la línea 2 de la explicación paso a paso",
                3: "Esta es la línea 3 de la explicación paso a paso",
                4: "Esta es la línea 4 de la explicación paso a paso",
                5: "Esta es la línea 5 de la explicación paso a paso",
                6: "Esta es la línea 6 de la explicación paso a paso",
                7: "Esta es la línea 7 de la explicación paso a paso",
                8: "Esta es la línea 8 de la explicación paso a paso",
                9: "Esta es la línea 9 de la explicación paso a paso",
                10: "Esta es la línea 10 de la explicación paso a paso",
                11: "Esta es la línea 11 de la explicación paso a paso",
                12: "Esta es la línea 12 de la explicación paso a paso",
                13: "Esta es la línea 13 de la explicación paso a paso",
                14: "Esta es la línea 14 de la explicación paso a paso",
                15: "Esta es la línea 15 de la explicación paso a paso",
                16: "Esta es la línea 16 de la explicación paso a paso",
                17: "Esta es la línea 17 de la explicación paso a paso",
                18: "Esta es la línea 18 de la explicación paso a paso",
                19: "Esta es la línea 19 de la explicación paso a paso",
                'line_actual': 1,
                'total_lines': 19
            }
        }
    </script>
    <script src="{{ asset('js/ejemplos/mod1/index.js') }}"></script>
@endsection
