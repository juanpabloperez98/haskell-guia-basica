@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Programación con listas</h4>
        <ul>
            <li><a href="#" data-name="lista" class="item active">6.1 El tipo lista</a></li>
            <li><a href="#" data-name="concatenacion" class="item">6.2 Concatenación de listas</a></li>
            <li><a href="#" data-name="induccion" class="item">6.3 Inducción a listas</a></li>
            <li><a href="#" data-name="selectores" class="item">6.4 Selectores</a></li>
            <li><a href="#" data-name="emparejando" class="item">6.5 Emparejamiento listas</a></li>
            <li><a href="#" data-name="aplicando" class="item">6.6 Aplicando una función a los elementos de una lista</a></li>
            <li><a href="#" data-name="filtros" class="item">6.7 Filtros</a></li>
            <li><a href="#" data-name="listascompresion" class="item">6.8 Listas por comprensión</a></li>
            <li><a href="#" data-name="ejemplos" class="item">6.9 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">6.10 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" style="min-height: 100vh" id="lista">            
            <h4 class="color-yellow">6.1 El tipo lista</h4>
            <p class="my-4">
                La lista es uno de los tipos estructurados más utiles en la programación. Una lista es una estructura muy apropiada para representar colecciones de objetos homogéneos. A diferencia de conjuntos, una lista puede contener elementos repetidos y el orden de los elementos es importante. El tipo lista esta predefinido en Hakell. Se trata de un tipo recursivo. Así, una lista que almacena elementos de tipo a es predefinida como:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    infixr 5: 
                    data [a] = [] | a : [a] --pseudocódigo
                </code>
            </pre>
            <p class="my-4">
                Como se puede ver, existen dos constructores cuyos tipos son:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [] :: [a] 
                    (:) :: a -> [a] -> [a]
                </code>
            </pre>
            <p class="my-4">
                El primero es utilizado para denotar listas vacias de cualquier tipo. El segundo permite añadir un nuevo elemento al principio de una lista.Obsérvese que el tipo del nuevo elemento ha de coincidir con el de los demás. En otro caso se produce un error de tipo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    True: []
                    False : (True : [])
                    'a' : (True : [])
                </code>
            </pre>
            <div class="desactivate" id="result-code1">
                <pre>
                    <code class="language-haskell">
                       [True] :: [Bool]
                       [False, True] :: [Bool]
                       Error : Type error in application
                    </code>
                </pre>
            </div>
            <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                El constructor (:) es asociativo a la derecha, por lo que algunos paréntesis pueden ser omitidos. Aun así, las sintaxis siguie siendo engorrosa por lo que se usa una sintaxis para listas mas comoda
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    1 : (2 : (3 : []))
                    1 : 2 : 3 : []
                    [1,2,3]
                </code>
            </pre>
            <div class="desactivate" id="result-code2">
                <pre>
                    <code class="language-haskell">
                       [1,2,3] :: [Integer]
                       [1,2,3] :: [Integer]
                       [1,2,3] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Secuencias Aritméticas. La clase Enum</h5>
                <p class="my-4">
                    La clase de los tipos enumerables contiene métodos para obtener el predecesor (pred) y el sucesor (succ) de un elemento, para poder obtener el orden de un valor como un entero (fromEnum) y para obtener un valor a partir de su orden (toEnum). Las instancias de esta clase pueden ser derivadas automaticamente para tipos enumerados. Por ejemplo, dada la siguiente declaración:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       data Dia = Lunes | Martes | Miercoles | Jueves | Viernes | Sabado | Domingo deriving (Show, Enum)
                    </code>
                </pre>
                <p class="my-4">
                    Se puede mantener el siguiente diálogo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       succ Lunes
                       pred Miercoles
                       fromEnum Lunes
                       roEnum 4 :: Dia
                    </code>
                </pre>
                <div class="desactivate" id="result-code3">
                    <pre>
                        <code class="language-haskell">
                           Martes :: Dia
                           Martes :: Dia
                           0 :: Int
                           Viernes :: Dia
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    El orden del primer constructor de tipo 0. Hay que especificar el tipo destino al usar toEnum si éste no puede ser inferido del contexto, como ocurre en el ejemplo. Para tipos no enumerados no es posible derivar automáticamente la instancia y es necesario realizar ésta explicitamente. Todos los métodos están declarados por defecto excepto toEnum y fromEnum, por lo que basta definir éstos. Por ejemplo, se puede hacer que el tipo Nat sea instancia de esta clase del siguiente modo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       data Nat = Cero | Suc Nat deriving Show
                       instance Enum Nat where
                        toEnum 0  = Cero
                        toEnum (n + 1) = Suc (toEnum n)
                        fromEnum Cero = 0
                        fromEnum (Suc n) = 1 + fromEnum n
                    </code>
                </pre>
                <p class="my-4">
                    El siguiente diálogo muestra el comportamiento de la instancia definida:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       succ Cero
                       fromEnum 
                       toEnum 5 :: Nat
                    </code>
                </pre>
                <div class="desactivate" id="result-code4">
                    <pre>
                        <code class="language-haskell">
                           Suce Cero :: Nat
                           1 :: Int 
                           Suc(Suc(Suc(Suc(Suc Cero)))) :: Nat
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Observese que las definiciones anteriores pueden ser expresdas de un modo más breve utilizando las funciones de orden superior definidas en capitulos previos
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       instance Enum Nat where 
                        toEnum = iter(λ_q -> Suc q) Cero
                        fromEnum = foldNat (+1) 0
                    </code>
                </pre>
                <p class="my-4">
                    Es posible definir listas que formen una secuencia aritmética mediante una sintasis muy compacta siempre que los elementos sean instancia de las clases Enum:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       [1...10]
                    </code>
                </pre>
                <div class="desactivate" id="result-code5">
                    <pre>
                        <code class="language-haskell">
                           [1,2,3,4,5,6,7,8,9,10] :: [Integer]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Dos puntos consecutivos separan el elemento inciial y final de la secuencia. La distancia entre dos elementos consecutivos de la secuencia no tiene que ser uno, pero en ese caso hay que especificar dos elementos iniciales:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       [1,3..11]
                       [10,9..1]
                    </code>
                </pre>
                <div class="desactivate" id="result-code6">
                    <pre>
                        <code class="language-haskell">
                           [1,3,5,7,9,11] :: [Integer]
                           [10,9,8,7,6,5,4,3,2,1] :: [Integer]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Si no se especifica el elemento final de la secuencia, se pueden obtener listas infinitas:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       [1..]
                       [Cero..]
                    </code>
                </pre>
                <div class="desactivate" id="result-code7">
                    <pre>
                        <code class="language-haskell">
                           [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,15{Interrupted}]
                           [Cero,Suc Cero,Suc (Suc Cero),Suc(Suc(Suc Cero)){Interrupted}]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Aunque la lista es finita si el tipo base lo es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                       [Jueves ..]
                    </code>
                </pre>
                <div class="desactivate" id="result-code8">
                    <pre>
                        <code class="language-haskell">
                           [Jueves,Viernes,Sábado,Domingo] :: [Dia]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="8" id="probar8" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn8" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Las secuencias aritméticas se implementan mediante los distintos métodos según la siguiente tabla:
                </p>

                <h1>AQUI VA UNA IMAGEN</h1>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="concatenacion">
            <h4 class="color-yellow">6.2 Concatenación de listas</h4>
            <p class="my-4">
                El operador de concatenación de listas (++) permite obtener una nueva lista disponiendo de los elementos de la segunda tras los de la primera:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [1,2,3] ++ [2,7]
                </code>
            </pre>
            <div class="desactivate" id="result-code9">
                <pre>
                    <code class="language-haskell">
                       [1,2,3,2,7] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="9" id="probar9" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn9" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Podemos definir fácilmente este operador examinando la forma del primer argumento:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    inflxr 5 ++
                    (++)     :: [a] -> [a] -> [a]
                    []   ++ ys = ys
                    (x:xs) ++ ys = x : (xs ++ ys)
                </code>
            </pre>
            <p class="my-4">
                Los dos argumentos del operador han de ser listas del mismo tipo. Una reducción con la definición anterior es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [1,2,3] ++ [2,7]
                    =>{sintaxis de listas}
                    (1:(2:(3: []))) ++ [2,7]
                    =>{segunda ecuación de (++)}
                    1:((2:(3:[])) ++ [2,7])
                    =>{segunda ecuación de (++)}
                    1:(2:((3:[]) ++ [2,7]))
                    =>{segunda ecuación de (++)}
                    1:(2:(3:([] ++ [2,7])))
                    =>{primera ecuación de (++)}
                    1:(2:(3:[2,7]))
                    =>{sintaxis de listas}
                    [1,2,3,2,7]
                </code>
            </pre>
            <p class="my-4">
                Algunas propiedades del operador (++) son: <br>
                Elemento neutro a la derecha:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    xs :: [a] . xs ++ [] = xs
                </code>
            </pre>
            <p class="my-4">
                Elemento neutro a la izquierda:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    ys :: [a] . [] ++ ys =  ys
                </code>
            </pre>
            <p class="my-4">
                Asociatividad:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    xs,ys,zs :: [a] . (xs ++ ys) ++ zs = xs ++ (ys ++ zs)
                </code>
            </pre>
            <p class="my-4">
                Al ser el operador asociativo es indiferente que se defina como asociativo a la izquierda o a la derecha, pero al realizarse la recursión sobre el primer argumento resulta más eficiente declarar el operador asociativo a la derecha <br>
                También existe la función <span style="color: blue">concat</span> que toma una lista de listas y devuelve como resultado la lista concatenación de todas ellas:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    concat[[1,2],[3,4,5],[6]]
                </code>
            </pre>
            <div class="desactivate" id="result-code10">
                <pre>
                    <code class="language-haskell">
                       [1,2,3,2,7] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="10" id="probar10" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn10" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Es facil definir esta función de modo recursivo sobre la lista argumento:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    concat     :: [[a]] -> [a]
                    concat[]   = []
                    concat(xs:xss) = xs ++ concat xss
                </code>
            </pre>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="induccion">
            <h4 class="color-yellow">6.3 Inducción sobre listas</h4>
            <p class="my-4">
                Las listas son estructuras inductivas, por lo que hay un principio de inducción para ellas:
            </p>
            <h1>Aqui va una imagen</h1>
            <p class="my-4">
                La lectura del paso inductivo es que deberemos probar que P(x:xs) es cierto sea cual sea x y en esta demostración podremos asumir que P(xs) es cierto. Este principio sólo es válido para listas finitas. Se vera posteriormente cómo ampliarlo para listas infinitas. <br>
                Usando el principo anterior, se demostrara la siguiente propiedad:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    (++) distribuye con length mediante (+):
                    xs,ys :: [a] . length (xs ++ ys) = length xs + length ys 
                </code>
            </pre>
            <p class="my-4">
                Donde la función length calcula la longitud de una lista:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    length   :: [a] -> Int
                    length[]  = 0
                    length(_ : xs) = 1 + length xs
                </code>
            </pre>
            <p class="my-4">
                Se realizara la inducción sobre la variable xs, por lo que la proiedad a probrar es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    P(xs) = ys :: [a] . length(xs ++ ys) = length xs + length ys
                </code>
            </pre>
            <p class="my-4">
                <ul class="container">
                    <li>Caso base: P([])</li>
                </ul>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        ys :: [a] . length([] ++ ys) = length[] + length ys
                    </code>
                </pre>
                <ul class="container">
                    <li>Paso Inductivo:</li>
                </ul>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        xs :: [a], x :: a ,
                        ys :: [a] . length (xs ++ ys) = length xs + length ys
                        =>
                        ys :: [a] . length((x : xs) ++ ys) = length (x : xs) + length ys
                    </code>
                </pre>
            </p>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="selectores">
            <h4 class="color-yellow">6.4 Selectores</h4>
            <p class="my-4">
                Las funciones selectoras permiten extraer parte de una lista. Los dos más simples son head y tail que permiten extraer la cabeza y el resto de una lista no vacía:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                   head  :: [a] -> a 
                   head(x : _) = x

                   tail  :: [a] -> [a]
                   tail(_:xs) = xs
                </code>
            </pre>
            <p class="my-4">
                La función last extra el último elemento de una lista mientras que init devuelve la lista que se obtiene al suprimir el último elemento. Las cuatro funciones citadas están parcialmente definidas. El siguiente diálogo muestra su comportamiento:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    head [1..5]
                    tail[1..5]
                    last[1..5]
                    init[1..5]
                </code>
            </pre>
            <div class="desactivate" id="result-code11">
                <pre>
                    <code class="language-haskell">
                        1 :: Integer
                        [2,3,4,5] :: [Integer]
                        5 :: Integer 
                        [1,2,3,4] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="11" id="probar11" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn11" class="btn-primary cerrar desactivate">Cerrar</a>
            <h1>Aqui va una imagen</h1>
            <p class="my-4">
                También es posible selecciona una cantidad de elementos iniciales de una lista mediante la función <span style="color: blue">take</span>: 
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    take 3[1..5]
                    take 10[1..5]
                </code>
            </pre>
            <div class="desactivate" id="result-code12">
                <pre>
                    <code class="language-haskell">
                        [1,2,3] :: [Integer]
                        [1,2,3,4,5] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="12" id="probar12" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn12" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Obsérvese que si el número de elementos requeridos es mayor que el tamaño de la lista no se produce un error, sino que se devuelven todos los posibles. Esto se debe a la segunda línea de la definición de esta función
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    take :: Int -> [a] -> [a]
                    take 0 _    = []
                    take _ []   = []
                    take n (x : xs) | n > 0 = x : take (n - 1) xs
                    take _ _        = error "Prelude.take: negative argument"
                </code>
            </pre>
            <h1>Aqui va una imagen</h1>
            <p class="my-4">
                La función drop permite eliminar un número de elementos del principio de una lista:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    drop 3 [1..5]
                    drop 10[1..5]
                </code>
            </pre>
            <div class="desactivate" id="result-code13">
                <pre>
                    <code class="language-haskell">
                        [4,5] :: [Integer]
                        [] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="13" id="probar13" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn13" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La función splitAt combina los resultados de take y drop en una tupla:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    splitAt 3[1..5]
                    splitAt 10[1..5]
                </code>
            </pre>
            <div class="desactivate" id="result-code14">
                <pre>
                    <code class="language-haskell">
                        ([1,2,3],[4,5]) :: ([Integer],[Integer])
                        ([1,2,3,4,5],[]) :: ([Integer],[Integer])
                    </code>
                </pre>
            </div>
            <a href="#" data-close="14" id="probar14" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn14" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Mientras que el operador permite seleccionar un elemento de una lista a partir de su posición. Se considera que el elemento de la cabeza ocupa la posición cero:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [1..5] !! 3
                    [1..5] !! 10
                </code>
            </pre>
            <div class="desactivate" id="result-code15">
                <pre>
                    <code class="language-haskell">
                        4 :: Integer
                        Predule !! : índice too large
                    </code>
                </pre>
            </div>
            <a href="#" data-close="15" id="probar15" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn15" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Como muestra el ejemplo, se produce un error si el elemento que ocupa la posición solicitada no existe. La definición de este operador es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    infixl 9 !!
                    (!!)           :: [a] -> Int -> a
                    (x : _) !! 0   = x
                    (_ : xs) !! n | n > 0 = xs !! (n - 1)
                    (_:_) !! _   = error "Prelude !!: negative index"
                    []    !! _   = error "Prelude !!: index too large"
                </code>
            </pre>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="emparejando">
            <h4 class="color-yellow">6.5 Emparejando Listas</h4>
            <p class="my-4">
                La función predefinida zipWith:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                   zipWith   :: (a -> b -> c) -> [a] -> [b] -> [c]
                   zipWith f(a : as)(b : bs) = f a b : zipWith f as bs
                   zipWith _ _    _    = []
                </code>
            </pre>
            <p class="my-4">
                Aplica cierta función a los elementos de dos listas tomándolos de dos en dos:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    zipWith (+) [1..3][10..]
                </code>
            </pre>
            <div class="desactivate" id="result-code16">
                <pre>
                    <code class="language-haskell">
                        [11,13,15] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="16" id="probar16" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn16" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Observése que la longitud de la lista resultado coincide con la de menor longitud. La función zip:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    zip :: [a] -> [b] -> [(a,b)]
                    zip = zipWith(λ a b -> (a,b))
                </code>
            </pre>
            <p class="my-4">
                Es un caso particular de zipWith y construye una lista de pares a partir de dos listas:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    zip[1..3]['a'..'c']
                </code>
            </pre>
            <div class="desactivate" id="result-code17">
                <pre>
                    <code class="language-haskell">
                        [(1,'a'),(2,'b'),(3,'c')] :: [(Integer,Char)]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="17" id="probar17" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn17" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La función unzip realiza el proceso inverso:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    unzip  :: [(a,b)] -> ([a],[b])
                    unzip []  = ([],[])
                    unzip ((a,b) : xs) = (a : as, b : bs)
                        where
                            (as,bs) = unzip xs
                </code>
            </pre>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="aplicando">
            <h4 class="color-yellow">6.6 Aplicando una función a los elementos de una lista</h4>
            <p class="my-4">
                Una de las operaciones más frecuentes con listas es transformar todos sus elementos aplicándoles una misma función. Por ejemplo, la función qué eleva al cuadrado todos los elementos de una lista es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    listaAlCuadrado   :: [Integer] -> [Integer]
                    listaAlCuadrado[]  = []
                    listaAlCuadrado(x : xs) = alCuadrado x : listaAlCuadrado xs
                        where
                            alCuadrado = (**2)
                    listaAlCuadrado [1..10]
                </code>
            </pre>
            <div class="desactivate" id="result-code18">
                <pre>
                    <code class="language-haskell">
                        [1,4,9,16,25,36,49,64,81,100] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="18" id="probar18" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn18" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Otro ejemplo es la función que pasa a mayúsculas una cadena de caracteres:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    listaAMayusculas   :: [Char] -> [Char]
                    listaAMayusculas[]  = []
                    listaAMayusculas(x:xs) = toUpper x : listaAMayuscula xs

                    listaAMayusculas "hola"
                </code>
            </pre>
            <div class="desactivate" id="result-code19">
                <pre>
                    <code class="language-haskell">
                        "HOLA" :: [Char]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="19" id="probar19" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn19" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Se puede observar que la definición de ambas funciones es muy similar, por lo que se puede definir una función de orden superior que tome esta función como árgumento. Este combinador está definidio en Haskell como map:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    map  :: (a -> b) -> [a] -> [b] 
                    map f[]  = []
                    map f(x : xs) = f x : map f xs
                </code>
            </pre>
            <p class="my-4">
                Así, los ejemplos anteriores pueden ser expresados como:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    map (1 2)[1..10]
                    map toUpper "hola"
                </code>
            </pre>
            <div class="desactivate" id="result-code20">
                <pre>
                    <code class="language-haskell">
                        [1,4,9,16,25,36,49,64,81,100] :: [Integer]
                        "HOLA" :: [Char]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="20" id="probar20" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn20" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Observése que el tipo de la lista resultado no tiene que coincidir con el de la lista argumento, aunque el dominio de la función debe coincidir con el tipo base de la lista argumento, y el tipo base de la lista resultado coincidirá con el rango de ésta:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    map ord "hola"
                </code>
            </pre>
            <div class="desactivate" id="result-code21">
                <pre>
                    <code class="language-haskell">
                        [104,111,108,97] :: [Int]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="21" id="probar21" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn21" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="filtros">
            <h4 class="color-yellow">6.7 Filtros</h4>
            <p class="my-4">
                Un filtro permite seleccionar los elementos de una lista que cumplen cierta propiedad. La función filter cumple este cometido. Se trata de una función de orden superior que toma como argumentos un predicado (de tipo a -> Bool) y una lista, y devuelve la lista formada por aquellos elementos que verifican el predicado:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    filter even [1..10]
                    filter (>'g') "me gustan las listas"
                </code>
            </pre>
            <div class="desactivate" id="result-code22">
                <pre>
                    <code class="language-haskell">
                        [2,4,6,8,10] :: [Integer]
                        "mustnlslists" :: [Char]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="22" id="probar22" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn22" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Como vemos, la función es polimófica ya que puede actuar sobre listas con cualquier tipo base. La definición de la función es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    filter  :: (a -> Bool) -> [a] -> [a]
                    filter p []  = []
                    filter p(x:xs)
                        | p x   = x : filter p xs
                        | otherwise = filter p xs
                </code>
            </pre>
            <p class="my-4">
                El tipo del argumento del predicado ha de coincidir con el de los elementos de la lista.<br>
                La función <span style="color: blue">filter</span> recorre por completo la lista a filtrar. Otro filtro es takeWhile que, con los mismos argumentos que <span style="color: blue">filter</span>, devuelve el mayor segmento incial de elementos de la lista que verifican el predicado. En cuanto uno de los elementos no verifique el predicado, no se comprueba la condición para los que le siguen. El siguiente diálogo muestra la diferencia entre <span style="color: blue">filter</span> y <span style="color: blue">takeWhile</span>:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    filter even [2,4,8,9,10,11,12]
                    takeWhile even [2,4,8,9,10,11,12]
                </code>
            </pre>
            <div class="desactivate" id="result-code23">
                <pre>
                    <code class="language-haskell">
                        [2,4,8,10,12] :: [Integer]
                        [2,4,8] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="23" id="probar23" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn23" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                <span style="color: blue">filter</span> devuelve todos los elementos pares de la lista original, pero <span style="color: blue">takeWhile</span> para en cuanto encuentran uno impar. La función <span style="color: blue">takeWhile</span> es muy útil al trabajar con listas infinitas. El siguiente ejemplo muestra cómo se pueden calcular los cuadrados menores que 100 de los números naturales:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    takeWhile(< 100)(map (** 2)[0..])
                </code>
            </pre>
            <div class="desactivate" id="result-code24">
                <pre>
                    <code class="language-haskell">
                        [0,1,4,9,16,25,36,49,64,81] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="24" id="probar24" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn24" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La expresión map (** 2)[0 ..] representa la lista infinita de los cuadrados de los números naturales. Por ser esta lista monotona creciente, la función <span style="color: blue">takeWhile(< 100)</span> extrae tan sólo los elementos que nos interesan, Observése que se obtiene como resultado final una lista finita auqnue una de las expresiones intermedias sea infinita. Esto es posible gracias al mecanismo de evaluación perezosa, que genera tan sólo la parte inicial de la lista infinita necesaria para calcular el resultado
            </p>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="listascompresion">
            <h4 class="color-yellow">6.8 Listas por comprensión</h4>
            <p class="my-4">
                Haskell permite definir listas mediante una notación similar a la utilizada para describir conjuntos por comprensión de matemáticas. Por ejemplo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    {x | x E N, x es par}
                </code>
            </pre>
            <p class="my-4">
                Denota el conjunto de los x tales que x es un número natural par. En Haskell podemos usar la notación de listas por compresión para obtener el mismo resultado:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [x | x <- [0..], even x]
                </code>
            </pre>
            <div class="desactivate" id="result-code25">
                <pre>
                    <code class="language-haskell">
                        [2,4,6,8,10,12,14,16 (Interrupted!)
                    </code>
                </pre>
            </div>
            <a href="#" data-close="25" id="probar25" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn25" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La sintaxis de una lista por comprensión en Haskell es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [expresion | cualificador1, cualificador2, ... , cualificadorn]
                </code>
            </pre>
            <p class="my-4">
                Donde cada cualificador puede ser 
                <ul class="container">
                    <li>Un generador: expresión que genera una lista</li>
                    <li>Un guarda:expresión booleana</li>
                    <li>Una definición local: se usan para definir elementos locales a la expresión</li>
                </ul>
                En el ejemplo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [2 * x | x <- [1..5]]
                </code>
            </pre>
            <div class="desactivate" id="result-code26">
                <pre>
                    <code class="language-haskell">
                        [2,4,6,8,10] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="26" id="probar26" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn26" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                El ínico cualificador es un generador. La variable x se instancia a cada uno de los elementos de la lista [1..5] y, para cada instancia, un elemento de la forma 2*x se añade a la lista resultado. El ejemplo muestra que la expresión a la izquierda del símbolo pude depender de la variables introducidas a los generadores. La expresión del ejemplo es equivalente a <span style="color: blue">map (2*)[1..5]</span>. De hecho, es posible definir la función <span style="color: blue">map</span> de forma compacta utilizando la sintaxis de listas por comprensión:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    map :: (a -> b) -> [a] -> [b]
                    map f xs = [f x | x <- xs]
                </code>
            </pre>
            <p class="my-4">
                Una guarda puede ser utilizada para seleccionar los elementos de un generador que cumplen cierta condición
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [2 * x | x <- [1..5], even x]
                </code>
            </pre>
            <div class="desactivate" id="result-code27">
                <pre>
                    <code class="language-haskell">
                        [4,8] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="27" id="probar27" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn27" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Sólo los elementos pares de la lista [1..5] generan un elemento en la lista resultado. El ejemplo muestra que un cualificador puede utilizar una variable introducida en uno previo (más a la izquierda). El ejemplo equivale a la expresión <span style="color: blue">map (2*)(filter even [1..5])</span> <br>
                También es posible definir la función <span style="color: blue">filter</span> utilizando la sintaxis de listas por compresión:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    filter :: (a -> Bool) -> [a] -> [a]
                    filter p xs = [x | x <- xs, px]
                </code>
            </pre>
            <p class="my-4">
                Si se introduce más de un generador, los que aparecen a la derecha cambian más rápido:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    [(x,y)|x <- [1..3], y <- ['a','b']]
                    concat (map (λx -> map(λy -> (x,y))['a','b'])[1..3])
                </code>
            </pre>
            <div class="desactivate" id="result-code28">
                <pre>
                    <code class="language-haskell">
                        [(1,'a'),(1,'b'),(2,'a'),(2,'b'),(3,'a'),(3,'b')] :: [(Integer,Char)]
                        [(1,'a'),(1,'b'),(2,'a'),(2,'b'),(3,'a'),(3,'b')] :: [(Integer,Char)]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="28" id="probar28" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn28" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La segunda expresión es un modo equivalente de escribir la expresión ejemplo. Como se ve, es posible escribir cualquier expresión sin utilizar la sintaxis de listas por compresión. La principal ventaja de esta sintaxis es que muchas expresiones resultan más claras. Por ejemplo, la siguiente función calcula los divisores de un número natural:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    divide A  :: Integer -> Integer -> Bool 
                    d divideA n = n 'mod' d == 0

                    divisoresDe :: Integer -> [Integer]
                    divisoresDe n = [x | x <- [1..n], x 'divideA' n]
                </code>
            </pre>
            <p class="my-4">
                Ahora es fácil calcular el máximo común divisor de dos números:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    mod :: Integer -> Integer -> Integer
                    mod a b = maximum [x | x <- divisoresDe a, x 'divideA' b]
                </code>
            </pre>
            <p class="my-4">
                Donde la función predefinida <span style="color: blue">maximun</span> calcula el mayor elemento de una lista. Un número natural es primo si sólo tiene dos divisores distintos: 1 y él mismo
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    esPrimo :: Integer -> Bool
                    esPrimo n = divisoresDe n == [1,n]
                </code>
            </pre>
            <p class="my-4">
                La siguiente función proporciona la lista de todos los números primos:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    losPrimos :: [Integer]
                    losPrimos = [n | n <- [2..], esPrimo n]
                </code>
            </pre>
            <p class="my-4">
                y se puede tomar los diez primeros:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    take 10 losPrimos
                </code>
            </pre>
            <div class="desactivate" id="result-code29">
                <pre>
                    <code class="language-haskell">
                        [2,3,5,7,11,13,17,19,23,29] :: [Integer]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="29" id="probar29" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn29" class="btn-primary cerrar desactivate">Cerrar</a>
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
                        <div class="card-body" style="min-height: 179px">
                            <h5 class="card-title">Ejemplo 1</h5>
                            <p class="card-text">Defina una función mapSucesor dada una lista de enteros, y que esta devuelva la lista de sucesores de cada entero</p>
                            <a  href="{{ route('ejemplos6', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">Realizar una función que, dada una lista de enteros, devuelve una lista con los elementos que son positivos</p>
                            <a  href="{{ route('ejemplos6', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 227px">
                            <h5 class="card-title">Ejemplo 3</h5>
                            <p class="card-text">Defina recursivamente una función que, dada una lista, devuelve su último elemento</p>
                            <a  href="{{ route('ejemplos6', ['id'=>3]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 210px">
                            <h5 class="card-title">Ejemplo 4</h5>
                            <p class="card-text">Dada una lista x y un número n, devuelve una lista con los primeros n elementos de lista recibida. Si la lista recibida tuviera menos de n elementos, devuelve la lista completa.<br>
                                Escriba una definición polimórfica para mochilas
                            </p>
                            <a  href="{{ route('ejemplos6', ['id'=>4]) }}" class="btn btn-azul">Ir al ejemplo</a>
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
                        Se necesita realizar una función en Haskell que reciba una lista y devuelva el número mayor de dicha lista, ¿Cómo se haría esta función?
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
                                            maximum1 :: [Int] -> Int
                                            maximum1 []= 0
                                            maximum1 (x:xs) | x > (maximum1 xs)= x
                                                            | otherwise = maximum1 xs
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
                                            maximum1 :: [Int] -> Int
                                            maximum1 (x:xs) | x > (maximum1 xs)= x
                                                            | otherwise = maximum1 xs
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
                                            maximum1 :: [Int] -> Int
                                            maximum1 []= 0
                                            maximum1 (x:xs) | x > (maximum1 xs)= x
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
                                            maximum1 :: [Int] -> Int -> Int
                                            maximum1 []= 0
                                            maximum1 (x:xs) | x > (maximum1 xs)= x
                                                            | otherwise = maximum1 xs
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
                                            ¿El operador (++) permite concatenar dos listas?
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
                                            ¿Las funciones selectoras permiten extraer parte de una lista?
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
                                            ¿Un filtro permite seleccionar los elementos de una lista que cumplen cierta propiedad?
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
                        De acuerdo la siguiente función, y pasándole como parámetro la lista [1,2,3,4] y el número 3 ¿Que debería retornar?
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6">
                            <h5 class="color-yellow">Código</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                                        dropN :: [a] -> Int -> [a]
                                        dropN [] n = []
                                        dropN  (x:xs) n | n /= 0 = dropN xs (n-1)
                                                        | otherwise = x:(dropN xs 0)
                                    </code>
                                </pre>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-center font-weight-bold">¿Que debería retornar?</h6>
                            <form action="" class="form">
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option1" id="secondradio1">
                                        <label class="form-check-label" for="secondradio1"></label>
                                        <p class="p-order">
                                            [3,4,5]
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option2" id="secondradio2">
                                        <label class="form-check-label" for="secondradio2"></label>
                                        <p class="p-order">
                                            [3,6,9,12,15]
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option3" id="secondradio3">
                                        <label class="form-check-label" for="secondradio3"></label>
                                        <p class="p-order">
                                            [4,5]
                                        </p>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox-Soft order mx-auto">
                                        <input class="form-check-input" type="radio" name="radiosexercise2" value="option4" id="secondradio4">
                                        <label class="form-check-label" for="secondradio4"></label>
                                        <p class="p-order">
                                            [1,2,3]
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
                "respuest_correct": "option1",
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
