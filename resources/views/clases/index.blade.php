@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Sistema de clases de Haskell</h4>
        <ul>
            <li><a href="#" data-name="tiposyclases" class="item active">5.1 Tipos y clases de tipos. Jerarquía de clases</a></li>
            <li><a href="#" data-name="contextos" class="item">5.2 Contextos</a></li>
            <li><a href="#" data-name="subclases" class="item">5.3 Subclases</a></li>
            <li><a href="#" data-name="clases" class="item">5.4 Las clases Num, Integral y Funcional</a></li>
            <li><a href="#" data-name="ejemplos" class="item">5.5 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">5.6 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" style="min-height: 100vh" id="tiposyclases">            
            <h4 class="color-yellow">5.1 Tipos y clases de tipos. Jerarquía de clases</h4>
            <p class="my-4">
                El sistema de clases de Haskell permite restringir el tipo de ciertas funciones polimórficas imponiendo condiciones a los tipos usados en su declaración. Estas condiciones vienen dadas en forma de predicados que los tipos desean verificar. Por ejemplo, si consideramos la función que determina si un elemento pertenece a una lista:
            </p>

            <pre class="line-numbers">
                <code class="language-haskell">
                    elem x[] = False
                    elem x(y : ys) = if(x == y) then True else elem x ys
                </code>
            </pre>

            <p class="my-4">
                Se ve que su tipo no debe ser n -> [a] -> Bool siendo a un tipo cualquiera, pues esto permitiría utilizar la función con tipos cuyos datos no son comparables con igualdad, por tanto, se debería poder restringuir a aquellos tipos que cumplan dicha condición. El tipo de elem es Eq a  => a -> [a] -> Bool, y que se leería como siendo a un tipo instancia de la clase Eq (es decir, comparable por igualdad), el tipo de la función elem es a -> [a] -> Bool.
            </p>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">El sistema de clases</h5>
                <p class="my-4">
                    Habitualmente, un tipo de datos T es visto como una tupla:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        T = (T,(f,g...))  
                    </code>
                </pre>
                <p class="my-4">
                    Donde T es una colección de datos y (f,g…) es un conjunto de funciones aplicables a T; consideraremos que f es aplicable a T si tiene algún argumento o resultado con dominio T. En nuestro lenguaje funcional f es aplicable a T si aparece T en el tipo de F
                    <br>
                    Interesa sobrecargar una colección de funciones aplicables a distintos tipos; por ejemplo, los enteros Int, los flotantes Float, etc, comparten una serie de funciones aplicables a estos tipos, como (+),(-),(*)…, en ese caso, se tiene  una clase de tipos, en el sentido de que cada elemento de la clase (o instancia) dispone de un conjunto de valores particulares (o tipo de datos) y una forma también particular de cálculo de cada función de la clase (es decir, de cada función sobrecargada). Mire a continuación que los mecanismos del lenguaje hasta ahora vistos no resuelven el problema de la clasificación. Ejemplo, es deseable que un gran número de tipos dispongan de un operador de igualdad (==), y se debería obtener algo así
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (==):: Bool -> Bool -> Bool
                        (==):: Int -> Int -> Int
                    </code>
                </pre>
                <p class="my-4">
                    Pero Haskell no permite redeclarar un objeto; si es posible declarar el operador (==) en forma genérica:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (==):: a -> a -> Bool    
                    </code>
                </pre>
                <p class="my-4">
                    Donde el hecho de que el indicador a aparezca dos veces en a -> a -> Bool significa que los operandos de (==) deben ser del mismo tipo. Pero el problema que se tiene ahora es que las ecuaciones para (==) deben utilizar tipos concretos; por ejemplo, podríamos intentar las ecuaciones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        0 == 0 = True
                        0-0 == 0.0 = True --Error
                    </code>
                </pre>
                <p class="my-4">
                    Y ello no es posible ya que, según se ha visto, las ecuaciones para una misma función ha de producir tipos compatibles. Se puede intentar una única ecuación, como la primera:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       (==) :: a -> a -> Bool
                       0 == 0 = True
                    </code>
                </pre>
                <p class="my-4">
                    Pero en ese caso se tendrá que el tipo asociado a (==) es demasiado general, ya que la única ecuación le asigna como tipo Integer -> Integer -> Bool. En definitiva, el problema no aparece tener una solución fácil, salvo que se introduzca un mecanismo nuevo para ello, como el mecanismo de clases. Así, la declaración de Haskell:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       Class Eq a where
                        (==) :: a -> a -> Bool
                        (!=) :: a -> a -> Bool
                        x == y = not(x != y)
                        x != y = not(x == y)
                    </code>
                </pre>
                <p class="my-4">
                    Se interpreta en la forma siguiente: Eq es una clase de tipos, cuyas instancias comparten las funciones sobrecargadas (==) y (!=). A Eq a se le llama un contexto y la letra a en Eq a representa un tipo genérico instancia de la clase, y su uso es para poder parametrizar el tipo de la función sobrecargada a -> a  -> Bool. Cada instancia podrá definir una forma particular de calculo de la función (aunque puede ocurrir que en la clase se proporcione una definición por defecto para algunas funciones); ello se consigue a través de declaraciones de instancia, como por ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       instance Eq int where
                        0 == 0 = True
                       ... 
                       instance Eq Float where
                        0.0 == 0.0 = True
                    </code>
                </pre>
                <p class="my-4">
                    El sistema de clases de Haskell proporciona una forma estructurada para manejar la sobrecarga y, en general, el polimorfismo; una función es polimórfica (en sentido amplio) si no tiene restricciones para los tipos variables, como por ejemplo las funciones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       fst :: (a,b) -> a
                       snd :: (a,b) -> b
                       fst(x,_) = x
                       snd(_,y) = y
                    </code>
                </pre>
                <p class="my-4">
                    Donde los tipos a y b pueden ser arbitrarios, y el cómputo de la función no viene determinado por los tipos de sus argumentos. Sin embargo, tal polimorfismo puede ser restringido con un contexto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       elem :: Eq a  => a  -> [a] -> Bool
                    </code>
                </pre>
                <p class="my-4">
                    Donde el contexto (Eq a) indica que a no puede ser arbitrario, sino que debe ser una instancia de la clase Eq. En general se podría tener un contexto con varias restricciones, como:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       f :: (A a, B a,C a) => [a] -> Bool
                    </code>
                </pre>
                <p class="my-4">
                    Que indica que a debe ser instancia de las clases A,B y C, de forma que tal función tendrá sentido solamente para tales tipos. Es importante reseñar que cada (función) miembro de una clase recibe implícitamente en su tipo el contexto apropiado; por ejemplo, el tipo de la función (==) es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       (==):: Eq a => a -> a -> Bool
                    </code>
                </pre>
                <p class="my-4">
                    Las relaciones entre contextos dan lugar a una jerarquía de clases. Por ejemplo, es habitual que el tipo asociado a una función g de una clase B necesita el contexto de otra clase A cuando su cómputo utiliza una función f de ésta:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       Class A a where
                        f:: a -> Bool
                       Class B a where
                        g:: A a => a -> a -> a
                        g x y | f x
                              | otherwise = x
                    </code>
                </pre>
                <p class="my-4">
                    Siendo el tipo de la función g:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       g :: (A a, B a) => a -> a -> a
                    </code>
                </pre>
                <p class="my-4">
                    Pero se puede restringir el tipo de parámetro a de la clase B con el contexto A a directamente
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       Class A a => B a where
                        g:: a -> a -> a
                        g x y | f x       = y
                              | otherwise = x
                    </code>
                </pre>
                <p class="my-4">
                    Siendo ahora el tipo de g:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        g :: B a => a -> a -> a
                    </code>
                </pre>
                <p class="my-4">
                    En este caso se dice que B es subclase de A. Una flecha indica la relación subclase; así, Ord es subclase de Eq. Y Real es subclase de Num y Ord, y a la vez es superclase directa de RealFrac e integral; Eq es superclase directa de Ord e indirecta de Real, etc.
                </p>
                <div class="img text-center" style="">
                    <img style="width: 60%" class="mx-auto" src="{{ asset('images/polimorfismo/imagen2.png') }}" alt="imagen1">
                </div>
                <div class="img mt-5 text-center" style="">
                    <img style="width: 60%" class="mx-auto" src="{{ asset('images/polimorfismo/imagen2.png') }}" alt="imagen1">
                </div>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Declaración de clase</h5>
                <p class="my-4">
                    Una declaración de clase introduce una colección de funciones sobrecargadas que son compartidas por los tipos de la clase. Por ejemplo, la declaración:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Indica que cada instancia o tipo de esa clase dispone de dos funciones sobrecargadas: las funciones f y g son miembros de la clase, o para simplificar, f, g pertenece C; también se dira que a es el parámetro de la clase. En Haskell todas las clases son uniparamétricas. La creación de instancias se obtiene con otra declaración, por ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    En esta se da una forma particular de evaluar la función (==) para el tipo Nat; así pues, se tendrá una nueva función (==) nat :: Nat -> Nat -> Bool para tal instancia. La colección de ecuaciones para el cálculo de esta versión particular de (==) se llama un método. Por tanto, la operación (==) no esta definida o disponible para todos los tipos, sino solamente para las instancias de Eq. <br>
                    Una declaración de clase puede contener métodos por defecto. Considérese como un ejemplo la declaración de la clases Eq en la cual, además de la declaración de los tipos de las funciones (==) y (!=), miembros de la clase, aparecen métodos por defecto para el cálculo de ambas; como comentario se indica cuál es el conjunto mínimo de funciones que se debe implementar en cada instancia. Si una instancia de Eq no define otro método para (==) o (!=), se aplicara el original de la clase. Esto es una forma limitada de herencia en la resolución de un método: “primero se busca en la instancia y después en la clase”: por ejemplo, el conjunto de declaraciones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Crea una clase A y declara dos instancias suyas: Char y Bool; para Char se da un método para f, mientras que para Bool no, por lo que en la llamada se aplicara el método por defecto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <div class="desactivate" id="result-code1">
                    <pre>
                        <code class="language-haskell">
                            ... 
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">La clase Eq </h5>
                <p class="my-4">
                    Ya se ha hecho mención de la clase Eq cuyas instancias pueden comparase a través del operador de igualdad. Repítase la definición completa de la clase:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Donde se ve que los operadores (==) y (!=) están definidos uno en función del otro. Por tanto, es necesario que cada instancia defina el cuerpo de al menos uno de ellos para tener disponible ambos. Por supuesto, una instancia particular puede definir ambos operadores, pero entonces debería asegurarse de que verifican la siguiente propiedad:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Esta propiedad esta organizada si sólo se implementa uno de los dos operadores. Supóngase que se dispone del tipo de datos Temp:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Para representar temperaturas en grados Celsius o en grados Fahrenheit y viceversa:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Para poder utilizar el operador de igualdad (==) con las temperaturas se necesita que sea instancia de la clase Eq. Ahora bien, se sabe que Far 32 es lo mismo que Cel 0. Una instancia automática se Eq para este tipo podría detectar que Far 32 es igual que Far 32 (tienen la misma estructura) pero nunca que es igual a Cel 0. En este caso no interesa crear la instancia de forma estructural ya que no capturaría las igualdades y desigualdades entre grados expresados en distintas escalas. Por tanto, se crea la instancia manualmente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Que permite comparar temperaturas independientemente de la forma en que vienen representados los datos. Con tal definición, las temperaturas podrán ser usadas en cualquier función polimórfica en la que se requiera el contexto Eq, como por ejemplo la función elem vista anteriormente
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <div class="desactivate" id="result-code2">
                    <pre>
                        <code class="language-haskell">
                            ... 
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="contextos">
            <h4 class="color-blue">5.2 Contextos</h4>
            <p class="my-4">
                El aserto C a se lee: “el tipo a es de la clase C”; tales asertos permiten escribir contextos; un contexto es otro aserto que permite poner restricciones a varios tipos así:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Un contexto puede aparecer en una declaración de función o de clase; por ejemplo, el predicado de pertenencia de un elemento a una lista puede venir descrito en la forma:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Donde se observa que elem hace uso de la función (==); en consecuencia, no es posible generar ninguna versión de elem sin conocer la función (==); puesto que  (==) es miembro de la clase Eq (es decir, (==) pertenece Eq), es imprescindible incluir en la declaración de tipo de elem que el tipo a debe ser una instancia de la clase Eq: ello se consigue haciendo preceder el tipo del contexto Eq a:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Y la declaración se leerá ahora: “Para cualquier tipo a de la clase Eq, elem tiene el tipo a -> [a] -> Bool”; en consecuencia, existirá una versión de elem para cada a de la clase Eq. Véase otro ejemplo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                De la forma que el tipo Mod2 no es automáticamente una instancia de Eq llamada:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Produce un error; tal error no se produce si previamente se declara Mod2 como instancia de Eq, y de paso se define un método para la igualdad:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Como ya se ha mencionado, Haskell permite que los tipos definidos con data sean automáticamente instancias de las clases Eq, Ord, lx, Enum, Bounded, Read o Show; ello se consigue con la cláusula deriving:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Y en este caso se genera, además de la instancia Mod2, también una versión de la igualdad equivalente a la anterior (Igualdad estructural)<br>
                Supóngase que se quiere disponer de una función numCiclomatico que calcule el nivel de anidamiento de ciertos tipos de datos. En particular, se quiere calcular los números ciclomaticos de los datos de tipo Nat definido anteriormente u de los del tipo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Con el objeto de no tener que dar a la función un nombre particular para cada tipo de datos, se va a crear una clase Cic que disponga de la función numCiclomatico y se construirán para ambos tipos instancias de esta clase. Cada instancia determinara como calcular el número ciclomatico con una versión diferente de la función:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                A partir de esta definición, se tiene el dialogo siguiente:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <div class="desactivate" id="result-code3">
                <pre>
                    <code class="language-haskell">
                        ... 
                    </code>
                </pre>
            </div>
            <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                El tipo completo es numCiclomatico :: Cic a  =>  a  -> Int
            </p>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Instancias paramétricas </h5>
                <p class="my-4">
                    El uso de contextos permite también generar instancias en forma paramétrica: por ejemplo, si un tipo a dispone de la igualdad, es deseable que el tipo [a] disponga también de una igualdad, para ello se declaran las listas como instancias genéricas restringidas:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Donde se observa que el contexto Eq a permite el uso de la igualdad de los elementos del tipo base, y por extensión, la igualdad de listas. Así no todas las listas son instancias de Eq, sino aquellas cuyo tipo base sea instancia de Eq. Obsérvese la potencia de la creación de instancias en forma genérica. Veamos otro ejemplo de ello: sea el tipo Arbol a definido anteriormente, si se quiere generar Arbol a como instancia de Eq, donde la igualdad se estructural, se puede escribir:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Aunque en este caso se podría haber derivado directamente la instancia:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Y la igualdad se toma también en sentido estructural.
                </p>
            </div>
        </div>


        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="subclases">
            <h4 class="color-yellow">5.3 Subclases</h4>
            <p class="my-4">
                Una declaración de clase precedida de un contexto permite utilizar los miembros de las clases del contexto en la declaración de los miembros de la clase. Por ejemplo, se tiene que la clase estándar Ord cuyos miembros son (<),(>),max, min, compare; como se observa, todas las desigualdades tienen métodos por defecto basados en compare. Por otro lado, compare utiliza el tipo Ordering cuya definición es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Una instancia debe definir el operador (<) o, si se prefiere, simplemente debe definir el método compare. El contexto Eq a en la declaración class Eq a  =>  Ord a where …, permite utilizar los miembros (visibles)  de la clase Eq (esto es, (==) y (!=)) para definir métodos por defecto en la clase, como se observa en la definición de compare en la que se utiliza (==) y en la terminología de Haskell, se dira que Ord es una subclase de Eq; así, una subclase tiene visibilidad sobre los métodos de la clase. Esto no significa herencia ya que las instancias de una clase B que es subclase de A no son automáticamente instancias de A; intentar crear una instancia de una clase sin crear la instancia de las superclases produce un error de compilación. Ahor bien perfectamente puede hacerse:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Un ejemplo, los enteros módulo n quedan caracterizados por se un grupo cíclico; dos funciones sucesor y predecesor (periódicas) permiten definir, entre todas, las operaciones algebraicas (+) y (-) del grupo; podemos considerar tales enteros como instancias de una clase Ciclo algo más general, que sea subclase de Eq y de Unidades:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                El operador (\\) devuelve la lista que resulta de eliminar de la lista primer argumento cada elemento de la lista segundo argumento. Por ejemplo, el tipo Mod6:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Es por construcción, una instancia de Eqm y su se declara también como instancia de Unidades:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Se puede generar una instancia de Ciclo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <p class="my-4">
                Y por tanto se produce el siguiente dialogo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ...
                </code>
            </pre>
            <div class="desactivate" id="result-code4">
                <pre>
                    <code class="language-haskell">
                        ... 
                    </code>
                </pre>
            </div>
            <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Intersección de clases</h5>
                <p class="my-4">
                    El mecanismo de clase permite crear una clase intersección de otras. En la definición se puede enriquecer tal intersección con funciones miembro nuevas, o bien considerar una intersección para, como en:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Recuérdese una vez más que las instancias no se generan de forma automática y por consiguiente, el hecho de ser Mod6 instancia de las clase Eq, Unidades, y Ciclo, no implica que lo sea de Ciclo… Algebraico directamente, salvo que se declare como tal:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
                <p class="my-4">
                    Como se observa, una ventaja de la intersección es la sustitución de un contexto por otro más simple, y se tiene las dos declaraciones alternativas:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ...
                    </code>
                </pre>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="clases">
        </div>
            
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="ejemplos">
            <h4 class="color-blue">5.5 Ejemplos</h4>
            <p class="my-4">
                A continuación, se mostrarán una serie de ejemplos con relación a todo el material visto en este módulo, de
                esta manera se busca que usted como usuario pueda tener un mejor entendimiento del módulo y de cada una de
                las secciones y temas que se mencionaron. En estos ejemplos se verá sintaxis básica del lenguaje que no se
                ha mostrado en este módulo, pero se explicara cada una de estas.
            </p>

            <div class="row mx-auto mt-md-5">
                <div class="col-12 col-md-6">
                    <div class="card" style="">
                        <div class="card-body" style="min-height: 273px">
                            <h5 class="card-title">Ejemplo 1</h5>
                            <p class="card-text">Definir una instancia de Ord para el tipo data Nat = Cero | Suc Nat</p>
                            <a  href="{{ route('ejemplos4', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">Definir una instancia de Eq y una instancia de Ord para el tipo ColorSimple: data ColorSimple = Violeta | Azul | Verde | Amarillo | Naranja | Rojo teniendo en cuenta que dos colores simples son iguales si son idénticos y que el orden de los colores es el que viene determinado por la enumeración dada.</p>
                            <a  href="{{ route('ejemplos4', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 322px">
                            <h5 class="card-title">Ejemplo 3</h5>
                            <p class="card-text">Definir una instancia de Eq para el tipo Color:
                                data Color = Violeta | Azul | Verde | Amarillo | Naranja | Rojo | Mezcla Color Color <br>
                                Teniendo en cuenta que dos colores son iguales si, o bien siendo simples son idénticos, o bien siendo compuestos tienen el mismo porcentaje de cada color.</p>
                            <a  href="{{ route('ejemplos4', ['id'=>3]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 322px">
                            <h5 class="card-title">Ejemplo 4</h5>
                            <p class="card-text">Una mochila es como un conjunto excepto en que un elemento dailo puede estar más de una vez; suponiendo que el tipo base de la mochila dispone de la igualdad y de una relación de orden: <br>
                                Escriba una definición polimórfica para mochilas
                            </p>
                            <a  href="{{ route('ejemplos4', ['id'=>4]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="practica">
            <div id="enunciado" class="px-3" style="margin-top: 10%">
                <h4 class="color-yellow">4.9 Practica</h4>
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
                        Utilizando un tipo de dato llamado personaje que recibe dos parámetros su posición en x y su posición en y, se pide realizar una función llamada moverPersonaje, la cual recibirá las coordenadas de posición y retorna las posiciones del personaje aumentadas en 10, ¿Cómo se realiza dicha función?
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-12 col-md-6 col-12">
                            <form action="" class="form form-inline">
                                <div class="form-check">
                                    <div class="checkbox-Soft mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise1" value="option1" id="radio1">
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                    <pre class="line-numbers">
                                        <code class="language-haskell">
                                            data Personaje = Personaje
                                            moverPersonaje :: Personaje -> String
                                            moverPersonaje (Personaje y) = show(+ 10) ++ show(y + 10)
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
                                            data Personaje = Personaje Integer Integer
                                            moverPersonaje :: Personaje -> String
                                            moverPersonaje (Personaje x y) = show(x + 10) ++ show(y + 10)
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
                                            data Personaje = Personaje Integer Integer
                                            moverPersonaje :: x y -> String
                                            moverPersonaje (Personaje) = show(x + 10) ++ show(y + 10)
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
                                            moverPersonaje :: Personaje -> String
                                            moverPersonaje (Personaje x y) = show(x + 10) ++ show(y + 10)
                                        </code>
                                    </pre>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 mx-auto text-center col-md-6 col-12">
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
                                            ¿Una clase de tipos es una especie de interfaz que define un comportamiento y un tipo puede ser una instancia de esa clase si soporta ese comportamiento?
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
                                            ¿Se puede instanciar una clase YesNo para poder retornar cualquier tipo de dato?
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
                                            ¿Un constructor de datos puede tomar algunos valores como parámetros y producir un nuevo valor?
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
                "respuest_correct": "option2",
                "respuest_selected": ""
            },
            2: {
                "question1": {
                    "respuest_correct": "true",
                    "respuest_selected": "false"
                },
                "question2": {
                    "respuest_correct": "true",
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
