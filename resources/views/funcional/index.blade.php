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
                funciones de un modo más versátil, como se verá posteriormente.
            </p>

        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="height: 100vh" id="reduccion">
            <h4 class="color-yellow">1.3 Reducción de expresiones</h4>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="height: 100vh" id="sobrehaskell">
            <h4 class="color-blue">1.4 Sobre Haskell</h4>
        </div>


    </div>

@endsection


@section('scripts')
    <script>
        // Changed color when is active
        $(".item").each(function(index) {
            $(this).on('click', (e) => {
                e.preventDefault()
                $(".item").each(function(index) {
                    if ($(this).hasClass('active')) {
                        $(this).toggleClass('active')
                        let id = '#' + $(this).attr('data-name')
                        // console.log(id)
                        $(id).toggle('explode')
                    }
                })
                $(this).toggleClass('active')
                let id = '#' + $(this).attr('data-name')
                // console.log(id)
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
                // $(id).toggle('explode')
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

    </script>

@endsection
