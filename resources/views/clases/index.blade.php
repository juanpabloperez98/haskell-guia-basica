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
                       class Eq a where
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
                        class C a where
                            f :: a -> Bool
                            g :: a -> Int -> Bool
                    </code>
                </pre>
                <p class="my-4">
                    Indica que cada instancia o tipo de esa clase dispone de dos funciones sobrecargadas: las funciones f y g son miembros de la clase, o para simplificar, f, g pertenece C; también se dira que a es el parámetro de la clase. En Haskell todas las clases son uniparamétricas. La creación de instancias se obtiene con otra declaración, por ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data Nat = Cero | Sac Nat
                        instance Eq Nat where
                            Cero == Cero = True
                            Suc x == Suc y = x == y
                            _     == _     = False
                    </code>
                </pre>
                <p class="my-4">
                    En esta se da una forma particular de evaluar la función (==) para el tipo Nat; así pues, se tendrá una nueva función (==) nat :: Nat -> Nat -> Bool para tal instancia. La colección de ecuaciones para el cálculo de esta versión particular de (==) se llama un método. Por tanto, la operación (==) no esta definida o disponible para todos los tipos, sino solamente para las instancias de Eq. <br>
                    Una declaración de clase puede contener métodos por defecto. Considérese como un ejemplo la declaración de la clases Eq en la cual, además de la declaración de los tipos de las funciones (==) y (!=), miembros de la clase, aparecen métodos por defecto para el cálculo de ambas; como comentario se indica cuál es el conjunto mínimo de funciones que se debe implementar en cada instancia. Si una instancia de Eq no define otro método para (==) o (!=), se aplicara el original de la clase. Esto es una forma limitada de herencia en la resolución de un método: “primero se busca en la instancia y después en la clase”: por ejemplo, el conjunto de declaraciones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        class A a where
                            f x y = x
                        instance A Char where
                            f 'h' x  = 'q'
                            f 'm' x  = x
                        instance A Bool
                    </code>
                </pre>
                <p class="my-4">
                    Crea una clase A y declara dos instancias suyas: Char y Bool; para Char se da un método para f, mientras que para Bool no, por lo que en la llamada se aplicara el método por defecto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f 'h' 't'
                        f 't' 'y'
                        f True False
                    </code>
                </pre>
                <div class="desactivate" id="result-code1">
                    <pre>
                        <code class="language-haskell">
                            'q' :: Char
                            Program error: instA_v1277_v1281't''y'
                            True :: Bool
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
                        class Eq a where
                            (==) :: a -> a -> Bool
                            (!=) :: a -> a -> Bool
                            --Minimo a implementar: (==) o bien (!=)
                            x === y = not (x != y)
                            x != y = not (x == y)
                    </code>
                </pre>
                <p class="my-4">
                    Donde se ve que los operadores (==) y (!=) están definidos uno en función del otro. Por tanto, es necesario que cada instancia defina el cuerpo de al menos uno de ellos para tener disponible ambos. Por supuesto, una instancia particular puede definir ambos operadores, pero entonces debería asegurarse de que verifican la siguiente propiedad:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        not (x == y) = x != y
                    </code>
                </pre>
                <p class="my-4">
                    Esta propiedad esta organizada si sólo se implementa uno de los dos operadores. Supóngase que se dispone del tipo de datos Temp:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data Temp = Far Float | Cel Float
                    </code>
                </pre>
                <p class="my-4">
                    Para representar temperaturas en grados Celsius o en grados Fahrenheit y viceversa:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        convTemp :: Temp -> Temp
                        convTemp (Far x) = Cel(((x - 32.0)/9.0)+5.0)
                        convTemp (Cel x) = Far((x * 9.0)/5.0 + 32.0)
                    </code>
                </pre>
                <p class="my-4">
                    Para poder utilizar el operador de igualdad (==) con las temperaturas se necesita que sea instancia de la clase Eq. Ahora bien, se sabe que Far 32 es lo mismo que Cel 0. Una instancia automática se Eq para este tipo podría detectar que Far 32 es igual que Far 32 (tienen la misma estructura) pero nunca que es igual a Cel 0. En este caso no interesa crear la instancia de forma estructural ya que no capturaría las igualdades y desigualdades entre grados expresados en distintas escalas. Por tanto, se crea la instancia manualmente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance Eq Temp where
                            Far x == Far y = x == y
                            Cel x == Cel y = x == y
                            t1  == t2  = convTemp t1 == t2
                    </code>
                </pre>
                <p class="my-4">
                    Que permite comparar temperaturas independientemente de la forma en que vienen representados los datos. Con tal definición, las temperaturas podrán ser usadas en cualquier función polimórfica en la que se requiera el contexto Eq, como por ejemplo la función elem vista anteriormente
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        elem (Cel 0) [Cel 10, Far 32, Cel 20]
                    </code>
                </pre>
                <div class="desactivate" id="result-code2">
                    <pre>
                        <code class="language-haskell">
                            True::Bool
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
                    (C1 t1, C2 t2, ..., Cn tn) = i, 1 <= i <= n . Ci ti
                </code>
            </pre>
            <p class="my-4">
                Un contexto puede aparecer en una declaración de función o de clase; por ejemplo, el predicado de pertenencia de un elemento a una lista puede venir descrito en la forma:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    x 'elem' [] = false
                    x 'elem' (y:xs) = x === y || (x 'elem' xs)
                </code>
            </pre>
            <p class="my-4">
                Donde se observa que elem hace uso de la función (==); en consecuencia, no es posible generar ninguna versión de elem sin conocer la función (==); puesto que  (==) es miembro de la clase Eq (es decir, (==) pertenece Eq), es imprescindible incluir en la declaración de tipo de elem que el tipo a debe ser una instancia de la clase Eq: ello se consigue haciendo preceder el tipo del contexto Eq a:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    elem :: Eq a => a -> [a] -> Bool
                </code>
            </pre>
            <p class="my-4">
                Y la declaración se leerá ahora: “Para cualquier tipo a de la clase Eq, elem tiene el tipo a -> [a] -> Bool”; en consecuencia, existirá una versión de elem para cada a de la clase Eq. Véase otro ejemplo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Mod2 = O | I
                </code>
            </pre>
            <p class="my-4">
                De la forma que el tipo Mod2 no es automáticamente una instancia de Eq llamada:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    I 'elem' [O,I,I]
                </code>
            </pre>
            <p class="my-4">
                Produce un error; tal error no se produce si previamente se declara Mod2 como instancia de Eq, y de paso se define un método para la igualdad:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Instance Eq Mod2 where
                        O == O = True
                        I == I = True
                        _ == _ = False
                </code>
            </pre>
            <p class="my-4">
                Como ya se ha mencionado, Haskell permite que los tipos definidos con data sean automáticamente instancias de las clases Eq, Ord, lx, Enum, Bounded, Read o Show; ello se consigue con la cláusula deriving:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Mod2 = O | I deriving Eq
                </code>
            </pre>
            <p class="my-4">
                Y en este caso se genera, además de la instancia Mod2, también una versión de la igualdad equivalente a la anterior (Igualdad estructural)<br>
                Supóngase que se quiere disponer de una función numCiclomatico que calcule el nivel de anidamiento de ciertos tipos de datos. En particular, se quiere calcular los números ciclomaticos de los datos de tipo Nat definido anteriormente u de los del tipo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Arbol a = Vacio | Hoja a | Nodo (Arbol a) a (Arbol a)
                </code>
            </pre>
            <p class="my-4">
                Con el objeto de no tener que dar a la función un nombre particular para cada tipo de datos, se va a crear una clase Cic que disponga de la función numCiclomatico y se construirán para ambos tipos instancias de esta clase. Cada instancia determinara como calcular el número ciclomatico con una versión diferente de la función:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Class Cic a where
                        numCiclomatico :: a -> Int

                    Instance Cic Nat where
                        numCiclomatico Cero = 0
                        numCiclomatico (Suc x) = 1 + numCiclomatico x
                    
                    Instance Cic (Arbol a) where
                        numCiclomatico Vacio = 0
                        numCiclomatico (Hoja _) = 1
                        numCiclomatico (Nodo i_d)  = 1 + max(numCiclomatico i)
                                                            (numCiclomatico d)
                </code>
            </pre>
            <p class="my-4">
                A partir de esta definición, se tiene el dialogo siguiente:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    numCiclomatico (Suc(Suc(Suc cero)))
                    numCiclomatico (Nodo (Hoja 5) 7 (Nodo (Hoja 4) 8 Vacio))
                </code>
            </pre>
            <div class="desactivate" id="result-code3">
                <pre>
                    <code class="language-haskell">
                       3 :: Int 
                       3 :: Int 
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
                        instance Eq a => Eq [a] where
                            []  == [] = True
                            (x:xs) == (y:ys) = x == y && xs == ys
                            _      == _      = False
                    </code>
                </pre>
                <p class="my-4">
                    Donde se observa que el contexto Eq a permite el uso de la igualdad de los elementos del tipo base, y por extensión, la igualdad de listas. Así no todas las listas son instancias de Eq, sino aquellas cuyo tipo base sea instancia de Eq. Obsérvese la potencia de la creación de instancias en forma genérica. Veamos otro ejemplo de ello: sea el tipo Arbol a definido anteriormente, si se quiere generar Arbol a como instancia de Eq, donde la igualdad se estructural, se puede escribir:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance Eq a => Eq (Arbol a) where
                            vacio == vacio = True
                            Hoja x == Hoja y  = x == y
                            (Nodo a x b) == (Nodo a' x' b') = (x == x') && (a == a') && (b == b')
                            _            == _               = False
                    </code>
                </pre>
                <p class="my-4">
                    Aunque en este caso se podría haber derivado directamente la instancia:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data arbol a = Vacio |
                                       Hoja a|
                                       Nodo (Arbol a) a (Arbol a) deriving Eq
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
                    class Eq a => Ord a where
                        compare    :: a -> a -> Ordering
                        (<), (<=), (>=), (>) ::a -> a -> Bool
                        max, min      :: a -> a -> a
                        --Minimo a implementar: (<=) o compare
                        compare x y | x == y  = EQ
                                    | x <= y  = LT
                                    | otherwise = GT
                        x <= y = compare x y != GT
                        x < y = compare x y == LT
                        x >= y = compare x y != LT
                        x > y = compare x y == GT
                        max x y | x >= y = x
                                | otherwise = y 
                        min x y | x <= y = x
                                | otherwise = y
                </code>
            </pre>
            <p class="my-4">
                Una instancia debe definir el operador (<) o, si se prefiere, simplemente debe definir el método compare. El contexto Eq a en la declaración class Eq a  =>  Ord a where …, permite utilizar los miembros (visibles)  de la clase Eq (esto es, (==) y (!=)) para definir métodos por defecto en la clase, como se observa en la definición de compare en la que se utiliza (==) y en la terminología de Haskell, se dira que Ord es una subclase de Eq; así, una subclase tiene visibilidad sobre los métodos de la clase. Esto no significa herencia ya que las instancias de una clase B que es subclase de A no son automáticamente instancias de A; intentar crear una instancia de una clase sin crear la instancia de las superclases produce un error de compilación. Ahora bien perfectamente puede hacerse:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Mod2 = O | I deriving Ord
                    instance Eq Mod2
                </code>
            </pre>
            <p class="my-4">
                Un ejemplo, los enteros módulo n quedan caracterizados por se un grupo cíclico; dos funciones sucesor y predecesor (periódicas) permiten definir, entre todas, las operaciones algebraicas (+) y (-) del grupo; podemos considerar tales enteros como instancias de una clase Ciclo algo más general, que sea subclase de Eq y de Unidades:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class (Eq a, Unidades a) => Ciclo a where
                        suc :: a -> a --sucesor
                        pre :: a -> a --predecesor
                        miembros :: [a]  --miembros del tipo a
                        noCeros :: [a]  --miembros no ceros
                        noCeros = miembros \\[cero]
                </code>
            </pre>
            <p class="my-4">
                El operador (\\) devuelve la lista que resulta de eliminar de la lista primer argumento cada elemento de la lista segundo argumento. Por ejemplo, el tipo Mod6:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Mod6 = O | I | II | III | IV | V deriving Eq
                </code>
            </pre>
            <p class="my-4">
                Es por construcción, una instancia de Eqm y su se declara también como instancia de Unidades:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance Unidades Mod6 where
                        cero = O
                        uno = I
                </code>
            </pre>
            <p class="my-4">
                Se puede generar una instancia de Ciclo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance Ciclo Mod6 where {
                        miembros = [O,I,II,III,IV,V];
                        suc O = I; suc I = II; suc II = III;
                        suc III = IV; suc IV = V;suc V = O;
                        pre O = V; pre I = O; pre II = I;
                        pre III = II; pre IV = III; pre V = IV
                    }
                </code>
            </pre>
            <p class="my-4">
                Y por tanto se produce el siguiente dialogo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    elem I noCeros
                    elem O noCeros
                </code>
            </pre>
            <div class="desactivate" id="result-code4">
                <pre>
                    <code class="language-haskell">
                        True :: Bool
                        False :: Bool
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
                        class (Eq a, Unidades a, Ciclo a) => CicloAlgebraico a
                    </code>
                </pre>
                <p class="my-4">
                    Recuérdese una vez más que las instancias no se generan de forma automática y por consiguiente, el hecho de ser Mod6 instancia de las clase Eq, Unidades, y Ciclo, no implica que lo sea de Ciclo… Algebraico directamente, salvo que se declare como tal:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance CicloAlgebraico Mod6
                    </code>
                </pre>
                <p class="my-4">
                    Como se observa, una ventaja de la intersección es la sustitución de un contexto por otro más simple, y se tiene las dos declaraciones alternativas:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f :: (Eq a, Unidades a, Ciclo a) => [a] -> Bool
                        f :: (CicloAlgebraico a)         => [a] -> Bool
                    </code>
                </pre>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="clases">
            <h4 class="color-yellow">5.4 Las clases Num, Integral y Factorial </h4>
            <p class="my-4">
                Estas clases están definidas para sobrecargar ciertas operaciones aritméticas de modo que todos los tipos numéricos puedan utilizarlas. Así, la clase Num define los métodos correspondientes a las operaciones aritméticas elementales: suma, resta, multiplicación, pero no la división. La definición es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class (Eq a, Show a) => Num a where
                        (+),(-),(+) :: a -> a -> a
                        negate      :: a -> a
                        abs, signum :: a -> a
                        fromInteger :: Integer -> a
                        --Minima definición: todos, excepto negate o (-)
                        x - y = x + negate y
                        negate x = 0 - x
                </code>
            </pre>
            <p class="my-4">
                Como puede verse, esta clase no define la división que se deja para las clases Integral y Fractional. Integral define la división entera y Fractorial define la división fraccionaria.
            </p>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Los tipos numéricos de Haskell</h5>
                <p class="my-4">
                    Entre los tipos numéricos de Haskell incluye cabe destacar los siguientes: Int que representan enteros cortos (32 bits), Integer que representan enteros de precisión ilimitada (enteros largos), flotantes (Float) y flotantes de doble precisión (Double). Además, existe un módulo estandarizado llamado Ratio que incluye la definición de números racionales sobre cada uno de los tipos de enteros mencionados (Ratio Int u Ratio Integer). Todas las constantes numéricas en Haskell están sobrecargadas por lo que su tipo dependerá del contexto en que se encuentren. Así la constante 2 puede interpretarse como Int, Integer, Ratio Int, Ratio Integer, Float o Double, mientras que la constante 2.1 piede interpretarse como Ratio Int, Ratio Integer, Float o Double. Por ejemplo, la función:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        inc :: Integer -> Integer
                        inc x = x + 1
                    </code>
                </pre>
                <p class="my-4">
                    Determina que la constante 1 que aparece en el cuerpo de la definición sea de tipo Integer y la llamada:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        inc 7
                    </code>
                </pre>
                <p class="my-4">
                    Determina con claridad que el número 7 debe tener tipo Integer. Ahora bien, si se define:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        inc' :: Double -> Double
                        inc' x = x + 1
                    </code>
                </pre>
                <p class="my-4">
                    Es claro que ahora el 1 del cuerpo de la definición es interpretado como un dato de tipo Double. Además, la llamada:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        inc'7
                        inc' 2.1
                    </code>
                </pre>
                <div class="desactivate" id="result-code5">
                    <pre>
                        <code class="language-haskell">
                            8.0 :: Double
                            3.1 :: Double
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Determina que tanto 7 como 2.1 son también de tipo Double. Para resolver el problema de la interpretación de los tipos de los datos numéricos. Haskell utiliza el siguiente criterio: <br>
                        <ul>
                            <li>Todo número no decimal es equivalente a la aplicación de la función fromInteger a ese número visto como Integer</li>
                            <li>Todo número decimal es equivalente a la apliación de la función fromRational a ese número visto como Ratio Integer (un sinónimo de Ratio Integer es Rational)</li>
                        </ul>
                    Por ello, la ecuación por defecto negate x = 0 – x se interpreta como:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        negate x = fromInteger 0 - x
                    </code>
                </pre>
                <p class="my-4">
                    Además:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        7
                        => { Por la traducción de constantes }
                        fromInteger 7
                        => { ya que fromInteger :: Num a => Integer -> a}
                        fromInteger 7 :: Num a => a
                    </code>
                </pre>
                <p class="my-4">
                    También:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        2.1
                        => { Por la traducción de constantes }
                        fromRational 2.1
                        => { ya que fromRational :: Fractional a => Rational -> a }
                        fromRational 2.1 :: Fractional a => a
                    </code>
                </pre>
                <p class="my-4">
                    De manera que la reducción que se produce para evaluar inc’ 2.1 es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        inc' 2.1
                        =>{ Tratamiento de las constantes }
                        inc' (fromRational 2.1 :: Fractional a => a)
                        =>{ El argumento de inc' debe ser de tipo Double }
                        (2.1 :: Double) + (fromInteger 1 :: Num a => a)
                        =>{(+) :: (Num a => a -> a -> a) Se toma fromInteger de la clase Double }
                        (2.1 :: Double) + (1 :: Double)
                        =>{suma para el tipo Double}
                        3.1 :: Double
                    </code>
                </pre>
                <p class="my-4">
                    Donde el paso clave esta en encontrar cual es la instancia de la clase Num de la que debe obtener la función fromInteger para aplicar la constante 1; dado que esta expresión es el segundo argumento de una suma y dicha suma tiene como primer argumento un dato de tipo Double, se hace necesario que este segundo argumento también sea Double, de ahí el hecho de que, en el siguiente paso, el 1 aparezca con tipo Double.
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Ambigüedad en las constantes numéricas</h5>
                <p class="my-4">
                    En los ejemplos anteriores hemos visto que por el contexto era relativamente fácil resolver los tipos a los que pertenecen las constantes y por tanto, los tipos de las expresiones. Sin embargo, hay otras ocasiones en la que el contexto de una expresión no determina con claridad el tipo que deben tener las constantes que aparecen en ella. Ese es el caso de la expresión 2 + 3. En este caso se produce una ambigüedad, pues dado que la traslación por la equivalencia de las constantes lleve la expresión:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (fromInteger 2 :: Num a => a) + (fromInteger 3 :: Num a => a)
                    </code>
                </pre>
                <p class="my-4">
                    No se sabe a cuál de las instancias de Num se refieren dichas constantes. La forma más sencilla de resolver este problema es indicar explícitamente el tipo de las constantes en una expresión, Por ejemplo, en el siguiente dialogo no se produce ninguna ambigüedad:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (2 :: Int) + (3 :: Int)
                        (2 + 3) :: Int
                        (2 :: Int) + 3
                    </code>
                </pre>
                <div class="desactivate" id="result-code6">
                    <pre>
                        <code class="language-haskell">
                            5 :: Int
                            5 :: Int
                            5 :: Int
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Aunque no aparece la solución más satisfactoria. Para evitar tener que estar indicando el tipo de las constantes en cada expresión que pueda producir ambigüedad. Haskell permite definir tipos numéricos por defecto que serán aplicables en estos casos. Esto se hace a través de la clausula default. Esta clausula debe aparecer dentro de un módulo y debe ir seguida por una serie de tipos numéricos (sin variables) separados por comas y entre paréntesis. Cuando una constante quede ambigua dentro de una expresión, se interpretará como perteneciente al primer tipo de esa serie que verifique el contexto en el que se encuentra la expresión. Si no existe ninguno que lo verifique se obtendrá un error de sobrecarga no resuelta. Así, por ejemplo si se activa la cláusula default (Integer,Double) entonces:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        2 + 3
                        2.1 + 5.2
                    </code>
                </pre>
                <div class="desactivate" id="result-code7">
                    <pre>
                        <code class="language-haskell">
                            5 :: Integer
                            7.3 :: Double
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>

                <p class="my-4">
                    Con la clausula default anterior, la reducción de la expresión 2 + 3.1 será:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        2 + 3.1
                        =>{ Tratamiento de las constantes }
                        (fromInteger 2 :: Num a => a) + 
                        (fromRational 3.1 :: Fractional a => a)
                        =>{(+) :: Num a => -> a -> a -> a}
                        ((fromInteger 2 :: Num a => a) + (fromRational 3.1 :: Fractional a => a)) :: Num a => a
                        =>{ Ambiguedad se utiliza fromInteger y fromRational de Double }
                        ((2 :: Double) + (3.1 :: Double)) :: Double
                        =>(suma para el tipo Double)
                        5.1 :: Double
                    </code>
                </pre>
                <p class="my-4">
                    Si la cláusula default hubiera sido:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        default(Integer, Ratio Int, Double)
                    </code>
                </pre>
                <p class="my-4">
                    El resultado para la expresión anterior hubiera sido 5.1 :: Ratio Int (más exactamente 10695475 % 2097152 :: Ratio Int); y si la cláusula hubiera sido:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        default (Int,Integer)
                    </code>
                </pre>
                <p class="my-4">
                    Se producirá un erro de sobrecarga no resulta pues ninguno de los tipos por defecto satisface el contexto. Si un módulo no utiliza ninguna cláusula default se considera que se está utilizando default (Integer, Double), es decir ésta es la cláusula default por defecto. En realidad, cuando estamos trabajando sin módulos, ésta es la cláusula que se utiliza.
                </p>
            </div>

            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Promoción Numérica</h5>
                <p class="my-4">
                    A veces lo que interesa es convertir un dato que se sabe que es de un tipo dado a otro tipo. Por ejemplo, puede que nos interese dividir dos expresiones de tipo Int pero obteniendo un resultado de tipo Double (división no entera). Para estos casos, se utilizan las funciones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        fromIntegral :: (Integral a, Num b) => a -> b
                        fromIntegral = fromInteger, toInteger

                        realToFrac :: (Real a, Fractional b) => a -> b
                        realToFrac = fromRational , toRational
                    </code>
                </pre>
                <p class="my-4">
                    La primera de ella convierte la expresión a Integer y luego le aplica fromInteger. La segunda convierte la expresión a Rational y luego le aplica fromRational. Dependiendo del contexto, se usarán las funciones sobrecargadas fromInteger y fromRational de una clase u otra. Como es fácil observar, estas funciones permiten tratar a las expresiones de cualquier tipo como si fueran constantes, por lo que es aplicable todo lo dicho para constantes en el apartado anterior. Así, por ejemplo, dadas las definiciones (y supuesto el default por defecto):
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        m :: Int
                        m = 5

                        frec :: Fractional a => Int -> a
                        frec n
                            | n < m  = fromIntegral n / fromIntegral (m + 1)
                            | otherwise = fromIntegral n / fromIntegral (m + 2)
                    </code>
                </pre>
                <p class="my-4">
                    Las reducciones para frec 2 serán:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        frec 2
                        => { Definición de frec }
                        fromIntegral 2 / fromIntegral (5 + 1)
                        =>
                         ...
                        =>
                         0.333333 :: Double
                    </code>
                </pre>
                <p class="my-4">
                    Desgraciadamente, esto no funciona si en el contexto de la expresión se exige al tipo sobrecargado la pertenencia a alguna clase no numérica (o definida por el usuario). Por ejemplo, dadas las definiciones:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        class Mia a where
                            f :: a -> Integer
                            f x = 1
                        instance Mia Integer
                        instance Mia Int
                    </code>
                </pre>
                <p class="my-4">
                    Se produce el siguiente error en el diálogo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f 3
                    </code>
                </pre>
                <div class="desactivate" id="result-code8">
                    <pre>
                        <code class="language-haskell">
                            ERROR: Unresolved overloading 
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="8" id="probar8" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn8" class="btn-primary cerrar desactivate">Cerrar</a>


                <p class="my-4">
                    Porque el contexto exige a 3 la pertenencia a la clase Num y a la clase Mía. Y es que para seleccionar una instancia de Num para dar el tipo a 3 debe recurrir el mecanismo por defecto de control de ambigüedad, pero éste está inhabilitado a causa de que aparece Mía en ese contexto. Este problema queda perfectamente resuelto si proporcionamos de forma explicita el tipo de la constante, de manera que no se utilice el mecanismo por defecto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        f(3 :: Int)
                    </code>
                </pre>
                <div class="desactivate" id="result-code9">
                    <pre>
                        <code class="language-haskell">
                            1 :: Integer 
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="9" id="probar9" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn9" class="btn-primary cerrar desactivate">Cerrar</a>

                <p class="my-4">
                    Existen otras clases numéricas como Real, RealFrac, RealFloat o Floating de las que sólo mencionaremos algunos métodos interesantes, De la clase Real ya hemos mencionado el método toRational; de la clase Floating destacar que incluye métodos para operaciones trigonométricas, logarítmicas y exponenciales; de la clase RealFrac destacamos los métodos que convierten un dato RealFrac a un dato Integral como truncate, round, ceiling y floor, que truncan o redondean los decimales de su argumento. Por ejemplo, la siguiente función devuelve el argumento truncado de manera que al sumo presente dos decimales:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        dosDec :: RealFrac a => a -> a
                        dosDec = (/100) fromInteger.truncate.(+100)
                    </code>
                </pre>
            </div>
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
                            <a  href="{{ route('ejemplos5', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">Definir una instancia de Eq y una instancia de Ord para el tipo ColorSimple: data ColorSimple = Violeta | Azul | Verde | Amarillo | Naranja | Rojo teniendo en cuenta que dos colores simples son iguales si son idénticos y que el orden de los colores es el que viene determinado por la enumeración dada.</p>
                            <a  href="{{ route('ejemplos5', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
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
                            <a  href="{{ route('ejemplos5', ['id'=>3]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
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
                            <a  href="{{ route('ejemplos5', ['id'=>4]) }}" class="btn btn-azul">Ir al ejemplo</a>
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
                        Con la definición de mochila tocada en los ejemplos anteriores, se pide definir una función añadir que añada un elemento a una mochila: considérese la posibilidad de conservar cierta ordenación dependiendo del tipo elegido en el ejemplo anterior. ¿Cómo se realiza dicha función?
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
                                            danadir :: (Eq a, Ord a) => a -> Mochila a -> Mochila a
                                            anadir x (M ps) = M (anadir' x ps)
                                            anadir' e ((f,n):ps) | e == f = (f,n + 1) : ps
                                                                 | e < f = (e,1)      : (f,n) : ps
                                                                 | e > f = (f,n)      : anadir' e ps
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
                                            anadir :: (Eq a, Ord a) => a -> Mochila a -> Mochila a
                                            anadir' e []
                                            anadir' e ((f,n):ps) | e == f = (f,n + 1) : ps
                                                                | e < f = (e,1)      : (f,n) : ps
                                                                | e > f = (f,n)      : anadir' e ps
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
                                            anadir :: (Eq a, Ord a) => a -> Mochila a
                                            anadir x (M ps) = M (anadir' x ps)
                                            anadir' e []
                                            anadir' e ((f,n):ps) | e == f = (f,n + 1) : ps
                                                                | e < f = (e,1)      : (f,n) : ps
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
                                            anadir :: (Eq a, Ord a) => a -> Mochila a -> Mochila a
                                            anadir x (M ps) = M (anadir' x ps)
                                            anadir' e []
                                            anadir' e ((f,n):ps) | e == f = (f,n + 1) : ps
                                                                | e < f = (e,1)      : (f,n) : ps
                                                                | e > f = (f,n)      : anadir' e ps
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
                                            ¿El sistema de clases de Haskell no permite restringir el tipo de ciertas funciones polimórficas imponiendo condiciones a los tipos usados en su declaración?
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
                                            ¿Un contexto puede aparecer en una declaración de función o de clase?
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
                                            ¿El tipo numérico permite representar enteros cortos de 32 bits?
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
                        Utilizando la definición de mochila, se puede decir que el siguiente código es la representación de una mochila vacía 
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6">
                            <h5 class="color-yellow">Código</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                                        crearMochila::Mochila a
                                        crearMochila=M[]
                                    </code>
                                </pre>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-center font-weight-bold">¿verdadero o falso?</h6>
                            <form action="" class="form">
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option1" id="secondradio1">
                                        <label class="form-check-label" for="secondradio1"></label>
                                        <p class="p-order">
                                            Verdadero
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option2" id="secondradio2">
                                        <label class="form-check-label" for="secondradio2"></label>
                                        <p class="p-order">
                                            Falso
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
                    "respuest_correct": "false",
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
                "respuest_correct": "option1",
                "respuest_selected": ""
            }
        }
    </script>
    <script src="{{ asset('js/moduls.js') }}"></script>
@endsection
