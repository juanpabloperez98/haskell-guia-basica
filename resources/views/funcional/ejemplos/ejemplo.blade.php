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
                Según la definición de función, se pide que declare una función llamada
                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2 <br>
                <span style="color: #f8c555; font-weight: bold">Nota</span>: tenga en cuenta que esta función no es sintaxis del lenguaje Haskell
            </p>

            <div class="row mx-auto mt-5">
                <div class="col-lg-6 p-0">
                    <h5 class="color-yellow">Codigo</h5>
                    <pre class="line-numbers">
                            <code class="language-haskell">
                    DobleNumero: Z -> Z
                    DobleNumero: (x) -> x * 2
                            </code>
                        </pre>

                    <div class="bg-light p-2 desactivate" id="resultado1" style="min-height: 60px;">
                        <h6 class="text-center font-weight-bold">Resultado</h6>
                        <p class="text-center" id="resultp1"></p>
                    </div>

                    <form action="" data-form="1" id="form1" class="formulario desactivate">
                        <input type="text" class="form-control" id="input1" placeholder="Ingresa el valor de X">
                        <button type="submit" class="btn btn-amarillo ml-1">Siguiente
                            <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/run.png') }}" alt="run logo">
                        </button>
                    </form>

                    <div class="botones">
                        <a href="#" data-btnIdentity="1" class="btn btn-azul probar">
                            Probar <img class="ml-1" style="width: 20px" src="{{ asset('images/icons/run.png') }}"
                                alt="run logo">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 p-0 text-center desactivate" id="explain1">
                    <h5 class="color-blue">Explicación</h5>
                    <div class="bg-light p-2" style="width: 300px; height: 80px; margin: auto"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo2">
            <h5 class="color-yellow">Ejemplo 2</h5>
            <p class="my-4 bg-light p-3">
                Según la definición de función, se pide que declare una función llamada
                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo3">
            <h5 class="color-yellow">Ejemplo 3</h5>
            <p class="my-4 bg-light p-3">
                Según la definición de función, se pide que declare una función llamada
                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo4">
            <h5 class="color-yellow">Ejemplo 4</h5>
            <p class="my-4 bg-light p-3">
                Según la definición de función, se pide que declare una función llamada
                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo5">
            <h5 class="color-yellow">Ejemplo 5</h5>
            <p class="my-4 bg-light p-3">
                Según la definición de función, se pide que declare una función llamada
                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2
            </p>
        </div>

        <div class="col-lg-12 mx-auto px-3 pt-5 desactivate" id="ejemplo6">
            <h5 class="color-yellow">Ejemplo 6</h5>
            <p class="my-4 bg-light p-3">
                Según la definición de función, se pide que declare una función llamada
                DobleNumero(), la cual recibirá como parámetro una variable (x) y esta devolverá el valor de
                multiplicar (x) * 2
            </p>
        </div>
    </div>
@endsection
