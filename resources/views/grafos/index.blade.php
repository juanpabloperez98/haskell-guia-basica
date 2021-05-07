@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Programación con listas</h4>
        <ul>
            <li><a href="#" data-name="arboles" class="item active">8.1 Árboles</a></li>
            <li><a href="#" data-name="arbolesbi" class="item">8.2 Árboles binarios</a></li>
            <li><a href="#" data-name="arrays" class="item">8.3 Arrays</a></li>
            <li><a href="#" data-name="grafos" class="item">8.4 Grafos y búsqueda en grafos</a></li>
            <li><a href="#" data-name="ejemplos" class="item">8.5 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">8.6 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" style="min-height: 100vh" id="arboles">            
            <h4 class="color-yellow">8.1 Árboles</h4>
            <p class="my-4">
                Un árbol es una estructura no lineal acíclica utilizada para organizar información de forma eficiente. La definición de un árbol es recursiva. Un árbol es una colección de valores [v1,v2,...,vn] tales que:
                <ul class="container">
                    <li>Si n = 0 el árbol se dice vacío</li>
                    <li>En otro caso, existe un valor destacado que se denomina raíz (p.c, v1), y los demás elementos forman parte de colecciones disjuntas que a su vez son árboles</li>
                </ul>
                Gráficamente, los árboles suelen dibujarse con la raíz en la parte superior. <br>
                La raíz del árbol representado es el valor 10. Los valores 22, 15 y 12 forman el primer subárbol, 35 el segundo, mientras que 52 y 33 forman el último. En Haskell el siguiente tipo puede ser utilizado para representar árboles que alamacenan datos de tipo a:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Arbol = a = Vacio | Nodo a | Arbol a | deriving Show
                </code>
            </pre>
            <h1>AQUI VA UNA IMAGEN|</h1>
            <p class="my-4"> 
                Donde el primer argumento del constructor Nodo es el dato en la raíz del árbol y el segundo la lista de los subárboles del nodo raíz. El constrcutor Vacio puede ser utilizado para representar un árbol vacío.    
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    a1 :: Arbol Integer
                    a1 = Nodo 10 [a11,a12,a13]
                        where
                            a11 = Nodo 22[Nodo 15[], Nodo 12[]]
                            a12 = Nodo 35[]
                            a13 = Nodo 52[Nodo 33[]]
                </code>
            </pre>
            <p class="my-4">
                Una función básica sobre árboles que devuelve la raíz es:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    raiz  :: Arbol a -> a
                    raiz Vacio  = error "raiz de arbol vacio"
                    raiz (Nodo x _) = x
                </code>
            </pre>
            <p class="my-4">
                El tamaño de un árbol es el número de elementos que almacena y puede ser computado del siguiente modo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    tam :: Arbol a  -> Integer
                    tam Vacio = 0
                    tam(Nodo _ xs) =  1 + sum(map tam xs)
                </code>
            </pre>
            <p class="my-4">
                Los distintos elementos de un arbol están agrupados por niveles de modo que se considera que la raíz del árbol se encuentra a nivel cero. las raíces de los subárboles del nodo raíz están en nivel 1 y así sucesivamente. Se define la profundiad de un árbol como el máximo nivel del árbol más uno:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    profundidad  :: Arbol a -> Integer
                    profundidad Vacio  = 0
                    profundidad(Nodo _ []) = 1
                    profundidad(Nodo _ xs) = 1 + maximun (map profundidad xs)
                </code>
            </pre>
            <p class="my-4">
                Los nodos sin subárboles, como el nodo 15 en el ejemplo, se llaman nodos hoja y se caracterizan porque su lista de subárboles es vacía:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    esHoja :: Arbol a -> Bool
                    esHoja(Nodo _ []) = True
                    esHoja _ = False
                </code>
            </pre>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Funciones de orden superior sobre árboles</h5>
                <p class="my-4">
                    La función map sólo está predefinida para listas, pero existe una versión sobrecargada, denominada <span style="color: blue">fmap</span>, predefinida en la siguiente clase:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        class Functor f where
                            fmap :: (a -> b) -> f a -> f b
                    </code>
                </pre>
                <p class="my-4">
                    De modo que f puede ser instanciada con constructores de tipos polimóficos de aridad uno. Por ejemplo, las listas son una instancia predefinada de esta clase:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance Functor [] where
                            fmap = map
                    </code>
                </pre>
                <p class="my-4">
                    Por lo que es posible usar tanto <span style="color: blue">map</span> como <span style="color: blue">fmap</span> con listas. La función <span style="color: blue">fmap</span> también tiene sentido para árboles y puede ser definida mediante las siguiente instancia:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance Functor Arbol where
                            fmap f Vacio  = Vacio
                            fmap f (Nodo x xs) = Nodo (F x) (map (fmap f) xs)
                    </code>
                </pre>
                <p class="my-4">
                    Como puede observarse, se aplica la función al dato en la raíz y mediante <span style="color: blue">map</span> a todos los subárboles. La instancia anterior se puede expresar también con una lista por compresión:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance Functor Arbol where
                            fmap f Vacio = Vacio
                            fmap (Nodo x xs) = Nodo (f x) |fmap f x | x <- xs |
                    </code>
                </pre>
                <p class="my-4">
                    Utilizando esta función se puede, por ejemplo, definir una función que duplique los datos almacenados en un árbol:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        duplicar :: Num n => Arbol a -> Arbol a
                        duplicar = fmap (*2)
                    </code>
                </pre>
                <p class="my-4">
                    La función de plegado para árboles puede ser definida como:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        foldArbol :: (a -> [b] -> b) -> b -> (Arbol a  -> b)
                        foldArbol f c = fun 
                            where
                                fun Vacio  = e
                                fun (Nodo x xs) = f x (map fun xs)
                    </code>
                </pre>
                <p class="my-4">
                    O también como:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        foldArbol :: (a -> [b] -> b) -> b -> Arbol a -> b
                        foldArbol f e Vacio  = e
                        foldArbol f e (Nodo x xs) = f x (map (foldArbol f c)xs)
                    </code>
                </pre>
                <p class="my-4">
                    De modo que <span style="color: blue">e</span> sustituye al constructor <span style="color: blue">Vacio</span> y <span style="color: blue">f</span> sustituye a <span style="color: blue">Nodo</span>. Por ejemplo definición de tamaño usando el plegado es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        tamano' :: Arbol a -> Integer
                        tamano' = foldArbol (λ r ts -> 1 + sum ts) 0
                    </code>
                </pre>
                <p class="my-4">
                    Donde 0 es el resultado del problema para árboles vacíos y la λ-expresión es la función que apartir del dato en la raíz y una lista con los tamaños de los subárboles calcula el tamaño total del árbol. Otro ejemplo es la siguiente función que suma los elementos de un árbol:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        sumArbol :: Num a => Arbol a -> a
                        sumArbol = foldArbol (λ r ss -> r + sum ss ) 0
                    </code>
                </pre>
                <p class="my-4">
                    Donde 0 es el resultado del problema para árboles vacíos y la λ-expresión es la función que apartir del dato en la raíz y una lista con los tamaños de los subárboles calcula el tamaño total del árbol. Otro ejemplo es la siguiente función que suma los elementos de un árbol:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        sumArbol :: Num a => Arbol a -> a
                        sumArbol = foldArbol (λ r ss -> r + sum ss ) 0
                    </code>
                </pre>
                <p class="my-4">
                    Obsérvese que los argumentos recibidos en este caso por la λ-expresión son la raíz y una lista con la sumas correspondientes a cada uno de los subárboles. Otro ejemplo de función de orden superior es la siguiente, que comprueba si todos los elementos de un árbol cumplen cierta condición:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        todosArbol :: (a -> Bool) -> Arbol a -> Bool
                        todosArbol p Vacio  = True
                        todosArbol p (Nodo x xs) = p x && and (map (todosArbol p) xs)
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        todosArbol (> 0) a1
                    </code>
                </pre>
                <div class="desactivate" id="result-code1">
                    <pre>
                        <code class="language-haskell">
                           True :: Bool
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Esta función también puede ser definida como un plegado:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        todosArbol' :: (a -> Bool) -> Arbol a  -> Bool
                        todosArbol' p = foldArbol (λ r bs -> p r && and bs) True
                    </code>
                </pre>
                <p class="my-4">
                    Donde True es el resultado para el árbol vacío y la λ-expresión toma la raíz y una lista con los resultados de comprobar la condición en los subárboles
                </p>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="arbolesbi">
            <h4 class="color-blue">8.2 Árboles binarios</h4>
            <p class="my-4">
                Un árbol binario es un árbol tal que cada nodo tiene como máximo dos subárboles. En Haskell se puede usar el siguiente tipo para representar estos árboles:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data ArbolB a = Vacio B | Nodo B (ArbolB a) a (ArbolB a) deriving Show
                </code>
            </pre>
            <p class="my-4">
                Considerese que los tres componentes del constructor Nodo B son el subárbol izquierdo, el dato raíz y el subárbol derecho respectivamente. Los árboles binarios suelen ser utilizados como contenedores de datos, por lo que se puede definir una función que compruebe si un dato pertenece a un árbol binario:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    perteneceB   :: Eq a => a  -> ArbolB a -> Bool
                    perteneceB x vacioB  = False
                    perteneceB x (Nodo B i r d)
                        | x == r   = True
                        | otherwise = perteneceB x i || perteneceB x d
                </code>
            </pre>
            <p class="my-4">
                El problema fundamental para definir <span style="color: blue">perteneceB</span> es que se tiene que hacer una búsqueda exhaustiva, ya que si el elemento a buscar no coincide con la raíz se tiene que contemplar la posibilidad de que esté en cualquiera de los dos subárboles
            </p>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Arboles binarios de búsqueda</h5>
                <p class="my-4">
                    El algoritmo de búsqueda exhaustiva es el único posible si no se tiene más información sobre la disposición de los elementos. Para mejorar la eficiencia de la búsqueda podemos utilizar áboles binarios ordenados (o de búsqueda) siempre que los elementos a almacenar en el árbol dispongan de una relación de orden. Un arbol binario de busqueda es un árbol binario tal que: <br>
                    <ul class="container">
                        <li>O bien es vacío</li>
                        <li>O no es vacío y para cualquier nodo se cumple que los elementos del correspondiente subárbol izquierdo son menores o iguales al almacenamiento en el nodo y si los elementos del correspondiente subárbol derecho son estrictamente mayores al almacenado en el nodo.</li>
                    </ul>
                </p>
                <h1>AQUI VA UNA IMAGEN</h1>
                <p class="my-4">
                    El árbol de la imagen anterior está ordenado y puede ser representado con la siguiente expresión:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        a2 :: ArbolB Integer
                        a2 = NodoB (NodoB (hojaB 30)
                                    30
                                    (hojaB 35))
                                50
                                (NodoB VacioB 
                                       60
                                       (hojaB 80))
                        where
                            hojaB x = NodoB VacioB x VacioB
                    </code>
                </pre>
                <p class="my-4">
                    La siguiente función puede ser utilizada para comprobar si un árbol binario es de búsqueda:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        esArbolBB   :: Ord a  => ArbolB a -> Bool
                        esArbolBB VacioB  = True
                        esArbolBB(Nodo B i r d) = todosArbolB (<= r) i &&
                                                  todosArbolB (> r) d &&
                                                  esArbolBB i &&
                                                  esArbolBB d
                        
                        todosArbolB  :: (a -> Bool) -> ArbolB a -> Bool
                        todosArbolB p VacioB  = True
                        todosArbolB p (NodoB i r d) = p r &&
                                                      todosArbolB p i && todosArbolB p d
                    </code>
                </pre>
                <p class="my-4">
                    Para los árboles ordenados la función de búsqueda es más eficiente ya que si el dato no coincide con la raíz sólo hay que buscar en uno de los subárboles:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        perteneceBB    :: Ord a => a -> ArbolB a -> Bool
                        perteneceBB x vacioB   = False
                        perteneceBB x (NodoB i r d)
                            | x == r     = True
                            | x < r      = perteneceBB x i
                            | otherwise   = perteneceBB x d
                    </code>
                </pre>
                <p class="my-4">
                    De modo que como máximo se realizaran tantas comparaciones como profundidad tenga el arbol. Dado que es posible almacenar 2^n - 1 datos en un árbol de profundidad m, se puede localizar un dato en un árbol con n elementos realizando del orden de log n comparaciones como máximo (siempre que el árbol tenga todos sus niveles completos). La ganancia es significativa frente a utilizar una lista, ya que con esta estructura puede ser necesario realizar n comparaciones 
                </p>
                <h1>Aquí va una imagen</h1>
                <p class="my-4">
                    Se define ahora que una función para insertar un nuevo dato dentro de un árbol de búsqueda de modo que se obtenga otro árbol de búsqueda:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        insertarBB    :: Ord a => a -> ArbolB a -> ArbolB a
                        insertarBB x VacioB   = NodoB VacioB x VacioB
                        insertarBB x (NodoB i r d)
                            | x <= r   = NodoB (insertarBB x i) r d
                            | otherwise = NodoB i r(insertarBB x d)
                    </code>
                </pre>
                <p class="my-4">
                    Basta con ir comparando el dato a insertar con los distintos nodos del árbol y descender por el subárbol adecuado hasta alcanzar un subárbol vacío. La eleminación de un dato es un poco más complicada, ya que si el nodo a eliminar tiene dos subárboles no se pude dejar un hueco en su lugar. Una solución consiste en tomar el mayor elemento del subárbol izquierdo del nodo a eliminar y colocar éste en el hueco. De este modo el nuevo árbol seguirá siendo ordenado: 
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        esVacioB    :: ArbolB a -> Bool
                        esVacioB VacioB = True
                        esVacioB  = False

                        eliminarBB   :: Ord a  => a -> ArbolB a -> Arbol a
                        eliminarBB x VacioB  = VacioB
                        eliminarBB x (NodoB i r d)
                            | x < r     = NodoB (eliminarBB x i) r d
                            | x > r     = NodoB i r (eliminarBB x d)
                            | esVacioB i   = d
                            | esVacioB d   = i
                            | otherwise  = NodoB i' mi d
                            where
                                (mi, i')            = tomaMarBB i
                                tomaMarBB (NodoB i r VacioB) = (r,i)
                                tomaMarBB (NodoB i r d)  = (m,NodoB i r d')
                                    where
                                        (m,d') = tomaMarBB d
                    </code>
                </pre>
                <p class="my-4">
                    Obsérvese que la condición x == r está implicita en las tres últimas guardas. La función auxiliar tomaMarBB a devuelve un par (ma, a') donde ma es el mayor elemento del árbol de busqueda a, y a' es el arbol que se obtiene al eliminar el elemento ma del árbol a. El elemento máximo se encuentra profundizando todo lo posible por la derecha en el árbol. <br>
                    El recorrido en orden de un árbol binario dará como resultado una lista con los datos de un árbol de modo que primero se recorre el subárbol izquierdo, luego la raíz y por último el derecho:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        enOrden   :: ArbolB a  -> [a]
                        enOrden VacioB   = []
                        enOrden(NodoB i r d) = enOrden i ++ (r i enOrden d)
                    </code>
                </pre>
                <p class="my-4">
                    Aunque la complejidad de esta función es cuadrática, se obtiene una versión mejor con un parámetro acumulador:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        enOrden' :: ArbolB a -> [a]
                        enOrden' x = aux x []
                            where
                                aux   :: ArbolB a -> [a] -> [a]
                                aux VacioB xs   = xs
                                aux(NodoB i r d)xs = aux i (r : aux d xs)
                    </code>
                </pre>
                <p class="my-4">
                    Donde la especificación de la función auxiliar <span style="color: blue">aux</span> es <span style="color: blue">aux a xs = enOrden a ++ xs</span>. Una propiedad interesante es que si se realiza una vista en orden de unárbol de búsqueda se obtiene una lista ordenada:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        enOrden' a2
                    </code>
                </pre>
                <div class="desactivate" id="result-code2">
                    <pre>
                        <code class="language-haskell">
                           [30,30,35,50,60,80] :: [Integer]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Por lo que es posible ordenar una lista de datos construyendo un árbol de búsqueda con sus elementos y recorriendo éste en orden:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        listaAArbolBB :: Ord a => [a] -> ArbolB a
                        listaAArbolBB = foldr insertarBB VacioB

                        treeSort :: Ord a => [a] -> [a]
                        treeSort = enOrden.listaAArbolBB
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        treeSort [4,,7,1,2,9]
                    </code>
                </pre>
                <div class="desactivate" id="result-code3">
                    <pre>
                        <code class="language-haskell">
                           [1,2,4,7,9] :: [Integer]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Al construir un árbol de búsqueda con una lista de elementos ordenados se obtiene un árbol degenerado:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        listaAArbolBB [1,2,3]
                    </code>
                </pre>
                <div class="desactivate" id="result-code4">
                    <pre>
                        <code class="language-haskell">
                           NodoB (NodoB(NodoB VacioB 1 VacioB) 2 VacioB) 3 VacioB :: ArbolB Integer
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Con lo que se pierde la eficiencia al acceder a los elementos del árbol. Cuando la lista éste ordenada podemos obtener un árbol de busqueda no degenerado con la siguiente función:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        tOrdAArbolBB  :: Ord a  => [a] -> ArbolB a
                        tOrdAArbolBB[] = VacioB
                        tOrdAArbolBB xs = NodoB (tOrdAArbolBB ys) z (tOrdAArbolBB zs)
                            where
                                (ys, z : zs) = partir xs
                                partir xs = splitAt(length xs 'div' 2) xs
                    </code>
                </pre>
                <p class="my-4">
                    La función predefinida splitAt es utilizada para partir la lista en dos mitades
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        let xs = [1..6] in splitAt (length xs 'div' 2) xs
                    </code>
                </pre>
                <div class="desactivate" id="result-code5">
                    <pre>
                        <code class="language-haskell">
                           ([1,2,3],[4,5,6]) :: ([Integer],[Integer])
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>
            </div>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Funciones de orden superior para árboles binarios</h5>
                <p class="my-4">
                    La definición de <span style="color: blue">fmap</span> para árboles binarios es la siguiente: <br>
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        instance Functor ArbolB where
                            fmap f VacioB   = vacioB
                            fmap f (NodoB i r d) = NodoB(fmap f i)(f r)(fmap f d)
                    </code>
                </pre>
                <p class="my-4">
                    La siguiente función de plegado sustituye el constructor VacioB por el valor e y el constructor NodoB por la función f:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        foldArbolB :: (b -> a -> b -> b) -> b -> (ArbolB a -> b)
                        foldArbolB f c = fun
                            where
                                fun VacioB = e 
                                fun (NodoB i r d) = f (fun i) r (fun d)
                    </code>
                </pre>
                <p class="my-4">
                    Esta función también puede definirse como:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        foldArbolB :: (b -> a -> b -> b) -> b -> ArbolB a -> b
                        foldArbolB f e VacioB = e
                        foldArbolB f e (NodoB i r d) = f (foldArbolB f e i) r (foldArbolB f e d)
                    </code>
                </pre>
                <p class="my-4">
                    Muchas de las funciones definidas previamente de modo recursivo se definen de modo más breve con foldArbolB:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        perteneceB' :: Eq a => a -> ArboB a -> Bool
                        perteneceB' x = foldArbolB(λ pi r pd -> x == r || pi || pd) False
                        
                        todosArbolB' :: (a -> Bool) -> ArbolB a -> Bool
                        todosArbolB' p = foldArbolB(λ ti r td -> p r && ti && td) True
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="arrays">
            <h4 class="color-blue">8.3 Arrays</h4>
            <p class="my-4">
                Una estructura muy utilizada en Programación es el array o vector. Se trata de un contenedor que almacena una colección de datos del mismo tipo, de modo que cada dato almacenado tiene asociada una posición. El acceso a los datos se hace mediante la posición correspondiente. Suelen existir operaciones para crear un array, y para acceder y modificar el elemento que ocupa una posición
            </p>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Una implementación ineficiente</h5>
                <p class="my-4">
                    Una implementación trivial de arrays se realiza mediante listas:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        type Array a = [a]
                    </code>
                </pre>
                <p class="my-4">
                    De modo que la función que crea un array a partir de una lista de elementos es la identidad:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        creaArray :: [a] -> Array a
                        creaArray xs = xs

                        ar :: Array Char
                        ar = creaArray ['a'..'d']
                    </code>
                </pre>
                <p class="my-4">
                    Si consideramos que las posiciones correspondientes a un array de n elementos están en el rango [0..n-1], podemos seleccionar el elemento que ocupa cierta posición del siguiente modo:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        Infix19!
                        (!)     :: Array a -> Integer -> a
                        (x:_) ! 0    = x
                        (_:xs) ! (n + 1) = xs ! n
                        _      !  _ = error "(!): Posición no valida"
                    </code>
                </pre>
                <p class="my-4">
                    Por ejemplo, se puede acceder a la primera y última posición del array ejemplo mediante el operador anterior:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (ar!0, ar!3)
                    </code>
                </pre>
                <div class="desactivate" id="result-code6">
                    <pre>
                        <code class="language-haskell">
                           ('a','d') :: (Char, Char)
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    El operador que permite obtener un nuevo array modificando el elemento almacenado en cierta posición es el siguiente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        infixl 8 = :
                        (=:)     :: Array a -> (Integer, a) -> Array a
                        (x : xs) =: (0,y)  = (y : xs)
                        (x : xs) =: x : (xs =: (n,y))
                        _        =: _    = error "(=:): Posición no válida"
                    </code>
                </pre>
                <p class="my-4">
                    El segundo argumento del operador anterior es un par con la posición a modificar junto con el nuevo valor:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        let br = ar =: (3,'z') in br ! 3
                    </code>
                </pre>
                <div class="desactivate" id="result-code7">
                    <pre>
                        <code class="language-haskell">
                           'z' :: Char
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Gracias a la asociatividad izquierda del operador es posible realizar varias modificaciones de un modo compacto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        let br = ar =: (0,'A') =: (3,'Z') in (br!0,br!1,br!2,br!3)
                    </code>
                </pre>
                <div class="desactivate" id="result-code8">
                    <pre>
                        <code class="language-haskell">
                           ('A','b','c','Z') :: (Char, Char, Char, Char)
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="8" id="probar8" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn8" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Es posible representar una matriz mediante un array de arrays:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        type Matriz = Array(Array Float)
                        matriz :: Int -> Matriz
                        matriz n = creaArray (replicate n creaFila)
                            where
                                creaFila = creaArray(replicate n 0,0)
                    </code>
                </pre>
                <p class="my-4">
                    Donde la función predefinida replicate crea una lista con un número de copia de un objeto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        replicate 3 True
                    </code>
                </pre>
                <div class="desactivate" id="result-code9">
                    <pre>
                        <code class="language-haskell">
                           [True, True, True] :: [Bool]
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="9" id="probar9" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn9" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    Se puede acceder a un elemento concreto usando dos veces el operador (!), gracias a la asociatividad izquierda de éste. Por ejemplo, para acceder al último elemento de la primera fila de una matriz de dimensión tres, se puede usar:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        let m = matriz 3 in m ! 0 ! 2
                    </code>
                </pre>
                <div class="desactivate" id="result-code10">
                    <pre>
                        <code class="language-haskell">
                           0.0 :: Float
                        </code>
                    </pre>
                </div>
                <a href="#" data-close="10" id="probar10" class="btn btn-primary ejecutar">Probar</a>
                <a href="#" id="btn10" class="btn-primary cerrar desactivate">Cerrar</a>
                <p class="my-4">
                    El principal problema de la implementación de arrays mediante listas es la falta de eficiencia. Obsérvese que para acceder o modificar el último elemento del array es necesario pasar por todos los que le preceden, por lo que en el peor caso se realizarán tantas llamadas recursivas como tamaño tenga el array.
                </p>
            </div>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Una implementación eficiente</h5>
                <p class="my-4">
                    Una implementación más eficiente de arrays se realiza mediante árboles binarios. Con esta implementación, un array de n elementos se representará mediante un árbol de altura <span style="color: blue">log</span> n, de modo que en el peor de los casos las operaciones <span style="color: blue">(!)</span> y <span style="color: blue">(=:)</span> serán también de este orden. La ganancia es significativa frente a utilizar una lista, ya que con esta estructura el número de llamadas recursivas era del orden n. <br>
                    En la nueva implementación utilizaremos el siguiente tipo que permite representar árboles binarios no vacíos que almacenan datos tan sólo en sus hojas:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data ArbolH a = HojaH a | NodoH | (ArbolH a)(ArbolH a) deriving Show
                        type Array a = ArbolH a
                    </code>
                </pre>
                <p class="my-4">
                    Para construir un árbol a partir de una lista se situa los elementos que ocupen posiciones pares en el subárbol izquierdo (el elemento en la cabeza de la lista ocupa una posición par: la posición cero) y los pares en el derecho. Se repite este proceso en cada subárbol hasta obtener listas de un solo elemento representadas mediante nodos hoja:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        creaArray   :: [a] -> Array a
                        creaArray[x]   =  HojaH x
                        creaArray xs@(_:_:_) =  NodoH (creaArray i)(creaArray d)
                            where
                                (i,d) = partir xs
                        partir   :: [a] -> ([a],[a])
                        partir[]   = ([],[])
                        partir[x]  = ([x],[])
                        partir(x : y : zs) = (x : xs, y : ys)
                            where
                                (xs,ys) = partir zs
                        xr :: Array Char
                        xr = creaArray['a'..'d']
                    </code>
                </pre>
                <h1>Aqui va una imagen</h1>
                <p class="my-4">
                    Por ejemplo, para la expresión <span style="color: blue">creaArray[0..7]</span> el árbol obtenido es el presentado en la figura anterior. Para acceder a una posición n par del array se busca en el subárbol izquierdo la posición n <span style="color: blue">'div'</span> 2, mientras que para acceder a una impar se hace en el derecho. El caso base consiste en acceder a la posición cero de un nodo hoja:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        infix19!
                        (!)
                        HojaJ x !0 = x
                        HojaH i d ! n = if even n then
                                            i!(n 'div' 2)
                                        else 
                                            d!(n'div'2)
                                    ! _ = error "Posicion no valida"
                    </code>
                </pre>
                <p class="my-4">
                    El operador para modificar una posición sigue el mismo patrón recursivo, pero se copia en cada llamada recursiva el subárbol (izquierdo o derecho) que no es modificado. En caso base se modifica a la hoja correspondiente:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        infxl 8 =: 
                        (=:)
                        HojaH x =: (0,y) = HojaH y
                        NodoH x d =: (n,y) = if even n then
                                                NodoH i (d =: (n 'div' 2, y)) d
                                            else
                                                NodoH i (d =: (n 'div' 2, y))
                                        =: _  = error "(=:):Posicion no valida"
                    </code>                  
                            
                </pre>
                <p class="my-4">
                    Obsérvese que para las dos operaciones es habitual que el acceso y la modificación de una posición del array sean operaciones predefinidas que se realizan en tiempo constante (independiente del tamaño del array). Haskell ofrece un tipo predefinido con estas caracteristicas, que puede utilizarse importando el m´pdulo estandarizando <span style="color: blue">ARRAY</span>.
                </p>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="grafos">
            <h4 class="color-yellow">8.4 Grafos y búsqueda en grafos</h4>
            <p class="my-4">
                La estructura grafo dirigido con pesos (digrado con pesos) de objetos de tipo base <span style="color: blue">T</span> y pesos de tipo <span style="color: blue">P</span> suele describirse como un conjunto de ternas:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    G = { (x,y,p)  | x,y E T ^ p E P ^ p( x,y,p ) }
                </code>
            </pre>
            <p class="my-4">
                Siendo <span style="color: blue">p</span> cierto predicado o relació. Pueden describirse las operaciones sobre grafos con tales estructuras pero hacemos notar dos inconvenientes: <br>
                <ul class="container">
                    <ol>Los elementos <span>T</span> que no son origen de ningún arco hay que describirlos de forma artificial</ol>
                    <ol>Ciertas operaciones, como la búsqueda de caminos, calculan eficientemente cuáles son los vértices conectados con cada vértice x</ol>
                </ul>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    S(x) = {(y,p) | (x,y,p) E G}
                </code>
            </pre>
            <p class="my-4">
                Si representamos vértices y sucesores con listas, podemos describir un grafo en la forma:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Grafo v p = G[v] (r -> [(v,p)])
                </code>
            </pre>
            <p class="my-4">
                De esta forma se tiene resuelto los dos problemas planteados al principio: están perfectamente definidos los vertices y eficientemente localizables los sucesores de cada vértice. Si se tratara de un grafo sin pesos se consideraría la representación simplificada:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Grafo v = G[v](v -> [v])
                </code>
            </pre>
            <p class="my-4">
                Donde el constructor G permite identificar la estructura
            </p>
            <h1>Aqui va una imagen</h1>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Búsqueda en anchura y profundidad</h5>
                <p class="my-4">
                    La mayoría de algoritmos sobre (di)grafos examinan o procesan los vértices o arcos en cierto orden. La búsqueda en profunidad y la busqueda en anchura son las dos formas de recorridos más utilizados.
                </p>
                <h1>Aqui va una imagen</h1>
                <p class="my-4">
                    El recorrido en profundidad (BEP) es una generalización del recorrido en profunidad en un árbol. La idea es que, partiendo de un vértice inicial, se toma un sucesor y se busca en profundidad a partir de tal sucesor, para después proseguir con el resto de los sucesores del inicial. Por ejemplo para el grafo de la anterior figura, se tiene el árbol de visitas en profundidad de la siguiente figura. Obsérvese que no se visitan todos los vértices ya que el grafo no es conexo.
                </p>
                <h1>Aqui va una imagen</h1>
                <p class="my-4">
                    En la búsqueda en anchura (BEA) los vértices se visitan en orden creciente de distancia desde el punto de comienzo. Por ejemplo para el digrafo de la antepenultima imagen se tiene el árbol BEA de la siguiente imagen y al igual que con la BEP, no se alcanzan todos los vértices. Antes de ver las funciones que realizan el recorrido sobre grafos vease una interesante representación de éstos
                </p>
                <h1>Aqui va una imagen</h1>
            </div>
            <div class="p-md-3 content-line">
                <h5 style="font-weight: bold">Los grafos como instancias de una clase uniparamétrica</h5>
                <p class="my-4">
                    Una alternativa a la representación:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data Grafo v = G[v](v -> [v])
                    </code>
                </pre>
                <p class="my-4">
                    Es proporcionada por el sistema de clase de Haskell donde las funciones esenciales (vértices y sucesor) se capturan como miembros de una clase, en el cual incorporamos otras funciones para resolver problemas típicos de búsqueda de caminos:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        class Eq v => Grafo v where
                            vertices :: [v] 
                            suc :: v -> [v] 
                            camino :: v -> v -> [v] --un camino entre dos vértices
                            caminoDesde :: 
                                v     -> --origen
                                (v -> Bool) -> --tast de localización
                                [v]    -> --vértices ya recorridos
                                [[v]]     -- listas de caminos solución
                    </code>
                </pre>
                <p class="my-4">
                    Las funciones <span style="color: blue">suc</span> y <span style="color: blue">vertices</span> bastan para implementar la función <span style="color: blue">caminoDesde</span> si se puede decidir cuándo un vértice ya ha sido recorrido y de esta forma evitar los posibles cielos. Normalmente tal decisión viene dada por una función <span style="color: blue">(!=)</span> que leemos no pertenece, cuyo tipo es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (!=) :: Eq v => v -> [v] -> Bool
                    </code>
                </pre>
                <p class="my-4">
                    Y que comprueba si un objeto no es miembro de una lista: una versión trivial es:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        x != ys = and[x != y|y <- ys]
                    </code>
                </pre>
                <p class="my-4">
                    Que no es más que la función <span style="color: blue">notElem</span>. Sin embargo, en aplicaciones particulares puede interesar otra forma de poda de la busqueda. Por ello, se podría incorporar tal función a la clase dando un valor por defecto, asi como también tendrá una definición por defecto el algoritmo de búsqueda en profunidad:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        class Eq v => Grafo v where
                            vertices  :: [v]
                            suc :: v -> [v]
                            (!=) :: v -> [v] -> Bool
                            cumino :: v -> v -> [v]
                            caminoDesde :: v -> (v -> Bool) -> [v] -> [[v]]
                            --miembros por defecto
                            x != ys   = and [x != y | y <- ys]
                            camino u v = head (caminoDesde u (== v)) []
                            caminoDesde o te vis = ...
                    </code>
                </pre>
                <p class="my-4">
                    Donde <span style="color: blue">caminoDesde o te vis</span> devuelve la lista de todos los caminos vértice o hasta satisfacer el test de localización te, sinedo el tercer argumento <span style="color: blue">vis</span> la lista de vértices ya visitados. Por ejmplo, para el test de localización (==v) tendremos caminos que terminan en el vértice v. De entre todos los caminos, seleccionando el primero (por ejemplo) se tiene un único camino, y ésta puede ser una definición por defecto:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        camino u v = head( caminoDesde u(== v)[])
                    </code>
                </pre>
                <p class="my-4">
                    Además, si sabemos que nuestro grafo es acíclico entonces nos interesará definir la función (!=) en la forma _ != _ = True <br>
                    Vease ahora la definición de <span style="color: blue">caminoDesde</span>. En primer lugar habrá que comprobar si el vértice origen vertidica el test:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        caminoDesde o te vis
                            | te o  = [o:vis]
                            | otherwise = ...

                    </code>
                </pre>
                <p class="my-4">
                    Y en ese caso se tiene una solución o : vis que incluimos en forma de lista: [o : vis]. Por esta razón, en todos los caminos la lista de vértices visitados estará invertida.En el caso de que el vértice no verifique el test de localización, se tendra que realizar una búsqueda desde a y para ello habrá que buscar desde los sucesores de <span style="color: blue">o</span> que no hayan sido ya validos; esto pude realizarse con la lista:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        (camA)  [caminoDesde o' te (o : vis) | o' <- suce o, o' != vis]
                    </code>
                </pre>
                <p class="my-4">
                    En el cual sólo se seleccionan los sucesores de <span style="color: blue">o</span> no visitados, con el objeto de evitar los ciclos; de esta forma se obtiene una lista de listas de listas. Finalmente se tendra que concatenarlas todas y se obtendra la definición final:
                </p>
                <pre class="line-numbers">
                    <code class="language-haskell">
                        caminoDesde o te vis
                            | le o   = [o : vis]
                            | otherwise = concat |caminoDesde o' te (o : vis) | o' <- suc o, o' != vis|
                    </code>
                </pre>
                <p class="my-4">
                    La evaluación perezosa de una llamada a <span style="color: blue">caminoDesde</span> realiza una visita en profundidad, ya que la llamada a la función <span style="color: blue">concat</span> evalúa el primer elemento de la lista (<span>cam A</span>), que a su vez realiza una búsqueda en profundidad a partir de un sucesor no visitado de <span style="color: blue">o</span>
                </p>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="ejemplos">
            <h4 class="color-blue">8.5 Ejemplos</h4>
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
                            <p class="card-text">Sea la siguiente estructura para representar árboles con claves en los nodos y múltiples hijos:</p>
                            <pre class="line-numbers">
                                <code class="language-haskell">
                                    data Arb c = V    -- El arbol vacio
                                                | N c | Arb c |  --nodo con clave de tipo c y lista con subárboles
                                                deriving Show
                                </code>
                            </pre>
                            <p class="card-text">Definir la función:</p>
                            <pre class="line-numbers">
                                <code class="language-haskell">
                                    reduce :: ([b] -> c -> b) -> Arb c -> b -> b
                                    reduce g a z = ...
                                    --reduce todos los elementos del árbol a a un unico elemento por aplicación
                                    --recursiva de la función de reduccion g a partir del valor inicial z
                                </code>
                            </pre>
                            <a  href="{{ route('ejemplos8', ['id'=>1]) }}" class="btn btn-amarillo">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body" style="min-height: 501px">
                            <h5 class="card-title">Ejemplo 2</h5>
                            <p class="card-text">Sea la siguiente estructura para representar árboles con claves en los nodos y múltiples hijos:</p>
                            <pre class="line-numbers">
                                <code class="language-haskell">
                                    data Arb c = V    -- El arbol vacio
                                                | N c | Arb c |  --nodo con clave de tipo c y lista con subárboles
                                                deriving Show
                                </code>
                            </pre>
                            <p class="card-text">Escribir, en función de reduce, la siguiente función</p>
                            <pre class="line-numbers">
                                <code class="language-haskell">
                                    aplica :: (c -> b) -> Arb c -> Arb b
                                    aplica f t = ...
                                    -- devuelve un árbol con la misma estructura y 
                                    -- con las imágenes mediante f de los nodos

                                    prof :: Arb c -> Int
                                    prof t = ... --la profundidad del árbol t

                                    visita :: Arb c -> [c] 
                                    visita t = ... --las claves de t para un recorrido en preorden
                                </code>
                            </pre>
                            <a  href="{{ route('ejemplos8', ['id'=>2]) }}" class="btn btn-azul">Ir al ejemplo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="practica">
            <div id="enunciado" class="px-3" style="margin-top: 10%">
                <h4 class="color-yellow">8.6 Practica</h4>
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
                        Si a cada vertice V de un digrafo se le hace corresponder dos índices: 
                        <ul class="container">
                            <li>entranEn V = Número de arcos con destino V</li>
                            <li>salenDe V = Número de arcos con origen V</li>
                        </ul>
                        se dice que un digrafo es balenceado si, para cada vértice V
                        <ul>
                            <li>entranEn v = salenDe V</li>
                        </ul>
                        Cual de los siguientes codigos comprueba si un digrafo es balanceado
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
                                            entranEn, salenDe :: a -> Grafo a -> Int
                                            entranEn v (G vs suc) = length [u | u <- vs 'elem' suc u]
                                            salenDe v (G _ suc) = length (suc v)

                                            bal :: Grafo a -> Bool
                                            bal g@(G vs _) = and [entranEn v g == salenDe v g | v <- vs]
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
                                            entranEn, salenDe :: a -> Grafo a -> Int
                                            entranEn v (G vs suc) = length [u | u <- vs 'elem' suc u]

                                            bal :: Grafo a -> Bool
                                            bal g@(G vs _) = and [entranEn v g == salenDe v g | v <- vs]
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
                                            entranEn, salenDe :: a -> Grafo a -> Int
                                            entranEn v (G vs suc) = length [u | u <- vs 'elem' suc u]
                                            salenDe v (G _ suc) = length (suc v)

                                            bal :: Grafo a -> Bool
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
                                            entranEn, salenDe :: a -> Grafo a -> Int
                                            entranEn v (G vs suc) = length [u | u <- vs 'elem' suc u]
                                            salenDe v (G _ suc) = length (suc v)

                                            bal :: Grafo a -> Bool
                                            bal g@(G vs _) = and [entranEn v g == salenDe v g | v <- vs]
                                            bal g@(G vs _) = and [entranEn v g == salenDe v g | salenDe v g <- vs]
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
                                            ¿Un árbol es una estructura no lineal acíclica utilizada para organizar información de forma eficiente?
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
                                            ¿Un árbol binario dispone de nodos, donde cada nodo debe tener minimo dos subárboles?
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
                                            ¿Un array es un contenedor que almacena una colección de datos del mismo tipo?
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
                        ¿La siguiente función comprueba si un digrafo no tiene vértices aislados?
                    </P>
                </div>

                <div class="desarrollo mb-5">
                    <div class="row mx-auto">
                        <div class="col-lg-6">
                            <h5 class="color-yellow">Código</h5>
                                <pre class="line-numbers">
                                    <code class="language-haskell">
                                        funcion :: Grafo a -> Bool
                                        funcion g@(G vs _) = 
                                            and (map(λ v -> (entranEn v g > 0) || (salenDe v g > 0)) vs)
                                    </code>
                                </pre>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-center font-weight-bold">¿Comprueba que un digrafo no tiene vértices?</h6>
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
                "respuest_correct": "option1",
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
                "respuest_correct": "option1",
                "respuest_selected": ""
            }
        }
    </script>
    <script src="{{ asset('js/moduls.js') }}"></script>
@endsection


