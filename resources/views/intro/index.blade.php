@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Intoducción a Haskell</h4>
        <ul>
            <li><a href="#" data-name="haskell" class="item active">2.1 El lenguaje Haskell</a></li>
            <li><a href="#" data-name="definidos" class="item">2.2 Tipos simples definidos</a></li>
            <li><a href="#" data-name="predefinidos" class="item">2.3 Constructores de tipos predefinidos</a></li>
            <li><a href="#" data-name="operadores" class="item">2.4 Operadores</a></li>
            <li><a href="#" data-name="patrones" class="item">2.5 Comparacion de patrones</a></li>
            <li><a href="#" data-name="case" class="item">2.6 Expresiones case</a></li>
            <li><a href="#" data-name="error" class="item">2.7 La función error</a></li>
            <li><a href="#" data-name="trozos" class="item">2.8 Funciones a trozos</a></li>
            <li><a href="#" data-name="condicionales" class="item">2.9 Expresiones condicionales</a></li>
            <li><a href="#" data-name="locales" class="item">2.10 Definiciones locales</a></li>
            <li><a href="#" data-name="modulos" class="item">2.11 Ambitos y modulos</a></li>
            <li><a href="#" data-name="ejemplos" class="item">2.12 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">2.13 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" style="min-height: 100vh" id="haskell">
            <h4 class="color-yellow">2.1 El lenguaje Haskell</h4>
            <p class="my-4">
                Haskell es un lenguaje funcional puro, no estricto y fuertemente tipificado. La primera de estas
                características indica que las funciones definibles en Haskell cumplen la propiedad de transparencia
                referencial <br>
                Una misma expresión denota siempre el mismo valor, sea cual sea el punto del programa en que aparezca <br>
                La pureza del lenguaje hace que el razonamiento ecuacional utilizado en matemáticas, que permite sustituir
                expresiones por otras equivalentes, sea aplicable a los programas. Esta propiedad hace variable una serie de
                técnicas que permiten, desde comprobar la corrección de los programas desarrollados (que realmente realizan
                la labor para la que fueron diseñados) hasta transformar programas en otros equivalentes más eficientes. Se
                estudiará estas técnicas en un módulo posterior. El termino no estricto hace referencia a que el orden
                utilizado para reducir expresiones no es el orden aplicativo. Las implementaciones de Haskell suelen usar
                evaluación perezosa como se vio en el módulo pasado, esta posee varias ventajas como son:
                <br>
            <ul class="container">
                <li>Es normalizante, es decir, siempre se encuentra la forma normal de aquellas expresiones que la poseen
                </li>
                <li>Se realiza el trabajo mínimo a la hora de evaluar una expresión, ya que sólo se reducen aquellos <span
                        style="color: blue">redexes</span> necesarios para calcular el valor normal de la expresión</li>
                <li>Es razonablemente eficiente, ya que no se realizan más reducciones que utilizando paso de parámetros por
                    valor</li>
                <li>Es posible trabajar con estructuras de datos infinitas aun sabiendo la memoria del computador finita
                </li>
            </ul>
            </p>
            <p class="my-4">
                La tipificación fuerte indica que los elementos del lenguaje utilizables están clasificados en distintas
                categorías o tipos. Cada objeto del lenguaje (valores, funciones, operadores, etc) tiene un tipo. Esta
                información permite comprobar que se hace un uso consistente de los distintos elementos del lenguaje. El
                sistema de tipos de Haskell es estático. Esto significa que todas las comprobaciones de tipos se realizan
                durante la compilación del programa. El sistema de tipos de Haskell es uno de los sofisticados hoy en día.
                Se trata de un sistema polimórfico que permite recuperar gran parte de la flexibilidad de los lenguajes no
                tipificados, pero que a la vez mantiene la corrección de los programas. El sistema de tipos también permite
                la sobrecarga: asignar la versión adecuada a utilizar en una expresión a partir de los tipos de argumentos.
            </p>
            <p class="my-4">
                La tipificación fuerte indica que los elementos del lenguaje utilizables están clasificados en distintas
                categorías o tipos. Cada objeto del lenguaje (valores, funciones, operadores, etc) tiene un tipo. Esta
                información permite comprobar que se hace un uso consistente de los distintos elementos del lenguaje. El
                sistema de tipos de Haskell es estático. Esto significa que todas las comprobaciones de tipos se realizan
                durante la compilación del programa. El sistema de tipos de Haskell es uno de los sofisticados hoy en día.
                Se trata de un sistema polimórfico que permite recuperar gran parte de la flexibilidad de los lenguajes no
                tipificados, pero que a la vez mantiene la corrección de los programas. El sistema de tipos también permite
                la sobrecarga: asignar la versión adecuada a utilizar en una expresión a partir de los tipos de argumentos.
            <ul class="container">
                <li><strong>Declararla</strong>: como se ha visto en el módulo anterior, se trata de indicar el tipo de los
                    argumentos que toma la función (en ejemplos anteriores solo se ha usado el tipo INT), y del resultado
                    que produce</li>
                <li><strong>Definirla</strong>: se trata de dar el método para computar el valor de dicha función</li>
            </ul>
            </p>


            <p class="my-4">
                Aunque el programador declare un tipo, el compilador lo infiere y comprueba éste sea válido. En otro caso
                avisa con un error. <br>
                La declaración consiste en el nombre de la función, el signo <span class="px-3"
                    style="background-color: black"><span style="color: white">::</span></span> y el tipo (Int, Float,
                String). La definición de una función consta del nombre de la función, seguida de los nombres asociados a
                cada parámetro formal separados por espacios en blanco, el signo igual <span style="color: blue">(=)</span>
                y la expresión que constituye el cuerpo de la función. <br>
                Los principales tipos de datos básicos predefinidos en Haskell son: <span style="color: blue">Char, Int,
                    Ineger, Float, Double, y Bool</span>. Nótese que los identificadores (o nombres) de tipo siempre
                comienzan con una letra mayúscula en Haskell. Por otro lado, los identificadores de funciones y variables
                comenzaran siempre por una letra minúscula. <br>
                Si usted crease un fichero de texto o un archivo con extensión .hs, con el siguiente contenido se
                consideraría que es un programa Haskell
            </p>

            <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    --Un ejemplo de Haskell
                                                                                                    --Calcula el siguiente entero al argumento
                                                                                                    sucesor: Integer -> Integer  
                                                                                                    sucesor x = x  + 1
                                                                                                    --Calcula la suma de los cuadrados de sus elementos
                                                                                                    sumaCuadrados :: Integer -> Integer -> Integer
                                                                                                    sumaCuadrados x y = x * x + y * y
                                                                                                </code>
                                                                                            </pre>

            <p class="my-4">
                Las líneas que comienzan por dos guiones son comentarios (es decir no forman parte de la ejecución del
                programa, se utilizan solo para agregar notas importantes en el código)
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="definidos">
            <h4 class="color-blue">2.2 Tipos simples definidos</h4>
            <p class="my-4">
                Existe una colección de tipos de datos, funciones y operadores que pueden usarse en cualquier programa.
                Éstos son elementos del lenguaje predefinidos. A continuación, se estudiará los principales tipos de datos
                predefinidos y las funciones asociadas a éstos.
            </p>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Tipo Bool</h5>
                <p class="my-4">
                    Los valores con este tipo representan expresiones lógicas cuyo resultado puede ser verdadero o falso.
                    Sólo
                    hay dos valores constantes para este tipo: True y False (han de escribirse así exactamente)
                </p>
                <h6 style="font-weight: bold" class="color-yellow">Funciones y operadores</h6>
                <p class="my-4">
                    Los siguientes operadores y funciones predefinidos operan con valores booleanos:
                </p>

                <pre class="line-numbers">
                    <code class="language-haskell">
                        (&&) :: Bool -> Bool -> Bool 
                        (||) :: Bool -> Bool -> Bool 
                        not :: Bool -> Bool -> Bool 
                        otherwise :: función constante que devuelve True
                    </code>
                </pre>

                <p class="my-4">
                    Los siguientes operadores y funciones predefinidos operan con valores booleanos:
                </p>

                <div class="row mx-auto">
                    <div class="col-6">
                        <table class="table w-75 mx-auto">
                            <thead>
                                <tr>
                                    <th scope="col">v1</th>
                                    <th scope="col">v2</th>
                                    <th scope="col">v1 && v2</th>
                                    <th scope="col">v1 || v2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>True</td>
                                    <td>True</td>
                                    <td>True</td>
                                    <td>True</td>
                                </tr>
                                <tr>
                                    <td>True</td>
                                    <td>False</td>
                                    <td>False</td>
                                    <td>True</td>
                                </tr>
                                <tr>
                                    <td>False</td>
                                    <td>True</td>
                                    <td>False</td>
                                    <td>True</td>
                                </tr>
                                <tr>
                                    <td>False</td>
                                    <td>False</td>
                                    <td>False</td>
                                    <td>False</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table w-75 mx-auto">
                            <thead>
                                <tr>
                                    <th scope="col">v1</th>
                                    <th scope="col">v2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>True</td>
                                    <td>False</td>
                                </tr>
                                <tr>
                                    <td>False</td>
                                    <td>True</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Tipo Int</h5>
                <p class="my-4">
                    Los valores de este tipo son números enteros de precisión limitada. Pueden usarse las expresiones <span
                        class="px-3" style="background-color: black"><span style="color: white">minBound:: Int</span></span>
                    y <br>
                    <span class="px-3" style="background-color: black"><span style="color: white">maxBound::
                            Int</span></span>
                    para determinar exactamente este intervalo. Así:
                </p>
                <div class="row mx-auto">
                    <div class="col-6">
                        <pre class="line-numbers">
                            <code class="language-haskell">
                                minBound:: Int
                            </code>
                        </pre>
                    </div>
                    <div class="col-6">
                        <pre class="line-numbers">
                            <code class="language-haskell">
                                maxBound:: Int
                            </code>
                        </pre>
                    </div>
                </div>
                <h6 style="font-weight: bold" class="color-yellow mt-md-4">Funciones y operadores</h6>
                <p class="my-4">
                    Algunas de las funciones y operadores definidos para este tipo es:
                </p>

                <pre class="line-numbers">
                                                                                                    <code class="language-haskell">
                                                                                                        (+),(-),(*) :: Int -> Int -> Int Suma resta y productos de enteros
                                                                                                        div, mod :: Int -> Int -> Int Cociente y resto de dividor dos números
                                                                                                        abs :: Int -> Int Valor absoluto
                                                                                                        sigmun:: Int Devuelve 1, -1 o 0 según el signo del argumento entero
                                                                                                        negate:: Int -> Int Invierte el signo de su argumento; también puede usarse para este propósito un uso prefijo
                                                                                                        even, odd :: Int -> Bool Comprueban la naturaleza par o impar de un número 
                                                                                                    </code>
                                                                                                </pre>

                <p class="my-4">
                    Se puede definir una función que a partir de la relación y luego calcular el maximo de sus argumentos:
                </p>

                <div class="row mx-auto">
                    <div class="col-6">
                        <h6 class="font-weight-bold">Definición</h6>
                        <pre class="line-numbers">
                                                                                                                    <code class="language-haskell">
                                                                                                                        maximo (x,y) = (x + y) + |x - y| / 2
                                                                                                                    </code>
                                                                                                                </pre>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">En Haskell</h6>
                        <pre class="line-numbers">
                                                                                                                    <code class="language-haskell">
                                                                                                                        maximo :: Int -> Int -> Int
                                                                                                                        maximo x y = div((x + y) + abs(x - y)) 2
                                                                                                                    </code>
                                                                                                                </pre>
                    </div>
                </div>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Tipo Integer </h5>
                <p class="my-4">
                    Los valores de este tipo de números enteros de precisión ilimitada. Se usan cuando los números tratados
                    se salen del rango de valores del tipo Int. Para este tipo de valores, están disponibles las mismas
                    operaciones que para los valores del tipo Int. Los cálculos con valores integer son menos eficientes que
                    los de tipo int
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Tipo Float</h5>
                <p class="my-4">
                    Los valores de este tipo de datos representan números reales. Hay dos modos de escribir valores reales:
                <ul class="container">
                    <li>La notación habitual: por ejemplo 1.35, -15.345, 1.0</li>
                    <li>La notación cientifica: por ejemplo 1.5e7, 1.5e-17</li>
                </ul>
                </p>
                <h6 style="font-weight: bold" class="color-yellow mt-md-4">Funciones y operadores</h6>
                <p class="my-4">
                    Algunas de las funciones y operadores definidos para este tipo es:
                </p>

                <pre class="line-numbers">
                    <code class="language-haskell">
                        (+),(-),(*) :: Float -> Float -> Float Suma resta y productos de reales
                        abs :: Float -> Float Valor absoluto
                        sigmun:: Float Devuelve 1.0, -1.0 o 0.0 según el signo del argumento entero
                        negate:: Float -> Float Invierte el signo de su argumento; también puede usarse para este propósito un uso prefijo
                        sin, asin, cos, acos, tan, atan :: Float -> Float funciones trignonometricas
                        atan2 :: Float -> Float -> Float atan2 x y devuelve la arcotangente de x/y
                        log, exp :: Float -> Float. Funciones logarítmicas y exponenciales
                        sqrt :: Float -> Float Raíz cuadrada
                        pi :: Float El valor de un número pi
                        truncate, round, floor y ceiling :: Float -> Integer o Float -> Int. Funciones de redondeo; truncate elimina la parte decimal, round redondea al entero más próximo, floor devuelve el entero inferior y ceiling el superior.
                        fromInt :: Int -> Float y fromInteger :: Integer -> Float. Funciones de conversión de tipo
                    </code>
                </pre>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Tipo Double</h5>
                <p class="my-4">
                    Los valores de este tipo son números reales. El subconjunto es mayor que el correspondiente al tipo
                    Float, y las aproximaciones obtenidas con ellos son por ello más precisas. Todas las operaciones
                    disponibles para el tipo Float están también disponibles para el tipo Double. Las primeras se denominan
                    en precisión simples, las segundas en precisión doble y de ahí es de donde procede el nombre.
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Tipo Char</h5>
                <p class="my-4">
                    Un valor de tipo char representa un carácter (una letra, un digito, un signo de puntuación, etc). Un
                    valor constante de tipo carácter se escribe entre comillas simples, por ejemplo:
                <ul class="container">
                    <li>‘a’ denota la a minúscula</li>
                    <li>‘1’ denota el carácter correspondiente al digito 1</li>
                    <li>‘?’ denota el carácter correspondiente al signo de interrogación</li>
                </ul>
                Algunos caracteres especiales se escriben precedidos por el carácter ‘\’:
                <ul class="container">
                    <li>‘\n’ es el carácter de salto de línea</li>
                    <li>‘\t’ es el carácter de tabulador</li>
                </ul>
                </p>

                <p class="my-4">
                    Algunas de las funciones y operadores definidos para este tipo es:
                </p>

                <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    ord :: Char -> Int. Devuelve el código ASCII correspondiente al carácter argumento. El código ASCII hace corresponder a cada carácter un número único.
                                                                                                    chr :: Int -> Char. Función inversa de ord
                                                                                                    isUpper. IsLower, isDigit, isAlpha :: Char -> Bool. Comprueban si el carácter argumento es una letra mayúscula, minúscula, un digito o una letra, respectivamente
                                                                                                    toUpper, toLower :: Char -> Char. Convierten la letra que toman como argumento en mayúscula o minúscula, respectivamente. 
                                                                                                </code>
                                                                                            </pre>

                <p class="my-4">
                    El siguiente diálogo ilustra algunas de las funciones anteriores:
                </p>

                <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    toUpper 'a'
                                                                                                    ord 'a'
                                                                                                    isUpper 'a'
                                                                                                    chr 98
                                                                                                </code>
                                                                                            </pre>
                <div class="desactivate" id="result-code1">
                    <pre>
                        <code class="language-haskell">
                            'A' :: char
                            97 :: Int
                            False :: Bool
                            'b' :: Char
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Operadores de igual orden </h5>
                <p class="my-4">
                    Para todos los tipos básicos comentados anteriormente están definidos los siguientes operadores
                    binarios, que devuelven un valor booleano
                </p>
                <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    (>) mayor que
                                                                                                    (<) menor que
                                                                                                    (==) igual a
                                                                                                    (>=) mayor o igual
                                                                                                    (<=) menor o igual
                                                                                                    (!=) distinto de
                                                                                                </code>
                                                                                            </pre>
                <p class="my-4">
                    El tipo de los argumentos para cualquier aplicación de los operadores anteriores debe ser el mismo (no
                    se pueden comparar valores de tipos distintos). El siguiente diálogo muestra el comportamiento de estos
                    operadores:
                </p>
                <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    10 <= 15
                                                                                                    'x' == 'y'
                                                                                                    'x' != 'y'
                                                                                                    'b' > 'a'
                                                                                                    False < True
                                                                                                    (1 < 5) && (10 > 9)
                                                                                                </code>
                                                                                            </pre>
                <div class="desactivate" id="result-code2">
                    <pre>
                                                                                                    <code class="language-haskell">
                                                                                                        True :: Bool
                                                                                                        False :: Bool
                                                                                                        True :: Bool
                                                                                                        True :: Bool
                                                                                                        True :: Bool
                                                                                                        True :: Bool
                                                                                                    </code>
                                                                                                </pre>
                </div>
                <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Para el tipo Char el orden viene dado por el código ASCII del carácter. Las letras mayúsculas tienen un
                    código ASCII menor que las minúsculas. Dentro de cada grupo se respeta el orden alfabético. Las vocales
                    acentuadas y la letra ñ aparecen fuera del orden habitual. En el caso del tipo Bool, el valor False se
                    considera menor que True. La ultima línea del diálogo muestra que se produce un error de tipo si se
                    intentan comparar dos valores con tipos distintos. Nótese que el operador de igualdad se escribe con dos
                    caracteres (==); el símbolo = se usa para definir funciones. <br>
                    Para todos los tipos que definen un orden están definidas las funciones min y max que devuelven el
                    mínimo o el máximo de dos valores respectivamente:
                </p>
                <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    min 10 15
                                                                                                    max 10 15
                                                                                                </code>
                                                                                            </pre>
                <div class="desactivate" id="result-code3">
                    <pre>
                                                                                                    <code class="language-haskell">
                                                                                                        10 :: Integer
                                                                                                        15 :: Integer
                                                                                                    </code>
                                                                                                </pre>
                </div>
                <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    La siguiente función comprueba si su argumento está entre cero y nueve:
                </p>
                <pre class="line-numbers">
                                                                                                <code class="language-haskell">
                                                                                                    entre0y9 :: Integer -> Bool
                                                                                                    entre0y9 :: (0 <= x) && (x <= 9)
                                                                                                </code>
                                                                                            </pre>
            </div>

        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="predefinidos">
            <h4 class="color-yellow">2.3 Constructores de tipos predefinidos</h4>
            <p class="my-4">
                Además de los tipos simples comentados, Haskell define tipos estructurados que permiten representar
                colecciones de objetos.
            </p>
            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Tuplas</h5>
                <p class="my-4">
                    Una tupla es un dato compuesto donde el tipo de cada componente puede ser distinto. Los valores de tipo
                    tupla se escriben separando con comas los distintos componentes y encerrando todas entre paréntesis. Una
                    tupla tiene un tipo asociado: el tipo se escribe separando los tipos de las distintos componentes con
                    comas y entre paréntesis:
                </p>
                <pre class="line-numbers">
                                                                                    <code class="language-haskell">
                                                                                        Si v1,v2, ... vn son valores con tipo t1,t2, ... , tn
                                                                                        entonces (v1,v2, ... , vn) es una tupla con tipo (t1,t2, ..., tn)
                                                                                    </code>
                                                                                </pre>
                <p class="my-4">
                    El siguiente diálogo muestra algunos valores con tipo tupla:
                </p>
                <pre class="line-numbers">
                                                                                            <code class="language-haskell">
                                                                                                ()
                                                                                                ('a', True)
                                                                                                ('a', True, 1.5)
                                                                                            </code>
                                                                                        </pre>
                <div class="desactivate" id="result-code4">
                    <pre>
                                                                                                <code class="language-haskell">
                                                                                                    () :: ()
                                                                                                    ('a', True) :: (Char, Bool)
                                                                                                    ('a', True, 1.5) :: (Char, Bool, Double)
                                                                                                </code>
                                                                                            </pre>
                </div>
                <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>


                <p class="my-4">
                    Obsérvese que existe una tupla sin elementos, y que su tipo correspondiente se escribe de modo idéntico
                    al valor <br>
                    Las tuplas son útiles cuando una función ha de devolver más de un valor. La siguiente función devuelve
                    el predecesor y el sucesor del argumento como tupla
                </p>

                <pre class="line-numbers">
                                                                                            <code class="language-haskell">
                                                                                                predSue :: Integer -> (Integer, Integer)
                                                                                                predSue x = (x-1,x+1)
                                                                                            </code>
                                                                                        </pre>
            </div>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Listas</h5>
                <p class="my-4">
                    Una lista es una colección de cero o más elementos todos del mismo tipo. Hay dos constructores
                    (operadores que permiten construir valores) para listas:
                <ul class="container">
                    <li>[] Representa la lista vacía (una lista sin elementos)</li>
                    <li>(:) Permite añadir un elemento al principio de una lista. Si xs es una lista con n elementos, y x es
                        un elemento, entonces x : xs es una lista con n + 1 elementos. Es necesario recalcar que todos los
                        elementos de una lista deben ser del mismo tipo</li>
                </ul>
                Si el tipo de todos los elementos de una lista es t, entonces el tipo de la lista se escribe [t]:
                </p>
                <pre class="line-numbers">
                                                                                            <code class="language-haskell">
                                                                                                Si v1,v2 ... , vn son valores con tipo t
                                                                                                entonces v1 : (v2 : (... (vn-1 : (vn : []))...)) es una lista con tipo (t)
                                                                                            </code>
                                                                                        </pre>
                <p class="my-4">
                    Algunos ejemplos de listas son:
                <ul class="container">
                    <li>1 : []. Una lista que almacena un único entero; tiene tipo [Integer]</li>
                    <li>3 : (1 : [] ). Una lista que almacena dos enteros; el valor 3 ocupa la primera posición dentro de la
                        lista, el valor 1 la segunda.</li>
                    <li>‘a’ : ( 1 : [] ). Es una expresión errónea (produce un error de tipo) ya que todos los componentes
                        de una lista deben ser de un mismo tipo.</li>
                </ul>
                El constructor (:) es asociativo a la derecha por lo que, en ausencia de paréntesis, el significado de la
                expresión es el mismo que si éstos aparecieran anidados a la derecha. Esto permite una notación más simple
                para representar listas no vacías:
                </p>
                <pre class="line-numbers">
                                                                                            <code class="language-haskell">
                                                                                                x1 : x2 : ... : xn - 1 : x => (x1 : (x2 : (... (xn-1 : (xn : [])))...))
                                                                                            </code>
                                                                                        </pre>
                <p class="my-4">
                    Aun así, la notación sigue siendo engorrosa, por lo que Haskell permite una sintaxis para listas más
                    cómoda: escribir elementos entre corchetes y separarlos por comas:
                </p>
                <pre class="line-numbers">
                                                                                            <code class="language-haskell">
                                                                                                |x1,x2, ... , xn-1, xn | => x1 : (x2 : (... (xn - 1 :(xn : [])) ... ))
                                                                                            </code>
                                                                                        </pre>
                <p class="my-4">
                    El siguiente diálogo muestra tres modos de escribir la misma lista. Puede observase que el resultado
                    siempre es el mismo.
                </p>
                <pre class="line-numbers">
                                                                                            <code class="language-haskell">
                                                                                                1 : (2 : (3 : []))
                                                                                                1 : 2 : 3 : []
                                                                                                [1,2,3]
                                                                                            </code>
                                                                                        </pre>
                <div class="desactivate" id="result-code5">
                    <pre>
                                                                                                <code class="language-haskell">
                                                                                                    [1,2,3] :: [Integer]
                                                                                                    [1,2,3] :: [Integer]
                                                                                                    [1,2,3] :: [Integer]
                                                                                                </code>
                                                                                            </pre>
                </div>
                <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Cadena de caracteres</h5>
                <p class="my-4">
                    Una cadena de caracteres es una secuencia de cero a más caracteres. Este tipo de datos es muy útil ya
                    que permite trabajar con textos. En Haskell, las cadenas de caracteres son listas de caracteres. El tipo
                    asociado a las cadenas de caracteres es String. Este nombre de tipo es tan solo un modo equivalente de
                    escribir [Char]. Por ejemplo, el valor [‘h’,’o’,’l’,’a’] es una cadena de cuatro caracteres y tiene el
                    tipo [Char]. Se permite una sintaxis más cómoda para escribir cadenas de caracteres: escribir entre
                    comillas dobles.
                </p>

                <pre class="line-numbers">
                                                                                        <code class="language-haskell">
                                                                                            "x1, x2, ... , xn-1, xn" => ['x1','x2', ... 'xn-1','xn']
                                                                                        </code>
                                                                                    </pre>

                <p class="my-4">
                    El siguiente dialogo muestra tres modos de escribir la misma cadena de caracteres:
                </p>
                <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                ['U','n','','C','o','c','h','e']
                                                                                'U':'n':'':'C':'o':'c':'h':'e':[]
                                                                                "Un Coche"
                                                                            </code>
                                                                        </pre>

                <div class="desactivate" id="result-code6">
                    <pre>
                                                                                <code class="language-haskell">
                                                                                    "Un Coche" :: [Char]
                                                                                    "Un Coche" :: [Char]
                                                                                    "Un Coche" :: String
                                                                                </code>
                                                                            </pre>
                </div>
                <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="operadores">
            <h4 class="color-blue">2.4 Operadores</h4>
            <p class="my-4">
                En haskell se puede definir, además de funciones, operadores. Se trata de funciones con dos argumentos cuyo
                nombre, es simbólico (una cadena de signos, no letras) y que pueden ser involucrados de forma fija (entre
                sus dos argumentos). Ya se ha visto algunos de los operadores predefinidos como &&, ||, +, -, *, /. El
                programador (o sea usted) puede definir sus propios operadores. Como identificador puede utilizar uno o más
                de los siguientes símbolos:
            </p>
            <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                : ! # $ % & * + . / < = > ? @ \ | - ~
                                                                            </code>
                                                                        </pre>
            <p class="my-4">
                Los operadores que comienzan por el carácter dos puntos (:) tienen un significado especial: son
                constructores infinitos de datos. Un constructor de datos es usado para construir valores de un tipo.
                Algunos ejemplos son:
            </p>
            <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                + ++ && || <= == != . // $
                                                                                % @@ \/ /\ <+> ?
                                                                            </code>
                                                                        </pre>
            <p class="my-4">
                Los que aparecen en la primera línea son predefinidos. Algunas combinaciones de símbolos son claves del
                lenguaje y no pueden ser usados por el programador como nombres de nuevos operadores; estos son:
            </p>
            <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                :: -> => : .. = @ \ | <- ~
                                                                            </code>
                                                                        </pre>

            <p class="my-4">
                A la hora de definir un operador se puede indicar su prioridad y su asociatividad. Esto se consigue con las
                cláusulas <span style="color: blue">inflix</span>:
            </p>

            <pre class="line-numbers">
                                                                    <code class="language-haskell">
                                                                        inflix prioridad identificador operador (define un operador no asociativo)
                                                                        inflixl prioridad identificador operador (define un operador asociativo a la izquierda)
                                                                        inflixr prioridad identificador operador (define un operador asociativo a la derecha)
                                                                    </code>
                                                                </pre>

            <p class="my-4">
                Para declarar el tipo de un operador hay que escribir el identificador de éste entre paréntesis. En la parte
                izquierda de la definición del cuerpo del operador se puede usar notación infija (el operador aparece entre
                sus dos argumentos). Se puede definir un operador (~=) para ver si dos valores reales son aproximadamente
                iguales:
            </p>

            <pre class="line-numbers">
                                                                    <code class="language-haskell">
                                                                        inflix 4 ~=
                                                                        (~=) :: Float -> Float -> Bool 
                                                                        x ~= y = abs(x - y) < 0.0001
                                                                    </code>
                                                                </pre>

            <p class="my-4">
                El operador ha sido declarado no asociativo y con prioridad 4. Como se muestra en el ejemplo, es obligatorio
                escribir el operador entre paréntesis en la declaración de tipo correspondiente. Además, como muestra la
                siguiente sesión:
            </p>


            <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            1.0 ~= 2.0
                                                                            1.0 ~= 1.000001
                                                                        </code>
                                                                    </pre>
            <div class="desactivate" id="result-code7">
                <pre>
                                                                            <code class="language-haskell">
                                                                                False :: Bool
                                                                                True :: Bool
                                                                            </code>
                                                                        </pre>
            </div>
            <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>

            <p class="my-4">
                El operador se puede usar de modo infijo. Observase que el programador no puede definir operadores unitarios
                (es decir de un solo argumento). El único operador unitario en Haskell es el cambio de signo o negación
                representado con el signo – prefijo:
            </p>

            <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            -(7 + 2)
                                                                        </code>
                                                                    </pre>

            <div class="desactivate" id="result-code8">
                <pre>
                                                                            <code class="language-haskell">
                                                                                -9 :: Integer
                                                                            </code>
                                                                        </pre>
            </div>
            <a href="#" data-close="8" id="probar8" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn8" class="btn-primary cerrar desactivate">Cerrar</a>

            <p class="my-4">
                Si en una expresión aparecen operadores con prioridades distintas, se agrupan primero aquellos con mayor
                prioridad, en ausencia de paréntesis. Por ejemplo, la expresión 1 + 2 * 4 es interpretada como 1 + (2 * 4)
                que el operador (*) tiene mayor prioridad (7) que el operador (+) (6). A continuación, se muestra la
                asociatividad y prioridad de operadores predefinidos.
            </p>

            <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            inflxr 9
                                                                            inflxr 9 !!
                                                                            inflxr 8 *
                                                                            inflxr 7 *, /, 'quot', 'rem', 'div', 'mod'
                                                                            inflxr 6 +, -
                                                                            inflxr 5 :, ++
                                                                            inflxr 4 ==, !=, <, <=, >=, >, 'elem', 'notElem'
                                                                            inflxr 3 &&
                                                                            inflxr 2 || 
                                                                            inflxr 1 >>, >>=
                                                                            inflxr 1 =<<
                                                                            inflxr 0 $, $!, 'seq'
                                                                        </code>
                                                                    </pre>

            <p class="my-4">
                Se pueden utilizar paréntesis si la interpretación deseada es otra: (1 + 2) * 4, o para aclarar el
                significado. La llamada a una función (aplicación de uno o más argumentos a una función) tiene la prioridad
                máxima (10), por lo que la expresión cuadrado 3 + 4 donde cuadrado es:
            </p>

            <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            cuadrado :: Integer -> Integer
                                                                            cuadrado x = x * x
                                                                        </code>
                                                                    </pre>

            <p class="my-4">
                Es interpretada como (cuadrado 3) + 4. Si lo que se desea es calcular el cuadrado de 3 + 4 se ha de usar
                paréntesis: cuadrado (3+4) <br>
                Si un operador es no asociativo no puede ser utilizado más de una vez en una expresión sin aclarar el
                significado con paréntesis. Por ejemplo, si se define el siguiente operador de división como no asociativo,
                se obtiene el siguiente resultado:
            </p>

            <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            inflix 7 /\
                                                                            (/\) :: Integer -> Integer
                                                                            x /\ y = div x y

                                                                            7 /\ 4 /\ 2
                                                                            
                                                                            (7 /\ 4) /\ 2

                                                                            1 < 2 == True
                                                                        </code>
                                                                    </pre>

            <div class="desactivate" id="result-code9">
                <pre>
                                                                            <code class="language-haskell">
                                                                                ERROR: Ambiguos use of operator "/\" with "/\"
                                                                                
                                                                                0 :: Integer

                                                                                ERROR: Ambiguos use of operator "<" with "=="
                                                                            </code>
                                                                        </pre>
            </div>
            <a href="#" data-close="9" id="probar9" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn9" class="btn-primary cerrar desactivate">Cerrar</a>

            <p class="my-4">
                En Haskell todo operador toma por defecto prioridad 9 y asociatividad izquierda. Sin embargo, recomendable
                incluir la cláusula siempre que se declare un operador.
            </p>


            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Operadores frente a funciones</h5>
                <p class="my-4">
                    La principal diferencia entre un operador y una función de dos argumentos es que los operadores se usan
                    de modo infijo (entre sus argumentos) mientras que las funciones se usan de modo prefijo (preceden a sus
                    argumentos). Como los dos conceptos son tan similares, Haskell permite convertir cualquier operador en
                    una función de dos argumentos del siguiente modo:
                </p>
                <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                (~=) 1.0 2.0
                                                                                (~=) 1.0 1.00001
                                                                            </code>
                                                                        </pre>
                <div class="desactivate" id="result-code10">
                    <pre>
                                                                                <code class="language-haskell">
                                                                                    False :: Bool 
                                                                                    True :: Bool
                                                                                </code>
                                                                            </pre>
                </div>
                <a href="#" data-close="10" id="probar10" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn10" class="btn-primary cerrar desactivate">Cerrar</a>

                <p class="my-4">
                    Los paréntesis son obligatorios en los ejemplos anteriores. También se puede usar notación prefija al
                    declarar el operador. La definición del operador (~=) puede realizarse del siguiente modo:
                </p>

                <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                infix 4 ~=
                                                                                (~=) :: Float -> Float -> Bool 
                                                                                (~=) x y = abs(x - y) < 0.0001
                                                                            </code>
                                                                        </pre>

                <p class="my-4">
                    Cualquier operador puede usarse tanto de modo prefijo como de modo infijo, independientemente del modo
                    en que éste declarado. Por ejemplo, la suma puede también se usada de modo prefijo:
                </p>

                <pre class="line-numbers">
                                                                            <code class="language-haskell">
                                                                                (+) 3 4
                                                                            </code>
                                                                        </pre>

                <div class="desactivate" id="result-code11">
                    <pre>
                                                                                <code class="language-haskell">
                                                                                    7 :: Integer
                                                                                </code>
                                                                            </pre>
                </div>
                <a href="#" data-close="11" id="probar11" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn11" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="patrones">
            <h4 class="color-blue">2.5 Comparacion de patrones</h4>
            <p class="my-4">
                En la mayoría de lenguajes de programación, los parámetros formales de una función sólo pueden ser nombres
                de variables. En Haskell hay además otras posibilidades: un argumento puede ser un patrón. <br>
                Es posible definir una función dando más de una ecuación para esta. Cada ecuación va a definir el
                comportamiento de la función dependiendo el argumento recibido. Al aplicar la función a un parámetro
                completo la comparación de patrones determina la ecuación a utilizar. Por tanto, el uso de patrones permite
                modelar como se evaluará una llamada a una función a partir de sus argumentos.
            </p>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Patrones constantes</h5>
                <p class="my-4">
                    Un patrón constante puede ser un número, un carácter o un constructor de datos. Con un patrón constante
                    sólo unifica (o concuerda) un argumento que coincida con dicha constante, véase la siguiente función:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f :: Integer -> Bool
                        f1 = True
                        f2 = False

                        f 1
                        f 2
                        f 3
                    </code>
                </pre>
                <div class="desactivate" id="result-code12">
                    <pre>
                                                                            <code class="language-haskell">
                                                                                True :: Bool
                                                                                False :: Bool
                                                                                Program error :: {f3}
                                                                            </code>
                                                                        </pre>
                </div>
                <a href="#" data-close="12" id="probar12" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn12" class="btn-primary cerrar desactivate">Cerrar</a>


                <p class="my-4">
                    Nótese que toma un valor entero y devuelve true si el argumento es 1 o false si el argumento es 2. <br>
                    La función está parcialmente definida (su conjunto inicial es Integer, pero el dominio es tan solo
                    {1,2}). Para cualquier otro entero la función no esta definida. Si se quiere definir totalmente la
                    función se puede añadir otra ecuación, por ejemplo:
                </p>

                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            f :: Integer -> Bool
                                                                            f1 = True
                                                                            f2 = False
                                                                            fx = True
                                                                        </code>
                                                                    </pre>
                <p class="my-4">
                    El resultado ahora es cierto para cualquier valor distinto a 2:
                </p>

                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            f 3 
                                                                        </code>
                                                                    </pre>
                <div class="desactivate" id="result-code13">
                    <pre>
                                                                            <code class="language-haskell">
                                                                                True :: Bool
                                                                            </code>
                                                                        </pre>
                </div>
                <a href="#" data-close="13" id="probar13" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn13" class="btn-primary cerrar desactivate">Cerrar</a>

                <p class="my-4">
                    Para reducir una aplicación de una función definida mediante patrones se van probando las ecuaciones en
                    el orden en que aparecen en la definición, hasta encontrar una que unifique con el argumento y su cuerpo
                    es el que se utiliza para reducir la expresión. Como se puede ver, el orden de las ecuaciones es
                    importante. En una definición como:
                </p>

                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            f :: Integer -> Integer
                                                                            f 1 = True
                                                                            f 1 = False
                                                                            f x = True
                                                                        </code>
                                                                    </pre>

                <p class="my-4">
                    La expresión F1 siempre será reducida a True. Si se permitiera que la elección fuese arbitraria se
                    perdería la transparencia referencial. Ya que una misma expresión (F1) podría tener dos valores
                    distintos.
                    <br>
                    Las funciones que se definen en los patrones pueden aparecer como parte de la expresión resultado. A
                    esto se llama recursividad. El uso de patrones y de la recursividad permite dar definiciones de
                    funciones muy compactas y elegantes. La función fact calcula recursivamente el factorial de un número
                    natural.
                </p>

                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            fact :: Integer -> Integer
                                                                            fact 0 = 1
                                                                            fact n = n * fact(n - 1)
                                                                        </code>
                                                                    </pre>

                <p class="my-4">
                    Así, la expresión fact 3 se reduce del siguiente modo:
                </p>

                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            fact 3
                                                                            => {segunda ecuación de fact (n = 3)}
                                                                            3 * fact (3 - 1)
                                                                            => {definición de (-)}
                                                                            3 * fact 2
                                                                            => {segunda ecuación de fact (n = 2)}
                                                                            3 * fact (2 * (2 - 1))
                                                                            => {definición de (-)}
                                                                            3 * (2 * fact 1)
                                                                            => {segunda ecuación de fact (n = 1)}
                                                                            3 * (2 * (1 * fact (1 - 1)))
                                                                            => {definición de (-)}
                                                                            3  * (2 * (1 * fact 0))
                                                                            => {primera ecuación de fact}
                                                                            3  * (2 * (1 * 1))
                                                                            => {definición de (*)}
                                                                            3  * (2 * 1)
                                                                            => {definición de (*)}
                                                                            3  * 2
                                                                            => {definición de (*)}
                                                                            6
                                                                        </code>
                                                                    </pre>
            </div>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Patrones para listas</h5>
                <p class="my-4">
                    Es posible utilizar patrones al definir funciones que trabajen con listas. Los patrones para listas
                    toman las siguientes formas:
                <ul class="container">
                    <li>[] Sólo unifica con un argumento que sea una lista vacía</li>
                    <li>[x], [x,y], etc. Sólo unifican con listas de uno, dos, etc argumentos </li>
                    <li>(x:xs) Unifica con listas con al menos un elemento: x queda ligada a la cabeza (primer elemento de
                        la lista), xs queda ligada a la cola (la lista argumento sin el primer elemento). Así, el resultado
                        de unificar la lista [1,2,3] con el patrón (x : xs) es el par de sustituciones (x <- 1, xs <-
                            [2,3]).</li>
                </ul>
                La siguiente función toma una lista de valores enteros y los suma:
                </p>


                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            suma :: [Integer] -> Integer
                                                                            suma[] = 0   --Caso base
                                                                            suma(x : xs) = x + suma xs  --Caso Recursivo
                                                                        </code>
                                                                    </pre>


                <p class="my-4">
                    Las dos ecuaciones hacen que la función este definida para cualquier lista. La primera será utilizada si
                    la lista esta vacía, mientras que la segunda se usará en otro caso. Tenemos la siguiente reducción:
                </p>

                <pre class="line-numbers">
                                                                        <code class="language-haskell">
                                                                            suma [1,2,3]
                                                                            =>{sintaxis de listas}
                                                                            suma (1 : (2 : (3 : [])))
                                                                            =>{segunda ecuación de suma (x -> 1, xs -> 2 : (3 : []))}
                                                                            1 + suma (2 : (3 : []))
                                                                            =>{segunda ecuación de suma (x -> 2, xs -> 3 : [])}
                                                                            1 + (2 + (3 + suma []))
                                                                            =>{primera ecuación de suma}
                                                                            1 + (2 + (3 + 0))
                                                                            =>{definición de (+) tres veces}
                                                                            6
                                                                        </code>
                                                                    </pre>


                <p class="my-4">
                    Obsérvese que cada vez que se aplica la segunda ecuación, la variable x queda ligada al primer elemento
                    de la lista y xs al resto de ésta. Cuando la lista tiene un único elemento se aplica la segunda
                    ecuación, aunque xs queda ligada a la lista vacía.
                </p>


            </div>


            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Patrones para tuplas</h5>
                <p class="my-4">
                    También puede usarse la sintaxis de tuplas en patrones. <br>
                    Las siguientes funciones permiten seleccionar el primer elemento de tupla con dos y tres componentes
                    enteras:
                </p>
                <pre class="line-numbers">
                                                    <code class="language-haskell">
                                                        primero2 :: (Integer, Integer) -> Integer
                                                        primero2 (x,y) = x

                                                        primero3 :: (Integer, Integer, Integer) -> Integer
                                                        primero3 (x,y,z) = x

                                                        primero2 (5,8)
                                                        primero3 (5,8,7)
                                                        primero2 (5,8,7)
                                                    </code>
                                                </pre>
                <div class="desactivate" id="result-code14">
                    <pre>
                        <code class="language-haskell">
                            5 :: Integer
                            5 :: Integer
                            ERROR
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="14" id="probar14" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn14" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Obsérvese que en el ultimo caso se ha producido un error de tipo ya que la función primero2 está
                    definida para pares y el argumento es una terna
                    <br>
                    Los patrones pueden anidarse. La siguiente función suma todos los elementos almacenados en una lista de
                    pares:
                </p>
                <pre>
                    <code class="language-haskell">
                        sumaPares :: [(Integer, Integer)] -> Integer
                        sumaPares[]
                        sumaPares((x,y):xs) = x + y + sumaPares xs
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo
                </p>
                <pre>
                    <code class="language-haskell">
                        sumaPares[(1,2),(3,4)]
                        => {sintaxis de listas}
                        sumaPares((1,2):((3,4):[]))
                        => {segunda ecuación de sumaPares (x <- 1, y <- 2, xs <- (3,4):[])}
                        1 + 2 + sumaPares((3,4):[])
                        => {segunda ecuación de sumaPares (x <- 3, y <- 4, xs <- [])}
                        1 + 2 + (3 + 4 + sumaPares[])
                        => {primera ecuación de sumaPares}
                        1 + 2 + (3 + 4 + 0)
                        => {definición de (+) cuatro veces}
                        10
                    </code>
                </pre>
                <p class="my-4">
                    El patrón ((x,y):xs) concuerda con una lista de pares no vacía, unificando x con la primera
                    componente del par en la cabeza de la lista, y con la segunda componente y xs con la lista
                    de pares que se obtiene al eliminar el primer par
                </p>
            </div>

            <div class="p-md-3 p-3 content-line">
                <h5 style="font-weight: bold">Patrones aritméticos</h5>
                <p class="my-4">
                    Un patrón de la forma (n + k), donde k es una constante natural, sólo unifica con un argumento que sea
                    un número entero mayor o igual que k y asocia a la variable n en el valor de dicho número menos k, se
                    puede definir la función factorial del siguiente modo:
                </p>
                <pre class="line-numbers">
                                                    <code class="language-haskell">
                                                        factorial :: Integer -> Integer
                                                        factorial 0 = 1
                                                        factorial(n + 1) = (n + 1) + factorial n
                                                    </code>
                                                </pre>
                <p class="my-4">
                    La reducción de facotrial 2 es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        factorial 2
                        => {segunda ecuación de factorial (n <- 1)}
                        (1 + 1) * factorial 1
                        => {definición de (+)}
                        2 * factorial 1
                        => {segunda ecuación de factorial (n <- 0)}
                        2 * ((0 + 1) * facotrial 0)
                        => {definición de (+)}
                        2 * (1 * factorial 0)
                        => {primera ecuación de factorial}
                        2 * (1 * 1)
                        => {definición de (*) dos veces}
                        2
                    </code>
                </pre>
                <p class="my-4">
                    Nótese que se le aplica la segunda ecuación mientras el argumento sea mayor o igual que 1. Cada vez que
                    se aplica dicha ecuación, n queda ligada al argumento menos 1. Hay una diferencia sutil que suele pasar
                    inadvertida entre la definición anterior y la de la función fact:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        fact :: Integer -> Integer
                        fact 0 = 1
                        fact n = n * fact (n - 1)
                    </code>
                </pre>
                <p class="my-4">
                    Si se invoca la función fact con un argumento negativo, el cómputo de la expresión no acaba, ya que se
                    produce una secuencia infinita de aplicaciones de la segunda ecuación. Sin embargo, la función factorial
                    está parcialmente definida (no está definida para argumentos negativos), ya que ninguno de los dos
                    patrones unifica con un número negativo, y da lugar al correspondiente error inmediatamente
                </p>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="case">
            <h4 class="color-yellow">2.6 Expresiones case</h4>
            <p class="my-4">
                Es posible realizar una comprobación de patrones en cualquier punto de una expresión. Para ello puede usarse
                la construcción case. La sintaxis de esta construcción es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    case expr of
                        patron1 -> resultado
                        patron2 -> resultado2
                        ...
                        patron n  -> resultadon
                </code>
            </pre>
            <p class="my-4">
                Todos los patrones han de ser del mismo tipo, el cual debe coincidir con el de expr. Todos los resultados
                deben ser el mismo tipo, que es el del resultado de la construcción. La siguiente función calcula la
                longitud de una lista de enteros usando una expresión case:
            </p>
            <pre class="line-numbers">
                    <code class="language-haskell">
                        long :: [Integer] -> Integer
                        long ls = case ls of
                                    [] -> 0
                                    x : xs -> 1 + long xs
                    </code>
                </pre>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="error">
            <h4 class="color-blue">2.7 La función error</h4>
            <p class="my-4">
                Si se intenta evaluar una función parcial en un punto en el cual no está definida, se produce un error y el
                resultado lo muestra:
            </p>
            <pre class="line-numbers">
                                                <code class="language-haskell">
                                                    cabeza :: [Integer] ->  Integer
                                                    cabeza(x:xs) = x
                                                </code>
                                            </pre>
            <p class="my-4">
                Existe una función predefinida que permite al programador terminar la evaluación de una expresión y mostrar
                un mensaje por pantalla. La función error toma como argumento de una cadena de caracteres. Siempre que se
                intente reducir una aplicación de la función error la reducción terminará prematuramente y se mostrará la
                cadena por pantalla. Definiendo la función cabeza del siguiente modo:
            </p>
            <pre class="line-numbers">
                                            <code class="language-haskell">
                                                cabeza :: [Integer] -> Integer
                                                cabeza = error "cabeza de la lista no definida"
                                                cabeza(x:xs) = x
                                            </code>
                                        </pre>
            <p class="my-4">
                Cuando se aplica esta función a una lista vacía:
            </p>
            <pre class="line-numbers">
                                            <code class="language-haskell">
                                                cabeza [1,2,3]
                                                cabeza []
                                            </code>
                                        </pre>
            <div class="desactivate" id="result-code15">
                <pre>
                                            <code class="language-haskel">
                                                1 :: Integer
                                                program error: cabeza de la lista vacía no definida
                                            </code>
                                        </pre>
            </div>
            <a href="#" data-close="15" id="probar15" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn15" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="trozos">
            <h4 class="color-yellow">2.8 Funciones a trozos</h4>
            <p class="my-4">
                En las funciones a trozos o por partes el resultado depende de cierta condición, como
            </p>
            <pre class="line-numbers">
                                                <code class="language-haskell">
                                                    absoluto :: Z -> Z
                                                    absoluto :: { 
                                                        x si x >= 0
                                                        -x si x < 0
                                                    }
                                                </code>
                                            </pre>
            <p class="my-4">
                En Haskell la definición anterior puede escribirse del siguiente modo:
            </p>
            <pre class="line-numbers">
                                            <code class="language-haskell">
                                                absoluto :: Integer -> Integer
                                                absoluto x
                                                    | x >= 0 = x
                                                    | x < 0 = -x
                                            </code>
                                        </pre>
            <p class="my-4">
                El sangrado de la expresión anterior es obligatorio: las dos últimas líneas de la definición han de estar un
                poco más a la derecha y árabes han de estar a la misma altura. Esta función consta de una única ecuación.
                Cada una de las expresiones entre los símbolos y = es una guarda y han de ser expresiones con tipo Bool. Al
                reducir una aplicación de esta función se evalúan las guardas en el orden textual hasta encontrar una cuyo
                valor sea True, y se devuelve como resultado la expresión a la derecha de dicha guarda:
            </p>
            <pre class="line-numbers">
                                            <code class="language-haskell">
                                                absoluto (-10)
                                            </code>
                                        </pre>
            <div class="desactivate" id="result-code16">
                <pre>
                                        <code class="language-haskel">
                                            10 :: Integer
                                        </code>
                                    </pre>
            </div>
            <a href="#" data-close="16" id="probar16" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn16" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La siguiente función con guardas devuelve -1,0 o 1 dependiendo del signo de su argumento:
            </p>
            <pre class="line-numbers">
                                        <code class="language-haskell">
                                            signo :: Integer -> Integer
                                            signo x
                                                | x > 0 = 1
                                                | x == 0 = 0
                                                | x < 0 = -1
                                        </code>
                                    </pre>
            <p class="my-4">
                Es posible utilizar como guardar la palabra otherwise, que es equivalente al valor True, y ésta suele
                utilizarse para devolver un resultado en caso de que no se cumplan ninguna de las guardas previas. La
                función anterior puede también ser definida como:
            </p>
            <pre class="line-numbers">
                            <code class="language-haskell">
                                signo :: Integer -> Integer
                                signo x
                                    | x > 0 = 1
                                    | x == 0 = 0
                                    | otherwise = -1
                            </code>
                        </pre>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="condicionales">
            <h4 class="color-blue">2.9 Expresiones condicionales</h4>
            <p class="my-4">
                Otro modo de escribir expresiones cuyo resultado dependa de cierta condición es:
            </p>
            <pre>
                <code class="language-haskell">
                    if exprBool then exprSi else exprNo
                </code>
            </pre>
            <p class="my-4">
                Para evaluar esta expresión condicional se procede el siguiente modo:
            <ul class="container">
                <li>Se evalúa exprBool, que debe ser una expresión de tipo booleano</li>
                <li>Si el valor de ésta es True, el valor de la expresión es el de exprSi</li>
                <li>En otro caso, el valor de la expresión es el de exprNo</li>
            </ul>
            Los tipos de exprSi y exprNo pueden ser arbitrarios, pero deben coincidir. El tipo del resultado de la expresión
            completa es el de exprSi (el mismo que el de exprNo), se puede usar una expresión condicional para definir una
            función:
            </p>

            <pre>
                <code class="language-haskell">
                    maxEnt :: Integer -> Integer -> Integer
                    maxEnt x y = if x >= y then x else y
                </code>
            </pre>

            <p class="my-4">
                Que devuelve el máximo de dos números enteros. <br>
                Al evaluar una expresión condicional, la expresión booleana siempre se evalúa. Haskell es un lenguaje
                perezoso (sólo se evalúa lo necesario para conocer el resultado de una expresión): si se determina que el
                valor de la expresión booleana es True no se evaluará exprNo, y si su valor es False no se evaluará exprSi:
            </p>

            <pre>
                <code class="language-haskell">
                    if 5 > 2 then 10.0 else (10.0/0.0)
                    if 5 < 2 then 10.0 else (10.0/0.0)
                </code>
            </pre>

            <div class="desactivate" id="result-code17">
                <pre>
                    <code class="language-haskell">
                        10 :: Integer
                        Program error: {primDivFloat 10.0.0.0}
                    </code>
                </pre>
            </div>
            <a href="#" data-close="17" id="probar17" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn17" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Obsérvese que la división por cero no se efectuó en el primer ejemplo. Se dice que la expresión condicional
                es estricta en su primer argumento (siempre se evalúa) pero no lo es en el segundo ni en el tercero (puede
                que no se evalúen). Al ser el condicional una expresión, puede usarse como parte de otras expresiones:
            </p>

            <pre>
                <code class="language-haskell">
                    2 * if 'a' < 'z' then 10 else 4
                </code>
            </pre>
            <div class="desactivate" id="result-code18">
                <pre>
                    <code class="language-haskell">
                        20 :: Integer
                    </code>
                </pre>
            </div>
            <a href="#" data-close="18" id="probar18" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn18" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="locales">
            <h4 class="color-yellow">2.10 Definiciones locales</h4>
            <p class="my-5">
                A menudo es conveniente dar un nombre a una subexpresión que aparece varias veces en otra y utilizar este
                nombre en un lugar de la expresión. Considérese la siguiente función que calcula las raíces de una ecuación
                de segundo grado a partir de sus coeficientes, sólo si estás son reales:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    raices :: Float -> Float -> Float -> (Float, Float)
                    raices a b c 
                        | b ** 2 - 4 * a * c >= 0 = ((-b + sqrt(b ** 2 - 4 * a * c))/(2 * a),
                                                    (-b - sqrt(b ** 2 - 4 * a * c))/(2 * a))
                        | otherwise = error "Raices complejas"
                </code>
            </pre>
            <p class="my-5">
                Puede mejorarse la legibilidad de esta definición llamando disc al discriminante, raízDisc a la raíz
                cuadrada de éste y denom a la expresión 2 * e. En Haskell puede usarse para este propósito la palabra clave
                where, con lo que la función anterior quedaría:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    raices :: Float -> Float -> Float -> (Float, Float)
                    raices a b c 
                        | disc >= 0 = ((-b + raizDisc)/denom,((-b - raizDisc)/denom)
                        | otherwise = error "Raices complejas"
                        where
                            disc = b ** 2 - 4 * a * c
                            raizDisc = sqrt disc
                            denom = 2 * a
                </code>
            </pre>
            <p class="my-5">
                Se dice que disc, raizDisc y demon son definiciones locales de la función raíces, ya que, al igual que los
                argumentos de la función, sólo pueden utilizarse en el cuerpo de ésta (no son visibles fuera de la función
                en que se definen). El sangrado es obligatorio en las definiciones locales (todas las definiciones locales
                introducidas deben comenzar un poco más a la derecha que la función en la que se definen y a la misma
                altura). <br>
                Las definiciones locales son el mecanismo más básico que proporciona Haskell para conseguir encapsulamiento. Para poder construir programas de cierta envergadura es fundamental poder definir entidades que sólo sean visibles desde ciertas partes del programa. Con definiciones locales no solo se gana legibilidad sino también eficiencia. Las definiciones constantes locales son calculadas como máximo una vez, y los resultados memorizados y utilizados posteriormente. También es posible introducir definiciones locales que sean funciones de uno o más argumentos, aunque, en este caso, sólo se gana legibilidad:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    funcion :: Integer -> Integer
                    funcion x = f (3 * x) + f(5 + x)
                        where
                            f n = n ** 2 + 2
                </code>
            </pre>
            <p class="my-5">
                Las definiciones locales where sólo pueden aparecer al final de una definición de función, aunque es posible introducir definiciones locales en cualquier parte de una expresión usando las palabras let e in. El siguiente ejemplo define localmente la función f y luego la evalúa con argumento 100:
            </p>
            <pre>
                <code class="language-haskell">
                    let f n = n ** 2 + 2 in f 100
                </code>
            </pre>
            <div class="desactivate" id="result-code19">
                <pre>
                    <code class="language-haskell">
                        10002 :: Integer
                    </code>
                </pre>
            </div>
            <a href="#" data-close="19" id="probar19" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn19" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-5">
                En ambos casos las definiciones locales introducidas pueden ser recursivas, pueden referirse unas a otras, el orden en que aparezcan no es importante, y se ignoran las definiciones locales innecesarias para calcular el resultado, al ser Haskell perezoso:
            </p>
            <pre>
                <code class="language-haskell">
                    fun :: Integer -> Integer
                    fun x  = 2 * (x + y)
                        where
                            y = 3 + x
                            fallo = div x 0

                    fun 10
                </code>
            </pre>
            <div class="desactivate" id="result-code20">
                <pre>
                    <code class="language-haskell">
                        46 :: Integer
                    </code>
                </pre>
            </div>
            <a href="#" data-close="20" id="probar20" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn20" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="modulos">
            <h4 class="color-blue">2.11 Ambitos y modulos</h4>
            <p class="my-5">
                Las reglas de ámbito establecen desde qué puntos del programa son visibles los distintos identificadores. Así, el ámbito de un argumento en una definición de función es todo el cuerpo de ésta. Por ejemplo:
            </p>
            <pre>
                <code class="language-haskell">
                    f :: Integer -> Integer
                    f x = x * h 7
                        where
                            h z = x + 5 + z ** 2
                    (+++) :: Integer -> Integer -> Integer
                    a +++ b = 2 * a + f a
                </code>
            </pre>
            <p class="my-5">
                El argumento x es visible en todo el cuerpo de la función f, incluso en h ya que ésta forma parte del cuerpo de f. Sin embargo, x no es visible desde el cuerpo del operador (+++). Se dice que x es local a f. Lo mismo ocurre con la definición local h, que es visible tan sólo desde el cuerpo de f. <br>
                A las definiciones de funciones que aparecen en el nivel más externo del programa se le llama globales. La función f y el operador (+++) son globales. Esto significa que son visibles desde cualquier otra función. Por ejemplo, el operador (+++) puede usar f por se global esta función. Como se ve, en el cuerpo de una función pueden aparecer referencias a sus argumentos, a sus definiciones locales y a otras funciones globales.
            </p>
            <p class="my-5">
                Véase un ejemplo. <br>
                Existe una biblioteca en la que se define el tipo Ratonial que representan números racionales. El nombre de esta biblioteca es Ratio. Para poder utilizar los elementos definidos dentro de una biblioteca es necesario importarlas. La importación se consigue escribiendo la palabra import al inicio del programa. Por ejemplo, el siguiente programa utiliza la biblioteca de números racionales para definir una función que suma el cubo de dos argumentos racionales.
            </p>
            <pre>
                <code class="language-haskell">
                    import Ratio
                    sumaCubos ra rb = ra ** 3 + rb ** 3
                </code>
            </pre>
            <p class="my-5">
                El siguiente diálogo muestra el uso de esta función anterior, donde a % b denota el número racional a/b en la biblioteca <span style="color: blue">Ratio</span>:
            </p>
            <pre>
                <code class="language-haskell">
                    sumaCubos (1%3)(2%7)
                </code>
            </pre>
            <div class="desactivate" id="result-code21">
                <pre>
                    <code class="language-haskell">
                        559 % 9261 :: Rational
                    </code>
                </pre>
            </div>
            <a href="#" data-close="21" id="probar21" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn21" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="ejemplos">
            <h4 class="color-yellow">2.12 Ejemplos</h4>
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
                            <p class="card-text">Defina una función que se llame aEntero y transforme una lista de dígitos en el correspondiente valor entero</p>
                            <a  href="{{ route('ejemplos2', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">Defina una función que se llame aLista y agregue cada uno de los dígitos de un número a una lista</p>
                            <a  href="{{ route('ejemplos2', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 3</h5>
                            <p class="card-text">Escribir una función que determine si un año es bisiesto. Un año es bisiesto si es múltiplo de 4. Una excepción a la regla anterior es que los años múltiplos de 100 sólo son bisiestos cuando a su vez son múltiplos de 400</p>
                            <a  href="{{ route('ejemplos2', ['id'=>3]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 226px">
                            <h5 class="card-title">Ejemplo 4</h5>
                            <p class="card-text">Escriba una función que añada un dígito a la derecha de un número entero</p>
                            <a  href="{{ route('ejemplos2', ['id'=>4]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
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
                        Se pide realizar una función que calcule la cantidad de dígitos que tienen un número, ¿Cómo se realiza dicha función?
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
                                            cantDig :: Integer -> Integer
                                            cantDig 0 = 0
                                            cantDig n = 1 + cantDig (div n 10)
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
                                            cantDig :: Integer -> Integer
                                            cantDig 0 = 0
                                            cantDig n = 1 + cantDig (mod n 10)
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
                                            cantDig :: Integer -> Integer
                                            cantDig 0 = []
                                            cantDig n = n + cantDig (div n 10)
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
                                            cantDig :: Integer -> Integer
                                            cantDig 0 = 0
                                            cantDig n = (1 : cantDig (div n 10))
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
                                            ¿La principal diferencia entre los tipos simples definidos y los constructores de tipos predefinidos en Haskell, es que los tipos simples definidos representan colecciones de objetos?
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
                                            ¿La principal diferencia entre un operador y una función de dos argumentos es que los operadores se usan de modo infijo (entre sus argumentos) mientras que las funciones se usan de modo prefijo (preceden a sus argumentos)?
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
                                            ¿La comparación de patrones es utilizada en una función cuando se requiere hacer validaciones dentro de estas?
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
                        Dada la siguiente función, determine el resultado que esta devolvería sabiendo que el valor de la variable x es igual a 8000
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6">
                            <h5 class="color-yellow">Código</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                                        segundoahoras :: Integer -> (Integer,Integer,Integer)
                                        segundoahoras x = (horas, minutos, segundos)
                                            where 
                                                horas = div x 3600
                                                ss = mod x 3600
                                                minutos = div ss 60
                                                segundos = mod ss 60
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
                                            [3,9,33]
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option2" id="secondradio2">
                                        <label class="form-check-label" for="secondradio2"></label>
                                        <p class="p-order">
                                            (2,13,20)
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option3" id="secondradio3">
                                        <label class="form-check-label" for="secondradio3"></label>
                                        <p class="p-order">
                                            2,20,11
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
                        <a href="{{ route('orden-superior') }}" data-btnindex="3" class="btn btn-amarillo mt-md-3">Pasar al siguiente módulo</a>
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
                "respuest_correct": "option1",
                "respuest_selected": ""
            },
            2: {
                "question1": {
                    "respuest_correct": "false",
                    "respuest_selected": "false"
                },
                "question2": {
                    "respuest_correct": "true",
                    "respuest_selected": "false"
                },
                "question3": {
                    "respuest_correct": "false",
                    "respuest_selected": "false"
                }
            },
            3: {
                "respuest_correct": "option2",
                "respuest_selected": ""
            }
        }
    </script>
    <script src="{{ asset('js/moduls.js') }}"></script>
@endsection
