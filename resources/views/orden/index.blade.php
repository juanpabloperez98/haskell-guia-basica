@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Funciones de orden superior y polimorfismo</h4>
        <ul>
            <li><a href="#" data-name="parcializacion" class="item active">3.1 Parcialización</a></li>
            <li><a href="#" data-name="polimorfismo" class="item">3.2 Polimorfismo</a></li>
            <li><a href="#" data-name="ejemplos" class="item">3.3 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">3.4 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" style="min-height: 100vh" id="parcializacion">
            <h4 class="color-yellow">3.1 Parcialización</h4>
            <p class="my-4">
                En Haskell las funciones de más de un argumento se pueden interpretar como funciones que toman un único argumento y devuelven como resultado otra función con un argumento menos. Este mecanismo que permite representar funciones de varios argumentos mediante funciones de un único argumento se denomina parcialización. Para explicar la idea, se considera la siguiente función:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    inc :: Integer -> Integer
                    inc x = x + 1
                </code>
            </pre>
            <p class="my-4">
                Haskell, como la mayoría de los lenguajes funcionales, está basado en el λ-cálculo, en el cual el único modo de escribir funciones es utilizando λ-expresiones. En Haskell, la ecuación inc x = x + 1 es una alternativa a esta otra:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Inc = \x -> x + 1
                </code>
            </pre>
            <p class="my-4">
                <span style="color: #fdba36;font-weight: bold">NOTA</span>: La expresión λ es expresada en Haskell como \
            </p>
            <p class="my-4">
                Las dos definiciones son equivalentes, y la segunda ayuda a comprender la notación parcializada. A partir de esta definición, la expresión inc 10 se reduce del siguiente modo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    inc 10
                    => {definición de inc}
                    (\x -> x + 1) 10
                    => {sustituyendo x por 10 en el cuerpo de la λ-expresión}
                    (10 + 1)
                    => {operador(+)}
                    11
                </code>
            </pre>

            <p class="my-4">
                Considérese ahora la siguiente función de dos argumentos:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    sumaCuadrados :: Integer -> Integer -> Integer
                    sumaCuadrados x y = x * x + y * y
                </code>
            </pre>
            <p class="my-4">
                De nuevo, la definición es una simplificación de esta otra:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    sumaCuadrados :: Integer -> Integer -> Integer
                    sumaCuadrados \ x y -> x * x + y * y
                </code>
            </pre>
            <p class="my-4">
                La λ-expresión \ x y -> x * x + y * y <br> es a su vez, un modo más cómodo de escribir \x -> (\y -> x * x + y * y). Tal equivalencia se generaliza en la forma:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Regla de λ-expresión
                    λx1x2 ... xn -> £ => λx1 -> (λx2 -> (... -> (λxn -> c)))
                </code>
            </pre>
            <p class="my-4">
                Además, se ha de recordar que el constructor de tipo funcional (->) es asociativo a la derecha, por lo que el tipo de Integer -> Integer -> Integer denota realmente el tipo Integer -> (Integer -> Integer). En general:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Asociatividad a la derecha de (->)
                    t1 -> t2 -> ... tn => (t1 -> (t2 -> (... -> tn)))
                </code>
            </pre>
            <p class="my-4">
                Es decir, <span style="color: blue">sumaCuadrados</span> es una función que toma un único argumento de tipo Integer y devuelve como resultado la función (\y -> x * x + y * y) de tipo Integer -> Integer; ésta toma un argumento (el correspondiente a y) computando la expresión x * x + y * y de tipo Integer. Para que las expresiones como <span style="color: blue">sumaCuadrados</span> 2 3 tengan sentido, lo único que hace falta es que la aplicación de funciones se asocie a la izquierda, como de hecho ocurre en Haskell. La expresión <span style="color: blue">sumaCuadrados</span> 2 3 denota realmente la expresión (<span style="color: blue">sumaCuadrados</span> 2)3. En general:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Asociatividad izquierda de la aplicación de funciones
                    fa1a2 ... an => (((f a1)a2)... an)
                </code>
            </pre>
            <p class="my-4">
                La reducción de la expresión sumaCuadrados 2 3 se produce del siguiente modo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    sumaCuadrados 2 3
                    => {La aplicación es asociativa a la izquierda}
                    (sumaCuadrados 2)3
                    =>{definición de sumaCuadrados}
                    ((\x -> (\y -> x*x + y*y))2)3
                    =>{sustituyendo x por 2 en el cuerpo de la λ-expresión}
                    (\y -> 2*2 + y*y)3
                    =>{sustituyendo y por 3 en el cuerpo de la λ-expresión}
                    2 * 2 + 3 * 3
                    =>{operador (*)}
                    4 + 3 * 3
                    =>{operador (*)}
                    4 + 9
                    =>{operador (+)}
                    13
                </code>
            </pre>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Aplicación Parcial</h5>
                <p class="my-4">
                    Dado que las funciones de más de un argumento se representan como funciones con un único argumento que devuelven como resultado funciones, es posible aplicar a una función menos argumentos de los que realmente parece tener, y obtener de este modo una nueva función. A esta posibilidad se la denomina aplicación parcial o parcialización. Por ejemplo, dada la función:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        multiploDe :: Integer -> Integer -> Bool
                        multiploDe p n = mod n p == 0
                    </code>
                </pre>
                <p class="my-4">
                    Que comprueba si su segundo argumento es múltiplo del primero, se puede obtener una función que comprueba si un número es par, aplicando parcialmente el primer argumento:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        esPar :: Integer -> Bool
                        esPar = multiploDe 2

                        multiploDe 3 15
                        esPar 18
                    </code>
                </pre>
                <div class="desactivate" id="result-code1">
                    <pre>
                        <code class="language-haskell">
                            True :: Bool 
                            True :: Bool
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>

                <p class="my-4">
                    En efecto se tiene que:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        esPar
                        =>{definición de esPar}
                        multiploDe 2
                        =>{definición de multiploDe}
                        (\p -> (\n -> mod n p == 0))2
                        =>{sustituyendo p por 2 en el cuerpo de la λ-expresión}
                        \n -> mod n 2 == 0
                    </code>
                </pre>
                <p class="my-4">
                    Es decir, <span style="color: blue">esPar</span> es una función que toma un entero (n) y devuelve un booleano (<span style="color: blue">mod n 2 == 0</span>) <br>
                    Es necesario que el argumento aplicado a una función coincida en el tipo con el primer argumento de ésta. Se obtiene como resultado una función con un argumento menos:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        Tipificado de la aplicación de funciones
                        si f:: t1 -> t2 -> ... -> tn y x1 :: ti, entonces f x1 :: t2 -> ... -> tn
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo, a la siguiente función de tres argumentos:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        fun :: Int -> Int -> Int -> Int
                        fun x y z = x * (2 * y + z)
                    </code>
                </pre>
                <p class="my-4">
                    Es posible aplicarle uno, dos, o tres argumentos. En cada caso obtenemos una función con un argumento menos
                </p>
                <div class="img" style="">
                    <img style="width: 100%" src="{{ asset('images/polimorfismo/imagen1.png') }}" alt="imagen1">
                </div>
                <p class="my-4">
                    Como se puede observar, la parcialización permite un uso más versátil de las funciones, ya que a una función de n argumentos es posible aplicarle desde cero a n argumentos. La aplicación parcial también resulta muy útil al trabajar con funciones de orden superior, como veremos posteriormente. Obsérvese que sólo es posible ir aplicando parcialmente argumentos de izquierda a derecha. Si por ejemplo se quisiera aplicar parcialmente tan sólo le segundo argumento se debe usar una λ-expresión. Por ejemplo, sea la función:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        multipoDe :: (Integer, Integer) -> Bool
                        multipoDe (p,n) = mod n p == 0

                        multiploDe (3,15)
                    </code>
                </pre>
                <div class="desactivate" id="result-code2">
                    <pre>
                        <code class="language-haskell">
                            True :: Bool
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>    
                <p class="my-4">
                    En este caso, las aplicaciones parciales no son posibles: siempre hay que aplicar dos enteros (en forma de tupla) para usar la función multiploDe. <br>
                    Por lo tanto, hay dos modos de representar funciones de varios argumentos en Haskell:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f :: f1 -> t2 -> ... tn -> tr
                        fx1 x2 ... xn = ... --Forma parcializada

                        f' :: (t1,t2,...,tn) -> tr
                        f'(x1,x2,...,xn) = ... --Forma no parcializada 
                    </code>
                </pre>
                <p class="my-4">
                    Pero sólo la primera puede ser parcialmente aplicada:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        Si v1 :: t1 entonces f v1 :: t2 -> ... tn -> tr
                        Si v1 :: t1, v2 :: t2 entonces f v1 v2 :: t3 -> ... tn -> tr
                        ...
                        Si v1 :: t1, v2 :: t2, ... vn :: entonces f v1 v2 ... vn :: tr
                    </code>
                </pre>
                <p class="my-4">
                    Un concepto relacionado con la aplicación parcial de n-reducción de expresiones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        n-reducción 
                        λx -> expr x  = expr si x no aparece libre en expr
                    </code>
                </pre>
                <p class="my-4">
                    Como consecuencia de esta regla, se puede cancelar el último argumento en la parte izquierda de una definición de función si éste es el último aplicado en la parte derecha, siempre que dicho argumento no quede libre (no siga apareciendo) tras la cancelación. La condición adicional es importante. Por ejemplo, la declaración:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f x = g 5 x
                    </code>
                </pre>
                <p class="my-4">
                    Puede ser escrita como:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f = g 5
                    </code>
                </pre>
                <p class="my-4">
                    Cancelando la x en la definición de f. Sin embargo, la declaración:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        fx = g(x + 1)x
                    </code>
                </pre>
                <p class="my-4">
                    No se puede, ya que la variable x en la expresión (x + 1) quedaría libre. <br>
                    Las funciones curry, y uncurry permiten una función de dos argumentos no parcializada a la forma parcializada y viceversa:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        curry :: ((a,b) -> c) -> (a -> b -> c)
                        curry f x y = f(x,y)

                        uncurry :: (a -> b -> c) -> ((a,b) -> c)
                        uncurry f (x,y) = f x,y
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        esPar :: Integer -> Bool
                        esPar = (curry multiploDe)2 --o tambien curry multiploDe 2
                                                    --ya que la aplicación asocia a 
                                                    --la izquierda
                        esPar 18
                    </code>
                </pre>
                <div class="desactivate" id="result-code3">
                    <pre>
                        <code class="language-haskell">
                            True :: Bool
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Las funciones curry y uncurry son ambas de orden superior (ya que toman como primer argumento una función) y polimórficas (ya que pueden actuar con distintos tipos)
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Secciones</h5>
                <p class="my-4">
                    En Haskell también es posible aplicar a un operador menos de dos argumentos (todos los operadores excepto el cambio de signo es binario). A una expresión así se le denomina sección. Recordemos que es posible aplicar un operador de modo infijo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        5 ** 2
                    </code>
                </pre>
                <div class="desactivate" id="result-code4">
                    <pre>
                        <code class="language-haskell">
                            25 :: Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    O prefijo, y en este caso debe ir entre paréntesis:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (**) 5 2
                    </code>
                </pre>
                <div class="desactivate" id="result-code5">
                    <pre>
                        <code class="language-haskell">
                            25 :: Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Las secciones permiten invocar un operador binario bien con tan sólo su primer argumento, bien con tan sólo el segundo, o sin ninguno de los dos. Para el operador potencia, tres posibles secciones son:
                    <ul class="container">
                        <li>(5 **) La función que toma un argumento y se eleva al valor 5 a éste</li>
                        <li>(** 5) La función que toma un argumento y eleva éste a 5</li>
                        <li>(**) La función que toma dos argumentos y eleva el primero al segundo</li>
                    </ul>
                    <br>
                    Los paréntesis son obligatorios en las secciones de operadores. En general, si (©) es un operador, se tiene las siguientes equivalencias:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        Secciones de operadores
                        (x ©) => (λy -> x © y)
                        (©y) => (λx -> x © y)
                        (©) => (λx y -> x © y)
                    </code>
                </pre>
                <p class="my-4">
                    Una excepción a la regla de las secciones es el operador (-). Una expresión con la forma (- e) no es una sección, sino que representa la negación de e. El operador – es la única, función simbólica unitaria en Haskell. El programador no puede definir nuevos operadores unitarios, por lo que es la única excepción posible a la regla. A continuación, algunos ejemplos:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        inc :: Integer -> Integer
                        inc = (+ 1)

                        inc' :: Integer -> Integer
                        inc' :: (1+)

                        alCubo :: Integer -> Integer
                        alCubo = (** 3)

                        unidad :: Integer -> Integer
                        mitad = (div 2)

                        inc 10
                        inc' 10

                        alCubo 5

                        (** 3)5
                    </code>
                </pre>
                <div class="desactivate" id="result-code6">
                    <pre>
                        <code class="language-haskell">
                            11 :: Integer
                            11 :: Integer
                            125 :: Integer
                            125 :: Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Por ejemplo  
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        alCubo
                        =>{definición de alCubo}
                        (** 3)
                        =>{reglas de las secciones}
                        (λx -> x ** 3)
                    </code>
                </pre>
                <p class="my-4">
                    Por lo que alCubo es la función que toma un argumento y lo eleva al cubo. Como muestra la función mitad, el operador literal <span style="color: blue">div</span> puede ser seccionado. Las secciones resultan muy útiles al trabajar con funciones de orden superior.
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Funciones de orden superior</h5>
                <p class="my-4">
                    Una de las principales características que diferencia a los lenguajes de programación funcionales es que consideran a las funciones datos de primera clase. Esto significa que una función puede aparecer en cualquier lugar donde pueda aparecer un dato de otro tipo. Por ejemplo, es posible construir una lista cuyos elementos sean funciones, siempre y cuando todas tengan el mismo tipo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        lista :: [Integer -> Integer]
                        lista = [(λx -> x + 1),(+1), dec, (** 2)]
                            where
                                dec x = x - 1
                    </code>
                </pre>
                <p class="my-4">
                    Una consecuencia de esta propiedad es que la función, como cualquier otro tipo de dato, puede aparecer como argumento de otra función o como resultado de ésta. A las funciones que manejan funciones se las denomina funciones de orden superior. La siguiente función es un ejemplo de función de orden superior, ya que toma como primer argumento una función de enteros en enteros:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        dosVeces :: (Integer -> Integer) -> Integer -> Integer
                        dosVeces f x = f (f x)
                    </code>
                </pre>
                <p class="my-4">
                    Que aplica dos veces la función primer argumento al segundo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        dosVeces (λx -> x + 1)10
                        dosVeces (*2) 10
                        dosVeces inc 10
                    </code>
                </pre>
                <div class="desactivate" id="result-code7">
                    <pre>
                        <code class="language-haskell">
                            12 :: Integer
                            40 :: Integer
                            12 :: Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Los paréntesis son obligatorios en el tipo de la función, ya que el tipo: 
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        Integer -> Integer -> Integer -> Integer
                    </code>
                </pre>
                <p class="my-4">
                    Es equivalente a:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        Integer -> (Integer -> (Integer -> Integer))
                    </code>
                </pre>
                <p class="my-4">
                    Es decir, el de una función de tres argumentos enteros, pero dosVeces tiene sólo dos argumentos, y el primero no es un entero sino una función de enteros en enteros. El tipo de dosVeces refleja que si sólo se pasa el argumento f. dosVeces f devuelve una función:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        dosVeces t inc
                        dosVeces inc :: Integer -> Integer
                    </code>
                </pre>
                <p class="my-4">
                    Quizás esto se vea mejor si cambiamos la definición por su equivalente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        dosVeces f = λx -> f (f x)
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo, sea una función de orden superior que devuelve como resultado otra función es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        derivada :: (Float -> Float) -> Float -> Float
                        derivada f x = (f(x + h) - fx)/h
                            where
                                h = 0.0001
                    </code>
                </pre>
                <p class="my-4">
                    Que devuelve una aproximación numérica de la derivada de una función real: <br>
                    f^' x=lim┬(h-0)⁡〖f(x+h)-fx〗/h <br>
                    Recuérdese que la ecuación anterior puede sustituirse por su equivalente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        derivada f = λx -> (f(x + h) - f(x))/h
                            where
                                h = 0.0001
                    </code>
                </pre>
                <p class="my-4">
                    A partir de cualquiera de las dos definiciones obtenemos el siguiente dialogo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        derivada t sqrt
                        derivada sqrt 1.0
                        derivada sin 0.0
                    </code>
                </pre>
                <div class="desactivate" id="result-code8">
                    <pre>
                        <code class="language-haskell">
                            derivada sqrt :: Float -> Float
                            0.499487 :: Float
                            1.0 :: Float
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="8" id="probar8" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn8" class="btn-primary cerrar desactivate">Cerrar</a>

                <p class="my-4">
                    Otra función de orden superior es la siguiente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        logEnBase :: Float -> (Float -> Float)
                        logEnBase = λx -> log x / log b -- log computa el logaritmo neperiano
                    </code>
                </pre>
                <p class="my-4">
                    Que toma un argumento real correspondiente a una base y devuelve la función logaritmo en dicha base, utilizando la fórmula: <br>
                    log b (x=ln⁡(x)/ln⁡(b))
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        logEnBase t 2
                        (logEnBase 2) 16
                    </code>
                </pre>
                <div class="desactivate" id="result-code9">
                    <pre>
                        <code class="language-haskell">
                            logEnBase 2 :: Float -> Float
                            4.0 :: Float
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="9" id="probar9" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn9" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Una función de orden superior sobre naturales</h5>
                <p class="my-4">
                    Muchas de las funciones recursivas que se definen sobre naturales siguen el siguiente esquema inductivo:
                    <ul class="container">
                        <li>Caso base: se define el resultado de la función cuando el argumento es cero</li>
                        <li>Paso inductivo: se define el resultado de la función cuando el argumento es n + 1 en función del resultado devuelto por la función cuando el argumento es n</li>
                    </ul>
                    Este tipo de definiciones se llaman inductivas. La función factorial es un ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        factorial :: Integer -> Integer
                        factorial 0 = 1
                        factorial m@(n + 1) = (*)m(factorial n)
                    </code>
                </pre>
                <p class="my-4">
                    Otro ejemplo es la función sumatorio que devuelve la suma de los primeros naturales:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        sumatorio :: Integer -> Integer
                        sumatorio 0 = 0
                        sumatorio m@(n + 1) = (+) m (sumatorio n)
                    </code>
                </pre>
                <p class="my-4">
                    Se puede observar que en ambas funciones siguen la siguiente plantilla:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        fun :: Integer -> Integer
                        fun 0 = e
                        fun m@(n + 1) = op m (fun n)
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo, la definición de factorial se obtiene sustituyendo e por 1 y op por (*). Es posible definir una función de orden superior que tome como argumentos la operación a aplicar en el caso recursivo y el valor a devolver en el caso base:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        iter  :: (Integer -> Integer -> Integer) ->
                                 Integer ->
                                 Integer ->
                                 Integer
                        iter op e 0 = e
                        iter op e m@(n + 1) = op m (iter op e n)
                    </code>
                </pre>
                <p class="my-4">
                    Que también puede ser definida utilizando las definiciones locales:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        iter :: (Integer -> Integer -> Integer) -> Integer ->
                                (Integer -> Integer)
                        iter op c = fun
                            where
                                fun 0
                                fun m@(n + 1) = op m (fun n)
                    </code>
                </pre>
                <p class="my-4">
                    La definición anterior es lo que se denomina un combinador (una función de orden superior que captura un esquema de cómputo). El combinador iter captura las definiciones inductivas sobre los naturales. Se dice también que es un iterador para los valores naturales. La gran ventaja de definir combinadores es que, a partir de ellos, es fácil definir cualquier función que siga el esquema capturado. Para definir las funciones factorial y sumatorio basta con proporcionar los dos primeros argumentos adecuadamente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        factorial' :: Integer -> Integer
                        factorial' = iter (*) 1

                        sumatorio' :: Integer -> Integer
                        sumatorio' = iter(+) 0
                    </code>
                </pre>
                <p class="my-4">
                    Los paréntesis son obligatorios cuando se pasa un operador simbólico como argumento. Como se puede ver, las nuevas definiciones resultan más compactas y ocultan la recursividad, aunque las definiciones siguen siendo recursivas. Por ejemplo, factorial’ 2 se calcula del siguiente modo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        facotrial' 2
                        =>{definición de factorial'}
                        iter (*) 12
                        =>{segunda ecuación de iter}
                        (*) 2 (iter (*) 1 1)
                        =>{segunda ecuación de iter}
                        (*) 2 ((*) 1 (iter (*) 1 0))
                        =>{primera ecuación de iter}
                        (*) 2 ((*) 1 1)
                        =>{(*)}
                        (*) 2 1
                        =>{(*)}
                        2
                    </code>
                </pre>
                <p class="my-4">
                    La mayoría de los programadores primerizos abusan de las definiciones recursivas. Se considera una buena practica de programación definir combinadores que capturen patrones comunes de cómputo y utilizar éstos en lugar de las correspondientes definiciones recursivas. Ésta es una de las mayores ventajas que aportan las funciones de orden superior: permiten al programador ampliar el lenguaje de programación. 
                </p>
            </div>
            
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="polimorfismo">
            <h4 class="color-blue">3.2 Polimorfismo</h4>
            <p class="my-4">
                Hasta ahora casi todas las funciones definidas han tenido como dominio y condominio tipos concretos (por ejemplo, Int, Integer, …). Sin embargo, algunas funciones tienen sentido para más de un tipo. Este tipo de funciones se denominan funciones polimórficas. El ejemplo más simple de función polimórfica es la función identidad id:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    id x = x
                </code>
            </pre>
            <p class="my-4">
                De modo que:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    id 'd'
                    id True
                    id toUpper 'a'
                </code>
            </pre>
            <div class="desactivate" id="result-code10">
                <pre>
                    <code class="language-haskell">
                        'd' :: Char
                        True :: Bool
                        'A' :: Char
                    </code>
                </pre>
            </div>
            <a href="#" data-close="10" id="probar10" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn10" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                En el primer diálogo la función actúa con el tipo Char -> Char, en el segundo con el tipo Bool -> Bool, y en el último con tipo: (Char -> Char) -> (Char -> Char). La función tiene sentido para argumentos de cualquier tipo, y el tipo de valor devuelto debe coincidir con el tipo del argumento. En Haskell el tipo de la función identidad es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    id :: a -> a
                </code>
            </pre>
            <p class="my-4">
                En esta declaración, a es una variable de tipo (es igualmente válido escribir b -> b, por ejemplo). Las variables de tipo deben empezar por una letra minúscula. Una variable de tipo denota cualquier tipo. La declaración anterior indica que la función id puede actuar con cualquier tipo que se obtenga al sustituir la variable de tipo a por un tipo concreto. El tipo de la declaración debe leerse como id :: ɏ a . a -> a. Cualquiera de los tipos inferiores (Char -> Char, Bool -> Bool, …) es un tipo válido de id. Sin embargo, el uso de la función id en la expresión (id’d’) + 3 es incorrecto, ya que para que la suma sea posible es necesario que el tipo de id’d’ sea Integer, y una variable de tipo sólo puede ser reemplazada con un único tipo en el mismo uso de la función.
                <br>Por otro lado, si se hubiese declarado la función identidad como:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    id :: a -> b
                    id x = x
                </code>
            </pre>
            <p class="my-4">
                Habríamos obtenido un error de tipo, ya que el tipo declarado es demasiado general.El
                intérprete deduce del cuerpo de la función que el tipo de resultado coincide necesariamente
                con el tipo del argumento, y la declaración de tipo anterior indica que pueden ser distintos, lo cual
                es falso, y por ello la declaración no puede ser aceptada. Un general, gracias
                al sistema de tipos, se puede inferir el tipo más genral de una función a partir de sus ecuaciones. Para ello basta con 
                que se omita la declaración de tipos al definir la función. Para visualizar el tipo más general de una función
                definida de este modo, podemos usar el comando :t seguido del nombre de la función. Por ejemplo, si se incluye esta función en
                un fichero:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    unaVez f x = f x
                </code>
            </pre>
            <p class="my-4">
                Y se carga en el intérprete, se puede obtener el tipo de la función tecleando:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    t unaVez
                </code>
            </pre>
            <div class="desactivate" id="result-code11">
                <pre>
                    <code class="language-haskell">
                        unaVez :: (a -> b) -> a -> b
                    </code>
                </pre>
            </div>
            <a href="#" data-close="11" id="probar11" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn11" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Con la siguiente imagen de abajo, se puede observar que para esta función, el tipo de dominio
                de f ha de coincidir con el de x, pero no es necesario que el tipo de condominio coincida, y por ello 
                se han utilizado dos variables a y b de tipo distintas. Un ejemplo de diálogo es: 
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    unaVez (+ 1) 7
                    unaVez (== 0) 9
                </code>
            </pre>
            <div class="desactivate" id="result-code12">
                <pre>
                    <code class="language-haskell">
                        8 :: Integer
                        False :: Bool
                    </code>
                </pre>
            </div>
            <a href="#" data-close="12" id="probar12" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn12" class="btn-primary cerrar desactivate">Cerrar</a>

            <div class="img text-center" style="">
                <img style="width: 60%" class="mx-auto" src="{{ asset('images/polimorfismo/imagen2.png') }}" alt="imagen1">
            </div>
            <p class="my-4">
                En el primer diálogo unaVez actúa con tipo (Integer -> Integer) -> Integer -> Integer. En el segundo, el tipo es (Integer -> Bool) -> Integer -> Bool. 
                Un ejemplo de uso incorrecto de la función es:
            </p>

            <pre class="line-numbers">
                <code class="language-haskel2">
                    unaVez inc 'p'
                </code>
            </pre>
            <div class="desactivate" id="result-code13">
                <pre>
                    <code class="language-haskell">
                        ERROR
                    </code>
                </pre>
            </div>
            <a href="#" data-close="13" id="probar13" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn13" class="btn-primary cerrar desactivate">Cerrar</a>

            <p class="my-4">
                Ya que la variable (de tipo) a tendría que ser reemplazada simultaneamente por los tipos Integer y Char, y esto no es posible.
            </p>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">La composición de funciones</h5>
                <p class="my-4">
                    Otro ejemplo de la función polimórfica es la composición de funciones. La definición matemática de f compuesta con g es: 
                </p>
                <pre>
                    <code class="language-haskell">
                        (g o f)(x) = g(f(x))
                    </code>
                </pre>
                <p class="my-4">
                    La composición es un operador que actúa sobre dos funciones y devuelve como resultado una nueva función. En Haskell, la composición de funciones se denota mediante un punto, y está definida del siguiente modo: 
                </p>
                <pre>
                    <code class="language-haskell">
                        inflxr 9
                        (.) :: (b -> c) -> (a -> b) -> (a -> c)
                        g . f = λx -> g (f x)
                    </code>
                </pre>
                <div class="img" style="">
                    <img style="width: 100%" src="{{ asset('images/polimorfismo/imagen1.png') }}" alt="imagen1">
                </div>
                <pre>
                    <code class="language-haskell">
                        sumaMult :: Integer -> Integer
                        sumaMult = (*10) . (+1)
                    </code>
                </pre>
                <p class="my-4">
                    Toma un entero, lo incrementa y después lo multiplica por diez:
                </p>
                <pre>
                    <code class="language-haskell">
                        sumaMult 5
                    </code>
                </pre>
                <div class="desactivate" id="result-code14">
                    <pre>
                        <code class="language-haskell">
                            60 :: Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="14" id="probar14" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn14" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    El tipo de la composición de funciones indica que todo par de funciones puede ser compuesto. Se tiene las siguientes restricciones para g f:
                    <ul class="container">
                        <li>El tipo del resultado de f debe coincidir con el tipo de argumento de g</li>
                        <li>El tipo del resultado de la composición (g.f) coincide con el del resultado de g.</li>
                        <li>El tipo del argumento de (g.f) es el mismo que el tipo del argumento de f</li>
                    </ul>
                    si se llama: 
                    <ul class="container">
                        <li>A al tipo del argumento de f</li>
                        <li>B al tipo del argumento de g</li>
                        <li>C al tipo del resultado de g</li>
                    </ul>
                    Y se tiene en cuenta las restricciones anteriores, se obtiene el tipo de la composición:
                </p>
                <pre>
                    <code class="language-haskell">
                        (.) :: (b -> c) -> (a -> b) -> (a -> c)
                    </code>
                </pre>
                <p class="my-4">
                    La composición de funciones es un patrón de cómputo muy habitual. Así, si la solución a un problema consta de varias etapas, se puede definir cada una de ellas como funciones independientes y componer todas para solucionar el problema. Usando la composición se puede definir la función impar a partir de la función esPar para comprobar la paridad de un número:
                </p>
                <pre>
                    <code class="language-haskell">
                        esPar, esImpar :: Integer -> Bool 
                        esPar x  = (mod x 2 == 0)
                        esImpar  = not . esPar

                        esImpar 3
                    </code>
                </pre>
                <div class="desactivate" id="result-code15">
                    <pre>
                        <code class="language-haskell">
                            True :: Bool
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="15" id="probar15" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn15" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Donde not :: Bool -> Bool es la negación lógica, y (===) es la comprobación de igualdad para dos elementos. Por la declaración infixr, el operador de composición de funciones es asociativo a la derecha, de donde la ecuación de la definición:
                </p>
                <pre>
                    <code class="language-haskell">
                        f :: Integer -> Integer
                        f = (+1).(*3).(** 2)
                    </code>
                </pre>
                <p class="my-4">
                    Es equivalente a:
                </p>
                <pre>
                    <code class="language-haskell">
                        f = (+ 1) . ((*3) . (** 2))
                    </code>
                </pre>
                <p class="my-4">
                    Es decir, primero se eleva el argumento al cuadrado, después se multiplica por tres y por último se le suma uno. El operador ($) puede ser usado para evaluar una composición de funciones en un punto sin escribir ésta entre paréntesis, ya que tiene menor prioridad que la composición:
                </p>
                <pre>
                    <code class="language-haskell">
                        ((+ 1) . (*3) .(**2)) 10
                        (+ 1) . (*3) .(**2) $ 10
                    </code>
                </pre>
                <div class="desactivate" id="result-code16">
                    <pre>
                        <code class="language-haskell">
                            301 :: Integer
                            301 :: Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="16" id="probar16" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn16" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    El operador de composición proporciona un gran nivel de bastracción, ya que permite construir funciones a partir de otras y olvidarse de los identificadores de los argumentos. Por ejemplo, la función dosVeces puede ser definida como:
                </p>
                <pre>
                    <code class="language-haskell">
                        dosVeces f = f . f
                    </code>
                </pre>
                <p class="my-4">
                    A este estilo de definir funciones se les denomina sin argumentos (point-free), al estilo habitual (con argumentos) se le denomina (point-wise). Haskell permite utilizar cualquiera de los dos. La ventaja de usar el estilo sin argumentos es que las definiciones resultantes son más concisas. Un detalle que suele pasar inadvertido es que la n-reducción puede hacer el tipo de una función más general. Por ejemplo, recuérdese que el tipo más general de la declaración de la función unaVez es el siguiente:
                </p>
                <pre>
                    <code class="language-haskell">
                        unaVez :: (a -> b) -> a -> b
                        unaVez f x = f x
                    </code>
                </pre>
                <p class="my-4">
                    Dicha función puede ser n-reducida a:
                </p>
                <pre>
                    <code class="language-haskell">
                        unaVez :: t -> t 
                        unaVez f  = f
                    </code>
                </pre>
                <p class="my-4">
                    O incluso a:
                </p>
                <pre>
                    <code class="language-haskell">
                        unaVez :: t -> t 
                        unaVez = id
                    </code>
                </pre>
                <p class="my-4">
                    Donde id es la función identidad definida. Sin embargo, el tipo obtenido vía y-reducción es más general. No hay problema ya que el tipo original es un caso particular del tipo t -> t en el que se han reemplazado las apariciones de la variable t de tipos con el tipo a -> b. En resumen, al parcializar se puede perder información sobre el tipo:
                </p>
                <pre>
                    <code class="language-haskell">
                        Ecuación                Tipo
                        fun f x y = f x y       (a -> b -> c) -> a -> b -> c
                        fun f x = f x           (a -> b) -> a -> b
                        fun f = f               a -> a
                    </code>
                </pre>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Polimorfismo en Listas</h5>
                <p class="my-4">
                    Muchas de las funcione que actúan sobre listas son polimórficas. Por ejemplo, sea la siguiente función que calcula la longitud de una lista de caracteres:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        lengthChar :: [Char] -> Int
                        lengthChar[] = 0
                        lengthChar(x:xs) = 1 + lengthChar xs
                    </code>
                </pre>
                <p class="my-4">
                    Es fácil observar que el cuerpo de la función no depende del tipo de los elementos que hay en la lista. Por lo que es posible definir una función polimórfica que calcule la longitud de listas con cualquier tipo base:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        length :: [a] -> Int
                        length[] = 0
                        length(x:xs) = 1 + length xs

                        length[True,False,False]
                        length[[1,2,3],[4,5]]
                        length[(+2),(*5)]
                    </code>
                </pre>
                <div class="desactivate" id="result-code17">
                    <pre>
                        <code class="language-haskell">
                            3 :: Int
                            2 :: Int 
                            2 :: Int
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="17" id="probar17" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn17" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Obsérvese que el tipo de la función no es:
                </p>
                <pre>
                    <code class="language-haskell">
                        length :: a -> Int --error!!
                    </code>
                </pre>
                <p class="my-4">
                    Ya que el primer argumento de la función debe ser una lista y este tipo al ser más general no refleja este hecho. Los constructores para listas tienen tipos polimórficos:
                </p>
                <pre>
                    <code class="language-haskell">
                        (:) :: a -> [a] -> [a]
                        [] :: [a]
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo, en las expresiones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        1 : [2,3,4]
                        [True] : [[False,True],[False]]
                    </code>
                </pre>
                <div class="desactivate" id="result-code18">
                    <pre>
                        <code class="language-haskell">
                            [1,2,3,4] :: [Integer]
                            [[True],[False,True],[False]] :: [[Bool]]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="18" id="probar18" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn18" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    El constructor (:) actúa con los tipos Integer -> [Integer] -> [Integer] y [Bool] -> [[Bool]] -> [[Bool]] respectivamente, es decir la variable de tipo a toma los valores Integer y [Bool]. Lo mismo ocurre con el constructor [] en las expresiones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        1 : []  --[] actúa con tipo [Integer]
                        [True] : []  --[] actúa con tipo [[Bool]]
                    </code>
                </pre>
                <div class="desactivate" id="result-code19">
                    <pre>
                        <code class="language-haskell">
                            [1] :: Integer
                            [[True]] :: [[Bool]]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="19" id="probar19" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn19" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Sin embargo, la expresión:
                </p>
                <pre>
                    <code class="language-haskell">
                        'p' : [1,2,3]
                    </code>
                </pre>
                <div class="desactivate" id="result-code20">
                    <pre>
                        <code class="language-haskell">
                            ERROR  : Type error in application
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="20" id="probar20" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn20" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Produce un error de tipo, ya que la variable a de tipo debería ser reemplazada a dos tipos distintos (Char e Int) en la misma expresión, y esto no es posible. <br>
                    Una función tipo polimórfico tiene muchos tipos. Un tipo polimórfico es una plantilla que puede ser utilizada para crear tipos específicos. Para que en un uso particular de una función polimórfica sea correcto, las variables de tipo pude ser reemplazadas por tipos concretos (todas las apariciones de la misma variable de tipo deben ser reemplazadas por el mismo tipo). Una expresión en la que intervienen funciones polimórficas es correcta desde el punto de vista de su tipo si se pueden encontrar sustituciones consistentes para variables de tipo. La combinación de funciones de orden superior y polimorfismo da lugar a funciones muy útiles para lista. La función map, que es una función definida, aplica una función a todos los elementos de una lista, devolviendo una lista con los resultados:
                </p>
                <pre>
                    <code class="language-haskell">
                        map  :: (a -> b) -> [a] -> [b]
                        map f[]  = []
                        map f (x : xs) = f x : map f xs

                        map(** 2)[1,2,3]
                        map toUpper "pepe"
                        map ord "pepe"
                    </code>
                </pre>
                <div class="desactivate" id="result-code21">
                    <pre>
                        <code class="language-haskell">
                            [1,4,9] :: [Integer]
                            "PEPE" :: String
                            [112,101,112,101] :: [Int]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="21" id="probar21" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn21" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Este operador puede ser definido sin argumentos (estilo point-free) usando map y ($):
                </p>
                <pre>
                    <code class="language-haskell">
                        (|>)  :: [a -> b] -> a -> [b]
                        (|>) = flip (map . flip($))
                    </code>
                </pre>
                <p class="my-4">
                    Ya que:
                </p>
                <pre>
                    <code class="language-haskell">
                        (|>) fs x = map($x) fs
                        =>{propiedades de ($)}
                        (|>) fs x = map(flip ($)x)fs
                        =>{composición de funciones}
                        (|>) fs x = (map . flip ($))x fs
                        =>{por flip}
                        (|>) fs x = flip (map . flip ($)) fs x
                        =>{n-reducción}
                        (|>) fs = flip (map . flip ($)) fs
                        =>{n-reducción}
                        (|>) = flip (map . flip ($))
                    </code>
                </pre>
                <p class="my-4">
                    Ejemplos de uso son:
                </p>
                <pre>
                    <code class="language-haskell">
                        [(*1),(*2),(*3)] |> 5
                        map (*)[1..10] |> 5
                    </code>
                </pre>
                <div class="desactivate" id="result-code22">
                    <pre>
                        <code class="language-haskell">
                            [5,10,15]
                            [5,10,15,20,25,30,35,40,45,50] :: [Integer]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="22" id="probar22" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn22" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Polimorfismo en Tuplas</h5>
                <p class="my-4">
                    En Haskell también se puede definir algunas funciones polimórficas sobre tuplas. Las funciones:
                </p>
                <pre>
                    <code class="language-haskell">
                        fst :: (a -> b) -> a
                        fst(x,_) = x

                        sud :: (a,b) -> b
                        sud (_,y) = y
                    </code>
                </pre>
                <p class="my-4">
                    Devuelven respectivamente, la primera y la segunda componente de un par. Obsérvese que se utilizan dos variables de tipo distintas para los componentes del par, ya que éstas pueden tener tipos distintos. Sin embargo, el tipo del resultado ha de coincidir con el tipo de la componente de vuelta
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Un iterador Polimórfico sobre los naturales</h5>
                <p class="my-4">
                    El tipo más general del iterador para números naturales definidos anteriormente en la sección de funciones de orden superior sobre naturales es polimórfico:
                </p>
                <pre>
                    <code class="language-haskell">
                        iter  :: (Integer -> a -> a) -> a -> Integer -> a 
                        iter op e 0  = e
                        .iter op e m@(n + 1) = op m (iter op e n)
                    </code>
                </pre>
                <p class="my-4">
                    Esto significa que no sólo es posible construir funciones que devuelven un entero utilizando éste, sino también estructuras arbitrarias:
                </p>
                {{-- Modificar --}}
                <pre class="line-numbers">
                    <code class="language-haskell">
                        listaDecre :: Integer -> [Integer]
                        listaDecre = iter(:)[]

                        palos :. Integer -> String 
                        palos = iter(λ n xs -> 'I':xs)[]

                        listaDecre 5
                        palos 3
                    </code>
                </pre>
                <div class="desactivate" id="result-code23">
                    <pre>
                        <code class="language-haskell">
                            [5,4,3,2,1] :: [Integer]
                            "III" :: String
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="23" id="probar23" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn23" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="ejemplos">
            <h4 class="color-yellow">3.3 Ejemplos</h4>
            <p class="my-4">
                A continuación, se mostrarán una serie de ejemplos con relación a todo el material visto en este módulo, de
                esta manera se busca que usted como usuario pueda tener un mejor entendimiento del módulo y de cada una de
                las secciones y temas que se mencionaron. En estos ejemplos se verá sintaxis básica del lenguaje que no se
                ha mostrado en este módulo, pero se explicara cada una de estas.
            </p>

            <div class="row mx-auto mt-md-5">
                <div class="col-12 col-md-6">
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 1</h5>
                            <p class="card-text">Utilizando notación lamda, realice una función que determine si un número es par o impar, de ser par a dicho número se le sumara 2, de lo contrario se le sumara 1</p>
                            <a  href="{{ route('ejemplos3', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">Utilizando notación lamda, cree una función que permita recibir tres números y los junte de manera inversa (Por ejemplos 1 2 3, se debe juntar como el número 321)</p>
                            <a  href="{{ route('ejemplos3', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 3</h5>
                            <p class="card-text">Realice una función que permite recibir dos números y devuelva una serie de números convertidos a cadenas, el primer número indicara desde que número se desea imprimir la serie y el segundo número indicara de ahí en adelante cuantos números se desea mostrar. Por ejemplo 3 4, el resultado seria “4 5 6 7”. Nota: es necesario utilizar parcialización un operador de sección para realizar este ejercicio</p>
                            <a  href="{{ route('ejemplos3', ['id'=>3]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 322px">
                            <h5 class="card-title">Ejemplo 4</h5>
                            <p class="card-text">Utilizando funciones de orden superior realice una función que calcule el cuadrado de un número, luego se requiere que al resultado de esa operación se le vuelva a calcular el cuadrado, es necesario poder utilizar operadores de sección. Por ejemplo, si el número ingresado es 3, el primer cuadrado sería 9, y el segundo cuadrado sería 81.</p>
                            <a  href="{{ route('ejemplos3', ['id'=>4]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 5</h5>
                            <p class="card-text">Escriba una función que devuelva la multiplicación de dos números utilizando sumas</p>
                            <a  href="{{ route('ejemplos2', ['id'=>5]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 6</h5>
                            <p class="card-text">Sea una lista de números enteros |f1, f2, …, fn| defina un operador (|>) de forma que se tenga |f1*x, f2*x, …, fn*x|</p>
                            <a  href="{{ route('ejemplos2', ['id'=>6]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="practica">
            <div id="enunciado" class="px-3" style="margin-top: 10%">
                <h4 class="color-blue">3.4 Practica</h4>
                <p class="my-4">
                    En esta sección se busca afianzar los conocimientos adquiridos por parte del usuario en este módulo, por
                    ende, a continuación, se mostrarán una serie de ejercicios y preguntas con las cuales se busca poner a
                    prueba dicho conocimiento adquirido.
                </p>
                <a href="#" id="start-exe" class="btn btn-amarillo d-block w-25 mx-auto">Empezar ejercicios</a>
            </div>

            <div id="ejercicio1" class="mt-2 p-3 bg-light desactivate">
                <div class="enunciado">
                    <h5 class="color-blue">Ejercicio 1</h5>
                    <P class="my-4">
                        Se pide realizar una función compuesta que calcule la división entre dos números y luego sume el resultado de ese número con 100, ¿Cómo se realiza dicha función?
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6 col-md-6 col-12">
                            <form action="" class="form form-inline">
                                <div class="form-check">
                                    <div class="checkbox-Soft mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise1" value="option1" id="radio1">
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            ejercicio1 :: Integer ->Integer -> Integer
                                            ejercicio1 :: \y -> (100 +)(div y)
                                        </code>
                                    </pre>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise1" value="option2" id="radio2">
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            ejercicio1 :: Integer ->Integer -> Integer
                                            ejercicio1 = (100 +) . (div y)
                                        </code>
                                    </pre>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise1" value="option3" id="radio3">
                                        <label class="form-check-label" for="radio3"></label>
                                    </div>
                                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            ejercicio1 :: Integer -> Integer
                                            ejercicio1 = \y -> (100 +) . (div y)
                                        </code>
                                    </pre>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise1" value="option4" id="radio4">
                                        <label class="form-check-label" for="radio4"></label>
                                    </div>
                                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            ejercicio1 :: Integer ->Integer -> Integer
                                            ejercicio1 = \y -> (100 +) . (div y)
                                        </code>
                                    </pre>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <p class="question">
                                ¿Cual crees que es la opcion correcta?
                                <span>Seleccione una opcion y dar en continuar</span>
                                <a href="#" data-btnindex="1" class="btn btn-amarillo mx-auto continue">Continuar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ejercicio2" class="mt-2 p-3 bg-light desactivate">
                <div class="enunciado">
                    <h5 class="color-yellow">Ejercicio 2</h5>
                    <P class="my-4">
                        A continuación, se mostrarán una serie de preguntas las cuales usted deberá indicar si es verdadero o falso la afirmación o pregunta que se le está planteando
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6">
                            <form action="" class="form form-inline">
                                <div class="form-check">
                                    <div class="checkbox-slide mx-auto">
                                        <input class="form-check-input btontruefalse" type="checkbox" data-indexbton="1" value="option1" id="boton1">
                                        <label class="form-check-label" for="boton1"></label>
                                    </div>
                                    <div class="p-question">
                                        <p>
                                            ¿Es posible aplicar a una función menos argumentos de los que realmente parece tener, y obtener de este modo una nueva función? 
                                        </p>
                                        <span id="data-status1" class="false">Falso</span>
                                    </div>
                                </div>
                                <div class="form-check mt-5">
                                    <div class="checkbox-slide mx-auto">
                                        <input class="form-check-input btontruefalse" type="checkbox" data-indexbton="2" value="option2" id="boton2">
                                        <label class="form-check-label" for="boton2"></label>
                                    </div>
                                    <div class="p-question">
                                        <p>
                                            ¿Todas las funciones declaradas en Haskell están basadas en el λ-cálculo, la cual es la única manera de poder escribir funciones en Haskell? 
                                        </p>
                                        <span id="data-status2" class="false">Falso</span>
                                    </div>
                                </div> 
                                <div class="form-check mt-5">
                                    <div class="checkbox-slide mx-auto">
                                        <input class="form-check-input btontruefalse" type="checkbox" data-indexbton="3" value="option3" id="boton3">
                                        <label class="form-check-label" for="boton3"></label>
                                    </div>
                                    <div class="p-question">
                                        <p>
                                            ¿Una excepción a la regla de las secciones es el operador (-)?
                                        </p>
                                        <span id="data-status3" class="false">Falso</span>
                                    </div>
                                </div> 
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <p class="question px-md-3">
                                Para escoger entre verdadero y falso dar click a los botones azules
                                <span>Cuando este seguro de sus respuestas dar en continuar</span>
                                <a href="#" data-btnindex="2" class="btn btn-amarillo mx-auto continue">Continuar</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="ejercicio3" class="mt-2 p-3 bg-light desactivate">
                <div class="enunciado">
                    <h5 class="color-blue">Ejercicio 3</h5>
                    <P class="my-4">
                        Dada las siguientes funciones determine el resultado de la misma pasándole como parámetro el valor de 5
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6">
                            <h5 class="color-yellow">Código</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                                        muliP :: Integer -> Integer 
                                        muliP = (*2)

                                        ejercicio3 :: Integer -> [Integer]
                                        ejercicio3 0 = []
                                        ejercicio3 n = muliP n : (ejercicio3(n-1))
                                    </code>
                                </pre>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-center font-weight-bold">¿Cual es el resultado de la función?</h6>
                            <form action="" class="form">
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option1" id="secondradio1">
                                        <label class="form-check-label" for="secondradio1"></label>
                                        <p class="p-order">
                                            [2,4,6,8,10]
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option2" id="secondradio2">
                                        <label class="form-check-label" for="secondradio2"></label>
                                        <p class="p-order">
                                            (2,4,6,8,10)
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option3" id="secondradio3">
                                        <label class="form-check-label" for="secondradio3"></label>
                                        <p class="p-order">
                                            [10,8,6,4,2]
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12 mt-md-5">
                            <p class="question order">
                                ¿Cual crees que es la opcion correcta?
                                <span>Seleccione una opcion y dar en continuar</span>
                                <a href="#" data-btnindex="3" class="btn btn-amarillo mx-auto continue">Continuar</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="result" class="mt-2 p-3 bg-light desactivate">
                <div class="enunciado text-center">
                    <h5 class="color-blue">Resultados</h5>
                    <p class="question order w-50 mt-md-5 text-left mx-auto">
                        Ha terminado la parte practica de este módulo, usted ha respondido correctamente <span id="correct_ans"></span>/5 preguntas
                        <span id="recomendation">Seleccione una opcion y dar en continuar</span>
                        <a href="#" data-btnindex="3" class="btn btn-amarillo mt-md-3">Pasar al siguiente módulo</a>
                        <a href="#" id="reiniciar" data-btnindex="3" class="btn btn-azul mt-md-3">Reiniciar</a>
                    </p>
                    <span></span>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('scripts')
    <script>
        var resultados = {
            1: {
                "respuest_correct": "option4",
                "respuest_selected": ""
            },
            2: {
                "question1": {
                    "respuest_correct": "true",
                    "respuest_selected": "false"
                },
                "question2": {
                    "respuest_correct": "false",
                    "respuest_selected": "false"
                },
                "question3": {
                    "respuest_correct": "true",
                    "respuest_selected": "false"
                }
            },
            3: {
                "respuest_correct": "option3",
                "respuest_selected": ""
            }
        }
    </script>
    <script src="{{ asset('js/moduls.js') }}"></script>
@endsection
