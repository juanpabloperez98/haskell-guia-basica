@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/moduls.css') }}">
@endsection

@section('content')

    {{-- Left Content --}}
    <aside class="bg-light">
        <h4 class="color-blue">Definición de tipos</h4>
        <ul>
            <li><a href="#" data-name="introalgrebraico" class="item active">4.1 Introducción a los tipos de datos algebraicos</a></li>
            <li><a href="#" data-name="registro" class="item">4.2 Sintaxis de registro</a></li>
            <li><a href="#" data-name="paramtype" class="item">4.3 Parámetros de tipo</a></li>
            <li><a href="#" data-name="pasoapaso1" class="item">4.4 Clases de tipos paso a paso 1</a></li>
            <li><a href="#" data-name="derivadas" class="item">4.5 Instancias derivadas</a></li>
            <li><a href="#" data-name="pasoapaso2" class="item">4.6 Clases de tipos paso a paso 2</a></li>
            <li><a href="#" data-name="yesno" class="item">4.7 La clase de tipos Yes-No</a></li>
            <li><a href="#" data-name="ejemplos" class="item">4.8 Ejemplos</a></li>
            <li><a href="#" data-name="practica" class="item">4.9 Practica</a></li>
        </ul>
    </aside>
    <div class="row section-info-moduls">
        <div class="col-lg-12 mx-auto px-3 pt-5" style="min-height: 100vh" id="introalgrebraico">            
            <h4 class="color-yellow">4.1 Introducción a los tipos de datos algebraicos</h4>
            <p class="my-4">
                Hasta ahora hemos jugado con muchos tipos: Bool, Int, Char, Maybe, etc. Pero ¿Cómo los creamos? Bueno, una forma es usar la palabra clave data para definir un tipo. Vamos a ver como está definido el tipo Bool en la librería estándar:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Bool = False | True
                </code>
            </pre>
            <p class="my-4">
                data significa que vamos a definir un nuevo tipo de dato. La parte a la izquierda del = denota el tipo, que es Bool. La parte a la derecha son los constructores de datos. Estos especifican los diferentes valores que puede tener un tipo. El | se puede leer como una o. Así que lo podemos leer como: El tipo Bool puede tener un valor True o False. Tanto el nombre del tipo como el de los constructores de datos deben tener la primera letra en mayúsculas. <br>
                De la misma forma podemos pensar que el tipo Int está definido como:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Int = -2147483648 | -2147483647 | ... | -1 | 0 | 1 | 2 | ... | 2147483647
                </code>
            </pre>
            <p class="my-4">
                El primer y el último constructor de datos son el mínimo y el máximo valor posible del tipo Int. En realidad no está definido así, los tres puntos están ahí porque hemos omitido una buena cantidad de números, así que esto es solo para motivos ilustrativos. <br>
                Ahora vamos a pensar en como definiríamos una figura en Haskell. Una forma sería usar tuplas. Un círculo podría ser (43.1, 55.0, 10.4) donde el primer y el segundo campo son las coordenadas del centro del círculo mientras que el tercer campo sería el radio. Suena bien, pero esto nos permitiría también definir un vector 3D o cualquier otra cosa. Una solución mejor sería crear nuestro propio tipo que represente una figura. Digamos que una figura solo puede ser un círculo o un rectángulo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Shape = Circle Float Float Float | Rectangle Float Float Float Float
                </code>
            </pre>
            <p class="my-4">
                ¿Qué es esto? Piensa un poco a que se parece. El constructor de datos` Circle tiene tres campos que toman valores en coma flotante. Cuando creamos un constructor de datos, opcionalmente podemos añadir tipos después de él de forma que estos serán los valores que contenga. Aquí, los primeros dos componentes son las coordenadas del centro, mientras que el tercero es el radio. El constructor de datos Rectangle tiene cuatro campos que aceptan valores en coma flotante. Los dos primeros representan las coordenadas de la esquina superior izquierda y los otros dos las coordenadas de la inferior derecha. <br>
                Ahora, cuando hablamos de campos, en realidad estamos hablando de parámetros. Los constructores de datos son en realidad funciones que devuelven un valor del tipo para el que fueron definidos. Vamos a ver la declaración de tipo de estos dos constructores de datos.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    :t Circle
                    :t Rectangle
                </code>
            </pre>
            <div class="desactivate" id="result-code1">
                <pre>
                    <code class="language-haskell">
                        Circle :: Float -> Float -> Float -> Shape
                        Rectangle :: Float -> Float -> Float -> Float -> Shape
                    </code>
                </pre>
            </div>
            <a href="#" data-close="1" id="probar1" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn1" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Bien, los constructores de datos son funciones como todo lo demás ¿Quíen lo hubiera pensado? Vamos a hacer una función que tome una figura y devuleva su superficie o área:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    surface :: Shape -> Float
                    surface (Circle _ _ r) = pi * r ^ 2
                    surface (Rectangle x1 y1 x2 y2) = (abs $ x2 - x1) * (abs $ y2 - y1)
                </code>
            </pre>
            <p class="my-4">
                La primera cosa destacable aquí es la declaración de tipo. Dice que toma una figura y devuelve un valor en coma flotante. No podemos escribir una declaración de tipo como Circle -> Float ya que Circle no es un tipo, Shape si lo es. Del mismo modo no podemos declarar una función cuya declaración de tipo sea True -> Int. La siguiente cosa que podemos destacar es que podemos usar el ajuste de patrones con los constructores. Ya hemos utilizado el ajuste de patrones con constructores anteriormente (en realidad todo el tiempo) cuando ajustamos valores como [], False, 5, solo que esos valores no tienen campos. Simplemente escribimos el constructor y luego ligamos sus campos a nombres. Como estamos interesados en el radio, realmente no nos importan los dos primeros valores que nos dicen donde está el círculo.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    surface $ Circle 10 20 10
                    surface $ Rectangle 0 0 100 100
                </code>
            </pre>
            <div class="desactivate" id="result-code2">
                <pre>
                    <code class="language-haskell">
                        314.15927
                        10000.0
                    </code>
                </pre>
            </div>
            <a href="#" data-close="2" id="probar2" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn2" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Bien ¡Funciona! Pero si intentamos mostrar por pantalla Circle 10 20 5 en una sesión por consola obtendremos un error. Esto sucede porque Haskell aún no sabe como representar nuestro tipo con una cadena. Recuerda que cuando intentamos mostrar un valor por pantalla, primero Haskell ejecuta la función show para obtener la representación en texto de un dato y luego lo muestra en la terminal. Para hacer que nuestro tipo Shape forme parte de la clase de tipo Show hacemos esto:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Shape = Circle Float Float Float | Rectangle Float Float Float Float deriving (Show)
                </code>
            </pre>
            <p class="my-4">
                No vamos a preocuparnos ahora mismo acerca de derivar. Simplemente diremos que si añadimos deriving (Show) al final de una declaración de tipo, automáticamente Haskell hace que ese tipo forme parte de la clase de tipos Show. Así que ahora ya podemos hacer esto:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Circle 10 20 5
                    Rectangle 50 230 60 90
                </code>
            </pre>
            <div class="desactivate" id="result-code3">
                <pre>
                    <code class="language-haskell">
                        Circle 10.0 20.0 5.0
                        Rectangle 50.0 230.0 60.0 90.0
                    </code>
                </pre>
            </div>
            <a href="#" data-close="3" id="probar3" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn3" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Los constructores de datos son funciones, así que podemos mapearlos, aplicarlos parcialmente o cualquier otra cosa. Si queremos una lista de círculos concéntricos con diferente radio podemos escribir esto:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    map (Circle 10 20) [4,5,6,6]
                </code>
            </pre>
            <div class="desactivate" id="result-code4">
                <pre>
                    <code class="language-haskell">
                        [Circle 10.0 20.0 4.0,Circle 10.0 20.0 5.0,Circle 10.0 20.0 6.0,Circle 10.0 20.0 6.0]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="4" id="probar4" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn4" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Nuestro tipo de dato es bueno, pero podría se mejor. Vamos a crear un tipo de dato intermedio que defina un punto en espacio bidimensional. Luego lo usaremos para hacer nuestro tipo más evidente.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Point = Point Float Float deriving (Show)
                    data Shape = Circle Point Float | Rectangle Point Point deriving (Show)
                </code>
            </pre>
            <p class="my-4">
                Te habrás dado cuenta de que hemos usado el mismo nombre para el tipo que para el constructor de datos. No tiene nada de especial, es algo común usar el mismo nombre que el del tipo si solo hay un constructor de datos. Así que ahora Circle tiene dos campos, uno es el del tipo Point y el otro del tipo Float. De esta forma es más fácil entender que es cada cosa. Lo mismo sucede para el rectángulo. Tenemos que modificar nuestra función surface para que refleje estos cambios.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    surface :: Shape -> Float
                    surface (Circle _ r) = pi * r ^ 2
                    surface (Rectangle (Point x1 y1) (Point x2 y2)) = (abs $ x2 - x1) * (abs $ y2 - y1)
                </code>
            </pre>
            <p class="my-4">
                Lo único que hemos cambiado han sido los patrones. Hemos descartado completamente el punto en el patrón del círculo. Por otra parte, en el patrón del rectángulo, simplemente hemos usado un ajuste de patrones anidado para obtener las coordenadas de los puntos. Si hubiésemos querido hacer una referencia directamente a los puntos por cualquier motivo podríamos haber utilizado un patrón como.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    surface (Rectangle (Point 0 0) (Point 100 100))
                    surface (Circle (Point 0 0) 24)
                </code>
            </pre>
            <div class="desactivate" id="result-code5">
                <pre>
                    <code class="language-haskell">
                        10000.0
                        1809.5574
                    </code>
                </pre>
            </div>
            <a href="#" data-close="5" id="probar5" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn5" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                ¿Cómo sería una función que desplaza una figura? Tomaría una figura, la cantidad que se debe desplazar en el eje x, la cantidad que se debe desplazar en el eje y y devolvería una nueva figura con las mismas dimensiones pero desplazada.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    nudge :: Shape -> Float -> Float -> Shape
                    nudge (Circle (Point x y) r) a b = Circle (Point (x+a) (y+b)) r
                    nudge (Rectangle (Point x1 y1) (Point x2 y2)) a b = Rectangle (Point (x1+a) (y1+b)) (Point (x2+a) (y2+b))
                </code>
            </pre>
            <p class="my-4">
                Bastante sencillo. Añadimos las cantidades a desplazar a los puntos que representan la posición de las figuras.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    nudge (Circle (Point 34 34) 10) 5 10
                </code>
            </pre>
            <div class="desactivate" id="result-code6">
                <pre>
                    <code class="language-haskell">
                        Circle (Point 39.0 44.0) 10.0
                    </code>
                </pre>
            </div>
            <a href="#" data-close="6" id="probar6" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn6" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Si no queremos trabajar directamente con puntos, podemos crear funciones auxiliares que creen figuras de algún tamaño en el centro del eje de coordenadas de modo que luego las podamos desplazar.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    baseCircle :: Float -> Shape
                    baseCircle r = Circle (Point 0 0) r

                    baseRect :: Float -> Float -> Shape
                    baseRect width height = Rectangle (Point 0 0) (Point width height)

                    nudge (baseRect 40 100) 60 23
                </code>
            </pre>
            <div class="desactivate" id="result-code7">
                <pre>
                    <code class="language-haskell">
                        Rectangle (Point 60.0 23.0) (Point 100.0 123.0)
                    </code>
                </pre>
            </div>
            <a href="#" data-close="7" id="probar7" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn7" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Como es lógico, podemos exportar nuestros datos en los módulos. Para hacerlo, solo tenemos que escribir el nombre del tipo juntos a las funciones exportadas, y luego añadirles unos paréntesis que contengan los constructores de datos que queramos que se exporten, separados por comas. Si queremos que se exporten todos los constructores de datos para un cierto tipo podemos usar <br>
                Si quisiéramos exportar las funciones y tipos que acabamos de crear en un módulo, podríamos empezar con esto:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    module Shapes
                    ( Point(..)
                    , Shape(..)
                    , surface
                    , nudge
                    , baseCircle
                    , baseRect
                    ) where
                </code>
            </pre>
            <p class="my-4">
                Haciendo Shape (..) estamos exportando todos los constructores de datos de Shape, lo que significa que cualquiera que importe nuestro módulo puede crear figuras usando los constructores Circle y Rectangle. Sería lo mismo que escribir Shape (Rectangle, Circle). <br>
                También podríamos optar por no exportar ningún constructor de datos para Shape simplemente escribiendo Shape en dicha sentencia. De esta forma, quien importe nuestro módulo solo podrá crear figuras utilizando las funciones auxiliares baseCircle y baseRect. Data.Map utiliza este método. No puedes crear un diccionario utilizando Map.Map [(1,2),(3,4)] ya que no se exporta el constructor de datos. Sin embargo, podemos crear un diccionario utilizando funciones auxiliares como Map.fromList. Recuerda, los constructores de datos son simples funciones que toman los campos del tipo como parámetros y devuelven un valor de un cierto tipo (como Shape) como resultado. Así que cuando elegimos no exportarlos, estamos previniendo que la gente que importa nuestro módulo pueda utilizar esas funciones, pero si alguna otra función devuelve devuelve el tipo que estamos exportando, las podemos utilizar para crear nuestros propios valores de ese tipo. <br>
                No exportar los constructores de datos de un tipo de dato lo hace más abstracto en el sentido de que oculta su implementación. Sin embargo, los usuarios del módulo no podrán usar el ajuste de patrones sobre ese tipo.
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="registro">
            <h4 class="color-blue">4.2 Sintaxis de registro</h4>
            <p class="my-4">
                Bien, se nos ha dado la tarea de crear un tipo que describa a una persona. La información que queremos almacenar de cada persona es: nombre, apellidos, edad, altura, número de teléfono y el sabor de su helado favorito. No se nada acerca de ti, pero para mi es todo lo que necesito saber de una persona. ¡Vamos allá!
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Person = Person String String Int Float String String deriving (Show)
                </code>
            </pre>
            <p class="my-4">
                Vale. El primer campo es el nombre, el segundo el apellido, el tercero su edad y seguimos contando. Vamos a crear una persona.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    let guy = Person "Buddy" "Finklestein" 43 184.2 "526-2928" "Chocolate"
                    guy
                </code>
            </pre>
            <div class="desactivate" id="result-code8">
                <pre>
                    <code class="language-haskell">
                        Person "Buddy" "Finklestein" 43 184.2 "526-2928" "Chocolate"
                    </code>
                </pre>
            </div>
            <a href="#" data-close="8" id="probar8" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn8" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Parece interesante, pero desde luego no muy legible ¿Y si queremos crear una función que obtenga información por separado de una persona? Una función que obtenga el nombre de una persona, otra función que obtenga el apellido, etc. Bueno, las tendríamos que definir así:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    firstName :: Person -> String
                    firstName (Person firstname _ _ _ _ _) = firstname

                    lastName :: Person -> String
                    lastName (Person _ lastname _ _ _ _) = lastname

                    age :: Person -> Int
                    age (Person _ _ age _ _ _) = age

                    height :: Person -> Float
                    height (Person _ _ _ height _ _) = height

                    phoneNumber :: Person -> String
                    phoneNumber (Person _ _ _ _ number _) = number

                    flavor :: Person -> String
                    flavor (Person _ _ _ _ _ flavor) = flavor

                    let guy = Person "Buddy" "Finklestein" 43 184.2 "526-2928" "Chocolate"

                    firstName guy
                    height guy
                    flavor guy
                </code>
            </pre>
            <div class="desactivate" id="result-code9">
                <pre>
                    <code class="language-haskell">
                        "Buddy"
                        184.2
                        "Chocolate"
                    </code>
                </pre>
            </div>
            <a href="#" data-close="9" id="probar9" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn9" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Los creadores de Haskell fueron muy inteligentes y anticiparon este escenario. Incluyeron un método alternativo de definir tipos de dato. Así es como podríamos conseguir la misma funcionalidad con la sintaxis de registro.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Person = Person { firstName :: String
                        , lastName :: String
                        , age :: Int
                        , height :: Float
                        , phoneNumber :: String
                        , flavor :: String
                        } deriving (Show)
                </code>
            </pre>
            <p class="my-4">
                En lugar de nombrar los campos uno tras otro separados por espacios, utilizamos un par de llaves. Dentro, primero escribimos el nombre de un campo, por ejemplo firstName y luego escribimos unos dobles puntos :: (también conocido como Paamayim Nekudotayim xD) y luego especificamos el tipo. El tipo de dato resultante es exactamente el mismo. La principal diferencia es que de esta forma se crean funciones que obtienen esos campos del tipo de dato. Al usar la sintaxis de registro con este tipo de dato, Haskell automáticamente crea estas funciones: firstName, lastName, age, height, phoneNumber y flavor.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    :t flavor
                    :t firstName
                </code>
            </pre>
            <div class="desactivate" id="result-code10">
                <pre>
                    <code class="language-haskell">
                        flavor :: Person -> String
                        firstName :: Person -> String
                    </code>
                </pre>
            </div>
            <a href="#" data-close="10" id="probar10" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn10" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Hay otro beneficio cuando utilizamos la sintaxis de registro. Cuando derivamos Show para un tipo, mostrará los datos de forma diferente si utilizamos la sintaxis de registro para definir e instanciar el tipo. Supongamos que tenemos un tipo que representa un coche. Queremos mantener un registro de la compañía que lo hizo, el nombre del modelo y su años de producción.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Car = Car String String Int deriving (Show)
                    Car "Ford" "Mustang" 1967
                </code>
            </pre>
            <div class="desactivate" id="result-code11">
                <pre>
                    <code class="language-haskell">
                        Car "Ford" "Mustang" 1967
                    </code>
                </pre>
            </div>
            <a href="#" data-close="11" id="probar11" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn11" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Si lo definimos usando la sintaxis de registro, podemos crear un coche nuevo de esta forma:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Car = Car {company :: String, model :: String, year :: Int} deriving (Show)
                    Car {company="Ford", model="Mustang", year=1967}
                </code>
            </pre>
            <div class="desactivate" id="result-code12">
                <pre>
                    <code class="language-haskell">
                        Car {company = "Ford", model = "Mustang", year = 1967}
                    </code>
                </pre>
            </div>
            <a href="#" data-close="12" id="probar12" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn12" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Cuando creamos un coche nuevo, no hace falta poner los campos en el orden adecuado mientras que los pongamos todos. Pero si no usamos la sintaxis de registro debemos especificarlos en su orden correcto. <br>
                Utiliza la sintaxis de registro cuando un constructor tenga varios campos y no sea obvio que campo es cada uno. Si definimos el tipo de un vector 3D como data Vector = Vector Int Int Int, es bastante obvio que esos campos son las componentes del vector. Sin embargo, en nuestros tipo Person y Car, no es tan obvio y nos beneficia mucho el uso de esta sintaxis.
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="paramtype">
            <h4 class="color-yellow">4.3 Parámetros de tipo</h4>
            <p class="my-4">
                Un constructor de datos puede tomar algunos valores como parámetros y producir un nuevo valor. Por ejemplo, el constructor Car toma tres valores y produce un valor del tipo coche. De forma similar, un constructor de tipos puede tomar tipos como parámetros y producir nuevos tipos. Esto puede parecer un poco recursivo al principio, pero no es nada complicado. Si has utilizado las plantillas de C++ te será familiar. Para obtener una imagen clara de como los parámetros de tipo funcionan en realidad, vamos a ver un ejemplo de como un tipo que ya conocemos es implementado.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Maybe a = Nothing | Just a
                </code>
            </pre>
            <p class="my-4">
                La a es un parámetro de tipo. Debido a que hay un parámetro de tipo involucrado en esta definición, llamamos a Maybe un constructor de tipos. Dependiendo de lo que queramos que este tipo contenga cuando un valor no es Nothing, este tipo puede acabar produciendo tipos como Maybe Int, Maybe Car, Maybe String, etc. Ningún valor puede tener un tipo que sea simplemente Maybe, ya que eso no es un tipo por si mismo, es un constructor de tipos. Para que sea un tipo real que algún valor pueda tener, tiene que tener todos los parámetros de tipo definidos.
                <br>
                Si pasamos Char como parámetro de tipo a Maybe, obtendremos el tipo Maybe Char. Por ejemplo, el valor Just 'a' tiene el tipo Maybe Char.
                <br>
                Puede que no lo sepas, pero utilizamos un tipo que tenía un parámetro de tipo antes de que empezáramos a utilizar el tipo Maybe. Ese tipo es el tipo lista. Aunque hay un poco decoración sintáctica, el tipo lista toma un parámetro para producir un tipo concreto. Los valores pueden tener un tipo [Int], un tipo [Char], [[String]], etc. pero no puede haber un valor cuyo tipo sea simplemente [].
                <br>
                Miremos el tipo Maybe.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Just "Haha"
                    Just 84
                    :t Just "Haha"
                    :t Just 84
                    :t Nothing
                    Just 10 :: Maybe Double
                </code>
            </pre>
            <div class="desactivate" id="result-code13">
                <pre>
                    <code class="language-haskell">
                        Just "Haha"
                        Just 84
                        Just "Haha" :: Maybe [Char]
                        Just 84 :: (Num t) => Maybe t
                        Nothing :: Maybe a
                        Just 10.0
                    </code>
                </pre>
            </div>
            <a href="#" data-close="13" id="probar13" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn13" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Los parámetros de tipo son útiles ya que nos permiten crear diferentes tipos dependiendo del tipo que queramos almacenar en nuestros tipos de datos (valga la redundancia). Cuando hacemos :t Just "Haha" el motor de inferencia de tipos deduce que el tipo debe ser Maybe [Char], ya que la a en Just a es una cadena, luego el a en Maybe a debe ser también una cadena. <br>
                Como habrás visto el tipo de Nothing es Maybe a. Su tipo es polimórfico. Si una función requiere un Maybe Int como parámetro le podemos pasar un Nothing ya que no contiene ningún valor. El tipo Maybe a puede comportarse como un Maybe Int, de la misma forma que 5 puede comportarse como un Int o como un Double. De forma similar el tipo de las listas vacías es [a]. Una lista vacía puede comportarse como cualquier otra lista. Por eso podemos hacer cosas como [1,2,3] ++ [] y ["ha","ha","ha"] ++ []. <br>
                El uso de parámetros de tipo nos puede beneficiar, pero solo en los casos que tenga sentido. Normalmente los utilizamos cuando nuestro tipo de dato funcionará igual sin importar el tipo de dato que contenga, justo como nuestro Maybe a. Si nuestro tipo es como una especie de caja, es un buen lugar para usar los parámetros de tipo. Podríamos cambiar nuestro tipo Car de:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Car = Car { company :: String
                        , model :: String
                        , year :: Int
                        } deriving (Show)
                </code>
            </pre>
            <p class="my-4">
                A:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Car a b c = Car { company :: a
                        , model :: b
                        , year :: c
                        } deriving (Show)
                </code>
            </pre>
            <p class="my-4">
                Pero ¿Tiene algún beneficio? La respuesta es: probablemente no, ya que al final acabaremos escribiendo funciones que solo funcionen con el tipo Car String String Int. Por ejemplo, dada la primera definición de Car, podríamos crear una función que mostrara las propiedades de un coche con un pequeño texto:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    tellCar :: Car -> String
                    tellCar (Car {company = c, model = m, year = y}) = "This " ++ c ++ " " ++ m ++ " was made in " ++ show y

                    let stang = Car {company="Ford", model="Mustang", year=1967}
                    tellCar stang
                </code>
            </pre>
            <div class="desactivate" id="result-code14">
                <pre>
                    <code class="language-haskell">
                        "This Ford Mustang was made in 1967"
                    </code>
                </pre>
            </div>
            <a href="#" data-close="14" id="probar14" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn14" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                La declaración de tipo es simple y funciona perfectamente. Ahora ¿Cómo sería si Car fuera en realidad Car a b c?
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    tellCar :: (Show a) => Car String String a -> String
                    tellCar (Car {company = c, model = m, year = y}) = "This " ++ c ++ " " ++ m ++ " was made in " ++ show y
                </code>
            </pre>
            <p class="my-4">
                Tenemos que forzar a que la función tome un Car del tipo (Show a) => Car String String a. Podemos ver como la definición de tipo es mucho más complicada y el único beneficio que hemos obtenido es que podamos usar cualquier tipo que sea una instancia de la clase de tipos Show como parámetro c.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    tellCar (Car "Ford" "Mustang" 1967)
                    tellCar (Car "Ford" "Mustang" "nineteen sixty seven")
                    :t Car "Ford" "Mustang" 1967
                    :t Car "Ford" "Mustang" "nineteen sixty seven"
                </code>
            </pre>
            <div class="desactivate" id="result-code15">
                <pre>
                    <code class="language-haskell">
                        "This Ford Mustang was made in 1967"
                        "This Ford Mustang was made in \"nineteen sixty seven\""
                        Car "Ford" "Mustang" 1967 :: (Num t) => Car [Char] [Char] t
                        Car "Ford" "Mustang" "nineteen sixty seven" :: Car [Char] [Char] [Char]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="15" id="probar15" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn15" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                A la hora de la verdad, acabaríamos utilizando Car String String Int la mayor parte del tiempo y nos daríamos cuenta de que parametrizar el tipo Car realmente no importa. Normalmente utilizamos los parámetros de tipo cuando el tipo que está contenido dentro del tipo de dato no es realmente importante a la hora de trabajar con éste. Una lista de cosas es una lista de cosas y no importa que sean esas cosas, funcionará igual. Si queremos sumar una lista de números, mas tarde podemos especificar en la propia función de suma de que queremos específicamente una lista de números. Lo mismo pasa con Maybe. Maybe representa la opción de tener o no tener un valor. Realmente no importa de que tipo sea ese valor. <br>
                Otro ejemplo de un tipo parametrizado que ya conocemos es el tipo Map k v de Data.Map. k es el tipo para las claves del diccionario mientras que v es el tipo de los valores. Este es un buen ejemplo en donde los parámetros de tipo son útiles. Al tener los diccionarios parametrizados nos permiten asociar cualquier tipo con cualquier otro tipo, siempre que la clave del tipo sea de la clase de tipos Ord. Si estuviéramos definiendo el tipo diccionario podríamos añadir una restricción de clase en la definición:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data (Ord k) => Map k v = ...
                </code>
            </pre>
            <p class="my-4">
                Sin embargo, existe un consenso en el mundo Haskell de que nunca debemos añadir restricciones de clase a las definiciones de tipo. ¿Por qué? Bueno, porque no nos beneficia mucho, pero al final acabamos escribiendo más restricciones de clase, incluso aunque no las necesitemos. Si ponemos o no podemos la restricción de clase Ord k en la definición de tipo de Map k v, tendremos que poner de todas formas la restricción de clase en las funciones que asuman que las claves son ordenables. Pero si no ponemos la restricción en la definición de tipo, no tenemos que poner (Ord k) => en la declaración de tipo de las funciones que no les importe si la clave puede es ordenable o no. Un ejemplo de esto sería la función toList que simplemente convierte un diccionario en una lista de asociación. Su declaración de tipo es toList :: Map k a -> [(k, a)]. Si Map k v tuviera una restricción en su declaración, el tipo de toList debería haber sido toList :: (Ord k) => Map k a -> [(k, a)] aunque la función no necesite comparar ninguna clave. <br>
                Así que no pongas restricciones de clase en las declaraciones de tipos aunque tenga sentido, ya que al final las vas a tener que poner de todas formas en las declaraciones de tipo de las funciones. <br>
                Vamos a implementar un tipo para vectores 3D y crear algunas operaciones con ellos. Vamos a usar un tipo parametrizado ya que, aunque normalmente contendrá números, queremos que soporte varios tipos de ellos.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Vector a = Vector a a a deriving (Show)

                    vplus :: (Num t) => Vector t -> Vector t -> Vector t
                    (Vector i j k) `vplus` (Vector l m n) = Vector (i+l) (j+m) (k+n)

                    vectMult :: (Num t) => Vector t -> t -> Vector t
                    (Vector i j k) `vectMult` m = Vector (i*m) (j*m) (k*m)

                    scalarMult :: (Num t) => Vector t -> Vector t -> t
                    (Vector i j k) `scalarMult` (Vector l m n) = i*l + j*m + k*n
                </code>
            </pre>
            <p class="my-4">
                vplus sirve para sumar dos vectores. Los vectores son sumados simplemente sumando sus correspondientes componentes. scalarMult calcula el producto escalar de dos vectores y vectMult calcula el producto de un vector y un escalar. Estas funciones pueden operar con tipos como Vector Int, Vector Integer, Vector Float o cualquier otra cosa mientras a de Vector a sea miembro de clase de tipos Num. También, si miras la declaración de tipo de estas funciones, veras que solo pueden operar con vectores del mismo tipo y los números involucrados (como en vectMult) también deben ser del mismo tipo que el que contengan los vectores. Fíjate en que no hemos puesto una restricción de clase Num en la declaración del tipo Vector, ya que deberíamos haberlo repetido también en las declaraciones de las funciones. <br>
                Una vez más, es muy importante distinguir entre constructores de datos y constructores de tipo. Cuando declaramos un tipo de dato, la parte anterior al = es el constructor de tipos, mientras que la parte que va después (posiblemente separado por |) son los constructores de datos. Dar a una función el tipo Vector t t t -> Vector t t t -> t sería incorrecto ya que hemos usado tipos en la declaración y el constructor de tipos vector toma un solo parámetro, mientras que el constructor de datos toma tres. Vamos a jugar un poco con los vectores:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Vector 3 5 8 `vplus` Vector 9 2 8
                    Vector 3 5 8 `vplus` Vector 9 2 8 `vplus` Vector 0 2 3
                    Vector 3 9 7 `vectMult` 10
                    Vector 4 9 5 `scalarMult` Vector 9.0 2.0 4.0
                    Vector 2 9 3 `vectMult` (Vector 4 9 5 `scalarMult` Vector 9 2 4)
                </code>
            </pre>
            <div class="desactivate" id="result-code16">
                <pre>
                    <code class="language-haskell">
                        Vector 12 7 16
                        Vector 12 9 19
                        Vector 30 90 70
                        74.0
                        Vector 148 666 222
                    </code>
                </pre>
            </div>
            <a href="#" data-close="16" id="probar16" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn16" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="pasoapaso1">
            <h4 class="color-blue">4.4 Clases de tipos paso a paso 1</h4>
            <p class="my-4">
                Las clases de tipos son una especie de interfaz que define algún tipo de comportamiento. Si un tipo es miembro de una clase de tipos, significa que ese tipo soporta e implementa el comportamiento que define la clase de tipos. La gente que viene de lenguajes orientados a objetos es propensa a confundir las clases de tipos porque piensan que son como las clases en los lenguajes orientados a objetos. Bien, pues no lo son. Una aproximación más adecuada sería pensar que son como las interfaces de Java, o los protocolos de Objective-C, pero mejor. <br>
                ¿Cuál es la declaración de tipo de la función ==?
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    :t (==)
                </code>
            </pre>
            <div class="desactivate" id="result-code17">
                <pre>
                    <code class="language-haskell">
                        (==) :: (Eq a) => a -> a -> Bool
                    </code>
                </pre>
            </div>
            <a href="#" data-close="17" id="probar17" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn17" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                <span style="color: #fdba36">Nota</span>: El operador de igualdad == es una función. También lo son +, -, *, / y casi todos los operadores. Si el nombre de una función está compuesta solo por caracteres especiales (no alfanuméricos), es considerada una función infija por defecto. Si queremos examinar su tipo, pasarla a otra función o llamarla en forma prefija debemos rodearla con paréntesis. Por ejemplo: (+) 1 4 equivale a 1 + 4. <br>
                Interesante. Aquí vemos algo nuevo, el símbolo =>. Cualquier cosa antes del símbolo => es una restricción de clase. Podemos leer la declaración de tipo anterior como: la función de igualdad toma dos parámetros que son del mismo tipo y devuelve un Bool. El tipo de estos dos parámetros debe ser miembro de la clase Eq (esto es la restricción de clase). <br>
                La clase de tipos Eq proporciona una interfaz para las comparaciones de igualdad. Cualquier tipo que tenga sentido comparar dos valores de ese tipo por igualdad debe ser miembro de la clase Eq. Todos los tipos estándar de Haskell excepto el tipo IO (un tipo para manejar la entrada/salida) y las funciones forman parte de la clase Eq.<br>
                La función elem tiene el tipo (Eq a) => a -> [a] -> Bool porque usa == sobre los elementos de la lista para saber si existe el elemento indicado dentro de la lista. <br>
                Algunas clases de tipos básicas son:
                <ul class="container">
                    <li>Eq es utilizada por los tipos que soportan comparaciones por igualdad. Los miembros de esta clase implementan las funciones == o /= en algún lugar de su definición. Todos los tipos que mencionamos anteriormente forman parte de la clase Eq exceptuando las funciones, así que podemos realizar comparaciones de igualdad sobre ellos.</li>
                    <li>Ord es para tipos que poseen algún orden.</li>
                    <li>Los miembros de Show pueden ser representados por cadenas. Todos los tipos que hemos visto excepto las funciones forman parte de Show. la función más utilizada que trabaja con esta clase de tipos es la función show. Toma un valor de un tipo que pertenezca a la clase Show y lo representa como una cadena de texto.</li>
                    <li>Read es como la clase de tipos opuesta a Show. La función read toma una cadena y devuelve un valor del tipo que es miembro de Read.</li>
                    <li>Los miembros de la clase Enum son tipos secuencialmente ordenados, es decir, pueden ser enumerados. La principal ventaja de la clase de tipos Enum es que podemos usar los miembros en las listas aritméticas. También tienen definidos los sucesores y predecesores, por lo que podemos usar las funciones succ y pred. Los tipos de esta clase son: (), Bool, Char, Ordering, Int, Integer, Float y Double.</li>
                    <li>Los miembros de Bounded poseen límites inferiores y superiores, es decir están acotados.</li>
                    <li>Num es la clase de tipos numéricos. Sus miembros tienen la propiedad de poder comportarse como números. Vamos a examinar el tipo de un número.</li>
                    <li>Integral es también un clase de tipos numérica. Num incluye todos los números, incluyendo números reales y enteros. Integral únicamente incluye números enteros. Int e Integer son miembros de esta clase</li>
                    <li>Floating incluye únicamente números en coma flotante, es decir Float y Double.</li>
                </ul>
                Una función muy útil para trabajar con números es fromIntegral. Tiene el tipo fromIntegral :: (Num b, Integral a) => a -> b. A partir de esta declaración podemos decir que toma un número entero y lo convierte en un número más general. Esto es útil cuando estas trabajando con números reales y enteros al mismo tiempo. Por ejemplo, la función length tiene el tipo length :: [a] -> Int en vez de tener un tipo más general como (Num b) => length :: [a] -> b. Creo que es por razones históricas o algo parecido, en mi opinión, es absurdo. De cualquier modo, si queremos obtener el tamaño de una lista y sumarle 3.2, obtendremos un error al intentar sumar un entero con uno en coma flotante. Para solucionar esto, hacemos fromIntegral (length [1,2,3,4]) + 3.2.
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="derivadas">
            <h4 class="color-yellow">4.5 Instancias derivadas</h4>
            <p class="my-4">
                En la sección anterior, explicamos las bases de las clases de tipo. Dijimos que una clase de tipos es una especie de interfaz que define un comportamiento. Un tipo puede ser una instancia de esa clase si soporta ese comportamiento. Ejemplo: El tipo Int es una instancia de la clase Eq, ya que la clase de tipos Eq define el comportamiento de cosas que se pueden equiparar. Y como los enteros se pueden equiparar, Int es parte de la clase Eq. La utilidad real está en las funciones que actúan como interfaz de Eq, que son == y /=. Si un tipo forma parte de la clase Eq, podemos usar las funciones como == con valores de ese tipo. Por este motivo, expresiones como 4 == 4 y "foo" /= "bar" son correctas.
                Mencionamos también que las clases de tipos suelen ser confundidas con las clases de lenguajes como Java, Python, C++ y demás, cosa que más tarde desconcierta a la gente. En estos lenguajes, las clases son como un modelo del cual podemos crear objetos que contienen un estado y pueden hacer realizar algunas acciones. Las clases de tipos son más bien como las interfaces. No creamos instancias a partir de las interfaces. En su lugar, primero creamos nuestro tipo de dato y luego pensamos como qué puede comportarse. Si puede comportarse como algo que puede ser equiparado, hacemos que sea miembro de la clase Eq. Si puede ser puesto en algún orden, hacemos que sea miembro de la clase Ord. <br>
                Más adelante veremos como podemos hacer manualmente que nuestros tipos sean una instancia de una clase de tipos implementando las funciones que esta define. Pero ahora, vamos a ver como Haskell puede automáticamente hacer que nuestros tipos pertenezcan a una de las siguientes clases: Eq, Ord, Enum, Bounded, Show y Read. Haskell puede derivar el comportamiento de nuestros tipos en estos contextos si usamos la palabra clave deriving cuando los definimos.<br>
                Considera el siguiente tipo de dato:<br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Person = Person { firstName :: String
                        , lastName :: String
                        , age :: Int
                        } deriving (Eq)
                </code>
            </pre>
            <p class="my-4">
                Cuando derivamos una instancia de Eq para un tipo y luego intentamos comparar dos valores de ese tipo usando == o /=, Haskell comprobará si los constructores de tipo coinciden (aunque aquí solo hay un constructor de tipo) y luego comprobará si todos los campos de ese constructor coinciden utilizando el operador = para cada par de campos. Solo tenemos que tener en cuenta una cosa, todos los campos del tipo deben ser también miembros de la clase de tipos Eq. Como String y Int ya son miembros, no hay ningún problema. Vamos a comprobar nuestra instancia Eq.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    let mikeD = Person {firstName = "Michael", lastName = "Diamond", age = 43}
                    let adRock = Person {firstName = "Adam", lastName = "Horovitz", age = 41}
                    let mca = Person {firstName = "Adam", lastName = "Yauch", age = 44}
                    mca == adRock
                    mikeD == adRock
                    mikeD == mikeD
                    mikeD == Person {firstName = "Michael", lastName = "Diamond", age = 43}
                </code>
            </pre>  
            <div class="desactivate" id="result-code18">
                <pre>
                    <code class="language-haskell">
                        False
                        False
                        True
                        True
                    </code>
                </pre>
            </div>
            <a href="#" data-close="18" id="probar18" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn18" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Como ahora Person forma parte de la clase Eq, podemos utilizarlo como a en las funciones que tengan una restricción de clase del tipo Eq a en su declaración, como elem.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    let beastieBoys = [mca, adRock, mikeD]
                    mikeD `elem` beastieBoys
                </code>
            </pre>  
            <div class="desactivate" id="result-code19">
                <pre>
                    <code class="language-haskell">
                        True
                    </code>
                </pre>
            </div>
            <a href="#" data-close="19" id="probar19" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn19" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Las clases de tipos Show y Read son para cosas que pueden ser convertidas a o desde cadenas, respectivamente. Como pasaba con Eq, si un constructor de tipos tiene campos, su tipo debe ser miembro de la clase` Show o Read si queremos que también forme parte de estas clases. <br>
                Vamos a hacer que nuestro tipo de dato Person forme parte también de las clases Show y Read.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Person = Person { firstName :: String
                        , lastName :: String
                        , age :: Int
                        } deriving (Eq, Show, Read)  
                </code>
            </pre>
            <p class="my-4">
                Ahora podemos mostrar una persona por la terminal.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    let mikeD = Person {firstName = "Michael", lastName = "Diamond", age = 43}
                    mikeD
                    "mikeD is: " ++ show mikeD
                </code>
            </pre>
            <p class="my-4">
                Si hubiésemos intentado mostrar en la terminal una persona antes de hacer que el tipo Person formara parte de la clase Show, Haskell se hubiera quejado, diciéndonos que no sabe como representar una persona con una cadena. Pero ahora que hemos derivado la clase Show ya sabe como hacerlo. <br>
                Read es prácticamente la clase inversa de Show. Show sirve para convertir nuestro tipo a una cadena, Read sirve para convertir una cadena a nuestro tipo. Aunque recuerda que cuando uses la función read hay que utilizar una anotación de tipo explícita para decirle a Haskell que tipo queremos como resultado. Si no ponemos el tipo que queremos como resultado explícitamente, Haskell no sabrá que tipo queremos.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    read "Person {firstName =\"Michael\", lastName =\"Diamond\", age = 43}" :: Person  
                </code>
            </pre>
            <div class="desactivate" id="result-code20">
                <pre>
                    <code class="language-haskell">
                        Person {firstName = "Michael", lastName = "Diamond", age = 43}
                    </code>
                </pre>
            </div>
            <a href="#" data-close="20" id="probar20" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn20" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                No hace falta utilizar una anotación de tipo explícita en caso de que usemos el resultado de la función read de forma que Haskell pueda inferir el tipo.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    read "Person {firstName =\"Michael\", lastName =\"Diamond\", age = 43}" == mikeD
                </code>
            </pre>
            <div class="desactivate" id="result-code21">
                <pre>
                    <code class="language-haskell">
                        True
                    </code>
                </pre>
            </div>
            <a href="#" data-close="21" id="probar21" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn21" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                También podemos leer tipos parametrizados, pero tenemos que especificar todos los parámetros del tipo. Así que no podemos hacer read "Just 't'" :: Maybe a pero si podemos hacer read "Just 't'" :: Maybe Char. <br>
                Podemos derivar instancias para la clase de tipos Ord, la cual es para tipos cuyos valores puedan ser ordenados. Si comparamos dos valores del mismo tipo que fueron definidos usando diferentes constructores, el valor cuyo constructor fuera definido primero es considerado menor que el otro. Por ejemplo, el tipo Bool puede tener valores False o True. Con el objetivo de ver como se comporta cuando es comparado, podemos pensar que está implementado de esta forma: <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Bool = False | True deriving (Ord)
                </code>
            </pre>
            <p class="my-4">
                Como el valor False está definido primero y el valor True está definido después, podemos considerar que True es mayor que False. <br>
                ghci> True compare False GT ghci> True > False True ghci> True < False False <br>
                En el tipo Maybe a, el constructor de datos Nothing esta definido antes que el constructor Just, así que un valor Nothing es siempre más pequeño que cualquier valor Just algo, incluso si ese algo es menos un billon de trillones. Pero si comparamos dos valores Just, entonces se compara lo que hay dentro de él. <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Nothing < Just 100
                    Nothing > Just (-49999)
                    Just 3 `compare` Just 2
                    Just 100 > Just 50  
                </code>
            </pre>
            <div class="desactivate" id="result-code22">
                <pre>
                    <code class="language-haskell">
                        True
                        False
                        GT
                        True
                    </code>
                </pre>
            </div>
            <a href="#" data-close="22" id="probar22" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn22" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                No podemos hacer algo como Just (*3) > Just (*2), ya que (*3) y (*2) son funciones, las cuales no tienen definida una instancia de Ord.<br>
                Podemos usar fácilmente los tipos de dato algebraicos para crear enumeraciones, y las clases de tipos Enum y Bounded nos ayudarán a ello. Considera el siguiente tipo de dato:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Day = Monday | Tuesday | Wednesday | Thursday | Friday | Saturday | Sunday
                </code>
            </pre>
            <p class="my-4">
                Como ningún contructor de datos tiene parámetros, podemos hacerlo miembro de la clase de tipos Enum. La clase Enum son para cosas que tinen un predecesor y sucesor. Tambien podemos hacerlo miembro de la clase de tipos Bounded, que es para cosas que tengan un valor mínimo posible y valor máximo posible. Ya que nos ponemos, vamos a hacer que este tipo tenga una instancia para todas las clases de tipos derivables que hemos visto y veremos que podemos hacer con él.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data Day = Monday | Tuesday | Wednesday | Thursday | Friday | Saturday | Sunday
                               deriving (Eq, Ord, Show, Read, Bounded, Enum)
                </code>
            </pre>
            <p class="my-4">
                Como es parte de las clases de tipos Show y Read, podemos convertir valores de est tipo a y desde cadenas.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Wednesday
                    show Wednesday
                    read "Saturday" :: Day
                </code>
            </pre>
            <div class="desactivate" id="result-code23">
                <pre>
                    <code class="language-haskell">
                        Wednesday
                        "Wednesday"
                        Saturday
                    </code>
                </pre>
            </div>
            <a href="#" data-close="23" id="probar23" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn23" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Como es parte de las clases de tipos Eq y Ord, podemos comparar o equiparar días.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Saturday == Sunday
                    Saturday == Saturday
                    Saturday > Friday
                    Monday `compare` Wednesday
                </code>
            </pre>
            <div class="desactivate" id="result-code24">
                <pre>
                    <code class="language-haskell">
                        False
                        True
                        True
                        LT
                    </code>
                </pre>
            </div>
            <a href="#" data-close="24" id="probar24" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn24" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                También forma parte de Bounded, así que podemos obtener el día mas bajo o el día más alto.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    minBound :: Day
                    maxBound :: Day
                </code>
            </pre>
            <p class="my-4">
                También es una instancia de la clase Enum. Podemos obtener el predecesor y el sucesor de un día e incluso podemos crear listas de rangos con ellos.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    succ Monday
                    pred Saturday
                    [Thursday .. Sunday]
                    [minBound .. maxBound] :: [Day]  
                </code>
            </pre>
            <div class="desactivate" id="result-code25">
                <pre>
                    <code class="language-haskell">
                        Tuesday
                        Friday
                        [Thursday,Friday,Saturday,Sunday]
                        [Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="25" id="probar25" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn25" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="pasoapaso2">
            <h4 class="color-blue">4.6 Clases de tipos paso a paso 2</h4>
            <p class="my-4">
                Hasta ahora hemos aprendido a utilizar algunas clases de tipos estándar de Haskell y hemos visto que tipos son miembros de ellas. También hemos aprendido a crear automáticamente instancias de nuestros tipos para las clases de tipos estándar, pidiéndole a Haskell que las derive por nostros. En esta sección vamos a ver como podemos crear nuestras propias clases de tipo y a como crear instancias de tipos para ellas a mano.<br>
                Un pequeño recordatorio acerca de las clases de tipos: las clases de tipos son como las interfaces. Una clase de tipos define un comportamiento (como comparar por igualdad, comparar por orden, una enumeración, etc.) y luego ciertos tipos pueden comportarse de forma a la instancia de esa clase de tipos. El comportamiento de una clase de tipos se consigue definiendo funciones o simplemente definiendo tipos que luego implementaremos. Así que cuando digamos que un tipo es una instancia de un clase de tipos, estamos diciendo que podemos usar las funciones de esa clase de tipos con ese tipo.<br>
                Las clases de tipos no tienen nada que ver con las clases de Java o Pyhton. Esto suele confundir a mucha gente, así que me gustaría que olvidaras ahora mismo todo lo que sabes sobre las clases en los lenguajes imperativos.<br>
                Por ejemplo, la clase de tipos Eq es para cosas que pueden ser equiparadas. Define las funciones == y /=. Si tenemos un tipo (digamos, Car) y el comparar dos coches con la función == tiene sentido, entonces tiene sentido que Car sea una instancia de Eq.<br>
                Así es como está defina la clase Eq en Haskell:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class Eq a where
                        (==) :: a -> a -> Bool
                        (/=) :: a -> a -> Bool
                        x == y = not (x /= y)
                        x /= y = not (x == y)
                </code>
            </pre>
            <p class="my-4">
                Lo primero de todo, cuando escribimos class Eq a where significa que estamos definiendo una clase de tipos nueva y que se va a llamar Eq. La a es la variable de tipo y significa que a representará el tipo que dentro de poco hagamos instancia de Eq. No tiene porque llamarse a, de hecho no tiene ni que ser de una sola letra, solo debe ser una palabra en minúsculas. Luego definimos varias funciones. No es obligatorio implementar los cuerpos de las funciones, solo debemos especificar las declaraciones de tipo de las funciones. <br>
                <span style="color: #fdba36">Nota</span>: Hay gente que entederá esto mejor si escribimos algo como class Eq equiparable where y luego definimos el tipo de las funciones como (==) :: equiparable -> equiparable -> Bool. <br>
                De todos modos, hemos implementado el cuerpo de las funciones que define Eq, solo que las hemos implementado en terminos de recursión mutua. Decimos que dos instancias de la clase Eq son iguales si no son desiguales y son desiguales y no son iguales. En realidad no teníamos porque haberlo echo, pero pronto veremos de que forma nos ayuda.
                <span style="color: #fdba36">Nota</span>: Si tenemos un class Eq a where y definimos una declaración de tipo dentro de la clase como (==) :: a -> -a -> Bool, luego, cuando examinemos el tipo de esa función obtendremos (Eq a) => a -> a -> Bool. <br>
                Así que ya tenemos una clase ¿Qué podemos hacer con ella? Bueno, no mucho. Pero una vez empezemos a declarar instancias para esa clase, empezaremos a obtener algun funcionalidad útil. Mira este tipo:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    data TrafficLight = Red | Yellow | Green
                </code>
            </pre>
            <p class="my-4">
                Define los estados de un semáforo. Fijate que no hemos derivado ninguna instancia, ya que vamos a escribirlas a mano, aunque podríamos haberlas derivado para las clases Eq y Show. Aquí tienes como creamos la instancia para la clase Eq.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class Eq a where
                        (==) :: a -> a -> Bool
                        (/=) :: a -> a -> Bool
                </code>
            </pre>
            <p class="my-4">
                Tendríamos que haber implementado ambas funciones a la hora de crear una instancia, ya que Hasekell sabría como están relacionadas esas funciones. De esta forma, la definición completa mínima serían ambas, == y /=. <br>
                Como has visto hemos implementado == usando ajuste de patrones. Como hay muchos más casos donde dos semáforos no están en el mismo estado, especificamos para cuales son iguales y luego utilizamos un patrón que se ajuste a cualquier caso que no sea ninguno de los anteriores para decir que no son iguales. <br>            
                Vamos a crear también una instancia para Show. Para satisfacer la definición completa mínima de Show, solo tenemos que implementar la función show, la cual toma un valor y lo convierte a una cadena. <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance Show TrafficLight where
                        show Red = "Red light"
                        show Yellow = "Yellow light"
                        show Green = "Green light"
                </code>
            </pre>
            <p class="my-4">
                Una vez más hemos utilizado el ajuste de patrones para conseguir nuestros objetivos. Vamos a verlo en acción:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    Red == Red
                    Red == Yellow
                    Red `elem` [Red, Yellow, Green]
                    [Red, Yellow, Green]
                </code>
            </pre>
            <div class="desactivate" id="result-code26">
                <pre>
                    <code class="language-haskell">
                        True
                        False
                        True
                        [Red light,Yellow light,Green light]
                    </code>
                </pre>
            </div>
            <a href="#" data-close="26" id="probar26" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn26" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Perfecto. Podríamos haber derivado Eq y hubiera tenido el mismo efecto. Sin embargo, derivar Show hubiera representando directamente los constructores como cadenas. Pero si queremos que las luces aparezcan como "Red light" tenemos que crear esta instancia a mano. <br>
                También podemos crear clases de tipos que sean subclases de otras clases de tipos. La declaración de la clase Num es un poco larga, pero aquí tienes el principio: <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class (Eq a) => Num a where
                        ...
                </code>
            </pre>
            <p class="my-4">
                Como ya hemos mencionado anteriormente, hay un montón de sitios donde podemos poner restriciones de clases. Esto es lo mismo que escribir class Num a where, solo que decimos que nuestro tipo a debe ser una instancia de Eq. Basicamente decimos que hay que crear la instancia Eq de un tipo antes de que éste forme parte forme parte de la clase Num. Antes de que un tipo se pueda considerar un número, tiene sentido que podamos determinar si los valores de un tipo puede sen equiparados o no. Esto es todo lo que hay que saber de las subclases ya que simplemente son restriscciones de clase dentro de la definición de una clase. Cuando definamos funciones en la declaración de una clase o en la definición de una instancia, podemos asumir que a es parte de la clase Eq así que podemos usar == con los valores de ese tipo. <br>
                ¿Pero cómo son creadas las instancias del tipo Maybe o de las listas? Lo que hace diferente a Maybe de, digamos, TrafficLight es que Maybe no es por si mismo un tipo concreto, es un constructor de tipos que toma un parámetro (como Char o cualquier otra cosa) para producir un tipo concreto. Vamos a echar un vistazo a la clase Eq de nuevo: <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class Eq a where
                        (==) :: a -> a -> Bool
                        (/=) :: a -> a -> Bool
                        x == y = not (x /= y)
                        x /= y = not (x == y)
                </code>
            </pre>
            <p class="my-4">
                A partir de la declaración de tipo, podemos observar que a es utilizado como un tipo concreto ya que todos los tipos que aparecer en una función deben deben ser concretos (Recuerda, no puedes tener una función con el tipo a -> Maybe pero si una función a -> Maybe a o Maybe Int -> Maybe String). Por este motivo no podemos hacer cosas como:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance Eq Maybe where
                        ...
                </code>
            </pre>
            <p class="my-4">
                Ya que como hemos visto, a debe ser un tipo concreto pero Maybe no lo es. Es un constructor de tipos que toma un parámetro y produce un tipo concreto. Sería algo pesado tener que escribir instance Eq (Maybe Int)` where, instance Eq (Maybe Char) where, etc. para cada tipo. Así que podemos escribirlo así:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance Eq (Maybe m) where
                        Just x == Just y = x == y
                        Nothing == Nothing = True
                        _ == _ = False
                </code>
            </pre>
            <p class="my-4">
                Esto es como decir que queremos hacer una instancia de Eq para todos los tipos Maybe algo. De hecho, podríamos haber escrito Maybe algo, pero preferimos elegir nombres con una sola letra para ser fieles al estilo de Haskell. Aquí, (Maybe m) hace el papel de a en class Eq a where. Mientras que Maybe no es un tipo concreto, Maybe m sí. Al utilizar un parámetro tipo (m, que está en minúsculas), decimos que queremos todos los tipos que sean de la forma Maybe m, donde m es cualquier tipo que forme parte de la clase Eq. <br>
                Sin embargo, hay un problema con esto ¿Puedes averiguarlo? Utilizamos == sobre los contenidos de Maybe pero nadie nos asegura de que lo que contiene Maybe forme parte de la clase Eq. Por este motivo tenemos que modificar nuestra declaración de instancia:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance (Eq m) => Eq (Maybe m) where
                        Just x == Just y = x == y
                        Nothing == Nothing = True
                        _ == _ = False
                </code>
            </pre>
            <p class="my-4">
                Hemos añadido una restricción de clase. Con esta instancia estamos diciendo: Queremos que todos los tipos con la forma Maybe m sean miembros de la clase de tipos Eq, pero solo aquellos tipos donde m (lo que está contenido dentro de Maybe) sean miembros también de Eq. En realidad así sería como Haskell derivaría esta instancia. <br>
                La mayoría de las veces, las restricciones de clase en las declaraciones de clases son utilizadas para crear una clases de tipos que sean subclases de otras clases de tipos mientras que las restricciones de clase en las declaraciones de instancias son utilizadas para expresar los requisitos de algún tipo. Por ejemplo, ahora hemos expresado que el contenido de Maybe debe formar parte de la clase de tipos Eq. <br>
                Cuando creas una instancia, si ves que un tipo es utilizado como un tipo concreto en la declaración de tipos (como a en a -> a -> Bool), debes añadir los parámetros de tipos correspondientes y rodearlo con paréntesis de forma que acabes teniendo un tipo concreto. <br>
                <span style="color: #fdba36">Nota</span>: Ten en cuenta que el tipo para el cual estás trantando de hacer una instancia remplazará el parámetro de la declaración de clase. La a de class Eq a where será remplazada con un tipo real cuando crees una instancia, así que trata mentalmente de poner el tipo en la declaración de tipo de las funiones. (==) :: Maybe -> Maybe -> Bool no tiene mucho sentido, pero (==) :: (Eq m) => Maybe m -> Maybe m -> Boo sí. Pero esto es simplemente una forma de ver las cosas, ya que == simpre tendrá el tipo (==) :: (Eq a) => a -> a -> Bool, sin importar las instancias que hagamos. <br>
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="yesno">
            <h4 class="color-yellow">4.7 La clase de tipos Yes-No</h4>
            <p class="my-4">
                En JavaScript y otros lenguajes débilmente tipados, puedes poner casi cualquier cosa dentro de una expresión. Por ejemplo, puedes hacer todo lo siguiente: if (0) alert("YEAH!") else alert("NO!"), if ("") alert ("YEAH!") else alert("NO!"), if (false) alert("YEAH") else alert("NO!), etc. Y todos estos mostrarán un mensaje diciendo NO!. Si hacemos if ("WHAT") alert ("YEAH") else alert("NO!") mostrará "YEAH!" ya que en JavaScript las cadenas no vacías son consideradas valores verdaderos. <br>
                Aunque el uso estricto de Bool para la semántica de booleanos funciona mejor en Haskell, vamos a intentar implementar este comportamiento de JavaScript ¡Solo para divertirnos! Empecemos con la declaración de clase.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    class YesNo a where
                        yesno :: a -> Bool
                </code>
            </pre>
            <p class="my-4">
                Muy simple. La clase de tipos YesNo define una función. Esta función toma un valor de un tipo cualquiera que puede expresar algún valor de verdad y nos dice si es verdadero o no. Fíjate en la forma que usamos a en la función, a tiene que ser un tipo concreto. <br>
                Lo siguiente es definir algunas instancias. Para los números, asumimos que (como en JavaScript) cualquier número que no sea 0 es verdadero y 0 es falso. <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance YesNo Int where
                        yesno 0 = False
                        yesno _ = True
                </code>
            </pre>
            <p class="my-4">
                La listas vacías (y por extensión las cadenas) son valores falsos, mientras que las listas no vacías tienen un valor verdadero.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance YesNo [a] where
                        yesno [] = False
                        yesno _ = True
                </code>
            </pre>
            <p class="my-4">
                Fíjate como hemos puesto un parámetro de tipo dentro para hacer de la lista un tipo concreto, aunque no suponemos nada acerca de lo que contiene la lista. Bool también puede contener valores verdaderos y falos y es bastante obvio cual es cual.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance YesNo Bool where
                        yesno = id
                </code>
            </pre>
            <p class="my-4">
                ¿Qué es id? Simplemente es una función de la librería estándar que toma un parámetro y devuelve lo mismo, lo cual es lo mismo que tendríamos que escribir aquí. <br>
                Vamos a hacer también una instancia para Maybe a.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance YesNo (Maybe a) where
                        yesno (Just _) = True
                        yesno Nothing = False
                </code>
            </pre>
            <p class="my-4">
                No necesitamos una restricción de clase ya que no suponemos nada acerca de los contenidos de Maybe. Simplemente decimos que es verdadero si es un valor Just y falso si es Nothing. Seguimos teniendo que escribir (Maybe a) en lugar de solo Maybe ya que, si lo piensas un poco, una función Maybe -> Bool no puede existir (ya que Maybe no es un tipo concreto), mientras que Maybe a -> Bool es correcto. Aun así, sigue siendo genial ya que ahora, cualquier tipo Maybe algo es parte de la clase` YesNo y no importa lo que sea algo. <br>
                Antes definimos un tipo Tree a para representar la búsqueda binaria. Podemos decir que un árbol vacío tiene un valor falso mientras cualquier otra cosa tiene un valor verdadero. <br>
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    instance YesNo (Tree a) where
                        yesno EmptyTree = False
                        yesno _ = True
                </code>
            </pre>
            <p class="my-4">
                Ahora tenemos unas cuantas instancias, vamos a jugar con ellas:
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    yesno $ length []
                    yesno "haha"
                    yesno ""
                    yesno $ Just 0
                    yesno True
                    :t yesno
                </code>
            </pre>
            <div class="desactivate" id="result-code27">
                <pre>
                    <code class="language-haskell">
                        False
                        True
                        False
                        True
                        True
                        yesno :: (YesNo a) => a -> Bool
                    </code>
                </pre>
            </div>
            <a href="#" data-close="27" id="probar27" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn27" class="btn-primary cerrar desactivate">Cerrar</a>
            <p class="my-4">
                Vamos a hacer una función que imite el comportamiento de una sentencia if, pero que funcione con valores YesNo.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    yesnoIf :: (YesNo y) => y -> a -> a -> a
                    yesnoIf yesnoVal yesResult noResult = if yesno yesnoVal then yesResult else noResult
                </code>
            </pre>
            <p class="my-4">
                Bastante simple. Toma un valor con un grado de verdad y otros dos valores más. Si el primer valor es verdadero, devuelve el primer valor de los otros dos, de otro modo, devuelve el segundo.
            </p>
            <pre class="line-numbers">
                <code class="language-haskell">
                    yesnoIf [] "YEAH!" "NO!"
                    yesnoIf [2,3,4] "YEAH!" "NO!"
                    yesnoIf True "YEAH!" "NO!"
                    yesnoIf (Just 500) "YEAH!" "NO!"
                    yesnoIf Nothing "YEAH!" "NO!"
                </code>
            </pre>
            <div class="desactivate" id="result-code28">
                <pre>
                    <code class="language-haskell">
                        "NO!"
                        "YEAH!"
                        "YEAH!"
                        "YEAH!"
                        "NO!"
                    </code>
                </pre>
            </div>
            <a href="#" data-close="28" id="probar28" class="btn btn-primary ejecutar">Probar</a>
            <a href="#" id="btn28" class="btn-primary cerrar desactivate">Cerrar</a>
        </div>
            
        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" style="min-height: 100vh" id="ejemplos">
            <h4 class="color-blue">4.8 Ejemplos</h4>
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
