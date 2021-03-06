<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/icons/logo_haskell.ico') }}" />
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    {{-- Prims JS --}}
    <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
    @yield('styles')
    <title>Guía de Haskell</title>
</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div style="width: 40px" class="d-inline-block">
                    <img class="d-inline-block" src="{{ asset('images/all/logo_haskell.png') }}" alt="logo_haskell">
                </div>
                <span class="ml-2">Guía del paradigma funcional con Haskell</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    @if (!isset($page))
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#modulos">Módulos</a>
                        </li>
                    @else
                        @if ($page == 'ejemplo')
                            <li class="nav-item">
                                @switch($dad_page)
                                    @case('programacion-funcional')
                                    <a class="nav-link active" aria-current="page" href="{{ route('funcional') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                    @break
                                    @case('introduccion-haskell')
                                    <a class="nav-link active" aria-current="page" href="{{ route('introhaskell') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                    @break
                                    @case('funciones-orden-superior')
                                    <a class="nav-link active" aria-current="page" href="{{ route('orden-superior') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                    @break
                                    @case('clases')
                                    <a class="nav-link active" aria-current="page" href="{{ route('clases') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                    @break
                                    @case('listas')
                                    <a class="nav-link active" aria-current="page" href="{{ route('listas') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                    @break
                                    @case('grafos')
                                    <a class="nav-link active" aria-current="page" href="{{ route('grafos') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                    @break
                                    @default
                                @endswitch
                            </li>
                        @else
                            @switch($dad_page)
                                @case('programacion-funcional')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/') }} ">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('introhaskell') }}">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @case('introduccion-haskell')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('funcional') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('orden-superior') }}">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @case('funciones-orden-superior')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('introhaskell') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('definicion-tipos') }}">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @case('definicion-tipos')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('orden-superior') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('clases') }}">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @case('clases')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('definicion-tipos') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('listas') }}">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @case('listas')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('clases') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('grafos') }}">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @case('grafos')
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('listas') }}">
                                        <img src="{{ asset('images/icons/arrow-back.png') }}" class="mr-1"
                                            style="width: 15px" alt="arrow-icon">
                                        Volver
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">
                                        Siguiente
                                        <img src="{{ asset('images/icons/arrow-next.png') }}" class="ml-1"
                                            style="width: 15px" alt="arrow-icon">
                                    </a>
                                </li>
                                @break
                                @default
                            @endswitch
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="row">
        <div class="col-lg-12 mx-auto text-md-center" style="max-width: 1111px">
            <a href="#">Universidad Tecnologica de Pereira</a>
            <span style="display: block">© Todos los derechos reservados</span>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/prism.js') }}"></script>

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('scripts')
</body>

</html>
