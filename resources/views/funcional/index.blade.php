@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Programación Funcional</h4>
        <ul>
            <li><a href="#" data-name="funciones" class="item active">1.1 Funciones</a></li>
            <li><a href="#" data-name="sesiones" class="item">1.2 Sesiones y Declaraciones</a></li>
            <li><a href="#" data-name="reduccion" class="item">1.3 Reducción de expresiones</a></li>
            <li><a href="#" data-name="sobrehaskell" class="item">1.4 Sobre Haskell</a></li>
            <li><a href="#" data-name="ejemplos" class="item">1.5 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">1.6 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" id="funciones">
            <h4 class="color-yellow">1.1 Funciones</h4>
            <p class="my-4">
                En matemáticas, hablar de una función F entre dos conjuntos A y B, llamados conjunto inicial y final, es una
                correspondencia que cada elemento de un subconjunto de A, llamado el dominio de F, le hace corresponder uno
                y sólo uno de un subconjunto de B llamado imagen de F. La notación utilizada suele ser:
            </p>
            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                                                                            <code class="language-haskell">
                                                                                                                                                                                                                                                                                                                            &#402;: A -> B
                                                                                                                                                                                                                                                                                                                            &#402;(&#120;) -> ...
                                                                                                                                                                                                                                                                                                                                            </code>
                                                                                                                                                                                                                                                                                                                                        </pre>

            <p class="my-4">
                Un ejemplo sencillo sería es la función sucesora con un dominio e imagen como el conjunto de los números
                enteros, que se asocia a cada entero siguiente:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                                                        <code class="language-haskell">
                                                                                                                                                                                                                                                                                                        sucesor: Z -> Z  
                                                                                                                                                                                                                                                                                                        sucesor:(&#120;) -> &#120; + 1
                                                                                                                                                                                                                                                                                                                        </code>
                                                                                                                                                                                                                                                                                                                    </pre>

            <p class="my-4">
                Aquí existen funciones de varias variables. Por ejemplo, defínase una función como <span
                    style="color: blue;">sumaCuadrados</span> la cual
                recibe dos valores <span style="color: #f8c555;">(x, y)</span> y suma sus cuadrados:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                                                    <code class="language-haskell">
                                                                                                                                                                                                                                                                                                    sumaCuadrados: Z x Z  -> Z
                                                                                                                                                                                                                                                                                                    sumaCuadrados(x,y): -> x² + y²
                                                                                                                                                                                                                                                                                                                    </code>
                                                                                                                                                                                                                                                                                                                </pre>

            <p class="my-4">
                Esta función es de dos variables. Incluso se es habitual definir funciones de ceros variables denominadas
                funciones constantes o simplemente constantes, como:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                                                                                                                                                                    π :  R
                                                                                                                                                                                                                                                                                                    π -> 3.1415927
                                                                                                                                                                                                                                                                                                                </code>
                                                                                                                                                                                                                                                                                                            </pre>

            <p class="my-4">
                Cuando se define una función, suele interesarse evaluar la función para ciertos valores de la variable, es
                decir se define el valor que retorna una función dado un valor especifico como variable:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                                            <code class="language-haskell">
                                                                                                                                                                                                                                                                                                sucesor(1) -> 2
                                                                                                                                                                                                                                                                                                            </code>
                                                                                                                                                                                                                                                                                                        </pre>

            <p class="my-4">
                Es de esta manera que se denota que el valor de la función sucesor para el valor 1 es igual a 2. Cuando la
                función es de varias variables, se aplicará el número correspondiente de argumentos. Por ejemplo
                <span class="px-3" style="background-color: black"><span style="color: white">sumaCuadrados(<span
                            style="color: #f8c555">2</span>,<span style="color: #f8c555">3</span>)</span> <span
                        style="color: white">=></span> <span style="color: #f8c555">13</span></span>
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="sesiones">
            <h4 class="color-blue">1.2 Sesiones y Declaraciones</h4>
            <p class="my-4">
                Programar consiste en especificar al ordenador los pasos que debe seguir para resolver un problema. La
                solución a un problema es un valor que se calcula a partir de ciertos datos, por lo que un modo natural de
                describir programas es mediante funciones.
                <hr>
                Desde el punto de vista de la programación funcional, el computador actúa como una calculadora o como un
                evaluador que permite calcular el resultado de expresiones que se introducen al ordenador. Para poder pasar
                las expresiones que se desean, Haskell ( el intérprete del lenguaje mejor dicho), muestra una línea como la
                siguiente solicitando la expresión a evaluar:
            </p>
            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                                                                                                                                                Prelude >
                                                                                                                                                                                                                                                                                                </code>
                                                                                                                                                                                                                                                                                            </pre>


            <p class="my-4">
                El programador dispone de un conjunto de valores, funciones y operadores llamados predefinidos, cuyo
                significado es conocido por el evaluador y que se encuentran definidos en lo que se conoce como el
                <span style="color: blue">PRELUDE</span>. Por ejemplo, el evaluador puede trabajar con valores numéricos
                enteros:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                                                                                                                                Prelude > 1 + 2
                                                                                                                                                                                                                                                                                </code>
                                                                                                                                                                                                                                                                            </pre>
            <div class="desactivate" id="result-code1">
                <pre>
                            <code class="language-haskell">
            3 :: Integer
                            </code>
                        </pre>
            </div>
            <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>


            <p class="my-4">
                El anterior código representa una sesión (o diálogo) con el evaluador. La interpretación de las líneas
                anteriores es la siguiente:
            <ul class="container">
                <li>Se solicito al evaluador que calcule el valor de la expresión 1 + 2</li>
                <li>El evaluador respondió como resultado el número 3</li>
            </ul>
            Este lenguaje de programación (Haskell) permite poder trabajar con distintas categorías de datos (o tipos de
            datos). Cada valor tiene asociado un tipo. El valor 1 tiene asociado el tipo Integer (O entero), que denota
            valores enteros. Otros tipos de datos predefinidos son los valores numéricos reales, los caracteres (letras y
            otros símbolos) y las listas (secuencias de datos de un mismo tipo). En el siguiente ejemplo se ven valores
            reales:
            </p>


            <pre class="line-numbers">
                                                                                                                                                                                                                                                            <code class="language-haskell">
                                                                                                                                                                                                                                            Prelude > cos pi
                                                                                                                                                                                                                                                            </code>
                                                                                                                                                                                                                                                        </pre>
            <div class="desactivate" id="result-code2">
                <pre>
                                                                                                                                                                                                                                                        <code class="language-haskell">
                                                                                                                                                                                                                                            -1.0 :: Double
                                                                                                                                                                                                                                                        </code>
                                                                                                                                                                                                                                                    </pre>
            </div>

            <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>


            <p class="my-4">
                En la expresión anterior, <span style="color: blue">cos</span> es el identificador de la función coseno, y
                <span style="color: blue">pi</span> el de la constante <span style="color: #f8c555">&#928;</span>. El
                tipo de dato Double se corresponde con valores numéricos reales. El evaluador (o interprete de Haskell) dio
                como respuesta que el resultado del coseno de pi es -1.0. La función cos tiene un único argumento mientras
                que pi es una función de cero argumentos (o constante). Obsérvese que la notación es distinta a la habitual
                en matemáticas. El argumento de la función no va entre paréntesis. Al evaluar la función, los argumentos se
                escriben tras el nombre de ésta, usando como separador uno o varios espacios en blanco. Sólo los argumentos
                que son expresiones compuestas van entre paréntesis, como en:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                                                    <code class="language-haskell">
                                                                                                                                                                                                                                    Prelude > cos (2 * pi)
                                                                                                                                                                                                                                                    </code>
                                                                                                                                                                                                                                                </pre>
            <div class="desactivate" id="result-code3">
                <pre>
                                                                                                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                                                                                                    -1.0 :: Double
                                                                                                                                                                                                                                                </code>
                                                                                                                                                                                                                                            </pre>
            </div>

            <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>


            <p class="my-4">
                El símbolo * es el operador producto y, a diferencia de lo que ocurre en matemáticas, no puede ser omitido.
                Para aplicar una función &#402 aun argumento z se escribe &#402 z. Esta notación, denominada <span
                    style="color: blue">currificada</span>, separa
                funciones y argumentos por espacios y además de hacer las expresiones más breves, permite utilizar las
                funciones de un modo más versátil, como se verá posteriormente.El siguiente ejemplo es un poco más
                elaborado:
            </p>


            <pre class="line-numbers">
                                                                                                                                                                                                                                        <code class="language-haskell">
                                                                                                                                                                                                                        Prelude > [1..5]
                                                                                                                                                                                                                        Prelude > sum[1..10]
                                                                                                                                                                                                                                        </code>
                                                                                                                                                                                                                                    </pre>
            <div class="desactivate" id="result-code4">
                <pre>
                                                                                                                                                                                                                                    <code class="language-haskell">
                                                                                                                                                                                                                        [1,2,3,4,5] :: [Integer]
                                                                                                                                                                                                                        55 :: Integer
                                                                                                                                                                                                                                    </code>
                                                                                                                                                                                                                                </pre>
            </div>

            <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>


            <p class="my-4">
                Primero se pidió al evaluador que calculase la lista de enteros que recorre desde el uno hasta el cinco. El
                <span style="color: blue">[1..5]</span> indica una lista de números que van desde el 1 hasta el 5
                [1,2,3,4,5]. Haskell tiene funciones que
                permiten realizar operaciones de manera rápida y sencilla, por ejemplo, la suma de los diez primero números
                positivos, se calcula utilizando la función <span style="color: #f8c555">sum</span>, que toma como argumento
                una lista de valores numéricos y
                los suma. Para ilustrar funciones de más de un argumento se puede usar la función mod, esta es una función
                de dos argumentos que devuelve el resto que se obtiene al dividir el primero entre el segundo:
            </p>


            <pre class="line-numbers">
                                                                                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                                                                                Prelude > mod 10 3
                                                                                                                                                                                                                Prelude > mod 10 (3 + 1)
                                                                                                                                                                                                                                </code>
                                                                                                                                                                                                                            </pre>
            <div class="desactivate" id="result-code5">
                <pre>
                                                                                                                                                                                                                            <code class="language-haskell">
                                                                                                                                                                                                                1 :: Integer
                                                                                                                                                                                                                2 :: Integer
                                                                                                                                                                                                                            </code>
                                                                                                                                                                                                                        </pre>
            </div>

            <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>

            <p class="my-4">
                Como se puede ver, el lenguaje Haskell proporciona un robusto conjunto de elementos predefinidos (o
                funciones) que pueden ser usados por el programador. Sin embargo, las características más interesantes es
                que este conjunto es ampliable. En efecto, el programador puede definir nuevas funciones, nuevos operadores
                e incluso nuevos tipos de datos. <br>
                Como primer ejemplo se puede definir una función que calcule el sucesor de un número entero. La definición
                de esta función se define de esta manera:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                                    <code class="language-haskell">
                                                                                                                                                                                                    sucesor :: Integer -> Integer
                                                                                                                                                                                                    sucesor x = x + 1
                                                                                                                                                                                                                    </code>
                                                                                                                                                                                                                </pre>

            <p class="my-4">
                En esta definición, <span style="color: blue">sucesor</span> es el nombre de la nueva función creada. El
                programador puede elegir cualquier
                nombre para las funciones que defina, aunque es conveniente que el nombre refleje el comportamiento de esta
                función. La primera línea es una declaración de tipo e indica que <span style="color: blue">sucesor</span>
                es una función de enteros en
                enteros, es decir, una función que toma un único argumento entero y devuelve como resultado un valor entero.
                La segunda línea es una ecuación matemática y proporciona el método que permite el retorno del valor, <span
                    style="color: #f8c555">x</span> es
                el parámetro formal de la función. Podría haberse usado otro nombre para el argumento, por ejemplo, <span
                    style="color: #f8c555">z</span> y
                definir la función así:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                                    <code class="language-haskell">
                                                                                                                                                                                    sucesor :: Integer -> Integer
                                                                                                                                                                                    sucesor y = y + 1
                                                                                                                                                                                                    </code>
                                                                                                                                                                                                </pre>


            <p class="my-4">
                La expresión tras el símbolo <span style="color: blue">=</span> indica cómo evaluar la función a partir de
                su argumento. Tras proporcionar la
                declaración de función anterior al evaluador, éste puede reducir expresiones en las que intervenga la nueva
                función, es decir se puede hacer el llamado a la función <span style="color: blue">sucesor</span> creada
                pasándole como parámetro un
                argumento. Una posible sesión es:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                        <code class="language-haskell">
                                                                                                                                                                                            Prelude > sucesor 3
                                                                                                                                                                                            Prelude > 10 * sucesor 3
                                                                                                                                                                                        </code>
                                                                                                                                                                                    </pre>

            <div class="desactivate" id="result-code6">
                <pre>
                                                                                                                                                                                        <code class="language-haskell">
                                                                                                                                                                            4 :: Integer
                                                                                                                                                                            40 :: Integer
                                                                                                                                                                                        </code>
                                                                                                                                                                                    </pre>
            </div>

            <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>


            <p class="my-4">
                La siguiente declaración muestra la definición de una función de los argumentos:
            </p>

            <pre class="line-numbers">
                                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                                                    sumaCuadrados :: Integer -> Integer -> Integer
                                                                                                                                                                                    sumaCuadrados x y = x * x + y * y
                                                                                                                                                                                </code>
                                                                                                                                                                            </pre>

            <p class="my-4">
                La función toma dos argumentos enteros y calcula la suma de sus cuadrados
            </p>


            <pre class="line-numbers">
                                                                                                                                                                        <code class="language-haskell">
                                                                                                                                                                            Prelude > sumaCuadrados 2 3
                                                                                                                                                                            Prelude > sumaCuadrados (2 + 2) 3
                                                                                                                                                                        </code>
                                                                                                                                                                    </pre>

            <div class="desactivate" id="result-code7">
                <pre>
                                                                                                                                                                            <code class="language-haskell">
                                                                                                                                                                13 :: Integer
                                                                                                                                                                25 :: Integer
                                                                                                                                                                            </code>
                                                                                                                                                                        </pre>
            </div>

            <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>


            <p class="my-4">
                La declaración de tipo indica que la función toma dos enteros y devuelve un entero. En general, los tipos de
                los distintos argumentos de la función aparecen separados por el constructor de tipo <span
                    style="color: blue">-></span>
            </p>


        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="reduccion">
            <h4 class="color-yellow">1.3 Reducción de expresiones</h4>
            <p class="my-4">
                La labor del evaluador (o interprete) es calcular el resultado que se obtiene al evaluar una expresión
                utilizando las definiciones de las funciones, involucradas. Para ello, el evaluador simplifica la expresión
                original todo lo posible y muestra el resultado. La simplificación se produce, en general, tras varios
                pasos. Por ejemplo, dada la siguiente declaración de función que calcula el <span
                    style="color: blue">doble</span> de su argumento:
            </p>
            <pre class="line-numbers">
                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                    doble :: Integer -> Integer
                                                                                                                                                    doble x = x + x
                                                                                                                                                                </code>
                                                                                                                                                            </pre>
            <p class="my-4">
                Se puede calcular el valor de la expresión 5 * <span style="color: blue">doble</span> 3 del siguiente modo:
            </p>
            <pre class="line-numbers">
                                                                                                                                                                <code class="language-haskell">
                                                                                                                                                    5 * doble 3
                                                                                                                                                    => {por definicion de doble}
                                                                                                                                                    5 * (3 + 3)
                                                                                                                                                    => {por el operador (+)}
                                                                                                                                                    5 + 6
                                                                                                                                                    => {por el operador (*)}
                                                                                                                                                    30
                                                                                                                                                                </code>
                                                                                                                                                            </pre>
            <p class="my-4">
                Se llamará a cada uno de los pasos anteriores una redacción, que se denotará con el símbolo =>. Como se ve,
                en cada paso de reducción el evaluador busca una parte de la expresión que sea simplificable (se llamara
                <span style="color: #f8c555">redex</span>) y la simplifica. Un ejemplo de <span
                    style="color: #f8c555">redex</span> es (3 + 3) que se simplifica a 6 en la segunda reducción. Una
                función seguida de sus parámetros se reduce sustituyendo, en la parte derecha de la ecuación de la función,
                los parámetros formales o argumentos por los que aparecen en la llamada (también llamados parámetros reales
                o simplemente parámetros). Cuando una expresión no pueda reducirse más se dice que está en forma normal.
                <br>
                La función del evaluador consiste entonces en buscar un <span style="color: #f8c555">redex</span> en la
                expresión, reducirlo y repetir este
                proceso hasta que la expresión esté en forma normal. Una vez alcanzada la forma normal, el evaluador muestra
                el resultado. Sin embargo, esta definición del comportamiento del evaluador es ambigua. En algunas
                expresiones existe más de un <span style="color: #f8c555">redex</span>. Por ejemplo, en la expresión <span
                    style="color: blue">doble</span> (<span style="color: blue">doble</span> 3) existen dos <span
                    style="color: #f8c555">redexes</span>. Se
                puede reducir la expresión desde dentro hacia fuera, es decir, reducir primero los <span
                    style="color: #f8c555">redexes</span> internos (los más
                anidados).
            </p>
            <pre class="line-numbers">
                                                                                                                                                        <code class="language-haskell">
                                                                                                                                            doble(doble 3)
                                                                                                                                            => {por definicion de doble}
                                                                                                                                            doble(3 + 3)
                                                                                                                                            => {por el operador (+)}
                                                                                                                                            doble 6
                                                                                                                                            => {por definicion de doble}
                                                                                                                                            6 + 6
                                                                                                                                            => {por el operador (+)}
                                                                                                                                            12
                                                                                                                                                        </code>
                                                                                                                                                    </pre>
            <p class="my-4">
                Esta es la forma en la que la mayoría de los programadores (es decir nosotros), probablemente, hubieran
                reducido la expresión anterior. Sin embargo, esta estrategia presenta algunos problemas. Una estrategia
                mejor consiste en reducir la expresión desde a fuera hacia dentro, es decir, reducir primero los <span
                    style="color: #f8c555">redexes</span>
                externos (los menos anidados). Para ello se ha de observar que la ecuación de la función puede ser vista
                como una regla de reescritura que indica que se puede reemplazar una aparición de esta función seguida de un
                argumento por dos copias del argumento separadas por el operador <span style="color: #f8c555">(+)</span>:
            </p>
            <pre class="line-numbers">
                                                                                                                                                    <code class="language-haskell">
                                                                                                                                        doble (x) => x + x
                                                                                                                                                    </code>
                                                                                                                                                </pre>
            <p class="my-4">
                Es decir, no es necesario evaluar previamente el parámetro para aplicar la definición de la función <span
                    style="color: blue">doble</span>.
                Se pueden pasar los parámetros a las funciones como expresiones sin reducir, no necesariamente como valores.
                Utilizando esta estrategia, la reducción es:
            </p>

            <pre class="line-numbers">
                                                                                                                                                <code class="language-haskell">
                                                                                                                                                    doble(doble 3)
                                                                                                                                                    => {por definicion de doble}
                                                                                                                                                    (doble 3) + (doble 3)
                                                                                                                                                    => {por definicion de doble}
                                                                                                                                                    (3 + 3) + (doble 3)
                                                                                                                                                    => {por el operador (+)}
                                                                                                                                                    6 + (doble 3)
                                                                                                                                                    => {por definicion de doble}
                                                                                                                                                    6 + (3 + 3)
                                                                                                                                                    => {por el operador (+)}
                                                                                                                                                    6 + 6
                                                                                                                                                    => {por el operador (+)}
                                                                                                                                                    12
                                                                                                                                                </code>
                                                                                                                                            </pre>


            <p class="my-4">
                Obsérvese que, tras la primera reducción, la expresión (<span style="color: blue">doble</span> 3) + (<span
                    style="color: blue">doble</span> 3) no es un <span style="color: #f8c555">redex</span> ya que el
                operador <span style="color: #f8c555">(+)</span>, al igual que los demás operadores aritméticos, solo puede
                ser reducido cuando sus dos
                parámetros sean valores en forma normal (es decir, cuando sean números). Para reducir la expresión e1 + e2
                hay que reducir previamente e1 y e2. Este tipo de funciones que para ser evaluadas necesitan que sus
                parámetros estén en forma normal se llaman <span style="color: blue">estrictas</span>. Hay entonces dos
                <span style="color: #f8c555">redexes</span> más externo: cada una de
                las apariciones de la expresión <span style="color: blue">doble</span> 3. Cuando esto ocurra, se reducirá el
                <span style="color: #f8c555">redex</span> que aparezca más a la
                izquierda en la expresión. Se puede observar que, sea cual sea la estrategia seguida de reducciones, el
                resultado final (valor 12), va a ser el mismo. Esto es consecuencia de una propiedad conocida como
                “transparencia referencial” que establece que una misma expresión denota siempre el mismo valor. La
                reducción cambia la forma de una expresión, pero no su valor o resultado. Puede entonces parecer que, si
                aparecen varios <span style="color: #f8c555">redexes</span>, se puede elegir cualquiera ya que el resultado
                final no variará. Sin embargo, la
                reducción de un <span style="color: #f8c555">redex</span> equivocado puede que no conduzca a la forma normal
                de una expresión. A modo de
                ejemplo, se considera las siguientes definiciones de funciones
            </p>

            <pre class="line-numbers">
                                                                                                                                    <code class="language-haskell">
                                                                                                                        infinito :: Integer
                                                                                                                        infinito = 1 + infinito

                                                                                                                        cero :: Integer -> Integer
                                                                                                                        cero x = 0
                                                                                                                                    </code>
                                                                                                                                </pre>

            <p class="my-4" id="primera-cero-infinito">
                La función cero devuelve el valor 0 sea cual sea su argumento, por lo que se tendrá <span class="px-3"
                    style="background-color: black">
                    <span style="color: white">n :: Integer * <span style="color: #f8c555">cero</span> n ==> 0</span></span>
                En particular, <span class="px-3" style="background-color: black"><span style="color: white"><span
                            style="color: #f8c555">cero</span> infinito ==> 0</span></span>. Si en cada momento de la
                reducción
                se elije el <span style="color: #f8c555">redex</span> más interno se
                obtiene la siguiente reducción:
            </p>


            <pre class="line-numbers">
                                                                                                                                <code class="language-haskell">
                                                                                                                    cero infinito
                                                                                                                    => {por definicion de infinito}
                                                                                                                    cero (1 + infinito)
                                                                                                                    => {por definicion de infinito}
                                                                                                                    cero (1 + (1 + infinito))
                                                                                                                    => {por definicion de infinito}
                                                                                                                    ...

                                                                                                                                </code>
                                                                                                                            </pre>

            <p class="my-4" id="segunda-cero-infinito">
                Y la evaluación no terminaría nunca, por lo que no se obtendría ningún resultado. Sin embargo, si en cada
                paso se elige el <span style="color: #f8c555">redex</span> más interno, se alcanza la forma normal en un
                solo paso:
            </p>

            <pre class="line-numbers">
                                                                                                                            <code class="language-haskell">
                                                                                                                cero infinito
                                                                                                                => {por definicion de cero}
                                                                                                                0
                                                                                                                            </code>
                                                                                                                        </pre>

            <p class="my-4">
                Como se puede ver, la estrategia utilizada para seleccionar el <span style="color: #f8c555">redex</span> es
                crucial, ya que puede hacer que se
                obtenga o no la forma normal de la expresión
            </p>


            <h5 style="font-weight: bold">1.3.1 órdenes de reducción aplicativo y normal</h5>

            <p class="my-4">
                Un orden de reducción es una estrategia que indica qué <span style="color: blue">redex</span> hay que
                seleccionar en cada paso de la
                reducción. Existen varios órdenes de reducción: dos de los más interesantes son el orden aplicativo y el
                orden normal. <br>
                El orden aplicativo es utilizado en la primera reducción del ejemplo anterior y consiste en seleccionar
                siempre el <span style="color: blue">redex</span> más interno (el más anidado en la expresión). En caso de
                que existan varios <span style="color: blue">redexes</span> que
                cumplan la condición anterior, se selecciona el que aparece más a la izquierda en la expresión. Esta
                estrategia de reducción es conocida como paso de parámetros por valor. Esto se debe a que, ante una
                aplicación de función, se reducen primero los parámetros de la función. Una vez conocidos los valores de los
                parámetros, se sustituyen en la ecuación de la función. Los evaluadores que utilizan este orden se les llama
                estrictos o impacientes. Uno de los problemas del paso por valor es que, a veces, se efectúan reducciones
                que no son necesarias para calcular el valor de la expresión. Por ejemplo, la siguiente reducción usa este
                orden para calcular el valor de la expresión cero (10 * 4):
            </p>

            <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                    cero (10 * 4)
                                                                                    => {por el operador (*) }
                                                                                    cero 40
                                                                                    => {por definicion de cero}
                                                                                    0
                                                                                                </code>
                                                                                            </pre>

            <p class="my-4">
                La expresión 10*4 fue reducida, aunque dicha reducción no es necesaria para calcular el resultado, ya que la
                función cero no necesita conocer el valor de su argumento. El ejemplo puede parecer artificial, pero en la
                práctica es habitual definir funciones que no necesitan evaluar todos sus parámetros. La estrategia de paso
                por valor tiene un problema aun más grave: puede no conducir a la forma normal de la expresión. Éste es el
                caso de la expresión <a style="color: #f8c555" href="#primera-cero-infinito">cero infinito</a>: <br>

                El orden de la reducción normal consiste en seleccionar el redex más externo (menos anidado) y, en caso de
                conflicto, de entre los más externos el que aparece más a la izquierda de la expresión. Esta estrategia de
                reducción se conoce como paso de parámetros por nombre, ya que se pasan como parámetro expresiones en vez de
                valores. Este orden fue el utilizado en la segunda reducción de la expresión <a style="color: #f8c555"
                    href="#segunda-cero-infinito">cero infinito</a>. A los
                evaluadores que utilizan el orden normal se les llama no estrictos. Una característica muy interesante del
                paso por nombre es que es normalizante: si la expresión considerada tiene forma normal, una reducción que
                use este orden la alcanza. Este resultado es conocido como el teorema de estandarización. Además, un
                evaluador no estricto sólo reducirá aquellos <span style="color: blue">redexes</span> que son necesarios
                para calcular el resultado final.
                Esta característica hace posible trabajar con estructuras de datos infinitas en los programas, aun siendo la
                memoria del ordenador finita. Se estudiará esto más a fondo en módulos posteriores
            </p>

            <h5 style="font-weight: bold">1.3.2 Evaluación perezosa</h5>

            <p class="my-4">
                Una reducción con paso por nombre (reducción normal) puede hacer que ciertas expresiones se reduzcan varias
                veces. Se puede observar que en la reducción no estricta de la expresión <span
                    style="color: blue">doble</span> (<span style="color: blue">doble</span> 3) la expresión (3 +
                3) es calculada dos veces. Esto no ocurre en la reducción paso por valor para la misma expresión. La
                estrategia de paso de parámetros por necesidad, también conocida como evaluación perezosa, soluciona este
                problema. La evaluación perezosa consiste en utilizar paso por nombre y recordar los valores de los
                argumentos ya calculados para evitar que el cálculo se repita.
            </p>

            <div style="width: 50%; height: 200px;" class="mx-auto">
                <img style="width: 70%" src="{{ asset('images/programacionFuncional/1.png') }}" alt="image 1">
            </div>

            <p class="my-4">
                Para ello cada expresión se representa mediante un grafo. Por ejemplo, en la figura anterior, se muestra la
                reducción de grafos correspondiente a la definición de función <span style="color: blue">doble</span>. Puede
                observarse que, en vez de crear
                dos copias del argumento de la función, se crean dos referencias al argumento original.
            </p>

            <div style="width: 100%; height: 200px">
                <img style="width: 100%" src="{{ asset('images/programacionFuncional/2.png') }}" alt="image 2">
            </div>

            <p class="my-4">
                La figura anterior muestra la reducción de la expresión <span style="color: blue">doble</span> (<span
                    style="color: blue">doble</span> 3) utilizando evaluación perezosa. Con
                objeto de poder expresar textualmente reducciones perezosas, se nombrará las expresiones compartidas. Así,
                la reducción de la figura anterior se escribiría como:
            </p>

            <pre class="line-numbers">
                                                                    <code class="language-haskell">
                                                                doble (doble 3)
                                                                => { por definición de doble }
                                                                a + a donde a = doble 3
                                                                => { por definición de doble }
                                                                a + a donde a = b + b donde b = 3
                                                                => { por el operador (+) }
                                                                a + a donde a = 6
                                                                => { por el operador (+) }
                                                                12
                                                                            </code>
                                                                        </pre>

            <p class="my-4">
                Obsérvese que la evaluación de las sumas no se ha repetido y que sólo fueron necesarias 4 reducciones para
                alcanzar la forma normal. Esto es el resultado general, ya que utilizando evaluación perezosa no se
                realizarán más reducciones que utilizando paso por valor. Como se puede ver, la evaluación perezosa posee
                las
                ventajas del paso por nombre y no es menos eficiente que el paso por valor. Es por ello que la mayoría de
                las implementaciones de Haskell utilizan un evaluador perezoso.
            </p>


        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="height: 100vh" id="sobrehaskell">
            <h4 class="color-blue">1.4 Sobre Haskell</h4>
            <p class="my-4">
                El lenguaje de programación Haskell surge tras una reunión celebrada en septiembre de 1987 en la conferencia
                Functional Programming Languages and Computer Architecture (FPCA 87). En dicha reunión se forma un comité
                cuyo objetivo es diseñar un lenguaje funcional puro y no estricto que unifique las ideas de distintos
                lenguajes funcionales existentes en dicho momento, con idea de construir un estándar tanto para la comunidad
                educativa como para la investigadora. El lenguaje ha ido pasando por distintas versiones hasta alcanzar una
                versión estable que se denomina Haskell 98. Existen varias implementaciones disponibles para Haskell 98. Una
                de las más populares es HUGS 98, una implementación interpretada de HASKELL 98 desarrollada por Mark Jones.
                Este software es de libre distribución y esta disponible para los sistemas más utilizados actualmente
                (Windows, Linux, Mac). Se puede encontrar más información sobre Haskell en la pagina oficial de <a
                    href="http://haskell.org" target="_blank">Haskell</a>. En
                este se encontrarán enlaces al software, ejemplos, documentación y otros contenidos relacionados con el
                lenguaje.
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplos">
            <h4 class="color-yellow">1.5 Ejemplos</h4>

            <p class="my-4">
                A continuación, se mostrarán una serie de ejemplos con relación a todo el material visto en este módulo, de
                esta manera se busca que usted como usuario pueda tener un mejor entendimiento del módulo y de cada una de
                las secciones y temas que se mencionaron. En estos ejemplos se verá sintaxis básica del lenguaje que no se
                ha mostrado en este módulo, pero se explicara cada una de estas.
            </p>

            <div class="row mx-auto mt-md-5">
                <div class="col-12 col-md-6">
                    <div class="card" style="min-height: 250px">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 1</h5>
                            <p class="card-text">
                                Según la definición de función, se pide que declare una función llamada
                                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                                multiplicar (x) * 2</p>
                            <a  href="{{ route('ejemplos', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">
                                Se requiere realizar una función que permita pedirle un número al
                                usuario por pantalla y luego utilizando la función DobleNumero() pasándole como parámetro el
                                número ingresado por el usuario, calcule la suma entre lo que devuelva la función y el
                                número ingresado anteriormente</p>
                            <a  href="{{ route('ejemplos', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 3</h5>
                            <p class="card-text">
                                Realice una función que pida un número a un usuario, y calcule la suma de los números
                                comprendidos desde 1 hasta el número ingresado por el usuario
                            </p>
                            <a  href="{{ route('ejemplos', ['id'=>3]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 4</h5>
                            <p class="card-text">
                                Dada una expresión, se pide que realice la reducción de la expresión hasta llegar a su
                                forma normal (utilizando el método de reducción aplicativo)
                            </p>
                            <a  href="{{ route('ejemplos', ['id'=>4]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 5</h5>
                            <p class="card-text">
                                Dada una expresión, se pide que realice la reducción de la expresión hasta llegar a su
                                forma normal (utilizando el método de reducción normal)
                            </p>
                            <a  href="{{ route('ejemplos', ['id'=>5]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 6</h5>
                            <p class="card-text">
                                Dada una expresión, se pide que realice la reducción de la expresión hasta llegar a su
                                forma normal (utilizando el método de reducción perezosa)
                            </p>
                            <a  href="{{ route('ejemplos', ['id'=>6]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="practica">
            <div id="enunciado" class="px-3" style="margin-top: 10%">
                <h4 class="color-blue">1.6 Practica</h4>
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
                        Dada una función llamada <span style="color: blue; font-weight: bold">restaNum()</span>, que toma como parámetro dos números y retorna la resta entre ellos,
                        ¿Cómo se declararía dicha función?
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
                                            restaNum :: Int -> Int;
                                            restaNum x = x - y
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
                                            restaNum :: Int -> Int;
                                            restaNum x y = x - y
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
                                            restaNum :: Int -> Int -> Int;
                                            restaNum x y = x - y
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
                                            restaNum :: Int -> Int -> Int;
                                            restaNum x = x - y
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
                                            ¿En reducción de expresiones, el orden de reducción aplicativo consiste en reducir siempre el termino más interno de la expresión?
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
                                            Si una función se declara de la forma que recibe los parámetros enteros y retorna como valor otro entero, ¿es estrictamente necesario que los valores pasados a la función sean enteros?
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
                                            ¿La reducción perezosa es una combinación entre la reducción aplicativo y la reducción normal?
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
                        Dada la siguiente reducción indiqué que tipo de reducción es, si es reducción aplicativa, reducción normal o reducción perezosa. 
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-4">
                            <h5 class="color-yellow">Código</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                            dobleNumero: Z -> Z
                            dobleNumero: (x) -> x * 2
                                    </code>
                                </pre>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="color-blue">Reducción</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                            dobleNumero: Z -> Z
                            dobleNumero: (x) -> x * 2
                                    </code>
                                </pre>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="text-center font-weight-bold">¿Que tipo de reducción es?</h6>
                            <form action="" class="form">
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option1" id="secondradio1">
                                        <label class="form-check-label" for="secondradio1"></label>
                                        <p class="p-order">
                                            Reducción Aplicativo
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option2" id="secondradio2">
                                        <label class="form-check-label" for="secondradio2"></label>
                                        <p class="p-order">
                                            Reducción Normal
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option3" id="secondradio3">
                                        <label class="form-check-label" for="secondradio3"></label>
                                        <p class="p-order">
                                            Reducción Perezosa
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
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
                        <a href="#" data-btnindex="3" class="btn btn-azul mt-md-3">Reiniciar</a>
                    </p>
                    <span></span>
                </div>

               
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        let resultados = {
            1 : {
                "respuest_correct" : "option3",
                "respuest_selected" : ""
            },
            2: {
                "question1" : {
                    "respuest_correct" : "true",
                    "respuest_selected" : "false"
                },
                "question2" : {
                    "respuest_correct" : "true",
                    "respuest_selected" : "false"
                },
                "question3" : {
                    "respuest_correct" : "false",
                    "respuest_selected" : "false"
                }
            },
            3 : {
                "respuest_correct" : "option1",
                "respuest_selected" : ""
            }
        }


        var getNumResults = () => {
            var total = 0    
            for(var key in resultados){
                var index = key.toString(),
                    obj = resultados[index] 
                if(key != 2){
                    if(obj.respuest_correct == obj.respuest_selected){
                        total += 1
                    }
                }else{
                    for(var key2 in obj){
                        if(obj[key2].respuest_correct == obj[key2].respuest_selected){
                            total += 1
                        }
                    }
                }
            }
            return total
        }

        //Reset Forms when script is loaded
        $('.form').each(function(index) {
            $(this)[0].reset()
        });

        // Changed color when is active
        $(".item").each(function(index) {
            $(this).on('click', (e) => {
                // e.preventDefault()
                $(".item").each(function(index) {
                    if ($(this).hasClass('active')) {
                        $(this).toggleClass('active')
                        let id = '#' + $(this).attr('data-name')
                        $(id).toggle('explode')
                    }
                })
                $(this).toggleClass('active')
                let id = '#' + $(this).attr('data-name')
                $(id).toggle('explode')
            })
        });

        $('.ejecutar').each(function(index) {
            $(this).on('click', (e) => {
                e.preventDefault()
                $(this).toggle('explode')
                let id = '#btn' + $(this).attr('data-close'),
                    id_content = '#result-code' + $(this).attr('data-close')
                $(id).addClass('btn')
                $(id_content).toggle('explode')
            })
        });

        $('.cerrar').each(function(index) {
            $(this).on('click', (e) => {
                e.preventDefault()
                $(this).removeClass('btn')
                let id = $(this).attr('id')
                id = id[id.length - 1]
                id_content = '#result-code' + id
                id = '#probar' + id
                $(id).toggle('explode')
                $(id_content).toggle('explode')
            })
        });

        $('#start-exe').on('click', (e) => {
            e.preventDefault()
            $('#ejercicio1').toggle('explode')
            $('#enunciado').toggle('explode')
        })

        $('.continue').each(function(index) {
            $(this).on('click', (e) => {
                // e.preventDefault()
                var id = parseInt($(this).attr('data-btnindex'))
                switch(id){
                    case 1:{
                        var selected = $("input[type='radio'][name='radiosexercise1']:checked");
                        if (selected.length > 0) {
                            selectedVal = selected.val();
                            resultados[1].respuest_selected = selectedVal
                            $('#ejercicio'+id).toggle('explode')
                            $('#ejercicio'+(id+1)).toggle('explode')
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'No se ha escogido ninguna opcion',
                                text: 'Por favor escoja alguna opción para poder continuar',
                            })
                        }
                        break
                    }
                    case 2:{
                        $('#ejercicio'+id).toggle('explode')
                        $('#ejercicio'+(id+1)).toggle('explode')
                        break
                    }
                    case 3:{
                        var selected = $("input[type='radio'][name='radiosexercise2']:checked");
                        if (selected.length > 0) {
                            selectedVal = selected.val();
                            resultados[3].respuest_selected = selectedVal
                            $('#ejercicio'+id).toggle('explode')
                            $('#result').toggle('explode')
                            let num_total = getNumResults()
                            $('#correct_ans').text(num_total)
                            if(num_total > 3){
                                $('#recomendation').addClass('succ')
                                $('#recomendation').html('Felicidades ha acertado en la mayoría de preguntas<br>Puede pasar al siguiente módulo')
                            }else{
                                $('#recomendation').addClass('err')
                                $('#recomendation').html('Lo sentimos no ha acertado en la mayoría de preguntas<br>Le recomendamos volver a practicar el módulo')
                            }
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'No se ha escogido ninguna opcion',
                                text: 'Por favor escoja alguna opción para poder continuar',
                            })
                        }
                        break
                    }
                }
            })
        });

        $('.btontruefalse').each(function(index) {
            $(this).change(() => {
                var index_btn = parseInt($(this).attr('data-indexbton')),
                    datastatus = '#data-status'+index_btn,
                    result_index = "question"+index_btn
                if(this.checked){
                    resultados[2][result_index].respuest_selected = "true"
                    $(datastatus).text('Verdadero')
                    $(datastatus).removeClass('false')
                    $(datastatus).addClass('true')
                }else{
                    resultados[2][result_index].respuest_selected = "false"
                    $(datastatus).text('Falso')
                    $(datastatus).removeClass('true')
                    $(datastatus).addClass('false')
                }
            })
        });
    </script>

@endsection
