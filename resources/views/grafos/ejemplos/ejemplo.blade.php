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
                Sea la siguiente estructura para representar árboles con claves en los nodos y múltiples hijos:
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data Arb c = V    -- El arbol vacio
                                    | N c | Arb c |  --nodo con clave de tipo c y lista con subárboles
                                    deriving Show
                    </code>
                </pre>
                Definir la función:
                <pre class="line-numbers">
                    <code class="language-haskell">
                        reduce :: ([b] -> c -> b) -> Arb c -> b -> b
                        reduce g a z = ...
                        --reduce todos los elementos del árbol a a un unico elemento por aplicación
                        --recursiva de la función de reduccion g a partir del valor inicial z
                    </code>
                </pre>
            </p>
            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            reduce :: ([b] -> c -> b) -> Arb c -> b -> b
                            reduce f V   z = z
                            reduce f (N c ds) z = f[reduce f d z | d <- ds] c
                        </code>
                    </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro1">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="botones">
                        <a href="#" data-btnIdentity="1" class="btn btn-azul probar reduccion">
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
                Sea la siguiente estructura para representar árboles con claves en los nodos y múltiples hijos:
                <pre class="line-numbers">
                    <code class="language-haskell">
                        data Arb c = V    -- El arbol vacio
                                    | N c | Arb c |  --nodo con clave de tipo c y lista con subárboles
                                    deriving Show
                    </code>
                </pre>
                Escribir, en función de reduce, la siguiente función
                <pre class="line-numbers">
                    <code class="language-haskell">
                        aplica :: (c -> b) -> Arb c -> Arb b
                        aplica f t = ...
                        -- devuelve un árbol con la misma estructura y 
                        -- con las imágenes mediante f de los nodos

                        visita :: Arb c -> [c] 
                        visita t = ... --las claves de t para un recorrido en preorden
                    </code>
                </pre>
            </p>
            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                        <code class="language-haskell">
                            aplica :: (a -> b) -> Arb a -> Arb b
                            aplica f V   = V
                            aplica f(N c a s) = N (f c) (map (aplica f) as)

                            visita V  = []
                            visita (N c as) = (concat [visita a| a <- as])
                        </code>
                    </pre>
                    <div class="desactivate ejemplocuadro" id="ejemplocuadro2">
                        <img src="{{ asset('images/icons/arrow-right-yellow.png') }}" style="width: 100%"
                            alt="flecha izquierda">
                    </div>

                    <div class="botones">
                        <a href="#" data-btnIdentity="2" class="btn btn-azul probar reduccion">
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
    </div>
@endsection

@section('scripts')
    <script>
        const id = {!! $identity !!}
        let page = '{!! $dad_page !!}'
    </script>
    <script src="{{ asset('js/ejemplos/mod8/mod.js') }}"></script>
    <script src="{{ asset('js/ejemplos/index.js') }}"></script>
@endsection
